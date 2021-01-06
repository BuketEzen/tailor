<?php
include "header.php";
$mdlProduct = new Product;
if(isset($_POST['prdid'])) {
	$result = $mdlProduct->getProductById($_POST['prdid']);
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_POST['prdid'], $item_array_id))
		{
		$count = count($_SESSION["shopping_cart"]);
		$item_array = array(
		'item_id'		=>	$_POST['prdid'],
		'item_name'		=>	$result["title"],
		'item_price'		=>	$result["price"],
		'item_quantity'		=>	1
		);
		$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
		echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
		'item_id'		=>	$_POST['prdid'],
		'item_name'		=>	$result["title"],
		'item_price'		=>	$result["price"],
		'item_quantity'		=>	1
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}
 
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
		if($values["item_id"] == $_GET["id"])
		{
		unset($_SESSION["shopping_cart"][$keys]);
		echo '<script>alert("Item Removed")</script>';
		echo '<script>window.location="index.php"</script>';
		}
		}
	}
}
 
?>
<!DOCTYPE html>
<main>
		<div class="container">
		<div style="clear:both"></div>
		<br />
		<h3>Sepet Detayları</h3>
		<div class="table-responsive">
		<table class="table table-bordered">
		<tr>
		<th width="40%">Ürün Adı</th>
		<th width="10%">Adet</th>
		<th width="20%">Fiyat</th>
		<th width="15%">Ücret</th>
		<th width="5%">Detay</th>
		</tr>
		<?php
		if(!empty($_SESSION["shopping_cart"]))
		{
		$total = 0;
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
		?>
		<tr>
		<td><?php echo $values["item_name"]; ?></td>
		<td><?php echo $values["item_quantity"]; ?></td>
		<td><?php echo $values["item_price"]; ?> TL</td>
		<td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?> TL</td>
		<td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Sil</span></a></td>
		</tr>
		<?php
		$total = $total + ($values["item_quantity"] * $values["item_price"]);
		}
		?>
		<tr>
		<td colspan="3" align="right">Toplam</td>
		<td align="right"><?php echo number_format($total, 2); ?> TL</td>
		<td></td>
		</tr>
		<?php
		}
		?>
		
		</table>
		</div>
		</div>
</main>
<?php
	include "footer.php";
?>