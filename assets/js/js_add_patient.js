$('#frm_addPatient').on('submit', function(e){
    e.preventDefault();
	var data = $(this).serialize();
	$.ajax({
		type 	 : 'POST',
		data 	 : data,
		dataType : 'json',
		url 	 : base_url + 'patient/save',
		success : function(response){
			if(response.status == 'Success'){
        swal({
          title: 'Success',
          type: 'success',
          html: '<p>'+response.message+'</p>',
          showCancelButton: false,
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Ok',
          allowOutsideClick: false
        })
        .then(function () {
             location.reload();
        })
      }
      else{
        swal(response.status, response.message, "error")
      }
		},
		error : function(response){
			swal('error', "Something went wrong", "error")
		}
	});
});