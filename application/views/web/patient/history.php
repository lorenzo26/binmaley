
        <div class="content-wrapper">
          <div>
              <div class="pull-right"><a href="<?=base_url()?>export_excel/export_history/<?=$patient['patientid']?>" class="btn btn-success add-btn export_patient" ><i class="fa fa-file-excel-o"></i> Export</a></div>
              <h1>Patient <small>Records</small></h1>
          </div>
          <div class="col-lg-12" style="margin-bottom: 20px;">
            <div class="card">
              <div class="card-body">
                <div class="row">
                <div class="form-group  col-lg-4 col-xl-4 col-md-4">
                  <label>Name:</label>
                  <span class="form-control history"><?=$patient['lastname'].', '.$patient['firstname'].' '.$patient['middlename']?></span>
                </div>
                <div class="form-group  col-lg-4 col-xl-4 col-md-4">
                  <label>Birthday:</label>
                  <span class="form-control history"><?=$patient['birthdate']?></span>
                </div>
                <div class="form-group  col-lg-4 col-xl-4 col-md-4">
                  <label>Gender</label>
                  <span class="form-control history"><?=$patient['gender']?></span>
                </div>
                </div>
                <div class="row">
                <div class="form-group  col-lg-4 col-xl-4 col-md-4">
                  <label>Blood Type:</label>
                  <span class="form-control history"><?=$patient['blood_type']?></span>
                </div>
                <div class="form-group  col-lg-4 col-xl-4 col-md-4">
                  <label>Contact Number:</label>
                  <span class="form-control history"><?=$patient['contact_number']?></span>
                </div>
                <div class="form-group  col-lg-4 col-xl-4 col-md-4">
                  <label>Civil Status:</label>
                  <span class="form-control history"><?=$patient['civilstatus']?></span>
                </div>
                </div>
                <div class="form-group ">
                  <label>Address:</label>
                  <span class="form-control history"><?=$patient['address']?></span>
               <!--  <?php print_r($patient) ?> -->
                </div>
                </div>
              </div>
            </div>
          <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                    <form id="search_form"><input type="text" name="search_lastname" class="last_search" style="float: right;"><span style="float: right;">SEARCH:</span></form>
                  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Complaint</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Complaint</th>
                            <th>Options</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php if(isset($history)): ?>
                        <?php foreach($history as $hist): ?>
                        <tr>
                            <td><?=$hist['consultation_date']?></td>
                            <td>
                                <?php 
                                  if($hist['type'] == 0){
                                    echo "Midwife";
                                  }
                                  elseif ($hist['type'] == 2) {
                                    echo "Others";
                                  }
                                  else{
                                    echo "Dental";
                                  }
                                ?>
                            </td>
                            <td>
                              <?php
                                $i = 1;
                                foreach($hist['complaint'] as $comp){
                                  echo $i++.". ".$comp . "<br>";
                                }
                              ?>
                            </td>
                            <td>
                              <div class="dropdown">
                                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                    Options
                                  </button>
                                  <div class="dropdown-menu">
                                    <a class="dropdown-item view_history" data-id="<?=$hist['cons_id']?>" data-toggle="modal" data-target="#view_patient_history"><i class="fa fa-eye"></i> History</a>
                                      <a class="dropdown-item" href="<?=base_url().'patient/add/'.$patient['patientid'] ?>"><i class="fa fa-edit"></i> Update</a>
                                  </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <?php else:?>
                        <tr>
                          <td colspan="4"> No record</td>
                        </tr>
                        <?php endif;?>
                        
                    </tbody>
                </table>
              </div>
       
            </div>
        </div>
      </div>
      <div class="modal fade" id="view_patient_history">
          <div class="modal-dialog  modal-md">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title" v-html="modal_title">Patient Record</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <form id="mod_patient_list">
              <!-- Modal body -->
              <div class="modal-body">
                <div>
                  
                  <div class="mod_cont">
                    <div><h6 class="mod_cont_label">Vital Signs</h6></div>
                    <div class="col_2">
                      <div>
                        Height: <span>{{ history_vw.height }} cm</span>
                      </div>
                      <div>
                        Weight: <span>{{ history_vw.weight }} kg</span>
                      </div>
                    </div>
                    <div class="col_2">
                      <div>
                        BP: <span>{{ history_vw.bp }}</span>
                      </div>
                      <div>
                        HR: <span>{{ history_vw.hr }}</span>
                      </div>
                    </div>
                    <div class="col_2">
                      <div>
                        RR: <span>{{ history_vw.rr }}</span>
                      </div>
                      <div>
                        Temperature: <span>{{ history_vw.temp }} &#176;C</span>
                      </div>
                    </div>
                  </div>
                  <div class="mod_cont">
                    <div><h6 class="mod_cont_label">Complaint</h6></div>
                    <div v-for="(comp,key) in history_vw.complaint"><span v-html="'<i>'+ (key+1) + '.</i>   '+ comp"></span></div>
                  </div>
                </div>
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
              </form>
            </div>
          </div>
        </div>
       <script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.7.1.min.js"></script>
       <script>
          var json_cons_record = JSON.parse('<?=$json_cons_record?>');
          $(document)
         // .on("click",".show",function(){
         //   $(this).addClass("hide");
         //  $(this).removeClass("show");
         //  $(this).text("show less");
         //   $(".history_tb tbody tr").not(".show_history").fadeIn();
         // })
         .on("click",".hide",function(){
           $(this).addClass("show");
          $(this).removeClass("hide");
          $(this).text("show more");
           $(".history_tb tbody tr").not(".show_history").fadeOut();
           // $(".history_tb tbody tr .show_history").fadeIn();

         })
         $('.history_tb').each(function() {
    var currentPage = 0;
    var numPerPage = 3;
    var $table = $(this);
    $table.bind('repaginate', function() {
        $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show().addClass("show_history");
    });
     $table.trigger('repaginate');
    var numRows = $table.find('tbody tr').length;
    var numPages = Math.ceil(numRows / numPerPage);
    for (var page = 0; page < numPages; page++) {
        $('<span class="page-number"></span>').text(page + 1).bind('click', {
            newPage: page
        }, function(event) {
            currentPage = event.data['newPage'];
            $table.trigger('repaginate');
            $(this).addClass('active').siblings().removeClass('active');
        })
    }
});
     

       </script>