
$(document).ready(function() {

	var messageID;
	getInbox();
	function getInbox() {

		$("#table-inbox tbody:not(:first-child)").remove();
		$.post(base_url + "messages/getMessages",{code:0},
			function(data) {

				messageID = data.messageID;
				$("#table-inbox").append(data.results);
				GuideEvt($(".delete-icon"),"Delete Messages");
				$(".chDelete").change(function() {

					$("#btn-delete").css('display','block');

				})
				$("#chAll").click(function() {

					for(var x in $(".chDelete")) {
						$(".chDelete")[x].checked = $("#chAll")[0].checked;
					}

				});
				$("#btn-delete").click(function() {

					var selected = 0;
					for(var x in $(".chDelete")) {
						if($(".chDelete")[x].checked){
							selected++;
						}
					}
					if(selected) {
						var c = confirm("Are you sure you want to delete selected conversation(s)?");
						if(c) {
							deleteMessages();
						}
					} else {
						ShowMessage("Warning","No conversation(s) selected");
					}

				});

			},'JSON');

	}
	function deleteMessages() {

		var selectedID = [];
		for(var x in messageID) {
			if($(".chDelete")[x].checked) {
				selectedID[selectedID.length] = messageID[x];
			}
		}
		$.post(base_url + 'messages/deleteMessages',{messageID:selectedID},
			function(data) {

				if(data.success) {
					ShowMessage('Message','Successfully deleted message');
					getInbox();
				} else {
					ShowMessage("Error","Failed to delete messages please try again");
				}
				
			},'JSON');

	}
	
});


function viewConversations(id) {
	
	location.href = base_url + "messages/conversations/" + id;
	
}