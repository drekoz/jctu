<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

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
            $this->load->helper('download');
            $this->load->model('content_model');
            $this->load->model('banner_model');
            $this->load->model('config_model');
           
            $data = $this->content_model->generateDataForContentManage('registration','manageregistration');
           
            $data['filecontent'] = read_file('assets/upload/registration_table.txt');
            $data['bannerlist'] = $this->banner_model->getData('registration');
            $data['enableattendance'] = $this->config_model->getData('EnableAttendance');
            $data['enablepresenter'] = $this->config_model->getData('EnablePresenter');            
            $data['presenter_form'] = $this->config_model->getData('presenter_form');
            $data['guideline_doc'] = $this->config_model->getData('guideline_doc');
            
            //echo "attendance: ".$data['enableattendance'];
            //echo "<br>presenter: ".$data['enablepresenter'];
            
            $this->load->view('header'); 
            $this->load->view('registration_view',$data);
	}
        
        public function myFunc()
        {
           $this->load->database();   
           $this->load->model('content_m');   
           //echo $this->content_m->get_data();
        }
}
