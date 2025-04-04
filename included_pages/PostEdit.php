<?php
if(!defined('ListingAccessSite')){
	//header('location:../listingPage');
	//die();
}
if(isset($_GET['id'])){
	$id = $_GET['id'];
	echo $id;
}
 ?>
<link rel="stylesheet" href="css/listing.css">
<link rel="stylesheet" href="css/tags.css">
<style>
::placeholder{
	color:green;
}
::-webkit-input-placeholder{
	color:red;
}
:-ms-input-placeholder{
	color:brown;
}
*{
	//color:grey;
}
.card-header img {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    border: 5px solid #fff;
    object-fit: cover;
}
.card-header{
    text-align: center;
	background:white;
	border-bottom:none;
}
.card-body{
	//padding-top: 0;
	text-align:center;
}
.form{
	margin-top: 50px;
}
.summary-heading {
    font-size: 19px;
    text-shadow: 1px 0px 0 #cb7407;
    margin-bottom: 5px;
    padding: 5px;
    background: linear-gradient(to right, rgb(252, 96, 118), rgb(255, 146, 49));
    color: #fff;
}
.table>:not(caption)>*>* {
    padding: .5rem .5rem;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
}
th {
    width: 50%;
}
.card-body h3 {
    margin-top: -18px;
    margin-bottom: 1px;
    font-size: 1.4rem;
    font-weight: 700;
	color: #464444;
}
.card-body span {
    text-transform: capitalize;
    color: #717171;
    font-size: 0.92rem;
    font-weight: 500;
}
//.card-body div{
    color: #4e4c4c;
    font-size: var(--textSize);
    line-height: 1.4;
    font-weight: 500;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    padding: 0 3em;
	padding-top: 15px;
}
.short{
	color: #4e4c4c;
    font-size: var(--textSize);
    line-height: 1.4;
    font-weight: 500;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    padding: 0 3em;
	padding-top: 15px;
}
h4{
	font-family:emoji;
	color:grey;
}
/*.EditModel{
	position:fixed;
	top:45%;
	left:45%;
	transform:translate(-45%, -45%);
	background:#fff;
	z-index:999;
	width:70%;
	padding:20px;
	box-shadow: 0 4px 12px 0 rgb(0 0 0 / 40%);
}*/
.EditModel {
    position: fixed;
    top: 30%;
    left: 45%;
    transform: translate(-45%, -45%);
    background: #fff;
    z-index: 999;
    width: 95%;
    padding: 20px;
	padding-top: 0px;
    box-shadow: 0 4px 12px 0 rgb(0 0 0 / 40%);
    //height: 52vh;
    overflow-y: hidden;
	transition: 5s ease;
}
.Edit-text{
	border: 1px solid orange;
    padding: 10px;
    height: 40vh;
    overflow-y: auto;
}
.Edit-btn{
	text-align: right;
    padding-top: 5px;
	color: #6e70ff;
    cursor:pointer;
}
.Edit-btn .fas{
	color: #6e70ff;
    cursor:pointer;
}
.closeEdit{
	color:red;
	font-weight:bolder;
	cursor:pointer;
}
.heading {
    display: flex;
    justify-content: space-between;
    position: sticky;
    top: 0px;
    background: #fff;
    padding-top: 10px;
    padding-bottom: 5px;
}
.edit{
	cursor:pointer;
}
.edit:hover{
	color:green;
	//font-size:17px;
	transition: 0.5s ease;
}
.tab-content div{
	color:grey;
}
.tab-content h4{
	color:grey;
	margin-top:25px;
	font-size: 17px;
	color:grey;
}
</style>
        <div class="row">
			<!-- SideBar Section Start -->
			<div class="col-xl-2 col-md-3 col-3 " id="sidebar" style="padding: 0px;">         			
				<div class="col-content">
					<div class="container2" style="heigh:0%;"> 						  
						<div class="sidebar_container" style="width:200px;">
							<div style="margin-bottom:10px;margin-top:20px;">		
								<div class="sideBar_heading" id="second_sideBar_heading" style="text-align: center;">
									<div style="width:100%;position:relative;">
										<div style="margin: auto;padding-top: 5px;width:50px;">
											<img src="public_folder\images\trade.jpg" style="margin-top:2px;display:flex;width:50px;height:50px;border-radius:50%;">
										</div>
									</div>
									<div>
										<p class="sideBar_userName">Hannan Amir Karbelkar Jui Bk</p>
										<p class="ac_type">Golden Account</p>
									</div>
								</div>					
							</div> 
						    <hr style="margin-bottom: 0px;margin-left: 10px;margin-right: 10px;">
							<button class="dropdown-button btn_load_screen" data-src="index.php">
							    <i class="fa fa-home sidebar_icons"></i> Home
							</button>	
							<button class="dropdown-button notification_button" data-uri="" data-id="UI-1680328994" onclick="openNotification('UI-1680328994');">
								<div class="BellNotification" style="display:block;margin-left:-10px;top: 245px;background: #ff0000;color: white;">5</div>
								<i class="fa fa-bell sidebar_icons"></i> Notifications
							</button>
						  
							<button class="dropdown-button" data-uri="">
								<div class="Message	Notification" style="display:none;margin-left:-10px;top: 175px;background: #ff0000;color: white;"></div>
								<i class="fa fa-envelope sidebar_icons"></i> Messages
							</button> 
							<button class="dropdown-button">
							    <i class="fa fa-bookmark sidebar_icons"></i> Bookmark
							</button>
							<button class="dropdown-button">
							    <i class="fa fa-compass sidebar_icons"></i> Theme
							</button>
							<button class="dropdown-button" data-uri="/Quaf/postPage_test/pages/account_setting.php">
							    <i class="fa fa-user-cog sidebar_icons"></i> Settings
							</button>
						</div>
					</div>
				</div>	
			</div>
			
			<!-- Form section Satart -->
			<div class="col-xl-9 col-lg-8 col-md-8 order-md-2">	
				<!-- First Form Section -->
			    <div class="col-lg-5 form">       
					<div class="container-Payment">
						<div class="row" id="payment2">
							<div class="col">
								<div class="row rows">
									<div class="card-header">
										<div class="card-header--img">
											<img src="public_folder/images/trade.jpg">
										</div>
									</div>
										
									<div class="card-body">
										<h3 class="edit" data-tab="Com_Name">cassian</h3>
										<span class="edit" data-tab="category">cassian rochbert</span>
										<!--<div class="edit short" data-tab="O_S_I">Lifestyle coach and photographer delivering best images online just for you. Lifestyle coach and photographer delivering best images online just for you.</div>-->
										<!--<div class="edit short" data-tab="O_S_I"><div>Calibour&nbsp;</div><div>Sambosa Wadapaw&nbsp; &nbsp; &nbsp;Anda</div></div>-->
									</div>
                                    <div style="position:relative;">
										<div class="tab-content">
											<h4><span class="fas fa-edit"></span>About Us</h4>
											<!--<div style="width:100%;height:350px;background:grey;margin:auto;margin-bottom:20px;">
												<video style="width:100%;height:100%;" controls=""><source src="public_folder\videos\video.mp4"></video>
											</div>-->
											<div class="edit" data-heading="About Us"  data-tab="About">The concepts, by Examinator, are explained in a simple and easy to understand manner, supporting the students to grasp the essence of different concepts with ease. Preparing with us will build skills and techniques to solve the problems with speed and correctness. Further, referring to Examinator Solutions will help the students in scoring high marks in the exams. Examinator Solutions, provided by Exminator expert faculty team, is the best solution manual available on the internet. The solutions are organized chapter wise and are further separated on the basis of exercises, making it extremely easy for students to navigate and select any particular topic for which the solution is required. <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; You don’t need to spend a lot or be lost in a sea of apps, social media channels, blogs and websites. Our very affordable Live Online Classes focus on in-depth teaching Spoken English from the basics based on everyday life. We use Hindi as the language of explanation as it’s the most widely understood language. Learners from other beautiful regional languages could use a dictionary during classes if required. <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Our solutions can help to develop rational thinking and logical approach in students. It helps to promote conceptual clarity through in-depth explanations, practice problems, solved examples and more. Our Solutions are focused on learning various tricks and shortcuts for quick and easy Learning.<br>											
											</div>
										</div>
									    <div class="tab-content">
											<h4><span class="fas fa-edit"></span>Problems</h4>
											<div class="edit" data-heading="Problem"  data-tab="problem">
												Our solutions can help to develop rational thinking 
												and logical approach in students. It helps to promote
												conceptual clarity through in-depth explanations,
												practice problems, solved examples and more.
												Our Solutions are focused on learning various 
												tricks and shortcuts for quick and easy Learning. 
											</div>
										</div>
											
										<div class="tab-content">
										    <h4><span class="fas fa-edit"></span>Our Strategy</h4>
											<div class="edit" data-heading="Problem"  data-tab="problem">
												You don’t need to spend a lot or be lost in a
												sea of apps, social media channels, blogs
												and websites. Our very affordable Live Online 
												Classes  focus on in-depth teaching Spoken 
												English from the basics based on everyday life. 
												We use Hindi as the language of explanation as
												it’s  the most widely understood language. 
												Learners from other beautiful regional 
												languages could use a dictionary during classes 
												if required. 
												<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
												Our solutions can help to develop rational thinking 
												and logical approach in students. It helps to promote
												conceptual clarity through in-depth explanations,
												practice problems, solved examples and more.
												Our Solutions are focused on learning various 
												tricks and shortcuts for quick and easy Learning. 
											</div>
										</div>
										
										<div class="tab-content">
											<h4><span class="fas fa-edit"></span>Solution</h4>
										</div>
										<div class="tab-content">
											<h4><span class="fas fa-edit"></span>Product</h4>
										</div>
										<div class="tab-content">
											<h4><span class="fas fa-edit"></span>Business Details</h4>
										</div>
										<div class="tab-content">
											<h4><span class="fas fa-edit"></span>Market Opportunity</h4>
										</div>
										<div class="tab-content">
											<h4><span class="fas fa-edit"></span>Advantages</h4>
										</div>
										<div class="tab-content">
											<h4><span class="fas fa-edit"></span>Competative Landscape</h4>
										</div>
										<div class="tab-content">
											<h4><span class="fas fa-edit"></span>Opretions</h4>
										</div>
										<div class="tab-content">
											<h4><span class="fas fa-edit"></span>Ask / Financial projections</h4>
										</div>
										<hr style="color:grey">
										<h4>Edit Images</h4>
										<div style="display:flex;text-align:center;overflow-y:auto;">
										    <div style="padding:10px;">
											    <img src="web-folder/OIP.JPG" style="width:100px;height:100px;">
												<p style="color:black">Profile</p>
											</div>
										    <div style="padding:10px;">
											    <img src="web-folder/placeholder.JPG" style="width:100px;height:100px;">
												<p style="color:black">About</p>
											</div>
											<div style="padding:10px;">
											    <img src="public_folder/images/trade.jpg" style="width:100px;height:100px;">
												<p style="color:black">Product</p>
											</div>
											<div style="padding:10px;">
											    <img src="public_folder/images/trade.jpg" style="width:100px;height:100px;">
												<p style="color:black">Business Details</p>
											</div>
										</div>
									</div>
								</div>
						    </div>
						</div>					
		            </div>
		        </div>	
				
				<!-- Second Form Section -->
				<div class="col-lg-5 form">       
					<div style="" class="short-summary">
					<div class="summary-table">
						<div style="padding:10px;">
						</div>
						<div class="summary-heading" style="">Legal Loft</div>
						<table class="table table-striped" border="0">
							<tbody><tr><th>Company/Business Name</th><td>Tradeloft.private.Ltd</td></tr>
							<tr><th>Category</th><td>Manufacturing</td></tr>
							<tr><th>Status</th><td>New/Startup</td></tr>
							<tr><th>Since/Founded</th><td>8 Jan 2005</td></tr>
							<tr><th>Founder</th><td>Abdul Hannan</td></tr>
							<tr><th>Area Served</th><td>Mumbai And Pune</td></tr>
							<tr><th>Headquater</th><td>Pune</td></tr>
							<tr><th>Registered Office</th><td>3td floor uni pune Swarget Maharashtra 402115</td></tr>
							<tr><th>Existing Partners</th><td>3</td></tr>
						</tbody></table>		
						<div class="summary-heading">Balance Sheet</div>
                        <table class="table table-striped" border="0">	
							<tbody><tr><th>Last Year Sale</th><td>₹ 100000</td></tr>							
							<tr><th>Opreting Income</th><td>₹ 10000000</td></tr>							
							<tr><th>Net Income</th><td>₹ 1000000</td></tr>							
							<tr><th>Net Worth</th><td>₹ (Total Assets - Current Liabilities)</td></tr>							
							<tr><th>Debt</th><td>₹ 100000</td></tr>
							<tr><th>Total Assets</th><td>₹ 100000</td></tr>
							<tr><th>Liabilities</th><td style="">₹ 200000</td></tr>
							<tr><th>Current Ratio</th><td style="">0.5 (Current Assets / Current Liabilities)</td></tr>
						</tbody></table>		
						<div class="summary-heading">Ask Investment</div>
                        <table class="table table-striped" border="0">							
							<tbody><tr><th>Ask</th><td style="font-weight: bold;color: #c86138;">₹ 1000000 </td></tr>
							<tr><th>Equity</th><td style="font-weight: bold;color: #c86138;">40%</td></tr>
							<tr><th>Valuation</th><td style="font-weight: bold;color: #c86138;">₹ 500000 </td></tr>
							<tr><th>Min Investment</th><td style="font-weight: bold;color: #c86138;">₹ 10000 </td></tr>
							<tr><th>Max Need Of Investors</th><td style="font-weight: bold;color: #c86138;">50</td></tr>
						</tbody></table>	
						<div class="summary-heading">Contacts</div>
						<table class="table table-striped" border="0">
							<tbody><tr><th>Website</th><td>www.legalloft.com</td></tr>
							<tr><th>Email-Id</th><td>legalloft@gmial.com</td></tr>
							<tr><th>Contact Number</th><td>+91 9765405083</td></tr>
							
						</tbody></table>
					</div>	
			    </div>
			 </form> 
		    </div>			
		</div>	
		<br>
		<br>
	<script src="js/listing.js"></script>
