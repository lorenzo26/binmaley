<nav class="bg-white sidebar sidebar-offcanvas" id="sidebar">
  <div class="user-info">
    <img src="<?=base_url()?>assets/images/face.jpg" alt="">
    <p class="name">
      <?= !empty($_SESSION['logged_in']['user_profile']['fullname']) ? $_SESSION['logged_in']['user_profile']['fullname'] : $_SESSION['logged_in']['email'] ?>
    </p>
    <p class="designation">
      <?php 
        if(!empty($_SESSION['logged_in']['user_profile']['position'])):
          echo $_SESSION['logged_in']['user_profile']['position'];
        else:
          if($_SESSION['logged_in']['userlevel']==1) echo 'administrator'; 
        endif;
      ?>
    </p>
    <span class="online"></span>
  </div>
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="<?=base_url()?>">
        <img src="<?=base_url()?>assets/images/icons/1.png" alt="">
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
   
     <li class="nav-item">
      <a class="nav-link" href="<?=base_url()?>user">
        <img src="<?=base_url()?>assets/images/icons/users_list.png" alt="">
        <span class="menu-title">All Users</span>
      </a>
    </li>
  </ul>
</nav>