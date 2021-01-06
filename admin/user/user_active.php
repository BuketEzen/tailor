<?php
	include "../sol_menu.php";
	require "../class/user_class.php";
?>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		if(isset($_GET['uid'])) {
			$sendActive = 0;
			$usrModel = new User;
			$activeControl = $usrModel->getUserById($_GET['uid']);
			if($activeControl['active'] == 1) {				
				$sendActive = 0;
			} else {				
				$sendActive = 1;
			}
			$result = $usrModel->userActive($_GET['uid'],$sendActive);
			if($result == 1) {
				header("location:user.php");
			} else {
				echo "Kayıt Güncellenirken Hata Oluştu";
			}
		} else {
			header("location:user.php");
		}
	} else {
		header("location:../index.php");
	}
?>