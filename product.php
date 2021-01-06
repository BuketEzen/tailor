<?php
	include "header.php";
?>
	<?php
		$prdModel = new Product;
		$result = $prdModel->getProductById($_GET['prdid']);
	?>
	<main class="icSayfa">
		<div class="container">
			<div class="row">
				<div class="col-5">
					<img src="<?php echo $result['image'] ?>" alt="<?php echo $result['title'] ?>" class="img-fluid" />
				</div>
				<div class="col-7">
					<h4><?php echo $result['title'] ?></h4>
					<hr />
					<?php
						if($result['sale_item'] == 0) {
					?>
					<h5><b>Fiyat: <?php echo number_format($result['price'],2,',','.'); ?> TL</b></h5>
					<h5><b>KDV Dahil Fiyat: <?php echo number_format($prdModel->calculateVat($result['price'],$result['vat']),2,',','.'); ?> TL</b></h5>
					<?php } else { ?>					
					<h5><b>İndirimli Fiyat: <?php echo number_format($result['sale_price'],2,',','.'); ?> TL</b></h5>
					<h5><b>KDV Dahil Fiyat: <?php echo number_format($prdModel->calculateVat($result['sale_price'],$result['vat']),2,',','.'); ?> TL</b></h5>
					<?php }?>					
					<hr />
					<p><b>Ürün Bilgileri</b></p>
					<?php 
						$ctgModel = new Category;
						$result2 = $ctgModel->getCategoryById($result['level']);
					?>
					<p><b>Kategori:</b> <?php echo $result2['title'] ?></p>
					<p><b>Marka:</b> <?php echo $result['brand'] ?></p>
					<p><b>Renk:</b> <?php echo $result['color'] ?></p>
					<p><b>Beden:</b> <?php echo $result['size'] ?></p>
					<hr />
					<form action="basket.php" method="post">
					<input type="hidden" name="prdid" value="<?php echo $result['product_id'] ?>" />
					<button class="btn btn-primary sepete-ekle m-0">Sepete Ekle</button>
					</form>
				</div>
			</div>
			<div class="col-12 p-0 mt-4">
				<ul class="nav nav-tabs">
				  <li class="active"><a data-toggle="tab" href="#home">Ürün Açıklaması</a></li>
				  <li><a data-toggle="tab" href="#menu1">Taksit Seçenekleri</a></li>
				  <li><a data-toggle="tab" href="#menu2">İade Şartları</a></li>
				  <li><a data-toggle="tab" href="#menu3">Teslimat</a></li>
				</ul>

				<div class="tab-content">
				  <div id="home" class="tab-pane fade in active show">
					<?php echo $result['description'] ?>
				  </div>
				  <div id="menu1" class="tab-pane fade">
					<?php echo $result['sale_choose'] ?>
				  </div>
				  <div id="menu2" class="tab-pane fade">
					
					<?php echo $result['return_condition'] ?>
				  </div>
				  <div id="menu3" class="tab-pane fade">
					
					<?php echo $result['delivery'] ?>
				  </div>
				</div>
			</div>
			<div class="col-12 text-center mt-4 mb-4">
				<h3>Benzer Ürünler</h3>
			</div>
			<div class="col-12 p-0">
				<div class="row">
					<?php
						$result3 = $prdModel->getProductByLevelIdWithRandom($result['level']);
						foreach($result3 as $key => $value) { 
					?>
					<div class="col-12 col-sm-6 col-lg-3">
						<div class="col-12 urun">
							<img src="<?php echo $value['image']; ?>" alt="<?php echo $value['title']; ?>" class="img-fluid" />
							<h3><?php echo $value['title']; ?></h3>
							<p><?php echo $value['description']; ?></p>
							<?php
								if($value['sale_item'] == 0) {
							?>
							<p>Fiyat: <?php echo number_format($value['price'],2,',','.'); ?> TL</p>
							<?php } else { ?>
							<p>İndirimli Fiyat: <?php echo number_format($value['sale_price'],2,',','.'); ?> TL</p>
							<?php }?>
							<div class="row">
								<div class="col-6">
									<a href="product.php?prdid=<?php echo $value['product_id']; ?>">Ürünü İncele</a>
								</div>
								<div class="col-6">
									<a href="">Sepete Ekle</a>
								</div>	
							</div>	
						</div>	
					</div>
					<?php 
						}
					?>
				</div>
			</div>
		</div>
	</main>
<?php
	include "footer.php";
?>