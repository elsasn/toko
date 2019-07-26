<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        // print_r($_POST);die();
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $id_pembayaran  = mysqli_real_escape_string($mysqli, trim($_POST['id_pembayaran']));
            $id_pembelian  = mysqli_real_escape_string($mysqli, trim($_POST['id_pembelian']));
            $tgl_transaksi = date('Y-m-d H:i:s');
            $subtotal  = mysqli_real_escape_string($mysqli, trim($_POST['subtotal']));
            $jumlah_bayar = mysqli_real_escape_string($mysqli, trim($_POST['jumlah_bayar']));
            $status = mysqli_real_escape_string($mysqli, trim($_POST['status']));
           

            //$created_user = $_SESSION['id_user'];

            // perintah query untuk menyimpan data ke tabel pembelian
            //print_r($query);
            $query = mysqli_query($mysqli, "INSERT INTO pembayaran (`id_pembayaran`, `id_pembelian`, `tgl_transaksi`, `subtotal`, `jumlah_bayar`, `status`) VALUES ('$id_pembayaran','$id_pembayaran','$tgl_transaksi','$subtotal','$jumlah_bayar','$status')")
                or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query

            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=pembayaran&alert=1");
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id_pembelian'])) {
                // ambil data hasil submit dari form
            $id_pembayaran  = mysqli_real_escape_string($mysqli, trim($_POST['id_pembayaran']));
            $id_pelanggan  = mysqli_real_escape_string($mysqli, trim($_POST['id_pelanggan']));
            $id_jurusan  = mysqli_real_escape_string($mysqli, trim($_POST['id_jurusan']));
            $tgl_berangkat  = mysqli_real_escape_string($mysqli, trim($_POST['tgl_berangkat']));
            $jumlah_tiket = str_replace('.', '', mysqli_real_escape_string($mysqli, trim($_POST['jumlah_tiket'])));
           


                //$updated_user = $_SESSION['id_user'];

                // perintah query untuk mengubah data pada tabel pembelian
                $query = mysqli_query($mysqli, "UPDATE pembayaran_tiket SET  id_pembayaran      = '$id_pembayaran',
                                                                    id_pelanggan                = '$id_pelanggan',
                                                                    id_jurusan|nama_jurusan     = '$id_jurusan|nama_jurusan,
                                                                    tgl_berangkat               = '$tgl_berangkat',
                                                                    jumlah_tiket                = '$jumlah_tiket'
                                                              WHERE id_pembayaran               = '$id_pembayaran'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                // cek query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=pembayaran&alert=2");
                }         
            }
        }
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id_pembayaran = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel obat
            $query = mysqli_query($mysqli, "DELETE FROM pembayaran WHERE id_pembayaran='$id_pembayaran'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=pembayaran&alert=3");
            }
        }
    }       
}       
?>