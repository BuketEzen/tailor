<?php
ob_start();
session_start();
require "class/content_class.php";
require "class/slider_class.php";
require "class/category_class.php";
require "class/product_class.php";
?>
<!doctype html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700&display=swap&subset=latin-ext" rel="stylesheet">
	<link rel="stylesheet" href="style.css" />
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
    <title>Tailor Studio</title>
  </head>
  <body>
    <header>
		<div class="container-fluid top-menu">
			<div class="row">
				<div class="col-12 col-sm-6 top-left-menu text-center text-sm-left">
					<?php
					$cntModel = new Content;
					$result = $cntModel->getAllContent();
					foreach($result as $key => $value) { ?>
						<a href="content.php?cid=<?php echo $value['content_id'] ?>"><?php echo $value['title'] ?></a>
					<?php } ?>
					<a href="contact.php">İletişim</a>
				</div>
				<div class="col-12 col-sm-6 top-right-menu text-center text-sm-right">
					<a href="#"><i class="fa fa-phone"></i>05053632504</a>
					<a href="#"><i class="fa fa-facebook-f"></i>tailorStudio</a>
					<a href="#"><i class="fa fa-instagram"></i>tailorStudio</a>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12 col-sm-12 offset-md-1 col-md-3 logo text-sm-center">
					<a href="index.php"><img src="img/logo.png" class="img-fluid" alt="Tailor Studio" /></a>
				</div>
				<div class="col-12 col-sm-12 col-md-8 menu text-center text-sm-center text-sm-left">
					<nav class="navbar navbar-expand-lg navbar-light">
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					  </button>
					  <div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<?php
								$ctgModel = new Category;
								$result = $ctgModel->getAllZeroLevelCategory();
								foreach($result as $key => $value) {
							?>
							<li class="nav-item active">
								<a class="nav-link text-uppercase" href="category.php?ctgid=<?php echo $value['category_id'] ?>"><?php echo $value['title'] ?></a>
							</li>
							<?php } ?>
							<li class="nav-item d-block d-sm-none">
								<a class="nav-link" href="#">Üye Girişi</a>
							</li>
							<li class="nav-item d-block d-sm-none">
								<a class="nav-link" href="#">Üye Ol</a>
							</li>
							<li class="nav-item d-block d-sm-none">
								<a class="nav-link" href="#">Sepet</a>
							</li>
						</ul>
					  </div>
					</nav>
				</div>
			</div>
		</div>
		<div class="kulakcik d-none d-sm-block">
			<div class="uye-girisi">
				<a href="#">Üye Girişi</a>
			</div>
			<div class="uye-ol">
				<a href="#">Üye Ol</a>
			</div>
			<div class="sepet-sag">
				<a href="basket.php">Sepet<sub>
				<?php if(isset($_SESSION["shopping_cart"])) { echo count($_SESSION["shopping_cart"]); } ?></sub></a>
			</div>
		</div>
	</header>