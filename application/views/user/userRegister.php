
<?php require(__DIR__.'/layouts/header.php'); ?>		
<?php require(__DIR__.'/layouts/nav.php'); ?>	


<div class="contact_form">
		<div class="container" style="width: 50%;">
			<div class="row" style="box-shadow: 0 0em 0.5em rgb(15 15 15 / 25%); padding: 100px 10px;" >
				<div class="col-lg-12 offset-lg-12" style="text-align: center;">
					<div class="contact_form_container">
						<div class="contact_form_title" style="color: #0e8ce4;">Đăng Ký</div>

						<form action="<?php echo base_url('xu-ly-dang-ky/'); ?>" id="contact_form" method="POST">
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input type="text" name="hoten" id="contact_form_name" class="contact_form_name input_field" placeholder="Nhập họ và tên..."  style="width: 60%; margin: 0 auto;">
							</div>
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input type="text" name="taikhoan" id="contact_form_name" class="contact_form_name input_field" placeholder="Nhập tài khoản..."  style="width: 60%; margin: 0 auto;">
							</div>
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input type="password" id="contact_form_email" class="contact_form_email input_field" placeholder="Nhập mật khẩu..."  style="width: 60%; margin: 0 auto;" name="matkhau">
							</div>
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input type="password" id="contact_form_email" class="contact_form_email input_field" placeholder="Nhập lại mật khẩu..."  style="width: 60%; margin: 0 auto;" name="matkhauthu">
							</div>

							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input type="text" name="sodienthoai" id="contact_form_name" class="contact_form_name input_field" placeholder="Nhập số điện thoại..."  style="width: 60%; margin: 0 auto;">
							</div>
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input type="text" name="diachi" id="contact_form_name" class="contact_form_name input_field" placeholder="Nhập địa chỉ..."  style="width: 60%; margin: 0 auto;">
							</div>
							<div class="contact_form_button">
								<button type="submit" class="button contact_submit_button">Đăng Ký</button>
							</div>
							<?php if(isset($mess)) {?>
								<p style="color: #D8000C; margin-top: 60px; "><i class="fa-solid fa-triangle-exclamation"></i> <?php echo $mess;?></p>
							<?php } ?>
						</form>

					</div>
				</div>
			</div>
		</div>
		<div class="panel"></div>
	</div>

<?php require(__DIR__.'/layouts/footer.php'); ?>	