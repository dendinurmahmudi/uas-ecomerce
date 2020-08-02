<?php  ?>
<section class="banner_area hot_deals_area">
   <div class="d-flex align-items-center hot_deal_box">
      <img class="img" height="275dp" width="100%" src="<?= base_url('assets/'); ?>img/banner/sepatu/bannersepatucart.jpg">
         <div class="content mt-5">
            <div class="mt-4">
               <h2>Ulasan</h2>
               <div class="page_link">
                  <a href="<?= base_url('ecomerce'); ?>">Beranda</a>
               </div>
            </div>         
         </div>
   </div>
<!--  -->
<!--  -->
      <div class="container mt-5">
         <div class="cart_inner">
          <div class="col-md-6 mb-4">
    </div>
    <div class="billing_details">
				<div class="row">
					<div class="col-md-6 mt-4">
						<div class="row order_d_inner">
						<div class="details_item">
						<h4>Informasi Order</h4>
						<ul class="list">
							<?php foreach ($penilaian as $nilai) {
								$id = $nilai['id_pesanan'];
								$idbarang = $nilai['id_barang'];
								$penerima = $nilai['nama_penerima'];
								$tglk = $nilai['tgl'];
								$tglt = $nilai['tglterima'];
							} ?>
							<li>
								<a href="#">
									<span>Id Transaksi</span> : <label><?= $id; ?></label></a>
							</li>
							<li>
								<a href="#">
									<span>Barang</span> : <?php foreach ($penilaian as $nilai ) {?><label><?= $nilai['nama_product'] ?>( <?= $this->ecomerce_models->rupiah($nilai['harga']) ?> )</label> 
									<?php } ?></a>
							</li>
							
							<li>
								<a href="#">
									<span>Penerima</span> : <label><?= $penerima ?></label></a>
							</li>
							<li>
								<a href="#">
									<span>Tgl Pesan</span> : <label><?= $tglk ?></label></a>
							</li>
							<li>
								<a href="#">
									<span>Tgl Terima</span> : <label><?= $tglt ?></label></a>
							</li>
						</ul>
					</div>
					</div>
					<form class="row contact_form" action="<?= base_url('ecomerce/tambahUlasan'); ?>" method="post" enctype="multipart/form-data">
					</div>
					<div class="col-lg-6">
						<h3>Tambahkan Ulasan</h3>
						<div class="col-md-12 form-group">
						<?= $this->session->flashdata('pesan'); ?>	
						</div>
					<div class="text-center mb-3">
                			Berikan penilanmu!!!
                		</div>
                			<div class="starrating risingstar d-flex justify-content-center flex-row-reverse">
                    		<input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star"></label>
                    		<input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star"></label>
                    		<input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star"></label>
		                    <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star"></label>
        		            <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star"></label>
                		</div>
                		<div class="row mt-2 col-6">
                			<label for="">Penilaian untuk produk</label>
                			<select name="testi" class="form-control">
                				<?php foreach ($penilaian as $nilai ) {?>
                				<option value="<?= $nilai['id_barang'] ?>"><?= $nilai['nama_product'] ?></option>
                				<?php } ?>
                			</select>
                		</div>
                		<div class="custom-file">
                			<input type="text" class="custom-file-input" name="idpesan" value="<?= $id; ?>" readonly>
                		</div>
                		<div class="custom-file">
                  			<input type="file" class="custom-file-input" id="image" name="foto">
                  			<label for="image" class="custom-file-label"> Tambahkan Gambar</label>
              			</div>
              			<div class="row mt-2 col-12">
                		<textarea class="form-control" aria-label="With textarea" placeholder="Tulis ulasan disini" name="deskripsi"></textarea>
            			</div>
            			<div class="row mt-2 col-6">
            			<input type="submit" name="" value="Kirim" class="main_btn">
            			</div>
					</div>
					</form>
				</div>
			</form>
			</div>
		</div>
