/*var initialPath = window.location.pathname.split('/');
var lastSegment = initialPath.pop();
var isPotentialId = lastSegment.length > 10 && lastSegment.length <= 20;
var initialPath = isPotentialId ? initialPath.pop() : lastSegment;
if(initialPath == 'product'){
	var isCommonCssJsLoaded = true;
}else{
	var isCommonCssJsLoaded = false;
}

$(document).on('click', '.trendingCard, .productAction', function(){
	if(!isCommonCssJsLoaded){
		$("<script src='/bellezza/js/businessPage.js'></script>").appendTo("head");
		isCommonCssJsLoaded = true;
	}
});*/
$(document).on('click', '.trendingCard', function(){
	if(!isCssLoaded){
		//$("<link rel='stylesheet' href='css/regular.css'>").appendTo("head");
		//$("<link rel='stylesheet' href='css/swiper-bundle.min.css'>").appendTo("head");
		
		//$("<script src='js/swiper-bundle.min.js'></script>").appendTo("head");
		$("<script src='/bellezza/js/collections.js'></script>").appendTo("head");
		isCssLoaded = true;
	}
});

$(document).on('click', '.productAction', function(){ 
	if(!isProductCssLoaded){
		$("<link rel='/stylesheet' href='css/regular.css'>").appendTo("head");
		//$("<link rel='stylesheet' href='css/swiper-bundle.min.css'>").appendTo("head");
		
		//$("<link rel='stylesheet' href='css/dragableSlider.css'>").appendTo("head");
		//$("<script src='js/swiper-bundle.min.js'></script>").appendTo("head");
		isProductCssLoaded = true;
	}
});
$(document).on('click', '.fa-shopping-bag', function(){
	if(!isCartCssLoaded){
		$("<link rel='stylesheet' href='css/cart.css'>").appendTo("head");
		$("<script src='js/cart.js'></script>").appendTo("head");
		isCartCssLoaded = true;
	}
}); 
$(document).on('click', '.DeliveryAdd', function(){
	if(!isDeliveryAddLoaded){
		$("<link rel='stylesheet' href='css/address.css'>").appendTo("head");
		$("<script src='js/address.js'></script>").appendTo("head");
		isDeliveryAddLoaded = true;
	}
});
$(document).on('click', '.myOrder', function(){
	if(!isOrderLoaded){
		$("<link rel='stylesheet' href='css/order.css'>").appendTo("head");
		$("<script src='js/myOrder.js'></script>").appendTo("head");
		isOrderLoaded = true;
	}
});
/*$(document).on('click', '.productListing', function(){
	if(!isListProductLoaded){
		$("<link rel='stylesheet' href='css/listingProduct.css'>").appendTo("head");
		//$("<script src='js/myOrder.js'></script>").appendTo("head");
		isListProductLoaded = true;
	}
});*/
//var isCommonCssJsLoaded = false;
var isCssLoaded = false;
var isProductCssLoaded = false;
var isCartCssLoaded = false;
var isDeliveryAddLoaded = false;
var isOrderLoaded = false;
//var isListProductLoaded = false;

/*$(window).load(function(){
	
    deleteHistory();
	sessionStorage.removeItem("POSICOMID");
});*/

/*** Social Media Sharing PopUp Modal  ***/ 
// Open Media Sharing PopUp Modal bodyblur
$(document).on('click', '.get_id', function(){
	var flag =1;
    if(flag==1){
		document.querySelector('.popover').className = 'popover ONPopover';
	    $('#MainBody').css({'filter':'blur(5px)','pointer-events':'none'});
		$('.header').css({'pointer-events':'auto'});
	    //document.body.style.overflow = 'hidden';
		flag =1;
	}
});


$(document).on('click', '.leftIndicator', function(){
	window.history.back();
});
// Close Media Sharing PopUp Modal
$(document).on('click', '.closePopover', function(){
    $('.popover').removeClass('ONPopover');
    $('#MainBody').css({'filter':'none','pointer-events':'auto'});
    $('.header').css({'pointer-events':'auto'});
	//document.body.style.overflow = 'auto';
});

