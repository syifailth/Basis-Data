<head>
    <title>Main</title>
    <!-- Serba - Serbi Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- My Css -->
    <link rel="stylesheet" href="main.css"> 
    <script src="../sidebar/sidebar.js"></script>
</head>

<style>
    h1{
    font-family: 'DM Serif Display', serif;
    color: #424874;
    font-size: 14vh;
    }
    .jeruk{
        padding: 15vh;
    }
    button{
        margin: 5vh;
        padding: 10px 10px 10px 10px;
        background-color: #A6B1E1;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s ease 0s;
    }

    button:hover{
        background-color: #424874;
        color: #A6B1E1;
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
        <div class="text-center jeruk">
            <h1>Bank Indoensia</h1>
            <p>
                Dalam kapasitasnya sebagai bank sentral, Bank Indonesia mempunyai satu tujuan tunggal, 
                yaitu mencapai dan memelihara kestabilan nilai rupiah. Untuk mencapai tujuan tersebut 
                Bank Indonesia bertugas untuk  mengelola tiga bidang yaitu Moneter, Sistem Pembayaran, 
                dan Stabilitas Sistem Keuangan. Ketiga bidang tugas tersebut perlu diintegrasi agar 
                tujuan tunggal dapat dicapai secara efektif dan efisien.
            </p>
            <center><a href="../login/login.php" class="cta"><button>Sign In / Sign Up</button></button></a></center>
        </div>
    </div>
    <!--Container Main end-->
</body>