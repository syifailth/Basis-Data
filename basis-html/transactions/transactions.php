<?php
session_start();
include_once("../login_system/config.php");
if (!isset($_SESSION['email'])){
    header('location:../main/main.php');
  }
$mail = $_SESSION['email'];

$hasil = mysqli_query($kon, "SELECT * FROM transaksi WHERE email = '$mail'");

?>


<head>
    <title>Transactions</title>
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
                    <a href="../transactions/transactions.php" class="nav_link active">
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

    <!--Container Main start-->
    <div class="height-100">
        <div class="row text-center">
            <div class="col">
                <h2>Transactions</h2>
            </div>
        </div>
        <div class="row justify-content-center my-md-5">
            <div class="col-sm-10">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Description</th>
                            <th scope="col">Account Number</th>
                            <th scope="col">Method</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($user_data = mysqli_fetch_array($hasil)){
                            echo "<tr>";
                            echo "<td>". $user_data['date']."</td>";
                            echo "<td>". $user_data['time']."</td>";
                            echo "<td>". rupiah($user_data['amount'])."</td>";
                            echo "<td>". $user_data['description']."</td>";
                            echo "<td>". $user_data['no_akun']."</td>";
                            echo "<td>". $user_data['method']."</td>";
                            echo "<tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Container Main end-->
</body>