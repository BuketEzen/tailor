<?php
	include "../sol_menu.php";
	require "../class/user_class.php";
?>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		if(isset($_GET['uid'])) {
			$usrModel = new User;
			if($_POST) {
				/*sayfada data gönderim işlemi var ise burası çalışır.*/
				$result = $usrModel->userUpdate($_POST);
				if($result == 1) {
					header("location:user.php");
				} else {
					echo "Kayıt Güncellenirken Hata Oluştu";
				}
			} else {
				/*sayfada sadece data gösterimi varsa burası çalışır.*/		
				$result = $usrModel->getUserById($_GET['uid']);
				$username = $result['username'];
				$password = $result['password'];
				$userId = $result['user_id'];
			}
		} else {
			header("location:user.php");
		}
	} else {
		header("location:../index.php");
	}
?>
<form method="post" action="">
	<input type="text" name="edtUserName" value="<?php echo $username ?>" />
	<input type="text" name="edtPassword" value="<?php echo $password ?>" />
	<input type="hidden" name="edtUserId" value="<?php echo $userId ?>" />
	<input type="submit" value="Güncelle" />
</form>