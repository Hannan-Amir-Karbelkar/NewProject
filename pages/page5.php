<?php
$address = "notExist";
if($address == "Exist"){
	$display = "none";
	$displays = "block";
}else{
	$display = "inline-flex";
	$displays = "none";
}
$html='';
$html.='
<div class="addressContainer">
	<div class="addressHeading">
		<div class="IndicatorLeftSide"><span class="fas fa-chevron-left leftIndicator"></span>Delivery Address</div>
		<div class="IndicatorRightSide deliveryAddress addNew" style="display:'.$displays.'">+ Add New Address<span class="fas fa-chevron-down"></span></div>
		<div class="IndicatorRightSide deliveryAddress ShowAdr" style="display:'.$display.'">Show Address<span class="fas fa-chevron-down"></span></div>
	</div>
	
	<div class="row addressForm" style="display:'.$display.'">
		<div class="col-12">
			<label for="fname"><b> Full Name</b></label>
			<input type="text" class="form-control" name="name" placeholder="John M. Doe" required="">
		</div>
		<div class="col-12">
			<label for="fname"><b> Address</b></label>
			<input type="text" class="form-control" name="name" placeholder="John M. Doe" required="">
		</div>
		<div class="col-6">
			<label for="fname"><b> Building</b></label>
			<input type="text" class="form-control" name="name" placeholder="John M. Doe" required="">
		</div>
		<div class="col-6">
			<label for="fname"><b> Street</b></label>
			<input type="text" class="form-control" name="name" placeholder="John M. Doe" required="">
		</div>
		<div class="col-6">
			<label for="fname"><b> Postal Code</b></label>
			<input type="text" class="form-control" name="name" placeholder="John M. Doe" required="">
		</div>
		<div class="col-6">
			<label for="fname"><b> City</b></label>
			<input type="text" class="form-control" name="name" placeholder="John M. Doe" required="">
		</div>
		<div class="col-6">
			<label for="fname"><b> State</b></label>
			<input type="text" class="form-control" name="name" placeholder="John M. Doe" required="">
		</div>
		<div class="col-6">
			<label for="fname"><b> Country</b></label>
			<input type="text" class="form-control" name="name" placeholder="John M. Doe" required="">
		</div>
		<div class="col-6">
			<label for="fname"><b> Email Id</b></label>
			<input type="text" class="form-control" name="name" placeholder="John M. Doe" required="">
		</div>
		<div class="col-6">
			<label for="fname"><b> Contact Number</b></label>
			<input type="text" class="form-control" name="name" placeholder="John M. Doe" required="">
		</div>
		<input type="submit" text="Submit" name="submit" id="s1Village1" class="AddressBtn" onclick="ShowDelivery()">
	</div>
	
<div class="AddressInfoContainer" style="display:'.$displays.'">
	<div class="addressCard">
		<div class="AdrFlex">
			<div class="adrRadio">
				<input class="fornm-check-input&quot;" type="radio" value="1" checked="" name="radio">
			</div>
			<div class="AddressInfo">
				<div><b>Hannan Amir Karbelkar</b></div>
				<div>Pune</div>
				<div>Mahad, Maharashtra 402115</div>
				<div>California/United State</div>
				<div>Mobile: <b>8805449684</b></div>
			</div>
			<div class="adrThirdCol">
				<div class="AdrType">Home</div>
			</div>
		</div>
		<div class="AdrFunc">
			<div class="AdrEditBtn">EDIT</div>
			<div class="AdrDelBtn">
				<i class="fas fa-trash-alt"></i>
			</div>
		</div>
	</div>
	
	<div class="addressCard">
		<div class="AdrFlex">
			<div class="adrRadio">
				<input class="fornm-check-input&quot;" type="radio" value="1" checked="" name="radio">
			</div>
			<div class="AddressInfo">
				<div><b>Hannan Amir Karbelkar</b></div>
				<div>Pune</div>
				<div>Mahad, Maharashtra 402115</div>
				<div>California/United State</div>
				<div>Mobile: <b>8805449684</b></div>
			</div>
			<div class="adrThirdCol">
				<div class="AdrType">Home</div>
			</div>
		</div>
		<div class="AdrFunc">
			<div class="AdrEditBtn">EDIT</div>
			<div class="AdrDelBtn">
				<i class="fas fa-trash-alt"></i>
			</div>
		</div>
	</div>
	<div class="checkoutBtnContainer">
		<div class="checkoutPrice"><h6><b>$.567</b></h6></div>
		<div><button type="button" class="CheckoutProceedBtn">Proceed</button></div>
	</div>
</div>

</div>';
echo $html;
