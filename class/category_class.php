<?php
class Category {
	
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
	
	function getSubCategoryByLevelId($id) {
		include "./baglan/baglan.php";
		$sql = "SELECT * FROM category WHERE level='".$id."'";
		$result = $conn->query($sql);
		return $result;
	}
}
?>