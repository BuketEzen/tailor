<?php
	include "class/contact_class.php";
	if($_POST) {
		$cfrmModel = new Contact;
		$result = $cfrmModel->insertContactForm($_POST);
		if($result == 1) {
			header("location:contact.php");
		}
	} else {
		header("location:contact.php");
	}
?>