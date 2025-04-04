<?php
//require_once('../database/connection.php');
/*if(!defined('ListingAccessSite')){
	header('location:index');
	die();
}*/
?>
<link rel="stylesheet" href="css/businessPage.css">     
<link rel="stylesheet" href="css/dragableSlider.css">
<div class="row app"></div>
<script>
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
<script src="js/businessPage.js"></script>
<script src="js/slider.js"></script>