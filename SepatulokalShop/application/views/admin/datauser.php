<section class="cart_area">
      <div class="container">
        <div class="banner_content text-center mb-3 mt-5">
               <h2>Pengguna</h2>
               <div class="page_link">
                  <a href="<?= base_url('admin'); ?>">Beranda</a>
               </div>
            </div>
         <div class="cart_inner">
          <div class="col-md-6 mb-4">
      
    </div>
            <?= $this->session->flashdata('pesan'); ?>   
            <div class="table-responsive">
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">No</th>
                        <th scope="col">User</th>
                        <th scope="col">Id User</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">No Tlp</th>
                        <th colspan="2" scope="col">Sebagai</th>
                     </tr>
                  </thead>
                  <?php 
               $no = 1;
               $subtotal = 0;
                 foreach ($pengguna as $hm) :
      $id_user = $hm['id_user'];
      $nama = $hm['nama'];
      $notlp = $hm['notlp'];
      $photos = $hm['photos'];
      $username = $hm['username'];
      $email = $hm['email'];
      $level = $hm['level'];
      ?>
                  <tbody>
                     <tr>
                        <td>
                           <h5><?= $no;  ?></h5>
                        </td>
                        <td>
                           <div class="media">
                              <div class="d-flex">
                                 <a href="<?= base_url('admin/detailuser/').$id_user; ?>" title="Lihat profile"><img src="<?= base_url('assets/img/profile/').$photos; ?>" alt="" width="100px" height="100px" class="img-profile rounded-circle mt-4">
                              </div>
                              <div class="media-body">
                                 <p><?= $username; ?></p>
                              	</a>
                              </div>
                           </div>
                        </td>
                        <td>
                           <h5><?= $id_user; ?></h5>
                        </td>
                        <td>
                           <h5><?= $nama; ?></h5>
                        </td>
                        <td>
                           <h5><?= $email; ?></h5>
                        </td>
                        <td>
                           <h5><?= $notlp; ?></h5>
                        </td>
                        <td>
                        	<?php if($level == 1){?>
                			<a title="jadikan admin" href="<?= base_url('admin/setAdmin/').$id_user; ?>" onclick="return confirm('Jadikan Admin?');" >Customer</a>
              				<?php } ?>
              				<?php if($level == 2){?>
                			<a title="jadikan customer" href="<?= base_url('admin/setCustomer/').$id_user; ?>" onclick="return confirm('Jadikan Customer?');" >Admin</a>
              				<?php } ?>
                        </td>
                        <td>
                          <a href="<?= base_url('admin/hapususer/').$id_user; ?>" onclick="return confirm('yakin?');">Hapus</a>
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

