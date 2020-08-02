<section class="banner_area hot_deals_area">
   <div class="d-flex align-items-center hot_deal_box">
      <img class="img" height="275dp" width="100%" src="<?= base_url('assets/'); ?>img/banner/sepatu/bannersepatucart.jpg">
         <div class="content mt-5">
            <div class="mt-4">
               <h2>Dikirim</h2>
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
          <div class="col-md-6 mb-4">
    </div>
            <?= $this->session->flashdata('pesan'); ?>   
            <div class="table-responsive">
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">No</th>
                        <th scope="col">Id Pesanan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tgl pesan</th>
                        <th colspan="2" scope="col">Opsi</th>
                     </tr>
                  </thead>
                  <?php 
               $no = 1;
               $subtotal = 0;
                 foreach ($kemasan as $ps) :
      $id = $ps['id_pesanan'];
      $status = $ps['status_pesanan'];
      $nama = $ps['username'];
      $tgl = $ps['tgl'];
      ?>


                  <tbody>
                     <tr>
                        <td>
                           <h5><?= $no;  ?></h5>
                        </td>
                        <td>
                           <h5><?= $id; ?></h5>
                        </td>
                        <td>
                           <h5><?= $this->ecomerce_models->arrayPesanan($status); ?></h5>
                        </td>
                        <td>
                           <h5><?= $tgl; ?></h5>
                        </td>
                        <td>
                           <a href="<?= base_url('ecomerce/detailpesanan/').$id; ?>">Detail</a>
                        </td>
                        <td>
                          <a href="<?= base_url('ecomerce/pesananditerima/').$id; ?>" onclick="return confirm('Konfirmasi pesanan telah diterima?');">Pesanan diterima</a>
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

<form action="" method="post" enctype="multipart/form-data">

<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">update <?= $id; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
          <div class="input-group mb-3 mt-2">
            <input type="text" name="nama" class="form-control" placeholder="Nama kategori" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
    </div>
   </form>