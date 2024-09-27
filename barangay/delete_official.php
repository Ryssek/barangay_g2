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

$sql = "DELETE FROM officials WHERE id = $id";
$conn->query($sql);
if ($sql) {
  echo "<script>alert('Official Deleted');</script>";
  echo "<script>window.location.href='manage_off.php'</script>";
  exit();
} else {
  echo "<script>alert('Something Went Wrong. Please try again.');</script>";
  echo "<script>window.location.href='manage_off.php'</script>";
  exit();
}
