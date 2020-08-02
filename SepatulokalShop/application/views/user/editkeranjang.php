<div class="product_image_area mt-5">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_product_img">
						
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="d-block w-100" src="<?= base_url('assets/img/product/product/').$keranjang1['foto']; ?>" height="500px">
								</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?=$keranjang1['nama_product']; ?></h3>
						<h2><?=$this->ecomerce_models->rupiah($keranjang1['harga']); ?></h2>
						<ul class="list">
							<li>
								<a class="active" href="#">
									<span>Kategori</span> : <?=$keranjang1['nama_category']; ?></a>
							</li>
							<li>
								<a href="#">
									<span>Stok</span> : <?=$keranjang1['stok']; ?></a>
							</li>
							<form action="<?= base_url('ecomerce/edit_keranjang/').$keranjang1['id_product']."/".$keranjang1['id_product'];?>" method="POST">
							<li>
								<div class="product_count">
									<a href="#">
							<span><label for="qty">Jumlah</label></span> :
							<input type="text" name="qty" id="sst" maxlength="12" value="<?=$keranjang1['jumlah']; ?>" title="Quantity:" class="input-text qty sst">
							<input type="text" name="qty" id="sst" value="0" class="input-text qty sst">
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
							 class="increase items-count" type="button">
								<i class="lnr lnr-chevron-up"></i>
							</button>
							<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 1 ) result.value--;return false;"
							 class="reduced items-count" type="button">
								<i class="lnr lnr-chevron-down"></i>
							</button>
						</a>
						</div>						
						
							</li>
						</ul>
						<p><?=$keranjang1['deskripsi']; ?></p>
						<!--  -->
						<div class="card_area">
							 <button type="submit" class="btn btn-primary">Simpan</button>
							 </form>
							<a class="icon_btn" href="#">
								<i class="lnr lnr lnr-diamond"></i>
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
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	