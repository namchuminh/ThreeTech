<?php require(__DIR__.'/layouts/header.php'); ?>		
<?php require(__DIR__.'/layouts/nav.php'); ?>

<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url('static/'); ?>images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Top 20</h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Chuyên Mục</div>
							<ul class="sidebar_categories">
								<li><a href="<?php echo base_url('/chuyen-muc/may-tinh-pc/'); ?>">Computers &amp; Laptops</a></li>
								<li><a href="<?php echo base_url('/chuyen-muc/may-tinh-laptop/'); ?>">Laptop &amp; Máy Tính Sách Tay</a></li>
								<li><a href="<?php echo base_url('/chuyen-muc/linh-kien/'); ?>">Linh Kiện &amp; Phụ Kiện</a></li>
							</ul>
						</div>
						
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Loại Sản Phẩm</div>
							<ul class="brands_list">
								<li class="brand"><a href="<?php echo base_url('/noi-bat-moi/'); ?>">Sản Phẩm Nổi Bật</a></li>
								<li class="brand"><a href="<?php echo base_url('/audio-video/'); ?>">Audio Video</a></li>
								<li class="brand"><a href="<?php echo base_url('/may-tinh-laptop/'); ?>">Máy Tính &amp; Laptop</a></li>
								<li class="brand"><a href="<?php echo base_url('/top-20/'); ?>">Top 20</a></li>
								<li class="brand"><a href="<?php echo base_url('/trend/'); ?>">Trend 2022</a></li>
							</ul>
						</div>

						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Top Sản Phẩm</div>
							<ul class="brands_list">
								<?php foreach ($this->model_admin->getPhanTramSanPhamBanChay() as $key => $value): ?>
									<li class="brand">
										<a style="display: flex; justify-content: space-between;" href="<?php echo base_url('/san-pham/'.$value['duongDan'].'/'); ?>">
											<div>
												<img width="100" height="70" src="<?php echo $value['anhChinh']; ?>">
											</div>
											<div style="margin-left: 20px;">
												<span style="text-transform: uppercase;"><?php echo $value['tenSanPham']; ?></span>
											</div>
										</a>
									</li>
									<hr>
								<?php endforeach ?>
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_sorting">
								<span>Sắp xếp theo:</span>
								<ul>
									<li>
										<span class="sorting_text">Mặc Định<i class="fas fa-chevron-down"></span></i>
										<ul>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>Sắp mặc định</li>
											<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>Sắp theo tên</li>
											<li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>Sắp theo giá</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="product_grid">
							<div class="product_grid_border"></div>

							
							<!-- Product Item -->
							<?php foreach ($top20 as $key => $value): ?>
								<div class="product_item">
									<div class="product_border"></div>
									<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="<?php echo $value['anhChinh']; ?>" style="width: 115px; height: 115px;"></div>
									<div class="product_content">
										<div class="product_price"><?php echo $value["giaBan"]; ?></div>
										<div class="product_name"><div><a href="<?php echo base_url('san-pham/').$value['duongDan']; ?>" tabindex="0"><?php echo $value["tenSanPham"]; ?></a></div></div>
									</div>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>
							<?php endforeach ?>
							

						</div>

					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Recently Viewed -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h3 class="viewed_title">Có Thể Bạn Quan Tâm</h3>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">
						
						<!-- Recently Viewed Slider -->

						<div class="owl-carousel owl-theme viewed_slider">
							
							<?php foreach ($sanphamtuongtu as $key => $value): ?>
								<!-- Recently Viewed Item -->
								<div class="owl-item">
									<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
										<div class="viewed_image"><img src="<?php echo $value['anhChinh']; ?>" alt=""></div>
										<div class="viewed_content text-center">
											<div class="viewed_price"><?php echo $value["giaBan"]; ?><span><?php echo $value["giaGoc"]; ?></span></div>
											<div class="viewed_name" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block;"><a style="display: unset;" href=""><?php echo $value["tenSanPham"]; ?></a></div>
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

	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">
						
						<!-- Brands Slider -->

						<div class="owl-carousel owl-theme brands_slider">
							
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?php echo base_url('static/'); ?>images/brands_1.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?php echo base_url('static/'); ?>images/brands_2.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?php echo base_url('static/'); ?>images/brands_3.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?php echo base_url('static/'); ?>images/brands_4.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?php echo base_url('static/'); ?>images/brands_5.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?php echo base_url('static/'); ?>images/brands_6.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?php echo base_url('static/'); ?>images/brands_7.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="<?php echo base_url('static/'); ?>images/brands_8.jpg" alt=""></div></div>

						</div>
						
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

					</div>
				</div>
			</div>
		</div>
</div>

<?php require(__DIR__.'/layouts/footer.php'); ?>