<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>JCTU conference2016 admin page</title>
        
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">

         <!-- Custom styles for this template -->
         <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
         
         <meta http-equiv="X-UA-Compatible" content="IE=10; IE=9; IE=8; IE=7; IE=EDGE" />
         
         <style>
            a.morelink {
                color: #0254EB;
                    text-decoration:none;
                    outline: none;
            }
             .morecontent span {
                display: none;
            }
            .morelink {
                display: block;
            }
         </style>
        
    </head>
    <body>
     
        <?php
        
        function generateEmailLogList($tablelist){
            
            
        echo "<h3><b>Email log :</b></h3>";  
        
        echo "<table id='table-1' class='table table-bordered usefulinfo-table master-content-detail' style='font-size:1.2em;'>";
            echo "<tr><th>#</th>";
            echo "<th>Receiver</th>";
            echo "<th>Reference</th>";
            echo "<th>Subject</th>";
            echo "<th>Body</th>";
            echo "<th>Origin Fn.</th>";
            echo "<th>Created When</th>";
            echo "<th>Status</th>";
            echo "<th> - </th></tr>";
            
        foreach ($tablelist as $table){
            
            echo form_open('admin/mailResend');
                
            echo "<tr><td>".$table['Id']."</td>";
            echo "<td>".$table['Receiver']."</td>";
            echo "<td>".$table['RegisterReference']."</td>";
            echo "<td>".$table['Subject']."</td>";
            echo "<td><div class='comment'>".$table['Body']."</div></td>";
            echo "<td>".$table['OriginFunction']."</td>";
            echo "<td>".$table['CreatedWhen']."</td>";
            echo "<td>".$table['Status']."</td>";
           
            $data= array(
            'Id' => $table['Id']
            );
            echo form_hidden($data);
            
            $data= array(
            'Receiver' => $table['Receiver']
            );
            echo form_hidden($data);
            
            $data= array(
            'RegisterReference' => $table['RegisterReference']
            );
            echo form_hidden($data);
            
            $data= array(
            'Subject' => $table['Subject']
            );
            echo form_hidden($data);
            
            $data= array(
            'Body' => $table['Body']
            );
            echo form_hidden($data);
            
            $data= array(
            'OriginFunction' => $table['OriginFunction']
            );
            echo form_hidden($data);
            
            $data = array(
                'type' => 'submit',
                'value'=> 'Resend',
                'class'=> 'submit'
                );
            echo "<td>".form_submit($data)."</td>"; 
                
            echo form_close();
            echo "</tr>";

        }
        echo "</table>"; 
        
        }
        
        
        function generateContentData($contentdata){
        
        foreach ($contentdata as $content)
        {
                echo "<br>Name: ".$content['name'];
                echo "<br>Position: ".$content['orderposition'];
                echo "<br>Topic: ".$content['topic'];
                echo "<br>SubTopic: ".$content['subtopic'];
                echo "<br>Body: ".$content['body'];
                echo "<br><br><br>";
        }
            
        }
        
        function generateAttendanceRegistrationList($regDataList){
            
            echo "<div class='table-responsive' style='border:0;border-bottom:1px solid #e5e5e5;'>";

            echo "<table id='table-1' class='table table-bordered usefulinfo-table master-content-detail' style='font-size:1.2em;'>";
            echo "<th>Id</th>";
            echo "<th></th>";
            echo "<th>Reference No.</th>";
            echo "<th>Pay-in Ref. No.</th>";
            echo "<th>Registration type</th>";
            echo "<th>Registration type name</th>";  
            echo "<th>Current status</th>";
            echo "<th>Information Filled In Date</th>";
            echo "<th>Online Payment Done Date ";
            echo "<th>Payment Done Date ";
            echo "<th>Title_1</th>";               
            echo "<th>Title_2</th>";      
            echo "<th>Firstname</th>";             
            echo "<th>Lastname</th>";              
            echo "<th>Organization</th>";          
            echo "<th>PostalAddress</th>";         
            echo "<th>City</th>";                  
            echo "<th>Postcode</th>";              
            echo "<th>Country</th>";               
            echo "<th>Tel</th>";                   
            echo "<th>Mobile</th>";                
            echo "<th>Email</th>";                    
            echo "<th>FoodType</th>";              

            
            foreach ($regDataList as $regData){
                echo "<tr>";
                echo "<td>".$regData['Id']."</td>";
                echo "<td><input type='checkbox' name='check_list[]' value='".$regData['Id']."'></td>";
                echo "<td>".$regData['RefNo']."</td>"; 
                echo "<td>".$regData['PayInRef']."</td>"; 
                echo "<td>".$regData['RegistrationType']."</td>";  
                echo "<td>".$regData['RegistrationTypeName']."</td>";  
                echo "<td>".$regData['RegistrationStatusName']."</td>";
                echo "<td>".$regData['InformationFilledInDate']."</td>";
                echo "<td>".$regData['OnlinePaymentDoneDate']."</td>";
                echo "<td>".$regData['PaymentDoneDate']."</td>";
                echo "<td>".$regData['Title_1']."</td>";               
                echo "<td>".$regData['Title_2']."</td>";      
                echo "<td>".$regData['Firstname']."</td>";             
                echo "<td>".$regData['Lastname']."</td>";              
                echo "<td>".$regData['Organization']."</td>";          
                echo "<td>".$regData['PostalAddress']."</td>";         
                echo "<td>".$regData['City']."</td>";                  
                echo "<td>".$regData['Postcode']."</td>";              
                echo "<td>".$regData['Country']."</td>";               
                echo "<td>".$regData['Tel']."</td>";                   
                echo "<td>".$regData['Mobile']."</td>";                
                echo "<td>".$regData['Email']."</td>";                 
                echo "<td>".$regData['FoodType']."</td>";                      
               
                echo "</tr>";
            }
            echo "</table>";
            
            echo "<table id='header-fixed'></table>";
                    
            echo "<br></div>";
        }
        
        function generateRegistrationList($regDataList){
            
            echo "<div class='table-responsive' style='border:0;border-bottom:1px solid #e5e5e5;'>";

            echo "<table id='table-1' class='table table-bordered usefulinfo-table master-content-detail' style='font-size:1.2em;'>";
            echo "<th>Id</th>";
            echo "<th></th>";
            echo "<th>File</th>";
            echo "<th>Reference No.</th>"; 
            echo "<th>Pay-in Ref. No.</th>";
            echo "<th>Registration type</th>";
            echo "<th>Registration type name</th>";  
            echo "<th>Registration status</th>";
            echo "<th>Information Filled In Date</th>";
            echo "<th>Sent To Reviewer Date</th>";
            echo "<th>Confirm Email Sent Date</th>";
            echo "<th>Online Payment Done Date ";
            echo "<th>Payment Done Date ";
            echo "<th>Paper Rejected Date ";
            echo "<th>Title_1</th>";               
            echo "<th>Title_2</th>";      
            echo "<th>Firstname</th>";             
            echo "<th>Lastname</th>";              
            echo "<th>Organization</th>";          
            echo "<th>PostalAddress</th>";         
            echo "<th>City</th>";                  
            echo "<th>Postcode</th>";              
            echo "<th>Country</th>";               
            echo "<th>Tel</th>";                   
            echo "<th>Mobile</th>";                
            echo "<th>Email</th>";                 
            echo "<th>FoodType</th>";              
            echo "<th>TopicArea</th>";             
            echo "<th>AbstractTitle</th>";         
            
            
            foreach ($regDataList as $regData){
                echo "<tr>";
                echo "<td>".$regData['Id']."</td>";
                echo "<td><input type='checkbox' name='check_list[]' value='".$regData['Id']."'></td>";
                echo "<td>- <a href=".base_url('assets/paperupload/'.$regData['PaperFilename'])." style='color:#8a2be2;'>Word document</a><br>";
                echo "- <a href=".base_url('assets/paperupload/'.$regData['PaperFilenamePdf'])." style='color:#8a2be2;'>Pdf document</a></td>";
                echo "<td>".$regData['RefNo']."</td>";  
                echo "<td>".$regData['PayInRef']."</td>"; 
                echo "<td>".$regData['RegistrationType']."</td>"; 
                echo "<td>".$regData['RegistrationTypeName']."</td>";  
                echo "<td>".$regData['RegistrationStatusName']."</td>";
                echo "<td>".$regData['InformationFilledInDate']."</td>";
                echo "<td>".$regData['SentToReviewerDate']."</td>";
                echo "<td>".$regData['ConfirmEmailSentDate']."</td>";
                echo "<td>".$regData['OnlinePaymentDoneDate']."</td>";
                echo "<td>".$regData['PaymentDoneDate']."</td>";
                echo "<td>".$regData['PaperRejectedDate']."</td>";
                echo "<td>".$regData['Title_1']."</td>";               
                echo "<td>".$regData['Title_2']."</td>";      
                echo "<td>".$regData['Firstname']."</td>";             
                echo "<td>".$regData['Lastname']."</td>";              
                echo "<td>".$regData['Organization']."</td>";          
                echo "<td>".$regData['PostalAddress']."</td>";         
                echo "<td>".$regData['City']."</td>";                  
                echo "<td>".$regData['Postcode']."</td>";              
                echo "<td>".$regData['Country']."</td>";               
                echo "<td>".$regData['Tel']."</td>";                   
                echo "<td>".$regData['Mobile']."</td>";                
                echo "<td>".$regData['Email']."</td>";                 
                echo "<td>".$regData['FoodType']."</td>";              
                echo "<td>".$regData['TopicArea']."</td>";             
                echo "<td>".$regData['AbstractTitle']."</td>";         
               
                echo "</tr>";
            }
            echo "</table>";
            
            echo "<table id='header-fixed'></table>";
                    
            echo "<br></div>";
        }
        
        
        function countRowForTableSpan($keynumber,$item){

            $rowcount = 0;
                 foreach($item as $itemkey => $itemvalue ){
                    if($itemkey == $keynumber)
                    {
                        foreach($itemvalue as $keydata => $valuedata){
                            foreach($valuedata as $key => $value){
                                foreach($value as $key2 => $value2){
                                    foreach($value2 as $key3 => $value3){
                                        $rowcount++;
                                     }
                                }
                            }
                        }
                    }
                }
                return $rowcount;
            }
        
        
        function generateScheduleTable($item){
            //Generate the Schedule Table for preview display purpose
            
            echo "<table class='table table-bordered schedule-table master-content-detail'>";
           
            $venueduplicate = 0;
             
            foreach($item as $itemkey => $itemvalue ){
           
            foreach($itemvalue as $keydata => $valuedata){
                    
                echo "<tr><td rowspan='".countRowForTableSpan($itemkey,$item)."'>".$keydata."</td>";
                foreach($valuedata as $key => $value){
                    
                    foreach($value as $key2 => $value2){
                        $venueduplicate = count($value2);
                        if($venueduplicate > 1){
                            echo "<td rowspan='".count($value2)."'>".$key2."</td>";
                        }else
                        {
                            if($key == 0){
                                echo "<td>".$key2."</td>";
                            }else{
                                echo "<tr><td>".$key2."</td>";
                            }
                        }
                        foreach($value2 as $key3 => $value3){
                            foreach ($value3 as $key4 => $value4){
                                if($venueduplicate > 1){
                                    if($key3 == 0)
                                    {
                                        echo "<td>".$key4."</td><td>".$value4."</td>";
                                    }else{
                                       echo "<tr><td>".$key4."</td><td>".$value4."</td>"; 
                                    }
                                }else{
                                    echo "<td>".$key4."</td><td>".$value4."</td></tr>";
                                }

                                    echo "</tr>";
                                
                            }
                        }
                    }
                    
                }
            }
            }
             
            echo "</table>";
            
        }
        
        function generateFeatureImageListForm($imagelist){
            
        echo "<h3><b>Footer image list :</b></h3>";  
        
        foreach ($imagelist as $image){
            $random = rand(0, 100);
            echo "<br><image src='".base_url()."assets/image/banner/".$image."?".$random."' width='30%'><br>".$image."<br>";
            
            echo form_open_multipart('admin/do_upload_banner');

            //Hidden page
            $data= array(
            'currentfile' => $image
            );
            echo form_hidden($data);

            $upload = Array ("name" => "bannerimage", "Class" => "Upload");
            echo form_upload ($upload);
            
            $data = array(
                'type' => 'submit',
                'value'=> 'Upload',
                'class'=> 'submit'
                );
                echo form_submit($data); 
                
            echo form_close();
            
        }
            
        }
        
        
        function generateTextManagerForm($contentdata,$bannerlist,$filecontent,$filecontentname,$tablename,$footerlist){
        
        echo "<h3><b>Banner list :</b></h3>";  
        
        foreach ($bannerlist as $banner){
            $random = rand(0, 100);
            echo "<br><image src='".base_url()."assets/image/banner/".$banner."?".$random."' width='40%'><br>".$banner."<br>";
            
            echo form_open_multipart('admin/do_upload_banner');

            //Hidden page
            $data= array(
            'currentfile' => $banner
            );
            echo form_hidden($data);

            $upload = Array ("name" => "bannerimage", "Class" => "Upload");
            echo form_upload ($upload);
            
            $data = array(
                'type' => 'submit',
                'value'=> 'Upload',
                'class'=> 'submit'
                );
                echo form_submit($data); 
                
            echo form_close();
            
        }
        
        if(count($footerlist) > 0){
            generateFeatureImageListForm($footerlist);
        }
        
        foreach ($contentdata as $content)
        {
                echo form_open('admin/updatepage');
                echo "<br><h3>Section: <b>".$content['section']."</b></h3>";
                
                //Topic
                echo "<h4>".form_label('Topic :', 'topic')."</h4>";
                $data= array(
                'name' => 'topic',
                'value' => $content['topic'],
                'class' => 'input_box',
                'maxlength' => '150',
                'style' => 'width:40%;font-size:large;'
                );
                echo "".form_input($data)."";
                
                //SubTopic
                echo "<h4>".form_label('SubTopic :', 'subtopic')."</h4>";
                $data= array(
                'name' => 'subtopic',
                'value' => $content['subtopic'],
                'class' => 'textarea',
                'style' => 'width:40%;font-size:large;'
                );
                echo "".form_textarea($data)."";

                
                //Body
                echo "<h4>".form_label('Body :', 'body')."</h4>";
                $data= array(
                'name' => 'body',
                'value' => $content['body'],
                'class' => 'textarea',
                'style' => 'width:40%;font-size:large;'
                );
                echo "".form_textarea($data)."";
                
                echo "<br>";
                
                //Hidden page
                $data= array(
                'page' => $content['page']
                );
                echo form_hidden($data);
                
                //Hidden SectionName
                $data= array(
                'section' => $content['section']
                );
                echo form_hidden($data);
                
                $data = array(
                'type' => 'submit',
                'value'=> 'Save',
                'class'=> 'submit'
                );
                echo form_submit($data); 
                
                echo form_close();
                
                echo "<hr>";
        }
        
        echo "<br>";

        if($filecontent != ""){
            echo "<h3>table content:".array_values($contentdata)[0]['page']."</h3>";
            
            //Preview Table from uploaded file
            foreach($tablename as $table){
                $decoded = json_decode($filecontent,TRUE);
                $item = $decoded[$table];

                if($table == 'programschedule')
                {
                    generateScheduleTable($item);
                }else
                {
                    echo "<table class='table table-bordered outer-borderess master-content-detail' id='table-normal'>";

                    foreach($item as $itemkey ){
                    echo "<tr>";
                    foreach($itemkey as $itemdata){
                        echo "<td>".$itemdata."</td>";
                    }
                    echo "</tr>";
                    }

                    echo "</table>"; 
                }
                
                echo "<br>";
            }
        
        
            echo "<a href=".base_url('assets/upload/'.$filecontentname)." download>";
            echo "<h4>Download ".$filecontentname."</h4></a>";
            
            
            //Form for upload text file for table
            echo form_open_multipart('admin/do_upload_table');
            //Hidden page
            $data= array(
            'currentfile' => $filecontentname
            );
            echo form_hidden($data);

            $upload = Array ("name" => "contenttable", "Class" => "Upload");
            echo form_upload ($upload);
            
            $data = array(
                'type' => 'submit',
                'value'=> 'Upload',
                'class'=> 'submit'
                );
                echo form_submit($data); 
                
            echo form_close();
        
            }
        
        }
        
        
        ?>
        
        
        <header id="header">
          <div class="row header">
              <div class="col-xs-10 col-sm-10 col-md-5">
                <image src="<?php echo base_url('assets/image/jc_logo.png'); ?>">
            </div>
          </div>
        </header>
        
        <br>
        <br>
            
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
            
        <?php
        
        $userdata = $this->session->userdata();
        $loginpass = false;
        if($userdata != null)
        {
            if(array_key_exists('logged_in', $userdata))
            {
                $loginpass = $userdata['logged_in'];
            }
        }
        
        
        if($loginpass)
        {
            echo "<br><h3>hello....".$userdata['user']."</h3>";
            
           ?>
        
        <legend>
        <h2>Content Management Control:</h2>
        </legend>
        <a href="<?= base_url().'admin/managehomepage'; ?>" style="font-size: x-large;">Homepage</a>
        &nbsp;&nbsp;|&nbsp;&nbsp;
        <a href="<?= base_url().'admin/managecommittee'; ?>" style="font-size: x-large;">Committee and Review Board</a>
        &nbsp;&nbsp;|&nbsp;&nbsp;
        <a href="<?= base_url().'admin/manageschedule'; ?>" style="font-size: x-large;">Schedule</a>
        &nbsp;&nbsp;|&nbsp;&nbsp;
        <a href="<?= base_url().'admin/manageuseful'; ?>" style="font-size: x-large;">Useful Information</a>
        &nbsp;&nbsp;|&nbsp;&nbsp;
        <a href="<?= base_url().'admin/manageregistration'; ?>" style="font-size: x-large;">Registration</a>
        
        <br>
        <legend>
        <h2>Back office panel:</h2>
        </legend>
        <a href="<?= base_url().'admin/registrationlist'; ?>" style="font-size: x-large;">Registration list</a>
        &nbsp;&nbsp;|&nbsp;&nbsp;
        <a href="<?= base_url().'admin/maillog'; ?>" style="font-size: x-large;">Email log</a>
        <hr>
        
        <?php   
            
        if(isset($updateresult)){
            if($updateresult){
                echo "<h3>Update completed...</h3>";
            }else{
                echo "<h3>Update failed...</h3>";
            }
        }
        
        if($admintype == 'registrationlist'){
            
            //---------------------
            //--REGISTRATION ON/OFF
            echo form_open('admin/updateRegistration');
            echo "<legend style='background-color: #7d4399;color: white;'>";
            echo "<h2>Registration Control:</h2>";
            echo "</legend>";
            echo "<h4><b>Enable Attendance Registration</b></h4>";
            echo "<select name='attendance'>";
            echo "<option value='true'".($enableattendance == 'true' ? ' selected ': '').">True</option>";
            echo "<option value='false'".($enableattendance == 'false' ? ' selected ': '').">False</option>";
            echo "</select> &nbsp;&nbsp;";
            echo "<br>";
            
            echo "<h4><b>Enable Presenter Registration</b></h4>";
            echo "<select name='presenter'>";
            echo "<option value='true'".($enablepresenter == 'true' ? ' selected ': '').">True</option>";
            echo "<option value='false'".($enablepresenter == 'false' ? ' selected ': '').">False</option>";
            echo "</select> &nbsp;&nbsp;";
            
            $submit = array(
            'type' => 'submit',
            'value'=> 'Submit',
            'class'=> 'submit'
            );
            
            echo "<br><br>";
            echo form_submit($submit); 
            echo "<br><br>";
            echo form_close();
            //-------
            echo "<hr>";
            //-- REGISTRATION DOCUMENT UPLOADER ----
            echo "<a href=".base_url('assets/download/'.$guideline_doc)." download>";
            echo "<h4>Download ".$guideline_doc."</h4></a>";

            //Form for upload text file for table
            echo form_open_multipart('admin/do_upload_registration_doc');
            //Hidden page
            $data= array(
            'currentfile' => $guideline_doc
            );
            echo form_hidden($data);

            $upload = Array ("name" => "contenttable", "Class" => "Upload");
            echo form_upload ($upload);
            
            $data = array(
                'type' => 'submit',
                'value'=> 'Upload',
                'class'=> 'submit'
                );
                echo form_submit($data); 
                
            echo form_close();
            
            echo "________________________";
            
            echo "<a href=".base_url('assets/download/'.$presenter_form)." download>";
            echo "<h4>Download ".$presenter_form."</h4></a>";

            //Form for upload text file for table
            echo form_open_multipart('admin/do_upload_registration_doc');
            //Hidden page
            $data= array(
            'currentfile' => $presenter_form
            );
            echo form_hidden($data);

            $upload = Array ("name" => "contenttable", "Class" => "Upload");
            echo form_upload ($upload);
            
            $data = array(
                'type' => 'submit',
                'value'=> 'Upload',
                'class'=> 'submit'
                );
                echo form_submit($data); 
                
            echo form_close();
        
            
            //--------------
            //--REGISTRATION LIST DETAILS
            echo "<legend style='background-color: #7d4399;color: white;'>";
            echo "<h2>Registration List [Attendance]:</h2>";
            echo "</legend>";
            
            echo form_open('admin/updateAttendance');
            
            echo "<h2 style='border-bottom:2px solid;'><b>1. Infomation Filled In</b></h2>";
            ?>
            <a href="<?= base_url().'admin/exportHTML/infofilledlist_attendance'; ?>" style="font-size: x-large;">Export to Excel</a>
            <?php
            
            echo "<br><select name='statusid'>";
            echo "<option value='4'>Payment done</option>";
            echo "<option value='5'>Online Payment done</option>";
            echo "<option value='7'>DELETE selected attendances**</option>";
            echo "</select> &nbsp;&nbsp;";
            
            $submit = array(
            'type' => 'submit',
            'value'=> 'Submit',
            'class'=> 'submit'
            );
            
            echo form_submit($submit); 
            echo "<br><br>";
            
            
            
            generateAttendanceRegistrationList($infofilledlist_attendance);
            
            echo form_close();
            
            echo form_open('admin/updateAttendance');
            echo "<h2 style='border-bottom:2px solid;'><b>2. Online Payment done</b></h2>";
            ?>
            <a href="<?= base_url().'admin/exportHTML/onlinepaymentdone_attendance'; ?>" style="font-size: x-large;">Export to Excel</a>
            <?php
            
            echo "<br><select name='statusid'>";
            echo "<option value='4'>Payment done</option>";
            echo "<option value='7'>DELETE selected attendances**</option>";
            echo "</select> &nbsp;&nbsp;";
            
            $submit = array(
            'type' => 'submit',
            'value'=> 'Submit',
            'class'=> 'submit'
            );
            echo form_submit($submit);
            echo "<br><br>";
            
            generateAttendanceRegistrationList($onlinepaymentdone_attendance);
            
            echo form_close();
            echo "<br>";
            
            echo form_open('admin/updateAttendance');
            echo "<h2 style='border-bottom:2px solid;'><b>3. Payment done</b></h2>";
            ?>
            <a href="<?= base_url().'admin/exportHTML/paymentdone_attendance'; ?>" style="font-size: x-large;">Export to Excel</a>
            <?php
            
            echo "<br><select name='statusid'>";
            echo "<option value='1'>Information filled in</option>";
            echo "<option value='7'>DELETE selected attendances**</option>";
            echo "</select> &nbsp;&nbsp;";
            
            $submit = array(
            'type' => 'submit',
            'value'=> 'Submit',
            'class'=> 'submit'
            );
            echo form_submit($submit);
            echo "<br><br>";
            
            generateAttendanceRegistrationList($paymentdone_attendance);
            
            echo form_close();
            echo "<br>";
            
            echo "<hr><br><br><legend style='background-color: #7d4399;color: white;'>";
            echo "<h2>Registration List [Presenter]:</h2>";
            echo "</legend>";
            
            echo form_open('admin/updatePresenter');

            echo "<h2 style='border-bottom:2px solid;'><b>1. Information Filled In</b></h2>";
            ?>
            <a href="<?= base_url().'admin/exportHTML/infofilledlist_presenter'; ?>" style="font-size: x-large;">Export to Excel</a>
            <?php
            
            echo "<br><select name='statusid'>";
            echo "<option value='2'>Sent to reviewer</option>";
            echo "<option value='7'>DELETE selected presenters**</option>";
            echo "</select> &nbsp;&nbsp;";
            
            $data = array(
             'type' => 'submit',
             'value'=> 'Submit',
             'class'=> 'submit'
             );
             echo form_submit($data); 
             echo "<br><br>";
            
            generateRegistrationList($infofilledlist_presenter);
            
             echo form_close();
            
            echo "<h2 style='border-bottom:2px solid;'><b>2. Sent to review</b></h2>";
            ?>
            <a href="<?= base_url().'admin/exportHTML/sendtoreviewer'; ?>" style="font-size: x-large;">Export to Excel</a>
            <?php
            echo form_open('admin/updatePresenter');

            echo "<br><select name='statusid'>";
            echo "<option value='3'>Paper Approved & Confirm Email sent</option>";
            echo "<option value='6'>Paper Rejected & Notify Email sent</option>";
            echo "<option value='7'>DELETE selected presenters**</option>";
            echo "</select> &nbsp;&nbsp;";
            
            $data = array(
             'type' => 'submit',
             'value'=> 'Submit',
             'class'=> 'submit'
             );
             echo form_submit($data); 
             echo "<br><br>";
             generateRegistrationList($sendtoreviewer);
             
             echo form_close();
            
            
            echo "<h2 style='border-bottom:2px solid;'><b>3.Paper Approved & Confirm email sent</b></h2>";
            ?>
            <a href="<?= base_url().'admin/exportHTML/confirmemailsent'; ?>" style="font-size: x-large;">Export to Excel</a>
            <?php
            echo form_open('admin/updatePresenter');

            echo "<br><select name='statusid'>";
            echo "<option value='4'>Payment done</option>";
            echo "<option value='5'>Online Payment done</option>";
            echo "<option value='7'>DELETE selected presenters**</option>";
            echo "</select> &nbsp;&nbsp;";
            
            $data = array(
             'type' => 'submit',
             'value'=> 'Submit',
             'class'=> 'submit'
             );
             echo form_submit($data); 
             echo "<br><br>";
             
            generateRegistrationList($confirmemailsent);
            echo form_close();
            echo "<br>";
            
            echo "<h2 style='border-bottom:2px solid;'><b>4. Online Payment done</b></h2>";
            ?>
            <a href="<?= base_url().'admin/exportHTML/onlinepaymentdone_presenter'; ?>" style="font-size: x-large;">Export to Excel</a>
            <?php
            
            echo form_open('admin/updatePresenter');

            echo "<br><select name='statusid'>";
            echo "<option value='4'>Payment done</option>";
            echo "<option value='7'>DELETE selected presenters**</option>";
            echo "</select> &nbsp;&nbsp;";
            
            $data = array(
             'type' => 'submit',
             'value'=> 'Submit',
             'class'=> 'submit'
             );
             echo form_submit($data); 
             echo "<br><br>";
             
            generateRegistrationList($onlinepaymentdone_presenter);
            
            echo form_close();
            echo "<br>";
            
            echo "<h2 style='border-bottom:2px solid;'><b>5. Payment done</b></h2>";
            ?>
            <a href="<?= base_url().'admin/exportHTML/paymentdone_presenter'; ?>" style="font-size: x-large;">Export to Excel</a>
            <?php
            
            echo form_open('admin/updatePresenter');

            echo "<br><select name='statusid'>";
            echo "<option value='1'>Information filled in</option>";
            echo "<option value='2'>Sent to reviewer</option>";
            echo "<option value='3'>Confirm Email sent</option>";
            echo "<option value='4'>Payment done</option>";
            echo "<option value='7'>DELETE selected presenters**</option>";
            echo "</select> &nbsp;&nbsp;";
            
            $data = array(
             'type' => 'submit',
             'value'=> 'Submit',
             'class'=> 'submit'
             );
             echo form_submit($data); 
             echo "<br><br>";
             
            generateRegistrationList($paymentdone_presenter);
            
         echo form_close();
         echo "<br>";

         echo "<h2 style='border-bottom:2px solid;'><b>6. Paper Rejected & Notify Email sent</b></h2>";
            ?>
            
            <a href="<?= base_url().'admin/exportHTML/paper_rejected'; ?>" style="font-size: x-large;">Export to Excel</a>
            <?php
            
            echo form_open('admin/updatePresenter');

            echo "<br><select name='statusid'>";
            echo "<option value='7'>DELETE selected presenters**</option>";
            echo "</select> &nbsp;&nbsp;";
            
            $data = array(
             'type' => 'submit',
             'value'=> 'Submit',
             'class'=> 'submit'
             );
             echo form_submit($data); 
             echo "<br><br>";
             
            generateRegistrationList($paper_rejected);
            
         echo form_close();
         echo "<br>";
         
        }elseif($admintype == 'maillog'){
        //Maillog
            generateEmailLogList($maillog);

            echo "<br>";
        }elseif($admintype != 'default'){
            
            echo "<h3>Manage page: ".$contentpage."</h3>";
            
            generateTextManagerForm($contentdata,$bannerlist,$filecontent,$filecontentname,$tablename,$footerlist);
        }
        
        
        }
        else{
        
        echo form_open('admin/checklogin');
        // Show Name Field in View Page
        echo form_label('Username :', 'username');
        $data= array(
        'name' => 'username',
        'placeholder' => 'Please Enter User Name',
        'class' => 'input_box'
        );
        echo form_input($data);

        echo "<br>";
        
        // Show Password Field in View Page
        echo form_label('Password:', 'password');
        $data= array(
        'type' => 'password',
        'name' => 'password',
        'placeholder' => 'Passwrd',
        'class' => 'password'
        );
        echo form_input($data);
        
        echo "<br>";
        
        $data = array(
        'type' => 'submit',
        'value'=> 'Submit',
        'class'=> 'submit'
        );
        echo form_submit($data); 
        echo form_close();
    
        }

    ?>
            </div>
        </div>
        
    <script src="//cdn.jsdelivr.net/jquery/2.2.0/jquery.min.js"></script>
    <!-- Include the Sidr JS -->
    <script type="text/javascript"
	src="http://viralpatel.net/blogs/demo/jquery/jquery.shorten.1.0.js"></script>
        
    <script type="text/javascript">
	$(document).ready(function() {
	
		$(".comment").shorten({
                    "showChars" : 150,
                    "moreText"	: "Show More",
                    "lessText"	: "Show Less"
                });
	
	});
        
        
        
       
</script>
        
    </body>
</html>
