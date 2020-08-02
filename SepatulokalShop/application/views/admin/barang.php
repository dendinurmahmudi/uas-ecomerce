   <section class="cart_area">
      <div class="container">
         <div class="banner_content text-center mb-3 mt-5">
               <h2>Barang</h2>
               <div class="page_link">
                  <a href="<?= base_url('admin'); ?>">Beranda</a>
               </div>
            </div>
         <div class="cart_inner">
          <div class="col-md-6 mb-4">
      <a href="<?= base_url('admin/tambah');?>" class="btn btn-success">+ Tambah barang</a>
    </div>
            <?= $this->session->flashdata('pesan'); ?>   
            <div class="table-responsive">
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">No</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Status</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Harga</th>
                        <th colspan="2" scope="col">Opsi</th>
                     </tr>
                  </thead>
                  <?php 
               $no = 1;
               $subtotal = 0;
                 foreach ($barang as $hm) :
      $nama_product = $hm['nama_product'];
      $stok = $hm['stok'];
      $id_product = $hm['id_product'];
      $foto = $hm['foto'];
      $harga = $hm['harga'];
      $status = $hm['status'];
      $kategori = $hm['nama_category'];
      ?>


                  <tbody>
                     <tr>
                        <td>
                           <h5><?= $no;  ?></h5>
                        </td>
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
                           <h5><?= $stok; ?></h5>
                        </td>
                        <td>
                           <h5><?= $status; ?></h5>
                        </td>
                        <td>
                           <h5><?= $kategori; ?></h5>
                        </td>
                        <td>
                           <h5><?= $this->ecomerce_models->rupiah($harga); ?></h5>
                        </td>
                        <td>
                           <a href="<?= base_url('admin/getbarangbyid/').$id_product; ?>">Edit</a>
                        </td>
                        <td>
                          <a href="<?= base_url('admin/hapusbarang/').$id_product; ?>" onclick="return confirm('yakin?');">Hapus</a>
                        </td>
                     </tr>
                        <?php $no++;
                         endforeach;  ?>
                     
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </section>

   