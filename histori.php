<?php
include "header.php";
?>
<?php 
    error_reporting(E_ERROR | E_PARSE);
    session_start();
    $id = $_SESSION['id_pelanggan'];
?>
<h2>Histori Pembelian Produk</h2>
<table class="table table-hover table-striped">
    <thead>
        <th>NO</th><th>Tanggal transaksi</th><th>Nama Produk</th><th>Jumlah</th><th>Harga</th><th>Total Harga</th><th>Aksi</th>
    </thead>
    <tbody>
        <?php 
        include "toko_online.php";
        $sql = mysqli_query($conn, "SELECT A.nama_produk,B.tgl_transaksi,A.harga,C.qty,C.subtotal,B.id_transaksi FROM produk A JOIN transaksi B ON A.id_produk=B.id_produk JOIN detail_transaksi C ON B.id_transaksi=C.id_transaksi WHERE B.id_pelanggan='$id'" );
    

$no=0;

while($histori = mysqli_fetch_array($sql)){
    $no++;
    $hapus="<td><a href='hapushistori.php?id_transaksi=$histori[id_transaksi]' onclick='return confirm(Apakah anda yakin menghapus data ini?)' class='btn btn-danger'>Hapus Histori</a></td>";
?>
<tr>
                <td><?=$no?></td>
                <td><?=$histori['tgl_transaksi']?></td>
                <td><?=$histori['nama_produk']?></td>
                <td><?=$histori['qty']?></td>
                <td><?=$histori['harga']?></td>
                <td><?=$histori['subtotal'].$hapus?></td>
            </tr>
            <?php
}
            ?>