<?php require(__DIR__ . '/layouts/header.php'); ?>
<?php require(__DIR__ . '/layouts/nav.php'); ?>

<div class="container">
  <?php
     if($soLuongSanPham[0]["so luong san pham"] == 0){?>
      <div style="width: 100%; height: 200px; text-align:center ;line-height: 500px;">
         <h3 style="margin-top: 100px; color: gray;"><a href="<?php echo base_url(); ?>" class="btn btn-warning"><i class="fa fa-angle-left"></i> Mua Hàng Ngay</a> Chưa có sản phẩm nào trong giỏ hàng</h3>

      </div>
  <?php  
     }else{
  ?>
  
  <table id="cart" class="table table-hover table-condensed">
    <thead>
      <tr>
        <th style="width:50%">Sản phẩm</th>
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
              <a style="color: black;" href="<?php echo base_url('san-pham/'.$value['duongDan']);?>">
                <div class="row">
                <div class="col-sm-2 hidden-xs"><img src="<?php echo $value['anhChinh']; ?>" alt="Sản phẩm 1" class="img-responsive" width="80">
                </div>
                <div class="col-sm-10">
                  <h4 class="nomargin"><?php echo $value['tenSanPham']; ?></h4>
                  <div style="width: 100%;height: 20px; overflow: hidden;"><?php echo $value['moTa']; ?></div>
                </div>
              </div>
              </a>
              
            </td>
            <td data-th="Price"><?php 
              $giaban = (string)$value['giaBan'];
              //echo strlen($giaban);
              //$giaban = (string)123456789;
              $tienban="";

              for($i=0; $i<strlen($giaban);$i++){
                  if(strlen($giaban)==9){
                    $tienban .= $giaban[$i];
                    if($i==1){
                      $tienban .=".";
                    }
                  }else if(strlen($giaban)==7){
                    $tienban .= $giaban[$i];
                  }
                  else if(strlen($giaban)==8){
                    $tienban .= $giaban[$i];
                    if($i==0){
                      $tienban .=".";
                    }
                  }else{
                    $tienban .= $giaban[$i];
                    
                  }

                  
              }
              echo $tienban;
            ?></td>
            <td data-th="Quantity"><input class="form-control text-center" name="soLuong" min="1" value="<?php echo $value['so luong ban']; ?>" type="number">
            </td>
            
            <td data-th="Subtotal" class="text-center"><?php

              $g="";
              $gia = (string)($sum*1000);
              for($i=0; $i<strlen($gia); $i++){
                if(strlen($gia)==9){
                    $g .= $gia[$i];
                    if($i==2){
                      $g .=".";
                    }
                    if($i==5){
                      $g .=".";
                    }
                  }else if(strlen($gia)==6){
                    $g .= $gia[$i];
                    if($i==2){
                      $g .=".";
                    }
                  }
                  else if(strlen($gia)==7){
                    $g .= $gia[$i];
                    if($i==0){
                      $g .=".";
                    }
                    if($i==3){
                      $g .=".";
                    }
                  }
                  else if(strlen($gia)==8){
                    $g .= $gia[$i];
                    if($i==1){
                      $g .=".";
                    }
                    if($i==4){
                      $g .=".";
                    }
                  }else{
                    $g .= $gia[$i];
                    
                  }
              }
              echo $g;
              

           ?></td>
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
    <form action="<?php echo base_url('gio-hang/dat-hang'); ?>" id="create_form" method="post">
    <tr>
      <?php foreach ($product as $key => $value) {?>
        <input class="form-control text-center" name="sanPhamId" value="<?php echo $value['sanPhamId']; ?>" type="hidden">
        <input class="form-control text-center" name="soLuong" value="<?php echo $value['so luong ban']; ?>" type="hidden">
        <input class="form-control text-center" name="tongtien" value="<?php echo $sum_cart; ?>" type="hidden">
      <?php } ?>
    </tr>
    <tr>
      <td><a href="<?php echo base_url('gio-hang'); ?>" class="btn btn-warning"><i class="fa fa-angle-left"></i>Trở lại giỏ hàng</a>
      </td>
      <td colspan="2" class="hidden-xs"> </td>
      <td class="hidden-xs text-center"><strong>Tổng tiền: <?php
              $g="";
              $gia_tong = (string)($sum_cart*1000);
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
                    $g .= $gia[$i];
                    
                  }
              }
              echo $g; ?> VNĐ</strong>
        <input type="hidden" name="tongtien" value="<?php echo $sum_cart*1000; ?>">
      </td>                 
        <td><button type="submit" class="btn btn-success btn-block" name="redirect">Đặt hàng</button></td>
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