<?php
class Product {
	
	function getAllProduct() {
		include "../baglan/baglan.php";
		$sql = "SELECT * FROM product WHERE remove = 1";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getAllLevelZeroCategory() {
		include "../baglan/baglan.php";
		$sql = "SELECT * FROM category WHERE remove = 1 AND level = 0";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getCategoryNameByLevel($id) {
		include "../baglan/baglan.php";
		/*sql sorguları içerisinde yazı her zaman tek tırnak ile başlar. Bu yüzden aşağıdaki sorguda eşittirden sonra tek tırnak kullanıyoruz.*/
		$sql = "SELECT title FROM category WHERE category_id='".$id."'";
		$result = $conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
	
	function getProductById($id) {
		include "../baglan/baglan.php";
		/*sql sorguları içerisinde yazı her zaman tek tırnak ile başlar. Bu yüzden aşağıdaki sorguda eşittirden sonra tek tırnak kullanıyoruz.*/
		$sql = "SELECT * FROM product WHERE product_id='".$id."'";
		$result = $conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
	
	function productUpdate($data,$file) {
		include "../baglan/baglan.php";
		$sql = "";
		if($file['edtProductImage']['name'] != "") {
			$sql .= "UPDATE product SET title='".$data['addTitle']."',image='img/product/".$file['edtProductImage']['name']."',price='".$data['addPrice']."',vat='".$data['addVat']."',level='".$data['categoryName']."',brand='".$data['addBrand']."',color='".$data['addColor']."',size='".$data['addSize']."',description='".$data['addDescription']."',sale_choose='".$data['addSaleChoose']."',return_condition='".$data['addReturnCondition']."',delivery='".$data['addDelivery']."',";
			if(isset($data['edtNewItem'])) { $sql .= "new_item=1,"; } else {$sql .= "new_item=0,";}
			if(isset($data['edtSaleItem'])) { $sql .= "sale_item=1,"; } else {$sql .= "sale_item=0,";}
			if(isset($data['edtCargo'])) { $sql .= "cargo=1,"; } else {$sql .= "cargo=0,";}
			if(isset($data['edtHaveSale'])) { $sql .= "have_sale=1,"; } else {$sql .= "have_sale=0,";}
			$sql .= "sale_price='".$data['addSalePrice']."',stock='".$data['addStock']."' WHERE product_id='".$data['edtProductId']."'";
		} else {
			$sql .= "UPDATE product SET title='".$data['addTitle']."',price='".$data['addPrice']."',vat='".$data['addVat']."',level='".$data['categoryName']."',brand='".$data['addBrand']."',color='".$data['addColor']."',size='".$data['addSize']."',description='".$data['addDescription']."',sale_choose='".$data['addSaleChoose']."',return_condition='".$data['addReturnCondition']."',delivery='".$data['addDelivery']."',";
			if(isset($data['edtNewItem'])) { $sql .= "new_item=1,"; } else {$sql .= "new_item=0,";}
			if(isset($data['edtSaleItem'])) { $sql .= "sale_item=1,"; } else {$sql .= "sale_item=0,";}
			if(isset($data['edtCargo'])) { $sql .= "cargo=1,"; } else {$sql .= "cargo=0,";}
			if(isset($data['edtHaveSale'])) { $sql .= "have_sale=1,"; } else {$sql .= "have_sale=0,";}
			$sql .= "sale_price='".$data['addSalePrice']."',stock='".$data['addStock']."' WHERE product_id='".$data['edtProductId']."'";
		}
		$result = $conn->query($sql);
		return $result;
	}
	
	function deleteProduct($id) {
		include "../baglan/baglan.php";
		$sql = "UPDATE product SET remove=0 WHERE product_id='".$id."'";
		$result = $conn->query($sql);
		return $result;
	}
	
	function insertProduct($data,$file) {
		/*insert kayıt eklemek için çalışıyor.*/
		include "../baglan/baglan.php";
		$sql = "INSERT INTO product(title, image, price, vat, level, brand, color, size, description, sale_choose, return_condition, delivery, sale_price, stock) VALUES ('".$data['addTitle']."','img/product/".$file['addImage']['name']."','".$data['addPrice']."','".$data['addVat']."','".$data['categoryName']."','".$data['addBrand']."','".$data['addColor']."','".$data['addSize']."','".$data['addDescription']."','".$data['addSaleChoose']."','".$data['addReturnCondition']."','".$data['addDelivery']."','".$data['addSalePrice']."','".$data['addStock']."')";
		$result = $conn->query($sql);
		return $result;
	}
	
	function productActive($id,$getActive) {
		include "../baglan/baglan.php";
		$sql = "UPDATE product SET active=".$getActive." WHERE product_id='".$id."'";
		$result = $conn->query($sql);
		return $result;
	}
}
?>