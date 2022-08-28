<?php require(__DIR__.'/layouts/header.php'); ?>
<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Linh Kiện</h1>
                    <p class="mb-4">Dữ liệu được lấy trong bảng sản phẩm, bao gồm các thông tin liên quan đến sản phẩm Linh Kiện.</p>

                   <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tất cả: Linh Kiện</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <div id="dataTable_filter" class="dataTables_filter">
                                            <label>Search:
                                                <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-6">
                                        <div id="dataTable_filter" class="dataTables_filter">
                                            <a href="<?php echo base_url('san-pham/them');?>" class="btn btn-primary float-right">Thêm Sản Phẩm</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row"><div class="col-sm-12">
                                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row"><th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 61px;">ID</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 100px;">Tên Sản Phẩm</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 324px;">Mô Tả</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 51px;">Giá Gốc</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 108px;">Giá Bán</th><th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 97px;">Số Lượng</th></tr>
                                    </thead>
                                    <tbody>
                                        
                                    <?php foreach ($product as $key => $value): ?>
                                        <tr class="odd">
                                            <td class="sorting_1"><?php echo $value['sanPhamId'] ?></td>
                                            <td><?php echo $value['tenSanPham'] ?></td>
                                            <td><?php echo $value['moTa'] ?></td>
                                            <td><?php echo $value['giaGoc'] ?></td>
                                            <td><?php echo $value['giaBan'] ?></td>
                                            <td><?php echo $value['soLuong'] ?></td>
                                        </tr>
                                    <?php endforeach ?>   

                                    </tbody>
                                </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="dataTable_previous"><a href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="dataTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="dataTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="dataTable_next"><a href="#" aria-controls="dataTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
                            </div>
                        </div>
                    </div>


                </div>
<?php require(__DIR__.'/layouts/footer.php'); ?>
