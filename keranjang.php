<?php 

include 'header.php';


if (!isset($_SESSION['pelanggan']))
{
  echo "<script>alert('Silahkan Login Terlebih Dahulu');</script>";
  echo "<script>location='login.php';</script>";
  header('location:login.php');
  exit();
}

if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))
{
  echo "<script>alert('keranjang kosong, silahkan belanja terlebih dahulu');</script>";
  echo "<script>location='index.php';</script>";
}
?>



<!-- Cart -->

  <div class="cart_section">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="cart_container">
            <div class="cart_title">Shopping Cart</div>

             <?php
                    //MENAMPILKAN DETAIL KERANJANG BELANJA//
                 $nomor=0;           
                $total = 0;
                //mysql_select_db($database_conn, $conn);
                if (isset($_SESSION['keranjang'])) {
                    foreach ($_SESSION['keranjang'] as $key => $val) {
                        $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id_produk = '$key'");
                        $data = mysqli_fetch_array($query);

                        $jumlah_harga = $data['harga_produk'] * $val;
                        $total += $jumlah_harga;
                        $nomor++;
                        $berat=$data['berat']*$val;
                        ?>

            <div class="cart_items">
              <ul class="cart_list">
                <li class="cart_item clearfix">

                  <div class="cart_item_image"><img src="foto_produk/<?php echo $data['foto_produk'];?>" alt=""></div>
                  <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                    <!-- <div class="cart_item_number cart_info_col">
                      <div class="cart_item_title">No</div>
                      <div class="cart_item_text"><?php echo $nomor ; ?></div>
                    </div> -->
                    <div class="cart_item_name cart_info_col">
                      <div class="cart_item_title">Name</div>
                      <div class="cart_item_text"><?php echo $data['nama_produk']; ?></div>
                    </div>
                    <div class="cart_item_weight cart_info_col">
                      <div class="cart_item_title">weight</div>
                      <div class="cart_item_text"><?php echo number_format($val); ?></div>
                    </div>
                    <div class="cart_item_quantity cart_info_col">
                      <div class="cart_item_title">Quantity</div>
                      <div class="cart_item_text"><?php echo $berat; ?> Gr</div>
                    </div>
                    <div class="cart_item_price cart_info_col">
                      <div class="cart_item_title">Price</div>
                      <div class="cart_item_text">Rp. <?php echo number_format($jumlah_harga); ?></div>
                    </div>
                    <div class="cart_item_aksi cart_info_col">
                      <div class="cart_item_title">Action</div>
                      <div class="cart_item_text"><a href="hapuskeranjang.php?id=<?php echo $key?>" class="btn btn-danger btn-xs">hapus</a></center></div>
                    </div>

                  </div>
                </li>
              </ul>
            </div>

            <?php
                    //mysql_free_result($query);      
            }
              //$total += $sub;
            }?>
                        <?php
        if($total == 0){ ?>
          <td colspan="4" align="center"><?php echo "Keranjang Kosong!"; ?></td>
        <?php } else { ?>
          <?php $nomor++; ?>

            <!-- Order Total -->
            <div class="order_total">
              <div class="order_total_content text-md-right">
                <div class="order_total_title">Order Total:</div>
                <div class="order_total_amount"> Rp. <?php echo number_format($total); ?> </div>
              </div>
            </div>
            <?php } ?>

            <div class="cart_buttons">
              <a href="index.php" type="button" class="button cart_button">Lanjutkan Belanja</a>  
              <a href="checkout.php" type="button" class="button cart_button">Checkout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


    <!-- Newsletter -->

 

<?php 
 include 'footer.php';
 ?>