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
			
			//$('#divImage').show();
			$('#image-hidden').val('0');
		//	changeval();
			//$
			
		}
		else
			//$('#divImage').hide();
			//$('#divImage').append('Invalid File Format');
			$('#image-hidden').val('1');

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
function changeval()
{
	$('#divImage').show();
}

function reload() {

	location.href = 'profile';

}
function hasExtension(inputID, exts) {
    var fileName = document.getElementById(inputID).value;
   // alert(fileName);
    // if($('#divImage img').attr('src') == '/img/user_icon/user2.png')
    // 	return false;
    // // else
     return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
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
    fd.append("gender",$("#genval").val());
    fd.append("male",$("input[type='radio'][name='gender']:checked").val());
    //alert($("#file")[0].files[0]+'||');

    //alert((!hasExtension('file', ['.jpg', '.gif', '.png'])));
   // alert($('#divImage img').attr('src')+'|||'+(!hasExtension('file', ['.jpg', '.gif', '.png'])));
    

  	  var images = $('#divImage img').attr('src');
 // 	  alert(images);

    if($("#file")[0].files.length) {
	    fd.append("file",$("#file")[0].files[0]);
    }
    if(today < dateFinal)
    {
    	alert('Invalid Birthdate');
    }

    // else if(!hasExtension('file', ['.jpg', '.gif', '.png']) == true)
    // {
    // 	alert('invalid');
    // }

//(!hasExtension('file', ['.jpg', '.gif', '.png']))
	else if($('#image-hidden').val() == '1')
	{
		alert('Invalid File format');
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
