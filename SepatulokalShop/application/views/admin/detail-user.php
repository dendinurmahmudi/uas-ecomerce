<section class="checkout_area section_gap">
		<div class="container">
			<div class="banner_content text-center mb-3 mt-5">
               <h2>Profile pengguna</h2>
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
						<h3>Detail Profil</h3>
						
							<div class="col-md-6 form-group">
								<span>Id User</span><input type="text" class="form-control" id="id_user" name="id_user" placeholder="Nama" value="<?= $customer['id_user']; ?>"readonly>
							</div>
							<div class="col-md-12 form-group">
								<?php  $akses=$customer['level'];
								if($akses == 1){
									$sbg = "Customer";
								 }else if($akses == 2){
								 	$sbg = "Admin";
								 }else{
								 	$sbg = "";
								 } ?>
								<span>Sebagai</span><input type="text" class="form-control" id="nama" name="nama" placeholder="" value="<?= $sbg; ?>"readonly>
							</div>
							<div class="col-md-12 form-group">
								<span>Nama</span><input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $customer['nama']; ?>"readonly>
							</div>
							<div class="col-md-12 form-group">
								<span>Username</span><input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $customer['username']; ?>"readonly>
							</div>
							<div class="col-md-12 form-group">
								<span>No Tlp/Hp</span><input type="text" class="form-control" id="notlp" name="notlp" placeholder="Belum di atur" value="<?= $user['notlp']; ?>"readonly>
							</div>
							<div class="col-md-12 form-group">
								<span>Email</span><input type="text" class="form-control" id="email" name="email" placeholder="Belum di atur" value="<?= $customer['email']; ?>"readonly>
							</div>
							<div class="col-md-12 form-group p_star">
                            <span>Alamat</span><textarea class="form-control" name="alamat" id="alamat" rows="0" placeholder="Belum diatur" readonly><?= $customer['alamat']; ?></textarea>
                        	</div>
							<div class="col-md-3 form-group p_star">
                                <a name="submit" value="submit" class="main_btn" href="<?= base_url('admin/userdata') ;?>">Kembali</a>
							</div>
					</div>
					<div class="col-lg-4 mt-4">
						<div class="order_box">
							<h2>Foto Profil</h2>
							<a data-toggle="modal" data-target="#lihatfoto" id="btn-tambahUlasan" href=""><img src="<?= base_url('assets/img/profile/').$customer['photos']; ?>" width="300dp" height="300dp" title="Lihat Foto"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Modal -->

<div class="modal fade" id="lihatfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        
          <img src="<?= base_url('assets/img/profile/').$customer['photos']; ?>" width="100%" height="100%" >
        </div>
      </div>
    </div>
  