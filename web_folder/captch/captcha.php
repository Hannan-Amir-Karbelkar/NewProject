<?php
$str = md5(microtime());;
$str = substr($str,0,6);

if(isset($_POST['captchaInput'])){
	session_start();
	//$captchaInput      = $con->real_escape_string($_POST["captchaInput"]);
	//$capt      = $con->real_escape_string($_POST["cap_code"]);
	$captchaInput = $_POST['captchaInput'];
	$capt = $_SESSION['cap_code'];
	if($captchaInput == $capt){
		echo 'true';
	}else{
		echo 'false';
	}
 
}else{
	session_start();
	$_SESSION['cap_code'] = $str;

	//$img = imagecreate(80,41);
	$img = imagecreate(80,41);

	/*Background Color*/
	imagecolorallocate($img,0, 97, 217);
	//imagecolorallocate($img,190, 43, 123);

	/*Font Color*/
	$txtcol = imagecolorallocate($img,255,255,255);

	imagestring($img,50,13,13,$str,$txtcol);

	header('content:image/jpeg');
	imagejpeg($img);

}
?>


