<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <link rel="stylesheet" href="<?=base_url()?>assets/node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="icon" type="image/png" href="<?=base_url()?>assets/images/logo.png">
  <!-- <link rel="stylesheet" href="../node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" /> -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css" />
  <link rel="stylesheet" href="<?=base_url()?>assets/css/mystyle.css" />
  
  <script src="<?=base_url()?>assets/js/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="<?=base_url()?>assets/css/sweetalert2.min.css"></head>

<body class="log">
  <div class="container-scroller">
    <div class="container-fluid">
      <div class="row">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
          <div class="card col-lg-4 mx-auto login-container">
            <div class="card-body px-5 py-5 login-body">
              <div class="logo_login">
                <img src="<?=base_url()?>assets/images/logo.png">
              </div>
              <h3 class="card-title text-left mb-3">Login</h3>
              <form id="frm_login">
                <div class="input-group">
                  <span class="input-group-addon" id="user">
                    <img src="<?=base_url()?>assets/images/icons/users.png" alt="" width="18px">
                  </span>
                   <input type="text" name="username" class="form-control p_input txt_username" placeholder="Username/Email" style="back">
                </div><br>
                 <div class="input-group">
                  <span class="input-group-addon" id="pass">
                    <img src="<?=base_url()?>assets/images/icons/020-locked.png" alt="" width="18px">
                  </span>
                  <input type="password" name="password" class="form-control p_input txt_password" placeholder="Password">
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                  <!-- <div class="form-check"><label><input type="checkbox" class="form-check-input">Remember me</label></div>
                  <a href="#" class="forgot-pass">Forgot password</a> -->
                </div>
                <div class="text-center log_btn">
                  <button type="submit" class="btn btn-primary btn-block enter-btn login_btn">LOG IN</button>
                </div>
                <p class="Or-login-with my-3">Or</p>
              <!--   <a href="#" class="facebook-login btn btn-facebook btn-block">Sign in with Facebook</a>
                <a href="#" class="google-login btn btn-google btn-block">Sign in with Google+</a> -->
                <a href="<?=base_url()?>register" class="google-login btn btn-create-account btn-block">Create An Account</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="<?=base_url()?>assets/node_modules/jquery/dist/jquery.min.js"></script>
  <!-- <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script> -->
  <script src="<?=base_url()?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- <script src="../node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script> -->
  <script src="<?=base_url()?>assets/js/misc.js"></script>
  <script type="text/javascript">
    $(document).ready(function (){
      $(document)
        .on('submit', '#frm_login', function(e){
          e.preventDefault();
          var login_content = $('#frm_login').serialize();
          var pw = $('.txt_password').val();
          var un = $('.txt_username').val()

          if(un == ''){
            // alert("please enter Username!");
            swal("Error!", "Please enter Username!", "error")
          }
          else if(pw == ''){
            // alert("please enter password!")
             swal("Error!", "Please enter password!", "error")
          }
          else{
            $.ajax({
              type: 'POST',
              url: '<?=base_url()?>authentication/login',
              data: $('#frm_login').serialize(),
              dataType: 'json',
              cache: false,
              success: function(response){
                if(response.status == 'Success'){
                  // alert(response.message);
                    // swal({
                    //   title: 'Success',
                    //   type: 'success',
                    //   html: '<p>'+response.message+'</p>',
                    //   showCancelButton: false,
                    //   confirmButtonColor: '#3085d6',
                    //   confirmButtonText: 'Ok',
                    //   allowOutsideClick: false,
                    //   timer: 2000
                    // })
                    // .then(function () {
                         location.reload();
                    // })
                }
                else{
                  swal(response.status, response.message, "warning")
                  // alert(response.message);
                }
              },
              error: function(response){
                swal(response.status, response, "error")
              }
            });
          }
        })
    });

  </script>
</body>

</html>
