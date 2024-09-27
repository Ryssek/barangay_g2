<?php require 'includes/connection.php' ?>

<?php

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Total Households
$totalHouseholdsQuery = "SELECT COUNT(DISTINCT CONCAT(purok, '-', lot)) as total_households FROM residents";
$totalHouseholdsResult = mysqli_query($conn, $totalHouseholdsQuery);
$totalHouseholds = mysqli_fetch_assoc($totalHouseholdsResult)['total_households'];

// Total Population 
$totalPopulationQuery = "SELECT COUNT(id) as total_population FROM residents";
$totalPopulationResult = mysqli_query($conn, $totalPopulationQuery);
$totalPopulation = mysqli_fetch_assoc($totalPopulationResult)['total_population'] ?? 0;

// Total Males
$totalMalesQuery = "SELECT COUNT(id) as total_males FROM residents WHERE gender='Male'";
$totalMalesResult = mysqli_query($conn, $totalMalesQuery);
$totalMales = mysqli_fetch_assoc($totalMalesResult)['total_males'];

// Total Females
$totalFemalesQuery = "SELECT COUNT(id) as total_females FROM residents WHERE gender='Female'";
$totalFemalesResult = mysqli_query($conn, $totalFemalesQuery);
$totalFemales = mysqli_fetch_assoc($totalFemalesResult)['total_females'];

// Total Children (under 18)
$totalChildrenQuery = "SELECT COUNT(id) as total_children FROM residents WHERE TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) < 18";
$totalChildrenResult = mysqli_query($conn, $totalChildrenQuery);
$totalChildren = mysqli_fetch_assoc($totalChildrenResult)['total_children'];

// Total Seniors (60+)
$totalSeniorsQuery = "SELECT COUNT(id) as total_Seniors FROM residents WHERE TIMESTAMPDIFF(YEAR, birth_date, CURDATE()) >= 60";
$totalSeniorsResult = mysqli_query($conn, $totalSeniorsQuery);
$totalSeniors = mysqli_fetch_assoc($totalSeniorsResult)['total_Seniors'];


// Total PWDs
$totalVotersQuery = "SELECT * FROM residents WHERE voter_status=1";
$totalVotersResult = mysqli_query($conn, $totalVotersQuery);

// Total PWDs
$totalPWDsQuery = "SELECT * FROM residents WHERE PWD=1";
$totalPWDsResult = mysqli_query($conn, $totalPWDsQuery);

// Officals
$officialsQuery = "SELECT * ,timestampdiff(year, birth_date, curdate()) as currentAge FROM officials";
$officialsResult = $conn->query($officialsQuery);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>
</head>

