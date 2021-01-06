<?php
class User {
	function getUser($data) {
		include "./baglan/baglan.php";
		/*sql sorguları içerisinde yazı her zaman tek tırnak ile başlar. Bu yüzden aşağıdaki sorguda eşittirden sonra tek tırnak kullanıyoruz.*/
		$sql = "SELECT * FROM user WHERE username='".$data['username']."' AND password='".$data['password']."' AND remove=1 AND active=1";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getAllUser() {
		include "../baglan/baglan.php";
		$sql = "SELECT * FROM user WHERE remove = 1";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getUserById($id) {
		include "../baglan/baglan.php";
		/*sql sorguları içerisinde yazı her zaman tek tırnak ile başlar. Bu yüzden aşağıdaki sorguda eşittirden sonra tek tırnak kullanıyoruz.*/
		$sql = "SELECT * FROM user WHERE user_id='".$id."'";
		$result = $conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
	
	function userUpdate($data) {
		include "../baglan/baglan.php";
		/*sql sorguları içerisinde yazı her zaman tek tırnak ile başlar. Bu yüzden aşağıdaki sorguda eşittirden sonra tek tırnak kullanıyoruz.*/
		$sql = "UPDATE user SET username='".$data['edtUserName']."',password='".$data['edtPassword']."' WHERE user_id='".$data['edtUserId']."'";
		$result = $conn->query($sql);
		return $result;
	}
	
	function deleteUser($id) {
		/*Delete Sorgusu Kaydı Tamamen Siler*/
		/*include "../baglan/baglan.php";
		$sql = "DELETE FROM user WHERE user_id = '".$id."'";
		$result = $conn->query($sql);
		return $result;*/
		/*Bu yapacağımız işlem veritabanında datayı tutmayı sağlar.*/
		include "../baglan/baglan.php";
		/*sql sorguları içerisinde yazı her zaman tek tırnak ile başlar. Bu yüzden aşağıdaki sorguda eşittirden sonra tek tırnak kullanıyoruz.*/
		$sql = "UPDATE user SET remove=0 WHERE user_id='".$id."'";
		$result = $conn->query($sql);
		return $result;
	}
	
	function insertUser($data) {
		/*insert kayıt eklemek için çalışıyor.*/
		include "../baglan/baglan.php";
		$sql = "INSERT INTO user(username, password) VALUES ('".$data['addUserName']."','".$data['addPassword']."')";
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