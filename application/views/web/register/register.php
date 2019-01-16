<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Register</title>
  <link rel="stylesheet" href="<?=base_url()?>assets/node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="icon" type="image/png" href="<?=base_url()?>assets/images/logo.png">
  <!-- <link rel="stylesheet" href="../node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" /> -->
  <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css" />
   <link rel="stylesheet" href="<?=base_url()?>assets/css/mystyle.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.6/sweetalert2.min.css">
</head>

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
              <h3 class="card-title text-left mb-3">Register</h3>
              <form id="frm_register">
                <div class="input-group">
                  <span class="input-group-addon" id="pass">
                    <img src="<?=base_url()?>assets/images/icons/users.png" alt="" width="18px">
                  </span>
                   <input type="text" name="username" class="form-control p_input" placeholder="Username">
                </div><br>
                 <div class="input-group">
                  <span class="input-group-addon" id="pass">
                    <img src="<?=base_url()?>assets/images/icons/006-letter.png" alt="" width="18px">
                  </span>
                   <input type="email" name="email" class="form-control p_input" placeholder="Email">
                </div><br>
                 <div class="input-group">
                  <span class="input-group-addon" id="pass">
                    <img src="<?=base_url()?>assets/images/icons/020-locked.png" alt="" width="18px">
                  </span>
                   <input type="password" name="password" class="form-control p_input pw1" placeholder="Password">
                </div><br>
                 <div class="input-group">
                  <span class="input-group-addon" id="pass">
                    <img src="<?=base_url()?>assets/images/icons/020-locked.png" alt="" width="18px">
                  </span>
                   <input type="password" class="form-control p_input pw2" placeholder="Repeat Password">
                </div><br>
                <div class="text-center log_btn">
                  <button type="submit" class="btn btn-primary btn-block enter-btn">REGISTER</button>
                </div>
                <p class="existing-user text-center pt-4 mb-0">Already have an acount?&nbsp;<a href="<?=base_url()?>">Sign up</a></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="<?=base_url()?>assets/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="<?=base_url()?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- <script src="../node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script> -->
  <script src="<?=base_url()?>assets/js/misc.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $(document)
        .on('submit', '#frm_register', function(e){
          e.preventDefault();
          isEmpty = pw_length = false;
          pw1 = pw2 = "";
          console.log($('input[name=username]').val().length  );
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
              // alert("please fill up all the fields");
               swal("Warning!", "Please fill up all the fields", "warning")
            }
            else{
              if(pw_length == true){
                // alert("password must be atleast 6 characters!");
                swal("Info!", "Password must be atleast 6 characters!", "info")
              }
              else if(pw1 != pw2){
                // alert("password did not match!");
                 swal("Error!", "Password did not match!", "error")
              }
              else{
                $.ajax({
                  type: 'POST',
                  url: '<?=base_url()?>register/validate_registration',
                  data: $('#frm_register').serialize(),
                  cache: false,
                  dataType: 'json',
                  success: function(response){
                    if(response.status == 'Success'){
                      // alert(response.message);
                       swal("Success!", "User has been saved. Please contact admin to activate your account.", "success")
                    }
                    else{
                      // alert(response.message)
                      swal("Error!", "Username has been used!", "error")
                    }
                  },
                  error: function(response) {
                    // alert("");
                     swal("Error!", "Something went wrong!", "error")
                  }
                });
              }
            }
          });
        })
    });
  </script>
</body>

</html>
