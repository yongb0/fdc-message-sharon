var current_form = "";

function onlyletters(inputs)
{
	for(var x in inputs)
	{
		$("#"+inputs[x]).keypress(function(e)
		{
			if(!(e.keyCode >= 65 && e.keyCode <= 90 || e.keyCode >= 97 && e.keyCode <= 122))
				e.preventDefault();
		});
	}
}
function onlylettersnumbers(inputs)
{
	for(var x in inputs)
	{
		$("#"+inputs[x]).keypress(function(e)
		{
			if(!((e.keyCode >= 48 && e.keyCode <= 57) || e.keyCode >= 65 && e.keyCode <= 90 || 
				(e.keyCode >= 97 && e.keyCode <= 122) || e.keyCode === 32 || e.keyCode === 35 ||
				 e.keyCode === 43))
				e.preventDefault();
		});
	}
}
function enableButton(button)
{
	button[0].removeAttribute('disabled');
	button.removeClass('disabled');
}
function disableButton(button)
{
	button[0].setAttribute('disabled','disabled');
	button.addClass('disabled');
}
function convertInputToUpper(inputs)
{
	for(var x in inputs)
	{
		$("#"+inputs[x]).keyup(function(e)
		{
			$("#"+inputs[x]).val($("#"+inputs[x]).val().toUpperCase());
		});
	}
}
function UcWord(string)
{
	var word = "";
	var word_arr = string.split(' ');
	for(var x in word_arr)
	{
		var tmp_word = "";
		for(var i in word_arr[x].split(''))
		{
			if(parseInt(i) === 0)
				tmp_word += word_arr[x].split('')[i].toUpperCase();
			else
				tmp_word += word_arr[x].split('')[i];
		}
		if(x > 0)
			word += " " + tmp_word;
		else
			word += tmp_word;
	}
	return word;
}


//SECURITY ACTION
function ShowSecurityInput(method,parameter)
{
	$("#security_input-BG").remove();
	var content = '<div id="security_input-BG">';
	content += '<div class="security_input-container">';
	content += '<div class="security_input-header">';
	content += '<button class="btn-close">X</button>';
	content += '<div> SECURITY CREDENTIAL </div>';
	content += '</div>';
	content += '<div class="security_input-body">';
	content += '<table>';
	content += '<tr>';
	content += '<td> Password </td>';
	content += '<td> <input type="password" id="txt_password" placeholder="Password"> </td>';
	content += '<td> <button class="btn-primary" id="btn_submit_action">Submit</button> </td>';
	content += '</tr>';
	content += '</table>';
	content += '</div>';
	content += '</div>';
	content += '</div>';
	content += '</div>';
	$("body").prepend(content);
	$("#txt_password").focus();

	$("#security_input-BG #txt_password").keypress(function(e)
	{
		if(e.keyCode === 13)
			$("#security_input-BG #btn_submit_action").click();
	});
	$("#btn_submit_action").click(function()
	{
		if($("#security_input-BG #txt_password").val().length > 0)
		{
			if(typeof parameter !== 'undefined')
				window[method](parameter);
			else
				window[method]();
			$("#security_input-BG").remove();
		}
		else
			ShowMessage("Warning","Password is required");
	});
	$(".security_input-header .btn-close").click(function(){$("#security_input-BG").remove()});
	$(document).keyup(function(e)
	{
		if($("#security_input-BG").length !== 0 && e.which === 27)
			$("#security_input-BG").remove();
	});
	$(document).click(function(e)
	{
		if($("#security_input-BG").length !== 0 && e.srcElement === $("#security_input-BG")[0])
				$("#security_input-BG").remove();
	})
}
//END OF SECURITY INPUT

// GUIDE
function ShowGuide(object,guide)
{
	$('body').prepend('<div class="guide-container"></div>');
	$('.guide-container').html(guide);
	var posX = object.offset().left - $(window).scrollLeft();
	var posY = object.offset().top - $(window).scrollTop();
	if(posY-55 > 0)
	{
		if(posX + 90 < $('body').width())
		{
			$('.guide-container').addClass('guide-container-bottom-left-arrow');
			$('.guide-container').css({'top':posY-55,'left':posX-5});
		}
		else
		{
			$('.guide-container').addClass('guide-container-bottom-right-arrow');
			$('.guide-container').css({'top':posY-55,'left':posX-85});
		}
	}
	else
	{
		if(posX + 90 < $('body').width())
		{
			$('.guide-container').addClass('guide-container-up-left-arrow');
			$('.guide-container').css({'top':posY+40,'left':posX-5});
		}
		else
		{
			$('.guide-container').addClass('guide-container-up-right-arrow');
			$('.guide-container').css({'top':posY+55,'left':posX-80});
		}
	}
}

