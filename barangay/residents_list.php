<?php require "includes/connection.php";

$sql = "SELECT * FROM residents";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Residents List</title>
</head>

<body>
  <div class="container-md h-100 d-flex align-items-center justify-content-center flex-column">
    <div class="w-100">
      <div class="d-flex align-items-center justify-content-between mt-3 gap-2 w-100">
        <h1 class="m-0 text-danger">All Registered Residents</h1>
        <a href="manage_res.php" class="btn btn-danger">Go Back</a>
      </div>
      <div class="table-responsive w-100 my-3 ">
        <table class="table table-dark table-striped table-hover table-bordered text-center align-middle">
          <thead class="table-secondary">
            <tr>
              <th class="text-nowrap">Photo</th>
              <th class="text-nowrap">First Name</th>
              <th class="text-nowrap">Middle Name</th>
              <th class="text-nowrap">Last Name</th>
              <th class="text-nowrap">Gender</th>
              <th class="text-nowrap">Birth Date</th>
              <th class="text-nowrap">Place of Birth</th>
              <th class="text-nowrap">Civil Status</th>
              <th class="text-nowrap">Occupation</th>
              <th class="text-nowrap">Religion</th>
              <th class="text-nowrap">lot</th>
              <th class="text-nowrap">Purok</th>
              <th class="text-nowrap">Resident Status</th>
              <th class="text-nowrap">is Voter</th>
              <th class="text-nowrap">is PWD</th>
              <th class="text-nowrap">Action</th>

            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<tr class="h-100">';
                echo "<td><img src ='" . $row["photo_path"] . "' width='100'></td>";
                echo '<td>' . $row["first_name"] . "</td>";
                echo '<td>' . $row["middle_name"] . "</td>";
                echo '<td>' . $row["last_name"] . "</td>";
                echo '<td>' . $row["gender"] . "</td>";
                echo '<td>' . $row["birth_date"] . "</td>";
                echo '<td>' . $row["place_of_birth"] . "</td>";
                echo '<td>' . $row["civil_status"] . "</td>";
                echo '<td>' . $row["occupation"] . "</td>";
                echo '<td>' . $row["religion"] . "</td>";
                echo '<td>' . $row["lot"] . "</td>";
                echo '<td>' . $row["purok"] . "</td>";
                echo '<td>' . $row["resident_status"] . "</td>";
                echo '<td>' . (($row["voter_status"] == 1) ? 'Yes' : 'No') . "</td>";
                echo '<td>' . (($row["PWD"] == 1) ? 'Yes' : 'No') . "</td>";
                echo "<td> <div  class='d-flex align-items-center justify-content-center gap-2 h-100'> <a href='update_res.php?id=" . $row["id"] . "'class='btn btn-primary'>Edit</a>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan = '19'> No records found </td></tr>";
            }
            ?>
          </tbody>
          <tfoot>
            <tr>
              <td colspan="18" class="text-bg-danger">End of List</td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>

    <div class="text-center">
      <p>&copy; 2024 Barangay Cannery Information System</p>
    </div>
  </div>
</body>

</html>