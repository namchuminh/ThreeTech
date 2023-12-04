<?php require(__DIR__.'/layouts/header.php'); ?>		
<?php require(__DIR__.'/layouts/nav.php'); ?>
<link rel="stylesheet" type="text/css" href="styles/blog_styles.css">
<link rel="stylesheet" type="text/css" href="styles/blog_responsive.css">

<div class="home" style="height: 300px;">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url('static/'); ?>images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Tin Tức - Công Nghệ</h2>
		</div>
	</div>

	<!-- Blog -->

	<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">
						
						<!-- Product Item -->
							<?php foreach ($tintuc as $key => $value): ?>
								<div class="product_item" >
									<div class="product_border"></div>
									<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img style="width: 115px; height: 115px;" src="<?php echo $value['anhChinh']; ?>" alt=""></div></div>
									<div class="product_content text-left" style="margin-left: 30px;">
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

	<!-- Brands -->



<?php require(__DIR__.'/layouts/footer.php'); ?>