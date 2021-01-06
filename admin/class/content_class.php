<?php
class Content {
	
	function getAllContent() {
		include "../baglan/baglan.php";
		$sql = "SELECT * FROM content WHERE remove = 1";
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
		if($file['edtContentImage']['name'] != "") {
			$sql = "UPDATE content SET title='".$data['edtContentTitle']."',description='".$data['edtContentDescription']."',image='img/".$file['edtContentImage']['name']."' WHERE content_id='".$data['edtContentId']."'";
		} else {
			$sql = "UPDATE content SET title='".$data['edtContentTitle']."',description='".$data['edtContentDescription']."' WHERE content_id='".$data['edtContentId']."'";	
		}
		$result = $conn->query($sql);
		return $result;
	}
	
	function deleteContent($id) {
		/*Delete Sorgusu Kaydı Tamamen Siler*/
		/*include "../baglan/baglan.php";
		$sql = "DELETE FROM user WHERE user_id = '".$id."'";
		$result = $conn->query($sql);
		return $result;*/
		/*Bu yapacağımız işlem veritabanında datayı tutmayı sağlar.*/
		include "../baglan/baglan.php";
		/*sql sorguları içerisinde yazı her zaman tek tırnak ile başlar. Bu yüzden aşağıdaki sorguda eşittirden sonra tek tırnak kullanıyoruz.*/
		$sql = "UPDATE content SET remove=0 WHERE content_id='".$id."'";
		$result = $conn->query($sql);
		return $result;
	}
	
	function insertContent($data,$file) {
		/*insert kayıt eklemek için çalışıyor.*/
		include "../baglan/baglan.php";
		$sql = "INSERT INTO content(title, description,image) VALUES ('".$data['addTitle']."','".$data['addDescription']."','img/".$file['addImage']['name']."')";
		$result = $conn->query($sql);
		return $result;
	}
	
	function userActive($id,$getActive) {
		include "../baglan/baglan.php";
		$sql = "UPDATE user SET active=".$getActive." WHERE user_id='".$id."'";
		$result = $conn->query($sql);
		return $result;
	}
}
?>