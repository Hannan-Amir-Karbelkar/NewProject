<?php
    session_Start();
	session_unset();
	header('location:login.php');
	die();
?>
