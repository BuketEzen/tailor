<script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>
<?php
	include "../sol_menu.php";
	require "../class/category_class.php";
	require "../class/product_class.php";
?>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		if($_POST) {
			$prdModel = new Product;
			$result = $prdModel->insertProduct($_POST,$_FILES);
			if($result == 1) {
				$dizin = "../../img/product/";
				$yuklenecek_dosya = $dizin.basename($_FILES['addImage']['name']);
				move_uploaded_file($_FILES['addImage']['tmp_name'], $yuklenecek_dosya);
				header("location:product.php");
			} else {
				echo "Hatalı İşlem. Tekrar deneyiniz!";
			}
		}
	} else {
		header("location:../index.php");
	}
?>
<form method="post" action="" enctype="multipart/form-data">
	<input type="text" name="addTitle" placeholder="Başlık" /><br><br>
	<input type="text" name="addPrice" placeholder="Fiyat" /><br><br>
	<input type="text" name="addVat" placeholder="KDV Oranı" /><br><br>
	<select name="categoryName">		
		<?php 
			$ctgModel = new Category;
			$result2 = $ctgModel->getAllLevelZeroCategory();
			foreach($result2 as $key => $value) {			
				$result3 = $ctgModel->getSubCategoryByCategoryId($value['category_id']);
				foreach($result3 as $key2 => $value2) {
		?>
		<option value="<?php echo $value2['category_id'] ?>"><?php echo $value['title'] ?>>><?php echo $value2['title'] ?></option>
		<?php
				}
			}
		?>
	</select><br><br>
	<input type="text" name="addBrand" placeholder="Marka" /><br><br>
	<input type="text" name="addColor" placeholder="Color" /><br><br>
	<input type="text" name="addSize" placeholder="Size" /><br><br>
	<textarea id="editor" name="addDescription" placeholder="Açıklama"></textarea><br><br>
	<textarea id="editor2" name="addSaleChoose" placeholder="Taksit Seçenekleri"></textarea><br><br>
	<textarea id="editor3" name="addReturnCondition" placeholder="İade Şartları"></textarea><br><br>
	<textarea id="editor4" name="addDelivery" placeholder="Teslimat"></textarea><br><br>
	<input type="text" name="addSalePrice" placeholder="İndirimli Fiyat" /><br><br>
	<input type="text" name="addStock" placeholder="Ürün Adedi" /><br><br>
	<input type="file" name="addImage" /><br><br>	
	<input type="submit" value="Kayıt" />
</form>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#editor2' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#editor3' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#editor4' ) )
        .catch( error => {
            console.error( error );
        } );
</script>