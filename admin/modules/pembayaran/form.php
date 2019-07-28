<!-- favicon -->
<link rel="shortcut icon" href="assets/img/favicon.png">
<!-- Bootstrap CSS -->
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="assets/plugins/DataTables/css/dataTables.bootstrap4.min.css">
<!-- datepicker CSS -->
<link rel="stylesheet" type="text/css" href="assets/plugins/datepicker/css/datepicker.min.css">
<!-- Font Awesome CSS -->
<link rel="stylesheet" type="text/css" href="assets/plugins/fontawesome-free-5.4.1-web/css/all.min.css">
<!-- Sweetalert CSS -->
<link rel="stylesheet" type="text/css" href="assets/plugins/sweetalert/css/sweetalert.css">
<!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!-- Fungsi untuk membatasi karakter yang diinputkan -->
<script type="text/javascript" src="assets/js/fungsi_validasi_karakter.js"></script>
<?php
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
<!-- tampilan form add data -->
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
  <i class="fa fa-edit icon-title"></i> Data Transaksi Pembayaran
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
    <li><a href="?module=pembayaran"> Data Transaksi Pembayaran </a></li>
    <li class="active"> Tambah </li>
  </ol>
</section>
<!-- Main content -->

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" action="modules/pembayaran/proses.php?act=insert" method="POST" name="formpembayaran">
          <div class="box-body">
            <?php
            // fungsi untuk membuat kode transaksi
            $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_pembayaran,4) as kode FROM pembayaran
            ORDER BY id_pembayaran DESC LIMIT 1")
            or die('Ada kesalahan pada query tampil id_trans_pembayaran : '.mysqli_error($mysqli));
            $count = mysqli_num_rows($query_id);
            if ($count <> 0) {
            // mengambil data kode transaksi
            $data_id = mysqli_fetch_assoc($query_id);
            // print_r(ceil($data_id['kode']));die();
            $kode    = ceil($data_id['kode'])+1;
            } else {
            $kode = 1;
            }
            // buat kode_transaksi
            $tahun          = date("Y");
            $buat_id        = str_pad($kode, 4, "0", STR_PAD_LEFT);
            $id_pembayaran = "PMBYR-$tahun-$buat_id";
            ?>
            <div class="form-group">
              <label class="col-sm-2 control-label">ID Pembayaran</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="id_pembayaran" value="<?php echo $id_pembayaran; ?>" readonly required>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">ID Pembelian</label>
              <div class="col-sm-5">
                <select class="chosen-select" id="id_pembelian" name="id_pembelian" data-placeholder="-- Pilih Pembelian --"  autocomplete="off" required>
                  <option value=""></option>
                  <?php
                  $query_pembelian = mysqli_query($mysqli, "SELECT * FROM pembelian ORDER BY id_pembelian ASC")
                  or die('Ada kesalahan pada query tampil pembelian: '.mysqli_error($mysqli));
                  while ($data_pembelian = mysqli_fetch_assoc($query_pembelian)) {
                  echo"<option value=\"$data_pembelian[id_pembelian]\"> $data_pembelian[id_pembelian] | $data_pembelian[id_pelanggan] </option>";
                  }
                  ?>
                </select>
              </div>
            </div>

            <hr>
      
            <div class="form-group">
              <label class="col-sm-2 control-label">Subtotal</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="subtotal"  name="subtotal" value=""  required>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">Jumlah Bayar</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="jumlah_bayar"  name="jumlah_bayar" value=""  required>
              </div>
            </div>

            

             <div class="form-group">
              <label class="col-sm-2 control-label">Status</label>
              <div class="col-sm-5">
                 <select class="form-control" name="status" required>
                    <option value=""></option>
                <option value="Lunas">Lunas</option>
                    <option value="Belum Lunas">Belum Lunas</option>
                  </select>
              </div>
            </div>

             <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=pembayaran" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->

            </h1>
            
            <!-- Modal Footer -->
            
          </div>
        </div>
      </div>
      </div><!-- /.box body -->
      </form>
    </div>
  </div>
