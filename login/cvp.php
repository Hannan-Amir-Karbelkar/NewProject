<?php
session_start();
//print_r($_SESSION);
?>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="keywords" content="English Grammer,Lectures,English Lectures,English">
	<meta content="This is a basic text" property="og:title">
	<meta content="This is a basic text" property="og:description" />
    <title>Change Password</title>

   <!-- <link rel="stylesheet" href="css/otp.css">-->
	<link rel="stylesheet" href="../libraries/Font-Awesome/css/all.min.css">
	
<style>
.msgBox{
    color: #635c5c;
    //box-shadow: 0 4px 12px 0 rgb(0 0 0 / 40%);
    max-height: 80vh;
    margin: auto;
    display: none;
    transition: 0.5s ease;
    position: fixed;
    text-align: center;
   // width: 70%;
    background: #ffff;
    z-index: 999;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 10px;
	width: 50%;
}
.second_row {
    padding: 0px;
    padding-top: 0px;
    padding-bottom: 0px;
    font-family: emoji;
}
.loader {
    display: none;
    position: fixed;
    width: 100%;
    height: 100%;
    background: white;
    z-index:10000;
    opacity: 0.9;
}
.countdown{
	color:#11599b;
}
.resendOtp{
	cursor:pointer;
}
.Otpheader {
    margin: 5px 10px 20px 10px;
	font-size:25px;
}
.loadingSpinner2 {
    top: 50%;
    position: absolute;
    font-size: 40px;
    left: 50%;
    transform: translate(-50%, -50%);
}
.opt_container {
    border-radius: 10px;
    padding: 10px;
    text-align: center;
}
.backArrow {
    position: absolute;
    //margin-top: -32px;
	margin-left: -30px;
    background: #ffde55;
    color: white;
    padding: 10px;
    border-radius: 50%;
    cursor: pointer;
}
.img_container {
    min-height: 80px;
}
.code-container {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 10px 0;
}
.btn-primary {
    color: #fff;
    background: #ffc428;
    border-color: #ffb108;
}

.btn {
    display: inline-block;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    user-select: none;
    cursor: pointer;
    border: 1px solid transparent;
    margin: 0px 0px 10px 0px;
    padding: 7px 30px;
    font-size: 0.9rem;
    border-radius: 10px;
    text-transform: uppercase;
    letter-spacing: 0.7;
}
.codeContainer{
	display:block;
}
.codes {
    background: rgba(255, 255, 255, 0.6);
    color: #ffbb16;
    border-radius: 10px;
    border: 1px solid #ffb50a;
    font-size: 20px;
    height: 45px;
    width: 40px;
    margin: 10px;
    text-align: center;
    font-weight: 300;
    outline: none;
}
.codes:valid {
    border-color: #f1ab08;
    transform: scale(1.1);
}
.opt_container p{
	font-size:19px;
}
.img_container img {
    width: 90px;
    vertical-align: middle;
}
.email, .password{
    border: 1px solid orange;
    padding: 10px;
    width: 100%;
    border-radius: 5px;
	font-size:17px;
	outline:none;
}
.EmailSending{
	margin-top: -70px;
}
.changePass, .OTPSection{
	display:none;
}
.codes::-webkit-outer-spin-button,
.codes::-webkit-inner-spin-button{
	-webkit-appearance: none;
}
@media (max-width: 600px){
.img_container img {
    width: 70px;
}
.code-container {
    flex-wrap: wrap;
}
.msgBox {
    width: 90%;
}
.backArrow {
    margin-left: 0px;
}
.Otpheader {
	font-size:20px;
}
.opt_container p{
	font-size:17px;
}
}

</style>

</head>
<body>
<div class="loader">
	<div class="loadingSpinner2">
		<span class="fas fa-spinner fa-spin"></span>
	</div>
</div>
<div class="msgBox" style="display: block;">
	<div class="second_row">	
	    <div class="EmailSending">
			<div class="opt_container">
				<div style="display:flex;">
					<div class="fas fa-arrow-left backArrow emailArrow"></div>
				</div>
				<h3 class="Otpheader">Verify Your Account</h3>
				<div class="img_container">
					<img src="../web_folder/key2.png">
				</div>
				<div class="code-container codeContainer">
					<input type="email" class="email" placeholder="Enter Email"  max="9" required="">
				</div>
				<div class="Error" style="color:red"></div>
				<p>Enter the email address associated<br> with your TradeBot account</p>
				<div class="">
					<button class="btn btn-primary sendEmail" type="button">Send</button>
				</div>
			</div>
		</div>
		<div class="OTPSection"></div>		
		<div class="changePass"></div>
	</div>
</div>

</div>
<script src='../libraries/jQuery.min.js'></script>
<script src='js/changePass.js'></script>
<script>


</script>
</body>
</html>