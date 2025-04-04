$(document).on('click', '.addNew', function(){
	$('.AddressInfoContainer').css('display', 'none');
	$('.addressForm').css('display', 'inline-flex');
	$(this).css('display', 'none');
	$('.ShowAdr').css('display', 'block');
});
$(document).on('click', '.ShowAdr', function(){
	$('.addressForm').css('display', 'none');
	$('.AddressInfoContainer').css('display', 'block');
	$(this).css('display', 'none');
	$('.addNew').css('display', 'block');
});

/** SUBMIT THE DELIVERY ADDRESS **/
$(document).on('click', '.AddressBtn', function(){
	
});

/** EDIT THE DELIVERY ADDRESS **/
$(document).on('click', '.AdrEditBtn', function(){
	
});

/** DELETE THE DELIVERY ADDRESS **/
$(document).on('click', '.AdrDelBtn', function(){
	
});
/** PROCEED FOR CHECKOUT **/
$(document).on('click', '.CheckoutProceedBtn', function(){
	
});
