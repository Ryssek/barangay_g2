<?php require 'includes/connection.php' ?>

<?php

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}

$id = isset($_GET['id']) ? $_GET['id'] : null;
if (!$id) {
  die("Invalid ID");
}

$sql = "DELETE FROM complaints WHERE com_id = $id";
$conn->query($sql);
if ($sql) {
  echo "<script>alert('Complaint Deleted');</script>";
  echo "<script>window.location.href='complaints_list.php'</script>";
  exit();
} else {
  echo "<script>alert('Something Went Wrong. Please try again.');</script>";
  echo "<script>window.location.href='complaints_list.php'</script>";
  exit();
}
