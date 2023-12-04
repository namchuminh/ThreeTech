<?php require(__DIR__.'/layouts/header.php'); ?>

<form  method="POST" enctype="multipart/form-data">
	<div style="margin: 10px;" class="row">
		<div class="col-md-4">
			<input type="text" class="form-control tieuDe" placeholder="Tiêu đề bài viết" name="tieuDe" value="<?php echo $news[0]['tieuDe']; ?>">
		</div>
		<div class="col-md-3" style="display: flex;">
			<input type="text" class="form-control duongDan" placeholder="Đường dẫn bài viết" style="margin-right: 5px;" name="duongDan" value="<?php echo $news[0]['duongDan']; ?>">
			<a class="btn btn-info slug">Tạo</a>
		</div>
		<div class="col-md-4" style="display: flex; padding-top: 5px;">
			<span style="margin-top: 5px; margin-right: 10px;">Ảnh Chính: </span>
			<input type="file" id="formFile" name="anhChinh">
		</div>
		<div class="col-md-1 text-right">
			<button class="btn btn-primary submit" type="submit">Cập Nhật</button>
		</div>
	</div>
	<textarea name="noiDung" id="editor" class="noiDung"><?php echo $news[0]["noiDung"]; ?></textarea>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.20.0/full/ckeditor.js"></script>
<script>

	CKEDITOR.replace('editor');
	CKEDITOR.config.width = '100%'; 
	CKEDITOR.config.height = 650;

	function to_slug(str){
	    // Chuyển hết sang chữ thường
	    str = str.toLowerCase();     
	 
	    // xóa dấu
	    str = str.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
	    str = str.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
	    str = str.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
	    str = str.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
	    str = str.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
	    str = str.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
	    str = str.replace(/(đ)/g, 'd');
	 
	    // Xóa ký tự đặc biệt
	    str = str.replace(/([^0-9a-z-\s])/g, '');
	 
	    // Xóa khoảng trắng thay bằng ký tự -
	    str = str.replace(/(\s+)/g, '-');
	 
	    // xóa phần dự - ở đầu
	    str = str.replace(/^-+/g, '');
	 
	    // xóa phần dư - ở cuối
	    str = str.replace(/-+$/g, '');
	 
	    // return
	    return str;
	}


	$(document).ready(function() {
		$('.submit').click(function(event) {
			var tieuDe = $('.tieuDe').val()
			var duongDan = $('.duongDan').val()

			if(tieuDe == ""){
				event.preventDefault()
				alert("Vui lòng nhập tiêu đề!")
			}

			if(duongDan == ""){
				event.preventDefault()
				alert("Vui lòng nhập đường dẫn!")
			}
		});

		$('.slug').click(function(event) {
			var tieuDe = $('.tieuDe').val()
			if(tieuDe == ""){
				event.preventDefault()
				alert("Vui lòng nhập tiêu đề!")
			}else{
				var slug = to_slug(tieuDe)
				$('.duongDan').val(slug)
			}
		})
	});
</script>

<?php require(__DIR__.'/layouts/footer.php'); ?>