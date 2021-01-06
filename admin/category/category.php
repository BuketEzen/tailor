<?php
	include "../sol_menu.php";
	require "../class/category_class.php";
?>
<div style="float:left; width: 80%;">
<div style="float:right;">
	<a href="category_insert.php">Kategori Ekle</a>
</div>
<table>
<tr>
	<td>Başlık</td>
	<td>Yazı</td>
	<td>Resim</td>
	<td>Seviye</td>
	<td>Düzenle</td>
	<td>Sil</td>
	<td>Aktif/Pasif</td>
</tr>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		$ctgModel = new Category;
		$result = $ctgModel->getAllCategory();
		foreach($result as $key => $value) { ?>
			<tr>
				<td><?php echo $value['title'] ?></td>
				<td><?php echo substr($value['description'],0,200) ?></td>
				<td><img src="../../<?php echo $value['image'] ?>" height="100" /></td>
				<?php if($value['level'] == 0) { ?>
					<td>Ana Kategori</td>
				<?php } else { ?>
					<?php $result2 = $ctgModel->getCategoryNameByLevel($value['level']); ?>
					<td><?php echo $result2['title'] ?></td>
				<?php } ?>
				<td><a href="category_edit.php?ctgid=<?php echo $value['category_id'] ?>">Düzenle</a></td>
				<?php if($value['level'] != 0) { ?>
				<td><a href="category_remove.php?ctgid=<?php echo $value['category_id'] ?>">Sil</a></td>
				<td><a href="category_active.php?ctgid=<?php echo $value['category_id'] ?>">Aktif/Pasif</a></td>
				<?php } else { ?>
				<td></td>
				<td></td>
				<?php } ?>
			</tr>
		<?php }
	} else {
		header("location:index.php");
	}
?>
</table>
</div>