<?php
session_start();
include_once('../login_system/config.php');

if (!isset($_SESSION['email'])) {
    header('location:../main/main.php');
}
$mail = $_SESSION['email'];

$ambil = mysqli_query($kon, "SELECT * FROM users WHERE email ='$mail'");
$row = mysqli_fetch_array($ambil);
$id = $row['id'];

if (isset($_POST['Submit'])) {
    $nama = $_POST['nama_lengkap'];
    $tl = $_POST['tanggal_lahir'];
    $no_hp = $_POST['no_hp'];
    $pekerjaan = $_POST['pekerjaan'];
    $alamat = $_POST['alamat'];

    $insert = "INSERT INTO data_diri(id,nama_lengkap, tanggal_lahir,email, no_hp, pekerjaan, alamat) 
               VALUES('$id','$nama','$tl','$mail','$no_hp','$pekerjaan', '$alamat')";
    mysqli_query($kon, $insert);
    header('location:../account/account.php');
}
?>


<head>
    <title>Send Money</title>
    <!-- Serba - Serbi Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- My Css -->
    <link rel="stylesheet" href="../main/main.css">
    <script src="../sidebar/sidebar.js"></script>
</head>

<style>
    h2 {
        font-family: 'DM Serif Display', serif;
        color: #424874;
        font-size: 8vh;
    }

    .table {
        color: #A6B1E1;
        font-family: 'Noto Serif JP', serif;
    }
</style>

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
                <a href="#" class="nav_logo">
                    <i class='bi bi-bank nav_logo-icon'></i>
                    <span class="nav_logo-name">Bank Indonesia</span>
                </a>
                <div class="nav_list">
                    <a href="#" class="nav_link active">
                        <i class='bi bi-person nav_icon'>
                        </i> <span class="nav_name">Account</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class='bi bi-cash-coin nav_icon'></i>
                        <span class="nav_name">Transactions</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class='bi bi-credit-card nav_icon'></i>
                        <span class="nav_name">Send Money</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class='bi bi-info-circle nav_icon'></i>
                        <span class="nav_name">About Us</span>
                    </a>
                    <a href="#" class="nav_link">
                        <i class='bi bi-bar-chart-line nav_icon'></i>
                        <span class="nav_name">Vision & Mission</span>
                    </a>
                    <a href="#" class="nav_link">
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

    <!--Container Main start-->
    <div class="height-100">
        <div class="row text-center">
            <div class="col">
                <h2>Register</h2>
            </div>
        </div>
        <div class="row justify-content-center my-md-5">
            <div class="col-sm-8">
                <form action="loginawal.php" method="POST">
                    <div class="mb-3">
                        <label for="amount" class="form-label">Full name</label>
                        <input type="text" name="nama_lengkap" class="form-control" id="amount" placeholder="Rp 00000">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Date of birth</label>
                        <input type="text" name="tanggal_lahir" class="form-control" id="description" placeholder="Write Here">
                    </div>
                    <div class="mb-3">
                        <label for="Accountnumber" class="form-label">Phone</label>
                        <input type="text" name="no_hp" class="form-control" id="Accountnumber" placeholder="Write Here">
                    </div>
                    <div class="mb-3">
                        <label for="Accountnumber" class="form-label">Employment</label>
                        <input type="text" name="pekerjaan" class="form-control" id="Accountnumber" placeholder="Write Here">
                    </div>
                    <div class="mb-3">
                        <label for="Accountnumber" class="form-label">Adress</label>
                        <input type="text" name="alamat" class="form-control" id="Accountnumber" placeholder="Write Here">
                    </div>
                    <button type="submit" name="Submit" class="btn btn-outline-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!--Container Main end-->
</body>