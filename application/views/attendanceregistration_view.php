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
               <h1 class="master-content-heading">
                   Attendance Registration
               </h1>
                
            <br>
            
            <div class="row">
            <div class="col-md-12">
                
                    
                <form class="registration-form" action = "Attendanceregistration/register" method="POST" data-toggle="validator">
                <p class="master-content-sub-heading registration-topic">1. Applicant</p>
                <legend>1.1 Personal Data</legend>
                <fieldset class="form-group row">
                <div class="form-check col-md-4">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="Title_1" id="optionsRadios1" value="Mr." checked>
                    <font class="registration-input-head">Mr.</font>
                  </label>
                </div>
                <div class="form-check col-md-4">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="Title_1" id="optionsRadios2" value="Mrs.">
                    <font class="registration-input-head">Mrs.</font>
                  </label>
                </div>
                <div class="form-check col-md-4">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="Title_1" id="optionsRadios2" value="Ms.">
                    <font class="registration-input-head">Ms.</font>
                  </label>
                </div>
              </fieldset>
                
                <div class="form-group">
                  <label for="inputfirstname" class="registration-input-head">First name</label>
                  <input type="text" class="form-control" name="inputfirstname" id="inputfirstname" aria-describedby="firstname" placeholder="Enter firstname" name="inputfirstname" required>
                </div>
                <div class="form-group">
                  <label for="inputlastname" class="reztration-input-head">Last name</label>
                  <input type="text" class="form-control" name="inputlastname" id="inputlastname" aria-describedby="lastname" placeholder="Enter lastname" name="inputlastname" required>
                </div>
                
                <fieldset class="form-group row">
                    <div class=" col-md-12"><font class="registration-input-head">Title</font></div>
                <div class="form-check col-md-4">
                  <label class="form-check-inline">
                    <input type="radio" class="form-check-input" name="Title_2" id="prefessor" value="Professor" checked>
                    <font class="registration-input-head">Professor</font>
                  </label>
                </div>
                <div class="form-check col-md-4">
                <label class="form-check-inline">
                    <input type="radio" class="form-check-input" name="Title_2" id="associateprof" value="Associate Prof">
                    <font class="registration-input-head">Associate Prof</font>
                  </label>
                </div>
                <div class="form-check col-md-4">
                <label class="form-check-inline">
                    <input type="radio" class="form-check-input" name="Title_2" id="assistprof" value="Assist prof">
                    <font class="registration-input-head">Assist prof</font>
                  </label>
                </div>
                <div class="form-check col-md-4">
                <label class="form-check-inline">
                    <input type="radio" class="form-check-input" name="Title_2" id="lecturer" value="Lecturer">
                    <font class="registration-input-head">Lecturer</font>
                  </label>
                </div>
                <div class="form-check col-md-4">
                <label class="form-check-inline">
                    <input type="radio" class="form-check-input" name="Title_2" id="student" value="Student">
                    <font class="registration-input-head">Student</font>
                  </label>
                </div>
                <div class="form-check col-md-4">
                <label class="form-check-inline">
                    <input type="radio" class="form-check-input" name="Title_2" id="researcher" value="Researcher">
                    <font class="registration-input-head">Researcher</font>
                  </label>
                </div>
                <div class="form-check col-md-4">
                <label class="form-check-inline">
                    <input type="radio" class="form-check-input" name="Title_2" id="other" value="Other">
                    <font class="registration-input-head">Other</font>
                  </label>
                </div>
              </fieldset>
                <div class="form-group">
                  <label for="inputorganization" class="registration-input-head">Organization</label>
                  <input type="text" class="form-control" name="inputorganization" id="inputorganization" aria-describedby="organization" placeholder="Enter organazition"required>
                </div>
                
                <legend>1.2 Address</legend>
                <div class="form-group">
                  <label for="inputpostaladdress" class="registration-input-head">Postal address</label>
                  <input type="text" class="form-control" id="inputpostaladdress" aria-describedby="postaladdress" placeholder="Enter postal address" name="inputpostaladdress" required>
                </div>
                <div class="form-group">
                  <label for="inputcity" class="registration-input-head">City</label>
                  <input type="text" class="form-control" id="inputcity" aria-describedby="emailHelp" placeholder="Enter city" name="inputcity" required>
                </div>
                <div class="form-group">
                  <label for="inputpostalcode" class="registration-input-head">Postcode</label>
                  <input type="text" class="form-control" id="inputpostcode" aria-describedby="postalcode" placeholder="Enter postal code" name="inputpostcode">
                </div>
                <div class="form-group">
                  <label for="selectcountry" class="registration-input-head">Country</label>
                  <br><select class="input-medium bfh-countries" id="selectcountry" name="selectcountry" data-country="TH" onchange="countryChanged()"></select>
                  <input type="hidden" id="hiddencountry" name ="hiddencountry" value="Thailand" />
                </div>
                <div class="form-group">
                  <label for="inputtel" class="registration-input-head">Tel.</label>
                  <input type="text" class="form-control" id="inputtel" aria-describedby="tel" placeholder="Enter tel." name="inputtel" required>
                </div>
                <div class="form-group">
                  <label for="inputmobile" class="registration-input-head">Mobile</label>
                  <input type="text" class="form-control" id="inputmobile" aria-describedby="mobile" placeholder="Enter mobile" name="inputmobile" required>
                </div>
                <div class="form-group">
                  <label for="inputemail" class="registration-input-head">Email</label>
                  <input type="email" class="form-control" id="inputemail" aria-describedby="email" placeholder="Enter email" name="inputemail" required>
                </div>
                
                <fieldset class="form-group row">
                <p class="master-content-sub-heading registration-topic">2. Food restriction (if any)</p>
                
                <div class="form-check col-md-4">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="foodrestriction" id="none" value="None" checked>
                    <font class="registration-input-head">None</font>
                  </label>
                </div>
                
                 <div class="form-check col-md-4">
                    <label class="form-check-label">
                      <input type="radio" class="form-check-input" name="foodrestriction" id="checknonbeef" value="Non Beef">
                      <font class="registration-input-head">Non beef</font>
                    </label>
                  </div>
                
                <div class="form-check col-md-4">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="foodrestriction" id="checkmuslim" value="Muslim Meal">
                      <font class="registration-input-head">Muslim Meal</font>
                    </label>
                  </div>
                
                <div class="form-check col-md-4">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="foodrestriction" id="checkvegetarian" value="Vegetarian Meal">
                      <font class="registration-input-head">Vegetarian Meal</font>
                    </label>
                  </div>
                
                <div class="form-check col-md-12">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="foodrestriction" id="checkOther" value="Other">
                      <font class="registration-input-head">Other</font>
                    </label>
                    <div class="form-group">
                        <input type="text" class="form-control" id="inputmealother" aria-describedby="mealother" placeholder="Please specify" name="inputmealother">
                    </div>
                  </div>
                </fieldset>
                
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
                                <input type="radio" class="form-check-input" name="participantnational" id="thairadio" value="thai" checked disabled>
                            Thai Participant
                          </label>
                        </td>
                        <td>1,000 Baht</td>
                        <td>1,500 Baht</td>
                    </tr>
                    <tr>
                        <td>
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="participantnational" id="internationalradio" value="international" disabled>
                            International Participant
                          </label>
                        </td>
                        <td>30 USD</td>
                        <td>45 USD</td>
                    </tr>
                </table>
                <br>

                <div class="row">
                    <div class=" col-md-4"></div>
                    <div class=" col-md-4">
                        <button type="submit" class="register-button btn btn-default">
                        <h1 class="register-button-font">Submit</h1>
                        </button>
                        </div>
                    <div class=" col-md-4"></div>
                </div>
                
              </form>
                
            </div>
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