<?php require(__DIR__ . '/layouts/header.php'); ?>
<?php require(__DIR__ . '/layouts/nav.php'); ?>
<div class="container" style="width: 50%; margin-top: 100px; margin-bottom: 100px; box-shadow: 0 0em 0.5em rgb(15 15 15 / 25%); padding: 100px 10px;">
	

	<table id="cart" class="table table-hover table-condensed">
    
    <!-- thong tin khach hang -->
    <form action="<?php echo base_url('gio-hang/thanh-toan'); ?>" id="create_form" method="post">
    	<div style="width: 100%; text-align: center;">
      		<h3>Thông tin giao hàng</h3>
      	</div>
    <tr>
      <td colspan="5" class="hidden-xs"><div class="form-group">
      	
            
        </div>
        <div class="form-group">
            <label >Họ tên (*)</label>
            <input class="form-control" id="txt_ship_fullname"
                   name="txt_ship_fullname" type="text" value="<?php echo $_SESSION['hoten']; ?>"/>
            <?php if(isset($messht)) {?>
              <p style="width: 100%; color: red"><i class="fa-solid fa-triangle-exclamation"></i> <?php echo $messht;?></p>
            <?php } ?> 
        </div>
        <div class="form-group">
            <label >Số điện thoại (*)</label>
            <input class="form-control" id="txt_ship_mobile"
                   name="txt_ship_mobile" type="text" value="<?php echo $_SESSION['sodienthoai']; ?>"/>
        </div>
        <div class="form-group">
            <label >Địa chỉ (*)</label>
            <input class="form-control" id="txt_ship_city"
                   name="txt_ship_city" type="text" value="<?php echo $_SESSION['diachi']; ?>"/>
            <?php if(isset($messdc)) {?>
              <p class="form-control"><i class="fa-solid fa-triangle-exclamation"></i> <?php echo $mess;?></p>
            <?php } ?>  
            <?php if(isset($tongtien)) {?>
                <input type="hidden" name="amount" value="<?php echo $tongtien;?>">
            <?php } ?> 
        </div>
        <div class="form-group">
            <label>Thanh Toán (*)</label>
            <select name="bank_code" class="form-control">
                <option value="">Trả Tiền Mặt</option>
                <option value="NCB"> Ngan hang NCB</option>
                <option value="AGRIBANK"> Ngan hang Agribank</option>
                <option value="SCB"> Ngan hang SCB</option>
                <option value="SACOMBANK">Ngan hang SacomBank</option>
                <option value="EXIMBANK"> Ngan hang EximBank</option>
                <option value="MSBANK"> Ngan hang MSBANK</option>
                <option value="NAMABANK"> Ngan hang NamABank</option>
                <option value="VNMART"> Vi dien tu VnMart</option>
                <option value="VIETINBANK">Ngan hang Vietinbank</option>
                <option value="VIETCOMBANK"> Ngan hang VCB</option>
                <option value="HDBANK">Ngan hang HDBank</option>
                <option value="DONGABANK"> Ngan hang Dong A</option>
                <option value="TPBANK"> Ngân hàng TPBank</option>
                <option value="OJB"> Ngân hàng OceanBank</option>
                <option value="BIDV"> Ngân hàng BIDV</option>
                <option value="TECHCOMBANK"> Ngân hàng Techcombank</option>
                <option value="VPBANK"> Ngan hang VPBank</option>
                <option value="MBBANK"> Ngan hang MBBank</option>
                <option value="ACB"> Ngan hang ACB</option>
                <option value="OCB"> Ngan hang OCB</option>
                <option value="IVB"> Ngan hang IVB</option>
                <option value="VISA"> Thanh toan qua VISA/MASTER</option>
            </select>
        </div>
    </tr>
    <tr>
      <td><a href="<?php echo base_url('gio-hang'); ?>" class="btn btn-warning"><i class="fa fa-angle-left"></i>Trở lại giỏ hàng</a>
      </td>               
        <td style="width: 200px;"><button type="submit" class="btn btn-success btn-block" name="redirect">Thanh toán</button></td>
      </form>
      
      </td>
    </tr>
    </tfoot>
  </table>
</div>
<?php require(__DIR__ . '/layouts/footer.php'); ?>