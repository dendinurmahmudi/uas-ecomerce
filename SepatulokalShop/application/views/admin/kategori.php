<section class="cart_area">
      <div class="container">
        <div class="banner_content text-center mb-3 mt-5">
               <h2>Kategori</h2>
               <div class="page_link">
                  <a href="<?= base_url('admin'); ?>">Beranda</a>
               </div>
            </div>
         <div class="cart_inner">
          <div class="col-md-6 mb-4">
      <a data-toggle="modal" data-target="#tambah" id="btn-tambahUlasan" href="" href="" class="btn btn-success">+ Tambah kategori</a>
    </div>
            <?= $this->session->flashdata('pesan'); ?>   
            <div class="table-responsive">
               <table class="table">
                  <thead>
                     <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Id</th>
                        <th colspan="2" scope="col">Opsi</th>
                     </tr>
                  </thead>
                  <?php 
               $no = 1;
               $subtotal = 0;
                 foreach ($kategori as $kt) :
      $id = $kt['id_category'];
      $nama = $kt['nama_category'];
      ?>


                  <tbody>
                     <tr>
                        <td>
                           <h5><?= $no;  ?></h5>
                        </td>
                        <td>
                           <h5><?= $nama; ?></h5>
                        </td>
                        <td>
                           <h5><?= $id; ?></h5>
                        </td>
                        <td>
                           <a href="#" data-toggle="modal" data-target="#edit<?=$id;?>">Edit</a>
                        </td>
                        <td>
                          <a href="<?= base_url('admin/hapuskategori/').$id; ?>" onclick="return confirm('yakin hapus <?= $nama; ?>?');">Hapus</a>
                        </td>
                     </tr>
 <form action="<?= base_url('admin/editkategori'); ?>" method="post" enctype="multipart/form-data">

<div class="modal fade" id="edit<?=$id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
          <div class="col-md-6 form-group">
                <span>Id Kategori</span><input type="text" class="form-control" id="idkategori" name="idkategori" value="<?= $id; ?>"readonly>
              </div>
              <div class="col-md-12 mb-4">
                <span>Nama Kategori</span><input type="text" class="form-control" id="nama" name="nama" value="<?= $nama; ?>">
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

<form action="<?= base_url('admin/tambahkategori'); ?>" method="post" enctype="multipart/form-data">

<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Kategori</h5>
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