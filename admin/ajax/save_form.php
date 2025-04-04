<?php
require_once('../../database/connection.php');
if(isset($_POST["heading1"])){
	$heading1 = '';
	$content1 = '';
	$img1     = '';
	$heading2 = '';
	$content2 = '';
	$img2     = '';
	$heading3 = '';
	$content3 = '';
	$img3     = '';
	$heading4 = '';
	$content4 = '';
	$img4     = '';
	$heading5 = '';
	$content5 = '';
	$img5     = '';
	$heading6 = '';
	$content6 = '';
	$img6     = '';
	$heading7 = '';
	$content7 = '';
	$img7     = '';
	$IllustrationCont = '';
	$img8     = '';
		
	$heading1 = FILTER_VAR($_POST["heading1"], FILTER_SANITIZE_SPECIAL_CHARS);
	$content1 = FILTER_VAR($_POST["content1"], FILTER_SANITIZE_SPECIAL_CHARS);
		
	$heading2 = FILTER_VAR($_POST["heading2"], FILTER_SANITIZE_SPECIAL_CHARS);
	$content2 = FILTER_VAR($_POST["content2"], FILTER_SANITIZE_SPECIAL_CHARS);
	
	$heading3 = FILTER_VAR($_POST["heading3"], FILTER_SANITIZE_SPECIAL_CHARS);
	$content3 = FILTER_VAR($_POST["content3"], FILTER_SANITIZE_SPECIAL_CHARS);
	
	$heading4 = FILTER_VAR($_POST["heading4"], FILTER_SANITIZE_SPECIAL_CHARS);
	$content4 = FILTER_VAR($_POST["content4"], FILTER_SANITIZE_SPECIAL_CHARS);
	
	$heading5 = FILTER_VAR($_POST["heading5"], FILTER_SANITIZE_SPECIAL_CHARS);
	$content5 = FILTER_VAR($_POST["content5"], FILTER_SANITIZE_SPECIAL_CHARS);
	
    $heading6 = FILTER_VAR($_POST["heading6"], FILTER_SANITIZE_SPECIAL_CHARS);
	$content6 = FILTER_VAR($_POST["content6"], FILTER_SANITIZE_SPECIAL_CHARS);	
		
	$heading7 = FILTER_VAR($_POST["heading7"], FILTER_SANITIZE_SPECIAL_CHARS);
	$content7 = FILTER_VAR($_POST["content7"], FILTER_SANITIZE_SPECIAL_CHARS);
	
	$IllustrationCont = FILTER_VAR($_POST["IllustrationCont"], FILTER_SANITIZE_SPECIAL_CHARS);
	
    $id= "BID-".rand();
    $added_on='';
	$Tags = FILTER_VAR($_POST["Tags"], FILTER_SANITIZE_SPECIAL_CHARS);
	
	/*if(isset($_FILES['img1']['name'])){
		$img1  = $_FILES['img1']['name'];
		$imgSize1  = $_FILES['img1']['size'];
		$file_text1 = explode('.', $img1);
		$regex_text1 = preg_match_all($regex, $img1);
		if($regex_text1 == 1){
			if(in_array($file_text1[1],$blackListExtns)){
				$error = 'probImg / Only Jpeg, jpg, png files allowed';	
			}else if(in_array($file_text1[1],$whitelistExtns)=== false){
				$error = 'probImg /Only Jpeg, jpg & png files allowed';	
			}else if($imgSize1 > 300000){
				$error = "probImg / File should not be more than 3Mb";
			}
		}
		if($regex_text1 > 1){
			if(in_array($file_text1[1],$blackListExtns)){
				$error = 'probImg / More Than One Extension Is Not Allowed';	
			}else if(in_array($file_text1[2],$blackListExtns)){
				$error = 'probImg / More Than One Extension Is Not Allowed';	
			}else{
				$error = 'probImg / More Than One Extension Is Not Allowed';	
			}
		}
	}*/
	
	function resize_image($new,$max_resolution,$file_text1){
		if(file_exists('../public_folder/images/'.$new)){
			if($file_text1 == 'jpeg' || $file_text1 == 'jpg'){
				$original_image = imagecreatefromjpeg('../public_folder/images/'.$new);
			}else if($file_text1 == 'png'){
				$original_image = imagecreatefrompng('../public_folder/images/'.$new);
			}else{
				$original_image = imagecreatefromgif('../public_folder/images/'.$new);
			}
				$original_width = imagesx($original_image);
				$original_height = imagesy($original_image);
					
				$ratio = $max_resolution / $original_width;
				$new_width = $max_resolution;
				$new_height = $original_height * $ratio;
				if($new_height > $max_resolution){
					$ratio = $max_resolution / $original_height;
					$new_height = $max_resolution;
					$new_width = $original_width * $ratio;
				}
					
				if($new_height > $max_resolution){
					$ratio = $max_resolution / $original_height;
					$new_height = $max_resolution;
					$new_width = $original_width * $ratio;
				}
					
				if($original_image){
					$newimage = imagecreatetruecolor($new_width, $new_height);
					imagecopyresampled($newimage,$original_image, 0,0,0,0, $new_width, $new_height, $original_width, $original_height);						
					if($file_text1 == 'jpeg' || $file_text1 == 'jpg'){
					    imagejpeg($newimage,'../public_folder/images/'.$new);
                    }else if($file_text1 == 'png'){			
                        imagepng($newimage,'../public_folder/images/'.$new);
					}else{
						imagegif($newimage,'../public_folder/images/'.$new);
					}	
				}				
			}
		}
		
	if(isset($_FILES['img1']['name'])){
		$img1 = uniqid().$_FILES['img1']['name'];
		move_uploaded_file($_FILES['img1']['tmp_name'],'../../public_folder/images/'.$img1);
		$filePart = explode('.', $_FILES['img1']['name']);
		$ext = end($filePart);
		resize_image($img1,"500",$ext);
	}
	if(isset($_FILES['img2']['name'])){
		$img2 = uniqid().$_FILES['img2']['name'];
		move_uploaded_file($_FILES['img2']['tmp_name'],'../../public_folder/images/'.$img2);
		$filePart = explode('.', $_FILES['img2']['name']);
		$ext = end($filePart);
		resize_image($img2,"500",$ext);
	}
	if(isset($_FILES['img3']['name'])){
		$img3 = uniqid().$_FILES['img3']['name'];
		move_uploaded_file($_FILES['img3']['tmp_name'],'../../public_folder/images/'.$img3);
		$filePart = explode('.', $_FILES['img3']['name']);
		$ext = end($filePart);
		resize_image($img3,"500",$ext);
	}
	if(isset($_FILES['img4']['name'])){
		$img4 = uniqid().$_FILES['img4']['name'];
		move_uploaded_file($_FILES['img4']['tmp_name'],'../../public_folder/images/'.$img4);
		$filePart = explode('.', $_FILES['img4']['name']);
		$ext = end($filePart);
		resize_image($img4,"500",$ext);
	}
	if(isset($_FILES['img5']['name'])){
		$img5 = uniqid().$_FILES['img5']['name'];
		move_uploaded_file($_FILES['img5']['tmp_name'],'../../public_folder/images/'.$img5);
		$filePart = explode('.', $_FILES['img5']['name']);
		$ext = end($filePart);
		resize_image($img5,"500",$ext);
	}
	if(isset($_FILES['img6']['name'])){
		$img6 = uniqid().$_FILES['img6']['name'];
		move_uploaded_file($_FILES['img6']['tmp_name'],'../../public_folder/images/'.$img6);
		$filePart = explode('.', $_FILES['img6']['name']);
		$ext = end($filePart);
		resize_image($img6,"500",$ext);
	}
	if(isset($_FILES['img7']['name'])){
		$img7 = uniqid().$_FILES['img7']['name'];
		move_uploaded_file($_FILES['img7']['tmp_name'],'../../public_folder/images/'.$img7);
		$filePart = explode('.', $_FILES['img7']['name']);
		$ext = end($filePart);
		resize_image($img7,"500",$ext);
	}
	if(isset($_FILES['img8']['name'])){
		$img8 = uniqid().$_FILES['img8']['name'];
		move_uploaded_file($_FILES['img8']['tmp_name'],'../../public_folder/images/'.$img8);
		$filePart = explode('.', $_FILES['img8']['name']);
		$ext = end($filePart);
		resize_image($img8,"500",$ext);
	}
	
    $result= "INSERT INTO blogs(`Blog_Id`, `img1`, `heading1`, `content1` , `img2`, `heading2`, `content2`, `img3`, `heading3`, `content3`, `img4`, `heading4`, `content4`, `img5`, `heading5`, `content5`, `img6`, `heading6`, `content6`, `img7`, `heading7`, `content7`, `img8`, `illustration`, `date`)
	VALUES 
	('$id', '$img1', '$heading1', '$content1', '$img2', '$heading2', '$content2', '$img3', '$heading3', '$content3','$img4', '$heading4', '$content4', '$img5', '$heading5', '$content5', '$img6', '$heading6', '$content6', '$img7', '$heading7', '$content7', '$img8', '$IllustrationCont', NOW())";
	if(mysqli_query($con,$result)){
	    $res= "INSERT INTO blog_keys(`post_Id`, `blog_keys`) VALUES ('$id', '$Tags')";
		if(mysqli_query($con,$res)){
			echo "Submitted";
		}else{
			echo "Fail to Submit";
		}
	}	
}
?>

