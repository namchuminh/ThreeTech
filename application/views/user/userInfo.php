<?php require(__DIR__.'/layouts/header.php'); ?>		
<?php require(__DIR__.'/layouts/nav.php'); ?>
		<div class="container">
			<form action="<?php echo base_url('admin/cap-nhat-ca-nhan/'); ?>" method="POST" enctype='multipart/form-data'>
    <h4 class="text-center">Thông Tin Cá Nhân</h4>
    <div class="row">
      <div class="col-md-6">
      	<div class="form-group">
          <label for="last">Tài Khoản</label>
          <input type="text" class="form-control" placeholder="tài khoản" id="last" value="<?php echo $customer[0]['taiKhoan'];?>" disabled >
        </div>
        <div class="form-group">
          <label for="first">Họ Tên</label>
          <input type="text" class="form-control" placeholder="họ tên" id="first" value="<?php echo $customer[0]['hoTen'];?>" name="hoTen">
        </div>
        
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="company">Mật Khẩu | <span style="cursor: pointer; color: blue;" id="show-password">Hiện Mật Khẩu?</span> </label>
          <input type="password" class="form-control" placeholder="mật khẩu mới" id="password" name="matKhau">
        </div>
        <div class="row">
        	<div class="col-md-4">
	        <div class="form-group">
	          <label for="phone">Số Điện Thoại</label>
	          <input type="tel" class="form-control" id="phone" placeholder="số điện thoại" value="<?php echo $customer[0]['soDienThoai'];?>" name="soDienThoai">
	        </div>
	        </div>
	        <div class="col-md-8">
	        <div class="form-group">
	          <label for="phone">Địa Chỉ</label>
	          <input type="tel" class="form-control" id="phone" placeholder="Địa Chỉ" value="<?php echo $customer[0]['diaChi'];?>" name="diaChi">
	        </div>
	        </div>
      </div>
    </div>


   
    </div>
    <!--  row   -->


    
    <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Cập Nhật Thông Tin</button>
    <?php if(isset($mess)) {?>
        <div class="text-center">
            <span style="font-weight: bold; color: red; font-size: 16px;" class="small"><?php echo $mess; ?></span>
        </div>
    <?php }?>
  </form>		</div>
<?php require(__DIR__.'/layouts/footer.php'); ?>