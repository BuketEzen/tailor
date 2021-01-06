<?php
	include "header.php";
	$result = $cntModel->getContentById($_GET['cid']);
	if(isset($result['title'])) {
		$title = $result['title'];
		$description = $result['description'];
		$image = $result['image'];
	} else {
		echo "<h1>404 Hatalı bir sayfa!</h1>";
		include "footer.php";
		die();
	}
?>
<main class="icSayfa">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-3">
					<img src="<?php echo $image ?>" class="img-fluid" alt="<?php echo $result['title']; ?>" />
				</div>
				<div class="col-12 col-md-9">	
					<h2><?php echo $result['title']; ?></h2>			
					<p><?php echo $description ?></p>
				</div>
			</div>
		</div>
	</main>
<?php
	include "footer.php";
?>