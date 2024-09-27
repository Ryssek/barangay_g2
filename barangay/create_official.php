<?php require "includes/connection.php";

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}

$resident_namesSQL = "SELECT * FROM  residents";
$resident_names = $conn->query($resident_namesSQL);

$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $birth_date = $_POST['birth_date'];
  $position = $_POST['position'];
  $term_start = $_POST['term_start'];
  $term_end = $_POST['term_end'];
  $photo = $_POST['photo'];
  if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
    $photo_name = $_FILES["photo"]["name"];
    $photo_tmp = $_FILES["photo"]["tmp_name"];
    $photo_path = "uploads/" . $photo_name;

    if (move_uploaded_file($photo_tmp, $photo_path)) {
      $sql = "INSERT INTO `officials`(`name`, `birth_date`, `position`, `term_start`, `term_end`, `photo`) VALUES ('$name','$birth_date','$position','$term_start','$term_end','$photo_path')";

      if ($conn->query($sql)) {
        header("Location: manage_off.php");
        exit();
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    } else {
      echo "<div class='alert alert-danger fixed-top text-center alert-dismissible fade show' role='alert'>";
      echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
      echo "<strong>ERROR UPLOADING FILE!</strong> ";
      echo "</div>";
    }
  } else {
    echo "<div class='alert alert-danger fixed-top text-center alert-dismissible fade show' role='alert'>";
    echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
    echo "<strong>NO FILE UPLOADED OR AN ERROR OCCURED!</strong> ";
    echo "</div>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Official</title>
</head>

<body class="d-flex">
  <?php include "includes/sidebar.php" ?>
  <div class="min-vh-100 p-3" style="width: 83%">
    <div class="w-100">
      <div id="directory_link" class="p-3 rounded-4 bg-dark-subtle ">
        <a href="manage_off.php" class="text-danger text-decoration-none">Manage Officials</a>
        <a href="create_official.php" class="text-decoration-none text-black-50">/ Add Official</a>

      </div>
      <div class="mt-3 text-center">
        <h2 class="text-black-50"><?php echo $msg ?></h2>
      </div>
      <div class="d-flex align-items-center justify-content-between mt-3  gap-2 w-100">
        <h1 class="m-0 text-danger">Add Official</h1>
        <a href="manage_off.php" class="btn btn-danger">Go Back</a>
      </div>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="w-100" enctype="multipart/form-data">
        <div class="py-2 mb-3 mx-auto" style="border-bottom: 1px solid gray;">
          <input type="hidden" name="id">
        </div>
        <div class="row">
          <div class="my-2 col-12">
            <label for="name" class="form-label">Name: </label>
            <input type="text" class="form-control border-dark" name="name" id="name" placeholder="Official Name..." required="true">
          </div>
          <div class="mb-4 col-6">
            <label for="birth_date" class="form-label">Birth Date: </label>
            <input type="date" class="form-control border-dark" name="birth_date" id="birth_date" placeholder="" required="true">
          </div>
          <div class="mb-4 col-6">
            <label for="position" class="form-label">Position</label>
            <input type="text" class="form-control border-dark" name="position" id="position" placeholder="Official's Position..." required="true">
          </div>
          <div class="mb-4 col-6">
            <label for="term_start" class="form-label">Term Start: </label>
            <input type="date" class="form-control border-dark" name="term_start" id="term_start" placeholder="" required="true">
          </div>
          <div class="mb-4 col-6">
            <label for="term_end" class="form-label">Term End: </label>
            <input type="date" class="form-control border-dark" name="term_end" id="term_end" placeholder="" required="true">
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
            Add Official
          </button>
        </div>
      </form>
      <div class="text-center">
        <p>&copy; 2024 Barangay Cannery Information System</p>
      </div>

    </div>
  </div>
</body>

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

</html>

<style>
  /* Sidebar active */
  .official {
    background: black !important;
    color: white !important;
  }
</style>