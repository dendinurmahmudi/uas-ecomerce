<section class="banner_area hot_deals_area">
   <div class="d-flex align-items-center hot_deal_box">
      <img class="img" height="275dp" width="100%" src="<?= base_url('assets/'); ?>img/banner/sepatu/bannersepatucart.jpg">
         <div class="content mt-5">
            <div class="mt-4">
               <h2>Detail Pesanan</h2>
               <div class="page_link">
                  <a href="<?= base_url('ecomerce'); ?>">Beranda</a>
               </div>
            </div>         
         </div>
   </div>
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
								$noresi = $dp['no_resi'];
								$status = $dp['status_pesanan'];
							} ?>
							<li>
								<a href="#">
									<span>Id Transaksi</span> : <input class="input" type="text" name="idpesanan" value="<?= $id; ?>" readonly></a>
							</li>
							<li>
								<a href="#">
									<span>Tanggal</span> : <input class="input" type="text" name="tanggal" value="<?= $tgl; ?>" readonly></a>
							</li>
							<li>
								<a href="#">
									<span>Jasa kirim</span> : <input class="input" type="text" name="paket" value="<?= $jasakirim ?>" readonly ></a>
							</li>
							<li>
								<a href="#">
									<span>Pembayaran</span> : <input class="input" type="text" name="pembayaran" value="<?= $pembayarag; ?>" readonly ></a>
							</li>
							<li>
								<a href="#">
									<span> </span></a>
							</li>
							<li>
								<a data-toggle="modal" data-target="#lihatfoto" href="">
									<span>Bukti Transfer</span> : <?= $buktitf; ?></a>
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
									<span>Id</span> : <?= $iduser; ?></a>
							</li>
							<li>
								<a href="#">
									<span>Username</span> : <?= $user; ?></a>
							</li>
							<li>
								<a href="#">
									<span>Nama</span> : <?= $nama; ?></a>
							</li>
							<li>
								<a href="#">
									<span>No Telepon</span> : <?= $notlp; ?></a>
							</li>
							<?php if($status==1){
							}else if($status==2){
							}else{ ?>
							<li>
								<a href="#">
									<span>No Resi</span> : <input class="input" type="text" name="" value="<?= $noresi; ?>" placeholder="" readonly></a>
							</li>
							<li>
								<a href="https://cekresi.com/" target="_blank" title="">
									<span>Lacak Pesanan</span> : Lacak
								</a>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Data Penerima</h4>
						
						<ul class="list">
							<li>
								<a href="#">
									<span>Nama</span> : <input class="input" type="text" name="namapenerima" value="<?= $namapenerima; ?>" readonly ></a>
							</li>
							<li>
								<a href="#">
									<span>No Telepon</span> : <input class="input" type="text" name="nohp1" value="<?= $notlpn; ?>" readonly ></a>
							</li>
							<li class="lok">
								
							</li>
						</ul>
					</div>
				</div>
			</div>
			<input class="input1" type="text" name="kab" id="kab" value="<?= $kab; ?>" readonly size="1" >
			<input class="input1" type="text" name="pro" id="pro" value="<?= $prov; ?>" readonly size="1" >
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
									foreach ($detailpesanan as $dp ) {
									$nama_product = $dp['nama_product'];
      								$harga = $dp['harga'];
      								$quantity = $dp['jumlahcheck'];
      								$ongkos = $dp['ongkir'];
      								$status = $dp['status_pesanan'];
                    				$total = $quantity * $harga;
                    				$subtotal = $subtotal + $total;
                    				$sub = $subtotal + $ongkos;?>
							<tr>
								<td>
									<p><?= $nama_product." ( ".$this->ecomerce_models->rupiah($harga)." )"; ?></p>
								</td>
								<td>
									<h5><?= $quantity; ?></h5>
								</td>
								<td>
									<p><?= $this->ecomerce_models->rupiah($total); ?></p>
								</td>
							</tr>
						<?php } ?>
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
			</div>
		</div>
	</section>
	<div class="modal fade" id="lihatfoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
          <img src="<?= base_url('assets/img/buktiTF/').$buktitf; ?>" width="100%" height="100%" >
      </div>
    </div>
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
				output+= `<a href="" title=""><span>Alamat</span> : <input class="input" type="text" value="${tujuan} ,${prov}" readonly size="20"></a>
				</li>
				<li>
				<a href="#">
				<span>Kab/Kota</span> : <input class="input mt-1" type="text" name="kodepos" value="${tipe}" readonly ></a>
				`	
			$('.lok').html(output)
			})
		});
	</script>