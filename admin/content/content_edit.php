<script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>
<?php
	include "../sol_menu.php";
	require "../class/content_class.php";
?>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		if(isset($_GET['cid'])) {
			$cntModel = new Content;
			if($_POST) {
				/*sayfada data gönderim işlemi var ise burası çalışır.*/
				$result = $cntModel->contentUpdate($_POST,$_FILES);
				if($result == 1) {
					$dizin = "../../img/";
					$yuklenecek_dosya = $dizin.basename($_FILES['edtContentImage']['name']);
					move_uploaded_file($_FILES['edtContentImage']['tmp_name'], $yuklenecek_dosya);
					header("location:content.php");
				} else {
					echo "Kayıt Güncellenirken Hata Oluştu";
				}
			} else {
				/*sayfada sadece data gösterimi varsa burası çalışır.*/		
				$result = $cntModel->getContentById($_GET['cid']);
				$title = $result['title'];
				$description = $result['description'];
				$image = $result['image'];
				$cntId = $result['content_id'];
			}
		} else {
			header("location:content.php");
		}
	} else {
		header("location:../index.php");
	}
?>
<form method="post" action="" enctype="multipart/form-data">
	<input type="text" name="edtContentTitle" value="<?php echo $title ?>" /><br><br>
	<textarea id="editor" name="edtContentDescription" cols="50" rows="10"><?php echo $description; ?> </textarea><br><br>
	<img src="../../<?php echo $image; ?>" alt="" height="100" /><br><br>
	<input type="file" name="edtContentImage" /><br><br>
	<input type="hidden" name="edtContentId" value="<?php echo $cntId ?>" />
	<input type="submit" value="Güncelle" />
</form>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>