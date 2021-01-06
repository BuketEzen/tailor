<?php
	include "../sol_menu.php";
	require "../class/content_class.php";
?>
<div style="float:left; width: 80%;">
<div style="float:right;">
	<a href="content_insert.php">İçerik Ekle</a>
</div>
<table>
<tr>
	<td>Başlık</td>
	<td>Yazı</td>
	<td>Resim</td>
	<td>Düzenle</td>
	<td>Sil</td>
</tr>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		$cntModel = new Content;
		$result = $cntModel->getAllContent();
		foreach($result as $key => $value) { ?>
			<tr>
				<td><?php echo $value['title'] ?></td>
				<td><?php echo substr($value['description'],0,200) ?></td>
				<td><img src="../../<?php echo $value['image'] ?>" height="100" /></td>
				<td><a href="content_edit.php?cid=<?php echo $value['content_id'] ?>">Düzenle</a></td>
				<td><a href="content_remove.php?cid=<?php echo $value['content_id'] ?>">Sil</a></td>
			</tr>
		<?php }
	} else {
		header("location:index.php");
	}
	/*
		Ödev
		content_edit kısmını tamamlayın.
	*/
?>
</table>
</div>