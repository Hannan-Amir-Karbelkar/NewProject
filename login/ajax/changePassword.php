<?php
require_once('../../database/connection.php');
session_Start();
function encryptEmail($email, $shift) {
  $encryptedEmail = '';
  for ($i = 0; $i < strlen($email); $i++) {
    $charCode = ord($email[$i]);
    $encryptedEmail .= chr(($charCode + $shift) % 256);
  }
  return $encryptedEmail;
}

function decryptEmail($encryptedEmail, $shift) {
  $decryptedEmail = '';
  for ($i = 0; $i < strlen($encryptedEmail); $i++) {
    $charCode = ord($encryptedEmail[$i]);
    $decryptedEmail .= chr(($charCode - $shift + 256) % 256);
  }
  return $decryptedEmail;
}

if(isset($_POST['email'])){
	$email  = $con->real_escape_string($_POST["email"]);
	if(!FILTER_VAR($email, FILTER_VALIDATE_EMAIL)){
		$error ='error^Please Enter valid Email Address';
	}
	if(strlen($email) > 40){
	$error ="error^Email Shouldn't be more than 40 charectors";
	}
	
	if(empty($error)==false){
		echo $error;
		die();
	}else{
		$query="select * from `registration` where email=?";
		$stmt = $con->prepare($query);
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$result = $stmt->get_result();
		$count = mysqli_num_rows($result);
		if($count>0){
			$time = date("Y-m-d H:i:s");
			$OTP = rand(1000, 9999);
			$stmt = $con->prepare("INSERT INTO `changepassowrd` (email, otp, time) VALUES (?,?,?)");
			$stmt->bind_param('sss', $email, $OTP, $time);
			if($stmt->execute()){
				$encryptedEmail = encryptEmail($email, 10);
		    	$_SESSION['UMLIDZS'] = $encryptedEmail;
			    $otp = '<div class="opt_container">';
				$otp .= '<div style="display:flex;">';
				$otp .= '<div class="fas fa-arrow-left backArrow OtpArrow"></div>';
				$otp .= '</div>';
				$otp .= '<h3 class="Otpheader">OTP Varification</h3>';
				$otp .= '<div class="img_container">';
				$otp .= '<img src="../web_folder/key2.png">';
				$otp .= '</div>';
				$otp .= '<div class="code-container codeContainer">';
				$otp .= '<input type="number" class="codes" placeholder="" min="0" max="9" required="">';
				$otp .= '<input type="number" class="codes" placeholder="" min="0" max="9" required="">';
				$otp .= '<input type="number" class="codes" placeholder="" min="0" max="9" required="">';
				$otp .= '<input type="number" class="codes" placeholder="" min="0" max="9" required="">';
				$otp .= '</div>';
				$otp .= '<div class="Error" style="color:red"></div>';
				$otp .= '<p>Please Enter 4-Digit Code Sent To<br>karbelkar20@gmail.com</p>';
				$otp .= '<div class="">';
				$otp .= '<button class="btn btn-primary varify_otp" type="button">VARIFY</button>';
				$otp .= '</div>';
				$otp .= '<div class="countdown">';
				$otp .= '</div>';
			    $otp .= '</div>';
			    echo 'Success^'.$otp;
				die();
			}
		}else{
			echo "error^We're sorry. Based on the information provided we weren't able to identify you";
		}
	}
	die();
}

