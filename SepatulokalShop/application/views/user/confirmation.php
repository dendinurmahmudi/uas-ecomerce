<section class="banner_area hot_deals_area">
   <div class="d-flex align-items-center hot_deal_box">
      <img class="img" height="275dp" width="100%" src="<?= base_url('assets/'); ?>img/banner/sepatu/bannersepatucart.jpg">
         <div class="content mt-5">
            <div class="mt-4">
               <h2>Konfirmasi</h2>
               <div class="page_link">
                  <a href="<?= base_url('ecomerce'); ?>">Beranda</a>
               </div>
            </div>         
         </div>
   </div>
	<!--================End Home Banner Area =================-->

	<!--================Checkout Area =================-->

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
		<div class="container mt-5">
			
			<div class="row order_d_inner">
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Informasi Order</h4>
						<ul class="list">
							<form class="row contact_form" action="<?= base_url('ecomerce/multiinsertpesanan'); ?>" method="post" enctype="multipart/form-data">
							<li>
								<a href="#">
									<span>Id Transaksi</span> : <input class="input" type="text" name="idpesanan" value="<?= $id_transaksi; ?>" readonly></a>
							</li>
							<li>
								<a href="#">
									<span>Tanggal</span> : <input class="input" type="text" name="tanggal" value="<?= date('d M Y') ?>" readonly></a>
							</li>
							<li>
								<a href="#">
									<span>Jasa kirim</span> : <input class="input" type="text" name="paket" value="<?= $paket ?>" readonly ></a>
							</li>
							<li>
								<a href="#">
									<span>Pembayaran</span> : <input class="input" type="text" name="pembayaran" value="<?= $pembayaran ?>" readonly ></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Data Pemesan</h4>
						
						<ul class="list">
							<li>
								<a href="#">
									<span>Id</span> : <?= $id_user; ?></a>
							</li>
							<li>
								<a href="#">
									<span>Username</span> : <?= $username;?></a>
							</li>
							<li>
								<a href="#">
									<span>Nama</span> : <?= $nama; ?></a>
							</li>
							<li>
								<a href="#">
									<span>No Telepon</span> : <?= $nohp; ?></a>
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
									<span>Nama</span> : <input class="input" type="text" name="namapenerima" value="<?= $namapenerima ?>" readonly ></a>
							</li>
							<li>
								<a href="#">
									<span>No Telepon</span> : <input class="input" type="text" name="nohp1" value="<?= $nohp1 ?>" readonly ></a>
							</li>
							<li class="kab">
								
									
							
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="order_details_table">
				<h2>Detail Pesanan</h2>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Produk</th>
								<th scope="col">Jumlah</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php $subtotal = 0;
								foreach ($keranjang as $kr ) :
								    $nama_product = $kr['nama_product'];
      								$quantity = $kr['jumlah'];
      								$harga = $kr['harga'];
                    				$total = $quantity * $harga;
                    				$subtotal = $subtotal + $total; 
                    				$sub = $subtotal + $ongkos;
                    				$product [] = $nama_product?>
							<tr>
								<td>
									<p><?= $nama_product ?>( <?= $this->ecomerce_models->rupiah($harga)?> )</p>
								</td>
								<td>
									<h5><input size="1" class="input" type="text" name="qty[]" value="<?= $quantity; ?>" placeholder="" readonly></h5>
								</td>
								<td>
									<p><?= $this->ecomerce_models->rupiah($total); ?></p>
								</td>
								<input class="input1" type="text" name="idproduct[]" value="<?= $kr['id_product'] ?>" readonly size="11" >
								<input class="input1" type="text" name="harga[]" value="<?= $kr['harga'] ?>" readonly size="1" >
								<input class="input1" type="text" name="hargaxjumlah[]" value="<?= $total ?>" readonly size="1" >
							</tr>
						<?php endforeach; ?>
							<tr>
								<td>
									<h5>Ongkos kirim</h5>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p><?= $this->ecomerce_models->rupiah($ongkos); ?></p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Total</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p><?= $this->ecomerce_models->rupiah($sub); ?></p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			
				<!--  -->
				<input class="input1" type="text" name="alamat" value="<?= $alamat ?>" readonly size="1" >
				<input class="input1" type="text" name="ongkos" value="<?= $ongkos ?>" readonly size="1" >
				<input class="input1" type="text" name="subtotal" value="<?= $sub ?>" readonly size="1" >
				<input class="input1" type="text" name="kabupaten" id="kabupaten" value="<?= $Kabupatenkota ?>" readonly size="1" >
			<input class="input1" type="text" name="provinsi" id="provinsi" value="<?= $provinsi ?>" readonly size="1" >
				<div class="row order_d_inner">
				<div class="col-lg-4 mt-3">
					<div class="details_item">
						<h4>Pembayaran</h4>
						<ul class="list">
							<li>
								<span>Transfer ke Rekening berikut</span> : 
							</li>
							<li>
								<?php foreach ($rekening as $rek ): 
									$nore = $rek['norek']; 
									$name = $rek['an']; 
								endforeach ;?>
								<a href="#">
									<span>No Rekeneing</span> : <?= $nore; ?></a>
							</li>
							<li>
								<a href="#">
									<span>Atas Nama</span> : <?= $name; ?></a>
							</li>
							<li>
								<a href="#">
									<span><i>* pembayaran aman dan terjamin</i></span></a>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 mt-3">
					<div class="details_item">
						<h4>Upload bukti Transfer</h4>
						<ul class="list">
							<li>
								<span>Upload</span> :
            					<input type="file" name="buktitf" id="buktitf" class="-btn btn-warning" required>   
							</li>
							<li>
								<input type="submit" name="" class="main_btn" value="Kirim">
							</li>
							</form>
							<li>
								<!-- <a href="#"class="main_btn">
									Bayar Nanti</a></a> -->
							</li>
						</ul>

					</div>
				</div>
		</div>
	</section>
	<script type="text/javascript" charset="utf-8" async defer>
		$(function() {
			let kab = $('#kabupaten').val();;
			let provins = $('#provinsi').val();;
			$.get("<?= base_url('ecomerce/setkota/') ?>"+`${provins}/${kab}`,{},(response)=>{
			let output='';
			let tujuan = response.rajaongkir.results.city_name
			let prov = response.rajaongkir.results.province
			let tipe = response.rajaongkir.results.type
			console.log(tujuan)
				output+= `<a href="" title=""><span>Alamat</span> : <input class="input" type="text" value="${tujuan} ,${prov}" readonly size="23"></a>
				</li>
				<li>
				<a href="#">
				<span>Kab/Kota</span> : <input class="input mt-1" type="text" name="kodepos" value="${tipe}" readonly ></a>
				`	
			$('.kab').html(output)
			})
		});
	</script>