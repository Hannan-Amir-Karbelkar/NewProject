/*** LighBox Section ***/

// Function to open the popup with the clicked image
/*$(document).ready(function() {
    // Open the popup with the clicked image
    $(document).on('click', '.mainImg', function() {
        $('body').css('overflow', 'hidden');
        $('.shadow').css('display', 'block');
        $('.preview-box').css('display', 'block').css('opacity', '1').css('pointer-events', 'auto');

        var showImgSrc = $(this).attr('src');
        $('.img-main').attr('src', showImgSrc);

        // Set active image for the first gallery or image list
        setActiveImage(showImgSrc);
    });

    // Set the active image based on the clicked image source
    function setActiveImage(src) {
        var $matchingLi = $('.image-list li').filter(function() {
            return $(this).data('src') === src;
        });

        if ($matchingLi.length) {
            $('.image-list li').removeClass('active');
            $matchingLi.addClass('active');
        } else {
            $('.image-list li').removeClass('active');
            $('.image-list li').first().addClass('active');
        }
    }

    // Navigate to the next image
    $(document).on('click', '.image-box .next', function() {
        var currentSrc = $('.img-main').attr('src');
        var $currentLi = $('.image-list li.active');

        if ($currentLi.length === 0) {
            $currentLi = $('.image-list li').first();
        }

        var $nextLi = $currentLi.next('li');

        if ($nextLi.length === 0) {
            $nextLi = $('.image-list li').first();
        }

        var nextSrc = $nextLi.data('src');
        $('.img-main').attr('src', nextSrc);
        setActiveImage(nextSrc);
    });

    // Navigate to the previous image
    $(document).on('click', '.image-box .prev', function() {
        var currentSrc = $('.img-main').attr('src');
        var $currentLi = $('.image-list li.active');

        if ($currentLi.length === 0) {
            $currentLi = $('.image-list li').first();
        }

        var $prevLi = $currentLi.prev('li');

        if ($prevLi.length === 0) {
            $prevLi = $('.image-list li').last();
        }

        var prevSrc = $prevLi.data('src');
        $('.img-main').attr('src', prevSrc);
        setActiveImage(prevSrc);
    });

    // Close the popup
    $(document).on('click', '.shadow', function() {
        $('body').css('overflow', 'auto');
        $('.shadow').css('display', 'none');
        $('.preview-box').css('display', 'none').css('opacity', '0').css('pointer-events', 'none');
    });
});
*/





$(document).on('click', '.mainImg', function(){
	$('body').css('overflow', 'hidden');
	$('.shadow').css('display', 'block');
	$('.preview-box').css('display', 'block').css('opacity', '1').css('pointer-events', 'auto');
	var Showimg = $(this).attr('src');
	$('.img-main').attr('src',Showimg);
	var id = $(this).data('id');
	$('.imgType').val(id);
	if(id !='proid'){
		$('.image-list'+id+' li:first').addClass('activeImage'+id);
	}
});

$(document).on('click', '.thumbnail ', function(){
	var dataId = $(this).data('id');
	$('.thumbnail').removeClass('activeImage'+dataId);
	$(this).addClass('activeImage'+dataId);
	var imgSrc = $(this).attr('src');
	$('.mainImg').attr('src', imgSrc);
});

/*$(document).on("click", ".thumbnail", function(){
	var imgSrc = $(this).attr('src');
	$('.mainImg').attr('src', imgSrc);
});*/
  
$(document).on("click", ".SliderArrowRight", function(){
	document.getElementById('slider').scrollLeft +=180
});

$(document).on("click", ".SliderArrowLeft", function(){
	document.getElementById('slider').scrollLeft -=180
});



$(document).on('click', '.image-box .next', function(){
	var dataId = $('.imgType').val();
	if(dataId =='proid'){
		var src = $('.activeImage'+dataId).next().attr('src');
	}else{
		var src = $('.activeImage'+dataId).next().data('src');
	}
	
	$('.img-main').attr('src', src);
	var currentImg = $('.activeImage'+dataId);
	var nextImg = currentImg.next();
	if(nextImg.length){
		currentImg.removeClass('activeImage'+dataId);
		nextImg.addClass('activeImage'+dataId);
	}else{
		currentImg.removeClass('activeImage'+dataId);
		if(dataId =='proid'){
			$('.thumbnail').first().addClass('activeImage'+dataId);
			var src = $('.thumbnail').first().attr('src');
		}else{
			$('.image-list'+dataId+' li:first').addClass('activeImage'+dataId);
			var src = $('.activeImage'+dataId).next().data('src');
		}
	    $('.img-main').attr('src', src);
	}	
});



