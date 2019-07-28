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
          <div class="contact_form_title" align="center">Form Daftar Pelanggan</div>
          <form action="#" method="post" id="contact_form">
            
            <div class="form-group">
              <label class="control-label col-md-3">Nama</label>
              <div class="col-md-7">
                <input type="text" class="form-control" name="nama" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Email</label>
              <div class="col-md-7">
                <input type="email" class="form-control" name="email" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Password</label>
              <div class="col-md-7">
                <input type="text" class="form-control" name="password" required>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-3">Telph/Hp</label>
              <div class="col-md-7">
                <input type="number" class="form-control" name="telepon" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-7 col-md-offset-3">
                <button class="btn btn-primary" name="daftar">Daftar</button>
              </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="panel"></div>
</div>
<!-- Newsletter -->
<?php
if (isset($_POST["daftar"]))
{
$nama = $_POST["nama"];
$email = $_POST["email"];
$password = $_POST["password"];
$alamat = $_POST["alamat"];
$telepon = $_POST["telepon"];
$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email'");
$yangcocok = $ambil->num_rows;
if ($yangcocok==1)
{
echo "<script>alert('pendaftaran gagal, email sudah digunakan');</script>";
echo "<script>location='daftar.php';</script>";
}
else
{
$koneksi->query("INSERT INTO pelanggan(email_pelanggan,password_pelanggan,nama_pelanggan,no_telp,alamat_pelanggan) VALUES ('$email','$password','$nama','$telepon','$alamat')");
echo "<script>alert('pendaftaran berhasil, silahkan login');</script>";
echo "<script>location='login.php';</script>";
}
}
?>