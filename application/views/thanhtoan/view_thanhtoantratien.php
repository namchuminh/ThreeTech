<?php require(__DIR__ . '/layouts/header.php'); ?>
<?php require(__DIR__ . '/layouts/nav.php'); ?>

<div class="container" style="width: 50%; margin-top: 100px; margin-bottom: 100px; box-shadow: 0 0em 0.5em rgb(15 15 15 / 25%); padding: 100px 10px;">
            <div class="table-responsive" style="text-align: center;">
                <h3>Thông Tin Đơn Hàng</h3>
                <div class="form-group">
                    <label >Mã đơn hàng:</label>

                    <label><?php echo $madonhang; ?></label>
                </div>    
                <div class="form-group">

                    <label >Số tiền:</label>
                    <label>
                        <?php echo number_format($tongtien * 1000); ?>
                    </label>
                </div>  
                <div class="form-group">
                    <label >Nội dung thanh toán:</label>
                    <label>Thanh toán đơn hàng trong giỏ hàng!</label>
                </div>
                <div class="form-group">
                    <label >Mã GD tại hệ thống:</label>
                    <label><?php echo $madonhang; ?></label>
                </div> 
                <div class="form-group">
                    <label >Thanh toán:</label>
                    <label>Trả tiền mặt khi nhận hàng</label>
                </div> 
                <div class="form-group">
                    <label >Thời gian thanh toán:</label>
                    <label>
                    <?php 
                        echo date('H:i:s', time()) ." ". date('d-m-Y', time());;
                    ?>
                </label>
                </div> 
                <div class="form-group">
                    <label >Kết quả:</label>
                    <label>
                        <span style='color:blue'>GD Thành Công</span>
                    </label>
                </div> 
                <a href="<?php echo base_url(); ?>" class="btn btn-warning"><i class="fa fa-angle-left"></i>Trở Lại Mua Hàng</a>
            </div>
        </div> 

<?php require(__DIR__ . '/layouts/footer.php'); ?>
