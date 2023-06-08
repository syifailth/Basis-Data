<?php

session_start();

include_once '../login_system/config.php';
if (isset($_SESSION['email'])){
  header('location:../main/main.php');
}



if (isset($_POST['submit'])) {


  $email =  $_POST['email'];
  $pass = md5($_POST['password']);

  $select = " SELECT * FROM users WHERE email = '$email' AND password = '$pass'";

  $result = mysqli_query($kon, $select);


  if ($result->num_rows ==1) {
    
    
      $riw = mysqli_fetch_array($result);
      $_SESSION['email'] = $riw['email'];

      $didata = mysqli_query($kon,"SELECT * FROM data_diri WHERE email = '$email'");
      if(mysqli_num_rows($didata) > 0){
        header('location:../account/account.php');
        exit();
      }else{
        header('location:../login/loginawal.php');
      }
    } else {
      $error[] = 'incorrect email orpassword!';
    }
 
};
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="login.css">
</head>

<body>

  <div class="wrapper">
    <div class="title">Login</div>
    <form action="" method="POST">
      <?php
      if (isset($error)) {
        foreach ($error as $error) {
          echo '<span class="error-msg">' . $error . '</span>';
        };
      };
      ?>
      <div class="field">
        <input type="email" name="email" required>
        <label>Email Address</label>
      </div>
      <div class="field">
        <input type="password" name="password" required>
        <label>Password</label>
      </div>
      
      <div class="field">
        <input type="submit" name="submit" value="Login" class="form-btn">
      </div>
      <div class="signup-link">Not a member? <a href="../signup/signup.php">Sign up now</a></div>
    </form>
  </div>
</body>

</html>