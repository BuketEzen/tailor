<?php
class Product {
	
	function getAllZeroLevelCategory() {
		include "./baglan/baglan.php";
		$sql = "SELECT * FROM category WHERE remove = 1 AND level = 0";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getAllNoneZeroLevelCategory() {
		include "./baglan/baglan.php";
		$sql = "SELECT * FROM category WHERE remove = 1 AND level <> 0 LIMIT 18";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getCategoryById($id) {
		include "./baglan/baglan.php";
		$sql = "SELECT * FROM category WHERE category_id='".$id."'";
		$result = $conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
	
	function getProductById($id) {
		include "./baglan/baglan.php";
		$sql = "SELECT * FROM product WHERE product_id='".$id."'";
		$result = $conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
	
	function getProductByLevelId($id) {
		include "./baglan/baglan.php";
		$sql = "SELECT * FROM product WHERE level='".$id."'";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getProductByLevelIdWithRandom($id) {
		include "./baglan/baglan.php";
		$sql = "SELECT * FROM product WHERE level='".$id."' ORDER BY RAND() LIMIT 4";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getNewProduct() {
		include "./baglan/baglan.php";
		$sql = "SELECT * FROM product WHERE new_item=1 ORDER BY RAND() LIMIT 4";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getProduct() {
		include "./baglan/baglan.php";
		$sql = "SELECT * FROM product WHERE remove=1 ORDER BY product_id";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getSaleProduct() {
		include "./baglan/baglan.php";
		$sql = "SELECT * FROM product WHERE sale_item=1 ORDER BY RAND() LIMIT 4";
		$result = $conn->query($sql);
		return $result;
	}
	
	function exampleSQL() {
		include "./baglan/baglan.php";
		$sql = "SELECT * FROM product WHERE product_id = 1 AND remove = 1";
		$result = $conn->query($sql);
		return $result;
	}
	
	function calculateVat($price,$vat) {
		$vatCalc = $price * ($vat / 100);
		$vatCalc = $price + $vatCalc;
		return $vatCalc;
	}
}
?>