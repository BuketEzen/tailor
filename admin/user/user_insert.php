<?php
	include "../sol_menu.php";
	require "../class/user_class.php";
?>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		if($_POST) {
			$usrModel = new User;
			$result = $usrModel->insertUser($_POST);
			if($result == 1) {
				header("location:user.php");
			} else {
				echo "Hatalı İşlem. Tekrar deneyiniz!";
			}
		}
	} else {
		header("location:../index.php");
	}
?>
<form method="post" action="">
	<input type="text" name="addUserName" placeholder="Kullanıcı Adı" />
	<input type="text" name="addPassword" placeholder="Şifre" />
	<input type="submit" value="Kayıt" />
</form>