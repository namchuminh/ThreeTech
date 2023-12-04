<?php require(__DIR__.'/layouts/header.php'); ?>

<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Quản Lý Thông Tin Khách Hàng</h1>
        <p class="mb-4">Nhân viên và admin có quyền được phép truy cập trang này và chỉ mới được phép thực hiện sửa, xóa thông tin khách hàng!</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Thông Tin: Khách Hàng</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="overflow-x: hidden;">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row">
                    	<div class="col-sm-12 col-md-6">
                    		<div id="dataTable_filter" class="dataTables_filter">
                        		<label>Tìm Kiếm Theo Tên:
                        			<input type="text" class="form-control form-control-sm timkiemnhanvien" placeholder="Nhập tên..." aria-controls="dataTable">
                        		</label>
                    		</div>
                    	</div>
                    	<div class="col-sm-12 col-md-6">
                            <div id="dataTable_filter" class="dataTables_filter" >
                                <a style="margin-right: 10px" href="<?php echo base_url('khach-hang/xuat/');?>" class="btn btn-primary float-right">Xuất Excel</a>
                            </div>
                    	</div>
                    </div>

                    <div class="row"><div class="col-sm-12">
                    	<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 21px;">Mã</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 94px;">Tài Khoản</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 130px;">Họ Tên</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 101px;">Số Điện Thoại</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 88px;">Địa Chỉ</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 88px;">Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php foreach ($customer as $key => $value): ?>
                           	<tr class="odd">
                                <td class="sorting_1"><?php echo $value['khachHangId'] ?></td>
                                <td><?php echo $value['taiKhoan']; ?></td>
                                <td><?php echo $value['hoTen']; ?></td>
                                <td><?php echo $value['soDienThoai']; ?></td>
                                <td><?php echo $value['diaChi']; ?></td>
                                <td>
                                    <a class="btn btn-danger xoanhanvien" value="<?php echo $value['khachHangId']; ?>" href="#" data-toggle="modal" style="width: 100%;" >Xóa</a>
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

<script type="text/javascript">
    var base_url =  window.location.origin == "http://localhost" ? window.location.origin + "/ThreeTech" : window.location.origin
    function chamcong(){
        $('.chamcong').click(function(event){
            event.preventDefault()
            var nhanVienId = $(this).attr('value')
            $.post(base_url+"/admin/cham-cong/",{
                nhanVienId: nhanVienId
            },
            function(data){
                alert(data);
            });
        })
    }
    function xoanhanvien(){
        $('.xoanhanvien').click(function(){
            let text = "Bạn thực sự muốn xóa khách hàng này?";
            if (confirm(text) == true) {
                var khachHangId = $(this).attr('value')
                $.post(base_url+"/khach-hang/xoa/",{
                    khachHangId: khachHangId
                },
                function(data){
                    if (data == 1) {
                        alert("Xóa thông tin khách hàng thành công!");
                        location.reload()
                    }else{
                        alert("Xóa thông tin khách hàng không công!");
                    }
                });
            } 
        })
    }

    function xemthem(){
        $('.xemthem').click(function(event){
            event.preventDefault()
            var start = parseInt($('.start').val()) + 5
            $('.start').val(start)
            $('tbody').empty()
            $.post(base_url+"/khach-hang/xem-them",{
                start: start
            },
            function(data){
                var dataSearch = JSON.parse(data)
                $('tbody').empty()
                for(var i = 0; i < dataSearch.length; i++){
                    $('tbody').append('<tr class="odd"> <td class="sorting_1">'+dataSearch[i].khachHangId+'</td> <td>'+dataSearch[i].taiKhoan+'</td> <td>'+dataSearch[i].hoTen+'</td> <td>'+dataSearch[i].soDienThoai+'</td> <td>'+dataSearch[i].diaChi+'</td> <td> <a class="btn btn-danger  xoanhanvien" style="width: 100%;" value="'+dataSearch[i].khachHangId+'" href="#" >Xóa</a> </td> </tr>')
                }
                chamcong()
                xoanhanvien()
                $("html, body").animate({ scrollTop: $(document).height() }, 0);
            });        
        })
    }

    $( document ).ready(function() {
        chamcong()
        xoanhanvien()
        xemthem()
        $('input').keyup(function(event) {
            var tenKhachHang = $('.timkiemnhanvien').val()
            $('.xemthem').remove()

            if(tenKhachHang == ""){
                $('.paginate_button').append('<button class="page-link xemthem">Xem Thêm</button>')
                xemthem()
            }

            $.post(base_url+"/khach-hang/tim-kiem/",{
                tenKhachHang: tenKhachHang
            },
            function(data){
                var dataSearch = JSON.parse(data)
                $('tbody').empty()
                for(var i = 0; i < dataSearch.length; i++){
                    $('tbody').append('<tr class="odd"> <td class="sorting_1">'+dataSearch[i].khachHangId+'</td> <td>'+dataSearch[i].taiKhoan+'</td> <td>'+dataSearch[i].hoTen+'</td> <td>'+dataSearch[i].soDienThoai+'</td> <td>'+dataSearch[i].diaChi+'</td> <td> <a style="width: 100%;" class="btn btn-danger  xoanhanvien" value="'+dataSearch[i].khachHangId+'" href="#" >Xóa</a> </td> </tr>')
                }
                chamcong()
                xoanhanvien()
            });
        })

        

    });
</script>