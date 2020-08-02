<div class="product_image_area mt-5">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_product_img">
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="card-img" src="<?= base_url('assets/img/product/product/').$detail['foto']; ?>" height="500px">
								</div>
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="col-12">
					<div class="s_product_text">
						<h3><?=$detail['nama_product']; ?></h3>
						<h2><?=$this->ecomerce_models->rupiah($detail['harga']); ?></h2>
					<hr>
					</div>
					<!--  -->
					<div class="row nt3">
						<div class="col-lg-12 mt-3">
							<div class="row total_rate">
								<div class="col-12">
									<div class="box_total">
										<h2>Rata-rata : <?= $avg['rating'] ?></h2>
											<div class="rating ">
                							<?php $nilai = $avg['rating'];
                 							for($i=0;$i<$nilai==1;$i++){ ?>
                							<label name="rating" /><label for="star" title="Penilaian"></label></label>
              								<?php } ?>
										<h6 class="mb-3">Dari : <?= $count['jumlah'] ?> Ulasan</h6>
										<hr>
									</div>
									</div>
								</div>
							</div>
							<div class="review_list mt-3">
								<?php foreach ($testi as $ts) :?>
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<a href="<?= base_url('admin/detailuser/').$ts['id_user'] ?>" title=""><img class="img-profile rounded-circle" width="50dp" height="50dp" src="<?= base_url('assets/img/profile/').$ts['photos'] ?>" alt="">
										</div>
										<div class="media-body">
											<h4><?= $ts['nama'] ?></h4>
											</a>
											<div class="rating ">
                							<?php $nilai = $ts['rating'];
                 							for($i=0;$i<$nilai==1;$i++){ ?>
                							<label name="rating"><label for="star" title="Penilaian"></label></label>
              								<?php } ?>
              								</div>
										</div>
									</div>
									<?php if($ts['foto'] == NULL) {

									}else{?>
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
					<!--  -->
				</div>
				</div>
			</div>
		</div>
	</div>