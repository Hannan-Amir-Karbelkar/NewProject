<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
	//$userName = $_SESSION['USN'];
	//$ProfileImg = $_SESSION['PRP'];
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Index.php</title>
	<link rel="stylesheet" href="../libraries/bootstrap/bootstrap5.min.css">
	<link rel="stylesheet" href="../libraries/Font-Awesome/css/all.min.css">
	<link rel="stylesheet" href="css/admin.css">
	<script src="../libraries/jQuery.min.js"></script>
<style>	
.MainCategeryContainer{
    left: 45%;
    top: 45%;
    position: absolute;
    transform: translate(-45%, -45%);
    width: 70%;
	margin-top:30px;
	overflow:auto;
	height:85vh;
	padding-bottom:20px;
}
.btn{
	width: 100%;
    margin-top: 20px;
}
label {
    color: #948f8f;
    font-weight: 500;
    font-size: 15px;
    margin-top: 20px;
    margin-bottom: 5px;
    user-select: none;
}
.tags-container {
    position: relative;
}
.tags-container input {
	margin-top:5px;
    border: 2px solid rgba(245, 138, 151, 0.2);
    height: 45px;
    border-radius: 4px;
    outline-color: #c5c7d6;
    font-family: 'Open Sans', sans-serif;
}
.counter_parent {
    text-align: right;
    color: #34678d;
    font-size: 13px;
    font-weight: bold;
}
.counter_parent {
    text-align: right;
    color: #34678d;
    font-size: 13px;
    font-weight: bold;
}
.tags-container span {
    background-color: rgb(165 162 162 / 20%);
    color: black;
    border: 2px solid rgb(136 136 136 / 20%);
    padding: 2px;
    margin-top: 1px;
    margin-left: 2px;
    border-radius: 4px;
    display: inline-flex;
    font-size: 14px;
    font-weight: 600;
    text-transform: capitalize;
    cursor: pointer;
    transition: all 250ms ease-in-out;
}
.tags-container span i {
    font-size: 20px;
    margin-left: 5px;
    margin-top: 5px;
}

.del {
    color: red;
}
</style>	
	
	<script>
	function deleteHistory(){
		window.history.pushState(null, null, window.location.href);
	}
	</script>
	<script src="../libraries/jQuery.min.js"></script>
	<script src='../libraries/swiper-bundle.min.js'></script>
</head>
<script>
function curpercent(){
	$('.loaders').css('display','none');
}
</script>

<body style="overflow:hidden;">
<div class="shadow" style="display: none;"></div>

<div class="container-fluid"  id="MainBody">
<!-- Uploading PopUp Model -->
    <div class="uploader_progressBar" style="display:none;">
	    <div class="upload-msg">Uploading...</div>
		<div class="spinner fas fa-circle-notch fa-spin" style="text-align:center;"></div>
    </div>
	<div class="row main_Body_content">
		<?php include 'includePages/AdminHeader.php'; ?>
		<div class="col-md-12 colo-lg-12 col-xl-12 col-12 main_container">
			






			<div class="row col-lg-7 col-12 page2 webPages parent_listingProduct page2_content">
				<div class="MainCategeryContainer">
					
						<div class="form-group">
							<label for="category">Sub Category:</label>
							<input type="text" class="form-control subcategory" id="category" name="category" required>
						</div>
						<div class="form-group">
							<label for="status">Category:</label>
							<select class="form-control cat_id" id="status" name="status" required>
								<option value="">Select Status</option>
								<?php 
									require_once('../database/connection.php');
									$categories = mysqli_query($con, "SELECT * FROM `categories` WHERE status !='inactive'");
									while($row = mysqli_fetch_array($categories)){
								?>	
									<option value="<?php echo $row['id'] ?>"><?php echo $row['category'] ?></option>
								<?php
									}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="metaDescription">Meta Description:</label>
							<textarea class="form-control metaDescription" id="metaDescription" name="metaDescription" required></textarea>
						</div>
						<div class="form-group">
							<label for="metaTags">Meta Tags:</label>
							<div for="tags">Press enter or add a comma after each tag<span>*</span></div>
							<div class="tags-container">
								<div class="tagsCon_sec"></div>
								<input class="form-control tags" type="text" id="tags" data-form="sec" placeholder="Create tag">
								<div id="hiddenTags"></div>
							</div>
							<p class="counter_parent"><span class="counters">20</span><span> Tags Are Remaining</span></p>
						</div>
						<div class="form-group">
							<label for="status">Status:</label>
							<select class="form-control status" id="status" name="status" required>
								<option value="">Select Status</option>
								<option value="active">Active</option>
								<option value="inactive">Inactive</option>
							</select>
							<div class="invalid-feedback">Please select a status.</div>
						</div>
						<button type="submit" class="btn btn-success">Submit</button>
					
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript" type="javascript">curpercent();</script>
<script src="../libraries/bootstrap/bootstrap.min.js"></script>
<script>
/*** TAGGING SYSTEM START ***/
$(document).on('keyup', '#tags', function(e){
	var tel = $(this).val();
	var changetel = tel.replace(/[,,,/]/g, "");
	this.value = changetel;
	if(tel.length > 30){
		$(this).val(tel.slice(0,30));
	}
});

