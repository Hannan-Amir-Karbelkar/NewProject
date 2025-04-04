<?php
require_once('../../database/connection.php');
if(isset($_POST['category'])){
	$category = $con->real_escape_string($_POST["category"]);
    $metaDescription = $con->real_escape_string($_POST["metaDescription"]);
    $tagy = $con->real_escape_string($_POST["tagy"]);
    $status = $con->real_escape_string($_POST["status"]);
	
	$category = FILTER_VAR($category, FILTER_SANITIZE_SPECIAL_CHARS);
	$metaDescription = FILTER_VAR($metaDescription, FILTER_SANITIZE_SPECIAL_CHARS);
	$tagy = FILTER_VAR($tagy, FILTER_SANITIZE_SPECIAL_CHARS);
	$status = FILTER_VAR($status, FILTER_SANITIZE_SPECIAL_CHARS);
	
	$Product_Id_Num = rand();
	$Product_Id = 'POST-'.$Product_Id_Num;
	$sql = "INSERT INTO `categories`(`category`, `cat_description`, `cat_meta_tags`, `status`)
		VALUES 
	('$category','$metaDescription','$tagy','$status')";
	mysqli_query($con, $sql);
	die();
}

if(isset($_POST['subcategory'])){
	$cat_id = $con->real_escape_string($_POST["cat_id"]);
	$subcategory = $con->real_escape_string($_POST["subcategory"]);
    $metaDescription = $con->real_escape_string($_POST["metaDescription"]);
    $tagy = $con->real_escape_string($_POST["tagy"]);
    $status = $con->real_escape_string($_POST["status"]);
	
	$cat_id = FILTER_VAR($cat_id, FILTER_SANITIZE_SPECIAL_CHARS);
	$subcategory = FILTER_VAR($subcategory, FILTER_SANITIZE_SPECIAL_CHARS);
	$metaDescription = FILTER_VAR($metaDescription, FILTER_SANITIZE_SPECIAL_CHARS);
	$tagy = FILTER_VAR($tagy, FILTER_SANITIZE_SPECIAL_CHARS);
	$status = FILTER_VAR($status, FILTER_SANITIZE_SPECIAL_CHARS);
	$sql = "INSERT INTO `subcategory`(`cat_id`, `sub_category`, `sub_cat_tags`, `sub_cat_desc`, `sub_cat_status`)
		VALUES 
	('$cat_id', '$subcategory','$tagy','$metaDescription','$status')";
	mysqli_query($con, $sql);
	die();
}

if(isset($_POST['categories'])){
	$html ='';
	$html.= '<option value="">Select Sub Category</option>';
	$categories = $con->real_escape_string($_POST["categories"]);
	$categories = mysqli_query($con, "SELECT * FROM `subcategory` WHERE cat_id ='$categories'");
	while($row = mysqli_fetch_array($categories)){
	$html.= '<option value="'.$row['id'].'">'.$row['sub_category'].'</option>';
	
	}
	echo $html;
	die();
}

?>