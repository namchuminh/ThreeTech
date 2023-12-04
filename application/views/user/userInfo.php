<?php require(__DIR__.'/layouts/header.php'); ?>    
<?php require(__DIR__.'/layouts/nav.php'); ?>
<?php if(isset($tt)){

  echo "<script type='text/javascript'>alert('Cập Nhật Thành Công');</script>";

} ?>

    <div class="container" style="width: 60%;">
      <form action="<?php echo base_url('khach-hang/cap-nhat-khach-hang'); ?>" method="POST" enctype='multipart/form-data' style="box-shadow: 0 0em 0.5em rgb(15 15 15 / 25%); margin: 54px 0px; padding: 70px 26px;">
    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" style="width: 200px;height: 200px;display: block;margin-left: auto;margin-right: auto;">
    <h2 class="text-center" style="color: #0e8ce4;padding: 40px;">Thông Tin Khách Hàng</h2>
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="last">Tài Khoản</label>
          <input type="text" class="form-control" placeholder="tài khoản" id="last" value="<?php echo $customer[0]['taiKhoan'];?>" disabled >
        </div>
        <div class="form-group">
          <label for="first">Họ Tên</label>
          <input type="text" class="form-control" placeholder="họ tên" id="first" value="<?php echo $customer[0]['hoTen'];?>" name="hoTen">
          <?php if(isset($errht)) {?>
                  <p style="color: #D8000C;"><i class="fa-solid fa-triangle-exclamation"></i> <?php echo $errht;?></p>
                <?php } ?>
        </div>
        
      </div>
      <div class="col-md-6">


        



        <div class="row">
          <div class="col-md-5">
          <div class="form-group">
            <label for="phone">Số Điện Thoại</label>
            <input type="tel" class="form-control" id="phone" placeholder="số điện thoại" value="<?php echo $customer[0]['soDienThoai'];?>" name="soDienThoai">
            <?php if(isset($errdt)) {?>
                  <p style="color: #D8000C;"><i class="fa-solid fa-triangle-exclamation"></i> <?php echo $errdt;?></p>
                <?php } ?>
          </div>
          </div>
          <div class="col-md-7">
          <div class="form-group">
            <label for="phone">Địa Chỉ</label>
            <input type="tel" class="form-control" id="phone" placeholder="Địa Chỉ" value="<?php echo $customer[0]['diaChi'];?>" name="diaChi">
          </div>
          </div>
      </div>


        
        <div class="form-group">
          <div class="row">
            <div class="col-md-5">
              <div id="show-hidden-chage-pass" style="line-height: 100px">Thay đổi mật khẩu!</div>
              <?php if(isset($messmk)) {?>
                  <p style="color: #D8000C;"><i class="fa-solid fa-triangle-exclamation"></i> <?php echo $messmk;?></p>
                <?php } ?>

            </div>
          <div class="hidden-chage-pass" style="display: none;">
          <div class="col-md-9">
          <div class="form-group">
            <label for="company">Mật Khẩu Cũ | <span style="cursor: pointer; color: blue;" id="show-password"><i class="fa-solid fa-eye-slash" id="#td_id"></i></span> </label>

            <input type="password" class="form-control" placeholder="mật khẩu Cũ" id="password" name="old_matKhau">
          </div>
          </div>
          <div class="col-md-9">
          <div class="form-group">
            <label for="company">Mật khẩu mới </label>
            <input type="password" class="form-control" placeholder="mật khẩu mới" id="password" name="matKhau">
          </div>
          </div>
      </div>
          
        </div>
        </div>




    </div>


   
    </div>
    <!--  row   -->
    <?php if(isset($err)) {?>
            <div class="text-center" style="margin-top: 30px">
                <span style="font-weight: bold; color: #0e8ce4; font-size: 16px; color: red" class="small" ><?php echo $err; ?></span>
            </div>
    <?php }?>

    
    <div class="contact_form_button" style="display: flex;align-items: center;justify-content: space-around;">
      <button type="submit" class="button contact_submit_button" >Cập nhật thông tin</button>
      <div id="show-hidden-menu"><p class="button contact_submit_button" style="text-align: center; line-height: 50px;">Lịch sử mua hàng</p></div>
    </div>
    


      


    <div class="hidden-menu" style="display: none;">
      <hr style="margin-top: 50px">

    <h2 class="text-center" style="color: #0e8ce4;padding: 40px;">Lịch Sử Mua Hàng</h2>
    <?php
        if($cart==null){ ?>
        <h4 style="margin-top: 30px; color: gray; text-align: center;"><a href="<?php echo base_url(); ?>" class="btn btn-warning"><i class="fa fa-angle-left"></i> Mua Hàng Ngay</a>  Bạn chưa mua sản phẩm nào</h4>
    <?php }else{ ?>

    <table id="cart" class="table table-hover table-condensed" style="text-align: center;">
    
    <thead>
      <tr>
        <th style="width:10%">Mã Đơn Hàng</th>
        <th style="width:60%">Chi Tiết Đơn Hàng</th>
        <th style="width:5%">Số Lượng</th>
        <th style="width:10%">Số Tiền</th>
        <th style="width:15%">Thời Gian</th>
        <th style="width:5%" class="text-center">Trạng Thái</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($cart as $key => $value) {
          $chitiethoadon = $this->model_vnpay->chitiethoadon($value['madonhang']);
       ?>
        <tr>
          <td><p style="line-height: 40px;">
            <?php echo $value['madonhang']; ?>
            </p>
          </td>
          <td>
          <?php
              foreach($chitiethoadon as $key => $value1) { 
            ?>
            <a href="<?php echo base_url('san-pham/'.$value1['duongDan']); ?>">
              <p style="line-height: 40px; height: 40px; overflow: hidden;"><?php echo $value1['tenSanPham'] ?></p> 
            </a>
          <?php } ?>
            
          </td>
          <td style="height: 100%; "> 
            <?php
              foreach($chitiethoadon as $key => $value1) { 
            ?>
            <p style="text-align: center; line-height: 40px;"><?php echo $value1['soluongban'] ?></p> 
            <?php } ?>
          </td>
          
          <td>
            <p style="line-height: 40px;">
           <?php 
                $g="";
            $gia_tong = (string)($value['sotien']);
            for($i=0; $i<strlen($gia_tong); $i++){
              if(strlen($gia_tong)==9){
                  $g .= $gia_tong[$i];
                  if($i==2){
                    $g .=".";
                  }
                  if($i==5){
                    $g .=".";
                  }
                }else if(strlen($gia_tong)==6){
                  $g .= $gia_tong[$i];
                  if($i==2){
                    $g .=".";
                  }
                }
                else if(strlen($gia_tong)==7){
                  $g .= $gia_tong[$i];
                  if($i==0){
                    $g .=".";
                  }
                  if($i==3){
                    $g .=".";
                  }
                }
                else if(strlen($gia_tong)==8){
                  $g .= $gia_tong[$i];
                  if($i==1){
                    $g .=".";
                  }
                  if($i==4){
                    $g .=".";
                  }
                }else{
                  $g .= $gia_tong[$i];
                }
            }
            echo $g."VNĐ";

           ?>
              
            </p>
              
            </td>
          
          <td>
            <p style="line-height: 30px;">
            <?php $time = $value['thoigian']; 
                  $year = $time[0].$time[1].$time[2].$time[3];
                  $mounht = $time[5].$time[6];
                  $day = $time[8].$time[9];
                  $hours = $time[11].$time[12];
                  $minute = $time[14].$time[15];
                  echo $hours.":".$minute." ".$day."/".$mounht.'/'.$year;
            ?>
            </p>
          </td>
          <td style="text-align: center;">
            <p style="line-height: 30px; height: 90px; overflow: hidden;">
            <?php 
            foreach($chitiethoadon as $key => $value1) { 
            if($value1['dagiaohang']==0){
              echo "đang giao hàng"."<br>";
            }else{
              echo "đã giao hàng"."<br>";
            }}
           ?>
          </p>
         </td>
        </tr>
        
      <?php } ?>
    </tbody>
    </table>
    <?php } ?>
    
    
    </div>
  </form>   </div>
<?php require(__DIR__.'/layouts/footer.php'); ?>
<script type="text/javascript">
  
  $(document).ready(function() {
  $('#show-hidden-menu').click(function() {
    $('.hidden-menu').slideToggle("slow");
    // Alternative animation for example
    // slideToggle("fast");
  });
});

  $(document).ready(function() {
  $('#show-hidden-chage-pass').click(function() {
    $('.hidden-chage-pass').slideToggle("slow");
    // Alternative animation for example
    // slideToggle("fast");
  });
});
</script>