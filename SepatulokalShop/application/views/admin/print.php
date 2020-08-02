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
<div class="row order_d_inner">
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Informasi Order</h4>
						<ul class="list">
							<?php foreach ($detailpesanan as $dp) {
								$id = $dp['id_pesanan'];
								$tgl = $dp['tgl'];
								$jasakirim = $dp['jasa'];
								$pembayarag = $dp['pembayaran'];
								$buktitf = $dp['buktitf'];
								$iduser = $dp['id_userpesan'];
								$user = $dp['username'];
								$nama = $dp['nama'];
								$notlp = $dp['notlp'];
								$namapenerima = $dp['nama_penerima'];
								$notlpn = $dp['no_hp'];
								$kab= $dp['kab_kota'];
								$prov = $dp['provinsi'];
								$al = $dp['alamat'];
							} ?>
							<li>
								<a href="#">
									<span>Id Transaksi</span><input class="input" type="text" name="idpesanan" value=": <?= $id; ?>" readonly></a>
							</li>
							<li>
								<a href="#">
									<span>Tanggal</span><input class="input" type="text" name="tanggal" value=": <?= $tgl; ?>" readonly></a>
							</li>
							<li>
								<a href="#">
									<span>Jasa kirim</span><input class="input" type="text" name="paket" value=": <?= $jasakirim ?>" readonly ></a>
							</li>
							<li>
								<a href="#">
									<span>Pengirim</span><input class="input" type="text" name="pembayaran" value=": SepatulocalShop (083824413480)" size="30" readonly ></a>
							</li>
							<li>
								<a href="#">
									<span>Dikirim dari</span><input class="input" type="text" name="pembayaran" value=": Banjaran, Kab.Bandung" size="30" readonly ></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Data Pemesan</h4>
						<ul class="list">
							<li>
								<a href="<?= base_url('admin/detailuser/').$iduser; ?>" title="Lihat profile">
									<span>Id</span><input class="input" type="text" name="iduser" value=": <?= $iduser; ?>" readonly ></a>
							</li>
							<li>
								<a href="#">
									<span>Username</span><input class="input" type="text" name="user" value=": <?= $user; ?>" readonly ></a>
							</li>
							<li>
								<a href="#">
									<span>Nama</span><input class="input" type="text" name="nama" value=": <?= $nama; ?>" readonly ></a>
							</li>
							<li>
								<a href="#">
									<span>No Telepon</span><input class="input" type="text" name="notlp" value=": <?= $notlp; ?>" readonly ></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Data Penerima</h4>
						
						<ul class="list">
							<li>
								<a href="#">
									<span>Nama</span><input class="input" type="text" name="namapenerima" value=": <?= $namapenerima; ?>" readonly ></a>
							</li>
							<li>
								<a href="#">
									<span>No Telepon</span><input class="input" type="text" name="nohp1" value=": <?= $notlpn; ?>" readonly ></a>
							</li>
							<li class="lok">
							<input class="input1" type="text" name="kab" id="kab" value="<?= $kab; ?>" readonly size="1" >
			<input class="input1" type="text" name="pro" id="pro" value="<?= $prov; ?>" readonly size="1" >								
							</li>
							<li>
								<a href="#">
									<span>Alamat lengkap</span><textarea class="form-control" name="pesan" id="pesan" placeholder=""><?= $al; ?></textarea></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Barang</h4>
						<ul class="list">
							<li>
								<a href="#">
									<?php $subtotal = 0;
									foreach ($detailpesanan as $dp ) {
									$nama_product = $dp['nama_product'];
      								$quantity = $dp['jumlahcheck'];
      								?><input class="input" type="text" name="nama" value="- <?= $nama_product; ?>( <?= $quantity; ?> )" readonly ></a>
							</li>
						<?php } ?>
						</ul>
					</div>
				</div>
			</div>
<!-- menampilkan data pesanan sebelum di print			 -->
<script type="text/javascript" charset="utf-8" async defer>
		$(function() {
			let kab = $('#kab').val();
			let provins = $('#pro').val();
			$.get("<?= base_url('ecomerce/setkota/') ?>"+`${provins}/${kab}`,{},(response)=>{
			let output='';
			let tujuan = response.rajaongkir.results.city_name
			let prov = response.rajaongkir.results.province
			let tipe = response.rajaongkir.results.type
			console.log(tujuan)
				output+= `<a href="" title=""><span>Alamat</span><input class="input" type="text" value=": ${tujuan} ,${prov}" readonly size="24"></a>
				</li>
				<li>
				<a href="#">
				<span>Kab/Kota</span><input class="input mt-1" type="text" name="kodepos" value=": ${tipe}" readonly ></a>
				`	
			$('.lok').html(output)
			window.print();
			})
		});
	</script>