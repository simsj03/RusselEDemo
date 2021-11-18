<?php  
	include_once 'assets/php/admin-header.php';
	include_once 'assets/php/admin-db.php';
  $count = new Admin();
?>
<div class="row">
  <div class="col-lg-12">
    <div class="card-deck mt-3 text-light text-center font-weight-bold">
      <div class="card bg-primary">
        <div class="card-header">Total User</div>
        <div class="card-body">
          <h1 class="display-4">
            <?= $count->totalCount('users'); ?>
          </h1>
        </div>
      </div>
      <div class="card bg-warning">
        <div class="card-header">Verified User</div>
        <div class="card-body">
          <h1 class="display-4">
            <?= $count->verified_users(1); ?>
          </h1>
        </div>
      </div>
      <div class="card bg-success">
        <div class="card-header">Unverified User</div>
        <div class="card-body">
          <h1 class="display-4">
            <?= $count->verified_users(0); ?>
          </h1>
        </div>
      </div>

    </div>
  </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <div class="card-deck mt-3 text-light text-center font-weight-bold">
      <div class="card bg-danger">
        <div class="card-header">Total Notes</div>
        <div class="card-body">
          <h1 class="display-4">
            <?= $count->totalCount('notes'); ?>
          </h1>
        </div>
      </div>
      <div class="card bg-success">
        <div class="card-header">Total Feedback</div>
        <div class="card-body">
          <h1 class="display-4">
            <?= $count->totalCount('feedback'); ?>
          </h1>
        </div>
      </div>
      <div class="card bg-info">
        <div class="card-header">Total Notification</div>
        <div class="card-body">
          <h1 class="display-4">
            <?= $count->totalCount('notification'); ?>
          </h1>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer Start -->
</div>
</div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
checkNotification();

function checkNotification() {
  $.ajax({
    url: 'assets/php/admin-action.php',
    method: 'post',
    data: {
      action: 'notificationCheck'
    },
    success: function(response) {
      $("#showNotificationCheck").html(response);
    }
  });
}


google.charts.load("current", {
  packages: ["corechart"]
});
google.charts.setOnLoadCallback(colChart);

function colChart() {
  var data = google.visualization.arrayToDataTable([
    ['Verified', 'Number'],
    <?php  
    	$verified = $count->isVerifiedPer();
    	foreach ($verified as $row) {
    	  if ($row['verified'] == 0) {
    	    $row['verified'] = 'Unverified';
    	  } else {
    	    $row['verified'] = 'Verified';
    	  }
    	  echo '["' . $row['verified'] . '",' . $row['number'] . '],';
    	}
    ?>
  ]);
  var options = {
    pieHole: 0.4,
  };
}
</script>
</body>

</html>
