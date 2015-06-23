$(document).ready(function(){

	$("#btn-update").click(update);
	$("#form-profile").submit(function() {

		update();
		return false;

	});
	
	$("#btn-browse").click(function() {

		$("#file").click();
	
	});
	$("#file").change(function() {

		var ext = $("#file")[0].files[0].name.split('.')[1];
		if($("#file")[0].files[0].type.split('/')[0] === "image" && 
			(ext === "jpg" || ext === "jpeg" || ext === "png" || ext === "gif")) {
			var imageLocation = URL.createObjectURL($("#file")[0].files[0]);
			$("#users-image")[0].src = imageLocation;
		}

	})
	$('#birthdate')
	    .datepicker({
	        format: 'mm/dd/yyyy',
	        startDate: '01/01/1900',
	        endDate: '12/30/2020'
	    })
	    .on('changeDate', function(e) {
	
	        $('#dateRangeForm').formValidation('revalidateField', 'date');
	
	    });

});

function reload() {

	location.href = 'profile';

}

function update() {

    var fd = new FormData();
    fd.append("name",$("#name").val());
    fd.append("birthdate",$("#birthdate input").val());
    fd.append("hubby",$("#hubby").val());
    fd.append("male",$("input[type='radio'][name='gender']:checked").val());
    if($("#file")[0].files.length) {
	    fd.append("file",$("#file")[0].files[0]);
    }
     $.ajax({
            type:'POST',
            url: base_url + "main/updateProfile",
            data:fd,
            cache:false,
            contentType: false,
            processData: false,
            success:function(errors){

            	var errors = JSON.parse(errors);
            	if(errors) {
					var errorsTxt = "";
					for(var field in errors) {
						errorsTxt += errors[field][0] + ",<br>";
					}
					$("#lbl-errors").html(errorsTxt);
				} else {
					alert('Update Successful');
					//ShowMessage("Message","Successfully update profile","reload");
				}

            }
        });
}