</div>
</section>

<?php
}
// jika form edit data yang dipilih
// isset : cek data ada / tidak
elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {
      // fungsi query untuk menampilkan data dari tabel pelanggan
      $query = mysqli_query($mysqli, "SELECT * FROM pembayaran WHERE id_pembayaran='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil Data pelanggan : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>
<section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah Pembayaran
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=pembayaran"> Pembayaran </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" action="modules/pembayaran/proses.php?act=insert" method="POST" name="formpembayaran">
          <div class="box-body">
            <?php
            // fungsi untuk membuat kode transaksi
            $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_pembayaran,4) as kode FROM pembayaran
            ORDER BY id_pembayaran DESC LIMIT 1")
            or die('Ada kesalahan pada query tampil id_trans_pembayaran : '.mysqli_error($mysqli));
            $count = mysqli_num_rows($query_id);
            if ($count <> 0) {
            // mengambil data kode transaksi
            $data_id = mysqli_fetch_assoc($query_id);
            // print_r(ceil($data_id['kode']));die();
            $kode    = ceil($data_id['kode'])+1;
            } else {
            $kode = 1;
            }
            // buat kode_transaksi
            $tahun          = date("Y");
            $buat_id        = str_pad($kode, 4, "0", STR_PAD_LEFT);
            $id_pembayaran = "PMBYR-$tahun-$buat_id";
            ?>
            <div class="form-group">
              <label class="col-sm-2 control-label">ID Pembayaran</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" name="id_pembayaran" value="<?php echo $id_pembayaran; ?>" readonly required>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">ID Pembelian</label>
              <div class="col-sm-5">
                <select class="chosen-select" id="id_pembelian" name="id_pembelian" data-placeholder="-- Pilih Pembelian --"  autocomplete="off" required>
                  <option value=""></option>
                  <?php
                  $query_pembelian = mysqli_query($mysqli, "SELECT * FROM pembelian ORDER BY id_pembelian ASC")
                  or die('Ada kesalahan pada query tampil pembelian: '.mysqli_error($mysqli));
                  while ($data_pembelian = mysqli_fetch_assoc($query_pembelian)) {
                  echo"<option value=\"$data_pembelian[id_pembelian]\"> $data_pembelian[id_pembelian] | $data_pembelian[id_pelanggan] </option>";
                  }
                  ?>
                </select>
              </div>
            </div>

            <hr>
      
            <div class="form-group">
              <label class="col-sm-2 control-label">Subtotal</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="subtotal"  name="subtotal" value=""  required>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">Jumlah Bayar</label>
              <div class="col-sm-5">
                <input type="text" class="form-control" id="jumlah_bayar"  name="jumlah_bayar" value=""  required>
              </div>
            </div>

            

             <div class="form-group">
              <label class="col-sm-2 control-label">Status</label>
              <div class="col-sm-5">
                 <select class="form-control" name="status" required>
                    <option value=""></option>
                <option value="Lunas">Lunas</option>
                    <option value="Belum Lunas">Belum Lunas</option>
                  </select>
              </div>
            </div>

             <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=pembayaran" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->

            </h1>
            
            <!-- Modal Footer -->
            
          </div>
        </div>
      </div>
      </div><!-- /.box body -->
      </form>
    </div>
  </div>
</div>
</section>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    
    <script type="text/javascript">
      $(document).ready(function() {
      // function tampil_pembelian(argument) {
      //   alret('fgfsdf');
      // }
      $('#id_pembelian').on('change', function(){
        var id_pembelian=$('#id_pembelian').val();
        console.log(id_pembelian);
        var link="http://localhost/travel/modules/pembayaran/cek_data.php?id_pembelian="+id_pembelian;
        console.log(link);
        // url for ajax http://localhost/travel/modules/pembelian/cek_data.php?id_jadwal=JDWL-000001
        $.ajax({
          url: link,
          success:function(data){
            console.log(data); // data iku isine object json key harga: xxxxk
            $('#subtotal').attr('value', data);
          }
        });
      });
    });
    </script>

<?php
}
?>