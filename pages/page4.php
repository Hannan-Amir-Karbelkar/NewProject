<?php
require_once('../database/connection.php');
session_start();
/*if(isset($_POST['limit'])){
	$User_Id = $_SESSION['UMLIDLGZS'];
	$user_id = base64_decode(urldecode($User_Id));
	$user_id = (($user_id*240)/378720);
	$encript_method = (($user_id*136806)/302);
	$encript_method = 'UID-'.$encript_method;
	$active_user_id = urldecode(base64_encode($encript_method));
	$active_user_id = 'VUlELTk0MzI4ODIyODg2Mw==';

	
	$data[] = [
		'html' => $html,
		'id' => $id,
	];
	$json = json_encode($data);
	echo $json;
	die();
}*/
echo '<div class="pageIndicatorContainer">
			<div class="IndicatorLeftSide"><span class="fas fa-chevron-left leftIndicator"></span>Shoppind Bag</div>
			<div class="IndicatorRightSide deliveryAddress">Delivery Address<span class="fas fa-chevron-down"></span></div>
		</div>
		<div class="col-md-6 addToCart" data-id="984589834282">
			<div class="cartContainer">
				<div class="leftSide">
					<div class="checkBox"><input type="checkbox" class="check" checked=""></div>
					<img src="public_folder/images/ring12.jpeg" class="actionBtn" data-src="page3">
				</div>
				<div class="middle">
					<h5>Golden Ring</h5>
					<div class="totalAmount">
						 $.500 
						<span class="deal-pro-price"><del class="del"> $.120/</del></span>
					</div>
					<p class="return"> 10 days Return Available</p>
					<p> Shipping Charges: $6</p>
					<p> 5% off</p>
				</div>
				<div class="rightSide">
					<div class="trashBin">X</div>
					<div class="CartCounter">
						<button class="counter-btn">+</button>
						<input class="counter" id="counter" value="1">
						<button class="counter-btn">-</button>
					</div>
				</div>
			</div>
		
		
			<div class="cartContainer">
				<div class="leftSide">
					<div class="checkBox"><input type="checkbox" class="check" checked=""></div>
					<img src="public_folder/images/ring10.jpeg" class="actionBtn" data-src="page3">
				</div>
				<div class="middle">
					<h5>Golden Ring</h5>
					<div class="totalAmount">
						 $.500 
						<span class="deal-pro-price"><del class="del"> $.120/</del></span>
					</div>
					<p class="return"> 10 days Return Available</p>
					<p> Shipping Charges: $6</p>
					<p> 5% off</p>
				</div>
				<div class="rightSide">
					<div class="trashBin">X</div>
					<div class="CartCounter">
						<button class="counter-btn">+</button>
						<input class="counter" id="counter" value="1">
						<button class="counter-btn">-</button>
					</div>
				</div>
			</div>
			
			<div class="cartContainer">
				<div class="leftSide">
					<div class="checkBox"><input type="checkbox" class="check" checked=""></div>
					<img src="public_folder/images/ring9.jpeg" class="actionBtn" data-src="page3">
				</div>
				<div class="middle">
					<h5>Golden Ring</h5>
					<div class="totalAmount">
						 $.500 
						<span class="deal-pro-price"><del class="del"> $.120/</del></span>
					</div>
					<p class="return"> 10 days Return Available</p>
					<p> Shipping Charges: $6</p>
					<p> 5% off</p>
				</div>
				<div class="rightSide">
					<div class="trashBin">X</div>
					<div class="CartCounter">
						<button class="counter-btn">+</button>
						<input class="counter" id="counter" value="1">
						<button class="counter-btn">-</button>
					</div>
				</div>
			</div>
			
			<div class="cartContainer">
				<div class="leftSide">
					<div class="checkBox"><input type="checkbox" class="check" checked=""></div>
					<img src="public_folder/images/ring2.jpeg" class="actionBtn" data-src="page3">
				</div>
				<div class="middle">
					<h5>Golden Ring</h5>
					<div class="totalAmount">
						 $.500 
						<span class="deal-pro-price"><del class="del"> $.120/</del></span>
					</div>
					<p class="return"> 10 days Return Available</p>
					<p> Shipping Charges: $6</p>
					<p> 5% off</p>
				</div>
				<div class="rightSide">
					<div class="trashBin">X</div>
					<div class="CartCounter">
						<button class="counter-btn">+</button>
						<input class="counter" id="counter" value="1">
						<button class="counter-btn">-</button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-md-5" id="summary">
			<h6 class="DeliveryAdd actionBtn" data-src="page5" data-id="984589834282">Add Delivery Address To Know Shipping Charges</h6>
			<h5>Order Summary</h5>
			<hr>
			<div class="order-summary">
				<div>Total Items : </div><div> 3</div>
			</div>
			<div class="order-summary">
				<div>Total Price : </div><div> $.52</div>
			</div>
			<div class="order-summary">
				<div>Dilevery Charges : </div><div> $.5</div>
			</div>
			<div class="order-summary">
				<div>Payable Amount : </div><div> $.57</div>
			</div>
			<hr style="margin: 0.5rem 0px 0.6rem 0px;">
			<div class="orderTerms">
				Upon clicking "Place Order" I comfirm i have read and acknowledge <i><font color="blue">all Terms and Conditions</font></i>
			</div>
			<hr style="margin: 0.5rem 0px 0.6rem 0px;">
			<div class="order-summary summaryBottom placeOrderLap">
				<div><h4>RS.159</h4></div>
				<div><input type="submit" name="placeorder" value="Place Order" id="p-order"></div>
			</div>
		</div>
		
		
		
		
		
		<div class="order-summary summaryBottom placeOrderMob">
			<div><h6 style="    margin-top: 3;">RS.159</h6></div>
			<div><input type="submit" name="placeorder" value="Place Order" class="p-order" id="p-order" style="background: orange;
    color: white;
    font-size: 16px;
    height: 30px;
    width: 130px;
    border: none;"></div>
			</div>';
?>
