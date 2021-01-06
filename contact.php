<?php
	include "header.php";
	include "class/contact_class.php";
	$mdlContact = new Contact;
	$result = $mdlContact->getAllContactFront(2);
?>

	<main>
		<div class="container-fluid p-0">			
			<div class="col-12 p-0">
				<iframe src="<?php echo $result['coordinate']; ?>" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-6">
					<h2>Bize Ulaşın!</h2>
					<p>Adres: <?php echo $result['address']; ?></p>

					<p>Telefon: <?php echo $result['telephone']; ?></p>

					<p>Faks: <?php echo $result['fax']; ?></p>

					<p>Mail: <?php echo $result['mail']; ?></p>
				</div>
				<div class="col-12 col-lg-6">
					<h2>İletişim Formu</h2>
					<form action="contactform.php" method="post" class="iletisimFormu">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label for="inputEmail4">Ad Soyad</label>
								<input name="namesurname" type="text" class="form-control" id="inputEmail4" placeholder="Ad Soyad">
							</div>
							<div class="form-group col-md-6">
								<label for="inputText4">Email</label>
								<input name="email" type="text" class="form-control" id="inputText4" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label for="inputAddress">Adres</label>
							<input name="address" type="text" class="form-control" id="inputAddress" placeholder="Adresiniz">
						</div>						
						<div class="form-group">
							<label for="inputCity">Şehir</label>
							<input name="city" type="text" class="form-control" id="inputCity">
						</div>					
						<div class="form-group">
							<label for="inputCity">Mesajınız</label>
							<textarea name="message" class="form-control"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Gönder</button>
					</form>
				</div>
			</div>
		</div>
	</main>

<?php
	include "footer.php";
?>