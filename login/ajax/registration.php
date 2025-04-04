<?php
require_once('../../database/connection.php');
session_Start();
if(isset($_POST['firstName'])){
    $firstName  = $con->real_escape_string($_POST["firstName"]);
    $lastName  = $con->real_escape_string($_POST["lastName"]);
    $email  = $con->real_escape_string($_POST["email"]);
    $tel  = $con->real_escape_string($_POST["tel"]);
    $code  = $con->real_escape_string($_POST["code"]);
    $codelength  = $con->real_escape_string($_POST["codelength"]);
    //$proImage  = $_FILES['proImage']['name'];
    $userPassword  = $_POST["userPassword"];
    $loginCaptch  = $_POST["loginCaptch"];
	$cap_code = $_SESSION['cap_code'];
	$regex = "/[.](\w+)/i";
	//$blackListExtns = array("PHP", "php", "php1", "php2", "php3", "php4", "php5", "php6", "php7", "phps", "pht", "phtm", "phtml", "pgif", "shtml", "htaccess", "phar", "inc", "hphp", "ctp", "module", "text", "svg", "js", "html", "HTML", "xml", "XML", "pdf", "doc", "com", "in", "net", "as", "txt", "docx", "xlxs", "pptx", "pdf", "ini", "3mf", "mp3", "mp4", "webm", "ogv", "avi", "mov", "wmv", "flv", "mpeg", "wav", "psd", "indd", "zip", "xls", "AVI", "RAR", "bin", "jar", "exe", "ps", "obj", "bmp", "ai", "xhtml", "rss", "jsp", "part", "cfm", "cgi", "pl", "asp", "aspx", "tmp", "dmp", "cfg", "drv", "mdb", "dat", "accdb", "csv", "db", "dbf", "log", "pdb", "sav", "sql", "tar", "odt", "msg", "rtf", "tex", "wks", "wps", "wpd", "cer", "asp", "htm", "ico", "max", "tif", "tiff", "3ds", "3dm");	
    //$whitelistExtns = array("jpeg", "jpg", "png",);
	
	$tellength = strlen($tel);
	
	//$imgName  = $_FILES['proImage']['name'];
	//$imgSize  = $_FILES['proImage']['size'];
	//$file_text = explode('.', $imgName);
	//$regex_text = preg_match_all($regex, $imgName);	
	
	$query="select * from `profile` where email=?";
	$stmt = $con->prepare($query);
	$stmt->bind_param('s', $email);
	$stmt->execute();
	$result = $stmt->get_result();
	$count = mysqli_num_rows($result);
	if($count>0){
		$error ='email/285/-60/emailLabel/Email ID already Exist.';
	}
	
	if(!FILTER_VAR($email, FILTER_VALIDATE_EMAIL)){
		$error ='email/285/-60/emailLabel/Invalid Email-ID';
	}
	if($loginCaptch != $cap_code){
		$error ='captchaText/250/-80/captcha/Invalid Captcha';
	}
	if($tellength != $codelength){
		$error ='tel/395/-20/0/number must be in digits';
	}
	if(strlen($firstName) > 40){
		$error = 'firstName/450/0/labelFirstName/Charectors must be in 40 digits';
	}
	if(strlen($lastName) > 40){
		$error = 'lastName/450/0/labelLastName/Charectors must be in 40 digits';
	}
	if(strlen($email) > 30){
		$error = 'email/285/-60/emailLabel/Charectors must be in 30 digits';
	}
	if(strlen($userPassword) > 40){
		$error = 'userPassword/285/-60/labelPassword/Charectors must be in 40 digits'; 
	}
	
	/*if($regex_text == 1){
		if(in_array($file_text[1],$blackListExtns)){
			$error = 'proImage/342/-40/0/Only Jpeg, jpg & png files allowed';	
		}else if(in_array($file_text[1],$whitelistExtns)=== false){
			$error = 'proImage/342/-40/0/Only Jpeg, jpg & png files allowed';	
		}else if($imgSize > 300000){
			$error = 'proImage/342/-40/0/ File should not be more than 3Mb';
		}
	}
	if($regex_text > 1){
		if(in_array($file_text[1],$blackListExtns)){
			$error = 'proImage/342/-40/0/Multiple extensions prohibited';
		}else if(in_array($file_text[2],$blackListExtns)){
			$error = 'proImage/342/-40/0/Multiple extensions prohibited';
		}else{
			$error = 'proImage/342/-40/0/Multiple extensions prohibited';
		}		
	}*/
	
	if(empty($error)==false){
		echo $error;
		die();
	}else{
		$firstName     = FILTER_VAR($_POST["firstName"], FILTER_SANITIZE_SPECIAL_CHARS);
		$lastName      = FILTER_VAR($_POST["lastName"], FILTER_SANITIZE_SPECIAL_CHARS);
		$email         = FILTER_VAR($_POST["email"], FILTER_SANITIZE_SPECIAL_CHARS);
		$tel           = FILTER_VAR($_POST["tel"], FILTER_SANITIZE_SPECIAL_CHARS);
		$code          = FILTER_VAR($_POST["code"], FILTER_SANITIZE_SPECIAL_CHARS);
		$userPassword  = password_hash($userPassword,PASSWORD_BCRYPT);
		/*function resize_image($new,$max_resolution,$file_text1){
			if(file_exists('../../public_folder/profileImages/'.$new)){
				if($file_text1 == 'jpeg' || $file_text1 == 'jpg'){
				    $original_image = imagecreatefromjpeg('../../public_folder/profileImages/'.$new);
				}else if($file_text1 == 'png'){
					$original_image = imagecreatefrompng('../../public_folder/profileImages/'.$new);
				}else{
					$original_image = imagecreatefromgif('../../public_folder/profileImages/'.$new);
				}
				$original_width = imagesx($original_image);
				$original_height = imagesy($original_image);
					
				$ratio = $max_resolution / $original_width;
				$new_width = $max_resolution;
				$new_height = $original_height * $ratio;
				if($new_height > $max_resolution){
					$ratio = $max_resolution / $original_height;
					$new_height = $max_resolution;
					$new_width = $original_width * $ratio;
				}
					
				if($new_height > $max_resolution){
					$ratio = $max_resolution / $original_height;
					$new_height = $max_resolution;
					$new_width = $original_width * $ratio;
				}
					
				if($original_image){
					$newimage = imagecreatetruecolor($new_width, $new_height);
					imagecopyresampled($newimage,$original_image, 0,0,0,0, $new_width, $new_height, $original_width, $original_height);						
					if($file_text1 == 'jpeg' || $file_text1 == 'jpg'){
					    imagejpeg($newimage,'../../public_folder/profileImages/'.$new);
                    }else if($file_text1 == 'png'){
                        imagepng($newimage,'../../public_folder/profileImages/'.$new);
					}else{
						imagegif($newimage,'../../public_folder/profileImages/'.$new);
					}
				}
			}
		}
		if(isset($_FILES['proImage']['name'])){
			$profile_new_name = uniqid().$_FILES['proImage']['name'];
			move_uploaded_file($_FILES['proImage']['tmp_name'],'../../public_folder/profileImages/'.$profile_new_name);
			$filePart = explode('.', $_FILES['proImage']['name']);
			$ext = end($filePart);
			resize_image($profile_new_name,"350",$ext);
		}*/
		$User_Id_Num = rand();
		$encript_method = (($User_Id_Num*136806)/302);
		$encript_method = 'UID-'.$encript_method;
		$base_encription = urldecode(base64_encode($encript_method));
		unset($_SESSION['cap_code']);
        $sql= "INSERT INTO `registration`(`user_Id`, `email`, `userPassword`, `date`, `status`)
		        VALUES 
		        ('$base_encription','$email','$userPassword',Now(),1)";
                if(mysqli_query($con,$sql)){
					$sqli= "INSERT INTO `profile`(`user_id`, `firstName`, `lastName`, `email`, `contact`, `mob_code`)
					VALUES
					('$base_encription','$firstName', '$lastName', '$email', '$tel', '$code')";
					mysqli_query($con,$sqli);
				}
		$success = 'submitted/ / /';
		echo $success;
		die();
	}
}
if(isset($_POST['loginEmail'])){
	$loginEmail = $_POST['loginEmail'];
	$userPass= $_POST['userPass'];
	$loginEmail= stripcslashes($loginEmail);
	$password= stripcslashes($userPass);
	$loginEmail= mysqli_real_escape_string($con, $loginEmail);
	$password= mysqli_real_escape_string($con, $password);
	$query="select * from `registration` where email=?";
	$stmt = $con->prepare($query);
	$stmt->bind_param('s', $loginEmail);
	$stmt->execute();
	$result = $stmt->get_result();
	$count = mysqli_num_rows($result);
	if($count>0){
		$row = $result->fetch_assoc();
		$userPassword = $row['userPassword'];
		$userId = $row['user_id'];
		$status = $row['status'];
		
		if($status == 1){
			if(password_verify($password, $userPassword)){
					$time = date("Y-m-d H:i:s");
					$OTP = rand(1000, 9999);
					$stmt = $con->prepare("INSERT INTO `otp` (email, user_id, otp_code, date) VALUES (?,?,?,?)");
					$stmt->bind_param('ssss', $loginEmail, $userId, $OTP, $time);
					if($stmt->execute()){
						echo $userId;
						die();
					}
			}else{
				if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
					$ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
				}else{
					$ip_address = $_SERVER['REMOTE_ADDR'];
				}
				$timestamp = date("Y-m-d H:i:s");
				$num = 1;
				$qry="SELECT * FROM `login_attempts` where email_id=? AND ip_address=?";
				$stmt = $con->prepare($qry);
				$stmt->bind_param('ss', $loginEmail, $ip_address);
				$stmt->execute();
				$result = $stmt->get_result();
				$count = mysqli_num_rows($result);
				if($count>0){
					$row = $result->fetch_assoc();
					$num_attempt = $row['num_of_attempt'];
					if($num_attempt >= 4){
						//Blocked User Account and Delete the Row
						$status = 2;
						$query="UPDATE `registration` SET status=?, statusTime=? WHERE user_id=?";
						$stmt = $con->prepare($query);
						$stmt->bind_param('sss', $status, $timestamp, $userId);
						$stmt->execute();
					}else{
						//Update number of attempt with each wrong password
						$numberOfAttempt = $num_attempt + 1;
						$query="UPDATE `login_attempts` SET num_of_attempt=? WHERE email_id=? AND ip_address=?";
						$stmt = $con->prepare($query);
						$stmt->bind_param('iss', $numberOfAttempt, $loginEmail, $ip_address);
						$stmt->execute();
					}
				}else{
					$stmt = $con->prepare("INSERT INTO login_attempts (user_id, email_id, ip_address, num_of_attempt, attempt_time) VALUES (?,?,?,?,?)");
					$stmt->bind_param('sssss', $userId, $loginEmail, $ip_address, $num, $timestamp);
					$stmt->execute();
				}
				echo 'errorMsg';
			}
		}else if($status == 2){
		    echo 'blocked';
    	}if($status == 3){
			echo 'deactivate';
		}
	}else{
		echo 'errorMsg';
	}
}


