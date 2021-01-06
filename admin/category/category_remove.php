<?php
	include "../sol_menu.php";
	require "../class/category_class.php";
?>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		if($_GET['ctgid']) {
			$ctgModel = new Category;
			$result = $ctgModel->deleteCategory($_GET['ctgid']);
			if($result == 1) {
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