$(document).ready(function() {

$(document).on('click', '.max', function(){
	$('.third-form-col').css('height', '100vh');
	$('.third-form-col').css('width', '90vw');
	$('.third-form-col').css('top', '-25');
	$('.third-form-col').css('padding', '5');
	$('.third-form-col .form').css('padding', '50px');
	$('.third-form-col').css('width', '100vw');
	$('.max').css('display', 'none');
	$('.min').css('display', 'block');
});

$(document).on('click', '.min', function(){
	$('.third-form-col').css('position', 'revert-layer');
	$('.third-form-col').css('height', 'revert-layer');
	$('.third-form-col').css('width', 'revert-layer');
	$('.third-form-col').css('top', 'revert-layer');
	$('.third-form-col').css('padding', 'revert-layer');
	$('.third-form-col .form').css('padding', 'revert-layer');
	$('.max').css('display', 'block');
	$('.min').css('display', 'none');
});


  /** Profile Images Selector **/
   
$(document).on('click', '.proImgButton', function(){
	$('.proImage').trigger('click'); // Open file selection dialog
});

$(document).on('change', '.proImage', function(event){
    var file = this.files[0];
	var reader = new FileReader();
	reader.onload=function(e){
		$('.mainImg, .sliderImage').attr('src',e.target.result);
		$('.trendingImg').attr('src',e.target.result);
		$('.deal-pro-image').attr('src',e.target.result);
		var imgSrc = "<div class='delImg'>X</div><img class='ProPic' src='"+e.target.result+"'>";
		$('.veiwProPic').html(imgSrc);
		$('.veiwProPic').css('display', 'block');
		///$('.ProPic').attr('src',e.target.result);
	}
	reader.readAsDataURL(file);
});

$(document).on('click', '.delImg', function(event){
	$('.mainImg, .sliderImage').attr('src','../web_folder/placeholder.jpg');
	$('.trendingImg').attr('src','../web_folder/placeholder.jpg');
	$('.deal-pro-image').attr('src','../web_folder/placeholder.jpg');
	$('.veiwProPic').css('display', 'none');
	$('.ProPic').attr('src','../web_folder/placeholder.jpg');
});


$(document).on('change', '#category', function(event){
	var categories = $(this).val();
	$.ajax({
        url: 'ajax/category.php',
        type: 'post',
		data: { categories:categories },
		success: function(response){
			$('#subcategory').html(response);
		}
	});
});

   /** Multiple Images Selector **/
$(document).on('click', '.multipleImgButton', function(){
	$('.multipleImages').trigger('click'); // Open file selection dialog
});

var images = [];
var imagesToRemove = []; // Array to track images marked for deletion

$(document).on('change', '.multipleImages', function(event) {
  var multipleImages = this.files;

  // Process new images
  for (i = 0; i < multipleImages.length; i++) {
	if(check_duplicate(multipleImages[i].name)){
		images.push({
			"file": multipleImages[i],
		    "name": multipleImages[i].name,
		    "url": URL.createObjectURL(multipleImages[i]), 
		    "size": multipleImages[i].size,
		    "tmp_name": multipleImages[i].tmp_name,
		});
		//alert(images[i].file);
	}else{
		alert(multipleImages[i].name+ "is Dublicate");
	}
  }

  var image = "";
  var thumbimages = "";

  // Generate HTML for remaining and newly selected images
 
  images.forEach((i, index) => {
    if (!imagesToRemove.includes(index)) { // Check if image is not marked for removal
      image += '<div class="image_container d-flex justify-content-centerposition-relative"><img class="multipleImagesImg" src="' + i.url + '"><span  class="position-absolute del-multi-imgs" data-id="' + index + '">&times;</span></div>';
      thumbimages += '<img src="' + i.url + '" alt="shoe image" class="thumbnail active activeImage'+index+'">';
    }
  });
  
  $('.mulImg').html(image);
  $('#slider').html(thumbimages);

  // Remove images from array based on tracked indices
  imagesToRemove.sort().reverse(); // Sort and reverse for proper removal
  for (var i = 0; i < imagesToRemove.length; i++) {
    images.splice(imagesToRemove[i], 1);
  }
  imagesToRemove = []; // Reset for next selection
  
  

  

function check_duplicate(name){
	var image = true;
	if(images.length > 0){
		for (a = 0; a < images.length; a++) {
			if(images[a].name == name){
				image = false;
				break
			}
		}
	}
	return image;
}
});

$(document).on('click', '.del-multi-imgs', function(){
  var el = $(this).data('id');
  images.splice(el, 1);
  imagesToRemove.push(el); // Mark for removal
  $(this).parent().remove(); // Remove from DOM
  $('.activeImage'+el).remove(); // Remove from DOM
});

 /** Multiple Images Selector End **/
 
 /** Focus On Content while Typing the Form **/

let timeoutId = null;

$(document).on('focus keydown', '.list', function(){
	var dataList = $(this).data('list');
	clearTimeout(timeoutId);
	$('.list'+dataList).css('transition', '0.5s');
	$('.list'+dataList).css('transform', 'scale(1.1)');
	//$('.list'+dataList).css('marginLeft', '50');
	timeoutId = setTimeout(function(){
		$('.list'+dataList).css('transition', '0.5s');
		$('.list'+dataList).css('transform', 'scale(1)');
		//$('.list'+dataList).css('marginLeft', '0');
	},3000);
});

$(document).on('focusout', '.list', function() {
		var dataList = $(this).data('list');
		$('.list'+dataList).css('transition', '0.5s');
		$('.list'+dataList).css('transform', 'scale(1)');
		$('.list'+dataList).css('marginLeft', '0');
});

$(document).on('keyup', '.newPrice', function(){
	var newPrice = parseFloat($(this).val());
	var oldPrice = parseFloat($('.oldPrice').val());
	var discountPrice = (((oldPrice - newPrice) / oldPrice)*100).toFixed(2);
	$('.discountPer').html('('+discountPrice+'%)');
});

$(document).on('keyup', '#deliveryDate', function(){
	var today = new Date();
	function addDays(days){
		var futureDate = new Date(today);
		futureDate.setDate(today.getDate() + days);
		var options = {day: '2-digit', month: 'long', year: 'numeric' };
		var formattedData = futureDate.toLocaleString('en-US', options);
		return formattedData;
	}
	var daysToAdd = parseFloat($(this).val());
	var formattedData = addDays(daysToAdd);
	$('.DeliveryDate').html(formattedData);
});

$(document).on('keyup', '.inStock', function(){
	var inStock = parseFloat($(this).val());
	if(inStock == 0){
		$('.availibility').html('Out Of Stock');
	}else if(inStock > 0){
		$('.availibility').html(inStock +' In Stock');
	}else{
		$('.availibility').html('Available');
	}
});

$(document).on('keyup', '.RnA', function(){
	var returnPolicyDays = parseFloat($(this).val());
	
	if(returnPolicyDays == 0){
		$('.returnPolicyDays').html('No Return & Exchange Policy Is not Available');
	}else if(returnPolicyDays > 0){
		$('.returnPolicyDays').html('Hassle free' +returnPolicyDays+ 'days Return &amp; exchange' );
	}
});

$(document).on('keyup change', '.list', function() {
	var dataList = $(this).data('list');
	var input = $(this).val();
	
	if(dataList == 1){
		var html = $(this).find('option:selected').html();
		$('.list'+dataList).html(html);
	}else{
		$('.list'+dataList).html(input);
	}
});


/*** TAGGING SYSTEM START ***/
$(document).on('keyup', '#tags, #AltTags', function(e){
	var tel = $(this).val();
	var changetel = tel.replace(/[,,,/]/g, "");
	this.value = changetel;
	if(tel.length > 60){
		$(this).val(tel.slice(0,60));
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

var alt_array = [];
$(document).on('keydown', '#altTags', function(e){
	var get_alt_tag = $(this).val();
	if(e.keyCode == 13 || e.keyCode == 188 || e.keyCode == 44){
		if(e.which == 83 ){
			e.preventDefault();
		}
		if(get_alt_tag.trim() == "") {
			alert("please enter a tag");
		}else if(get_alt_tag.length == 1){
			alert('Tag should be contained more than one charector');
		}else{
			//var tort= $(this).data('form');
			alt_array.push(get_alt_tag);
			$('.tagsCon').append("<span><span class='list'>" + get_alt_tag + "</span><i class='fas fa-times-circle del'></i> </span>");
			$(this).val("");
			var input = $('.list');
			var listing = new Array();
			for(var i = 0; i < input.length; i++){
				var a = $(input[i]).html();
				listing.push(a+', ');
			}
			if(alt_array.length > 19){
				$('#altTags').css('display', 'none');
			}
			$('.counters').text(20 - alt_array.length);
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
	var removeTag = $(this).text();
	tags_array.splice(tags_array.indexOf(removeTag), 1);
	$(this).remove();
	$('#tags').css('display', 'block');
	check(removeTag);
});
$(document).on('click', '.alt-container span', function(){
	var removeTag = $(this).text();
	alt_array.splice(alt_array.indexOf(removeTag), 1);
	$(this).remove();
	$('#altTags').css('display', 'block');
});
// Strict the Charecters length
$(document).on('keydown', '.list', function(e){
	var e = e;
	var IdAttr = $(this).attr("id");
	if(IdAttr == 'ProductName'){
	   var limits = 20;
	}else if(IdAttr == 'short_desc'){
		var limits = 30;
	}else if(IdAttr == 'oldPrice'){
		var limits = 5;
		var num = 1;
	}else if(IdAttr == 'newPrice'){
		var limits = 5;
		var num = 1;
	}else if(IdAttr == 'deliveryDate'){
		var limits = 2;
		var num = 1;
	}else if(IdAttr == 'inStock'){
		var limits = 2;
		var num = 1;
	}else if(IdAttr == 'material'){
		var limits = 15;
	}else if(IdAttr == 'theme'){
		var limits = 20;
	}else if(IdAttr == 'color'){
		var limits = 15;
	}else if(IdAttr == 'size'){
		var limits = 5;
		var num = 1;
	}else if(IdAttr == 'RnA'){
		var limits = 2;
		var num = 1;
	}else if(IdAttr == 'shippingCharge'){
		var limits = 4;
		var num = 1;
	}else if(IdAttr == 'dispatchFrom'){
		var limits = 15;
	}else if(IdAttr == 'longDesc'){
		var limits = 500;
	}
	var countChar = $(this).val().replace(/\s/g, '').length;
	if(countChar >= limits && e.which != 8){
		if(e.which != 17){
			if(e.which != 116){
	        	e.preventDefault();
				if(num){
				    $('.error_'+IdAttr+ ' span').text("Input must be in "+ limits + " digit Numbers");
				}else{
					 $('.error_'+IdAttr+ ' span').text("Input must be in "+ limits + " characters");
				}
				$('.error_'+IdAttr).css("display", "block");
				setTimeout(function(){
					$('.error_'+IdAttr).css("display", "none");
				}, 2000);
			}
		}
	}
});

$(document).on('keyup', '.oldPrice, .newPrice, .deliveryDate, .inStock, .size, .RnA, .shippingCharge', function(){ 
	var tel = $(this).val();
	var changetel = tel.replace(/[A-Za-z,<,>,@,!,$,&,^,*,(,),%,`,~,:,;,',",-,_,?,#,=,,,]/g, "");
	this.value = changetel;
});

$(document).on('click', '.currency', function(){
	$('.currency-dropdown').css('display', 'block');
})

$(document).on("click",function(divclose){
	if($(divclose.target).closest(".currency").length == 0){
		$('.currency-dropdown').css('display', 'none');
	}
});

$(document).on('click', '.currency-dropdown div', function(){
	$('.Currency-text').text($(this).text());
});

/*** SUBMITTING & VALIDATING THE FORM ****/
$(document).on('click', '.btn', function(){
	event.preventDefault();
	var category = '';
	var productName = '';
	var short_desc = '';
	var oldPrice = '';
	var newPrice = '';
	var deliveryDate = '';
	var inStock = '';
	var material = '';
	var theme = '';
	var color = '';
	var size = '';
	var RnE = '';
	var shippingCharge = '';
	var dispatchFrom = '';
	var longDesc = '';
	var proImage = '';
	var imagesFile = '';
	
	var altTags = '';
	var alt = '';
	var subcategory = '';
	var sale = '';
	var show = '';
	//var reviewer = '';
	//var rating = '';
	//var review = '';
	
	$ProImg = $('.ProImg').attr('src');
	var category = $('.category').val();
	var productName = $('.productName').val();
	var short_desc = $('.short_desc').val();
	var oldPrice = $('.oldPrice').val();
	var newPrice = $('.newPrice').val();
	var deliveryDate = $('#deliveryDate').val();
	var inStock = $('.inStock').val();
	var material = $('.material').val();
	var theme = $('.theme').val();
	var color = $('.color').val();
	var size = $('.size').val();
	var RnE = $('.RnA').val();
	var shippingCharge = $('.shippingCharge').val();
	var dispatchFrom = $('.dispatchFrom').val();
	var longDesc = $('.longDesc').val();
	var currency = $('.Currency-text').text();
	var proImage = $('#proImage').prop('files')[0];
	var inputTags = $('.tagsCon_sec .list');
	
	var altTags = $('.altTags').val();
	var alt = $('.alt').val();
	var subcategory = $('.subcategory').val();
	var sale = $('.sale').val();
	var show = $('.show').val();
	//var reviewer = $('.reviewer').val();
	//var rating = $('.rating').val();
	//var review = $('.review').val();
	
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
	
	var altTags = $('.tagsCon .list');
	var altImgTags = new Array();
	for(var i = 0; i < altTags.length; i++){
		if(i > 0){
			var comma = ' ';
		}else{ 
			var comma = '';
		}
		var a = $(altTags[i]).html();
		if(a.length > 30){
		    var a = a.slice(0,30);
	    }
		altImgTags.push(comma+''+a);
	}
	let altImg = altImgTags.join('*');

/*** If Condition ***/
	if(category == ''){
		formValidation('category','','');
	}else if(productName == ''){
		formValidation('productName','','');
	}else if(short_desc == ''){
		formValidation('short_desc','','');
	}else if(newPrice == ''){
		formValidation('newPrice','','');
	}else if(deliveryDate == ''){
		formValidation('deliveryDate','','');
	}else if(longDesc == ''){
		formValidation('longDesc','','');
	}else{
		submitData();
		$('.uploader_progressBar').css('display', 'flex');
		$('.upload-msg').html('wait...');
	}
function formValidation(data,type,ErrorMsg){
    $('.btn').attr('disabled', false);
    var $element = $("."+data);
    $(".third-form-col").animate({
        scrollTop: $("."+data).offset().top - 150 
    }, 100, function(){
			$("."+data).css('border', '1px solid red');
			$("."+data).focus();
			$("."+data+"_sec").find('label').css("color", "red");
			var label = $("."+data+"_sec").find('label').html();
			if(type == "error"){
				$("."+data+"_sec").find('label').text(ErrorMsg);
			}
			setTimeout(function(){
				$("."+data).css('border', '1px solid #ced4da');
				$("."+data+"_sec").find('label').css("color", "grey");
				if(type == "error"){
					$("."+data+"_sec").find('label').html(label);
				}
			}, 5000);
    });
}
	
	$('.upload-msg').html('Uploading...');
	function submitData(){
		
		let form_data = new FormData();
	    form_data.append('productName', productName);
	    form_data.append('category', category);
	    form_data.append('short_desc', short_desc);
	    form_data.append('oldPrice', oldPrice);
	    form_data.append('newPrice', newPrice);
	    form_data.append('deliveryDate', deliveryDate);
	    form_data.append('inStock', inStock);
	    form_data.append('material', material);
	    form_data.append('theme', theme);
	    form_data.append('color', color);
	    form_data.append('size', size);
	    form_data.append('RnE', RnE);
	    form_data.append('shippingCharge', shippingCharge);
	    form_data.append('dispatchFrom', dispatchFrom);
	    form_data.append('longDesc', longDesc);
	    form_data.append('currency', currency);
	    form_data.append('tagy', tagy);
		form_data.append('proImage', proImage);
		
		form_data.append('altImg', altImg);
		form_data.append('alt', alt);
		form_data.append('subcategory', subcategory);
		form_data.append('sale', sale);
		form_data.append('show', show);
		//form_data.append('reviewer', reviewer);
		//form_data.append('rating', rating);
		//form_data.append('review', review);
		
	
		if(images.length > 0){
			for(i = 0; i < images.length; i++){
				form_data.append('imagesFile[]', images[i].file);	
			}
		}else{
			form_data.append('imagesFile', '');
		}
		$.ajax({
            url: 'ajax/listingProducts.php',
            type: 'post',
			data: form_data,
			contentType: false,
			processData: false,
			success: function(response){
				alert(response);
				var myArray = response.split("/");
				if(myArray[0] == 'submitted'){
					//$('.businessPageReview').attr('data-src', 'businessPage?id='+myArray[1]);
					//$('#listingForm').reset();
					$('.uploader_progressBar').css('display', 'none');
					$('.btn').attr('disabled', false);
					$('.veiwProPic, .mulImg').css('display','none');
					$('#tags').val('');
					$('#AltTags').val('');
					$('.form').find('input,textarea,select').val('');
					$('.list').each(function(index, element){
						var list = $(element).html();
						$('.tags-container span').remove();
						$('.alt-container span').remove();
					});
					$('#tags, #AltTags').css('display', 'block');
		            $('.counter').text(5);
					tags_array.splice(0);
					alt_array.splice(0);
					location.reload();
					//state('businessPage?id='+myArray[1]);
                }else{
					$('.btn').attr('disabled', false);
					$('.uploader_progressBar').css('display', 'none');
					var divSection = myArray[0];
					var ErrorMsg = myArray[1];
					var type = 'error';
					$('.progress-bar').width('0%');
					$('.progress-bar').text('');
					$('.btn').attr('disabled', false);
					formValidation(divSection,type,ErrorMsg);
				}
            }
        });
    }
});



});