<?php
echo '<link rel="stylesheet" href="css/bootstrap.min.css">', '  <link rel="shortcut icon" href="file.png" type="image/x-icon">', '
<script src="js/bootstrap.bundle.min.js"></script>', '<style>body {background: #F2F3F4 !important }</style>';
session_start();
$dbServerName = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "g2_barangay";
$conn = new mysqli($dbServerName, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Connection failed!" . $conn->connect_error);
}
