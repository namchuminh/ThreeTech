<?php require(__DIR__.'/layouts/header.php'); ?>
<div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tin Tức</h1>
        <p class="mb-4">Dữ liệu được lấy trong bảng tin tức, bao gồm các thông tin liên quan đến Tin Tức.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tất cả: Tin Tức</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive" style="overflow-x: hidden;">
                    <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row">
                    	<div class="col-sm-12 col-md-6">
                    		<div id="dataTable_filter" class="dataTables_filter">
                        		<label>Tìm Kiếm:
                        			<input type="search" class="form-control form-control-sm timkiemnhanvien" placeholder="Nhập tên tin tức..." aria-controls="dataTable">
                        		</label>
                    		</div>
                    	</div>
                    	<div class="col-sm-12 col-md-6">
                    		<div id="dataTable_filter" class="dataTables_filter">
                        		<a href="<?php echo base_url('admin/tin-tuc/tao-bai-viet/'); ?>" class="btn btn-primary float-right">Tạo Bài Viết</a>
                    		</div>
                    	</div>
                    </div>

                    <div class="row"><div class="col-sm-12">
                    	<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 88px;">Tiêu Đề</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 100px;">Nội Dung</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 44px;">Ngày Đăng</th>
                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 51px;">Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($news as $key => $value): ?>
                               	<tr class="odd">
                                    <td><?php echo mb_substr($value['tieuDe'],0,20); ?>...</td>
                                    <td><?php echo mb_substr(strip_tags($value['noiDung']),0,100); ?>...</td>
                                    <td><?php echo $value['ngayDang']; ?></td>
                                    <td style="line-height: 50px;">
                                        <a href="<?php echo base_url('tin-tuc/').$value['duongDan'] . '/'; ?>" class="btn btn-warning" >Xem</a>
                                        <a href="<?php echo base_url('admin/tin-tuc/sua/').$value['tinTucId'] . '/'; ?>" class="btn btn-warning" >Sửa</a>
                                        <a class="btn btn-danger deleteProductAction" value="<?php echo base_url('admin/tin-tuc/xoa/').$value['tinTucId'] . '/'; ?>" href="#" data-toggle="modal" data-target="#deleteNewsModal">Xóa<input type="hidden" class="cate" value=""></a>
                                    </td>
                            	</tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
    <div class="modal fade" id="deleteNewsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xóa Bài Viết</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Bạn có chắc chắn xóa bài viết này?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                    <a class="btn btn-primary deleteNews" href="" id="deleteNewsModal">Xóa</a>
                </div>
            </div>
        </div>
    </div>

<?php require(__DIR__.'/layouts/footer.php'); ?>
<script>
    var base_url =  window.location.origin == "http://localhost" ? window.location.origin + "/ThreeTech" : window.location.origin
    function strip_tags(str) {
        str = str.toString();
        return str.replace(/<\/?[^>]+>/gi, '');
    }
    $(document).ready(function() {
        $('.deleteProductAction').click(function (){
            var url_delete = $(this).attr('value')
            $(".deleteNews").attr("href", url_delete)
        })

        $('input').keyup(function(event) {
            var tieuDe = $('.timkiemnhanvien').val()
            $('.xemthem').remove()

            if(tieuDe == ""){
                $('.paginate_button').append('<button class="page-link xemthem">Xem Thêm</button>')
            }

            $.post(base_url+"/tin-tuc/tim-kiem/",{
                tieuDe: tieuDe
            },
            function(data){
                var dataSearch = JSON.parse(data)
                console.log(dataSearch)
                $('tbody').empty()
                for(var i = 0; i < dataSearch.length; i++){
                    var noiDung = strip_tags(dataSearch[i].noiDung)

                    $('tbody').append('<tr class="odd"> <td>'+dataSearch[i].tieuDe.slice(0,21)+'...</td> <td>'+noiDung.slice(0,100)+'...</td> <td>'+dataSearch[i].ngayDang+'</td> <td style="line-height: 50px;"> <a href="'+base_url+'/tin-tuc/'+dataSearch[i].duongDan+'" class="btn btn-warning">Xem</a> <a href="'+base_url+'/'+'admin/tin-tuc/sua/'+dataSearch[i].tinTucId+'" class="btn btn-warning">Sửa</a> <a class="btn btn-danger deleteProductAction" value="'+base_url+'/admin/tin-tuc/xoa/'+dataSearch[i].tinTucId+'" href="#" data-toggle="modal" data-target="#deleteNewsModal">Xóa<input type="hidden" class="cate" value=""></a> </td> </tr>')
                }
            });
        })
    });
</script>