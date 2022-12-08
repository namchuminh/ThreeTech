<?php require(__DIR__.'/layouts/header.php'); ?>		
<?php require(__DIR__.'/layouts/nav.php'); ?>

<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Tin tức</h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Chuyên mục</div>
							<ul class="sidebar_categories">
								<li><a href="<?php echo base_url('/chuyen-muc/may-tinh-laptop/'); ?>">Laptop</a></li>
								<li><a href="<?php echo base_url('/chuyen-muc/may-tinh-pc/'); ?>">Máy tính</a></li>
								<li><a href="<?php echo base_url('/chuyen-muc/linh-kien/'); ?>">Linh kiện</a></li>
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						

						<div class="product_grid">
							<div class="product_grid_border"></div>

							
							<!-- Product Item -->
							<?php foreach ($tintuc as $key => $value): ?>
								<div class="product_item">
									<div class="product_border"></div>
									<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img style="width: 115px; height: 115px;" src="<?php echo $value['anhChinh']; ?>" alt=""></div></div>
									<div class="product_content">
										<div class="review_name">
												<a href="<?php echo base_url('tin-tuc/').$value['duongDan']; ?>"><?php echo $value['tieuDe']; ?></a>
											</div>
										<div class="review_rating_container">
												<div class="rating_r rating_r_4 review_rating"><i></i><i></i><i></i><i></i><i></i></div>
												<div class="review_time"><?php echo $value['ngayDang']; ?></div>
											</div>
											<div class="review_text"><p><?php echo mb_substr(strip_tags($value['noiDung']),0,100); ?>...</p></div>
									</div>
									
								</div>
								</div>
							<?php endforeach ?>
							

						</div>

					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Brands -->



<?php require(__DIR__.'/layouts/footer.php'); ?>