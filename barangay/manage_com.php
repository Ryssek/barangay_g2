<?php require "includes/connection.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Complaints</title>
</head>

<body class="d-flex">
  <?php include "includes/sidebar.php" ?>

  <div class="min-vh-100 p-3" style="width: 83%">
    <h1 class="text-danger">Manage Complaints/Requests</h1>
    <p>This is where you can manage various complaints and requests</p>

    <div class="manage-controls container-fluid gap-3 row align-items-center justify-content-center">
      <div class="manage-ctrl pb-2 px-0 w-100 text-center col-md-4 border border-1 border-danger">
        <div class="ctrl-title w-100 p-2 text-bg-danger ">
          Manage Complaints
        </div>
        <div class="ctrl-body mt-2">
          <p>View and manage all complaints</p>

          <a href="manage_complaints.php" class="btn btn-danger">Go to complaints</a>
        </div>
      </div>
      <div class="manage-ctrl pb-2 px-0 w-100 text-center col-md-4 border border-1 border-danger">
        <div class="ctrl-title w-100 p-2 text-bg-danger ">
          Manage Clearances
        </div>
        <div class="ctrl-body mt-2">
          <p>View and manage clearances</p>

          <a href="clearances.php" class="btn btn-danger">Go to Clearances</a>
        </div>
      </div>

      <div class="manage-ctrl pb-2 px-0 w-100 text-center col-md-4 border border-1 border-danger">
        <div class="ctrl-title w-100 p-2 text-bg-danger ">
          Manage
        </div>
        <div class="ctrl-body mt-2">
          <p>View and manage Certificates</p>

          <a href="certificates.php" class="btn btn-danger">Go to Certificates</a>
        </div>
      </div>
      <div class="manage-ctrl pb-2 px-0 w-100 text-center col-md-4 border border-1 border-danger">
        <div class="ctrl-title w-100 p-2 text-bg-danger ">
          Manage
        </div>
        <div class="ctrl-body mt-2">
          <p>View and manage Certificates</p>

          <a href="community_tax.php" class="btn btn-danger">Go to Certificates</a>
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
    max-width: 17svw;
    transition: all 0.3s;
  }

  .manage-ctrl:hover {
    transform: translateY(-10px);
  }
</style>