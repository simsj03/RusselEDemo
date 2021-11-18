<?php  
	include_once 'assets/php/admin-header.php';
?>
<div class="row">
  <div class="col-lg-12">
    <div class="card my-2 border-secondary">
      <div class="card-header bg-secondary text-white">
        <h4 class="m-0">Total Notes By All Users</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive" id="showAllNotes">
          <p class="text-center lead align-self-center">Please Wait...</p>
        </div>
      </div>
    </div>
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

  // Delete a user ajax request
  $("body").on("click", ".noteDeleteIcon", function(e) {
    e.preventDefault();
    note_id = $(this).attr('id');
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: 'assets/php/admin-action.php',
          type: 'post',
          data: {
            note_id: note_id
          },
          success: function(response) {
            console.log(response);
            Swal.fire({
              title: 'Deleted!',
              text: 'Note deleted successfully!.',
              icon: 'success'
            })
            fetchAllNotes();
          }
        });
      }
    });
  });

  fetchAllNotes();

  function fetchAllNotes() {
    $.ajax({
      url: 'assets/php/admin-action.php',
      method: 'post',
      data: {
        action: 'fetchAllNotes'
      },
      success: function(response) {
        $("#showAllNotes").html(response);
        $("table").DataTable({
          order: [0, 'desc']
        });
      }
    });
  }
});
</script>
</body>

</html>
