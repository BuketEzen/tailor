<?php
	include "../sol_menu.php";
	require "../class/slider_class.php";
?>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		if($_GET['sid']) {
			$sldrModel = new Slider;
			$result = $sldrModel->deleteSlider($_GET['sid']);
			if($result == 1) {
				header("location:slider.php");
			} else {
				header("location:slider.php");
			}
		} else {
			header("location:slider.php");
		}
	} else {
		header("location:../index.php");
	}
?>