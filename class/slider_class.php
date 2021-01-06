<?php
class Slider {
	
	function getAllSlider() {
		include "./baglan/baglan.php";
		$sql = "SELECT * FROM slider WHERE remove = 1";
		$result = $conn->query($sql);
		return $result;
	}
}
?>