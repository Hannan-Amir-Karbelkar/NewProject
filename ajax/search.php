<?php
if(isset($_POST['searchField'])){
	$searchField = FILTER_VAR($_POST["searchField"], FILTER_SANITIZE_SPECIAL_CHARS);
	if(!empty($searchField)){
		require_once('../database/connection.php');
		$sql="SELECT DISTINCT `company_listing`.Post_Id, `company_listing`.Com_Name, `company_listing`.category, `company_listing`.profile_img FROM `company_listing`
		WHERE Post_Id IN(SELECT post_Id FROM `tags` WHERE `tags`.tags LIKE '%$searchField%' || `tags`.`description` LIKE '%$searchField%'
		|| `company_listing`.`Com_Name` LIKE '%$searchField%' || `company_listing`.`category` LIKE '%$searchField%')
		GROUP BY company_listing.id LIMIT 7";
        $result = mysqli_query($con, $sql);
		$html ='';
		while($row = mysqli_fetch_assoc($result)){
            $post_Id = $row['Post_Id'];
			$Com_Name = $row['Com_Name'];
			$category = $row['category'];
			$profile_img = $row['profile_img'];

            $POST_ID = str_replace("POST-", '', $post_Id);
            //$encript_method = (($POST_ID*178697658536*26463648826541)/302);
            $encript_method = (($POST_ID*1252)/313);
	    	$base_encription = urldecode(base64_encode($encript_method));
            $html.='<li class="list-group-item link-class search-list btn_load_screen" data-src="businessPage?id='.$base_encription.'"><img src="public_folder/images/'.$profile_img.'" height="40" width="40" class="img-thumbnail" /><span style="color:grey;margin-left: 5px;">'.$Com_Name.' |  '.$category.' </span></li>';
		}
		echo $html;
	}
}

if(isset($_POST['expression'])){
	$expression = FILTER_VAR($_POST["expression"], FILTER_SANITIZE_SPECIAL_CHARS);
	if(!empty($expression)){
		require_once('../database/connection.php');
	    $sql="SELECT DISTINCT `blog_keys`.post_id, `blog_keys`.blog_keys FROM `blog_keys`
		WHERE `blog_keys`.blog_keys LIKE '%$expression%' 
		GROUP BY blog_keys.id order by rand() LIMIT 3";
        $result = mysqli_query($con, $sql);
		$html ='';
		while($row = mysqli_fetch_assoc($result)){
            $post_Id = $row['post_id'];
			$blog_keys = $row['blog_keys'];
            
			$array = explode("*", $blog_keys);
			for($i = 0; $i < count($array); $i++){
				$POST_ID = str_replace("BID-", '', $post_Id);
				//$encript_method = (($POST_ID*178697658536*26463648826541)/302);
				$encript_method = (($POST_ID*1252)/313);
				$base_encription = urldecode(base64_encode($encript_method));
				$html.='<li class="list-group-item link-class search-list btn_load_screen" data-src="tradeBlogs?id^'.$base_encription.'"><span class="fas fa-bolt" style="color:orange;"></span><span class="text-muted"> '.$array[$i].'</span></li>';
			}
		}
		echo $html;
	}
}

if(isset($_POST['InnerExpression'])){
	$InnerExpression = FILTER_VAR($_POST["InnerExpression"], FILTER_SANITIZE_SPECIAL_CHARS);
	//echo $InnerExpression;
	if(!empty($InnerExpression)){
		require_once('../database/connection.php');
	    $sql="SELECT DISTINCT `blog_keys`.post_id, `blog_keys`.blog_keys FROM `blog_keys`
		WHERE `blog_keys`.blog_keys LIKE '%$InnerExpression%' 
		GROUP BY blog_keys.id order by rand() LIMIT 3";
        $result = mysqli_query($con, $sql);
		$html ='';
		while($row = mysqli_fetch_assoc($result)){
            $post_Id = $row['post_id'];
			$blog_keys = $row['blog_keys'];
            
			$array = explode("*", $blog_keys);
			for($i = 0; $i < count($array); $i++){
				$POST_ID = str_replace("BID-", '', $post_Id);
				//$encript_method = (($POST_ID*178697658536*26463648826541)/302);
				$encript_method = (($POST_ID*1252)/313);
				$base_encription = urldecode(base64_encode($encript_method));
				$html.='<li class="list-group-item link-class search-list inner_search" data-src="'.$base_encription.'"><span class="fas fa-bolt" style="color:orange;"></span><span class="text-muted"> '.$array[$i].'</span></li>';
			}
		}
		echo $html;
	}
}
?>
