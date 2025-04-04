/**** Jump To The Comment Section Through Notification And Get Data Through Lazy Loader ****/
/*$(document).on('click','.OpenCom',function(){
    sessionStorage.setItem("POSICOMID", 'null');
    sessionStorage.removeItem("Refresh");
    var width = $(window).width();
	var post_id    = $(this).data('id');
	var comment_id = $(this).data('comment-id');
	var rep_id     = $(this).data('repid');
	var type       = $(this).data('type');
	var start      = 0;
        $('.CommentSpinner').css('opacity', '1');
		$('.CommentSpinner').css('visibility', 'visible');
        var post_id = post_id;
		var comment_id = comment_id;
		var rep_id = rep_id;
		var type = type;
		var user = "<?php echo "$user_id" ?>";
		var act = 'actus';
        $('#myCommentnav').html("<div style='text-align:center;padding:5px;margin-top:50%;'><i class='fas fa-circle-notch fa-spin' style='font-size: 35px;margin-top: -12px;position: absolute;margin-left: -12px;color:#a9a9a9;'></div>");
        $.ajax({
			beforeSend:function(){
			    $('.CommentSpinner').css('opacity', '1');
		        $('.CommentSpinner').css('visibility', 'visible');
			},
			url:"../ajax/commenrt_data.php",
			method:'POST',
			data:{post_id:post_id, user:user, type:type, comment_id:comment_id, rep_id:rep_id, start:start, width:width},
			success:function(data){
			    $('.CommentSpinner').css('opacity', '0');
				$('.CommentSpinner').css('visibility', 'hidden');
				$('#myCommentnav').html(data);
				$('.scrollButton').click();
			    $('.repTog'+comment_id).html('Hide Replies');
				$('.downIcon'+comment_id).removeClass('fa-caret-down');
				$('.downIcon'+comment_id).addClass('fa-caret-up');
			}				   
		});
// Load Data At First Time Through Notification     
        setTimeout(function(){
            var limit = 6;
            var start = 0;
            load_comments_data(limit, start, post_id, type, comment_id, rep_id, user);
		}, 1000);
});*/