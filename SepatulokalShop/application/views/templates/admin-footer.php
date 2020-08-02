<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 class="footer_title">Tentang</h6>
						<p>Dibuat menggunakan Framework <a href="https://codeigniter.com/" target="_blank" rel="nofollow" title="">Code Igniter</a> dan Template <a href="https://getbootstrap.com/" target="_blank" rel="nofollow" title="">Bootstrap</a> dari <a href="https://colorlib.com" target="_blank" rel="nofollow">Colorlib</a>.</p>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 class="footer_title">Info Lebih lanjut</h6>
						<p>Mengenal lebih jauh dengan Programer web.</p>
						<div id="mc_embed_signup">
							<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
							 method="get" class="subscribe_form relative">
								<div class="input-group d-flex flex-row">
									<input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '"
									 required="" type="email">
									<button class="btn sub-btn">
										<span class="lnr lnr-arrow-right"></span>
									</button>
								</div>
								<div class="mt-10 info"></div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-footer-widget instafeed">
						<h6 class="footer_title">Foto Produk</h6>
						<ul class="list instafeed d-flex flex-wrap">
							<?php 
							$foto = $this->db->query('select * from tbl_product order by rand() limit 8')->result_array();
							foreach ($foto as $ft) {?>
							<li>
								<img width="57dp" height="57dp" src="<?= base_url('assets/img/product/product/').$ft['foto']; ?>" alt="">
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget f_social_wd">
						<h6 class="footer_title">Ikuti Kami</h6>
						<p>Sosial Media</p>
						<div class="f_social">
							<a href="https://wa.me/6283824413480" target="_blank" rel="nofollow">
								<i class="fa fa-whatsapp"></i>
							</a>
							<a href="https://www.instagram.com/dnmhmdd/" target="_blank" rel="nofollow">
								<i class="fa fa-instagram"></i>
							</a>
							<a href="mailto:dendinurmahmudi3@gmail.com" target="_blank" rel="nofollow">
								<i class="fa fa-google"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row footer-bottom d-flex justify-content-between align-items-center">
				<p class="col-lg-12 footer-text text-center"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy; <script>document.write(new Date().getFullYear());</script> Nurmahmudi with lkamal From <a href="https://sttbandung.ac.id" target="_blank">SttBandung</a><br>
This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</footer>