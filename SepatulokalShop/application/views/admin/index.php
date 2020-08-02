<section class="cart_area">
      <div class="container">
      	<div class="banner_content text-center mb-3 mt-5">
               <h2>Beranda</h2>
            </div>
      	<!--  -->
      	<div class="container mt-2">
        	<div class="row">
					<div class="main_title">
						<h4>Toko hari ini Tanggal <?= $tgl; ?></h4>
					</div>
				</div>
            <div class="row">
            	<!-- Pesanan -->
                <div class="col-lg-3">
                    <div class="categories_post">
            		<a href="<?= base_url('admin/pesanan')?>" title="<?= $pemesan['jumlah'] ?> Pesanan Masuk hari ini">
                        <img src="" name="slide" width="400dp" height="200px" alt="post">
                        <a href="<?= base_url('admin/pesanan')?>" title="<?= $pemesan['jumlah'] ?> Pesanan Masuk hari ini">
                        <div class="categories_details">
                            <div class="categories_text">
                                    <h2><?= $pemesan['jumlah'] ?></h2>
                                <div class="border_line"></div>
                                <p>Pesanan</p>
                            </div>
                        </div>
                    	</a>
                    	</a>
                    </div>
                </div>
				<!-- Pesanan -->
				<!-- ulasan -->
                <div class="col-lg-3">
                    <div class="categories_post">
            		<a href="<?= base_url('admin/testimoni')?>" title="<?= $testi ?> Barang yang di ulas">
                        <img src="" name="slide1" width="400dp" height="200px" alt="post">
                        <a href="<?= base_url('admin/testimoni')?>" title="<?= $testi ?> Barang yang di ulas">
                        <div class="categories_details">
                            <div class="categories_text">
                                    <h2><?= $testi ?></h2>
                                <div class="border_line"></div>
                                <p>Ulasan</p>
                            </div>
                        </div>
                    	</a>
                    	</a>
                    </div>
                </div>
				<!-- ulasan -->
				<!-- produk -->
                <div class="col-lg-3">
                    <div class="categories_post">
            		<a href="<?= base_url('admin/barang')?>" title="">
                        <img src="" name="slide2" width="400dp" height="200px" alt="post">
                        <a href="<?= base_url('admin/barang')?>" title="">
                        <div class="categories_details">
                            <div class="categories_text">
                                    <h2><?= $barang; ?></h2>
                                <div class="border_line"></div>
                                <p>Produk</p>
                            </div>
                        </div>
                    	</a>
                    	</a>
                    </div>
                </div>
				<!-- produk -->
				<!-- pengguna -->
                <div class="col-lg-3">
                    <div class="categories_post">
            		<a href="<?= base_url('admin/userdata')?>" title="">
                        <img src="" name="slide3" width="400dp" height="200px" alt="post">
                        <a href="<?= base_url('admin/userdata')?>" title="">
                        <div class="categories_details">
                            <div class="categories_text">
                                    <h2><?= $pengguna; ?></h2>
                                <div class="border_line"></div>
                                <p>Pengguna</p>
                            </div>
                        </div>
                    	</a>
                    	</a>
                    </div>
                </div>
				<!-- pengguna -->
            </div>
        </div>

<script>
	var i = 0;
	var a = 4;
	var b = 8;
	var c = 12;
	var images = [];
	var time = 2500;
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
	function changeImg(){
		document.slide.src = images[i];
		if(i < images.length - 1){
			i++;
		} else {
			i = 0;
		}
		document.slide1.src = images[a];
		if(a < images.length - 1){
			a++;
		} else {
			a = 0;
		}
		document.slide2.src = images[b];
		if(b < images.length - 1){
			b++;
		} else {
			b = 0;
		}
		document.slide3.src = images[c];
		if(c < images.length - 1){
			c++;
		} else {
			c = 0;
		}
		setTimeout("changeImg()", time);
	}
	window.onload = changeImg;
</script>