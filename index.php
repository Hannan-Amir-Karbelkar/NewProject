
<?php
require_once('database/connection.php');
session_start(); 
$page = $_GET['page'] ?? 'index';
/*$pageTitle = 'Bellezzasss';
$pageDescription = 'Bellezza Online jewellery Shopping website';*/

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
        $pageTitle = 'bellezza.com';
        $pageDescription = 'bhag be Welcome to our jewelry store.';
        break;
}
if(isset($_POST['start'])){
	$start = $_POST['start'];
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
	<link rel="icon" type="image/png" href="/bellezza/web_folder/cart.png">
	<link rel="stylesheet" href="/bellezza/libraries/bootstrap/bootstrap5.min.css">
	<link rel="stylesheet" href="/bellezza/libraries/Font-Awesome/css/all.min.css">	
	<link rel='stylesheet' href='/bellezza/libraries/swiper-bundle.min.css'>
	<link rel="stylesheet" href="/bellezza/css/index.css">
	<link rel="stylesheet" href="/bellezza/css/cart.css">
	<script>
	
	</script>
	<script src="/bellezza/libraries/jQuery.min.js"></script>
	<script src='/bellezza/libraries/swiper-bundle.min.js'></script>
</head>
<body style="overflow:hidden;">
<?php include 'models/popup_modals.php'; ?>
<?php include 'included_Pages/skeleton.php'; ?> 
<?php include 'included_Pages/preloader.php'; ?> 
<div class="container-fluid"  id="MainBody">
	<div class="row main_Body_content">	
		<?php include 'included_pages/sidebar.php'; ?>
		<div class="col-md-12 colo-lg-12 col-xl-12 col-12 main_container">
			<div id="app">
				<div id="content-collections" class="page-content" style="display: none;"></div>
				<div id="content-product" class="page-content" style="display: none;"></div>
				<div id="content-myorder" class="page-content" style="display: none;"></div>
				<div id="content-about-us" class="page-content" style="display: none;"></div>
				<div id="content-index" class="page-content page">
				<?php
				}
				if(isset($_POST["mydata"]) || $start == 0){
					if($start == 0){
	$html='
	<div class="col-12 categoryHeader">
		<div class="jewelryDropBtn">Jewelry
			<div class="category_dropdown">';
			// Fetch Categories & Sub-Categories with a limit of 4
			$query = "SELECT * FROM `categories` WHERE status != 'INACTIVE'";
			$result = mysqli_query($con, $query);
			while($row = mysqli_fetch_array($result)){
				$id =$row["id"];
				$category =$row["category"];
				$html.='<div class="" data-src="">
					<div> '.$category.' </div>
					<ul>
						<li class="actionBtn" data-src="collections" data-name="'.$category.'" data-id="'.$id.'" data-type="CANGECAT" data-cat="Cat" data-mainId="">All '.$category.'</li>';
						$quer = "SELECT subcategory.* FROM `subcategory` WHERE cat_id = '$id'";
						$res = mysqli_query($con, $quer);
						while($rows = mysqli_fetch_array($res)){
							$sub_category =$rows["sub_category"];
							$sc_id =$rows["id"];
						$html.='
							<li class="actionBtn" data-src="collections" data-name="'.$sub_category.'" data-id="'.$sc_id.'" data-mainId="'.$id.'" data-type="CANGECAT" data-cat="subCat">'.$sub_category.'</li>';
						}
					$html.='</ul>
				</div>';
					}
				$html.='
			</div>
		</div>
		<div class="actionBtn" data-src="collections" data-name="Best Seller" data-id="'.$id.'" data-type="BS">Best Sellers</div>
		<div class="actionBtn" data-src="about-us">About Us</div>
	</div>
	
	<!-- Banner -->
	<div class="home-banner">
		<img src="/bellezza/public_folder/images/tomato.jpeg" class="banner-image">
	</div>
	
	
		
		
			<!-- TRENDING PRODUCTS SECTION -->
				<div class="trendingSection">
					<div class="ProductHeading">
						TRENDING PRODUCTS
					</div>
					<div class="trendingProCards">
						<div class="trendingCard actionBtn" data-src="collections" data-name="Bracelet" data-id="1" data-type="CANGECAT" data-cat="Cat" data-mainId="" style="position: relative;">
							<img src="/bellezza/public_folder/images/tomato.jpeg" class="trendingImg" style="height: 100%;">
							<div class="trendingDescript" style="position: absolute;width: 100%;top: 80%;">
								<div class="DescriptTitle" style="border-bottom: none;color: black;background: beige;padding: 5px;">BRACELETS</div>
							</div>
						</div>
						<div class="trendingCard actionBtn" data-src="collections" data-name="Rings" data-id="2" data-type="CANGECAT" data-cat="Cat" data-mainId="" style="position: relative;">
							<img src="/bellezza/public_folder/images/Chiku.jpeg" class="trendingImg" style="height: 100%;">
							<div class="trendingDescript" style="position: absolute;width: 100%;top: 80%;">
								<div class="DescriptTitle" style="border-bottom: none;color: black;background: beige;padding: 5px;">RINGS</div>
							</div>
						</div>
						<div class="trendingCard actionBtn" data-src="collections" data-name="Bengles" data-id="3" data-type="CAT" data-cat="Cat" data-mainId="" style="position: relative;">
							<img src="/bellezza/public_folder/images/lemon.jpeg" class="trendingImg" style="height: 100%;">
							<div class="trendingDescript" style="position: absolute;width: 100%;top: 80%;">
								<div class="DescriptTitle" style="border-bottom: none;color: black;background: beige;padding: 5px;">BENGLES</div>
							</div>
						</div>
						<div class="trendingCard actionBtn" data-src="collections" data-name="Neckless" data-id="4" data-type="CAT" data-cat="Cat" data-mainId="" style="position: relative;">
							<img src="/bellezza/public_folder/images/nature.jpg" class="trendingImg" style="height: 100%;">
							<div class="trendingDescript" style="position: absolute;width: 100%;top: 80%;">
								<div class="DescriptTitle" style="border-bottom: none;color: black;background: beige;padding: 5px;">NECKLESS</div>
							</div>
						</div>
					</div>
				</div>
				
		<!-- SWIPER SLIDER FOR BEST SELLER-->
				<div class="dealContainer">
					<div class="ProductHeading">
						BEST SELLER
					</div>
					<div class="swiperContainers swiper">
						<div class="home-slide-container">
							<div class="card-wrapper swiper-wrapper">';
							$query = "SELECT product_id, productName, profileImage, proAlt, descriptionImages, short_desc,oldPrice, newPrice, showIn, inStock FROM products";
							$result = mysqli_query($con, $query);
							while($row = mysqli_fetch_array($result)){
								$product_id = $row['product_id'];
								$productName = $row['productName'];
								$profileImage = $row['profileImage'];
								$proAlt = $row['proAlt'];
								$descriptionImages = $row['descriptionImages'];
								$short_desc = $row['short_desc'];
								$oldPrice = $row['oldPrice'];
								$newPrice = $row['newPrice'];
								$showIn = $row['showIn'];
								$inStock = $row['inStock'];
						
								if($showIn == 1){
									$showIn = 'Best Selling Product';
								}else if($showIn == 2){
									$showIn = 'Deal Of the day';
								}else{
									$showIn = '';
								}
								
								$html.='<div class="card swiper-slide actionBtn productAction" data-id="'.$product_id.'" data-src="product">
									<div class="slider-card">';
									if($showIn !=''){
									$html.='<div class="dealheader">'.$showIn.'</div>';
									}
									$html.='<div class="sliderImgContainer">
											<img src="/bellezza/public_folder/images/'.$profileImage.'" alt="'.$proAlt.'" class="sliderImage">
										</div>
										<div class="slider-bottom-section">
											<div class="product-rating ml-5 txt-l">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
											<div class="slider-product-name ml-5 txt-l">'.$productName.'</div>
											<div class="slider-short-desc ml-5 txt-l">'.$short_desc.'</div>
											<div class="stock-avlb ml-5 txt-l">
													<span class="text-success">In Stock</span><span> 13 Products</span>
												</div>
											<div class="slider-price-sec">
												<div class="slider-offer-price">
													$50.00
												</div>
												<div class="del-text">
													<del>$.'.$oldPrice.'</del>
												</div>
											</div>
										</div>
                                    </div>
								</div>';
					}
					$html.='
							</div>
						<div class="swiper-pagination4"></div>
					</div>
				</div>
				
				<!-- Masonry Gallery -->
				<div class="masonry-gallery">
					<div class="masonry-images row-2 col-2 actionBtn" data-src="collections" data-name="Rings" data-id="1" data-type="SBCAT" style="background-image: url(/bellezza/public_folder/images/Tomato.jpeg)">Rings</div>
					<div class="masonry-images actionBtn" data-src="collections" data-name="Rings" data-id="2" data-type="SBCAT" style="background-image: url(/bellezza/public_folder/images/nature.jpg)">Bangels</div>
					<div class="masonry-images actionBtn" data-src="collections" data-name="Rings" data-id="3" data-type="SBCAT" style="background-image: url(/bellezza/public_folder/images/Chiku.jpeg)">Bracelets</div>
					<div class="masonry-images actionBtn" data-src="collections" data-name="Rings" data-id="4" data-type="SBCAT" style="background-image: url(/bellezza/public_folder/images/Vegetables3.png)"></div>
					<div class="masonry-images row-2 col-2 actionBtn" data-src="collections" data-name="Rings" data-id="5" data-type="SBCAT" style="background-image: url(/bellezza/public_folder/images/jam.png)"></div>
					<div class="masonry-images row-2 row-md-1 actionBtn" data-src="collections" data-name="Rings" data-id="6" data-type="SBCAT" style="background-image: url(/bellezza/public_folder/images/lemon.jpeg)"></div>
					<div class="masonry-images actionBtn" data-src="collections" data-name="Rings" data-id="1" data-type="SBCAT" style="background-image: url(/bellezza/public_folder/images/chiku2.jpeg)"></div>
					<div class="masonry-images actionBtn" data-src="collections" data-name="Rings" data-id="2" data-type="SBCAT" style="background-image: url(/bellezza/public_folder/images/Garlic.jpeg)"></div>
				</div>
				<script>


var swiper = new Swiper(".home-slide-container", {
  slidesPerView: 3,
  spaceBetween: 9,
  loop: true,
  sliderPerGroup: 3,
  centerSlide: true,
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".swiper-pagination4",
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
</script>';
		echo $html;
	}
	}else{
		if($start > 0){
			echo '
				
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
							<div class="footerContent actionBtn myOrder" data-src="myorder">My Orders</div> 
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
<script src="/bellezza/libraries/bootstrap/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>