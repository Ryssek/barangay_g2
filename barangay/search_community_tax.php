<?php require "includes/connection.php";
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (isset($_GET['search']) && strlen($_GET['search']) > 0) {
    $search_query = filter_input(INPUT_GET, "search", FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "SELECT * FROM community_tax WHERE resident_name LIKE '%$search_query%' OR tax_year LIKE '%$search_query%'";
    $result = $conn->query($sql);
  } else {
    $sql = "SELECT * FROM community_tax ORDER BY resident_name ASC";
    $result = $conn->query($sql);
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Community Tax</title>
</head>

<body class="d-flex">
  <?php include "includes/sidebar.php" ?>
  <div class="min-vh-100 p-3" style="width: 83%">
    <div class="container-fluid">
      <div id="directory_link" class="p-3 rounded-4 bg-dark-subtle ">
        <a href="manage_com.php" class="text-danger text-decoration-none">Manage Request/</a>
        <a href="manage_community_tax.php" class="text-danger text-decoration-none">Manage Community Tax</a>
        <a href="search_community_tax.php" class="text-decoration-none text-black-50">/ Search Community Tax</a>
      </div>
      <div class="d-flex align-items-center justify-content-between">
        <h1 class="text-danger">Search Community Tax</h1>
        <a href="manage_community_tax.php" class="btn btn-danger">Go back</a>
      </div>
      <form class="d-flex gap-2" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="GET">
        <input class="form-control" name="search" id="search" type="text" placeholder="Search by name or tax year" style="border: 1px solid gray" />
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
                <th class="text-nowrap">Tax Year</th>
                <th class="text-nowrap">Amount</th>
                <th class="text-nowrap">Date Paid</th>

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