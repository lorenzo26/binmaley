<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Binmaley Infirmary</title>
  <link rel="stylesheet" href="<?=base_url()?>assets/node_modules/font-awesome/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?=base_url()?>assets/node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css" />
  <link rel="icon" type="image/png" href="<?=base_url()?>assets/images/logo.png">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/node_modules/bootstrap/dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/node_modules/DataTables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/css/style.css" />
  <link rel="stylesheet" href="<?=base_url()?>assets/css/mystyle.css" />
  <script src="<?=base_url()?>assets/js/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="<?=base_url()?>assets/css/sweetalert2.min.css">

  <?php 
    if(isset($css)):
      if(is_array($css)){
        foreach($css as $pcss):
          echo "<link href='{$pcss}' />";
        endforeach;
      }
      else{
        echo "<link href='{$css}' />";
      }
    endif;
  ?>
</head>
<body>
  	<div class="container-scroller">
	  	<?php echo (!empty($head)) ? $head : ""; ?>
	    <div class="container-fluid">
	    	<div class="row row-offcanvas row-offcanvas-right">
		    	<?php echo (!empty($side)) ? $side : ""; ?>
		        <?php echo (!empty($maincontent)) ? $maincontent : "";?>
		       	<?php echo (!empty($foot)) ? $foot : "";?>
	      	</div>
	    </div>
  	</div>
    <div class="modal fade" id="my_profile">
      <div class="modal-dialog  modal-md">
        <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4>My Profile</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form id="update_profile">
        <!-- Modal body -->
        <div class="modal-body">
            <input type="hidden" name="userid" value="<?=$_SESSION['logged_in']['userid']?>" />
          <br />
          First Name:
          <input type="text" class="form-control" name="firstname" value="<?=$_SESSION['logged_in']['user_profile']['firstname']?>" />
          Middle Name:
          <input type="text" class="form-control" name="middlename" value="<?=$_SESSION['logged_in']['user_profile']['middlename']?>" />
          Last Name:
          <input type="text" class="form-control" name="lastname" value="<?=$_SESSION['logged_in']['user_profile']['lastname']?>" />
          Position:
          <input type="text" class="form-control" name="position" value="<?=$_SESSION['logged_in']['user_profile']['position']?>" />
          Username:
          <input type="text" class="form-control" name="username" value="<?=$_SESSION['logged_in']['username']?>" />
          Password
          <input type="password" class="form-control" name="password" value="<?=$_SESSION['logged_in']['password']?>" />
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success update_myprofile">Update</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
     </div>
  </div>

  <script src="<?=base_url()?>assets/node_modules/jquery/dist/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/node_modules/popper.js/dist/umd/popper.min.js"></script>
  <script src="<?=base_url()?>assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?=base_url()?>assets/node_modules/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="<?=base_url()?>assets/node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
  <script src="<?=base_url()?>assets/js/off-canvas.js"></script>
  <script src="<?=base_url()?>assets/js/vue.js"></script>
  <script src="<?=base_url()?>assets/js/hoverable-collapse.js"></script>
  <script src="<?=base_url()?>assets/js/misc.js"></script>
  <script src="<?=base_url()?>assets/js/js_profile.js"></script>
  <script>
    base_url = '<?=base_url()?>'
    $(document).ready(function() {
    	$('#example').DataTable();
	} );

    $(document).on("change",".last_search",function(){
        $("#search_form").submit();
    })
  </script>
  <?php 
    if(isset($js)):
      if(is_array($js)){
        foreach($js as $pjs):
          echo "<script src='{$pjs}' ></script>";
        endforeach;
      }
      else{
        echo "<script src='{$js}' ></script>";
      }
    endif;
  ?>
</body>
</html>