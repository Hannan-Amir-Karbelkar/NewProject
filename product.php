<?php
require_once('database/connection.php');
session_start(); 
//print_r($_SESSION);
$page = $_GET['page'] ?? 'product';
//print_r($_GET['page'] ?? 'product');
if(isset($_POST['start'])){
	$productId = $_POST['proId'];
	$start = $_POST['start'];
}else{
	$productId = isset($_GET['id']) ? $_GET['id']:'';
	$start = 0;
	//print_r($productId);
} 
/*if(isset($_GET['id'])){
	$productId =$_GET['id'];
	$start = 0;
}else{
	$productId = $_POST['proId'];
	$start = $_POST['start'];
}*/
// Fetch rating summary
$ratingSummaryQuery = "
    SELECT 
        COUNT(*) as total_reviews,
        SUM(CASE WHEN user_rating = 5 THEN 1 ELSE 0 END) as five_star,
        SUM(CASE WHEN user_rating = 4 THEN 1 ELSE 0 END) as four_star,
        SUM(CASE WHEN user_rating = 3 THEN 1 ELSE 0 END) as three_star,
        SUM(CASE WHEN user_rating = 2 THEN 1 ELSE 0 END) as two_star,
        SUM(CASE WHEN user_rating = 1 THEN 1 ELSE 0 END) as one_star,
        AVG(user_rating) as average_rating
    FROM review_table
    WHERE product_id ='$productId'
";
$ratingSummaryResult = mysqli_query($con, $ratingSummaryQuery);
$ratingSummary = mysqli_fetch_assoc($ratingSummaryResult);

// Assign values
$total_review = $ratingSummary['total_reviews'];
$five_star_review = $ratingSummary['five_star'];
$four_star_review = $ratingSummary['four_star'];
$three_star_review = $ratingSummary['three_star'];
$two_star_review = $ratingSummary['two_star'];
$one_star_review = $ratingSummary['one_star'];
$average_rating = number_format($ratingSummary['average_rating'], 1);

