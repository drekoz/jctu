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
                    <li class="active"><a href="<?= base_url().'schedule'; ?>">Schedule</a></li>
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
              
             <div class="col-xs-0 col-sm-0 col-md-1"></div>
              
             <div class="col-xs-12 col-sm-12 col-md-10 master-content-container"> 
                 <br>
                 <br>
            
                 <?php 
                        foreach($contentdata as $content)
                        {
                             if($content['section'] == 'scheduleandvenue')
                             {
                                 $scheduleandvenuecontent['topic'] = $content['topic'];
                                 $scheduleandvenuecontent['subtopic'] = $content['subtopic'];
                                 $scheduleandvenuecontent['body'] = $content['body'];
                             } 
                             else if($content['section'] == 'importantdates')
                            {
                                 $importantdatescontent['topic'] = $content['topic'];
                                 $importantdatescontent['subtopic'] = $content['subtopic'];
                             } 
                             else if($content['section'] == 'programschedule')
                            {
                                 $programschedulecontent['topic'] = $content['topic'];
                                 $programschedulecontent['subtopic'] = $content['subtopic'];
                             }
                        }     
                ?>
                 
            <div class="master-content-padding">
                
                <h1 class="cover-heading master-content-heading">
                        <?php echo $scheduleandvenuecontent['topic']; ?>
                    </h1>
                <p class="master-content-sub-heading">
                        <?php echo $scheduleandvenuecontent['subtopic']; ?>
                </p>
                <p class="lead master-content-detail">
                        <?php echo nl2br($scheduleandvenuecontent['body']); ?>
                </p>
                
            <br>
            <br>
            <?php
           
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
            
           
            $decoded = json_decode($filecontent,TRUE);
            $importantdate = $decoded['importantdate'];
            ?>
            
            
            <h1 class="cover-heading master-content-heading">
                    <?php echo $importantdatescontent['topic']; ?>
            </h1>
            <p class="master-content-sub-heading">
                    <?php echo $importantdatescontent['subtopic']; ?>
            </p>
            
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
            <table class="table table-bordered outer-borderess master-content-detail">
               <?php
                        foreach($importantdate as $itemkey ){
                        echo "<tr>";
                        $left = true;
                        foreach($itemkey as $itemdata){
                            if($left){
                                echo "<td class='text-right'>".$itemdata."</td>";
                                $left = false;
                            }else
                            {
                              echo "<td class='text-left'>".$itemdata."</td>"; 
                              $left = true;
                            }
                        }
                        echo "</tr>";
                        }

                    ?>
              </table>
                    </div>
                <div class="col-md-3"></div>
            </div>
            
            <br>
            <br>
            </div>
                 
            
                 
            <div class="master-content-padding-useful" style="padding-left: 10px;padding-right: 10px;">
            <h1 class="cover-heading master-content-heading">
                    <?php echo $programschedulecontent['subtopic']; ?>
            </p>
            
            
                    <?php echo $programschedulecontent['topic']; ?>
            </h1>
            <p class="master-content-sub-heading">
            <div class="row">
                <div class="col-xs-12">
            <table class="table table-bordered schedule-table master-content-detail">
            <?php
           
