<?php require "includes/connection.php" ?>

<?php

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $first_name = $_POST['first_name'];
  $middle_name = $_POST['middle_name'];
  $last_name = $_POST['last_name'];
  $nick_name = $_POST['nick_name'];
  $gender = $_POST['gender'];
  $birth_date = $_POST['birth_date'];
  $place_of_birth = $_POST['place_of_birth'];
  $civil_status = $_POST['civil_status'];
  $occupation = $_POST['occupation'];
  $religion = $_POST['religion'];
  $lot = $_POST['lot'];
  $purok = $_POST['purok'];
  $resident_status = $_POST['resident_status'];
  $isVoter = isset($_POST['isVoter']) ? 1 : 0;
  $isPWD = isset($_POST['isPWD']) ? 1 : 0;
  $email = $_POST['email'];
  $phone_number = $_POST['phone_number'];
  $telephone_number = $_POST['telephone_number'];

  // CHECK IF RESIDENT ALREADY EXIST
  $checkResSql = "SELECT * FROM residents WHERE first_name ='$first_name' AND middle_name='$middle_name' AND last_name='$last_name'";
  $checkResResult = $conn->query($checkResSql);
  if ($checkResResult->num_rows > 0) {
    echo "<div class='alert alert-danger fixed-top text-center alert-dismissible fade show' role='alert'>";
    echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
    echo "<strong>User already exists!</strong> ";
    echo "</div>";
  } else {
    if (isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0) {
      $photo_name = $_FILES["photo"]["name"];
      $photo_tmp = $_FILES["photo"]["tmp_name"];
      $photo_path = "uploads/" . $photo_name;

      if (move_uploaded_file($photo_tmp, $photo_path)) {
        $sql = "INSERT INTO `residents` (`first_name`, `middle_name`, `last_name`, `nick_name`, `gender`, `birth_date`, `place_of_birth`, `civil_status`, `occupation`, `religion`, `lot`, `purok`, `resident_status`, `voter_status`, `PWD`, `email`, `phone_number`, `telephone`, `photo_path`) VALUES ('$first_name','$middle_name','$last_name','$nick_name','$gender','$birth_date','$place_of_birth','$civil_status','$occupation','$religion','$lot','$purok','$resident_status','$isVoter','$isPWD','$email','$phone_number','$telephone_number', '$photo_path')";

        if ($conn->query($sql)) {
          header("Location: manage_res.php");
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
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Resident</title>
</head>

<body class="d-flex">
  <?php include "includes/sidebar.php" ?>
  <div class="min-vh-100 pt-3" style="width: 83%">
    <div class="d-flex flex-column align-items-center justify-content-center container-md">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post" class="w-100" enctype="multipart/form-data">
        <div id="directory_link" class="p-3 rounded-4 mt-3 bg-dark-subtle ">
          <a href="manage_res.php" class="text-danger text-decoration-none">Manage Residents</a>
          <a href="create_resident.php" class="text-decoration-none text-black-50">/ Create Resident</a>
        </div>
        <div class="py-2 mx-auto d-flex align-items-center justify-content-between my-2" style="border-bottom: 1px solid gray;">
          <h2 class="text-danger">Add new Resident</h2>
        </div>
        <div class="row mt-3">
          <div class="mb-4 col-md-4">
            <label for="first_name" class="form-label">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name..." required="true" />
          </div>
          <div class="mb-4 col-md-4">
            <label for="middle_name" class="form-label">Middle Name</label>
            <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Middle Name..." required="true" />
          </div>
          <div class="mb-4 col-md-4">
            <label for="last_name" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="last Name..." required="true" />
          </div>
          <div class="mb-4 col-md-4">
            <label for="nick_name" class="form-label">Nick Name</label>
            <input type="text" class="form-control" name="nick_name" id="nick_name" placeholder="Nickname..." required="true" />
          </div>
          <div class="mb-4 col-md-4">

            <label for="gender" class="form-label">Gender</label>
            <select class="form-select form-select" name="gender" id="gender">
              <option value="Male" selected>Male</option>
              <option value="Female">Female</option>

            </select>


          </div>
          <div class="mb-4 col-md-4">
            <label for="birth_date" class="form-label">Birth Date</label>
            <input type="date" class="form-control" name="birth_date" id="birth_date" placeholder="" required="true" />
          </div>
          <div class="mb-4 col-md-4">
            <label for="place_of_birth" class="form-label">Place of Birth</label>
            <input type="text" class="form-control" name="place_of_birth" id="place_of_birth" placeholder="Place of Birth..." required="true" />
          </div>
          <div class="mb-4 col-md-4">

            <label for="civil_status" class="form-label">Civil Status</label>
            <select class="form-select form-select" name="civil_status" id="civil_status">
              <option selected value="Single">Single</option>
              <option value="Married">Married</option>
              <option value="Divorced">Divorced</option>
              <option value="Other">Other</option>
            </select>
          </div>
          <div class="mb-4 col-md-4">
            <label for="occupation" class="form-label">Occupation</label>
            <input type="text" class="form-control" name="occupation" id="occupation" placeholder="Occupation..." required="true" />
          </div>
          <div class="mb-4 col-md-4">
            <label for="religion" class="form-label">Religion</label>
            <input type="text" class="form-control" name="religion" id="religion" placeholder="Religion..." required="true" />
          </div>
          <div class="mb-4 col-md-4">
            <label for="lot" class="form-label">Lot</label>
            <input type="text" class="form-control" name="lot" id="lot" placeholder="Lot..." required="true" />
          </div>
          <div class="mb-4 col-md-4">
            <label for="purok" class="form-label">Purok</label>
            <input type="text" class="form-control" name="purok" id="purok" placeholder="Purok..." required="true" />
          </div>
          <div class="mb-4 col-md-4">
            <label for="resident_status" class="form-label">Resident Status</label>
            <input type="text" class="form-control" name="resident_status" id="resident_status" placeholder="Resident Status" required="true" />
          </div>
          <div class="mb-4 col-md-4">
            <label for="isVoter" class="form-label">Voter Status ~ isVoter</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="isVoter" id="isVoter" />
              <label class="form-check-label" for="isVoter"> Check here </label>
            </div>
          </div>
          <div class="mb-4 col-md-4">
            <label for="PWD" class="form-label">Person with Disabilities ~ isPWD</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="isPWD" value="1" id="PWD" />
              <label class="form-check-label" for="PWD"> Check here </label>
            </div>

          </div>

          <div class="mb-4 col-md-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email..." required="true" />
          </div>
          <div class="mb-4 col-md-4">
            <label for="phone_number" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Valid Phone number..." required="true" onkeypress="return /[0-9]/i.test(event.key)" pattern="[0-9]+">

          </div>
          <div class="mb-4 col-md-4">
            <label for="telephone_number" class="form-label">Telephone Number</label>
            <input type="text" class="form-control" name="telephone_number" id="telephone_number" placeholder="Your Telephone Number..." required="true" onkeypress="return /[0-9]/i.test(event.key)" pattern="[0-9]+" />
          </div>
        </div>
        <div class=" col-md-6 mb-3">
          <label for="photo" class="form-label">Photo</label>
          <input class="form-control border-dark-subtle " accept="image/*" type="file" name="photo" id="photo" onchange="showPreview(event);">
          <div class="preview mt-2 d-none">
            <p class="fw-bold">Preview: </p>
            <img width="100" id="photo_preview">
          </div>
        </div>

        <div class="text-center pt-3" style="border-top: 1px solid gray">
          <a href="manage_res.php" class="btn btn-lg btn-danger">Go Back</a>
          <button type="submit" class="btn btn-lg btn-primary">
            Submit
          </button>
        </div>
      </form>
      <div class="text-center">
        <p>&copy; 2024 Barangay Cannery Information System</p>
      </div>
    </div>

    <script>
      const alert = document.querySelector(".alert");
      if (alert) {
        setTimeout(() => {
          alert.classList.add("d-none")
        }, 4000);
      }

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
  .residents {
    background: black !important;
    color: white !important;
  }

  div label {
    font-weight: 500 !important;
  }

  input,
  select {
    border: 1px solid black !important;
  }
</style>