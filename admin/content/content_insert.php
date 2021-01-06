<script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>
<?php
	include "../sol_menu.php";
	require "../class/content_class.php";
?>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		if($_POST) {
			$cntModel = new Content;
			$result = $cntModel->insertContent($_POST,$_FILES);
			if($result == 1) {
				$dizin = "../../img/";
				$yuklenecek_dosya = $dizin.basename($_FILES['addImage']['name']);
				move_uploaded_file($_FILES['addImage']['tmp_name'], $yuklenecek_dosya);
				header("location:content.php");
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
	<input type="submit" value="Kayıt" />
</form>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>