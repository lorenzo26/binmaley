$(document)
	.on("submit", "#update_profile", function(W){
		W.preventDefault();
		$.ajax({
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			cache: false,
			url: base_url+ 'user/my_profile',
			success: function(response){
				if(response.status == 'Success'){
			        swal({
			          title: 'Success',
			          type: 'success',
			          html: '<p>'+response.message+'</p>',
			          showCancelButton: false,
			          confirmButtonColor: '#3085d6',
			          confirmButtonText: 'Ok!',
			          allowOutsideClick: false
			        })
			        .then(function () {
			             location.reload();
			        })
			      }
			      else{
			        swal(response.status, response.message, "warning")
			      }
			},
			error: function(response){
				swal('error', "Something went wrong! Please try again", "error")
			}
		})
	})