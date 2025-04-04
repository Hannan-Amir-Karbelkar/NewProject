$(document).ready(function() {

	var start = 0;
	var limit = 7;
	var com = 0;
	//window.location.href = '/bellezza';
	// Map URL paths to page Names & Store loaded content to avoid re-fetching
	//var historyStack = [];
	var pathMap = {
		'index': 'index',
		'collections': 'collections',
		'product': 'product',
		'myorder': 'myorder',
		'about-us': 'about-us',
	};
	// Map URL paths to page IDS
	var pageIdMap = {
		'index': '',
		'collections': '',
		'product': '',
		'myorder': '',
		'about-us': '',
	};
	/*if($('.ProductHeading').length > 0){
		var indexLoaded = true;
	}else{
		var indexLoaded = false;
	}*/
	var myArray =[];
    // Initial load based on URL to check either there is id in URL or Not 
    var postId = window.location.pathname;

/*
	var matches = postId.match(/\/product\/([a-zA-Z0-9-]{10,20})/);
	var matches2 = postId.match(/\/collections\/([a-zA-Z0-9-]{10,20})/);
	if(matches){
		var productId = matches[1];
	}
	if(matches2){
		var productId = matches2[1];
	}
    var initialPath = window.location.pathname.split('/');
	//Check if the last segment is a potential ID
	var lastSegment = initialPath.pop();
	var isPotentialId = lastSegment.length > 10 && lastSegment.length <= 20;
	var initialPath = isPotentialId ? initialPath.pop() : lastSegment;*/

	var urlParts = postId.split('/');
	//Find the Index of bellezza
	var bellezzaIndex = urlParts.indexOf('bellezza');
	
	//Check if bellezza exists
	if(bellezzaIndex !==-1){
		//Get the Product nmae (next Part after "bellezza");
		var initialPath = urlParts[bellezzaIndex + 1];
		var productName = urlParts[bellezzaIndex + 2];
		var productId = urlParts[bellezzaIndex + 3];
	}
	if(initialPath == 'product' || initialPath == 'collections'){
		sessionStorage.setItem(initialPath, productId);
	}
	
	/*if(initialPath == 'product' &&  lastSegment.length <= 10){
		//alert(lastSegment.length);
		var initialPage = 'index';
		var com = 1;
	}else{*/
		var initialPage = pathMap[initialPath] || 'index';
	//}
	//alert(initialPage);
	myArray.push(initialPage);
    if(com == 0){
		loadContent(initialPage, start, limit, com, productId, '', '', '', '', '');
		//manageHistory('/bellezza/'+initialPage); 
	}

    $(document).on('click', '.actionBtn', function(){
		//var mainid = '';
		$('.loaders').css('display','block');
		$('.loadSkeleton').css('display','block');
		var com = 1;
        var src = $(this).data('src');
        var id = $(this).data('id');
		sessionStorage.setItem(src, id);
		
		if(src == 'collections'){
			
			var name = $(this).data('name');
			var type = $(this).data('type');	
			var catType = $(this).data('cat');
			var mainid = $(this).data('mainid');
			myArray.push('collections');
			
			$('.collection-cards').removeClass('active-container');
			$('.IndicatorLeftSide').find('span:eq(1)').text(name);
			$('.cat'+id).addClass('show');
			$('.cat'+id).removeClass('hide');
			$('.cat'+id).addClass('activeMainContainer');
			$('.category'+id).addClass('active-container');
			
			$('.categories-btn').removeClass('categories-active');
			$('.collection-categories').find('div:eq(0)').addClass('categories-active');
			
			loadContent(src, start, 2, com, id, '', name, type, catType, mainid);
			//alert(mainid);
		}else{
			
			loadContent(src, start, 7, com, id, '', '', '', '', '');
		}
		
        changeUrl(src, type, name, id);
       //manageHistory('/bellezza/'+src);
    });
	
	function loadContent(page, start, limit, com, proId, lazy, name, type, catType, mainid){
		
		var pageId = page in pathMap ? pathMap[page] : 'index';
		//alert(pageId);
		//alert('ProId == ' + proId + ', Name == ' + name + ', Type == ' + type);
		//alert('COM-> ' + com + ' |#| pageIdMap-> ' + pageIdMap[pageId]  + ' |#| proId-> ' + proId  + ' |#| page->  ' + page  + ' |#| Lazy->  ' + lazy || page == 'myorder');
		if(com == 1 && pageIdMap[pageId] !== proId && page !== 'index' || pageIdMap[pageId] == proId && lazy =='lazy' || com == 1 && page == 'index'  || page == 'myorder'  || page == 'about-us' || $('.cat'+proId).length < 1){
		//if(com == 1 && pageIdMap[pageId] !== proId && page !== 'index' || pageIdMap[pageId] == proId && lazy =='lazy' || com == 1 && page == 'index' && indexLoaded == true && lazy == 'lazy'){
			$.ajax({
                url: '/bellezza/'+pageId+'.php',
                method: 'POST',
				data: { limit: limit, start: start, proId:proId, name:name, type:type, catType:catType, mainid:mainid},
                success: function(response){
					//alert(response);
					$('.loaders').css('display','none');
					if(response !== '' && response !== 'empty'){
						if(pageId == 'collections' && start != 0){
							$('.collection-cards').append(response);
						}else{
							if(pageId == 'product' && start > 0 || pageId == 'index' && start > 0){
								//alert('#content-'+pageId);
								$('#content-'+pageId).append(response).show();
							}else{
								//alert(proId);
								//$('#content-'+pageId).html(response).show();
								$('#content-'+pageId).removeClass('hide');
								
								if($('.cat'+proId).length > 0){
									//alert('Class Is Exist');
									$('.page-content').addClass('hide');
									$('#content-'+pageId).removeClass('hide');
									$('#content-'+pageId).addClass('show');
									
									$('.collectionSecondCol').addClass('hide');
									$('.collectionSecondCol').removeClass('show');
									$('.cat'+proId).removeClass('hide');
									$('.cat'+proId).addClass('show');
								
								}else{
									$('.collectionSecondCol').addClass('hide');
									$('.collectionSecondCol').removeClass('show');
									$('.cat'+proId).removeClass('hide');
									$('.cat'+proId).addClass('show');
										//alert('this is the thing');
									//$('#content-'+pageId).html(response).addClass('show');
									if($('#mainBodyContainer').length > 0){
										//alert('paads');
										$('#content-'+pageId).addClass('show');
									}else if(pageId  == 'collections'){
										//alert(response);
										$('#content-'+pageId).append(response).addClass('show');
									}
									//alert(mainid);
									loadCategoyrContent(proId, 2, 0, name, type, '', 'First', catType, mainid);
								}
								
							}
						}
						//$('.page-content').not('#content-'+pageId).hide();
						$('.page-content').not('#content-'+pageId).addClass('hide');
						$('.loaderSpinner').remove();
						
						var title = $('#content-' + pageId + ' .IndicatorLeftSide').text() || 'Bellezza';
						var description = $('.product-detail p').text() || 'Bellezza Online jewellery Shopping website';
						updateMetaTags(title, description);
						pageIdMap[page] = proId;
						$('.loadSkeleton').css('display','none');
						//if(pageId == 'index' && start !== 7 || pageId == 'product' && start !== 7 || pageId == 'collections'){
						if(pageId == 'index' && start !== 7 || pageId == 'product' && start !== 7){
							var action = 'inactive';
							bindLazyLoad(pageId, limit, start, action, com, proId, name, type);
						}else{
							//if($('.cat'+proId).length > 0){
								//alert(com);
						//	}else{
							//alert('yahi he budu');
								var action = 'inactive';
								bindLazyLoads(proId, 2, 0, action, com, 'CANGECAT', catType, mainid);
								
							//}
						}
					}else{
						$('.footerContainer').css('display', 'block');
						$('.loaderSpinner').remove();
						var action = 'active';
					}
                }
            });
		}else{
			//alert('outer');
			$('.collectionSecondCol').addClass('hide');
			$('.collectionSecondCol').removeClass('show');
			$('.cat'+proId).removeClass('hide');
			$('.cat'+proId).addClass('show');
			
			
			//alert('no Load' + ' || ' + '#content-'+pageId);
			$('.loaders').css('display','none');
			$('.loadSkeleton').css('display','none');
			
			//$('.page-content').hide();
			$('.page-content').addClass('hide');
			$('#content-'+pageId).removeClass('hide');
			
			//$('#content-'+pageId).show();
			
			$('#content-'+pageId).addClass('show');
			var title = $('#content-' + pageId + ' .IndicatorLeftSide').text() || 'Bellezza';
			var description = $('.product-detail p').text() || 'Bellezza Online jewellery Shopping website';
			updateMetaTags(title, description);
			if(com !== 1 && pageIdMap[pageId] !== proId){
				var action = 'inactive';
				bindLazyLoad(pageId, limit, start, action, com, proId, name, type, catType);
				//alert('yaha tak t theek he');
			}
		}
	}

	var isLoading = false;
	var $contentDiv = null;
	function bindLazyLoad(section, limit, start, action, com, id, name, type){
		//alert('mainid');
		var $window = $('#'+'content-'+section);
		var $contentDiv = $('#'+'content-'+section);
		var action = action;
		$contentDiv.off('scroll.lazyLoad');
		$contentDiv.on('scroll.lazyLoad', function(event){
			var contentHeight = $contentDiv[0].scrollHeight;
			var visibleHeight = $contentDiv.innerHeight();
			var scrollPosition = $contentDiv.scrollTop();
			if(scrollPosition + visibleHeight >= contentHeight - 50 &&  action  === 'inactive' && !isLoading) {
				var spinner ='<div class="loaderSpinner" style="width:100%;text-align:center;margin-top:40px;margin-bottom:40px;"><span class="fas fa-circle-notch fa-spin" style="font-size:35px;"></span></div>';
				$('#'+'content-'+section).append(spinner);
			    action = 'active';
				start = start + limit;
				setTimeout(function(){
					if($('#'+'content-'+section).is(":visible")){
						var com = 1;
						loadContent(section, start, limit, com, id, 'lazy', '', '',name, type);
					}
				}, 2000);
			}
		});
	}
	
    function changeUrl(page, type, name, id){
		var  category = name;
		var  id = id;
		var  type = type;
        //var url = page !== 'index' ? page : '';
        //var url = page ? page : '';
        /*if (window.history && window.history.pushState){
            window.history.pushState(null, '', url);
        }*/
		var baseURL= window.location.origin + '/bellezza/';
		if(page == 'product'){
			var url = baseURL + (page ? page : '');
		}else{
			var url = baseURL + page + '/' + category + '/' + id + '/' + type;
		}
		history.pushState(null, '', url);
    }
	
	
	//var historyStack = [];
	/*function manageHistory(newUrl){
		if(!Array.isArray(historyStack)){
			historyStack = [];
		}
		
		historyStack = historyStack.filter(function(url){
			return url !== newUrl;
		});
		
		historyStack.push(newUrl);
			history.pushState(null, '', newUrl);
			console.log("Browser URL Updated to: " + newUrl);
	}*/

   function updateMetaTags(title, description){
        document.title = title;
        //$('title').text(title);
        $('meta[name="description"]').attr('content', description);
    }

    // Handle browser back/forward navigation
    window.onpopstate = function(event){
        var path = window.location.pathname.split('/').pop() || 'index';
		var postId = window.location.pathname
		
        if(!myArray.includes(path)){
			//alert(path);
			var urlParts = postId.split('/');
			//Find the Index of bellezza
			var bellezzaIndex = urlParts.indexOf('bellezza');
			
			//Check if bellezza exists
			if(bellezzaIndex !==-1){
				//Get the Product nmae (next Part after "bellezza");
				var initialPath = urlParts[bellezzaIndex + 1];
				var productName = urlParts[bellezzaIndex + 2];
				var productId = urlParts[bellezzaIndex + 3];
			}
			//alert(initialPath);
			if(productId){
				var page = productId;
				var initialPath = initialPath;
			}else{
				var page = sessionStorage.getItem(initialPath);
			}
			myArray.forEach(function(value){
				//alert(value);
			});
			if(pathMap[initialPath] == 'collections'){
				if(!myArray.includes(initialPath)){
					loadContent(pathMap[initialPath], 0, 7, 1, page, '', '', '', productName, 'CAT');
					
				}
			}else{
				//alert(pathMap[initialPath]);
				loadContent(pathMap[initialPath], 0, 7, 1, page, '');
			}
			myArray.push(initialPath);
	

			/*
			var matches = postId.match(/\/product\/([a-zA-Z0-9-]{10,20})/);
			if(matches){
				var productId = matches[1];
				var page = productId;
				var path = window.location.pathname.split('/');
				var path = path[path.indexOf('bellezza')+1];
			}else{
				var page = sessionStorage.getItem('product');
			}
			
			var matchCollections = postId.match(/\/collections\/([a-zA-Z0-9-]{10,20})/);
			if(matchCollections){
				var productId = matchCollections[1];
				var page = productId;
				var path = window.location.pathname.split('/');
				var path = path[path.indexOf('bellezza')+1];
			}else{
				var page2 = sessionStorage.getItem('collections');
			}
			
			if(pathMap[path] == 'collections'){
				//alert(pathMap[path] + ' = ' + page2);
				loadContent(pathMap[path], 0, 7, 1, page2, '');
			}else{
				loadContent(pathMap[path], 0, 7, 1, page, '');
			}
			myArray.push(path);
			*/
			//alert('beech '+ initialPath);
			
			//$('.page-content').hide();
			//$('#content-'+initialPath).show();
			
			//$('#content-'+pageId).addClass('show');
			
		}
		
		//alert(path);
		
		
		/*
		if(historyStack.length > 1){
			historyStack.pop();
			var lastPage = historyStack[historyStack.length - 1];
			var urlParts = lastPage.split('/');
			var bellezzaIndex = urlParts.indexOf('bellezza');
			if(bellezzaIndex !== -1){
				var initialPath = urlParts[bellezzaIndex + 1];
				var productName = urlParts[bellezzaIndex + 2];
				var productId = urlParts[bellezzaIndex + 3];
				if(productId){
					var page = productId;
				}else{
					var page = sessionStorage.getItem(initialPath);
				}
				loadContent(pathMap[initialPath], 0, 7, 1, page, '');
				myArray.push(initialPath);
			}
			history.replaceState(null, '', lastPage);
		}else{
			var path = initialPath.replace(".php", "");
			$('.page-content').hide();
			$('#content-'+initialPath).show();
		}*/
		//var path = initialPath.replace(".php", "");
		
		//$('.page-content').hide();
		
		$('.page-content').removeClass('show');
		$('.page-content').addClass('hide');
		//$('#content-'+path).show();
		
		
		var urlParts = postId.split('/');
		var bellezzaIndex = urlParts.indexOf('bellezza');
		var initialPaths = urlParts[bellezzaIndex + 1];
		if(initialPaths == ''){
			var initialPaths = 'index';
		}
		$('#content-'+initialPaths).removeClass('hide');
		$('#content-'+initialPaths).addClass('show');
		if(!isCommonCssJsLoaded){
			$("<script src='/bellezza/js/businessPage.js'></script>").appendTo("head");
			isCommonCssJsLoaded = true;
		}
    }
	
	// Adjst This Code In Above on LIne 26
	var initialPath = window.location.pathname.split('/');
	var lastSegment = initialPath.pop();
	var isPotentialId = lastSegment.length > 10 && lastSegment.length <= 20;
	var initialPath = isPotentialId ? initialPath.pop() : lastSegment;
	if(initialPath == 'product'){
		//var isCommonCssJsLoaded = true;
		var isCommonCssJsLoaded = true;
	}else{
		//alert('False Huwa');
		var isCommonCssJsLoaded = false;
	}

	$(document).on('click', '.trendingCard, .productAction', function(){
		if(!isCommonCssJsLoaded){
			$("<script src='/bellezza/js/businessPage.js'></script>").appendTo("head");
			isCommonCssJsLoaded = true;
		}
	});
	
/*** COLLECTIONS PAGE JS ***/
$(document).on('click', '.categories-btn', function(){
	
	var action = 'inactive';
	var allCat = $(this).data('all');
	var text = $(this).text();
	var id = $(this).data('id');
	var tabsId = $(this).data('tabs-id');
	$('.collection-cards').removeClass('active-container');
	$('.categories-btn').removeClass('categories-active');
	$('.collection-categories .sidebar-content').removeClass('categories-active');
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
		$('.ALLCAT'+id).addClass('active-container');
		bindLazyLoads(id, limit, start, action, text, 'CAT', '', '', '');
	}else{
		$('.'+id).addClass('active-container');
		bindLazyLoads(id, limit, start, action, text, 'CAT', '', '', '');
	}
	if($('.'+id).length > 0){
		//$('.'+id).addClass('active-container');
		//bindLazyLoad(id, limit, start, action, text, 'CAT', '');
	}else{
		//bindLazyLoads(id, 2, 0, inactive, text, 'CAT', '');
		loadCategoyrContent(id, 2, 0, text, 'CAT', 'LAZY', 'First', '', '');
		//loadCategoyrContent(id, limit, start, text, 'CANGECAT', '', '', '', '');
		/*var html ='<div class="collection-cards active-container '+id+'" style="min-height:70vh;"></div>';
		$.ajax({
            url: '/bellezza/ajax/collection.php',
            method: 'POST',
			data: { limit: 2, start: 0, proId:id, name:text, type:'CAT'},
            success: function(response){
				$('.collectionCardContainer').append(html);
				$('.'+id).append(response);
				var action = 'inactive';
				bindLazyLoads(id, limit, start, action, text, 'CAT', '');
			}
		});*/
	}
});



var load = true;
$(document).on('click', '.sidebar-content', function(){
	var id = $(this).data('id');
	var text = $(this).text();
	$('.categories-btn').removeClass('categories-active');
	$('.IndicatorLeftSide').find('span:eq(1)').text(text);
	//alert('baans');
	$('.collectionSecondCol').removeClass('activeMainContainer');
	$('.collection-categories .sidebar-content').addClass('categories-active');
	
	
	
	if($('.cat'+id).length > 0){
		$('.cat'+id).addClass('activeMainContainer');
		$('.cat'+id).removeClass('hide');
		$('.collection-cards').removeClass('active-container');
		$('.category'+id).addClass('active-container');
		var LoadCatNum = $('#LoadCatNum'+id).val();
		var action = 'inactive';
		if(load == true){
			var start = 0;
			var limit = 2;
			bindLazyLoads(id, limit, start, action, text, 'CANGECAT', '', '');
			alert();
			load = false;
		}else{
			var start = $('#LoadCatNum'+id).val();
			var start = parseInt(start);
			var limit = 2;
			bindLazyLoads(id, limit, start, action, text, 'CANGECAT', '', '');
		}
	}else{
		
		
		var start = 0;
		var limit = 2;
		loadCategoyrContent(id, limit, start, text, 'CANGECAT', '', '', '', '');
	}
});

function loadCategoyrContent(id, limit, start, text, type, lazy, First, catType, mainid){
//alert('This Is The ' + catType);
/*
	if($('.cat'+id).length > 0){
		$('.cat'+id).addClass('activeMainContainer');
		$('.collection-cards').removeClass('active-container');
		$('.category'+id).addClass('active-container');
		var LoadCatNum = $('#LoadCatNum'+id).val();
		var action = 'inactive';
		if(load == true){
			var start = 0;
			var limit = 2; 
			bindLazyLoads(id, limit, start, action, text, 'CANGECAT', '');
			load = false;
		}else{
			var start = $('#LoadCatNum'+id).val();
			var start = parseInt(start);
			var limit = 2;
			bindLazyLoads(id, limit, start, action, text, 'CANGECAT', '');
		}
	}else{
*/

	var html ='<div class="collectionSecondCol cat'+id+' activeMainContainer" style="min-height:70vh;"></div>';
	//alert(id + ' || ' + limit + ' || ' + start + ' || ' + text  + ' || ' + type  + ' || ' + lazy);
	//alert(start);
	$.ajax({
        url: '/bellezza/ajax/collection.php',
        method: 'POST',
		data: {limit: limit, start: start, proId:id, name:text, type:type, lazy:lazy, catType:catType, mainid:mainid},
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
					if(First == 'First' && start == 0){
						var htmls ='<div class="collection-cards active-container '+id+'" style="min-height:70vh;"></div>';
						$('.collectionCardContainer').append(htmls);
					}
					$('.'+id).append(response);
					//var action = 'inactive';
					//bindLazyLoads(id, limit, start, action, text, 'CAT', '');
				
				}else{
					//$('.collection-main-container').append(html);
					$('.cat'+id).append(response);
				}
				var action = 'inactive';
				//alert(mainid);
				//alert('yup ' + mainid);
				bindLazyLoads(id, limit, start, action, text, type, catType, mainid);
			}else{
				
				$('.footerContainer').css('display', 'block');
				$('.loaderSpinner').remove();
				var action = 'active';
			}
		}
	});
