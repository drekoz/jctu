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
    <link href="<?php echo base_url('assets/css/ie10-viewport-bug-workaround.css'); ?>" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="<?php echo base_url('assets/js/ie-emulation-modes-warning.js'); ?>"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
        
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap-formhelpers.css'); ?>" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
        
    <link rel="stylesheet" href="<?php echo base_url('assets/css/unslider.css'); ?>">  
    <link rel="stylesheet" href="//cdn.jsdelivr.net/jquery.sidr/2.2.1/stylesheets/jquery.sidr.light.min.css">
</head>
<body>

    
   <header id="header">
          <div class="row header">
              <div class="col-xs-10 col-sm-10 col-md-5">
                <image src="<?php echo base_url('assets/image/jc_logo.png'); ?>" width="100%">
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

            <div class="master-content-padding">      
               
            <div class="row">
                
            <?php
            
            if(!isset($refNo))
            {
            
            echo form_open('Payment/check');
            ?> 
            <div class="col-md-12">
            <p class="master-content-sub-heading registration-topic">Reference No.</p> 
            </div>
            <div class="col-md-9">    
            <input type="text" name="refNo" placeholder="Please Enter Reference No." class="master-content-sub-heading registration-topic" style="width: 100%;">
            </div>
            <div class=" col-md-3">
            <button type="submit" class="register-button btn btn-default" style="margin: 0px;">
            <h1 class="register-button-font" style="margin: 0px;">Submit</h1>
            </button>
            </div>
             <?php 
            echo form_close();
            
            }else{
                
                if($regData['count'] == 0)
                {
                  echo form_open('Payment/check');
                    ?>
                    <div class="col-md-12">
                    <p class="master-content-sub-heading registration-topic">Reference No.</p> 
                    </div>
                    <div class="col-md-9">    
                    <input type="text" name="refNo" placeholder="Please Enter Reference No." class="master-content-sub-heading registration-topic" style="width: 100%;">
                    </div>
                    <div class=" col-md-3">
                    <button type="submit" class="register-button btn btn-default" style="margin: 0px;">
                    <h1 class="register-button-font" style="margin: 0px;">Submit</h1>
                    </button>
                    </div>
                        <div class='col-md-12'>
                            <p class="master-content-sub-heading" style="color: red">
                                Reference No. not found.
                            </p>
                        </div>
                     <?php 
                    echo form_close();
                }else
                {
                 
                
           ?> 
                
            <h1 class="master-content-heading">
               <?php 
               if($regData['RegistrationType'] <= 4)
               {
                   echo "Attendance Registration";
               }else
               {
                   echo "Presenter Registration";
               }
               ?>
           </h1>
            <br>
            
            <div class="col-md-12">
            <p class="master-content-sub-heading registration-topic">Reference No. : <?php echo $refNo; ?></p>    
            </div>
            
            <div class="col-md-12">
                <p class="master-content-sub-heading registration-topic">1. Applicant</p>
                <legend>1.1 Personal Data</legend>
                <?php echo $regData['Title_1'].$regData["Firstname"]." ".$regData["Lastname"]; ?>
                <br>
                Title : <?php echo $regData['Title_2']; ?>
                <br>
                Organization : <?php echo $regData['Organization']; ?>
                <legend>1.2 Address</legend>
                Postal address : <?php echo $regData['PostalAddress']; ?>
                <br>
                City : <?php echo $regData['City']; ?>
                <br>
                Postcode : <?php echo $regData['Postcode']; ?>
                <br>
                Country : <?php echo $regData['Country']; ?>
                <br>
                Tel. : <?php echo $regData['Tel']; ?>
                <br>
                Mobile : <?php echo $regData['Mobile']; ?>
                <br>
                Email : <?php echo $regData['Email']; ?>
                
                <p class="master-content-sub-heading registration-topic">2. Food restriction (if any)</p>
                <?php echo $regData['FoodType']; ?>
                
                <?php 
                if($regData['RegistrationType'] <= 4)
                {
                ?>
                <p class="master-content-sub-heading registration-topic">3. Registration fee</p>
                <table class="table table-bordered schedule-table master-content-detail registration-table">
                    <tr>
                        <th width="60%">Registration fee</th>
                        <th width="20%">Before 15th May 2017</th>
                        <th width="20%">16th May 2017 – 21st July 2017</th>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="participantnational" id="thairadio" value="thai" disabled <?php if($regData['RegistrationType'] <= 2){echo "checked";} ?> >
                            Thai Participant
                          </label>
                        </td>
                        <td>1,000 Baht</td>
                        <td>1,500 Baht</td>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="participantnational" id="internationalradio" value="international" disabled <?php if($regData['RegistrationType'] >= 3){echo "checked";} ?>>
                            International Participant
                          </label>
                        </td>
                        <td>30 USD</td>
                        <td>45 USD</td>
                    </tr>
                </table>
                <br>
                <?php
  
                }else{
                ?>
                <p class="master-content-sub-heading registration-topic">3. Topic Area</p>
                <?php echo $regData['TopicArea']; ?>
                <br>
                <p class="master-content-sub-heading registration-topic">4. Abstract title</p>
                <?php echo $regData['AbstractTitle']; ?>
                <p class="master-content-sub-heading registration-topic">5. Registration fee</p>
                <table class="table table-bordered schedule-table master-content-detail registration-table">
                    <tr>
                        <th width="60%">Registration fee</th>
                        <th width="20%">Before 15th May 2017</th>
                        <th width="20%">16th May 2017 – 21st July 2017</th>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="participantnational" id="thairadio" value="thairesident" disabled <?php if($regData['RegistrationType'] == 9 || $regData['RegistrationType'] == 10){echo "checked";} ?>>
                            Thai Resident
                          </label>
                        </td>
                        <td>2,000 Baht</td>
                        <td>3,000 Baht</td>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="participantnational" id="internationalradio" value="internationalresident" disabled <?php if($regData['RegistrationType'] == 11 || $regData['RegistrationType'] == 12){echo "checked";} ?>>
                            International Resident
                          </label>
                        </td>
                        <td>60 USD</td>
                        <td>90 USD</td>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="participantnational" id="internationalradio" value="thaistudent" disabled <?php if($regData['RegistrationType'] == 5 || $regData['RegistrationType'] == 6){echo "checked";} ?>>
                            Thai Student
                          </label>
                        </td>
                        <td>1,500 Baht</td>
                        <td>2,000 Baht</td>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="participantnational" id="internationalradio" value="internationalstudent" disabled <?php if($regData['RegistrationType'] == 7 || $regData['RegistrationType'] == 8){echo "checked";} ?>>
                            International Student
                          </label>
                        </td>
                        <td>45 USD</td>
                        <td>60 USD</td>
                    </tr>
                </table>
                <?php
                }
                ?>
                
            </div>
            </div>
                <br><br>
                <div class="row">
                    <?php
                    
                    date_default_timezone_set("Asia/Bangkok");
                    
                    $isPaid = false;
                    if($regData['RegistrationStatus'] >= 4)
                    {$isPaid = true;}
                    
                    if($regData['RegistrationType'] <= 2 || $regData['RegistrationType'] == 5
                        || $regData['RegistrationType'] == 6 || $regData['RegistrationType'] == 9
                        || $regData['RegistrationType'] == 10)
                        {
                        //Thai register
                        ?>
                        <div class=" col-md-1"></div>
                    <div class=" col-md-4 text-center">
                                                                                
                        <form name="payForm" id="payForm" method="POST" action="https://nsips.scb.co.th/NSIPSWeb/NsipsMessageAction.do">
                            <input type="hidden" name="mid" value="1000016550" />
                            <input type="hidden" name="terminal" value="321117936" />
                            <input type="hidden" name="command" value="CRAUTH" />
                            <input type="hidden" name="ref_no" value="O_<?php echo $refNo; ?>"/>
                            <input type="hidden" name="ref_date" value="<?php echo date("YmdHis"); ?>" />
                            <input type="hidden" name="service_id" value="10" />
                            <input type="hidden" name="cust_id" value="1" />
                            <input type="hidden" name="cur_abbr" value="THB" />
                            <input type="hidden" name="amount" value ="<?php echo $regData['fee']; ?>" />
                            <input type="hidden" name="cust_lname" value="" />
                            <input type="hidden" name="cust_mname" value="" />
                            <input type="hidden" name="cust_fname" value="" />
                            <input type="hidden" name="cust_email" value="" />
                            <input type="hidden" name="cust_country" value="" />
                            <input type="hidden" name="cust_address1" value="" />
                            <input type="hidden" name="cust_address2" value="" />
                            <input type="hidden" name="cust_city" value="" />
                            <input type="hidden" name="cust_province" value="" />
                            <input type="hidden" name="cust_zip" value="" />
                            <input type="hidden" name="cust_phone" value="" />
                            <input type="hidden" name="cust_fax" value="" />
                            <input type="hidden" name="ship_lname" value="" />
                            <input type="hidden" name="ship_mname" value="" />
                            <input type="hidden" name="ship_fname" value="" />
                            <input type="hidden" name="ship_country" value="" />
                            <input type="hidden" name="ship_address1" value="" />
                            <input type="hidden" name="ship_address2" value="" />
                            <input type="hidden" name="ship_city" value="" />
                            <input type="hidden" name="ship_province" value="" />
                            <input type="hidden" name="ship_zip" value="" />
                            <input type="hidden" name="ship_phone" value="" />
                            <input type="hidden" name="ship_fax" value="" />
                            <input type="hidden" name="description" value="" />
                            <input type="hidden" name="usrdat1" value="" />
                            <input type="hidden" name="usrdat2" value="" />
                            <input type="hidden" name="usrdat3" value="" />
                            <input type="hidden" name="usrdat4" value="" />
                            <input type="hidden" name="usrdat5" value="" />
                            <input type="hidden" name="usrdat6" value="" />
                            <input type="hidden" name="usrdat7" value="" />
                            <input type="hidden" name="usrdat8" value="" />
                            <input type="hidden" name="usrdat9" value="" />
                            <input type="hidden" name="usrdat10" value="" />
                            <input type="hidden" name="backURL" value="http://conference.jc.tu.ac.th/jctu2016/Paymentresult"/>
                            <input type="hidden" name="settlement_flag" value="1" />
                            
                        <?php
                        if(!$isPaid){
                          ?>
                            <button type="submit" class="register-button btn btn-default" >
                        <h1 class="register-button-font">Online Transaction</h1>
                        </button>
                         Direct debit or credit card is required for online transaction.
                         <?php
                        }
                        ?>
                        </form>
                        
                        
                    </div>
                    <div class=" col-md-2"></div>
                    <div class=" col-md-4">
                        <?php
                        if(!$isPaid){
                            ?>
                        <a href="<?= base_url().'Payment/getPayin/'.$refNo; ?>" class="register-button btn btn-default" role="button">
                        <h1 class="register-button-font">Bank Payment</h1>
                        </a>
                        <?php
                        }
                        ?>
                    </div>
                    <div class=" col-md-1"></div>
                    <?php
                        }else{
                            //internation register only pay by Online Transaction
               
                    ?>
                    
                    <div class=" col-md-4"></div>
                    <div class=" col-md-4 text-center">
                        <form name="payForm" id="payForm" method="POST" action="https://nsips.scb.co.th/NSIPSWeb/NsipsMessageAction.do">
                            <input type="hidden" name="mid" value="1000016550" />
                            <input type="hidden" name="terminal" value="321117936" />
                            <input type="hidden" name="command" value="CRAUTH" />
                            <input type="hidden" name="ref_no" value="O_<?php echo $refNo; ?>"/>
                            <input type="hidden" name="ref_date" value="<?php echo date("YmdHis"); ?>" />
                            <input type="hidden" name="service_id" value="10" />
                            <input type="hidden" name="cust_id" value="1" />
                            <input type="hidden" name="cur_abbr" value="USD" />
                            <input type="hidden" name="amount" value ="<?php echo $regData['fee']; ?>" />
                            <input type="hidden" name="cust_lname" value="" />
                            <input type="hidden" name="cust_mname" value="" />
                            <input type="hidden" name="cust_fname" value="" />
                            <input type="hidden" name="cust_email" value="" />
                            <input type="hidden" name="cust_country" value="" />
                            <input type="hidden" name="cust_address1" value="" />
                            <input type="hidden" name="cust_address2" value="" />
                            <input type="hidden" name="cust_city" value="" />
                            <input type="hidden" name="cust_province" value="" />
                            <input type="hidden" name="cust_zip" value="" />
                            <input type="hidden" name="cust_phone" value="" />
                            <input type="hidden" name="cust_fax" value="" />
                            <input type="hidden" name="ship_lname" value="" />
                            <input type="hidden" name="ship_mname" value="" />
                            <input type="hidden" name="ship_fname" value="" />
                            <input type="hidden" name="ship_country" value="" />
                            <input type="hidden" name="ship_address1" value="" />
                            <input type="hidden" name="ship_address2" value="" />
                            <input type="hidden" name="ship_city" value="" />
                            <input type="hidden" name="ship_province" value="" />
                            <input type="hidden" name="ship_zip" value="" />
                            <input type="hidden" name="ship_phone" value="" />
                            <input type="hidden" name="ship_fax" value="" />
                            <input type="hidden" name="description" value="" />
                            <input type="hidden" name="usrdat1" value="" />
                            <input type="hidden" name="usrdat2" value="" />
                            <input type="hidden" name="usrdat3" value="" />
                            <input type="hidden" name="usrdat4" value="" />
                            <input type="hidden" name="usrdat5" value="" />
                            <input type="hidden" name="usrdat6" value="" />
                            <input type="hidden" name="usrdat7" value="" />
                            <input type="hidden" name="usrdat8" value="" />
                            <input type="hidden" name="usrdat9" value="" />
                            <input type="hidden" name="usrdat10" value="" />
                            <input type="hidden" name="backURL" value="http://conference.jc.tu.ac.th/jctu2016/Paymentresult"/>
                            <input type="hidden" name="settlement_flag" value="1" />
                            
                            <?php
                            if(!$isPaid){
                                ?>
                            
                        <button type="submit" class="register-button btn btn-default">
                        <h1 class="register-button-font">Online Transaction</h1>
                        </button>
                        Direct debit or credit card is required for online transaction.
                        <?php
                            }
                            ?>
                        </form>
                        
                    </div>
                    <div class=" col-md-4"></div>
                    
                    <?php
                        }
                        ?>
                </div>
                <br><br>
             <?php  
             
                }
            }
            
            ?>
            </div>
            
            
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
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-formhelpers-countries.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-formhelpers.js'); ?>"></script>
    
    <script src="<?php echo base_url('assets/js/unslider.js'); ?>"></script> 
    
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
    <script src="<?php echo base_url('assets/js/ie10-viewport-bug-workaround.js'); ?>"></script>
    
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
    
    <script>
    function countryChanged() {
        var x = document.getElementById("selectcountry");

        var text = "";
        if (x.selectedIndex !== -1)
            text = x.options[x.selectedIndex].text;
        
        document.getElementById("hiddencountry").value = text;
        
        if(x.value === 'TH')
        {
            document.getElementById('thairadio').checked = true;
            document.getElementById('internationalradio').checked = false;
        }else{
            document.getElementById('thairadio').checked = false;
            document.getElementById('internationalradio').checked = true;
        }
    }
    </script>



</body>
</html>