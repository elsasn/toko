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
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $id  = mysqli_real_escape_string($mysqli, trim($_POST['id']));
            $province_id  = mysqli_real_escape_string($mysqli, trim($_POST['province_id']));
            $name  = mysqli_real_escape_string($mysqli, trim($_POST['name']));
            
            //$created_user = $_SESSION['id_user'];
            // perintah query untuk menyimpan data ke tabel obat
            //print_r($query);
            $query = mysqli_query($mysqli, "INSERT INTO regencies(id,province_id,name)
                VALUES ('$id','$province_id','$name')")
                or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    
            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=kabupaten&alert=1");
                
            }   
        }   
    }
    
    elseif ($_GET['act']=='update') {
        if (isset($_POST['simpan'])) {
            if (isset($_POST['id'])) {
                // ambil data hasil submit dari form
            $id  = mysqli_real_escape_string($mysqli, trim($_POST['id']));
            $province_id  = mysqli_real_escape_string($mysqli, trim($_POST['province_id']));
            $name  = mysqli_real_escape_string($mysqli, trim($_POST['name']));
            
                //$updated_user = $_SESSION['id_user'];
                // perintah query untuk mengubah data pada tabel 
                $query = mysqli_query($mysqli, "UPDATE regencies SET  id   = '$id',
                                                                    province_id       = '$province_id',
                                                                    name             = '$name'
                                                              WHERE id       = '$id'")
                                                or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));
                // cek query
               //print_r($query);die();
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil update data
                    header("location: ../../main.php?module=kabupaten&alert=2");
                    }
                }         
            }
        }
    }
    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel 
            $query = mysqli_query($mysqli, "DELETE FROM regencies WHERE id='$id'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));
            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=kabupaten&alert=3");
            }
        }
    }       
}       
?>