if(isset($_POST['emailId'])){
	$emailId = $_POST['emailId'];
	$stmt = $con->prepare("DELETE FROM otp WHERE email=?");
	$stmt->bind_param('s', $emailId);
	$stmt->execute();
	echo $emailId;
}

if(isset($_POST['otpEmail'])){
	$otpEmail = $_POST['otpEmail'];
	$userId   = $_POST['userId'];
	$otp   = $_POST['otp'];
	if(!FILTER_VAR($otpEmail, FILTER_VALIDATE_EMAIL)){
		echo 'failed';
	}else if(!FILTER_VAR($otp, FILTER_VALIDATE_INT)){
	    echo 'failed';
	}else{
		$qry="SELECT * FROM `otp` where email=? AND otp_code=?";
		$stmt = $con->prepare($qry);
		$stmt->bind_param('ss', $otpEmail, $otp);
		$stmt->execute();
		$result = $stmt->get_result();
		if($result->num_rows === 1){
			
			$query="select * from `profile` where email=?";
			$stmt = $con->prepare($query);
			$stmt->bind_param('s', $otpEmail);
			$stmt->execute();
			$result = $stmt->get_result();
			$count = mysqli_num_rows($result);
			if($count>0){
				$row = $result->fetch_assoc();
				$firstName = $row['firstName'];
				$lastName = $row['lastName'];
				$cart_product = $row['cart_product'];
				$full_Name = $firstName . ' ' . $lastName;
				$pro_pic = $row['pro_pic'];
				$_SESSION['USN'] = $full_Name;
				$_SESSION['PRP'] = $pro_pic;
				$_SESSION['CPN'] = $cart_product;
			}
			
			/*** Encode User-Id From Database ***/
			$encode = base64_decode(urldecode($userId));
			$encode = substr($encode,4);
			//$userId = (($encode*302)/26463648826541)/178697658536;
			//$userId = (($encode*8)/16);
			$userId = (($encode*302)/136806);
			$EncodedStr = strpos($userId, '.');
			if($EncodedStr !==false){
				$userId = ceil($userId);
			}
			/*** Encrypt User-Id And Save In Session ***/
			//$encrypt_method = (($userId*8805449682*9765405012)/313);
			//$encrypt_method = (($userId*19)/4);
			$encrypt_method = (($userId*378720)/240);
			$base_encryption = urldecode(base64_encode($encrypt_method));
			$_SESSION['UMLIDLGZS'] = $base_encryption;
			
			unset($_SESSION['cap_code']);
			$stmt = $con->prepare("DELETE FROM otp WHERE email=?");
			$stmt->bind_param('s', $otpEmail);
			$stmt->execute();
			echo $base_encryption ;
		}else{
			echo 'failed';
		}
	}
	die();
}

//Formula Of Encryption for Saving In Session
	//$encrypt_method = (($userId*8805449682*9765405012)/313);
	//$base_encryption = urldecode(base64_encode($encrypt_method));

//Formula Of Decryption Retrieved from Session
    //$user_id = $_SESSION['UMLIDLGZS'];
	//$encode = base64_decode(urldecode($user_id));
	//$Decrypt_method = (($encode*313)/9765405012)/8805449682; 
	
//ENCRYPT SESSION USER ID TO MATCH WITH USER ID OR INSERT IN DATABASE 
	//$encript_method = (($user_id*178697658536*26463648826541)/302);
	//$encript_method = 'UID-'.$encript_method;
	//$user_id = urldecode(base64_encode($encript_method));
?>