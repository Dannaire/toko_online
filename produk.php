<?php
include "header.php";
?>
<div class="container">
  <div class="row">
    <div class="col-lg-6 d-flex flex-column justify-content-center">

<h2>Daftar Produk</h2>
    </div>
  </div>
    
<div class="row">
<?php
include "toko_online.php";
$qry_buku=mysqli_query($conn,"select * from produk");
while($dt_buku=mysqli_fetch_array($qry_buku)){
?>
<div class="col-md-3">
<div class="card" >
<img src="gambar/<?=$dt_buku['foto']?>"
class="card-img-top">
<div class="card-body">
<h5 class="card-title"><?=$dt_buku['nama_produk']?></h5>
<p class="card-text"><?=substr($dt_buku['deskripsi'],
0,20)?></p>
<a
href="beli_produk.php?id_produk=<?=$dt_buku['id_produk']?>" class="btn btn-primary">Beli</a>

</div>
</div>
</div>
<?php
}
?>
</div>
<?php
include "footer.php";
?>