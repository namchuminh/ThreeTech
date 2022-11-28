<?php require(__DIR__.'/layouts/header.php'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Sửa sản phẩm có mã: <?php echo $product[0]['sanPhamId']; ?></h1>
    <p class="mb-4">Cập nhật thông tin sản phẩm đã có trong Cơ sở dữ liệu.</p>
    <?php if(isset($mess)){ ?>
            <div class="text-center">
                <span style="font-weight: bold; color: red; font-size: 20px;" class="small"><?php echo $mess; ?></span>
            </div>
      <?php }?>
    <form method="POST" action="<?php echo base_url('admin/actionUpdateProduct/'); ?>" enctype="multipart/form-data">
      <input type="hidden" name="sanPhamId" value="<?php echo $product[0]['sanPhamId']; ?>" > 
      <div class="form-group">
        <label for="exampleFormControlInput1">Tên Sản Phẩm</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="tenSanPham" placeholder="Nhập tên sản phẩm..." required value="<?php echo $product[0]['tenSanPham']; ?>"> 
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Giá Gốc</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="giaGoc" placeholder="Nhập giá gốc, VD: 16500.000" required value="<?php echo $product[0]['giaGoc']; ?>"> 
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Giá Bán</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="giaBan" placeholder="Nhập giá bán, VD: 14500.000" required value="<?php echo $product[0]['giaBan']; ?>"> 
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Mô Tả</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="moTa"><?php echo $product[0]['moTa']; ?></textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Đường Dẫn</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="duongDan" placeholder="Nhập giá đường dẫn, VD: duong-dan-san-pham" required value="<?php echo $product[0]['duongDan']; ?>"> 
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Loại Sản Phẩm</label>
        <select class="form-control" id="exampleFormControlSelect1" name="trangThai">
          <?php if($product[0]['trangThai'] == 1){ ?>
            <option value="1" selected="selected">Còn Hàng</option>
            <option value="0">Hết Hàng</option>
          <?php }?>
          <?php if($product[0]['trangThai'] == 0){ ?>
            <option value="1">Còn Hàng</option>
            <option value="0" selected="selected">Hết Hàng</option>
          <?php }?>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Số Lượng</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="soLuong" placeholder="Nhập số lượng..." required value="<?php echo $product[0]['soLuong']; ?>"> 
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Ảnh Chính</label>
        <input type="hidden" name="anhChinhGoc" value="<?php echo $product[0]['anhChinh']; ?>">
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="anhChinh">
        <img style="margin-top: 15px;" src="<?php echo $product[0]['anhChinh']; ?>" width="200" height="200">
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Ảnh Phụ 1</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="anhPhu1">
        <input type="hidden" name="anhPhu1Goc" value="<?php echo $product[0]['anhPhu1']; ?>">
        <img style="margin-top: 15px;" src="<?php echo $product[0]['anhPhu1']; ?>" width="200" height="200">
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Ảnh Phụ 2</label>
        <input type="hidden" name="anhPhu2Goc" value="<?php echo $product[0]['anhPhu2']; ?>">
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="anhPhu2">
        <img style="margin-top: 15px;" src="<?php echo $product[0]['anhPhu2']; ?>" width="200" height="200">
      </div>

      <div class="form-group">  
        <label for="exampleFormControlSelect1">Chuyên Mục</label>
        <select class="form-control" id="exampleFormControlSelect1" name="chuyenMucId">
          <?php if($product[0]['chuyenMucId'] == 1){ ?>
            <option value="1" selected="selected">Laptop</option>
            <option value="2">Máy Tính</option>
            <option value="3">Linh Kiện</option>
          <?php }?>
          <?php if($product[0]['chuyenMucId'] == 2){ ?>
            <option value="1" >Laptop</option>
            <option value="2" selected="selected">Máy Tính</option>
            <option value="3">Linh Kiện</option>
          <?php }?>
          <?php if($product[0]['chuyenMucId'] == 3){ ?>
            <option value="1" >Laptop</option>
            <option value="2" selected="selected">Máy Tính</option>
            <option value="3">Linh Kiện</option>
          <?php }?>
          
        </select>
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Loại Sản Phẩm</label>
        <select class="form-control" id="exampleFormControlSelect1" name="loaiSanPham">
          <?php if($product[0]['loaiSanPham'] == 'Uudai'){ ?>
            <option value="Uudai" selected="selected">Ưu đãi</option>
            <option value="Khonguudai">Không Ưu Đãi</option>
            <option value="Giamgiacuoituan">Giảm Giá Cuối Tuần</option>
            <option value="Phobien">Phổ Biến</option>
            <option value="Totnhat">Tốt Nhất</option>
            <option value="Noibatmoi">Nổi Bật - Mới</option>
            <option value="Audiovideo">Audio & Video</option>
            <option value="Laptopcomputer">Laptop & Computer</option>
            <option value="Trend">Trend</option>
            <option value="Slide">Slide</option>
            <option value="Top20">Top20</option>
          <?php }?>
          <?php if($product[0]['loaiSanPham'] == 'Khonguudai'){ ?>
            <option value="Uudai">Ưu đãi</option>
            <option value="Khonguudai" selected="selected">Không Ưu Đãi</option>
            <option value="Giamgiacuoituan">Giảm Giá Cuối Tuần</option>
            <option value="Phobien">Phổ Biến</option>
            <option value="Totnhat">Tốt Nhất</option>
            <option value="Noibatmoi">Nổi Bật - Mới</option>
            <option value="Audiovideo">Audio & Video</option>
            <option value="Laptopcomputer">Laptop & Computer</option>
            <option value="Trend">Trend</option>
            <option value="Slide">Slide</option>
            <option value="Top20">Top20</option>
          <?php }?>
          <?php if($product[0]['loaiSanPham'] == 'Giamgiacuoituan'){ ?>
            <option value="Uudai">Ưu đãi</option>
            <option value="Khonguudai">Không Ưu Đãi</option>
            <option value="Giamgiacuoituan" selected="selected">Giảm Giá Cuối Tuần</option>
            <option value="Phobien">Phổ Biến</option>
            <option value="Totnhat">Tốt Nhất</option>
            <option value="Noibatmoi">Nổi Bật - Mới</option>
            <option value="Audiovideo">Audio & Video</option>
            <option value="Laptopcomputer">Laptop & Computer</option>
            <option value="Trend">Trend</option>
            <option value="Slide">Slide</option>
            <option value="Top20">Top20</option>
          <?php }?>
          <?php if($product[0]['loaiSanPham'] == 'Phobien'){ ?>
            <option value="Uudai">Ưu đãi</option>
            <option value="Khonguudai">Không Ưu Đãi</option>
            <option value="Giamgiacuoituan">Giảm Giá Cuối Tuần</option>
            <option value="Phobien" selected="selected">Phổ Biến</option>
            <option value="Totnhat">Tốt Nhất</option>
            <option value="Noibatmoi">Nổi Bật - Mới</option>
            <option value="Audiovideo">Audio & Video</option>
            <option value="Laptopcomputer">Laptop & Computer</option>
            <option value="Trend">Trend</option>
            <option value="Slide">Slide</option>
            <option value="Top20">Top20</option>
          <?php }?>
          <?php if($product[0]['loaiSanPham'] == 'Totnhat'){ ?>
            <option value="Uudai">Ưu đãi</option>
            <option value="Khonguudai">Không Ưu Đãi</option>
            <option value="Giamgiacuoituan">Giảm Giá Cuối Tuần</option>
            <option value="Phobien">Phổ Biến</option>
            <option value="Totnhat" selected="selected">Tốt Nhất</option>
            <option value="Noibatmoi">Nổi Bật - Mới</option>
            <option value="Audiovideo">Audio & Video</option>
            <option value="Laptopcomputer">Laptop & Computer</option>
            <option value="Trend">Trend</option>
            <option value="Slide">Slide</option>
            <option value="Top20">Top20</option>
          <?php }?>
          <?php if($product[0]['loaiSanPham'] == 'Noibatmoi'){ ?>
            <option value="Uudai">Ưu đãi</option>
            <option value="Khonguudai">Không Ưu Đãi</option>
            <option value="Giamgiacuoituan">Giảm Giá Cuối Tuần</option>
            <option value="Phobien">Phổ Biến</option>
            <option value="Totnhat">Tốt Nhất</option>
            <option value="Noibatmoi" selected="selected">Nổi Bật - Mới</option>
            <option value="Audiovideo">Audio & Video</option>
            <option value="Laptopcomputer">Laptop & Computer</option>
            <option value="Trend">Trend</option>
            <option value="Slide">Slide</option>
            <option value="Top20">Top20</option>
          <?php }?>
          <?php if($product[0]['loaiSanPham'] == 'Audiovideo'){ ?>
            <option value="Uudai">Ưu đãi</option>
            <option value="Khonguudai">Không Ưu Đãi</option>
            <option value="Giamgiacuoituan" >Giảm Giá Cuối Tuần</option>
            <option value="Phobien">Phổ Biến</option>
            <option value="Totnhat">Tốt Nhất</option>
            <option value="Noibatmoi">Nổi Bật - Mới</option>
            <option value="Audiovideo" selected="selected">Audio & Video</option>
            <option value="Laptopcomputer">Laptop & Computer</option>
            <option value="Trend">Trend</option>
            <option value="Slide">Slide</option>
            <option value="Top20">Top20</option>
          <?php }?>
          <?php if($product[0]['loaiSanPham'] == 'Laptopcomputer'){ ?>
            <option value="Uudai">Ưu đãi</option>
            <option value="Khonguudai">Không Ưu Đãi</option>
            <option value="Giamgiacuoituan">Giảm Giá Cuối Tuần</option>
            <option value="Phobien">Phổ Biến</option>
            <option value="Totnhat">Tốt Nhất</option>
            <option value="Noibatmoi">Nổi Bật - Mới</option>
            <option value="Audiovideo">Audio & Video</option>
            <option value="Laptopcomputer" selected="selected">Laptop & Computer</option>
            <option value="Trend">Trend</option>
            <option value="Slide">Slide</option>
            <option value="Top20">Top20</option>
          <?php }?>
          <?php if($product[0]['loaiSanPham'] == 'Trend'){ ?>
            <option value="Uudai">Ưu đãi</option>
            <option value="Khonguudai">Không Ưu Đãi</option>
            <option value="Giamgiacuoituan" >Giảm Giá Cuối Tuần</option>
            <option value="Phobien">Phổ Biến</option>
            <option value="Totnhat">Tốt Nhất</option>
            <option value="Noibatmoi">Nổi Bật - Mới</option>
            <option value="Audiovideo">Audio & Video</option>
            <option value="Laptopcomputer">Laptop & Computer</option>
            <option value="Trend" selected="selected">Trend</option>
            <option value="Slide">Slide</option>
            <option value="Top20">Top20</option>
          <?php }?>
          <?php if($product[0]['loaiSanPham'] == 'Slide'){ ?>
            <option value="Uudai">Ưu đãi</option>
            <option value="Khonguudai">Không Ưu Đãi</option>
            <option value="Giamgiacuoituan" >Giảm Giá Cuối Tuần</option>
            <option value="Phobien">Phổ Biến</option>
            <option value="Totnhat">Tốt Nhất</option>
            <option value="Noibatmoi">Nổi Bật - Mới</option>
            <option value="Audiovideo">Audio & Video</option>
            <option value="Laptopcomputer">Laptop & Computer</option>
            <option value="Trend">Trend</option>
            <option value="Slide" selected="selected">Slide</option>
            <option value="Top20">Top20</option>
          <?php }?>
          <?php if($product[0]['loaiSanPham'] == 'Top20'){ ?>
            <option value="Uudai">Ưu đãi</option>
            <option value="Khonguudai">Không Ưu Đãi</option>
            <option value="Giamgiacuoituan">Giảm Giá Cuối Tuần</option>
            <option value="Phobien">Phổ Biến</option>
            <option value="Totnhat">Tốt Nhất</option>
            <option value="Noibatmoi">Nổi Bật - Mới</option>
            <option value="Audiovideo">Audio & Video</option>
            <option value="Laptopcomputer">Laptop & Computer</option>
            <option value="Trend">Trend</option>
            <option value="Slide">Slide</option>
            <option value="Top20" selected="selected">Top20</option>
          <?php }?>
        </select>
      </div>
      <button class="btn btn-primary">
          Sửa Sản Phẩm
      </button>
    </form>
</div>
<?php require(__DIR__.'/layouts/footer.php'); ?>
