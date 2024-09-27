<?php require "includes/connection.php";

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];
  $resident = $_POST['resident'];
  $certificate_type = $_POST['certificate_type'];
  $date_issued = $_POST['date_issued'];
  $valid_until = $_POST['valid_until'];


  $sql = "UPDATE `certificates` SET `resident_name` = '$resident', `certificate_type` = '$certificate_type', `date_issued` = '$date_issued', `valid_until` = '$valid_until' WHERE `certificates`.`id` = $id";

  $conn->query($sql);
  header("Location: view_certificates.php");
}


$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!isset($id)) {
  die("Invalid id!");
}

$sql = "SELECT * FROM certificates WHERE id=$id";

$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Certificate Details</title>
</head>

<body class="d-flex">
  <?php include "includes/sidebar.php" ?>
  <div class="min-vh-100 p-3" style="width: 83%">
    <div class="w-100">
      <div id="directory_link" class="p-3 rounded-4 bg-dark-subtle ">
        <a href="manage_com.php" class="text-danger text-decoration-none">Manage Request</a>
        <a href="manage_certificates.php" class="text-decoration-none text-danger">/ Manage Certificates</a>
        <a href="update_certificate.php" class="text-decoration-none text-black-50">/ Update Certificate</a>

      </div>
      <div class="d-flex align-items-center justify-content-between  gap-2 w-100">

        <h1 class="m-0 text-danger">Update Certificate Details</h1>
        <a href="manage_certificates.php" class="btn btn-danger">Go Back</a>
      </div>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="w-100" enctype="multipart/form-data">
        <div class="py-2 my-3 mx-auto" style="border-bottom: 1px solid gray;">
          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        </div>
        <div class="row">
          <div class="my-2 col-12">
            <label for="resident" class="form-label">Resident Name: </label>
            <select class="form-select border-dark form-select " name="resident" id="resident" required>
              <?php

              $resident_namesSQL = "SELECT * FROM  residents";
              $resident_names = $conn->query($resident_namesSQL);
              if (isset($row['resident_name'])) {
                echo "<option value='{$row['resident_name']}' selected> {$row['resident_name']} </option>";
              }

              if ($resident_names->num_rows > 0) {
                while ($row2 = $resident_names->fetch_assoc()) {

                  echo "<option value='{$row2['first_name']} {$row2['middle_name']} {$row2['last_name']}'>{$row2['first_name']} {$row2['middle_name']} {$row2['last_name']} </option>";


                  // echo (isset($row2['resident_name']) ? '<option value="' . $row2['resident_name'] . ' "selected>' : '<option value="' . $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'] . '">' . $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'] . '</option>');
                }
              } else {
                echo "<option selected> You have no residents! </option>";
              }
              ?>
            </select>


          </div>
          <div class="mb-4 col-12">
            <label for="certificate_type" class="form-label">Certificate Type</label>
            <input type="text" class="form-control border-dark" name="certificate_type" id="certificate_type" placeholder="" required="true" value="<?php echo $row['certificate_type']; ?>" />
          </div>
          <div class="mb-4 col-12">
            <label for="date_issued" class="form-label">Date Issued</label>
            <input type="date" class="form-control border-dark" name="date_issued" id="date_issued" placeholder="" required="true" value="<?php echo $row['date_issued']; ?>" />
          </div>
          <div class="mb-4 col-12">
            <label for="valid_until" class="form-label">Date Issued</label>
            <input type="date" class="form-control border-dark" name="valid_until" id="valid_until" placeholder="" required="true" value="<?php echo $row['valid_until']; ?>" />
          </div>



          <div class="pt-3" style="border-top: 1px solid gray">
            <button type="submit" class="btn btn-primary">
              Update
            </button>
            <a class="btn btn-danger" onclick='return aler()' href="delete_certificate.php?id=<?php echo $row['id'] ?>" role="button">Delete Certificate</a>
          </div>
        </div>
      </form>
      <div class="text-center">
        <p>&copy; 2024 Barangay Cannery Information System</p>
      </div>

    </div>
  </div>
</body>

<script>
  function aler() {
    return confirm("Are you sure you want to delete this certificate?");
  }
</script>

</html>

<style>
  /* Sidebar active */
  .complaints {
    background: black !important;
    color: white !important;
  }
</style>