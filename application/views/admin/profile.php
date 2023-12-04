<?php require(__DIR__.'/layouts/header.php'); ?>
<link rel="stylesheet" href="<?php echo base_url('static/css/profile.css');?>">

<div class="container-fluid">
    <div class="row profile">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic" style="margin: 0 auto;width: 100px;">
					<img src="<?php echo $profile[0]['avatar']; ?>" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						<?php echo $profile[0]['hoTen']; ?>
					</div>
					<div class="profile-usertitle-job">
						<?php echo $profile[0]['chucVu']; ?>
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<div class="bg-success text-white mb-1">TỔNG QUAN</div>
				</div>

           <div class="portlet light bordered">
                <!-- STAT -->
                <div class="row list-separated profile-stat">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="uppercase profile-stat-title"> <?php echo count($checkNumberProduct); ?> </div>
                        <div class="uppercase profile-stat-text"> Sản Phẩm Đã Đăng </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="uppercase profile-stat-title"> <?php echo count($checkNumberNews); ?> </div>
                        <div class="uppercase profile-stat-text"> Tin Tức Đã Đăng </div>
                    </div>
                </div>
                <!-- END STAT -->
                <div>
                    <h4 class="profile-desc-title">Thông Tin Liên Hệ</h4>
                    <span class="profile-desc-text"> </span>
                    <div class="margin-top-20 profile-desc-link">
                        <i class="fa-brands fa-facebook"></i>
                        <a href="<?php echo $profile[0]['facebook']; ?>" target="_blank">Facebook</a>
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <i class="fa fa-phone"></i>
                        <a href="#"><?php echo $profile[0]['soDienThoai']; ?></a>
                    </div>
                    <div class="margin-top-20 profile-desc-link">
                        <i class="fa fa-at"></i>
                        <a href="#"><?php echo $profile[0]['email']; ?></a>
					</div>
				</div>
			</div>                   
		</div>
	</div>
	<div class="col-md-9">
		
				<div class="profile-content">
				<h5 style="color: #355ccc; margin-bottom: 20px;"><i class="fa-solid fa-chalkboard"></i> Sản Phẩm Đã Đăng</h5>
				<input type="text" class="form-control timkiemsanpham" placeholder="Nhập tên sản phẩm cần tìm..." style="margin-bottom: 10px;">
					<table class="table table-bordered tableProductOrNews" style="background-color: white;">
					    <thead>
					      <tr>
					        <th>Tên Sản Phẩm</th>
					        <th>Mô Tả</th>
					        <th>Giá Gốc</th>
					        <th>Giá Bán</th>
					        <th>Trạng Thái</th>
					        <th>Loại Sản Phẩm</th>
					        <th>Số Lượng</th>
					       	<th>Hành Động</th>
					      </tr>
					    </thead>
					    <tbody class="tbodyProduct">
					    	<?php foreach ($myProduct as $key => $value): ?>
							    <tr>
							    	<td><a href="<?php echo base_url('san-pham/').$value['duongDan']; ?>"><?php echo mb_substr($value['tenSanPham'],0,20); ?>...</a></td>
							        <td><?php echo mb_substr($value['moTa'],0,20); ?>...</td>
							        <td><?php echo $value['giaGoc']; ?></td>
							        <td><?php echo $value['giaBan']; ?></td>
							        <td><?php echo $trangThai = $value['trangThai'] == 1 ? "Còn Hàng" : "Hết Hàng"; ?></td>
							        <td><?php echo $value['loaiSanPham']; ?></td>
							        <td><?php echo $value['soLuong']; ?></td>
							        <td>
							        	<a href="<?php echo base_url('san-pham/sua/') . $value['sanPhamId']; ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
							        	<a href="<?php echo base_url('admin/ca-nhan/xoa-san-pham/'). $value['sanPhamId'];  ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
							        </td>
							    </tr>
					      	<?php endforeach ?>
					    </tbody>
				  	</table>
				  	<div style="margin-bottom: 10px;" class="text-center paginate_button">
				  		<input type="hidden" value="5" class="numberProduct">
				  		<button class="btn btn-primary moreProduct">Xem Thêm</button>
				  	</div>

				  	<h5 style="color: #355ccc; margin-bottom: 20px;"><i class="fa-solid fa-chalkboard"></i> Tin Tức Đã Đăng</h5>
					<table class="table table-bordered tableProductOrNews" style="background-color: white;">
					    <thead>
					      <tr>
					        <th>Tiêu Đề</th>
					        <th>Nội Dung</th>
					        <th>Ngày Đăng</th>
					       	<th>Hành Động</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<?php foreach ($myNews as $key => $value): ?>
							    <tr>
							    	<td><a href="<?php echo base_url('tin-tuc/').$value['duongDan']; ?>"><?php echo mb_substr($value['tieuDe'],0,20); ?>...</a></td>
							        <td><?php echo mb_substr($value['noiDung'],0,20); ?>...</td>
							        <td><?php echo $value['ngayDang']; ?>...</td>
							        <td>
							        	<a href="<?php echo base_url('admin/tin-tuc/sua/').$value['tinTucId']; ?>" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
							        	<a href="<?php echo base_url('admin/tin-tuc/xoa/') .$value['tinTucId']; ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
							        </td>
							    </tr>
					      	<?php endforeach ?>
					    </tbody>
				  	</table>
				  	<div style="margin-bottom: 10px;" class="text-center">
				  		<button class="btn btn-primary moreNews">Xem Thêm</button>
				  	</div>
		</div>
	</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
	var base_url =  window.location.origin == "http://localhost" ? window.location.origin + "/ThreeTech" : window.location.origin
	function moreProduct(){
		$('.moreProduct').click(function(event) {
			event.preventDefault()
			var numberProduct = parseInt($('.numberProduct').val()) + 5
            $('.numberProduct').val(numberProduct)
            $('.tbodyProduct').empty()
			$.post(base_url + "/ca-nhan/chon-hien-thi/", {numberProduct: numberProduct}, function(result){
		    	var dataSearch = JSON.parse(result)
                $('.tbodyProduct').empty()
                for(var i = 0; i < dataSearch.length; i++){
                	var trangThai = dataSearch[i].trangThai == 1 ? "Còn Hàng" : "Hết Hàng"
                	$('.tbodyProduct').append('<tr> <td><a href="'+base_url+'/san-pham/'+dataSearch[i].duongDan+'">'+dataSearch[i].tenSanPham.substr(0,20)+'...</a></td> <td>'+dataSearch[i].moTa.substr(0,20)+'...</td><td>'+dataSearch[i].giaGoc+'</td> <td>'+dataSearch[i].giaBan+'</td> <td>'+trangThai+'</td> <td>'+dataSearch[i].loaiSanPham+'</td> <td>'+dataSearch[i].soLuong+'</td> <td> <a href="'+base_url+'/san-pham/sua/'+dataSearch[i].sanPhamId+'" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a> <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a> </td> </tr>')
                }
                $("html, body").animate({ scrollTop: $(document).height() }, 0);
		    });
		});
	}

	$(document).ready(function() {
		moreProduct()

		$('.timkiemsanpham').keyup(function(event) {
            var tenSanPham = $('.timkiemsanpham').val()
            $('.moreProduct').remove()

            if(tenSanPham == ""){
            	$('.paginate_button').append('<button class="btn btn-primary moreProduct">Xem Thêm</button>')
            	moreProduct()
            }

            $.post(base_url+"/ca-nhan/chon-hien-thi/",{
                tenSanPham: tenSanPham
            },
            function(data){
                var dataSearch = JSON.parse(data)
                $('.tbodyProduct').empty()
                for(var i = 0; i < dataSearch.length; i++){
                	var trangThai = dataSearch[i].trangThai == 1 ? "Còn Hàng" : "Hết Hàng"
                	$('.tbodyProduct').append('<tr> <td><a href="'+base_url+'/san-pham/'+dataSearch[i].duongDan+'">'+dataSearch[i].tenSanPham.substr(0,20)+'...</a></td> <td>'+dataSearch[i].moTa.substr(0,20)+'...</td><td>'+dataSearch[i].giaGoc+'</td> <td>'+dataSearch[i].giaBan+'</td> <td>'+trangThai+'</td> <td>'+dataSearch[i].loaiSanPham+'</td> <td>'+dataSearch[i].soLuong+'</td> <td> <a href="'+base_url+'/san-pham/sua/'+dataSearch[i].sanPhamId+'" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a> <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a> </td> </tr>')
                }
            });
        })
	});
</script>
<?php require(__DIR__.'/layouts/footer.php'); ?>
