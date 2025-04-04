<?php
require_once('../database/connection.php');
session_start();

//DECODE SESSION ID
	/*$user_id = $_SESSION['UMLIDLGZS'];
	$user_id = base64_decode(urldecode($user_id));
	$user_id = (($user_id*240)/378720);
	$encript_method = (($user_id*136806)/302);
	$encript_method = 'UID-'.$encript_method;
	$user_id = urldecode(base64_encode($encript_method));*/
	//DECODE SESSION ID
	$user_id = $_SESSION['UMLIDLGZS'];
	$user_id = base64_decode(urldecode($user_id));
	$user_id = (($user_id*240)/378720);
	$EncodedUserId = strpos($user_id, '.');
	if($EncodedUserId !==false){
		$user_id = ceil($user_id);
	}
	//ENCRYPT SESSION USER ID TO MATCH WITH DATABASE USER ID
	$encript_method = (($user_id*136806)/302);
	$encript_method = 'UID-'.$encript_method;
	$user_id = urldecode(base64_encode($encript_method));
	
	if(isset($_POST['product_id'])){
		$product_id = $con->real_escape_string($_POST["product_id"]);
		$qty = $con->real_escape_string($_POST["qty"]);
		$CPN = $_SESSION['CPN'];
		$Totalprice = 65;
		$_SESSION['CPN'] = $CPN + 1;
		
		$stmt = $con->prepare("INSERT INTO cart(product_id,user_id,qty,Totalprice)
		VALUES(?, ?, ?, ?) ON DUPLICATE KEY UPDATE qty = qty +1");
	    $stmt->bind_param("ssii", $product_id, $user_id, $qty, $Totalprice);
		/*$sql = "INSERT INTO `cart`(product_id,user_id,qty,Totalprice)
		VALUES 
		('$product_id', '$user_id', '$qty', '$Totalprice')
		ON DUPLICATE KEY UPDATE qty = qty +1";
		mysqli_query($con, $sql);*/
		
		mysqli_query($con,"UPDATE `profile` SET cart_product = cart_product +1 where user_id='VUlELTExMDkxODk0MzI='");
		echo $user_id;
		$stmt->execute();
		exit();
	}
?>