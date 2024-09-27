<?php require "includes/connection.php" ?>

<?php
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}

$msg = null;

$resident_namesSQL = "SELECT * FROM  residents";
$resident_names = $conn->query($resident_namesSQL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $resident = $_POST['resident'];
  $complaint_type = $_POST['complaint_type'];
  $description = trim($_POST['description']);
  if ($resident == "--Select one--") {
    $msg = "You must select a valid resident!";
    echo "<style> #resident {border: 2px solid var(--bs-danger) !important} </style>";
  } else {
    $sql = "INSERT INTO `complaints`(`resident_name`, `complaint_type`, `description`) VALUES ('$resident', '$complaint_type', '$description')";
    $conn->query($sql);
    $msg = "COMPLAINT SUCCESSFULLY ADDED!";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Complaints</title>
</head>

<body class="d-flex">
  <?php include "includes/sidebar.php" ?>
  <div class="min-vh-100 p-3" style="width: 83%">
    <div class="h-100  d-flex flex-column align-items-center justify-content-center container-md">
      <form action="" method="post" class="w-100" enctype="multipart/form-data">
        <div id="directory_link" class="p-3 rounded-4 mt-3 bg-dark-subtle ">
          <a href="manage_com.php" class="text-danger text-decoration-none">Manage Request /</a>
          <a href="manage_complaints.php" class="text-danger text-decoration-none">Manage Complaints</a>
          <a href="create_complaints.php" class="text-decoration-none text-black-50">/ Create Complaints</a>
        </div>
        <div class="text-center text-danger mt-3">
          <h2><?php echo $msg ?></h2>
        </div>
        <div class="py-2 mx-auto d-flex align-items-center my-2 justify-content-between" style="border-bottom: 1px solid gray;">
          <h2 class="text-danger">Create New Complaints</h2>
          <a href="manage_complaints.php" class="btn btn-danger">Go Back</a>
        </div>
        <div class="row">
          <div class="my-2 col-md-4 ">
            <div class="d-flex align-items-center gap-2">
              <label for="resident" class="form-label">Resident: </label>
              <select class="form-select form-select-sm" name="resident" id="resident" required>
                <option selected>--Select one--</option>
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

          </div>
          <div class="mb-2 ">
            <label for="complaint_type" class="form-label">Complaint Type</label>
            <input type="text" class="form-control" name="complaint_type" id="complaint_type" required />
          </div>
          <div class="mb-2 ">

            <label for="desciption" class="form-label">Description</label>
            <textarea class="form-control border-1 border-dark" name="description" id="description" rows="3" required></textarea>

          </div>
          <div class="col-3 mb-2">
            <button name="submit" type="submit" class="btn  btn-primary">
              Submit Complaint
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

  body {
    min-height: 100svh;
  }

  div label {
    font-weight: 500 !important;
  }

  input,
  select {
    border: 1px solid black !important;
  }
</style>