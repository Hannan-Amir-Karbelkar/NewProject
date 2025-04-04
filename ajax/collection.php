<?php
require_once('../database/connection.php');
session_start(); 

if(isset($_POST['type']) && $_POST['type'] == 'CAT'){
	$start = $_POST['start'];
	$limit = $_POST['limit'];
	$categoryId = $_POST['proId'];
	$name  = $_POST['name'];
	$type  = $_POST['type'];

$html='';
if($start ==  0){
	$html.='<input type="hidden" value="0" class="LoadNum'.$categoryId.'"></input>';
}
$query = "SELECT * FROM products  WHERE sub_category='$categoryId' LIMIT $start, $limit";
			$result = mysqli_query($con, $query);
			if(mysqli_num_rows($result) > 0 ){
				while($row = mysqli_fetch_array($result)){
					$productName=$row['productName'];				
					$profileImage=$row['profileImage'];				
					$proAlt=$row['proAlt'];				  
					$short_desc=$row['short_desc'];				
					$oldPrice=$row['oldPrice'];				
					$newPrice=$row['newPrice'];	
					$html.='<div class="c-1 r-2 c-md-3">
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
										<img src="/bellezza/public_folder/images/'.$profileImage.'" alt="'.$proAlt.'" class="sliderImage">
									</div>
									<div class="collectionBottom">
										<div class="ColproductTitle">
											'.$productName.'
										</div>
										<div class="midTitle">'.$short_desc.'</div>
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
												$'.$newPrice.'.00
												<span class="prev-price">
													<del>$'.$oldPrice.'.00</del>
												</span>
											</div>
											<div class="slider-cart-btn">
												Add <i class="fas fa-cart-plus"></i>
											</div>
										</div>
									</div>
								</div>
							</div>';
					}
					echo $html;
					}else{
						echo 'empty';
						die();
					}
					
}

if(isset($_POST['type']) && $_POST['type'] == 'CANGECAT'){
	$catType = '';
	$mainid = '';
	$start = $_POST['start'];
	$limit = $_POST['limit'];
	$categoryId = $_POST['proId'];
	$name  = $_POST['name'];
	$type  = $_POST['type'];
	$lazy  = $_POST['lazy'];
	$catType  = $_POST['catType'];
	$mainid  = $_POST['mainid'];
	
if($start !== ''){
	$html='';
	if($lazy ==''){
		/*if($catType == 'subCat'){
			$query = "SELECT * FROM subcategory WHERE cat_id='$mainid'";
		}else{*/
			//$query = "SELECT * FROM subcategory WHERE cat_id='$categoryId'";
	//	}
	
		if($mainid == ''){
			$active2 = 'categories-active';
			
		}else{
			$active2 = 'baba';
		}
		if($catType == 'subCat'){
			$active = '';
			
			$query = "SELECT * FROM subcategory WHERE cat_id='$mainid'";
		}else{
			$active = 'active-container';
			
			$query = "SELECT * FROM subcategory WHERE cat_id='$categoryId'";
		}
	
		$res = mysqli_query($con, $query);
		$html.='<input type="hidde" value="0" class="categryLoadNum'.$categoryId.'"></input>
			<div class="collection-categories">
				<div class="sidebar-content  '.$active2.'" data-id="'.$categoryId.'">All '.$name.'</div>';
				
				if(mysqli_num_rows($res) > 0 ){
					while($rowss = mysqli_fetch_array($res)){
						$html.='
							<div class="categories-btn tabs'.$categoryId.'" data-id="'.$rowss['id'].'" data-tabs-id="'.$categoryId.'">'.$rowss['sub_category'].'</div>';
						}
					}
					$html.='</div>';
					$html.='
						 
						<div class="collectionCardContainer">
							
							
							
							
							
							<div class="collection-cards '.$active.' category'.$categoryId.' ALLCAT'.$categoryId.'">
								<input type="hidden" value="0" id="LoadCatNum'.$categoryId.'"></input>';
	}
							/*	if($catType == 'subCat'){
									$query = "SELECT * FROM products  WHERE sub_category='$categoryId' LIMIT $start, $limit";
								}else{*/
									//$query = "SELECT * FROM products  WHERE category='$categoryId' LIMIT $start, $limit";
								//}
								
								if($catType == 'subCat'){
									$query = "SELECT * FROM products  WHERE category='$mainid' LIMIT $start, $limit";
								}else{
									$query = "SELECT * FROM products  WHERE category='$categoryId' LIMIT $start, $limit";
								}
								
								$result = mysqli_query($con, $query);
								if(mysqli_num_rows($result) > 0){
									while($row = mysqli_fetch_array($result)){
										$productName=$row['productName'];				
										$profileImage=$row['profileImage'];
										$proAlt=$row['proAlt'];				
										$short_desc=$row['short_desc'];
										$oldPrice=$row['oldPrice'];
										$newPrice=$row['newPrice'];
										$productId=$row['product_id'];
										$html.='<div class="c-1 r-2 c-md-3 actionBtn" data-id="'.$productId.'" data-src="product"">
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
															<img src="/bellezza/public_folder/images/'.$profileImage.'" alt="'.$proAlt.'" class="sliderImage">
														</div>
														<div class="collectionBottom">
															<div class="ColproductTitle">
																'.$productName.'
															</div>
															<div class="midTitle">'.$short_desc.'</div>
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
																	$'.$newPrice.'.00
																	<span class="prev-price">
																		<del>$'.$oldPrice.'.00</del>
																	</span>
																</div>
																<div class="slider-cart-btn">
																	Add <i class="fas fa-cart-plus"></i>
																</div>
															</div>
														</div>
													</div>
												</div>';
									}	
								}else{
									echo 'empty';
									die();
								}
								if($lazy ==''){
									
											$html.='
											</div>	';	
											
											
											
											
											
											
											
											

											
if($catType == 'subCat'){											
if($start ==  0){
	$html.='<div class="collection-cards active-container '.$categoryId.'">
	<input type="hidden" value="0" class="LoadNum'.$categoryId.'"></input>';
}
$query = "SELECT * FROM products  WHERE sub_category='$categoryId' LIMIT $start, $limit";
//$query = "SELECT * FROM products  WHERE category='$categoryId' LIMIT $start, $limit";
			$result = mysqli_query($con, $query);
			if(mysqli_num_rows($result) > 0 ){
				while($row = mysqli_fetch_array($result)){
					$productName=$row['productName'];				
					$profileImage=$row['profileImage'];				
					$proAlt=$row['proAlt'];				  
					$short_desc=$row['short_desc'];				
					$oldPrice=$row['oldPrice'];				
					$newPrice=$row['newPrice'];	
					$html.='<div class="c-1 r-2 c-md-3">
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
										<img src="/bellezza/public_folder/images/'.$profileImage.'" alt="'.$proAlt.'" class="sliderImage">
									</div>
									<div class="collectionBottom">
										<div class="ColproductTitle">
											'.$productName.'
										</div>
										<div class="midTitle">'.$short_desc.'</div>
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
												$'.$newPrice.'.00
												<span class="prev-price">
													<del>$'.$oldPrice.'.00</del>
												</span>
											</div>
											<div class="slider-cart-btn">
												Add <i class="fas fa-cart-plus"></i>
											</div>
										</div>
									</div>
								</div>
							</div>';
					}
					//echo $html;
					}else{
						echo 'empty';
						die();
					}
					$html.='
											</div>	';

}					
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
											
										
								$html.='		</div>	';
								}
								echo $html;
}else{
	echo 'empty';
	die();

}
}
?>	