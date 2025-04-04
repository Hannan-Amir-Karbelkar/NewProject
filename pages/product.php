<?php 
require_once('../database/connection.php');
session_start();
$today = date("Y-m-d");
$delivery_date = date("j F Y", strtotime($today. "+1 days"));
$html='';
$html.='<div class="col-xl-12 col-lg-12" id="mainBodyContainer">
			<div class="pageIndicatorContainer">
				<div class="IndicatorLeftSide"><span class="fas fa-chevron-left leftIndicator"></span>Rings</div>
				<div class="IndicatorRightSide filter">Filter<span class="leftIcons fas fa-sort-amount-down-alt"></span></div>
			</div>
			<div class="col-xl-12 col-lg-12" id="mainBodyContainer" style="height:auto;background: white;width: 100%;padding-left: 0px;">
				<div class="card-wrapper">
					<div class = "card">
						<!-- card left -->
						<div class = "product-imgs">
							<div class = "img-display">
								<div class = "img-showcase">
									<img src = "public_folder/images/ring3.jpeg" alt = "shoe image" class="mainImg">
								</div>
							</div>
							
							
							<div id="slider-wrapper">
								<div class="itemSliderArrow SliderArrowLeft" id="SliderArrowLeft">
									<span class="fas fa-chevron-left" style="line-height: 15px;"></span>
								</div>
								<div id="slider">
									<img src = "public_folder/images/ring2.jpeg" alt = "shoe image" class="thumbnail active activeImage">
									<img src = "public_folder/images/ring3.jpeg" alt = "shoe image" class="thumbnail">
									<img src = "public_folder/images/ring2.jpeg" alt = "shoe image" class="thumbnail">
									<img src = "public_folder/images/ring1.jpeg" alt = "shoe image" class="thumbnail">
									<img src = "public_folder/images/ring3.jpeg" alt = "shoe image" class="thumbnail">
									<img src = "public_folder/images/ring3.jpeg" alt = "shoe image" class="thumbnail">
								</div>
								<div class="itemSliderArrow SliderArrowRight" id="SliderArrowRight">
									<span class="fas fa-chevron-right" style="line-height: 15px;"></span>
								</div>
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
							</div>
						</div>
						<!-- card right -->
						<div class = "product-content">
							<h2 class = "product-title">Diamond Ring</h2>
							<div class = "product-rating">
								<i class = "fas fa-star"></i>
								<i class = "fas fa-star"></i>
								<i class = "fas fa-star"></i>
								<i class = "fas fa-star"></i>
								<i class = "fas fa-star-half-alt"></i>
								<span>4.7(21)</span>
							</div>
							<div class = "product-price">
								<p><span class = "last-price">$257.00</span>
								<span class = "new-price"><span class="productPrice">$249.00 (5%)</span></span></p>
								<p style="font-weight: 400;font-size: 13px;">Estimate Shipping Date: '.$delivery_date.'</p>
								<p class="availibility">Available</p>
							</div>
							
							
							<div class="details-heading">
								item details
								<span class="fas fa-chevron-down"></span>
							</div>
							<div class="shortDetails productShortDetails">
								<div><b> Category: </b><span> Shoes</span></div>
								<div><b> Collection Name:</b> <span> Wedding Ring </span></div>
								<div><b> Material:</b> <span> Metal </span></u></div>
								<div><b> Theme:</b> <span> Vintage </span></u></div>
								<div><b> Color:</b> <span> Golden </span></u></div>
								<div><b> Size:</b> <span> Mefium </span></u></div>
							</div>
							
							<div class="details-heading">
								Protection And Return Policies
								<span class="fas fa-chevron-down"></span>
							</div>
							<div class="shortDetails">
								<div class="protectionLink"><img src="web_folder/delivery.png" style="width:30px;"> Hassle free 7 days Return & exchange <span style="color:blue;"><u>know our protetion</u></span></div>
							</div>
							
							<div class="details-heading">
								Delivery policies
								<span class="fas fa-chevron-down"></span>
							</div>
							<div class="shortDetails">
								<div><img src="web_folder/delivery2.png" style="width:30px;"> Estimate Shipping Date:<u style="text-decoration: none;border-bottom: 1px dashed #2e2c2c;margin-left: 5;"> '.$delivery_date.'</u></div>
								<div><img src="web_folder/fast-delivery.png" style="width:30px;"> Shipping Area: <span> All over the world </span></div>
								<div><img src="web_folder/cost.png" style="width:30px;"><u style="text-decoration: none;border-bottom: 1px dashed #2e2c2c;margin-left: 5;"> Free Shipping</u></div>
							</div>
							
							<div class="delivery-add">
								Deliver to USA, 402115
								<span class="fas fa-chevron-down"></span>
							</div>
							<div class="country-code-form">
								<label style="padding: 5px;">Country</label>
								<select type="" class="form-control" style="margin-bottom: 10px;">
									<option>India</option>
									<option>USA</option>
									<option>Dubai</option>
									<option>South Africa</option>
									<option>Argentina</option>
									<option>UK</option>
									<option>Germany</option>
									<option>Germany</option>
								</select>
								<label style="padding: 5px;">Zip-code</label>
								<input type="" class="form-control" style="margin-bottom: 10px;">
								<button type="button" class="form-control" style="margin-bottom:10px;background:green;color:#fff;">Submit</button>
							</div>
							<div class="dispatch-add">
								Dispatch from Hungry
							</div>
							
							<div class = "product-detail">
								<h5>Products Details: </h5>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo eveniet veniam tempora fuga
								tenetur placeat sapiente architecto illum soluta consequuntur, aspernatur quidem at sequi ipsa!</p>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, perferendis eius.
								Dignissimos, labore suscipit. Unde.</p>
								
								<span class="QtyHeading">Quantity</span>
								<div class="counterContainer proCount">
									<button class="counter-btn" onclick="handleCounterMinus(this)">-</button>
									<input class="counter" id="counter" value="1">
									<button class="counter-btn" onclick="handleCounterPlus(this)">+</button>
								</div>
							</div>
							<div class = "purchase-info">
								<!--<button type = "button" class = "btn cartButton">
									Add to Cart 
									<i class = "fas fa-shopping-cart"></i>
								</button>-->
								
								<button type = "button" class="btn cartButton">
									<span class="add-to-cart">Add to Cart</span>
									<span class="added">Added</span>
									<i class = "fas fa-shopping-cart"></i>
									<i class = "fas fa-box"></i>
								</button>
								
								<button type = "button" class = "btn">Order Now</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="preview-box">
					<div class="details">
						<span style="margin-top: auto;" class="icon fas fa-times lightBox-close"></span>
						<span class="max fas fa-expand" style="font-size:20px;"></span>
						<span class="min fas fa-compress" style="font-size:20px;"></span>
						
					</div>
					<div class="image-box">
						<div class="slide prev"><i class="fas fa-angle-left"></i></div>
						<div class="slide next"><i class="fas fa-angle-right"></i></div>
						<img class="img-main" src="public_folder/images/trade.jpg" alt="">
					</div>
				</div>
				
				
				
				<!-- Related Product First Slider --->
				<div class="ProductHeading">
					Related Products
					<p class="HeadShortTitle">Grap the deal now Hurry Up</p>
				</div>
				
					<div class="swiper">
						<div class="slide-container">
							<div class="swiper-wrapper"> 
								<div class="card swiper-slide" style="width: 179.8px; margin-right: 9px;">
									<div class="sliderCard">
										<div class="sliderHeader">
											<div class="slider-Head-left">
												<i class="fas fa-tag"></i> Sale
											</div>
											<div>
												<i class="fas fa-bookmark slider-Head-right"></i>
											</div>
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring14.jpeg" class="sliderImage">
										</div>
										<div class="slider-pro-name">Wedding Ringu</div>
										<div class="pro-short-desc">Diamond Ring for wedding</div>
										<div class="rating-container">
											<div class="product-rating">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
										</div>
										<div class="swiper-bottom">
											<div class="offer-price">
												$50.00
												<span class="prev-price">
													<del>$.55.00</del>
												</span>
											</div>
											<div class="slider-cart-btn">
												Add <i class="fas fa-cart-plus"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="card swiper-slide swiper-slide-duplicate" data-swiper-slide-index="3" role="group" aria-label="4 / 7" style="width: 179.8px; margin-right: 9px;">
									<div class="sliderCard">
										<div class="sliderHeader">
											<div class="slider-Head-left">
												<i class="fas fa-tag"></i> Sale
											</div>
											<div>
												<i class="fas fa-bookmark slider-Head-right"></i>
											</div>
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring12.jpeg" class="sliderImage">
										</div>
										<div class="slider-pro-name">Wedding Ringu</div>
										<div class="pro-short-desc">Diamond Ring for wedding</div>
										<div class="rating-container">
											<div class="product-rating">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
										</div>
										<div class="swiper-bottom">
											<div class="offer-price">
												$50.00
												<span class="prev-price">
													<del>$.55.00</del>
												</span>
											</div>
											<div class="slider-cart-btn">
												Add <i class="fas fa-cart-plus"></i>
											</div>
										</div>
									</div>
								</div><div class="card swiper-slide swiper-slide-duplicate" data-swiper-slide-index="4" role="group" aria-label="5 / 7" style="width: 179.8px; margin-right: 9px;">
									<div class="sliderCard">
										<div class="sliderHeader">
											<div class="slider-Head-left">
												<i class="fas fa-tag"></i> Sale
											</div>
											<div>
												<i class="fas fa-bookmark slider-Head-right"></i>
											</div>
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring16.jpeg" class="sliderImage">
										</div>
										<div class="slider-pro-name">Wedding Ringu</div>
										<div class="pro-short-desc">Diamond Ring for wedding</div>
										<div class="rating-container">
											<div class="product-rating">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
										</div>
										<div class="swiper-bottom">
											<div class="offer-price">
												$50.00
												<span class="prev-price">
													<del>$.55.00</del>
												</span>
											</div>
											<div class="slider-cart-btn">
												Add <i class="fas fa-cart-plus"></i>
											</div>
										</div>
									</div>
								</div><div class="card swiper-slide swiper-slide-duplicate" data-swiper-slide-index="5" role="group" aria-label="6 / 7" style="width: 179.8px; margin-right: 9px;">
									<div class="sliderCard">
										<div class="sliderHeader">
											<div class="slider-Head-left">
												<i class="fas fa-tag"></i> Sale
											</div>
											<div>
												<i class="fas fa-bookmark slider-Head-right"></i>
											</div>
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring10.jpeg" class="sliderImage">
										</div>
										<div class="slider-pro-name">Wedding Ringu</div>
										<div class="pro-short-desc">Diamond Ring for wedding</div>
										<div class="rating-container">
											<div class="product-rating">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
										</div>
										<div class="swiper-bottom">
											<div class="offer-price">
												$50.00
												<span class="prev-price">
													<del>$.55.00</del>
												</span>
											</div>
											<div class="slider-cart-btn">
												Add <i class="fas fa-cart-plus"></i>
											</div>
										</div>
									</div>
								</div><div class="card swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="6" role="group" aria-label="7 / 7" style="width: 179.8px; margin-right: 9px;">
									<div class="sliderCard">
										<div class="sliderHeader">
											<div class="slider-Head-left">
												<i class="fas fa-tag"></i> Sale
											</div>
											<div>
												<i class="fas fa-bookmark slider-Head-right"></i>
											</div>
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring9.jpeg" class="sliderImage">
										</div>
										<div class="slider-pro-name">Wedding Ringu</div>
										<div class="pro-short-desc">Diamond Ring for wedding</div>
										<div class="rating-container">
											<div class="product-rating">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
										</div>
										<div class="swiper-bottom">
											<div class="offer-price">
												$50.00
												<span class="prev-price">
													<del>$.55.00</del>
												</span>
											</div>
											<div class="slider-cart-btn">
												Add <i class="fas fa-cart-plus"></i>
											</div>
										</div>
									</div>
								</div>
								
								
								<div class="card swiper-slide actionBtn swiper-slide-active" data-src="page3" data-id="984589834282" data-swiper-slide-index="0" role="group" aria-label="1 / 7" style="width: 179.8px; margin-right: 9px;">
									<div class="sliderCard">
										<div class="sliderHeader">
											<div class="slider-Head-left">
												<i class="fas fa-tag"></i> Sale
											</div>
											<div>
												<i class="fas fa-bookmark slider-Head-right"></i>
											</div>
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring11.jpeg" class="sliderImage">
										</div>
										<div class="slider-pro-name">Wedding Ringu</div>
										<div class="pro-short-desc">Diamond Ring for wedding</div>
										<div class="rating-container">
											<div class="product-rating">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
										</div>
										<div class="swiper-bottom">
											<div class="offer-price">
												$50.00
												<span class="prev-price">
													<del>$.55.00</del>
												</span>
											</div>
											<div class="slider-cart-btn">
												Add <i class="fas fa-cart-plus"></i>
											</div>
										</div>
									</div>
								</div>
								
								<div class="card swiper-slide swiper-slide-next" data-swiper-slide-index="1" role="group" aria-label="2 / 7" style="width: 179.8px; margin-right: 9px;">
									<div class="sliderCard">
										<div class="sliderHeader">
											<div class="slider-Head-left">
												<i class="fas fa-tag"></i> Sale
											</div>
											<div>
												<i class="fas fa-bookmark slider-Head-right"></i>
											</div>
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring7.jpeg" class="sliderImage">
										</div>
										<div class="slider-pro-name">Wedding Ringu</div>
										<div class="pro-short-desc">Diamond Ring for wedding</div>
										<div class="rating-container">
											<div class="product-rating">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
										</div>
										<div class="swiper-bottom">
											<div class="offer-price">
												$50.00
												<span class="prev-price">
													<del>$.55.00</del>
												</span>
											</div>
											<div class="slider-cart-btn">
												Add <i class="fas fa-cart-plus"></i>
											</div>
										</div>
									</div>
								</div>
								
								<div class="card swiper-slide" data-swiper-slide-index="2" role="group" aria-label="3 / 7" style="width: 179.8px; margin-right: 9px;">
									<div class="sliderCard">
										<div class="sliderHeader">
											<div class="slider-Head-left">
												<i class="fas fa-tag"></i> Sale
											</div>
											<div>
												<i class="fas fa-bookmark slider-Head-right"></i>
											</div>
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring14.jpeg" class="sliderImage">
										</div>
										<div class="slider-pro-name">Wedding Ringu</div>
										<div class="pro-short-desc">Diamond Ring for wedding</div>
										<div class="rating-container">
											<div class="product-rating">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
										</div>
										<div class="swiper-bottom">
											<div class="offer-price">
												$50.00
												<span class="prev-price">
													<del>$.55.00</del>
												</span>
											</div>
											<div class="slider-cart-btn">
												Add <i class="fas fa-cart-plus"></i>
											</div>
										</div>
									</div>
								</div>
								
								<div class="card swiper-slide" data-swiper-slide-index="3" role="group" aria-label="4 / 7" style="width: 179.8px; margin-right: 9px;">
									<div class="sliderCard">
										<div class="sliderHeader">
											<div class="slider-Head-left">
												<i class="fas fa-tag"></i> Sale
											</div>
											<div>
												<i class="fas fa-bookmark slider-Head-right"></i>
											</div>
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring12.jpeg" class="sliderImage">
										</div>
										<div class="slider-pro-name">Wedding Ringu</div>
										<div class="pro-short-desc">Diamond Ring for wedding</div>
										<div class="rating-container">
											<div class="product-rating">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
										</div>
										<div class="swiper-bottom">
											<div class="offer-price">
												$50.00
												<span class="prev-price">
													<del>$.55.00</del>
												</span>
											</div>
											<div class="slider-cart-btn">
												Add <i class="fas fa-cart-plus"></i>
											</div>
										</div>
									</div>
								</div>
								
								<div class="card swiper-slide" data-swiper-slide-index="4" role="group" aria-label="5 / 7" style="width: 179.8px; margin-right: 9px;">
									<div class="sliderCard">
										<div class="sliderHeader">
											<div class="slider-Head-left">
												<i class="fas fa-tag"></i> Sale
											</div>
											<div>
												<i class="fas fa-bookmark slider-Head-right"></i>
											</div>
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring16.jpeg" class="sliderImage">
										</div>
										<div class="slider-pro-name">Wedding Ringu</div>
										<div class="pro-short-desc">Diamond Ring for wedding</div>
										<div class="rating-container">
											<div class="product-rating">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
										</div>
										<div class="swiper-bottom">
											<div class="offer-price">
												$50.00
												<span class="prev-price">
													<del>$.55.00</del>
												</span>
											</div>
											<div class="slider-cart-btn">
												Add <i class="fas fa-cart-plus"></i>
											</div>
										</div>
									</div>
								</div>
								
								<div class="card swiper-slide" data-swiper-slide-index="5" role="group" aria-label="6 / 7" style="width: 179.8px; margin-right: 9px;">
									<div class="sliderCard">
										<div class="sliderHeader">
											<div class="slider-Head-left">
												<i class="fas fa-tag"></i> Sale
											</div>
											<div>
												<i class="fas fa-bookmark slider-Head-right"></i>
											</div>
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring10.jpeg" class="sliderImage">
										</div>
										<div class="slider-pro-name">Wedding Ringu</div>
										<div class="pro-short-desc">Diamond Ring for wedding</div>
										<div class="rating-container">
											<div class="product-rating">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
										</div>
										<div class="swiper-bottom">
											<div class="offer-price">
												$50.00
												<span class="prev-price">
													<del>$.55.00</del>
												</span>
											</div>
											<div class="slider-cart-btn">
												Add <i class="fas fa-cart-plus"></i>
											</div>
										</div>
									</div>
								</div>
								
								<div class="card swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="6" role="group" aria-label="7 / 7" style="width: 179.8px; margin-right: 9px;">
									<div class="sliderCard">
										<div class="sliderHeader">
											<div class="slider-Head-left">
												<i class="fas fa-tag"></i> Sale
											</div>
											<div>
												<i class="fas fa-bookmark slider-Head-right"></i>
											</div>
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring9.jpeg" class="sliderImage">
										</div>
										<div class="slider-pro-name">Wedding Ringu</div>
										<div class="pro-short-desc">Diamond Ring for wedding</div>
										<div class="rating-container">
											<div class="product-rating">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
										</div>
										<div class="swiper-bottom">
											<div class="offer-price">
												$50.00
												<span class="prev-price">
													<del>$.55.00</del>
												</span>
											</div>
											<div class="slider-cart-btn">
												Add <i class="fas fa-cart-plus"></i>
											</div>
										</div>
									</div>
								</div>
							<div class="card swiper-slide actionBtn swiper-slide-duplicate swiper-slide-duplicate-active" data-src="page3" data-id="984589834282" data-swiper-slide-index="0" role="group" aria-label="1 / 7" style="width: 179.8px; margin-right: 9px;">
									<div class="sliderCard">
										<div class="sliderHeader">
											<div class="slider-Head-left">
												<i class="fas fa-tag"></i> Sale
											</div>
											<div>
												<i class="fas fa-bookmark slider-Head-right"></i>
											</div>
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring11.jpeg" class="sliderImage">
										</div>
										<div class="slider-pro-name">Wedding Ringu</div>
										<div class="pro-short-desc">Diamond Ring for wedding</div>
										<div class="rating-container">
											<div class="product-rating">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
										</div>
										<div class="swiper-bottom">
											<div class="offer-price">
												$50.00
												<span class="prev-price">
													<del>$.55.00</del>
												</span>
											</div>
											<div class="slider-cart-btn">
												Add <i class="fas fa-cart-plus"></i>
											</div>
										</div>
									</div>
								</div><div class="card swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next" data-swiper-slide-index="1" role="group" aria-label="2 / 7" style="width: 179.8px; margin-right: 9px;">
									<div class="sliderCard">
										<div class="sliderHeader">
											<div class="slider-Head-left">
												<i class="fas fa-tag"></i> Sale
											</div>
											<div>
												<i class="fas fa-bookmark slider-Head-right"></i>
											</div>
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring7.jpeg" class="sliderImage">
										</div>
										<div class="slider-pro-name">Wedding Ringu</div>
										<div class="pro-short-desc">Diamond Ring for wedding</div>
										<div class="rating-container">
											<div class="product-rating">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
										</div>
										<div class="swiper-bottom">
											<div class="offer-price">
												$50.00
												<span class="prev-price">
													<del>$.55.00</del>
												</span>
											</div>
											<div class="slider-cart-btn">
												Add <i class="fas fa-cart-plus"></i>
											</div>
										</div>
									</div>
								</div><div class="card swiper-slide swiper-slide-duplicate" data-swiper-slide-index="2" role="group" aria-label="3 / 7" style="width: 179.8px; margin-right: 9px;">
									<div class="sliderCard">
										<div class="sliderHeader">
											<div class="slider-Head-left">
												<i class="fas fa-tag"></i> Sale
											</div>
											<div>
												<i class="fas fa-bookmark slider-Head-right"></i>
											</div>
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring14.jpeg" class="sliderImage">
										</div>
										<div class="slider-pro-name">Wedding Ringu</div>
										<div class="pro-short-desc">Diamond Ring for wedding</div>
										<div class="rating-container">
											<div class="product-rating">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
										</div>
										<div class="swiper-bottom">
											<div class="offer-price">
												$50.00
												<span class="prev-price">
													<del>$.55.00</del>
												</span>
											</div>
											<div class="slider-cart-btn">
												Add <i class="fas fa-cart-plus"></i>
											</div>
										</div>
									</div>
								</div><div class="card swiper-slide swiper-slide-duplicate" data-swiper-slide-index="3" role="group" aria-label="4 / 7" style="width: 179.8px; margin-right: 9px;">
									<div class="sliderCard">
										<div class="sliderHeader">
											<div class="slider-Head-left">
												<i class="fas fa-tag"></i> Sale
											</div>
											<div>
												<i class="fas fa-bookmark slider-Head-right"></i>
											</div>
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring12.jpeg" class="sliderImage">
										</div>
										<div class="slider-pro-name">Wedding Ringu</div>
										<div class="pro-short-desc">Diamond Ring for wedding</div>
										<div class="rating-container">
											<div class="product-rating">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
										</div>
										<div class="swiper-bottom">
											<div class="offer-price">
												$50.00
												<span class="prev-price">
													<del>$.55.00</del>
												</span>
											</div>
											<div class="slider-cart-btn">
												Add <i class="fas fa-cart-plus"></i>
											</div>
										</div>
									</div>
								</div><div class="card swiper-slide swiper-slide-duplicate" data-swiper-slide-index="4" role="group" aria-label="5 / 7" style="width: 179.8px; margin-right: 9px;">
									<div class="sliderCard">
										<div class="sliderHeader">
											<div class="slider-Head-left">
												<i class="fas fa-tag"></i> Sale
											</div>
											<div>
												<i class="fas fa-bookmark slider-Head-right"></i>
											</div>
										</div>
										<div class="sliderImgContainer">
											<img src="public_folder/images/ring16.jpeg" class="sliderImage">
										</div>
										<div class="slider-pro-name">Wedding Ringu</div>
										<div class="pro-short-desc">Diamond Ring for wedding</div>
										<div class="rating-container">
											<div class="product-rating">
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star"></i>
												<i class="fas fa-star-half-alt"></i>
												<span>4.7(21)</span>
											</div>
										</div>
										<div class="swiper-bottom">
											<div class="offer-price">
												$50.00
												<span class="prev-price">
													<del>$.55.00</del>
												</span>
											</div>
											<div class="slider-cart-btn">
												Add <i class="fas fa-cart-plus"></i>
											</div>
										</div>
									</div>
								</div></div>
						<span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
						<div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal"><span class="swiper-pagination-bullet swiper-pagination-bullet-active" tabindex="0" role="button" aria-label="Go to slide 1" aria-current="true"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 2"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 3"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 4"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 5"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 6"></span><span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide 7"></span></div>
					</div>
			</div>
			
			<!-- Full Product Images -->
			<div class="fullImgContainer">
				<div class="fullImgChild">
					<img src="public_folder/images/ring2.jpeg" class="fullImg">
				</div>
				
				<div class="fullImgChild">
					<img src="public_folder/images/ring2.jpeg" class="fullImg">
				</div>
				
				<div class="fullImgChild">
					<img src="public_folder/images/ring2.jpeg" class="fullImg">
				</div>
				
				<div class="fullImgChild">
					<img src="public_folder/images/ring2.jpeg" class="fullImg">
				</div>
			</div>
			
	
		<!-- Review Section -->
	<div class="container">
    	<div class="ratingCard">
    		<div class="rating-header">
				<div>Customer Reviews</div>
				<button type="button" name="add_review" id="add_review" class="btn">+Add Review</button>
    		</div>
    		<div class="cards-body">
    			<div class="row">
    				<div class="col-sm-4 text-center">
    					<h1 class="text-warning mt-4 mb-1">
    						<b class="totalRatingNum"><span id="average_rating">0</span> / 5</b>
    					</h1>
    					<div class="mb-1" class="totalStarRating">
    						<i class="far fa-star star-light mr-1 main_star"></i>
                            <i class="far fa-star star-light mr-1 main_star"></i>
                            <i class="far fa-star star-light mr-1 main_star"></i>
                            <i class="far fa-star star-light mr-1 main_star"></i>
                            <i class="far fa-star star-light mr-1 main_star"></i>
	    				</div>
    					<h3 class="totalRevieve"><span id="total_review">0</span> Review</h3>
    				</div>
    				
					<div class="col-sm-8">
    					<div class="progressContainer">
                            <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>
							<div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
							<div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                        </div>
						
    					<div class="progressContainer">
                            <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>   
							<div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                        </div>
						
						<div class="progressContainer">
                            <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>   
							<div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                        </div>
						
						<div class="progressContainer">
                            <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>   
							<div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                        </div>
						
						<div class="progressContainer">
                            <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>   
							<div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                        </div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div id="review_content"></div>
		<div id="load_Comments_data_message">
			<button class="loadMoreCommets" data-review=1 data-start="0">
			<div class="loaderDiv"><i class="fas fa-plus plus"></i></div>
			</button>
		</div>
    </div>

	<div id="review_modal" class="modal" tabindex="-1" role="dialog">
		+<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Submit Review</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h4 class="text-center mt-2 mb-4">
						<i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
						<i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
						<i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
						<i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
						<i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
					</h4>
					<div class="form-group">
						<input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" />
					</div>
					<div class="form-group">
						<textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
					</div>
					<div class="form-group text-center mt-4">
						<button type="button" class="btn btn-primary" id="save_review">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	
	<!-- Return And Protection Section -->
	<div id="protection-container">
		<div class="protection-anim"><img src="web_folder/hand.png"></div>
		<div class="protection-header slogan">
			<h3>Shop confidently on Bellezza</h3>
			<p>knowing if something goes wrong with an order, we have got your back for all purchases</p>
		</div>
	</div>
	
	<div id="protection-sec-container">
		<div class="protection-header">
			<h5>Ballezza Order Protection</h5>
			<p>Easily get help in the rare case that something goes wrong when shopping from our shop</p>
			<h5>What is eligible</h5>
			<div>- Your item arrived damaged</div>
			<div>- Your item did not arrive or was lost in the mail</div>
			<div>- Your order does not match the item description or photos</div>
		</div>
	</div>
	
	<div class="refund-container">
		<p class="refund-heading">We are ready to help if something goes wrong. Here is how it works</p>
		<div id="protection-third-container">
			<div class="refund_process">
				
				<h3><span class="processNumber">1</span>Reach out to the customer operator</h3>
				<p>Send a request message and review the details to customer operator from the "Help with order" page if there is an issue. We will try our best to resolve the issue instantly</p>
			</div>
			<div class="refund_process">
				<h3><span class="processNumber">2</span>Confirmating the request</h3>
				<p>If your order is under the protection eligibility, you will receive an email confirmation</p>
			</div>
			<div class="refund_process">
				<h3><span class="processNumber">3</span>We will help you reach a resolution</h3>
				<p>Once your request is accepted you will be refunded for your purchase.</p>
			</div>
		</div>
	</div>	
				<!-- Footer -->
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
			<div class="orderBtn">
				<div class="btn cartButton">Add To Cart</div>
				<div class="orderButton">Order Now</div>
			</div>
			
		</div>
		
<script>
var swiper = new Swiper(".slide-container", {
  slidesPerView: 3,
  spaceBetween: 2,
  sliderPerGroup: 3,
  loop: true,
  centerSlide: "true",
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".swiper-pagination",
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




var swiper = new Swiper(".slide-container2", {
  slidesPerView: 3,
  spaceBetween: 2,
  sliderPerGroup: 3,
  loop: false,
  centerSlide: "true",
  fade: "true",
  grabCursor: "true",
  pagination: {
    el: ".swiper-pagination2",
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
?>