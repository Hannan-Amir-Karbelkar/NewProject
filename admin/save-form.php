<?php
if(isset($_POST["submit"])){
$heading='';
$content='';
$added_on='';	
	
$heading=$_POST['heading'];
$content=$_POST['content'];
$added_on=date('d-M-Y');
$id= "PID-".rand();
$current_data = file_get_contents('blog_data.json');
$array_data = json_decode($current_data, true);
    for ($a = 0; $a < count($content); $a++){
		$new_data = array(
		    'id' => $id,
		    'img' => $_POST['img'],
		    'heading' => $_POST['heading'],
		    'content' => $_POST['content'],
		    'Date' => $added_on
		);
	}
	$array_data[] = $new_data;
	$json_data = json_encode($array_data,JSON_PRETTY_PRINT);
	if(file_put_contents('blog_data.json', $json_data)){

	}else{

	}

$key=$_POST['key'];
$current_datas = file_get_contents('../public_folder/jasonData/searchKey.json');
$array_datas = json_decode($current_datas, true);
    for ($a = 0; $a < count($key); $a++){
		$new_data = array(
		    'id' => $id,
		    'key' => $_POST['key']
		);
	}
	$array_datas[] = $new_data;
	$json_datas = json_encode($array_datas,JSON_PRETTY_PRINT);
	if(file_put_contents('../public_folder/jasonData/searchKey.json', $json_datas)){

	}else{

	}	
	
}
?>