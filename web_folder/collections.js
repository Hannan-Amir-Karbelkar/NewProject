$(document).on('click', '.categories-btn', function(){
//var start = 0;
//var limit = 2;
//$('.categories-btn').on('click', function(){
	var action = 'inactive';
	var allCat = $(this).data('all');
	var text = $(this).text();
	var id = $(this).data('id');
	var tabsId = $(this).data('tabs-id');
	//alert(id);
	$('.collection-cards').removeClass('active-container');
	//$('.tabs'+tabsId).removeClass('categories-active');
	$('.categories-btn').removeClass('categories-active');
	$(this).addClass('categories-active');
	
	if($('.'+id).length > 0){
		var start = $('.LoadNum'+id).val();
		var start = parseInt(start);
		var limit = 2;
	}else{
		var start = 0;
		var limit = 2;
	}
	if(allCat){
		//if($('.'+id).length == 0){
			$('.ALLCAT'+id).addClass('active-container');
			bindLazyLoad(id, limit, start, action, text, 'CAT', '');
		//}
	}else{
		//alert(start);
		$('.'+id).addClass('active-container');
		bindLazyLoad(id, limit, start, action, text, 'CAT', '');
	}
	if($('.'+id).length > 0){
		//$('.'+id).addClass('active-container');
		//bindLazyLoad(id, limit, start, action, text, 'CAT', '');
	}else{
		var html ='<div class="collection-cards active-container '+id+'" style="min-height:70vh;"></div>';
		$.ajax({
            url: '/bellezza/ajax/collection.php',
            method: 'POST',
			data: { limit: 2, start: 0, proId:id, name:text, type:'CAT'},
            success: function(response){
				//alert(response);
				$('.collectionCardContainer').append(html);
				$('.'+id).append(response);
				var action = 'inactive';
				bindLazyLoad(id, limit, start, action, text, 'CAT', '');
				
				//bindLazyLoad(id, limit, start, action, text, type);
			}
		});
	}
});



var load = true;
$(document).on('click', '.sidebar-content', function(){
	var id = $(this).data('id');
	var text = $(this).text();
	$('.categories-btn').removeClass('categories-active');
	
	$('.collectionSecondCol').removeClass('activeMainContainer');
	$('.collection-categories .sidebar-content').addClass('categories-active');
	if($('.cat'+id).length > 0){
		//alert('Existing Div! more than 0 || '+ id);
		$('.cat'+id).addClass('activeMainContainer');
		//$('.cat'+id + '.'+id).addClass('active-container');
		$('.collection-cards').removeClass('active-container');
		$('.category'+id).addClass('active-container');	
		//loadCategoyrContent(id, limit, start, text, 'CANGECAT', '');
		var LoadCatNum = $('#LoadCatNum'+id).val();
		//alert(LoadCatNum);
		var action = 'inactive';
		if(load == true){
			var start = 0;
			var limit = 2;
			
			bindLazyLoad(id, limit, start, action, text, 'CANGECAT', '');
			load = false;
		}else{
			var start = $('#LoadCatNum'+id).val();
			var start = parseInt(start);
			var limit = 2;
			//var action = 'active';
			//alert();
			bindLazyLoad(id, limit, start, action, text, 'CANGECAT', '');
		}
	}else{
		var start = 0;
		var limit = 2;
		//alert('Not Exist! Less than 0 || '+ id);
		//var action = 'inactive';
		//var html ='<div class="collectionSecondCol cat'+id+' activeMainContainer" style="min-height:70vh;"></div>';
		loadCategoyrContent(id, limit, start, text, 'CANGECAT', '');
		//bindLazyLoad(id, limit, start, action, text, 'CANGECAT', '');
		/*$.ajax({
            url: '/bellezza/ajax/collection.php',
            method: 'POST',
			data: { limit: 10, start: 0, proId:id, name:text, type:'CANGECAT'},
            success: function(response){
				$('.collection-main-container').append(html);
				$('.cat'+id).append(response);
				var action = 'inactive';
				bindLazyLoad(id, limit, start, action);
			}
		});*/
	}
});

function loadCategoyrContent(id, limit, start, text, type, lazy){
	//alert(start);
	var html ='<div class="collectionSecondCol cat'+id+' activeMainContainer" style="min-height:70vh;"></div>';
	//alert(id + ' || ' + limit + ' || ' + start + ' || ' + text  + ' || ' + type);
	$.ajax({
        url: '/bellezza/ajax/collection.php',
        method: 'POST',
		data: {limit: limit, start: start, proId:id, name:text, type:type, lazy:lazy},
        success: function(response){
			//alert(response);
			$('.loaderSpinner').remove();
			if(response !== 'empty'){
				if(type == 'CANGECAT' && lazy !== 'LAZY'){
					$('.collection-main-container').append(html);
				}
				
				if(type == 'CANGECAT' && lazy == 'LAZY'){
					$('.category'+id).append(response);
				}else if(type == 'CAT' && lazy == 'LAZY'){
					$('.'+id).append(response);
				}else{
					$('.cat'+id).append(response);
				}
				/*if(lazy == 'LAZY'){
					$('.category'+id).append(response);
				}else{
					$('.cat'+id).append(response);
				}*/
				
				
				
				//$('.a'+id).append(response);
				var action = 'inactive';
				bindLazyLoad(id, limit, start, action, text, type);
			}else{
				
				$('.footerContainer').css('display', 'block');
				$('.loaderSpinner').remove();
				var action = 'active';
			}
		}
	});
}

var isLoading = false;
var $contentDiv = null;
function bindLazyLoad(id, limit, start, action, text, type){
	//alert('This is the ID = ' + id + ' || This is the start = ' + start + ' || This is the Action = ' + action + ' || This is the Limit = ' + limit);
	var $window = $('#content-collections');
	var $contentDiv = $('#content-collections');
	var action = action;
	$contentDiv.off('scroll.lazyLoad');
	$contentDiv.off('scroll.lazyLoad');
	$contentDiv.on('scroll.lazyLoad', function(event){
		var contentHeight = $contentDiv[0].scrollHeight;
		var visibleHeight = $contentDiv.innerHeight();
		var scrollPosition = $contentDiv.scrollTop();
		if(scrollPosition + visibleHeight >= contentHeight - 50 &&  action  === 'inactive' && !isLoading) {
			//alert('This is the ID = ' + id + ' || This is the start = ' + start + ' || This is the Action = ' + action + ' || This is the Limit = ' + limit);
			var spinner ='<div class="loaderSpinner" style="width:100%;text-align:center;margin-top:40px;margin-bottom:40px;"><span class="fas fa-circle-notch fa-spin" style="font-size:35px;"></span></div>';
			$('.cat'+id).append(spinner);
			action = 'active';
			start = start + 2;
			if(type == 'CANGECAT'){
				$('#LoadCatNum'+id).val(start);
			}else{
				$('.LoadNum'+id).val(start);
			}
			setTimeout(function(){
				//if($('.cat'+id).is(":visible")){
					//var com = 1;
					//alert(id);
					loadCategoyrContent(id, limit, start, text, type, 'LAZY');
				//}
			}, 2000);
		}
	})
}