<?php require "includes/connection.php";
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}
$sql = "SELECT * FROM complaints";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Complaints List</title>
</head>

<body class="d-flex">
  <?php include "includes/sidebar.php" ?>
  <div class="min-vh-100 p-3" style="width: 83%">
    <div class="container-md d-flex align-items-center justify-content-center flex-column">
      <div class="w-100">
        <div id="directory_link" class="p-3 rounded-4 bg-dark-subtle ">
          <a href="manage_com.php" class="text-danger text-decoration-none">Manage Request /</a>
          <a href="manage_complaints.php" class="text-danger text-decoration-none">Manage Complaints</a>
          <a href="complaints_list.php" class="text-decoration-none text-black-50">/ View Complaints</a>
        </div>
        <div class="d-flex align-items-center justify-content-between my-2 gap-2 w-100">

          <h1 class="m-0 text-danger">All Complaints</h1>
          <a href="manage_complaints.php" class="btn btn-danger">Go Back</a>
        </div>
        <div class="table-responsive w-100 my-3 ">
          <table class="table table-dark table-striped table-hover table-bordered text-center align-middle">
            <thead class="table-secondary">
              <tr>
                <th class="text-nowrap">ID</th>
                <th class="text-nowrap">Resident Name</th>
                <th class="text-nowrap">Complaint Type</th>
                <th class="text-nowrap">Date Filled</th>
                <th class="text-nowrap">Status</th>
                <th class="text-nowrap">Actions</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              <?php
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo '<tr class="h-100">';
                  echo '<td>' . $row["com_id"] . "</td>";
                  echo '<td>' . $row["resident_name"] . "</td>";
                  echo '<td>' . $row["complaint_type"] . "</td>";
                  echo '<td>' . $row["date_filled"] . "</td>";
                  echo '<td>' . $row["status"] . "</td>";
                  echo '<td> <div  class="d-flex align-items-center justify-content-center gap-2 h-100"> <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalId' . $row['com_id'] . '" > View </button> | <a href="update_complaints.php?id=' . $row["com_id"] . '"class="btn btn-primary">Edit</a>';
                  echo "</tr>";
                  echo '<tr>',
                  '<div class="modal fade" id="modalId' . $row['com_id'] . '" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title text-danger" id="modalTitleId">
                              Complaint Details
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="container-fluid">
                              <div class="mt-3">
                                <span class="fw-bold">ID: </span> ' . $row['com_id'] . '
                              </div>
                              <div class="mt-3"> 
                                <span class="fw-bold">Resident Name: </span> ' . $row['resident_name'] . '
                              </div>
                              <div class="mt-3"> 
                                <span class="fw-bold">Complaint Type: </span> ' . $row['complaint_type'] . '
                              </div>
                              <div class="mt-3"> 
                                <span class="fw-bold">Date Filled: </span> ' . $row['date_filled'] . '
                              </div>
                              <div class="mt-3"> 
                                <span class="fw-bold">Description: </span> ' . $row['description'] . '
                              </div>
                              <div class="mt-3"> 
                                <span class="fw-bold">Status: </span> ' . $row['status'] . '
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                              Close
                            </button>
                            <a href="update_complaints.php?id=' . $row["com_id"] . '"class="btn btn-primary">Edit</a>
                          </div>
                        </div>
                      </div>
                  </div>', '</tr>';
                }
              } else {
                echo "<tr><td colspan = '6'> No records found </td></tr>";
              }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="6" class="text-bg-danger">End of List</td>
              </tr>
            </tfoot>
          </table>
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


      <div class="text-center">
        <p>&copy; 2024 Barangay Cannery Information System</p>
      </div>
    </div>
  </div>
</body>

</html>

<style>
  /* Sidebar active */
  .complaints {
    background: black !important;
    color: white !important;
  }
</style>