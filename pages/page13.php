<?php
SESSION_START();
require_once('../database/connection.php');
//DECODE SESSION ID
if(isset($_POST['limit'])){
$user_id = $_SESSION['UMLIDLGZS'];
$user_id = base64_decode(urldecode($user_id));
$user_id = (($user_id*240)/378720);
$encript_method = (($user_id*136806)/302);
$encript_method = 'UID-'.$encript_method;
$active_user_id = urldecode(base64_encode($encript_method));

$sqlNumComments = $con->query("SELECT id FROM `notification` where recipient_id='$active_user_id' AND action=0");
$numComments = $sqlNumComments->num_rows;
$html = "
	<div class='container-fluid' id='main_page12'>
		<div class='row' class='comment_heading' style='padding-bottom:10px;padding-top:10px;position:sticky;top:10px;background-color:#6e70ff;z-index:10001;border-bottom:1px solid #d8d8d8;'>
			<div class='col-12' style='padding-left:10px; color:gray; font-size:20px;'>
			    <div class='container-fluid'>
				    <div class='row'>
				        <div class='col-10'>
			                <div class='fas fa-bell' style='color:white'></div>
			                <span style='color:white; font-size:15px;margin-left:15px;margin-top:3px;position:absolute;'>
							    <b>"; if($numComments == 0){ $html = " Notification"; } $html = "</b>
							    <b>"; if($numComments == 1){ echo  $numComments $html = " New Notification"; } $html = "</b>
							    <b>"; if($numComments > 1){ echo  $numComments $html = " New Notifications"; } $html = "</b>
							</span>
			            </div>
				        <div class='col-2' style='text-align:right;padding-right:25px;'>
				            <div class='fas fa-home' style='color:white;margin-top:3px;position:absolute;text-align:right;'></div>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
		
		<ul class='notificationBar'>";
		
			$query="SELECT * FROM `notification` where `recipient_id`='$active_user_id' AND action=0 order by id DESC LIMIT 10";
			$result3 = mysqli_query($con, $query);
			while($rows=mysqli_fetch_assoc($result3)){
			$author=$rows['sender_id'];
			$users_id= $rows['recipient_id'];
			$date=$rows['addedOn'];
			$type = $rows['type'];
			$time_ago = strtotime($date);
			$current_time = time();
			$time_difference = $current_time - $time_ago;
			$seconds = $time_difference;
			$minutes = round($seconds /60 ); // value 60 is seconds	
			$hours = round($seconds /3600 ); // value 3600 is 60 minutes
			$days = round($seconds /86400 ); // value 86400 = 24 * 60* 60;
			$weeks = round($seconds /604800 ); // value 86400 = 24 * 60* 60;
			
			$datestr= substr($date,0, 10);
			$day= substr($date,8, 2);
			$months= substr($date,5, 2);
			$Year= substr($date,0, 4);
				if($months == '01'){
					$month = 'Jan';
				}else if($months == '02'){
					$month = 'Feb';
				}else if($months == '03'){
					$month = 'March';
				}else if($months == '04'){
					$month = 'Apr';
				}else if($months == '05'){
					$month = 'May';
				}else if($months == '06'){
					$month = 'Jun';
				}else if($months == '07'){
					$month = 'Jul';
				}else if($months == '08'){
					$month = 'Aug';
				}else if($months == '09'){
					$month = 'Sep';
				}else if($months == '10'){
					$month = 'Oct';
				}else if($months == '11'){
					$month = 'Nov';
				}else if($months == '12'){
					$month = 'Dec';
				}
			$today     = date('Y-m-d');
			$added_on  = $datestr;
			$yeaterday = 'Yesterday';
			$start     = strtotime(date('Y-m-d'));
			$start     = strtotime("-1 day",$start);
			$start     = date('Y-m-d',$start);
			$ThisYear  = date('Y');	
			
				if($ThisYear == $Year){
					$years = '';
				}else{
					$years = $Year;
				}	
				 if($seconds <= 60){
					$MyDateTime = "Just Now";
				}else if($minutes <= 60){
					if($minutes==1){
						$MyDateTime = "one min ago";
					}else{
						$MyDateTime = $minutes. " min ago";
					}
				}else if($hours <= 24){
					if($hours==1){
						$MyDateTime = "an hour ago";
					}else{
						$MyDateTime = $hours. " hours ago";
					}
				}else if($days <= 7){ 
					if($days==1){			
						$MyDateTime = $yeaterday;
					}else{
						$MyDateTime = $days. " days ago"; 
					}
				}else if($weeks <= 4.3){ 
					if($weeks==1){
						$MyDateTime = "a week ago";
					}else{
						$MyDateTime = $month ." ". $day ." ". $years;
					}
				}else{
					$MyDateTime = $month ." ". $day ." ". $years;
				}
			
			$result=  "SELECT * from profile WHERE user_id='$users_id'";
		    $results = mysqli_query($con,$result);
		    while($row = mysqli_fetch_assoc($results)){
		    $profile_names = $row['firstName'];
			$profile_pic = $row['pro_pic'];
			} 
			
			if($users_id == $user_id ){
		        $profile_name = 'You';
				$profiler     = 'Your';
		    }else{
			    $profile_name = $profile_names;
				$profiler     = 'his';
		    }

			if($type == 'liked' ){
		        $types = 'Liked your Post';
			}else if($type == 'commented' ){
		        $types = 'commented on your Post';
		    }else if($type == 'com_liked' ){
			    $types = 'liked on your Comment';
		     }else if($type == 'reply' ){
			    $types = 'Replied on your Comment';
			}else if($type == 'rep_liked' ){
				$types = 'Liked your Reply';
			}else if($type == 'taged' ){
				$types = 'Invite you in '.$profiler.' Post';
			}else{
				$types = 'Taged you in your Reply';
			}
			$html = "<li>";
			if ($type == 'liked'){
			    $html = "<i class="like fas fa-heart"></i>"
			}else if ($type == 'com_liked'){
			    $html = "<i class="like fas fa-heart"></i>"
			}else if ($type == 'commented'){
				$html = "<i class="like fas fa-comment-alt"></i>"
			}else if ($type == 'reply'){
			    $html = "<i class="like fas fa-comment-alt"></i>"
			}else if ($type == 'rep_liked'){
			    $html = "<i class="like fas fa-heart"></i>"
			}else if ($type == 'taged'){
			    $html = "<i class="like fas fa-user-tag" style='color:#a19e99;'></i>"
			}else if ($type == 'ReplyOnReply'){
			    $html = "<i class="like fas fa-hashtag"></i>"
			}
			$html = "
				<div class='main_div'>
				    <img class='img' src='public_folder/profileImages/".$profile_pic."'>
				    <div class='notification_cont'><b>">$profile_name." </b><".$types."
					<div style='font-size:12.5px;color:gray;margin-top:25px;'>
					<time style='margin-top:-20px;position:absolute;' class='timeago' datetime='">$createdOn."' ".$MyDateTime."</time>
					</div>
			    </div>
			</li>
			<?php } ?>
		</ul>
<!-- Addvertisement Section -->";
    if($numComments > 0){
		$html = '<div style="paddin:10px;background:white;margin-top:30px;box-shadow: 0 4px 12px 0 rgb(0 0 0 / 40%);widt: 95%;margin-lef: 2.5%;">
			<div style="display:flex;padding:10px 10px 0px;">
				<img src="public_folder/profileImages/990311046_anim_pic3.png" style="width:35px;height: 35px;border-radiu:50%;border:1px solid;">
				<div style="margin-left:5px;width:80%;">
					<span style="font-size: 15px;color:black;font-weight:bold;">CampaignName</span>
					<p style="font-weight:300;font-size:12px;margin-top:-3px;margin-left: 5px;color: grey;">Sponsored . <span class="fas fa-globe"></span></p>
				</div>
				<div style="color: grey;font-weight:bold;font-size:20px;width:10%;text-align:right;margin-top:-10px;">...</div>
			</div>
			
			<div style="color:grey;font-size:14px;margin-bottom:2px;padding:0px 10px 10px;">
				Join Us Today, and experience the best Strategy of Business. We are going to give you best opportunity to becoming an Entrepreneur.
			</div>
			<div><img src="../advertisment-imges/gift3.jpeg" style="width:100%;height: 250px;">	</div>
			<hr style="margin-bottom: 0.5rem;">
			<div style="display:flex;padding:0px 10px 0px;">
				<div style="font-size:13px;color:grey;width: 50%;">Form On I-Flare
					<p style="margin-top: 1px;color: black;font-weight: bold;">Get more exiting gifts</p>
				</div>
				<div style="width: 50%;text-align: right;">
					<a href="#" style="display:none;font-size: 13px;margin-top: 10px;position: absolute;margin-left:-140px;">www.methodlearning.in</a>
					<a href="#"><button style="padding:4px;border:1px solid grey;border-radius:10px;font-size: 13px;width: 80px;background: white;margin-top: 10px;">Book Now</button></a>
				</div>
			</div>
		</div>';
		}
		$html = '<br>

		<div style="background-color:#6e70ff;padding-left:15px;color:white;">
		    <p style="font-size:1.1rem;"><b>Previus Notificatons...</b></p>
		</div>
		<ul class="notificationBar">';
			$query="SELECT * FROM `notification` where `recipient_id`='$active_user_id' AND action=1 order by id DESC LIMIT 4";
			$result3 = mysqli_query($con, $query);
			while($rows=mysqli_fetch_assoc($result3)){
			$author=$rows['sender_id'];
			$users_id= $rows['recipient_id'];
			//$createdOn=$rows['addedOn'];
			$date=$rows['addedOn'];
			$type = $rows['type'];
            
			$time_ago = strtotime($date);
			$current_time = time();
			$seconds = $current_time - $time_ago;
			$minutes = round($seconds /60 ); // value 60 is seconds	
			$hours = round($seconds /3600 ); // value 3600 is 60 minutes
			$days = round($seconds /86400 ); // value 86400 = 24 * 60* 60;
			$weeks = round($seconds /604800 ); // value 86400 = 24 * 60* 60;
			
			$datestr= substr($date,0, 10);
			$day= substr($date,8, 2);
			$months= substr($date,5, 2);
			$Year= substr($date,0, 4);
				if($months == '01'){
					$month = 'Jan';
				}else if($months == '02'){
					$month = 'Feb';
				}else if($months == '03'){
					$month = 'March';
				}else if($months == '04'){
					$month = 'Apr';
				}else if($months == '05'){
					$month = 'May';
				}else if($months == '06'){
					$month = 'Jun';
				}else if($months == '07'){
					$month = 'Jul';
				}else if($months == '08'){
					$month = 'Aug';
				}else if($months == '09'){
					$month = 'Sep';
				}else if($months == '10'){
					$month = 'Oct';
				}else if($months == '11'){
					$month = 'Nov';
				}else if($months == '12'){
					$month = 'Dec';
				}
			$today     = date('Y-m-d');
			$added_on  = $datestr;
			$yeaterday = 'Yesterday';	
			$start     = strtotime(date('Y-m-d'));
			$start     = strtotime("-1 day",$start);
			$start     = date('Y-m-d',$start);
			$ThisYear  = date('Y');		
			
				if($ThisYear == $Year){
					$years = '';
				}else{
					$years = $Year;
				}	
				 if($seconds <= 60){
					$MyDateTime = "Just Now";
				}else if($minutes <= 60){
					if($minutes==1){
						$MyDateTime = "one min ago";
					}else{
						$MyDateTime = $minutes. " min ago";
					}
				}else if($hours <= 24){
					if($hours==1){
						$MyDateTime = "an hour ago";
					}else{
						$MyDateTime = $hours. " hours ago";
					}
				}else if($days <= 7){ 
					if($days==1){
						$MyDateTime = $yeaterday;
					}else{
						$MyDateTime = $days. " days ago"; 
					}
				}else if($weeks <= 4.3){ 
					if($weeks==1){
						$MyDateTime = "a week ago";
					}else{
						$MyDateTime = $month ." ". $day ." ". $years;
					}
				}else{
					$MyDateTime = $month ." ". $day ." ". $years;
				}

			$result=  "SELECT * from profile WHERE user_id='$users_id'";
		    $results = mysqli_query($con,$result);
		    while($row = mysqli_fetch_assoc($results)){
		    $profile_names = $row['firstName'];
			$profile_pic = $row['pro_pic'];
			//$access_id= $row['timeline_access_id'];
			} 
			if($users_id == $user_id ){
		        $profile_name = 'You';
		        $profiler     = 'Your';
		    }else{
			    $profile_name = $profile_names;
			    $profiler = 'his';
		    }
			
			if($type == 'liked' ){
		        $types = 'Liked your Post';
			}else if($type == 'commented' ){
		        $types = 'commented on your Post';
		    }else if($type == 'com_liked' ){
			    $types = 'liked on your Comment';
		     }else if($type == 'reply' ){
			    $types = 'Replied on your Comment';
			}else if($type == 'rep_liked' ){
				$types = 'Liked your Reply';
			}else if($type == 'taged' ){
				$types = 'Invite you in '.$profiler.' Post';
			}else{
				$types = 'Taged you in your Reply';
			}

		$html = "<li>";
			if ($type == 'liked'){
			    $html = "<i class="like fas fa-heart"></i>";
			}else if ($type == 'com_liked'){
			    $html = "<i class="like fas fa-heart"></i>";
			}else if ($type == 'commented'){
				$html = "<i class="like fas fa-comment-alt"></i>";
			}else if ($type == 'reply'){
			    $html = "<i class="like fas fa-comment-alt"></i>";
			}else if ($type == 'rep_liked'){
			    $html = "<i class="like fas fa-heart"></i>";
			}else if ($type == 'taged'){
			    $html = "<i class="like fas fa-user-tag" style="color:#a19e99;"></i>";
			}else if ($type == 'ReplyOnRep'){
			    $html = "<i class="like fas fa-hashtag" style="color:orange;"></i>";
			}
			$html = '
				<div class="main_div">
				    <img class="img" src="public_folder/profileImages/'.$profile_pic.'">
				    <div class="notification_cont"><b>'.$profile_name.' </b>'.$types.'
				    <div style="font-size:12.5px;color:gray;margin-top:25px;">
					<time style="position:absolute;margin-top:-20px;" class="timeago" datetime="">'.$MyDateTime .'</time>
					</div>
			    </div>
			</li>';
			}
		$html = '</ul>
		
		<!-- Addvertisement Section -->
		<div class="container-fluid">
			<div class="row">
				<div class="col" style="margin-top:20px;background-color:#f6f6f7;height:100px;color:#aba6a6;padding-left:0px;">
				<img src="public_folder/profileImages/387053797_nature.jpg" style="height:100px;"> 
				To kaise he aap log<br>
				 </div>
			</div>
        </div>
		
		<!-- Lazy Loader -->
		<ul class="notificationBar_load">
		    <li id="load_data"></li>
		</ul>
	</div>
	<br>
	<br>
	<div class="container-fluid">
	    <div class="row">
	        <div class="col" style='margin-top:20px;'>
	            <div id="load_data_message">
	            </div>
	        </div>
	    </div>
	</div>
	</div>
</div>';
$data[] = [
	'html' => $html,
						];
$json = json_encode($data);
		echo $json;
}
?>

</body>
</html>
