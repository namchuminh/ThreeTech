<!DOCTYPE html>
<html lang="en">
<head>
<title>ThreeTech - Mua Laptop, Máy Tính, Thiết Bị Điện Tử Uy Tin - Giá Rẻ</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/'); ?>styles/bootstrap4/bootstrap.min.css">
<link href="<?php echo base_url('static/'); ?>plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/'); ?>plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/'); ?>plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/'); ?>plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/'); ?>plugins/slick-1.8.0/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/'); ?>styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/'); ?>styles/responsive.css">

</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="<?php echo base_url('/static/'); ?>images/phone.png" alt=""></div>(+84)888.888.888</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="<?php echo base_url('/static/'); ?>images/mail.png" alt=""></div><a href="mailto:lienhe@threetech.online">lienhe@threetech.online</a></div>
						<div class="top_bar_content ml-auto">
							
							<div class="top_bar_user">
								<div class="user_icon"><img src="<?php echo base_url('/static/'); ?>images/user.svg" alt=""></div>
								<div>
									<?php if (isset($logged_in) && !empty($logged_in)){ ?>
										<a href="<?php echo base_url('/khach-hang/'); ?>"><?php echo "Chào, ". $khachhang; ?></a>
									<?php }else{ ?>
										<a href="<?php echo base_url('/dang-nhap/'); ?>">Đăng Nhập</a>
									<?php } ?>
								</div>
								<div>
									<?php if (isset($logged_in) && !empty($logged_in)){ ?>
										<a href="<?php echo base_url('/dang-xuat/'); ?>">Đăng Xuất</a>
									<?php }else{ ?>
										<a href="<?php echo base_url('/dang-ky/') ?>">Đăng Ký</a>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="<?php echo base_url(); ?>">ThreeTech</a></div>
						</div>
					</div>

					<!-- Search -->
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="<?php echo base_url('/tim-kiem/') ?>" class="header_search_form clearfix">
										<input type="search" required="required" class="header_search_input" placeholder="Nhập tên sản phẩm cần tìm..." name="product">
										<div class="custom_dropdown" style="display: none; width: 10px;">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc"></span>
												<ul class="custom_list clc">
													<li><a class="clc" href="#"></a></li>
													<li><a class="clc" href="#"></a></li>
													<li><a class="clc" href="#"></a></li>
												</ul>
											</div>
										</div>
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="<?php echo base_url('/static/images/search.png'); ?>" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<!-- Cart -->
							<?php if (isset($logged_in) && !empty($logged_in)): ?>
								<div class="cart">
									<div class="cart_container d-flex flex-row align-items-center justify-content-end">
										<div class="cart_icon">
											<img src="<?php echo base_url('/static/'); ?>images/cart.png" alt="">
											<div class="cart_count"><span>
												<?php
													if(isset($soluongsanpham)){
														echo $soluongsanpham[0]["so luong san pham"];
													}else{
														echo 0;
													}
												?>
											</span></div>
										</div>
										<div class="cart_content">
											<div class="cart_text"><a href="<?php echo base_url('/gio-hang/'); ?>">Cart</a></div>
											<div class="cart_price">

												<?php 
													if(isset($cart_price)){
														$g="";
														//echo $cart_price[0]['tongtien'];
													    $gia_tong = (string)($cart_price[0]['tongtien']);
													    for($i=0; $i<strlen($gia_tong); $i++){

													      	if(strlen($gia_tong)==9){
													          $g .= $gia_tong[$i];
													          if($i==1){
													            $g .=".";
													          }
													        }
													        else if(strlen($gia_tong)==7){
													          $g .= $gia_tong[$i];
													        }
													        else if(strlen($gia_tong)==8){
													          $g .= $gia_tong[$i];
													          if($i==0){
													            $g .=".";
													          }
													          
													        }
													        else if(strlen($gia_tong)==10){
													          $g .= $gia_tong[$i];
													          if($i==2){
													            $g .=".";
													          }
													        }else{
													          $g .= $gia_tong[$i];
													        
													        }
													    }
													    if($cart_price[0]['tongtien']==null){
															echo '0';
														}
													    echo $g." VNĐ";
													}
											 ?>
											</div>
										</div>
									</div>
								</div>
							<?php endif ?>
							
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<!-- Main Navigation -->

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="main_nav_content d-flex flex-row">

							<!-- Categories Menu -->

							<div class="cat_menu_container">
								<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
									<div class="cat_burger"><span></span><span></span><span></span></div>
									<div class="cat_menu_text">chuyên mục</div>
								</div>

								<ul class="cat_menu">
									<li><a href="<?php echo base_url('/noi-bat-moi/'); ?>">Sản Phẩm Nổi Bật - Mới<i class="fas fa-chevron-right ml-auto"></i></a></li>
									<li><a href="<?php echo base_url('/audio-video/'); ?>">Audio Video<i class="fas fa-chevron-right"></i></a></li>
									<li><a href="<?php echo base_url('/may-tinh-laptop/'); ?>">Máy Tính & Laptop<i class="fas fa-chevron-right"></i></a></li>
									<li><a href="<?php echo base_url('/top-20/'); ?>">Top 20<i class="fas fa-chevron-right"></i></a></li>
									<li><a href="<?php echo base_url('/trend/'); ?>">Trend 2023<i class="fas fa-chevron-right"></i></a></li>
								</ul>
							</div>

							<!-- Main Nav Menu -->

							<div class="main_nav_menu ml-auto">
								<ul class="standard_dropdown main_nav_dropdown">
									<li>
										<a href="<?php echo base_url(); ?>">Trang Chủ<i class="fas fa-chevron-down"></i></a>
									</li>
									<li class="hassubs">
										<a href="<?php echo base_url('/chuyen-muc/may-tinh-laptop/'); ?>">Laptop</a>
									</li>
									<li class="hassubs">
										<a href="<?php echo base_url('/chuyen-muc/may-tinh-pc/'); ?>">Máy Tính</i></a>
									</li>
									<li class="hassubs">
										<a href="<?php echo base_url('/chuyen-muc/linh-kien/'); ?>">Linh Kiện</i></a>
									</li>
									<li><a href="<?php echo base_url('/tin-tuc/'); ?>">Tin Tức</a></li>
									<li><a href="<?php echo base_url('/lien-he/'); ?>">Liên Hệ</a></li>
								</ul>
							</div>

							<!-- Menu Trigger -->

							<div class="menu_trigger_container ml-auto">
								<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
									<div class="menu_burger">
										<div class="menu_trigger_text">menu</div>
										<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</nav>
		
		<!-- Menu -->

	</header>
	
	<!-- Banner -->

	<div class="banner">
		<div class="banner_background" style="background-image:url(<?php echo base_url('static/'); ?>images/banner_background.jpg)"></div>
		<div class="container fill_height">
			<div class="row fill_height">
				<div class="banner_product_image">
					<img src="<?php echo base_url('static/'); ?>images/banner.png" alt="banner"></div>
				<div class="col-lg-5 offset-lg-4 fill_height">
					<div class="banner_content">
						<h3 class="banner_text">Laptop Gaming</h3>
						<br>
						<div class="banner_product_name">Giá chỉ từ</div>
						<div class="banner_product_name">8.000.000đ đến 15.000.000đ</div>
						<div class="button banner_button"><a href="<?php echo base_url('chuyen-muc/may-tinh-laptop/'); ?>">Mua Ngay</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Characteristics -->

	<div class="characteristics">
		<div class="container">
			<div class="row">

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="<?php echo base_url('static/'); ?>images/char_1.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="<?php echo base_url('static/'); ?>images/char_2.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="<?php echo base_url('static/'); ?>images/char_3.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>

				<!-- Char. Item -->
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="<?php echo base_url('static/'); ?>images/char_4.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Free Delivery</div>
							<div class="char_subtitle">from $50</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Deals of the week -->

	<div class="deals_featured">
		<div class="container">
			<div class="row">
				<div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
					
					<!-- Deals -->

					<div class="deals">
						<div class="deals_title">Giảm Giá Cuối Tuần</div>
						<div class="deals_slider_container">
							
							<!-- Deals Slider -->
							<div class="owl-carousel owl-theme deals_slider">
								<?php foreach ($giamgiacuoituan as $key => $value): ?>
									<!-- Deals Item -->
									<div class="owl-item deals_item">
										<div class="deals_image"><img src="<?php echo $value['anhChinh']; ?>" alt=""></div>
										<div class="deals_content">
											<div class="deals_info_line d-flex flex-row justify-content-start">
												<div class="deals_item_category"><a href="<?php echo base_url('chuyen-muc/').$value['duongDanChuyenMuc']; ?>"><?php echo $value['tenChuyenMuc']; ?></a></div>
												<div class="deals_item_price_a ml-auto"><?php echo $value['giaGoc']; ?></div>
											</div>
											<div class="deals_info_line d-flex flex-row justify-content-start">
												<div class="deals_item_name">
													<a href="<?php echo base_url('san-pham/').$value['duongDan']; ?>"><?php echo $value['tenSanPham']; ?></a>
												</div>
												<div class="deals_item_price ml-auto"><?php echo $value['giaBan']; ?></div>
											</div>
											<div class="available">
												<div class="available_line d-flex flex-row justify-content-start">
													<div class="available_title">Đã bán: <span>6</span></div>
													<div class="sold_title ml-auto">Còn hàng: <span><?php echo $value['soLuong']; ?></span></div>
												</div>
												<div class="available_bar"><span style="width:17%"></span></div>
											</div>
											<div class="deals_timer d-flex flex-row align-items-center justify-content-start">
												<div class="deals_timer_title_container">
													<div class="deals_timer_title">Thời Gian</div>
													<div class="deals_timer_subtitle">Kết thúc giảm giá:</div>
												</div>
												<div class="deals_timer_content ml-auto">
													<div class="deals_timer_box clearfix" data-target-time="">
														<div class="deals_timer_unit">
															<div id="deals_timer1_hr" class="deals_timer_hr"></div>
															<span>giờ</span>
														</div>
														<div class="deals_timer_unit">
															<div id="deals_timer1_min" class="deals_timer_min"></div>
															<span>phút</span>
														</div>
														<div class="deals_timer_unit">
															<div id="deals_timer1_sec" class="deals_timer_sec"></div>
															<span>giây</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach ?>

							</div>

						</div>

						<div class="deals_slider_nav_container">
							<div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
							<div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
						</div>
					</div>
					
					<!-- Featured -->
					<div class="featured">
						<div class="tabbed_container">
							<div class="tabs">
								<ul class="clearfix">
									<li class="active">Phổ Biến</li>
									<li>Đang Giảm Giá</li>
									<li>Tốt Nhất</li>
								</ul>
								<div class="tabs_line"><span></span></div>
							</div>

							<!-- Product Panel -->
							<div class="product_panel panel active">
								<div class="featured_slider slider">

									<!-- Slider Item -->
									<?php foreach ($phobien as $key => $value): ?>
										
									
										<div class="featured_slider_item">
											<div class="border_active"></div>
											<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img style="width: 115px; height: 115px;" src="<?php echo $value['anhChinh'] ?>" alt=""></div>
												<div class="product_content">
													<div class="product_price discount"><?php echo $value["giaBan"]; ?><span><?php echo $value["giaGoc"]; ?></span></div>
													<div class="product_name"><div><a href="<?php echo base_url('san-pham/').$value['duongDan']; ?>"><?php echo $value["tenSanPham"]; ?></a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button themPhoBien" id="themGioHang" value="<?php echo $value["sanPhamId"]; ?>">Thêm Giỏ Hàng</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
											</div>
										</div>

									<?php endforeach ?>
								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

							<!-- Product Panel -->

							<div class="product_panel panel">
								<div class="featured_slider slider">

									<!-- Slider Item -->
										<?php foreach ($uudai as $key => $value): ?>
											
										
											<div class="featured_slider_item">
												<div class="border_active"></div>
												<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
													<div class="product_image d-flex flex-column align-items-center justify-content-center"><img style="width: 115px; height: 115px;" src="<?php echo $value['anhChinh'] ?>" alt=""></div>
													<div class="product_content">
														<div class="product_price discount"><?php echo $value["giaBan"]; ?><span><?php echo $value["giaGoc"]; ?></span></div>
														<div class="product_name"><div><a href="<?php echo base_url('san-pham/').$value['duongDan']; ?>"><?php echo $value["tenSanPham"]; ?></a>
														</div>
													</div>
														<div class="product_extras">
															<div class="product_color">
																<input type="radio" checked name="product_color" style="background:#b19c83">
																<input type="radio" name="product_color" style="background:#000000">
																<input type="radio" name="product_color" style="background:#999999">
															</div>
														</div>
													</div>
													<div class="product_fav"><i class="fas fa-heart"></i></div>
												</div>
											</div>

										<?php endforeach ?>
									

								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

							<!-- Product Panel -->

							<div class="product_panel panel">
								<div class="featured_slider slider">

									<!-- Slider Item -->
										<?php foreach ($totnhat as $key => $value): ?>
											
										
											<div class="featured_slider_item">
												<div class="border_active"></div>
												<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
													<div class="product_image d-flex flex-column align-items-center justify-content-center"><img style="width: 115px; height: 115px;" src="<?php echo $value['anhChinh'] ?>" alt=""></div>
													<div class="product_content">
														<div class="product_price discount"><?php echo $value["giaBan"]; ?><span><?php echo $value["giaGoc"]; ?></span></div>
														<div class="product_name"><div><a href="<?php echo base_url('san-pham/').$value['duongDan']; ?>"><?php echo $value["tenSanPham"]; ?></a></div></div>
														<div class="product_extras">
															<div class="product_color">
																<input type="radio" checked name="product_color" style="background:#b19c83">
																<input type="radio" name="product_color" style="background:#000000">
																<input type="radio" name="product_color" style="background:#999999">
															</div>
														</div>
													</div>
													<div class="product_fav"><i class="fas fa-heart"></i></div>
												</div>
											</div>

										<?php endforeach ?>

								</div>
								<div class="featured_slider_dots_cover"></div>
							</div>

						</div>
					</div>

				</div>
			</div>
		</div>
	</div>

	<!-- Popular Categories -->

	<div class="popular_categories">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="popular_categories_content">
						<div class="popular_categories_title">Danh Mục Sản Phẩm</div>
						<div class="popular_categories_slider_nav">
							<div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
					</div>
				</div>
				
				<!-- Popular Categories Slider -->

				<div class="col-lg-9">
					<div class="popular_categories_slider_container">
						<div class="owl-carousel owl-theme popular_categories_slider">

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="<?php echo base_url('static/'); ?>images/popular_2.png" alt=""></div>
									<div class="popular_category_text">Máy Tính & Computer</div>
								</div>
							</div>

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="<?php echo base_url('static/'); ?>images/popular_1.png" alt=""></div>
									<div class="popular_category_text">Máy Tính Sách Tay & Laptop</div>
								</div>
							</div>

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="<?php echo base_url('static/'); ?>images/popular_3.png" alt=""></div>
									<div class="popular_category_text">Linh Kiện & Phụ Kiện</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Banner -->

	<div class="banner_2">
		<div class="banner_2_background" style="background-image:url(<?php echo base_url('static/') ?>images/banner_2_background.jpg)"></div>
		<div class="banner_2_container">
			<div class="banner_2_dots"></div>
			<!-- Banner 2 Slider -->

			<div class="owl-carousel owl-theme banner_2_slider">

				<!-- Banner 2 Slider Item -->
				<?php foreach ($slide as $key => $value): ?>
					
				
					<div class="owl-item">
						<div class="banner_2_item">
							<div class="container fill_height">
								<div class="row fill_height">
									<div class="col-lg-4 col-md-6 fill_height">
										<div class="banner_2_content">
											<div class="banner_2_category"><?php echo $value["tenChuyenMuc"]; ?></div>
											<div class="banner_2_title"><?php echo $value["tenSanPham"]; ?></div>
											
											<div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
											<div class="button banner_2_button"><a href="<?php echo base_url('san-pham/').$value['duongDan']; ?>">Xem ngay</a></div>
										</div>
										
									</div>
									<div class="col-lg-8 col-md-6 fill_height">
										<div class="banner_2_image_container">
											<div class="banner_2_image"><img src="<?php echo $value['anhChinh']; ?>" alt=""></div>
										</div>
									</div>
								</div>
							</div>			
						</div>
					</div>
				<?php endforeach ?>
				
				

			</div>
		</div>
	</div>

	<!-- Hot New Arrivals -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">Sản Phẩm Hot</div>
							<ul class="clearfix">
								<li class="active">Nổi Bật - Mới</li>
								<li>Audio & Video</li>
								<li>Laptops & Computers</li>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>
						<div class="row">
							<div class="col-lg-9" style="z-index:1;">

								<!-- Product Panel -->
								<div class="product_panel panel active">
									<div class="arrivals_slider slider">

										<!-- Slider Item -->
										<?php foreach ($noibatmoi as $key => $value): ?>
											<div class="arrivals_slider_item">
												<div class="border_active"></div>
												<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
													<div class="product_image d-flex flex-column align-items-center justify-content-center"><img style="width: 115px; height: 115px;" src="<?php echo $value['anhChinh'] ?>" alt=""></div>
													<div class="product_content">
														<div class="product_price"><?php echo $value["giaBan"] ?></div>
														<div class="product_name"><div><a href="<?php echo base_url('san-pham/').$value['duongDan']; ?>"><?php echo $value["tenSanPham"] ?></a></div></div>
														<div class="product_extras">
															<div class="product_color">
																<input type="radio" checked name="product_color" style="background:#b19c83">
																<input type="radio" name="product_color" style="background:#000000">
																<input type="radio" name="product_color" style="background:#999999">
															</div>
														</div>
													</div>
													<div class="product_fav"><i class="fas fa-heart"></i></div>
													<ul class="product_marks">
														<li class="product_mark product_discount">-25%</li>
														<li class="product_mark product_new">new</li>
													</ul>
												</div>
											</div>
										<?php endforeach ?>
										

									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

								<!-- Product Panel -->
								<div class="product_panel panel">
									<div class="arrivals_slider slider">

										<!-- Slider Item -->
										<?php foreach ($audiovideo as $key => $value): ?>
											
										
											<div class="arrivals_slider_item">
												<div class="border_active"></div>
												<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
													<div class="product_image d-flex flex-column align-items-center justify-content-center"><img style="width: 115px; height: 115px;" src="<?php echo $value['anhChinh']; ?>" alt=""></div>
													<div class="product_content">
														<div class="product_price"><?php echo $value["giaBan"]; ?></div>
														<div class="product_name"><div><a href="<?php echo base_url('san-pham/').$value['duongDan']; ?>"><?php echo $value["tenSanPham"] ?></a></div></div>
														<div class="product_extras">
															<div class="product_color">
																<input type="radio" checked name="product_color" style="background:#b19c83">
																<input type="radio" name="product_color" style="background:#000000">
																<input type="radio" name="product_color" style="background:#999999">
															</div>
														</div>
													</div>
													<div class="product_fav"><i class="fas fa-heart"></i></div>
													<ul class="product_marks">
														<li class="product_mark product_discount">-25%</li>
														<li class="product_mark product_new">new</li>
													</ul>
												</div>
											</div>
										<?php endforeach ?>


										
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>



								<div class="product_panel panel">
									<div class="arrivals_slider slider">

										<!-- Slider Item -->

										<?php foreach ($laptopcomputer as $key => $value): ?>
											<div class="arrivals_slider_item">
												<div class="border_active"></div>
												<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
													<div class="product_image d-flex flex-column align-items-center justify-content-center"><img style="width: 115px; height: 115px;" src="<?php echo $value['anhChinh']; ?>" alt=""></div>
													<div class="product_content">
														<div class="product_price"><?php echo $value["giaBan"]; ?></div>
														<div class="product_name"><div><a href="<?php echo base_url('san-pham/').$value['duongDan']; ?>"><?php echo $value["tenSanPham"]; ?></a></div></div>
														<div class="product_extras">
															<div class="product_color">
																<input type="radio" checked name="product_color" style="background:#b19c83">
																<input type="radio" name="product_color" style="background:#000000">
																<input type="radio" name="product_color" style="background:#999999">
															</div>
														</div>
													</div>
													<div class="product_fav"><i class="fas fa-heart"></i></div>
													<ul class="product_marks">
														<li class="product_mark product_discount">-25%</li>
														<li class="product_mark product_new">new</li>
													</ul>
												</div>
											</div>
										<?php endforeach ?>
										
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>


							</div>

							<?php $index = rand(0, count($phobien) - 1); ?>
							<div class="col-lg-3">
								<div class="arrivals_single clearfix">
									<div class="d-flex flex-column align-items-center justify-content-center">
										<div class="arrivals_single_image"><img style="width: 212px; height: 200px;" src="<?php echo $phobien[$index]['anhChinh'] ?>" alt=""></div>
										<div class="arrivals_single_content">
											<div class="arrivals_single_category"><a href="<?php echo base_url('chuyen-muc/').$phobien[$index]['duongDanChuyenMuc']; ?>"><?php echo $phobien[$index]["tenChuyenMuc"]; ?></a></div>
											<div class="arrivals_single_name_container clearfix">
												<div class="arrivals_single_name"><a href="<?php echo base_url('san-pham/').$phobien[$index]['duongDan']; ?>"><?php echo $phobien[$index]["tenSanPham"]; ?></a></div>
												<div class="arrivals_single_price text-right"><?php echo $phobien[$index]["giaBan"]; ?></div>
											</div>
											<div class="rating_r rating_r_4 arrivals_single_rating"><i></i><i></i><i></i><i></i><i></i></div>
										</div>
										<div class="arrivals_single_fav product_fav active"><i class="fas fa-heart"></i></div>
										<ul class="arrivals_single_marks product_marks">
											<li class="arrivals_single_mark product_mark product_new">new</li>
										</ul>
									</div>
								</div>
							</div>


						</div>
								
					</div>
				</div>
			</div>
		</div>		
	</div>

	<!-- Best Sellers -->

	<div class="best_sellers">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">Hot Best Sellers</div>
							<ul class="clearfix">
								<li class="active">Top 20</li>
								<li>Audio & Video</li>
								<li>Laptops & Computers</li>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>

						<div class="bestsellers_panel panel active">

							<!-- Best Sellers Slider -->

							<div class="bestsellers_slider slider">

								<!-- Best Sellers Item -->
								<?php foreach ($top20 as $key => $value): ?>
									
								
									<div class="bestsellers_item discount">
										<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
											<div class="bestsellers_image"><img style="width: 80px; height: 80px;" src="<?php echo $value['anhChinh']; ?>" alt=""></div>
											<div class="bestsellers_content">
												<div class="bestsellers_category"><a href="<?php echo base_url('chuyen-muc/').$value['duongDanChuyenMuc']; ?>"><?php echo $value["tenChuyenMuc"]; ?></a></div>
												<div class="bestsellers_name" ><a  href="<?php echo base_url('san-pham/').$value['duongDan']; ?>"><?php echo mb_substr($value["tenSanPham"],0,17); ?>...</a></div>
												<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
												<div class="bestsellers_price discount"><?php echo $value["giaBan"]; ?><span><?php echo $value["giaGoc"]; ?></span></div>
											</div>
										</div>
										<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
										<ul class="bestsellers_marks">
											
											
										</ul>
									</div>
								<?php endforeach ?>
								


							</div>
						</div>

						<div class="bestsellers_panel panel">

							<!-- Best Sellers Slider -->

							<div class="bestsellers_slider slider">

								<!-- Best Sellers Item -->

								<?php foreach ($audiovideo as $key => $value): ?>
									
								
									<div class="bestsellers_item discount">
										<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
											<div class="bestsellers_image"><img style="width: 80px; height: 80px;" src="<?php echo $value['anhChinh']; ?>" alt=""></div>
											<div class="bestsellers_content">
												<div class="bestsellers_category"><a href="<?php echo base_url('chuyen-muc/').$value['duongDanChuyenMuc']; ?>"><?php echo $value["tenChuyenMuc"]; ?></a></div>
												<div class="bestsellers_name"><a href="<?php echo base_url('san-pham/').$value['duongDan']; ?>"><?php echo mb_substr($value["tenSanPham"],0,17); ?>...</a></div>
												<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
												<div class="bestsellers_price discount"><?php echo $value['giaBan']; ?><span><?php echo $value['giaGoc']; ?></span></div>
											</div>
										</div>
										<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
										<ul class="bestsellers_marks">
											
										</ul>
									</div>
								<?php endforeach ?>
								
								


							</div>
						</div>

						<div class="bestsellers_panel panel">

							<!-- Best Sellers Slider -->

							<div class="bestsellers_slider slider">

								<!-- Best Sellers Item -->

								<?php foreach ($laptopcomputer as $key => $value): ?>
									
								
									<div class="bestsellers_item discount">
										<div class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
											<div class="bestsellers_image"><img style="width: 80px; height: 80px;" src="<?php echo $value['anhChinh']; ?>" alt=""></div>
											<div class="bestsellers_content">
												<div class="bestsellers_category"><a href="<?php echo base_url('chuyen-muc/').$value['duongDanChuyenMuc']; ?>"><?php echo $value["tenChuyenMuc"]; ?></a></div>
												<div class="bestsellers_name"><a href="<?php echo base_url('san-pham/').$value['duongDan']; ?>"><?php echo mb_substr($value["tenSanPham"],0,17); ?>...</a></div>
												<div class="rating_r rating_r_4 bestsellers_rating"><i></i><i></i><i></i><i></i><i></i></div>
												<div class="bestsellers_price discount"><?php echo $value["giaBan"]; ?><span><?php echo $value['giaGoc']; ?></span></div>
											</div>
										</div>
										<div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
										<ul class="bestsellers_marks">
										</ul>
									</div>
								<?php endforeach ?>
								

								

							</div>
						</div>
					</div>
						
				</div>
			</div>
		</div>
	</div>


	<!-- Trends -->

	<div class="trends">
		<div class="trends_background" style="background-image:url(<?php echo base_url('/static/'); ?>images/trends_background.jpg)"></div>
		<div class="trends_overlay"></div>
		<div class="container">
			<div class="row">

				<!-- Trends Content -->
				<div class="col-lg-3">
					<div class="trends_container">
						<h2 class="trends_title">Trends 2022</h2>
						<div class="trends_text"><p>Các sản phẩm đang được ưa chuộng trong 2022!</p></div>
						<div class="trends_slider_nav">
							<div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
					</div>
				</div>

				<!-- Trends Slider -->
				<div class="col-lg-9">
					<div class="trends_slider_container">

						<!-- Trends Slider -->

						<div class="owl-carousel owl-theme trends_slider">

							<!-- Trends Slider Item -->
							<?php foreach ($trend as $key => $value): ?>
								
							
								<div class="owl-item">
									<div class="trends_item is_new">
										<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img style="width: 115px; height: 115px;" src="<?php echo $value['anhChinh']; ?>" alt=""></div>
										<div class="trends_content">
											<div class="trends_category"><a href="<?php echo base_url('chuyen-muc/').$value['duongDanChuyenMuc']; ?>"><?php echo $value["tenChuyenMuc"]; ?></a></div>
											<div class="trends_info clearfix">
												<div class="trends_name"><a href="<?php echo base_url('san-pham/').$value['duongDan']; ?>"><?php echo $value["tenSanPham"]; ?></a></div>
												<div class="trends_price"><?php echo $value["giaBan"]; ?></div>
											</div>
										</div>
										<ul class="trends_marks">
											
											
										</ul>
										<div class="trends_fav"><i class="fas fa-heart"></i></div>
									</div>
								</div>
							<?php endforeach ?>
							

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Reviews -->

	<div class="reviews">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="reviews_title_container">
						<h3 class="reviews_title">Tin Tức - Công Nghệ</h3>
						<div class="reviews_all ml-auto"><a href="<?php echo base_url('/tin-tuc/'); ?>">Xem tất<span> cả</span></a></div>
					</div>

					<div class="reviews_slider_container">
						
						<!-- Reviews Slider -->
						<div class="owl-carousel owl-theme reviews_slider">
							<?php foreach ($tintuc as $key => $value): ?>
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
							
							<?php foreach ($cothebanquantam as $key => $value): ?>
								<!-- Recently Viewed Item -->
								<div class="owl-item">
									<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
										<div class="viewed_image"><img src="<?php echo $value['anhChinh']; ?>" alt=""></div>
										<div class="viewed_content text-center">
											<div class="viewed_price"><?php echo $value["giaBan"]; ?><span><?php echo $value["giaGoc"]; ?></span></div>
											<div class="viewed_name" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block;"><a style="display: unset;" href="<?php echo base_url('san-pham/').$value["duongDan"]; ?>"><?php echo $value["tenSanPham"]; ?></a></div>
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



<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="#">ThreeTech</a></div>
						</div>
						<div class="footer_title">Liên hệ với chúng tôi 24/7</div>
						<div class="footer_phone">(+84)888.888.888</div>
						<div class="footer_contact_text">
							<p>17 Nguyễn Trí Kiên, Ba Đình, Hà Nội</p>
							<p>100000 NW18JR, HN</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-youtube"></i></a></li>
								<li><a href="#"><i class="fab fa-google"></i></a></li>
								<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Tìm Kiếm Nhanh</div>
						<ul class="footer_list">
							<li><a href="<?php echo base_url('noi-bat-moi/'); ?>">Sản Phẩm Nổi Bật</a></li>
							<li><a href="<?php echo base_url('audio-video/'); ?>">Audio & Video</a></li>
							<li><a href="<?php echo base_url('may-tinh-laptop/'); ?>">Máy Tính & Laptop</a></li>
							<li><a href="<?php echo base_url('top-20/'); ?>">Top 20 Sản Phẩm</a></li>
							<li><a href="<?php echo base_url('trend/'); ?>">Xu Hướng 2023</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<ul class="footer_list footer_list_2">
							<li><a href="<?php echo base_url(); ?>">Trang Chủ</a></li>
							<li><a href="<?php echo base_url('chuyen-muc/may-tinh-pc/'); ?>">Máy Tính Laptop</a></li>
							<li><a href="<?php echo base_url('chuyen-muc/may-tinh-laptop//'); ?>">Máy Tính PC</a></li>
							<li><a href="<?php echo base_url('chuyen-muc/linh-kien/'); ?>">Linh Kiện & Điện Tử</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">Dành Cho Khách Hàng</div>
						<ul class="footer_list">
							<li><a href="<?php echo base_url('dang-nhap/'); ?>">Đăng Nhập</a></li>
							<li><a href="<?php echo base_url('dang-ky/'); ?>">Đăng Ký</a></li>
							<li><a href="<?php echo base_url('gio-hang/'); ?>">Giỏ Hàng</a></li>
							<li><a href="<?php echo base_url('lien-he/'); ?>">Liên Hệ</a></li>
							<li><a href="<?php echo base_url('tin-tuc/'); ?>">Tin Tức</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
ThreeTech &copy;<script>document.write(new Date().getFullYear());</script> Bản quyền thuộc <i class="fa fa-heart" aria-hidden="true"></i> <a href="<?php echo base_url(); ?>">ThreeTech</a> - Mua máy tính, linh kiện, phụ kiện điển tử giá rẻ, uy tín!
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
						<div class="logos ml-sm-auto">
							<ul class="logos_list">
								<li><a href="#"><img src="<?php echo base_url('static/'); ?>images/logos_1.png" alt=""></a></li>
								<li><a href="#"><img src="<?php echo base_url('static/'); ?>images/logos_2.png" alt=""></a></li>
								<li><a href="#"><img src="<?php echo base_url('static/'); ?>images/logos_3.png" alt=""></a></li>
								<li><a href="#"><img src="<?php echo base_url('static/'); ?>images/logos_4.png" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?php echo base_url('static/'); ?>js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url('static/'); ?>styles/bootstrap4/popper.js"></script>
<script src="<?php echo base_url('static/'); ?>styles/bootstrap4/bootstrap.min.js"></script>
<script src="<?php echo base_url('static/'); ?>plugins/greensock/TweenMax.min.js"></script>
<script src="<?php echo base_url('static/'); ?>plugins/greensock/TimelineMax.min.js"></script>
<script src="<?php echo base_url('static/'); ?>plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="<?php echo base_url('static/'); ?>plugins/greensock/animation.gsap.min.js"></script>
<script src="<?php echo base_url('static/'); ?>plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="<?php echo base_url('static/'); ?>plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="<?php echo base_url('static/'); ?>plugins/slick-1.8.0/slick.js"></script>
<script src="<?php echo base_url('static/'); ?>plugins/easing/easing.js"></script>
<script src="<?php echo base_url('static/'); ?>js/custom.js"></script>

<script>
	var base_url =  window.location.origin == "http://localhost" ? window.location.origin + "/ThreeTech" : window.location.origin
	
	$(document).ready(function() {
		$(".product_cart_button").click(function(){
			var sanPhamId = $(this).val()
			$.post(base_url + '/them-gio-hang/',{sanPhamId: sanPhamId}, function(result){
				if(result == "chuaDangNhap"){
					window.location = base_url + '/dang-nhap/'
				}else{
					alert(result)
				}
			})
		})
	});
</script>

</body>

</html>
