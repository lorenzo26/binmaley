$(document).ready(function(){

	$(document)
    .on("click", '.open_modal',function(){
      var userid = $(this).attr('data-id');
      modal.show_modal('view_user',userid, "View User Info")
    })
    .on("click",'.add_user', function(){

      modal.show_modal('add_user', '', "Add New User")
    })
    .on("click",'.close_modal', function(){
      console.log("sda")
      $('.modal').hide();
    })
    .on("click", '.update_user',function(){
      var userid = $(this).attr('data-id');
      modal.show_modal('update_user',userid, "Update User Status")
    })
    .on('click','.update_user_btn', function(){
      var new_stat = $('.user_account_stat').find(':selected').val();
      var userid = $('.userid').val();
      $.ajax({
        url: base_url+'user/update_user_status',
        type: 'post',
        data: {
            is_active : new_stat,
            userid    : userid
          },
        dataType: 'json',
        cache: false,
        success:function(response){
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
            swal(response.status, response.message, response.status)
          }
        },
        error: function(){
          swal('Error', "Something went wrong!", "error")
        }
      });
    })
        .on('submit', '#frm_register', function(e){
          e.preventDefault();
          isEmpty = pw_length = false;
          pw1 = pw2 = "";
          $(this).each(function(){
            $(this).find('input').each(function(){
              if($(this).val() == ""){
                isEmpty = true;
              }
              if($(this).hasClass('pw1')){
                pw1 = $(this).val();
                if($(this).val().length < 6){
                  pw_length = true;
                }
              }
              if($(this).hasClass('pw2')){
                pw2 = $(this).val();
              }
            });
            if(isEmpty == true){ 
              swal("", "Please fill up the form", "warning")
            }
            else{
              if(pw_length == true){
                swal("", "Password must be atleast 6 characters!", "warning");
              }
              else if(pw1 != pw2){
                swal("", "Password don't match!", "warning");
              }
              else{
                $.ajax({
                  type: 'POST',
                  url: base_url+'register/validate_registration',
                  data: $('#frm_register').serialize(),
                  cache: false,
                  dataType: 'json',
                  success: function(response){
                    if(response.status == 'Success'){
                      // alert(response.message);
                        swal({
                          title: 'Success',
                          type: 'success',
                          html: '<p>Success! User has been added!</p>',
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
                      swal(response.status, response.message, "error")
                      // alert(response.message);
                    }
                  },
                  error: function(response){
                    swal(response.status, "Something went wrong", "error")
                  }
                });
              }
            }
          });
        })
})
var modal = new Vue({
	el: '.modal',
	data: {
		modal_title   : 'TITLE',
		modal_content : {},
		status	 	  : 'Active',
		type		  : 'view_user'
	},
	methods: {
		show_modal: function(type, userid, title = ''){
			this.modal_title = title;
			if(userid != ''){
				this.modal_content = users[userid]
				if(users[userid].is_active == 1){
					this.status = 'Active'
				}
				if(users[userid].is_active == 0){
					this.status = 'Disabled'
				}
				if(users[userid].is_active == 2){
					this.status = 'Pending'
				}
			}
			this.type=type;
		}
	}
});
$('input').bind('copy paste', function(e) { e.preventDefault(); });