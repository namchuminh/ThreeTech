<!DOCTYPE html>
<html lang="en">
<head>
<title>ThreeTech - Mua Laptop, Máy Tính, Thiết Bị Điện Tử Uy Tin - Giá Rẻ</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="ThreeTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/'); ?>styles/bootstrap4/bootstrap.min.css">
<link href="<?php echo base_url('static/'); ?>plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/'); ?>plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/'); ?>plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/'); ?>plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/'); ?>plugins/slick-1.8.0/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/'); ?>styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/'); ?>styles/responsive.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
<link href="<?php echo base_url('static/'); ?>plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/'); ?>styles/product_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/'); ?>styles/product_responsive.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/'); ?>styles/shop_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/'); ?>styles/shop_responsive.css">
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
										<a href="<?php echo base_url('khach-hang/'); ?>"><?php echo "Chào, ". $khachhang; ?></a>
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
		