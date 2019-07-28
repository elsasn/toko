<?php

if(!isset($_SESSION)){
	session_start();
}
include 'koneksi.php';


?>
<div class="header-middle"><!--header-middle-->
<div class="container">
	<div class="row">
		<div class="col-md-4 clearfix">
			<div class="logo pull-left">
				<a href="index.php"><img src="assets/images/home/logo.png" alt="" /></a>
			</div>
			
		</div>
		<div class="col-md-8 clearfix">
			<div class="shop-menu clearfix pull-right">
				<ul class="nav navbar-nav">
					<li><a href="login.php"><i class="fa fa-lock"></i> Login Pelanggan</a></li>
					<li><a href="admin/index.php"><i class="fa fa-lock"></i> Login Admin</a></li>
					<li><a href="registrasi.php"><i class="fa fa-star"></i> Registrasi</a></li>
					<li><a href="keranjang.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
</div><!--/header-middle-->
<div class="header-bottom"><!--header-bottom-->
<div class="container">
	<div class="row">
		<div class="col-sm-9">
			<div class="navbar-header">
				
			</div>
			<div class="mainmenu pull-left">
				<ul class="nav navbar-nav collapse navbar-collapse">
					<li><a href="index.php" class="active">Home</a></li>
					<li><a href="produk.php" class="active">Produk</a></li>
					<li><a href="blogger.com" class="active">Blog</a></li>
					<li><a href="kontak.php">Contact</a></li>
				</ul>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="search_box pull-right">
				<input type="text" placeholder="Search"/>
			</div>
		</div>
	</div>
</div>
</div><!--/header-bottom-->
</header><!--/header-->
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Category</h2>
					<div class="panel-group category-products" id="accordian"><!--category-productsr-->
					
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordian" href="#mens">
								<span class="badge pull-right"><i class="fa fa-plus"></i></span>
								All Categories
							</a>
							</h4>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<?php
													$sql = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori ASC ");
													while($data = mysqli_fetch_array($sql)){
									?>
									<li><a href="index.php?k=<?= $data['id_kategori']; ?>"><?= $data['nama']; ?></a></li>
									<?php } ?>
								</ul>
							</div>
						</div>
					</div>
					</div><!--/category-products-->
				
					
				</div>
			</div>
			