function prevent_function(evt){
	var bool=true;
	if(evt.keyCode==13){
		bool=false;
	}
	return bool;
}
var tag_input_field = $('#tags');
var tags_array = [];
$(document).on('keydown', '#tags', function(e){
	var get_new_tag = $(this).val();
	if(e.keyCode == 13 || e.keyCode == 188 || e.keyCode == 44){
		if(e.which == 83 ){
			e.preventDefault();
		}
		if(get_new_tag.trim() == "") {
			alert("please enter a tag");
		}else if(get_new_tag.length == 1){
			alert('Tag should be contained more than one charector');
		}else{
			var tort= $(this).data('form');
			tags_array.push(get_new_tag);
			$('.tagsCon_'+tort).append("<span><span class='list'>" + get_new_tag + "</span><i class='fas fa-times-circle del'></i> </span>");
			$(this).val("");
			var input = $('.list');
			var listing = new Array();
			for(var i = 0; i < input.length; i++){
				var a = $(input[i]).html();
				listing.push(a+', ');
			}
			if(tags_array.length > 19){
				$('#tags').css('display', 'none');
			}
			$('.counters').text(20 - tags_array.length);
		}
	}
});

function check(check){
	if(check.length > 1){
		var count = parseInt($('.counter').text());
		$('.counter').text(count + 1);
	}
}

$(document).on('click', '.tags-container span', function(){
	var k = $(this).text();
	tags_array.splice(tags_array.indexOf(k), 1);
	$(this).remove();
	$('#tags').css('display', 'block');
	//var count = parseInt($('.counter').text());
	//$('.counter').text(count + 1);
	check(k);
});


/*** SUBMITTING & VALIDATING THE FORM ****/
$(document).on('click', '.btn', function(){
	event.preventDefault();
	var subcategory = $('.subcategory').val();
	var cat_id = $('.cat_id').val();
	var metaDescription = $('.metaDescription').val();
	var status = $('.status').val();
	var inputTags = $('.tagsCon_sec .list');
	var Tags = new Array();
	for(var i = 0; i < inputTags.length; i++){
		if(i > 0){
			var comma = ' ';
		}else{ 
			var comma = '';
		}
		var a = $(inputTags[i]).html();
		if(a.length > 30){
		    var a = a.slice(0,30);
	    }
		Tags.push(comma+''+a);
	}
	let tagy = Tags.join('*');
	$.ajax({
        url: 'ajax/category.php',
        type: 'post',
		data: { subcategory:subcategory, cat_id:cat_id, metaDescription:metaDescription, tagy:tagy, status:status },
		success: function(response){
			alert('Added Successfully');	
			$('.form-control').val('');	
		}
	});
});
</script>
</body>