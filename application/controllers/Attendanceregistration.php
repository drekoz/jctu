<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendanceregistration extends CI_Controller {

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
            $this->load->helper('form');
           
            //$data = $this->content_model->generateDataForContentManage('registration','manageregistration');
           
            //$data['filecontent'] = read_file('assets/upload/registration_table.txt');
            $data['bannerlist'] = $this->banner_model->getData('registration');
            
            $this->load->view('header'); 
            $this->load->view('attendanceregistration_view',$data);
	}
        
        public function register()
        {
            
            $this->load->library('form_validation');
            $this->load->library('email');

            $this->load->helper('file');
            $this->load->helper('form');
            $this->load->model('registration_model');
            $this->load->model('config_model');
            $this->load->model('logging_model');
            
            $isEarlyBird = $this->config_model->isEarlyBird();
            
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
                    'isEarlyBird' => $isEarlyBird,
                    'registrationType' => 1
                    );
            
            $updateResult = $this->registration_model->newRegistration($data);

            $this->email->from('jctuconference@gmail.com', 'JCTU Conference');
            $this->email->to($data['inputemail']);
            $this->email->cc('jctuconference@gmail.com');
            
            $subject = 'Registration complete';
            $message = '<html><head></head><body>'
                    . '<h1>Welcome to JCTU International Conference</h1>'
                    . '<br>Your registration has been completed.'
                    . '<br>Please proceed the payment process followed by the link below.'
                    . '<br><a href="http://conference.jc.tu.ac.th/jctu2016/Payment/checkpayment/'.$updateResult.'">http://conference.jc.tu.ac.th/jctu2016/Payment/checkpayment/'.$updateResult.'</a>';
            
            $this->email->subject($subject);
            $this->email->message($message);

            if($this->email->send())
            {
             $this->logging_model->insertMailLog($data['inputemail'],$updateResult,$subject, $message, 'Attendance register', 'Pass');
            }else{
                // Generate error
             $this->logging_model->insertMailLog($data['inputemail'],$updateResult,$subject, $message, 'Attendance register', 'Fail');
            }
            
            $this->load->helper('url');
            redirect('Payment/checkpayment/'.$updateResult);
        }
}
