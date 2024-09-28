<?php require "includes/connection.php";
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
  }
$sql = "SELECT * FROM community_tax";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Community Tax List</title>
</head>

<body class="d-flex">
  <?php include "includes/sidebar.php" ?>
  <div class="min-vh-100 p-3" style="width: 83%">
    <div class="w-100">
      <div id="directory_link" class="p-3 rounded-4 bg-dark-subtle ">
        <a href="manage_com.php" class="text-danger text-decoration-none">Manage Request</a>
        <a href="manage_community_tax.php" class="text-decoration-none text-danger">/ Manage Community Tax</a>
        <a href="view_community_tax.php" class="text-decoration-none text-black-50">/ View Community Tax</a>
      </div>
      <div class="d-flex align-items-center justify-content-between  mt-2 gap-2 w-100">
        <div>
          <h1 class="m-0 text-danger">View Community Tax</h1>
          <span class="text-muted">This is where you can view all community tax records</span>
        </div>
        <a href="manage_community_tax.php" class="btn btn-danger">Go Back</a>
      </div>
      <div class="table-responsive w-100">
        <table class="table table-dark table-striped table-hover table-bordered text-center align-middle">
          <thead class="table-secondary">
            <tr>
              <th class="text-nowrap">ID</th>
              <th class="text-nowrap">Resident Name</th>
              <th class="text-nowrap">Tax Year</th>
              <th class="text-nowrap">Amount</th>
              <th class="text-nowrap">Date Paid</th>
              <th class="text-nowrap">Actions</th>

            </tr>
          </thead>
          <tbody class="table-group-divider">
            <?php
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<tr class="h-100">';
                echo "<td> {$row['id']} </td>";
                echo "<td> {$row['resident_name']} </td>";
                echo "<td> {$row['tax_year']} </td>";
                echo "<td> {$row['amount']} </td>";
                echo "<td> {$row['date_paid']} </td>";
                echo "<td> <div class='d-flex align-items-center justify-content-center gap-2 h-100'> <a href='view_community_tax_details.php?id={$row['id']}' class='btn btn-primary'>View</a>  <a href='update_community_tax.php?id={$row['id']}' class='btn btn-danger'>Edit</a>  <a href='view_community_tax_details.php?id={$row['id']}' class='btn btn-light'>Print</a> </td>";

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