<script>
/*** Send text data to the Editing Input Field ***/
$('.edit').on('click', function(){
	AddBodyBlur();
	var text = $(this).html();
	var tab = $(this).data('tab');
	$('.inputTags').val(tab);
	var heading =$(this).data('heading');
	$('.EditModel').css('display', 'block');
	//var text = text.replace(/&nbsp;/g, '  ');
	//var text = text.replace(/<br>/g, '\n');
	$('.Edit-text').val(text);
	$('.Edit-heading').html('<h4>'+heading+'</h4>');
});

/*** Close Editing Input Field Popup ***/
$('.closeEdit').on('click', function(){
	$('.EditModel').css('display', 'none');
	RemoveBodyBlur();
});

/*** Flush Extra Characters fron End of Editing Input***/
$('.Edit-text').on('keyup', function(e){
	var text = $(this).val();
	var length = text.replace(/\s+/g, '').length;
	var countChar = text.slice(0,500)
	var countSpaces = countChar.split(' ').length;
	if(length > 500){
	    $(this).val(text.slice(0,500 + countSpaces));
	}
});

/*** Prevent Pressing Keys From Extra Characters Than Given Limit ***/
$('.Edit-text').on('keydown', function(e){
	var text = $(this).val();
    var length = text.replace(/\s+/g, '').length;
	$('.spaceLine').val(length);
	if(length >= 500 && e.which != 8){
		if(e.which != 17){
			if(e.which != 116){	
				e.preventDefault();	
			}
		}
	}	
});

/*** Save Edited Data Into DataBase ***/
$('.Edit-btn').on('click', function(){
	var text = $('.Edit-text').val();
	
	//var text = text.replace(/  /g, "&nbsp;");
	//var text = text.replace(/\n/g, "<br>");
	var text = text.replace(/  /g, "[sp][sp]");
	var text = text.replace(/\n/g, "[nl]");
	
	//var text = text.replace("[sp]", "&nbsp;");
	//var text = text.replace("[nl]", "<br>");
	
	$('.card-body').html(text);
	var inputTabs = $('.inputTags').val();
	$.ajax({
        url: 'ajax/editPost.php',
        type: 'post',
		data:{text:text, inputTabs:inputTabs},
		success: function(response){
			$('.EditModel').css('display', 'none');
         	RemoveBodyBlur();
		}
	});
});

var pageURL = $(location).attr("href");
var pageURL = pageURL.split("id=").pop().split("#")[0].split("?")[0];
$.ajax({
	type: "post",
	url: "ajax/upload_conctent.php",
	data:{pageURL: pageURL},
	dataType: "html",
	success: function(data){
		$('.app').html(data);
	}
});
</script>