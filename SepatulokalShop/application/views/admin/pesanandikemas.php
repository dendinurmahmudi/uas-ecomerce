<section class="cart_area">
      <div class="container">
        <div class="banner_content text-center mb-3 mt-5">
               <h2>Dikemas</h2>
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
                        <th colspan="2" scope="col">Opsi</th>
                     </tr>
                  </thead>
                  <?php 
               $no = 1;
               $subtotal = 0;
                 foreach ($kemasan as $ps) :
      $id = $ps['id_pesanan'];
      $idp = $ps['id_pemesan'];
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
                           <h5><?= $this->ecomerce_models->arrayPesananadm($status); ?></h5>
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
                        <td>
                          <a href="#" data-toggle="modal" data-target="#edit<?=$id;?>">Update</a>
                        </td>
                     </tr>
<form class="row contact_form" action="<?= base_url('admin/editstatus'); ?>" method="post" enctype="multipart/form-data">
  <div class="modal fade" id="edit<?=$id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Update</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
          
              <div class="col-md-12 form-group">
                <span>Id Pesanan</span><input type="text" class="form-control" id="idpemesan" name="idpemesan" value="<?= $idp; ?>"readonly>
              </div>
              <div class="col-md-6 form-group">
                <span>Nomor resi</span><input type="text" class="form-control" id="nomorresi" name="nomorresi" required value="">
              </div>
              <div class="col-md-6 mt-4 mb-4">
                <select class="form-control" name="status" id="status">
                  <option value="<?= $status; ?>"><?= $this->ecomerce_models->arrayPesananadm($status); ?></option>
                    <?php 
                    $nom=3;
                    foreach ($this->ecomerce_models->arraystatus1() as $status ): ?>
                  <option value="<?= $nom; ?>"><?= $status; ?></option>
                    <?php 
                    $nom++;
                    endforeach; ?>
                </select>
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