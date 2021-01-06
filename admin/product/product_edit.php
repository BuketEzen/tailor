<script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>
<?php
	include "../sol_menu.php";
	require "../class/category_class.php";
	require "../class/product_class.php";
?>
<?php
	session_start();
	if(isset($_SESSION['girisyapildi'])) {
		if(isset($_GET['prdid'])) {
			$prdModel = new Product;
			if($_POST) {
				/*sayfada data gönderim işlemi var ise burası çalışır.*/
				$result = $prdModel->productUpdate($_POST,$_FILES);
				if($result == 1) {
					$dizin = "../../img/product/";
					$yuklenecek_dosya = $dizin.basename($_FILES['edtProductImage']['name']);
					move_uploaded_file($_FILES['edtProductImage']['tmp_name'], $yuklenecek_dosya);
					header("location:product.php");
				} else {
					echo "Kayıt Güncellenirken Hata Oluştu";
				}
			} else {
				/*sayfada sadece data gösterimi varsa burası çalışır.*/		
				$result = $prdModel->getProductById($_GET['prdid']);
				$title = $result['title'];
				$image = $result['image'];
				$price = $result['price'];
				$vat = $result['vat'];
				$level = $result['level'];
				$brand = $result['brand'];
				$color = $result['color'];
				$size = $result['size'];
				$description = $result['description'];
				$sale_choose = $result['sale_choose'];
				$return_condition = $result['return_condition'];
				$delivery = $result['delivery'];
				$new_item = $result['new_item'];
				$sale_item = $result['sale_item'];
				$sale_price = $result['sale_price'];
				$cargo = $result['cargo'];
				$have_sale = $result['have_sale'];
				$stock = $result['stock'];
				$cntId = $result['product_id'];
			}
		} else {
			header("location:product.php");
		}
	} else {
		header("location:../index.php");
	}
?>
<form method="post" action="" enctype="multipart/form-data">
	<input type="text" name="addTitle" placeholder="Başlık" value="<?php echo $title; ?>" /><br><br>
	<input type="text" name="addPrice" placeholder="Fiyat" value="<?php echo $price; ?>" /><br><br>
	<input type="text" name="addVat" placeholder="KDV Oranı" value="<?php echo $vat; ?>" /><br><br>
	<select name="categoryName">		
		<?php 
			$ctgModel = new Category;
			$result2 = $ctgModel->getAllLevelZeroCategory();
			foreach($result2 as $key => $value) {			
				$result3 = $ctgModel->getSubCategoryByCategoryId($value['category_id']);
				foreach($result3 as $key2 => $value2) {
					if($level == $value2['category_id']) { $selected = "selected"; } else { $selected = ""; }
		?>
		<option <?php echo $selected ?> value="<?php echo $value2['category_id'] ?>"><?php echo $value['title'] ?>>><?php echo $value2['title'] ?></option>
		<?php
				}
			}
		?>
	</select><br><br>
	<input type="text" name="addBrand" placeholder="Marka" value="<?php echo $brand; ?>" /><br><br>
	<input type="text" name="addColor" placeholder="Color" value="<?php echo $color; ?>" /><br><br>
	<input type="text" name="addSize" placeholder="Size" value="<?php echo $size; ?>" /><br><br>
	<textarea id="editor" name="addDescription" placeholder="Açıklama"> <?php echo $description; ?></textarea><br><br>
	<textarea id="editor2" name="addSaleChoose" placeholder="Taksit Seçenekleri"> <?php echo $sale_choose; ?></textarea><br><br>
	<textarea id="editor3" name="addReturnCondition" placeholder="İade Şartları"><?php echo $return_condition; ?></textarea><br><br>
	<textarea id="editor4" name="addDelivery" placeholder="Teslimat"> <?php echo $delivery; ?></textarea><br><br>
	<input type="text" name="addSalePrice" placeholder="İndirimli Fiyat" value="<?php echo $sale_price; ?>" /><br><br>
	<input type="text" name="addStock" placeholder="Ürün Adedi" value="<?php echo $stock; ?>" /><br><br>
	<input type="checkbox" name="edtNewItem" <?php if($new_item == 1) { echo "checked"; } ?> /> Yeni Ürün<br><br>
	<input type="checkbox" name="edtSaleItem" <?php if($sale_item == 1) { echo "checked"; } ?> /> İndirimli Ürün<br><br>
	<input type="checkbox" name="edtCargo" <?php if($cargo == 1) { echo "checked"; } ?> /> Kargo Var Mı?<br><br>
	<input type="checkbox" name="edtHaveSale" <?php if($have_sale == 1) { echo "checked"; } ?> /> Taksit Var Mı?<br><br>
	<img src="../../<?php echo $image; ?>" alt="<?php echo $title; ?>" height="100" /><br><br>
	<input type="file" name="edtProductImage" /><br><br>	
	<input type="hidden" name="edtProductId" value="<?php echo $cntId ?>" />
	<input type="submit" value="Güncelle" />
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