/*** Search And Close Search In Header ***/
$('.fa-search').on('click', function(e){
	//e.preventDefault();
    $('.search_bar').css('marginTop', '0px');
	$("#search").focus();
	AddBodyBlur();
	//$(".shadow").css("display", "block");
});

$('.fa-times').on('click', function(){
    $('.search_bar').css('marginTop', '-300px');
	$("#search").val('');
	$("#results").html('');
	RemoveBodyBlur();
});



//$('#search').on('keyup', function(){
$(document).on('keyup', '#search', function(){
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
				//var expression = new RegExp(result, "i");
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
				/*var filename = "public_folder/jasonData/searchKey.json";
				$.getJSON(filename, function(data){
					$.each(data, function(key, value){
						for (let i = 0; i < value.keys.length; i++){
							if(value.keys[i].search(expression) == ''){
								$("#results").html('');
							}
							if(value.keys[i].search(expression) != -1){
								$('#results').append('<li class="list-group-item link-class search-list btn_load_screen" data-src="tradeBlogs?id='+value.id+'"><span class="fas fa-bolt" style="color:orange;"></span><span class="text-muted"> '+value.keys+'</span></li>');
							}
						}
					});   
				});*/
			}
		}else{
			$.ajax({
				url: "ajax/search.php", 
				method: "POST",
				//dataType: "html",
				data:{searchField: searchField},
				success: function(data){
					$('#results').html(data);
				}
			});
		}
	}
});

$(document).on('click', '.fa-bars', function(){ 
	$('.first').css('height', '100vh');
	document.body.style.overflow = 'hidden';
});

$('.close_search_header').on('click', function(){
	$('.first').css('height', '0');
	document.body.style.overflow = 'visible';
});

/*** Top Navigation Bar And Bottom navigation Bar System On Scroll **/
var query = window.innerWidth;
//var actionBtn = document.querySelector(".webPages");
//var query = (".webPages").innerWidth;
	if (query < 767){
		topNav();
	}		
function topNav(){
    var previousScroll = 0;
	$('.webPages').scroll(function(){
	//$(document).scroll('.webPages', function(){
		var WindowscrollLenght = $('.webPages').scrollTop();
	    if(WindowscrollLenght > 61.60714340209961){
			var currentScroll = $(this).scrollTop();
			if(currentScroll > previousScroll){
				$('.bottom_bar').css('bottom', '-100px');
				//$('.header').css('top', '-100px');
			}else{
				$('.bottom_bar').css('bottom', '0px');
				//$('.header').css('top', '0px');
			}
			previousScroll = currentScroll;
		}
    });
}

if(query < 767){
	topNavs();
}		
function topNavs(){
    var previousScroll = 0;
	$('.page3_content').scroll(function(){
		var WindowscrollLenght = $('.page3_content').scrollTop();
		if(query < 767 && query > 426){
			var scrollHeight = 830.60714340209961;
		}else if(query < 426 && query > 331){
			var scrollHeight = 945;
		}else if(query < 331){
			var scrollHeight = 965;
		}
	    if(WindowscrollLenght > scrollHeight){
			var currentScroll = $(this).scrollTop();
			if(currentScroll > previousScroll){
				$('.orderBtn').css('bottom', '0px');
			}
			previousScroll = currentScroll;
		}else{
			$('.orderBtn').css('bottom', '-100px');
		}
    });
} 

//$('.webPages').scroll(function(){
//$(document).on('scroll', '.page-content', function(){
$('.page-content').scroll(function(){
	var WindowscrollLenght = $(this).scrollTop();
	
	$('.offerHeader').css('marginTop', '-'+WindowscrollLenght+'px');
	if(WindowscrollLenght >= 0 && WindowscrollLenght <= 50){
		var margin = -WindowscrollLenght+'px';
		$('.header1').css('marginTop', margin);
		$('.sidebar').css('marginTop', margin);
	}
	if(WindowscrollLenght >= 0 && WindowscrollLenght <= 70){
		var scrollMargin = -WindowscrollLenght+'px';
		$('.sidebar').css('marginTop', scrollMargin);
	}
	var currentmargin = parseInt($('.header1').css('marginTop'));
	if(WindowscrollLenght > 43 && currentmargin !== -30){
		$('.header1').css('marginTop', '-30px');
	}
	var SideCurrentmargin = parseInt($('.sidebar').css('marginTop'));
	if(WindowscrollLenght > 43 && SideCurrentmargin !== -33){
		$('.sidebar').css('marginTop', '-65px');
	}
});

