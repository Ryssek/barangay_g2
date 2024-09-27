<?php require "includes/connection.php" ?>
<?php
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}
// Total Residents 
$totalResidentsQuery = "SELECT COUNT(id) as total_residents FROM residents";
$totalResidentsResult = mysqli_query($conn, $totalResidentsQuery);
$totalResidents = mysqli_fetch_assoc($totalResidentsResult)['total_residents'] ?? 0;

// Total Complaints 
$totalComplaintsQuery = "SELECT COUNT(com_id) as total_complaints FROM complaints";
$totalComplaintsResult = mysqli_query($conn, $totalComplaintsQuery);
$totalComplaints = mysqli_fetch_assoc($totalComplaintsResult)['total_complaints'] ?? 0;

// Total Complaints 
$totalOfficialsQuery = "SELECT COUNT(id) as total_officials FROM officials";
$totalOfficialsResult = mysqli_query($conn, $totalOfficialsQuery);
$totalOfficials = mysqli_fetch_assoc($totalOfficialsResult)['total_officials'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Reports</title>
</head>

<body class="d-flex">
  <?php include "includes/sidebar.php" ?>

  <div class="min-vh-100 p-3" style="width: 83%">

    <h1 class="text-danger">Manage Reports</h1>
    <div class="manage-controls row row-cols-3 container-fluid gap-3 row align-items-center justify-content-center">
      <div class="manage-ctrl pb-2 px-0 text-center col-md-4 border border-1 border-danger">
        <div class="ctrl-title p-2 text-bg-danger ">
          Total Residents
        </div>
        <div class="ctrl-body mt-2">
          <p><?php echo $totalResidents ?></p>
          <a href="print_residents_report.php" class="btn btn-danger">Print Report</a>
        </div>
      </div>
      <div class="manage-ctrl pb-2 px-0 text-center col-md-4 border border-1 border-danger">
        <div class="ctrl-title p-2 text-bg-danger ">
          Total Complaints
        </div>
        <div class="ctrl-body mt-2">
          <p><?php echo $totalComplaints ?></p>

          <a href="print_complaints_report.php" class="btn btn-danger">Print Report</a>
        </div>
      </div>

      <div class="manage-ctrl pb-2 px-0 text-center col-md-4 border border-1 border-danger">
        <div class="ctrl-title p-2 text-bg-danger ">
          Total Officials
        </div>
        <div class="ctrl-body mt-2">
          <p><?php echo $totalOfficials ?></p>

          <a href="print_officials_report.php" class="btn btn-danger">Print Report</a>
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
  .reports {
    background: black !important;
    color: white !important;
  }

  .manage-ctrl {
    max-width: 20rem;
    transition: all 0.3s;
  }

  .manage-ctrl:hover {
    transform: translateY(-10px);
  }
</style>