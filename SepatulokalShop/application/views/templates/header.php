
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?= base_url('assets/img/favicon.png'); ?>" type="image/png">
	<title><?=$judul; ?></title>
	<!-- Bootstrap CSS -->
	
	<link rel="stylesheet" href="<?= base_url('assets/vendors/linericon/style.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/vendors/owl-carousel/owl.carousel.min.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/vendors/lightbox/simpleLightbox.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/vendors/nice-select/css/nice-select.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/vendors/animate-css/animate.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/vendors/jquery-ui/jquery-ui.css'); ?>">
	<!-- main css -->
	<link rel="stylesheet" href="<?= base_url('assets/css/responsive.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/stars-rating.css'); ?>">
</head>

<body>

	<!--================Header Menu Area =================-->
	<header class="header_area">
		<div class="top_menu row m0">
			<div class="container-fluid">
				<div class="float-left">
					<p><?=$user['nama']; ?></p>

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
										<a class="nav-link" href="<?= base_url()?>">Beranda</a>
									</li>
									<li class="nav-item <?= $kelas1; ?> submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pesanan ( <?php $data['pesanan']=$this->db->query('select * from tbl_pemesan join tbl_pesanan on tbl_pemesan.id_pemesan=tbl_pesanan.id_pesanan join tbl_user on tbl_pemesan.id_user=tbl_user.id_user join tbl_product on tbl_pesanan.id_barang=tbl_product.id_product where tbl_pemesan.id_user='.$id_user.' group by tbl_pesanan.id_pesanan order by tbl_pesanan.id_pesanan desc;')->num_rows(); 
													echo $data['pesanan'];
													?> )</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="<?= base_url('ecomerce/pesanan/').$id_user; ?>">Proses ( <?php $data['pesanan']=$this->db->query('select * from tbl_pemesan join tbl_pesanan on tbl_pemesan.id_pemesan=tbl_pesanan.id_pesanan join tbl_user on tbl_pemesan.id_user=tbl_user.id_user join tbl_product on tbl_pesanan.id_barang=tbl_product.id_product where tbl_pemesan.status_pesanan="0" or tbl_pemesan.status_pesanan="1" and tbl_pemesan.id_user='.$id_user.' group by tbl_pesanan.id_pesanan order by tbl_pesanan.id_pesanan desc;')->num_rows(); 
													echo $data['pesanan'];
													?> )</a>
											</li>

											<li class="nav-item">
												<a class="nav-link" href="<?= base_url('ecomerce/pesanandikemas/').$id_user; ?>">Dikemas ( <?php $data['pesanan']=$this->db->query('select * from tbl_pemesan join tbl_pesanan on tbl_pemesan.id_pemesan=tbl_pesanan.id_pesanan join tbl_user on tbl_pemesan.id_user=tbl_user.id_user join tbl_product on tbl_pesanan.id_barang=tbl_product.id_product where tbl_pemesan.status_pesanan="2" and tbl_pemesan.id_user='.$id_user.' group by tbl_pesanan.id_pesanan order by tbl_pesanan.id_pesanan desc;')->num_rows(); 
													echo $data['pesanan'];
													?> )</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="<?= base_url('ecomerce/pesanandikirim/').$id_user; ?>">Dikirim ( <?php $data['pesanan']=$this->db->query('select * from tbl_pemesan join tbl_pesanan on tbl_pemesan.id_pemesan=tbl_pesanan.id_pesanan join tbl_user on tbl_pemesan.id_user=tbl_user.id_user join tbl_product on tbl_pesanan.id_barang=tbl_product.id_product where tbl_pemesan.status_pesanan="3" and tbl_pemesan.id_user='.$id_user.' group by tbl_pesanan.id_pesanan order by tbl_pesanan.id_pesanan desc;')->num_rows(); 
													echo $data['pesanan'];
													?> )</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" href="<?= base_url('ecomerce/pesananselesai/').$id_user; ?>">Selesai ( <?php $data['pesanan']=$this->db->query('select * from tbl_pemesan join tbl_pesanan on tbl_pemesan.id_pemesan=tbl_pesanan.id_pesanan join tbl_user on tbl_pemesan.id_user=tbl_user.id_user join tbl_product on tbl_pesanan.id_barang=tbl_product.id_product where tbl_pemesan.status_pesanan="4" and tbl_pemesan.id_user='.$id_user.' group by tbl_pesanan.id_pesanan order by tbl_pesanan.id_pesanan desc;')->num_rows(); 
													echo $data['pesanan'];
													?> )</a>
											</li>
										</ul>
									</li>
									
									<li class="mt-3">
										<input type="text" name="cari" value="" placeholder="Cari barang,kategori" size="8" class="custom-file-input" >
									</li>
								</ul>
							</div>

							<div class="col-lg-5">
								<ul class="nav navbar-nav navbar-right right_nav pull-right">
									<hr>
									<hr>
									<li class="nav-item">
										<a href="<?= base_url('Ecomerce/keranjang/').$id_user; ?>" class="icons">
												<i class="lnr lnr lnr-cart"></i><span>
													<?php $data['keranjang']=$this->db->query('select sum(qty)jumlah from tbl_keranjang where id_user='.$id_user)->row_array(); 
													echo $data['keranjang']['jumlah'];
													?>
												</span>
										</a>
									</li>


									<hr>

									<li class="nav-item">
										<a href="#" class="icons" data-toggle="modal" data-target="#cari">
											<i class="fa fa-search" aria-hidden="true"></i>
										</a>
									</li>

									<hr>
									<li class="nav-item">
										<a href="<?= base_url('Ecomerce/profile') ;?>" class="icons" title="Profile">
											<img class="img-profile rounded-circle ml-1" src="<?= base_url('assets/img/profile/').$foto; ?>" width="35px" height="35px" class="d-inline-block align-top" >
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
	<!--  -->
	<form action="<?= base_url('ecomerce/search') ?>" method="post" enctype="multipart/form-data">

<div class="modal fade" id="cari" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Cari</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
          <div class="input-group mb-3 mt-2">
            <input type="text" id="search" name="search" class="form-control" placeholder="Cari barang, kategori" value="<?= set_value('search'); ?>" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Cari</button>
        </div>
      </div>
    </div>
    </div>
   </form>
	<!--  -->
<script src="<?= base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/popper.js'); ?>"></script>
	<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/stellar.js'); ?>"></script>
	<script src="<?= base_url('assets/vendors/lightbox/simpleLightbox.min.js'); ?>"></script>
	<script src="<?= base_url('assets/vendors/nice-select/js/jquery.nice-select.min.js'); ?>"></script>
	<script src="<?= base_url('assets/vendors/isotope/imagesloaded.pkgd.min.js'); ?>"></script>
	<script src="<?= base_url('assets/vendors/isotope/isotope-min.js'); ?>"></script>
	<script src="<?= base_url('assets/vendors/owl-carousel/owl.carousel.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery.ajaxchimp.min.js'); ?>"></script>
	<script src="<?= base_url('assets/vendors/counter-up/jquery.waypoints.min.js'); ?>"></script>
	<script src="<?= base_url('assets/vendors/flipclock/timer.js'); ?>"></script>
	<script src="<?= base_url('assets/vendors/counter-up/jquery.counterup.js'); ?>"></script>
	<script src="<?= base_url('assets/js/mail-script.js'); ?>"></script>
	<script src="<?= base_url('assets/js/theme.js'); ?>"></script>
