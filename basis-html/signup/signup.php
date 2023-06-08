<?php 
 
include ('../login_system/config.php');

if(isset($_POST['submit'])){

  $name = mysqli_real_escape_string($kon, $_POST['nama']);
  $email = mysqli_real_escape_string($kon, $_POST['email']);
  $pass = md5($_POST['password']);
  $cpass = md5($_POST['cpassword']);
  $user_type = $_POST['user_type'];

  $select = " SELECT * FROM users WHERE email = '$email' AND password = '$pass' ";

  $result = mysqli_query($kon, $select);

  if(mysqli_num_rows($result) > 0){

     $error[] = 'user already exist!';

  }else{

     if($pass != $cpass){
        $error[] = 'password not matched!';
     }else{
        $insert = "INSERT INTO users(nama, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
        mysqli_query($kon, $insert);
        header('location:../login/login.php');
     }
  }

};
 
?>



<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en" dir="ltr">

<head>
  <title>Sign up</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="signup.css">
</head>

<body>
  <div class="wrapper">
    <h2>Sign up</h2>
    <form action="signup.php" method="POST">
      <?php
      if (isset($error)) {
        foreach ($error as $error) {
          echo '<span class="error-msg">' . $error . '</span>';
        };
      };
      ?>
      <div class="input-box">
        <input type="text" name="nama" placeholder="Enter your name" required>
      </div>
      <div class="input-box">
        <input type="text" name="email" placeholder="Enter your email" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Create password" required>
      </div>
      <div class="input-box">
        <input type="password" name="cpassword" placeholder="Confirm password" required>
      </div>
      
      <div class="policy">
        <input type="checkbox">
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="Submit" name="submit" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="../login/login.php">Login now</a></h3>
      </div>
    </form>
  </div>
</body>

</html>