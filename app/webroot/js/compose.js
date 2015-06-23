
var selectedIndex = 1;
var total = 0;
var recipientArray = [];

$(document).ready(function() {

	$("#btn-send").click(sendRequest);
	$("#txt-recepient").keyup(function(e) {
	
		if(e.which !== 13 && e.which !== 38 && e.which !== 40) {
			showAutoComplete();
		}

	});
	$("#frm-message").submit(function() { 

		return false;

	});

	$(document).keyup(function(e) {

		if ($("#auto-complete").css('display') === "block" && total > 0) {
			if (e.which === 38) {
				if (selectedIndex === 1) {
					selectedIndex = total;
				} else {
					selectedIndex--;
				}
				$("#auto-complete li").removeClass('selected');
				$("#auto-complete li:nth-child("+(selectedIndex)+")").addClass('selected');
			}
			else
			if(e.which === 40) {
				if(total === selectedIndex) {
					selectedIndex = 1;
				} else {
					selectedIndex++;
				}
				$("#auto-complete li").removeClass('selected');
				$("#auto-complete li:nth-child("+(selectedIndex)+")").addClass('selected');
			}
			if(e.which === 13) {
				$("#message-container span").html("");
				$("#txt-recepient").val(recipientArray[selectedIndex-1].User.name);
				$("#recipient-id").val(recipientArray[selectedIndex-1].User.id);
				selectedIndex = 1;
				$("#auto-complete").css('display','none');
			}
		}

	})

	function showAutoComplete() {

		if ($("#txt-recepient").val().length > 0) {
			$.post(base_url + "Messages/suggestUsers",{name:$("#txt-recepient").val()},
				function(data) {

					total = data.total;
					recipientArray = data.recipient_array;
					if (data.total) {
						$("#auto-complete").html(data.result);
						$("#auto-complete").css({"margin-left":$("#txt-recepient").offset().left + "px",
												 "margin-top":$("#txt-recepient").offset().top + 34 + "px",
												 "width":$("#txt-recepient").width(),
												 "display":"block"});
						$("#auto-complete li:nth-child("+(selectedIndex)+")").addClass('selected');
						selectedIndex = 1;
					} else {
						$("#auto-complete").css("display","none");
					}
				},'JSON');
			
		} else {
			$("#auto-complete").css("display","none");
		}

	}

	function sendRequest() {

		$("#btn-send").html('Sending...');
		$("#btn-send").attr('disabled','disabled');
		$.post("sendMessage",$("#frm-message").serialize(),
			function(data) {

				$("#btn-send").html('Send');
				$("#btn-send").removeAttr('disabled');
				$("#message-container span").html("");
				if (!data.errors) {
					$("#recipient-id").val("");
					$("#txt-recepient").val("");
					$("#content-message").val("");
					location.href = "inbox";
				} else {
					for (var field in data.errors) {
						$(".lbl-" + field + "-error").html(data.errors[field][0] + ", ");
					}
				}
			},'JSON');

	}

});

function selectRecipient(name, id) {

	$("#recipient-id").val(id);
	$("#txt-recepient").val(name);
	$("#auto-complete").css("display","none");

}
function hoveRecipient(index) {

	selectedIndex = index;
	$("#auto-complete li").removeClass('selected');
	$("#auto-complete li:nth-child("+(parseInt(selectedIndex)+1)+")").addClass('selected');

}