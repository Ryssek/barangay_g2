<?php require "includes/connection.php";
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Complaints/Requests</title>
</head>

<body class="d-flex">
  <?php include "includes/sidebar.php" ?>

  <div class="min-vh-100 p-3" style="width: 83%">

    <h1 class="text-danger">Manage Complaints/Requests</h1>
    <p>This is where you can manage various complaints and requests</p>

    <div class="manage-controls  container-fluid gap-2 row row-cols-3 align-items-center justify-content-center">
      <div class="manage-ctrl pb-2 px-0  text-center border border-1 border-danger">
        <div class="ctrl-title p-2 text-bg-danger ">
          Manage Complaints
        </div>
        <div class="ctrl-body mt-2">
          <p>View and manage all complaints</p>
          <a href="manage_complaints.php" class="btn btn-danger">Go to complaints</a>
        </div>
      </div>
      <div class="manage-ctrl pb-2 px-0  text-center border border-1 border-danger">
        <div class="ctrl-title  p-2 text-bg-danger ">
          Manage Clearances
        </div>
        <div class="ctrl-body mt-2">
          <p>View and manage clearances</p>

          <a href="manage_clearances.php" class="btn btn-danger">Go to Clearances</a>
        </div>
      </div>

      <div class="manage-ctrl pb-2 px-0  text-center border border-1 border-danger">
        <div class="ctrl-title p-2 text-bg-danger ">
          Manage Certificates
        </div>
        <div class="ctrl-body mt-2">
          <p>View and manage Certificates</p>

          <a href="manage_certificates.php" class="btn btn-danger">Go to Certificates</a>
        </div>
      </div>
      <div class="manage-ctrl pb-2 px-0 text-center border border-1 border-danger">
        <div class="ctrl-title p-2 text-bg-danger ">
          Manage Community Tax
        </div>
        <div class="ctrl-body mt-2">
          <p>View and manage community tax records</p>

          <a href="manage_community_tax.php" class="btn btn-danger">Go to Community Tax</a>
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
  /* Sidebar active */
  .complaints {
    background: black !important;
    color: white !important;
  }

  .manage-ctrl {
    max-width: 18svw;
    transition: all 0.3s;
  }

  .manage-ctrl:hover {
    transform: translateY(-10px);
  }
</style>