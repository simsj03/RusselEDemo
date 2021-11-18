<?php  
	include_once 'assets/php/admin-header.php';
?>

<div class="row justify-content-center my-2">
  <div class="col-lg-12">
    <div class="card my-2 border-dark">
      <div class="card-header bg-dark text-white flex-row d-flex justify-content-between align-items-center">
        <h4 class="m-0 text-light">All Deleted URLs By Users</h4>
        <a href="#" id="deleteAllDeletedUrlsBtn" class="btn btn-light"><i class="fas fa-trash fa-lg pr-2"></i>Delete All URLs</a>
      </div>
      <div class="card-body">
        <div class="table-responsive" id="showAllDeletedUrls">
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

  // Fetch All Deleted URLs by Users Ajax Request
  fetchAllDeletedUrls();

  function fetchAllDeletedUrls() {
    $.ajax({
      url: 'assets/php/admin-action.php',
      method: 'post',
      data: {
        fetchAllDeletedUrls: 1
      },
      success: function(response) {
        $("#showAllDeletedUrls").html(response);
        $("table").DataTable({
          order: [0, 'desc']
        });
      }
    });
  }

  //delete a deleted url ajax request
  $("body").on("click", ".urlDeleteIcon", function(e) {
    e.preventDefault();
    del_deleted_url_id = $(this).attr('id');
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
            del_deleted_url_id: del_deleted_url_id
          },
          success: function(response) {
            console.log(response);
            Swal.fire({
              title: 'Deleted!',
              text: 'URL deleted successfully!.',
              icon: 'success'
            })
            fetchAllDeletedUrls();
          }
        });
      }
    });
  });

  //delete all deleted url ajax request
  $("#deleteAllDeletedUrlsBtn").click(function(e) {
    e.preventDefault();
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
            deleteAllDeletedUrls: 1
          },
          success: function(response) {
            console.log(response);
            Swal.fire({
              title: 'Deleted!',
              text: 'All URL deleted successfully!.',
              icon: 'success'
            })
            fetchAllDeletedUrls();
          }
        });
      }
    });
  });


});
</script>
</body>

</html>
