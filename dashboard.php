<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOKO</title>
    <link rel="stylesheet" href="style.css">
    <style>
@import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800&display=swap');
</style>
</head>
<body>

<h2 id="header">TOKO ONLINE</h2>


  <div class ="container">
<?php 
// Mengambil action dari file koneksi.php
include "toko_online.php";
// Memanggil semua data dalam tabel gambar
$query = "SELECT * FROM produk";
// Eksekusi/Jalankan query dari variabel $query
$sql = mysqli_query($conn, $query);
// Ambil jumlah data dari hasil eksekusi $sql
$row = mysqli_num_rows($sql);
// Kondisi perulangan Jika jumlah data lebih dari 0 (Berarti jika data ada)
if($row > 0){
    // Mengambil semua data dari hasil eksekusi $sql

    echo "<div class='wrapper' >";
  while($dt_prd = mysqli_fetch_array($sql)){
    echo "<ul>";
    echo "<li>"."<img src='gambar/".$dt_prd['foto']."' width='150' height='130' class='gambar'> <br>"."</li>";
    echo "<li>"."<div class ='judul'>Nama Produk: </div>".$dt_prd['nama_produk']."</li>"."<br>";
    echo "<li>"."<div class ='judul'>Deskripsi: </div>".$dt_prd['deskripsi']."</li>"."<br>";
    echo "<li>"."<div class ='judul'>Harga: </div>"."<span>Rp.</span>".$dt_prd['harga']."</li>"."<br>";
    echo "<li>"."<form ><a href='beli.php?id_produk=".$dt_prd['id_produk']."' onclick='toggleModal(); return false;' id='tombol'>Modify</a></form>";
  // <!-- <a href='?id_buku=  class='btn'>Beli</a> -->
  ?>

     <?php
    echo "</ul>";
  }
  echo "</div>";
}
  


?>


</body>
</html>