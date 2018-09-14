<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1">
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
                    <li class="active"><a href="<?= base_url(); ?>">Home</a></li>
                    <li>|</li>
                    <li><a href="<?= base_url().'committee'; ?>">Committee and Review Board</a></li>
                    <li>|</li>
                    <li><a href="<?= base_url().'schedule'; ?>">Schedule</a></li>
                    <li>|</li>
                    <li><a href="<?= base_url().'useful'; ?>">Useful Information</a></li>
                    <li>|</li>
                    <li><a href="<?= base_url().'registration'; ?>">Registration</a></li>
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
                             if($content['section'] == 'head')
                             {
                                 $headcontent['topic'] = $content['topic'];
                                 $headcontent['subtopic'] = $content['subtopic'];
                                 $headcontent['body'] = $content['body'];
                             } 
                             else if($content['section'] == 'objective')
                            {
                                 $objectivecontent['topic'] = $content['topic'];
                                 $objectivecontent['subtopic'] = $content['subtopic'];
                                 $objectivecontent['body'] = $content['body'];
                             } 
                             else if($content['section'] == 'conference presentation')
                            {
                                 $conferencecontent['topic'] = $content['topic'];
                                 $conferencecontent['subtopic'] = $content['subtopic'];
                                 $conferencecontent['body'] = $content['body'];
                             }
                             else if($content['section'] == 'date')
                            {
                                 $datecontent['topic'] = $content['topic'];
                                 $datecontent['subtopic'] = $content['subtopic'];
                                 $datecontent['body'] = $content['body'];
                             }
                             else if($content['section'] == 'conference participants')
                            {
                                 $conferenceparticipants['topic'] = $content['topic'];
                                 $conferenceparticipants['subtopic'] = $content['subtopic'];
                                 $conferenceparticipants['body'] = $content['body'];
                             }
                        }
                                
                ?>
                 
                
                
                <div class="master-content-padding">
                    
                    
                <div class="row" style="vertical-align: middle;">

                    <div class="col-sm-2 col-md-2 master-content-container"> 
                   </div>
                    
                   <div class="col-sm-8 col-md-8 master-content-container master-content-image" style=""> 
                       <image src="<?php echo base_url('assets/image/tumalaya.jpg'); ?>" width="100%">
                   </div>
 
                    <div class="col-sm-2 col-md-2 master-content-container"> 
                   </div>
                </div>
                    
                    
                    
                    <h1 class="cover-heading master-content-heading">
                        <?php echo $headcontent['topic']; ?>
                    </h1>
                <p class="master-content-sub-heading">
                        <?php echo $headcontent['subtopic']; ?>
                </p>
                <p class="lead master-content-detail">
                        <?php echo nl2br($headcontent['body']); ?>
                </p>
                <br>
                <br>

                <h1 class="cover-heading master-content-heading">
                    <?php echo $objectivecontent['topic']; ?>
                </h1>
                <p class="master-content-sub-heading">
                    <?php echo $objectivecontent['subtopic']; ?>
                </p>
                <p class="lead master-content-detail">
                    <?php echo $objectivecontent['body']; ?>
                </p>

                <br>
                <br>

                <h1 class="cover-heading master-content-heading">
                    <?php echo $conferencecontent['topic']; ?>
                </h1>
                <p class="master-content-sub-heading">
                    <?php echo $conferencecontent['subtopic']; ?>
                </p>
                <p class="lead master-content-detail">
                    <?php echo $conferencecontent['body']; ?>
                </p>
                <br>

                <h1 class="cover-heading master-content-heading">
                    <?php echo $conferenceparticipants['topic']; ?>
                </h1>
                <p class="master-content-sub-heading">
                    <?php echo $conferenceparticipants['subtopic']; ?>
                </p>
                <p class="lead master-content-detail">
                    <?php echo $conferenceparticipants['body']; ?>
                </p>

                <br>

                <h1 class="cover-heading master-content-heading">
                    <?php echo $datecontent['topic']; ?>
                </h1>
                <p class="master-content-sub-heading">
                    <?php echo $datecontent['subtopic']; ?>
                </p>
                <p class="lead master-content-detail">
                    <?php echo $datecontent['body']; ?>
                </p>

                <br>
                <br>

                <?php
                $decoded = json_decode($filecontent,TRUE);
                $item = $decoded['callforpaper'];
                ?>
                
                <h1 class="cover-heading master-content-heading">Call for Paper</h1>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                    <table class="table table-bordered outer-borderess master-content-detail" id="table-normal">
                    <?php

                        foreach($item as $itemkey ){
                        echo "<tr>";
                        foreach($itemkey as $itemdata){
                            echo "<td>".$itemdata."</td>";
                        }
                        echo "</tr>";
                        }

                    ?>
                    </table>
                
                        
                  <table class="table table-bordered outer-borderess master-content-detail" id="table-small">
                    <?php

                    foreach($item as $itemkey ){
                      foreach($itemkey as $itemdata){
                          echo "<tr><td>".$itemdata."</td></tr>";
                      }
                    }

                    ?>
                  </table>
                        
                    </div>
                </div>
                
                <br>

                <div class="row">

                    <?php
                    $random = rand(0, 100);
                    foreach ($footerlist as $footer){
                       echo "<div class='col-sm-12 col-md-4 master-content-container master-content-image'>"; 
                       echo "<image src='".base_url()."assets/image/banner/".$footer."?".$random,"' width='100%'>";
                       echo "</div>";
                    }        
                    ?>
                     
                </div>
                </div>
            
            <br>
            
            <hr class="hr-footer">
            
            <div class="row row-centered">
            
            <div class="col-md-12">
            <nav class="nav nav-footer" id="nav">
            <ul>
                    <li class="active"><a href="<?= base_url(); ?>">Home</a></li>
                    <li>|</li>
                    <li><a href="<?= base_url().'committee'; ?>">Committee and Review Board</a></li>
                    <li>|</li>
                    <li><a href="<?= base_url().'schedule'; ?>">Schedule</a></li>
                    <li>|</li>
                    <li><a href="<?= base_url().'useful'; ?>">Useful Information</a></li>
                    <li>|</li>
                    <li><a href="<?= base_url().'registration'; ?>">Registration</a></li>
                    <li>|</li>
                    <li><a href="<?= base_url().'contact'; ?>">Contact us</a></li>
                </ul>
            </nav>
            </div>
            
            </div>
            
             </div>
             <div class="col-xs-0 col-sm-0 col-md-2"></div> 
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
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php base_url(); ?>assets/js/ie10-viewport-bug-workaround.js"></script>
    
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="<?php base_url(); ?>assets/js/unslider.js"></script> 
    
    <script>
            jQuery(document).ready(function($) {
                    $('.my-slider').unslider(
                            {
                                autoplay: true,
                                nav: true,
                                arrows: true,
                                delay:10000
                            });
            });
    </script>
        
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