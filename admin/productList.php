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
	<link rel="stylesheet" href="css/listingProduct.css">
	<link rel='stylesheet' href='../libraries/swiper-bundle.min.css'>
	<script src="../libraries/jQuery.min.js"></script>
</head>
<script>
function curpercent(){
	$('.loaders').css('display','none');
}
</script>
<body style="overflow:hidden;">
<!-- Uploading PopUp Model -->
    <div class="uploader_progressBar" style="display:none;">
	    <div class="upload-msg">Uploading...</div>
		<div class="spinner fas fa-circle-notch fa-spin" style="text-align:center;"></div>
    </div>
<div class="shadow" style="display: none;"></div>
<div class="container-fluid"  id="MainBody">
	<div class="row main_Body_content">
		<?php include 'includePages/AdminHeader.php'; ?>
		<div class="col-md-12 colo-lg-12 col-xl-12 col-12 main_container">
			<div class="row col-lg-7 col-12 page2 webPages parent_listingProduct page2_content">
				<!-- FIRST ROW-->
<div class="col-7 first-form-col">
<div class="row">
<div class="col-3">
	<div class="collectionBox">
		<div class="sliderHeader">
			<div class="slider-Head-left">
				<i class="fas fa-tag"></i> <span class="list20">Sale</span>
			</div>
			<div>
				<i class="fas fa-bookmark slider-Head-right"></i>
			</div>
		</div>
		<div class="sliderImgContainer">
			<img src="../web_folder/placeholder.jpg" class="sliderImage">
		</div>
		<div class="collectionBottom">
			<div class="ColproductTitle list2">
				Wedding Ring
			</div>
			<div class="midTitle list20">Diamond Ring for wedding</div>
			<div class="col-product-rating">
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star"></i>
				<i class="fas fa-star-half-alt"></i>
				<span>4.7(21)</span>
			</div>
			<div class="swiper-bottom">
				<div class="offer-price">
					<span class="list4">$50.00</span>
					<span class="prev-price">
						<del class="list3">$.55.00</del>
					</span>
				</div>
				<div class="slider-cart-btn">
					Add <i class="fas fa-cart-plus"></i>
				</div>
			</div>
		</div>
	</div>
</div>

<!--SECOND ROW -->
<div class="col-9" style="overflow-y: auto;height: 90vh;">
	<div class="col-xl-12 col-lg-12" id="mainBodyContainer" style="height:auto;background: white;width: 100%;padding-left: 0px;">
				<div class="card-wrapper">
					<div class="card">
						<!-- card left -->
						<div class="product-imgs">
							<div class="img-display">
								<div class="img-showcase">
									<img src="../web_folder/placeholder.jpg" alt="shoe image" class="mainImg">
								</div>
							</div>
							<div id="slider-wrapper">
								<div id="slider">
									<img src="../web_folder/placeholder.jpg" alt="shoe image" class="thumbnail active activeImage">
									<img src="../web_folder/placeholder.jpg" alt="shoe image" class="thumbnail">
									<img src="../web_folder/placeholder.jpg" alt="shoe image" class="thumbnail">
									<img src="../web_folder/placeholder.jpg" alt="shoe image" class="thumbnail">
									<img src="../web_folder/placeholder.jpg" alt="shoe image" class="thumbnail">
									<img src="../web_folder/placeholder.jpg" alt="shoe image" class="thumbnail">
								</div>
							</div>
						</div>
						<!-- card right -->
						<div class="product-content">
							<h2 class="product-title list2"> Ring</h2>
							<div class="product-rating">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star-half-alt"></i>
								<span>4.7(21)</span>
							</div>
							<div class="product-price">
								<div class="last-price"><span>$<span class="list3">257.00</span></span></div>
								<div class="new-price"><span class="productPrice">$<span class="list4">249.00 </span><span class="discountPer">(5%)</span></span></div>
							</div>
							<p style="font-weight: 400;font-size: 13px;">Estimate Shipping Date: <span class="DeliveryDate">27 July 2024</span></p>
							<p class="availibility">Available</p>
							
							<div class="details-heading">
								item details
								<span class="fas fa-chevron-down rotated"></span>
							</div>
							
							<div class="shortDetails productShortDetails" style="display: block;">
								<div><b> Category: </b><span class="list1"> Shoes</span></div>
								<div><b> Collection Name:</b> <span class="list8"> Wedding Ring </span></div>
								<div><b> Material:</b> <span class="list7"> Metal </span></div>
								<div><b> Theme:</b> <span class="list9"> Vintage </span></div>
								<div><b> Color:</b> <span class="list10"> Golden </span></div>
								<div><b> Size:</b> <span class="list11"> Mefium </span></div>
							</div>
							
							<div class="details-heading">
								Protection And Return Policies
								<span class="fas fa-chevron-down rotated"></span>
							</div>
							<div class="shortDetails" style="display: block;">
								<div class="protectionLink"><img src="../web_folder/delivery.png" style="width:30px;"> <span class="returnPolicyDays">Hassle free 7 days Return &amp; exchange </span><span style="color:blue;"><u>know our protetion</u></span></div>
							</div>
							
							<div class="details-heading">
								Delivery policies
								<span class="fas fa-chevron-down"></span>
							</div>
							<div class="shortDetails" style="display: block;">
								<div><img src="../web_folder/delivery2.png" style="width:30px;"> Estimate Shipping Date:<u style="text-decoration: none;border-bottom: 1px dashed #2e2c2c;margin-left: 5;" class="DeliveryDate"> 27 July 2024</u></div>
								<div><img src="../web_folder/fast-delivery.png" style="width:30px;"> Shipping Area: <span class="list14"> All over the world </span></div>
								<div><img src="../web_folder/cost.png" style="width:30px;"><u style="text-decoration: none;border-bottom: 1px dashed #2e2c2c;margin-left: 5;" class="list15"> Free Shipping</u></div>
							</div>
							
							<div class="dispatch-add">
								Dispatch from <span class="list16">Hungry</span>
							</div>
							
							<div class="product-detail">
								<h5>Products Details: </h5>
								<p class="list17">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo eveniet veniam tempora fuga
								tenetur placeat sapiente architecto illum soluta consequuntur, aspernatur quidem at sequi ipsa!
								Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, perferendis eius.
								Dignissimos, labore suscipit. Unde.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!--THIRD ROW FOR FORM-->