// Fetch reviews with a limit of 4
$reviewQuery = "SELECT * FROM review_table WHERE product_id = '$productId' ORDER BY review_id DESC LIMIT 4";
$reviewResult = mysqli_query($con, $reviewQuery);
$review_content = array();

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
			$image_html .= '<img src="/bellezza/public_folder/images/reviewImgs/' . $images[0] . '" data-id="'.$id.'" class="mainImg active '.$id.'">';
			// Add more images count
			if ($image_count > 1) {
				$additional_count = $image_count - 1;
				$image_html .= '<div class="moreImg">+' . $additional_count . '</div>';
			}
			// Prepare lightbox list
			$lightbox_images = '';
			$lightbox_images = '<ul class="image-list'.$id.'">';
			foreach ($images as $image) {
				$lightbox_images .= '<li data-src="/bellezza/public_folder/images/reviewImgs/' . $image . '"></li>';
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
$fullStars = floor($average_rating);
$halfStar = $average_rating - $fullStars;

$sub_category='';
if(isset($_POST["mydata"]) || $start == 0){
	if($start == 0){
		$today = date("Y-m-d");
		$query = "SELECT * FROM products WHERE product_id='$productId'";
		$result = mysqli_query($con, $query);
		$row = mysqli_fetch_assoc($result);
		$product_id=$row['product_id'];	
		$category=$row['category'];	
		$sub_category=$row['sub_category'];	
		$productName=$row['productName'];			
		$profileImage=$row['profileImage'];				
		$proAlt=$row['proAlt'];
		$images=explode('#',$row['images']);		
		$altTags=explode('*',$row['altTags']);
		$descriptionImages=explode('#',$row['descriptionImages']);		
		$desImagesAlt=explode('*',$row['desImagesAlt']);
		$short_desc=$row['short_desc'];				
		$oldPrice=$row['oldPrice'];
		$oldPrice = number_format($oldPrice, 2);
		$newPrice=$row['newPrice'];
		$newPrice = number_format($newPrice, 2);
		$deliveryDate=$row['deliveryDate'];	
		$delivery_date = date("j F Y", strtotime($today. "+$deliveryDate days"));
		$inStock=$row['inStock'];	
		$material=$row['material'];	
		$theme=$row['theme'];	
		$color=$row['color'];	
		$size=$row['size'];	
		$RnE=$row['RnE'];
		$shippingCharge=$row['shippingCharge'];	
		$dispatchFrom=$row['dispatchFrom'];	
		$sale=$row['sale'];	
		$showIn=$row['showIn'];	
		$longDesc=$row['longDesc'];	
		$currency=$row['currency'];	
		$tags=$row['tags'];	
		if($inStock == 0){
			$inStock ='Out Of Stock';
		}else if($inStock > 0){
			$inStock = $inStock.' In Stock';
		}else{
			$inStock = 'Available';
		}
		if($RnE == 0){
			$RnE = 'Return & Exchange Policy Is not Available';
		}else if($RnE > 0){
			$RnE = 'Hassle free ' .$RnE. ' days Return &amp; exchange';
		}
		if($currency == 0){
			$currency = '$';
		}else{
			$currency = '₹';
		}
	}
}
$res = mysqli_query($con, "SELECT * FROM subcategory WHERE id='$sub_category'");
$num_rows = mysqli_num_rows($res);
if($num_rows > 0){
$rows = mysqli_fetch_assoc($res);
$sub_category=$rows['sub_category'];	
switch ($page) {
    case 'collections':
        $pageTitle = 'Collections';
        $pageDescription = 'Explore our exclusive collections.';
        break;
    case 'product':
        $pageTitle = 'Product Details';
        $pageDescription = 'Detailed view of our products.';
        break;
    default:
        $pageTitle = $sub_category;
        $pageDescription = $longDesc;
        break;
}
}

$is_ajax_request = isset($_SERVER['HTTP_X_REQUESTED_WITH'])&& strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])==='xmlhttprequest';
if(!$is_ajax_request){
$_POST["mydata"]=true;
$start = 0;
?>

<!DOCTYPE html>
<html lang="ent">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($pageDescription); ?>">
	<link rel="icon"type="image/png" href="/bellezza/web_folder/cart.png">
	<link rel="stylesheet" href="/bellezza/libraries/bootstrap/bootstrap5.min.css">
	<link rel="stylesheet" href="/bellezza/libraries/Font-Awesome/css/all.min.css">	
	<link rel='stylesheet' href='/bellezza/libraries/swiper-bundle.min.css'>
	<link rel="stylesheet" href="/bellezza/css/index.css">
	<link rel="stylesheet" href="/bellezza/css/cart.css">
	<script src="/bellezza/libraries/jQuery.min.js"></script>
	<script src='/bellezza/libraries/swiper-bundle.min.js'></script>
</head>
<script>
isCommonCssJsLoaded = true;
</script>
<body style="overflow:hidden;">
<?php include 'models/popup_modals.php'; ?>
<?php include 'included_Pages/skeleton.php'; ?> 
<?php include 'included_Pages/preloader.php'; ?> 
<div class="container-fluid"  id="MainBody">
	<div class="row main_Body_content">	
		<?php include 'included_pages/sidebar.php'; ?>
		<div class="col-md-12 colo-lg-12 col-xl-12 col-12 main_container">
			<div id="app">
				<div id="content-collections" class="page-content content-collections" style="display: none;"></div>
				<div id="content-index" class="page-content content-index" style="display: none;"></div>
				<div id="content-myorder" class="page-content" style="display: none;"></div>
				<div id="content-about-us" class="page-content" style="display: none;"></div>
				<div id="content-product" class="page-content content-product">
				
				<?php
				}
				if(isset($_POST["mydata"]) || $start == 0){
					if($start == 0){
/*$today = date("Y-m-d");

$query = "SELECT * FROM products WHERE product_id='$productId'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
	$product_id=$row['product_id'];	
	$category=$row['category'];	
	$sub_category=$row['sub_category'];	
	$productName=$row['productName'];			
	$profileImage=$row['profileImage'];				
	$proAlt=$row['proAlt'];
	$images=explode('#',$row['images']);		
	$altTags=explode('*',$row['altTags']);
	$descriptionImages=explode('#',$row['descriptionImages']);		
	$desImagesAlt=explode('*',$row['desImagesAlt']);
	$short_desc=$row['short_desc'];				
	$oldPrice=$row['oldPrice'];
	$oldPrice = number_format($oldPrice, 2);
	$newPrice=$row['newPrice'];
	$newPrice = number_format($newPrice, 2);
	$deliveryDate=$row['deliveryDate'];	
	$delivery_date = date("j F Y", strtotime($today. "+$deliveryDate days"));
	$inStock=$row['inStock'];	
	$material=$row['material'];	
	$theme=$row['theme'];	
	$color=$row['color'];	
	$size=$row['size'];	
	$RnE=$row['RnE'];
	$shippingCharge=$row['shippingCharge'];	
	$dispatchFrom=$row['dispatchFrom'];	
	$sale=$row['sale'];	
	$showIn=$row['showIn'];	
	$longDesc=$row['longDesc'];	
	$currency=$row['currency'];	
	$tags=$row['tags'];	
	
	if($inStock == 0){
		$inStock ='Out Of Stock';
	}else if($inStock > 0){
		$inStock = $inStock.' In Stock';
	}else{
		$inStock = 'Available';
	}
	
	if($RnE == 0){
		$RnE = 'Return & Exchange Policy Is not Available';
	}else if($RnE > 0){
		$RnE = 'Hassle free ' .$RnE. ' days Return &amp; exchange';
	}
	
	if($currency == 0){
		$currency = '$';
	}else{
		$currency = '₹';
	}**/
	$html='';
$html.='<div class="col-xl-12 col-lg-12" id="mainBodyContainer">
		<input type="text" class="proId" value="'.$product_id.'" name="proId" hidden></input>
			<div class="pageIndicatorContainer">
				<div class="IndicatorLeftSide"><span class="fas fa-chevron-left leftIndicator"></span>'.$sub_category.'</div>
				<div class="IndicatorRightSide filter">Filter<span class="leftIcons fas fa-sort-amount-down-alt"></span></div>
			</div>
			<div class="col-xl-12 col-lg-12" id="mainBodyContainer" style="height:auto;background: white;width: 100%;padding-left: 0px;">
				<div class="card-wrapper">
					<div class = "card">
						<!-- card left -->
						<div class = "product-imgs">
							<div class = "img-display">
								<div class = "img-showcase">
									<img src = "/bellezza/public_folder/images/'.$profileImage.'" alt="'.$proAlt.'" data-id="proid" class="mainImg">
								</div>
							</div>
							
							
							<div id="slider-wrapper">
								<div class="itemSliderArrow SliderArrowLeft" id="SliderArrowLeft">
									<span class="fas fa-chevron-left" style="line-height: 15px;"></span>
								</div>
								<div id="slider">
									<img src = "/bellezza/public_folder/images/'.$profileImage.'" alt='.$proAlt.' class="thumbnail activeImageproid">';
									foreach($images as $key=> $image){
										if(!empty($image)){
											$html.='<img src = "/bellezza/public_folder/images/'.$image.'" alt = "'.$altTags[$key].'" class="thumbnail" data-id="proid">';
										}
									}
									$html.='
								</div>';
								$html.='<div class="itemSliderArrow SliderArrowRight" id="SliderArrowRight">
											<span class="fas fa-chevron-right" style="line-height: 15px;"></span>
										</div>';
							$html.='</div>
						</div>
						<!-- card right -->
						<div class = "product-content">
							<h2 class = "product-title">'.$productName.'</h2>
							<div class = "product-rating">';
								for ($i = 1; $i <= 5; $i++){
									if ($i <= $fullStars){
										$html.='<i class="fas fa-star text-warning mr-1"></i>';
									}else if ($i == $fullStars + 1 && $halfStar > 0){
										$html.='<i class="fas fa-star-half-alt text-warning mr-1"></i>';
									}else{
										$html.='<i class="far fa-star star-light mr-1"></i>';
									}
								}
								$html.='
								<span>'.number_format($average_rating, 1).'('.$total_review.')</span>
							</div>
							<div class = "product-price">';
							if($oldPrice > 0){
								$html.='<p><span class = "last-price">'.$currency.''.$oldPrice.'</span>';
							}
								$html.='<span class = "new-price"><span class="productPrice">'.$currency.''.$newPrice.'';
							if($oldPrice > 0){
								$html.='<span class="percentage">(5%)</span>';
							}
								$html.='</span></span></p>
								<p style="font-weight: 400;font-size: 13px;">Estimate Shipping Date: '.$delivery_date.'</p>
								<p class="availibility">'.$inStock.'</p>
							</div>
							
							
							<div class="details-heading">
								item details
								<span class="fas fa-chevron-down"></span>
							</div>
							<div class="shortDetails productShortDetails">
								<div><b> Category: </b><span> '.$category.'</span></div>
								<div><b> Collection Name:</b> <span> '.$productName.' </span></div>
								<div><b> Material:</b> <span> '.$material.' </span></u></div>
								<div><b> Theme:</b> <span> '.$theme.' </span></u></div>
								<div><b> Color:</b> <span> '.$color.' </span></u></div>
								<div><b> Size:</b> <span> '.$size.' </span></u></div>
							</div>
							
							<div class="details-heading">
								Protection And Return Policies
								<span class="fas fa-chevron-down"></span>
							</div>
							<div class="shortDetails">
								<div class="protectionLink"><img src="/bellezza/web_folder/delivery.png" style="width:30px;"> '.$RnE.' <span style="color:blue;"><u>know our protetion</u></span></div>
							</div>
							
							<div class="details-heading">
								Delivery policies
								<span class="fas fa-chevron-down"></span>
							</div>
							<div class="shortDetails">
								<div><img src="/bellezza/web_folder/delivery2.png" style="width:30px;"> Estimate Shipping Date:<u style="text-decoration: none;border-bottom: 1px dashed #2e2c2c;margin-left: 5;"> '.$delivery_date.'</u></div>
								<div><img src="/bellezza/web_folder/fast-delivery.png" style="width:30px;"> Shipping Area: <span> All over the world </span></div>
								<div><img src="/bellezza/web_folder/cost.png" style="width:30px;"><u style="text-decoration: none;border-bottom: 1px dashed #2e2c2c;margin-left: 5;"> Free Shipping</u></div>
							</div>
							
							<div class="delivery-add">
								Deliver to USA, 402115
								<span class="fas fa-chevron-down"></span>
							</div>
							<div class="country-code-form">
								<label for="country-code-form" style="padding: 5px;">Country</label>
								<select id="country-code-form" class="form-control" style="margin-bottom: 10px;">
									<option>India</option>
									<option>USA</option>
									<option>Dubai</option>
									<option>South Africa</option>
									<option>Argentina</option>
									<option>UK</option>
									<option>Germany</option>
									<option>Germany</option>
								</select>
								<label for="country" style="padding: 5px;">Zip-code</label>
								<input id="country" class="form-control" style="margin-bottom: 10px;"  autocomplete="false">
								<button type="button" class="form-control" style="margin-bottom:10px;background:green;color:#fff;">Submit</button>
							</div>';
							if($dispatchFrom !=''){
							$html.='<div class="dispatch-add">
								Dispatch from '.$dispatchFrom.'
							</div>';
							}
							$html.='<div class = "product-detail">
								<h5>Products Details: </h5>
								<p>'.$longDesc.'</p>
								
								<span class="QtyHeading">Quantity</span>
								<div class="counterContainer proCount">
									<button class="counter-btn" onclick="handleCounterMinus(this)">-</button>
									<input class="counter" id="counter" value="1">
									<button class="counter-btn" onclick="handleCounterPlus(this)">+</button>
								</div>
							</div>
							<div class = "purchase-info">
								<!--<button type = "button" class = "btn cartButton">
									Add to Cart 
									<i class = "fas fa-shopping-cart"></i>
								</button>-->
								
								<button type = "button" class="btn cartButton" data-id="'.$product_id.'">
									<span class="add-to-cart">Add to Cart</span>
									<span class="added">Added</span>
									<i class = "fas fa-shopping-cart"></i>
									<i class = "fas fa-box"></i>
								</button>
								
								<button type = "button" class = "btn">Order Now</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="preview-box">
				<div class="details">
					<span style="margin-top: auto;" class="icon fas fa-times lightBox-close"></span>
					<span class="max fas fa-expand" style="font-size:20px;"></span>
					<span class="min fas fa-compress" style="font-size:20px;"></span>
						
				</div>
				<div class="image-box">
					<div class="slide prev"><i class="fas fa-angle-left"></i></div>
					<div class="slide next"><i class="fas fa-angle-right"></i></div>
					<img class="img-main" src="" alt="">
				</div>
				<input type="text" class="imgType" name="imgType" hidden></input>
			</div>
				
				<!-- Related Product First Slider --->
				<div class="ProductHeading">
					Related Products
					<p class="HeadShortTitle">Grap the deal now Hurry Up</p>
				</div>
				
					<div class="swiper">
						<div class="slide-container">
							<div class="swiper-wrapper">';
							$query = "SELECT * FROM products LIMIT 12";
							$result = mysqli_query($con, $query);
							if(mysqli_num_rows($result) > 0 ){
								while($row = mysqli_fetch_array($result)){
									$product_id=$row['product_id'];	
									$category=$row['category'];	
									$sub_category=$row['sub_category'];	
									$productName=$row['productName'];
									$sale=$row['sale'];		
									$profileImage=$row['profileImage'];				
									$proAlt=$row['proAlt'];
									$short_desc=$row['short_desc'];				
									$oldPrice=$row['oldPrice'];
									$oldPrice = number_format($oldPrice, 2);
									$newPrice=$row['newPrice'];
									$newPrice = number_format($newPrice, 2);
									$currency = $row['currency'];
						$html.='
								<div class="card swiper-slide">
									<div class="sliderCard">
										<div class="sliderHeader">';
											if($sale !=''){
											$html.='<div class="slider-Head-left">
												<i class="fas fa-tag"></i> '.$sale.'
											</div>';
											}
											$html.='<div>
												<i class="fas fa-bookmark slider-Head-right"></i>
											</div>
										</div>
										<div class="sliderImgContainer">
											<img src="/bellezza/public_folder/images/'.$profileImage.'" class="sliderImage">
										</div>
										<div class="slider-pro-name">'.$productName.'</div>
										<div class="pro-short-desc">'.$short_desc.'</div>
										<div class="rating-container">
											<div class="product-rating">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
										</div>
										<div class="swiper-bottom">
											<div class="offer-price">
												$'.$newPrice.'';
												if($oldPrice != 0.00){
										$html.='<span class="prev-price">
													<del>$'.$oldPrice.'</del>
												</span>';
												}
									$html.='</div>
											<div class="slider-cart-btn">
												Add <i class="fas fa-cart-plus"></i>
											</div>
										</div>
									</div>
								</div>';
						}
					}
					$html.='
							</div>
							<div class="swiper-pagination"></div>
						</div>
					</div>
					

<script>
var swiper = new Swiper(".slide-container", {
  slidesPerView: 3,
  spaceBetween: 9,
  loop: true,
  sliderPerGroup: 3,
  centerSlide: true,
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints: {
    0: {
      slidesPerView: 2,
	  spaceBetween: 5,
    },
    520: {
      slidesPerView: 3,
    },
    768: {
      slidesPerView: 4,
    },
    1000: {
      slidesPerView: 5,
    },
	1270: {
      slidesPerView: 6,
    },
  },
});
</script>			
			<!-- Full Product Images -->
			<div class="fullImgContainer">';
				foreach($descriptionImages as $key=> $descImage){
					if(!empty($descImage)){
						$html.='
						<div class="fullImgChild">
							<img src="/bellezza/public_folder/images/'.$descImage.'"  alt = "'.$desImagesAlt[$key].'" class="fullImg">
						</div>';
					}
				}
				$html.='</div>';
				
									
$html.='

	
	<!-- Return And Protection Section -->
	<div id="protection-container">
		<div class="protection-anim"><img src="/bellezza/web_folder/hand.png"></div>
		<div class="protection-header slogan">
			<h3>Shop confidently on Bellezza</h3>
			<p>knowing if something goes wrong with an order, we have got your back for all purchases</p>
		</div>
	</div>
	
	<div id="protection-sec-container">
		<div class="protection-header">
			<h5>Ballezza Order Protection</h5>
			<p>Easily get help in the rare case that something goes wrong when shopping from our shop</p>
			<h5>What is eligible</h5>
			<div>- Your item arrived damaged</div>
			<div>- Your item did not arrive or was lost in the mail</div>
			<div>- Your order does not match the item description or photos</div>
		</div>
	</div>
	
	<div class="refund-container">
		<p class="refund-heading">We are ready to help if something goes wrong. Here is how it works</p>
		<div id="protection-third-container">
			<div class="refund_process">
				
				<h3><span class="processNumber">1</span>Reach out to the customer operator</h3>
				<p>Send a request message and review the details to customer operator from the "Help with order" page if there is an issue. We will try our best to resolve the issue instantly</p>
			</div>
			<div class="refund_process">
				<h3><span class="processNumber">2</span>Confirmating the request</h3>
				<p>If your order is under the protection eligibility, you will receive an email confirmation</p>
			</div>
			<div class="refund_process">
				<h3><span class="processNumber">3</span>We will help you reach a resolution</h3>
				<p>Once your request is accepted you will be refunded for your purchase.</p>
			</div>
		</div>
	</div>';
		echo $html;
	}
	}else{
		if($start > 0){
			$html='';
			$html.='
			<!-- Review Section -->';
	$html.='<div class="container">
    	<div class="ratingCard">
    		<div class="rating-header">
				<div>Customer Reviews</div>
				<button type="button" name="add_review" id="add_review" class="btn">+Add Review</button>
    		</div>
    		<div class="cards-body">
    			<div class="row">
    				<div class="col-sm-4 text-center">
    					<h1 class="text-warning mt-4 mb-1">
    						<b class="totalRatingNum"><span id="average_rating">'.number_format($average_rating, 1).'</span> / 5</b>
    					</h1>	
						<div class="mb-1 totalStarRating">';
                        
                        for ($i = 1; $i <= 5; $i++){
                            if ($i <= $fullStars){
                                $html.='<i class="fas fa-star text-warning mr-1"></i>';
                            }else if ($i == $fullStars + 1 && $halfStar > 0){
                                $html.='<i class="fas fa-star-half-alt text-warning mr-1"></i>';
                            }else{
                                $html.='<i class="far fa-star star-light mr-1"></i>';
                            }
                        }
                    $html.='</div>
    					<h3 class="totalRevieve"><span id="total_review">'.$total_review.'</span> Review</h3>
    				</div>
    				
					<div class="col-sm-8">';
                    $stars = [5 => $five_star_review, 4 => $four_star_review, 3 => $three_star_review, 2 => $two_star_review, 1 => $one_star_review];
                    foreach ($stars as $rating => $count) {
                        $width = ($total_review > 0) ? ($count / $total_review) * 100 : 0;
                        $html.='<div class="progressContainer">
                                <div class="progress-label-left"><b>' . $rating . '</b> <i class="fas fa-star text-warning"></i></div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: ' . $width . '%;" aria-valuenow="' . $width . '" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="progress-label-right">(<span id="total_' . $rating . '_star_review">' . $count . '</span>)</div>
                              </div>';
                    }
                $html.='</div>
				</div>
    		</div>
    	</div>
		<div id="review_content">';
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
		$html.='</div>
				<div id="load_Comments_data_message">
					<div class="loadMoreCommets" data-review="'.$productId.'" data-start="4">
						<i class="fas fa-plus plus loaderDiv"></i>
					</div>
				</div>
    </div>



	<div id="review_modal" class="modal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Submit Review</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h4 class="text-center mt-2 mb-4" id="starsRating">
						<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
						<i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
						<i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
						<i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
						<i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
					</h4>
					<div class="form-group">
						<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
					</div>
					<div class="form-group">
						<input type="text" name="rev_heading" id="review_subject" class="form-control" placeholder="Enter Your review Subject" />
					</div>
					<div class="form-group">
						<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
					</div>
					
					
					
					
						<div class="multipleImgsContainer" id="MIC">
							<div style="background:#f5efef;height:120px;min-width:24%;">
								<div class="PreviewContainer prevcont1">
									<span class="fas fa-camera cam"></span>
								</div>
								<div class="addReviewImg" data-id="1">
									<div style="color:white;position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);" class="fas fa-plus"></div>
								</div>
							</div>
							<div style="background:#f5efef;height:120px;min-width:24%;">
								<div class="PreviewContainer prevcont2">
									<span class="fas fa-camera cam"></span>
								</div>
								<div class="addReviewImg addImg2" data-id="2">
									<div style="color:white;position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);" class="fas fa-plus"></div>
								</div>
							</div>
							<div style="background:#f5efef;height:120px;min-width:24%;">
								<div class="PreviewContainer prevcont3">
									<span class="fas fa-camera cam"></span>
								</div>
								<div class="addReviewImg addImg3" data-id="3">
									<div style="color:white;position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);" class="fas fa-plus"></div>
								</div>
							</div>
							<div style="background:#f5efef;height:120px;min-width:24%;">
								<div class="PreviewContainer prevcont4">
									<span class="fas fa-camera cam"></span>
								</div>
								<div class="addReviewImg addImg4" data-id="4">
									<div style="color:white;position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%);" class="fas fa-plus"></div>
								</div>
							</div>
						</div>
						<input type="file" class="reImg1" data-id="1" hidden></input>
						<input type="file" class="reImg2" data-id="2" hidden></input>
						<input type="file" class="reImg3" data-id="3" hidden></input>
						<input type="file" class="reImg4" data-id="4" hidden></input>
						<input type="number" class="starRating" val="0" hidden></input>
						
					
					<div class="form-group text-center mt-4">
						<button type="button" class="btn btn-primary" id="save_review">Submit</button>
					</div>
					<div class="error"></div>
				</div>
			</div>
		</div>
	</div>
	
	
			
			<!-- Footer -->
				<div class="footerContainer">
					<div class="footerFirstChild">
						<div class="footerLogoContainer">
							<div class="footerLogo">
								BRAND LOGO
							</div>
							<div class="footer-about-sec">
								<div class="footer-abt-head">About Us</div>
								<div class="footer-abt-text">We the people of India having solemnly resolved India into soveriegn sociolist secular and democratic and to secure its citizens Justice liberty equality and fraternity  We the people of India having solemnly resolved India into soveriegn sociolist secular and democratic and to secure its citizens Justice liberty equality and fraternity. We the people of India having solemnly resolved India into soveriegn sociolist secular and democratic and to secure its citizens Justice liberty equality and fraternity</div>
							</div>
						</div>
						<div class="footerTopRight">
							<div class="footerHeader">Quick Links</div>
							<div class="footerContent actionBtn myOrder" data-src="page7" data-id="984589834282">My Orders</div>
							<div class="footerContent">Profile</div>
							<div class="footerContent setting">Setting</div>
							<div class="footerContent actionBtn productListing" data-src="page8" data-id="984589834282">Admin</div>
						</div>
						<div class="footerBottonLeft">
							<div class="footerHeader">Contact Us</div>
							<div class="footerContent"><i class="fas fa-phone"></i> +99-8805449684</div>
							<div class="footerContent"><i class="fas fa-envelope"></i> karbelkar20@gmail.com</div>
						</div>
						<div class="footerBottonRight">
							<div class="footerHeader">Follow Us</div>
							<div class="footerSocialLinks">
								<div style="display:flex;margin: 5;margin-left: 40px;justify-content: flex-start;">
									<span class="fab fa-facebook-f" style="margin: 5px;"></span>
									<span class="fab fa-twitter" style="margin: 5px;"></span>
									<span class="fab fa-whatsapp" style="margin: 5px;"></span>
									<span class="fab fa-instagram" style="margin: 5px;"></span>
								</div>
							</div>
						</div>
					</div>
				</div></div>';
				echo $html;
		}
	}
	if(!$is_ajax_request){
	?>
				</div>
				
			</div>
		</div>
		<?php include 'included_Pages/header-bottom_bar.php'; ?>
	</div>
</div>


				
<!--<script type="text/javascript" type="javascript">curpercent();</script>-->
<script src="/bellezza/js/common.js"></script>
<script src="/bellezza/js/regular.js"></script>
<script src='/bellezza/js/businessPage.js'></script>
<script src="/bellezza/libraries/bootstrap/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>