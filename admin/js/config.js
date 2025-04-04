/*$(document).on('click', '.get_comment_id', function(){
	if(!isComCssLoaded){
		$("<link rel='stylesheet' href='css/listingProduct.css'>").appendTo("head");
		$("<script src='js/listingProduct.js'></script>").appendTo("head");
		isComCssLoaded = true;
	}
});*/
$(document).on('click', '.productListing', function(){
	if(!isListProductLoaded){
		$("<link rel='stylesheet' href='css/listingProduct.css'>").appendTo("head");
		$("<script src='js/listingProduct.js'></script>").appendTo("head");
		isListProductLoaded = true;
	}
});
var isListProductLoaded = false;
//var isComCssLoaded = false;
//ORIGINAL CODE IS SITUETED IN try.php page
	var start = 0;
	var postIds = [];
	var AdsId = [];
	var NotiId2 = [];
	var id ='';
	var url = window.location.href.split('#')[0];
	window.history.replaceState({}, document.title, url);
    limit = 5;
	loadPosts('page1', start, limit, id);
	$(document).on('click', '.linkBtn', function(){
		localStorage.setItem('PAGETRNS', 'false');
		window.scrollTo(0,0, { behavior: 'instant', });
		var src = $(this).data('src');
		if(src !== ''){
			$('.loaders').css('display', 'block');
		    $('.loadSkeleton').css('display', 'block');
		}
		if(src == 'page2'){
			var src = 'listingProduct';
		}
		if(src == 'page3'){
			//var src = 'ProductPortfolio';
			var src = 'category';
		}
		if(src == 'page4'){
			var src = 'MyInvestments';
		}
		if(src == 'page5'){
			var src = 'FundSubscription';
		}
		if(src == 'page6'){
			var src = 'AccountSetting';
		}
		if(src == 'page7'){
			var src = 'orderInfo';
		}
		if(src == 'page8'){
			var src = 'About';
		}
		if(src == 'page9'){
			var src = 'Contact';
		}
		if(src == 'page10'){
			var src = 'Terms&Conditions';
		}
		if(src == 'page11'){
			var src = 'AdvertisementForm';
		}
		if(src == 'page12'){
			var src = 'Notification';
		}
		if(src == 'page13'){
			var src = 'news';
		}
		
		history.pushState(null, '', src);
		if($(this).data('id')){
			var id = $(this).data('id');
		}else{
			var id = '';
		}
		loadContent(src, id);
		changeUrl(src, id);
	});
	function loadContent(section, id){
		var $page = $('.'+section);
		if(section == 'parent_page1'){
			var section = 'page1';
		}else if(section == 'listingProduct'){
			var section = 'page2';
		//}else if(section == 'ProductPortfolio'){
		}else if(section == 'category'){
			var section = 'page3';
		}else if(section == 'MyInvestments'){
			var section = 'page4';
		}else if(section == 'FundSubscription'){
			var section = 'page5';
		}else if(section == 'AccountSetting'){
			var section = 'page6';
		}else if(section == 'orderInfo'){
			var section = 'page7';
		}else if(section == 'About'){
			var section = 'page8';
		}else if(section == 'Contact'){
			var section = 'page9';
		}else if(section == 'Terms&Conditions'){
			var section = 'page10';
		}else if(section == 'AdvertisementForm'){
			var section = 'page11';
		}else if(section == 'Notification'){
			var section = 'page12';
		}else if(section == 'news'){
			var section = 'page13';
		}
		var id_container = $('.id_container').val();
		var id_container4 = $('.page4_valueId').val();
		var id_container5 = $('.page5_valueId').val();
		if(section == 'page2' && id_container !== id){
			loadPosts(section, start, limit, id);
		}else if(section == 'page4' && id_container4 !== id){
			loadPosts(section, start, limit, id);
		}else if(section == 'page5' && id_container5 !== id){
			loadPosts(section, start, limit, id);
		}else if($('#main_'+section).length === 0){
			loadPosts(section, start, limit, id);
		}else{
			var section = 'parent_'+section;
			$('.webPages').hide();
			$('.'+section).show();
			$('.'+section).css('height', '93vh');
			$('.'+section).css('position', 'relative');
			$('.'+section).css('left', '0');
			var linkBtn = document.querySelector(".linkBtn");
			$('.loadSkeleton').css('display','none');
			$('.loaders').css('display','none');
		}
	}
	function loadPosts(section, start, limit, id){
		//var $page = $('.'+section);
		var url = section+'.php';
		var objects = [];
		$.ajax({
			url: 'adminPages/'+url,
			method: 'POST',
			data: { limit: limit, start: start, id:id, postIds:postIds, AdsId:AdsId, NotiId2:NotiId2},
			success: function(response){
				if(response !== ''){
					if(section == 'page1' || section == 'page4' || section == 'page5' ||  section == 'page12'){
						
						if(section == 'page1'){
							$('.'+section+'_content').append(response);
							$('.loaders').css('display', 'none');
							$('.loaderSpinner').remove();
						}
						if(section == 'page4'){
							$('.'+section+'_content').html(response);
							$('.loaders').css('display', 'none');
							$('.loaderSpinner').remove();
						}
						if(section == 'page5' || section == 'page7'){
							$('.'+section+'_content').html(response);
							$('.loaders').css('display', 'none');
							$('.loaderSpinner').remove();
						}
						/*for(var i = 0; i < objects.length; i++){
							if(section == 'page5' || section == 'page12'){
								var veawid = object.id;
								if(veawid ==''){
									$('.loaderSpinner').remove();
									var action = 'active';
								}else{
									if(start == 0){
										$('.'+section+'_content').html(html);
									}else{
										if(section == 'page5'){
											$('.append_new_class').append(html);
										}else{
											$('.'+section+'_content').append(html);
										}
									}
									var action = 'inactive';
									$('.loaders').css('display', 'none');
									$('.loaderSpinner').remove();
									bindLazyLoad(section, limit, start, action, id);
								}
							}
							html += html;
						}*/
					}else{
						$('.'+section+'_content').html(response);
						$('.loaders').css('display', 'none');
					}
					$('.loadSkeleton').css('display','none');
					if(section == 'page1'){
						var action = 'inactive';
					    bindLazyLoad(section, limit, start, action);
					}
				}else{
					$('.loaderSpinner').remove();
					var action = 'active';
				}
			}
		});
	}
	var isLoading = false;
	var $contentDiv = null;
	function bindLazyLoad(section, limit, start, action, id){
		var $window = $('.'+section);
		var $contentDiv = $('.'+section);
		var action = action;
		$contentDiv.on('scroll', function(event){
			var contentHeight = $contentDiv[0].scrollHeight;
			var visibleHeight = $contentDiv.innerHeight();
			var scrollPosition = $contentDiv.scrollTop();
			if(scrollPosition + visibleHeight >= contentHeight - 50 &&  action  === 'inactive' && !isLoading) {
				var spinner ='<div class="loaderSpinner" style="width:100%;text-align:center;margin-top:40px;"><span class="fas fa-circle-notch fa-spin" style="font-size:35px;"></span></div>';
	         	$('.'+section+'_content').append(spinner);
			    action = 'active';
				start = start + limit;
				limit = Math.floor((Math.random() * 5) + 15);
				setTimeout(function(){
					if ($('.'+section).is(":visible")) {
						console.log(section);
						loadPosts(section, start, limit, id);
					}
				}, 2000);
			}
		});
	}
    $(window).on('popstate', function(event){
		var pageURL = $(location).attr("href");
    	var section = pageURL.split('/').pop().split('#')[0].split('?')[0];
		var sessionTrns =  localStorage.getItem('PAGETRNS');
		/*if(section == 'index.php' && sessionTrns == 'true'  || section == '' && sessionTrns == 'true'){
			window.history.go(-1);
		}*/
		if(section == 'index.php' || section == ''){
			localStorage.setItem('PAGETRNS', 'true');
			var section = 'page1';
		}else{
			localStorage.setItem('PAGETRNS', 'false');
		}
		var section = 'parent_'+section;
		$('.webPages').hide();
		$('.'+section).show();
		if(section == 'parent_FundSubscription' || section == 'parent_orderInfo'){
			$('.'+section).css('height', '100vh');
			$('.'+section).css('position', 'fixed');
			$('.'+section).css('left', '13px');
		}else{
			$('.'+section).css('height', '93vh');
			$('.'+section).css('position', 'relative');
			$('.'+section).css('left', '0');
		}
	    var linkBtn = document.querySelector(".linkBtn");
		$('.loadSkeleton').css('display','none');
		
	});
	function changeUrl(section, id){
		document.title = section;
		var section = 'parent_'+section;
		$('.webPages').hide();
		$('.'+section).show();
		if(section == 'parent_FundSubscription' || section == 'parent_orderInfo'){
			$('.'+section).css('height', '100vh');
			$('.'+section).css('position', 'fixed');
			$('.'+section).css('left', '13px');
		}else{
			$('.'+section).css('height', '93vh');
			$('.'+section).css('position', 'relative');
			$('.'+section).css('left', '0');
		}
	    var linkBtn = document.querySelector(".linkBtn");
		$('.loadSkeleton').css('display','none');
	};
	let previous = window.location.href;
    window.addEventListener('popstate', function(event){
		if(previous.includes('#') && !window.location.href.includes("#")){
			closeComment();
		}else if(!previous.includes('#Comment') && window.location.href.includes("#Comment")){
			$('#myCommentnav').css('height', '100%');
		}
		previous = window.location.href;
	});