//Function For Adding The Blurish Body 
function AddBodyBlur(){
	$('#MainBody').css({'filter':'blur(5px)brightness(0.9)','pointer-events':'none'});
	$('.webPages').css({'overflow':'hidden'});
	$('.header').css({'pointer-events':'none'});
}

//Function For Removing The Blurish Body 
function RemoveBodyBlur(){
	$('#MainBody').css({'filter':'none','pointer-events':'auto'});
	$('.webPages').css({'overflow-y':'auto'});
	$('.header').css({'pointer-events':'auto'});
}

//Close Post Action Modal 
$(document).on('click','.close',function(){
	$('#Action').css({'top':'30%','transition':'0.5s','visibility':'hidden','opacity':'0'});
	RemoveBodyBlur();
});

/*** Change Url And Content Without Refreshing The Page ***/
$(window).on('popstate', function(event){
	var pageURL = $(location).attr("href");
	var pageURL = pageURL.split('/').pop().split('#')[0].split('?')[0];
	//state(pageURL);
	
	var pageURI = $(location).attr("href");
	var pageURLID = pageURI.split("?")[1]?.split("#")[0];
	if(pageURLID !== undefined){
		var pageURLID = pageURI.split("id=").pop().split("#")[0].split("?")[0];
	}else{
		var pageURLID = ''; 
	}
	if(pageURL == 'listingPage' && pageURLID !== undefined){
		//state(pageURL);
	}else{
		//state(pageURL);
		//var pageURL = 'index';
		//state(pageURL);
	}
	
});

$(document).on('click', '.btn_load_screen', function(event){
    var pageURL = $(this).data("src");
	history.pushState(null, '', pageURL);
	state(pageURL);
});

function redirectionBusiness(pageURL){
	history.pushState(null, '', pageURL);
	state(pageURL);
}




/*** Hide Preloader when page is fully loaded ***/
function myFunction(){
   $('.loader').css('display','none');
   $('body').css('pointer-events','auto');
   $('.loadSkeleton').css('display','none');
}

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

//function CloseLikedPage(){
$(document).on("click", ".closeLikePage", function() {
	$('.likers_list').css('transform', 'scale(0)');
	$('#MainBody').css({'filter':'none','pointer-events':'auto'});
	document.body.style.overflow = 'visible';
}); 

/** Offer Count Down System **/
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
    $("#demo").html("EXPIRED");
  }
}, 1000);

function handleCounterPlus(button){
	var $vals = $(button).siblings('.counter');
	var val = parseInt($vals.val());
	$vals.val(val + 1);
}
function handleCounterMinus(button){
	var $vals = $(button).siblings('.counter');
	var val = parseInt($vals.val());
	if(val > 1){
		$vals.val(val - 1);
	}
}

/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-button");
var i;
for (i = 0; i < dropdown.length; i++){
	dropdown[i].addEventListener("click", function(){
		/*if(!$(this).hasClass('active')){
			$('.dropdown-button').removeClass('active');
			$('.dropdown-container').css('display', 'none');
		}*/
		this.classList.toggle("active");
		var dropdownContent = this.nextElementSibling;
		if (dropdownContent.style.display === "flex"){
			dropdownContent.style.display = "none";
		}else{
			dropdownContent.style.display = "flex";
		}
	});
}
/*$(document).ready(function(){
	$.ajax({
		url: '',
		type: 'post',
		data: 'checkSession',
		success: function(response){
			if(response == "empty"){
				setTimeout(function(){
					$(".WebModel").css('top', '45%');
					$(".WebModel").css('opacity', '1');
					AddBodyBlur();
				},1000);
			}
		}
	});
});*/
$(document).on('click', '.closeLogin', function(){
	$(".WebModel").css('top', '-500px');
	$(".WebModel").css('opacity', '0');
	//RemoveBodyBlur();
	$(".shadow").css("display", "none");
});


