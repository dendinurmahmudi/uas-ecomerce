<style type='text/css'>
		input.input{
			border-bottom: none;
			border-left: none;
			border-right: none;
			border-top: none;
			outline: none;
		}
		input.input1{
			border-bottom: none;
			border-left: none;
			border-right: none;
			border-top: none;
			color: white;
		}
	</style>
<section class="checkout_area section_gap">
		<div class="container">
			<div class="banner_content text-center mb-3 mt-5">
               <h2>Edit Barang</h2>
               <div class="page_link">
                  <a href="<?= base_url('admin'); ?>">Beranda</a>
               </div>
            </div>
			<div>
    		<?= $this->session->flashdata('pesan'); ?>

  			</div>
			<div class="billing_details">
				<div class="row">
					<div class="col-lg-4 mt-4">
						<div class="order_box">
							<form class="row contact_form" action="<?= base_url('admin/editbarang'); ?>" method="post" enctype="multipart/form-data">
							<h2>Foto Produk</h2>
							<a data-toggle="modal" data-target="#lihatfoto" id="btn-tambahUlasan" href=""><img src="<?= base_url('assets/img/product/product/').$detail['foto']; ?>" width="330dp" height="320dp" title="Lihat Foto"></a>
							<div class="text-center mt-5">
                            <input type="file"  id="foto" name="foto" class="custom-file-input">
                            <label for="foto" class="main_btn">Ubah Foto</label>
                        </div>
						</div>
					</div>
					<div class="col-lg-8">
						<h3>Detail Produk</h3>
							<div class="col-md-6 form-group">
								<span>Id Produk</span><input type="text" class="form-control" id="id_produk" name="id_produk" placeholder="Nama" value="<?= $detail['id_product']; ?>"readonly>
							</div>
							<div class="col-md-12 mb-4">
								<span>Nama Barang</span><input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $detail['nama_product']; ?>">
							</div>
							<div class="col-md-12 mb-4">
								<span>Harga</span><input type="text" class="form-control" id="harga" name="harga" placeholder="Username" value="<?= $detail['harga']; ?>">
							</div>
							<div class="col-md-6 mb-4">
								<span>Stok</span><input type="text" class="form-control" id="stok" name="stok" placeholder="Belum di atur" value="<?= $detail['stok']; ?>" readonly><a data-toggle="modal" data-target="#tambahstok" href="" title="">Tambah Stok</a>
							</div>
							<div class="col-md-6 mb-4">
								<span>Status</span>
								<select class="form-control" name="status" id="status">
                              <option value="<?= $detail['status'];?>"><?= $detail['status'];?></option>
                              <option value="on">on</option>
                              <option value="off">off</option>
                            </select>
							</div>
							<div class="col-md-6 mb-4">
							<span>Kategori</span><select class="form-control" name="kategori" id="kategori" required>
								<option value="<?=$detail['id_category']; ?>"><?=$detail['nama_category']; ?></option>
								<?php foreach ($kategory as $key): ?>
                                <option value="<?=$key['id_category']; ?>"><?=$key['nama_category']; ?></option>
                            <?php endforeach; ?>
                            </select>
                            </div>
							<div class="col-md-12 mb-4">
                            <span>Deskripsi Produk</span><textarea class="form-control" name="deskripsi" id="deskripsi" rows="4" placeholder="Belum diatur"><?= $detail['deskripsi']; ?></textarea>
                        	</div>
							<div class="col-md-3 form-group p_star">
                                <button type="submit" name="submit" value="submit" class="main_btn">Simpan</button>
							</div>
					</div>
					
				</div>
			</form>
			</div>
		</div>
	</section>

	<div class="modal fade" id="lihatfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle"><?=$detail['nama_product']; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
          <img src="<?= base_url('assets/img/product/product/').$detail['foto']; ?>" width="467dp" height="400dp" >
        </div>
      </div>
    </div>
    </div>
    <!--  -->

       <form class="row contact_form" action="<?= base_url('admin/tambahstok/').$detail['id_product']; ?>" method="post" enctype="multipart/form-data">
	<div class="modal fade" id="tambahstok" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle"><?=$detail['nama_product']; ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
        	<label>Tambah Stok</label>
          <input type="text" name="tambahstok" value="" placeholder="Masukan stok yang akan ditambahkan" class="form-control">
       	  <input type="text" class="input1" id="stok" name="stok" placeholder="Belum di atur" value="<?= $detail['stok']; ?>" readonly>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
		</form>
        </div>
      </div>
    </div>
    </div>