<?php 
session_start();
include_once("../login_system/config.php");


if (!isset($_SESSION['email'])){
  header('location:../main/main.php');
}

$mmm = $_SESSION['email'];

$data = mysqli_query($kon, "SELECT * FROM data_diri WHERE '$mmm' = email");


$user = mysqli_fetch_array($data);
$id = $user['id'];
$nama = $user['nama_lengkap'];
$tanggal_lahir = $user['tanggal_lahir'];
$email = $user['email'];
$no = $user['no_hp'];
$pekerjaan = $user['pekerjaan'];
$alamat = $user['alamat'];

?>



<head>
  <title>Account</title>
</head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<link rel="stylesheet" href="../main/main.css">
<link rel="stylesheet" href="style_content.css">
<script src="../sidebar/sidebar.js"></script>

<body id="body-pd">
  <!-- Side Bar -->
  <header class="header" id="header">
      <div class="header_toggle"> 
          <i class='bi bi-list' id="header-toggle"></i> 
      </div>
  </header>
  <div class="l-navbar" id="nav-bar">
      <nav class="nav">
      <div> 
                <a href="../main/main.php" class="nav_logo">
                    <i class='bi bi-bank nav_logo-icon'></i>
                    <span class="nav_logo-name">Bank Indonesia</span>
                </a>
                <div class="nav_list"> 
                    <a href="../account/account.php" class="nav_link active">
                        <i class='bi bi-person nav_icon'>
                        </i> <span class="nav_name">Account</span>
                    </a>
                    <a href="../transactions/transactions.php" class="nav_link">
                        <i class='bi bi-cash-coin nav_icon'></i>
                        <span class="nav_name">Transactions</span>
                    </a>
                    <a href="../transactions/sendmoney.php" class="nav_link">
                        <i class='bi bi-credit-card nav_icon'></i>
                        <span class="nav_name">Send Money</span>
                    </a>
                    <a href="../aboutus/aboutus.html" class="nav_link">
                        <i class='bi bi-info-circle nav_icon'></i>
                        <span class="nav_name">About Us</span>
                    </a>
                    <a href="../visi&misi/visi&misi.html" class="nav_link">
                        <i class='bi bi-bar-chart-line nav_icon'></i>
                        <span class="nav_name">Vision & Mission</span>
                    </a>
                    <a href="../contactus/contactus.html" class="nav_link">
                        <i class='bi bi-headset nav_icon'></i>
                        <span class="nav_name">Contact Us</span>
                    </a>
                </div>
            </div> 
            <a href="../login/logout.php" class="nav_link">
                <i class='bi bi-box-arrow-left nav_icon'></i>
                <span class="nav_name">Sign Out</span>
            </a>
      </nav>
  </div>
  <!-- AKhir Side Bar -->

  <style>
    h2{
      font-size: 8vh;
      color: #424874;
      font-family: 'DM Serif Display', serif;
    }
    h3{
      font-family: 'DM Serif Display', serif;
      color: #424874;
    }
  </style>

  <!--Container Main start-->
  <div class="height-100">
    <div class="container">
      <!-- Account Details -->
      <section id="account">
        <div class="main-body">
          <div class="row">
            <div class="col text-center">
              <h2 class="my-3">Account</h2>
            </div>
          </div>
          <div class="row gutters-sm justify-content-center">
            <div class="col-md-5 my-4">
              <div class="card">
                <div class="card-body" style=" padding: 8vh;">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="person-fill.svg" alt="Admin" width="150">
                    <div class="mt-3">
                      <h4><?php echo $nama ?></h4>
                      <p class="text-secondary mb-1">000000000000<?php echo $id ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-5 mt-4">
              <div class="card">
                <div class="card-body" style=" padding: 11.5vh;">
                  <div class="text-center">
                    <img src="wallet.svg" alt="wallet" width="100">
                    <div class="mt-3">
                      <h4>My Wallet</h4>
                      <p class="text-secondary mb-1">Rp 200.000.000</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-10">
              <div class="card mb-3">
                <h3 class="text-center mt-3">Personal Details</h3>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo "$nama"; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date Of Birth</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php
                      echo "$tanggal_lahir";
                      ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php
                      echo "$email";
                      ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php
                      echo "$no";
                      ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Employment</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php
                      echo "$pekerjaan";
                      ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php
                      echo "$alamat";
                      ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col">
                      <a class="btn btn-outline-primary " target="__blank" href="edit-acc.php">Edit</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Akhir Account Details -->
    </div>
  </div>
  <!--Container Main end-->
</body>