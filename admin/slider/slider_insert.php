<?php
	include "../sol_menu.php";
	require "../class/slider_class.php";
?>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		if($_POST) {
			$sldrModel = new Slider;
			$result = $sldrModel->insertSlider($_POST,$_FILES);
			if($result == 1) {
				$dizin = "../../img/slider/";
				$yuklenecek_dosya = $dizin.basename($_FILES['addImage']['name']);
				move_uploaded_file($_FILES['addImage']['tmp_name'], $yuklenecek_dosya);
				header("location:slider.php");
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
	<input type="file" name="addImage" /><br><br>
	<input type="submit" value="Kayıt" />
</form>