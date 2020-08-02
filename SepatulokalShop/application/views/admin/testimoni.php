<section class="cart_area">
      <div class="container">
        <div class="banner_content text-center mb-3 mt-5">
               <h2>Ulasan</h2>
               <div class="page_link">
                  <a href="<?= base_url('admin'); ?>">Beranda</a>
               </div>
            </div>
         <div class="cart_inner">
				<div class="row">
					<?php  foreach ($product as $hm) :?>
					<div class="col col">
						<div class="f_p_item">
							<div class="f_p_img">
								<a href="<?= base_url('admin/detailulasan/').$hm['id_product'] ?>" title=""><img class="card-img" width="100px" height="180px" src="<?= base_url('assets/img/product/product/').$hm['foto']; ?>"></a>
							</div>
							<div class="rating mt-3">
                			<?php $nilai = $hm['rating'];
                 			for($i=0;$i<$nilai==1;$i++){ ?>
                			<label name="rating" /><label for="star" title="Penilaian"></label></label>
              				<?php } ?>
              				</div>
							<h4><?= $hm['nama_product'];?></h4>
							<h5><?= $this->ecomerce_models->rupiah($hm['harga']);?></h5>
						</div>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>