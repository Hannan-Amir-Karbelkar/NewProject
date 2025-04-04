<?php
SESSION_START();
require_once('../database/connection.php');
if(isset($_POST['limit'])){
$user_id = $_SESSION['UMLIDLGZS'];
$user_id = base64_decode(urldecode($user_id));
$user_id = (($user_id*240)/378720);
$encript_method = (($user_id*136806)/302);
$encript_method = 'UID-'.$encript_method;
$active_user_id = urldecode(base64_encode($encript_method));
$LIMIT = $_POST['limit'];
$starts = $_POST['start'];
$sqlNumComments = $con->query("SELECT id FROM `notification` where recipient_id='$active_user_id' AND action=0");
$numComments = $sqlNumComments->num_rows;
$data = [];
$html = '';
if($starts == 0){
	$html.="<div class='row' id='main_page12'>
				<div class='col-12 comment_heading'>
					<div class='container-fluid'>
						<div class='row'>
							<div class='col-10'>
								<div class='fas fa-bell'></div>
								<span class='NotifiNumbers'>
									<b>"; if($numComments == 0){ $html.=" Notification"; } $html.="</b>
									<b>"; if($numComments == 1){  $html.="".$numComments."  New Notification"; } $html.= "</b>
									<b>"; if($numComments > 1){  $html.=" ".$numComments." New Notifications"; } $html.= "</b>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>";
}
$NotificationId='';
$query="SELECT * FROM `notification` WHERE (`recipient_id`='$active_user_id' AND action=0)
		OR (`recipient_id`='$active_user_id' AND action=1 AND (SELECT COUNT(*) FROM `notification` AS n2 WHERE n2.recipient_id='$active_user_id' AND n2.action=0 
		) < $starts + $LIMIT)
		ORDER BY action, id DESC LIMIT $starts, $LIMIT;";
			$result2 = mysqli_query($con, $query);
			$numrows = $result2->num_rows;
			while($rows=mysqli_fetch_assoc($result2)){
			$NotificationId=$rows['id'];
			$post_id=$rows['post_id'];
			$Post_Id  = substr($post_id , 5);
			$encript_method = (($Post_Id*1252)/313);
			$Post_Id = urldecode(base64_encode($encript_method));
			$Post_Id = str_replace('=', '', $Post_Id);
			$comment_id = $rows['comment_id'];
			$reply_id = $rows['reply_id'];
			$author=$rows['sender_id'];
			$users_id= $rows['recipient_id'];
			$date=$rows['addedOn'];
			$type = $rows['type'];
			$action = $rows['action'];
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
			
			if($users_id == $active_user_id	 ){
		        $profile_name = 'You';
				$profiler     = 'Your';
		    }else{
				$profile_name = $profile_names;
				$profiler     = 'his';
			}
			$dataSource ='';
			if($type == 'liked'){
				$className ='actionBtn companyInformation';
			}else if($type == 'commented'){
				$className ='get_comment_id';
			}else if($type == 'com_liked'){
				$className ='get_comment_id';
				$dataSource = 'page2';
			}else if($type == 'reply'){
				$className ='get_comment_id';
			}else if($type == 'rep_liked'){
				$className ='get_comment_id';
				$dataSource = 'page2';
			}else if($type == 'taged'){
				$className ='get_comment_id';
			}else if($type == 'ReplyOnRep'){
				$className ='get_comment_id';
			}else if($type == 'Token'){
				$className ='get_comment_id';
			}
		$html.= "<li class='".$className." OpenCom' data-id='".$Post_Id."' data-src='".$dataSource."' data-type='".$type."' data-comment-id='".$comment_id."' data-repid='".$reply_id."'>";
			if($type == 'liked'){
				$html.="<i class='like fas fa-heart'></i>";
				$types = 'Liked your Post';
			}else if($type == 'commented'){
				$html.="<i class='like fas fa-comment-alt'></i>";
				$types = 'commented on your Post';
			}else if($type == 'com_liked'){
				$html.="<i class='like fas fa-heart'></i>";
				$types = 'liked your Comment';
			}else if($type == 'reply'){
				$html.="<i class='like fas fa-comment-alt'></i>";
				$types = 'Replied on your Comment';
			}else if($type == 'rep_liked'){
				$html.="<i class='like fas fa-heart'></i>";
				$types = 'Liked your Reply';
			}else if($type == 'taged'){
				$html.="<i class='like fas fa-hashtag'></i>";
				$types = 'Invite you in '.$profiler.' Post';
			}else if($type == 'ReplyOnRep'){
				$html.='<i style="color:orange;" class="like fas fa-hashtag"></i>';
				$types = 'Taged you in your Reply';
			}else if($type == 'Token'){
				$html.='<i style="color:orange;" class="like fas fa-wallet"></i>';
				$types = 'Gave you a Token';
			}
			$html.="<div class='main_div'>";
			    if($action == '0'){
					$html.="<span class='Notifyindicator'>.</span>";
				}
			$html.="<img class='img' src='public_folder/profileImages/".$profile_pic."'>
					<div class='notification_cont'><b>".$profile_name." </b>".$types."
						<div class='notificationTime'>
							<time class='timeago' datetime=''>".$MyDateTime."</time>
						</div>
					</div>
				</div>
			</li>";
			}
	$data[] = [
		'html' => $html,
		//'NotificationId' => $NotificationId,
		'id' => $NotificationId,
	];
	$json = json_encode($data);
	echo $json;
}
?>