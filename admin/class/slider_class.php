<?php
class Slider {
	
	function getAllSlider() {
		include "../baglan/baglan.php";
		$sql = "SELECT * FROM slider WHERE remove = 1";
		$result = $conn->query($sql);
		return $result;
	}
	
	function getSliderById($id) {
		include "../baglan/baglan.php";
		/*sql sorguları içerisinde yazı her zaman tek tırnak ile başlar. Bu yüzden aşağıdaki sorguda eşittirden sonra tek tırnak kullanıyoruz.*/
		$sql = "SELECT * FROM slider WHERE slider_id='".$id."'";
		$result = $conn->query($sql);
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
	
	function sliderUpdate($data,$file) {
		include "../baglan/baglan.php";
		/*sql sorguları içerisinde yazı her zaman tek tırnak ile başlar. Bu yüzden aşağıdaki sorguda eşittirden sonra tek tırnak kullanıyoruz.*/
		if($file['edtSliderImage']['name'] != "") {
			$sql = "UPDATE slider SET title='".$data['edtSliderTitle']."',image='img/slider/".$file['edtSliderImage']['name']."' WHERE slider_id='".$data['edtSliderId']."'";
		} else {
			$sql = "UPDATE slider SET title='".$data['edtSliderTitle']."' WHERE slider_id='".$data['edtSliderId']."'";	
		}
		$result = $conn->query($sql);
		return $result;
	}
	
	function deleteSlider($id) {
		include "../baglan/baglan.php";
		$sql = "UPDATE slider SET remove=0 WHERE slider_id='".$id."'";
		$result = $conn->query($sql);
		return $result;
	}
	
	function insertSlider($data,$file) {
		/*insert kayıt eklemek için çalışıyor.*/
		include "../baglan/baglan.php";
		$sql = "INSERT INTO slider(title,image) VALUES ('".$data['addTitle']."','img/slider/".$file['addImage']['name']."')";
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