<section class="checkout_area section_gap">
		<div class="container">
			<div class="banner_content text-center mb-3 mt-5">
               <h2>Eidt Kategori</h2>
               <div class="page_link">
                  <a href="<?= base_url('admin'); ?>">Beranda</a>
               </div>
            </div>
			<div>
    		<?= $this->session->flashdata('pesan'); ?>

  			</div>
			<div class="billing_details">
				<div class="row">
					<div class="col-lg-8">
						<h3>Kategori</h3>
						<form class="row contact_form" action="<?= base_url('admin/editkategori'); ?>" method="post" enctype="multipart/form-data">
							<div class="col-md-6 form-group">
								<span>Id Kategori</span><input type="text" class="form-control" id="idkategori" name="idkategori" value="<?= $kategory['id_category']; ?>"readonly>
							</div>
							<div class="col-md-12 mb-4">
								<span>Nama Kategori</span><input type="text" class="form-control" id="nama" name="nama" value="<?= $kategory['nama_category']; ?>">
							</div>
							
							<div class="col-md-3 form-group p_star">
                                <button type="submit" name="submit" value="submit" class="main_btn">Simpan</button>
							</div>
						</form>
					</div>
				</div>
			</form>
			</div>
		</div>
	</section>