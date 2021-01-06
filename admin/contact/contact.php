<?php
	include "../sol_menu.php";
	require "../class/contact_class.php";
?>
<div style="float:left; width: 80%;">
<table>
<tr>
	<td>Adres</td>
	<td>Telefon</td>
	<td>Faks</td>
	<td>Mail</td>
	<td>Koordinat</td>
	<td>Düzenle</td>
</tr>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		$cntcModel = new Contact;
		$result = $cntcModel->getAllContact();
		foreach($result as $key => $value) { ?>
			<tr>
				<td><?php echo $value['address'] ?></td>
				<td><?php echo $value['telephone'] ?></td>
				<td><?php echo $value['fax'] ?></td>
				<td><?php echo $value['mail'] ?></td>
				<td><iframe src="<?php echo $value['coordinate'] ?>" width="200" height="150" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></td>
				<td><a href="contact_edit.php?cntcid=<?php echo $value['contact_id'] ?>">Düzenle</a></td>
			</tr>
		<?php } ?>		
	</table>
	<h3>İletişim Form Dataları</h3>
	<table>
		<tr>
			<td>İsim Soyisim</td>
			<td>Mail</td>
			<td>Adres</td>
			<td>Şehir</td>
			<td>Mesaj</td>
		</tr>
	<?php 
		$result2 = $cntcModel->getAllContactForm();
		foreach($result2 as $key => $value) { ?>
		<tr>
			<td><?php echo $value['namesurname']; ?></td>
			<td><?php echo $value['email']; ?></td>
			<td><?php echo $value['address']; ?></td>
			<td><?php echo $value['city']; ?></td>
			<td><?php echo $value['message']; ?></td>
		</tr>
		<?php } ?>
	</table>
	<?php
	} else {
		header("location:index.php");
	}
?>
</div>