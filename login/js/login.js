/*** Hide Preloader when page is fully loaded ***/
function myFunction(){
	$('.logo').css('top','85%');
	$('.LoginAnimate').css('top','50%');
	$('.LoginAnimate').css('visibility','visible');
	$('.LoginAnimate').css('opacity','1');
    $('.monto').addClass('animated');
    $('.logo').addClass('logos');
    $('.logo').removeClass('log');
    $('.fa-circle-notch').css('display','none');
    $('.reg_btn').css('display', 'block');
}

$(document).ready(function(){
/*** Country Code Section ***/
$('.country_code2, .country_code').on('click', function(){
	$('.country_code_list').css('transform', 'scale(1)');
	var seq = $(this).data('sequence');
	$('.seq').val(seq);
	a = 1;
	actionWrapper(a);
	AddBodyBlur();
});

$('.country_code_list li').on('click', function(){
	$('.country_code_list').css('transform', 'scale(0)');
	var c_code = $(this).data('code');
	var c_num = $(this).data('num');
	var c_flag = $(this).data('flag');
    $('.country_code').html('<img src="../web_folder/flags/'+c_flag+'.png"><span class="code">' +c_code + '</span> <span class="fas fa-caret-down"></span>');	
	$('.tel').attr('maxlength', c_num);
	$('.telpone_num').val(c_num);
	$('.tel').val('');
	$('.tel').focus();
});

$('.tel, .tel2, #MaxPartners, #exist_partners').on('keyup', function(){
	var tel = $(this).val();
	var changetel = tel.replace(/[A-Za-z,<,>,.,@,!,$,&,^,*,(,),%,`,~,:,;,',",-,_,?,#,=,,,/]/g, "");
	this.value = changetel;
});

// Prevent from Alphabets in phone input
function isInputNumber(evt){
	var ch = String.fromCharCode(evt.which);
	if(!(/[0-9]/.test(ch))){
		evt.preventDefault();
	}
}

/*** Slider Form Section ***/
	let first = document.querySelector('.first');
	let registration_btn = document.querySelector('.registration_btn');
	let registration_btns = document.querySelector('.registration_btns');
	$(document).on('click', '.rote', function(){
		if(first.classList.contains('fa-sign-out-alt')){
			first.classList.replace('fa-sign-out-alt', 'fa-times');
			$('.reg_btn').css('margin-left', '0px');
		}else{
			first.classList.replace('fa-times', 'fa-sign-out-alt');
			$('.reg_btn').css('margin-left', '-100px');
		}
	});
	
	let second = document.querySelector('.second');	
	$('.rotate').click(function(){
		if(second.classList.contains('fa-sign-out-alt')){
			second.classList.replace('fa-sign-out-alt', 'fa-times');
			$('.login_btn').css('margin-left', '0px');
		}else{
			second.classList.replace('fa-times', 'fa-sign-out-alt');
			$('.login_btn').css('margin-left', '-100px');
		}
	});
	
    $('.registration_btn').click(function(){
		$('.LoginAnimate').css('top','200%');
		$('.LoginAnimate').css('visibility','hidden');
		$('.LoginAnimate').css('opacity','0');
	    $('.anim').css('top','50%');
		$('.anim').css('visibility','visible');
		$('.anim').css('opacity','1');	
	    $('.monto').addClass('animated');
        $('.logo').addClass('logos');
        $('.logo').removeClass('log');
        $('.logo').css('bottom','18%');
        $('.fa-circle-notch').css('display','none');		
		$('.reg_btn').css('margin-left', '-200px');
		$('.login_btn').css('display', 'block');
		$('.login_btn').css('margin-left', '0px');
    });

    $('.log_btn').click(function(){
		$('.LoginAnimate').css('top','50%');
		$('.LoginAnimate').css('visibility','visible');
		$('.LoginAnimate').css('opacity','1');
	    $('.optionSection').css('top','200%');
		$('.optionSection').css('visibility','hidden');
		$('.optionSection').css('opacity','0');
		$('.reg_btn').css('margin-left', '0px');
		$('.anim').css('top','200%');
		$('.anim').css('visibility','hidden');
		$('.anim').css('opacity','0');
		$('.login_btn').css('margin-left', '-200px');
    });
	const slidePage = document.querySelector(".slidepage");
	const firstNextBtn = document.querySelector(".btn");
	const prevBtnSec = document.querySelector(".prev-1");
	const nextBtnSec = document.querySelector(".next-1");
	//const prevBtnThird = document.querySelector(".prev-2");
	//const nextBtnThird = document.querySelector(".next-2");
	
	const prevBtnFourth = document.querySelector(".prev-3");
	const nextBtnFourth = document.querySelector(".next-3");
	const prevBtnFifth = document.querySelector(".prev-4");
	const sbmitBtn = document.querySelector(".submit");
	const progressText = document.querySelectorAll(".step p");
	const progressCheck = document.querySelectorAll(".step .check");
	const bullet = document.querySelectorAll(".step .bullet");
	let max = 4;
	let current = 1;
	$('.list').on('keydown', function(e){
		var e = e;
		var IdAttr = $(this).attr("id");
		if(IdAttr == 'firstName'){
		   var limits = 40;
		}else if(IdAttr == 'lastName'){
			 var limits = 40;
		}else if(IdAttr == 'email'){
			 var limits = 30;
		}else if(IdAttr == 'contactNum'){
			 var limits = 13;
		}else if(IdAttr == 'userName'){
			 var limits = 30;
		}else if(IdAttr == 'userPassword'){
			 var limits = 40;
		}else if(IdAttr == 'loginCaptch'){
			 var limits = 10;
		}
		var countChar = $(this).val().replace(/\s/g, '').length;
	    if(countChar >= limits){
			if(e.which != 17){
				if(e.which != 116){
					if(e.which != 17 && e.which != 82){
						if(e.which != 8){
							e.preventDefault();
						}
					}
				}
			}
		}
		$('.label').removeClass('error');
		$(this).removeClass('errorUnderLine');
	});
	
	
	firstNextBtn.addEventListener("click", function(){
		var firstName = $('.firstName').val();
		var lastName = $('.lastName').val();
		if(firstName!='' && lastName!=''){
			number.innerHTML = '2/4';
			$('.headingTitle').text('Contact Information');
			$('.nextHeading').text('Profile Picture');
			$('circle').css('stroke-dashoffset', '370');
			slidePage.style.marginLeft = "-20%";
			bullet[current - 1].classList.add("active");
			progressText[current - 1].classList.add("active");
			progressCheck[current - 1].classList.add("active");
			current += 1;
			
		}else{
			if(firstName==''){
				$('.firstName').focus();
				$('.firstName').addClass('errorUnderLine');
				$('.labelFirstName').addClass('error');
			}else if(lastName==''){
				$('.lastName').focus();
				$('.labelLastName').css('color','red!important');
				$('.lastName').addClass('errorUnderLine');
				$('.labelLastName').addClass('error');
			}
		}
	});
	
	nextBtnSec.addEventListener("click", function(){
		var phone = $('#contactNum').val();
		if(phone!=''){
			number.innerHTML = '3/4';
			$('.headingTitle').text('Profile Picture');
			$('.nextHeading').text('Security Log');
			$('circle').css('stroke-dashoffset', '310');
			slidePage.style.marginLeft = "-40%";
			bullet[current - 1].classList.add("active");
			progressText[current - 1].classList.add("active");
			progressCheck[current - 1].classList.add("active");
			current += 1;
		}else{
			$('#contactNum').focus();
			$('.phoneLabel').css('color','red!important');
			$('#contactNum').addClass('errorUnderLine');
			$('.phoneLabel').addClass('error');
		}
	});
	/*nextBtnThird.addEventListener("click", function(){
		var imageFile = $('.imageFile').val();
			number.innerHTML = '4/4';
			$('.headingTitle').text('Security Log');
			$('.nextHeading').text('Submission');
			$('circle').css('stroke-dashoffset', '285');
			slidePage.style.marginLeft = "-60%";
			if(imageFile==''){
			    $('.imageFile').css('display', 'none');
			}
	});*/
	
	nextBtnFourth.addEventListener("click", function(){
		var email = $('.email').val();
		var userPassword = $('.userPassword').val();
		if(email!='' && userPassword!=''){
			number.innerHTML = '4/4';
			$('.headingTitle').text('Submission');
			$('.nextHeading').text('');
			$('.fa-arrow-right').css('display', 'none');
			//$('circle').css('stroke-dashoffset', '250');
			$('circle').css('stroke-dashoffset', '230');
	     	slidePage.style.marginLeft = "-60%";
		}else if(email==''){
			$('.email').focus();
			$('.email').addClass('errorUnderLine');
			$('.emailLabel').addClass('error');
		}else if(userPassword==''){
			$('.userPassword').focus();
			$('.labelPassword').css('color','red!important');
			$('.userPassword').addClass('errorUnderLine');
			$('.labelPassword').addClass('error');
		}
	});
	
	prevBtnSec.addEventListener("click", function(){
		number.innerHTML = '1/4';
		$('.headingTitle').text('Personal Information');
		$('.nextHeading').text('Contact Info');
		$('circle').css('stroke-dashoffset', '450');
		slidePage.style.marginLeft = "0%";
		bullet[current - 2].classList.remove("active");
		progressText[current - 2].classList.remove("active");
		progressCheck[current - 2].classList.remove("active");
		current -= 1;
	});
	/*prevBtnThird.addEventListener("click", function(){
		number.innerHTML = '2/5';
		$('.headingTitle').text('Contact Information');
		$('.nextHeading').text('Profile Picture');
		$('circle').css('stroke-dashoffset', '395');
		slidePage.style.marginLeft = "-20%";
		bullet[current - 2].classList.remove("active");
		progressText[current - 2].classList.remove("active");
		progressCheck[current - 2].classList.remove("active");
		current -= 1;
	});*/
	prevBtnFourth.addEventListener("click", function(){
		number.innerHTML = '2/4';
		$('.headingTitle').text('Profile Picture');
		$('.nextHeading').text('Security Log');
		$('circle').css('stroke-dashoffset', '370');
		slidePage.style.marginLeft = "-20%";
	});

    prevBtnFifth.addEventListener("click", function(){
		number.innerHTML = '3/4';
		$('.headingTitle').text('Security Log');
		$('.nextHeading').text('Submission');
		$('.fa-arrow-right').css('display', 'block');
		slidePage.style.marginLeft = "-40%";
		$('circle').css('stroke-dashoffset', '310');
	});
	
/*** Captcha src ***/
	$("#change_captcha").click(function(){
		$("#im").attr('src','../web-folder/captch/captcha.php');
        $('.loginCaptch').val('');
	});
});

// Prevent from Alphabets in phone input
function isInputNumber(evt){
	var ch = String.fromCharCode(evt.which);
	if(!(/[0-9]/.test(ch))){
		evt.preventDefault();
	}
}
$('.firstName').on('keyup', function(){
	var name = $('.firstName').val();
	var changename = name.replace(/[0-9,#,<,>,?,=,/,',",;,:,(,),!,@,#,$,%,^,&,*,+,{,},\,|]/g, "");
	this.value = changename;
});
$('.lastName').on('keyup', function(){
	var lastName = $('.lastName').val();
	var changename = lastName.replace(/[0-9,#,<,>,?,=,/,',",;,:,(,),!,@,#,$,%,^,&,*,+,{,},\,|]/g, "");
	this.value = changename
});
$('.email').on('keyup', function(){
	var email = $('.email').val();
	var changename = email.replace(/[<,>,/,!,%,^,&,*,+,(,),{,},\,|]/g, "");
	this.value = changename
});


/*$('.profilePic').on('click', function(){
	$('.imageFile').click();
});

function displayImage(e){
	var extension = $('.imageFile').val();
	var extension = extension.replace(/^.*\./, '');
	extension = extension.toLowerCase();
	var reader = new FileReader();
	reader.onload = function(e){
		if(extension == 'jpg' || extension == 'jpeg' || extension == 'png'){
			document.querySelector('.proImage').setAttribute('src',e.target.result);
		}else{
			document.querySelector('.proImage').setAttribute('src','../web-folder/OIP.jpg');
			$('.profileError').html('Only Jpeg, jpg & png files allowed');
			$('.proImage').css('border', '1px solid red');
			setTimeout(function(){
				$('.profileError').html('');
				///$('.proImage').css('border', 'none');
			}, 5000);
		}
	}
	reader.readAsDataURL(e.files[0]);
}
*/

$('.register').on('click', function(){
	$('.msgBox').css('display', 'block');
	$('.main_container').addClass('blur');
	var firstName = '';
    var lastName  = '';
    var email = '';
    var tel  = '';
    var code  = '';
    //var proImage  = '';
	var userPassword  = '';
	var loginCaptch = '';
	
    var firstName = $('.firstName').val(); 
    var lastName  = $('.lastName').val();
    var email = $('.email').val();
    var tel  = $('.tel').val();
    var code  = $('.code').html(); 
    var codelength  = $('.telpone_num').val(); 	
	//var proImage   = $('.imageFile').val();
	var userPassword  = $('.userPassword').val();
	var loginCaptch  = $('.loginCaptch').val();
	
	if(firstName == ''){
		formValidation('firstName','450','0','labelFirstName','','empty');
	}else if(lastName == ''){
		formValidation('lastName','450','0','labelLastName','','empty');
	}else if(email == ''){
		formValidation('email','285','-40','emailLabel','','empty');
	}else if(tel == ''){
		formValidation('tel','395','-20',0,0,'empty');
	/*}else if(proImage == ''){
		formValidation('proImage','342','-40',0,0,'empty');*/
	}else if(userPassword == ''){
		formValidation('userPassword','285','-40','labelPassword','','empty');
	}else if(loginCaptch == ''){
		formValidation('captchaText','250','-60','captcha','','empty');
	}else{
		submitData();
	}
	
	function formValidation(className,dash,marginPer,labelClass,ErrorMsg,ErrorType){ 
	    $('.msgBox').css('display', 'none');
	    $('.main_container').removeClass('blur');
		var prelabel = $('.'+labelClass).html();
		const slidePage = document.querySelector(".slidepage");
	    slidePage.style.marginLeft = marginPer+"%";
		$('.'+className).focus();
		$('circle').css('stroke-dashoffset', dash);
		$('.'+className).addClass('errorUnderLine');
		$('.'+labelClass).addClass('error');
		if(ErrorType == 'error'){
		    $('.'+labelClass).html(ErrorMsg);
			/*if(className == 'proImage'){
				$('.profileError').html(ErrorMsg);
				setTimeout(function(){
					$('.profileError').html('');
				}, 5000);
			}*/
		}
		if(className == 'captchaText'){
			$('.loginCaptch').focus();
		}
		if(className == 'tel'){
		    $('.mobError').html('The Number must contain '+codelength+' digits');
			setTimeout(function(){
				$('.mobError').html('');
			}, 5000);
		}
		/*if(className == 'proImage' && ErrorType == 'empty'){
		    $('.profileError').html('Please choose Profile Pic');
			setTimeout(function(){
				$('.profileError').html('');
			}, 5000);
		}*/
		setTimeout(function(){
			$('.'+className).removeClass('errorUnderLine');
		    $('.'+labelClass).removeClass('error');
			$('.'+labelClass).html(prelabel);
		}, 5000);
	}
	
	function submitData(){
		//var proImage   = $('.imageFile').prop('files')[0];
		let form_data = new FormData();
		form_data.append('firstName', firstName);
		form_data.append('lastName', lastName);
		form_data.append('email', email);
		form_data.append('tel', tel);
		form_data.append('code', code);
		form_data.append('codelength', codelength);
		//form_data.append('proImage', proImage);
		form_data.append('userPassword', userPassword);
		form_data.append('loginCaptch', loginCaptch);
		$.ajax({
			url: 'ajax/registration.php',
			type: 'post',
			data: form_data,
			contentType: false,
			processData: false,
			success: function(response){
				alert(response);
				var myArray = response.split("/");
				if(myArray[0] == 'submitted'){
					$('.anim ').css('top', '200%');
				    $('.anim ').css('visibility', 'hidden');
				    $('.anim ').css('opacity', '0');
					
					$('.LoginAnimate').css('top', '50%');
				    $('.LoginAnimate').css('visibility', 'visible');
				    $('.LoginAnimate').css('opacity', '1');
					
					$('#registrationForm')[0].reset();
					//document.querySelector('.proImage').setAttribute('src','../web-folder/OIP.jpg');
					const slidePage = document.querySelector(".slidepage");
					$('#number').text('1/5');
					$('.headingTitle').text('Personal Information');
					$('.nextHeading').text('Contact Info');
					$('circle').css('stroke-dashoffset', '450');
					slidePage.style.marginLeft = "0%";
					$('.msgBox').css('display', 'none');
	                $('.main_container').removeClass('blur');
				}else{
					$('.msgBox').css('display', 'none');
	                $('.main_container').removeClass('blur');
					if(className == 'captchaText'){
				    	$('.refresh_button').click();
					}
					
					var className = myArray[0];
					var dash = myArray[1];
					var margin = myArray[2];
					var emailLabel = myArray[3];
					var newlabelName = myArray[4];
					formValidation(className,dash,margin,emailLabel,newlabelName,'error');
				}
			}
		});
	}
});

$('.login').on('click', function(){
	var spinner = '<span class="fas fa-spinner fa-spin loadingSpinner"></span><div class="msgBoxText"> Processing Request....</div>';
	$('.second_row').html(spinner);
	$('.msgBox').css('display', 'block');
	$('.main_container').addClass('blur');
	var loginEmail = $('.loginEmail').val();
	var userPass = $('.loginPassword').val();
	let form_data = new FormData();
	form_data.append('loginEmail', loginEmail);
	form_data.append('userPass', userPass);
	loginfunction();
	function loginfunction(){
		var myImage = new Image();
		myImage.src = "../web_folder/email.png";
		var DeactivateImage = new Image();
		DeactivateImage.src = "../web-folder/profile.jpg";
		var blokedImage = new Image();
		blokedImage.src = "../web-folder/denied.png";
		
		$.ajax({
			url: 'ajax/registration.php',
			type: 'post',
			data: form_data,
			contentType: false,
			processData: false,
			success: function(response){
				var cssUrl = "css/otp.css";
				$("<link>", {rel: "stylesheet", type: "text/css", href: cssUrl}).appendTo("head");
				if(response == 'errorMsg'){
					$('.loginErrorMsg').text('Please enter correct login details');
					$('.msgBox').css('display', 'none');
					$('.main_container').removeClass('blur');
					$('.loginEmail, .loginPassword').on('keyup', function(){
					    $('.loginErrorMsg').text('');
					})
				}else if(response == 'blocked'){
						var blockedMsg = '<div><img src="'+blokedImage.src+'"></div><div class="blockedText">Sorry! this account is temporarily blocked for security reasons due to multiple incorrect login attempts, please try again after <span class="timeSpan">5 to 10</span> minutes later or reset your password to regain access.</div><div class="okay">Okay</div>';
						$('.second_row').html(blockedMsg);
						$(document).on('click', '.okay', function(){
							$('.msgBox').css('display', 'none');
							$('.main_container').removeClass('blur');
				    });
				}else if(response == 'deactivate'){
						var blockedMsg = '<div style="margin-top:5px;"><img src="'+DeactivateImage.src+'"></div><div class="blockedText">Sorry! This account is Deactivated</div><div class="okay">Okay</div>';
						$('.second_row').html(blockedMsg);
					$(document).on('click', '.okay', function(){
						$('.msgBox').css('display', 'none');
						$('.main_container').removeClass('blur');
					});
				}else{
					var userId = response;
					var otp = '<div class="loader"><div class="loadingSpinner2"><span class="fas fa-spinner fa-spin"></span></div></div>';
						otp += '<div class="opt_container">';
						otp += '<div style="display:flex;"><div class="fas fa-arrow-left backArrow"></div></div>';
						otp += '<h3 class="Otpheader">Verify Your Account</h3>';
						otp += '<div class="img_container"><img src="'+myImage.src+'"></div>';
						otp += '<div class="code-container codeContainer"><input type="number" class="codes" placeholder="" min="0" max="9" required><input type="number" class="codes" placeholder="" min="0" max="9" required><input type="number" class="codes" placeholder="" min="0" max="9" required><input type="number" class="codes" placeholder="" min="0" max="9" required></div>';
						otp += '<div class="otpError" style="color:red"></div>';
						otp += '<p>Please Enter 4-Digit Code Sent To<br>karbelkar20@gmail.com</p>';
						otp += '<div class=""><button class="btn btn-primary varify_otp" type="button">VARIFY</button></div>';
						otp += '<div class="countdown"></div>';
						otpCountDown(loginEmail);
						$('.second_row').html(otp);
						$(document).on('click', '.backArrow', function(){
							deleteOtp(loginEmail);
							$('.msgBox').css('display', 'none');
							$('.main_container').removeClass('blur');
						});
						$(document).on('click', '.varify_otp', function(){
							$('.loader').css('display', 'block');
							$('body').css('pointer-events', 'none');
							verifyAccount(loginEmail, userId);
						});
				}
			}
		});
	}
	$(document).on('click', '.resendOtp', function(){
		loginfunction();
	});	
});

$(document).on('click', '.log-btn', function(){
	$('.msgBox').css('display', 'none');
	$('.main_container').removeClass('blur');
	$('.LoginAnimate').css('top','50%');
		$('.LoginAnimate').css('visibility','visible');
		$('.LoginAnimate').css('opacity','1');
	    $('.optionSection').css('top','200%');
		$('.optionSection').css('visibility','hidden');
		$('.optionSection').css('opacity','0');
		$('.reg_btn').css('margin-left', '0px');
		$('.anim').css('top','200%');
		$('.anim').css('visibility','hidden');
		$('.anim').css('opacity','0');
		$('.login_btn').css('margin-left', '-200px');
});

// Select the parent element that contains the dynamic content
const parent = document.querySelector('.second_row');
// Add a keydown event listener to the parent element
parent.addEventListener('keydown', (e) => {
  // Check if the event target is an input element with the "codes" class
    if (e.target.classList.contains('codes')) {
		const idx = Array.from(parent.querySelectorAll('.codes')).indexOf(e.target);
		if (e.key >= 0 && e.key <= 9) {
		    e.target.value = '';
		    setTimeout(() => parent.querySelectorAll('.codes')[idx + 1].focus(), 10);
		} else if (e.key === 'Backspace') {
		    setTimeout(() => parent.querySelectorAll('.codes')[idx - 1].focus(), 10);
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
			url: 'ajax/registration.php',
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
					window.location.href = "../index.php";
				}
			}
		});
	}
}

/** Function For Deleting The OTP From Database **/
function deleteOtp(emailId){
	let form_data = new FormData();
	form_data.append('emailId', emailId);
	$.ajax({
		url: 'ajax/registration.php',
		type: 'post',
		data: form_data,
		contentType: false,
		processData: false,
		success: function(response){
			
		}
	});
}

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