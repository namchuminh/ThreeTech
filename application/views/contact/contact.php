<?php require(__DIR__.'/layouts/header.php'); ?>		
<?php require(__DIR__.'/layouts/nav.php'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/'); ?>styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('static/'); ?>styles/contact_responsive.css">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">






<div class="contact_info">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="<?php echo base_url('static/'); ?>images/contact_1.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Số điện thoại</div>
								<div class="contact_info_text">(+84)888.888.888</div>
							</div>
						</div>

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="<?php echo base_url('static/'); ?>images/contact_2.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Email</div>
								<div class="contact_info_text">threetech@gmail.com</div>
							</div>
						</div>

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="<?php echo base_url('static/'); ?>images/contact_3.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Địa chỉ</div>
								<div class="contact_info_text">Bắc Từ Liêm, Hà Nội</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Contact Form -->

	<div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_form_container">
						<div class="contact_form_title" style="display: flex;">
							Liên hệ
							<span style="margin: 0 auto; font-size: 15px; color: #0e8ce4;" class="thongbao"></span>
						</div>

						<form id="contact_form">
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input type="text" id="contact_form_name" class="contact_form_name input_field hoTen" placeholder="Họ tên" required="required" data-error="Name is required.">
								<input type="text" id="contact_form_email" class="contact_form_email input_field email" placeholder="Địa chỉ Email" required="required" data-error="Email is required.">
								<input type="text" id="contact_form_phone" class="contact_form_phone input_field soDienThoai" placeholder="Số điện thoại">
							</div>
							<div class="contact_form_text">
								<textarea id="contact_form_message" class="text_field contact_form_message tinNhan" rows="4" placeholder="Tin nhắn" required="required" data-error="Bạn chưa điền tin nhắn."></textarea>
							</div>
							<div class="contact_form_button">
								<button type="submit" class="button contact_submit_button guiTinNhan">Gửi tin nhắn</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Map -->

	<div id="map" style="width:100%;height:450px; margin-top: 50px; margin-bottom: 50px;">
	    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d426.7633605920663!2d105.78988211802731!3d21.068266985264433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135abd4211d9eed%3A0x92d1fd897780174f!2zTmjDoCB0cuG7jSBraGFuZw!5e0!3m2!1svi!2s!4v1670773549735!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="true" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>





<?php require(__DIR__.'/layouts/footer.php'); ?>

<script>
	var base_url =  window.location.origin == "http://localhost" ? window.location.origin + "/ThreeTech" : window.location.origin
	$(document).ready(function() {
		$('.guiTinNhan').click(function(event) {
			event.preventDefault()
			var hoTen = $('.hoTen').val()
			var email = $('.email').val()
			var soDienThoai = $('.soDienThoai').val()
			var tinNhan = $('.tinNhan').val()

			$.post(base_url + '/lien-he/xu-ly/', {hoTen: hoTen, email: email, soDienThoai: soDienThoai, tinNhan: tinNhan}, function(data){
				if(data == 1){
					$('.thongbao').text('Gửi Liên Hệ Thành Công!')
					$('.hoTen').val('')
					$('.email').val('')
					$('.soDienThoai').val('')
					$('.tinNhan').val('')
				}else{
					$('.thongbao').text('Gửi Liên Hệ Thành Không Thành Công!')
				}
			})
		});
	});
</script>