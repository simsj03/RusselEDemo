<?php  
	include_once 'assets/php/admin-header.php';
?>

<div class="row justify-content-center my-2">
  <div class="col-lg-6 mt-4" id="showAllNotification">

  </div>
</div>

<!-- footer end -->
</div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function() {

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


  //Delete notification
  $("body").on("click", ".close", function(e) {
    e.preventDefault();
    notification_id = $(this).attr('id');
    $.ajax({
      url: 'assets/php/admin-action.php',
      method: 'post',
      data: {
        notification_id: notification_id
      },
      success: function(response) {
        fetchAllNotification();
        checkNotification();
      }
    });
  });

  fetchAllNotification();

  function fetchAllNotification() {
    $.ajax({
      url: 'assets/php/admin-action.php',
      method: 'post',
      data: {
        action: 'fetchAllNotification'
      },
      success: function(response) {
        $("#showAllNotification").html(response);
      }
    });
  }

});
</script>
</body>

</html>
