<?php
/*if(!defined('ListingAccessSite')){
	header('location:index');
	die();
}*/
/*$User_Id = $_SESSION['UMLIDLGZS'];
$HTTP = $_SERVER['HTTP_HOST'];
$URL = $_SERVER['REQUEST_URI'];
$URI =  $HTTP.$URL;*/
//if ($URI == 'localhost/tradeloft/index2.php' || $URI == 'localhost/tradeloft/businessPage.php'){

?>

<!-- Comment Adding & Editing Inputs -->
<input type="hidden" class="comId">
<input type="hidden" class="comType">
<!-- Country Code Inputs -->
<input type="hidden" value="" class="seq">

<!-- Search Box -->
<div class="row search_bar">
	<div class="closeSearchBox">
		<i class="fas fa-times" style="color:red;text-align: right;padding-right:20px;"></i>
	</div>
	<div style="display:flex;" class="searchInput">
		<div style="width: 90%;">
			<input style="" type="text" name="search" id="search" autocomplete="off" placeholder="Type Something To Search...." required="">
		</div>
		<div style="width: 10%;text-align:right">
			<i class="fas fa-search product-serch"></i>
		</div>
	</div>
</div>


<!-- Email PopUp Model -->
<div class="WebModel">
	<div class="loginBox">
	    <div class="webheading">
			<div class="closeLogin">X</div>
			<div class="loginHead">LOGIN</div>
			<div class="web-heading">Login for the best shopping Experience and exclusive access</div>
		</div>
		<form>
		<div>
			
			<input class="web-text form-control login-mail" id="login-mail" autocomplete="false" tabindex="-1" required>
			<label for="login-mail" class="label mailLabel">E-mail</label>
		</div>
		
		<div>
			<input class="web-link form-control login-pass" id="login-pass" type="password" tabindex="-1" type="text" required>
			<label  for="login-mail" class="label passLabel">Password</label>
	    </div>
		<div style="text-align:right;padding-bottom: 5px;display:flex;justify-content: space-between;">
			<div class="loginErrorMsg"></div>
			<div class="forgetPass" style="text-align:right;"><a href="login/cvp.php"> Forgot Password?</a></div>
		</div>
		<div class="web-btn login"><span class="website-btn">Sign In</span></div>
		<div class="login-options">--- Or sign in with ---</div>
		<div class="social-login-icons">
			<div class="login-with-G"><span class="google-g">G</span>oogle</div>
			<div class="login-with-F"><span class="facebook-f">f</span>acebook</div>
		</div>
		<div class="reginstration-section">
			Don't have an account? <span class="registrationLink">Register now</span>
		</div>
		</form>
    </div>
	<div class="optBox"></div>
</div>
	
<div class="shadow"></div>
<!-- Uploading PopUp Model -->
    <div class="uploader_progressBar" style="display:none;">
	    <div class="upload-msg">Uploading...</div>
		<div class="spinner fas fa-circle-notch fa-spin" style="text-align:center;"></div>
    </div>
	
<!-- Editing PopUp Model -->	
    <div class="EditModel" style="display:none;">
	    <div class="heading">
			<div class="Edit-heading"></div>
			<div class="closeEdit">X</div>
		</div>
	    <textarea class="Edit-text" name="edit" style="width:100%"></textarea>
	    <div class="Edit-btn"><span class="fas fa-paper-plane"></span></div>
		<input type="hidden" class="inputTags">
		<textarea type="" class="spaceLine" name="spaceLine" style="width:100%"></textarea>
    </div>

