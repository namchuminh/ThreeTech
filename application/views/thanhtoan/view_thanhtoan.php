<?php require(__DIR__ . '/layouts/header.php'); ?>
<?php require(__DIR__ . '/layouts/nav.php'); ?>
<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    /*
     * To change this license header, choose License Headers in Project Properties.
     * To change this template file, choose Tools | Templates
     * and open the template in the editor.
     */
      
    $vnp_TmnCode = ""; //Website ID in VNPAY System
    $vnp_HashSecret = ""; //Secret key
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "http://localhost/vnpay_php/vnpay_return.php";
    $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
    //Config input format
    //Expire
    $startTime = date("YmdHis");
    $expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));



    $vnp_SecureHash = $_GET['vnp_SecureHash'];
    $inputData = array();
    foreach ($_GET as $key => $value) {
        if (substr($key, 0, 4) == "vnp_") {
            $inputData[$key] = $value;
        }
    }
    
    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    $i = 0;
    $hashData = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
    }

    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
?>
<div class="container" style="width: 50%; margin-top: 100px; margin-bottom: 100px; box-shadow: 0 0em 0.5em rgb(15 15 15 / 25%); padding: 100px 10px;">
            <div class="table-responsive" style="text-align: center;">
                <h3>Thông Tin Đơn Hàng</h3>
                <div class="form-group">
                    <label >Mã đơn hàng:</label>

                    <label><?php echo $_GET['vnp_TxnRef'] ?></label>
                </div>    
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label><?php 

                    $sotien = $_GET['vnp_Amount']/100;
                        $g="";
                      $gia_tong = (string)($sotien);
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
                          }
                      }
                      echo $g." VNĐ";
                    ?>
                    

                    </label>
                </div>  
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
                </div>
                <div class="form-group">
                    <label >Mã GD Tại VNPAY:</label>
                    <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Mã Ngân hàng:</label>
                    <label><?php echo $_GET['vnp_BankCode'] ?></label>
                </div> 
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label>
                    <?php 
                        $date = $_GET['vnp_PayDate'];

                        $year = $date[0].''.$date[1].''.$date[2].''.$date[3];
                        $mounht = $date[4].''.$date[5];

                        $days = $date[6].''.$date[7];
                        $hours = $date[8].''.$date[9];
                        $minute = $date[10].''.$date[11];
                        $second = $date[12].''.$date[13];
                        // echo $date;
                        // echo "<br>";
                        // echo $year.$mounht.$days.$hours.$minute.$second;
                        $time = $year."-".$mounht."-".$days."-".$hours."-".$minute."-".$second;


                    echo $hours.":".$minute.":".$second." Ngày:".$days."/".$mounht."/".$year;
                ?></label>
                </div> 
                <div class="form-group">
                    <label >Kết quả:</label>
                    <label>
                        <?php
                            if ($_GET['vnp_ResponseCode'] == '00') {
                                    echo "<span style='color:blue'>GD Thành Công</span>";
                            } else {
                                echo "<span style='color:red'>GD Thất Bại</span>";
                            } 
                        ?>

                    </label>
                </div> 
                <a href="<?php echo base_url(); ?>" class="btn btn-warning"><i class="fa fa-angle-left"></i>Trở Lại Mua Hàng</a>
            </div>
        </div> 

<?php require(__DIR__ . '/layouts/footer.php'); ?>
