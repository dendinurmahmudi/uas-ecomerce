<section class="checkout_area section_gap">
		<div class="container">
			<div class="banner_content text-center mb-3 mt-3">
					<h2>Edit Status</h2>
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
						<h3>Status</h3>
						<form class="row contact_form" action="<?= base_url('admin/editstatus'); ?>" method="post" enctype="multipart/form-data">
							<div class="col-md-12 form-group">
								<span>Id Pesanan</span><input type="text" class="form-control" id="idpemesan" name="idpemesan" value="<?= $pesanan['id_pemesan']; ?>"readonly>
							</div>
							<div class="col-md-6 form-group">
								<span>Nomor resi</span><input type="text" class="form-control" id="nomorresi" name="nomorresi" value="" required>
							</div>
							<div class="col-md-6 mt-4 mb-4">
								<select class="form-control" name="status" id="status">
									<option value="<?= $pesanan['status_pesanan']; ?>"><?= $this->ecomerce_models->arrayPesananadm($pesanan[
										'status_pesanan']); ?></option>
										<?php 
										$no=3;
										foreach ($this->ecomerce_models->arraystatus1() as $status ): ?>
									<option value="<?= $no; ?>"><?= $status; ?></option>
										<?php 
										$no++;
										endforeach; ?>
								</select>
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