//           $item = $decoded['programschedule'];
//           
//             $venueduplicate = 0;
//             
//            foreach($item as $itemkey => $itemvalue ){
//           
//            foreach($itemvalue as $keydata => $valuedata){
//                    
//                echo "<tr><td rowspan='".countRowForTableSpan($itemkey,$item)."'>".$keydata."</td>";
//                foreach($valuedata as $key => $value){
//                    
//                    foreach($value as $key2 => $value2){
//                        $venueduplicate = count($value2);
//                        if($venueduplicate > 1){
//                            echo "<td rowspan='".count($value2)."'>".$key2."</td>";
//                        }else
//                        {
//                            if($key == 0){
//                                echo "<td>".$key2."</td>";
//                            }else{
//                                echo "<tr><td>".$key2."</td>";
//                            }
//                        }
//                        foreach($value2 as $key3 => $value3){
//                            foreach ($value3 as $key4 => $value4){
//                                if($venueduplicate > 1){
//                                    if($key3 == 0)
//                                    {
//                                        echo "<td>".$key4."</td><td>".$value4."</td>";
//                                    }else{
//                                       echo "<tr><td>".$key4."</td><td>".$value4."</td>"; 
//                                    }
//                                }else{
//                                    echo "<td>".$key4."</td><td>".$value4."</td></tr>";
//                                }
//
//                                    echo "</tr>";
//                                
//                            }
//                        }
//                    }
//                    
//                }
//            }
//            }
            ?>   
                
                <tr>
                    <td>
                        <b>Groups/Rooms</b>
                    </td>
                    <td>
                        <b>Presenters/Topics</b>
                    </td>
                    <td>
                        <b>Morning/Time</b>
                    </td>
                    <td>
                        <b>*Chairman</b>
                    </td>
                    <td>
                        <b>Presentercs/Topics</b>
                    </td>
                    <td>
                        <b>Afternoon/Time</b>
                    </td>
                    <td>
                        <b>*Chairman</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Room</b>
                        <br>
                        Auditorium
                    </td>
                    <td>
                        <b>Opening ceremony</b>
                    </td>
                    <td>
                        9.00-9.30
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <b>Room</b>
                        <br>
                        Auditorium
                    </td>
                    <td>
                        <b>Keynote speaker
                            <br>
                            Professor Dr.Chaiwat Satha-Anand
                        </b>
                    </td>
                    <td>
                        9.30-10.00
                    </td>
                    <td></td>
                    <td><b>Keynote speaker
                            <br>
                        PROF. DR. AZIZAH BINTI HAMZAH</b>
                    </td>
                    <td>
                        1.30-2.00
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="2">
                        <b>Group A</b>
                        <br>
                        Communication Technology: New Media/Social Media
                        <br>
                        <br>
                        <b>Room</b>
                        <br>
                        Auditorium
                    </td>
                    <td>
                        1. JM 02  Proposal of Interactive Digital Signage Using Image Pro Image Processing by Single Camera 
                        <br><b>Kazuo Hemmi</b>
                    </td>
                    <td>
                        10.00-10.15
                    </td>
                    <td rowspan="2"><b>Assist.Prof. Dr. Vikanda Pornsakulvanich</b>
                    </td>
                    <td>
                        1. JM15 Overview of Political Crimes In Online Social Media Under Thai Law
                        <br><b>Kantira Chayawong</b>
                    </td>
                    <td>2.00-2.15
                    </td>
                    <td rowspan="2">
                        <b>Lecturer    
                        <br>Dr.Senjo Nakai</b>
                    </td>
                </tr>
                <tr>
                    <td>
                        2. JM17 New Media Paradigms In A Changing Society
                        <br><b>Sascha H. Funk</b>
                    </td>
                    <td>
                        10.15-10.30
                    </td>
                    <td>
                        2. JM16  The Utilization of Social Media While Driving of People in Bangkok
                        <br><b>Duangjui Wuttikrai</b>
                        <br><font style="color: red;">(Article Withdrawal)</font>
                    </td>
                    <td>
                        2.15-2.30
                    </td>
                </tr>
                <tr>
                    <td rowspan="3">
                        <b>Group A</b>
                        <br>
                        Communication Technology: New Media/Social Media
                        <br>
                        <br>
                        <b>Room</b>
                        <br>
                        Auditorium
                    </td>
                    <td>
                        3. JM05 Demonstration Experiments of Safety Confirmation System by Use of Mobile Phone Line
                        <br><b>Kazuhisa OBA</b>
                    </td>
                    <td>10.30-10.45</td>
                    <td rowspan="3">
                        <b>Assist. Prof. Dr. Vikanda Pornsakulvanich</b> 
                    </td>
                    <td>
                        3. JM04 From digital rumor to print: The contradict development within Thai society	
                        <br><b>Visawat Panyawongsataporn</b>
                    </td>
                    <td>2.30-2.45</td>
                    <td rowspan="3"><b>Lecturer
                            <br>Dr.Senio Nakai</b>
                    </td>   
                </tr>
                <tr>
                    <td colspan="2"><b>BREAK 15 mins</b></td>
                    <td colspan="2"><b>BREAK 15 mins</b></td>
                </tr>
                <tr>
                    <td>
                        4. JM11  Expectation, Exposure and Satisfaction of Generation Y toward the Online Travel Agent, TripAdvisor
                        <br><b>Wirunphat Manitsorasak</b>
                    </td>
                    <td>
                        11.00-11.15
                    </td>
                    <td>
                        4. JM22 From oral to digital: The new folk tale publishing ecosystem in Malaysia
                        <br><b>Rosmani Omar, 
