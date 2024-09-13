<?php require 'connection.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Mobile Legends</title>
</head>

<body class="d-flex">
    <div class="min-vh-100 d-flex flex-column align-items-center justify-content-start" id="sidebar"
        style="border-right: 3px solid gray; width: 15%">
        <div id="logo" class=" w-100 text-center">
            <img src="image.png" alt="logo" class="logo-img">
        </div>
    </div>

    <div class="min-vh-100 bg-dark" style="width: 85%"></div>
</body>

</html>
<style>
    #logo {
        height: 15svh;
    }

    .logo-img {
        width: 50%;
    }
</style>