<div class="col-5 third-form-col">
<form id="listingForm"> 
	<div class="col form">
		<div class="container-Payment">
			<div class="row" id="payment2">
				<div class="col">
					<h6 class="form_mini_header">List Your Products <div class="max fas fa-expand"></div> <div class="min fas fa-compress"></div></h6>
					<div class="row rows">
						<div style="margin-bottom:40px;">
							<div class="col-12 proImage_sec">
								<label>Profile Image<span>*</span></label>
								<input class="form-control list proImage" id="proImage" type="file" hidden></input><br>
								<div class="proImgButton">Profile</div>
								<div class="veiwProPic" style=""><img class="ProPic" src="../web_folder/placeholder.jpg"></div>
							</div>
							
							<div class="col-12 alt_sec">
								<label for="alt">images Alt Name<span>*</span></label>
								<input value="" class="form-control list alt" data-list="0" type="text" id="alt" name="alt" placeholder="Please Enter Profile Image Alt Name">
							</div>
						</div>
						
						<div class="profileImg" style="display:none">
							<img src="" class="ProImg" alt="" style="margin-bottom:2px;display:block;">
							<span onclick="ProimgDel(6)" class="imgDel ProImgDel">×</span>
						</div>
						 
						<div style="margin-bottom:10px;">
							<div class="col-12 multipleImages_sec">
								<label>Multiple Images<span>*</span></label>
								<input class="form-control list multipleImages" id="multipleImages" type="file" multiple hidden></input><br>
								<div class="multipleImgButton">Select Multiple Images</div>
								<div class="error error_multipleImages"><span></span><div class="ErrorPointer"></div></div>
								<div class="mulImg"></div>
							</div>
							<div class="row altTags_sec" style="margin-top:-20px;">
								<div class="col-md-12 col-12 tags_div altTags_sec">
									<label for="tags">Images Alt Tags (Press enter or add a comma after each tag)<span>*</span></label><br>
									<div class="alt-container">
										<div class="tagsCon"></div>
										<input class="form-control altTags" type="text" id="altTags" placeholder="Create tag">
										<div id="hiddenTags"></div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-12 category_sec">
							<label>Category:</label>
							<select class="form-control list category" data-list="1" id="category">
								<option value="">Select Category</option>
								<?php 
									require_once('../database/connection.php');
									$categories = mysqli_query($con, "SELECT * FROM `categories` WHERE status !='inactive'");
									while($row = mysqli_fetch_array($categories)){
								?>	
									<option value="<?php echo $row['id'] ?>"><?php echo $row['category'] ?></option>
								<?php } ?>
							</select>
						</div>
						
						
						<div class="col-12 subcategory_sec">
							<label>Sub Category:</label>
							<select class="form-control list subcategory" data-list="0" id="subcategory">
								<option value="">Select Sub Category</option>
							</select>
						</div>
						
						<div class="col-12 ProductName_sec">
							<label for="ProductName">Product Name<span>*</span></label>
							<input value="" class="form-control list productName" data-list="2" type="text" id="ProductName" name="ProductName" placeholder="Enter Product Name">
							<div class="error error_productName"><span></span><div class="ErrorPointer"></div></div>
						</div>
						
						<div class="col-12 short_desc_sec">
							<label for="shrotDesc">Product Short Descripton (Only 15 Charectors)<span>*</span></label>
							<input value="" class="form-control list short_desc" data-list="20" type="text" id="short_desc" name="shrotDesc" placeholder="Enter Short Descripton (15 charectors)">
							<div class="error error_short_desc"><span></span><div class="ErrorPointer"></div></div>
						</div>
						
						<div class="col-12 currencyForm">
							<div class="currency">
								<span class="Currency-text">USD $ </span>
								<span class="fas fa-caret-down"></span>
							</div>
							<div class="currency-dropdown">
								<div>INR ₹</div>
								<div>USD $</div>
							</div>
						</div>
						
						
						<div class="col-sm-6 oldPrice_sec">
							<label for="oldPrice">Old Price<span>*</span></label>
							<input value="" class="form-control list oldPrice" data-list="3" type="number" id="oldPrice" name="oldPrice" placeholder="Invetment Company">
							<div class="error error_oldPrice"><span></span><div class="ErrorPointer"></div></div>
						</div>

						<div class="col-sm-6 newPrice_sec">
							<label for="price">New Price</label>
							<input class="form-control list text-right newPrice" type="number"  data-list="4" name="price" id="newPrice" placeholder="Best In The World">
							<div class="error error_newPrice">
								<span></span><div class="ErrorPointer"></div>
							</div>
						</div>
						
						<div class="col-sm-6 deliveryDate_sec">
							<label>Estimate Delivery Days</label>
							<input class="form-control text-right deliveryDate" type="number" id="deliveryDate" name="" placeholder="Best In The World">
							<div class="error error_deliveryDate"><span></span><div class="ErrorPointer"></div></div>
						</div>
						
						<div class="col-sm-6 inStock_sec">
							<label>In Stock</label>
							<input value="" class="form-control text-right inStock" type="number" id="inStock_sec" name="" placeholder="Best In The World">
							<div class="error error_inStock"><span></span><div class="ErrorPointer"></div></div>
						</div>
						
						<div class="col-sm-12 col-pad material_sec">
							<label for="mtr">Material<span>*</span></label>
							<input class="form-control list material" type="text" data-list="7" id="material_sec" name="mtr" placeholder="Enter the Product Material"></input>
							<div class="error error_material"><span></span><div class="ErrorPointer"></div></div>
						</div>
						
						<div class="col-sm-6 col-pad theme_sec">
							<label for="theme">Theme<span>*</span></label>
							<input class="form-control list theme" data-list="9" type="text" id="theme_sec" name="theme" placeholder="What is the the theme of the Product"></input>
							<div class="error error_theme"><span></span><div class="ErrorPointer"></div></div>
						</div>
						
						<div class="col-sm-6 col-pad color_sec">
							<label for="color">Color<span>*</span></label>
							<input class="form-control list color" type="text" data-list="10" id="color_sec" name="color" placeholder="Enter Product Color"></input>
							<div class="error error_color"><span></span><div class="ErrorPointer"></div></div>
						</div>
						
						<div class="col-sm-6 col-pad size_sec">
							<label for="size">Size<span>*</span></label>
							<input rows="3" class="form-control list size" type="number" data-list="11" id="size_sec" name="size" placeholder="Enter Product Size"></input>
							<div class="error error_size"><span></span><div class="ErrorPointer"></div></div>
						</div>
						
						<div class="col-sm-6 col-pad RnA_sec">
							<label for="RnA">Return And Exchange<span>*</span></label>
							<input class="form-control list RnA" type="number" id="RnA_sec" data-list="12" name="RnA" placeholder="Mention Return and Exchange days Limit"></input>
							<div class="error error_RnA"><span></span><div class="ErrorPointer"></div></div>
						</div>
						
						<div class="col-sm-6 col-pad shippingCharge_sec">
							<label for="adr">Shipping Charges<span>*</span></label>
							<input rows="3" class="form-control list shippingCharge" type="number" id="shippingCharge_sec" data-list="15" name="BusModel" placeholder="Enter Shipping Charges"></input>
							<div class="error error_shippingCharge"><span></span><div class="ErrorPointer"></div></div>
						</div>
						
						<div class="col-sm-6 col-pad dispatchFrom_sec">
							<label for="dispFrom">Dispatch From<span>*</span></label>
							<input class="form-control list dispatchFrom" type="text" id="dispatchFrom_sec" data-list="16" name="dispFrom" placeholder=""></input>
							<div class="error error_dispatchFrom"><span></span><div class="ErrorPointer"></div></div>
						</div>
						
						<div class="col-sm-6 col-pad sale_sec">
							<label for="dispFrom">Offer/Sale Tag<span>*</span></label>
							<input class="form-control list sale" type="text" id="sale_sec" data-list="20" placeholder=""></input>
							<div class="error error_dispatchFrom"><span></span><div class="ErrorPointer"></div></div>
						</div>
						
						<div class="col-sm-6 col-pad show_sec">
							<label for="show">Show Product As<span>*</span></label>
							<select class="form-control list show" data-list="0" id="show">
								<option value="">Show This Product As</option>
								<option value="1">Best Selling Product</option>
								<option value="2">Deal Of the day</option>
							</select>
						</div>
						
						<div class="col-sm-12 col-pad longDesc_sec">
							<label for="lngDsc">Product Descripton<span>*</span></label>
							<textarea rows="3" class="form-control list longDesc" type="text" id="longDesc_sec" data-list="17" name="lngDsc" placeholder="Enter Product Long Description"></textarea>
							<div class="error error_longDesc"><span></span><div class="ErrorPointer"></div></div>
						</div>
						<br><br><br><br>
					</div>
				</div>
			</div>
			<h5 class="msg"></h5>
		</div>
	</div>
	
	<div class="col form tagContainer">
		<div class="container-Payment">
			<div class="row" id="payment2">
				<div class="col">
					<h6 class="form_mini_header">SEO Meta Tags</h6>
					<div class="row tags_sec">
						<div class="col-md-12 col-12 tags_div tags_sec">
							<label for="tags">Press enter or add a comma after each tag<span>*</span></label><br>
							<div class="tags-container">
								<div class="tagsCon_sec"></div>
								<input class="form-control tags" type="text" id="tags" data-form="sec" placeholder="Create tag">
								<div id="hiddenTags"></div>
							</div>
							<p class="counter_parent"><span class="counters">20</span><span> Tags Are Remaining</span></p>
						</div>
						<div class="row" tabindex="-1" style="margin: auto;text-align:center;">
							<div class="col" style="text-alig:center;">
								<input data-seq="sec" name="submit" value="Submit" class="btn">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--<div class="col form tagContainer">
		<div class="container-Payment">
			<div class="row" id="payment2">
				<div class="col">
					<h6 class="form_mini_header">Review & Rating</h6>
					<div class="row tags_sec">
						
						<div class="col-sm-6 col-pad reviewer_sec">
							<label for="mtr">Reviewer Name<span>*</span></label>
							<input class="form-control list reviewer" type="text" data-list="0" id="reviewersec" placeholder="Enter the Reviewer Name"></input>
						</div>
						
						<div class="col-sm-6 col-pad rating_sec">
							<label for="rating">Rating<span>*</span></label>
							<select class="form-control list rating" data-list="0" id="rating">
								<option value="5">5</option>
								<option value="4">4</option>
								<option value="3">3</option>
								<option value="2">2</option>
								<option value="1">1</option>
							</select>
						</div>
						
						<div class="col-sm-12 col-pad review_sec">
							<label for="review">Review / Comment<span>*</span></label>
							<input class="form-control list review" type="text" data-list="0" id="review" placeholder="Please share your Experience"></input>
						</div>
						
						<div class="row" tabindex="-1" style="margin: auto;text-align:center;">
							<div class="col" style="text-alig:center;">
								<input data-seq="sec" name="submit" value="Submit" class="btn">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>-->
	</form>
</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" type="javascript">curpercent();</script>
<!--<script src="js/config.js"></script>
<script src="../js/regular.js"></script>-->
<script src="js/listingProduct.js"></script>
<script src="../libraries/bootstrap/bootstrap.min.js"></script>

</body>