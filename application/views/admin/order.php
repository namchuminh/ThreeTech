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
                <div class="table-responsive" style="overflow-x: hidden;">
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
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 10px;">SL</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 10px;">Số Tiền</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 101px;">Thời Gian</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 88px;">Tên KH</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 80px;">Số Điện Thoại</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 150px;">Địa Chỉ</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 120px;">Trạng Thái</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 120px;">Hoàn Tiền</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 120px;">Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php for ($i = 0; $i < count($order); $i++){ ?>
                           	<tr class="odd">
                                <td class="sorting_1"><?php echo $order[$i]['madonhang'] ?></td>
                                <td><?php echo $order[$i]['tenSanPham']; ?></td>
                                <td><?php echo $order[$i]['soLuong']; ?></td>
                                <td><?php echo $order[$i]['giaBan'] * $order[$i]['soLuong'] * 1000; ?></td>
                                <td><?php echo $order[$i]['thoigian']; ?></td>
                                <td><?php echo $order[$i]['hoTen']; ?></td>
                                <td><?php echo $order[$i]['soDienThoai'] ?></td>
                                <td><?php echo $order[$i]['diaChi']; ?></td>
                                <td>
                                	<?php if($order[$i]['dagiaohang'] == 0){
                                		echo "Chưa Giao Hàng";
                                	}else{
                                		echo "<span class='bg-danger text-white rounded p-1'>Đã Giao Hàng</span>";
                                	}  ?>
                                </td>
                                <td>
                                	<?php 
                                		if($order[$i]['hoantien'] == 0){
                                			echo "Không";
                                		}else{
                                			echo "Đã Hoàn Tiền";
                                		}
                                	?>
                                		
                                </td>
                                
                                <td style="line-height: 50px;">
                                	<a href="<?php echo base_url('don-hang/giao-hang/').$order[$i]['chitiethoadonID']; ?>" class="btn btn-info giaoHang" value="<?php echo $order[$i]['chitiethoadonID']; ?>">Giao Hàng</a>
                                    <a href="<?php echo base_url('don-hang/hoan-tien/').$order[$i]['chitiethoadonID']; ?>" class="btn btn-warning hoanTien" value="<?php echo $order[$i]['chitiethoadonID']; ?>">Hoàn Tiền</a>
                                </td>
                        	</tr>
                        <?php } ?>   

                        </tbody>
                    </table>
                </div>
            </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite"></div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                        
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

