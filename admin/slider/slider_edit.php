<?php
	include "../sol_menu.php";
	require "../class/slider_class.php";
?>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		if(isset($_GET['sid'])) {
			$sldrModel = new Slider;
			if($_POST) {
				/*sayfada data gönderim işlemi var ise burası çalışır.*/
				$result = $sldrModel->sliderUpdate($_POST,$_FILES);
				if($result == 1) {
					$dizin = "../../img/slider/";
					$yuklenecek_dosya = $dizin.basename($_FILES['edtSliderImage']['name']);
					move_uploaded_file($_FILES['edtSliderImage']['tmp_name'], $yuklenecek_dosya);
					header("location:slider.php");
				} else {
					echo "Kayıt Güncellenirken Hata Oluştu";
				}
			} else {
				/*sayfada sadece data gösterimi varsa burası çalışır.*/		
				$result = $sldrModel->getSliderById($_GET['sid']);
				$title = $result['title'];
				$image = $result['image'];
				$sldrId = $result['slider_id'];
			}
		} else {
			header("location:slider.php");
		}
	} else {
		header("location:../index.php");
	}
?>
<form method="post" action="" enctype="multipart/form-data">
	<input type="text" name="edtSliderTitle" value="<?php echo $title ?>" /><br><br>
	<img src="../../<?php echo $image; ?>" alt="" height="100" /><br><br>
	<input type="file" name="edtSliderImage" /><br><br>
	<input type="hidden" name="edtSliderId" value="<?php echo $sldrId ?>" />
	<input type="submit" value="Güncelle" />
</form>