$(document).on('click', '.image-box .prev', function(){
	var dataId = $('.imgType').val();
	if(dataId =='proid'){
		var src = $('.activeImage'+dataId).prev().attr('src');
	}else{
		var src = $('.activeImage'+dataId).prev().data('src');
	}
	$('.img-main').attr('src', src);
	var currentImg = $('.activeImage'+dataId);
	var prevImg = currentImg.prev();
	if(prevImg.length){
		currentImg.removeClass('activeImage'+dataId);
		prevImg.addClass('activeImage'+dataId);
	}else{
		currentImg.removeClass('activeImage'+dataId);
		if(dataId =='proid'){
			$('.thumbnail').last().addClass('activeImage'+dataId);
			var src = $('.thumbnail').last().attr('src');
		}else{
			$('.image-list'+dataId+' li:last').addClass('activeImage'+dataId);
			var src = $('.activeImage'+dataId).last().data('src');
		}
	    //$('.thumbnail').attr('src', src);
		$('.img-main').attr('src', src);
	}	
});

$(document).on('click', '.lightBox-close', function(){
	$('.shadow').css('display', 'none');
	$('.preview-box').css('opacity', '0');
	$('.preview-box').css('pointer-events', 'none');
	$('.preview-box').css('transform:', 'translate(-50%, -50%) scale(0)');
});

$(document).on('click', '.max', function(){
	$('.preview-box').css('max-width', '95vw');
	$('.image-box').css('height', '90vh');
	$('.max').css('display', 'none');
	$('.min').css('display', 'block');	
});

$(document).on('click', '.min', function(){
    $('.preview-box').css('max-width', '700px');
	$('.image-box').css('height', '60vh');
	$('.max').css('display', 'block');
	$('.min').css('display', 'none');
});

/*** Tabs Section ***/
$(document).on('click', '.tab', function(){
	var tab = $(this).data('tab');
	$('.act').addClass('deactive');
	$('.act').removeClass('act');
	$('.'+tab).removeClass('deactive');
	$('.'+tab).addClass('act');
});

/****** Lazy Loader To Load Comments/Reply Content On Scrolling The Div ******/
/*$(document).on('click','.loadMoreCommets',function(){
    $('.loadMoreCommets').html("<div style='text-align:center;padding:5px;'><i class='fas fa-circle-notch fa-spin' style='font-size: 25px;margin-top: -12px;position: absolute;margin-left: -12px;color:#a9a9a9;'></div>");			
    var post_id = $(this).data('post');
    var user = $(this).data('user');
    var start = $(this).data('start');
    var start = start + 4;
    var limit = 4;
    $.ajax({
		url: '../ajax/reply.php',
		method:"POST",
		data:{limit:limit, start:start, post_id:post_id, user:user},
        cache:false,
		success:function(data){
			if(data == 0){	
                $('#load_Comments_data_message').html("<div style='display:none;'></div>");
				action = 'active';	
            }else{
				if(start == 0){
					$('.backPost').html(data);
				}else{
					$('.backPost').append(data);
				}
				$('#load_Comments_data_message').html('<button class="loadMoreCommets" data-confirm="confirm" data-post="'+post_id+'" data-user="'+user+'" data-start="'+start+'"><div class="loaderDiv"><i class="fas fa-plus plus"></i></div></button>');
				action = "inactive";
			
					
			}			
        }
    });
});*/


/*** Open Token Section ***/
/*$(document).on('click','.token-coins',function(){
	$('.token-opretor').css('transform', 'scale(1,1)');
	$('#MainBody').css({'filter':'blur(2px)','pointer-events':'none'});
	document.body.style.overflow = 'hidden';
});*/

