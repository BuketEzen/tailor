<script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>
<?php
	include "../sol_menu.php";
	require "../class/category_class.php";
?>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		if(isset($_GET['ctgid'])) {
			$ctgModel = new Category;
			if($_POST) {
				/*sayfada data gönderim işlemi var ise burası çalışır.*/
				$result = $ctgModel->categoryUpdate($_POST,$_FILES);
				if($result == 1) {
					$dizin = "../../img/category/";
					$yuklenecek_dosya = $dizin.basename($_FILES['edtCategoryImage']['name']);
					move_uploaded_file($_FILES['edtCategoryImage']['tmp_name'], $yuklenecek_dosya);
					header("location:category.php");
				} else {
					echo "Kayıt Güncellenirken Hata Oluştu";
				}
			} else {
				/*sayfada sadece data gösterimi varsa burası çalışır.*/		
				$result = $ctgModel->getCategoryById($_GET['ctgid']);
				$title = $result['title'];
				$description = $result['description'];
				$image = $result['image'];
				$level = $result['level'];
				$cntId = $result['category_id'];
			}
		} else {
			header("location:category.php");
		}
	} else {
		header("location:../index.php");
	}
?>
<form method="post" action="" enctype="multipart/form-data">
	<input type="text" name="edtCategoryTitle" value="<?php echo $title ?>" /><br><br>
	<textarea id="editor" name="edtCategoryDescription" cols="50" rows="10"><?php echo $description; ?> </textarea><br><br>
	<img src="../../<?php echo $image; ?>" alt="" height="100" /><br><br>
	<input type="file" name="edtCategoryImage" /><br><br>
	<input type="hidden" name="edtCategoryId" value="<?php echo $cntId ?>" /><br><br>
	<select name="categoryName">
		<option value="0">Ana Kategori</option>
		<?php 
			$selected = "";
			$ctgModel = new Category;
			$result2 = $ctgModel->getAllLevelZeroCategory(); 
			foreach($result2 as $key => $value) {
				if($level == $value['category_id']) { $selected = "selected"; } else { $selected = ""; }
		?>
		<option <?php echo $selected; ?> value="<?php echo $value['category_id'] ?>"><?php echo $value['title'] ?></option>
		<?php
			}
		?>
	</select><br><br>
	<input type="submit" value="Güncelle" />
</form>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>