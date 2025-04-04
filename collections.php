<?php
require_once('database/connection.php');
session_start(); 
$page = $_GET['page'] ?? 'colllections';
/*$pageTitle = 'Bellezza';
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
        $pageTitle = 'Bellezza';
        $pageDescription = 'Bellezza Online jewellery Shopping website.';
        break;
}
if(isset($_POST['start'])){
	//$name = '';
	$start = $_POST['start'];
	$limit = $_POST['limit'];
	$categoryId = $_POST['proId'];
	$name  = $_POST['name'];
	$type  = $_POST['type'];
}
$is_ajax_request = isset($_SERVER['HTTP_X_REQUESTED_WITH'])&& strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])==='xmlhttprequest';
if(!$is_ajax_request){
$_POST["mydata"]=true;
$start = 0;
$limit = 2;
?>
<!DOCTYPE html>
<html lang="eng">
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
	<script src="/bellezza/libraries/jQuery.min.js"></script>
	<script src='/bellezza/libraries/swiper-bundle.min.js'></script>
</head>
<script>

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
				<div id="content-index" class="page-content" style="display: none;"></div>
				<div id="content-product" class="page-content" style="display: none;"></div>
				<div id="content-myorder" class="page-content" style="display: none;"></div>
				<div id="content-about-us" class="page-content" style="display: none;"></div>
				<div id="content-collections" class="page-content" style="display: none;">
				<?php
				}
				//if(isset($_POST["mydata"]) || $start == 0){
			$html='';
			if($start == 0){ 
			$html.='<div class="col-xl-8 col-lg-8" id="mainBodyContainer">
			<div class="pageIndicatorContainer">
				<div class="IndicatorLeftSide">
					<span class="fas fa-chevron-left leftIndicator"></span>';
					$html.='<span>'.$name.'</span>
				</div> 
				<div class="IndicatorRightSide filter">
					Sort<span class="leftIcons fas fa-exchange-alt"></span>
					<div class="sort-dropdown">
						<div class="sortfeatures">Featured</div>
						<div class="sortfeatures">Alphabetically A-Z</div>
						<div class="sortfeatures">Alphabetically Z-A</div>
						<div class="sortfeatures">Price, low to high</div>
						<div class="sortfeatures">Price, high to low</div>
						<div class="sortfeatures">Date, old to new</div>
						<div class="sortfeatures">Date, new to old</div>
					</div>
				</div>
			</div>
			<div class="collection-main-container">
				<div class="sidebar">
					<div class="sidebar-content">Best Selling Products</div>';
					$queries = "SELECT * FROM categories WHERE status!='INACTIVE'";
					$rest = mysqli_query($con, $queries);
					if(mysqli_num_rows($rest) > 0 ){
						while($row1 = mysqli_fetch_array($rest)){
						$html.='
						<div class="sidebar-content" data-id="'.$row1['id'].'">'.$row1['category'].'</div>';
						}
					}
					$html.='
					</div>';
					
			}
			echo $html;

				?>
			</div>
		</div>
				<?php
				//if(!$is_ajax_request){
				if($is_ajax_request && $start == 0 || !$is_ajax_request){
				?>
				<div class="footerContainer" style="width: 100%;margin-left: 180px;display:none;">
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
				</div>
				
				<?php if(!$is_ajax_request){ ?>	
				
			</div>
		</div>
		<?php include 'included_Pages/header-bottom_bar.php'; ?>
	</div>
</div>
</div>

<!--<script type="text/javascript" type="javascript">curpercent();</script>-->
<script src="/bellezza/js/common.js"></script>
<script src="/bellezza/js/regular.js"></script>
<script src='/bellezza/js/collections.js'></script>
<script src="/bellezza/libraries/bootstrap/bootstrap.min.js"></script>
</body>
</html>
				<?php } } ?>