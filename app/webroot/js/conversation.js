
var from = 0;
var checkInterval = null;
var total = 0;
var selectedMessage;
var lastMessageID = 0;
var currentLastMessageID = 0;

$(document).ready(function() {

	getConversations();

	$("#btn-show-more").click(showMore);
	$("#btn-send").click(sendMessage);
	$("#frm-message").submit(function() { 

		return false;

	});
	function getConversations() {

		$("#table-conversations tbody:last-child").before("<tbody id='td-loading'><tr><td colspan=3><center><img src='../../img/ICONS/loading.gif'></td></center></tr></tbody>");
		$.post(base_url + "messages/getConversations",{email:$("#txt-email").val(),from:from,index:lastMessageID},
			function(data) {

				if(lastMessageID === 0) {
					currentLastMessageID = parseInt(data.lastMessageID);
					lastMessageID = parseInt(data.lastMessageID);
				}
				total = data.total;
				checkNewMessages();

				$("#table-conversations tbody:last-child").before(data.results);
				$("#td-loading").remove();
				GuideEvt($(".delete-icon"),"Click to delete this message");
				GuideEvt($(".sender-img"),"View user profile");
				from += 10;
				if(from < total) {
					$("#btn-show-more").css('display','block');
				} else {
					$("#btn-show-more").css('display','none');
				}

			},'JSON');

	}

	function showMore() {

		getConversations();

	}
	function sendMessage() {

		$("#btn-send").html('Sending...');
		$("#btn-send").attr('disabled');
		$.post(base_url + "messages/sendMessage",$("#frm-message").serialize(),
		function(data) {

			$("#txt-message").val("");
			$("#btn-send").html('Send');
			$("#btn-send").removeAttr('disabled');
			if(data.errors) {
				ShowMessage('Warning',data.errors['content'][0]);
			}

		},'JSON');

	}

});

function checkNewMessages() {

	clearInterval(checkInterval);
	checkInterval = setTimeout('checkNewMessages()',5000);
	$.post(base_url + "messages/checkNewMessages",{email:$("#txt-email").val(), index:currentLastMessageID},
		function(data) {

			currentLastMessageID = parseInt(data.lastMessageID);
			$("#table-conversations tbody:nth-child(2)").after(data.results);

		},'JSON');

}

function deleteConfirmation(id,container) {

	selectedMessage = container.parent().parent();
	ShowConfirmation("Are you sure you want to delete this message","deleteMessage",{'id':id});

}

function deleteMessage(info) {

	$.post(base_url + "messages/deleteMessage",{id:info.id},
		function(data) {

			if(data.success) {
				ShowMessage("Message","Successfully deleted message");
				selectedMessage.fadeOut();
			}

		},'JSON');

}