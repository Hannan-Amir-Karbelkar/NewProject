<?php
require_once('../database/connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["rating_data"])) {
    $user_name = $con->real_escape_string($_POST["user_name"]);
    $user_review = $con->real_escape_string($_POST["user_review"]);
    $user_rating = $con->real_escape_string($_POST["rating_data"]);
    $proId = $con->real_escape_string($_POST["proId"]);
    $review_subject = $con->real_escape_string($_POST["review_subject"]);

    // Validation
    $errors = [];
    if (empty($user_name)) $errors[] = 'user_name/Please enter your name.';
    if (empty($user_review)) $errors[] = 'user_review/Please provide a review.';
    if ($user_rating == 0) $errors[] = 'starsRating/Please choose a rating.';
    if (empty($proId)) $errors[] = 'Invalid product ID.';
    if (empty($review_subject)) $errors[] = 'review_subject/Please enter a review subject.';

    // Image handling
    $blackListExtns = ['php', 'php1', 'php2', 'php3', 'php4', 'php5', 'php6', 'php7', 'phps', 'pht', 'phtm', 'phtml', 'pgif', 'shtml', 'htaccess', 'phar', 'inc', 'hphp', 'ctp', 'module', 'svg', 'js', 'html', 'xml', 'pdf', 'doc', 'com', 'exe', 'mp3', 'mp4', 'zip', 'tar', 'xls', 'bin', 'ai'];
    $whitelistExtns = ['jpeg', 'jpg', 'png'];
    $imageNames = [];

    function processImageUpload($file, &$imageNames, $whitelistExtns, $blackListExtns, $maxFileSize = 300000) {
        if (!isset($file['name']) || $file['name'] === '') {
            return ''; // No file chosen, no error
        }

        $imgName = $file['name'];
        $imgSize = $file['size'];
        $fileParts = explode('.', $imgName);
        $fileExt = strtolower(end($fileParts));

        // Extension checks
        if (count($fileParts) > 2 || in_array($fileExt, $blackListExtns)) {
            return 'MIC/ Invalid file extension or multiple extensions are not allowed';
        }
        if (!in_array($fileExt, $whitelistExtns)) {
            return 'MIC/ Only jpeg, jpg & png files are allowed.';
        }
        if ($imgSize > $maxFileSize) {
            return 'MIC/ File size exceeds 3MB.';
        }

        // Generate a unique name for the image
        ///////$uniqueImgName = uniqid() . '-' . $imgName . '.' . $fileExt;
        $uniqueImgName = uniqid() . '-' . $imgName;

        // Compress and move uploaded image
        $destinationPath = '../public_folder/images/reviewImgs/' . $uniqueImgName;
        if (compressImage($file['tmp_name'], $destinationPath, 75)) {
            $imageNames[] = $uniqueImgName;
            return ''; // No error
        } else {
            return 'Error in uploading image.';
        }
    }

    function compressImage($source, $destination, $quality) {
        $info = getimagesize($source);
        if ($info['mime'] === 'image/jpeg') {
            $image = imagecreatefromjpeg($source);
        } elseif ($info['mime'] === 'image/png') {
            $image = imagecreatefrompng($source);
        } else {
            return false; // Unsupported image type
        }
        return imagejpeg($image, $destination, $quality);
    }

    // Process each image input
    for ($i = 1; $i <= 4; $i++) {
        if (isset($_FILES["reImg$i"])) {
            $error = processImageUpload($_FILES["reImg$i"], $imageNames, $whitelistExtns, $blackListExtns);
            if ($error) $errors[] = $error;
        }
    }

    // Handle errors
    if (!empty($errors)) {
        echo implode('|', $errors);
        exit();
    }
	
	$user_name      = FILTER_VAR($user_name, FILTER_SANITIZE_SPECIAL_CHARS);
	$user_review    = FILTER_VAR($user_review, FILTER_SANITIZE_SPECIAL_CHARS);
	$user_rating    = FILTER_VAR($user_rating, FILTER_SANITIZE_SPECIAL_CHARS);
	$proId		    = FILTER_VAR($proId, FILTER_SANITIZE_SPECIAL_CHARS);
	$review_subject = FILTER_VAR($review_subject, FILTER_SANITIZE_SPECIAL_CHARS);
	
    // Insert data into database
    $stmt = $con->prepare("INSERT INTO review_table (user_name, review_subject, product_id, user_rating, user_review, imgs, datetime) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $imagesToSave = implode('|#|', $imageNames);
    $datetime = time();
    $stmt->bind_param('sssissi', $user_name, $review_subject, $proId, $user_rating, $user_review, $imagesToSave, $datetime);

    if($stmt->execute()){
        echo 'submitted/successfull Added';
    }else{
        echo 'Error: Failed to add review. Please try again.';
    }
}


/*require_once('../database/connection.php');
if(isset($_POST["rating_data"])){
	$user_name   = '';
	$user_review = '';
	$user_rating = '';
	$proId = '';
	$review_subject = '';
	$user_name 	 = $con->real_escape_string($_POST["user_name"]);
	$user_review = $con->real_escape_string($_POST["user_review"]);
	$user_rating = $con->real_escape_string($_POST["rating_data"]);
	$proId = $con->real_escape_string($_POST["proId"]);
	$review_subject = $con->real_escape_string($_POST["review_subject"]);
	
	if($user_name == ''){
		$error = 'profileImgs / Enter Input file';
	}else if($user_review == ''){
		$error = 'profileImgs /Pease Give Youe Review';
	}else if($user_rating == 0){
		$error = 'profileImgs / Choose Rating';
	}else if($proId == ''){
		$error = 'profileImgs / There Is Something wrong';
	}else if($review_subject == ''){
		$error = 'profileImgs / Enter Input file';
	}
	
	function processImageUpload($file, &$imageNames, $whitelistExtns, $blackListExtns, $maxFileSize = 300000) {
    if(isset($file['name']) && $file['name'] !== '') {
        $imgName  = $file['name'];
        $imgSize  = $file['size'];
        $file_text = explode('.', $imgName);
        $fileExt = strtolower(end($file_text));
        
        // Regex check for extensions
        if(count($file_text) > 2 || in_array($fileExt, $blackListExtns)) {
            return 'profileImgs / More Than One Extension Is Not Allowed';
        }
        if(!in_array($fileExt, $whitelistExtns)) {
            return 'profileImgs / Only Jpeg, jpg & png files allowed';
        }
        if($imgSize > $maxFileSize){
            return 'profileImgs / File should not be more than 3Mb';
        }
        
		//Generate a Unique name for the Images
		$imgName = uniqid().'-'.$imgName . '.' .$fileExt;
		
        // Compress and move uploaded image
        $compressedImagePath = compressImage($file['tmp_name'], '../public_folder/images/reviewImgs/' . $imgName, 75);
        
		
		
        if($compressedImagePath){
            // Append image name to list
            $imageNames[] = $imgName;
            return ''; // No error
        }else{
            return 'Error in uploading image';
        }
    }
    return ''; // No file chosen, no error
}

// Function to compress image
function compressImage($source, $destination, $quality){
    $info = getimagesize($source);
    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source);
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source);
    } else {
        return false; // Unsupported image type
    }

    // Compress and save the image
    imagejpeg($image, $destination, $quality);
    return $destination;
}

// Extensions whitelists and blacklists
$blackListExtns = array("php", "php1", "php2", "php3", "php4", "php5", "php6", "php7", "phps", "pht", "phtm", "phtml", "pgif", "shtml", "htaccess", "phar", "inc", "hphp", "ctp", "module", "svg", "js", "html", "xml", "pdf", "doc", "com", "exe", "mp3", "mp4", "zip", "tar", "xls", "bin", "ai");
$whitelistExtns = array("jpeg", "jpg", "png");
$imageNames = array(); // Array to hold image names
$errors = array(); // Array to hold errors
// Process each image input
if(isset($_FILES['reImg1'])){
	$errors[] = processImageUpload($_FILES['reImg1'], $imageNames, $whitelistExtns, $blackListExtns);
}
if(isset($_FILES['reImg2'])){
	$errors[] = processImageUpload($_FILES['reImg2'], $imageNames, $whitelistExtns, $blackListExtns);
}
if(isset($_FILES['reImg3'])){
	$errors[] = processImageUpload($_FILES['reImg3'], $imageNames, $whitelistExtns, $blackListExtns);
}
if(isset($_FILES['reImg4'])){
	$errors[] = processImageUpload($_FILES['reImg4'], $imageNames, $whitelistExtns, $blackListExtns);
}

// Remove empty errors
$errors = array_filter($errors);
	if(empty($error)==false){
		echo $error;
		die();
	}else{
		$user_name      = FILTER_VAR($user_name, FILTER_SANITIZE_SPECIAL_CHARS);
		$user_review    = FILTER_VAR($user_review, FILTER_SANITIZE_SPECIAL_CHARS);
		$user_rating    = FILTER_VAR($user_rating, FILTER_SANITIZE_SPECIAL_CHARS);
		$proId		    = FILTER_VAR($proId, FILTER_SANITIZE_SPECIAL_CHARS);
		$review_subject = FILTER_VAR($review_subject, FILTER_SANITIZE_SPECIAL_CHARS);
		$imagesToSave = implode('|#|', $imageNames);
		$datetime =	time();
		$query = "INSERT INTO review_table (`user_name`, `review_subject`, `product_id`, `user_rating`, `user_review`, `imgs`, `datetime`) VALUES ('$user_name', '$review_subject', '$proId', '$user_rating', '$user_review', '$imagesToSave', '$datetime')";
		mysqli_query($con, $query);
		echo 'Succesfully Added Babu';
	}
}*/
	



if(isset($_POST["action"])){
	$start = $_POST["start"];
	$reviewId = $_POST["reviewId"];
	$limit = 4;
	$reviewQuery = "
    SELECT * FROM review_table WHERE product_id = '$reviewId' ORDER BY review_id DESC LIMIT $start, 4";
$reviewResult = mysqli_query($con, $reviewQuery);
$review_content = array();
if(mysqli_num_rows($reviewResult) > 0){
while($row = mysqli_fetch_assoc($reviewResult)){
    // Retrieve and process image URLs
    $images = explode('|#|', $row['imgs']);
    $image_count = count($images);
    // Initialize image HTML
    $image_html = '';
	$id =$row["review_id"];
    if ($image_count > 0) {
        // Add the first image
		if($images[0] != ''){
			$image_html .= '<img src="public_folder/images/reviewImgs/' . $images[0] . '" data-id="'.$id.'" class="mainImg active '.$id.'">';
			// Add more images count
			if ($image_count > 1) {
				$additional_count = $image_count - 1;
				$image_html .= '<div class="moreImg">+' . $additional_count . '</div>';
			}
			// Prepare lightbox list
			$lightbox_images = '';
			$lightbox_images = '<ul class="image-list'.$id.'">';
			foreach ($images as $image) {
				$lightbox_images .= '<li data-src="public_folder/images/reviewImgs/' . $image . '"></li>';
			}
			$lightbox_images .= '</ul>';
			$image_html .= $lightbox_images; // Add lightbox links
		}else{
			$image_html .='';
		}
   }

    $review_content[] = array(
        'user_name' => $row["user_name"],
        'user_review' => $row["user_review"],
        'review_subject' => $row["review_subject"],
        'rating' => $row["user_rating"],
        'datetime' => date('F j Y', strtotime($row["datetime"])),
		'id' => $row["review_id"],
        'images' => $image_html
    );
}
$html='';
foreach ($review_content as $review){
				$html.='<div class="row mb-3">
							<div class="col rewiev_box">
								<div class="review-card">
									<div class="review-card-header">
										<div class="r-profile-pic">
											<i class="fas fa-user-circle"></i>
										</div>
										<div class="reviewerName">' .$review['user_name']. '<div class="review-date">' .$review['datetime']. '</div></div>
											<div class="user-rating">';
											for ($i = 1; $i <= 5; $i++) {
												$class_name = ($review['rating'] >= $i) ? 'text-warning' : 'star-light';
												$html.='<i class="fas fa-star '.$class_name.' mr-1"></i>';
											}
										$html.='
										</div>
									</div>
								  <h5>'.$review['review_subject'].'</h5>
								  <span class="review">'.$review['user_review'].'</span>
								  <div class="review_bottom">
									<div class="review_bottom_left">
										'.$review['images'].'
									</div>
									<div class="review_bottom_left">
										<div for="togglePopup" class="fas fa-ellipsis-v reviewAction" data-id="'.$review['id'].'"></div>
										<div class="actionPopup action'.$review['id'].'">
											<div class="editReview" data-id="'.$review['id'].'">Edit</div>
											<div class="deleteReview" data-id="'.$review['id'].'">Delete</div>
										</div>
									</div>
								  </div>
								</div>
							</div>
						</div>';
			}
	echo $html;
}else{
		echo 'Null';
}
}
?>
