<?php
	include "../sol_menu.php";
	require "../class/slider_class.php";
?>
<div style="float:left; width: 80%;">
<div style="float:right;">
	<a href="slider_insert.php">Slider Ekle</a>
</div>
<table>
<tr>
	<td>Başlık</td>
	<td>Resim</td>
	<td>Düzenle</td>
	<td>Sil</td>
</tr>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		$sldrModel = new Slider;
		$result = $sldrModel->getAllSlider();
		foreach($result as $key => $value) { ?>
			<tr>
				<td><?php echo $value['title'] ?></td>
				<td><img src="../../<?php echo $value['image'] ?>" height="100" /></td>
				<td><a href="slider_edit.php?sid=<?php echo $value['slider_id'] ?>">Düzenle</a></td>
				<td><a href="slider_remove.php?sid=<?php echo $value['slider_id'] ?>">Sil</a></td>
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