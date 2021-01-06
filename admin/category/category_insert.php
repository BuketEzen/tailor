<script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>
<?php
	include "../sol_menu.php";
	require "../class/category_class.php";
?>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		if($_POST) {
			$ctgModel = new Category;
			$result = $ctgModel->insertCategory($_POST,$_FILES);
			if($result == 1) {
				$dizin = "../../img/category/";
				$yuklenecek_dosya = $dizin.basename($_FILES['addImage']['name']);
				move_uploaded_file($_FILES['addImage']['tmp_name'], $yuklenecek_dosya);
				header("location:category.php");
			} else {
				echo "Hatalı İşlem. Tekrar deneyiniz!";
			}
		}
	} else {
		header("location:../index.php");
	}
?>
<form method="post" action="" enctype="multipart/form-data">
	<input type="text" name="addTitle" placeholder="Başlık" /><br><br>
	<textarea id="editor" name="addDescription" placeholder="Yazı Alanı"></textarea><br><br>
	<input type="file" name="addImage" /><br><br>
	<select name="categoryName">
		<option value="0">Ana Kategori</option>
		<?php 
			$ctgModel = new Category;
			$result2 = $ctgModel->getAllLevelZeroCategory(); 
			foreach($result2 as $key => $value) {
		?>
		<option value="<?php echo $value['category_id'] ?>"><?php echo $value['title'] ?></option>
		<?php
			}
		?>
	</select><br><br>
	<input type="submit" value="Kayıt" />
</form>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>