<?php
session_start();
require "class/user_class.php";
if($_POST) {
	$usrModel = new User;
	$result = $usrModel->getUser($_POST);
	if($result->num_rows > 0) {
		$_SESSION['girisyapildi'] = 1;
		header("location:main.php");
	} else {
		session_destroy();
		echo "Kullanıcı Adı ya da Şifre Hatalı!";
	}
}
?>
<form method="post" action="">
	<input type="text" name="username" placeholder="Kullanıcı Adınız" />
	<input type="password" name="password" placeholder="Şifreniz" />
	<input type="submit" value="Giriş Yap" />
</form>