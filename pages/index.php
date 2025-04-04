<?php 
require_once('../database/connection.php');
session_start();
//$userName = $_SESSION['USN'];
//$ProfileImg = $_SESSION['PRP'];
if(isset($_GET['limit'])){
	$start = $_GET['start'];
	//DECODE SESSION ID
    /*$user_id = $_SESSION['UMLIDLGZS'];
	$user_id = base64_decode(urldecode($user_id));
    $user_id = (($user_id*240)/378720);
	$encript_method = (($user_id*136806)/302);
	$encript_method = 'UID-'.$encript_method;
	$active_user_id = urldecode(base64_encode($encript_method));*/
    $html='';
	if($start == 0){
	$html.='
	<div class="col-12 categoryHeader">
		<div class="jewelryDropBtn">Jewelry
			<div class="category_dropdown">
				<div class="" data-src="">
					<div> RINGS </div>
					<ul>
						<li>All Rings</li>
						<li>Eternity</li>
						<li>Adjustable</li>
						<li>Engagement</li>
						<li>Enxiety</li>
					</ul>
				</div>
				
				<div>
					<div> BRACELETS </div>
					<ul>
						<li>All Bracelets</li>
						<li>Chains</li>
						<li>Bangels</li>
						<li>Beade</li>
					</ul>
				</div>
				
				<div>
					<div> EARINGS </div>
					<ul>
						<li>All Earings</li>
						<li>Hoops</li>
						<li>Huggies</li>
						<li>Studs</li>
						<li>Cuffs</li>
						<li>Flat Backs</li>
						<li>Dangle</li>
						<li>Chain Earings</li>
					</ul>
				</div>
				
				<div>
					<div> Rings </div>
					<ul>
						<li>Rings</li>
						<li>Rings</li>
						<li>Rings</li>
						<li>Rings</li>
					</ul>
				</div>
				
				<div class="actionBtn" data-src="">
					<div> Rings </div>
					<ul>
						<li>Rings</li>
						<li>Rings</li>
						<li>Rings</li>
						<li>Rings</li>
					</ul>
				</div>
			</div>
		</div>
		<div>Best Sellers</div>
		<div>About Us</div>
	</div>
	
	<!-- Banner -->
	<div class="home-banner">
		<img src="public_folder/images/ring2.jpeg" class="banner-image">
	</div>
	
	
		
		
			<!-- TRENDING PRODUCTS SECTION -->
				<div class="trendingSection">
					<div class="ProductHeading">
						TRENDING PRODUCTS
					</div>
					<div class="trendingProCards">
					<div class="trendingCard actionBtn" data-src="collections" data-id="984589834282" data-url="collections" style="position: relative;">
						<img src="public_folder/images/ring6.jpeg" class="trendingImg" style="height: 100%;">
						<div class="trendingDescript" style="position: absolute;width: 100%;top: 80%;">
							<div class="DescriptTitle" style="border-bottom: none;color: black;background: beige;padding: 5px;">FANTASME</div>
						</div>
					</div>
					<div class="trendingCard actionBtn" data-src="collections" data-id="984589834282" style="position: relative;">
						<img src="public_folder/images/ring5.jpeg" class="trendingImg" style="height: 100%;">
						<div class="trendingDescript" style="position: absolute;width: 100%;top: 80%;">
							<div class="DescriptTitle" style="border-bottom: none;color: black;background: beige;padding: 5px;">FANTASME</div>
						</div>
					</div>
					<div class="trendingCard actionBtn" data-src="collections" data-id="984589834282" style="position: relative;">
						<img src="public_folder/images/ring11.jpeg" class="trendingImg" style="height: 100%;">
						<div class="trendingDescript" style="position: absolute;width: 100%;top: 80%;">
							<div class="DescriptTitle" style="border-bottom: none;color: black;background: beige;padding: 5px;">FANTASME</div>
						</div>
					</div>
					<div class="trendingCard actionBtn" data-src="collections" data-id="984589834282" style="position: relative;">
						<img src="public_folder/images/ring12.jpeg" class="trendingImg" style="height: 100%;">
						<div class="trendingDescript" style="position: absolute;width: 100%;top: 80%;">
							<div class="DescriptTitle" style="border-bottom: none;color: black;background: beige;padding: 5px;">FANTASME</div>
						</div>
					</div>
				</div>
				
		<!-- SWIPER SLIDER -->
				<div class="dealContainer">
					<div class="ProductHeading">
						BEST SELLER
					</div>
					<div class="swiperContainers swiper">
						<div class="home-slide-container">
							<div class="card-wrapper swiper-wrapper" >
								<div class="card swiper-slide actionBtn productAction" data-src="product">
									<div class="slider-card">
										<div class="dealheader">
											BEST SELLER
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring13.jpeg" class="sliderImage">
										</div>
										<div class="slider-bottom-section">
											<div class="product-rating ml-5 txt-l">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
											<div class="slider-product-name ml-5 txt-l">Wedding Ring</div>
											<div class="slider-short-desc ml-5 txt-l">Diamond Ring for wedding</div>
											<div class="stock-avlb ml-5 txt-l">
													<span class="text-success">In Stock</span><span> 13 Products</span>
												</div>
											<div class="slider-price-sec">
												<div class="slider-offer-price">
													$50.00
												</div>
												<div class="del-text">
													<del>$.55.00</del>
												</div>
											</div>
										</div>
                                    </div>
								</div>
								
								<div class="card swiper-slide actionBtn" data-src="collections">
									<div class="slider-card">
										<div class="dealheader">
											BEST SELLER	
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring11.jpeg" class="sliderImage">
										</div>
										<div class="slider-bottom-section">
											<div class="product-rating ml-5 txt-l">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
											<div class="slider-product-name ml-5 txt-l">Wedding Ring</div>
											<div class="slider-short-desc ml-5 txt-l">Diamond Ring for wedding</div>
											<div class="stock-avlb ml-5 txt-l">
													<span class="text-success">In Stock</span><span> 13 Products</span>
												</div>
											<div class="slider-price-sec">
												<div class="slider-offer-price">
													$50.00
												</div>
												<div class="del-text">
													<del>$.55.00</del>
												</div>
											</div>
										</div>
                                    </div>
								</div>
								
								<div class="card swiper-slide actionBtn" data-src="collections">
									<div class="slider-card">
										<div class="dealheader">
											BEST SELLER	
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring10.jpeg" class="sliderImage">
										</div>
										<div class="slider-bottom-section">
											<div class="product-rating ml-5 txt-l">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
											<div class="slider-product-name ml-5 txt-l">Wedding Ring</div>
											<div class="slider-short-desc ml-5 txt-l">Diamond Ring for wedding</div>
											<div class="stock-avlb ml-5 txt-l">
													<span class="text-success">In Stock</span><span> 13 Products</span>
												</div>
											<div class="slider-price-sec">
												<div class="slider-offer-price">
													$50.00
												</div>
												<div class="del-text">
													<del>$.55.00</del>
												</div>
											</div>
										</div>
                                    </div>
								</div>
								
								<div class="card swiper-slide actionBtn" data-src="collections">
									<div class="slider-card">
										<div class="dealheader">
											BEST SELLER	
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring15.jpeg" class="sliderImage">
										</div>
										<div class="slider-bottom-section">
											<div class="product-rating ml-5 txt-l">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
											<div class="slider-product-name ml-5 txt-l">Wedding Ring</div>
											<div class="slider-short-desc ml-5 txt-l">Diamond Ring for wedding</div>
											<div class="stock-avlb ml-5 txt-l">
													<span class="text-success">In Stock</span><span> 13 Products</span>
												</div>
											<div class="slider-price-sec">
												<div class="slider-offer-price">
													$50.00
												</div>
												<div class="del-text">
													<del>$.55.00</del>
												</div>
											</div>
										</div>
                                    </div>
								</div>
								
								<div class="card swiper-slide actionBtn" data-src="collections">
									<div class="slider-card">
										<div class="dealheader">
											BEST SELLER	
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring16.jpeg" class="sliderImage">
										</div>
										<div class="slider-bottom-section">
											<div class="product-rating ml-5 txt-l">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
											<div class="slider-product-name ml-5 txt-l">Wedding Ring</div>
											<div class="slider-short-desc ml-5 txt-l">Diamond Ring for wedding</div>
											<div class="stock-avlb ml-5 txt-l">
													<span class="text-success">In Stock</span><span> 13 Products</span>
												</div>
											<div class="slider-price-sec">
												<div class="slider-offer-price">
													$50.00
												</div>
												<div class="del-text">
													<del>$.55.00</del>
												</div>
											</div>
										</div>
                                    </div>
								</div>
								
								<div class="card swiper-slide actionBtn" data-src="collections">
									<div class="slider-card">
										<div class="dealheader">
											BEST SELLER	
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring9.jpeg" class="sliderImage">
										</div>
										<div class="slider-bottom-section">
											<div class="product-rating ml-5 txt-l">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
											<div class="slider-product-name ml-5 txt-l">Wedding Ring</div>
											<div class="slider-short-desc ml-5 txt-l">Diamond Ring for wedding</div>
											<div class="stock-avlb ml-5 txt-l">
													<span class="text-success">In Stock</span><span> 13 Products</span>
												</div>
											<div class="slider-price-sec">
												<div class="slider-offer-price">
													$50.00
												</div>
												<div class="del-text">
													<del>$.55.00</del>
												</div>
											</div>
										</div>
                                    </div>
								</div>
								
								<div class="card swiper-slide actionBtn" data-src="collections">
									<div class="slider-card">
										<div class="dealheader">
											BEST SELLER	
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring17.jpeg" class="sliderImage">
										</div>
										<div class="slider-bottom-section">
											<div class="product-rating ml-5 txt-l">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
											<div class="slider-product-name ml-5 txt-l">Wedding Ring</div>
											<div class="slider-short-desc ml-5 txt-l">Diamond Ring for wedding</div>
											<div class="stock-avlb ml-5 txt-l">
													<span class="text-success">In Stock</span><span> 13 Products</span>
												</div>
											<div class="slider-price-sec">
												<div class="slider-offer-price">
													$50.00
												</div>
												<div class="del-text">
													<del>$.55.00</del>
												</div>
											</div>
										</div>
                                    </div>
								</div>
							</div>
						<div class="swiper-pagination4"></div>
					</div>
				</div>
				
				<!-- Masonry Gallery -->
				<div class="masonry-gallery">
					<div class="masonry-images row-2 col-2" style="background-image: url(public_folder/images/ring8.jpeg)">Rings</div>
					<div class="masonry-images " style="background-image: url(public_folder/images/ring9.jpeg)">Bangels</div>
					<div class="masonry-images" style="background-image: url(public_folder/images/ring3.jpeg)">Bracelets</div>
					<div class="masonry-images" style="background-image: url(public_folder/images/ring7.jpeg)"></div>
					<div class="masonry-images row-2 col-2" style="background-image: url(public_folder/images/ring6.jpeg)"></div>
					<div class="masonry-images row-2 row-md-1" style="background-image: url(public_folder/images/ring10.jpeg)"></div>
					<div class="masonry-images" style="background-image: url(public_folder/images/ring5.jpeg)"></div>
					<div class="masonry-images" style="background-image: url(public_folder/images/ring4.jpeg)"></div>
				</div>
				<script>


var swiper = new Swiper(".home-slide-container", {
  slidesPerView: 3,
  spaceBetween: 9,
  loop: true,
  sliderPerGroup: 3,
  centerSlide: true,
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".swiper-pagination4",
    clickable: true,
    dynamicBullets: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints: {
    0: {
      slidesPerView: 2,
	  spaceBetween: 5,
    },
    520: {
      slidesPerView: 3,
    },
    768: {
      slidesPerView: 4,
    },
    1000: {
      slidesPerView: 5,
    },
	1270: {
      slidesPerView: 6,
    },
  },
});
</script>';
echo $html;
	}else if($start == 5){
		$html.='
				<!-- TESTIMONIAL -->
				<div class="main-T-Container">
					<div class="t-container">
						<div class="contents-wraper">
							<section class="T-header"><h1>our customers say</h1></section>
							<section class="testRow">				
								<div class="testItem active">
									<img src="public_folder/profileimages/model-2.jpg">
									<h3>Jane Doe</h3>
									<h4>San Francisco, USA</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								</div>
								<div class="testItem">
									<img src="public_folder/profileimages/model-4.jpg">
									<h3>Jane Doe</h3>
									<h4>San Francisco, USA</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								</div>
								<div class="testItem">
									<img src="public_folder/profileimages/model-2.jpg">
									<h3>Jane Doe</h3>
									<h4>San Francisco, USA</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								</div>
								<div class="testItem">
									<img src="public_folder/profileimages/model-5.jpg">
									<h3>Jane Doe</h3>
									<h4>San Francisco, USA</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								</div>
								<div class="testItem">
									<img src="public_folder/images/ring14.jpeg">
									<h3>Jane Doe</h3>
									<h4>San Francisco, USA</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								</div>
							</section>
							<section class="indicators">
								<div class="dot active" attr="0" onclick="switchTest(this)"></div>
								<div class="dot" attr="1" onclick="switchTest(this)"></div>
								<div class="dot" attr="2" onclick="switchTest(this)"></div>
								<div class="dot" attr="3" onclick="switchTest(this)"></div>
								<div class="dot" attr="4" onclick="switchTest(this)"></div>
							</section>							
							<section class="indicators">
								<div class="dot active" attr="0" onclick="switchTest(this)"></div>
								<div class="dot" attr="1" onclick="switchTest(this)"></div>
								<div class="dot" attr="2" onclick="switchTest(this)"></div>
								<div class="dot" attr="3" onclick="switchTest(this)"></div>
								<div class="dot" attr="4" onclick="switchTest(this)"></div>
							</section>
						</div>
					</div>
				</div>

				
				
				<!-- FOOTER -->
				<div class="footerContainer">
					<div class="footerFirstChild">
						<div class="footerLogoContainer">
							<div class="footerLogo">
								BRAND LOGO
							</div>
							<div class="footer-about-sec">
								<div class="footer-abt-head">About Us</div>
								<div class="footer-abt-text">We the people of India having solemnly resolved India into soveriegn sociolist secular and democratic and to secure its citizens Justice liberty equality and fraternity  We the people of India having solemnly resolved India into soveriegn sociolist secular and democratic and to secure its citizens Justice liberty equality and fraternity. We the people of India having solemnly resolved India into soveriegn sociolist secular and democratic and to secure its citizens Justice liberty equality and fraternity</div>
							</div>
						</div>
						<div class="footerTopRight">
							<div class="footerHeader">Quick Links</div>
							<div class="footerContent actionBtn myOrder" data-src="page7" data-id="984589834282">My Orders</div>
							<div class="footerContent">Profile</div>
							<div class="footerContent setting">Setting</div>
							<div class="footerContent actionBtn productListing" data-src="page8" data-id="984589834282">Admin</div>
						</div>
						<div class="footerBottonLeft">
							<div class="footerHeader">Contact Us</div>
							<div class="footerContent"><i class="fas fa-phone"></i> +99-8805449684</div>
							<div class="footerContent"><i class="fas fa-envelope"></i> karbelkar20@gmail.com</div>
						</div>
						<div class="footerBottonRight">
							<div class="footerHeader">Follow Us</div>
								<div style="display:flex;">
									<div style="display:flex;margin: 5;margin-left: 40px;justify-content: flex-start;">
									<span class="fab fa-facebook-f" style="margin: 5px;"></span>
									<span class="fab fa-twitter" style="margin: 5px;"></span>
									<span class="fab fa-whatsapp" style="margin: 5px;"></span>
									<span class="fab fa-instagram" style="margin: 5px;"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
<script>
var swiper = new Swiper(".slide-container3", {
  slidesPerView: 3,
  spaceBetween: 9,
  loop: true,
  sliderPerGroup: 3,
  centerSlide: true,
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".swiper-pagination3",
    clickable: true,
    dynamicBullets: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints: {
    0: {
      slidesPerView: 2,
	  spaceBetween: 5,
    },
    520: {
      slidesPerView: 3,
    },
    768: {
      slidesPerView: 3,
    },
    1000: {
      slidesPerView: 5,
    },
	1270: {
      slidesPerView: 6,
    },
  },
});

var swiper = new Swiper(".home-slide-container", {
  slidesPerView: 3,
  spaceBetween: 9,
  loop: true,
  sliderPerGroup: 3,
  centerSlide: true,
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".swiper-pagination4",
    clickable: true,
    dynamicBullets: false,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  breakpoints: {
    0: {
      slidesPerView: 2,
	  spaceBetween: 5,
    },
    520: {
      slidesPerView: 3,
    },
    768: {
      slidesPerView: 4,
    },
    1000: {
      slidesPerView: 5,
    },
	1270: {
      slidesPerView: 6,
    },
  },
});';
$html.="
/* Testimonial Section*/
	
	// Access the testimonials
	let testSlide = document.querySelectorAll('.testItem');
	// Access the indicators
	let dots = document.querySelectorAll('.dot');

	var counter = 0;

	// Add click event to the indicators
	function switchTest(currentTest){
		currentTest.classList.add('active');
		var testId = currentTest.getAttribute('attr');
		if(testId > counter){
			testSlide[counter].style.animation = 'next1 0.5s ease-in forwards';
			counter = testId;
			testSlide[counter].style.animation = 'next2 0.5s ease-in forwards';
		}else if(testId == counter){
			return;
		}else{
			testSlide[counter].style.animation = 'prev1 0.5s ease-in forwards';
			counter = testId;
			testSlide[counter].style.animation = 'prev2 0.5s ease-in forwards';
		}
		indicators();
	}

	// Add and remove active class from the indicators
	function indicators(){
		for(i = 0; i < dots.length; i++){
			dots[i].className = dots[i].className.replace(' active', '');
		}
		dots[counter].className += ' active';
	}

	// Code for auto sliding
	function slideNext(){
		testSlide[counter].style.animation = 'next1 0.5s ease-in forwards';
		if(counter >= testSlide.length - 1){
			counter = 0;
		}
		else{
			counter++;
		}
		testSlide[counter].style.animation = 'next2 0.5s ease-in forwards';
		indicators();
	}
	function autoSliding(){
		deleteInterval = setInterval(timer, 5000);
		function timer(){
			slideNext();
			indicators();
		}
	}
	autoSliding();

	// Stop auto sliding when mouse is over the indicators
	const container = document.querySelector('.contents-wraper');
	container.addEventListener('mouseover', pause);
	function pause(){
		clearInterval(deleteInterval);
	}

	// Resume sliding when mouse is out of the indicators
	container.addEventListener('mouseout', autoSliding);

</script>";
		echo $html;
	}
}
die();
?>