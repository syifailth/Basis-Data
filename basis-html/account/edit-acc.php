<?php

session_start();

include_once("../login_system/config.php");

$mail = $_SESSION['email'];


if (isset($_POST['update'])) {
    // ambil data dari formulir
    $nama = $_POST['nama'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $no_hp = $_POST['no_hp'];
    $pekerjaan = $_POST['pekerjaan'];
    $alamat = $_POST['alamat'];

    // query
    $hasil = mysqli_query($kon, "UPDATE data_diri SET 
        nama_lengkap ='$nama', 
        tanggal_lahir ='$tanggal_lahir', 
        email ='$mail', 
        no_hp='$no_hp',
        pekerjaan ='$pekerjaan',
        alamat = '$alamat'
        WHERE email = '$mail'");
    // mengecek apakah query berhasil diubah
    header('location: ../account/account.php');
}


if (!isset($_SESSION['email'])) {
    header('location:../main/main.php');
}


// Check if form is submitted for user update, then redirect to homepage after update
$ambil = mysqli_query($kon, "SELECT * FROM data_diri WHERE email = '$mail'");

$row = mysqli_fetch_assoc($ambil);

$nama = $row['nama_lengkap'];
$tanggal_lahir = $row['tanggal_lahir'];
$email = $row['email'];
$no_hp = $row['no_hp'];
$pekerjaan = $row['pekerjaan'];
$alamat = $row['alamat'];

// about


// update user data about

?>

<head>
    <title>Edit Account</title>
</head>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<link rel="stylesheet" href="../main/main.css">
<link rel="stylesheet" href="style_content.css">
<script src="../sidebar/sidebar.js"></script>

<style>
    h2 {
        font-size: 8vh;
        color: #424874;
        font-family: 'DM Serif Display', serif;
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
                <a href="../main/main.html" class="nav_logo">
                    <i class='bi bi-bank nav_logo-icon'></i>
                    <span class="nav_logo-name">Bank Indonesia</span>
                </a>
                <div class="nav_list">
                    <a href="../account/account.html" class="nav_link active">
                        <i class='bi bi-person nav_icon'>
                        </i> <span class="nav_name">Account</span>
                    </a>
                    <a href="../transactions/transactions.html" class="nav_link">
                        <i class='bi bi-cash-coin nav_icon'></i>
                        <span class="nav_name">Transactions</span>
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

    <!--Container Main start-->
    <div class="height-100">
        <div class="container">
            <!-- Account Details -->
            <section id="account">
                <div class="main-body">
                    <div class="row">
                        <div class="col text-center">
                            <h2 class="my-3">Edit Account</h2>
                        </div>
                    </div>
                    <div class="row gutters-sm">
                        <div class="col-md-8 my-4 position-absolute top-50 start-50 translate-middle">
                            <div class="card">
                                <div class="card-body">
                                    <form name="update" action="edit-acc.php" method="POST">
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Full Name</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="nama" class="form-control" value=<?php echo "$nama" ?>>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Date of Birth</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="tanggal_lahir" class="form-control" value=<?php echo $tanggal_lahir ?>>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Phone</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="no_hp" class="form-control" value=<?php echo $no_hp ?>>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Employment</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="pekerjaan" class="form-control" value=<?php echo $pekerjaan ?>>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <h6 class="mb-0">Address</h6>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="text" name="alamat" class="form-control" value=<?php echo $alamat ?>>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-9 text-secondary">
                                                <input type="submit" class="btm btn-outline-primary" name="update" value="Save Change">
                                            </div>
                                        </div>
                                    </form>
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