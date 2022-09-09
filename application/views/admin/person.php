<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Quản Lý Thông Tin Nhân Viên</h1>
        <p class="mb-4">Chỉ nhân viên có quyền admin mới được phép truy cập trang này và chỉ admin mới được phép thực hiện chấm công, thêm, sửa, xóa thông tin nhân viên!</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thông Tin: Nhân Viên</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row">
                    	<div class="col-sm-12 col-md-6">
                    		<div id="dataTable_filter" class="dataTables_filter">
                        		<label>Search:
                        			<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                        		</label>
                    		</div>
                    	</div>
                    	<div class="col-sm-12 col-md-6">
                    		<div id="dataTable_filter" class="dataTables_filter">
                        		<a href="<?php echo base_url('san-pham/them/');?>" class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal">Thêm Nhân Viên</a>
                    		</div>
                    	</div>
                    </div>

                    <div class="row"><div class="col-sm-12">
                    	<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 11px;">ID</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 94px;">Tài Khoản</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 130px;">Họ Tên</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 101px;">Chức Vụ</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 88px;">Số Điện Thoại</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 80px;">Email</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 70px;">Facebook</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 120px;">Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php foreach ($person as $key => $value): ?>
                           	<tr class="odd">
                                <td class="sorting_1"><?php echo $value['nhanVienId'] ?></td>
                                <td><?php echo $value['taiKhoan']; ?></td>
                                <td><?php echo $value['hoTen']; ?></td>
                                <td>
                                    <?php if($value['chucVu'] == 'admin'){  ?> 
                                        <?php echo "<span role='button' class='bg-danger text-white rounded p-1'>Admin</span>"; ?> 
                                    <?php }else{ ?>
                                        <?php echo "<span role='button' class='bg-warning text-white rounded p-1'>Nhân Viên</span>"; ?> 
                                    <?php }?>
                                </td>
                                <td><?php echo $value['soDienThoai']; ?></td>
                                <td><?php echo $value['email']; ?></td>
                                


                                <td><?php echo $value['facebook']; ?></td>
                                <td style="line-height: 50px;">
                                	<a href="<?php echo base_url('cham-cong/').$value['nhanVienId']."/"; ?>" class="btn btn-info" >Chấm Công</a>
                                    <a href="<?php echo base_url('nhan-vien/sua').'/'.$value['nhanVienId']."/"; ?>" class="btn btn-warning" >Sửa</a>
                                    <a class="btn btn-danger deleteProductAction" value="<?php echo $value['nhanVienId']; ?>" href="#" data-toggle="modal" data-target="#deleteModal">Xóa<input type="hidden" class="cate" value="laptop"></a>
                                </td>
                        	</tr>
                        <?php endforeach ?>   

                        </tbody>
                    </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xóa Sản Phẩm</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Bạn có chắc chắn xóa sản phẩm này?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                <a class="btn btn-primary" href="<?php echo base_url('admin/dang-xuat'); ?>" id="deleteProduct">Xóa</a>
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
                <div class="modal-body">Bạn có chắc chắn rằng mình sẽ đăng xuất?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                    <a class="btn btn-primary" href="<?php echo base_url('admin/dang-xuat'); ?>">Đăng Xuất</a>
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