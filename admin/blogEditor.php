<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="keywords" content="English Grammer,Lectures,English Lectures,English">
	<meta content="This is a basic text" property="og:title">
	<meta content="This is a basic text" property="og:description" />
    <title>blogs</title>
  	<link rel="stylesheet" href="../libraries/bootstrap/bootstrap5.min.css">    
	<link rel="stylesheet" href="../libraries/Font-Awesome/css/all.min.css">  
	<link rel="stylesheet" href="css/editor.css">  
	<script src="../libraries/jQuery.min.js"></script>
</head>
<body>
<div class="container" style="backgrond:red;">
    <div class="row">
        <div class="PostModal" id="PostModal" style="background:<?php echo $background ?>;">	
	        <div id="timelinePost" class="col-md-10 offset-md-1" style="padding-top:10px;box-shado:0 4px 12px 0 rgb(0 0 0 / 40%);min-height:100%;width: 58.33333333%;margin:auto;">
				<span class="fas fa-arrow-circle-left" id="back" style="color:#908d8d; cursor:pointer; font-size:25px;" onclick="closeTextBox();"></span><br><br>
				<p style="font-size:18px;color:#508dca;"> Creat New Post</p>				
				<!--<form method="POST" enctype="multipart/form-data" onsubmit="addNewLines();">-->				
				<input type="text" id="bpid" value="" style="display:none;" name="editPost"></input>			
				<div style="border:2px solid #d4d1d1; border-botto:none;border-radius:8px;">
					<iframe tabindex="-1" style="border:none" name="textField" id="output" class="form-control" placeholder="What's going on in your mind?" required></iframe>
				</div>
				<div class="toolbar" id="toolbar" style="padding:2px;">
					<ul class="tool-list" style="backgroun:red;">
						<li class="tool" style="backgrond:red;text-align:center;">
							<button type="button" data-command='justifyLeft' class="tool--btn" id="btn">
								<i class=' fas fa-align-left' aria-hidden="true"></i>
							</button>
						</li>
						<li class="tool">
							<button type="button" data-command='justifyCenter' class="tool--btn" id="btn">
								<i class=' fas fa-align-center' aria-hidden="true"></i>
							</button>
						</li>
						<li class="tool">
							<button type="button" data-command='justifyRight' class="tool--btn" id="btn">
								<i class='fas fa-align-right' aria-hidden="true"></i>
							</button>
						</li>
						<li class="tool">
							<button type="button" data-command="bold" class="tool--btn" id="btn">
								<i class='fas fa-bold' aria-hidden="true"></i>
							</button>
						</li>
						<li class="tool">
							<button type="button" data-command="italic" class="tool--btn" id="btn">
								<i class=' fas fa-italic' aria-hidden="true"></i>
							</button>
						</li>
						<li class="tool">
							<button type="button" data-command="underline" class="tool--btn" id="btn">
								<i class='fas fa-underline' aria-hidden="true"></i>
							</button>
						</li>
						<li class="tool">
							<button type="button" data-command="insertOrderedList" class="tool--btn" id="btn">
								<i class=' fas fa-list-ol' aria-hidden="true"></i>
							</button>
						</li>
						<li class="tool">
							<button type="button" data-command="insertUnorderedList" class="tool--btn" id="btn">
								<i class=' fas fa-list-ul' aria-hidden="true"></i>
							</button>
						</li>
						<li class="tool">
							<button type="button" data-command="createLink" class="tool--btn" id="btn">
								<i class=' fas fa-link' aria-hidden="true"></i>
							</button>
						</li>
						<li class="tool">
							<button type="button" data-command="insertImage" class="tool--btn" id="btn" name="active">
								<i class='fas fa-image' aria-hidden="true"></i>
							</button>
						</li>
						<li class="tool">
							<button type="button" data-command="showCode" class="tool--btn" id="btn" name="active">
								<i class='fas fa-code' aria-hidden="true"></i>
							</button>
						</li>
						<li class="tool">
							<button type="button" data-command="selectAll" class="tool--btn" id="btn" name="active">
								<i class='fas fa-copy' aria-hidden="true"></i>
							</button>
						</li>
						<li class="tool">
							<button type="button" data-command="indent" class="tool--btn" id="btn" name="active">
								<i class='fas fa-indent' aria-hidden="true"></i>
							</button>
						</li>
						<li class="tool">
							<button type="button" class="tool--btn fontBtn" id="btn" name="active">
								<i class='fas fa-text-height' aria-hidden="true"></i>
							</button>
							<div class="fontSizeDropDown">
								<div class="font" name="active" data-val="7">h1</div>
								<div class="font" name="active" data-val="6">h2</div>
								<div class="font" name="active" data-val="5">h3</div>
								<div class="font" name="active" data-val="4">h4</div>
								<div class="font" name="active" data-val="3">h5</div>
								<div class="font" name="active" data-val="2">h6</div>
								<div class="font" name="active" data-val="1">h7</div>
							</div>
						</li>
						<li class="tool">
							<button type="button" class="tool--btn hrLine" id="btn" name="active">
								<b>__</b>
							</button>
						</li>
						
						<li class="tool">
							<button type="button" class="tool--btn" id="close" style="background:red;">
								<span style="color:white;" id="close"><b>X</b></span>
							</button>
						</li>
					</ul>
				</div>		
				<!-- TAGS CONTAINER -->
				<div class="tags-container">
					<div class="tagsCon"></div>
					<input onkeydown="javascript: return prevent_function(event)" class="form-control" type="text" id="tags" placeholder="Create tag">
					<div id="hiddenTags"></div>
				</div>
				<button tabindex="-1" type="Submit" id="submit" name="submit" class="btn" style=""><b>Post</b></button>
			</div>							 
        </div>		
	</div>
</div>
<script src="js/editor.js"></script>
</body>
</html>