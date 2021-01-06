<?php
	include "../sol_menu.php";
	require "../class/user_class.php";
?>
<div style="float:left; width: 80%;">
<div style="float:right;">
	<a href="user_insert.php">Kullanıcı Ekle</a>
</div>
<table>
<tr>
	<td>Kullanıcı Adı</td>
	<td>Şifre</td>
	<td>Düzenle</td>
	<td>Sil</td>
	<td>Aktif/Pasif</td>
</tr>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		$usrModel = new User;
		$result = $usrModel->getAllUser();
		foreach($result as $key => $value) { ?>
			<tr>
				<td><?php echo $value['username'] ?></td>
				<td><?php echo $value['password'] ?></td>
				<td><a href="user_edit.php?uid=<?php echo $value['user_id'] ?>">Düzenle</a></td>
				<td><a href="user_remove.php?uid=<?php echo $value['user_id'] ?>">Sil</a></td>
				<td><a href="user_active.php?uid=<?php echo $value['user_id'] ?>">
				<?php if($value['active'] == 1) { ?>
					Pasif Et
				<?php } else { ?>
					Aktif Et
				<?php } ?>
				</a></td>
			</tr>
		<?php }
	} else {
		header("location:index.php");
	}
?>
</table>
</div>