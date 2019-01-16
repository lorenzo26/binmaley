<nav class="navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row nav_color">
  <div class="navbar-menu-wrapper d-flex align-items-center">
    <button class="navbar-toggler navbar-toggler d-none d-lg-block navbar-dark align-self-center mr-3" type="button" data-toggle="minimize">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div  class="logo_dash">
          <img src="<?=base_url()?>assets/images/logo2.png" width="200px" style="background: rgba(120,174,102,.1);">
        </div>
    <ul class="navbar-nav ml-lg-auto d-flex align-items-center flex-row">
      <li class="nav-item">
        <div class="dropdown">
          <a class="nav-link profile-pic btn btn-primary dropdown-toggle drop_user_name"  data-toggle="dropdown" href="#">
            <img class="rounded-circle" src="<?=base_url()?>assets/images/face.jpg" alt="">
            <span>
              <?= !empty($_SESSION['logged_in']['user_profile']['firstname']) ? $_SESSION['logged_in']['user_profile']['firstname'] : $_SESSION['logged_in']['email'] ?>
            </span>
          </a>
          <ul class="dropdown-menu dropdown-menu-right drop_user">
            <li class="user-header">
              <img src="<?=base_url()?>assets/images/face.jpg" class="img-circle" alt="User Image">
              <p>
                <?= !empty($_SESSION['logged_in']['user_profile']['fullname']) ? $_SESSION['logged_in']['user_profile']['fullname'] : $_SESSION['logged_in']['email'] ?>
                <br>
                <small>
                  <?php 
                    if(!empty($_SESSION['logged_in']['user_profile']['position'])):
                      echo $_SESSION['logged_in']['user_profile']['position'];
                    else:
                      if($_SESSION['logged_in']['userlevel']==1) echo 'administrator'; 
                    endif;
                  ?>
                </small>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a data-toggle="modal" data-target="#my_profile" class="btn btn-secondary">Edit Profile</a>
              </div>
              <div class="pull-right">
                <a href="<?=base_url()?>authentication/logout" class="btn btn-secondary">Sign out</a>
              </div>
            </li>
          </ul>
        </div>
      </li>
    </ul>
     <div class="logo_dash2" style="display: none">
          <img src="<?=base_url()?>assets/images/logo2.png" width="200px" style="background: rgba(120,174,102,.1);">
      </div>
    <button class="navbar-toggler navbar-dark navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
</nav>