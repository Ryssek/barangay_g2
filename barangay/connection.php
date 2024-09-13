<?php

echo '<link rel="stylesheet" href="bootstrap.min.css">', '
<script src="bootstrap.bundle.min.js"></script>';

$conn = mysqli_connect("localhost", "root", "", "g2_barangay");
if (mysqli_connect_errno()) {
    echo "Connection Fail" . mysqli_connect_error();
}

session_start();

?>