Md Sidin Ahmad Ishak and Siti Ezaleila Mustafa</b>
                    </td>
                    <td>
                        3.00-3.15
                    </td>
                </tr>
                <tr>
                    <td rowspan="3">
                        <b>Group A</b>
                        <br>
                        Communication Technology: New Media/Social Media
                        <br>
                        <br>
                        <b>Room</b>
                        <br>
                        Auditorium
                    </td>
                    <td>
                        5. JM12 Tinder for Thais: Exploring motivations and experiences
of Tinder users
                        <br><b>Arpapat Indradat</b>
                    </td>
                    <td>11.15-11.30</td>
                    <td rowspan="3">
                        <b>Assist. Prof. Dr. Vikanda Pornsakulvanich</b> 
                    </td>
                    <td>
                        5. JM24 The Influence of Digital Media Technology to Urban Malay Youths	
                        <br><b>Siti Ezaleila Mustafa*, Norzaliza Sarmiti & 
Azizah Hamzah</b>
                    </td>
                    <td>3.15-3.30</td>
                    <td rowspan="3"><b>Lecturer
                            <br>Dr.Senio Nakai</b>
                    </td>   
                </tr>
                <tr>
                    <td>
                        6. JM14 A Textual Analysis of Online News Headlines Using Transitivity to Represent Social Reality
                        <br><b>Annisa Laura Maretha, 
<br>Allan Kongthai</b>
                    </td>
                    <td>
                        11.30-11.45
                    </td>
                    <td>
                        6. JM26 Crisis Reporting: A Study of Two Malaysian Online Newspapers on the Reporting of MH370
                        <br><b>Nourhan A.A Ebaid and Hamedi M. Adnan</b>
                    </td>
                    <td>
                        3.30-3.45
                    </td>
                </tr>
                <tr>
                    <td>
                        7. JM37 Using smartphone for Nutrition: Household level counseling and monitoring
                        <br><b>Rajani Kayastha, 
<br>Ravindra Kumar Thapa, 
<br>Rajeev Banjara*, 
<br>Laura Brye, 
<br>Peter Oyloe1</b>
                    </td>
                    <td>
                        11.45-12.00
                    </td>
                    <td>
                        7. JM27 The Adoption, Use and Effectiveness of Online Social Media in Volunteerism for the Refugee Children’s Education in Malaysia
                        <br><b>Sahar Shekaliu, 
<br>Siti Ezaleila Mustafa & 
<br>Hamedi Mohd Adnan</b>
                    </td>
                    <td>
                        3.45-4.00
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><b>LUNCH</b></td>
                </tr>
<!--                        -->
<!--                Group B -->
<!--                        -->
                <tr>
                    <td rowspan="9">
                        <b>Group B</b>
                        <br>
                        Critical Cultural Studies
                        <br>
                        and
                        <br>
                        Special issues in Communication
                        <br>
                        <br>
                        <b>Room</b>
                        <br>
                        JM401
                    </td>
                    <td>
                        1. JM01 An analysis of a civic discourse of satire and parody in Malay humor in selected libel cases in Malaysia
                        <br><b>Amalina Mustaffa, 
<br>Azalanshah Md Syed, 
<br>Zahir Ahmad</b>
                    </td>
                    <td>10.00-10.15</td>
                    <td rowspan="9">
                        <b>Assist. Prof. Dr. Arada Karuchit</b> 
                    </td>
                    <td>
                        1. JM20 The Necessity of Health Communication in Health Promotion
                        <br><b>Wannarat Rattanawarang</b>
                    </td>
                    <td>2.00-2.15</td>
                    <td rowspan="9"><b>Assist. Prof. Dr. Nitida Sangsingken</b>
                    </td>   
                </tr>
                <tr>
                    <td>
                        2. JM07 Possibility of Establishing an Asean Museum in Thailand
                        <br><b>Kanyarat Muanthong</b>
                    </td>
                    <td>
                        10.15-10.30
                    </td>
                    <td>
                        2. JM21 Preventing new HIV infections through voluntary medical male circumcision: What explains it’s low uptake in Tamandai community, Zimbabwe
                        <br><b>Gwinyai Tinarwo</b>
                    </td>
                    <td>
                        2.15-2.30
                    </td>
                </tr>
                <tr>
                    <td>
                        3. JM25 ‘The Devil Other’: Crime News Discourses and Foreign Nationals in Malaysia
                        <br><b>Norealyna Misman, 
