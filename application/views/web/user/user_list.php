 <div class="content-wrapper">
    <div>
        <div class="pull-right"><button type="button" class="btn btn-success add-btn add_user" data-toggle="modal" data-target="#user_mod"><i class="fa fa-plus"></i> User</button></div>
        <h1>Users <small>All</small></h1>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form id="search_form"><input type="text" name="search_lastname" class="last_search" style="float: right;"><span style="float: right;">SEARCH:</span></form>
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Level</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Level</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach($users as $users): ?>
                        <tr>
                            <td><?=$users['userid']?></td>
                            <td><?=isset($users['fullname'])? $users['fullname'] : 'No Record'?></td>
                            <td><?=$users['email']?></td>
                            <td>
                              <?= $users['userlevel'] == 1 ? 'Admin': 'User'?>
                            </td><td>
                              <?php switch ($users['is_active']) {
                                case '2':
                                  echo "<label class='badge badge-warning' style='width:75px;margin-top:10px;'>Pending<label>";
                                  break;
                                case '1':
                                  echo '<label class="badge badge-success" style="width:75px;margin-top:10px;">Active<label>';
                                  break;
                                default:
                                  echo "<label class='badge badge-danger' style='width:75px;margin-top:10px;'>Disabled<label>";
                                  break;
                              } ?>
                            </td>
                            <td>
                               <div class="dropdown">
                                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Options
                                  </button>

                                  <div class="dropdown-menu">
                                    <a class="dropdown-item open_modal" data-toggle="modal" data-id="<?=$users['userid']?>" data-target="#user_mod"><i class="fa fa-eye"></i> View</a>
                                    <?php if($users['userid'] != $_SESSION['logged_in']['userid']):?>
                                    <a class="dropdown-item update_user" data-toggle="modal" data-id="<?=$users['userid']?>" data-target="#user_mod"><i class="fa fa-edit"></i> Update</a>
                                    <?php endif;?>
                                  </div>
                                </div>
                            </td>
                            </td>
                        </tr>
                       <?php endforeach;?>
                    </tbody>
                </table>
              </div>
            </div>
        </div>
      </div>

      <div class="modal fade" id="user_mod">
          <div class="modal-dialog  modal-md">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title" v-html="modal_title">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <div v-if="type === 'add_user' ">
                  <form id="frm_register">
                    <input type="hidden" name="is_active" value="1" />
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
                      <button type="submit" class="btn btn-block enter-btn">REGISTER</button>
                    </div>
                  </form>
                </div>
                <div v-else>
                  <div class="mod_cont">
                    <div><h6 class="mod_cont_label">Information</h6></div>
                    <div>
                      Name: <span>{{ modal_content.fullname ? modal_content.fullname : 'No Record' }}</span>
                    </div>
                    <div>
                        Email: <span>{{ modal_content.email }}</span>
                    </div>
                    <div>
                        User Name: <span>{{ modal_content.username }}</span>
                    </div>
                    <div>
                        User Level: <span>{{ modal_content.userlevel === '1'? 'Admin' : 'User' }}</span> 
                    </div>
                    <div>
                        Status: <span >{{ status }}</span><!-- v-if="type === 'view_user'" -->
                    </div>
                  </div>
                  <div id="samplang" v-if="type === 'update_user' && modal_content.userid !== '1'">
                    <input type="hidden" class="userid" :value="modal_content.userid" />
                    <select name="is_active" class="form-control user_account_stat">
                      <!-- <option value="2" >Pending</option> -->
                      <option value="1" >Active</option>
                      <option value="0" >Disabled</option>
                    </select>
                  </div>
                </div>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer" v-if="type !== 'add_user' ">
                <button type="button" v-if="type === 'update_user'" class="btn btn-success update_user_btn" data-dismiss="modal">Update</button>
                <button type="button" class="btn btn-secondary close_modal" data-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>
      

         

        <script type="text/javascript">
            base_url = '<?=base_url()?>'
            users = JSON.parse('<?php print_r($json_users)?>')
        </script>