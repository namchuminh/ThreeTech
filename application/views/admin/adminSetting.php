<?php require(__DIR__.'/layouts/header.php'); ?>
<div class="container" style="box-shadow: 0 0em 0.5em rgb(15 15 15 / 25%); background: white; border-radius: 5px; padding-top: 30px; padding-bottom: 30px; color: black; width: 90%;">
  <form>
    <h4 class="text-center">Thông Tin Cá Nhân</h4>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="first">Họ Tên</label>
          <input type="text" class="form-control" placeholder="họ tên" id="first">
        </div>
        <div class="form-group">
          <label for="last">Tài Khoản</label>
          <input type="text" class="form-control" placeholder="tài khoản" id="last">
        </div>
      </div>
      <!--  col-md-6   -->

      <div class="col-md-6">
        <image style="border-radius: 20px; width: 94px;height: 94px;display: block;margin-left: auto;margin-right: auto;" src="https://laptrinhtudau.com/wp-content/uploads/2022/01/avatar_user_1_1642427438-250x250.png" />
        <label for="exampleFormControlFile1">Thay Đổi Ảnh</label>
    	<input type="file" class="form-control-file" id="exampleFormControlFile1">
      </div>
      <!--  col-md-6   -->
    </div>


    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="company">Mật Khẩu</label>
          <input type="text" class="form-control" placeholder="mật khẩu mới" id="">
        </div>


      </div>
      <!--  col-md-6   -->

      <div class="col-md-6">

        <div class="form-group">
          <label for="phone">Số Điện Thoại</label>
          <input type="tel" class="form-control" id="phone" placeholder="số điện thoại">
        </div>
      </div>
      <!--  col-md-6   -->
    </div>
    <!--  row   -->


    <div class="row">
      <div class="col-md-6">

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="email">
        </div>
      </div>
      <!--  col-md-6   -->

      <div class="col-md-6">
        <div class="form-group">
          <label for="url">Facebook</label>
          <input type="url" class="form-control" id="url" placeholder="url facebook">
        </div>

      </div>
      <!--  col-md-6   -->
    </div>
    <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Cập Nhật Thông Tin</button>
  </form>
</div>
