<section class="banner_area hot_deals_area">
   <div class="d-flex align-items-center hot_deal_box">
      <img class="img" height="275dp" width="100%" src="<?= base_url('assets/'); ?>img/banner/sepatu/bannersepatucart.jpg">
         <div class="content mt-5">
            <div class="mt-4">
               <h2>Keranjang</h2>
               <div class="page_link">
                  <a href="<?= base_url('ecomerce'); ?>">Beranda</a>
               </div>
            </div>         
         </div>
   </div>
   <!--================End Home Banner Area =================-->

   <!--================Cart Area =================-->
   
      <div class="container mt-5">
         <div class="cart_inner">
            <?= $this->session->flashdata('pesa'); ?>   
            <div class="table-responsive">
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th colspan="2" scope="col">Opsi</th>
                     </tr>
                  </thead>
                  <?php 
               $no = 1;
               $subtotal = 0;
                 foreach ($keranjang as $hm) :
      $nama_product = $hm['nama_product'];
      $quantity = $hm['jumlah'];
      $foto = $hm['foto'];
      $harga = $hm['harga'];
      $idproduct = $hm['id_product'];
      
      $total = $quantity * $harga;
      $subtotal = $subtotal + $total;
      ?>


                  <tbody>
                     <tr>
                        <td>
                           <div class="media">
                              <div class="d-flex">
                                 <img src="<?= base_url('assets/img/product/product/').$foto; ?>" alt="" width="100px" height="100px">
                              </div>
                              <div class="media-body">
                                 <p><?= $nama_product; ?></p>
                              </div>
                           </div>
                        </td>
                        <td>
                           <h5><?= $this->ecomerce_models->rupiah($harga); ?></h5>
                        </td>
                        <td>
                           <h5><?= $quantity; ?></h5>
                        </td>
                        <td>
                           <h5><?=$this->ecomerce_models->rupiah($total); ?></h5>
                        </td>
                        <td>
                           <a href="<?= base_url('ecomerce/editkeranjang/').$id_user."/".$idproduct; ?>">Edit</a>
                        </td>
                        <td>
                           <a href="" title="">Hapus</a>
                        </td>
                     </tr>
                        <?php endforeach;  ?>
                     <tr class="bottom_button">
                        
                     </tr>
                     <tr>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>
                           <h5>Subtotal</h5>
                        </td>
                        <td>
                           <h5><?= $this->ecomerce_models->rupiah($subtotal); ?></h5>
                        </td>
                     </tr>
                     
                     <tr class="out_button_area">
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>

                        </td>
                        <td>
                           <div class="checkout_btn_inner">
                              <a class="gray_btn" href="<?= base_url('ecomerce') ?>">Lanjut Belanja</a>
                              <a class="main_btn" href="<?= base_url('ecomerce/checkout/').$id_user;?>">Checkout</a>
                           </div>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </section>

   