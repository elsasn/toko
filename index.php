<?php
include 'koneksi.php';
if(!isset($_SESSION)){
	session_start();
}
include 'header.php';
include 'top_header.php';
include 'sidebar.php';
?>
<div class="col-sm-9 padding-right">
	<div class="features_items"><!--features_items-->
	<h2 class="title text-center">Features Items</h2>
	<?php
			$produk = "SELECT * FROM produk";
			if (isset($_GET['k'])) {
				$produk .= " WHERE id_kategori='$_GET[k]'";
			}
			if(isset($_GET['c'])){
				$produk .= " WHERE nama LIKE '%$_GET[c]%'";
			}
			$ambil = $koneksi->query($produk);
	while ($perproduk = $ambil->fetch_assoc()) { ?>
	<div class="product_item is_new">
		<div class="col-sm-4">
			<div class="product_image d-flex flex-column align-items-center justify-content-center" width='100px' height='10px'><img  width='90px' height='100px' src="admin/images/<?php echo $perproduk['gambar'];?>"></div>
			<div class="product_content">
				<div class="product_name"><div><a href="#" tabindex="0"><?php echo $perproduk['nama'];?></a>
			</div></div>
			<h6>Stok :<?php echo $perproduk['stok'];?></h6>
			<div class="product_price">Rp. <?php echo number_format($perproduk['harga']); ?></div>
			<a href="beli.php?id=<?php echo $perproduk['id_produk'];?>"
			class="btn btn-primary">Beli</a>
			<a href="detail.php?id=<?php echo $perproduk['id_produk'];?>"
			class="btn btn-default">Detail</a> </center>
			
		</div>
	</div><br>
	<?php } ?>
</div>


</div><!--features_items-->



</div>
</div>
</div>
</section>
<footer id="footer"><!--Footer-->
<div class="footer-top">
<div class="container">

<div class="footer-widget">
<div class="container">
<div class="row">
	<div class="col-sm-2">
		<div class="single-widget">
			<h2>Our Address</h2>
			<h3>Alamat Alamat Alamat Alamat Alamat Alamat</h3>
		</div>
	</div>
	
	
</div>
</div>
</div>
<div class="footer-bottom">
<div class="container">
<div class="row">
	<p class="pull-left">Copyright © 2018 E-SHOPPER Inc. All rights reserved.</p>
	<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
</div>
</div>
</div>
</footer><!--/Footer-->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.scrollUp.min.js"></script>
<script src="assets/js/price-range.js"></script>
<script src="assets/js/jquery.prettyPhoto.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>