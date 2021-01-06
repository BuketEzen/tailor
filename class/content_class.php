<?php
class Content {
	
	function getAllContent() {
		include "./baglan/baglan.php";
		$sql = "SELECT * FROM content WHERE remove = 1";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getContentById($id) {
		include "./baglan/baglan.php";
		/*sql sorguları içerisinde yazı her zaman tek tırnak ile başlar. Bu yüzden aşağıdaki sorguda eşittirden sonra tek tırnak kullanıyoruz.*/
		$sql = "SELECT * FROM content WHERE content_id='".$id."'";
		$result = $conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
}
?>