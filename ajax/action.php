<?php
require_once('../database/connection.php');
session_start();

//DECODE SESSION ID
	$user_id = $_SESSION['UMLIDLGZS'];
	$user_id = base64_decode(urldecode($user_id));
	//$user_id = (($user_id*313)/9765405012)/8805449682;
	//$user_id = (($user_id*4)/19);
	$user_id = (($user_id*240)/378720);

	//ENCRYPT SESSION USER ID TO MATCH WITH DATABASE USER ID
	//$encript_method = (($user_id*178697658536*26463648826541)/302);
	//$encript_method = (($user_id*16)/8);
	$encript_method = (($user_id*136806)/302);
	$encript_method = 'UID-'.$encript_method;
	$user_id = urldecode(base64_encode($encript_method));

if(isset($_POST['liked'])){
	$post_id = $con->real_escape_string($_POST["post_id"]);	
	//DECODE POST ID
	$post_id = base64_decode(urldecode($post_id));
	//$post_id = (($post_id*302)/26463648826541)/178697658536;
	$post_id = (($post_id*313)/1252);
	$post_id = 'POST-'.$post_id;

	$result = mysqli_query($con, "SELECT `likes_num`, `user_id` FROM `company_listing` WHERE Post_Id='$post_id'");
	$row = mysqli_fetch_array($result);
	$num = $row['likes_num'];
	$author_id = $row['user_id'];
	$num_of_like = $num + 1 ;

	$stmt = $con->prepare("INSERT INTO post_likes(post_id, liker_id, poster_id, date)VALUES(?, ?, ?, NOW())");
	$stmt->bind_param("sss", $post_id, $user_id, $author_id);
	if(!$stmt->execute()){
		if($stmt->errno == 1062){
			echo "dublicate query";
		}
	}else{
		$$liked = 'liked';
		$stmt = $con->prepare("INSERT INTO notification(post_id,recipient_id,sender_id,addedOn,type)
		VALUES(?, ?, ?, NOW(), ?)");
	    $stmt->bind_param("ssss", $post_id, $user_id, $author_id, $liked);
		$stmt->execute();
		
		/*mysqli_query($con,"INSERT INTO notification
		(post_id,recipient_id,sender_id,addedOn,type)VALUES
		('$post_id','$user_id','$author_id',NOW(),'liked')");*/
		
		mysqli_query($con,"UPDATE `company_listing` SET likes_num=$num_of_like where Post_Id='$post_id'");
		echo "Added";
		$stmt->execute();
		exit();
	}	
}

// Unlike Post 
if(isset($_POST['unliked'])){
	$post_id = $con->real_escape_string($_POST["postid"]);	
	//DECODE POST ID
	$post_id = base64_decode(urldecode($post_id));
	//$post_id = (($post_id*302)/26463648826541)/178697658536;
	$post_id = (($post_id*313)/1252);
	$post_id = 'POST-'.$post_id;
	
	$sql = "SELECT `likes_num` FROM company_listing WHERE post_id = ?";
	$stmt = $con->prepare($sql);
	$stmt->bind_param("i", $post_id);
	$stmt->execute();
	 
	mysqli_query($con, "DELETE FROM post_likes WHERE post_id='$post_id' AND liker_id='$user_id'");
	mysqli_query($con, "DELETE FROM notification WHERE post_id='$post_id' AND sender_id='$user_id' And type='liked'");
	mysqli_query($con,"UPDATE `company_listing` SET likes_num=$n-1 where post_id='$post_id'");
	exit();
}

/* Front Page Comment System */
if(isset($_POST['comment'])){
	$post_id = $con->real_escape_string($_POST["post_id"]);
	$comment = $con->real_escape_string($_POST["comment"]);
	$commentId = $con->real_escape_string($_POST["commentId"]);
	
	//DECODE POST ID
	$post_id = base64_decode(urldecode($post_id));
	//$post_id = (($post_id*302)/26463648826541)/178697658536;
	$post_id = (($post_id*313)/1252);
	$post_id = 'POST-'.$post_id;
	$ProfileImg = $_SESSION['PRP'];
	$UserName = $_SESSION['USN'];
	if($comment == ''){
		$error = 'error/please fill the comment box';
	}else if(strlen($comment) > 1000){
		$error = 'error/Charectors must be in 12 digits';
	}
	if(empty($error)==false){
		echo $error;
		die();
	}else{
		//$comment = FILTER_VAR($comment, FILTER_SANITIZE_SPECIAL_CHARS);
		if($commentId !=''){
			$comment = FILTER_VAR($comment, FILTER_SANITIZE_SPECIAL_CHARS);
			mysqli_query($con,"UPDATE `comments` SET comments = '$comment' where post_id='$post_id' AND comment_id = '$commentId' AND commentator_id = '$user_id'");
		    
			$comment = html_entity_decode($comment, ENT_QUOTES);
			$comment = stripslashes($comment);
			$comment = str_replace("[nl]", "<br>", $comment);
			$comment = str_replace("[sp]", "&nbsp;", $comment);
			$data[] = [
				'comment_Id' => $commentId,
				'comment' => $comment,
				'ProfileImg' => $ProfileImg,
				'UserName' => $UserName,
			];
			$json = json_encode($data);
			echo $json;
			exit();
			die();
		}else{
			$Com_Id=rand();
			$comment_Id = 'COMT-'.$Com_Id;
			$commented = 'commented';
			$comment = FILTER_VAR($comment, FILTER_SANITIZE_SPECIAL_CHARS);
			$time = date("Y-m-d H:i:s");
			$stmt = $con->prepare("INSERT INTO `comments` (comment_id, commentator_id, post_id, comments, date) VALUES (?,?,?,?,?)");
			$stmt->bind_param('sssss', $comment_Id, $user_id, $post_id, $comment, $time);
			if($stmt->execute()){
				$result = mysqli_query($con, "SELECT `comments_num`,`user_id` FROM company_listing WHERE post_id = '$post_id'");
				$row = mysqli_fetch_array($result);
				$comments_num = $row['comments_num'];
				$poster_id = $row['user_id'];
				$comments_num = $comments_num + 1;
				
				$stmt = $con->prepare("INSERT INTO `notification`(post_id,comment_id,recipient_id,sender_id,addedOn,type) VALUES (?,?,?,?,?,?)");
				$stmt->bind_param('ssssss', $post_id, $comment_Id, $poster_id, $user_id, $time, $commented);
			    $stmt->execute();
				/*mysqli_query($con,"INSERT INTO notification
				(post_id,comment_id,recipient_id,sender_id,addedOn,type)VALUES
				('$post_id','$comment_Id','$user_id','$user_id',NOW(),'commented')");*/
				
				
				//mysqli_query($con,"UPDATE `company_listing` SET comments_num=$comments_num where post_id='$post_id'");
				$stmt = $con->prepare("UPDATE `company_listing` SET comments_num= comments_num + 1 where post_id = ?");
				$stmt->bind_param('i', $post_id);
			    $stmt->execute();
				
				//$comment = html_entity_decode($comment, ENT_QUOTES);
		     	//$comment = stripslashes($comment);
				$comment = str_replace("[nl]", "<br>", $comment);
				$comment = str_replace("[sp]", "&nbsp;", $comment);
				$data[] = [
					'comment_Id' => $comment_Id,
					'comments_num' => $comments_num,
					'comment' => $comment,
					'ProfileImg' => $ProfileImg,
			    	'UserName' => $UserName,
				];
				$json = json_encode($data);
				echo $json;
				exit();
				die();
			}
		}
	}
}

// Delete Comment 
if(isset($_POST['Delete'])){
    $post_id = $con->real_escape_string($_POST["post_id"]);
	$commentId = $con->real_escape_string($_POST["id"]);
	
	//DECODE POST ID
	$post_id = base64_decode(urldecode($post_id));
	//$post_id = (($post_id*302)/26463648826541)/178697658536;
	$post_id = (($post_id*313)/1252);
	$post_id = 'POST-'.$post_id;
    
	$result = mysqli_query($con, "SELECT `comments_num` FROM company_listing WHERE post_id = '$post_id'");
	$row = mysqli_fetch_array($result);
	$comments_num = $row['comments_num'];
	$comments_num = $comments_num - 1;
	
	mysqli_query($con, "DELETE FROM comments WHERE post_id='$post_id' AND comment_id = '$commentId' AND commentator_id='$user_id'");
	//mysqli_query($con, "DELETE FROM notification WHERE post_id='$post_id' AND sender_id='$user_id' And type='liked'");
	mysqli_query($con,"UPDATE `company_listing` SET comments_num=$comments_num where post_id='$post_id'");		
	echo $comments_num;
	exit();
}

// Get Likers Name 
if(isset($_POST['postId'])){
	$post_id = $con->real_escape_string($_POST["postId"]);
	$limit = $_POST['limit'];
	$start = $_POST['start'];
	//DECODE POST ID
	$post_id = base64_decode(urldecode($post_id));
	//$post_id = (($post_id*302)/26463648826541)/178697658536;
	$post_id = (($post_id*313)/1252);
	$post_id = 'POST-'.$post_id;
	$stmt = $con->prepare('SELECT liker_id, date, profile.user_id, profile.firstName, profile.lastName, profile.pro_pic FROM `post_likes` INNER JOIN profile ON post_likes.liker_id = profile.user_id where post_id=? ORDER BY date DESC LIMIT ?, ?');
	$stmt->bind_param('sss', $post_id, $start, $limit);
	$stmt->execute();
	$result = $stmt->get_result();
	
	while($row = $result->fetch_assoc()){
		$liker_id = $row['liker_id'];
		$date = $row['date'];
		$firstName = $row['firstName'];
		$lastName = $row['lastName'];
		$proPic = $row['pro_pic'];
		
		$html ='
		<a href="http://localhost/Quaf/postPage_test/pages/user_home_page.php?access_id=UI-1680328994" style="text-decoration: none;color:#0e0e0e;">
			<div class="friendListSection" style="border-bottom: 1px solid #f1f1f1;">

				<div class="friendPic">	
					<img src="public_folder/profileImages/'.$proPic.'" style="width:50px;height:50px;border-radius:100%;">
				</div>
				<div class="friendProfileName">	
					<div style="font-family: cursive;letter-spacing:1.2px;">'.$firstName.' '.$lastName.'</div>
					<div style="line-height:15px;color: gray;font-size: 13px;font-weight: bold;font-family: monospace;">(Student)</div>
					<div class="msg<?php echo $timeline_access_id ?>" style="display:none;">
						<div class="spinner" style="padding-top: 10px;text-align: right;font-size: 20px;">
							<span class="fas fa-circle-notch fa-spin"></span>
						</div>
					</div>
				</div>
				<div style="widt:20%;position: absolute;right: 5px;">	
					<span style="font-family: emoji;font-size: 13px;color: #a5a5a5;"> '.$date.' </span>		
				</div>
			</div>
		</a>';
		echo $html;
	}
	
}

if(isset($_POST['mainComment'])){
	$user_comment = $con->real_escape_string($_POST["mainComment"]);
	$user_comment = FILTER_VAR($user_comment, FILTER_SANITIZE_SPECIAL_CHARS);
	$user_comment = stripslashes($user_comment);
	$user_comment = str_replace("[nl]", "<br>", $user_comment);
	$user_comment = str_replace("[sp]", "&nbsp;", $user_comment);
	$post_id = $con->real_escape_string($_POST["post_id"]);
	$post_id = base64_decode(urldecode($post_id));
	//$post_id = (($post_id*302)/26463648826541)/178697658536;
	$post_id = (($post_id*313)/1252);
	$post_id = 'POST-'.$post_id;
	$val = $con->real_escape_string($_POST["val"]);
	$RepVal = $con->real_escape_string($_POST["RepVal"]);
	$RepOnRepVal = $con->real_escape_string($_POST["RepOnRepVal"]);
	$commentId = $con->real_escape_string($_POST["commentId"]);
	$RepEditVal = $con->real_escape_string($_POST["RepEditVal"]);
	//$Now = new DateTime();
	//$Now = $Now->format('Y-m-d H:i:s');
	$Now = date('Y-m-d h:i:s');
	//$action   = $con->real_escape_string($_POST["action"]);

	$Com_Id=rand();
	$Comment_Id= 'COMT-'.$Com_Id;
	$Rep_Id = rand();
	$Reply_Id = 'RPL-'.$Rep_Id;
	/*if($action == 'react'){
		$action == 'react';
	}else{
		$action == '';
	}*/
	
	$query = "SELECT * FROM company_listing WHERE Post_Id='$post_id'";
		$result = mysqli_query($con, $query);
		while($row = mysqli_fetch_array($result)){
			$post_author_id=$row['user_id'];
		}

	if($val !=='' && $val !='Null'){
	    if($RepEditVal!=='' && $RepEditVal !='Null'){
		    mysqli_query($con,"UPDATE `post_comment_replies` SET `reply`='$user_comment' WHERE id='$RepEditVal'");
		}else{
		    mysqli_query($con,"UPDATE `comments` SET `comments`='$user_comment' WHERE id='$val'");
		}
		    $comment = html_entity_decode($user_comment, ENT_QUOTES);
			$comment = stripslashes($comment);
			$comment = str_replace("[nl]", "<br>", $comment);
			$comment = str_replace("[sp]", "&nbsp;", $comment);
			/*$data[] = [
				'user_id' => $user_id,
				'comment' => $comment,
			];
			$json = json_encode($data);
			echo $json;*/
			echo $comment;
			exit();
			die();
	}else if($RepVal !=='' && $RepVal !='Null'){
		$sql = "INSERT INTO `post_comment_replies`(`reply_id`,`commentID`,`postID`,`reply`,`createdOn`,`userID`)
                VALUES ('$Reply_Id','$RepVal','$post_id','$user_comment', NOW(),'$user_id')";
                mysqli_query($con,$sql);
		$query = "SELECT * FROM comments WHERE id='$RepVal'";
		        $result = mysqli_query($con, $query);
		        while($row = mysqli_fetch_array($result)){
			    $author_id=$row['commentator_id'];
                $numRpl= $row['reply_num'];
                $comnts_id= $row['comment_id'];
		        }
		/*$result = "INSERT INTO notification(post_id,comment_id,comnt_like_id,user_id,author_id,addedOn,type)
	               VALUES 
	               ('$RepVal','$comnts_id','$Reply_Id','$user_id','$author_id',NOW(),'reply')";*/
		$result = "INSERT INTO notification(post_id,comment_id,reply_id,recipient_id,sender_id,addedOn,type)
	               VALUES 
	               ('$post_id','$comnts_id','$Reply_Id','$author_id','$user_id',NOW(),'reply')";
				   mysqli_query($con,$result);
		           mysqli_query($con, "UPDATE `comments` SET reply_num=$numRpl+1 where id='$RepVal'");
		           //mysqli_query($con, "UPDATE `comments` SET reply_num = reply_num +1 where id='$RepVal'");
					echo $Reply_Id;
	}else if($RepOnRepVal!=='' && $RepOnRepVal !='Null'){
		$sql="INSERT INTO `post_comment_replies`(`reply_id`,`commentID`,`postID`,`ReplyOnRepId`,`reply`,`createdOn`,`userID`)
            VALUES ('$Reply_Id','$commentId','$post_id','$RepOnRepVal','$user_comment',NOW(),'$user_id')";
            mysqli_query($con,$sql);

	    $query = "SELECT * FROM comments WHERE id='$commentId'";
		    $results = mysqli_query($con, $query);
		    while($rows = mysqli_fetch_array($results)){
			    $author_id=$rows['commentator_id'];
                $numRpl= $rows['reply_num'];
                $ComId= $rows['comment_id'];
		    }
		$query = "SELECT * FROM  post_comment_replies WHERE id='$RepOnRepVal'";
		$result = mysqli_query($con, $query);
		while($row = mysqli_fetch_array($result)){
            $firstReplier= $row['userID'];
		}

		$result= "INSERT INTO notification(post_id,comment_id,reply_id,recipient_id,sender_id,addedOn,type)
	    VALUES 
	        ('$post_id','$ComId','$Reply_Id','$author_id','$user_id',NOW(),'ReplyOnReply')";
		mysqli_query($con,$result);
		mysqli_query($con, "UPDATE `comments` SET reply_num=reply_num + 1 where id='$commentId'");
	}else{
		/*$sql= "INSERT INTO comments(comments,commentator_id,post_id,comment_id,date)
			VALUES 
			('$user_comment','$user_id','$post_id','$Comment_Id',NOW())";*/
		$stmt = $con->prepare("INSERT INTO `comments` (comments,commentator_id,post_id,comment_id,date) VALUES (?,?,?,?,?)");
		$stmt->bind_param('sssss', $user_comment, $user_id, $post_id, $Comment_Id, $Now);
		if($stmt->execute()){
			
		//}
		//if(mysqli_query($con,$sql)){
			
			mysqli_query($con,"INSERT INTO notification(`post_id`, `comment_id`, `recipient_id`, `sender_id`, `addedOn`, `type`)
			VALUES 
			('$post_id','$Comment_Id', '$post_author_id', '$user_id', NOW(), 'commented')");
	    }

		$result = mysqli_query($con, "SELECT `comments_num` FROM company_listing WHERE Post_Id='$post_id'");
			$row = mysqli_fetch_array($result);
			$n = $row['comments_num'];
			mysqli_query($con,"UPDATE `company_listing` SET comments_num=$n+1 where Post_Id='$post_id'");
    }
	/*$res = mysqli_query($con, "SELECT * FROM comments WHERE comment_id='$Comment_Id'");
		$row = mysqli_fetch_array($res);*/
	 	//$id = $row['id'];
        echo $user_id;
        die();
}



/*** Back Comment And Reply System **/
if(isset($_POST['reply_id'])){
	$reply_id=$_POST['reply_id'];
	$sql="SELECT * FROM `comments` where id ='$reply_id'";
	$result1 = mysqli_query($con, $sql);
	while($row = mysqli_fetch_assoc($result1)){
	$comment= $row['comments'];
	$userID = $row['commentator_id'];
	$createdOn = $row['date'];
	
	$query="SELECT * FROM `profile` where user_id='$userID' order by id DESC";
		$res = mysqli_query($con, $query);
		while($rows=mysqli_fetch_assoc($res)){
			$profile_name=$rows['firstname'];
			$profile_pic=$rows['pro_pic'];
			
	
	$User_data = array();
    $User_data[0]='<div class="user"><img src="public_folder/Images/'.$profile_pic.'" class="comment_imag" style="width:40px;height:40px;"><span style="margin-left:10px;">'.$profile_name.' .</span><span class="time timeago"data-date="'.$createdOn.'"></span></div>
	<div class="userComment" style="padding-right:20px;">'.$comment.'</div>';
	$User_data[1]= $reply_id ;
		}
	}
	echo json_encode($User_data);
}



/*********************** Get Comment / Reply data For Editing the Comment/ Reply ********************/
if (isset($_POST['Edit_id'])){
	$popUp_id= $con->real_escape_string($_POST['Edit_id']);
	$Edit_rep_id= $con->real_escape_string($_POST['Edit_rep_id']);
	if($Edit_rep_id !=''){
		$result = mysqli_query($con, "SELECT `reply` FROM post_comment_replies WHERE id='$Edit_rep_id'");
		$row = mysqli_fetch_array($result);
		$reply = $row['reply'];
	    echo $reply;
	}else{
		$result = mysqli_query($con, "SELECT `comment` FROM post_comments WHERE id='$popUp_id'");
			$row = mysqli_fetch_array($result);
			$comment = $row['comment'];
		echo $comment;
	}
}

/********************** Number Of Likes inserting in Database **************************/
if (isset($_POST['Comment_liked'])) {
    $comment_id = $con->real_escape_string($_POST['Comment_id']);
	$post_id = $con->real_escape_string($_POST["post_id"]);
	//Fomula Of Encryption for Saving In Session
	$post_id = base64_decode(urldecode($post_id));
	//$post_id = (($post_id*302)/26463648826541)/178697658536;
	$post_id = (($post_id*313)/1252);
	$Enc_str_Post_Id = strpos($post_id, '.');
	if($Enc_str_Post_Id !==false){
		$post_id = ceil($post_id);
	}
	$post_id = 'POST-'.$post_id;
    
	$results = mysqli_query($con, "SELECT * FROM comments WHERE id='$comment_id'");
	$row = mysqli_fetch_array($results);
	$num = $row['likes_num'];
	
	$commentator_id=$row['commentator_id'];
	$comnts_like_id=$row['comment_id'];

	mysqli_query($con,"UPDATE `comments` SET likes_num=$num+1 where id='$comment_id'");
	mysqli_query($con,"INSERT INTO `post_comment_likes`
	(users_id,comment_id,author_id,post_id)
	VALUES
	('$user_id','$comment_id','$commentator_id','$post_id')");

	mysqli_query($con,"INSERT INTO notification(post_id,comment_id,recipient_id,sender_id,addedOn,type)
	               VALUES 
	               ('$post_id','$comnts_like_id','$commentator_id','$user_id',NOW(),'com_liked')");
	echo $num+1;
	die();
	}

/*** Delete The Like From Database Whenever User Click On Unlike Btn ***/
if (isset($_POST['Comment_unliked'])) {
	$comment_id = $con->real_escape_string($_POST['Comment_id']);
	$result = mysqli_query($con, "SELECT * FROM comments WHERE id='$comment_id'");
		$row = mysqli_fetch_array($result);
		$n = $row['likes_num'];
		$comnts_like_id=$row['comment_id'];

	mysqli_query($con, "DELETE FROM post_comment_likes WHERE comment_id='$comment_id' AND users_id='$user_id'");
	mysqli_query($con, "DELETE FROM notification WHERE comment_id='$comnts_like_id' AND type='com_liked' AND sender_id='$user_id'");
	mysqli_query($con, "UPDATE `comments` SET likes_num= likes_num -1 where id='$comment_id'");
    //echo $n - 1;
    echo $user_id;
	exit();
}

/********************** Number Of Likes inserting in Database **************************/
if(isset($_POST['Reply_liked'])){
    $reply_id = $con->real_escape_string($_POST['p_reply_id']);
    //$comment_id = $con->real_escape_string($_POST['comment_id']);
	//$replier_id = $con->real_escape_string($_POST['replier_id']);
	//$post_id = $con->real_escape_string($_POST['post_id']);
	//$Sessionusers = $con->real_escape_string($_POST['Sessionusers']);
	/*$query = "SELECT * FROM post_reply_likes WHERE reply_id = '$reply_id' AND users_id='$$user_id'";
	$result = mysqli_query($con, $query);
	if(mysqli_num_rows($result)){

	}*/
	$query = "SELECT * FROM post_comment_replies WHERE id='$reply_id'";
	$result = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($result)){
		$commentId=$row['commentID'];
		$post_id=$row['postID'];
		$comment_id=$row['commentID'];
		$replier_id=$row['userID'];
		$n = $row['likes'];
	}
	$query="SELECT * FROM `comments` where id='$commentId'";
	$result = mysqli_query($con, $query);
	while($row=mysqli_fetch_assoc($result)){
        $custom_com_id = $row['comment_id'];
	}
	$result= "INSERT INTO notification(post_id,comment_id,reply_id,recipient_id,sender_id,addedOn,type)
	VALUES 
	('$post_id','$comment_id','$reply_id','$replier_id','$user_id',NOW(),'rep_liked')";
	//if(mysqli_query($con,$result)){}
	mysqli_query($con,$result);

	mysqli_query($con,"UPDATE `post_comment_replies` SET likes= likes +1 where id='$reply_id'");
	mysqli_query($con,"INSERT INTO post_reply_likes(users_id,reply_id,comment_id,post_id,author_id)VALUES('$user_id','$reply_id','$comment_id','$post_id','$replier_id')");
    echo $n+1;
	exit();
}

/********************** Cancel The Like From Database Whenever User Click On Unlike Btn**************************/
if(isset($_POST['reply_Unliked'])){
	$reply_id = $con->real_escape_string($_POST['p_reply_id']);
    //$comment_id = $con->real_escape_string($_POST['comment_id']);
	//$replier_id = $con->real_escape_string($_POST['replier_id']);
	//$Sessionusers = $con->real_escape_string($_POST['Sessionusers']);
	/*$result = mysqli_query($con, "SELECT * FROM post_comment_replies WHERE id='$reply_id'");
		$row = mysqli_fetch_array($result);
		//$n = $row['likes'];
		$id = $row['id'];*/
	mysqli_query($con, "DELETE FROM post_reply_likes WHERE reply_id='$reply_id' AND users_id='$user_id'");
	mysqli_query($con, "DELETE FROM notification WHERE reply_id ='$reply_id' AND sender_id='$user_id'");
	mysqli_query($con, "UPDATE `post_comment_replies` SET likes= likes -1 where id='$reply_id'");
	//echo $n-1;
	echo $user_id. '-' . $reply_id;
	exit();
}


/*********************** Delete Comments From Comment Box ********************/
if(isset($_POST['del'])){
	$id = '';
	$repid = '';
	$post_id = $con->real_escape_string($_POST["post_id"]);
	$post_id = base64_decode(urldecode($post_id));
	//$post_id = (($post_id*302)/26463648826541)/178697658536;
	$post_id = (($post_id*313)/1252);
	$post_id = 'POST-'.$post_id;
	//$  = $con->real_escape_string($_POST["user"]);
	$id = $con->real_escape_string($_POST["id"]);
	if(isset($_POST['repid']) && $_POST['repid']!= ''){
		$repid = $con->real_escape_string($_POST["repid"]);
		$result = mysqli_query($con, "SELECT * FROM post_comment_replies WHERE id='$repid'");
			$row = mysqli_fetch_array($result);
			$commentId = $row['commentID'];
			$reply_id = $row['reply_id'];
			//$post_id = $row['postID'];
		/*$result = mysqli_query($con, "SELECT * FROM comments WHERE id='$commentId'");
			$row = mysqli_fetch_array($result);
			$n = $row['reply_num'];*/
		mysqli_query($con, "DELETE  FROM post_comment_replies WHERE id='$repid'");
		//mysqli_query($con, "UPDATE `comments` SET reply_num =$n-1 where id='$commentId'");
		mysqli_query($con, "UPDATE `comments` SET reply_num = reply_num -1 where id='$commentId'");
		mysqli_query($con, "DELETE  FROM notification WHERE reply_id ='$reply_id' OR reply_id='$repid'");
		mysqli_query($con, "DELETE  FROM post_reply_likes WHERE reply_id='$repid' AND author_id='$user_id'");
		//echo $reply_id. '-' .$repid;
	}else{
		$result = mysqli_query($con, "SELECT * FROM comments WHERE id='$id'");
			$row = mysqli_fetch_array($result);
			$comnts_like_id = $row['comment_id'];
			//$comment = $row['comments'];
		/*$result = mysqli_query($con, "SELECT * FROM company_listing WHERE Post_Id='$post_id'");
			$row = mysqli_fetch_array($result);
			$n  = $row['comments_num'];*/
		mysqli_query($con, "DELETE FROM comments WHERE id='$id'");
		mysqli_query($con, "DELETE FROM notification WHERE comment_id='$comnts_like_id'");
		//mysqli_query($con, "DELETE FROM notification WHERE post_id='$id'");
		mysqli_query($con, "DELETE FROM notification WHERE comment_id='$id'");
		mysqli_query($con, "DELETE FROM post_comment_likes WHERE comment_id='$id' AND author_id='$user_id'");
		mysqli_query($con, "DELETE FROM post_comment_replies WHERE commentID='$id'");
		mysqli_query($con, "DELETE  FROM post_reply_likes WHERE reply_id='$repid' AND author_id='$user_id'");
		//mysqli_query($con, "UPDATE `company_listing` SET comments_num=n$n-1 where Post_Id='$post_id'");
		mysqli_query($con, "UPDATE `company_listing` SET comments_num = comments_num -1 where Post_Id='$post_id'");
		echo $post_id;
	}
}
?> 