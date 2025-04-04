const buttons = document.querySelectorAll('button');
textField.document.designMode = "on";
let show = false;
for(let i=0; i<buttons.length; i++){
	buttons[i].addEventListener('click', ()=>{
		let cmd =buttons[i].getAttribute('data-command');
		if(buttons[i].name === "active"){
			buttons[i].classList.toggle('active');
		}
		if (cmd === "insertImage" || cmd === "createLink"){
			if (cmd === "insertImage"){
				let imgLink = '../public_folder/images/anim_pic2.png';
			    textField.document.execCommand(cmd, false, imgLink);
				const imgs = textField.document.querySelectorAll('img');
				imgs.forEach(item =>{
					item.style.maxHeight = "250px";
					item.style.minWidth = "100%";
					
				})
			}else{
				let url = prompt("Enter the link here: ", " ");
				textField.document.execCommand(cmd, false, url);
				const links = textField.document.querySelectorAll('a');
				links.forEach(item =>{
					item.target = "_blank";
					item.addEventListener('mouseover', ()=>{
						textField.document.designMode = "off";
					});
					item.addEventListener('mouseout', ()=>{
						textField.document.designMode = "on";
					});
				})
						
				  }
		}else{
			textField.document.execCommand(cmd, false, null);
			$('#output').focus();
		}
		if(cmd == "showCode"){
			const textBody = textField.document.querySelector('body');
			if(show){
				textBody.innerHTML = textBody.textContent;
				show = false;
			}else{
				textBody.textContent = textBody.innerHTML;
			show = true;
			}
		}
	});
}


$(document).ready(function(){
$(".font").click(function(){
	var font = $(this).data('val');
	textField.document.execCommand("fontSize", false, font);
	$('#output').focus();
});
$(".hrLine").click(function(){
	$('#output').focus();
	textField.document.execCommand("insertHtml", false, '<hr><br>');
});

$(".fontBtn").click(function(){
	$('.fontSizeDropDown div').css('display', 'block');
});

$("body").click(function(divclose){
	if($('.fontSizeDropDown div').css('display')== 'block' ){
		 if($(divclose.target).closest(".fontBtn").length == 0){
			$('.fontSizeDropDown div').css('display', 'none');
	    }
	}
});


/*$("#back").click(function(){
   $("#output").html('');
	
});*/


/*** TAGGING SYSTEM START ***/
$('#tags').on('keyup', function(){
	var tel = $(this).val();
	var changetel = tel.replace(/[,,,/]/g, "");
	this.value = changetel;
	if(tel.length > 30){
		$(this).val(tel.slice(0,30));
	}
});

function prevent_function(evt){
	var bool=true;
	if(evt.keyCode==13){
		bool=false;
	}
	return bool;
}
    var tag_input_field = $('#tags');
    var tags_array = [];
    tag_input_field.keydown(function (e) {
        var get_new_tag = tag_input_field.val();
        if(e.keyCode == 13 || e.keyCode == 188 || e.keyCode == 44){
			if(e.which == 83 ){
				e.preventDefault();
			}
            if(get_new_tag.trim() == "") {
                alert("please enter a tag");
			}else if(get_new_tag.length == 1){
				alert('Tag should be contained more than one charector');
            }else{
                tags_array.push(get_new_tag);
                $('.tagsCon').append("<span><span class='list'>" + get_new_tag + "</span><i class='fas fa-times-circle del'></i> </span>");
                tag_input_field.val("");
				var input = $('.list');
				var listing = new Array();
				for(var i = 0; i < input.length; i++){
					var a = $(input[i]).html();
					listing.push(a+', ');
				}
				if(tags_array.length > 11){
					$('#tags').css('display', 'none');
				}
				$('.counter').text(12 - tags_array.length);
            }
        }
    });


function check(check){
	   if(check.length > 1){
		   var count = parseInt($('.counter').text());
		   $('.counter').text(count + 1);
	   }	   
   }
   $('.tags-container').on('click', 'span', function() {
        var k = $(this).text();
        tags_array.splice(tags_array.indexOf(k), 1);
        $(this).remove();
		$('#tags').css('display', 'block');
		 check(k);
    });
	
$("#submit").click(function(){
	var content = $("#output").contents().find('html').html();
	var inputTags = $('.tagsCon .list');
	var Tags = new Array();
	for(var i = 0; i < inputTags.length; i++){
		if(i > 0){
			var comma = ' ';
		}else{ 
			var comma = '';
		}
		var a = $(inputTags[i]).html();
		if(a.length > 30){
		    var a = a.slice(0,30);
	    }
		Tags.push(comma+''+a);	
	}
	let tagy = Tags.join('*');
	let form_data = new FormData();
	form_data.append('content', content);
	form_data.append('tagy', tagy);
	$.ajax({
        url: 'ajax/form.php',
        type: 'post',
		data: form_data,
		contentType: false,
		processData: false,
		success: function (response){
			alert(response);
			if(response == Submitted){
				
				//$('#blogsForm')[0].reset();
			}else{
				
			}
		}
	});
});

});