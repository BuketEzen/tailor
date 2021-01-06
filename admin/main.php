<?php
	include "sol_menu.php";
?>
<div style="float:left; width: 80%;">
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		echo "Panele Hoşgeldiniz";
	} else {
		header("location:index.php");
	}
?>
</div>