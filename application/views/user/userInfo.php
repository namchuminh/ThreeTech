<?php require(__DIR__.'/layouts/header.php'); ?>    
<?php require(__DIR__.'/layouts/nav.php'); ?>
    <div class="container" style="width: 60%;">
      <form action="<?php echo base_url('khach-hang/cap-nhat-khach-hang'); ?>" method="POST" enctype='multipart/form-data' style="box-shadow: 0 0em 0.5em rgb(15 15 15 / 25%); margin: 54px 0px; padding: 70px 26px;">
    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" style="width: 200px;height: 200px;display: block;margin-left: auto;margin-right: auto;">
    <h4 class="text-center" style="color: #0e8ce4;padding: 40px;">Thông Tin Khách Hàng</h4>
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
          <label for="company">Mật Khẩu | <span style="cursor: pointer; color: blue;" id="show-password"><i class="fa-solid fa-eye-slash" id="#td_id"></i></span> </label>

          <input type="password" class="form-control" placeholder="mật khẩu mới" id="password" name="matKhau">
        </div>
        <div class="row">
          <div class="col-md-5">
          <div class="form-group">
            <label for="phone">Số Điện Thoại</label>
            <input type="tel" class="form-control" id="phone" placeholder="số điện thoại" value="<?php echo $customer[0]['soDienThoai'];?>" name="soDienThoai">
          </div>
          </div>
          <div class="col-md-7">
          <div class="form-group">
            <label for="phone">Địa Chỉ</label>
            <input type="tel" class="form-control" id="phone" placeholder="Địa Chỉ" value="<?php echo $customer[0]['diaChi'];?>" name="diaChi">
          </div>
          </div>
      </div>
    </div>


   
    </div>
    <!--  row   -->


    
    <div class="contact_form_button" style="display: flex;align-items: center;justify-content: center;">
      <button type="submit" class="button contact_submit_button" >Cập nhật thông tin</button>
    </div>
    <?php if(isset($mess)) {?>
        <div class="text-center" style="margin-top: 30px">
            <span style="font-weight: bold; color: #0e8ce4; font-size: 16px;" class="small" ><?php echo $mess; ?></span>
        </div>
    <?php }?>
  </form>   </div>
<?php require(__DIR__.'/layouts/footer.php'); ?>
