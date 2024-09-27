<?php require "includes/connection.php" ?>

<?php
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}
if (isset($_GET['search'])) {
  $search_query = filter_input(INPUT_GET, "search", FILTER_SANITIZE_SPECIAL_CHARS);
  $sql = "SELECT * FROM complaints WHERE resident_name LIKE '%$search_query%' OR complaint_type LIKE '%$search_query%'";
  $result = $conn->query($sql);
} else {
  $sql  = "SELECT * FROM complaints";
  $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Complaints</title>

</head>

<body class="d-flex">
  <?php include "includes/sidebar.php" ?>
  <div class="min-vh-100 p-3" style="width: 83%">
    <div class="container-md h-100 d-flex align-items-center justify-content-center flex-column">
      <div class="container-fluid">
        <div id="directory_link" class="p-3 rounded-4 mt-3 bg-dark-subtle ">
          <a href="manage_com.php" class="text-danger text-decoration-none">Manage Request /</a>
          <a href="manage_complaints.php" class="text-danger text-decoration-none">Manage Complaints</a>
          <a href="search_complaints.php" class="text-decoration-none text-black-50">/ Search Complaints</a>
        </div>
        <div class="d-flex align-items-center my-2 justify-content-between">
          <h1 class="text-danger">Search Complaints</h1>
          <a href="manage_complaints.php" class="btn btn-danger">Go back</a>
        </div>
        <form class="d-flex gap-2" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="GET">
          <input class="form-control" name="search" id="search" type="text" placeholder="Search by resident name or complaint type" style="border: 1px solid gray" />
          <button class="btn btn-outline-success" type="submit">
            Search
          </button>
        </form>
        <div class="table-responsive my-3" id="main-table">
          <table class="table table-dark table-striped table-hover table-bordered text-center align-middle">
            <thead class="table-secondary">
              <tr>
                <th class="text-nowrap">ID</th>
                <th class="text-nowrap">Resident Name</th>
                <th class="text-nowrap">Complaint Type</th>
                <th class="text-nowrap">Description</th>
                <th class="text-nowrap">Date Filled</th>
                <th class="text-nowrap">Status</th>

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
                  echo '<td>' . $row["description"] . "</td>";
                  echo '<td>' . $row["date_filled"] . "</td>";
                  echo '<td>' . $row["status"] . "</td>";
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
  </div>
</body>

</html>
<style>
  #modal_details div {
    font-size: 1.2rem;
  }

  /* Sidebar active */
  .complaints {
    background: black !important;
    color: white !important;
  }
</style>