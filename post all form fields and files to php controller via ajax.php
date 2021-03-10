<div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit NCR/Issue Details</h4>
        </div>
        <div class="modal-body">
            <?php echo var_dump($data['ncrData']); ?>
            <form class="form-horizontal" id = "ncrForm" enctype="multipart/form-data"  method="post" name="createProjectForm" action="<?php echo BASE_URL . "/index.php?module=non_conformance&action=editNonConformanceDetails"; ?>">
			     
                 <input type="hidden" name="ncrId" value="<?php echo $data['ncrData']['id'];?>"/>

                <input type="hidden" id="ncr_edit_cc_notification_list" name="cc_notification_list"/>
                                <input type="hidden" name="non_source_id" value=""/>
                                <input type="hidden" name="non_source_type" value=""/>
                                <input type="hidden" name="priority" value="<?php echo $data['ncrData']['priority'];?>"/>

                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="date">Date</label>
                                    <div class="col-lg-12 col-md-4 col-sm-8">
                                        <input type="text" class="form-control" name="date" id="ncr_edit_date" value="<?php echo $data['ncrData']['date_created'];?>">
                                    </div>
                                </div>
                                
                                <!--<div class="form-group">
                                    <label class="control-label col-sm-4" for="priority">Priority</label>
                                    <div class="col-lg-12 col-md-4 col-sm-8">
                                        <select name="priority" id="ncr_edit_priority" required="true" class="form-control critical_field">
                                            <option value selected>Please select a priority</option>
                                            <option <?php /*if($data['ncrData']['priority'] == 'Low') { echo 'Selected';}?>>Low</option>
                                            <option <?php if($data['ncrData']['priority'] == 'Medium') { echo 'Selected';}?>>Medium</option>
                                            <option <?php if($data['ncrData']['priority'] == 'High') { echo 'Selected';}*/?>>High</option>
                                        </select>
                                    </div>
                                </div>-->

                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="group">Group</label>
                                    <div class="col-lg-12 col-md-4 col-sm-8">
                                        <select name="group" id="ncr_edit_non_group" required="true" class="form-control critical_field">
                                            <option value selected>Please select a group</option>
                                            <?php
                                            foreach($data['allSheqTeams'] as $group)
                                            {
                                                if($data['ncrData']['group_field'] == $group['id'])
                                                {
                                                    echo "<option selected value='{$group["id"]}'>{$group['sheqteam_name']}</option>";
                                                }
                                                else{
                                                    echo "<option value='{$group["id"]}'>{$group['sheqteam_name']}</option>";
                                                }                                                
                                            }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="type">Type</label>
                                    <div class="col-lg-12 col-md-4 col-sm-8">
                                        <select  name="type_field" id="ncr_edit_type_field" required="true" class="form-control critical_field">
                                           
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="department">Department</label>
                                    <div class="col-lg-12 col-md-4 col-sm-8">
                                        <select class="form-control selectpicker critical_field" required="true" id="ncr_edit_add_nc_department_dropdown" name="nc_department[]" multiple data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true" title="Select department(s)">
                                            <?php
                                            foreach($data['allDepartments'] as $group)
                                            {
                                                if(in_array($group['id'], $ncrDepartmentsArray))
                                                {
                                                    echo "<option selected value='{$group["id"]}'>{$group['department_name']}</option>";
                                                }
                                                else{
                                                    echo "<option value='{$group["id"]}'>{$group['department_name']}</option>";
                                                }
                                            }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group editLocationsDiv">
                                    <label class="control-label col-sm-4" for="location">Location</label>
                                    <div class="col-lg-12 col-md-4 col-sm-8">
                                        <select class = "form-control" id="ncr_edit_add_nc_location" name="add_nc_location" data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true" title="Select a location">

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="responsible_person">Responsible Person</label>
                                    <div class="col-lg-12 col-md-4 col-sm-8">
                                        <select class="selectpicker form-control" required="true" id="ncr_edit_responsible_person" name="responsible_person" data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true" title="Select a responsible person">
                                            <option disabled>Select a user</option>
                                            <?php  
                                                foreach($data['allUsers'] as $user)
                                                {
                                                    if($data['ncrData']['responsible_person'] == $user['id'])
                                                    {
                                            ?>          
                                                <option value = "<?php echo $user['id'] ?>" selected><?php echo $user['firstname']. ' '. $user['lastname'] ?></option>
                                                
                                                <?php } 
                                                else{ ?>
                                                    <option value = "<?php echo $user['id'] ?>"><?php echo $user['firstname']. ' '. $user['lastname'] ?></option>
                                                    <?php
                                                }
                                            }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="display:none;">
                                    <span class="control-label col-sm-4"></span>
                                    <div class="col-lg-12 col-md-4 col-sm-8">
                                        <select class="selectpicker form-multiselect_old" data-live-search="true" data-live-search-placeholder="Search" data-actions-box="true" title="Select a project">
                                            <option>Project 1</option>
                                            <option>Project 2</option>
                                            <option>Project 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" style="display:none;">
                                    <label class="control-label col-sm-4" for="dueDate">Due Date</label>
                                    <div class="col-lg-12 col-md-4 col-sm-8">
                                        <input type="text" class="form-control" name="dueDate" id="dueDate">
                                    </div>
                                </div>

                                <style>
                                    .mouseClick:hover{
                                        cursor: pointer;                                        
                                    }
                                     .modal-custom-h5,.mouseClick,.mouseClick h5{
                                        color:#fff;
                                        background:<?php echo $_SESSION['default_side_menu'];?>;
                                    }

                                </style>
                                <div class="modal-custom-h5 mouseClick"><span><h5>Details</h5></span></div>
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="nonConformanceDetails">Description</label>
                                    <div class="col-lg-12 col-md-4 col-sm-8">
                                        <textarea class="form-control critical_field" rows="5" required="true" name="nonConformanceDetails" id="nonConformanceDetails"><?php echo $data['ncrData']['non_conformance_details'];?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="nonConformanceDetails">Possible Risk</label>
                                    <div class="col-lg-12 col-md-4 col-sm-8">
                                        <textarea class="form-control" rows="5" name="possibleRisk" id="possibleRisk"><?php echo $data['ncrData']['possible_risk'];?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="ncr_likelihood">Likelihood</label>
                                    <div class="col-lg-12 col-md-4 col-sm-8">
                                        <select class="form-control ncr_lodge_risk_select" 
                                        id="ncr_likelihood" name="ncr_likelihood" >
                                            <option value selected>Please select a option</option>
                                            <option <?php 
                                            if($data['ncrData']['severity'] == 1){ echo 'selected';}?> value="1">Not likely to happen</option>
                                            <option <?php 
                                            if($data['ncrData']['severity'] == 2){ echo 'selected';}?> value="2">Could happen</option>
                                            <option <?php 
                                            if($data['ncrData']['severity'] == 3){ echo 'selected';}?> value="3">Quite possible to happen</option>
                                            <option <?php 
                                            if($data['ncrData']['severity'] == 4){ echo 'selected';}?> value="4">Has happen</option>
                                            <option <?php 
                                            if($data['ncrData']['severity'] == 5){ echo 'selected';}?> value="5">Almost certain to happen</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="ncr_severity">Severity</label>
                                    <div class="col-lg-12 col-md-4 col-sm-8">
                                        <select class="form-control ncr_lodge_risk_select" 
                                        id="ncr_severity" name="ncr_severity" >
                                            <option value selected>Please select a option</option>
                                            <option <?php 
                                            if($data['ncrData']['severity'] == 1){ echo 'selected';}?> value="1">Near Miss</option>
                                            <option <?php 
                                            if($data['ncrData']['severity'] == 2){ echo 'selected';}?> value="2">Minor</option>
                                            <option <?php 
                                            if($data['ncrData']['severity'] == 3){ echo 'selected';}?> value="3">Serious</option>
                                            <option <?php 
                                            if($data['ncrData']['severity'] == 4){ echo 'selected';}?> value="4">Very Serious</option>
                                            <option <?php 
                                            if($data['ncrData']['severity'] == 5){ echo 'selected';}?> value="5">Fatal</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="ncr_risk_score">Risk Score</label>
                                    <div class="col-lg-12 col-md-4 col-sm-8">
                                        <input type="text" readonly="true" class="form-control" name="ncr_risk_score" id="ncr_risk_score" value="<?php echo $data['ncrData']['risk_score'];?>">
                                    </div>
                                </div>  
                                



                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="recommended_improvement_field">Recommendations</label>
                                        <div class="col-lg-12 col-md-4 col-sm-8">
                                            <textarea class="form-control" rows="5" name="recommended_improvement_field" id="recommended_improvement_field"><?php echo $data['ncrData']['recommended_improvement_field'];?></textarea>
                                        </div>
                                    </div>
                            

                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="remedial_action">Remedial Action</label>
                                    <div class="col-lg-12 col-md-4 col-sm-8">
                                        <textarea class="form-control" rows="5" name="remedial_action" id="remedial_action"><?php echo $data['ncrData']['remedial_action_field'];?></textarea>
                                    </div>
                                </div>

                                 <div class="modal-custom-h5 mouseClick" data-toggle="collapse" data-target="#uploadsBlock"><span><h5>Uploads</h5></span></div>
                                 <div id = "uploadsBlock" class="collapse">
                                     <input type = "file" id = "files" name = "uploadPhoto[]" multiple/>
                                 </div>



                                <div id="uploads_block" class="collapse">

                                <div class="card" >
                                    <div class="card-header clearfix">Uploads <span class="panel-heading-icons">
                    <a href="#spawn_upload" id="ncr_spawn_new_upload" class="btn btn-red btn-circle"><i class="fa fa-plus"></i></a>
                 </span></div>
                                    <div class="card-body" id="file_element_block">
                                        <table width="100%" class="table table-hover file_table">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>

                                            </tr>
                                            </tbody>
                                        </table>

                                        <!--<div class="form-group">
                                            <label class="control-label col-sm-4" for="uploadPhoto">Take/Upload Photo</label>
                                            <div class="col-lg-12 col-md-4 col-sm-8">
                                                <input type="file" multiple name="uploadPhoto[]" id="uploadPhoto">
                                            <img id="non_add_image" style="width:200px;height:200px;display:none;"/>
                                            </div>
                                        </div>-->
                                    </div>
                                </div>

                            </div>


                                <div class="modal-custom-h5 mouseClick" data-toggle="collapse" data-target="#Identification_source_block"><span><h5>Identification Source</h5></span></div>
                               

                                <div id="Identification_source_block" class="collapse">

                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="group">Identification Source</label>
                                    <div class="col-lg-12 col-md-4 col-sm-8">
                                        <select name="identification_source_id" class="form-control ">
                                            <option value selected>Please select a identification source</option>
                                            <?php
                                            foreach($data['allIdentificationTypes'] as $group)
                                            {
                                                if($data['ncrData']['identification_source_id'] == $group['id'])
                                                {
                                                    echo "<option selected value='{$group["id"]}'>{$group['type_name']}</option>";    
                                                }
                                                else
                                                {
                                                    echo "<option value='{$group["id"]}'>{$group['type_name']}</option>";
                                                }
                                                
                                            }?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="description">Description</label>
                                    <div class="col-lg-12 col-md-4 col-sm-8">
                                        <textarea class="form-control" rows="5" name="identification_source_description"><?php echo $data['ncrData']['identification_source_description'];?></textarea>
                                    </div>
                                </div>


                            </div>



                            <div class="modal-custom-h5 mouseClick" data-toggle="collapse.show" data-target="#ncr_edit_loss_block"><span><h5>Potential Loss</h5></span></div>

                            <div id="ncr_edit_loss_block" class="collapse.show">

                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="potential_loss">Financial (R)</label>
                                    <div class="col-lg-12 col-md-4 col-sm-8">
                                        <input type="text" class="form-control" name="potential_loss" placeholder="" value="<?php echo $data['ncrData']['potential_loss'];?>">
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="potential_time">Time (Hr)</label>
                                    <div class="col-lg-12 col-md-4 col-sm-8">
                                        <input type="text" class="form-control" name="potential_time" placeholder="" value="<?php echo $data['ncrData']['potential_time'];?>">
                                    </div>
                                </div>

                                 <div class="form-group">
                                    <label class="control-label col-sm-4" for="potential_description">Possible Loss Description</label>
                                    <div class="col-lg-12 col-md-4 col-sm-8">
                                        <textarea class="form-control" rows="5" name="potential_description" ><?php echo $data['ncrData']['potential_description'];?></textarea>
                                    </div>
                                </div>

                            </div>
                            
                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button  name="addNonConformanceBtn" class="btn btn-success">Update Non-Conformance</button>
                                    </div>
                                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>

