<?php
include 'header.php';
include 'top_header.php';
include 'koneksi.php';
include 'sidebar.php';
$id_produk = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk= '$id_produk'");
$detail = $ambil->fetch_assoc();
?>
<div class="col-sm-7">

	<div class="product_description">
		<img src="admin/images/<?php echo $detail['gambar'];?>" width="300px">
		<div class="product_name"><?php echo $detail["nama"] ?></div>
		<div class="product_name"><p>Deskripsi: <?php echo $detail["ket"]; ?></p></div>
		<div class="product_name"><p>Stok: <?php echo $detail['stok'] ?></p></div>
		<div class="product_price">Rp. <?php echo number_format($detail["harga"]); ?></div>
		<div class="order_info d-flex flex-row">
			<form method="post">
				
				<div class="button_container">
					<div class="form-group">
						<div class="input-group">
							<input  type="number" required min="1" class="form-control" name="jumlah" max="<?php echo $detail['stok'] ?>">
							<div class="input-group-btn">
								<button class="button cart_button" name="beli">Add to Cart</button>
								<div class="product_fav"><i class="fas fa-heart"></i></div>
							</div>
						</div>
					</div>
				</div>
				
			</form>
			<?php
			if(isset($_POST["beli"]))
			{
				$jumlah = $_POST["jumlah"];
				$_SESSION["keranjang"][$id_produk] = $jumlah;
			echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
			echo "<script>location='keranjang.php';</script>";
			}
			?>
		</div>
	</div>
	</div><!--/product-details-->