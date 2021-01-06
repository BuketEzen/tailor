<?php
	include "../sol_menu.php";
	require "../class/category_class.php";
	require "../class/product_class.php";
?>
<div style="float:left; width: 80%;">
<div style="float:right;">
	<a href="product_insert.php">Ürün Ekle</a>
</div>
<table border="1">
<tr>
	<td>Başlık</td>
	<td>Resim</td>
	<td>Fiyat</td>
	<td>KDV</td>
	<td>Kategori</td>
	<td>Marka</td>
	<td>Renk</td>
	<td>Beden</td>
	<td>Yeni Ürün</td>
	<td>İndirimli Ürün</td>
	<td>İndirimli Fiyat</td>
	<td>Kargo</td>
	<td>Taksit</td>
	<td>Stock</td>
	<td>Düzenle</td>
	<td>Sil</td>
	<td>Aktif/Pasif</td>
</tr>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		$ctgModel = new Category;
		$prdModel = new Product;
		$result = $prdModel->getAllProduct();
		foreach($result as $key => $value) { ?>
			<tr align="center">
				<td><?php echo $value['title'] ?></td>
				<td><img src="../../<?php echo $value['image'] ?>" alt="<?php echo $value['title'] ?>" height="50" /></td>
				<td><?php echo number_format($value['price'], 2, ',', '.') ?></td>
				<td>%<?php echo $value['vat'] ?></td>
				<?php $result2 = $ctgModel->getCategoryNameByLevel($value['level']); ?>
				<td><?php echo $result2['title'] ?></td>
				<td><?php echo $value['brand'] ?></td>
				<td><?php echo $value['color'] ?></td>
				<td><?php echo $value['size'] ?></td>
				<?php if($value['new_item'] == 1) { ?>
				<td>Evet</td>
				<?php } else { ?>
				<td>Hayır</td>
				<?php } ?>
				<?php if($value['sale_item'] == 1) { ?>
				<td>Evet</td>
				<?php } else { ?>
				<td>Hayır</td>
				<?php } ?>
				<td><?php echo $value['sale_price'] ?></td>
				<?php if($value['cargo'] == 1) { ?>
				<td>Evet</td>
				<?php } else { ?>
				<td>Hayır</td>
				<?php } ?>
				<?php if($value['have_sale'] == 1) { ?>
				<td>Evet</td>
				<?php } else { ?>
				<td>Hayır</td>
				<?php } ?>
				<td><?php echo $value['stock'] ?></td>				
				<td><a href="product_edit.php?prdid=<?php echo $value['product_id'] ?>">Düzenle</a></td>
				<td><a href="product_remove.php?prdid=<?php echo $value['product_id'] ?>">Sil</a></td>
				<?php if($value['active'] == 1) { ?>
				<td><a href="product_active.php?prdid=<?php echo $value['product_id'] ?>">Pasif Et</a></td>
				<?php } else { ?>
				<td><a href="product_active.php?prdid=<?php echo $value['product_id'] ?>">Aktif Et</a></td>
				<?php } ?>
			</tr>
		<?php }
	} else {
		header("location:index.php");
	}
?>
</table>
</div>