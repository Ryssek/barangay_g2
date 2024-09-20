<?php require "includes/connection.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Complaints</title>
</head>

<body class="d-flex">
    <?php include "includes/sidebar.php" ?>

    <div class="min-vh-100 p-3" style="width: 83%">
        <h1 class="text-danger">Manage Complaints</h1>
        <p>This is where you can manage complaints</p>

        <div class="manage-controls container-fluid gap-3 row align-items-center justify-content-center">
            <div class="manage-ctrl pb-2 px-0 w-100 text-center col-md-4 border border-1 border-danger">
                <div class="ctrl-title w-100 p-2 text-bg-danger ">
                    View Complaints
                </div>
                <div class="ctrl-body mt-2">
                    <p>See the list of all registered residents</p>

                    <a href="residents_list.php" class="btn btn-danger">Go to Complaints List</a>
                </div>
            </div>
            <div class="manage-ctrl pb-2 px-0 w-100 text-center col-md-4 border border-1 border-danger">
                <div class="ctrl-title w-100 p-2 text-bg-danger ">
                    Search Complaints
                </div>
                <div class="ctrl-body mt-2">
                    <p>Searh for the individual residents and edit their details</p>

                    <a href="search_residents.php" class="btn btn-danger">Search Complaints</a>
                </div>
            </div>

            <div class="manage-ctrl pb-2 px-0 w-100 text-center col-md-4 border border-1 border-danger">
                <div class="ctrl-title w-100 p-2 text-bg-danger ">
                    Add New Complaint
                </div>
                <div class="ctrl-body mt-2">
                    <p>Add a new resident with step by step guidance</p>

                    <a href="create_resident.php" class="btn btn-danger"></a>
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