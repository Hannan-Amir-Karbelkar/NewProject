$(document).ready(function(){
	deleteHistory();
	sessionStorage.removeItem("POSICOMID");
	sessionStorage.removeItem("COMID");
	sessionStorage.removeItem("REPID");
	
	
	
/****** LOAD JS & CSS FILES ONLY AT ONE TIME******/
$(document).on('click', '.companyInformation', function(){
	if(!isCssLoaded){
		$("<link rel='stylesheet' href='css/businessPage.css'>").appendTo("head");
		$("<link rel='stylesheet' href='css/dragableSlider.css'>").appendTo("head");
		$("<script src='js/businessPage.js'></script>").appendTo("head");
		isCssLoaded = true;
	}
});
/*$(document).on('click', '.get_comment_id', function(){
	if(!isComCssLoaded){
		$("<link rel='stylesheet' href='css/comment.css'>").appendTo("head");
		
		isComCssLoaded = true;
	}
});*/
$(document).on('click', '.btn_Listing', function(){
	if(!isComListingCss){
		$("<link rel='stylesheet' href='css/listing.css'>").appendTo("head");
		$("<script src='js/listing.js'></script>").appendTo("head");
		isComListingCss = true;
	}
});
$(document).on('click', '.notification_button', function(){
	if(!isNotificationCss){
		$("<link rel='stylesheet' href='css/notification.css'>").appendTo("head");
		$("<script src='js/notification.js'></script>").appendTo("head");
		isNotificationCss = true;
	}
});
$(document).on('click', '.btn_load_screen', function(){
	if(!isSubscriptionCss){
		$("<link rel='stylesheet' href='css/subscription.css'>").appendTo("head");
		$("<script src='js/subscription.js'></script>").appendTo("head");
		isSubscriptionCss = true;
	}
});
$(document).on('click', '.user-investment', function(){
	if(!isMyInvestmentCss){
		$("<link rel='stylesheet' href='css/userInvestment.css'>").appendTo("head");
		isMyInvestmentCss = true;
	}
});

var isCssLoaded = false;
var isComCssLoaded = false;
var isComListingCss = false;
var isNotificationCss = false;
var isSubscriptionCss = false;
var isMyInvestmentCss = false;

/*** Social Media Sharing PopUp Modal  ***/ 
// Open Media Sharing PopUp Modal bodyblur
$(document).on('click', '.get_id', function(){
	var flag =1;
    if(flag==1){
		document.querySelector('.popover').className = 'popover ONPopover';
	    $('#MainBody').css({'filter':'blur(5px)','pointer-events':'none'});
		$('.header').css({'pointer-events':'auto'});
		flag =1;
	}
});
// Close Media Sharing PopUp Modal
$(document).on('click', '.closePopover', function(){
    $('.popover').removeClass('ONPopover');
    $('#MainBody').css({'filter':'none','pointer-events':'auto'});
    $('.header').css({'pointer-events':'auto'});
	//document.body.style.overflow = 'auto';
});

/*** Search And Close Search In Header ***/
$('.fa-search').on('click', function(){
    $('.search_bar').css('display', 'block');
	$("#search").focus();
});

/*** SEARCH IN HEADER SECTION ***/
$('.fa-times').on('click', function(){
    $('.search_bar').css('display', 'none');
	$("#search").val('');
	$("#results").html('');
});

$('#search').on('keyup', function(){
	$('#results').html('');
    var searchField = $(this).val();
	if(searchField !=='' && searchField !== null){
		var expression = new RegExp(searchField, "i");
		var exp = /^[#@%]/;
		var Regexpres = searchField.match(exp);	
		if(Regexpres){
			var reg =/^[#@]/;
			var result = searchField.replace(reg, "");
			if(result !==''){
				$('#results').append('<a href="trade/tradeBlogs.php?id=2"><li class="list-group-item link-class"><span height="40" width="40" class="fas fa-search" ></span><span style="margin-left:10px;" class="typo"></span></li></a>');
				$('.typo').text(result);
				var expression = result;
				$.ajax({
					url: "ajax/search.php",
					method: "POST",
					dataType: "html",
					data:{expression: expression},
					success: function(data){
						$('#results').html(data);
					}
				});
			}
		}else{
			$.ajax({
				url: "ajax/search.php", 
				method: "POST",
				data:{searchField: searchField},
				success: function(data){
					$('#results').html(data);
				}
			});
		}
	}
});

$('.fa-bars').on('click', function(){
	$('.fa-bars').css('display', 'none');
	$('.close_search_header').css('display', 'block');
	$('.first').css('height', '100vh');
	document.body.style.overflow = 'hidden';
});

$('.close_search_header').on('click', function(){
	$('.close_search_header').css('display', 'none');
	$('.fa-bars').css('display', 'block');
	$('.first').css('height', '0');
	document.body.style.overflow = 'visible';
});

/*** Top Navigation Bar And Bottom navigation Bar System On Scroll **/
var query = window.innerWidth;
if (query < 767){
	topNav();
}
function topNav(){
    var previousScroll = 0;
	$('.webPages').scroll(function(){
		var WindowscrollLenght = $('.webPages').scrollTop();
		var InfoScrollLenght = $('.parent_companyInfo ').scrollTop();
	    if(WindowscrollLenght > 61.60714340209961 || InfoScrollLenght > 61.60714340209961){
			var currentScroll = $(this).scrollTop();
			if(currentScroll > previousScroll){
				$('.bottom_bar').css('bottom', '-100px');
			}else{
				$('.bottom_bar').css('bottom', '0px');
			}
			previousScroll = currentScroll;
		}
    });
}

//Function For Adding The Blurish Body 
function AddBodyBlur(){
	alert();
	$('#MainBody').css({'filter':'blur(5px)','pointer-events':'none'});
	document.body.style.overflow = 'hidden';
	$('.header').css({'pointer-events':'none'});
	$('.shadow').css('display','block');
}

//Function For Removing The Blurish Body 
function RemoveBodyBlur(){
	$('#MainBody').css({'filter':'none','pointer-events':'auto'});
	document.body.style.overflow = 'auto';
	$('.header').css({'pointer-events':'auto'});
	$('.shadow').css('display','none');
}

// Close Front Action Edit Del PopUp Modal
$(document).on('click','.close',function(){
	$('#Action').css({'top':'30%','transition':'0.5s','visibility':'hidden','opacity':'0'});
	RemoveBodyBlur();
});

// Close Investors Profile PopUp Modal
$(document).on('click','.close2',function(){
	$('#InProfModal').css('transform', 'scale(0)');
});

//function CloseLikedPage(){
$(document).on("click", ".closeLikePage", function() {
	$('.likers_list').css('transform', 'scale(0)');
	$('#MainBody').css({'filter':'none','pointer-events':'auto'});
	document.body.style.overflow = 'visible';
}); 

/*** Second Bottom Popup ***/
// Open bottom Popup
$(document).on('click','.post_action_btn',function(){
	$('.more-option').css('height', '150px');
	$('#MainBody').css({'filter':'blur(2px)','pointer-events':'none'});
	document.body.style.overflow = 'hidden';
	$('.header').css({'pointer-events':'none'});
});

// Close bottom Popup
$(document).on('click','.more-option-close, .bottom-boxes',function(){
	$('.more-option').css('height', '0px');
	$('#MainBody').css({'filter':'none','pointer-events':'auto'});
	document.body.style.overflow = 'visible';
	$('.header').css({'pointer-events':'auto'});
});


/*** Open & Close FrontPage Comment Action PopUp ***/
// Open Popup  
$(document).on("click", ".act_btn", function() {
  $('.com-dot-option-wrap').fadeOut(200);
  var postsid = $(this).data("id");
  $('.ClearComntReply'+postsid).css('display', 'none');
  $(".commentInput2"+postsid).val('');
  var postspopup = $(this).siblings(".com-dot-option-wrap");
  $(postspopup).fadeToggle(200);
  actionWrapper(postspopup);
});

function actionWrapper(postspopup) {
  $(document).on("click.closepopup", function(event) {
    if ($(event.target).closest(postspopup).length === 0 && $(event.target).closest(".act_btn").length === 0) {
      $(".com-dot-option-wrap").fadeOut(200);
      $(document).off("click.closepopup");
    }
  });

  $(document).on("scroll.closepopup", function(event) {
    if ($(event.target).closest(postspopup).length === 0 && $(event.target).closest(".act_btn").length === 0) {
      $(".com-dot-option-wrap").fadeOut(200);
      $(document).off("scroll.closepopup");
    }
  });
}
 
/*** Comment PopUp Modal  ***/
// Open Comment PopUp Modal
$(document).on('click', '.comment_input', function(){
	var flag =1;
    if(flag==1){
		$('.commentInputSection').css({'transform':'scale(1,1)'});
	    $('#MainBody').css({'filter':'blur(5px)','pointer-events':'none'});
	    $('#MainBody').css('pointer-events', 'none');
	    $('.main_header').css('pointer-events', 'none');
		$('.bottom_bar').css({'filter':'blur(1px)', 'pointer-events':'none'});
	    document.body.style.overflow = 'hidden';
		flag =1;
		$(".comment-textarea").focus();
	}
});

// Close Comment PopUp Modal
$(document).on('click','.text-close',function(){
    $('.commentInputSection').css({'transform':'scale(0,0)'});
    $('#MainBody').css({'filter':'none','pointer-events':'auto'});
    $('.main_header').css({'pointer-events':'auto'});
    $('.bottom_bar').css({'filter':'none','pointer-events':'auto'});
	document.body.style.overflow = 'auto';
	$('.comment-textarea').val('');
	$('.comType').val('');
	$('.comId').val('');
	$('.comError').text('');
});

// Open Comment Model for Editing The Comments
$(document).on("click", ".edit_comment", function() {
	var id = $(this).data("main-id");
	var post_id = $(this).data("id");
	var comment = $('.frontPageComment'+post_id).html();
	var comment = comment.replace(/<br>/g, "\n");
	var comment = comment.replace(/&nbsp;/g, " ");
	comment = $('<div/>').html(comment).text();
	comment = comment.replace(/\\'/g, "'");
	var comment = comment.trim();
	$('.comment-textarea').val(comment);
	$('.comType').val(id);
	$('.comId').val(post_id);
	$('.commentInputSection').css({'transform':'scale(1,1)'});
	$('#MainBody').css({'filter':'blur(5px)','pointer-events':'none'});
	document.body.style.overflow = 'hidden';
	/*function decodeCommet(comment){
		return $.htmlDecode(comment);
	}*/
});

/************** Carousel *******************/
$(document).on('click','.car',function(){
	var id=$(this).data('id');
	var carousel=$(this).data('carousel');
	$('#myCarousel'+carousel).carousel(id);
});

$(document).on('click', '#commentInput', function(){
	var post_id = $(this).data('id');
	$('.commentSubmit').attr('data-post', post_id);
	$('.comId').val(post_id);
});

// Commnet Submit 
$(document).on('click', '.commentSubmit', function(){
	var post_id = $('.comId').val();
	var comment = $('.comment-textarea').val();
	var commentId = $('.comType').val();
	if(comment.length > 1000){
		$('.comError').text('Please Enter 1000 digits');
		$(document).on('keyup', '.comment-textarea', function(){
		    $('.comError').text('');
	    });
	}else if(comment.length == 0){
		$('.comError').text('Please Fill The Empty Input Box');
		$(document).on('keyup', '.comment-textarea', function(){
		    $('.comError').text('');
	    });	
	}else{
		$('.uploader').css('display', 'block');
		var comment = comment.replace(/  /g, "[sp][sp]");
	    var comment = comment.replace(/\n/g, "[nl]");
		$.ajax({
		   url: 'ajax/action.php',
			method:"POST",
			data:{post_id:post_id, comment:comment, commentId:commentId},
			success:function(data){
				if(data == 'error/please fill the comment box'){
					$('.uploader').css('display', 'none');
				}else if(data == 'error/Charectors must be in 12 digits'){
					$('.comError').text('Please Enter 10 digits');
					$('.uploader').css('display', 'none');
				}else{
					if(data !== ''){
						var objects = JSON.parse(data);
						for(var i = 0; i < objects.length; i++){
							var object = objects[i];
							var comment_Id = object.comment_Id;
							var comment = object.comment;
							var comments_num = object.comments_num;
							var ProfileImg = object.ProfileImg;
							var UserName = object.UserName;
							var commentData = "<div class='Appendedcomment'><div class='comment_container"+post_id+"' style='padding-left:20px;padding-right:20px;'><div style='padding:2px;display: flex;position: relative;'><div style='width:50%;display: flex;' class='comment_header"+post_id+"'><img src='public_folder/profileImages/"+ProfileImg+"' style='margin-top:2px;display:flex;width:30px;height:30px;border-radiu:50%;'><div><span class='name"+post_id+"' style='position:absolute;padding:5px;color:#365899;font-weight:800;font-family:cursive;font-size:15px;'>@"+UserName+"</span> </div></div><div class='options_wrapper' style='display:flex;justify-content:flex-end;'><div class='"+post_id+" act_btn' id='act_btn"+post_id+"' data-id='"+post_id+"' data-postid='82' data-userid='20' data-commentid='"+comment_Id+"'>...</div><div style='display: none;' class='miniActionModal com-dot-option-wrap action_pop"+post_id+"' id='action_pop"+post_id+"'><div class='ac_modoal"+post_id+"'><div class='optSelecto edit_commen edit_commen"+post_id+"' data-id='"+post_id+"' data-main-id='"+commentId+"' style='padding-bottom:7px;padding-top:7px;margin-left:12px;margin-right:5px;border-bottom:1px solid #e0dfdf;color:#365899;'><b><span class='fas fa-flag'> </span>&nbsp;&nbsp; Save Link</b></div><div class='optSelector edit_comment edit_comments"+post_id+"' data-id='"+post_id+"' data-main-id='"+comment_Id+"'><span class='fas fa-edit'> </span>&nbsp;&nbsp; Edit Comment</div><div class='optSelector delete_comment' data-id='"+post_id+"' data-main-id='"+comment_Id+"'><span class='fas fa-trash-alt'> </span> &nbsp;&nbsp; Delete Comment</div><div class='optSelector'><span class='fas fa-globe' style='font-weight:100px'> </span> &nbsp;&nbsp;  Privacy</div></div></div></div></div><input type='hidden' class='post_id"+post_id+"' value='"+post_id+"'><input type='hidden' class='main_idos"+post_id+"' value='1360'><div style='padding:2px;display:flex;width:100%;' id='myComments'><div id='CommentId"+post_id+"' class='form-control frontPageComment frontPageComment"+post_id+"' style='font-family:emoji;height:auto;display:flex;width:100%;padding:5px;padding-bottom:10px;background-color:#fffff;border:none;border-bottom:1px solid #365899;color:#504e4b;border-radius:0px;font-size:15px;'>"+comment+"</div></div></div></div>";
							$('.mainParent'+post_id).html(commentData);
							$('.comment_num'+post_id).html(comments_num);
							$('.commentInputSection').css({'transform':'scale(0,0)'});
							$('#MainBody').css({'filter':'none','pointer-events':'auto'});
							document.body.style.overflow = 'auto';
							$('.comment-textarea').val('');
							$('.comType').val('');
							$('.comError').text('');
							$('.uploader').css('display', 'none');
						}
					}
				}
			}
		});
	}
});

//Delete Comments
$(document).on("click", ".delete_comment", function() {
	 var id = $(this).data("main-id");
	 var post_id = $(this).data("id");
	 $.ajax({
		url: 'ajax/action.php',
    	method:"POST",
		data:{Delete: 'Delete', post_id:post_id, id:id},
		success:function(data){
			alert(data);
			$('.mainParent'+post_id).html('');
			$('.comment_num'+post_id).html(data);
			
		}
	});
});

/*** Post Like System ***/
$(document).on('click','.likes, .likes2' ,function(event){
    if(!event.detail || event.detail == 1){ 
        const audio = new Audio('sound/notify_pop.wav');
        audio.play();
		$post = $(this);
		var post_id = $(this).data('id');
		var replace_post_id = post_id.replace(/=/g, '');
		$post.addClass('hide');
		$post.siblings().removeClass('hide'); 
		var heart ="<span data-id ='"+post_id+"' style='color:red;font-size:18px;margin-top:5px;font-size: 23px;' class='like_displayer likers fas fa-heart'></span>";
		var likes = $(this).data('like');
		var response = likes + 1;
		$('.unlike2').attr('data-unlike', response);
		$post.siblings().attr('data-unlike', response);
		//$('.like'+postid).attr('data-unlike', response);
		$('.likedisplayer'+replace_post_id).html(heart +' '+ response);
		$('.like_displayer2'+replace_post_id).html(response);
		$('.like_num').html(response);
		$('.like'+replace_post_id).addClass('hide');
		$('.unlike'+replace_post_id).removeClass('hide');
		$('.like'+replace_post_id).parent().find('span.likes_count').css('color', 'red');
		$('.unlike2'+post_id).removeClass('hide');
		$('.like2'+post_id).addClass('hide');
		//if(response > 0){
		   // $('.likedisplayer2'+post_id).removeClass('hide');
		//}
		if(response > 0){
			//$('.post_like_displayer').css('display', 'block');
			$('.post_like_displayer').removeClass('hide');
		}
		$.ajax({
			url: 'pages/page1.php',
			type: 'post',
			data: {'liked': 1, 'post_id': post_id},
			success:function(data){
			}
		});
	}
});

// When The User Clicks On Unlike Icon
$(document).on('click','.unlike, .unlike2',function(event){
    if(!event.detail || event.detail == 1){
        const audio = new Audio('sound/notify_pop.wav');
        audio.play();
		//$('#audioBox')[0].play();
		var postid = $(this).data('id');
		var likeAlpha ="<span style='colo:#365899;font-siz:16px;font-family:emoj;'>Like</span>";
		var heart ="<span data-id ='"+postid+"' style='color:red;font-size:18px;margin-top:5px;font-size: 23px;' class='like_displayer likers fas fa-heart'></span>";
		$post = $(this);
		var unlike = $(this).data('unlike');
		var response = unlike - 1;
		//alert(unlike + ' - ' + response);
		$post.parent().find('span.likes_count').html (" "+ likeAlpha);
		$('.unlike'+postid).parent().find('span.likes_count').css('color', '#365899');
		if(response > 0){
			$('.likedisplayer'+postid).html(heart +' '+ response);
		}else{
			$('.likedisplayer'+postid).html('');
		}
		$('.unlike'+postid).addClass('hide');
		$('.unlike'+postid).siblings().removeClass('hide');
		$post.siblings().attr('data-like', response);
		$post.siblings().siblings().removeClass('hide');
		$(this).addClass('hide');
		$('.like'+postid).attr('data-like', response);
		//if(response == 0){
		if(response == 0){
			//$('.post_like_displayer').css('display', 'none');
			$('.post_like_displayer').addClass('hide');
		}
		$('.like_num').html(response);
		if(response < 1){
			var response = 0;
		}
		$('.like_displayer2'+postid).html(response);
		$('.like2'+postid).removeClass('hide');
		$('.unlike2'+postid).addClass('hide');
		/*if(response < 1){
		    $('.likedisplayer2'+post_id).addClass('hide');
		}*/
		$.ajax({
			url: 'pages/page1.php',
			type: 'post',
			data: {'unliked': 1,'postid': postid}, 
		});
	}
});

/*** OPEN POST ACTION MODEL ***/
$(document).on('click', '.postActionBtn', function(){
	var post_id = $(this).data('id');
	var clickedClass = event.target.className;
	$('#Action').css({'top':'5%','transition':'0.5s','visibility':'visible','opacity':'1'});
	var post_id = $(this).data('id');
	$('.ActionModal').val(post_id);
	AddBodyBlur();
	if(clickedClass === 'fas fa-ellipsis-v Activer'){
		$('.SecondNone').css('display', 'none');
    	$('.firstNone').css('display', 'block');
	}else if(clickedClass === 'fas fa-ellipsis-v NonActiver'){
		$('.firstNone').css('display', 'none');
		$('.SecondNone').css('display', 'block');
	}
	$('.edit_post').attr('data-src', 'listingPage?id='+post_id);
});

$(document).on('click', '.edit_post', function(){
    $('#Action').css({'top':'30%','transition':'0.5s','visibility':'hidden','opacity':'0'});
    $('.modal-backdrop ').css({'display':'none'});
	RemoveBodyBlur();
});

/****** Show Likers List When User Click The Heart Icon ******/
$(document).on('click','.likers ',function(){
    $('.likers_list').css('transform', 'scale(1)');
	$('#MainBody').css({'filter':'none','pointer-events':'none'});
	document.body.style.overflow = 'hidden';
    var postId = $(this).data('id');
	var limit = 1;
	var start = 0;
    var action = 'inactive';
    function load_all_data(limit, start){
        $.ajax({
			cache:false,
			url: 'ajax/action.php',
			method:"POST",
			data:{postId:postId, limit:limit, start:start},
		    success:function(data){
				if(data !== ''){
                    if(start == 0){
					    $('.liker').html(data);
					}else{
						$('.liker').append(data);
					}
					$('.likeloader').remove();
					action = "inactive";
				}else{
					
					$('.likeloader').remove();
					action = 'active';
				}
            }
        });
    }

	if(action == 'inactive'){
		action = 'active';
		load_all_data(limit, start);
   }
   var $likers_list = $('.likers_list');
   $('.likers_list').scroll(function(){
		var contentHeight = $likers_list[0].scrollHeight;
		var visibleHeight = $likers_list.innerHeight();
		var scrollPosition = $likers_list.scrollTop();
		var scroll = $('.likers_list').scrollTop();
		var scroll2 = $('.likers_list').height();
		var scroll4 = scroll+scroll2;
		var scroll3 = $(".liker").height();
		if(scrollPosition + visibleHeight >= contentHeight - 2 &&  action  === 'inactive' && !isLoading) {	
			$('.liker').append("<div class='likeloader' style='text-align:center;padding:5px;'><i class='fas fa-circle-notch fa-spin' style='font-size:50px;color:#a9a9a9;'></div>");
			action = 'active';
			start = start + 1;
			setTimeout(function(){
				load_all_data(limit, start);
			}, 2000);
	    }
	});
});

function AddBodyBlur(){
	$('#MainBody').css({'filter':'blur(5px)','pointer-events':'none'});
	document.body.style.overflow = 'hidden';
	$('.header').css({'pointer-events':'none'});
}

/***************** Open All Users Comments And Replies In Back Comment Section ********************/
$(document).on('click','.get_comment_id',function(){
	var post_id = '';
	var comment_id ='';
	var rep_id = '';
	if($(this).data('type')){
		var type = $(this).data('type');
		var comment_id = $(this).data('comment-id');
		var rep_id = $(this).data('repid');
		var start = 0;
		var width = $(window).width();
		sessionStorage.setItem("POSICOMID", 'null');
		sessionStorage.removeItem("Refresh");
	}else{
		var type = null;
	}
	window.location.hash ="Comment";
	$('#myCommentnav').css('height', '100%');
	$('#MainBody').css({'filter':'blur(5px)','pointer-events':'none'});
	document.body.style.overflow = 'hidden';
	var post_id = $(this).data('id');
	if($(this).data('type')){
		if(sessionStorage.getItem("COMID") != comment_id || sessionStorage.getItem("COMID") == null || sessionStorage.getItem("REPID") != rep_id || sessionStorage.getItem("REPID") == null){
			refreshContent();
		}else{
			$('#comment-box').css('display', 'block');
		}
	}
	if(!$(this).data('type')){
		if(sessionStorage.getItem("POSICOMID") != post_id  || sessionStorage.getItem("POSICOMID") == null || refresh == post_id){
			refreshContent();
		}else{
			$('#comment-box').css('display', 'block');
		}
	}
	function refreshContent(){
		 $('#myCommentnav').html("<div class='CommentSpinner' style='position:relative;background:white;pointer-events: none;text-align:center;z-index:4000004;top: 45%;left: 45%;text-align: center;transform: translate(-45%, -45%);'><span class='fas fa-circle-notch fa-spin' style='color:grey;font-size:40px;'></span></div>");
		$.ajax({
			beforeSend:function(){
				$('.CommentSpinner').css('opacity', '1');
				$('.Cpost_idommentSpinner').css('visibility', 'visible');
			},
			url:"ajax/comment.php",
			method:'POST',
			data:{post_id:post_id, type:type},
			success:function(data){
				$('.CommentSpinner').css('opacity', '0');
				$('.CommentSpinner').css('visibility', 'hidden');
				$('#myCommentnav').html(data);
				alert('Clal Chalachal');
				//$("<script src='js/comment.js'></script>").appendTo("head");
				//$(document).on('click', '.get_comment_id', function(){
					if(!isComCssLoaded){
						$("<link rel='stylesheet' href='css/comment.css'>").appendTo("head");
						$("<script src='js/comment.js'></script>").appendTo("head");
						isComCssLoaded = true;
					}
				//});
				var isComCssLoaded = false;
				var limit = 4;
				var start = 0;
				var action = 'inactive';
                $('.backPost').html("<div style='margin-left: 45%;margin-top: 45%;'><span class='fas fa-circle-notch fa-spin' style='color:#6e70ff;font-size:35px;text-align:center;'></span>");
				function load_all_data(limit, start){
					if(comment_id !=''){
						dataToSend = {post_id:post_id, type:type, comment_id:comment_id, rep_id:rep_id, start:start, width:width};
					}else{
						dataToSend = {limit:limit, start:start, post_id:post_id};
					}
					$.ajax({
						url: 'ajax/comment_data.php',
						method:"POST",
						data:dataToSend,
						cache:false,
						success:function(data){
							if(data !== ''){
								if(start == 0){
									$('.backPost').html(data);
								}else{
									$('.backPost').append(data);
								}
								$('#load_Comments_data_message').html('<button class="loadMoreCommets" data-confirm="confirm" data-post="'+post_id+'" data-start="'+start+'"><div class="loaderDiv"><i class="fas fa-plus plus"></i></div></button>');
								action = "inactive";
							}else{
								$('.backPost').css('display', 'none');
								$('#load_Comments_data_message').html("<div style='display:none;'></div>");
								action = 'active';
							}
						}
					});
				}
				if(action == 'inactive'){
					action = 'active'; 
					load_all_data(limit, start);
				}
			}
		});
	}
	if(!$(this).data('type')){
		sessionStorage.setItem("POSICOMID", post_id);
		sessionStorage.removeItem("Refresh");
		sessionStorage.removeItem("COMID");
	}else{
		sessionStorage.setItem("COMID", comment_id);
		sessionStorage.setItem("REPID", rep_id);
		sessionStorage.removeItem("RefreshId");
		sessionStorage.removeItem("POSICOMID");
	}
});


$(document).on("click", ".listedCom", function() {
	//$('.investorProfile').css('display', 'block');
	/*var profileName = $(this).data('profilename');
	var email = $(this).data('email');
	var contact = $(this).data('contact');
	var propic = $(this).data('propic');
	var profileName = 'Hannan Amiruddin Karbelkar';
	var email = 'karbelkar20@gmail.com';
	var contact = '987654545434';
	var propic = '65832a9ed0a67anim_pic4.png';
	$('.investorProfile').css('height', '70%');
	$('.investorProfile').css({'transform':'scale(1,1)'});
	var html ='<div style="display:flex;padding-top:20px;">';
		html +='<div class="Ip_row">';
		html +='<div class="close2" data-dismiss="modal" id="btn_close">&#10161;</div>';
		html +='</div><div style="margin:auto"><img style="width:80px;height:85px;border-radius:20%;" src="public_folder/profileImages/'+propic+'"></div></div>';
		html +='<div class="InvestorprofileName">'+profileName+'</div>';
		html +='<div style="display:flex;justify-content:center;">';
	    html +='<div style="text-align:center;" class="bottom-boxes">';
		html +='<a href="user_investment.php">';
		html +='<div class="" style="color:#5a5656;margin:10px;margin-bottom: 2px;padding:15px;background: #e2e2e2;border-radius:15px;font-size: 20px;">&#128222;</div>';
		html +='</a>';
		html +='<div style="font-size: 12px;font-weight: 600;">Email</div>';
		html +='</div>';
		html +='<div style="text-align:center;" class="bottom-boxes btn_Listing actionBtn" data-src="page3">';
		html +='<div class="" style="margin:10px;margin-bottom: 2px;padding:15px;color:#5a5656;background: #e2e2e2;border-radius:15px;font-size: 20px;">&#9742;</div>';
		html +='<div style="font-size: 12px;font-weight: 600;">Contact</div></div>';
		html +='<div style="text-align:center;" class="bottom-boxes">';
		html +='<div class="btn_load_screen" data-src="investorsFunds.php" style="margin:10px;margin-bottom: 2px;padding:15px;color:#5a5656;background: #e2e2e2;border-radius:15px;font-size: 20px;">&#128203;</div>';
		html +='<div style="font-size: 12px;font-weight: 600;">WhatsAap</div>';
		html +='</div>';
		html +='</div>';
		html +='<div class="dealBtnDiv"><button type="button" class="dealBtn">Accept</button></div>';
	$('.investorProfile').html(html);*/
	//$('.main_header').css('height', '180px');
	//$('.main_Body_content').css({'filter':'blur(5px)','pointer-events':'none'});
	
}); 

$(document).on("click", ".close-company-popup, .companies_list", function() {
    $('.main_header').css('height', '0px');
    $('.main_Body_content').css({'filter':'none','pointer-events':'auto'});
	
});


/**** Post Mutiple Images ****/
//$('.select').click(function(){
/*function TriggersClickOnImage(){
	$('.TimelineImage1').click();
}*/

/*$(document).on("click", ".imgUpload", function(){
	$('.TimelineImage1').click();
});*/
$(document).on("click", ".imgUpload", function(){
	$('.TimelineImage1').click();
});

$('.uploader1').click(function(){
	$('.TimelineImage1').click();
});

$('.uploader2').click(function(){
	$('.TimelineImage2').click();
	/*if(image1.length > 0){
		var imgName1  = image1[0].name;
	}*/
});

$('.uploader3').click(function(){
	$('.TimelineImage3').click();
	/*if(image2.length > 0){
		var imgName2  = image2[0].name;
		alert(imgName2);
	}*/
});
$('.uploader4').click(function(){
	$('.TimelineImage4').click();
	/*if(image3.length > 0){
		var imgName3  = image3[0].name;
	}*/
});

$('.uploader5').click(function(){
	$('.TimelineImage5').click();
});

/*var image1 = document.getElementById('TimelineImage1').files;
var image2 = document.getElementById('TimelineImage2').files;
var image3 = document.getElementById('TimelineImage3').files;
var image4 = document.getElementById('TimelineImage4').files;*/


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
//}
}
// Set the date we're counting down to
var countDownDate = new Date("July 25, 2024 15:37:25").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  $('#demo').html(days + "d " + hours + "h " + minutes + "m " + seconds + "s ");
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);

/** Product Show Slide For Page3**/
$(document).on("click", ".OpImg", function(){
	var imgSrc = $(this).attr('src');
	$('.mainImg').attr('src', imgSrc);
});
$(document).on("click", ".thumbnail", function(){
	var imgSrc = $(this).attr('src');
	$('.mainImg').attr('src', imgSrc);
});
 
$(document).on("click", ".SliderArrowRight", function(){
	document.getElementById('slider').scrollLeft +=180
});

$(document).on("click", ".SliderArrowLeft", function(){
	document.getElementById('slider').scrollLeft -=180
});

});
