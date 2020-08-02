<!-- BODY -->
<script>
	var i = 0; // Start point
	var images = [];
	var time = 2500;

	// Image List
	images[0] = '<?= base_url('assets/'); ?>img/banner/sepatu/alone.jpg';
	images[1] = '<?= base_url('assets/'); ?>img/banner/sepatu/anak.jpg';
	images[2] = '<?= base_url('assets/'); ?>img/banner/sepatu/baby.jpg';
	images[3] = '<?= base_url('assets/'); ?>img/banner/sepatu/brown.jpg';
	images[4] = '<?= base_url('assets/'); ?>img/banner/sepatu/buble.jpg';
	images[5] = '<?= base_url('assets/'); ?>img/banner/sepatu/car.jpg';
	images[6] = '<?= base_url('assets/'); ?>img/banner/sepatu/hiking.jpg';
	images[7] = '<?= base_url('assets/'); ?>img/banner/sepatu/horse.jpg';
	images[8] = '<?= base_url('assets/'); ?>img/banner/sepatu/jejak.jpg';
	images[9] = '<?= base_url('assets/'); ?>img/banner/sepatu/love.jpg';
	images[10] = '<?= base_url('assets/'); ?>img/banner/sepatu/pasangan.jpg';
	images[11] = '<?= base_url('assets/'); ?>img/banner/sepatu/rel.jpg';
	images[12] = '<?= base_url('assets/'); ?>img/banner/sepatu/shoe.jpg';
	images[13] = '<?= base_url('assets/'); ?>img/banner/sepatu/socer.jpg';
	images[14] = '<?= base_url('assets/'); ?>img/banner/sepatu/bannersepatucart.jpg';


	// Change Image
	function changeImg(){
		document.slide.src = images[i];

		if(i < images.length - 1){
			i++;
		} else {
			i = 0;
		}

		setTimeout("changeImg()", time);
	}

	window.onload = changeImg;

</script>
<section class="hot_deals_area section_gap">	
	<div class="hot_deal_box">
		<img class="img" name="slide" height="275dp" width="100%">
			<div class="content mt-3">
				<h2>Cari sepatu kesukaan kamu</h2>
				<h4><?= $user['nama']; ?></h4>
				
		</div>
	</div>
</section>
<!--  -->
<!--  -->
	<!--================End Home Banner Area =================-->
        <div class="container">
        	<div class="row">
					<div class="main_title">
						<h2>Kategori</h2>
					</div>
				</div>
            <div class="row">
            	<?php  foreach ($kategori as $kt) :?>
                <div class="col-lg-3">
                    <div class="categories_post">
            		<a href="<?= base_url('Ecomerce/kategori/').$kt['id_category']; ?>" title="">
                        <img src="<?= base_url('assets/img/product/product/').$kt['foto']; ?>" width="400dp" height="200px" alt="post">
                        <a href="<?= base_url('Ecomerce/kategori/').$kt['id_category']; ?>" title="">
                        <div class="categories_details">
                            <div class="categories_text">
                                    <h5><?= $kt['nama_category'] ;?></h5>
                                <div class="border_line"></div>
                                <p><?= $kt['nama_product']; ?></p>
                            </div>
                        </div>
                    	</a>
                    	</a>
                    </div>
                </div>
				<?php endforeach; ?>
            </div>
        </div>
	<!--================Hot Deals Area =================-->
	
	<!--================End Hot Deals Area =================-->

	<!--================Clients Logo Area =================-->
	
	<!--================End Clients Logo Area =================-->

	<!--================Feature Product Area =================-->
	
		<div class="main_box mt-5">
			<div class="container-fluid">
				<div class="row">
					<div class="main_title">
						<h2>Produk Pilihan</h2>
						<p>Cari produk kesukaan kamu.</p>
					</div>
				</div>

				<!--  -->
				<div class="row">
					<?php  foreach ($product as $hm) :?>
					<div class="col col">
						<div class="f_p_item">
							<div class="f_p_img">
								<a href="<?= base_url('Ecomerce/detail/').$hm['id_product']; ?>"><img class="card-img" width="100px" height="180px" src="<?= base_url('assets/img/product/product/').$hm['foto']; ?>"></a>
								<div class="p_icon">
									<a href="<?= base_url('Ecomerce/detail/').$hm['id_product']; ?>">
										<i class="lnr lnr-star"></i>
									</a>
								</div>
							</div>
							<a href="<?= base_url('Ecomerce/detail/').$hm['id_product']; ?>">
								<h4><?= $hm['nama_product'];?></h4>
							</a>
							<h5><?= $this->ecomerce_models->rupiah($hm['harga']);?></h5>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
				<!--  -->

				<div class="row">
					<nav class="cat_page mx-auto" aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="<?= base_url('ecomerce/alldataproduk') ?>" title="Lihat semua barang">
									<i class="fa fa-chevron-right" aria-hidden="true"></i>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	
	<!--================End Feature Product Area =================-->
				
<section class="hot_deals_area section_gap">
		<div class="container-fluid">
			<div class="row">
				<?php foreach ($baru as $br) { ?>
				<div class="col-lg-6">
					<div class="hot_deal_box">
						<img class="card-img" width="553dp" height="250dp" src="<?= base_url('assets/img/product/product/').$br['foto'] ?>" alt="">
						<div class="content">
							<h2>Produk Baru</h2>
							<h4><?= $br['nama_product'] ?></h4>	
						</div>
						<a class="hot_deal_link" href="<?= base_url('ecomerce/detail/').$br['id_product'] ?>"></a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</section>
	<!--================ Subscription Area ================-->
