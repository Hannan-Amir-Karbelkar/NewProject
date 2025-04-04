

<div class="main_header container-fluid">
	<div style="margin-top:40px; padding:20px;position:relative;overflow-y:auto;">
		<div style="display:flex;position:sticky;top:0px;">
			<div class="close-company-popup">X</div>
			<div style="font-size:18px;font-weight:bold;">Your Listed Companies</div>
		</div>
		<div class="company-list-parent"></div>
	</div>
	<div class="row header" style="z-index: 101;"> 
	<!-- Main Header -->
			<div class="header col">
				<div class="header-logo">
				    <span class="brand-name">Belezza Admin Panel</span>
				</div>
				<div class="header_option_container" style="">
					<div class="header_option open_page1 actionBtn" data-src="page1">Dash Board</div>
					<div class="header_option about"><span class="abouts">About</span></div>
					<div class="header_option">Service</div>
					<div class="header_option">ContactUs</div>
					
					<div class="drop" style="text-align: right;">
						<div class="header_option">Policies</div>
						<div class="policies_dropdown">
								<a href=""><div class="policies setting"> Privacy Policy</div></a>
								<a href=""><div class="policies setting"> Payment</div></a>
								<a href=""><div class="policies setting"> Refund</div></a>
						</div>
					</div>
					
				</div>
				<div class="header-icons" style="display:flex;padding:7px;padding-right:0px;">
					<div class="drop user_profile" style="width:40px;text-align: right;">
						<i class="fas fa-user-circle"></i>
						<div class="prof_dropdown">
							<div class="pointer" style=""></div>
							<div style="padding:5px;">
							    <img src="public_folder/profileImages/645338db8d568images (2).jpeg" style="height:40px;width:40px;border-radius:50%;">
								<span style="font-size:15px;margin-left:10px;">Shabu Babu</span>
							</div>
							<div class="profile AccountSetting actionBtn" data-src="page6">
								<i class="fas fa-user-cog" style="font-size:20p;padding-right:10px;"></i>
								Account Setting
							</div>
							<a href="login/logout.php"><div class="profile log"><i class="fas fa-sign-out-alt" style="font-size:20px;padding-right:10px;"></i><span class="text1"> LogOut</span></div></a>
						</div>
					</div>
					
					<div class="fund_section user_profile" style="width:40px;text-align:right;color:grey;">
						<i class="fas fa-plus-circle"></i>
						<div class="fund_dropdown">
							<div class="listedComList" style="padding:5px;border-bottom:1px solid grey;">
								<i class="fas fa-money-check-alt" style="font-size:20px;padding-right:10px;"></i>
								<span class="text1"> Listed Companies</span>
							</div>
							<div class="profile log user-investment actionBtn" data-id="MjI3MDg2OTk3NTgwMA==" data-src="page4" call_type="businessPage">
							    <i class="fas fa-wallet" style="font-size:20px;padding-right:10px;"></i>
								<span class="text1"> Your Investments</span>
							</div>
							<div class="profile log btn_Listing actionBtn" data-src="page3">
							    <i class="fas fa-scroll" style="font-size:20px;padding-right:10px;"></i>
								<span class="text1"> List Your Business</span>v>
							</div>
							<div class="search" style="width:40px;text-align: right;"><i class="fas fa-search"></i></div>
						</div>
					</div>
				</div>
				<!-- Search-Bar Section-->
				<div class="row search_bar" style="display: none;">
					<div style="display:flex;">
						<div style="width: 90%;">
							<form method="POST" class="search-box" style="opacity: 1; pointer-events: auto;">
								<input style="display:block;position:relative;" type="text" name="search" id="search" autocomplete="off" placeholder="Type Something To Search...." required="">
							</form>
						</div>
						<div style="width: 10%;text-align:right">
							<i class="fas fa-times" style="color:grey;text-align: right;padding-right:35px;"></i>
						</div>
					</div>
			
					<div id="search-table" tabindex="1">
						<ul class="list-group" id="results" style="width: 100%; background: white; position: relative;"></ul>
					</div>
				</div>
			</div>
		</div>
		</div>