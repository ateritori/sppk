<?php
// Informasi koneksi database
$servername = "localhost";   // Nama server
$username = "n1576310_otorita";         // Username MySQL
$password = "W0n0s4r128";              // Password MySQL
$dbname = "n1576310_sppksaw";          // Nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
	die("Koneksi gagal: " . $conn->connect_error);
}
