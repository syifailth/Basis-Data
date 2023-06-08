<?php

include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      // direktorinya diubah ya, yang satu untuk admin(bikin crud aja)
      // satu lagi masuk ke home
      
      if($row['user_type'] == 'admin'){

         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');

      }elseif($row['user_type'] == 'user'){

         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');

      }
     
   }else{
      $error[] = 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="login.css">

</head>
<body>
   
<div class="wrapper">
<div class="title">Login</div>
   <form action="" method="post">
      
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <div class="field">
      <input type="email" name="email" required placeholder="enter your email">
      </div>
      <div class="field">
      <input type="password" name="password" required placeholder="enter your password">
      </div>
      <div class="field">
      <input type="submit" name="submit" value="login now" class="form-btn">
      </div>
      <div class="signup-link">don't have an account? <a href="register_form.php">register now</a></div> 
   </form>

</div>

</body>
</html>