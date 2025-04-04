<?php
require_once('../database/connection.php');
SESSION_START();
	$user_id = $_SESSION['UMLIDLGZS'];
	$user_id = base64_decode(urldecode($user_id));
	$user_id = (($user_id*240)/378720);
	$encript_method = (($user_id*136806)/302);
	$encript_method = 'UID-'.$encript_method;
	$user_id = urldecode(base64_encode($encript_method));
$html='';
if(isset($_POST["limit"], $_POST["start"])){
	$start = $con->real_escape_string($_POST["start"]);
	$limit = $con->real_escape_string($_POST["limit"]);
	$query="SELECT * FROM `notification` where recipient_id='$user_id' AND action=1 order by id DESC LIMIT $start, $limit";
	$result3 = mysqli_query($con, $query);
		if (mysqli_num_rows($result3) > 0 ){
			while($rows=mysqli_fetch_assoc($result3)){
			$author=$rows['sender_id'];
			$users_id= $rows['recipient_id'];
			$createdOn=$rows['addedOn'];
			$date=$rows['addedOn'];
			$type = $rows['type'];
			$post_id = $rows['post_id'];
			$comment_id = $rows['comment_id'];
			$rep_id = $rows['reply_id'];
            
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
			//$access_id= $row['timeline_access_id'];
			if($users_id == $user_id ){
		        $profile_name = 'You';
		        $profiler     = 'Your';
		    }else{
			    $profile_name = $profile_names;
			    $profiler     = 'his';
		    }
            
			$html=' <li> ';
			 if ($type == 'com_liked' || $type == 'liked' || $type == 'rep_liked'){
			    $html.=' <i class="like fas fa-heart"></i> ';
			/*}else if($type == 'liked' ){
		        $html.=' <i class="like fas fa-heart"></i> ';*/
			}else if ($type == 'commented'){
			    $html.='<i class="like fas fa-comment-alt"></i> ';            
			}else if ($type == 'reply'){
			    $html.='<i class="like fas fa-comment-alt"></i> ';            
			/*}else if ($type == 'rep_liked'){
			    $html.='<i class="like fas fa-heart"></i> ';*/
			}else if ($type == 'taged'){
			    $html.='<i class="like fas fa-tags"></i> ';   
			}else{
			    $html.='<i style="color:orange;" class="like fas fa-hashtag"></i>';
			}
			
			if($type == 'liked' ){
		        $types = 'Liked your Post';
			}else if($type == 'commented' ){
		        $types = 'commented on your Post';
		    }else if($type == 'com_liked' ){
			    $types = 'liked your Comment';
		    }else if($type == 'reply' ){
			    $types = 'Replied on your Comment';
			}else if($type == 'rep_liked' ){
				$types = 'Liked your Reply';
			}else if($type == 'taged' ){
				$types = 'Invite you in '.$profiler.' Post';
			}else{
				$types = 'Taged you in your Reply';
			}
			if($type == "reply" || $type == "ReplyOnReply"){
				$Quer=  "SELECT * from post_comment_replies WHERE reply_id='$rep_id'";
				$rest = mysqli_query($con,$Quer);
				while($rows = mysqli_fetch_assoc($rest)){
					$rep_id = $rows['id'];
				}
			}
			$html.='<div class="main_div OpenCom" style="cursor:pointer;" onclick="openComments();" data-repid ="'.$rep_id.'" data-id="'.$post_id.'" data-comment-id="'.$comment_id.'" data-type="'.$type.'">
				    <img class="img" src="public_folder/profileImages/'.$profile_pic.'">
				    <div class="notification_cont"><b>'.$profile_name.' </b>'.$types.'</b>';
			$html.=' <div style="font-size:12.5px;color:gray;margin-top:25px;">
					<time style="margin-top:-20px;position:absolute;" class="timeago" datetime="'.$createdOn.'">'.$MyDateTime.'</time>
					</div>
			    </div>
			</li>';
			$html.='<script src="jQuery.min.js"></script>
					<script src="js/jquery.timeago.js"></script>
					<script>
					$(document).ready(function(){
					$("time.timeago").timeago();
						});
					</script>';
			}
			echo $html;
		}
		
	}else{
		$html = 0;
		echo $html;
	}
}

if(isset($_POST['update'])){
	$con->query("UPDATE `notification` SET `action`='1' WHERE `action`='0' && recipient_id='$user_id'");
	//$con->query("UPDATE `blog_comments` SET `action`='1' WHERE `action`='0' && post_author_id='$user_id'");
	//$con->query("UPDATE `likes` SET `action`='1' WHERE `action`='0' && author_id='$user_id'");
	//$con->query("UPDATE `blog_likes` SET `action`='1' WHERE `action`='0' && author_id='$user_id'");
	echo 1;
}
?>

