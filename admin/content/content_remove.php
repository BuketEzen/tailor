<?php
	include "../sol_menu.php";
	require "../class/content_class.php";
?>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		if($_GET['cid']) {
			$cntModel = new Content;
			$result = $cntModel->deleteContent($_GET['cid']);
			if($result == 1) {
				header("location:content.php");
			} else {
				header("location:content.php");
			}
		} else {
			header("location:content.php");
		}
	} else {
		header("location:../index.php");
	}
?>