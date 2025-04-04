<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
	//$userName = $_SESSION['USN'];
	//$ProfileImg = $_SESSION['PRP'];
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Index.php</title>
	<link rel="stylesheet" href="../libraries/bootstrap/bootstrap5.min.css">
	<link rel="stylesheet" href="../libraries/Font-Awesome/css/all.min.css">
	<link rel="stylesheet" href="css/admin.css">
	<link rel='stylesheet' href='../libraries/swiper-bundle.min.css'>
	
	
	<script>
	function deleteHistory(){
		window.history.pushState(null, null, window.location.href);
	}
	</script>
	<script src="../libraries/jQuery.min.js"></script>
	<script src='../libraries/swiper-bundle.min.js'></script>
</head>
<script>
function curpercent(){
	$('.loaders').css('display','none');
}
</script>

<body style="overflow:hidden;">
<div class="shadow" style="display: none;"></div>

<div class="container-fluid"  id="MainBody">
<!-- Uploading PopUp Model -->
    <div class="uploader_progressBar" style="display:none;">
	    <div class="upload-msg">Uploading...</div>
		<div class="spinner fas fa-circle-notch fa-spin" style="text-align:center;"></div>
    </div>
	<div class="row main_Body_content">
		<?php include 'includePages/AdminHeader.php'; ?>
		<div class="col-md-12 colo-lg-12 col-xl-12 col-12 main_container">
			<div class="row page1 webPages parent_page1">
				<div class="col-12 page1_content" style="padding:0px;">
				
				
				
				
				<div class="dashboardSidebar col-3">
	<div class="sideProNameCon">
		<div class="SideImgContainer">
			<img src="../public_folder/images/ring2.jpeg" class="profile_image" alt="">
		</div>
		<div class="SideNameContainer">Welcome Azman Amiruddin Karbelkar</div>
	</div>
	
	<nav class="adminSidebarContent">
		<ul>
		<a href="productList.php"><li class="dash linkBtn productListing"><i class="fas fa-box"></i><span> Product Entry Master</span></li></a>
		<a href="category.php"><li class="dash linkBtn categoryListing" data-src="page3" data-id="984589834282"><i class="fas fa-table"></i><span> Product Master</span></li></a>
		<li class="dash"><i class="fas fa-table"></i><span> Category Master</span></li>
		<li class="dash"><i class="fas fa-cogs"></i><span> Order Management</span></li>
		<li class="dash"><i class="fas fa-anchor"></i><span> Payment Management</span></li>
		<li class="dash"><i class="fas fa-building"></i><span> Bamk Manegement</span></li>
		</ul>
	</nav>
</div>
<div class="col-9" style="margin-left: 25%;margin-top: 50px;padding: 10px;">
	<div class="card-body-- chartHeader" style="font-size:19px;width:100%;background:orange;padding:5px;display:flex;justify-content: space-between;">
		<div class="box-title">Dash Board <span class="fas fa-anchor fa-20px text-info-600"></span></div>
		<div class="date">Fri/Jun/28.  07:30:18AM</div>   
	</div>
	
	<!-- CHART MAIN BODY -->
	<div class="col-12" style="display:flex;flex-wrap: wrap; justify-content: space-around;">
		<div class="col-xl-2 col-md-4 mb-4 mt-4 shadow chartBoxContainer">
			<div class="chartBoxText orderText">TOTAL ORDERS</div>
			<div>
				<span class="chartBoxNum">3 <span class="fas fa-box"></span></span>
			</div>
		</div>
		
		<div class="col-xl-2 col-md-4 mb-4 mt-4 shadow chartBoxContainer">
			<div class="chartBoxText orderText">TODAY'S SALE</div>
			<div>
				<span class="chartBoxNum">$ 8000 <span class="fas fa-envelope"></span></span>
			</div>
		</div>
		
		<div class="col-xl-2 col-md-4 mb-4 mt-4 shadow chartBoxContainer">
			<div class="chartBoxText orderText">7 DAYS SALE</div>
			<div>
				<span class="chartBoxNum">$. 30000 <span class="fas fa-box"></span></span>
			</div>
		</div>
		
		<div class="col-xl-2 col-md-4 mb-4 mt-4 shadow chartBoxContainer">
			<div class="chartBoxText orderText">MONTHLY SALE</div>
			<div>
				<span class="chartBoxNum">$. 897666 <span class="fas fa-box"></span></span>
			</div>
		</div>
		
		<div class="col-xl-2 col-md-4 mb-4 mt-4 shadow chartBoxContainer">
			<div class="chartBoxText orderText">YEARLY SALE</div>
			<div>
				<span class="chartBoxNum">$.8347835729 <span class="fas fa-box"></span></span>
			</div>
		</div>
	</div>
</div>
				
				
				
				
				</div>
			</div>

			<!--<div class="row col-lg-7 col-12 page2 webPages parent_listingProduct page2_content"></div>
			<div class="row page3 webPages parent_category page3_content"></div>
			<div class="row page4 webPages parent_MyInvestments page4_content"></div>
			<div class="row page5 webPages parent_FundSubscription fund-section page5_content">
			</div>
			<div class="row page6 webPages parent_AccountSetting page6_content"></div>
			<div class="row page7 webPages parent_orderInfo page7_content"></div>
			<div class="row page8 webPages parent_About page8_content"></div>
			<div class="row page9 webPages parent_Contact page9_content"></div>
			<div class="row page10 webPages parent_Terms&Conditions page10_content"></div>
			<div class="row page11 webPages parent_AdvertisementForm page11_content"></div>
			<div class="row page12 webPages parent_Notification">
				<div class="container-fluid" style="padding: 25px;">
					<ul class='notificationBar page12_content'></ul>
				</div>
				<div class="row page13 webPages parent_news page13_content"></div>
			</div>-->
		</div>
	</div>
<script type="text/javascript" type="javascript">curpercent();</script>
<script src="js/config.js"></script>
<script src="../js/regular.js"></script>
<script src="../libraries/bootstrap/bootstrap.min.js"></script>

</body>