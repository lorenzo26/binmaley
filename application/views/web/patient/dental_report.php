 <div class="content-wrapper">
    <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-primary">
                       <img src="<?=base_url()?>assets/images/icons/toothache_report.png" alt="" width="70px">
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Toothache</p>
                      <h4 class="bold-text" style="text-align: right;"><?=$ta?></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-primary">
                       <img src="<?=base_url()?>assets/images/icons/bad_breath_report.png" alt="" width="70px">
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Bad Breath</p>
                      <h4 class="bold-text" style="text-align: right;"><?=$bb?></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-warning">
                        <img src="<?=base_url()?>assets/images/icons/gums_report.png" alt="" width="70px">
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Bleeding Gums</p>
                      <h4 class="bold-text" style="text-align: right;"><?=$bg?></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-success">
                        <img src="<?=base_url()?>assets/images/icons/decayed_tooth_report.png" alt="" width="70px">
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Decayed Tooth</p>
                      <h4 class="bold-text" style="text-align: right;"><?=$dt?></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 mb-4">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left">
                      <h4 class="text-success">
                        <img src="<?=base_url()?>assets/images/icons/reports.png" alt="" width="70px">
                      </h4>
                    </div>
                    <div class="float-right">
                      <p class="card-text text-dark">Others</p>
                      <h4 class="bold-text" style="text-align: right;"><?=$others?></h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="row">
            <div style="width: 100%">
                <div class="pull-right"><a href="<?=base_url()?>export_excel/export_report_dental" class="btn btn-success add-btn" ><i class="fa fa-file-excel-o"></i> Export</a></div>
                <h3>Dental Patients <small>(<?=date('M'). ' ' . date('Y')?>)</small></h3>
            </div>
            <br><br>
            <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                  <button  class="dropdown-item" data-toggle="modal" data-target="#filter_modal" style="background: #58d8a3; width: 150px; position: absolute; top: 0; right: 0; margin-right: 20px;">Advance Search</button>
                    <form id="search_form"><input type="text" name="search_lastname" class="last_search" style="float: right;"><span style="float: right;">SEARCH:</span></form>
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Birthdate</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <?php if(isset($patients)): ?>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Birthdate</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Address</th>
                                <th>Options</th>
                            </tr>
                        </tfoot>
                        <?php endif;?>
                        <tbody>
                            <?php if(isset($patients)): ?>
                            <?php foreach($patients as $patients): ?>
                            <tr>
                                <td><?=$patients['lastname'].', '.$patients['firstname'];?></td>
                                <td><?=$patients['birthdate']?></td>
                                <td><?=date_diff(date_create($patients['birthdate']),date_create(date('Y-m-d')))->format('%y')?></td>
                                <td><?=$patients['gender']?></td>
                                <td><?=$patients['address']?></td>
                                <td>
                                    <div class="dropdown">
                                      <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                        Options
                                      </button>
                                      <div class="dropdown-menu">
                                        <a class="dropdown-item open_modal" data-toggle="modal" data-id="<?=$patients['patientid']?>" data-target="#view_patient_mod"><i class="fa fa-eye"></i> View</a>
                                        <a class="dropdown-item" href="<?=base_url().'patient/history/'.$patients['patientid'] ?>"><i class="fa fa-edit"></i> View Records</a>
                                      </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach;?>
                            <?php else: ?>
                              <tr>
                                <td colspan="6"> No Patient </td>
                              </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                  </div>
                </div>
            </div>
          
          </div>
        </div>

      <div class="modal fade" id="view_patient_mod">
          <div class="modal-dialog  modal-md">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title" v-html="modal_title">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>

              <!-- Modal body -->
              <div class="modal-body">
                <div class="view_patient">
                  <div class="mod_cont">
                    <div><h6 class="mod_cont_label">Information</h6></div>
                    <div>
                      Name: <span>{{ modal_content.firstname +' ' + modal_content.middlename+' ' + modal_content.lastname }}</span>
                    </div>
                    <div class="col_2">
                      <div>
                        Birthday: <span>{{ modal_content.birthdate }}</span>
                      </div>
                      <div>
                        Gender: <span>{{ modal_content.gender }}</span>
                      </div>
                    </div>
                    <div>
                      Mother's Maiden Name: <span>{{ modal_content.mother_maidenname }}</span>
                    </div>
                    <div>
                        Blood Type: <span>{{ modal_content.blood_type }}</span>
                    </div>
                    <div>
                        Contact No: <span>{{ modal_content.contact_number }}</span>
                    </div>
                    <div>
                        Address: <span>{{ modal_content.address }}</span> 
                    </div>
                  </div>
                  <div class="mod_cont">
                    <div><h6 class="mod_cont_label">Vital Signs</h6></div>
                    <div class="col_2">
                      <div>
                        Height: <span>{{ modal_content.height }} cm</span>
                      </div>
                      <div>
                        Weight: <span>{{ modal_content.weight }} kg</span>
                      </div>
                    </div>
                    <div class="col_2">
                      <div>
                        BP: <span>{{ modal_content.bp }}</span>
                      </div>
                      <div>
                        HR: <span>{{ modal_content.hr }}</span>
                      </div>
                    </div>
                    <div class="col_2">
                      <div>
                        RR: <span>{{ modal_content.rr }}</span>
                      </div>
                      <div>
                        Temperature: <span>{{ modal_content.temp }} &#176;C</span>
                      </div>
                    </div>
                  </div>
                  <div class="mod_cont">
                    <div><h6 class="mod_cont_label">Complaint</h6></div>
                    <div v-for="(comp,key) in modal_content.complaint"><span v-html="'<i>'+ (key+1) + '.</i>   '+ comp"></span></div>
                  </div>
                </div>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <!-- <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-file-excel-o"></i> Export Patient Info</button> -->
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>

            </div>
          </div>
        </div>
        <div class="modal fade" id="filter_modal">
          <div class="modal-dialog  modal-md">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" >Advance Search</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <form id="frm_adv_search">
                <div class="modal-body">
                  Blood Type:
                  <select class="form-control" name="blood_type">
                    <option value="">Choose one</option>
                    <option value="A">A</option>
                    <option value="AB">AB</option>
                    <option value="B">B</option>
                    <option value="O">O</option>
                  </select>
                  Last Name:
                  <input type="text" name="search_lastname" class="form-control">
                  First Name:
                  <input type="text" name="search_firstname" class="form-control">
                </div>
                 <div class="modal-footer">
                  <button type="submit" class="btn btn-success btn_export_patient"> Search</button>
                </div>
              </form>
            </div>
            </div>
          </div>
        <script type="text/javascript">
            patients = JSON.parse('<?php print_r($json_patients)?>')
        </script>