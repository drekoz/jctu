<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payin extends CI_Controller {

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
    
    public function Payin(){
           parent::__construct();
       }
       
    
	public function index()
	{
           $this->load->helper('url');
           $this->load->helper('file');
            
           $this->load->model('content_model');
           
           $data = $this->content_model->generateDataForContentManage('home','managehomepage');
           
           $data['filecontent'] = read_file('assets/upload/welcome_table.txt');
           
           
           $data['codetext'] = "|1234567890123\r\n01\r\n000000000100001111";
           
           $this->load->view('payin_view',$data); 
       }
       
        function barcode($barcode)
        {
            $this->load->library('zend');
            $this->zend->load('Zend/Barcode');

            Zend_Barcode::render('code128', 'image', array('text' => $barcode), array());
        } 
    
        
        
}
