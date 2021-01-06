<?php
class Category {
	
	function getAllCategory() {
		include "../baglan/baglan.php";
		$sql = "SELECT * FROM category WHERE remove = 1";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getAllLevelZeroCategory() {
		include "../baglan/baglan.php";
		$sql = "SELECT * FROM category WHERE remove = 1 AND level = 0";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getSubCategoryByCategoryId($id) {
		include "../baglan/baglan.php";
		$sql = "SELECT * FROM category WHERE remove = 1 AND level = $id";
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
	
	function getCategoryById($id) {
		include "../baglan/baglan.php";
		/*sql sorguları içerisinde yazı her zaman tek tırnak ile başlar. Bu yüzden aşağıdaki sorguda eşittirden sonra tek tırnak kullanıyoruz.*/
		$sql = "SELECT * FROM category WHERE category_id='".$id."'";
		$result = $conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
	
	function categoryUpdate($data,$file) {
		include "../baglan/baglan.php";
		if($file['edtCategoryImage']['name'] != "") {
			$sql = "UPDATE category SET title='".$data['edtCategoryTitle']."',description='".$data['edtCategoryDescription']."',image='img/category/".$file['edtCategoryImage']['name']."',level='".$data['categoryName']."' WHERE category_id='".$data['edtCategoryId']."'";
		} else {
			$sql = "UPDATE category SET title='".$data['edtCategoryTitle']."',description='".$data['edtCategoryDescription']."',level='".$data['categoryName']."' WHERE category_id='".$data['edtCategoryId']."'";	
		}
		$result = $conn->query($sql);
		return $result;
	}
	
	function deleteCategory($id) {
		include "../baglan/baglan.php";
		$sql = "UPDATE category SET remove=0 WHERE category_id='".$id."'";
		$result = $conn->query($sql);
		return $result;
	}
	
	function insertCategory($data,$file) {
		/*insert kayıt eklemek için çalışıyor.*/
		include "../baglan/baglan.php";
		$sql = "INSERT INTO category(title, description,image,level) VALUES ('".$data['addTitle']."','".$data['addDescription']."','img/category/".$file['addImage']['name']."','".$data['categoryName']."')";
		$result = $conn->query($sql);
		return $result;
	}
	
	function categoryActive($id,$getActive) {
		include "../baglan/baglan.php";
		$sql = "UPDATE category SET active=".$getActive." WHERE category_id='".$id."'";
		$result = $conn->query($sql);
		return $result;
	}
}
?>