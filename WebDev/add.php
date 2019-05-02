<?php
	require "header.php";
?>

	<main>
		<div class="wrapper-main">
			<section class="section-default">
				<h1>ADD PRODUCT</h1>
				<form class="form-add" action="includes/add.inc.php" method="post">
					<input type="text" name="productName" placeholder="productUid">
					<input type="text" name="quantity" placeholder="productQuantity">
					<input type="text" name="price" placeholder="productPrice">
					<button type="submit" name="add-submit">Add</button>
				</form>
			</section>
		</div>
	</main>
	
	
<?php
	require "footer.php";
?>