<script>
    $('button[name = addNonConformanceBtn]').on('click', function(e){
        e.preventDefault();
        //var formData = $('#ncrForm').serialize();
        var formData = new FormData();
        //var files = $('#files').prop('files');
        formData.append('formFields', $('#ncrForm').serialize());
        //var formFields = $('#ncrForm').serialize();

        var totalfiles = document.getElementById('files').files.length;
        //alert(totalfiles);
       for (var index = 0; index < totalfiles; index++) {
          formData.append("uploadPhoto[]", document.getElementById('files').files[index]);
       }
        
        var $url = '<?php echo BASE_URL. "/index.php?module=non_conformance&action=editNonConformanceDetails"; ?>';

        $.ajax({
                   url : $url,
                   type : 'POST',
                   data : formData,
                   /*async : false,*/
                   //dataType: 'json',
                   processData: false,  // tell jQuery not to process the data
                   contentType: false,  // tell jQuery not to set contentType
                   success : function(data) {
                    if($.trim(data) == "succeed"){
                        toastr.success("Update effected!");
                        $("#sheqModal").modal('hide'); 
                    }
                    else{
                       toastr.success("Update failed!"); 
                    }
                   
                                               
                        //loadTraining();
                   }
                });

        //console.log(myFiles);
        //alert();
    })
