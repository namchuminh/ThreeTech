<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="container" style="box-shadow: 0 0em 0.5em rgb(15 15 15 / 25%); background: white; border-radius: 5px; padding-top: 30px; padding-bottom: 30px; color: black; width: 90%;">
  <form action="<?php echo base_url('nhan-vien/cap-nhat/'); ?>" method="POST" enctype='multipart/form-data'>
    <h4 class="text-center">Thông Tin Nhân Viên - Mã NV: <?php echo $person[0]['nhanVienId']; ?> <input type="hidden" value="<?php echo $person[0]['taiKhoan'];?>" name="taiKhoan" ></h4>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="first">Họ Tên</label>
          <input type="text" class="form-control" placeholder="họ tên" id="first" value="<?php echo $person[0]['hoTen'];?>" name="hoTen">
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="last">Tài Khoản</label>
              <input type="text" class="form-control" placeholder="tài khoản" id="last" value="<?php echo $person[0]['taiKhoan'];?>" disabled >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Chức Vụ</label>
              <select class="form-control" id="exampleFormControlSelect1" name="chucVu">
                <?php if ($person[0]['chucVu'] == "admin"){ ?>
                  <option value="admin" selected="selected">Admin</option>
                  <option value="nhanvien">Nhân Viên</option>
                <?php }else{ ?>
                  <option value="admin" >Admin</option>
                  <option value="nhanvien" selected="selected">Nhân Viên</option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <!--  col-md-6   -->

      <div class="col-md-6">
        <image style="image-rendering: -webkit-optimize-contrast; border-radius: 50%; width: 94px;height: 94px;display: block;margin-left: auto;margin-right: auto;" src="<?php echo $person[0]['avatar'];?>" />
        <label for="exampleFormControlFile1">Thay Đổi Ảnh</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="avatar" >
      </div>
      <!--  col-md-6   -->
    </div>


    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="company">Mật Khẩu | <span style="cursor: pointer; color: blue;" id="show-password">Hiện Mật Khẩu?</span> </label>
          <input type="password" class="form-control" placeholder="mật khẩu mới" id="password" name="matKhau">
        </div>


      </div>
      <!--  col-md-6   -->

      <div class="col-md-6">

        <div class="form-group">
          <label for="phone">Số Điện Thoại</label>
          <input type="tel" class="form-control" id="phone" placeholder="số điện thoại" value="<?php echo $person[0]['soDienThoai'];?>" name="soDienThoai">
        </div>
      </div>
      <!--  col-md-6   -->
    </div>
    <!--  row   -->


    <div class="row">
      <div class="col-md-6">

        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="email" value="<?php echo $person[0]['email'];?>" name="email">
        </div>
      </div>
      <!--  col-md-6   -->

      <div class="col-md-6">
        <div class="form-group">
          <label for="url">Facebook</label>
          <input type="url" class="form-control" id="url" placeholder="url facebook" value="<?php echo $person[0]['facebook'];?>" name="facebook">
        </div>

      </div>
      <!--  col-md-6   -->
    </div>
    <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Cập Nhật Thông Tin</button>
    <?php if(isset($mess)) {?>
        <div class="text-center">
            <span style="font-weight: bold; color: red; font-size: 16px;" class="small"><?php echo $mess; ?></span>
        </div>
    <?php }?>
  </form>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Đăng Xuất</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Bạn có chắc chắn rằng mình sẽ đăng xuất?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                <a class="btn btn-primary" href="<?php echo base_url('admin/dang-xuat'); ?>">Đăng Xuất</a>
            </div>
        </div>
    </div>
</div>


<script src="<?php echo base_url('static/');?>vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('static/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url('static/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('static/');?>js/sb-admin-2.min.js"></script>