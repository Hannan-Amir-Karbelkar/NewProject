<?php
//require_once('connection.php');
//require_once('../../functions\function.php');

//$captcha = $_SESSION['cap_code'];
session_Start();
?>
<!DOCTYPE html>
<html lang="ur">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="keywords" content="English Grammer,Lectures,English Lectures,English">
	<meta content="This is a basic text" property="og:title">
	<meta content="This is a basic text" property="og:description" />
    <title>LoginPage</title>
    
	<link rel="stylesheet" href="../libraries/Font-Awesome/css/all.min.css">    
	<link rel="stylesheet" href="../libraries/intl-tel-input-master/build/css/intlTelInput.css">
	<link rel="stylesheet" href="css/login.css">
	<!--<link rel="stylesheet" href="css/otp.css">-->
</head>

<body onload="myFunction()" style="">
	<div class="msgBox">
	    <div class="second_row">
			<span class="fas fa-spinner fa-spin loadingSpinner"></span>
			<div class="msgBoxText"> Processing Request....</div>
		</div>
	</div>
<!-- Country Code PopUp Model -->
	<div class="country_code_list">
		<input type="hidden" value="" class="seq">
		<ul>
			<li data-code="+91" data-flag="in" data-num="10" style="border-bottom:1px solid;">
				<img src="../web_folder/flags/in.png">
				<span class="country-name">India (भारत) </span>+91
			</li>
			<li data-code="+93" data-flag="af" data-num="9">
				<img src="../web_folder/flags/af.png">
				<span class="country-name">Afghanistan (&#x202B;افغانستان&#x202C;&lrm;)</span> +93
			</li>
			<li data-code="+880" data-flag="qa2" data-num="10">
		        <img src="../web_folder/flags/qa2.png">
				<span class="country-name">Bangladesh (বাংলাদেশ)</span> +880
			</li>
			<li data-code="+91" data-flag="in" data-num="10">
				<img src="../web_folder/flags/in.png">
			    <span class="country-name">India (भारत)</span> +91
			</li>
			<li data-code="+92" data-flag="pk" data-num="7">
			    <img src="../web_folder/flags/pk.png">
				<span class="country-name">Pakistan (&#x202B;پاکستان&#x202C;&lrm;)</span> +92 
			</li>
			<li data-code="+971" data-flag="ae" data-num="8">
				<img src="../web_folder/flags/ae.png">
				<span class="country-name">United Arab Emirates (&#x202B;الإمارات  العربية المتحدة&#x202C;&lrm;)</span> +971 
			</li>
		</ul>
   </div>
   <input type="text" class="telpone_num" value="10" style="display:none;">
<div class="containe main_container" style="">
	<div class="monto" style="background:#ff5500;border-radius:0px;width:100%;height:100%;position:fixed;transition: all 0.9s ease 0s;">
	    <div style="width:100%;height:100%;text-align:center;">
		    
	        <div class="logo log" style="to: 410px;transition: all 2.5s ease 0s;">Trade <span style="color:white;">Bot</span>
			    <span class="fas fa-circle-notch fa-spin" style="font-size:25px;margin-top:20px;"></span>
			    <div style="display:none;width:4px;height:4px;background:white;padding:20px;position: absolute;">
				</div>
			</div>
		</div>
		<svg viewBox="0 0 1440 320" style="margin-top:-2px;"><path fill="#ff5500" fill-opacity="1" d="M0,64L18.5,96C36.9,128,74,192,111,224C147.7,256,185,256,222,229.3C258.5,203,295,149,332,154.7C369.2,160,406,224,443,234.7C480,245,517,203,554,176C590.8,149,628,139,665,138.7C701.5,139,738,149,775,144C812.3,139,849,117,886,101.3C923.1,85,960,75,997,80C1033.8,85,1071,107,1108,128C1144.6,149,1182,171,1218,154.7C1255.4,139,1292,85,1329,58.7C1366.2,32,1403,32,1422,32L1440,32L1440,0L1421.5,0C1403.1,0,1366,0,1329,0C1292.3,0,1255,0,1218,0C1181.5,0,1145,0,1108,0C1070.8,0,1034,0,997,0C960,0,923,0,886,0C849.2,0,812,0,775,0C738.5,0,702,0,665,0C627.7,0,591,0,554,0C516.9,0,480,0,443,0C406.2,0,369,0,332,0C295.4,0,258,0,222,0C184.6,0,148,0,111,0C73.8,0,37,0,18,0L0,0Z"></path></svg>
	    
	</div>
	
	<!-- LOGIN FORM POPUP MODAL -->
	<div class="row no-gutters LoginAnimate container">
		<header>Login</header>
		<div class="registraton-form-outer">
		    <form action="#" id="loginForm">
			    <div class="pages slidepages">	
				
					<!--<div class="input-field" style="heigh:50px;">
						<i class="fas fa-user"></i>
						<input tabindex="-1"  type="text" name="username" class="LoginfirstName" required></input>
						<label class="label LoginlabelFirstName">Enter User Name</label>
					</div>-->
					<div class="input-field" style="heigh:50px;">
						<i class="fas fa-user"></i>
						<input tabindex="-1"  type="text" name="username" class="loginEmail" required></input>
						<label class="label LoginlabelEmail">Enter Email Address</label>
					</div>
					<div class="input-field" style="heigh:50px;">
					    <i class="fas fa-lock"></i>
					    <input tabindex="-1" type="password" name="password" class="loginPassword" required></input>
						<label class="label password">Enter Password</label>
					</div>
					
					<div class="field">
						<div class="submit login" style="background: linear-gradient( 45deg, #fed331, #ff6f00, #fa5100);">Submit</div>
					</div>		
                    <div style="font-family:cursive;margin-top:-25px;text-align:right;padding-bottom:15px;display:flex;justify-content: space-between;">
					    <div class="loginErrorMsg"></div>
					    <div class="forgetPass" style="text-align:right;"><a href="cvp.php"> Forgot Password?</a></div>
					</div>					
				</div>
			</form>
		</div>
	</div>
	
	
	
	
	
	
	
	
	<!--- REGISTRATION FORM POPUP MODAL -->
	<div class="row no-gutters anim container" style="height:auto;">
		<header style="text-align:left;margin-left: 10px;">LogOn</header>
		<div style="display:flex;justify-content:center;">
		<!--<div class="progress-bar" style="width:290px;">
			<div class="step">
				<p>Name</p>
				<div class="bullet">
					<span>1</span>
				</div>
				<div class="check fas fa-check"></div>
			</div>
		    <div class="step">
				<p>Contact</p>
				<div class="bullet">
					<span>2</span>
				</div>
				<div class="check fas fa-check"></div>
			</div>
		    <div class="step">
				<p>Profile</p>
				<div class="bullet">
					<span>3</span>
				</div>
				<div class="check fas fa-check"></div>
			</div>
			<div class="step">
				<p>Security</p>
				<div class="bullet">
					<span>4</span>
				</div>
				<div class="check fas fa-check"></div>
			</div>
		</div>-->
		</div>
		<div class="form-outer">
		<div style="display:flex;justify-content: space-between;">
		    <div class="title" style="text-align: right;margin-top: auto;">
			    <div class="skill">
					<div class="outer">
						<div class="inner">
							<div id="number"> 
							    1/5
							</div>
						</div>
					</div>
					<svg id="svgs" xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px" position="abolute" top="0" left="0">
						<defs>
							<linearGradient id="GradientColor">
							   <stop offset="0%" stop-color="yellow" />
							   <stop offset="100%" stop-color="green" />
							</linearGradient>
						</defs>
						<circle cx="40" cy="40" r="35" stroke-linecap="round" />
				    </svg>
				</div>
			</div>
	
		   <div class="title">
			   <p class="headingTitle" style="text-align: right;font-size: 20px;margin-top: auto;font-weight: 600;margin-bottom: 0px;"> Personal Information:</p>
			   <div style="display:flex;justify-content: flex-end;height: 0px;">
			        <p class="nextHeading" style="font-size: 13px;font-weight:400;text-align: right;">Contact Info</p>
					<div class="fas fa-arrow-right"></div>
				</div>
			</div>
		</div>
		    <form action="#"  id="registrationForm" autocomplete="off">
			<!-- First Step -->
			    <div class="page slidepage">
					<!--<div class="title"> Personal Info:</div>-->
					
					<div class="field">						
						<input maxlength="40" tabindex="-1" type="text" id="firstName" class="firstName list" required style="width: 93%;padding-lef:10px;"></input>
						<label class="label labelFirstName" style="lef:10px;">First Name</label>
					</div>
					
					<div class="field">						
						<input maxlength="40" tabindex="-1" type="text" class="lastName list" id="lastName" required style="width: 93%;padding-lef: 10px;"></input>
						<label class="label labelLastName" style="lef: 10px;">Last Name</label>
					</div>
					<div class="field nextBtn" style="display: flex;justify-content: center;">
						<div class="btn" style="width:230px;">Next</div>
					</div>					
				</div>
			
            <!-- Second Step -->
			    <div class="page">
					<!--<div class="title"> Contact Info:</div>-->
					
					<!--<div class="field">
						<input maxlength="30" tabindex="-1" type="text" class="email list"id="email" required style="width:93%;"></input>
						<label class="label emailLabel">Email</label>
					</div>-->
					
					<div class="field">
					    <div class="mobError"></div>
					    <div class="country_code" data-sequence="">
							<img src="../web_folder/flags/in.png">
							<span class="code code1" data-num="10"> +91 </span>
							<span class="fas fa-caret-down"></span>
						</div>
						<input tabindex="-1" class="tel form-control list" id="contactNum" type="tel" maxlength="10" onkeypress="isInputNumber(event)" placeholder="Contact Number" required></input>
					</div>
					<!--<div tabindex="-1" class="field" style="margin-top:40px;#666262;font-size: 15px;font-weight: bold;padding-left: 10px;">
						<div tabindex="-1" class="labeL phoneLabel" style="position: absolute;margin-top: -25px;margin-left: 20px;">Phone Number</div>
						<input tabindex="-1" type="hidden" name="country" id="ccode" class="form-control"></input>
						<input tabindex="-1" type="hidden" name="CountryCode" id="c_code"></input>
                        <input tabindex="-1" type="te" class="form-control phone" id="phone" name="mobile" style="padding-left: 80px;padding-bottom: 15px;height:35px;width:98%;" onkeypress="isInputNumber(event)" onkeyup="validation()" autocomplete="false" required></input>
                    </div>-->
					<!--<div class="col-md-6 col-12 col-pad contactNum" style="display:flex;">
						<!-- Tel Directory -->
						<!--<div class="country_code"  data-sequence="">
							<img src="../web-folder/flags/in.png" style="">
							<span class="code code1" data-num="10"> +91 </span>
							<span class="fas fa-caret-down"></span>
						</div>
						<input tabindex="-1" class="tel form-control"  id="contactNum" type="tel" maxlength="10" onkeypress="isInputNumber(event)" placeholder="Contact Number"></input>
						
					</div>-->
					
					<div class="field btns">
						<div class="btn prev-1 prev">Previous</div>
						<!--<button class="next-1 next">Next</button>-->
						<div tabindex="-1" class="btn next-1 next">Next</div>
					</div>
				</div>

            <!-- Third Step -->
			    <!--<div class="page">
					<div class="field" style="justify-content: center;display: flex;">
					    <input tabindex="-1" type="file" class="imageFile" onchange="displayImage(this)" style="display:none;">
						 <div class="profileError"></div>
						<div class="profilePic">
						    <img class="proImage" src="../web_folder/OIP.jpg">
						    <div class="fas fa-plus proPicPlus"></div>
						</div>
					</div>
					<div class="field btns">
						<div class="btn prev-2 prev">Previous</div>
						<div tabindex="-1" class="btn next-2 next">Next</div>
					</div>
				</div>-->
				
			 <!-- Forth Step -->
			    <div class="page">
					<!--<div class="title"> Security:</div>-->
					
					<!--<div class="field">
						<input class="userName list" id="userName" tabindex="-1" type="text" maxlength="30" required style="width:95%;"></input>
						<label class="label labelUserName">UserName</label>
					</div>-->
					<div class="field">
						<input maxlength="30" tabindex="-1" type="text" class="email list"id="email" required style="width:93%;"></input>
						<label class="label emailLabel">Email</label>
					</div>
					
					<div class="field">
						<input class="userPassword list" id="userPassword" tabindex="-1" type="password" maxlength="40" required style="width:95%;"></input>
						<label class="label labelPassword">Password</label>
					</div>
					
					<div class="field btns">
						<div class="btn prev-3 prev">Previous</div>
						<div tabindex="-1" class="btn next-3 next">Next</div>
					</div>			
				</div>
				
				<div class="page">
				    <div class="input-field captchaText" style="display:flex;heigh:50px;">
					    <div style="width:50%;text-align:left;">
							<i class="fas fa-hashtag"></i>
							<input tabindex="-1" type="text" maxlength="10" style="widt: 43%;" name="capcha" class="loginCaptch list" id="loginCaptch" required></input>
							<label class="label captcha" style="margin-left:0px;">Captcha</label>
						
							<img src="../web_folder/captch/captcha.php" class="captcha_img" id="im">
							<a tabindex="-1" href="javascript:void(0)" id="change_captcha" style="">
								<img src="../web_folder/refresh.png" class="refresh_button">
							</a>
					   </div>
					</div>
					<p style="font-size: 13px;text-align: left;">
					    <input tabindex="-1" type="checkbox" checked>
						I agree all the terms and conditions
					</p>
					<div class="field btns">
						<div class="btn prev-4 prev">Previous</div>
						<div tabindex="-1" class="submit register">Submit</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<!--<div class="row no-gutters optionSection container">
	    <div style="color: black;font-size: 19px;font-weight: 600;display:none;">Welcome</div>
	    <div style="position:absolute;top:10%;left:50%;transform:translate(-50%, -50%);color: grey;font-size: 19px;font-weight: 600;">Register As</div>
	    <div style="position:absolute;display:flex;top:30%;left:50%;transform:translate(-50%, -50%);">
			<div class="marchant" style="width: 200px;height: 30px;padding: 7px 10px 0px 10px;background:green;color:white;text-align:center;border-radius: 5px;"><p>Machant+Investor</p></div>
			<div class="investor" style="width:100%;height: 30px;padding: 7px 10px 0px 10px;background:green;color:white;text-align:center;margin-left:5px;border-radius: 5px;">Investor</div>
		</div>
		<div style="position:absolute;top:42%;font-size: 13px;font-family: cursive;padding-right: 20px;">
		    <p><span style="color:green;">Investor Account</span> Can allow the user to Searching the listed Companies/Firms/Businesses/Ideas</p>		
			<span style="color:green;">Marchant+Investor Account</span> allow the user to experience the hole eccess like searching the listed companys profile as well listing the users business/company/ideas
		</div>
	</div>-->
	
	
	
	<div style="display:inline-block;text-align:right;position:absolute;bottom:-10px;width:100%;">
		<img style="bottom: 0px;width:200px;" src="..\..\tradeloft\main_files\oldtrade.png">		
	</div>
	
	<div class="reg_btn">
		<div style="display:flex;">
		    <div class="registration_btn">
			    <strong>Register</strong>
			</div>
			<div class="rote" style="">
			    <i class="fas fa-sign-out-alt first" style=""></i>
			</div>
		</div>
	</div>
	
	<div class="login_btn">
		<div style="display:flex;">
		    <div class="log_btn" style="width:50%;padding-left: 20px;line-height: 1;">
			    <strong>SignIn</strong>
			</div>
			<div class="rotate" style="margin-top:-7px;width:30px;height:30px;padding-top: 5px;padding-right:25px;margin-left: 100px;background: linear-gradient( 45deg, blue, #007bff, #007bff);position:absolute;">
			    <i class="fas fa-times second"></i>
			</div>
		</div>
	</div>
	
</div>

<script src='../libraries/jQuery.min.js'></script>
<script src='js/login.js'></script>
<script src="../libraries/intl-tel-input-master/build/js/intlTelInput.js"></script>
<script>


</script>
</body>