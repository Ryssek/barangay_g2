<?php include "connection.php";

session_destroy();
session_unset();
header("location:index.php");
