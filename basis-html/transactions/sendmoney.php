<?php 
session_start();
include_once('../login_system/config.php');

if (!isset($_SESSION['email'])){
    header('location:../main/main.php');
  }

$mail = $_SESSION['email'];
if (isset($_POST['Submit'])) {
    $tanggal = $_POST['tanggal'];
    $waktu = $_POST['waktu'];
    $amount = $_POST['amount'];
    $deskripsi = $_POST['deskripsi'];
    $no_akun = $_POST['no_akun'];
    $metode = $_POST['method'];

    // include database connection file
    

    // Insert user data into table
    $hasil = mysqli_query($kon, "INSERT INTO transaksi(email,date,time,amount,description,no_akun,method) 
            VALUES('$mail','$tanggal','$waktu','$amount','$deskripsi','$no_akun','$metode')");
    header('location:../transactions/transactions.php');
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
    h2{
        font-family: 'DM Serif Display', serif;
        color: #424874;
        font-size: 8vh;
    }
    .table{
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
                <a href="../main/main.php" class="nav_logo">
                    <i class='bi bi-bank nav_logo-icon'></i>
                    <span class="nav_logo-name">Bank Indonesia</span>
                </a>
                <div class="nav_list"> 
                    <a href="../account/account.php" class="nav_link">
                        <i class='bi bi-person nav_icon'>
                        </i> <span class="nav_name">Account</span>
                    </a>
                    <a href="../transactions/transactions.php" class="nav_link">
                        <i class='bi bi-cash-coin nav_icon'></i>
                        <span class="nav_name">Transactions</span>
                    </a>
                    <a href="../transactions/sendmoney.php" class="nav_link active">
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
            <a href="../login/logout.html" class="nav_link">
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
                <h2>Send Money</h2>
            </div>
        </div>
        <div class="row justify-content-center my-md-5">
            <div class="col-sm-8">
                <form action="sendmoney.php" method="POST">
                    <?php
                    date_default_timezone_set('Asia/Jakarta');
                    ?>
                    <input type="hidden" name="tanggal" value="<?php echo date("Y-m-d"); ?>">
                    <input type="hidden" name="waktu" value="<?php echo date("H:i:s"); ?>">
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="text" name="amount" class="form-control" id="amount" placeholder="Rp 00000">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" name="deskripsi" class="form-control" id="description" placeholder="Write Here">
                    </div>
                    <div class="mb-3">
                        <label for="Accountnumber" class="form-label">Account Number</label>
                        <input type="text" name="no_akun" class="form-control" id="Accountnumber" placeholder="Write Here">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Payment Method</label>
                        <select class="form-select" name="method" aria-label="Default select example">
                            <option selected>Select Payment Method</option>
                            <option name="Credit Cards" value="Credit Cards">Credit Cards</option>
                            <option name="Debit Cards" value="Debit Cards">Debit Cards</option>
                            <option name="Bank Account" value="Bank Account">Bank Account</option>
                        </select>
                    </div>
                    <button type="submit" name="Submit" class="btn btn-outline-primary mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!--Container Main end-->
</body>