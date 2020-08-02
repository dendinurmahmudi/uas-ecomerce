<section class="cart_area">
      <div class="container">
         <div class="banner_content text-center mb-3 mt-5">
		<div class="main_box mt-5">
			<div class="container-fluid">
				<div class="row">
					<div class="main_title">
						<h2>Hasil untuk '<?= $key ?>'</h2>
					</div>
				</div>
				<div class="row">
					<?php  foreach ($pencarian as $hm) :?>
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
			</div>
		</div>
	