<br>Hamedi Mohd Adnan and 
<br>Amira Sariyati Firdaus</b>
                    </td>
                    <td>
                        10.30-10.45
                    </td>
                    <td>
                        3. JM29 Exploring health communication factors related to utilization of cervical cancer screening services: The case of Bindura Urban District, Zimbabwe
                        <br><b>Deloune C. Matongo<sup>1,2</sup>, 
<br>Nigel James<sup>3,4</sup>, 
<br>Julita Maradzika<sup>1</sup>, 
<br>James January<sup>1</sup>, 
<br>Godknows S. Muperekedzwa<sup>1</sup></b>
                    </td>
                    <td>
                        2.30-2.45
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><b>BREAK 15 mins</b></td>
                    <td colspan="2"><b>BREAK 15 mins</b></td>
                </tr>
                <tr>
                    <td>
                        4. JM10 Klai Baan: A magnifier to political communication
                        <br><b>Napitiya Banjongjit</b>
                    </td>
                    <td>
                        11.00-11.15
                    </td>
                    <td>
                        4. JM08 Upin & Ipin and the Rhetoric of Inclusion
                        <br><b>Shahreen Mat Nayan & 
<br>Siti Ezaleila Mustafa</b>
                    </td>
                    <td>
                        3.00-3.15
                    </td>
                </tr>
                <tr>
                    <td>
                        5. JM13 Social Determinants Perspective on Non-Adherence to Exclusive Breastfeeding-the Case of Mazowe Commercial Farms Setting, Zimbabwe
                        <br><b>Nigel James</b>
                    </td>
                    <td>
                        11.15-11.30
                    </td>
                    <td>
                        5. JM31 Translation and Knowledge Transfer: Roles and Contributions in continuum of civilization
                        <br><b>Abd Wahid Jais</b>
                    </td>
                    <td>
                        3.15-3.30
                    </td>
                </tr>
                <tr>
                    <td>
                        6. JM19 Breaking the Culture of Silence: A Review of Communication Influence on Adolescent Pregnancies in Sub-Saharan Africa
                        <br><b>Letitsia Mupanguri, Nigel James</b>
                    </td>
                    <td>
                        11.30-11.45
                    </td>
                    <td>
                        6. JM32 Service Value through perceptual customer with SERQUAL instrument measurement
                        <br><b>Muenjit Jitsoonthornchaikul</b>
                    </td>
                    <td>
                        3.30-3.45
                    </td>
                </tr>
                <tr>
                    <td>
                        7. JM35 Mapping information efficacy during 2014 Ebola crises in Nigeria
                        <br><b>Lateef Adekunle Adelakun</b>
                    </td>
                    <td>
                        11.45-12.00
                    </td>
                    <td>
                        7. JM38 Assessing the use of communication technology among mothers of infants in Rukum District of Nepal 
                        <br><b>Prof.Chitra Kumar Gurung<sup>1</sup>, 
<br>Dr Megha Raj Banjara<sup>1</sup>, 
<br>Ms Sandhya Gurung<sup>2</sup>, 
    <br>Mr Sandeep Ghimire<sup>2*</sup></b>
                    </td>
                    <td>
                        3.45-4.00
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><b>LUNCH</b></td>
                </tr>
<!--                        -->
<!--                Group C -->
<!--                        -->
                <tr>
                    <td rowspan="7">
                        <b>Group C</b>
                        <br>
                        Marketing/Advertising/
Public Relations/Radio and Television/Film
                        <br>
                        <br>
                        <b>Room</b>
                        <br>
                        JM203
                    </td>
                    <td>
                        1. JM03 Comparison Study of Thai Films about Teen Mom
                        <br><b>Suparada Prapawong</b>
                    </td>
                    <td>10.00-10.15</td>
                    <td rowspan="7">
                        <b>Assist. Prof. Prapaipit Muthitacharoen</b> 
                    </td>
                    <td>
                        1. JM23 The Factors affected in Television Public Broadcasting form: The Transition to Digital Television Era in Thailand from 2012-2016 
                        <br><b>Tannaree Saranthanarat</b>
                    </td>
                    <td>2.00-2.15</td>
                    <td rowspan="7"><b>Assist. Prof. Dr. Adchara Panthanuwong</b>
                    </td>   
                </tr>
                <tr>
                    <td>
                        2. JM06  Spectatorship of Film Addresses:
