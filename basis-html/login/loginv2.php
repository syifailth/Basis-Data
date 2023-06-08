<?php
session_start();
if(isset($_SESSION['status'])){
    header("location:../account/account.php");
}
if(isset($_POST['submit'])){
    include("../login_system/config.php");

    $un = $_POST['email'];
    $pass = $_POST['password'];

    $q = $kon-> query("SELECT * FROM user_form WHERE email ='$un'");
    $get_data = mysqli_fetch_array($q);

    if(empty($get_data)){
        $pesan = 'incorrect email or password!';
    }else{
        if($pass != $get_data['password']){
            $pesan = 'Username atau password salah';
        }else{
            $_SESSION['email'] = $un;
            $_SESSION['status'] = "login";
            
            header('location:../account/account.php');
            exit();
        }

    }

}
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
   <form action="../account/account.php" method="post">
      
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
