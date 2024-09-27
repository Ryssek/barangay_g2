<?php require "includes/connection.php" ?>

<?php
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}

$msg = null;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_GET['id'];
  $resident = $_POST['resident'];
  $complaint_type = $_POST['complaint_type'];
  $description = $_POST['description'];
  $status = $_POST['status'];
  $description = trim($description);


  $sql = "UPDATE `complaints` SET `resident_name` = '$resident', `complaint_type` = '$complaint_type', `description` = '$description', `status` = '$status' WHERE `complaints`.`com_id` = $id";

  $conn->query($sql);
  header("Location: complaints_list.php");
}

$id = isset($_GET['id']) ? $_GET['id'] : null;
if (!$id) {
  die("Invalid ID");
}
$resident_namesSQL = "SELECT * FROM residents";
$resident_names = $conn->query($resident_namesSQL);

$sql2 = "SELECT * FROM complaints WHERE com_id=$id";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Complaint</title>
</head>

<body class="d-flex">
  <?php include "includes/sidebar.php" ?>
  <div class="min-vh-100 p-3" style="width: 83%">
    <div class="d-flex flex-column align-items-center justify-content-center container-md">
      <form action="" method="post" class="w-100" enctype="multipart/form-data">
        <div id="directory_link" class="p-3 rounded-4 mt-3 bg-dark-subtle ">
          <a href="manage_com.php" class="text-danger text-decoration-none">Manage Request /</a>
          <a href="manage_complaints.php" class="text-danger text-decoration-none">Manage Complaints</a>
          <a href="update_complaints.php" class="text-decoration-none text-black-50">/ Update Complaint</a>
        </div>
        <div class="text-center text-danger mt-3">
          <h2><?php echo $msg ?></h2>
        </div>
        <div class="py-2 mx-auto d-flex align-items-center my-2 justify-content-between" style="border-bottom: 1px solid gray;">
          <h2 class="text-danger">Update Complaints</h2>
          <a href="manage_complaints.php" class="btn btn-danger">Go Back</a>
        </div>
        <div class="row">
          <div class="my-2 col-md-4 ">
            <div class="d-flex align-items-center gap-2">
              <label for="resident" class="form-label">Resident: </label>
              <select class="form-select form-select-sm" name="resident" id="resident" required>
                <?php
                if (isset($row2['resident_name'])) {
                  echo "<option value='{$row2['resident_name']}' selected> {$row2['resident_name']} </option>";
                }
                if ($resident_names->num_rows > 0) {
                  while ($row = $resident_names->fetch_assoc()) {
                    echo "<option value='{$row['first_name']} {$row['middle_name']} {$row['last_name']}'>{$row['first_name']} {$row['middle_name']} {$row['last_name']} </option>";
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
            <input value="<?php echo $row2['complaint_type'] ?>" type="text" class="form-control" name="complaint_type" id="complaint_type" required />
          </div>
          <div class="mb-2 ">

            <label for="desciption" class="form-label">Description</label>
            <textarea class="form-control border-1 border-dark" name="description" id="description" rows="3" required></textarea>

          </div>
          <div class="mb-2 ">
            <label for="status" class="form-label">Status</label>
            <select class="form-select border-dark form-select" name="status" id="status">
              <?php echo ($row2['status'] == "Pending") ? "<option value='Pending' selected>Pending</option> <option value='Completed'>Completed</option>" : "<option value='Pending'>Pending</option> <option value='Completed' selected>Completed</option>"; ?>
            </select>
          </div>

          <div class="col-3 mb-2 d-flex align-items-center w-100">
            <button name="submit" type="submit" class="btn me-2 btn-primary">
              Submit Complaint
            </button>
            <a class="btn btn-danger" onclick='return aler()' href="delete_complaint.php?id=<?php echo $row2['com_id'] ?>" role="button">Delete Complaint</a>
          </div>
      </form>
      <div class="text-center">
        <p>&copy; 2024 Barangay Cannery Information System</p>
      </div>
    </div>
  </div>

  <script>
    const desc = document.querySelector('#description');
    desc.value = "<?php echo "{$row2["description"]}" ?>"

    function aler() {
      return confirm("Are you sure you want to delete this complaint?");
    }
  </script>

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