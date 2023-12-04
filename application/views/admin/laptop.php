<?php require(__DIR__.'/layouts/header.php'); ?>
<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Laptop</h1>
        <p class="mb-4">Dữ liệu được lấy trong bảng sản phẩm, bao gồm các thông tin liên quan đến sản phẩm Laptop.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tất cả: Laptop</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="overflow-x: hidden;">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row">
                    	<div class="col-sm-12 col-md-6">
                    		
                    	</div>
                    	<div class="col-sm-12 col-md-6">
                    		<div id="dataTable_filter" class="dataTables_filter">
                        		<a href="<?php echo base_url('san-pham/them/');?>" class="btn btn-primary float-right mb-3">Thêm Sản Phẩm</a>
                    		</div>
                    	</div>
                    </div>

                    <div class="row"><div class="col-sm-12">
                    	<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 11px;">ID</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 44px;">Tên Sản Phẩm</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 300px;">Mô Tả</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 51px;">Giá Gốc</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 88px;">Giá Bán</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 100px;">Trạng Thái</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 50px;">Số Lượng</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 97px;">Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php foreach ($product as $key => $value): ?>
                           	<tr class="odd">
                                <td class="sorting_1"><?php echo $value['sanPhamId'] ?></td>
                                <td><?php echo $value['tenSanPham']; ?></td>
                                <td><?php echo $value['moTa']; ?></td>
                                <td><?php echo $value['giaGoc']; ?></td>
                                <td><?php echo $value['giaBan']; ?></td>
                                <td>
                                    <?php if($value['trangThai'] == 1){  ?> 
                                        <?php echo "Còn Hàng"; ?> 
                                    <?php }else{ ?>
                                        <?php echo "Hết Hàng"; ?> 
                                    <?php }?>
                                </td>


                                <td><?php echo $value['soLuong']; ?></td>
                                <td style="line-height: 50px;">
                                    <a href="<?php echo base_url('san-pham/sua').'/'.$value['sanPhamId']; ?>" class="btn btn-warning" >Sửa</a>
                                    <a class="btn btn-danger deleteProductAction" value="<?php echo $value['sanPhamId']; ?>" href="#" data-toggle="modal" data-target="#deleteModal">Xóa<input type="hidden" class="cate" value="laptop"></a>
                                </td>
                        	</tr>
                        <?php endforeach ?>   

                        </tbody>
                    </table></div></div></div>
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
<?php require(__DIR__.'/layouts/footer.php'); ?>
