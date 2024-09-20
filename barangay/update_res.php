<?php require 'includes/connection.php' ?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];
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


  if ($_FILES['photo']['size'] > 0) {
    $old_photo_path = $row["photo_path"];
    unlink($old_photo_path);

    $photo_path = 'uploads/' . $_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], $photo_path);

    $sql = "UPDATE residents SET first_name = '$first_name', 
                                middle_name = '$middle_name', 
                                last_name = '$last_name',
                                gender = '$gender',
                                birth_date = '$birth_date',
                                place_of_birth = '$place_of_birth',
                                civil_status = '$civil_status',
                                occupation = '$occupation',
                                religion = '$religion',
                                lot = '$lot',
                                purok = '$purok',
                                resident_status = '$resident_status',
                                voter_status = '$isVoter',
                                PWD = '$isPWD',
                                email = '$email',
                                phone_number = '$phone_number',
                                telephone = '$telephone_number',
                                photo_path = '$photo_path'
                                WHERE id =$id";
  } else {
    $sql = "UPDATE residents SET first_name = '$first_name', 
                                middle_name = '$middle_name', 
                                last_name = '$last_name',
                                gender = '$gender',
                                birth_date = '$birth_date',
                                place_of_birth = '$place_of_birth',
                                civil_status = '$civil_status',
                                occupation = '$occupation',
                                religion = '$religion',
                                lot = '$lot',
                                purok = '$purok',
                                resident_status = '$resident_status',
                                voter_status = '$isVoter',
                                PWD = '$isPWD',
                                email = '$email',
                                phone_number = '$phone_number',
                                telephone = '$telephone_number'
                                WHERE id='$id'";
  }
  $conn->query($sql);
  header("Location: search_residents.php?search=$first_name");
  exit();
}

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
  die("Invalid ID");
}

$sql = "SELECT * FROM residents WHERE id= $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Resident</title>
</head>

<body>
  <div
    class="border shadow border-1 d-flex align-items-center justify-content-center flex-column border-dark-subtle min-vh-100 container-md">
    <form action="" method="post" class="w-100" enctype="multipart/form-data">
      <div class="py-2 mx-auto" style="border-bottom: 1px solid gray;">
        <h2>Please provide the required details</h2>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      </div>
      <div class="row">
        <div class="mb-4 col-md-4">
          <label for="first_name" class="form-label">First Name</label>
          <input type="text" class="form-control" name="first_name" id="first_name" placeholder="" required="true"
            value="<?php echo $row['first_name']; ?>" />
        </div>
        <div class="mb-4 col-md-4">
          <label for="middle_name" class="form-label">Middle Name</label>
          <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="" required="true"
            value="<?php echo $row['middle_name']; ?>" />
        </div>
        <div class="mb-4 col-md-4">
          <label for="last_name" class="form-label">Last Name</label>
          <input type="text" class="form-control" name="last_name" id="last_name" placeholder="" required="true"
            value="<?php echo $row['last_name']; ?>" />
        </div>
        <div class="mb-4 col-md-4">
          <label for="nick_name" class="form-label">Nick Name</label>
          <input type="text" class="form-control" name="nick_name" id="nick_name" placeholder="" required="true"
            value="<?php echo $row['nick_name']; ?>" />
        </div>
        <div class="mb-4 col-md-4">
          <label for="gender" class="form-label">Gender</label>
          <select class="form-select form-select" name="gender" id="gender">
            <?php
            if ($row['gender'] === "Male") {
              echo '<option value="Male" selected>Male</option>
            <option value="Female">Female</option>';
            } else {
              echo '<option value="Male" >Male</option>
                <option value="Female" selected>Female</option>';
            }

            ?>
          </select>


        </div>
        <div class="mb-4 col-md-4">
          <label for="birth_date" class="form-label">Birth Date</label>
          <input type="date" class="form-control" name="birth_date" id="birth_date" placeholder="" required="true"
            value="<?php echo $row['birth_date']; ?>" />
        </div>
        <div class="mb-4 col-md-4">
          <label for="place_of_birth" class="form-label">Place of Birth</label>
          <input type="text" class="form-control" name="place_of_birth" id="place_of_birth" placeholder=""
            required="true" value="<?php echo $row['place_of_birth']; ?>" />
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
          <input type="text" class="form-control" name="occupation" id="occupation" placeholder="" required="true"
            value="<?php echo $row['occupation']; ?>" />
        </div>
        <div class="mb-4 col-md-4">
          <label for="religion" class="form-label">Religion</label>
          <input type="text" class="form-control" name="religion" id="religion" placeholder="" required="true"
            value="<?php echo $row['religion']; ?>" />
        </div>
        <div class="mb-4 col-md-4">
          <label for="lot" class="form-label">Lot</label>
          <input type="text" class="form-control" name="lot" id="lot" placeholder="" required="true"
            value="<?php echo $row['lot']; ?>" />
        </div>
        <div class="mb-4 col-md-4">
          <label for="purok" class="form-label">Purok</label>
          <input type="text" class="form-control" name="purok" id="purok" placeholder="" required="true"
            value="<?php echo $row['purok']; ?>" />
        </div>
        <div class="mb-4 col-md-4">
          <label for="resident_status" class="form-label">Resident Status</label>
          <input type="text" class="form-control" name="resident_status" id="resident_status" placeholder=""
            required="true" value="<?php echo $row['resident_status']; ?>" s />
        </div>
        <div class="mb-4 col-md-4">
          <label for="isVoter" class="form-label">Voter Status ~ isVoter</label>
          <div class="form-check">
            <?php
            if ($row['voter_status'] == 1) {
              echo ' <input class="form-check-input" type="checkbox" value="1" name="isVoter" id="isVoter" checked/>';
            } else {
              echo '<input class="form-check-input" type="checkbox" value="1" name="isVoter" id="isVoter" />';
            }
            ?>

            <label class="form-check-label" for="isVoter"> Check here </label>
          </div>
        </div>
        <div class="mb-4 col-md-4">
          <label for="PWD" class="form-label">Person with Disabilities ~ isPWD</label>
          <div class="form-check">
            <?php
            if ($row['PWD'] == 1) {
              echo ' <input class="form-check-input" type="checkbox" name="isPWD" value="1" id="PWD" checked/>';
            } else {
              echo ' <input class="form-check-input" type="checkbox" name="isPWD" value="1" id="PWD" />';
            }
            ?>

            <label class="form-check-label" for="PWD"> Check here </label>
          </div>

        </div>

        <div class="mb-4 col-md-4">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="" required="true"
            value="<?php echo $row['email']; ?>" />
        </div>
        <div class="mb-4 col-md-4">
          <label for="phone_number" class="form-label">Phone Number</label>
          <input type="text" class="form-control" id="phone_number" name="phone_number"
            value="<?php echo $row['phone_number']; ?>" required="true" onkeypress="return /[0-9]/i.test(event.key)"
            pattern="[0-9]+">

        </div>
        <div class="mb-4 col-md-4">
          <label for="telephone_number" class="form-label">Telephone Number</label>
          <input type="text" class="form-control" name="telephone_number" id="telephone_number"
            value="<?php echo $row['telephone']; ?>" required="true" onkeypress="return /[0-9]/i.test(event.key)"
            pattern="[0-9]+" />
        </div>
      </div>
      <div class="col-12 col-md-6">
        <label for="photo" class="form-label">Photo</label>
        <input class="form-control border-dark-subtle mb-3" accept="image/*" type="file" name="photo" id="photo">

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


</body>

</html>

<style>
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