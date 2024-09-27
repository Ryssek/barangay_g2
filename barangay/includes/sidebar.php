<!-- Sidebar -->
<div class="min-vh-100  d-flex flex-column shadow-lg" style=" width: 17%; position:fixed; ">
  <div class=" d-flex min-vh-100 text-bg-danger flex-column align-items-center justify-content-center" id="sidebar" style=" background-image: linear-gradient(180deg, #2B2E4A, #E84545, #903749, #53354A);">
    <div id="logo" class="w-100 text-center h-100">
      <img src="file.png" alt="logo" class="logo-img">
      <h4>Brgy. Cannery</h4>
    </div>
    <div id="sidebar-buttons" class="w-100 mt-2">
      <a href="dashboard.php" class="btn dashboard sidebar-btn py-3  w-100 ">Dashboard</a>
      <a href="manage_res.php" class="btn residents sidebar-btn py-3 w-100 ">Manage Residents</a>
      <a href="manage_com.php" class="btn complaints sidebar-btn py-3 w-100 ">Manage Complaints/Requests</a>
      <a href="manage_off.php" class="btn official sidebar-btn py-3 w-100 ">Manage Officials</a>
      <a href="manage_rep.php" class="btn reports sidebar-btn py-3 w-100 ">View Reports</a>
      <div class="text-center mt-4" style="border: none;">
        <button type="button" class="btn btn-dark rounded-3 border-0 sidebar-btn " data-bs-toggle="modal" data-bs-target="#logout_modal">
          Log Out
        </button>
      </div>
    </div>

  </div>
</div>
<div class=" min-vh-100" style="width: 17%">

  <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="logout_modal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog " role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-danger " id="modalTitleId">
            LOG OUT?
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <div class="container-fluid fw-bold ">DO YOU REALLY WANT TO LOG OUT?</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Cancel
          </button>
          <a href="logout.php" type="button" class="btn btn-danger">LOG OUT</a>
        </div>
      </div>
    </div>
  </div>

  <script>
    var modalId = document.getElementById('modalId');

    modalId.addEventListener('show.bs.modal', function(event) {
      // Button that triggered the modal
      let button = event.relatedTarget;
      // Extract info from data-bs-* attributes
      let recipient = button.getAttribute('data-bs-whatever');

      // Use above variables to manipulate the DOM
    });
  </script>

</div>

<style>
  #logo {
    height: 15svh;
  }



  .logo-img {
    width: 60%;
  }

  .sidebar-btn {
    border-radius: 0;
    font-size: 1.2rem;
  }

  .sidebar-btn:hover {
    border-radius: 0;
    background: black;
    color: white;
    transition: all 500ms;
  }


  .sidebar-btn.btn {
    color: white
  }
</style>