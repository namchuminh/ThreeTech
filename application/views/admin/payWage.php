<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Quản Lý Trả Lương Nhân Viên</h1>
        <p class="mb-4">Chỉ nhân viên có quyền admin mới được phép truy cập trang này và chỉ admin mới được phép thực hiện thanh toán tiền công cho nhân viên!</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thông Tin: Trả Lương</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="overflow-x: hidden;">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row">
                    	<div class="col-sm-12 col-md-6">
                    		
                    	</div>
                    	<div class="col-sm-12 col-md-6">
                            <div id="dataTable_filter" class="dataTables_filter" >
                                <a style="margin-right: 10px" href="<?php echo base_url('nhan-vien/xuat/');?>" class="btn btn-primary float-right mb-3">Xuất Excel</a>
                            </div>
                    	</div>
                    </div>

                    <div class="row"><div class="col-sm-12">
                    	<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 21px;">Mã Nhân Viên</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 94px;">Họ Tên</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 94px;">Số Điện Thoại</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 94px;">Số Công Tháng Này</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php foreach ($payWage as $key => $value): ?>
                           	<tr class="odd">
                                <td class="sorting_1"><?php echo $value['nhanVienId'] ?></td>
                                <td><?php echo $value['hoTen']; ?></td>
                                <td><?php echo $value['soDienThoai']; ?></td>
                                <td><?php echo $value['soLuongCong']; ?></td>
                        	</tr>
                        <?php endforeach ?>   

                        </tbody>
                    </table>
                </div>
            </div>
              
            </div>
                </div>
            </div>
        </div>

    </div>

<!-- Add Modal-->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm Nhân Viên</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                          <form action="<?php echo base_url('nhan-vien/them/'); ?>" method="POST" enctype='multipart/form-data'>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="first">Họ Tên</label>
                                  <input type="text" class="form-control" placeholder="họ tên" id="first" name="hoTen">
                                </div>
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="last">Tài Khoản</label>
                                      <input type="text" name="taiKhoan" class="form-control" placeholder="tài khoản" id="last">
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="exampleFormControlSelect1">Chức Vụ</label>
                                      <select class="form-control" id="exampleFormControlSelect1" name="chucVu">
                                          <option value="nhanvien">Nhân Viên</option>
                                          <option value="admin" >Admin</option>
                                      </select>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!--  col-md-6   -->

                              <div class="col-md-6">
                                <image style="image-rendering: -webkit-optimize-contrast; border-radius: 50%; width: 94px;height: 94px;display: block;margin-left: auto;margin-right: auto;" src="<?php echo base_url("static/img/avatarPerson.png"); ?>" />
                                    <label for="exampleFormControlFile1">Ảnh Đại Diện</label>
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
                                  <input type="tel" class="form-control" id="phone" placeholder="số điện thoại" name="soDienThoai">
                                </div>
                              </div>
                              <!--  col-md-6   -->
                            </div>
                            <!--  row   -->


                            <div class="row">
                              <div class="col-md-6">

                                <div class="form-group">
                                  <label for="email">Email</label>
                                  <input type="email" class="form-control" id="email" placeholder="email" name="email">
                                </div>
                              </div>
                              <!--  col-md-6   -->

                              <div class="col-md-6">
                                <div class="form-group">
                                  <label for="url">Facebook</label>
                                  <input type="url" class="form-control" id="url" placeholder="url facebook" name="facebook">
                                </div>

                              </div>
                              <!--  col-md-6   -->
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Thêm Nhân Viên</button>
                            <?php if(isset($mess)) {?>
                                <div class="text-center">
                                    <span style="font-weight: bold; color: red; font-size: 16px;" class="small"><?php echo $mess; ?></span>
                                </div>
                            <?php }?>
                          </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                </div>
            </div>
        </div>
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