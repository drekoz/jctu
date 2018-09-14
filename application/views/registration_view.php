<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta charset="utf-8">
    <title>JC International Conference</title>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="<?php base_url(); ?>assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php base_url(); ?>assets/js/ie-emulation-modes-warning.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
        
    <link href="<?php base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    
    
    <!-- Custom styles for this template -->
    <link href="<?php base_url(); ?>assets/css/style.css" rel="stylesheet">
        
    <link rel="stylesheet" href="<?php base_url(); ?>assets/css/unslider.css">  
    <link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.sidr/2.2.1/stylesheets/jquery.sidr.light.min.css">
</head>
<body>

    
   <header id="header">
          <div class="row header">
              <div class="col-xs-10 col-sm-10 col-md-5">
                <image src="<?php base_url(); ?>assets/image/jc_logo.png" width="100%">
            </div>
              
            <div class="col-xs-2 col-sm-2 col-md-7 nav-menu">

                <a id="simple-menu" href="#sidr">&#9776;</a>

                <div id="sidr">
                  <!-- Your content -->
                  <ul>
                    <li><a href="<?= base_url(); ?>">Home</a></li>
                    <li><a href="<?= base_url().'committee'; ?>">Committee and Review Board</a></li>
                    <li><a href="<?= base_url().'schedule'; ?>">Schedule</a></li>
                    <li><a href="<?= base_url().'useful'; ?>">Useful Information</a></li>
                    <li><a href="<?= base_url().'registration'; ?>">Registration</a></li>
                    <li><a href="<?= base_url().'contact'; ?>">Contact us</a></li>
                  </ul>
                </div>
                
                
            <nav class="nav nav-header" id="nav">
                <ul class="topnav" id="menu">
                    <li><a href="<?= base_url(); ?>">Home</a></li>
                    <li>|</li>
                    <li><a href="<?= base_url().'committee'; ?>">Committee and Review Board</a></li>
                    <li>|</li>
                    <li><a href="<?= base_url().'schedule'; ?>">Schedule</a></li>
                    <li>|</li>
                    <li><a href="<?= base_url().'useful'; ?>">Useful Information</a></li>
                    <li>|</li>
                    <li class="active"><a href="<?= base_url().'registration'; ?>">Registration</a></li>
                    <li>|</li>
                    <li><a href="<?= base_url().'contact'; ?>">Contact us</a></li>
                </ul>
            </nav>
            </div>
        </div>
    </header>
          
    <hr>

    <div class="row">
        <div class="my-slider col-xs-12 col-sm-12 col-md-12">
            <ul>
                <?php
                    $random = rand(0, 100);
                    foreach ($bannerlist as $banner){
                        echo "<li><image src='".base_url()."assets/image/banner/".$banner."?".$random."' width='100%'></li>";
                    }
                    ?>
            </ul>
        </div>
    </div>
          
    <div class="content master-container">
        <div class="cover-container">
            
          <div class="row">
              
             <div class="col-xs-0 col-sm-0 col-md-2"></div>
              
             <div class="col-xs-12 col-sm-12 col-md-8 master-content-container"> 
                 <br>
                 <br>
            
                 <?php 
                        foreach($contentdata as $content)
                        {
                             if($content['section'] == 'registration')
                             {
                                 $registrationcontent['topic'] = $content['topic'];
                                 $registrationcontent['subtopic'] = $content['subtopic'];
                                 $registrationcontent['body'] = $content['body'];
                             } 
                             else if($content['section'] == 'papersubmission')
                            {
                                 $papersubmissioncontent['topic'] = $content['topic'];
                                 $papersubmissioncontent['subtopic'] = $content['subtopic'];
                                 $papersubmissioncontent['body'] = $content['body'];
                             }
                        }     
                ?>
                 
                 
                 <?php
            $decoded = json_decode($filecontent,TRUE);
            $registration = $decoded['registration'];
            ?>
              
                 <div class="master-content-padding">      
           <h1 class="cover-heading master-content-heading">
                        <?php echo $registrationcontent['topic']; ?>
                    </h1>
                <p class="master-content-sub-heading">
                        <?php echo $registrationcontent['subtopic']; ?>
                </p>
                
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <table class="table table-bordered usefulinfo-table master-content-detail">
               <?php
               $head = false;
                        foreach($registration as $itemkey ){
                        echo "<tr>";
                        foreach($itemkey as $itemdata){
                            if(!$head){
                                echo "<th>".$itemdata."</th>";
                            }else{
                                echo "<td>".$itemdata."</td>";
                            }
                        }
                        echo "</tr>";
                        $head = true;
                        }

                    ?>
             </table>
                </div>
                <div class="col-md-1"></div>
            </div>
            
            <br>
           
                <p class="lead master-content-detail">
                        <?php echo nl2br($registrationcontent['body']); ?>
                </p>
            
            <br>
            <br>
            
            <div class="row text-center">
                <div class=" col-md-4"></div> 
                <div class=" col-md-4">
                    <a href="<?= base_url().'attendanceregistration'; ?>" class="register-button btn <?php if($enableattendance == 'false') {echo 'disabled';} ?>" role="button" 
                        
                       >
                        <h1 class="register-button-font">Attendance Registration</h1>
                    </a>
                    *no paper presentation
                </div>
                <div class=" col-md-4"></div>
            </div>
                  
            <br>
            <br>
            
            <p class="lead master-content-detail">
            *Registrered authors / participants are required to bring the registration receipt while reporting at the registration desk. Registration Starts at 02:00-04:00 PM
            </p>
            
            <hr class="hr-footer">
            
            <h1 class="cover-heading master-content-heading">
                    <?php echo $papersubmissioncontent['topic']; ?>
                </h1>
            <p class="master-content-sub-heading">
                    <?php echo $papersubmissioncontent['subtopic']; ?>
            </p>
            <p class="lead master-content-detail">
                    <?php echo nl2br($papersubmissioncontent['body']); ?>
            </p>
            <br>
            
            
            <div class="row text-center" style="color: white;">
                <div class=" col-md-3">
                    <a href="<?php echo base_url('assets/download/'.$guideline_doc); ?>" class="register-button btn <?php if($enablepresenter == 'false') {echo 'disabled';} ?>" role="button">
                        <h1 class="register-button-font" style="font-size: 1.5em;margin-top: 0px;margin-bottom: 0px;margin-left: 5px;margin-right: 5px;">Download<br> guideline document</h1>
                    </a>
                </div> 
                
                <div class=" col-md-3">
                    <a href="<?php echo base_url('assets/download/'.$presenter_form); ?>" class="register-button btn <?php if($enablepresenter == 'false') {echo 'disabled';} ?>" role="button">
                        <h1 class="register-button-font" style="font-size: 1.5em;margin-top: 0px;margin-bottom: 0px;margin-left: 5px;margin-right: 5px;">Download<br> abstract template</h1>
                    </a>
                </div> 
                
                <div class=" col-md-3">
                    <a href="<?= base_url().'presenterregistration'; ?>" class="register-button btn <?php if($enablepresenter == 'false') {echo 'disabled';} ?>" role="button">
                        <h1 class="register-button-font">Submit abstract</h1>
                    </a>
                </div>
                
                <div class=" col-md-3">
                    <a href="<?= base_url().'payment'; ?>" class="register-button btn <?php if($enablepresenter == 'false') {echo 'disabled';} ?>" role="button">
                    <h1 class="register-button-font">Registration</h1>
                    </a>
                </div>
            </div>
            
            <br>
            <br>
            
                 </div>
                 
            <hr class="hr-footer">
            
            <div class="row row-centered">
            
            <div class="col-md-12">
            <nav class="nav nav-footer" id="nav">
            <ul>
                <li><a href="<?= base_url(); ?>">Home</a></li>
                <li>|</li>
                <li><a href="<?= base_url().'committee'; ?>">Committee and Review Board</a></li>
                <li>|</li>
                <li><a href="<?= base_url().'schedule'; ?>">Schedule</a></li>
                <li>|</li>
                <li><a href="<?= base_url().'useful'; ?>">Useful Information</a></li>
                <li>|</li>
                <li class="active"><a href="<?= base_url().'registration'; ?>">Registration</a></li>
                <li>|</li>
                <li><a href="<?= base_url().'contact'; ?>">Contact us</a></li>
            </ul>
            </nav>
            </div>
            
            </div>
            
             </div>
             <div class="col-md-2"></div> 
          
          </div>
            
            <div class="footer-container">
            <div class="row row-centered">
                <div class="col-md-12">
                    
                <div class="mastfoot">
                <div class="inner">
                <p>
                    <font class="footer-container-head">Faculty of Journalism and Mass Communication, Thammasat University</font>
                    <br>
                    99 Moo 18 Phaholyothin Rd., Khlongluang, Pathumthani 12121, Thailand
                    <br>
                    Tel. (662) 696-6215, FAX. (662) 662-6218
                    <br>
                    jctuconference@gmail.com
                
                </p>
                </div>
                </div>

                </div>
            </div>
            </div>

        </div>
    </div>

   <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?php base_url(); ?>assets/js/vendor/jquery.min.js"><\/script>');</script>
    <script src="<?php base_url(); ?>assets/js/bootstrap.min.js"></script>
    
    <script src="<?php base_url(); ?>assets/js/unslider.js"></script> 
    
    <script>
            jQuery(document).ready(function($) {
                    $('.my-slider').unslider(
                            {
                                autoplay: true,
                                nav: false,
                                arrows: false,
                                delay:5000
                            });
            });
    </script>
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php base_url(); ?>assets/js/ie10-viewport-bug-workaround.js"></script>
    
    <script src="//cdn.jsdelivr.net/jquery/2.2.0/jquery.min.js"></script>
    <!-- Include the Sidr JS -->
    <script src="//cdn.jsdelivr.net/jquery.sidr/2.2.1/jquery.sidr.min.js"></script>
    
    <script>
    $(document).ready(function() {
      $('#simple-menu').sidr({
              side: 'right'
          });
    });
    </script>
</body>
</html>