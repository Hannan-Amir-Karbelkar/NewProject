/** Send Email With One Time Password [OTP] ***/
let isVarifyOTPClicked = false;
let OtpPreClicked = false;
$('.sendEmail').on('click', function(){
	var email = '';
	var email = $('.email').val();
	var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	var charCount = email.length;
	if(email =='' || !regex.test(email) || charCount > 40){
	    if(charCount > 40){
			$('.Error').text("Email Shouldn't be more than 40 charectors");
		}else{
			$('.Error').text('Please Enter Valid Email Address');
		}		
		$('.email').focus();
		keyUp();
	}else{
		sendOpt();
		function sendOpt(){
			$('.loader').css('display', 'block');
			$.ajax({
				url: 'ajax/changePassword.php',
				method:'POST',
				data:{email:email},
				success: function(response){
					var myArray = response.split("^");
					if(myArray[0] == 'Success'){
						var content = myArray[1];
						$('.loader').css('display', 'none');
						$('.EmailSending').css('display', 'none');
						$('.OTPSection').css('display', 'block');
						$('.OTPSection').html(content);
						VarifyOtp(email);
						otpCountDown(email);
						OtpPre(email);
						
					}else{
						var content = myArray[1];
						$('.loader').css('display', 'none');
						$('.Error').eq(0).text(content);
						keyUp();
					}
				}
			});
		}
    }
	function keyUp(){
		$('.email').on('keyup', function(){
		    $('.Error').text('');
		});
	}
});

$(document).on('click', '.resendOtp', function(){
	$('.loader').css('display', 'block');
	$.ajax({
		url: 'ajax/changePassword.php',
		method:'POST',
		data:{resending:1},
		success: function(response){
			otpCountDownClicked = false;
			otpCountDown(response);
			$('.loader').css('display', 'none');
		}
	});
});	

/*** Varify Account By OPT Varification ***/
function VarifyOtp(email){
	if(!isVarifyOTPClicked){
		$(document).on('click', '.varify_otp', function(){
			var OtpEmail = email;
			var otp ="";
			$('.codes').each(function(){
				otp +=$(this).val();
			});
			if(otp == ''){
				$('.Error').eq(1).text('Entered Correct OTP');
				$('.codes:first').focus();
				$('.codes').css('borderColor', 'red');
				otpError();
			}else{
				$('.loader').css('display', 'block');
				$.ajax({
					url: 'ajax/changePassword.php',
					method:'POST',
					data:{otp:otp, OtpEmail:OtpEmail},
					success: function(response){
						var myArray = response.split("^");
						if(myArray[0] == 'Success'){
							var content = myArray[1];
							$('.loader').css('display', 'none');
							$('.OTPSection').css('display', 'none');
							$('.changePass').css('display', 'block');
							$('.changePass').html(content);
							$('.codes').val('');
							changePassword(OtpEmail);
						}else{
							var content = myArray[1];
							$('.loader').css('display', 'none');
							$('.Error').eq(1).text(content);
							otpError();
						}
					}
				});
			}
		});
	isVarifyOTPClicked = true;
}
}

function OtpPre(email){
	if(!OtpPreClicked){
		$(document).on('click', '.OtpArrow', function(){
			$('.OTPSection').css('display', 'none');
			$('.EmailSending').css('display', 'block');
			$('.OTPSection').html('');
			deleteOtp(email);
			otpCountDownClicked = false;
		});
		OtpPreClicked = true;
		
	}
}

$(document).on('click', '.emailArrow', function(){
	window.location.href="../login.php";
});

$(document).on('click', '.passArrow', function(){
	$('.OTPSection').css('display', 'block');
	$('.changePass').css('display', 'none');
	$('.changePass').html('');
	$('.countdown').html('<ins><span class="resendOtp">Resend OTP</span></ins>');
});


function otpError(){
	$('.codes').on('keyup', function(){
		
		$('.codes').css('borderColor', '#ffb50a');
		$('.Error').text('');
	});
}
		
function deleteOtp(deleteEmail){
	$.ajax({
		url: 'ajax/changePassword.php',
		method:'POST',
		data:{deleteEmail:deleteEmail},
		success: function(response){
					
		}
	});
}


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

/** Function For Generating OTP & countdown time **/
let otpCountDownClicked = false;
function otpCountDown(loginEmail){
	if(!otpCountDownClicked){
		var minutes = 1;
		var seconds = 0;
		var countdown = setInterval(function(){
			seconds--;
			if (seconds < 0){
				seconds = 15;
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
		otpCountDownClicked = true;
	}
}

let changePasswordClicked = false;
function changePassword(emailId){
	if(!changePasswordClicked){
		$(document).on('click', '.changePassword', function(){
			$('.loader').css('display', 'block');
			var firstPass = $('.pass1').val();
			var secondPass = $('.pass2').val();
			var charCount = firstPass.length;
			var PassEmail = emailId;
			if(firstPass !== secondPass){
				$('.loader').css('display', 'none');
				$('.PassError').text('Passwords do not matched');
			}else if(charCount > 40){
				$('.loader').css('display', 'none');
				$('.PassError').text('Passwords must be in 40 charetors');
			}else{
				$.ajax({
					url: 'ajax/changePassword.php',
					method:'POST',
					data:{firstPass:firstPass,secondPass:secondPass,PassEmail:PassEmail},
					success: function(response){
						var myArray = response.split("^");
						if(myArray[0] == 'error'){
							var content = myArray[1];
							$('.PassError').text(content);
							$('.loader').css('display', 'none');
						}else{
							$('.loader').css('display', 'none');
							window.location.href="../login/login.php";
						}
					}
				});
			}
		});
		changePasswordClicked = true;
	}
}