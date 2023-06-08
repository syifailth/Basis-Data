<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Sign up</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="signup.css">

</head>
<body>
   
<div class="wrapper">

   <form action="" method="post">
      <h2>Sign up</h2>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <div class="input-box">
      <input type="text" name="name" required placeholder="enter your name">
      </div>
      <div class="input-box">
      <input type="email" name="email" required placeholder="enter your email">
      </div>
      <div class="input-box">
      <input type="password" name="password" required placeholder="enter your password">
      </div>
      <div class="input-box">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      </div>
      <select name="user_type" 
      style=" margin: 8px 0; height: 100%;
      width: 100%;
      outline: none;
      padding: 0 15px;
      font-size: 17px;
      font-weight: 400;
      color: rgb(51, 51, 51);
      border: 1.5px solid #C7BEBE;
      border-bottom-width: 2.5px;
      border-radius: 15px;
      transition: all 0.3s ease;">
          <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <div class="input-box button">
      <input type="submit" name="submit" value="register now" class="form-btn">
      </div>
      <div class="text">
      <p>already have an account? <a href="login_form.php">login now</a></p>
      </div>
   </form>

</div>

</body>
</html>