$(document).on('click', '.login', function(){
	var spinner = '<div class="processSpinner"><span class="fas fa-spinner fa-spin loadingSpinner"></span><div class="msgBoxText"> Processing Request....</div></div>';
	$('.optBox').css('display', 'block');
	$('.optBox').html(spinner);
	var loginEmail = $('.login-mail').val();
	var userPass = $('.login-pass').val();
	let form_data = new FormData();
	form_data.append('loginEmail', loginEmail);
	form_data.append('userPass', userPass);
	loginfunction();
	function loginfunction(){
		var myImage = new Image();
		myImage.src = "web_folder/mail.png";
		var DeactivateImage = new Image();
		DeactivateImage.src = "web_folder/profile.jpg";
		var blokedImage = new Image();
		blokedImage.src = "web_folder/denied.png";
		$.ajax({
			url: 'login/ajax/registration.php',
			type: 'post',
			data: form_data,
			contentType: false,
			processData: false,
			success: function(response){
				
				var cssUrl = "login/css/otp.css";
				$("<link>", {rel: "stylesheet", type: "text/css", href: cssUrl}).appendTo("head");
				if(response == 'errorMsg'){
					$('.loginErrorMsg').text('Please enter correct login details');
					$('.optBox').css('display', 'none');
					$('.login-mail, .login-pass').on('keyup', function(){
					    $('.loginErrorMsg').text('');
					})
				}else if(response == 'blocked'){
					var blockedMsg = '<div class="processSpinner"><div><img src="'+blokedImage.src+'"></div><div class="blockedText">Sorry! this account is temporarily blocked for security reasons due to multiple incorrect login attempts, please try again after <span class="timeSpan">5 to 10</span> minutes later or reset your password to regain access.</div><div class="okay">Okay</div></div>';
					$('.optBox').html(blockedMsg);
					
				}else if(response == 'deactivate'){
					var blockedMsg = '<div class="processSpinner"><div style="margin-top:5px;"><img src="'+DeactivateImage.src+'"></div><div class="blockedText">Sorry! This account is Deactivated</div><div class="okay">Okay</div></div>';
					$('.optBox').html(blockedMsg);
					
				}else{
					
					var userId = response;
					var otp = '<div class="loader"><div class="loadingSpinner2"><span class="fas fa-spinner fa-spin"></span></div></div>';
						otp += '<div class="opt_container">';
						otp += '<div style="display:flex;"><div class="fas fa-arrow-left backArrow"></div></div>';
						otp += '<h3 class="Otpheader">Verify Your Account</h3>';
						otp += '<div class="img_container"><img src="'+myImage.src+'"></div>';
						otp += '<div class="code-container codeContainer"><input type="number" class="codes" placeholder="" min="0" max="9" required><input type="number" class="codes" placeholder="" min="0" max="9" required><input type="number" class="codes" placeholder="" min="0" max="9" required><input type="number" class="codes" placeholder="" min="0" max="9" required></div>';
						otp += '<div class="otpError" style="color:red"></div>';
						otp += '<p>Please Enter 4-Digit Code Sent To<br>'+loginEmail+'</p>';
						otp += '<div class=""><button class="btn btn-primary varify_otp" type="button">VARIFY</button></div>';
						otp += '<div class="countdown"></div>';
						otpCountDown(loginEmail);
						$('.optBox').html(otp);
						
						
						$(document).on('click', '.backArrow', function(){
							deleteOtp(loginEmail);
							$('.optBox').css('display', 'none');
						});
						$(document).on('click', '.varify_otp', function(){
							$('.loader').css('display', 'block');
							$('body').css('pointer-events', 'none');
							verifyAccount(loginEmail, userId);
						});
				}
				$(document).on('click', '.okay', function(){
						$('.optBox').css('display', 'none');
					});
			}
		});
	}
	$(document).on('click', '.resendOtp', function(){
		loginfunction();
	});	
});