if(isset($_POST['otp'])){
	$OtpEmail = $con->real_escape_string($_POST["OtpEmail"]);
	$Otp = $con->real_escape_string($_POST["otp"]);
	if(!FILTER_VAR($OtpEmail, FILTER_VALIDATE_EMAIL)){
		echo 'error^failed';
	}else if(!FILTER_VAR($Otp, FILTER_VALIDATE_INT)){	
	    echo 'error^failed';
	}else{
		$qry="SELECT * FROM `changepassowrd` where email=? AND otp=?";
		$stmt = $con->prepare($qry);
		$stmt->bind_param('ss', $OtpEmail, $Otp);
		$stmt->execute();
		$result = $stmt->get_result();
		if($result->num_rows === 1){
			$stmt = $con->prepare("DELETE FROM changepassowrd WHERE email=?");
			$stmt->bind_param('s', $OtpEmail);
			$stmt->execute();
			$otp = '<div class="opt_container">';
			$otp .= '<div style="display:flex;">';
			$otp .= '<div class="fas fa-arrow-left backArrow passArrow"></div>';
			$otp .= '</div>';
			$otp .= '<h3 class="Otpheader">Change Password</h3>';
			$otp .= '<div class="img_container">';
			$otp .= '<img src="../web_folder/key2.png">';
			$otp .= '</div>';
			$otp .= '<div class="code-container codeContainer">';
			$otp .= '<input type="email" class="password pass1" placeholder="Enter New Password"  max="9" required="">';
			$otp .= '<br><br>';
			$otp .= '<input type="email" class="Password pass2" placeholder="Re-Enter New Password"  max="9" required="">';				
			$otp .= '</div>';
			$otp .= '<div class="PassError" style="color:red"></div>';
			$otp .= '<p>Enter Same Password In Both Fields<br> Do not use Previos password</p>';
			$otp .= '<div class="">';
			$otp .= '<button class="btn btn-primary changePassword" type="button">save changes</button>';
			$otp .= '</div>';
			$otp .= '</div>';
			echo 'Success^'.$otp;
			die();
		}else{
			echo 'error^Sorry. Please Enter correct OTP Numbersw';
		}
	           
	}
}


if(isset($_POST['deleteEmail'])){
	$deleteEmail = $con->real_escape_string($_POST["deleteEmail"]);
	$stmt = $con->prepare("DELETE FROM changepassowrd WHERE email=?");
	$stmt->bind_param('s', $deleteEmail);
	$stmt->execute();
}

if(isset($_POST['resending'])){
	$encriptEmail = $_SESSION['UMLIDZS'];
	$decryptedEmail = decryptEmail($encriptEmail, 10);	
	$stmt = $con->prepare("DELETE FROM changepassowrd WHERE email=?");
	$stmt->bind_param('s', $decryptedEmail);
	$stmt->execute();
	
	$time = date("Y-m-d H:i:s");
	$OTP = rand(1000, 9999);
	$stmt = $con->prepare("INSERT INTO `changepassowrd` (email, otp, time) VALUES (?,?,?)");
	$stmt->bind_param('sss', $decryptedEmail, $OTP, $time);
	if($stmt->execute()){
		echo $decryptedEmail;
	}
}

if(isset($_POST['firstPass'])){
	$firstPass  = $con->real_escape_string($_POST["firstPass"]);
	$secondPass  = $con->real_escape_string($_POST["secondPass"]);
	$PassEmail  = $con->real_escape_string($_POST["PassEmail"]);
	$encriptEmail = $_SESSION['UMLIDZS'];
	$decryptedEmail = decryptEmail($encriptEmail, 10);
	if($firstPass != $secondPass){
		$error = "error^! Passwords do not matched";
	}else if(strlen($firstPass) > 40){
	    $error ="error^password must be in 40 charectors";
	}else if(!FILTER_VAR($PassEmail, FILTER_VALIDATE_EMAIL)){
		$error ='error^Something went wrong please try again';
	}else if($PassEmail != $decryptedEmail){
		$error ='error^Something went wrong please try again';
	}
	if(empty($error)==false){
		echo $error;
		die();
	}else{
		$userPassword  = password_hash($firstPass,PASSWORD_BCRYPT);
		$query="UPDATE `registration` SET userPassword=? WHERE email=?";
		$stmt = $con->prepare($query);
		$stmt->bind_param('ss', $userPassword, $decryptedEmail);
		if($stmt->execute()){
			unset($_SESSION['UMLIDZS']);
			header("Location:../login.php");
		    exit;
		}
	}
}

?>
