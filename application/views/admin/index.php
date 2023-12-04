<?php require(__DIR__.'/layouts/header.php'); ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Doanh Thu Hôm Qua</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($getDoanhThuHomQua[0]["doanhThuHomQua"], 0, '', ','); ?> đ</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Doanh Thu (Đầu này tới giờ)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo number_format($dauNgayToiGio[0]["dauNgayToiGio"], 0, '', ','); ?> đ</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Số Lượng Khách Hàng
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $soLuongKhachHang[0]["soLuongKhachHang"]; ?> Khách Hàng</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Đơn Hàng Chưa Giao</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $donHangChuaGiao; ?> Đơn Chưa Giao</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Biều Đồ Doanh Thu Tháng</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Tổng Sản Phẩm Đã Bán</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Linh Kiện
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Máy Tính
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Laptop
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Top 5 Sản Phẩm Bán Chạy</h6>
                                </div>
                                <div class="card-body">
                                    <?php 
                                        $color = array('bg-danger', 'bg-warning', 'bg-primary', 'bg-info', 'bg-success' ); 
                                        $i = 0;
                                    ?>
                                    <?php foreach ($phanTramSanPhamBanChay as $key => $value): ?>
                                        <h4 class="small font-weight-bold"> <a href="<?php echo base_url('san-pham/') . $value["duongDan"]; ?>"><?php echo $value['tenSanPham']; ?></a><span
                                            class="float-right">Đã bán: <?php echo $value["soLuongBan"] . "/" . $value["soLuong"]; ?></span></h4>
                                        <div class="progress mb-4">
                                            <div class="progress-bar <?php echo $color[$i]; ?>" role="progressbar" style="width: <?php echo $value["phanTram"]; ?>%"
                                                aria-valuenow="<?php echo $value["phanTram"]; ?>" aria-valuemin="0" aria-valuemax="100" title="<?php echo $value["phanTram"]; ?>%"></div>
                                        </div>
                                        <?php $i++; ?>
                                    <?php endforeach ?>
                                    
                                    



                                </div>
                            </div>


                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Khách Hàng Mới</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Họ Tên</th>
                                          <th scope="col">Tài Khoản</th>
                                          <th scope="col">Số Điện Thoại</th>
                                          <th scope="col">Địa Chỉ</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php 
                                        $i = 1;
                                        foreach ($getKhachHangMoi as $key => $value): ?>
                                            <tr>
                                              <th scope="row"><?php echo $i; ?></th>
                                              <td><?php echo $value["hoTen"]; ?></td>
                                              <td><?php echo $value["taiKhoan"]; ?></td>
                                              <td><?php echo $value["soDienThoai"]; ?></td>
                                              <td><?php echo $value["diaChi"]; ?></td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach ?>
                                      </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <!-- Page level plugins -->
    <script src="<?php echo base_url('static/');?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url('static/');?>js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url('static/');?>js/demo/chart-pie-demo.js"></script>

<?php require(__DIR__.'/layouts/footer.php'); ?>
