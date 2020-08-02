<section class="banner_area hot_deals_area">
   <div class="d-flex align-items-center hot_deal_box">
      <img class="img" height="275dp" width="100%" src="<?= base_url('assets/'); ?>img/banner/sepatu/bannersepatucart.jpg">
         <div class="content mt-5">
            <div class="mt-4">
               <h2>Profile</h2>
               <div class="page_link">
                  <a href="<?= base_url('ecomerce'); ?>">Beranda</a>
               </div>
            </div>         
         </div>
   </div>

		<div class="container mt-5">
			<div>
    		<?= $this->session->flashdata('pesan'); ?>

  			</div>
			<div class="billing_details">
				<div class="row">
					<div class="col-lg-8">
						<h3>Detail Profil</h3>
						<form class="row contact_form" action="<?= base_url('ecomerce/ubah_profile'); ?>" method="post" enctype="multipart/form-data">
							<div class="col-md-6 form-group">
								<span>Id User</span><input type="text" class="form-control" id="id_user" name="id_user" placeholder="Nama" value="<?= $user['id_user']; ?>"readonly>
							</div>
							<div class="col-md-12 form-group">
								<span>Nama</span><input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= $user['nama']; ?>">
							</div>
							<div class="col-md-12 form-group">
								<span>Username</span><input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $user['username']; ?>">
							</div>
							<div class="col-md-12 form-group">
								<span>No Tlp/Hp</span><input type="text" class="form-control" id="notlp" name="notlp" placeholder="Belum di atur" value="<?= $user['notlp']; ?>">
							</div>
							<div class="col-md-12 form-group">
								<span>Email</span><input type="text" class="form-control" id="email" name="email" placeholder="Belum di atur" value="<?= $user['email']; ?>">
							</div>
							<div class="col-md-12 form-group p_star">
                            <span>Alamat</span><textarea class="form-control" name="alamat" id="alamat" rows="0" placeholder="Belum diatur"><?= $user['alamat']; ?></textarea>
                        	</div>
							<div class="col-md-3 form-group p_star">
                                <button type="submit" name="submit" value="submit" class="main_btn">Simpan</button>
							</div>
							<div class="col-md-3 form-group p_star">
							<a  class="main_btn" data-toggle="modal" data-target="#ubahPassword" id="btn-tambahUlasan" href="">Ubah Password</a>
							</div>
					</div>
					<div class="col-lg-4 mt-4">
						<div class="order_box">
							<h2>Foto Profil</h2>
							<a data-toggle="modal" data-target="#lihatfoto" id="btn-tambahUlasan" href=""><img src="<?= base_url('assets/img/profile/').$foto; ?>" width="300dp" height="300dp" title="Lihat Foto"></a>
							<div class="text-center mt-5">
                            <input type="file"  id="foto" name="foto" class="custom-file-input">
                            <label for="foto" class="main_btn">Ubah Foto</label>
                        </div>
						</div>
					</div>
				</div>
			</form>
			</div>
		</div>
	</section>

	<!-- Modal -->
<form action="<?= base_url('ecomerce/ubah_password'); ?>" method="post">

	<div class="modal fade" id="ubahPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Ubah Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
          Password Lama
          <div class="input-group mb-3">
            <input type="password" name="passwordLama" class="form-control" placeholder="Password Lama" aria-label="Username" aria-describedby="basic-addon1" required>
          </div>
          Password Baru
          <div class="input-group mb-3">
            <input type="password" name="passwordBaru1" class="form-control" placeholder="Password Baru" aria-label="Username" aria-describedby="basic-addon1" required>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="passwordBaru2" class="form-control" placeholder="Password Baru" aria-label="Username" aria-describedby="basic-addon1" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
          <!-- <a class="btn btn-primary" href="<?= base_url('testimoni/ubah_password/').$user['username']; ?>">Simpan</a> -->
        </div>
      </div>
    </div>
  </div>
  
</form>

<div class="modal fade" id="lihatfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <img src="<?= base_url('assets/img/profile/').$foto; ?>" width="100%" height="100%" >
      </div>
    </div>
  </div>