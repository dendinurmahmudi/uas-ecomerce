<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?= base_url('assets/'); ?>img/favicon.png" type="image/png">
	<title><?=$judul; ?></title>
	<!-- Bootstrap CSS -->
	
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/linericon/style.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/owl-carousel/owl.carousel.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/lightbox/simpleLightbox.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/nice-select/css/nice-select.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/animate-css/animate.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>vendors/jquery-ui/jquery-ui.css">
	<!-- main css -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/responsive.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/'); ?>css/stars-rating.css">
</head>

<body>

	<!--================Header Menu Area =================-->
	<header class="header_area">
		<div class="top_menu row m0">
			<div class="container-fluid">
				<div class="float-left">
					<p><?=$user['nama']; ?></p>
				</div>
				<div class="float-left ml-3">
					<p>Admin</p>
				</div>
				<div class="float-right">
					<ul class="right_side">
						<li>
							<?php if($user['username']){ ?>
								<a href="<?= base_url('Auth/logout'); ?>">
								Log Out
							</a>
						<?php } 
						else{?>
							<a href="<?= base_url('Auth'); ?>">
								Login/Register
							</a>
						<?php } ?>
						</li>
						<li>
							<a href="https://wa.me/6283824413480" target="_blank" rel="nofollow">
								Contact Us
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="<?= base_url(); ?>">
						<img src="<?= base_url('assets/'); ?>img/favicon.png" alt=""><font color="black"><span class="ml-2">SepatuLokalShop</span></font>
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row w-100">
							<div class="col-lg-7 pr-0">
								<ul class="nav navbar-nav center_nav pull-right">
									<li class="nav-item <?= $kelas; ?>">
										<a class="nav-link" href="<?= base_url('admin');?>">Beranda</a>
									</li>
									<li class="nav-item <?=$kelas1; ?> submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Toko</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="<?= base_url('Admin/barang') ;?>">Barang</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="<?= base_url('admin/Kategori');?>">Kategori</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="<?= base_url('admin/testimoni');?>">Ulasan</a>
											</li>
										</ul>
									</li>
									<li class="nav-item <?=$kelas2; ?> submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pesanan ( <?= $this->ecomerce_models->countallpesanan(); ?> )</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="<?= base_url('admin/pesanan')?>">pesanan ( <?= $this->ecomerce_models->countpesanan(); ?> )</a>
											<li class="nav-item">
												<a class="nav-link" href="<?= base_url('admin/pesanandikemas');?>">Dikemas  ( <?= $this->ecomerce_models->countkemasan(); ?> )</a>
											<li class="nav-item">
												<a class="nav-link" href="<?= base_url('admin/pesanandikirim');?>">Dikirim   ( <?= $this->ecomerce_models->countkiriman(); ?> )</a>
											<li class="nav-item">
												<a class="nav-link" href="<?= base_url('admin/pesananselesai');?>">Selesai  ( <?= $this->ecomerce_models->countselesai(); ?> )</a>
										</ul>
									</li>
									<li class="nav-item <?=$kelas3; ?>">
										<a class="nav-link" href="<?= base_url('admin/userdata');?>">Pengguna ( <?= $this->ecomerce_models->countuser(); ?> )</a>
									</li>
								</ul>
							</div>

							<div class="col-lg-5">
								<ul class="nav navbar-nav navbar-right right_nav pull-right">
									<hr>
									<hr>
									<li class="nav-item">
										<a href="<?= base_url('admin/profile') ;?>" class="icons" title="Profile">
											<img class="img-profile rounded-circle mt-4" src="<?= base_url('assets/img/profile/').$foto; ?>" width="35px" height="35px" class="d-inline-block align-top" >	
										</a>
									</li>


									<hr>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
<script src="<?= base_url('assets/'); ?>js/jquery-3.2.1.min.js"></script>
	<script src="<?= base_url('assets/'); ?>js/popper.js"></script>
	<script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
	<script src="<?= base_url('assets/'); ?>js/stellar.js"></script>
	<script src="<?= base_url('assets/'); ?>vendors/lightbox/simpleLightbox.min.js"></script>
	<script src="<?= base_url('assets/'); ?>vendors/nice-select/js/jquery.nice-select.min.js"></script>
	<script src="<?= base_url('assets/'); ?>vendors/isotope/imagesloaded.pkgd.min.js"></script>
	<script src="<?= base_url('assets/'); ?>vendors/isotope/isotope-min.js"></script>
	<script src="<?= base_url('assets/'); ?>vendors/owl-carousel/owl.carousel.min.js"></script>
	<script src="<?= base_url('assets/'); ?>js/jquery.ajaxchimp.min.js"></script>
	<script src="<?= base_url('assets/'); ?>vendors/counter-up/jquery.waypoints.min.js"></script>
	<script src="<?= base_url('assets/'); ?>vendors/flipclock/timer.js"></script>
	<script src="<?= base_url('assets/'); ?>vendors/counter-up/jquery.counterup.js"></script>
	<script src="<?= base_url('assets/'); ?>js/mail-script.js"></script>
	<script src="<?= base_url('assets/'); ?>js/theme.js"></script>