 <div class="content-wrapper">
    <div>
        <?php $patient_id = $patient['id']; ?>
        <?php if(empty($patient[$patient_id])): ?>
          <?php if($comp_type == 'dental' || $comp_type == 'midwife' || $comp_type =='other'): ?>
            <h1>New Patient <small><?=ucfirst(strtolower($comp_type))?></small></h1>
          <?php else: ?>
            <h1>New Patient</h1>
          <?php endif; ?>
        <?php else: ?>
          <?php if($comp_type == 'dental' || $comp_type == 'midwife' || $comp_type =='other'): ?>
            <h1>Add Patient <small><?=ucfirst(strtolower($comp_type))?></small></h1>
          <?php else: ?>
            <h1>Update Patient Info</h1>
          <?php endif; ?>
        <?php endif; ?>
    </div>
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body form-patient">
                  <form class="form-sample" id="frm_addPatient">
                    <label for="name">Name</label>
                    <div class="row">
                      <div class="form-group col-lg-4 col-xl-4 col-md-4">
                        <input oncopy="return false;" type="text" name="lastname" class="form-control p-input name_cl" placeholder="Last Name" value="<?php echo !empty($patient[$patient_id])?$patient[$patient_id]['lastname']:'' ?>" />
                      </div>
                      <div class="form-group col-lg-4 col-xl-4 col-md-4">
                        <input type="text" name="middlename" class="form-control p-input name_cl" placeholder="Middle Name" value="<?php echo !empty($patient[$patient_id])?$patient[$patient_id]['middlename']:'' ?>"/>
                      </div>
                      <div class="form-group col-lg-4 col-xl-4 col-md-4">
                        <input type="hidden" name="patientid" value="<?php echo !empty($patient[$patient_id])?$patient[$patient_id]['patientid']:'' ?>"/>
                        <input type="hidden" name="vitals_id" value="<?php echo !empty($patient[$patient_id])?$patient[$patient_id]['id']:'' ?>"/>
                        <input type="text" name="firstname" class="form-control p-input name_cl" placeholder="First Name" value="<?php echo !empty($patient[$patient_id])?$patient[$patient_id]['firstname']:'' ?>" /> 
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-lg-6 col-xl-6 col-md-6">
                        <label>Birthday</label>
                        <input type="date" name="birthdate" class="form-control p-input"  value="<?php echo !empty($patient[$patient_id])?$patient[$patient_id]['birthdate']:'' ?>" />
                      </div>
                      <div class="form-group col-lg-6 col-xl-6 col-md-6 row">
                        <label>Gender</label>
                        <?php if($comp_type != 'midwife'): ?>
                        <div class="form-radio col-lg-4 col-md-4 col-xl-4 col-sm-4 col-xs-4">
                          <label>
                            <input name="gender" value="Male" type="radio" <?php echo !empty($patient[$patient_id])? ($patient[$patient_id]['gender'] == 'Male')? 'checked': '' :'checked' ?> />
                              Male
                            <i class="input-helper"></i></label>
                        </div>
                      <?php endif?>
                        <div class="form-radio col-lg-4 col-md-4 col-xl-4 col-sm-4 col-xs-4">
                          <label>
                            <input name="gender" value="Female" type="radio" <?php echo!empty($patient[$patient_id])? ( $comp_type == 'midwife' || $patient[$patient_id]['gender'] == 'Female')? 'checked': '' :''; echo isset($comp_type) && $comp_type == 'midwife'? 'checked': '' ?>  />
                              Female
                          <i class="input-helper"></i></label>
                        </div>
                      </div>
                    </div>
                    <div class=" row">
                      <div class="form-group  col-lg-6 col-xl-6 col-md-6">
                        <label>Blood Type</label>
                        <select class="form-control" name="blood_type">
                          <option>Select Blood type</option>
                             <option <?php echo !empty($patient[$patient_id])? ($patient[$patient_id]['blood_type'] == 'A')? 'selected': '' :'' ?> >A</option>
                            <option <?php echo !empty($patient[$patient_id])? ($patient[$patient_id]['blood_type'] == 'B')? 'selected': '' :'' ?>>B</option>
                            <option <?php echo !empty($patient[$patient_id])? ($patient[$patient_id]['blood_type'] == 'AB')? 'selected': '' :'' ?>>AB</option>
                            <option <?php echo !empty($patient[$patient_id])? ($patient[$patient_id]['blood_type'] == 'O')? 'selected': '' :'' ?>>O</option>
                        </select>
                      </div>
                      <div class="form-group  col-lg-6 col-xl-6 col-md-6">
                        <label>Contact Number:</label>
                        <input type="text" name="contact_number" class="form-control p-input" value="<?php echo !empty($patient[$patient_id])?$patient[$patient_id]['contact_number']:'' ?>" />
                      </div>
                      <div class="form-group  col-lg-12">
                        <label>Address:</label>
                        <input type="text" name="address" class="form-control p-input" value="<?php echo !empty($patient[$patient_id])?$patient[$patient_id]['address']:'' ?>"/>
                      </div>
                      <div class="form-group  col-lg-6 col-xl-6 col-md-6">
                        <label>Civil Status</label>
                        <select class="form-control" name="civilstatus">
                             <option <?php echo !empty($patient[$patient_id])? ($patient[$patient_id]['civilstatus'] == 'Single')? 'selected': '' :'' ?> >Single</option>
                            <option <?php echo !empty($patient[$patient_id])? ($patient[$patient_id]['civilstatus'] == 'Married')? 'selected': '' :'' ?>>Married</option>
                            <option <?php echo !empty($patient[$patient_id])? ($patient[$patient_id]['civilstatus'] == 'Divorced')? 'selected': '' :'' ?>>Divorced</option>
                            <option <?php echo !empty($patient[$patient_id])? ($patient[$patient_id]['civilstatus'] == 'Widowed')? 'selected': '' :'' ?>>Widowed</option>
                        </select>
                      </div>
                      <div class="form-group  col-lg-6 col-xl-6 col-md-6">
                        <label>Mother's Maiden Name:</label>
                        <input type="text" name="mother_maidenname" class="form-control p-input" value="<?php echo !empty($patient[$patient_id])?$patient[$patient_id]['mother_maidenname']:'' ?>"/>
                      </div>
                    </div>
                    <label class="spouse" for="name">Spouse</label>
                    <div class="row spouse">
                      <div class="form-group col-lg-6 col-xl-6 col-md-6">
                        <input type="hidden" name="" value=""/>
                        <input type="hidden" name="" value=""/>
                        <input type="text" name="sp_fname" class="form-control p-input" placeholder="First Name" value="<?php echo !empty($patient[$patient_id])?$patient[$patient_id]['sp_firstname']:'' ?>" /> 
                      </div>
                      <div class="form-group col-lg-6 col-xl-6 col-md-6">
                        <input type="text" name="sp_lname" class="form-control p-input" placeholder="Last Name" value="<?php echo !empty($patient[$patient_id])?$patient[$patient_id]['sp_lastname']:'' ?>" />
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6  col-xl-6 col-md-6">
                        <label><strong>Vital Sign:</strong></label>
                        </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-lg-6  col-xl-6 col-md-6">
                        <label>Blood Pressure:</label>
                        <input type="text" name="bp" class="form-control p-input " value ="120/80"  value="<?php echo !empty($patient[$patient_id])?$patient[$patient_id]['bp']:'' ?>"/>
                      </div>
                      <div class="form-group col-lg-6  col-xl-6 col-md-6 rr_div">
                        <label>Respiratory Rate:</label>
                        <div class="input-group col-lg-12">
                          <input type="text" name="rr" class="form-control p-input rr_inp"  value="<?php echo !empty($patient[$patient_id])?$patient[$patient_id]['rr']:'' ?>" />
                          <span class="input-group-addon rr_span" id="user">breath per min</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-lg-6  col-xl-6 col-md-6">
                        <label>Body Temperature:</label>
                        <div class="input-group">
                          <input type="text" name="temp" class="form-control p-input "  value="<?php echo !empty($patient[$patient_id])?$patient[$patient_id]['temp']:'' ?>" />
                          <span class="input-group-addon" id="user">&deg;C</span>
                        </div>
                      </div>
                      <div class="form-group col-lg-6  col-xl-6 col-md-6">
                        <label>Weight:</label>
                        <div class="input-group">
                          <input type="text" name="weight" class="form-control p-input " value="<?php echo !empty($patient[$patient_id])?$patient[$patient_id]['weight']:'' ?>" />
                          <span class="input-group-addon" id="user">KG</span>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-lg-6  col-xl-6 col-md-6">
                        <label>Height:</label>
                        <div class="input-group">
                          <input type="text" name="height" class="form-control p-input " value="<?php echo !empty($patient[$patient_id])?$patient[$patient_id]['height']:'' ?>" />
                          <span class="input-group-addon" id="user">cm</span>
                        </div>
                      </div>
                     <div class="form-group col-lg-6  col-xl-6 col-md-6 rr_div">
                        <label>HR:</label>
                        <div class="input-group col-lg-12">
                          <input type="text" name="hr" class="form-control p-input rr_inp"  value="<?php echo !empty($patient[$patient_id])?$patient[$patient_id]['hr']:'' ?>" />
                          <span class="input-group-addon rr_span" id="user">beats per min</span>
                        </div>
                      </div>
                    </div>
                    <?php if(empty($patient[$patient_id]) || ( !empty($patient[$patient_id]) && ($comp_type =='dental' || $comp_type =='other' || $comp_type =='midwife'))):?>
                    <label><strong>Complaint</strong></label>
                    <div class="form-group col-lg-12 col-xl-12 col-md-12">
                      <div class="row">
                        <div class="form-radio  col-lg-2 col-xl-2 col-md-2" <?php echo ($comp_type == null) || $comp_type=='dental' ? '':'style="display:none"'?>>
                          <label>
                            <input name="complaint_type" value="1" type="radio" <?php echo ($comp_type) ? ($comp_type == 'dental')? 'checked': 'style="display:none"' : 'checked' ?> class="complaint_rad" />
                            Dental
                          <i class="input-helper"></i></label>
                        </div>
                        <div class="form-radio  col-lg-2 col-xl-2 col-md-2" <?php echo ($comp_type == null) || $comp_type=='other' ? '':'style="display:none"'?>>
                          <label>
                            <input name="complaint_type" value="2" type="radio" <?php echo ($comp_type == 'other')? 'checked': '' ?> class="complaint_rad"/>
                           <span style="font-size: 11px">Phsysical Check-up</span>
                          <i class="input-helper"></i></label>
                        </div>
                        <div class="form-radio  col-lg-2 col-xl-2 col-md-2 for_female" <?php echo ($comp_type == null) || $comp_type=='midwife' ? '':'style="display:none"; data-show="hide"'?>>
                          <label>
                            <input name="complaint_type" value="0" type="radio" <?php echo ($comp_type == 'midwife')? 'checked': '' ?> class="complaint_rad"/>
                            <span style="font-size: 11px"> Prenatal Check-up</span>
                          <i class="input-helper"></i></label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="diagnosis" style="display: none;">
                        <div class="form-check com_grp">
                          <label>
                            <input name="complaint[]" value="Abdominal Pain" type="checkbox" />
                                Abdominal Pain
                            <i class="input-helper"></i>
                          </label>
                        </div>
                        <div class="form-check com_grp">
                          <label>
                            <input name="complaint[]" value="Annual PE" type="checkbox" />
                              Annual PE
                            <i class="input-helper"></i>
                          </label>
                        </div>
                        <div class="form-check com_grp">
                          <label>
                          <input name="complaint[]" value="Abscess Formation" type="checkbox" />
                                Abscess Formation
                          <i class="input-helper"></i></label>
                        </div>
                        <label for="name" class=" com_grp">Other</label>
                        <input type="text" name="other_complaint2" class="form-control p-input col-lg-12 com_grp_inp"  /> 
                      </div>
                    </div>
                      <div class="dental">
                        <div class="form-check com_grp">
                          <label>
                            <input name="complaint[]" value="Toothache" type="checkbox" >
                                Toothache
                            <i class="input-helper"></i>
                          </label>
                        </div>
                        <div class="form-check com_grp">
                          <label>
                            <input name="complaint[]" value="Decayed Tooth" type="checkbox" >
                              Decayed Tooth
                            <i class="input-helper"></i>
                          </label>
                        </div>
                        <div class="form-check com_grp">
                          <label>
                          <input name="complaint[]" value="Bad Breath" type="checkbox" >
                                Bad Breath
                          <i class="input-helper"></i></label>
                        </div>
                        <div class="form-check com_grp">
                          <label>
                          <input name="complaint[]" value="Bleeding Gum" type="checkbox" >
                                Bleeding Gum
                          <i class="input-helper"></i></label>
                        </div>
                        <label for="name" class=" com_grp">Other</label>
                        <input type="text"  name="other_complaint1" class="form-control p-input col-lg-12 com_grp_inp"  /> 
                      </div>
                      <div class="midwife  col-lg-12 col-xl-12 col-md-12 row" style="display: none;">
                        <div class="form-group col-lg-6 col-xl-6 col-md-6 row">
                        <label>First Child?</label>
                        <div class="form-radio col-lg-3 col-md-3 col-xl-3 col-sm-3 col-xs-3">
                          <label>
                            <input name="q_answer" value="Yes" type="radio" checked />
                              YES
                            <i class="input-helper"></i></label>
                        </div>
                        <div class="form-radio col-lg-3 col-md-3 col-xl-3 col-sm-3 col-xs-3">
                          <label>
                            <input name="q_answer" value="No" type="radio" />
                              No
                          <i class="input-helper"></i></label>
                        </div>
                      </div>
                       <div class="form-group col-lg-12 col-xl-12 col-md-12">
                         <div class="form-group col-lg-6  col-xl-6 col-md-6">
                        <label>Number of Child(s)</label>
                        <input type="text" name="child_count" class="form-control p-input" value="0"/>
                      </div>
                      <div class="form-group row">
                        <label>Stage of Pregnancy</label>
                        <div class="form-radio col-lg-2 col-md-2 col-xl-2 col-sm-2 col-xs-2 nchild">
                          <label>
                            <input name="pregnancy_stage" value="1" type="radio"  />
                              1st
                            <i class="input-helper"></i></label>
                        </div>
                        <div class="form-radio col-lg-2 col-md-2 col-xl-2 col-sm-2 col-xs-2 nchild">
                          <label>
                            <input name="pregnancy_stage" value="2" type="radio" />
                              2nd
                          <i class="input-helper"></i></label>
                        </div>
                        <div class="form-radio col-lg-2 col-md-2 col-xl-2 col-sm-2 col-xs-2 nchild">
                          <label>
                            <input name="pregnancy_stage" value="3" type="radio" />
                              3rd
                          <i class="input-helper"></i></label>
                        </div>
                        <div class="form-radio col-lg-3 col-md-3 col-xl-3 col-sm-3 col-xs-3 nchild-none">
                          <label>
                            <input name="pregnancy_stage" value="0" checked type="radio" />
                              none
                          <i class="input-helper"></i></label>
                        </div>
                      </div>  
                       </div>
                        <div class="form-group col-lg-6 col-xl-6 col-md-6">
                           <div class="form-check com_grp">
                          <label>
                            <input name="complaint[]" value="pap smear" type="checkbox" >
                                PAP SMEAR
                            <i class="input-helper"></i>
                          </label>
                        </div>
                        <div class="form-check com_grp">
                          <label>
                            <input name="complaint[]" value="premental check-up" type="checkbox" >
                              PREMENTAL CHECK-UP
                            <i class="input-helper"></i>
                          </label>
                        </div>
                        <div class="form-check com_grp">
                          <label>
                          <input name="complaint[]" value="ultrasound" type="checkbox" >
                                ULTRASOUND
                          <i class="input-helper"></i></label>
                        </div>
                        </div>
                        <div class="row col-lg-12 col-xl-12 col-md-12">
                        <label for="name" class=" com_grp">others</label>
                        <textarea rows="5" name="other_complaint0" class="form-control p-input col-lg-12 com_grp_inp" ></textarea> 
                      </div>
                    </div>
                    </div>
                    <?php endif; ?>
                    <div class="p-save col-lg-12 col-md-12 form-group">
                      <button class="btn btn-success mr-2">Save</button>
                    </div>
                  </form>
                </div> 
              </div>
            </div>
          </div>
      </div>

      <script type="text/javascript" src="<?=base_url()?>assets/js/jquery-1.7.1.min.js"></script>
      <script>
