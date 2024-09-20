<?php require 'includes/connection.php' ?>

<?php

$id = isset($_GET['id']) ? $_GET['id'] : null;
if (!$id) {
  die("Invalid ID");
}

$sql = "DELETE FROM residents WHERE id = $id";
$conn->query($sql);

header("Location: search_residents.php");
exit();
