	
	<footer>
		<div class="container-fluid footer-top">
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-6 col-lg-3 align-center fHakkimizda">
						<div class="col-12 border-right">
							<img src="img/logo.png" class="img-fluid" alt="Tailor Studio" />
							<?php							
								$result = $cntModel->getContentById(1);
								$description = "";
								if(isset($result['description'])) {
									$description = $result['description'];
								}
							?>
							<p><?php echo substr($description,0,300); ?>...<a href="content.php?cid=1">Devamını Oku</a></p>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 altKategoriDis">
						<div class="col-12 border-right altKategori">
							<p>Alt Kategoriler</p>
							<div class="row">
								<div class="col-6 p-0">
									<ul>
							<?php 
								$ctgModel3 = new Category;
								$result3 = $ctgModel3->getAllNoneZeroLevelCategory();
								$i = 0;
								foreach($result3 as $key => $value) {
							?>
								<?php if($i == 9) { ?>
									</ul>
								</div>
								<div class="col-6 p-0">							
									<ul>
								<?php } ?>
									<li><a href="subcategory.php?subid=<?php echo $value['category_id'] ?>"><?php echo $value['title']; ?></a></li>									
								<?php $i++; } ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 adresDis">
						<div class="col-12 border-right adresIc">
							<p>İletişim</p>
							Adres: Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
							Nulla lorem lacus, varius id laoreet eget, ultrices eu orci.<br /><br />

							Telefon: <a href="tel:05053632504">0505 363 25 04</a><br /><br />

							Faks: <a href="tel:02322322322">0232 232 2322</a><br /><br />

							Mail: <a href="mailto:info@tailorstudio.com">info@tailorstudio.com</a><br /><br />
						</div>
					</div>
					<div class="col-12 col-sm-6 col-lg-3 pt-4">
						<div class="col-12 p-0">
							<!-- iframe boyut width="100%" height="340" -->
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3125.2252762529088!2d27.140126315606423!3d38.4362651815974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14bbd85bbcaa3be9%3A0xc002feef388baca8!2zxLAtQWthZGVtaSBFxJ9pdGltIHZlIERhbsSxxZ9tYW5sxLFr!5e0!3m2!1str!2str!4v1584988881007!5m2!1str!2str" width="100%" height="340" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-12 col-sm-6 text-center text-sm-left">
						<p>Copyright 2020. Tüm hakları saklıdır.</p>
					</div>
					<div class="col-12 col-sm-6 text-right d-none d-sm-block">
						<img src="img/bank-logo.png" class="img-fluid" />
					</div>
				</div>
			</div>
		</div>
	</footer>

  </body>
</html>