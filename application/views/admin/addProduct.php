<?php require(__DIR__.'/layouts/header.php'); ?>
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thêm sản phẩm</h1>
    <p class="mb-4">Thêm sản phẩm mới vào trong Cơ sở dữ liệu.</p>
    <?php if(isset($mess)){ ?>
            <div class="text-center">
                <span style="font-weight: bold; color: red; font-size: 20px;" class="small"><?php echo $mess; ?></span>
            </div>
      <?php }?>
    <form method="POST" action="<?php echo base_url('admin/actionAddProduct'); ?>" enctype="multipart/form-data">
      <div class="form-group">
        <label for="exampleFormControlInput1">Tên Sản Phẩm</label>
        <input type="text" class="form-control tenSanPham" id="exampleFormControlInput1" name="tenSanPham" placeholder="Nhập tên sản phẩm..." required> 
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Giá Gốc</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="giaGoc" placeholder="Nhập giá gốc, VD: 16500.000" required> 
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Giá Bán</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="giaBan" placeholder="Nhập giá bán, VD: 14500.000" required> 
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Mô Tả</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="moTa"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1"><span>Đường Dẫn </span> || <span class="auto-url" style="color: blue; cursor: pointer;"> Tạo Đường Dẫn Tự Động</span></label>
        <input type="text" class="form-control duongDan" id="exampleFormControlInput1" name="duongDan" placeholder="Nhập giá đường dẫn, VD: duong-dan-san-pham" required> 
      </div>
      <div class="form-group">
        <label for="exampleFormControlInput1">Số Lượng</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="soLuong" placeholder="Nhập số lượng..." required> 
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Ảnh Chính</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="anhChinh">
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Ảnh Phụ 1</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="anhPhu1">
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Ảnh Phụ 2</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="anhPhu2">
      </div>

      <div class="form-group">  
        <label for="exampleFormControlSelect1">Chuyên Mục</label>
        <select class="form-control" id="exampleFormControlSelect1" name="chuyenMucId">
          <option value="1">Laptop</option>
          <option value="2">Máy Tính</option>
          <option value="3">Linh Kiện</option>
        </select>
      </div>

      <div class="form-group">
        <label for="exampleFormControlSelect1">Loại Sản Phẩm</label>
        <select class="form-control" id="exampleFormControlSelect1" name="loaiSanPham">
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
          <option value="Top20">Top20</option>
        </select> 
      </div>
      <button class="btn btn-primary">
          Thêm Sản Phẩm
      </button>
    </form>
</div>
<?php require(__DIR__.'/layouts/footer.php'); ?>
