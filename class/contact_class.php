<?php
	class Contact {
		function getAllContactFront($id) {
			include "./baglan/baglan.php";
			$sql = "SELECT * FROM contact WHERE contact_id=$id";
			$result = $conn->query($sql);
			$row = mysqli_fetch_assoc($result);
			return $row;
		}
		function insertContactForm($data) {
			/*insert kayıt eklemek için çalışıyor.*/
			include "./baglan/baglan.php";
			$sql = "INSERT INTO contactform(namesurname, email, address, city, message) VALUES ('".$data['namesurname']."','".$data['email']."','".$data['address']."','".$data['city']."','".$data['message']."')";
			$result = $conn->query($sql);
			return $result;
		}
	}
?>