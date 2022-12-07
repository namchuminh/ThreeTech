<?php require(__DIR__.'/layouts/header.php'); ?>		
<?php require(__DIR__.'/layouts/nav.php'); ?>
<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						<li data-image="<?php echo $chiTietSanPham[0]["anhPhu1"]; ?>"><img src="<?php echo $chiTietSanPham[0]["anhPhu1"]; ?>" alt=""></li>
						<li data-image="<?php echo $chiTietSanPham[0]["anhChinh"]; ?>"><img src="<?php echo $chiTietSanPham[0]["anhChinh"]; ?>" alt=""></li>
						<li data-image="<?php echo $chiTietSanPham[0]["anhPhu2"]; ?>"><img src="<?php echo $chiTietSanPham[0]["anhPhu2"]; ?>" alt=""></li>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="<?php echo $chiTietSanPham[0]["anhChinh"]; ?>" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category"><a href="<?php echo base_url('chuyen-muc/').$chuyenMuc[0]["duongDanChuyenMuc"]; ?>"><?php echo $chuyenMuc[0]["tenChuyenMuc"]; ?></a></div>
						<div class="product_name"><?php echo $chiTietSanPham[0]["tenSanPham"]; ?></div>
						<div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
						<div class="product_text"><p><?php echo $chiTietSanPham[0]["moTa"]; ?></p></div>
						<div class="order_info d-flex flex-row">
							<form action="<?php echo base_url('them-vao-gio-hang/'); ?>" method="POST">
								<input type="hidden" name="sanPhamId" value="<?php echo $chiTietSanPham[0]["sanPhamId"]?>">
								<input type="hidden" name="tenSanPham" value="<?php echo $chiTietSanPham[0]["tenSanPham"]?>">
								<input type="hidden" name="giaBan" value="<?php echo $chiTietSanPham[0]["giaBan"]?>">
								<input type="hidden" name="anhChinh" value="<?php echo $chiTietSanPham[0]["anhChinh"]?>">
								<div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
											<?php if($chiTietSanPham[0]["trangThai"] == 1){ ?>
												<span style="color: black; font-weight: 200;"> Còn Hàng </span>
											<?php }else{ ?>
												<span style="color: red; font-weight: 200;"> Hết Hàng </span>
											<?php } ?>
									</div>

								</div>

								<div class="product_price"><?php echo $chiTietSanPham[0]["giaBan"]; ?></div>
								<div class="button_container">
									<?php
										if (isset($logged_in)) {?>
											<button type="submit" class="button cart_button" onclick="dathang()">
												Thêm vào giỏ hàng
											</button>
									<?php }else{ ?>
										<button type="submit" class="button cart_button">
										Bạn Chưa Đăng Nhập, Đăng Nhập Ngay
									</button>
									<?php } ?>
									
									<div class="product_fav"><i class="fas fa-heart"></i></div>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>


<div class="tcb-product-slider">
        <div class="container">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            	<div class="viewed_title_container" style="margin-top: -20px; margin-bottom: 20px;">
					<h3 class="viewed_title" style="font-family: 'Arial';font-weight: bolder;">Tương Tự</h3>
					<div class="viewed_nav_container">
						<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
					</div>
				</div>
                <!-- Wrapper for slides -->
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
											<div class="viewed_name" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block;"><a style="display: unset;" href="<?php echo base_url('san-pham/').$value["duongDan"]; ?>"><?php echo $value["tenSanPham"]; ?></a></div>
										</div>
									</div>
								</div>
							<?php endforeach ?>
							
							
						</div>
					</div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

<script type="text/javascript">
  	function dathang() {
  		alert("Thêm thành công");
    }

</script>
<?php require(__DIR__.'/layouts/footer.php'); ?>