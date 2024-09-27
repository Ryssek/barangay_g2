<?php require "includes/connection.php";

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}

$resident_namesSQL = "SELECT * FROM  residents";
$resident_names = $conn->query($resident_namesSQL);



$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $resident = $_POST['resident'];
  $certificate_type = $_POST['certificate_type'];
  $date_issued = $_POST['date_issued'];
  $valid_until = $_POST['valid_until'];
  $sql = "INSERT INTO `certificates`(`resident_name`, `certificate_type`, `date_issued`, `valid_until`) VALUES ('$resident', '$certificate_type', '$date_issued', '$valid_until')";
  if ($conn->query($sql)) {
    $msg = "Certificate Successfully Added!";
  } else {
    $msg = "An Error Occured!";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Certificate</title>
</head>

<body class="d-flex">
  <?php include "includes/sidebar.php" ?>
  <div class="min-vh-100 p-3" style="width: 83%">
    <div class="w-100">
      <div id="directory_link" class="p-3 rounded-4 bg-dark-subtle ">
        <a href="manage_com.php" class="text-danger text-decoration-none">Manage Request</a>
        <a href="manage_certificates.php" class="text-decoration-none text-danger">/ Manage Certificates</a>
        <a href="create_certificates.php" class="text-decoration-none text-black-50">/ Create Certificate</a>

      </div>
      <div class="mt-3 text-center">
        <h2 class="text-black-50"><?php echo $msg ?></h2>
      </div>
      <div class="d-flex align-items-center justify-content-between mt-3  gap-2 w-100">
        <h1 class="m-0 text-danger">Create Certificate</h1>
        <a href="manage_certificates.php" class="btn btn-danger">Go Back</a>
      </div>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="w-100" enctype="multipart/form-data">
        <div class="py-2 mb-3 mx-auto" style="border-bottom: 1px solid gray;">
          <input type="hidden" name="id">
        </div>
        <div class="row">
          <div class="my-2 col-12">
            <label for="resident" class="form-label">Resident Name: </label>
            <select class="form-select border-dark form-select " name="resident" id="resident" required>
              <?php
              if ($resident_names->num_rows > 0) {
                while ($row = $resident_names->fetch_assoc()) {
                  echo '<option value="' . $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'] . '">' . $row['first_name'] . ' ' . $row['middle_name'] . ' ' . $row['last_name'] . '</option>';
                }
              } else {
                echo "<option selected> You have no residents! </option>";
              }
              ?>
            </select>


          </div>
          <div class="mb-4 col-12">
            <label for="certificate_type" class="form-label">Certificate Type</label>
            <input type="text" class="form-control border-dark" name="certificate_type" id="certificate_type" placeholder="" required="true">
          </div>
          <div class="mb-4 col-12">
            <label for="date_issued" class="form-label">Date Issued</label>
            <input type="date" class="form-control border-dark" name="date_issued" id="date_issued" placeholder="" required="true">
          </div>
          <div class="mb-4 col-12">
            <label for="valid_until" class="form-label">Valid Until</label>
            <input type="date" class="form-control border-dark" name="valid_until" id="valid_until" placeholder="" required="true">
          </div>
          <div class="pt-3" style="border-top: 1px solid gray">
            <button type="submit" class="btn btn-primary">
              Create Certificate
            </button>
          </div>
      </form>
      <div class="text-center">
        <p>&copy; 2024 Barangay Cannery Information System</p>
      </div>

    </div>
  </div>
</body>

</html>

<style>
  /* Sidebar active */
  .complaints {
    background: black !important;
    color: white !important;
  }
</style>