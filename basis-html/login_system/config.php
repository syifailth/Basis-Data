<?php
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}
// parameter = hostname, username, password, database
$kon = mysqli_connect('localhost', 'root', '', 'user_form'); //true|false

if (!$kon) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
