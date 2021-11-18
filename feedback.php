<?php  
	include_once 'assets/php/header.php';
?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8 mt-3">
      <?php if ($verified == 'Verified!'): ?>
      <div class="card border-primary">
        <div class="card-header lead text-center bg-primary text-white">Send Feedback to admin.</div>
        <div class="card-body">
          <form action="#" method="post" class="px-4" id="feedback-form">
            <div class="form-group">
              <input type="text" name="subject" class="form-control-lg form-control rounded-0" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <textarea name="feedback" class="form-control-lg form-control rounded-0" rows="8" placeholder="Write your feedback here..." required></textarea>
            </div>
            <div class="form-group">
              <input type="submit" name="feedbackBtn" id="feedbackBtn" value="Send Feedback" class="btn btn-primary btn-block btn-lg rounded-0">
            </div>
          </form>
        </div>
      </div>
      <?php else: ?>
      <h1 class="text-center text-dark mt-5">To verify your E-Mail, send Feedback to admin.</h1>
      <?php endif; ?>
    </div>
  </div>
</div>

<?php require_once 'assets/php/footer.php'; ?>
<script type="text/javascript">
$(document).ready(function() {

  // Checking user is logedin or not
  $.ajax({
    url: 'assets/php/action.php',
    method: 'post',
    data: {
      action: 'checkUser'
    },
    success: function(response) {
      if (response === 'bye') {
        window.location = 'index.php';
      }
    }
  });

  $("#feedbackBtn").click(function(e) {
    if ($("#feedback-form")[0].checkValidity()) {
      e.preventDefault();
      $("#feedbackBtn").val('Please Wait...');

      $.ajax({
        url: 'assets/php/process.php',
        method: 'post',
        data: $("#feedback-form").serialize() + '&action=feedback',
        success: function(response) {
          $("#feedback-form")[0].reset();
          $("#feedbackBtn").val('Send Feedback');
          Swal.fire({
            title: 'Feedback successfully sent to the admin!',
            type: 'success'
          });
        }
      });
    }
  });

  checkNotification();

  function checkNotification() {
    $.ajax({
      url: 'assets/php/process.php',
      method: 'post',
      data: {
        action: 'notificationCheck'
      },
      success: function(response) {
        $("#showNotificationCheck").html(response);
      }
    });
  }
});
</script>
</body>

</html>
