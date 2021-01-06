<?php
	include "../sol_menu.php";
	require "../class/user_class.php";
?>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		if($_GET['uid']) {
			$usrModel = new User;
			$result = $usrModel->deleteUser($_GET['uid']);
			if($result == 1) {
				header("location:user.php");
			} else {
				header("location:user.php");
			}
		} else {
			header("location:user.php");
		}
	} else {
		header("location:../index.php");
	}
?>