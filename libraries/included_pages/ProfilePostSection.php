<div class="col-12" style="padding-left:0px;padding-right:0px;box-shadow:0 4px 12px 0 rgb(0 0 0 / 40%);">
	<div class="col-12" style="padding-left:0px;padding-right:0px;position: relative;">
		<div style="position:absolute;left:15px;">
			<button type="Submit" onclick="triggerClicks()" name="submit2" id="uploadBtn" class="btn" style="margin:10px; width:auto;color:white; position:absolute; margin-bottom:40px;margi-left:90px; background: #6e70ff;margin-left: 0px; opacity:1;"><span class="fas fa-camera"><span style="opacity:1"> </span></span></button>
		</div>
		<form method="POST" enctype="multipart/form-data">
			<img src="public_folder/Images/65832a9ed0a67anim_pic4.png" id="coverDisplay" style="width:100%;height:200px;">
			<input type="file" onchange="displayCoverImage(this)" style="display:none;" name="coverImage" id="coverImage">
			<div style="width:100%;height:100px;position:absolute;z-index:100;bottom:-50px;">
				<div style="text-align:center;line-height:10px;background:re;">
					<input type="file" onchange="displayImage(this)" style="display:none;" name="profileImage" id="profileImage">
					<img src="public_folder/Images/65832a9ed0a67anim_pic4.png" onclick="triggerClick()" id="profileDisplay" style="cursor:pointer;text-align:center;height:100px;width:100px;border-radius:50%;border:2px solid #d2cdcd;"><br>
					<span style="font-size:13px;color:gray;line-height: 20px;">Change Profile Image</span>
					<p style="padding:5px;padding-left:15px;font-size:15px;color:#524848;line-height: 1.3;">
						Prince  The Eagle 
						<span class="fas fa-edit" data-toggle="modal" data-target="#Registration" style="color:#6e70ff;font-size:20px;cursor:pointer;"></span>
					</p>
					<br><br>
				</div>
			</div>
		</form>
	</div>
	<br>
	<div id="br_tags" style="display:none;height:40px;background:re;text-align:center;">
		<button type="Submit" name="publish_Btn" id="pubishBtn" class="btn" style="margin:10px; color:white; margin-bottom:-140px;background: #6e70ff;opacity:1;"><span class="fas fa-upload"> Publish</span></button>
	</div>
	<div class="col-12" style="padding-left:0px;padding-right:0px;margin-top:75px;">
		<ul style="margin-left:0%;background:#6e70ff;padding-left:20px;color:white;padding-top:10px;padding-bottom:10px;font-size:15px;">
			<li style="width:70px; display:inline-block;margin-right:10px;border-right:2px solid white;padding-right:10px;">
				<a style="color:white;text-decoration:none;" href="my_blog.php">
				<b>Timeline</b>
				</a>
			</li>
			<li style="width:65px; display:inline-block;margin-right:10px;border-right:2px solid white;padding-right:10px;"><b>About</b></li>
			<li style="width:70px; display:inline-block;margin-right:10px;border-right:2px solid white;padding-right:10px;"><b>Friends</b></li>
			<li style="width:70px; display:inline-block;margin-right:10px;border-right:2px solid white;padding-right:10px;"><b>Photos</b></li>
			<li style="width:70px; display:inline-block;margin-right:10px;border-right:2px solid white;padding-right:10px;margin-top:5px;"><b>Settings</b></li>
		</ul>
	</div>
</div>


<div id="timelinePost" class="col-12" style="padding-top:10px;box-shadow:0 4px 12px 0 rgb(0 0 0 / 40%);padding: 10;margin-bottom: 20px;">
	<p style="font-size:15px;color:#508dca;">Creat New Post</p>
	<div style="border:2px solid #d4d1d1; border-botto:none;border-radius:8px;">
		<textarea style="border:none" rows="3" wrap="physical" id="editor2" class="form-control" name="post" placeholder="What's going on in your mind?" required=""></textarea>
	</div>
	<hr>
	<div style="padding-top:10px;border-radius: 5px;padding-bottom:10px;text-align:center;color:white;background:linear-gradient(to right, #6e70ff,#5558fd,#4e51f5);">
		<span class="fas fa-image" onclick="TriggersClick()" id="photo" style="color:gree;font-size:18px;cursor:pointer;"></span>
		<span style="font-size:14px;colo:#6e70ff;cursor:pointer;" id="photo" onclick="TriggersClick()"> <b>Post<!--Photo/Video--></b></span>
		<input type="file" onchange="timelineImage2(this)" name="Timeline2" id="TimelineImage2" style="display:none;">
		<span class="fas fa-user-plus tag_freind" style="colo:#6e70ff;margin-left:20px;"></span>
		<span class="tag_freind" style="font-size:14px;colo:#4b4d4e;"> <b>Reel<!--Tag Friends--></b></span>
		<span class="fas fa-film" style="margin-left:20px;colo:#6e70ff;"></span>
		<span style="font-size:14px;colo:#4b4d4e;"> <b>Video<!--Feeling Activities--></b></span>
	</div><br>
</div>