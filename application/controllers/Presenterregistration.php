<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presenterregistration extends CI_Controller {

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
	public function index()
	{
            $this->load->helper('url');
            $this->load->helper('file');
            $this->load->model('content_model');
            $this->load->model('banner_model');
            $this->load->model('registrationtopic_model');
            $this->load->helper('form');
           
            $data['bannerlist'] = $this->banner_model->getData('registration');
            $data['topiclist'] = $this->registrationtopic_model->getData();
            

            $this->load->view('header'); 
            $this->load->view('presenterregistration_view',$data);
	}
        
        public function register()
        {
            
            $config['upload_path'] = './assets/paperupload/';
            $path  = $config['upload_path'];
            $config['allowed_types'] = 'doc|docx|pdf';
            $config['overwrite']     = false;
            $this->load->library('upload', $config);

            $this->load->library('form_validation');
            $this->load->library('email');

            $this->load->helper('file');
            $this->load->helper('form');
            $this->load->model('registration_model');
            $this->load->model('config_model');
            $this->load->model('logging_model');

            $isEarlyBird = $this->config_model->isEarlyBird();

            $upload_filename = $this->upload->data('file_name');
            
            $wordfilename;
            $pdffilename;
            $canupload = true;

            foreach ($_FILES as $fieldname => $fileObject)  //fieldname is the form field name
            {
                if (!empty($fileObject['name']))
                {
                    $path_info = pathinfo($fileObject['name']);
                    $extension = $path_info['extension'];
                    
                    $fileName = $this->cleanString(date("Ymd")."_".$this->input->post('inputlastname')."_".$this->input->post('inputfirstname')."_abstract");
                    $config['file_name'] = $fileName;
                    
                    if($fieldname === 'uploadfile'){
                        $wordfilename = $fileName.".".$extension;
                    }else if($fieldname === 'uploadfilepdf'){
                        $pdffilename = $fileName.".".$extension;
                    }
                    
                    $this->upload->initialize($config);
                    if (!$this->upload->do_upload($fieldname))
                    {
                        $canupload = false;
                        $errors = $this->upload->display_errors();
                        flashMsg($errors);
                    }
//                    else
//                    {
//                         // Code After Files Upload Success GOES HERE
//                        if($fieldname === 'uploadfile'){
//                            $wordfilename = $this->cleanString($fileObject['name']);
//                        }else if($fieldname === 'uploadfilepdf'){
//                            $pdffilename = $this->cleanString($fileObject['name']);
//                        }
//                    }
                }
            }
            
            $data = array(
                            'Title_1' => $this->input->post('Title_1'),
                            'inputfirstname' => $this->input->post('inputfirstname'),
                            'inputlastname' => $this->input->post('inputlastname'),
                            'Title_2' => $this->input->post('Title_2'),
                            'inputorganization' => $this->input->post('inputorganization'),
                            'inputpostaladdress' => $this->input->post('inputpostaladdress'),
                            'inputcity' => $this->input->post('inputcity'),
                            'inputpostcode' => $this->input->post('inputpostcode'),
                            'hiddencountry' => $this->input->post('hiddencountry'),
                            'inputtel' => $this->input->post('inputtel'),
                            'inputmobile' => $this->input->post('inputmobile'),
                            'inputemail' => $this->input->post('inputemail'),
                            'foodrestriction' => $this->input->post('foodrestriction'),
                            'mealother' => $this->input->post('inputmealother'),
                            'participantnational' => $this->input->post('participantnational'),
                            'topicarea' => $this->input->post('topicarea'),
                            'abstracttitle' => $this->input->post('inputabstract'),
                            'isEarlyBird' => $isEarlyBird,
                            'registrationType' => 2,
                            'uploadFilename' => $wordfilename,
                            'uploadFilenamePdf' => $pdffilename
                            );

                    $updateResult = $this->registration_model->newRegistration($data);

                    $this->email->from('jctuconference@gmail.com', 'JCTU Conference');
                    $this->email->to($data['inputemail']);
                    $this->email->cc('jctuconference@gmail.com');
                    
                    $subject = 'Abstract Successfully Submitted';
                    $message = '<html><head></head><body>'
                            . '<br>To those who wish to be a presenting author at the conference: Upon successful submission of your abstract, you will immediately get a confirmation notice on your screen, followed by the same message via email. If you do not receive the message, your abstract has not successfully submitted. Please try again, or contact jctuconference@gmail.com for assistance if you are having difficulty. 
                                <br><br>
                                <br>The deadline for abstract submissions is 31 March 2017. Be sure to print and/or save the confirmation of submission notices for reference in case of a problem or question.
                                <br>--------------------------------------------------------------------------------------------------------------------------------
                                <br><h2>This is an automated message.</h2>
                                <br><h3>Please do not reply.</h3>
                                <br>
                                <br>Abstract ID#:  '.$updateResult.'
                                <br>Title of Paper or Poster:  '.$data['abstracttitle'].'
                                <br><br>
                                <br>Dear '.$data['Title_1'].' '.$data['inputfirstname'].' '.$data['inputlastname'].':
                                <br>
                                <br>Thank you for your interest in JCTU International Conference! Your paper submission has been received.   Please read the following information carefully, mark your calendar with the important dates and deadlines, and save this message for reference.    Please contact jctuconference@gmail.com if you do not receive this message in a follow-up email or notifications from the program committee by the deadline dates below.   
                                Changes may not be made during or following the review period.  If you have not received an email notifying you on the status of your submission by 30 April, please notify jctuconference@gmail.com email with your name and submission ID number. 
                                If your abstract was accepted, we will email you with the schedule, including the date and time of your presentation, the amount of time you will be given to speak, and other final information and instructions. Be sure to save that information for reference in case of any problem or question we may have. If you have not received an e-mail with this information by 30 May 2017, please notify jctuconference@gmail.com and send an email with your name and submission ID number.  Please plan to be available for the duration of the conference. 
                                If your submission is accepted, you will participate in a paper review process.  After preparing a 12 page paper that is due 15 June 2017 after which the paper will be reviewed and, if accepted, will be part of a CD that will include all conference proceedings. You must make the presentation at the conference in order for the paper to be included in the proceedings. 
                                Presenting authors are required to register and pay fees by 15 June 2017. At that time, your presentation will be dropped from the program if you are not yet registered with fees paid in full.   If you have extenuating circumstances which would require later payment, please contact jctuconference@gmail.com to make arrangements prior to 15 June.   You are responsible for arranging your own funding as this conference does not have funds available to pay registration or travel expenses.   You are encouraged to begin planning for funding and visa arrangements now, as the processes can sometimes take several months. 
                                <br><br>
                                <br>Author substitutes 
                                Requests to have a substitute presenter of your submission to the conference may be made by jctuconference@gmail.com (email) until 10 July. The substitute must be an original co-author and must not be giving more than one presentation at the conference already, and will be listed as the presenting author in conference documents.   
                                Deadlines will be strictly enforced in order to ensure efficient, fair, and professional management and NO exceptions will be made. Please mark your calendar with important conference dates and plan so that your activities take place well before deadlines to avoid unforeseen or unavoidable delays in your schedule.
                                <br><br>
                                <br>Thank you for your interest in JCTU International Conference.  
                                <br>www.jc.tu.ac.th/jctucon
                                <br>Email: jctuconference@gmail.com'
                                .'</body></html>';
                    
                    $this->email->subject($subject);
                    $this->email->message($message);
                    
                    if($this->email->send())
                    {
                     $this->logging_model->insertMailLog($data['inputemail'],$updateResult,$subject, $message, 'Presenter register', 'Pass');
                    }else{
                        // Generate error
                     $this->logging_model->insertMailLog($data['inputemail'],$updateResult,$subject, $message, 'Presenter register', 'Fail');
                    }
                    
                    $this->load->helper('url');
                    redirect('Presentersubmitted');
//redirect('Payment/checkpayment/'.$updateResult);
            
//                $config['upload_path']          = './assets/paperupload/';
//                $config['allowed_types']        = 'doc|docx|pdf';
//                $config['overwrite']            = false;
//
//                $this->load->library('upload', $config);
//
//                if  (! $this->upload->do_upload('uploadfile') )
//                {
//                        $error = array('error' => $this->upload->display_errors());
//                        echo "fail:";
//                        foreach ($error as $err)
//                        {
//                            echo $err;
//                        }
//                        //$this->load->view('admin_page_view', $error);
//                }
//                else
//                {
//                    $this->load->library('form_validation');
//                    $this->load->helper('file');
//                    $this->load->helper('form');
//                    $this->load->model('registration_model');
//                    $this->load->model('config_model');
//
//                    $isEarlyBird = $this->config_model->isEarlyBird();
//
//                    $upload_filename = $this->upload->data('file_name');
//                    
//                    $data = array(
//                            'Title_1' => $this->input->post('Title_1'),
//                            'inputfirstname' => $this->input->post('inputfirstname'),
//                            'inputlastname' => $this->input->post('inputlastname'),
//                            'Title_2' => $this->input->post('Title_2'),
//                            'inputorganization' => $this->input->post('inputorganization'),
//                            'inputpostaladdress' => $this->input->post('inputpostaladdress'),
//                            'inputcity' => $this->input->post('inputcity'),
//                            'inputpostcode' => $this->input->post('inputpostcode'),
//                            'hiddencountry' => $this->input->post('hiddencountry'),
//                            'inputtel' => $this->input->post('inputtel'),
//                            'inputmobile' => $this->input->post('inputmobile'),
//                            'inputemail' => $this->input->post('inputemail'),
//                            'foodrestriction' => $this->input->post('foodrestriction'),
//                            'mealother' => $this->input->post('inputmealother'),
//                            'participantnational' => $this->input->post('participantnational'),
//                            'topicarea' => $this->input->post('topicarea'),
//                            'abstracttitle' => $this->input->post('inputabstract'),
//                            'isEarlyBird' => $isEarlyBird,
//                            'registrationType' => 2,
//                            'uploadFilename' => $upload_filename
//                            );
//
//                    $updateResult = $this->registration_model->newRegistration($data);
//
//                    
//                    $this->load->helper('url');
//                    redirect('Payment/checkpayment/'.$updateResult);
//                    
//                }
            
        }
        
    function cleanString($string)
    {
        $str = str_replace(array(' ','&'), '-', $string); 
        return str_replace(array('\'', '"'), '', $str); 
    }
}
