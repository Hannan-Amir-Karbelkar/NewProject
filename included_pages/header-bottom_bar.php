<?php
if(isset($_SESSION['UMLIDLGZS'])){
	//$User_Id = $_SESSION['UMLIDLGZS'];
	
	
	$user_id = $_SESSION['UMLIDLGZS'];
	$user_id = base64_decode(urldecode($user_id));
	$user_id = (($user_id*240)/378720);
	$EncodedUserId = strpos($user_id, '.');
	if($EncodedUserId !==false){
		$user_id = ceil($user_id);
	}
	//ENCRYPT SESSION USER ID TO MATCH WITH DATABASE USER ID
	$encript_method = (($user_id*136806)/302);
	$encript_method = 'UID-'.$encript_method;
	$User_Id = urldecode(base64_encode($encript_method));
	
	
	
	$USER_NAME = $_SESSION['USN'];
	$CPN = $_SESSION['CPN'];
	$PRP = '/bellezza/public_folder/images/profileImgs/'.$_SESSION['PRP'];
}else{
	$User_Id = 'empty';
	$PRP = '/bellezza/web_folder/profile.jpg';
	$USER_NAME = '<div style="width:100%;height:25px;background:#f4f4f4;"></div>';
	$CPN = 0;
	echo '<script>
		setTimeout(function(){
			$(".WebModel").css("top", "45%");
			$(".WebModel").css("opacity", "1");
			$(".shadow").css("display", "block");
		},1000);
	</script>';
}
/*if(isset($_POST['checkSession'])){
	echo $user_id;
	die();
}*/
?>
	
	<div class="col-12 offerHeader">
		FREE SHIPPING OVER $50
	</div>
	<div class="col-12 header1" style="">
		<div class="burgerBarContainer">
			<div class="burger-bar" style="width:40px;text-align: center;">
				<i class="fas fa-bars" style="cursor:pointer;color:#adadad;padding-top: 8px;"></i>
			</div>
		</div>
		
		<div class="brandLogo actionBtn" data-src="index" data-id="984589834282">
			BRAND LOGO
		</div>
		
		
			<div class="header-icons" style="">
				<div class="drop user_profile" style="width:40px;text-align: right;">
					<i class="fas fa-user-circle"></i>
					<div class="prof_dropdown">
						<div class="pointer" style=""></div>
						<div style="padding:5px;display:flex;align-items: center;justify-content: flex-start;gap: 5px;">
							<div><img src="<?php echo $PRP ?>" style="height:40px;width:40px;border-radius:50%;"></div>
							<div style="font-size:15px;font-weight:700;width: 100%;"><?php echo $USER_NAME ?></div>
						</div>
						<div class="profile AccountSetting actionBtn" data-src="page6">
							<i class="fas fa-user-cog" style="font-size:17px;padding-right:10px;"></i>
							Account Setting
						</div>
						<?php if($User_Id != 'empty'){ ?>
							<a href="login/logout.php"><div class="profile log"><i class="fas fa-sign-out-alt" style="font-size:17px;rotate:180deg;padding-left:10px;"></i><span class="text1"> LogOut</span></div></a>
						<?php }else{ ?>
							<a href="login/logout.php"><div class="profile log"><i class="fas fa-sign-in-alt" style="font-size:20px;padding-right:10px;"></i><span class="text1"> LogIn</span></div></a>
						<?php } ?>
					</div>
				</div>
					
					<!--<div class="fund_section user_profile" style="width:40px;text-align:right;color:grey;display:none;">
						<i class="fas fa-plus-circle"></i>
						<div class="fund_dropdown">
							<div class="listedComList" style="padding:5px;border-bottom:1px solid grey;">
								<i class="fas fa-money-check-alt" style="font-size:20px;padding-right:10px;"></i>
								<span class="text1"> Listed Companies</span>
								<?php
								$screenWidthInput = isset($_POST['screenWidthInput']) ? $_POST['screenWidthInput'] : null;
								if($screenWidthInput < 700){
								$query="SELECT `Com_Name`,`profile_img`,`category`,`Post_Id` FROM `company_listing` where user_id='$user_id'";
								$res = mysqli_query($con, $query);
								while($rows=mysqli_fetch_assoc($res)){
									$Com_Name=$rows['Com_Name'];
									$Pro_Img=$rows['profile_img'];
									$category=$rows['category'];
									$post_id  = $rows['Post_Id'];
									$Post_Id  = substr($post_id , 5);
									$encript_method = (($Post_Id*1252)/313);
									$Post_Id = urldecode(base64_encode($encript_method));
									$Post_Id = str_replace('=', '', $Post_Id);
								?>
									<div class="profile log companies_list actionBtn companyInformation" data-src="page2" data-id="<?php echo $Post_Id ?>" style="margin-left:40px;padding:5px;line-height:1;"><img style="width: 30px;height: 30px;margin-right:5px;border: 1px solid #b7b7b7;border-radius: 50%;" src="public_folder/images/<?php echo $Pro_Img ?>"> <?php echo $Com_Name ?> (<?php echo $category ?>)</div>
								<?php } ?>
							</div>
							<div class="profile log user-investment actionBtn" data-id="<?php echo $User_Id ?>" data-src="page4" call_type="businessPage">
							    <i class="fas fa-wallet" style="font-size:20px;padding-right:10px;"></i>
								<span class="text1"> Your Investments</span>
							</div>
							<div class="profile log btn_Listing actionBtn" data-src="page3" data-src="listingPage">
							    <i class="fas fa-scroll" style="font-size:20px;padding-right:10px;"></i>
								<span class="text1"> List Your Business</span>
							</div>
								<?php } ?>
						</div>
					</div>-->
					<div class="search" style="width:40px;text-align: right;"><i class="fas fa-search"></i></div>
					<div class="search" style="">
						<i class="fas fa-shopping-bag shoppingBag" data-id="984589834282"></i>
						<span class="cartNumber"><?php echo $CPN ?></span>
					</div>
					<input type="hidden" value="5" class="cartQnt">
				</div>
	</div>
	
	
	
	
	<div class="main_header container-fluid" style="display:none;">
	<?php
	    $screenWidthInput = isset($_POST['screenWidthInput']) ? $_POST['screenWidthInput'] : null;
		if($screenWidthInput < 700){
	?>
		<!--<div style="margin-top:40px;padding:20px;position:relative;overflow-y:auto;">
			<div style="display:flex;position:sticky;top:0px;">
				<div class="close-company-popup">X</div>
				<div style="font-size:18px;font-weight:bold;">Your Listed Companies</div>
			</div>
			<div class="company-list-parent">
			<?php
				/*$query="SELECT `Com_Name`,`profile_img`,`category`,`Post_Id` FROM `company_listing` where user_id='$user_id'";
				$res = mysqli_query($con, $query);
				while($rows=mysqli_fetch_assoc($res)){
					$Com_Name=$rows['Com_Name'];
					$Pro_Img=$rows['profile_img'];
					$category=$rows['category'];
					$post_id  = $rows['Post_Id'];
					$Post_Id  = substr($post_id , 5);
					$encript_method = (($Post_Id*1252)/313);
					$Post_Id = urldecode(base64_encode($encript_method));
					$Post_Id = str_replace('=', '', $Post_Id);
				?>
				<div class="companies_list actionBtn companyInformation" data-src="page2" data-id="<?php echo $Post_Id ?>">
					<img src="public_folder/Images/<?php echo $Pro_Img ?>"> <?php echo $Com_Name ?> (<?php echo $category ?>)
				</div>
				<?php } */?>
			</div>
		</div>-->
		<?php } ?>
		
	<!-- Search-Bar Section-->
		<div class="row search_bar" style="display:none;">
		
		    <div style="display:flex;">
				<div style="width: 90%;">
					<form method="POST" class="search-box" style="opacity: 1; pointer-events: auto;">
						<input style="display:block;position:relative;" type="text" name="search" id="search" autocomplete="off" placeholder="Type Something To Search...." required="">
					</form>
				</div>
				<div style="width: 10%;text-align:right">
					<i class="fas fa-times" style="color:grey;text-align: right;padding-right:35px;"></i>
				</div>
			</div>
			
			<div id="search-table" tabindex="1">
				<ul class="list-group" id="results" style="width: 100%; background: white; position: relative;">
				    <a href="trade/tradeBlogs.php?id=2">
					    <li class="list-group-item link-class">
						    <span height="40" width="40" class="fas fa-search" ></span>
							<span style="margin-left:10px;" class="typo"></span>
						</li>
					</a>
				</ul>
			</div>
		</div>
	</div>
	<!-- Fixed Bottom Bar --> 
	<div class="bottom_bar" style="bottom: -100px;justify-content:center;padding:10px;">
		<div style="color: #6b81d2;">
			<div class="fas fa-home bottom_icons btn_load_screen" data-src="index.php"></div>
			<span class="post_action_btn" style="borde:1px solid;border-radius:7px;">
				<div class="fas fa-plus-circle bottom_icons" style="color: #6b81d2;"></div>
			</span>
			<div class="fas fa-bell notificationBell bottom_icons notification_button actionBtn" data-src="page12"  style="" onclick="openNotification('UI-1680328994');">
				<div class="BellNotification" style="display: block;">1</div>
			</div>
		</div>
	</div>
	
	
	<!-- Cart Container -->
	<div class="cartSection">
		<div class="pageIndicatorContainer">
			<div class="IndicatorLeftSide">Shopping Bag</div>
			<div class="IndicatorRightSide deliveryAddress">Delivery Address<span class="fas fa-chevron-down"></span></div>
			<div><span class="fas fa-chevron-right closeCart"></span></div>
		</div>
		<div class="addToCart" data-id="984589834282">
			
			<?php
			//$query = "SELECT * FROM `cart` WHERE user_id = '$User_Id'";
			$query = "SELECT cart.*, 
			(SELECT SUM(qty) FROM cart WHERE user_id = '$User_Id') AS qty_num,
			(SELECT SUM(Totalprice) FROM cart WHERE user_id = '$User_Id') AS total_amount

			FROM `cart` WHERE user_id = '$User_Id'";
			//$query = "SELECT * FROM `cart` INNER JOIN products ON cart.product_id = products.product_id WHERE cart.user_id = '$User_Id'";
			//$query = "SELECT cart.*, products.* FROM `cart` LEFT JOIN products ON cart.product_id = products.product_id WHERE cart.user_id = '$User_Id'";
			//$query = "SELECT cart.*, products.* FROM `cart`, products WHERE cart.user_id = '$User_Id' && products.product_id = cart.product_id";
			$result = mysqli_query($con, $query);
			$totalShipping = 0;
			while($row = mysqli_fetch_array($result)){
				$id =$row["id"];
				$product_id =$row["product_id"];
				$user_id =$row["user_id"];
				$color =$row["color"];
				$size =$row["size"];
				$qty =$row["qty"];
				$Totalprice =$row["Totalprice"];
				$qty_nums =$row["qty_num"];
				$total_amount =$row["total_amount"];
				
					
				$queries = "SELECT * FROM `products` WHERE product_id = '$product_id'";
				/*$queries = "SELECT `products`.*,
				(SELECT SUM(shippingCharge) FROM products WHERE product_id = '$product_id') AS totalShipping
				FROM `products` WHERE product_id = '$product_id'";*/
				$res = mysqli_query($con, $queries);
			
				//while($rows = mysqli_fetch_array($res)){
				$rows = mysqli_fetch_array($res);
					$productName =$rows["productName"];
					$profileImage =$rows["profileImage"];
					$productName =$rows["productName"];
					//$totalShipping =$rows["totalShipping"];
					$shippingCharge = $rows["shippingCharge"];
					$totalShipping += $shippingCharge;
					
				//}
				$grossAmount = $total_amount + $totalShipping;
				
				
			?>
			<div class="cartContainer">
				<div class="leftSide">
					<div class="checkBox"><input type="checkbox" name="checkbox" class="check" checked=""></div>
					<img src="/bellezza/public_folder/images/<?php echo $profileImage ?>" class="actionBtn" data-src="page3">
				</div>
				<div class="middle">
					<h5><?php echo $productName ?></h5>
					<div class="totalAmount">
						<!--<div class="short-des">Best Wedding Ring For Women</div>-->
						<div>Color: <?php echo $color ?></div>
						<div>Size: <?php echo $size ?>mm</div>
						<div>Shipping Charges: $<?php echo $shippingCharge  ?></div>
						<!--<span class="last-price">₹88.00</span>-->
						<span class="new-price"><span class="cartProductPrice">₹<?php echo $Totalprice ?><span class="percentage">(5%)</span></span></span>
					</div>
				</div>
				<div class="rightSide">
					<div class="trashBin">X</div>
					<div class="CartCounter">
						<button class="counter-btn">+</button>
						<input class="counter" id="cartCounter1" value="<?php echo $qty ?>">
						<button class="counter-btn">-</button>
					</div>
				</div>
			</div>
			<?php } ?>
			
			<div class="" id="summary">
				<h6 class="DeliveryAdd actionBtn" data-src="page5" data-id="984589834282">Add Delivery Address To Know Shipping Charges</h6>
				<h5>Order Summary</h5>
				<hr>
				<div class="order-summary">
					<div>Total Items : </div><div><?php echo  $qty_nums ?></div>
				</div>
				<div class="order-summary">
					<div>Total Price : </div><div> $<?php echo $total_amount?></div>
				</div>
				<div class="order-summary">
					<div>Dilevery Charges : </div><div> $<?php echo $totalShipping ?></div>
				</div>
				<div class="order-summary">
					<div>Payable Amount : </div><div> $.<?php echo $grossAmount ?></div>
				</div>
				<hr style="margin: 0.5rem 0px 0.6rem 0px;">
				<div class="orderTerms">
					Upon clicking "Place Order" I comfirm i have read and acknowledge <i><font color="blue">all Terms and Conditions</font></i>
				</div>
			</div>
		</div>
		<hr style="margin: 0.5rem 0px 0.6rem 0px;">
		<div class="order-summary summaryBottom placeOrderLap">
			<div><h4>RS.<?php echo $grossAmount ?></h4></div>
			<div><input type="submit" name="placeorder" value="Place Order" id="p-order"></div>
		</div>	
	</div>
	<script>
	var width = '<input type="hidden" class="screenWidthInput" value="'+window.screen.width+'">';
	$('.bottom_bar').append(width);
	</script>