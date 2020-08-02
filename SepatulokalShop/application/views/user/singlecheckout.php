<section class="banner_area hot_deals_area">
   <div class="d-flex align-items-center hot_deal_box">
      <img class="img" height="275dp" width="100%" src="<?= base_url('assets/'); ?>img/banner/sepatu/bannersepatucart.jpg">
         <div class="content mt-5">
            <div class="mt-4">
               <h2>Checkout</h2>
               <div class="page_link">
                  <a href="<?= base_url('ecomerce'); ?>">Beranda</a>
               </div>
            </div>         
         </div>
   </div>
	<!--================End Home Banner Area =================-->

	<!--================Checkout Area =================-->
		<div class="container mt-5">
			<div class="billing_details">
				<div class="row">
					<div class="col-lg-7">
                        	<label for="">Dikirm dari</label>
                            <input type="text" class="form-control mb-4" id="dari" name="dari" placeholder="" value="Kabupaten Bandung Jawa Barat" readonly>
						<h3>Isi data pemesan</h3>
						<form class="row contact_form" action="<?= base_url('ecomerce/singlekonfirmasi/').$produk['id_product'];?>" method="post" >
						<div class="col-md-12 mb-4">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Penerima" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <input type="number" class="form-control" id="nohp" name="nohp" placeholder="Nomor Telepon" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <input class="form-control" id="email" name="email" placeholder="Alamat Email" required type="email">
                        </div>
                        <div class="col-md-6 mb-4">
                        	<label for="">Provinsi</label>
                            <select onChange="getkota()" class="form-control country_select provinsi" name="provinsi" id="provinsi">
                            	
                            </select>
                        </div>
                        <div class="col-md-6 mb-4">
                        <label for="">Kota</label>
                            <select class="form-control country_select kota" id="Kabupatenkota" name="Kabupatenkota">
							<option value="">Kota</option>
                            </select>
                        </div>
                        <!-- <div class="col-md-6 mb-4">
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <input type="text" class="form-control" id="desa" name="desa" placeholder="Desa" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <input type="text" class="form-control" id="kodepos" name="kodepos" placeholder="Kode" required>
                        </div> -->
                        <div class="col-md-6 mb-4">
                        	<label for="">Kurir</label>
                            <select onChange="getongkir()" class="form-control country_select" name="paket" id="paket">
                            	<option value="">Pilih Kurir</option>
                                <option value="jne">JNE</option>
                                <option value="pos">POS</option>
                                <option value="tiki">TIKI</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-4">
                        	<label for="">Pelayanan & Harga</label>
                            <select class="form-control country_select" name="ongkos" id="ongkos">

                            </select>	
                        </div required>
                        <div class="col-md-12 mb-4">
                            <textarea class="form-control" name="alamatpenerima" id="alamatpenerima" rows="4" placeholder="Alamat Lengkap" required></textarea>
                        </div>
						<div class="col-md-6 mb-4">
                            <input type="text" class="form-control" id="berat" name="berat" value="1" placeholder="" required>
                            
                        </div>
							<div class="col-md-12">
									<?php $subtotal = 0;
								    $nama_product = $produk['nama_product'];
      								$harga = $produk['harga'];
      								$quantity = $qty;
                    				$total = $quantity * $harga;
                    				$subtotal = $subtotal + $total; ?>
                    		<input type="text" name="jumlah" value="<?= $quantity; ?>" placeholder="" class="custom-file-input" readonly>
                        	</div>
					</div>
					<div class="col-lg-5">
						<div class="order_box">
							<h2>Pesanan anda</h2>
							<ul class="list">
								<li>
									<a href="#">Produk
										<span>Total</span>
									</a>
								</li>
								
									
								<li>
									<a href="#"><?= $nama_product." (".$this->ecomerce_models->rupiah($harga).")"; ?>
										<label for="jumlah" class="middle"><?=$quantity; ?></label>
										<span class="last"><?= $this->ecomerce_models->rupiah($total);?></span>
									</a>
								</li>
							</ul>
							<ul class="list list_2">
								<li>
									<a href="#">Subtotal
										<span><?= $this->ecomerce_models->rupiah($subtotal); ?></span>
									</a>
								</li>
								
							</ul>
							
							<div class="payment_item active">
								<div class="radion_btn mt-2">
									<span>Metode Pembayaran</span>
									<select class="form-control country_select pembayaran" name="pembayaran" id="pembayaran">
                                <option value="Transfer Bank">Transfer Bank</option>
                            </select>
                            <div class="bayar">
                            	
                            </div>
             
								</div>
								<p>Jika memilih Transfer bank mohon untuk mengirimkan struk pembayaran.</p>
							</div>
							<button type="submit" class="main_btn">Lanjutkan Transaksi</button>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script type="text/javascript">
		$(function() {
			$.get("<?= base_url('ecomerce/getprovinsi') ?>",{},(response)=>{
			let output='';
			let provinsi = response.rajaongkir.results
			console.log(response)

			provinsi.map((val,i)=>{
				output+= `<option value="${val.province_id}">${val.province}</option>`
			})
			$('.provinsi').html(output)
			})
		});
		function getkota() {
			let id_provinsi = $('#provinsi').val();
			$.get("<?= base_url('ecomerce/getkota/') ?>"+id_provinsi,{},(response)=>{
			let output='';
			let Kabupatenkota = response.rajaongkir.results
			console.log(response)

			Kabupatenkota.map((val,i)=>{
				output+= `<option value="${val.city_id}">${val.city_name} ( ${val.type} )</option>`
			})
			$('#Kabupatenkota').html(output)

			})
		}
		function getongkir() {
			let berat = $('#berat').val();
			let asal = 22;
			let tujuan = $('#Kabupatenkota').val();
			let kurir = $('#paket').val();
			let output = '';

			$.get("<?= base_url('ecomerce/getongkir/') ?>"+`${asal}/${tujuan}/${berat}/${kurir}`,{},(response)=>{
			console.log(response)
			let biaya =response.rajaongkir.results
			console.log(biaya)
			biaya.map((val,i)=>{
					for (var i =0 ; i < val.costs.length; i++){
						let jenis_layanan = val.costs[i].service
						val.costs[i].cost.map((val,i)=>{
						output+= `<option value="${val.value}"> ${jenis_layanan}, ${val.etd}, Rp.${val.value} </option>`			
						})
					}	
			})
			$('#ongkos').html(output)

			})
		}
$(function() {
			$.get("<?= base_url('ecomerce/setkota/10/49') ?>",{},(response)=>{
			let output='';
			let tujuan = response.rajaongkir.results.city_name
			let prov = response.rajaongkir.results.province
			console.log(tujuan)
				output+= `<input type="text" value="${tujuan} ${prov}">`			
			$('.po').html(output)
			})
		});

	</script>