/*** Close Token Section ***/
/*$(document).on('click','.close-token-opretor',function(){
	$('.token-opretor').css('transform', 'scale(0,0)');
	$('#MainBody').css({'filter':'none','pointer-events':'auto'});
	document.body.style.overflow = 'visible';
});
*/
/*** Currency Converter ***/
/*function intToString(num) {
    num = num.toString().replace(/[^0-9.]/g, '');
    if (num < 1000) {
        return num;
    }
    let si = [
      {v: 1E3, s: "K"},
      {v: 1E6, s: "M"},
      {v: 1E9, s: "B"},
      {v: 1E12, s: "T"},
      {v: 1E15, s: "P"},
      {v: 1E18, s: "E"}
      ];
    let index;
    for (index = si.length - 1; index > 0; index--) {
        if (num >= si[index].v) {
            break;
        }
    }
    return (num / si[index].v).toFixed(2).replace(/\.0+$|(\.[0-9]*[1-9])0+$/, "$1") + si[index].s;
}

document.getElementById('token-amnt').onkeyup = function (){
    var number_val = document.getElementById("token-amnt").value;   
	var percentage = document.getElementById("percentage").value;
	var capital = document.getElementById("capital").value;	
	var number = parseFloat(number_val);
	var percentage = parseFloat(percentage);
	var capital = parseFloat(capital);
    var equity = percentage / capital * number;
    var equity = equity.toFixed(2);
    var result = intToString(number_val);
	document.getElementById('num-in-words').innerHTML = 'Token Amount';
	if(result !=''){
		document.getElementById("equity-percent").innerHTML = equity+'%';	
		document.getElementById("i-amount").innerHTML = result;	
		//document.getElementById('num-in-words').innerHTML = inWords(document.getElementById('token-amnt').value);
		$('#token-amnt').css('border', '1px solid #ced4da');
		$('#num-in-words').css('color', '#508dca');
	}else{
		document.getElementById("i-amount").innerHTML =  'Tarade Loft';	
		//document.getElementById('num-in-words').innerHTML = 'Token Amount';
		document.getElementById("equity-percent").innerHTML = percentage+'%';
	}
	if(number > capital){
		var capital = capital.toFixed(2);
		document.getElementById("equity-percent").innerHTML = percentage+'%';
		$('#token-amnt').css('border', '1px solid red');
		$('#num-in-words').css('color', 'red');
		document.getElementById('token-amnt').value = capital;
		document.getElementById('num-in-words').innerHTML = 'Amount Should not be more than ' + capital;
	}
};*/
/*** Hide Preloader when page is fully loaded ***/
function myFunction(){
   $('.loader').css('display','none');
   $('body').css('overflow','auto');
   $('.skeleton').css('display','none');
}

var rating_data = 0;
$(document).on('click','#add_review',function(){
	$('#review_modal').modal('show');
});

$(document).on('mouseenter', '.submit_star', function(){
	var rating = $(this).data('rating');
	reset_background();
	for(var count = 1; count <= rating; count++){
		$('#submit_star_'+count).addClass('text-warning');
	}
});

function reset_background(){
    for(var count = 1; count <= 5; count++){
        $('#submit_star_'+count).addClass('star-light');
        $('#submit_star_'+count).removeClass('text-warning');
	}
}

$(document).on('mouseleave', '.submit_star', function(){
    reset_background();
    for(var count = 1; count <= rating_data; count++){
        $('#submit_star_'+count).removeClass('star-light');
        $('#submit_star_'+count).addClass('text-warning');
    }
});

$(document).on('click', '.submit_star', function(){
    rating_data = $(this).data('rating');
	$('.starRating').val(rating_data);
});

$(document).on('click', '#save_review', function(){
	var user_name = '';
	var user_review = '';
	var rating_data = '';
	var proId = '';
	var review_subject = '';
    var user_name = $('#user_name').val();
	var user_review = $('#user_review').val();
	var rating_data = $('.starRating').val();
	var proId = $('.proId').val();
	var review_subject = $('#review_subject').val();
	if(rating_data == 0){
		formValidation('starsRating', 'Please rate your experrience by selecting a star rating');
		return false;
	}
	if(user_name == '' || user_review == '' || review_subject == ''){
		if(user_name == ''){
			var className = 'user_name';
		}else if(review_subject == ''){
			var className = 'review_subject';
		}else if(user_review == ''){
			var className = 'user_review';
		}
		formValidation(className, 'Please enter the value in empty field');
        return false;
    }else{
		var reImg1   = $('.reImg1').prop('files')[0];
		var reImg2   = $('.reImg2').prop('files')[0];
		var reImg3   = $('.reImg3').prop('files')[0];
		var reImg4   = $('.reImg4').prop('files')[0];
		let form_data = new FormData();
		form_data.append('user_name', user_name);
		form_data.append('user_review', user_review);
		form_data.append('proId', proId);
		form_data.append('review_subject', review_subject);
		form_data.append('reImg1', reImg1);
		form_data.append('reImg2', reImg2);
		form_data.append('reImg3', reImg3);
		form_data.append('reImg4', reImg4);
		form_data.append('rating_data', rating_data);
		$.ajax({
            url:'ajax/submit_rating.php',
			type: 'post',
			data: form_data,
			contentType: false,
			processData: false,
            success:function(data){
				var myArray = data.split("/");
				if(myArray[0] == 'submitted'){
					$('#review_modal').modal('hide');
                }else{
					var divSection = myArray[0];
					var ErrorMsg = myArray[1];
					var type = 'error';
					formValidation(divSection,ErrorMsg);
				}
               
            }
        })
	}
	function formValidation(data,ErrorMsg){
		$('#save_review').attr('disabled', false);
		$('#'+data).css('border', '1px solid red');
		$('#'+data).focus();
		$('.error').html(ErrorMsg);
		setTimeout(function(){
			if(data == "starsRating" || data == "MIC"){
				$('#'+data).css('border', 'none');
			}else{
				$('#'+data).css('border', '1px solid #ced4da');
			}
			$('.error').html('');
		}, 5000);
	}
});

