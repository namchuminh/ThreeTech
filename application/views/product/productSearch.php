<?php require(__DIR__.'/layouts/header.php'); ?>		
<?php require(__DIR__.'/layouts/nav.php'); ?>
<div class="home">
	<div class="home_background parallax-window" data-parallax="scroll" data-image-src="<?php echo base_url('static/'); ?>images/shop_background.jpg"></div>
	<div class="home_overlay"></div>
	<div class="home_content d-flex flex-column align-items-center justify-content-center">
		<h2 class="home_title">Tìm Kiếm: <?php echo $productName; ?></h2>
	</div>
</div>
<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
								<li><a href="#">Computers &amp; Laptops</a></li>
								<li><a href="#">Cameras &amp; Photos</a></li>
								<li><a href="#">Hardware</a></li>
								<li><a href="#">Smartphones &amp; Tablets</a></li>
								<li><a href="#">TV &amp; Audio</a></li>
								<li><a href="#">Gadgets</a></li>
								<li><a href="#">Car Electronics</a></li>
								<li><a href="#">Video Games &amp; Consoles</a></li>
								<li><a href="#">Accessories</a></li>
							</ul>
						</div>
						<div class="sidebar_section filter_by_section">
							<div class="sidebar_title">Filter By</div>
							<div class="sidebar_subtitle">Price</div>
							<div class="filter_price">
								<div id="slider-range" class="slider_range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 58%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 58%;"></span></div>
								<p>Range: </p>
								<p><input type="text" id="amount" class="amount" readonly="" style="border:0; font-weight:bold;"></p>
							</div>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle color_subtitle">Color</div>
							<ul class="colors_list">
								<li class="color"><a href="#" style="background: #b19c83;"></a></li>
								<li class="color"><a href="#" style="background: #000000;"></a></li>
								<li class="color"><a href="#" style="background: #999999;"></a></li>
								<li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
								<li class="color"><a href="#" style="background: #df3b3b;"></a></li>
								<li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
							</ul>
						</div>
						<div class="sidebar_section">
							<div class="sidebar_subtitle brands_subtitle">Brands</div>
							<ul class="brands_list">
								<li class="brand"><a href="#">Apple</a></li>
								<li class="brand"><a href="#">Beoplay</a></li>
								<li class="brand"><a href="#">Google</a></li>
								<li class="brand"><a href="#">Meizu</a></li>
								<li class="brand"><a href="#">OnePlus</a></li>
								<li class="brand"><a href="#">Samsung</a></li>
								<li class="brand"><a href="#">Sony</a></li>
								<li class="brand"><a href="#">Xiaomi</a></li>
							</ul>
						</div>
					</div>

				</div>

				<div class="col-lg-9">
					
					<!-- Shop Content -->

					<div class="shop_content">
						<div class="shop_bar clearfix">
							<div class="shop_product_count"><span>186</span> products found</div>
							<div class="shop_sorting">
								<span>Sort by:</span>
								<ul>
									<li>
										<span class="sorting_text">highest rated<i class="fas fa-chevron-down"></i></span>
										<ul>
											<li class="shop_sorting_button" data-isotope-option="{ &quot;sortBy&quot;: &quot;original-order&quot; }">highest rated</li>
											<li class="shop_sorting_button" data-isotope-option="{ &quot;sortBy&quot;: &quot;name&quot; }">name</li>
											<li class="shop_sorting_button" data-isotope-option="{ &quot;sortBy&quot;: &quot;price&quot; }">price</li>
										</ul>
									</li>
								</ul>
							</div>
						</div>

						<div class="product_grid" style="position: relative; height: 1012px;">
							<div class="product_grid_border"></div>

							
							<!-- Product Item -->
							<?php foreach ($product as $key => $value): ?>
								<div class="product_item discount" style="position: absolute; left: 177px; top: 0px;">
									<div class="product_border"></div>
									<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="<?php echo $value['anhChinh']; ?>" alt=""></div>
									<div class="product_content">
										<div class="product_price"><?php echo $value['giaGoc']; ?><span><?php echo $value['giaBan']; ?></span></div>
										<div class="product_name"><div><a href="<?php echo base_url('san-pham/').$value['duongDan']; ?>" tabindex="0"><?php echo $value['tenSanPham']; ?></a></div></div>
									</div>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
									<ul class="product_marks">
										<li class="product_mark product_discount">-25%</li>
										<li class="product_mark product_new">new</li>
									</ul>
								</div>

							<?php endforeach ?>   
						</div>

						<!-- Shop Page Navigation -->

						<div class="shop_page_nav d-flex flex-row">
							<div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
							<ul class="page_nav d-flex flex-row">
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">...</a></li>
								<li><a href="#">21</a></li>
							</ul>
							<div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
<?php require(__DIR__.'/layouts/footer.php'); ?>