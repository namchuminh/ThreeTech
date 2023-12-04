<?php require(__DIR__.'/layouts/header.php'); ?>		
<?php require(__DIR__.'/layouts/nav.php'); ?>
<style>
	img {
		max-width: 100%;
		image-rendering: -webkit-optimize-contrast;
	}
</style>
<div class="single_post">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="single_post_title"><?php echo $tinTuc[0]['tieuDe']; ?></div>
					<div class="single_post_text">
						<?php echo $tinTuc[0]['noiDung']; ?>
					</div>
				</div>
			</div>
		</div>
</div>

<div class="blog">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="blog_posts d-flex flex-row align-items-start justify-content-between">


						<!-- Blog post -->
						<div class="reviews">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="reviews_title_container">
						<h3 class="reviews_title">Tin Tức Liên Quan</h3>
						<div class="reviews_all ml-auto"><a href="<?php echo base_url('/tin-tuc/'); ?>">Xem tất<span> cả</span></a></div>
					</div>

					<div class="reviews_slider_container">
						
						<!-- Reviews Slider -->
						<div class="owl-carousel owl-theme reviews_slider">
							<?php foreach ($tintuclienquan as $key => $value): ?>
								<!-- Reviews Slider Item -->
								<div class="owl-item">
									<div class="review d-flex flex-row align-items-start justify-content-start">
										<div><div class="review_image"><img style="width: 115px; height: 115px;" src="<?php echo $value['anhChinh']; ?>" alt=""></div></div>
										<div class="review_content">
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

						

					</div>
				</div>	
			</div>
		</div>
</div>

<?php require(__DIR__.'/layouts/footer.php'); ?>