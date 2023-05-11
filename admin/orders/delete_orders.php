<?php 
// Memanggil file dbkoneksi.php yang berisi koneksi ke database
require_once '../../dbkoneksi.php';

// Mendapatkan nilai dari parameter 'id' pada URL
$_id = $_GET['id'];

// Query DELETE untuk menghapus data pada tabel 'orders' dengan kondisi 'id' = $_id
$sql = "DELETE FROM orders WHERE id = ?";

// Menyiapkan statement SQL
$st = $dbh->prepare($sql);

// Menjalankan statement SQL dengan mengirimkan nilai parameter $_id
$st->execute([$_id]);

// Mengarahkan halaman ke orders.php setelah data berhasil dihapus
header('location:orders.php');
?>