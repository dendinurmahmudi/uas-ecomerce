<div class="product_image_area mt-5">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_product_img">
						
							<div class="carousel-inner">
								<div class="carousel-item active">
									<a data-toggle="modal" data-target="#lihatfoto" href="#" title="Lihat"><img class="d-block w-100" src="<?= base_url('assets/img/product/product/').$detail['foto']; ?>" height="500px"></a>
								</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
				<div class="container">
					<div class="s_product_text">
						<h3><?=$detail['nama_product']; ?></h3>
						<h2><?=$this->ecomerce_models->rupiah($detail['harga']); ?></h2>
						<ul class="list">
							<li>
								<a class="active" href="<?= base_url('ecomerce/kategori/').$detail['id_category'] ?>">
									<span>Kategori</span> : <?=$detail['nama_category']; ?></a>
							</li>
							<li>
								<a href="#">
									<span>Stok</span> : <?=$detail['stok']; ?></a>
							</li>
						</ul>
						<p><?=$detail['deskripsi']; ?></p>
						<!--  -->
						<div class="card_area">
							 <a  class="main_btn" data-toggle="modal" data-target="#masukkeranjang" id="btn-tambahUlasan" href="">Masukan ke keranjang</a>
							 <a  class="main_btn" data-toggle="modal" data-target="#belisekarang" id="btn-tambahUlasan" href="">Beli sekarang</a>
							<a class="icon_btn mt-3" href="https://wa.me/6283824413480" target="_blank" rel="nofollow" title="Tanya penjual">
								<i class="lnr lnr lnr-envelope"></i>
							</a>
							<a class="icon_btn" href="#">
								<i class="lnr lnr lnr-heart"></i>
							</a>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Deskripsi</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Spesifikasi</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Ulasan</a>
				</li>
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
					<p><?= $detail['deskripsi'] ?></p>
				</div>
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td>
										<h5>Nama Barang</h5>
									</td>
									<td>
										<h5><?= $detail['nama_product']; ?></h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Harga</h5>
									</td>
									<td>
										<h5><?=$this->ecomerce_models->rupiah($detail['harga']); ?></h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Kategori</h5>
									</td>
									<td>
										<h5><?= $detail['nama_category'] ?></h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Stok</h5>
									</td>
									<td>
										<h5><?= $detail['stok'] ?></h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Berat</h5>
									</td>
									<td>
										<h5>1</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Packing</h5>
									</td>
									<td>
										<h5>Ya</h5>
									</td>
								</tr>
								<tr>
									<td>
										<h5>Box</h5>
									</td>
									<td>
										<h5>Ya</h5>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				
				<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
					<div class="row">
						<div class="col-lg-12">
							<div class="row total_rate">
								<div class="col-12">
									<div class="box_total">
										<h5>Rata-rata</h5>
										<h4><?= $avg['rating'] ?></h4>
											<div class="rating ">
                							<?php $nilai = $avg['rating'];
                 							for($i=0;$i<$nilai==1;$i++){ ?>
                							<label name="rating" /><label for="star" title="Penilaian"></label></label>
              								<?php } ?>
              								</div>
										<h6><?= $count['jumlah'] ?> Ulasan</h6>
									</div>
								</div>
							</div>
							<div class="review_list mt-3">
								<?php foreach ($testi as $ts) :?>
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img class="img-profile rounded-circle" width="50dp" height="50dp" src="<?= base_url('assets/img/profile/').$ts['photos'] ?>" alt="">
										</div>
										<div class="media-body">
											<h4><?= $ts['nama'] ?></h4>

											<div class="rating ">
                							<?php $nilai = $ts['rating'];
                 							for($i=0;$i<$nilai==1;$i++){ ?>
                							<label name="rating" /><label for="star" title="Penilaian"></label></label>
              								<?php } ?>
              								</div>
										</div>
									</div>
									<?php if($ts['foto'] == NULL){

									}else{ ?> 
									<img class="mt-3" src="<?= base_url('assets/img/testimoni/').$ts['foto'] ?>" alt="" width="130dp" height="130dp">
									<?php } ?>
									<p><?= $ts['deskripsi'] ?></p>
								</div>
								<p><?= $ts['tgl'] ?></p>
								<hr>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<form action="<?= base_url('ecomerce/Insertkeranjang/').$detail['id_product'];?>" method="post">

	<div class="modal fade" id="masukkeranjang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Masukan ke keranjang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
        					<label for="nama">Nama Barang :</label>
							<label ><?= $detail['nama_product'];?></label><br>
							<label for="harga">Harga :</label>
							<label ><?= $this->ecomerce_models->rupiah($detail['harga']);?></label><br>
        <div class="product_count">
							<label for="qty">Jumlah:</label>
							<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
							 class="increase items-count" type="button">
								<i class="lnr lnr-chevron-up"></i>
							</button>
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 1 ) result.value--;return false;"
							 class="reduced items-count" type="button">
								<i class="lnr lnr-chevron-down"></i>
							</button>
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
<form action="<?= base_url('ecomerce/singlecheckout/').$detail['id_product'];?>" method="post">

	<div class="modal fade" id="belisekarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Beli sekarang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body ">
        					<label for="nama">Nama Barang :</label>
							<label ><?= $detail['nama_product'];?></label><br>
							<label for="harga">Harga :</label>
							<label ><?= $this->ecomerce_models->rupiah($detail['harga']);?></label><br>
        <div class="product_count">

							<label for="jumlah">Jumlah:</label>
							<input type="text" name="jumlah" id="jumlah" maxlength="12" value="1" title="Quantity:" class="input-text qty">
							<button onclick="var result = document.getElementById('jumlah'); var jumlah = result.value; if( !isNaN( jumlah )) result.value++;return false;"
							 class="increase items-count" type="button">
								<i class="lnr lnr-chevron-up"></i>
							</button>
							<button onclick="var result = document.getElementById('jumlah'); var jumlah = result.value; if( !isNaN( jumlah ) &amp;&amp; jumlah > 1 ) result.value--;return false;"
							 class="reduced items-count" type="button">
								<i class="lnr lnr-chevron-down"></i>
							</button>
						</div>
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Beli</button>
          
        </div>
      </div>
    </div>
  </div>
  
</form>

<div class="modal fade" id="lihatfoto" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <img src="<?= base_url('assets/img/product/product/').$detail['foto']; ?>" width="100%" height="100%" >
      </div>
    </div>
  </div>