<?php require "includes/connection.php";
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}
$msg = "";
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $birth_date = $_POST['birth_date'];
  $position = $_POST['position'];
  $term_start = $_POST['term_start'];
  $term_end = $_POST['term_end'];

  if ($_FILES['photo']['size'] > 0) {
    $old_photo_path = $row["photo_path"];
    unlink($old_photo_path);

    $photo_path = 'uploads/' . $_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path);

    $sql = "UPDATE `officials` SET `name`='$name',`birth_date`='$birth_date',`position`='$position',`term_start`='$term_start',`term_end`='$term_end',`photo`='$photo_path' WHERE id=$id";
  } else {
    $sql = "UPDATE `officials` SET `name`='$name',`birth_date`='$birth_date',`position`='$position',`term_start`='$term_start',`term_end`='$term_end' WHERE id=$id";
  }

  $conn->query($sql);
  header("Location: manage_off.php");
}

if (!$id) {
  die("Invalid ID");
}

$sql = "SELECT * FROM officials WHERE id= $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Official</title>
</head>

<body class="d-flex">
  <?php include "includes/sidebar.php" ?>
  <div class="min-vh-100 p-3" style="width: 83%">
    <div class="w-100">
      <div id="directory_link" class="p-3 rounded-4 bg-dark-subtle ">
        <a href="manage_off.php" class="text-danger text-decoration-none">Manage Officials</a>
        <a href="update_official.php" class="text-decoration-none text-black-50">/ Update Official</a>

      </div>
      <div class="mt-3 text-center">
        <h2 class="text-black-50"><?php echo $msg ?></h2>
      </div>
      <div class="d-flex align-items-center justify-content-between mt-3  gap-2 w-100">
        <h1 class="m-0 text-danger">Update Official</h1>
        <a href="manage_off.php" class="btn btn-danger">Go Back</a>
      </div>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="w-100" enctype="multipart/form-data">
        <div class="py-2 mb-3 mx-auto" style="border-bottom: 1px solid gray;">
          <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        </div>
        <div class="row">
          <div class="my-2 col-12">
            <label for="name" class="form-label">Name: </label>
            <input type="text" class="form-control border-dark" name="name" id="name" placeholder="Official Name..." required="true" value="<?php echo $row['name'] ?>">
          </div>
          <div class="mb-4 col-6">
            <label for="birth_date" class="form-label">Birth Date: </label>
            <input type="date" class="form-control border-dark" name="birth_date" id="birth_date" placeholder="" required="true" value="<?php echo $row['birth_date'] ?>">
          </div>
          <div class="mb-4 col-6">
            <label for="position" class="form-label">Position</label>
            <input type="text" class="form-control border-dark" name="position" id="position" placeholder="Official's Position..." required="true" value="<?php echo $row['position'] ?>">
          </div>
          <div class="mb-4 col-6">
            <label for="term_start" class="form-label">Term Start: </label>
            <input type="date" class="form-control border-dark" name="term_start" id="term_start" placeholder="" required="true" value="<?php echo $row['term_start'] ?>">
          </div>
          <div class="mb-4 col-6">
            <label for="term_end" class="form-label">Term End: </label>
            <input type="date" class="form-control border-dark" name="term_end" id="term_end" placeholder="" required="true" value="<?php echo $row['term_end'] ?>">
          </div>
          <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input class="form-control border-dark-subtle " accept="image/*" type="file" name="photo" id="photo" onchange="showPreview(event);">
            <div class="preview mt-2 d-none">
              <p class="fw-bold">Preview: </p>
              <img width="100" id="photo_preview">
            </div>
          </div>
        </div>
        <div class="pt-3" style="border-top: 1px solid gray">
          <button type="submit" class="btn btn-primary">
            Update Official
          </button>
        </div>
      </form>
      <div class="text-center">
        <p>&copy; 2024 Barangay Cannery Information System</p>
      </div>

    </div>
  </div>

  <script>
    function showPreview() {
      if (event.target.files.length > 0) {
        var src = URL.createObjectURL(event.target.files[0]);
        var preview = document.querySelector(".preview");
        var previewPic = document.getElementById("photo_preview");
        preview.classList.remove("d-none")
        previewPic.src = src;
      }
    }
  </script>

</body>

</html>

<style>
  /* Sidebar active */
  .official {
    background: black !important;
    color: white !important;
  }
</style>