<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

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
            $this->load->model('banner_model');
            
            $data['bannerlist'] = $this->banner_model->getData('contact');
            
            $this->load->view('header'); 
            $this->load->view('contact_view',$data);
	}
        
        public function myFunc()
        {
           $this->load->database();   
           $this->load->model('content_m');   
           //echo $this->content_m->get_data();
        }
}
