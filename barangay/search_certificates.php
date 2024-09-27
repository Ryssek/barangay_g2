<?php require "includes/connection.php";
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (isset($_GET['search']) && strlen($_GET['search']) > 0) {
    $search_query = filter_input(INPUT_GET, "search", FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "SELECT * FROM certificates WHERE resident_name LIKE '%$search_query%' OR certificate_type LIKE '%$search_query%'";
    $result = $conn->query($sql);
  } else {
    $sql = "SELECT * FROM certificates ORDER BY resident_name ASC";
    $result = $conn->query($sql);
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Certificates</title>
</head>

<body class="d-flex">
  <?php include "includes/sidebar.php" ?>
  <div class="min-vh-100 p-3" style="width: 83%">
    <div class="container-fluid">
      <div id="directory_link" class="p-3 rounded-4 bg-dark-subtle ">
        <a href="manage_com.php" class="text-danger text-decoration-none">Manage Request/</a>
        <a href="manage_certificates.php" class="text-danger text-decoration-none">Manage Certificates</a>
        <a href="search_certificates.php" class="text-decoration-none text-black-50">/ Search Certificates</a>
      </div>
      <div class="d-flex align-items-center justify-content-between">
        <h1 class="text-danger">Search Certificates</h1>
        <a href="manage_certificates.php" class="btn btn-danger">Go back</a>
      </div>
      <form class="d-flex gap-2" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="GET">
        <input class="form-control" name="search" id="search" type="text" placeholder="Search by name or certification type" style="border: 1px solid gray" />
        <button class="btn btn-outline-success">
          Search
        </button>
      </form>
      <div class="table-responsive  my-3" id="main-table">
        <div class="table-responsive w-100  ">
          <table class="table table-dark table-striped table-hover table-bordered text-center align-middle">
            <thead class="table-secondary">
              <tr>
                <th class="text-nowrap">ID</th>
                <th class="text-nowrap">Resident Name</th>
                <th class="text-nowrap">Certificate Type</th>
                <th class="text-nowrap">Date Issued</th>
                <th class="text-nowrap">Valid Until</th>

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
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan = '5'> No records found </td></tr>";
              }
              ?>
            </tbody>
            <tfoot>
              <tr>
                <td colspan="5" class="text-bg-danger">End of List</td>
              </tr>
            </tfoot>
          </table>
        </div>
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