<br>A Study of Film Ideology; An Apprehension of Thai Film
                        <br><b>Wanwarang Maisuwong</b>
                    </td>
                    <td>
                        10.15-10.30
                    </td>
                    <td>
                        2. JM28 A Study of Crime Reporting by Two Malaysian English-Language Newspapers
                        <br><b>Mohammed Fayez Shaban Dawood, 
<br>Hamedi Bin M. Adnan and Norzaliza Sarmidi</b>
                    </td>
                    <td>
                        2.15-2.30
                    </td>
                </tr>
                <tr>
                    <td>
                        3. JM09  Toward a theory of public diplomacy from the perspective of international public relations
                        <br><b>Iman Ma Haridi</b>
                    </td>
                    <td>
                        10.30-10.45
                    </td>
                    <td>
                        3. JM30  Convening the Crowds: Radio Show “Remoto Control” (Philippines)
                        <br><b>Danton Remoto</b>
                    </td>
                    <td>
                        2.30-2.45
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><b>BREAK 15 mins</b></td>
                    <td colspan="2"><b>BREAK 15 mins</b></td>
                </tr>
                <tr>
                    <td>
                        4. JM18 The Influence of Marketing Communication on Consumer Decision Making towards Thai Adult Literature
                        <br><b>Jirah Krittayapong</b>
                    </td>
                    <td>
                        11.00-11.15
                    </td>
                    <td>
                        4. JM33 The use of 360-degrees still panorama to portray surrounding environment in documentary photography: the case study of “Werng – before gone” photographic exhibition archive.
                        <br><b>Karntachat Raungratanaamporn</b>
                    </td>
                    <td>
                        3.00-3.15
                    </td>
                </tr>
                <tr>
                    <td>
                        5. JM34 Exposure to Information, Knowledge, Attitude and Participation of the Public toward the Light Rail Transit Project, Phase 1, to Accommodate the Development of Khon Kaen as Smart City
                        <br><b>Pachara Nonthing</b>
                    </td>
                    <td>
                        11.15-11.30
                    </td>
                    <td>
                        5. JM36 Exposure to information, knowledge, attitude and factors affecting decisions of Chinese tourists to buy goods and services related to Thai tourism
                        <br><b>Pafun  Wongsamsorn</b>
                    </td>
                    <td>
                        3.15-3.30
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><b>LUNCH</b></td>
                </tr>
                <tr>
                    <td>
                        <b>Room</b>
                        <br>
                        Auditorium
                    </td>
                    <td colspan="3"></td>
                    <td><b>Closing Ceremony</b></td>
                    <td>4.30-5.00</td>
                    <td></td>
                </tr>
                
            </table>
                    
                    <br>
                    <br>
                    <div>
                        <table class="table table-bordered master-content-detail">
                            <tr>
                                <td colspan="2"><b><u>Remarks</u></b></td>
                            </tr>
                            <tr>
                                <td><b>(1)</b></td>
                                <td><b>Timeline for each paper: 15 minutes total</b>
                                <br>10 to 12 minutes for presentation
                                <br>3 to 5 minutes for open floor discussion (Q&A)</td>
                            </tr>
                            <tr>
                                <td><b>(2)</b></td>
                                <td>Rooms
                                <br><b>Group A:</b>	Auditorium
                                <br><b>Group B:</b>	JM401
                                <br><b>Group C:</b>	JM203
                                </td>
                            </tr>
                            <tr>
                                <td><b>(3)</b></td>
                                <td>Chairman (Morning / Afternoon)
                                    <br><b>Group A:</b>	Assist.Prof. Dr. Vikanda Pornsakulvanich / Lecturer Dr.Senjo Nakai
                                    <br><b>Group B:</b>	Assistant Professor Arada Karuchit  /  Assist.Prof.Dr.Nitida Sangsingkeo
                                    <br><b>Group C:</b>	Asst.Prof.Prapaipit  Muthitacharoen  / Assist.Prof.Dr. Adchara Panthanuwong
                                </td>
                            </tr>
                            
                        </table>    
                    </div>
                    
                </div>
            </div>
            
            
           </div>
            <br>
            
            <hr class="hr-footer">
            
            <div class="row row-centered">
            
            <div class="col-md-12">
            <nav class="nav nav-footer" id="nav">
            <ul>
                    <li><a href="<?= base_url(); ?>">Home</a></li>
                    <li>|</li>
                    <li><a href="<?= base_url().'committee'; ?>">Committee and Review Board</a></li>
                    <li>|</li>
                    <li class="active"><a href="<?= base_url().'schedule'; ?>">Schedule</a></li>
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