 <?php
include "../../config/database.php";
$data_pembelian = mysqli_fetch_array(mysqli_query($mysqli, "select * from pembelian where id_pembelian='$_GET[id_pembelian]'"));
$data_pembelian = array('subtotal'   	=>  $data_pembelian['subtotal'],);
print $data_pembelian['subtotal'];
?>