function DisplayLoadingBar(title)
{
	$('.loading-BG').remove();
	$('body').css('overflow-y','hidden');
	var content = '<div class="loading-BG">';
	content += '<div class="container">';
	if(typeof(title) !== "undefined")
		content += '<div class="header"><div>'+title+'</div></div>';
	content += '<div class="loading-body"><center><img src="' + base_url + 'ICONS/loading.gif"></center></div>';
	content += '</div>';
	content += '</div>';
	$('body').prepend(content);
}
function RemoveLoadingBar()
{
	$('.loading-BG').remove();
	$('body').css('overflow-y','scroll');
}

function HideGuide()
{
	$('.guide-container').remove();
}
function GuideEvt(object,message)
{
	object.mouseover(function()
	{
		ShowGuide($(this),message);
	})
	object.mouseleave(HideGuide);
}
// END OF GUIDE

// MESSAGE //

function ShowMessage(title,message,methodname)
{
	$('.message-BG').remove();
	var content = '<div class="message-BG">';
	content += '<div class="message-container">';
	content += '<div class="message-header">'+title+'';
	content += '<button class="b_btn btn-default">X</button>';
	content += '</div>';
	content += '<div class="message-content">';
	content += '<div class="message"></div>';
	content += '<div class="message-buttons">';
	content += '<button class="btn-primary btn-okay">Okay</div>';
	content += '</div>';
	content += '</div>';
	content += '</div>';

	$('body').prepend(content);
	$('.message').html(message);
	$('.message-buttons button').focus();
	$('.message-content .buttons').click(function()
	{
		$('.message-BG').remove();
		if(typeof methodname !== 'undefined')
			window[methodname]();
	});
	$('.message-BG').click(function()
	{
		$('.message-BG').remove();
		if(typeof methodname !== 'undefined')
			window[methodname]();
	});
	$(document).keydown(function(e)
	{
		if(e.keyCode === 27 && $('.message-BG').length !== 0)
		{
			$('.message-BG').remove();
			if(typeof methodname !== 'undefined')
				window[methodname]();
		}
	});
}
// END OF MESSAGE

// CONFIRMATION MESSAGE //
function ShowConfirmation(message,method,parameter)
{
	current_form = "confirmation-form";
	$('.confirmation-BG').remove();
	var content = '<div class="confirmation-BG">';
	content += '<div class="confirmation-container">';
	content += '<div class="confirmation-header">';
	content += '<button class="btn-close close-confirmation-btn">X</div>';
	content += '<div class="confirmation-content">';
	content += '<div class="confirmation-message">';
	content += message;
	content += '</div>';
	content += '<div class="confirmation-buttons">';
	content += '<button class="btn-primary btn-yes"> Yes </button>';
	content += '<button class="btn-primary btn-no"> No </button>';
	content += '</div>';
	content += '</div>';
	content += '</div>';
	content += '</div>';
	content += '</div>';
	$('body').prepend(content);
	$('.confirmation-container .btn-yes').focus();
	$(document).click(function(object)
	{
		if(object.target.className === 'confirmation-BG')
			$('.confirmation-BG').remove();
	})
	$('.confirmation-container button').click(function()
	{
		$('.confirmation-BG').remove();
	})
	$('.confirmation-buttons .btn-yes').click(function()
	{
		if(typeof method !== 'undefined')
		{
			current_form = "";
			if(typeof parameter !== 'undefined')
				window[method](parameter);
			else
				window[method]();
		}
	});
	$(document).keydown(function(e)
	{
		if(e.keyCode === 27 && $('.confirmation-BG').length !== 0)
		{
			current_form = "";
			$('.confirmation-BG').remove();
		}
	});
}
// END OF CONFIRMATION MESSAGE