<!-- Country Code PopUp Model -->
	<div class="country_code_list">
		<ul>
			<li data-code="+91" data-flag="in" data-num="10" style="border-bottom:1px solid;">
				<img src="/bellezza/web_folder/flags/in.png">
				<span class="country-name">India (भारत) </span>+91
			</li>
			<li data-code="+93" data-flag="af" data-num="9">
				<img src="/bellezza/web_folder/flags/af.png">
				<span class="country-name">Afghanistan (&#x202B;افغانستان&#x202C;&lrm;)</span> +93
			</li>
			<li data-code="+880" data-flag="qa2" data-num="10">
		        <img src="/bellezza/web_folder/flags/qa2.png">
				<span class="country-name">Bangladesh (বাংলাদেশ)</span> +880
			</li>
			<li data-code="+91" data-flag="in" data-num="10">
				<img src="/bellezza/web_folder/flags/in.png">
			    <span class="country-name">India (भारत)</span> +91
			</li>
			<li data-code="+92" data-flag="pk" data-num="7">
			    <img src="/bellezza/web_folder/flags/pk.png">
				<span class="country-name">Pakistan (&#x202B;پاکستان&#x202C;&lrm;)</span> +92 
			</li>
			<li data-code="+971" data-flag="ae" data-num="8">
				<img src="/bellezza/web_folder/flags/ae.png">
				<span class="country-name">United Arab Emirates (&#x202B;الإمارات  العربية المتحدة&#x202C;&lrm;)</span> +971 
			</li>
		</ul>
   </div>

<!-- Sharing Post PopUp Model -->
	<div class="popover" id="pop_body">
		<div class="popoverHeader">
			<div class="ShareHeader">Share Post</div>
			<div class="closePopover">X</div>
		</div>
        <div class="sharingPopBody">
			<a href="https://www.facebook.com/sharer.php?u=https://www.amazon.in/dp/B07Q2QZF8M/ref=s9_acsd_hps_bw_c2_x_1_i?pf_rd_m=A1K21FY43GMZF8&amp;pf_rd_s=merchandised-search-5&amp;pf_rd_r=PZABCTB8Z66QZ9VA5S2Z&amp;pf_rd_t=101&amp;pf_rd_p=ea257bc9-ebf1-408d-acfd-b18662339d7a&amp;pf_rd_i=22963012031" target="blank">
				<img src="/bellezza/web_folder/twitter.png" style="height:40px;">
			</a>
			<a href="http://twitter.com/share?text=Hello Twitter Walo&amp;url=https://www.amazon.in/dp/B07Q2QZF8M/ref=s9_acsd_hps_bw_c2_x_1_i?pf_rd_m=A1K21FY43GMZF8&amp;pf_rd_s=merchandised-search-5&amp;pf_rd_r=PZABCTB8Z66QZ9VA5S2Z&amp;pf_rd_t=101&amp;pf_rd_p=ea257bc9-ebf1-408d-acfd-b18662339d7a&amp;pf_rd_i=22963012031" target="blank">
				<img src="/bellezza/web_folder/Twitter2.png" style="height:40px;">
			</a>
			<a href="https://api.whatsapp.com/send?phone= &amp;text=urlencoded="" target="blank">
				<img src="/bellezza/web_folder/success3.jpeg" style="height:50px;width:50px;">
			</a>
		</div>
	</div>

<!-- Post Edit And Delete Action Modal -->
	<div class="modal" id="Action" aria-modal="true" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				   <!-- Modal Header -->
				<div class="modal-header">
					<p>Action </p>
					<button type="button" class="close" data-dismiss="modal" id="btn_close">X</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body firstNone">
					<input type="hidden" class="ActionModal">
					<div class="postAction edit_post btn_load_screen"><span class="fas fa-pen-fancy"></span><span class="options">Edit Post</span></div>
					<div class="postAction delete_post"><span class="fas fa-trash-alt"> </span><span class="options">Delete Post</span></div>
					<div class="postAction"><span class="fas fa-edit"></span><span class="options">Edit Image</span></div>
					<div class="postAction"><span class="fas fa-globe"> </span><span class="options">Privacy</span></div>
					<div class="postAction" style="border-bottom:none;"><span class="fas fa-unlink"></span><span class="options">Turn off Comment</span></div>
				</div>
				<div class="modal-body SecondNone">
					<input type="hidden" class="ActionModal">
					<div class="postAction edite_post"><span class="fas fa-share"></span><span class="options">Share</span></div>
					<div class="postAction delete_post"><span class="fas fa-download"></span><span class="options">Save for later</span></div>
					<div class="postAction" style="border-bottom:none;"><span class="fas fa-flag"></span><span class="options">Report Post</span></div>
				</div>
			</div>
		</div>
	</div>





<!--- Comment Section --->
<div class="commentnav" id="myCommentnav">
<!---- Public Reply PopUp Modal --->
<input type="hidden" value="" id="val">
<input type="hidden" value="" id="RepVal">
<input type="hidden" value="" id="RepEditVal">
<input type="hidden" value="" id="RepOnRepVal"  class="repOnRepVal">
<input type="hidden" value="" id="RepOnRepCommentId">
</div> 

<!-- Botton Token, Investment, And Other Multiple Options -->
<div class="more-option" style="transition:0.8s ease;width:100%; height:0px;position:fixed;bottom:0px;background:white;z-index: 9991;box-shadow: rgb(0 0 0 / 20%) 1px -1px 12px 0px;border-radius: 20px 20px 0px 0px;">
    <div style="text-align:right;color: red;font-weight: bold;margin-right: 20px;margin-top: 10px;cursor:pointer;">
	    <div class="more-option-close">X</div>
	</div>
    <div style="display:flex;justify-content:center;">
	    <div style="text-align:center;" class="bottom-boxes profile log user-investment actionBtn" data-id="<?php echo $User_Id ?>" data-src="page4" call_type="businessPage">
				<div class="fas fa-wallet" style="color:#5a5656;margin:10px;margin-bottom: 2px;padding:15px;background: #e2e2e2;border-radius:15px;font-size: 20px;"></div>
		    <div style="font-size: 12px;font-weight: 600;">Your Investments</div>
		</div>
		
		<div style="text-align:center;" class="bottom-boxes btn_Listing actionBtn" data-src="page3">
		    <div class="fas fa-scroll" style="margin:10px;margin-bottom: 2px;padding:15px;color:#5a5656;background: #e2e2e2;border-radius:15px;font-size: 20px;"></div>
			<div style="font-size: 12px;font-weight: 600;">List Business</div>
		</div>
		
		<div style="text-align:center;" class="bottom-boxes log listedCom">
		    <div class="fas fa-money-check-alt" style="margin:10px;margin-bottom: 2px;padding:15px;color:#5a5656;background: #e2e2e2;border-radius:15px;font-size: 20px;"></div>
		    <div style="font-size: 12px;font-weight: 600;">Subscription</div>
		</div>
		
	</div>
</div>



<!-- Likes Section --->
<!--<div class="likers_list" id="likers_list">	
	<div class="list_row" style="display:flex;">
	    <div class="fas fa-arrow-left closeLikePage" style="cursor:pointer;font-size:16px;color:white;margin-top:3px;margin-left: 10px;"></div>
	    <div style="font-size:15px;font-family:cursive;color:white;z-index:99900;margin-left: 10px;">People Who Like This Post</div>
	</div>	
	<div class="liker" style="min-height:99vh;"></div>
</div>-->


<script type="text/javascript">
$(document).ready(function(){
   $(".scrollTo").click();
});

//$(document).on("change", ".imgUpload", function(){
//$(".imgUpload").change(function(){
function displayImage1(e){
	if (e.files[0]){
		var reader = new FileReader();
		reader.onload = function(e){
			document.querySelector('.img1').setAttribute('src',e.target.result);
			$('.image1').css('display', 'block');
			$('.uploader1').css('display', 'none');
			$('.uploader').css('display', 'none');
			
			//var image2 = document.getElementById('TimelineImage2').files;
			var image3 = document.getElementById('TimelineImage3').files;
			var image4 = document.getElementById('TimelineImage4').files;
			var image5 = document.getElementById('TimelineImage5').files;
			/*if(image2.length == 0){
		     	$('.uploader2').css('display', 'inline-block');
			}*/ 
			if(image3.length == 0){
		     	$('.uploader3').css('display', 'inline-block');
			}else if(image4.length == 0){
		     	$('.uploader4').css('display', 'inline-block');
			}else if(image5.length == 0){
		     	$('.uploader5').css('display', 'inline-block');
			}
		}
		var file1 = '';
		var file3 = '';
		var file4 = '';
		var file5 = '';
		
		var file1 = $('#TimelineImage1').val();
		var file3 = $('#TimelineImage3').val();
		var file4 = $('#TimelineImage4').val();
		var file5 = $('#TimelineImage5').val();
		if (file1 != file3){
		    if (file1 != file4){
		        if (file1 != file5){
			        reader.readAsDataURL(e.files[0]);
		        }else{
				    alert('Dublicate Entry');
			    }
		    }else{
		        alert('Dublicate Entry');
	        }
		}else{
		    alert('Dublicate Entry');
	    }
	}
}

function displayImage3(e){
	if (e.files[0]){
		var reader = new FileReader();
		reader.onload = function(e){
			document.querySelector('.img3').setAttribute('src',e.target.result);
			$('.image3').css('display', 'block');
			$('.uploader3').css('display', 'none');
			$('.uploader').css('display', 'none');
			
			var image1 = document.getElementById('TimelineImage1').files;
			//var image2 = document.getElementById('TimelineImage2').files;
			var image4 = document.getElementById('TimelineImage4').files;
			var image5 = document.getElementById('TimelineImage5').files;

			if(image1.length == 0){
		     	$('.uploader1').css('display', 'inline-block');
			/*}else if(image2.length == 0){
		     	$('.uploader2').css('display', 'inline-block');*/
			}else if(image4.length == 0){
		     	$('.uploader4').css('display', 'inline-block');
			}else if(image5.length == 0){
		     	$('.uploader5').css('display', 'inline-block');
			}
		}
		
		var file1 = '';
		var file3 = '';
		var file4 = '';
		var file5 = '';
		
		var file1 = $('#TimelineImage1').val();
		var file3 = $('#TimelineImage3').val();
		var file4 = $('#TimelineImage4').val();
		var file5 = $('#TimelineImage5').val();
		if (file3 != file1){
		    if (file3 != file4){
		        if (file3 != file5){
			        reader.readAsDataURL(e.files[0]);
		        }else{
				    alert('Dublicate Entry');
			    }
		    }else{
		        alert('Dublicate Entry');
	        }
		}else{
		    alert('Dublicate Entry');
	    }
	}
}
function displayImage4(e){
	if (e.files[0]){
		var reader = new FileReader();
		reader.onload = function(e){
			document.querySelector('.img4').setAttribute('src',e.target.result);
			$('.image4').css('display', 'block');
			$('.uploader4').css('display', 'none');
			$('.uploader').css('display', 'none');
			
			var image1 = document.getElementById('TimelineImage1').files;
			//var image2 = document.getElementById('TimelineImage2').files;
			var image3 = document.getElementById('TimelineImage3').files;
			var image5 = document.getElementById('TimelineImage5').files;

			if(image1.length == 0){
		     	$('.uploader1').css('display', 'inline-block');
			/*}else if(image2.length == 0){
		     	$('.uploader2').css('display', 'inline-block');*/
			}else if(image3.length == 0){
		     	$('.uploader3').css('display', 'inline-block');
			}else if(image5.length == 0){
		     	$('.uploader5').css('display', 'inline-block');
			}
		}
		var file1 = '';
		var file3 = '';
		var file4 = '';
		var file5 = '';
		
		var file1 = $('#TimelineImage1').val();
		var file3 = $('#TimelineImage3').val();
		var file4 = $('#TimelineImage4').val();
		var file5 = $('#TimelineImage5').val();
		if (file4 != file1){
		    if (file4 != file3){
		        if (file4 != file5){
			        reader.readAsDataURL(e.files[0]);
		        }else{
				    alert('Dublicate Entry');
			    }
		    }else{
		        alert('Dublicate Entry');
	        }
		}else{
		    alert('Dublicate Entry');
	    }
	}
}

function displayImage5(e){
	if (e.files[0]){
		var reader = new FileReader();
		reader.onload = function(e){
			document.querySelector('.img5').setAttribute('src',e.target.result);
			$('.image5').css('display', 'block');
			$('.uploader5').css('display', 'none');
			$('.uploader').css('display', 'none');
			
			var image1 = document.getElementById('TimelineImage1').files;
			//var image2 = document.getElementById('TimelineImage2').files;
			var image3 = document.getElementById('TimelineImage3').files;
			var image4 = document.getElementById('TimelineImage4').files;

			if(image1.length == 0){
		     	$('.uploader1').css('display', 'inline-block');
			/*}else if(image2.length == 0){
		     	$('.uploader2').css('display', 'inline-block');*/
			}else if(image3.length == 0){
		     	$('.uploader3').css('display', 'inline-block');
			}else if(image4.length == 0){
		     	$('.uploader4').css('display', 'inline-block');
			}
		}
		var file1 = '';
		var file3 = '';
		var file4 = '';
		var file5 = '';
		
		var file1 = $('#TimelineImage1').val();
		var file3 = $('#TimelineImage3').val();
		var file4 = $('#TimelineImage4').val();
		var file5 = $('#TimelineImage5').val();
		if (file5 != file1){
		    if (file5 != file3){
		        if (file5 != file4){
			        reader.readAsDataURL(e.files[0]);
		        }else{
				    alert('Dublicate Entry');
			    }
		    }else{
		        alert('Dublicate Entry');
	        }
		}else{
		    alert('Dublicate Entry');
	    }
	}
}

function imgDel(e){
    $('.img'+e).attr('src', '');
    $('.image'+e).css('display', 'none');
	$('.uploader').css('display', 'none');
	$('.uploader'+e).css('display', 'inline-block');
	$('#TimelineImage'+e).val('');
};

$('.submit_form').on('submit', function(e){
	e.preventDefault();
	let form_data = new FormData(this);
	let content = $('.form-contro').html();
	let textColor = $('#colorPicker').val();
	let headingText = $('#headingText').val();
	form_data.append('my_cont', content);
	form_data.append('textcolor', textColor);
	form_data.append('headingText', headingText);
	let intag = $('.intag').val();
	//tag_data.append('intag', intag);
	$.ajax({
		url: '../ajax/taging.php',
		type: 'POST',
		//dataType: 'JSON',
		data: {intag:intag},		
		//data{ tag_data},		
		//contentType: false,
		//processData: false,
		success:function(data){
			alert('Line Number 3934 of posts.php');
		}
	});	
	$.ajax({
		url: '../dump_files/test.php',
		type: 'POST',
		data: form_data,		
		contentType: false,
		processData: false,
		success:function(Myresult){
			alert('Line Number 3934 of posts.php');
			$('.form-contro').html('');
		    closeTextBox();
		    view_record();	
		}
    });	
});


/*** Multiple Images Uploader ***/
$('#Testbtn0000000').click(function(e){
	e.preventDefault();
	let form_data = new FormData();
	if($('.multiImage0').data('id')){
		var imageNum0 = $('.multiImage0').data('id');
		var imageType0 = $('.multiImage0').data('type');
		form_data.append('img1', imageNum0);
		form_data.append('type1', imageType0);
	}
	if($('.multiImage1').data('id')){
		var imageNum1 = $('.multiImage1').data('id');
		var imageType1 = $('.multiImage1').data('type');
		form_data.append('img2', imageNum1);
		form_data.append('type2', imageType1);
	}
	if($('.multiImage2').data('id')){
		var imageNum2 = $('.multiImage2').data('id');
		var imageType2 = $('.multiImage2').data('type');
		form_data.append('img3', imageNum2);
		form_data.append('type3', imageType2);
	}
	if($('.multiImage3').data('id')){
		var imageNum3 = $('.multiImage3').data('id');
	    var imageType3 = $('.multiImage3').data('type');
		form_data.append('img4', imageNum3);
		form_data.append('type4', imageType3);
	}		
	//let form_data = new FormData();
	let img  = $('.TimelineImage')[0].files;
	//var image = document.getElementById('TimelineImage').files;
	//var imgName     = image[].files;
		//alert(imgName);
	/*for(i = 0; i < image.length; i++){
		var imgName     = image[i].files;
		alert(image);
	}*/
	let content = $('.form-contro').html();
	let textColor = $('#colorPicker').val();
	form_data.append('Timeline', 	[0]);
	//form_data.append('Timeline1', image);

	//form_data.append('img1', imgName1);
	//form_data.append('img2', imgName2);
	//form_data.append('img3', imgName3);
	//form_data.append('img4', imgName4);
	
	/*form_data.append('img1', imageNum0);
	form_data.append('img2', imageNum1);
	form_data.append('img3', imageNum2);
	form_data.append('img4', imageNum3);
	
	form_data.append('type1', imageType0);
	form_data.append('type2', imageType1);
	form_data.append('type3', imageType2);
	form_data.append('type4', imageType3);*/
	
	form_data.append('my_cont', content);
	form_data.append('textcolor', textColor);

	$.ajax({
		//url: '../ajax/check.php',
		url: '../ajax/multipleImageUploader.php',
		type: 'POST',
		data: form_data,
		
		contentType: false,
		processData: false,
		success:function(Myresult){
			//alert(Myresult+ ' Hello ji ');
		$('.form-contro').html('');
		closeTextBox();
		view_record();
		}
});
});

/********* When User Click In Text Box area of Front Page ****/
$("#editor2").on('click', function () {	 
    openNewTextBox();
});
 
 /********* When User Click on tag friend btn in Front Page ****/
 $(".tag_freind").on('click', function () {	 
     openNewTextBox();
 });
 
  /********* When User Click on tag friend btn in PopUp Modal ****/
$(".tag_friends").on('click', function () {	
    document.getElementById("tag").style.display="block";
	$(".tagSearch").focus();
    //document.getElementsByClassName("timelinePost").style.display="none";
});


  /********* close tag friend btn in PopUp Modal ****/
$("#tag_close").on('click', function () {	 
    document.getElementById("tag").style.display="none";
	$(".tag-container").html('');
	$('.tag-container').css('border', 'none');
	$('.tagSearch').val('');
	$('.results').html('');
});

/**** POST SECTION IN FORM OF MODAL ****/
$("#open_box").click(function(){
	
	document.getElementById("heading").style.display="block";
	document.getElementById("post_textBox").style.display="none";
	document.getElementById("open_box").style.display="none";
	document.getElementById("close_box").style.display="INLINE";
	$(".heading").focus();
});

$("#close_box").click(function(){
	document.getElementById("heading").style.display="none";
	document.getElementById("post_textBox").style.display="block";
	document.getElementById("open_box").style.display="inline";
	document.getElementById("close_box").style.display="none";
	$(".heading").blur();
	$("#editor").focus();
});

/********* Post Privacy management ****/
$(".privacy").click(function(){
	var privacy = $(this).data('privacy');
	$('.privacy_section').css('display', 'block');
});

  /********* When User Select Privacy Option ****/
$(".privacy_options").click(function(){
	var privacyType = $(this).data('privacytype');
	$(this).find(".privacy_check_box").prop("checked", true);
    $(".privacy_options").removeClass('active');
	$(this).addClass('active');
	    /*$.ajax({
            url: '../ajax/privacy.php',
            method: 'post',
			beforeSend:function(){
				$('.privacy_spinner').css('display', 'block');
			},
            data: {privacyType:privacyType},
			method: 'POST',
			success: function (response) {
				$('.privacy_spinner').css('display', 'none');
				$(".privacy_indecator").html(privacyType);
				$(this).data('privacy', privacyType);
				var privacy = $(this).data('privacy');
				//alert(privacy);
            }
        });	*/
});
/*** Open Privacy Section Box */
function closePrivacyBox(){
	$('.privacy_section').css('display', 'none');
}

/********* When User Click In Text Box area of Front Page ****/
$(document).on('click', '#editor2', function(){
	openNewTextBox();
});
 
 /********* When User Click on tag friend btn in Front Page ****/
$(document).on('click', '.tag_freind', function(){
     openNewTextBox();
});
/*** When User Click In Text Box area of Front Page ***/
function openNewTextBox(){
	document.getElementById("PostModal").style.display="block";
	document.getElementById("editor").focus(); 
	document.body.style.overflow = 'hidden';
};
/*** Close Button for Closing the TextArea Popup Box ***/
function closeTextBox(){
	//$('#bpid').val('');
	//$('#editor').val('');
	//$('.editImg').html('');
	//$('#TimelineImage').val('');
	//$('#timelineImageDisplay').append('');
	document.getElementById("PostModal").style.display="none";
	document.getElementById("EditPostModal").style.display="none";
	document.body.style.overflow = 'visible';
	$("#myForm")[0].reset();
}





/*** Regex for preventing from Hack in Input fields "fetch_comment_data_Second_idea LINE-291" ***/
function isInputNumber(evt){
	var ch = String.fromCharCode(evt.which);
	if((/[<>]/.test(ch))){
		evt.preventDefault();
	}
}

/*** Scrolling From top to Bottom On Comment Container ***/
function comment_scroll(){
	var scrollLenght = $('#myCommentnav').scrollTop();
	if(scrollLenght > 70){
		$('.comment_top_scrolling_btn').addClass("CommentScrollActive");
	}else{
		$('.comment_top_scrolling_btn').removeClass("CommentScrollActive");
	}
}
$(".comment_top_scrolling_btn").click(function(){
	$('.TopOfThePostSection').click();
});
$('#myCommentnav').scroll(function(){
	comment_scroll()
})
</script>