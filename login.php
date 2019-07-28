<?php
include 'header.php';
include 'top_header.php';
include 'koneksi.php';
include 'sidebar.php';
?>

  <!-- Contact Form -->

  <div class="contact_form">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="contact_form_container">
            <div class="contact_form_title" align="center">Login Pelanggan</div>

            <form action="#" method="post" id="contact_form">
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <button class="btn btn-primary" name="login">Login</button>
            <hr />
            Belum Mendaftar ? <a href="daftar.php" >klik disini </a> 
            </form>

          </div>
        </div>
      </div>
    </div>
    <div class="panel"></div>
  </div>

  <!-- Newsletter -->

 

  
<?php
if (isset($_POST['login']))
{
  $ambil = $koneksi->query("SELECT * FROM pelanggan Where email_pelanggan= '$_POST[email]'
  AND password_pelanggan = '$_POST[password]'");
  $yangcocok = $ambil->num_rows;
  if ($yangcocok==1)
  {
    $_SESSION['pelanggan']=$ambil->fetch_assoc();
    echo "<script>alert('Login Sukses')</script>";

    if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
   {
     echo "<script>location='keranjang.php';</script>"; 
    }
    else
    {
     echo "<script>location='index.php';</script>"; 
    } 
  }
  else
  {
    echo "<script>alert('Login Gagal, Periksa Kembali Akun Anda')</script>";
    echo "<script>location='login.php';</script>";
  }
}
 ?>
