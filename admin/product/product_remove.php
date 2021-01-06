<?php
	include "../sol_menu.php";
	require "../class/product_class.php";
?>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		if($_GET['prdid']) {
			$prdModel = new Product;
			$result = $prdModel->deleteProduct($_GET['prdid']);
			if($result == 1) {
				header("location:product.php");
			} else {
				header("location:product.php");
			}
		} else {
			header("location:product.php");
		}
	} else {
		header("location:../index.php");
	}
?>