<body class="d-flex">

    <?php include "includes/sidebar.php" ?>

    <div class="min-vh-100 " style="width: 50%">
        <div class="d-flex container-md flex-column align-items-center justify-content-center">
            <div id="title" class="my-2">
                <div class="text-center">
                    <h1 class="text-danger display-2">WELCOME ADMIN!</h1>
                    <h2 class="">Barangay - Information System</h2>
                </div>
            </div>
            <div id="dashboard-contents" class=" container-md w-100 d-flex align-items-center justify-content-center " style="min-height: 73svh;">

                <div class="align-items-center justify-content-center  row row-cols-3 h-100 ">
                    <div class="dashboard-content rounded-3 border border-2 border-dark-subtle py-3 text-center mb-3  col">
                        <p class="card-name">Total Households</p>
                        <P class="fs-2"><?php echo $totalHouseholds ?></P>
                    </div>
                    <div class="dashboard-content rounded-3 border border-2 border-dark-subtle py-3 text-center mb-3 col">
                        <p class="card-name">Total Population</p>
                        <P class="fs-2"><?php echo $totalPopulation ?></P>
                    </div>
                    <div class="dashboard-content rounded-3 border border-2 border-dark-subtle py-3 text-center mb-3 col">
                        <p class="card-name">Male</p>
                        <P class="fs-2"><?php echo $totalMales; ?></P>
                    </div>
                    <div class="dashboard-content rounded-3 border border-2 border-dark-subtle py-3 text-center mb-3 col">
                        <p class="card-name">Female</p>
                        <P class="fs-2"><?php echo $totalFemales; ?></P>
                    </div>
                    <div class="dashboard-content rounded-3 border border-2 border-dark-subtle py-3 text-center mb-3 col">
                        <p class="card-name">Children</p>
                        <P class="fs-2"><?php echo $totalChildren; ?></P>
                    </div>
                    <div class="dashboard-content rounded-3 border border-2 border-dark-subtle py-3 text-center mb-3 col">
                        <p class="card-name">Senior</p>
                        <P class="fs-2"><?php echo $totalSeniors; ?></P>
                    </div>
                    <div class="dashboard-content rounded-3 border border-2 border-dark-subtle py-3 text-center mb-3 col">
                        <p class="card-name">PWD</p>
                        <P class="fs-2"><?php echo $totalPWDsResult->num_rows ?></P>
                    </div>
                    <div class="dashboard-content rounded-3 border border-2 border-dark-subtle py-3 text-center mb-3 col">
                        <p class="card-name">Voters</p>
                        <P class="fs-2"><?php echo $totalVotersResult->num_rows ?></P>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="" style="width: 33%"></div>
    <div class="d-flex flex-column shadow px-2" style="height: 100svh;border-right: 3px solid green; width: 33%; position:fixed; top: 0; right: 0; bottom: 0; overflow-y: scroll;" id="barangay_officials_container">
        <div class="d-flex flex-column align-items-center justify-content-center" id="barangay_officials">
            <div class="my-3">
                <h5 class="display-5 text-danger">Barangay Officials</h5>
            </div>
            <?php
            if ($officialsResult->num_rows > 0) {
                while ($officialsRow = $officialsResult->fetch_assoc()) {
                    echo "<div id='official-card' class='card shadow mb-5 text-center text-bg-body rounded' style='width:20rem;'>
                    <div class='card-body'>
                    <div id='official-cover' class='w-100 border-dark-subtle border border-2 bg-light' style='height: 150px; background: url(uploads/cover.jpg) no-repeat center center/cover; '></div>
                    <div class='mx-auto mb-2 rounded-circle overflow-hidden' alt='Official's Image' id='official-img' style=' background: url({$officialsRow['photo']}) no-repeat center center/cover;'>
                    </div>
                    <h5 class='card-title'>{$officialsRow['name']}</h5>
                    <p class='card-text'>Age: {$officialsRow['currentAge']}</p>
                    <p class='card-text'>Position: {$officialsRow['position']}</p>
                </div>
            </div>";
                }
            }
            ?>



        </div>
    </div>
</body>

</html>
<style>
    /* Sidebar active */
    .dashboard {
        background: black !important;
        color: white !important;
    }

    .card-name {
        color: var(--bs-danger)
    }

    .card-text {
        font-size: 1.2rem !important;
        margin: 0 !important;
        margin-top: 5px !important;
    }

    #official-img {
        width: 150px !important;
        height: 150px !important;
        position: relative;
        border: 5px solid #fff !important;
        margin-top: -80px;
        transition: all 0.7s;
    }

    #official-card {
        transition: all 0.7s;
    }

    #official-card:hover {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5) !important
    }

    #official-img:hover {
        border: 5px solid var(--bs-primary) !important;
    }

    #official-cover {
        border-top-left-radius: 15px !important;
        border-top-right-radius: 15px !important;
    }

    .brgy-official .card-header {
        background-color: white !important;
    }

    .brgy-official {
        cursor: default;
        border: 2px solid gray !important;
        transition: all 0.3s;
    }

    .brgy-official:hover {
        transform: translateY(-10px);
    }

    .brgy-official:hover #official-img {
        border: 5px solid black !important;
    }

    .dashboard-content {
        width: 30%;
        background-color: white;
        box-shadow: 0 0 7px rgba(0, 0, 0, 0.5) !important;
        margin-right: 1rem;
    }

    .dashboard-content p {
        font-size: 1.2rem;
        font-weight: bold;
        cursor: default
    }
</style>