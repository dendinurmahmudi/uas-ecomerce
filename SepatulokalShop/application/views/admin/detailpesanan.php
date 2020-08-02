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
<section class="order_details p_120">
		<div class="container mt-5">
			<h1 class="text-center mt-5 mb-5">Detail Pesanan</h1>
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
								$noresi = $dp['no_resi'];
								$iduser = $dp['id_userpesan'];
								$user = $dp['username'];
								$nama = $dp['nama'];
								$notlp = $dp['notlp'];
								$namapenerima = $dp['nama_penerima'];
								$notlpn = $dp['no_hp'];
								$kab= $dp['kab_kota'];
								$prov = $dp['provinsi'];
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
							<?php if($status== 1) {
							}else if($status== 2){	
							}else{ ?>
							<li>
								<a href="#">
									<span>No Resi</span> : <?= $noresi; ?></a>
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
                    				$total = $quantity * $harga;
                    				$subtotal = $subtotal + $total;
                    				$sub = $subtotal + $ongkos;	
								    ?>
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
			
							<?php if($status==1){?>
			<div class="row order_d_inner">
				<div class="col-lg-4 mt-3">
					<div class="details_item">
						<h4>Print</h4>
						<ul class="list">
							<li>
								<a href="<?= base_url('admin/print/').$id; ?>" title=""><button class="main_btn">Print</button></a>
								<a href="#" data-toggle="modal" data-target="#edit"><button class="main_btn">Update</button>
									</a>
							</li>
						</ul>
					</div>


				</div>
				
				</div>
							<?php } ?>
			</div>
		</div>
	</section>

	<!--  -->
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
				output+= `<a href="" title=""><span>Alamat</span> : <input class="input" type="text" value="${tujuan} ,${prov}" readonly size="24"></a>
				</li>
				<li>
				<a href="#">
				<span>Kab/Kota</span> : <input class="input mt-1" type="text" name="kodepos" value="${tipe}" readonly ></a>
				`	
			$('.lok').html(output)
			})
		});
	</script>

<form class="row contact_form" action="<?= base_url('admin/editstatus'); ?>" method="post" enctype="multipart/form-data">
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Update</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
          
              <div class="col-md-12 form-group">
                <span>Id Pesanan</span><input type="text" class="form-control" id="idpemesan" name="idpemesan" value="<?= $id; ?>"readonly>
              </div>
              <div class="col-md-6 form-group">
                <span>Nomor resi</span><input type="text" class="form-control" id="nomorresi" name="nomorresi" value="">
              </div>
              <div class="col-md-6 mt-4 mb-4">
                <select class="form-control" name="status" id="status">
                  <option value="<?= $status; ?>"><?= $this->ecomerce_models->arrayPesananadm($status); ?></option>
                    <?php 
                    $nom=2;
                    foreach ($this->ecomerce_models->arraystatus() as $status ): ?>
                  <option value="<?= $nom; ?>"><?= $status; ?></option>
                    <?php 
                    $nom++;
                    endforeach; ?>
                </select>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
    </div>
</form>