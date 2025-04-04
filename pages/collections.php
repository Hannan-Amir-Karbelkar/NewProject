<?php
require_once('../database/connection.php');
session_start(); 

$html ='<div class="col-xl-8 col-lg-8" id="mainBodyContainer">
			<div class="pageIndicatorContainer">
				<div class="IndicatorLeftSide">
					<span class="fas fa-chevron-left leftIndicator"></span>Rings
				</div>
				<div class="IndicatorRightSide filter">
					Sort<span class="leftIcons fas fa-exchange-alt"></span>
					<div class="sort-dropdown">
						<div class="sortfeatures">Featured</div>
						<div class="sortfeatures">Alphabetically A-Z</div>
						<div class="sortfeatures">Alphabetically Z-A</div>
						<div class="sortfeatures">Price, low to high</div>
						<div class="sortfeatures">Price, high to low</div>
						<div class="sortfeatures">Date, old to new</div>
						<div class="sortfeatures">Date, new to old</div>
					</div>
				</div>
			</div>
			<div class="collection-main-container">
				<div class="sidebar">
					<div class="sidebar-content">Best Selling Products</div>
					<div class="sidebar-content">Earings</div>
					<div class="sidebar-content">Rings</div>
					<div class="sidebar-content">Neclaces</div>
					<div class="sidebar-content">Anklets</div>
					<div class="sidebar-content">Vermeli</div>
					<div class="sidebar-content">Italian Chains</div>
					<div class="sidebar-content">Pearl Jewelry</div>
				</div>
				<div class="collectionSecondCol">
					<div class="collection-categories">
						<div class="categories-btn categories-active">All Rings</div>
						<div class="categories-btn">Hoobs</div>
						<div class="categories-btn">Huggies</div>
						<div class="categories-btn">Studs</div>
						<div class="categories-btn">Cuffs</div>
						<div class="categories-btn">Crawlers</div>
						<div class="categories-btn">Dangel</div>
					</div>
			
					<div class="collectionCardContainer">
					    <div class="collection-cards">
							<div class="c-1 r-2 c-md-3">
								<div class="collectionBox">
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
									<div class="collectionBottom">
										<div class="ColproductTitle">
											Wedding Ring
										</div>
										<div class="midTitle">Diamond Ring for wedding</div>
										<div class="col-product-rating">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star-half-alt"></i>
											<span>4.7(21)</span>
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
							</div>
							
							<div class="c-1 r-2 c-md-3">
								<div class="collectionBox">
									<div class="sliderHeader">
										<div class="slider-Head-left">
											<i class="fas fa-tag"></i> Sale
										</div>
										<div>
											<i class="fas fa-bookmark slider-Head-right"></i>
										</div>
									</div>
									<div class="sliderImgContainer">
										<img src="public_folder/images/ring15.jpeg" class="sliderImage">
									</div>
									<div class="collectionBottom">
										<div class="ColproductTitle">
											Wedding Ring
										</div>
										<div class="midTitle">Diamond Ring for wedding</div>
										<div class="col-product-rating">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star-half-alt"></i>
											<span>4.7(21)</span>
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
							</div>
							
							<div class="c-1 r-2 c-md-3">
								<div class="collectionBox">
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
									<div class="collectionBottom">
										<div class="ColproductTitle">
											Wedding Ring
										</div>
										<div class="midTitle">Diamond Ring for wedding</div>
										<div class="col-product-rating">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star-half-alt"></i>
											<span>4.7(21)</span>
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
							</div>
							
							<div class="c-1 r-2 c-md-3">
								<div class="collectionBox">
									<div class="sliderHeader">
										<div class="slider-Head-left">
											<i class="fas fa-tag"></i> Sale
										</div>
										<div>
											<i class="fas fa-bookmark slider-Head-right"></i>
										</div>
									</div>
									<div class="sliderImgContainer">
										<img src="public_folder/images/ring17.jpeg" class="sliderImage">
									</div>
									<div class="collectionBottom">
										<div class="ColproductTitle">
											Wedding Ring
										</div>
										<div class="midTitle">Diamond Ring for wedding</div>
										<div class="col-product-rating">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star-half-alt"></i>
											<span>4.7(21)</span>
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
							</div>
							
							<div class="c-1 r-2 c-md-3">
								<div class="collectionBox">
									<div class="sliderHeader">
										<div class="slider-Head-left">
											<i class="fas fa-tag"></i> Sale
										</div>
										<div>
											<i class="fas fa-bookmark slider-Head-right"></i>
										</div>
									</div>
									<div class="sliderImgContainer">
										<img src="public_folder/images/ring18.jpeg" class="sliderImage">
									</div>
									<div class="collectionBottom">
										<div class="ColproductTitle">
											Wedding Ring
										</div>
										<div class="midTitle">Diamond Ring for wedding</div>
										<div class="col-product-rating">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star-half-alt"></i>
											<span>4.7(21)</span>
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
							</div>
							
							<div class="c-1 r-2 c-md-3">
								<div class="collectionBox">
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
									<div class="collectionBottom">
										<div class="ColproductTitle">
											Wedding Ring
										</div>
										<div class="midTitle">Diamond Ring for wedding</div>
										<div class="col-product-rating">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star-half-alt"></i>
											<span>4.7(21)</span>
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
							</div>
							
							<div class="c-1 r-2 c-md-3">
								<div class="collectionBox">
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
									<div class="collectionBottom">
										<div class="ColproductTitle">
											Wedding Ring
										</div>
										<div class="midTitle">Diamond Ring for wedding</div>
										<div class="col-product-rating">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star-half-alt"></i>
											<span>4.7(21)</span>
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
							</div>
							
							<div class="c-1 r-2 c-md-3">
								<div class="collectionBox">
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
									<div class="collectionBottom">
										<div class="ColproductTitle">
											Wedding Ring
										</div>
										<div class="midTitle">Diamond Ring for wedding</div>
										<div class="col-product-rating">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star-half-alt"></i>
											<span>4.7(21)</span>
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
							</div>
						</div>
					</div>
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
							<div class="footerSocialLinks">
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
			</div>
		</div>';
echo $html;
?>