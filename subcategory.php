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
							$prdModel3 = new Product;
							$getCategoryId = $ctgModel3->getCategoryById($_GET['subid']);
							$result3 = $ctgModel3->getSubCategoryByLevelId($getCategoryId['level']);
							foreach($result3 as $key => $value) {						
						?>
						<p><a href="subcategory.php?subid=<?php echo $value['category_id'] ?>"><?php echo $value['title'] ?></a></p>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-10">
			<?php
					$ctgSubModel = new Category;
					$prdSubModel = new Product;
					$resultSub = $ctgSubModel->getCategoryById($_GET['subid']);
			?>
				<h4><?php echo $resultSub['title'] ?> Kategorisi</h4>
				<hr />
				<div class="row">
				<?php
					$resultSub = $prdSubModel->getProductByLevelId($_GET['subid']);
					foreach($resultSub as $key => $value) {
				?>
					<div class="col-12 col-sm-6 col-lg-4">
						<div class="col-12 urun">								
							<img src="<?php echo $value['image'] ?>" alt="<?php echo $value['title'] ?>" class="img-fluid mb-2" />
							<h3><?php echo $value['title'] ?></h3>
							<p><?php echo $value['description'] ?></p>
							<div class="col-12">
								<a href="product.php?prdid=<?php echo $value['product_id'] ?>">İncele</a>
							</div>								
						</div>	
					</div>		
				<?php
					}
				?>
					
				</div>
				
				<div class="sayfalama text-center mt-4 mb-4">
				</div>
			</div>
		</div>
	</div>
</main>
<?php include "footer.php"; ?>