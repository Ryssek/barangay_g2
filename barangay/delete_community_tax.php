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

$sql = "DELETE FROM community_tax WHERE id = $id";
$conn->query($sql);
if ($sql) {
  echo "<script>alert('Community Tax Deleted');</script>";
  echo "<script>window.location.href='view_community_tax.php'</script>";
} else {
  echo "<script>alert('Something Went Wrong. Please try again.');</script>";
  echo "<script>window.location.href='view_community_tax.php'</script>";
}
