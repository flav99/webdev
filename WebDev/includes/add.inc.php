<?php
if(isset($_POST['add-submit'])){
	
	require 'dbh.inc.php';
	
	$productName = $_POST['productUid'];
	$quantity = $_POST['productQuantity'];
	$price = $_POST['productPrice'];
	
	//error handlers
	if(empty($productName) || empty($quantity) || empty($price)){
		header("location: ../add.php?error=emptyfields");
		exit();
	}
	
	else {
		
		$sql = "SELECT productUid FROM products WHERE productUid=?";
		$stmt = mysqli_stmt_init($conn);
		
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("location: ../add.php?error=sqlError");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $productName);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			
			if($resultsCheck > 0){
				header("location: ../add.php?error=product-taken&productUid=".$productName);
				exit();
			}
			else{
				
				$sql = "INSERT INTO users (productUid, productQuantity, productPrice) VALUES (?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("location: ../add.php?error=sqlerror");
					exit();
				}
				else{
					mysqli_stmt_bind_param($stmt, "sss", $productName, $quantity, $price);
					mysqli_stmt_execute($stmt);
					header("location: ../add.php?add=success");
					exit();
					
				}
			}
		}
		
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	
}
else {
	header("location: ../add.php");
	exit();
}