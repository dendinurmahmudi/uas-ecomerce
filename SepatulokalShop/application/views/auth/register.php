<script>
	var i = 0; // Start point
	var images = [];
	var time = 2500;

	// Image List
	images[0] = '<?= base_url('assets/'); ?>img/banner/edit/car.jpg';
	images[1] = '<?= base_url('assets/'); ?>img/banner/edit/anak.jpg';
	images[2] = '<?= base_url('assets/'); ?>img/banner/edit/baby.jpg';
	images[3] = '<?= base_url('assets/'); ?>img/banner/edit/brown.jpg';
	images[4] = '<?= base_url('assets/'); ?>img/banner/edit/buble.jpg';
	images[5] = '<?= base_url('assets/'); ?>img/banner/edit/rel.jpg';
	images[6] = '<?= base_url('assets/'); ?>img/banner/edit/hiking.jpg';
	images[7] = '<?= base_url('assets/'); ?>img/banner/edit/horse.jpg';
	images[8] = '<?= base_url('assets/'); ?>img/banner/edit/jejak.jpg';
	images[9] = '<?= base_url('assets/'); ?>img/banner/edit/love.jpg';
	images[10] = '<?= base_url('assets/'); ?>img/banner/edit/pasangan.jpg';
	images[11] = '<?= base_url('assets/'); ?>img/banner/edit/alone.jpg';
	images[12] = '<?= base_url('assets/'); ?>img/banner/edit/shoe.jpg';
	images[13] = '<?= base_url('assets/'); ?>img/banner/edit/socer.jpg';
	images[14] = '<?= base_url('assets/'); ?>img/banner/edit/bannersepatu.jpg';
	// Change Image
	function changeImg(){
		document.slide.src = images[i];

		if(i < images.length - 1){
			i++;
		} else {
			i = 0;
		}

		setTimeout("changeImg()", time);
	}

	window.onload = changeImg;

</script>
<section class="login_box_area p_120">
		<div class="container">
			<div class="row hot_deals_area">
				<div class="col-lg-6">
					<div class="hot_deal_box login_box_img">
						<img name="slide" class="img" height="580dp" width="585dp" >
						<div class="hover">
							<h4>Ganti sepatu?</h4>
							<p>Kunjungi toko sepatu kami dan intip harga-harga sepatu original lokal buatan asli Indonesia. Dijamin ori.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner reg_form">
						<h3>Create an Account</h3>
						<form class="row login_form" action="<?= base_url('auth/pendaftaran') ?>" method="post" id="contactForm" novalidate="novalidate">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?= set_value('nama'); ?>">
								<?= form_error('nama','<small class="text-danger pl-4">','</small>') ?>
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
								<?= form_error('username','<small class="text-danger pl-4">','</small>') ?>
							</div>
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="dendinurmahmudi3@gmail.com" value="<?= set_value('email'); ?>">
								<?= form_error('email','<small class="text-danger pl-4">','</small>') ?>
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
								<?= form_error('password1','<small class="text-danger pl-4">','</small>') ?>
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="password2" name="password2" placeholder="Konfirmasi password">
								<?= form_error('password2','<small class="text-danger pl-4">','</small>') ?>
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="btn submit_btn">Register</button>
							<a href="<?= base_url('Auth'); ?>">Sudah punya akun? Login sekarang.</a>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="row footer-bottom d-flex justify-content-between align-items-center">
				<p class="col-lg-12 footer-text text-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; <script>document.write(new Date().getFullYear());</script> Nurmahmudi coorporation with team lkamal From <a href="https://sttbandung.ac.id" target="_blank">SttBandung</a><br>
This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</section>