$(document).on('click','.loadMoreCommets',function(){
    $('.loadMoreCommets').html("<div style='position: absolute;padding:5px;'><i class='fas fa-circle-notch fa-spin' style='font-size: 25px;margin-top: -11px;position: absolute;margin-left: -3px;color:#a9a9a9;'></div>");			
	var start = $(this).data('start');
	var reviewId = $(this).data('review');
	$.ajax({
        url:'/bellezza/ajax/submit_rating.php',
        method:'POST',
        data:{action:'load_data', start:start, reviewId:reviewId},
        success:function(data){
			if(data !='Null'){
				var $responseHTML = $(data);
				var countData = $responseHTML.find('.review-card').length;
				$('#review_content').append(data);
				if(countData > 3){
					start = start + 4;
					$('#load_Comments_data_message').html("<div class='loadMoreCommets' data-review='"+reviewId+"' data-start='"+start+"'><i class='fas fa-plus plus loaderDiv'></i></div>");
				}else{
					$('#load_Comments_data_message').css("display", "none");
				}
			}else{
				$('#load_Comments_data_message').css("display", "none");
			}
		}
	});
});

$(document).on('click', '.details-heading', function(){
	$(this).next('.shortDetails ').toggle(500);
	$(this).find('.fa-chevron-down').toggleClass('rotated');
});

$(document).on('click', '.delivery-add', function(){
	$('.country-code-form').toggle(500);
	$(this).find('.fa-chevron-down').toggleClass('rotated');
});

$(document).on('click', '.protectionLink', function(){
	//if($("#protection-container").length){
		var scrollDiv = document.getElementById("protection-container").offsetTop;
	//}else{
		//var scrollDiv = $(".fullImgContainer").offsetTop;
		//bindLazyLoad(product, 7, 7, 'active', 1);
	//}
	$('#content-product').animate({scrollTop: scrollDiv}, 1000);
});

  /** Profile Images Selector **/
   
$(document).on('click', '.addReviewImg', function(){
	var data = $(this).data('id');
	$('.reImg'+data).trigger('click'); // Open file selection dialog
});

$(document).on('change', '.reImg1, .reImg2, .reImg3, .reImg4', function(event){
	var id = $(this).data('id');
	var extension = $('.reImg'+id).val();
	var extension = extension.replace(/^.*\./, '');
	extension = extension.toLowerCase();
    var file = this.files[0];
	var reader = new FileReader();
	reader.onload=function(e){
		//if(extension == 'jpg' || extension == 'jpeg' || extension == 'png'){
			var imgs = '<span class="delRevImg" data-id="'+id+'">x</span><img src="'+e.target.result+'" style="width: 113px;height:90px">';
			$('.prevcont'+id).html(imgs);
		/*}else{
			$('.reImg'+id).val('');
			var imgs = '<span class="fas fa-camera cam"></span>';
			$('.prevcont'+id).html(imgs);
			$('.error').html('please select only jpg, jpeg or png file');
			setTimeout(function(){
				$('.error').html('');
			}, 5000);
		}*/
	}
	reader.readAsDataURL(file);
});

$(document).on('click', '.delRevImg', function(){
	var id = $(this).data('id');
	var imgs = '<span class="fas fa-camera cam"></span>';
	$('.prevcont'+id).html(imgs);
	$('.reImg'+id).val('');
});

$(document).on('click', '.editReview', function(){
	$('#review_modal').modal('show');
});

$(document).on('click', '.deleteReview', function(){
	
});

// When clicking on reviewAction, check the radio button and show the popup
	/*$(document).on('click', '.reviewAction', function(event){
		var id = $(this).data('id');
		$('.action'+id).css('transform', 'scale(1)');
    });*/

    // When clicking anywhere outside the actionPopup or scrolling, uncheck the radio button
    $(document).on('click scroll', function(event) {
        if (!$(event.target).closest('.actionPopup, .reviewAction').length) {
			$('.actionPopup').css('transform', 'scale(0)');
        }
    });

    // Prevent clicks inside the actionPopup from closing the popup
    $(document).on('click', '.actionPopup', function(event){
		$('.actionPopup').css('transform', 'scale(0)');
    });
	
	
	
	
$(document).on('click', '.actionPopup, .reviewAction', function(event){
	var id = $(this).data('id');
	$('.action'+id).css('transform', 'scale(1)');
});

var $contentDiv = $('#content-product');
$contentDiv.on('scroll', function(event){
	$('.actionPopup').css('transform', 'scale(0)');
});