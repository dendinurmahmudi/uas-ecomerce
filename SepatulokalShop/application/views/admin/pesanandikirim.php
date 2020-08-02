<section class="cart_area">
      <div class="container">
        <div class="banner_content text-center mb-3 mt-5">
               <h2>Dikirim</h2>
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
                        <th scope="col">Id Pesanan</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tgl pesan</th>
                        <th scope="col">Akun Pemesan</th>
                        <th scope="col">Opsi</th>
                     </tr>
                  </thead>
                  <?php 
               $no = 1;
               $subtotal = 0;
                 foreach ($kiriman as $ps) :
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
                           <h5><?= $nama; ?></h5>
                        </td>
                        <td>
                           <a href="<?= base_url('admin/detailpesanan/').$id; ?>">Detail</a>
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