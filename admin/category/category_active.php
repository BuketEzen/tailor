<?php
	include "../sol_menu.php";
	require "../class/category_class.php";
?>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		if($_GET['ctgid']) {
			$ctgModel = new Category;
			$result = $ctgModel->getCategoryById($_GET['ctgid']);
			if($result['active'] == 1) {
				$sendActive = 0;
			} else {
				$sendActive = 1;
			}
			$result2 = $ctgModel->categoryActive($_GET['ctgid'],$sendActive);
			if($result2 == 1) {
				header("location:category.php");
			} else {
				header("location:category.php");
			}
		} else {
			header("location:category.php");
		}
	} else {
		header("location:../index.php");
	}
?>