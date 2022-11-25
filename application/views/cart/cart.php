<?php require(__DIR__ . '/layouts/header.php'); ?>
<?php require(__DIR__ . '/layouts/nav.php'); ?>

<div class="container">
  <?php
     if($soLuongSanPham[0]["so luong san pham"] ==0){?>
      <div style="width: 100%; height: 500px; text-align:center ;line-height: 500px;">
         <h3 style="line-height: 500px; color: gray;"><a href="<?php echo base_url(); ?>" class="btn btn-warning"><i class="fa fa-angle-left"></i>Mua Hàng Ngay</a> Chưa có sản phẩm nào trong giỏ hàng</h3>

      </div>
  <?php  
     }else{
  ?>
  
  <table id="cart" class="table table-hover table-condensed">
    <thead>
      <tr>
        <th style="width:50%">Tên sản phẩm</th>
        <th style="width:10%">Giá</th>
        <th style="width:8%">Số lượng</th>
        <th style="width:22%" class="text-center">Thành tiền</th>
        <th style="width:10%"> </th>
      </tr>
    </thead>
    <tbody>
      <!-- <?php var_dump($product); ?> -->
      <?php
        $sum_cart = 0;
        foreach ($product as $key => $value) {
          $sum = $value['giaBan'] * $value['so luong ban'];
          $sum_cart += $sum;
        ?>
      <form action="<?php echo base_url('sua-gio-hang/'); ?>" method="POST">
        
          <tr>
            <td data-th="Product">
              <div class="row">
                <div class="col-sm-2 hidden-xs"><img src="<?php echo $value['anhChinh']; ?>" alt="Sản phẩm 1" class="img-responsive" width="100">
                </div>
                <div class="col-sm-10">
                  <h4 class="nomargin"><?php echo $value['tenSanPham']; ?></h4>
                  <p><?php echo $value['moTa']; ?></p>
                </div>
              </div>
            </td>
            <td data-th="Price"><?php echo $value['giaBan']; ?></td>
            <td data-th="Quantity"><input class="form-control text-center" name="soLuong" min="1" value="<?php echo $value['so luong ban']; ?>" type="number">
            </td>
            
            <td data-th="Subtotal" class="text-center"><?php echo $sum; ?></td>
            <td class="actions" data-th="">


              <input class="form-control text-center" name="sanPhamId" value="<?php echo $value['sanPhamId']; ?>" type="hidden">
              <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>
              </button>
      </form>
      <form action="<?php echo base_url('xoa-gio-hang/'); ?>" method="POST">
        <input class="form-control text-center" name="sanPhamId" value="<?php echo $value['sanPhamId']; ?>" type="hidden">
        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>
        </button>
      </form>


      </td>
      </tr>
    <?php } ?>
    <!-- thong tin khach hang -->
    <form action="<?php echo base_url('gio-hang/thanh-toan'); ?>" id="create_form" method="post">
    <tr>
      <?php foreach ($product as $key => $value) {?>
        <input class="form-control text-center" name="sanPhamId" value="<?php echo $value['sanPhamId']; ?>" type="hidden">
        <input class="form-control text-center" name="soLuong" value="<?php echo $value['so luong ban']; ?>" type="hidden">
        <input class="form-control text-center" name="tongtien" value="<?php echo $sum_cart; ?>" type="hidden">
      <?php } ?>



      <td colspan="5" class="hidden-xs"><div class="form-group">
            <h3>Thông tin giao hàng</h3>
        </div>
        <div class="form-group">
            <label >Họ tên (*)</label>
            <input class="form-control" id="txt_ship_fullname"
                   name="txt_ship_fullname" type="text" value=""/>
            <?php if(isset($messht)) {?>
              <p style="width: 100%; color: red"><i class="fa-solid fa-triangle-exclamation"></i> <?php echo $messht;?></p>
            <?php } ?> 
        </div>
        <div class="form-group">
            <label >Số điện thoại (*)</label>
            <input class="form-control" id="txt_ship_mobile"
                   name="txt_ship_mobile" type="text" value=""/>
        </div>

        <div class="form-group">
            <label >ngân hàng (*)</label>
            <select name="bank_code" class="form-control">
                <option value="">Không chọn</option>
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
        <div class="form-group">
            <label >Địa chỉ (*)</label>
            <input class="form-control" id="txt_ship_city"
                   name="txt_ship_city" type="text" value=""/>
            <?php if(isset($messdc)) {?>
              <p class="form-control"><i class="fa-solid fa-triangle-exclamation"></i> <?php echo $mess;?></p>
            <?php } ?>  
        </div>
        <input type="hidden" name="amount" value="<?php echo $sum_cart; ?>">
    </tr>
    <tr>
      <td><a href="<?php echo base_url(); ?>" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
      </td>
      <td colspan="2" class="hidden-xs"> </td>
      <td class="hidden-xs text-center"><strong>Tổng tiền <?php echo $sum_cart; ?> đ</strong>
      </td>                 
        <td><button type="submit" class="btn btn-success btn-block" name="redirect">Thanh toán</button></td>
      </form>
      
      </td>
    </tr>
    </tfoot>
  </table>  
  <?php  
     }
  ?>
</div>
<?php require(__DIR__ . '/layouts/footer.php'); ?>
<!-- 
vnp_Amount=2500000
vnp_BankCode=NCB
vnp_BankTranNo=VNP13885948
vnp_CardType=ATM
vnp_OrderInfo=thanh+toan+vnpay
vnp_PayDate=20221124140454
vnp_ResponseCode=00
vnp_TmnCode=BZH5HZSG
vnp_TransactionNo=13885948
vnp_TransactionStatus=00
vnp_TxnRef=1669273463
vnp_SecureHash=4ee2b41b351a435846a36947fadcb36df728b871ca8be7443969e211b63a60973626b16c661ab51b94d651ff7ca0b4c79c8c4db80cc519942571f5d6534eccdd 
-->