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
	        alert(e);
	
	    });

});

function reload() {

	location.href = 'profile';

}

function update() {


	var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();

		if(dd<10) {
		    dd='0'+dd
		} 

		if(mm<10) {
		    mm='0'+mm
		} 

		today = yyyy+'-'+mm+'-'+dd;


	var dateParts = $("#birthdate").val().split(/(\d{1,2})\/(\d{1,2})\/(\d{4})/);
  	var dateFinal =  dateParts[3] + "-" + dateParts[1] + "-" + dateParts[2];

    var fd = new FormData();
    fd.append("name",$("#name").val());
    fd.append("birthdate",dateFinal);
    fd.append("hubby",$("#hubby").val());
    fd.append("male",$("input[type='radio'][name='gender']:checked").val());
    if($("#file")[0].files.length) {
	    fd.append("file",$("#file")[0].files[0]);
    }
    if(today < dateFinal)
    {
    	alert('Invalid Birthdate');
    }
    else
    {
     $.ajax({
            type:'POST',
            url: base_url + "main/updateProfile",
            data:fd,
            cache:false,
            contentType: false,
            processData: false,
            success:function(errors){
            	//alert(errors);

            	var errors = JSON.parse(errors);
            	//alert(errlengths);

            	if(errors == '1' || errors == "") {
						
						
						window.location.href = '/main/profile';

				}
				else
				{
					var errorsTxt = "";
					for(var field in errors) {
						errorsTxt += errors[field][0] + ",<br>";
					}
					$("#lbl-errors").html(errorsTxt);
				}

			

            }
        });
 	}
}
