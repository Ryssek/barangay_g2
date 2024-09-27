<?php require "includes/connection.php";
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}

$sql = "SELECT * FROM certificates";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Certificates List</title>
</head>

<body class="d-flex">
  <?php include "includes/sidebar.php" ?>
  <div class="min-vh-100 p-3" style="width: 83%">
    <div class="w-100">
      <div id="directory_link" class="p-3 rounded-4 bg-dark-subtle ">
        <a href="manage_com.php" class="text-danger text-decoration-none">Manage Request</a>
        <a href="manage_certificates.php" class="text-decoration-none text-danger">/ Manage Certificates</a>
        <a href="view_certificates.php" class="text-decoration-none text-black-50">/ View Certificates</a>
      </div>
      <div class="d-flex align-items-center justify-content-between  mt-2 gap-2 w-100">
        <div>
          <h1 class="m-0 text-danger">View Certificates</h1>
          <span class="text-muted">This is where you can view all issued clearances</span class="text-muted">
        </div>
        <a href="manage_certificates.php" class="btn btn-danger">Go Back</a>
      </div>
      <div class="table-responsive w-100  ">
        <table class="table table-dark table-striped table-hover table-bordered text-center align-middle">
          <thead class="table-secondary">
            <tr>
              <th class="text-nowrap">ID</th>
              <th class="text-nowrap">Resident Name</th>
              <th class="text-nowrap">Certificate Type</th>
              <th class="text-nowrap">Date Issued</th>
              <th class="text-nowrap">Valid Until</th>
              <th class="text-nowrap">Action</th>`

            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<tr class="h-100">';
                echo "<td> {$row['id']} </td>";
                echo "<td> {$row['resident_name']} </td>";
                echo "<td> {$row['certificate_type']} </td>";
                echo "<td> {$row['date_issued']} </td>";
                echo "<td> {$row['valid_until']} </td>";
                echo "<td> <div class='d-flex align-items-center justify-content-center gap-2 h-100'> <a href='view_certificate_details.php?id={$row['id']}' class='btn btn-primary'>View</a>  <a href='update_certificate.php?id={$row['id']}' class='btn btn-danger'>Edit</a></td>";

                echo "</tr>";
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

    <div class="text-center">
      <p>&copy; 2024 Barangay Cannery Information System</p>
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