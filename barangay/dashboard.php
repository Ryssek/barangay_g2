<?php require 'connection.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>
</head>

<body class="d-flex">

    <!-- Sidebar -->
    <div class="min-vh-100  d-flex flex-column" style="border-right: 3px solid green; width: 17%; position:fixed; ">
        <div class=" d-flex min-vh-100 text-bg-dark flex-column align-items-center justify-content-center" id="sidebar">
            <div id="logo" class="w-100 text-center h-100">
                <img src="file.png" alt="logo" class="logo-img">
                <h2>Brgy.</h2>
            </div>
            <div id="sidebar-buttons" class="w-100 mt-2">
                <a href="" class="btn sidebar-btn py-3  w-100 ">Dashboard</a>
                <a href="" class="btn sidebar-btn py-3 w-100 ">Manage Residents</a>
                <a href="" class="btn sidebar-btn py-3 w-100 ">Manage Complaints</a>
                <a href="" class="btn sidebar-btn py-3 w-100 ">Manage Officials</a>
                <a href="" class="btn sidebar-btn py-3 w-100 ">View Reports</a>
                <div class="text-center mt-4" style="border: none;">
                    <a href="logout.php" class="btn text-bg-danger sidebar-btn ">Log
                        out</a>
                </div>
            </div>

        </div>
    </div>

    <div class=" min-vh-100" style="width: 17%">
    </div>

    <div class="min-vh-100 " style="width: 50%">
        <div class="container-fluid d-flex flex-column align-items-center  justify-content-center">
            <div id="title" class="py-3">
                <div class="text-center">
                    <h1 class="display-4">Welcome Admin!</h1>
                    <h2 class="display-5">Barangay - Information System</h2>
                </div>
            </div>
            <div id="dashboard-contents" class=" container-md w-100 d-flex align-items-center justify-content-center "
                style="min-height: 73svh;">

                <div class="align-items-center justify-content-center  row row-cols-3 h-100 ">
                    <div class="dashboard-content border border-2 border-dark py-3 text-center mb-3  col">
                        <p>Total Households</p>
                        <P>0</P>
                    </div>
                    <div class="dashboard-content border border-2 border-dark py-3 text-center mb-3 col">
                        <p>Total Population</p>
                        <P>0</P>
                    </div>
                    <div class="dashboard-content border border-2 border-dark py-3 text-center mb-3 col">
                        <p>Male</p>
                        <P>0</P>
                    </div>
                    <div class="dashboard-content border border-2 border-dark py-3 text-center mb-3 col">
                        <p>Female</p>
                        <P>0</P>
                    </div>
                    <div class="dashboard-content border border-2 border-dark py-3 text-center mb-3 col">
                        <p>Children</p>
                        <P>0</P>
                    </div>
                    <div class="dashboard-content border border-2 border-dark py-3 text-center mb-3 col">
                        <p>Senior</p>
                        <P>0</P>
                    </div>
                    <div class="dashboard-content border border-2 border-dark py-3 text-center mb-3 col">
                        <p>PWD</p>
                        <P>0</P>
                    </div>
                    <div class="dashboard-content border border-2 border-dark py-3 text-center mb-3 col">
                        <p>Voters</p>
                        <P>0</P>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="" style="width: 33%"></div>
    <div class="  d-flex flex-column"
        style="height: 100svh;border-right: 3px solid green; width: 33%; position:fixed; top: 0; right: 0; bottom: 0; overflow-y: scroll;">
        <div class="d-flex  flex-column align-items-center justify-content-center" id="barangay_officials">
            <div class="my-3">
                <h5 class="display-4">Barangay Officials</h5>
            </div>

            <div class="brgy-official card mb-5" style="width: 75%">
                <div class="card-header text-center border-0 bg-light">
                    <div id="logo" class="w-50 text-center h-100 mx-auto">
                        <img src="icon.png" alt="logo" class="logo-img">
                    </div>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">Happy Person</h5>
                    <p class="card-text">Age: 34</p>
                    <p class="card-text">Position: Captain</p>

                </div>
            </div>
            <div class="brgy-official card mb-5" style="width: 75%">
                <div class="card-header text-center border-0 bg-light">
                    <div id="logo" class="w-50 text-center h-100 mx-auto">
                        <img src="icon.png" alt="logo" class="logo-img">
                    </div>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">Happy Person</h5>
                    <p class="card-text">Age: 34</p>
                    <p class="card-text">Age: 34</p>

                </div>
            </div>
            <div class="brgy-official card mb-5" style="width: 75%">
                <div class="card-header text-center border-0 bg-light">
                    <div id="logo" class="w-50 text-center h-100 mx-auto">
                        <img src="icon.png" alt="logo" class="logo-img">
                    </div>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">Happy Person</h5>
                    <p class="card-text">Age: 34</p>
                    <p class="card-text">Age: 34</p>

                </div>
            </div>
            <div class="brgy-official card mb-5" style="width: 75%">
                <div class="card-header text-center border-0 bg-light">
                    <div id="logo" class="w-50 text-center h-100 mx-auto">
                        <img src="icon.png" alt="logo" class="logo-img">
                    </div>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">Happy Person</h5>
                    <p class="card-text">Age: 34</p>
                    <p class="card-text">Age: 34</p>

                </div>
            </div>

        </div>
    </div>
</body>

</html>
<style>
    #logo {
        height: 15svh;
    }

    .sidebar-btn.btn {
        color: white
    }

    .brgy-official .card-header {
        background-color: white !important;
    }


    .dashboard-content {
        width: 30%;
        margin-right: 1rem;
    }

    .dashboard-content p {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .sidebar-btn {
        background: none;
        font-size: 1.2rem;
    }

    .sidebar-btn:hover {
        border: 1px solid gray;
    }



    .logo-img {
        width: 60%;
    }
</style>