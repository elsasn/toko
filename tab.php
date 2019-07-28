<?php
	if(!isset($_SESSION['pelanggan']))
	{
		echo "<div class="row">
    <div class="col-md-4 clearfix">
      <div class="logo pull-left">
        <a href="index.html"><img src="assets/images/home/logo.png" alt="" /></a>
      </div>
      
    </div>
    <div class="col-md-8 clearfix">
      <div class="shop-menu clearfix pull-right">
        <ul class="nav navbar-nav">
          <li><a href="admin/index.php"><i class="fa fa-lock"></i> Login</a></li>
          <li><a href="registrasi.php"><i class="fa fa-star"></i> Registrasi</a></li>
          <li><a href="keranjang.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
        </ul>
      </div>
    </div>
  </div>";
	}
	else
	{
		echo "<div id='top-links' class='nav pull-right flip'>
            <ul>
              <li><a href='profil.php'>Akun</a></li>
              <li><a href='logout.php'>Logout</a></li>
               <li class='dropdown user user-menu'>
                            <a href='' class='dropdown-toggle' data-toggle='dropdown'>
                                <i class='glyphicon glyphicon-user'></i>
                            </a>
                            <ul class='dropdown-menu'>
                                <!-- User image -->
                                <li class='user-header bg-light-blue'>
                                        <a href='profil.php' class='btn btn-default btn-flat'>Profile</a>
                                </li>
                                <li class='user-header bg-light-blue'>
                                        <a href='riwayat.php' class='btn btn-default btn-flat'>Riwayat</a>
                                </li>
                                <li class='user-header bg-light-blue'>
                                        <a href='logout.php' class='btn btn-default btn-flat'>Logout</a>
                                </li>
                                <!-- Menu Body -->
                               
                                
                            </ul>
                        </li>
            </ul>
          </div>";
	}
 ?>