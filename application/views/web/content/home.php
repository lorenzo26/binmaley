 <div class="content-wrapper">
    <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-4">
              <a class="nav-link patient_show"  data-toggle="modal" data-target="#patients_modal" style="cursor: pointer;">
                <div class="card card-statistics">
                  <div class="card-body">
                    <div class="clearfix">
                      <div class="float-left">
                        <h4 class="text-primary">
                         <img src="<?=base_url()?>assets/images/icons/users.png" alt="" width="45px">
                        </h4>
                      </div>
                      <div class="float-right">
                        <p class="card-text text-dark">ALL PATIENTS</p>
                      </div>
                    </div>
                    <p class="text-muted">
                    </p>
                  </div>
                </div>
              </a>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-4">
              <a class="nav-link report_show"  data-toggle="modal" data-target="#patients_modal" style="cursor: pointer;">
                <div class="card card-statistics">
                  <div class="card-body">
                    <div class="clearfix">
                      <div class="float-left">
                        <h4 class="text-primary">
                         <img src="<?=base_url()?>assets/images/icons/reports.png" alt="" width="45px">
                        </h4>
                      </div>
                      <div class="float-right">
                        <p class="card-text text-dark">Reports</p>
                      </div>
                    </div>
                    <p class="text-muted">
                    </p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-4">
             <a class="nav-link service_show" data-toggle="modal" data-target="#patients_modal" style="cursor: pointer;">
                <div class="card card-statistics">
                  <div class="card-body">
                    <div class="clearfix">
                      <div class="float-left">
                        <h4 class="text-warning">
                          <img src="<?=base_url()?>assets/images/icons/nurse_icon.png" alt="" width="45px">
                        </h4>
                      </div>
                      <div class="float-right">
                        <p class="card-text text-dark">Services</p>
                      </div>
                    </div>
                    <p class="text-muted">
                    </p>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Hospital Information</h5>
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-4">
                        <p class="card-text text-muted mb-2">Name:</p>
                        <div>
                              Binmaley Infirmary                          
                        </div>
                      </div>
                      <div class="mb-4">
                        <p class="card-text text-muted mb-2">Address:</p>
                        <div>
                         
                        </div>
                      </div>
                      <div class="mb-4">
                        <p class="card-text text-muted mb-2">Established:</p>
                        <div>
                          
                        </div>
                      </div>
                      <div class="mb-4">
                        <p class="card-text text-muted mb-2">Founder:</p>
                        <div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-7 mb-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Mission And Vision</h5>
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-4">
                        <p class="card-text text-muted mb-2">Mission:</p>
                        <div>
                                                      
                        </div>
                      </div>
                      <div class="mb-4">
                        <p class="card-text text-muted mb-2">Vision:</p>
                        <div>
                         
                        </div>
                      </div>
                
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
          
          </div>
        </div>
         <!-- The Modal -->
  <div class="modal fade" id="patients_modal" style="text-align: center;">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title patient_group">All Patients</h4>
          <h4 class="modal-title report_group">Reports</h4>
          <h4 class="modal-title service_group">Services</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="row patient_group" style="display: none;">
            <div class="col-sm-6"> 
              <a href="<?=base_url()?>patient">
                <div class="row">
                  <div class="col-sm-6">
                    <img src="<?=base_url()?>assets/images/icons/other_patients.png" alt="" width="45px">
                  </div>
                  <div class="col-sm-6">
                   <p>OLD PATIENTS</p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-sm-6">
              <a href="<?=base_url()?>patient/add">
                <div class="row">
                  <div class="col-sm-6">
                    <img src="<?=base_url()?>assets/images/icons/add_patient.png" alt="" width="45px">
                  </div>
                  <div class="col-sm-6">
                    <p>NEW PATIENTS</p>
                  </div>
                </div>
              </a>
            </div>
          </div>

           <div class="row report_group" style="display: none;">
            <div class="col-sm-4"> 
              <a href="<?=base_url()?>patient/dental_report">
                <div class="row">
                  <div class="col-sm-6">
                    <img src="<?=base_url()?>assets/images/icons/dentist_report.png" alt="" width="45px">
                  </div>
                  <div class="col-sm-6">
                   <p>Dental Reports</p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-sm-4">
              <a href="<?=base_url()?>patient/midwife_report">
                <div class="row">
                  <div class="col-sm-6">
                    <img src="<?=base_url()?>assets/images/icons/midwife_report.png" alt="" width="45px">
                  </div>
                  <div class="col-sm-6">
                    <p>Midwife Reports</p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-sm-4">
              <a href="<?=base_url()?>patient/other_patients_report">
                <div class="row">
                  <div class="col-sm-6">
                    <img src="<?=base_url()?>assets/images/icons/other_patients_report.png" alt="" width="45px">
                  </div>
                  <div class="col-sm-6">
                    <p>Other Patients Reports</p>
                  </div>
                </div>
              </a>
            </div>
          </div>

          <div class="row service_group" style="display: none;">
            <div class="col-sm-4"> 
              <a href="<?=base_url()?>patient/dental">
                <div class="row">
                  <div class="col-sm-6">
                    <img src="<?=base_url()?>assets/images/icons/dentist_icon.png" alt="" width="45px">
                  </div>
                  <div class="col-sm-6">
                   <p>Dental</p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-sm-4">
              <a href="<?=base_url()?>patient/midwife">
                <div class="row">
                  <div class="col-sm-6">
                    <img src="<?=base_url()?>assets/images/icons/nurse_icon.png" alt="" width="45px">
                  </div>
                  <div class="col-sm-6">
                    <p>Prenatal</p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-sm-4">
              <a href="<?=base_url()?>patient/other_patients">
                <div class="row">
                  <div class="col-sm-6">
                    <img src="<?=base_url()?>assets/images/icons/other_patients.png" alt="" width="45px">
                  </div>
                  <div class="col-sm-6">
                    <p>Physical Check-up</p>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

<script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
  $(document).on("click",".patient_show",function(){
   $(".patient_group").show();
   $(".report_group").hide();
   $(".service_group").hide();
   $(".modal-dialog").removeClass("modal-lg").addClass("modal-md");
  })
  $(document).on("click",".report_show",function(){
   $(".patient_group").hide();
   $(".report_group").show();
   $(".service_group").hide();
   $(".modal-dialog").removeClass("modal-md").addClass("modal-lg");
  })
  $(document).on("click",".service_show",function(){
   $(".patient_group").hide();
   $(".report_group").hide();
   $(".service_group").show();
   $(".modal-dialog").removeClass("modal-md").addClass("modal-lg");
  })
</script>