</script>alert

<?php
public static function editNonConformanceDetails()
    {
      
        //echo var_dump($_POST['formFields']);die();
        $formFieldsArray = array();
        parse_str($_POST['formFields'], $formFieldsArray);
        //echo var_dump($searcharray);die();

        global $objNonConformance;         
        global $objActions;
        $objNonConformanceData = array();   
        $objNonConformanceData['id'] = $formFieldsArray['ncrId'];
        $objNonConformanceData['ncrDate'] = $formFieldsArray['date'];    
        $objNonConformanceData['group_field'] = $formFieldsArray['group'];
        $objNonConformanceData['department_field'] = implode(",", $formFieldsArray['nc_department']);
        $objNonConformanceData['non_conformance_details'] = $formFieldsArray['nonConformanceDetails'];
        $objNonConformanceData['responsible_person'] = $formFieldsArray['responsible_person'];


        $objNonConformanceData['risk_score'] = $formFieldsArray['ncr_risk_score'];
        $objNonConformanceData['severity'] = $formFieldsArray['ncr_severity'];
        $objNonConformanceData['likelihood'] = $formFieldsArray['ncr_likelihood'];
        $objNonConformanceData['possible_risk'] = $formFieldsArray['possibleRisk'];
        $objNonConformanceData['responsible_person'] = $formFieldsArray['responsible_person'];


        $objNonConformanceData['potential_loss'] = $formFieldsArray['potential_loss'];
        $objNonConformanceData['potential_time'] = $formFieldsArray['potential_time'];
        $objNonConformanceData['potential_description'] = $formFieldsArray['potential_description'];
        
        $objNonConformanceData['identification_source_description'] = $formFieldsArray['identification_source_description'];
        $objNonConformanceData['identification_source_id'] = 0;
        if(!empty($formFieldsArray['identification_source_id']))
        {
            $objNonConformanceData['identification_source_id'] = $formFieldsArray['identification_source_id'];
        }
        
        //remedial action
        $objNonConformanceData['recommended_improvement_field'] = $formFieldsArray['recommended_improvement_field'];
        $objNonConformanceData['remedial_action_field'] = $formFieldsArray['remedial_action'];
                
        
        $objNonConformanceData['type_field'] = $formFieldsArray['type_field'];
        
         if(empty($formFieldsArray['non_source_id']))
        {
            $objNonConformanceData['non_source_id'] = 0;
        }else{
        $objNonConformanceData['non_source_id'] = $formFieldsArray['non_source_id'];
        }
          if(empty($formFieldsArray['non_source_type']))
        {
            $objNonConformanceData['non_source_type'] = "";
        }else{
        $objNonConformanceData['non_source_type'] = $formFieldsArray['non_source_type'];
        }
        
        
        $objNonConformanceData['priority'] = $formFieldsArray['priority'];
        $objNonConformanceData['location_field'] = 0;
        
        if(!empty($formFieldsArray["add_nc_location"]))
        {
            //location saved
            $objNonConformanceData['location_field'] = $formFieldsArray['add_nc_location'];
        }
        //no location saved
        if(count($formFieldsArray['nc_department']) == 1 && $formFieldsArray['add_nc_location'] == '')
        {
            $objNonConformanceData['location_field'] = 0;
        }
        //multiple departments hence can't pinpoint one location
        if(count($formFieldsArray['nc_department']) > 1)
        {
            $objNonConformanceData['location_field'] = -1;
        }
        
          $result = $objNonConformance->updateNonConformanceDetailsInfo($objNonConformanceData);
          if($result)
          {         

               /* global $objActions;
                $objCorrectiveActionData = array();
                $objCorrectiveActionData["source_id"] = 0;                    
                $objCorrectiveActionData['source_type'] = "NA";
                $objCorrectiveActionData['action_taken'] = "Non-Conformance";
                $objCorrectiveActionData['action'] = $formFieldsArray["nonConformanceDetails"];
                $objCorrectiveActionData['action_taken_id'] = $objNonConformance->get_id;
                $objCorrectiveActionData['performed_by'] = $formFieldsArray['responsible_person'];
                $objActions->hasCreatedAction($objCorrectiveActionData);*/
                //FILES ARRAY
                //echo var_dump($_FILES);die();

                if(!empty($_FILES['uploadPhoto']['name'][0]))
                {
                    $files = $_FILES['uploadPhoto']['name'];
                    $count = count($_FILES['uploadPhoto']['name']);
                    //print_r($_FILES['uploadPhoto']);
                    echo $count.'<br/>';
                    $counter = 0;
                    foreach($files as $name)
                    {
                        if($_FILES['uploadPhoto']["error"][$counter] == 0)
                        {
                            global $objDocument;
                            $time = microtime();
                            $target = ROOT.SITE_UPLOADS_PATH;
                            $target = $target . basename($time.$_SESSION["user_id"].$name);
                            $encrypted_file = $_FILES['uploadPhoto']['tmp_name'][$counter];
                            echo $encrypted_file;
                            if(move_uploaded_file($encrypted_file,$target))
                            {
                               $data["filename"] = $time.$_SESSION["user_id"].$name;
                               $data["file_type"] = $_FILES['uploadPhoto']["type"][$counter];
                               $data["file_size"] = $_FILES['uploadPhoto']["size"][$counter];
                               $data["file_section"] = "Non-Conformance";  
                               $data["section_id"] = $formFieldsArray['ncrId'];
                               $result = $objDocument->addModuleFile($data);  
                               if($result)
                               {
                                   $status = 200;
                               }
                            }
                        }    
                        $counter++;
                    }
                }
 
                    /*
                    $data = array();
                    $data['type'] = 'successs';
                    $data['message'] = 'Succeed Updating Non-Conformance';  
                    $data['ncid'] = $formFieldsArray['ncrId'];
                    controller::nextPage("viewAllConformance","non_conformance");
                    */
                    echo "succeed";
                
          }
          else
          {      /*                            
                 $data = array();
                 $data['type'] = 'error';
                 $data['message'] = 'Failed Updating Non-Conformance';  
                  $data['ncid'] = $formFieldsArray['ncrId'];
                 controller::nextPage("viewAllConformance","non_conformance");
                 */
                 echo "fail";
          }
    }
    ?>