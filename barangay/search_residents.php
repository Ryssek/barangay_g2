<?php require "includes/connection.php" ?>

<?php
if (isset($_GET['search']) && strlen($_GET['search']) > 0 || isset($_GET['all'])) {
  $search_query = filter_input(INPUT_GET, "search", FILTER_SANITIZE_SPECIAL_CHARS);
  $sql = "SELECT * FROM residents WHERE first_name LIKE '%$search_query%' OR last_name LIKE '%$search_query%' OR middle_name LIKE '%$search_query%'";
  $result = $conn->query($sql);
  echo "<span class='mark'></span>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Residents</title>

</head>

<body>
  <div class="container-md min-vh-100 d-flex align-items-center justify-content-center flex-column">
    <div class="w-100">
      <div class="d-flex align-items-center justify-content-between">
        <h1 class="text-danger">Search a resident</h1>
        <a href="manage_res.php" class="btn btn-danger">Go back</a>
      </div>
      <form class="d-flex gap-2" action="" method="GET">
        <button name="all" class="btn btn-outline-danger">All</button>
        <input class="form-control" name="search" id="search" type="text" placeholder="Search by name..."
          style="border: 1px solid gray" />
        <button class="btn btn-outline-success" type="submit">
          Search
        </button>
      </form>
      <div class="table-responsive d-none my-3" id="main-table">
        <table class="table table-dark table-striped table-hover table-bordered text-center align-middle">
          <thead class="table-secondary">
            <tr>
              <th class="text-nowrap">Photo</th>
              <th class="text-nowrap">Name</th>
              <th class="text-nowrap">Purok</th>
              <th class="text-nowrap">Phone Number</th>
              <th class="text-nowrap">Details</th>

            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<tr class="h-100">';
                echo "<td><img src ='" . $row["photo_path"] . "' width='100'></td>";
                echo '<td>' . $row["first_name"] . ' ' . $row['middle_name'] . ' ' . $row['last_name'] . "</td>";
                echo '<td>' . $row["purok"] . "</td>";
                echo '<td>' . $row["phone_number"] . "</td>";
                echo '<td>   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailModal' . $row['id'] . '">
        View Details
    </button> </td>';

                // Details Modal
                echo ' <div class="modal fade" id="detailModal' . $row['id'] . '" tabindex="-1" aria-labelledby="detailModal" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitleId">
             ' . $row["first_name"] . ' ' . $row['middle_name'] . ' ' . $row['last_name'] . '
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
    
          <div class="modal-body" id="modal_details">
            <div class="container-fluid">
              <div class="text-center">
                <img src="' . $row['photo_path'] . '" class="img-fluid rounded-top" alt="" />
              </div>
              <div class="mt-3">
                <span class="fw-bold">First Name: </span> ' . $row['first_name'] . ' 
              </div>
              <div class="mt-3">
                <span class="fw-bold">Middle Name: </span>' . $row['middle_name'] . ' 
              </div>
              <div class="mt-3">
                <span class="fw-bold">Last Name: </span> ' . $row['last_name'] . ' 
              </div>
              <div class="mt-3">
                <span class="fw-bold">Nickname: </span> ' . $row['nick_name'] . ' 
              </div>
              <div class="mt-3">
                <span class="fw-bold">Gender: </span> ' . $row['gender'] . ' 
              </div>
              <div class="mt-3">
                <span class="fw-bold">Birth Date: </span> ' . $row['birth_date'] . ' 
              </div>
              <div class="mt-3">
                <span class="fw-bold">Place of Birth: </span> ' . $row['place_of_birth'] . ' 
              </div>
              <div class="mt-3">
                <span class="fw-bold">Civil Status: </span>' . $row['civil_status'] . ' 
              </div>
              <div class="mt-3">
                <span class="fw-bold">Occupation: </span>' . $row['occupation'] . ' 
              </div>
              <div class="mt-3">
                <span class="fw-bold">Religion: </span> ' . $row['religion'] . ' 
              </div>
              <div class="mt-3">
                <span class="fw-bold">Lot: </span>' . $row['lot'] . ' 
              </div>
              <div class="mt-3">
                <span class="fw-bold">Purok: </span>' . $row['purok'] . ' 
              </div>
              <div class="mt-3">
                <span class="fw-bold">Resident Status: </span> ' . $row['resident_status'] . ' 
              </div>
              <div class="mt-3">
                <span class="fw-bold">Voter Status: </span>' . ($row['voter_status'] ? 'Yes' : 'No') . ' 
              </div>
              <div class="mt-3">
                <span class="fw-bold">Person With Disability: </span> ' . ($row['PWD'] ? 'Yes' : 'No') . ' 
              </div>

            </div>
          </div>
          <div class="modal-footer">
           <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_modal' . $row['id'] . '">
              Delete
          </button>
            <a href="update_res.php?id=' . $row['id'] . '" type="button" class="btn btn-primary">Edit</a>
            </div>
          </div>
        </div>
      </div>';

                // Delete Entry Modal
                echo ' <div class="modal fade" id="delete_modal' . $row['id'] . '" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-danger" id="modalTitleId">
              Delete Entry?
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <div class="container-fluid fw-bold">Are you really sure you want to delete this entry?</div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Cancel
            </button>
            <a href="delete_res.php?id=' . $row['id'] . '" type="button" class="btn btn-danger ">Confirm</a>
          </div>
        </div>
      </div>
    </div>';


                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan = '19'> No records found </td></tr>";
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="19" class="text-bg-danger">End of List</td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    <div class="text-center">
      <p>&copy; 2024 Barangay Cannery Information System</p>
    </div>

    <!-- Button trigger modal -->


    <!-- Modal -->


    <script>
      var modalId = document.getElementById('modalId');

      modalId.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        let button = event.relatedTarget;
        // Extract info from data-bs-* attributes
        let recipient = button.getAttribute('data-bs-whatever');

        // Use above variables to manipulate the DOM
      });
    </script>


    <script>
      var modalId = document.getElementById('modalId');

      modalId.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        let button = event.relatedTarget;
        // Extract info from data-bs-* attributes
        let recipient = button.getAttribute('data-bs-whatever');

        // Use above variables to manipulate the DOM
      });
    </script>



    <script>
      const mainTable = document.querySelector("#main-table");
      const mark = document.querySelector(".mark");
      if (mark) {
        mainTable.classList.remove("d-none")
      } else { }
    </script>;

  </div>
</body>

</html>
<style>
  #modal_details div {
    font-size: 1.2rem;
  }
</style>