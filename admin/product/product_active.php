<?php
	include "../sol_menu.php";
	require "../class/product_class.php";
?>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		if($_GET['prdid']) {
			$prdModel = new Product;
			$result = $prdModel->getProductById($_GET['prdid']);
			if($result['active'] == 1) {
				$sendActive = 0;
			} else {
				$sendActive = 1;
			}
			$result2 = $prdModel->productActive($_GET['prdid'],$sendActive);
			if($result2 == 1) {
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