/** Function For Generating OTP & countdown time **/
function otpCountDown(loginEmail){
	var minutes = 3;
	var seconds = 0;
	var countdown = setInterval(function(){
		seconds--;
		if (seconds < 0){
			seconds = 59;
			minutes--;
		}
		$(document).on('click', '.backArrow', function(){
			clearInterval(countdown);
		});
		var formattedMinutes = minutes < 10 ? "0" + minutes : minutes;
		var formattedSeconds = seconds < 10 ? "0" + seconds : seconds;
		$('.countdown').html('Expire in '+ formattedMinutes + ':' + formattedSeconds + 's');
		if (minutes === 0 && seconds === 0){
			clearInterval(countdown);
			deleteOtp(loginEmail);
			ResendBtn();
			$('.otpError').text('Your OTP has expired. Resend new OTP');
		}
	},1000);
	function ResendBtn(){
        $('.countdown').html('<ins><span class="resendOtp">Resend OTP</span></ins>');
	}
}

/** Function For Deleting The OTP From Database **/
function deleteOtp(emailId){
	let form_data = new FormData();
	form_data.append('emailId', emailId);
	$.ajax({
		url: 'login/ajax/registration.php',
		type: 'post',
		data: form_data,
		contentType: false,
		processData: false,
		success: function(response){
			
		}
	});
}


$(document).keydown('.WebModel', function(e){
  // Check if the event target is an input element with the "codes" class
    if (e.target.classList.contains('codes')) {
		const idx = Array.from(this.querySelectorAll('.codes')).indexOf(e.target);
		if (e.key >= 0 && e.key <= 9) {
		    e.target.value = '';
		    setTimeout(() => this.querySelectorAll('.codes')[idx + 1].focus(), 10);
		} else if (e.key === 'Backspace') {
		    setTimeout(() => this.querySelectorAll('.codes')[idx - 1].focus(), 10);
		}
    }
});

function verifyAccount(otpEmail, userId){
	if($('.countdown').text() == 'Resend Code'){
		$('.otpError').text('Your OTP has expired. Resend new OTP');
	}else{
		var otp ="";
		$('.codes').each(function(){
			otp +=$(this).val();
		});
		let form_data = new FormData();
		form_data.append('otpEmail', otpEmail);
		form_data.append('userId', userId);
		form_data.append('otp', otp);
		$.ajax({
			url: 'login/ajax/registration.php',
			type: 'post',
			data: form_data,
			contentType: false,
			processData: false,
			success: function(response){
				if(response == 'failed'){
					$('.loader').css('display', 'none');
					$('body').css('pointer-events', 'auto');
					$('.codes').css('borderColor', 'red');
					$('.codes').val('');
					$('.codes:first').focus();
					$('.otpError').text('Wrong OTP Entered');
					$('.codes').on('keyup', function(){
						$('.codes').css('borderColor', '#3eb5ff');
						$('.otpError').text('');
					});
				}else{
					window.location.href = "";
				}
			}
		});
	}
}

$(document).on('click', '.offerHeader', function(){
	var historyLength = window.history.length;
	var prevState = window.history.state[historyLength -3];
});

$(document).on('click', '.shoppingBag', function(){
	$('.cartSection').css('right', '0');
	$(".shadow").css("display", "block");
});
$(document).on('click', '.closeCart', function(){
	$('.cartSection').css('right', '-500px');
	$(".shadow").css("display", "none");
});


$(document).on('click', '.cartButton', function(){
	var product_id = $(this).data('id');
	var cartNumber = $('.cartNumber').text();
	var qty = $('.counter').val();
	$('.cartNumber').text(parseInt(cartNumber) + 1);
	$.ajax({
		url: 'ajax/cart.php',
		type: 'post',
		data: {product_id:product_id, qty:qty},
		success: function(response){
			//alert(response);
		}
	});
});
