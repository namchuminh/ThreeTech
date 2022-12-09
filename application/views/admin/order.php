<?php require(__DIR__.'/layouts/header.php'); ?>


<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Quản Lý Thông Tin Đơn Hàng</h1>
        <p class="mb-4">Chỉ nhân viên có quyền admin mới được phép truy cập trang này và chỉ admin mới được phép thực hiện giao hàng và hoàn tiền!</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thông Tin: Đơn Hàng</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row">
                    	<div class="col-sm-12 col-md-6">
                    		<div id="dataTable_filter" class="dataTables_filter">
                        		<label>Tìm Kiếm Mã Đơn Hàng:
                        			<input type="text" class="form-control form-control-sm timkiemnhanvien" placeholder="Nhập mã đơn hàng..." aria-controls="dataTable">
                        		</label>
                    		</div>
                    	</div>
                    	<div class="col-sm-12 col-md-6">
                            <div id="dataTable_filter" class="dataTables_filter" >
                                <a style="margin-right: 10px" href="<?php echo base_url('don-hang/xuat/');?>" class="btn btn-primary float-right">Xuất Excel</a>
                            </div>
                    	</div>
                    </div>

                    <div class="row"><div class="col-sm-12">
                    	<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 21px;">Mã Đơn Hàng</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 94px;">Tên Sản Phẩm</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 10px;">Số Lượng</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 20px;">Số Tiền</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 101px;">Thời Gian</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 88px;">Khách Hàng</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 80px;">Số Điện Thoại</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 150px;">Địa Chỉ</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 120px;">Trạng Thái</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 100px;">Hoàn Tiền</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 120px;">Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php foreach ($order as $key => $value): ?>
                           	<tr class="odd">
                                <td class="sorting_1"><?php echo $value['madonhang'] ?></td>
                                <td><?php echo $value['tenSanPham']; ?></td>
                                <td><?php echo $value['soLuong']; ?></td>
                                <td><?php echo $value['sotien'] ?></td>
                                <td><?php echo $value['thoigian']; ?></td>
                                <td><?php echo $value['hoTen']; ?></td>
                                <td><?php echo $value['soDienThoai'] ?></td>
                                <td><?php echo $value['diaChi']; ?></td>
                                <td>
                                	<?php if($value['dagiaohang'] == 0){
                                		echo "Chưa Giao Hàng";
                                	}else{
                                		echo "Đã Giao Hàng";
                                	}  ?>
                                </td>
                                <td>
                                	<?php 
                                		if($value['hoantien'] == 0){
                                			echo "Không";
                                		}else{
                                			echo "Đã Hoàn Tiền";
                                		}
                                	?>
                                		
                                </td>

                                
                                <td style="line-height: 50px;">
                                	<a href="#" class="btn btn-info" value="<?php echo $value['madonhang']; ?>">Giao Hàng</a>
                                    <a href="#" class="btn btn-warning" >Hoàn Tiền</a>
                                </td>
                        	</tr>
                        <?php endforeach ?>   

                        </tbody>
                    </table>
                </div>
            </div>
                <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite"></div>
                        </div>
                        <div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item active">
                                    <input type="hidden" value="5" class="start">
                                    <button class="page-link xemthem">Xem Thêm</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
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