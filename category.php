<?php include "header.php"; ?>
<main>
	<div class="container-fluid p-0 mb-4">
		<img src="img/erkek-banner.jpg" class="img-fluid" alt="Erkek Kategorisi" />
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-2">
				<div class="col-12 border-right">
					<div class="kategori border-bottom mb-4">
						<p><b>Kategoriler</b></p>
						<?php
							$ctgModel = new Category;
							$result = $ctgModel->getAllZeroLevelCategory();
							foreach($result as $key => $value) {
						?>
						<p><a href="category.php?ctgid=<?php echo $value['category_id'] ?>"><?php echo $value['title'] ?></a></p>
						<?php } ?>
					</div>
					<div class="kategori border-bottom mb-4">
						<p><b>Alt Kategoriler</b></p>
						<?php
							$ctgModel3 = new Category;
							$result3 = $ctgModel3->getSubCategoryByLevelId($_GET['ctgid']);
							foreach($result3 as $key => $value) {
						?>
						<p><a href="subcategory.php?subid=<?php echo $value['category_id']; ?>"><?php echo $value['title'] ?> (10)</a></p>
						<?php } ?>
					</div>
					<!-- <div class="kategori border-bottom mb-4">
						<p><b>Beden</b></p>
						<p><a href="#">S (10)</a></p>
						<p><a href="#">M (45)</a></p>
						<p><a href="#">L (30)</a></p>
						<p><a href="#">XL (12)</a></p>
						<p><a href="#">XXL (9)</a></p>
					</div>
					<div class="kategori border-bottom mb-4">
						<p><b>Renk</b></p>
						<p><a href="#">Sarı (10)</a></p>
						<p><a href="#">Mavi (45)</a></p>
						<p><a href="#">Lacivert (30)</a></p>
					</div>
					<div class="kategori border-bottom mb-4">
						<p><b>Kargo</b></p>
						<p><input type="checkbox" value="Var"> Var</input></p>
						<p><input type="checkbox" value="Var"> Yok</input></p>
					</div>
					<div class="kategori border-bottom mb-4">
						<p><b>Taksit</b></p>
						<p><input type="radio" name="taksit"> Var</input></p>
						<p><input type="radio" name="taksit"> Yok</input></p>
					</div>
					<div class="">
						<button class="btn btn-primary">FİLTRELE</button>
					</div> -->
				</div>
			</div>
			<div class="col-12 col-sm-10">
			<?php
					$ctgSubModel = new Category;
					$resultSub = $ctgSubModel->getCategoryById($_GET['ctgid']);
			?>
				<h4><?php echo $resultSub['title'] ?> Kategorisi</h4>
				<hr />
				<div class="row">
				<?php
					$resultSub = $ctgSubModel->getSubCategoryByLevelId($_GET['ctgid']);
					$i = 0;
					foreach($resultSub as $key => $value) {
				?>
					<div class="col-12 col-sm-6 col-lg-4">
						<div class="col-12 urun">								
							<img src="<?php echo $value['image'] ?>" alt="<?php echo $value['title'] ?>" class="img-fluid mb-2" />
							<h3><?php echo $value['title'] ?></h3>
							<p><?php echo $value['description'] ?></p>
							<div class="col-12">
								<a href="subcategory.php?subid=<?php echo $value['category_id'] ?>">Tüm <?php echo $value['title'] ?> Ürünleri</a>
							</div>								
						</div>	
					</div>					
					<?php if($i == 2) { ?>					
					<div class="kampanya text-center border p-4 mt-4 mb-4 col-12">
						<h2>İlk alışverişinize özel %10 indirim fırsatı.</h2>
					</div>
					<?php } ?>
				<?php
					$i++; }
				?>
					
				</div>
				
				<div class="sayfalama text-center mt-4 mb-4">
				</div>
			</div>
		</div>
	</div>
</main>
<?php include "footer.php"; ?>