$('input').bind('copy paste', function(e) { e.preventDefault(); });
    function testInput(event) {
       var value = String.fromCharCode(event.which);
       var pattern = new RegExp(/[a-zåäö ]/i);
       return pattern.test(value);
    }

      $('.name_cl').bind('keypress', testInput);
        comp_type = '<?=$comp_type;?>';
        $(document)
          .on("change", ".complaint_rad",function(){
          var complaint = this.value;
          if(complaint==1){
            $(".dental").show();
            $(".diagnosis").hide();
            $(".midwife").hide();
          }else if(complaint==2){
            $(".diagnosis").show();
            $(".dental").hide();
            $(".midwife").hide();
          }else if(complaint==0){
            $(".midwife").show();
            $(".dental").hide();
            $(".diagnosis").hide();
          }
        })
        .on('click', 'input[name=gender]', function(){
          if(comp_type == ''){
            if($(this).val() == 'Female'){
              $('.for_female').fadeIn('fast');
            }
            else{
              $('.for_female').hide();
            }
          }
        })
        .on("change", 'select[name=civilstatus]', function(){
          if($(this).val() != "Single"){
            $('.spouse').fadeIn('fast');
          }
          else{
            $('.spouse').hide();
          }
        });
      $(window).on('load', function(){
        var show_mw = $('.complaint_rad[value=0]').parent().parent().attr('data-show');
        if($('input[name=gender]:checked').val() == 'Female' ){
          if( show_mw == 'hide' && typeof show_mw != 'undefined'){
            $('.for_female').hide();
          }else{
            $('.for_female').show();
          }
        }
        else{
          $('.for_female').hide();
        }
        if($('.complaint_rad:checked').val() == 1){
            $(".dental").show();
            $(".diagnosis").hide();
            $(".midwife").hide();
        }
        if($('.complaint_rad:checked').val() == 2){
            $(".diagnosis").show();
            $(".dental").hide();
            $(".midwife").hide();
        }
        if($('.complaint_rad:checked').val() == 0){
            $(".midwife").show();
            $(".dental").hide();
            $(".diagnosis").hide();
        }
        if($('select[name=civilstatus]').val() != "Single"){
            $('.spouse').fadeIn('fast');
          }
          else{
            $('.spouse').hide();
          }
      });

      </script>