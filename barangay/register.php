<?php require "includes/connection.php" ?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //Storing input data to var and sanitizing data for security!
  $username = filter_input(INPUT_POST, "user", FILTER_SANITIZE_SPECIAL_CHARS);
  $password = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_SPECIAL_CHARS);
  $hash = password_hash($password, PASSWORD_DEFAULT);



  //Check if there are similar user & if all inputs are filled
  $sql = "SELECT * FROM `users` WHERE `username` = '$username'";
  $check = $conn->query($sql);
  $row = $check->fetch_assoc();
  if (@$row["username"] == $username) {
    echo "<div class='alert alert-danger fixed-top text-center alert-dismissible fade show' role='alert'>";
    echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
    echo "<strong>User Already Exists!</strong> <br> Choose another Username";
    echo "</div>";
    } else {
    //if there's no similar user then input the data 
    $query = "INSERT INTO `users` (`Username`,`Password`) VALUES ('$username','$hash')";
    $conn->query($query);
    echo "<div class='alert alert-success fixed-top text-center alert-dismissible fade show' role='alert'>";
    echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
    echo "<strong>Registered Successfully!</strong> <br> <a class='link-danger' href='index.php'> Proceed to Log in page? </a>";
    echo "</div>";
    }
  }


?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>Log In</title>

</head>

<body>
  <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  <form action="" method="post">

    <h3>Register Here</h3>

    <label for="username">Username</label>
    <input name="user" type="text" placeholder="Username" id="username" required>

    <label for="password">Password</label>
    <input name="pass" type="password" placeholder="Password" id="password" required>

    <button name="submit" class="text-bg-primary">Register</button>
    <button href='index.php' onclick="return window.location.href='index.php'">Log In</button>
  </form>
</body>


</html>
<!--Stylesheet-->
<style media="screen">
  *,
  *:before,
  *:after {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
  }

  body {
    background-color: #080710 !important;
  }

  .background {
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%, -50%);
    left: 50%;
    top: 50%;
  }

  .background .shape {
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
  }

  .shape:first-child {
    background: linear-gradient(#1845ad,
        #23a2f6);
    left: -80px;
    top: -80px;
  }

  .shape:last-child {
    background: linear-gradient(to right,
        #ff512f,
        #f09819);
    right: -30px;
    bottom: -80px;
  }

  form {

    width: 400px;
    background-color: rgba(255, 255, 255, 0.13);
    position: absolute;
    transform: translate(-50%, -50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
    padding: 50px 35px;
  }

  form * {
    font-family: 'Poppins', sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
  }

  form h3 {
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
  }

  label {
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
  }

  input {
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255, 255, 255, 0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
  }

  ::placeholder {
    color: #e5e5e5;
  }

  button {
    margin-top: 20px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
  }

  .social {
    margin-top: 30px;
    display: flex;
  }

  .social div {
    background: red;
    width: 150px;
    border-radius: 3px;
    padding: 5px 10px 10px 5px;
    background-color: rgba(255, 255, 255, 0.27);
    color: #eaf0fb;
    text-align: center;
  }

  .social div:hover {
    background-color: rgba(255, 255, 255, 0.47);
  }

  .social .fb {
    margin-left: 25px;
  }

  .social i {
    margin-right: 4px;
  }
</style>