<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    
    public function Admin(){
           parent::__construct();
       }
       
    
	public function index()
	{
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            
            $userdata = array(
                        'logged_in' => false
                );
            
            $this->session->set_userdata($userdata);
            $this->load->view('header'); 
            $this->load->view('admin_page_view'); 
        }
       
       public function checklogin(){
           
            $this->load->helper('url');
            $this->load->library('form_validation');
            $this->load->library('session');
            
            $this->load->helper('form');
  
            $this->load->model('member_model');
 
            $data = array(
                        'user' => $this->input->post('username'),
                        'pass' => $this->input->post('password')
                        );
            
            $loginPass = $this->member_model->isMember($data['user'],$data['pass']);
            
            
            if($loginPass)
            {
                $userdata = array(
                        'user'  => $data['user'],
                        'logged_in' => true
                );
                echo 'login success!';
            }else{
                $userdata = array(
                        'logged_in' => false
                );
                echo 'login faill!';
            }
            
            $data['admintype'] = 'default';
            
            $this->session->set_userdata($userdata);
            $this->load->view('header'); 
            $this->load->view('admin_page_view',$data); 
       }
       
       public function managehomepage(){
           
           $this->load->helper('url');
           $this->load->library('session');
           $this->load->model('content_model');
           $this->load->model('banner_model');
           
           $this->load->helper('file');
           $this->load->helper('form');
          
           $userdata = $this->session->userdata();
           $this->session->set_userdata($userdata);

           $data = $this->content_model->generateDataForContentManage('home','managehomepage');
           $data['filecontent'] = read_file('assets/upload/welcome_table.txt');
           $data['filecontentname'] = "welcome_table.txt";
           $data['bannerlist'] = $this->banner_model->getData('home');
           $data['footerlist'] = $this->banner_model->getData('homefooter');
           
           $tablename = array();
           array_push($tablename, 'callforpaper');
           $data['tablename'] = $tablename;
           
           $this->load->view('header'); 
           $this->load->view('admin_page_view',$data);
       }
       
       public function managecommittee(){
           
           $this->load->helper('url');
           $this->load->library('session');
           $this->load->model('content_model');
           $this->load->model('banner_model');
           
           $this->load->helper('file');
           $this->load->helper('form');
           
           $userdata = $this->session->userdata();
           $this->session->set_userdata($userdata);

           $data = $this->content_model->generateDataForContentManage('committee','managecomittee');
           $data['filecontent'] = "";
           $data['bannerlist'] = $this->banner_model->getData('committee');
           $data['footerlist'] = null;
           $data['filecontentname'] = "";
           
           $tablename = array();
           $data['tablename'] = $tablename;
           
           $this->load->view('header'); 
           $this->load->view('admin_page_view',$data);
       }
       
       public function manageschedule(){
           
           $this->load->helper('url');
           $this->load->library('session');
           $this->load->model('content_model');
           $this->load->model('banner_model');
           
           $this->load->helper('file');
           $this->load->helper('form');
           
           $userdata = $this->session->userdata();
           $this->session->set_userdata($userdata);

           $data = $this->content_model->generateDataForContentManage('schedule','manageschedule');
           $data['filecontent'] = read_file('assets/upload/schedule_table.txt');
           $data['bannerlist'] = $this->banner_model->getData('schedule');
           $data['footerlist'] = null;
           $data['filecontentname'] = "schedule_table.txt";
           
           $tablename = array();
           array_push($tablename, 'programschedule');
           array_push($tablename, 'importantdate');
           $data['tablename'] = $tablename;
           
           $this->load->view('header'); 
           $this->load->view('admin_page_view',$data);
       }
       
       public function manageuseful(){
           
           $this->load->helper('url');
           $this->load->library('session');
           $this->load->model('content_model');
           $this->load->model('banner_model');
           
           $this->load->helper('file');
           $this->load->helper('form');
           
           $userdata = $this->session->userdata();
           $this->session->set_userdata($userdata);

           $data = $this->content_model->generateDataForContentManage('useful','manageuseful');
           $data['filecontent'] = read_file('assets/upload/useful_table.txt');
           $data['bannerlist'] = $this->banner_model->getData('useful');
           $data['footerlist'] = null;
           $data['filecontentname'] = "useful_table.txt";
           
           $tablename = array();
           array_push($tablename, 'accommodation');
           $data['tablename'] = $tablename;
           
           $this->load->view('header'); 
           $this->load->view('admin_page_view',$data);
       }
       
       public function manageregistration(){
           
           $this->load->helper('url');
           $this->load->library('session');
           $this->load->model('content_model');
           $this->load->model('banner_model');
           
           $this->load->helper('file');
           $this->load->helper('form');
           
           $userdata = $this->session->userdata();
           $this->session->set_userdata($userdata);

           $data = $this->content_model->generateDataForContentManage('registration','manageregistration');
           $data['filecontent'] = read_file('assets/upload/registration_table.txt');
           $data['bannerlist'] = $this->banner_model->getData('registration');
           $data['footerlist'] = null;
           $data['filecontentname'] = "registration_table.txt";
           
           $tablename = array();
           array_push($tablename, 'registration');
           $data['tablename'] = $tablename;
           
           $this->load->view('header'); 
           $this->load->view('admin_page_view',$data);
       }
       
       public function registrationlist(){
           
           $this->load->helper('url');
           $this->load->library('session');
           $this->load->model('content_model');
           $this->load->model('banner_model');
           $this->load->model('registration_model');
           $this->load->model('registrationtopic_model');
           $this->load->model('config_model');
           
           $this->load->helper('file');
           $this->load->helper('form');
           
           $userdata = $this->session->userdata();
           $this->session->set_userdata($userdata);

           $data['registrationlist'] = $this->registration_model->getDataForAdminList();
           $data['infofilledlist_attendance'] = $this->registration_model->getDataForAdminListByStatusId(1, "r.RegistrationType <= 4");
           $data['infofilledlist_presenter'] = $this->registration_model->getDataForAdminListByStatusId(1, "r.RegistrationType > 4");
           $data['sendtoreviewer'] = $this->registration_model->getDataForAdminListByStatusId(2, "r.RegistrationType > 4");
           $data['confirmemailsent'] = $this->registration_model->getDataForAdminListByStatusId(3, "r.RegistrationType > 4");
           $data['paymentdone_attendance'] = $this->registration_model->getDataForAdminListByStatusId(4, "r.RegistrationType <= 4");
           $data['paymentdone_presenter'] = $this->registration_model->getDataForAdminListByStatusId(4, "r.RegistrationType > 4");
           $data['onlinepaymentdone_attendance'] = $this->registration_model->getDataForAdminListByStatusId(5, "r.RegistrationType <= 4");
           $data['onlinepaymentdone_presenter'] = $this->registration_model->getDataForAdminListByStatusId(5, "r.RegistrationType > 4");
           $data['paper_rejected'] = $this->registration_model->getDataForAdminListByStatusId(6, "r.RegistrationType > 4");
           $data['admintype'] = 'registrationlist';
           
            $data['enableattendance'] = $this->config_model->getData('EnableAttendance');
            $data['enablepresenter'] = $this->config_model->getData('EnablePresenter');
           $data['presenter_form'] = $this->config_model->getData('presenter_form');
            $data['guideline_doc'] = $this->config_model->getData('guideline_doc');
           
           $this->load->view('header'); 
           $this->load->view('admin_page_view',$data);
           
       }
       
        public function mailResend(){
           
           $this->load->helper('url');
           $this->load->library('session');
           $this->load->library('email');
           
           $this->load->model('content_model');
           $this->load->model('banner_model');
           $this->load->model('registration_model');
           $this->load->model('registrationtopic_model');
           $this->load->model('config_model');
           $this->load->model('logging_model');
           
           $this->load->helper('file');
           $this->load->helper('form');
           
           $userdata = $this->session->userdata();
           $this->session->set_userdata($userdata);

           
           $Id = $this->input->post('Id');
           $Receiver = $this->input->post('Receiver');
           $RegisterReference = $this->input->post('RegisterReference');
           $Subject = $this->input->post('Subject');
           $Body = $this->input->post('Body');
           $OriginFunction = $this->input->post('OriginFunction');
           $Status = $this->input->post('Status');
           
           
           $this->email->from('jctuconference@gmail.com', 'JCTU Conference');
           $this->email->to($Receiver);
           $this->email->cc('jctuconference@gmail.com');
           $this->email->subject($Subject);
           $this->email->message($Body);

           if($this->email->send())
           {
            $this->logging_model->updateMailLog($Id, 'Resend - Pass');
           }else{
               // Generate error
            $this->logging_model->updateMailLog($Id, 'Resend - Fail');
           }
           
           
           $data['maillog'] = $this->logging_model->getMailLog();
           
           $data['admintype'] = 'maillog';
           
           
           $this->load->view('header'); 
           $this->load->view('admin_page_view',$data);
           
       }
       
       public function maillog(){
           
           $this->load->helper('url');
           $this->load->library('session');
           $this->load->model('content_model');
           $this->load->model('banner_model');
           $this->load->model('registration_model');
           $this->load->model('registrationtopic_model');
           $this->load->model('config_model');
           $this->load->model('logging_model');
           
           $this->load->helper('file');
           $this->load->helper('form');
           
           $userdata = $this->session->userdata();
           $this->session->set_userdata($userdata);

           $data['maillog'] = $this->logging_model->getMailLog();
           
           $data['admintype'] = 'maillog';
           
           
           $this->load->view('header'); 
           $this->load->view('admin_page_view',$data);
           
       }
       
       public function updateRegistration(){
           
           $this->load->helper('url');
           $this->load->library('session');
           $this->load->model('content_model');
           $this->load->model('banner_model');
           $this->load->model('registration_model');
           $this->load->model('registrationtopic_model');
           $this->load->model('config_model');
           $this->load->helper('form');
           
           $attendance = $this->input->post('attendance');
           $presenter = $this->input->post('presenter');
           
           $this->config_model->setData('EnableAttendance',$attendance);
           $this->config_model->setData('EnablePresenter',$presenter);
           
           $data['registrationlist'] = $this->registration_model->getDataForAdminList();
           $data['infofilledlist_attendance'] = $this->registration_model->getDataForAdminListByStatusId(1, "r.RegistrationType <= 4");
           $data['infofilledlist_presenter'] = $this->registration_model->getDataForAdminListByStatusId(1, "r.RegistrationType > 4");
           $data['sendtoreviewer'] = $this->registration_model->getDataForAdminListByStatusId(2, "r.RegistrationType > 4");
           $data['confirmemailsent'] = $this->registration_model->getDataForAdminListByStatusId(3, "r.RegistrationType > 4");
           $data['paymentdone_attendance'] = $this->registration_model->getDataForAdminListByStatusId(4, "r.RegistrationType <= 4");
           $data['paymentdone_presenter'] = $this->registration_model->getDataForAdminListByStatusId(4, "r.RegistrationType > 4");
           $data['onlinepaymentdone_attendance'] = $this->registration_model->getDataForAdminListByStatusId(5, "r.RegistrationType <= 4");
           $data['onlinepaymentdone_presenter'] = $this->registration_model->getDataForAdminListByStatusId(5, "r.RegistrationType > 4");
           $data['paper_rejected'] = $this->registration_model->getDataForAdminListByStatusId(6, "r.RegistrationType > 4");
           $data['admintype'] = 'registrationlist';
           
            $data['enableattendance'] = $this->config_model->getData('EnableAttendance');
            $data['enablepresenter'] = $this->config_model->getData('EnablePresenter');
           $data['presenter_form'] = $this->config_model->getData('presenter_form');
           $data['guideline_doc'] = $this->config_model->getData('guideline_doc');
            
           $this->load->view('header'); 
           $this->load->view('admin_page_view',$data);
       }
       
       public function updateAttendance()
       {
           $this->updatePresenter();
       }
       
       public function updatePresenter()
       {
           $this->load->helper('url');
           $this->load->library('session');
           $this->load->library('email');
           
           $this->load->model('content_model');
           $this->load->model('banner_model');
           $this->load->model('registration_model');
           $this->load->model('registrationtopic_model');
           $this->load->model('config_model');
           $this->load->model('logging_model');
           
           $this->load->helper('file');
           $this->load->helper('form');
           
           $userdata = $this->session->userdata();
           $this->session->set_userdata($userdata);

           $checklist = $this->input->post('check_list');
           $statusId = $this->input->post('statusid');
           if(!empty($checklist)) {
            foreach($checklist as $check) {
                    $this->registration_model->updateStatusTypeById($statusId, $check);
                    if($statusId == 3)
                    {
                        $regData = $this->registration_model->getRefNoById($check);
                        //Approved and send Confirm email
                        $this->email->from('jctuconference@gmail.com', 'JCTU Conference');
                        $this->email->to($regData['Email']);
                        $this->email->cc('jctuconference@gmail.com');
                        
                        $subject = 'Abstract submission qualifications';
                        $message = '<html><head></head><body>
                            <br><h2>Abstract submission qualifications</h2>
                            <br><h3>Please do not reply.</h3>
                            <br>Abstract ID#:<b>'.$regData['RefNo'].'</b>
                            <br>Title of Paper or Poster:<b>'.$regData['AbstractTitle'].'</b>
                            <br>
                            <br>Dear <b>'.$regData['Title'].' '.$regData['Firstname'].' '.$regData['Lastname'].' </b>:
                            <br>Thank you for your support of the 2017 JCTU International Conference on Communication and Changing Society. You are warmly welcomed to participate in the conference on 21st July 2017 at the Thammasat University Faculty of Journalism and Mass Communication in Bangkok, Thailand. After our anonymous reviewing process, we would like to inform you that your abstract has been accepted. Please accept the attached invitation and reply to us if you require any modification.
                            <br>
                            <br>1. To have your accepted manuscripts published in the 2017 JCTU International Conference proceedings, at least one author must complete the registration with payment before June 20, 2017. If the paper is written by more than one author, each individual conference attendee has to pay for a full registration fee.
                            <br>
                            <br>2. Modes of Payment 
                            <br>Please proceed the payment process followed by the link below.
                            <br><a href="http://conference.jc.tu.ac.th/jctu2016/Payment/checkpayment/'.$regData['RefNo'].'">http://conference.jc.tu.ac.th/jctu2016/Payment/checkpayment/'.$regData['RefNo'].'</a>
                            <br>
                            <br>3. Proceeding and Presentation
                            <br>You will participate in a paper review program. You will need to prepare a 1,500-2,000 words paper, and provide the details required for the full paper submission process is on our website (<a href="http://conference.jc.tu.ac.th/jctu2016/registration">http://conference.jc.tu.ac.th/jctu2016/registration</a>). The author should fill the Author’s letter of agreement form (<a href="http://conference.jc.tu.ac.th/jctu2016/registration">http://conference.jc.tu.ac.th/jctu2016/registration</a>) and attach the file together with the full paper file and email it to jctuconference@gmail.com. The paper is due 20 June 2017 and will be reviewed and copied and distributed on a CD as a part of conference proceedings. You must make a 15-20 minute presentation at the conference in order for the paper to be included in the proceedings. Requests to have substitute presenters for presenting authors may be made by jctuconference@gmail.com until 10 July. The substitute must be an original co-author, and must not be giving more than one presentation at the conference already. The substitute will be listed as the presenting author in conference documents.
                            <br>Should you have any further inquiries, do not hesitate to contact us. We look forward to seeing you in Bangkok.
                            <br>
                            <br>Thank you for your interest in JCTU International Conference.
                            <br>www.jc.ac.th/jctucon
                            <br>Email: jctuconference@gmail.com</body></html>';
                        
                        $this->email->subject($subject);
                        $this->email->message($message);
                        
                        if($this->email->send())
                        {
                         $this->logging_model->insertMailLog($regData['Email'],$regData['RefNo'],$subject, $message, 'Update Status to -> Confirm Email sent', 'Pass');
                        }else{
                            // Generate error
                         $this->logging_model->insertMailLog($regData['Email'],$regData['RefNo'],$subject, $message, 'Update Status to -> Confirm Email sent', 'Fail');
                        }
                    }
                    
                    if($statusId == 6)
                    {
                         $regData = $this->registration_model->getRefNoById($check);
                        //Rejected and send Notify email
                        $this->email->from('jctuconference@gmail.com', 'JCTU Conference');
                        $this->email->to($regData['Email']);
                        $this->email->cc('jctuconference@gmail.com');
                        
                        $subject = 'Result of your paper submission';
                        $message = '<html><head></head><body>'
                        . '<h1>Welcome to JCTU International Conference</h1>'
                        . '<br>Sorry, your paper is not pass.'
                        . '<br>Thank you for your participation';
                        
                        $this->email->subject($subject);
                        $this->email->message($message);
                        
                        if($this->email->send())
                        {
                         $this->logging_model->insertMailLog($regData['Email'],$regData['RefNo'],$subject, $message, 'Update Status to -> Paper rejected', 'Pass');
                        }else{
                            // Generate error
                         $this->logging_model->insertMailLog($regData['Email'],$regData['RefNo'],$subject, $message, 'Update Status to -> Paper rejected', 'Fail');
                        }
                    }
                    
                    if($statusId == 4){
                        
                        $regData = $this->registration_model->getRefNoById($check);
                        $isAttendance = $this->registration_model->isAttendance($regData['RegistrationType']);
                        
                        $message = "";
                        if($isAttendance){
                            $message = "<html><head></head><body><br><h2>PAYMENT CONFIRMATION</h2>
                                        <br><h3>Please do not reply.</h3> 
                                        <br>Dear <b>".$regData['Title']." ".$regData['Firstname']." ".$regData['Lastname']." </b>:
                                        <br>Greeting from 2017 JCTU Conference on Communication and Changing Society 
                                        <br>Warmly welcome you to join our upcoming conference, to be held on 21 July 2017 at the Thammasat University Faculty of Journalism and Mass Communication in Bangkok, Thailand
                                        <br>
                                        <br>Thanks for writing to us a receipt hard copy will be provided on site at our conference. Please contact us if you require receipt in PDF format at jctuconference@gmail.com
                                        <br>
                                        <br>Please contact us if you require further assistance and we are looking forward to hearing from you.
                                        <br>www.jc.tu.ac.th/jctucon
                                        <br>Email: jctuconference@gmail.com</body></html>";
                            
                        }else{
                            $message = "<html><head></head><body><br><h2>PAYMENT CONFIRMATION</h2>
                                        <br><h3>Please do not reply.</h3> 
                                        <br>Abstract ID#:<b>".$regData['RefNo']."</b>
                                        <br>Title of Paper or Poster:<b>".$regData['AbstractTitle']."</b>
                                        <br>Dear <b>".$regData['Title']." ".$regData['Firstname']." ".$regData['Lastname']." </b>:
                                        <br>Greeting from 2017 JCTU Conference on Communication and Changing Society 
                                        <br>Warmly welcome you to join our upcoming conference, to be held on 21 July 2017 at the Thammasat University Faculty of Journalism and Mass Communication in Bangkok, Thailand
                                        <br>
                                        <br>Thanks for writing to us a hard copy will be provided on site at our conference. Please contact us if you require receipt in PDF format at jctuconference@gmail.com
                                        <br>
                                        <br>Please contact us if you require further assistance and we are looking forward to hearing from you.
                                        <br>www.jc.tu.ac.th/jctucon
                                        <br>Email: jctuconference@gmail.com</body></html>";
                        }
                        
                       
                            $subject = 'PAYMENT CONFIRMATION';
                        
                            $this->email->from('jctuconference@gmail.com', 'JCTU Conference');
                            $this->email->to($regData['Email']);
                            $this->email->cc('jctuconference@gmail.com');
                            $this->email->subject($subject);
                            $this->email->message($message);
                            
                            if($this->email->send())
                            {
                             $this->logging_model->insertMailLog($regData['Email'],$regData['RefNo'],$subject, $message, 'Update Status to -> Payment Done', 'Pass');
                            }else{
                                // Generate error
                             $this->logging_model->insertMailLog($regData['Email'],$regData['RefNo'],$subject, $message, 'Update Status to -> Payment Done', 'Fail');
                            }
                        
                    }
            }
            }
           
           $data['registrationlist'] = $this->registration_model->getDataForAdminList();
           $data['infofilledlist_attendance'] = $this->registration_model->getDataForAdminListByStatusId(1, "r.RegistrationType <= 4");
           $data['infofilledlist_presenter'] = $this->registration_model->getDataForAdminListByStatusId(1, "r.RegistrationType > 4");
           $data['sendtoreviewer'] = $this->registration_model->getDataForAdminListByStatusId(2, "r.RegistrationType > 4");
           $data['confirmemailsent'] = $this->registration_model->getDataForAdminListByStatusId(3, "r.RegistrationType > 4");
           $data['paymentdone_attendance'] = $this->registration_model->getDataForAdminListByStatusId(4, "r.RegistrationType <= 4");
           $data['paymentdone_presenter'] = $this->registration_model->getDataForAdminListByStatusId(4, "r.RegistrationType > 4");
           $data['onlinepaymentdone_attendance'] = $this->registration_model->getDataForAdminListByStatusId(5, "r.RegistrationType <= 4");
           $data['onlinepaymentdone_presenter'] = $this->registration_model->getDataForAdminListByStatusId(5, "r.RegistrationType > 4");
           $data['paper_rejected'] = $this->registration_model->getDataForAdminListByStatusId(6, "r.RegistrationType > 4");
           $data['admintype'] = 'registrationlist';
           
            $data['enableattendance'] = $this->config_model->getData('EnableAttendance');
            $data['enablepresenter'] = $this->config_model->getData('EnablePresenter');
           $data['presenter_form'] = $this->config_model->getData('presenter_form');
           $data['guideline_doc'] = $this->config_model->getData('guideline_doc');
           
           $this->load->view('header'); 
           $this->load->view('admin_page_view',$data);
       }
       
       public function updatepage(){
           
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('session');
        
        $this->load->helper('file');
        $this->load->helper('form');

        $userdata = $this->session->userdata();
        $this->session->set_userdata($userdata);
        
        $this->load->model('content_model');
        $this->load->model('banner_model');

        $data = array(
                    'page' => $this->input->post('page'),
                    'section' => $this->input->post('section'),
                    'topic' => $this->input->post('topic'),
                    'subtopic' => $this->input->post('subtopic'),
                    'topic' => $this->input->post('topic'),
                    'body' => $this->input->post('body')
                    );
        
        $updateResult = $this->content_model->updateContentData($data);

        if($updateResult){
//           $this->load->helper('url');
//           $this->load->library('session');
//           $this->load->model('content_model');
//           $this->load->helper('form');
           
           $userdata = $this->session->userdata();
           $this->session->set_userdata($userdata);

           $data = $this->content_model->generateDataForContentManage('home','managehomepage');
           $data['filecontent'] = read_file('assets/upload/welcome_table.txt');
           $data['bannerlist'] = $this->banner_model->getData('home');
           $data['footerlist'] = $this->banner_model->getData('homefooter');
           $data['filecontentname'] = "welcome_table.txt";
           
           $tablename = array();
           array_push($tablename, 'callforpaper');
           $data['tablename'] = $tablename;
           
           $data['updateresult'] = true;
           $this->load->view('admin_page_view',$data);
        }else
        {
//           $this->load->helper('url');
//           $this->load->library('session');
//           $this->load->model('content_model');
//           $this->load->helper('form');
           
           $userdata = $this->session->userdata();
           $this->session->set_userdata($userdata);

           $data = $this->content_model->generateDataForContentManage('home','managehomepage');
           
           $data['updateresult'] = false;
           
           $this->load->view('header'); 
           $this->load->view('admin_page_view',$data);
        }
        
       }
       
        public function do_upload_banner()
        {
                $config['upload_path']          = './assets/image/banner/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['file_name']            = $this->input->post('currentfile'); 
                $config['overwrite']            = true;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('bannerimage'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        echo "fail:";
                        foreach ($error as $err)
                        {
                            echo $err;
                        }
                        //$this->load->view('admin_page_view', $error);
                }
                else
                {
                        $this->load->helper('url');
                        $this->load->library('session');
                        $this->load->model('content_model');
                        $this->load->helper('form');
                        $this->load->helper('file');
                    
                        $userdata = $this->session->userdata();
                        $this->session->set_userdata($userdata);

                        $this->load->model('content_model');
                        $this->load->model('banner_model');
                    
                    
                        $userdata = $this->session->userdata();
                        $this->session->set_userdata($userdata);

                        $data = $this->content_model->generateDataForContentManage('home','managehomepage');
                        $data['filecontent'] = read_file('assets/upload/welcome_table.txt');
                        $data['bannerlist'] = $this->banner_model->getData('home');
                        $data['footerlist'] = $this->banner_model->getData('homefooter');
                        $data['filecontentname'] = "welcome_table.txt";
                        
                        $tablename = array();
                        array_push($tablename, 'callforpaper');
                        $data['tablename'] = $tablename;

                        $data['updateresult'] = true;
                        $this->load->view('admin_page_view',$data);
                }
        }
        
        public function do_upload_table()
        {
                $config['upload_path']          = './assets/upload/';
                $config['allowed_types']        = 'txt';
                $config['file_name']            = $this->input->post('currentfile'); 
                $config['overwrite']            = true;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('contenttable'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        echo "fail:";
                        foreach ($error as $err)
                        {
                            echo $err;
                        }
                        //$this->load->view('admin_page_view', $error);
                }
                else
                {
                        $this->load->helper('url');
                        $this->load->library('session');
                        $this->load->model('content_model');
                        $this->load->helper('form');
                        $this->load->helper('file');
                    
                        $userdata = $this->session->userdata();
                        $this->session->set_userdata($userdata);

                        $this->load->model('content_model');
                        $this->load->model('banner_model');
                    
                    
                        $userdata = $this->session->userdata();
                        $this->session->set_userdata($userdata);

                        $data = $this->content_model->generateDataForContentManage('home','managehomepage');
                        $data['filecontent'] = read_file('assets/upload/welcome_table.txt');
                        $data['bannerlist'] = $this->banner_model->getData('home');
                        $data['footerlist'] = $this->banner_model->getData('homefooter');
                        $data['filecontentname'] = "welcome_table.txt";

                        $tablename = array();
                        array_push($tablename, 'callforpaper');
                        $data['tablename'] = $tablename;
                        
                        $data['updateresult'] = true;
                        $this->load->view('admin_page_view',$data);
                }
        }
        
        public function do_upload_registration_doc()
        {
                $config['upload_path']          = './assets/download/';
                $config['allowed_types']        = 'docx|doc|txt';
                $config['file_name']            = $this->input->post('currentfile'); 
                $config['overwrite']            = true;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('contenttable'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        echo "fail:";
                        foreach ($error as $err)
                        {
                            echo $err;
                        }
                        //$this->load->view('admin_page_view', $error);
                }
                else
                {
                        $this->load->helper('url');
                        $this->load->library('session');
                        $this->load->model('content_model');
                        $this->load->helper('form');
                        $this->load->helper('file');
                    
                        $userdata = $this->session->userdata();
                        $this->session->set_userdata($userdata);

                        $this->load->model('config_model');
                        $this->load->model('registration_model');
                    
                        $data['registrationlist'] = $this->registration_model->getDataForAdminList();
                        $data['infofilledlist_attendance'] = $this->registration_model->getDataForAdminListByStatusId(1, "r.RegistrationType <= 4");
                        $data['infofilledlist_presenter'] = $this->registration_model->getDataForAdminListByStatusId(1, "r.RegistrationType > 4");
                        $data['sendtoreviewer'] = $this->registration_model->getDataForAdminListByStatusId(2, "r.RegistrationType > 4");
                        $data['confirmemailsent'] = $this->registration_model->getDataForAdminListByStatusId(3, "r.RegistrationType > 4");
                        $data['paymentdone_attendance'] = $this->registration_model->getDataForAdminListByStatusId(4, "r.RegistrationType <= 4");
                        $data['paymentdone_presenter'] = $this->registration_model->getDataForAdminListByStatusId(4, "r.RegistrationType > 4");
                        $data['onlinepaymentdone_attendance'] = $this->registration_model->getDataForAdminListByStatusId(5, "r.RegistrationType <= 4");
                        $data['onlinepaymentdone_presenter'] = $this->registration_model->getDataForAdminListByStatusId(5, "r.RegistrationType > 4");
                        $data['paper_rejected'] = $this->registration_model->getDataForAdminListByStatusId(6, "r.RegistrationType > 4");
                        $data['admintype'] = 'registrationlist';

                        $data['enableattendance'] = $this->config_model->getData('EnableAttendance');
                        $data['enablepresenter'] = $this->config_model->getData('EnablePresenter');
                        $data['presenter_form'] = $this->config_model->getData('presenter_form');
                        $data['guideline_doc'] = $this->config_model->getData('guideline_doc');

                        $this->load->view('header'); 
                        $this->load->view('admin_page_view',$data);
                }
        }
        
        
        
        public function exportHTML($type) {
            
            $this->load->helper('url');
           $this->load->library('session');
           $this->load->model('content_model');
           $this->load->model('registration_model');
           $this->load->model('registrationtopic_model');
           
           $this->load->helper('file');
           $this->load->helper('form');
           

           $data['registrationlist'] = $this->registration_model->getDataForAdminList();
           $data['infofilledlist_attendance'] = $this->registration_model->getDataForAdminListByStatusId(1, "r.RegistrationType <= 4");
           $data['infofilledlist_presenter'] = $this->registration_model->getDataForAdminListByStatusId(1, "r.RegistrationType > 4");
           $data['sendtoreviewer'] = $this->registration_model->getDataForAdminListByStatusId(2, "r.RegistrationType > 4");
           $data['confirmemailsent'] = $this->registration_model->getDataForAdminListByStatusId(3, "r.RegistrationType > 4");
           $data['paymentdone_attendance'] = $this->registration_model->getDataForAdminListByStatusId(4, "r.RegistrationType <= 4");
           $data['paymentdone_presenter'] = $this->registration_model->getDataForAdminListByStatusId(4, "r.RegistrationType > 4");
           $data['onlinepaymentdone_attendance'] = $this->registration_model->getDataForAdminListByStatusId(5, "r.RegistrationType <= 4");
           $data['onlinepaymentdone_presenter'] = $this->registration_model->getDataForAdminListByStatusId(5, "r.RegistrationType > 4");
           $data['paper_rejected'] = $this->registration_model->getDataForAdminListByStatusId(6, "r.RegistrationType > 4");
           $data['admintype'] = 'registrationlist';
            
            if($type == 'infofilledlist_attendance')
            {
                $regDataList = $data['infofilledlist_attendance'];
                $filename = 'info_filled_in_attendance_'.date("d-m-y");
            }else if($type == 'paymentdone_attendance')
            {
                $regDataList = $data['paymentdone_attendance'];
                $filename = 'payment_done_attendance_'.date("d-m-y");
            }
            else if($type == 'infofilledlist_presenter')
            {
                $regDataList = $data['infofilledlist_presenter'];
                $filename = 'info_filled_in_presenter_'.date("d-m-y");
            }
            else if($type == 'sendtoreviewer')
            {
                $regDataList = $data['sendtoreviewer'];
                $filename = 'send_to_reviewer_presenter_'.date("d-m-y");
            }
            else if($type == 'confirmemailsent')
            {
                $regDataList = $data['confirmemailsent'];
                $filename = 'confirm_email_sent_presenter_'.date("d-m-y");
            }
            else if($type == 'paymentdone_presenter')
            {
                $regDataList = $data['paymentdone_presenter'];
                $filename = 'payment_done_presenter_'.date("d-m-y");
            }else if($type == 'onlinepaymentdone_attendance')
            {
                $regDataList = $data['onlinepaymentdone_attendance'];
                $filename = 'onlinepayment_done_attendance_'.date("d-m-y");
            }else if($type == 'onlinepaymentdone_presenter')
            {
                $regDataList = $data['onlinepaymentdone_presenter'];
                $filename = 'onlinepayment_done_presenter_'.date("d-m-y");
            }else if($type == 'paper_rejected')
            {
                $regDataList = $data['paper_rejected'];
                $filename = 'paper_rejected'.date("d-m-y");
            }
            
            
             if($type == 'infofilledlist_attendance' || $type == 'paymentdone_attendance' || $type == 'onlinepaymentdone_attendance')
             {
            $table = "<table>";
            $table .= "<th>Id</th>";
            $table .= "<th>Reference No.</th>";
            $table .= "<th>Registration type</th>";
            $table .= "<th>Registration type name</th>";  
            $table .= "<th>Current status</th>";
            $table .= "<th>Title_1</th>";               
            $table .= "<th>Title_2</th>";      
            $table .= "<th>Firstname</th>";             
            $table .= "<th>Lastname</th>";              
            $table .= "<th>Organization</th>";          
            $table .= "<th>PostalAddress</th>";         
            $table .= "<th>City</th>";                  
            $table .= "<th>Postcode</th>";              
            $table .= "<th>Country</th>";               
            $table .= "<th>Tel</th>";                   
            $table .= "<th>Mobile</th>";                
            $table .= "<th>Email</th>";                 
            $table .= "<th>FoodType</th>";             

            
            foreach ($regDataList as $regData){
               $table .= "<tr>";
               $table .= "<td>".$regData['Id']."</td>";
               $table .= "<td>".$regData['RefNo']."</td>";   
               $table .= "<td>".$regData['RegistrationType']."</td>";  
               $table .= "<td>".$regData['RegistrationTypeName']."</td>";  
               $table .= "<td>".$regData['RegistrationStatusName']."</td>";
               $table .= "<td>".$regData['Title_1']."</td>";               
               $table .= "<td>".$regData['Title_2']."</td>";      
               $table .= "<td>".$regData['Firstname']."</td>";             
               $table .= "<td>".$regData['Lastname']."</td>";              
               $table .= "<td>".$regData['Organization']."</td>";          
               $table .= "<td>".$regData['PostalAddress']."</td>";         
               $table .= "<td>".$regData['City']."</td>";                  
               $table .= "<td>".$regData['Postcode']."</td>";              
               $table .= "<td>".$regData['Country']."</td>";               
               $table .= "<td>".$regData['Tel']."</td>";                   
               $table .= "<td>".$regData['Mobile']."</td>";                
               $table .= "<td>".$regData['Email']."</td>";                 
               $table .= "<td>".$regData['FoodType']."</td>";                      
               
               $table .= "</tr>";
            }
$table .= "</table>";
           
		//load the download helper
		$this->load->helper('download');
		//set the textfile's content 
		$data = $table;
		//set the textfile's name
		$name = $filename.'.xls';
		//use this function to force the session/browser to download the created file
		force_download($name, $data);
             }else{
                
             $table = "<table>";
            $table .= "<th>Id</th>";
            $table .= "<th></th>";
            $table .= "<th>File</th>";
            $table .= "<th>Reference No.</th>";   
            $table .= "<th>Registration type</th>";
            $table .= "<th>Registration type name</th>";  
            $table .= "<th>Registration status</th>";
            $table .= "<th>Title_1</th>";               
            $table .= "<th>Title_2</th>";      
            $table .= "<th>Firstname</th>";             
            $table .= "<th>Lastname</th>";              
            $table .= "<th>Organization</th>";          
            $table .= "<th>PostalAddress</th>";         
            $table .= "<th>City</th>";                  
            $table .= "<th>Postcode</th>";              
            $table .= "<th>Country</th>";               
            $table .= "<th>Tel</th>";                   
            $table .= "<th>Mobile</th>";                
            $table .= "<th>Email</th>";                 
            $table .= "<th>FoodType</th>";              
            $table .= "<th>TopicArea</th>";             
            $table .= "<th>AbstractTitle</th>";         
            
            
            foreach ($regDataList as $regData){
                $table .= "<tr>";
                $table .= "<td>".$regData['Id']."</td>";
                $table .= "<td><input type='checkbox' name='check_list[]' value='".$regData['Id']."'></td>";
                $table .= "<td>- <a href=".base_url('assets/paperupload/'.$regData['PaperFilename'])." style='color:#8a2be2;'>Word document</a><br>";
                $table .= "- <a href=".base_url('assets/paperupload/'.$regData['PaperFilenamePdf'])." style='color:#8a2be2;'>Pdf document</a></td>";
                $table .= "<td>".$regData['RefNo']."</td>";    
                $table .= "<td>".$regData['RegistrationType']."</td>"; 
                $table .= "<td>".$regData['RegistrationTypeName']."</td>";  
                $table .= "<td>".$regData['RegistrationStatusName']."</td>";
                $table .= "<td>".$regData['Title_1']."</td>";               
                $table .= "<td>".$regData['Title_2']."</td>";      
                $table .= "<td>".$regData['Firstname']."</td>";             
                $table .= "<td>".$regData['Lastname']."</td>";              
                $table .= "<td>".$regData['Organization']."</td>";          
                $table .= "<td>".$regData['PostalAddress']."</td>";         
                $table .= "<td>".$regData['City']."</td>";                  
                $table .= "<td>".$regData['Postcode']."</td>";              
                $table .= "<td>".$regData['Country']."</td>";               
                $table .= "<td>".$regData['Tel']."</td>";                   
                $table .= "<td>".$regData['Mobile']."</td>";                
                $table .= "<td>".$regData['Email']."</td>";                 
                $table .= "<td>".$regData['FoodType']."</td>";              
                $table .= "<td>".$regData['TopicArea']."</td>";             
                $table .= "<td>".$regData['AbstractTitle']."</td>";         
               
                $table .= "</tr>";
            }

            $table .= "</table>";
            
            	//load the download helper
		$this->load->helper('download');
		//set the textfile's content 
		$data = $table;
		//set the textfile's name
		$name = $filename.'.xls';
		//use this function to force the session/browser to download the created file
		force_download($name, $data);
            
            
             }
             
             
	}
       
}
