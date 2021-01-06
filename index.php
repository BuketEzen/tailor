<?php
	include "header.php";
?>

	<main>
		<div class="container-fluid p-0">
			<div class="col-12 p-0">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">					
					<ol class="carousel-indicators">
						<?php
							$i = 0;
							$sldrModel = new Slider;
							$result = $sldrModel->getAllSlider();
							foreach($result as $key => $value) {
						?>
							<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0) { echo "active"; } ?>"></li>
						<?php
							$i++;
							}
						?>
					</ol>
					<div class="carousel-inner">
						<?php
							$k = 0;
							$sldrModel = new Slider;
							$result = $sldrModel->getAllSlider();
							foreach($result as $key => $value) {
						?>
							<div class="carousel-item <?php if($k == 0) { echo "active"; } ?>">
								<img class="d-block w-100" src="<?php echo $value['image']; ?>" alt="<?php echo $value['title']; ?>">
								<div class="carousel-caption d-none d-md-block">
									<h1><?php echo $value['title']; ?></h1>
								</div>
							</div>
						<?php
							$k++;
							}
						?>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
			<div class="baslik col-12 text-center pt-4 pb-4">
				<h2>EN YENİ ÜRÜNLERİMİZ</h2>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<?php 
					$prdModel = new Product;
					$result = $prdModel->getNewProduct();
					foreach($result as $key => $value) {
				?>
				<div class="col-12 col-sm-6 col-lg-3">
					<div class="col-12 urun">
						<img src="<?php echo $value['image'] ?>" alt="<?php echo $value['title'] ?>" class="img-fluid" />
						<h3><?php echo $value['title'] ?></h3>
						<p><?php echo $value['description'] ?></p>
						<p>Fiyat: <?php echo number_format($value['price'],2,',','.'); ?> TL</p>
						<div class="row">
							<div class="col-6">
								<a href="product.php?prdid=<?php echo $value['product_id']; ?>">Ürünü İncele</a>
							</div>
							<div class="col-6">
								<form action="basket.php" method="post">
								<input type="hidden" name="prdid" value="<?php echo $value['product_id'] ?>" />
								<button class="btn btn-primary sepete-ekle m-0">Sepete Ekle</button>
								</form>
							</div>		
						</div>	
					</div>	
				</div>
				<?php
					}
				?>
			</div>
		</div>
		<div class="container-fluid">		
			<div class="baslik col-12 text-center pt-4 pb-4">
				<h2>İNDİRİMLİ ÜRÜNLER</h2>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<?php 
					$prdModel = new Product;
					$result = $prdModel->getSaleProduct();
					foreach($result as $key => $value) {
				?>
				<div class="col-12 col-sm-6 col-lg-3">
					<div class="col-12 urun">
						<img src="<?php echo $value['image'] ?>" alt="<?php echo $value['title'] ?>" class="img-fluid" />
						<h3><?php echo $value['title'] ?></h3>
						<p><?php echo $value['description'] ?></p>
						<p>Fiyat: <?php echo number_format($value['price'],2,',','.'); ?> TL</p>
						<p><b>İndirimli Fiyat: <?php echo number_format($value['sale_price'],2,',','.'); ?> TL</b></p>
						<div class="row">
							<div class="col-6">
								<a href="product.php?prdid=<?php echo $value['product_id']; ?>">Ürünü İncele</a>
							</div>
							<div class="col-6">
								<form action="basket.php" method="post">
								<input type="hidden" name="prdid" value="<?php echo $value['product_id'] ?>" />
								<button class="btn btn-primary sepete-ekle m-0">Sepete Ekle</button>
								</form>
							</div>	
						</div>	
					</div>	
				</div>
				<?php
					}
				?>
			</div>
			<div class="row mt-4">
				<?php 
					$ctgModel2 = new Category;
					$result2 = $ctgModel2->getAllZeroLevelCategory();
					foreach($result2 as $key => $value) {
						if($value['category_id'] == 8 || $value['category_id'] == 1 || $value['category_id'] == 4) {
				?>
				<?php
					if($value['category_id'] != 8) { ?>
						<div class="col-12 col-sm-6 pl-0 kategoriler">
					<?php } else { ?>
						<div class="col-12 mt-4 p-0">
					<?php } ?>
						<a href="category.php?ctgid=<?php echo $value['category_id']; ?>">
							<img src="<?php echo $value['image']; ?>" alt="<?php echo $value['title']; ?>" class="img-fluid" />
						</a>
					</div>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
		<div class="container-fluid newsletter">
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-12 col-lg-6 newsletterYazi text-center text-lg-left">
						<p>E-Bülten hizmetimize kayıt olun, kampanya <br />
						ve indirimlerden ilk siz haberdar olun!</p>
					</div>
					<div class="col-12 col-lg-6">
						<form method="post" class="newsletterForm">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="E-mail Adresiniz">
								<button type="submit" class="btn btn-primary">KAYDOL</button>
							</div>							
						</form>
					</div>
				</div>
			</div>
		</div>
	</main>

<?php
	include "footer.php";
?>