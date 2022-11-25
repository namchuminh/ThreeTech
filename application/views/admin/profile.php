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
                        <div class="uppercase profile-stat-title"> <?php echo count($myProduct); ?> </div>
                        <div class="uppercase profile-stat-text"> Sản Phẩm Đã Đăng </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div class="uppercase profile-stat-title"> <?php echo count($myNews); ?> </div>
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
		<div class="row">
			<div class="col-md-6">
				<div class="profile-content">
				<h5 style="color: #355ccc; margin-bottom: 20px;"><i class="fa-solid fa-chalkboard"></i> Sản Phẩm</h5>
				<?php foreach ($myProduct as $key => $value): ?>
					   <div class="card" style="margin-bottom: 30px;box-shadow: 0 0em 0.5em rgb(15 15 15 / 25%);">
				        <div class="card-body">
				          	<a href="<?php echo base_url('san-pham/').$value['duongDan'].'/'; ?>"><h4 class="card-title" style="white-space: nowrap;overflow: hidden; text-overflow: ellipsis; border-bottom: 1px solid #36b9cc;font-size: 17px; width: 100%; color: black; font-weight: bold;"><?php echo $value['tenSanPham']; ?></h4></a>
				          <small class="text-muted cat">
				            <i class="fa-solid fa-signs-post"></i> Mã Sản Phẩm: <?php echo $value['sanPhamId']; ?>
				           	 - 
				            <i class="far fa-clock text-info"></i> <?php echo $value['ngayDang']; ?>
				          </small>
				          <p class="card-text" style="white-space: nowrap;overflow: hidden; text-overflow: ellipsis; color: black;"><?php echo $value['moTa']; ?></p>
				        </div>
				      </div>
				<?php endforeach ?>
				</div>
			</div>
			<div class="col-md-6">
				<div class="profile-content">
				<h5 style="color: #355ccc; margin-bottom: 20px;"><i class="fa-solid fa-pen-to-square"></i> Tin Tức</h5>
				<?php foreach ($myNews as $key => $value): ?>
					   <div class="card" style="margin-bottom: 10px; box-shadow: 0 0em 0.5em rgb(15 15 15 / 25%);">
				        <div class="card-body">
				          	<a href="<?php echo base_url('tin-tuc/').$value['duongDan'].'/'; ?>"><h4 class="card-title" style="white-space: nowrap;overflow: hidden; text-overflow: ellipsis; border-bottom: 1px solid #36b9cc; font-size: 17px; width: 100%; color: black; font-weight: bold;"><?php echo $value['tieuDe']; ?></h4></a>
				          <small class="text-muted cat">
				            <i class="fa-solid fa-signs-post"></i> Mã Tin Tức: <?php echo $value['tinTucId']; ?>
				           	 - 
				            <i class="far fa-clock text-info"></i> <?php echo $value['ngayDang']; ?>
				          </small>
				          <p class="card-text" style="white-space: nowrap;overflow: hidden; text-overflow: ellipsis; color: black;"><?php echo $value['trichDan']; ?></p>
				        </div>
				      </div>
				<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
<?php require(__DIR__.'/layouts/footer.php'); ?>
