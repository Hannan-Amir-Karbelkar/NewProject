<?php
    session_start();
	$_SESSION['PAGETRNS'] = 'true';
	header('Location:'. 'index.php');
?>