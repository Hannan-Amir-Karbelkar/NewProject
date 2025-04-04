
$(document).on('click', '.check', function(){
	if($(this).is(':checked')){
		var $cartContainer = $(this).closest('.cartContainer');
		$cartContainer.css('background', '#fff');
	}else{
		var $cartContainer = $(this).closest('.cartContainer');
		$cartContainer.css('background', '#b9b9b9de');
	}
});
$(document).on('click', '.trashBin', function(){
	var $cartContainer = $(this).closest('.cartContainer');
	/*$cartContainer.css('marginLeft', '-2000');
	$cartContainer.css('position', 'fixed');*/
	//$cartContainer.css('display', 'none');
	$cartContainer.remove();
});
	