<script type="text/javascript">
    var base_url =  window.location.origin == "http://localhost" ? window.location.origin + "/ThreeTech" : window.location.origin

    function giaoHang(){
        $('.giaoHang').click(function(event) {
            event.preventDefault()
            var chitiethoadonID = $(this).attr('value')
            $.post(base_url + '/don-hang/giao-hang/', {chitiethoadonID: chitiethoadonID}, function(data) {
                if(data == "thanhcong"){
                    alert("Đơn Hàng Đã Chuyển Sang Trạng Thái Giao Hàng!")
                    location.reload()
                }else{
                    alert(data)
                }
                
            });
        });

        $('.hoanTien').click(function(event) {
            event.preventDefault()
            var chitiethoadonID = $(this).attr('value')
            $.post(base_url + '/don-hang/hoan-tien/', {chitiethoadonID: chitiethoadonID}, function(data) {
                if(data == "thanhcong"){
                    alert("Đơn Hàng Đã Chuyển Sang Trạng Thái Hoàn Tiền!")
                    location.reload()
                }else{
                    alert(data)
                }
            });
        });
    }



    function xemthem(){
        $('.xemthem').click(function(event){
            event.preventDefault()
            var start = parseInt($('.start').val()) + 10
            $('.start').val(start)
            $('tbody').empty()
            $.post(base_url+"/don-hang/xem-them/",{
                start: start
            },
            function(data){
                var dataSearch = JSON.parse(data)      
                $('tbody').empty()
                for(var i = 0; i < dataSearch.length; i++){

                    var trangThai = dataSearch[i].dagiaohang == 0 ? "Chưa Giao Hàng" : "Đã Giao Hàng"
                    var hoanTien = dataSearch[i].hoantien == 0 ? "Không" : "Đã Hoàn Tiền"

                    if(dataSearch[i].dagiaohang == 0){
                        $('tbody').append('<tr class="odd"><td>'+dataSearch[i].madonhang+'</td> <td>'+dataSearch[i].tenSanPham+'</td> <td>'+dataSearch[i].soLuong+'</td> <td>'+dataSearch[i].giaBan * dataSearch[i].soLuong * 1000+'</td> <td>'+dataSearch[i].thoigian+'</td> <td>'+dataSearch[i].hoTen+'</td> <td>'+dataSearch[i].soDienThoai+'</td> <td>'+dataSearch[i].diaChi+'</td> <td>'+trangThai+'</td> <td>'+hoanTien+'</td> <td style="line-height: 50px;"> <a href="#" class="btn btn-info giaoHang" value="'+dataSearch[i].chitiethoadonID+'">Giao Hàng</a> <a href="#" class="btn btn-warning hoanTien" value="'+dataSearch[i].chitiethoadonID+'">Hoàn Tiền</a> </td> </tr>')
                    }else{
                        $('tbody').append('<tr class="odd"><td>'+dataSearch[i].madonhang+'</td> <td>'+dataSearch[i].tenSanPham+'</td> <td>'+dataSearch[i].soLuong+'</td> <td>'+dataSearch[i].giaBan * dataSearch[i].soLuong * 1000+'</td> <td>'+dataSearch[i].thoigian+'</td> <td>'+dataSearch[i].hoTen+'</td> <td>'+dataSearch[i].soDienThoai+'</td> <td>'+dataSearch[i].diaChi+'</td> <td><span class="bg-danger text-white rounded p-1">'+trangThai+'</span></td> <td>'+hoanTien+'</td> <td style="line-height: 50px;"> <a href="#" class="btn btn-info giaoHang" value="'+dataSearch[i].chitiethoadonID+'">Giao Hàng</a> <a href="#" class="btn btn-warning hoanTien" value="'+dataSearch[i].chitiethoadonID+'">Hoàn Tiền</a> </td> </tr>')
                    }
                    
                }
                $("html, body").animate({ scrollTop: $(document).height() }, 0);

                giaoHang()
            });        
        })
    }

    $(document).ready(function() {

        $('input').keyup(function(event) {
            var madonhang = $('.timkiemnhanvien').val()
            $('.xemthem').remove()

            if(madonhang == ""){
                $.post(base_url+"/don-hang/tim-kiem/",{
                    soluong: 10
                },
                function(data){
                    var dataSearch = JSON.parse(data)
                    $('tbody').empty()
                    for(var i = 0; i < dataSearch.length; i++){

                        var trangThai = dataSearch[i].dagiaohang == 0 ? "Chưa Giao Hàng" : "Đã Giao Hàng"
                        var hoanTien = dataSearch[i].hoantien == 0 ? "Không" : "Đã Hoàn Tiền"

                        if(dataSearch[i].dagiaohang == 0){
                            $('tbody').append('<tr class="odd"><td>'+dataSearch[i].madonhang+'</td> <td>'+dataSearch[i].tenSanPham+'</td> <td>'+dataSearch[i].soLuong+'</td> <td>'+dataSearch[i].giaBan * dataSearch[i].soLuong * 1000+'</td> <td>'+dataSearch[i].thoigian+'</td> <td>'+dataSearch[i].hoTen+'</td> <td>'+dataSearch[i].soDienThoai+'</td> <td>'+dataSearch[i].diaChi+'</td> <td>'+trangThai+'</td> <td>'+hoanTien+'</td> <td style="line-height: 50px;"> <a href="#" class="btn btn-info giaoHang" value="'+dataSearch[i].chitiethoadonID+'">Giao Hàng</a> <a href="#" class="btn btn-warning hoanTien" value="'+dataSearch[i].chitiethoadonID+'">Hoàn Tiền</a> </td> </tr>')
                        }else{
                            $('tbody').append('<tr class="odd"><td>'+dataSearch[i].madonhang+'</td> <td>'+dataSearch[i].tenSanPham+'</td> <td>'+dataSearch[i].soLuong+'</td> <td>'+dataSearch[i].giaBan * dataSearch[i].soLuong * 1000+'</td> <td>'+dataSearch[i].thoigian+'</td> <td>'+dataSearch[i].hoTen+'</td> <td>'+dataSearch[i].soDienThoai+'</td> <td>'+dataSearch[i].diaChi+'</td> <td><span class="bg-danger text-white rounded p-1">'+trangThai+'</span></td> <td>'+hoanTien+'</td> <td style="line-height: 50px;"> <a href="#" class="btn btn-info giaoHang" value="'+dataSearch[i].chitiethoadonID+'">Giao Hàng</a> <a href="#" class="btn btn-warning hoanTien" value="'+dataSearch[i].chitiethoadonID+'">Hoàn Tiền</a> </td> </tr>')
                        }
                        
                    }

                    giaoHang()
                });
                $('.paginate_button').append('<button class="page-link xemthem">Xem Thêm</button>')
                xemthem()
                hoanTien()
            }

            $.post(base_url+"/don-hang/tim-kiem/",{
                madonhang: madonhang
            },
            function(data){
                var dataSearch = JSON.parse(data)
                console.log(dataSearch)
                $('tbody').empty()
                for(var i = 0; i < dataSearch.length; i++){

                    var trangThai = dataSearch[i].dagiaohang == 0 ? "Chưa Giao Hàng" : "Đã Giao Hàng"
                    var hoanTien = dataSearch[i].hoantien == 0 ? "Không" : "Đã Hoàn Tiền"

                    if(dataSearch[i].dagiaohang == 0){
                        $('tbody').append('<tr class="odd"><td>'+dataSearch[i].madonhang+'</td> <td>'+dataSearch[i].tenSanPham+'</td> <td>'+dataSearch[i].soLuong+'</td> <td>'+dataSearch[i].giaBan * dataSearch[i].soLuong * 1000+'</td> <td>'+dataSearch[i].thoigian+'</td> <td>'+dataSearch[i].hoTen+'</td> <td>'+dataSearch[i].soDienThoai+'</td> <td>'+dataSearch[i].diaChi+'</td> <td>'+trangThai+'</td> <td>'+hoanTien+'</td> <td style="line-height: 50px;"> <a href="#" class="btn btn-info giaoHang" value="'+dataSearch[i].chitiethoadonID+'">Giao Hàng</a> <a href="#" class="btn btn-warning hoanTien" value="'+dataSearch[i].chitiethoadonID+'">Hoàn Tiền</a> </td> </tr>')
                    }else{
                        $('tbody').append('<tr class="odd"><td>'+dataSearch[i].madonhang+'</td> <td>'+dataSearch[i].tenSanPham+'</td> <td>'+dataSearch[i].soLuong+'</td> <td>'+dataSearch[i].giaBan * dataSearch[i].soLuong * 1000+'</td> <td>'+dataSearch[i].thoigian+'</td> <td>'+dataSearch[i].hoTen+'</td> <td>'+dataSearch[i].soDienThoai+'</td> <td>'+dataSearch[i].diaChi+'</td> <td><span class="bg-danger text-white rounded p-1">'+trangThai+'</span></td> <td>'+hoanTien+'</td> <td style="line-height: 50px;"> <a href="#" class="btn btn-info giaoHang" value="'+dataSearch[i].chitiethoadonID+'">Giao Hàng</a> <a href="#" class="btn btn-warning hoanTien" value="'+dataSearch[i].chitiethoadonID+'">Hoàn Tiền</a> </td> </tr>')
                    }
                    
                }

                giaoHang()
            });
        })

        xemthem()
        giaoHang()
    });
</script>