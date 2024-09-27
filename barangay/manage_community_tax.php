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
  <title>Manage Community Tax</title>
</head>

<body class="d-flex">
  <?php include "includes/sidebar.php" ?>

  <div class="min-vh-100 p-3" style="width: 83%">
    <div id="directory_link" class="p-3 rounded-4 bg-dark-subtle ">
      <a href="manage_com.php" class="text-danger text-decoration-none">Manage Request</a>
      <a href="manage_community_tax.php" class="text-decoration-none text-black-50">/ Manage Community Tax</a>
    </div>
    <h1 class="text-danger">Manage Community Tax</h1>
    <p>This is where you can manage community tax records</p>

    <div class="manage-controls container-fluid gap-3 row align-items-center justify-content-center">
      <div class="manage-ctrl pb-2 px-0 w-100 text-center col-md-4 border border-1 border-danger">
        <div class="ctrl-title w-100 p-2 text-bg-danger ">
          View Community Tax
        </div>
        <div class="ctrl-body mt-2">
          <p>See the list off all community tax records</p>
          <a href="view_community_tax.php" class="btn btn-danger">Go to Community Tax List</a>
        </div>
      </div>
      <div class="manage-ctrl pb-2 px-0 w-100 text-center col-md-4 border border-1 border-danger">
        <div class="ctrl-title w-100 p-2 text-bg-danger ">
          Search Community Tax
        </div>
        <div class="ctrl-body mt-2">
          <p>Searh for specific Community Tax records</p>

          <a href="search_community_tax.php" class="btn btn-danger">Search Community Tax</a>
        </div>
      </div>

      <div class="manage-ctrl pb-2 px-0 w-100 text-center col-md-4 border border-1 border-danger">
        <div class="ctrl-title w-100 p-2 text-bg-danger ">
          Add Community Tax
        </div>
        <div class="ctrl-body mt-2">
          <p>Add a new certificate for a resident</p>

          <a href="create_community_tax.php" class="btn btn-danger">Create Community Tax</a>
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
    max-width: 25svw;
    transition: all 0.3s;
  }

  .manage-ctrl:hover {
    transform: translateY(-10px);
  }
</style>