//}
		}
var isLoading = false;
var $contentDiv = null;
function bindLazyLoads(id, limit, start, action, text, type, catType, mainid){
	//alert(catType + ' / ' + mainid);
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
			var spinner ='<div class="loaderSpinner" style="width:100%;text-align:center;margin-top:40px;margin-bottom:40px;"><span class="fas fa-circle-notch fa-spin" style="font-size:35px;"></span></div>';
			if(type == 'CANGECAT'){
				$('.cat'+id).append(spinner);
			}else{
				$('.'+id).parent().append(spinner);
			}
		
		
		//var categryLoadNum = $('.categryLoadNum'+id).val();
	//	var action = 'inactive';
		
		
			var limit = 2;
			action = 'active';
			start = start + 2;
			
			if(type == 'CANGECAT'){
				$('#LoadCatNum'+id).val(start);
				
				/*action = 'active';
				var starts = $('.categryLoadNum'+id).val();
				var starts = parseInt(starts);
				start = starts + 2;*/
				$('.categryLoadNum'+id).val(start);
			}else{
				
				action = 'active';
				start = start + 2;
				$('.LoadNum'+id).val(start);
			}
			
			
			/*var limit = 2;
			var start = parseInt(start);
			action = 'active';
			start = start + 2;
			if(type == 'CANGECAT'){
				$('#LoadCatNum'+id).val(start);
				
				action = 'active';
				var starts = $('.categryLoadNum'+id).val();
				var starts = parseInt(starts);
				start = starts + 2;
				$('.categryLoadNum'+id).val(start);
			}else{
				action = 'active';
				start = start + 2;
				$('.LoadNum'+id).val(start);
			}*/
			
			setTimeout(function(){
				//if($('.cat'+id).is(":visible")){
					//alert(mainid);
					loadCategoyrContent(id, limit, start, text, type, 'LAZY', 'First', catType, mainid);
				//}
			}, 2000);
		}
	})
}
	
});