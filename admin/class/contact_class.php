<?php
class Contact {
	
	function getAllContact() {
		include "../baglan/baglan.php";
		$sql = "SELECT * FROM contact";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getAllContactForm() {
		include "../baglan/baglan.php";
		$sql = "SELECT * FROM contactform";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getContentById($id) {
		include "../baglan/baglan.php";
		/*sql sorguları içerisinde yazı her zaman tek tırnak ile başlar. Bu yüzden aşağıdaki sorguda eşittirden sonra tek tırnak kullanıyoruz.*/
		$sql = "SELECT * FROM content WHERE content_id='".$id."'";
		$result = $conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
	
	function contentUpdate($data,$file) {
		include "../baglan/baglan.php";
		/*sql sorguları içerisinde yazı her zaman tek tırnak ile başlar. Bu yüzden aşağıdaki sorguda eşittirden sonra tek tırnak kullanıyoruz.*/
		$sql = "UPDATE content SET title='".$data['edtContentTitle']."',description='".$data['edtContentDescription']."' WHERE content_id='".$data['edtContentId']."'";	
		$result = $conn->query($sql);
		return $result;
	}
}
?>