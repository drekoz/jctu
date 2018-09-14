<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {

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
            $this->load->view('payment_view',$data);
	}
        
        public function check()
        {
            $refNo = $this->input->post('refNo');
            
            $this->load->library('form_validation');
            $this->load->helper('file');
            $this->load->helper('form');
            $this->load->model('registration_model');
            $this->load->model('config_model');
            $this->load->library('session');
            
            $isEarlyBird = $this->config_model->isEarlyBird();
           
            $this->load->helper('url');
            $this->load->model('content_model');
            $this->load->model('banner_model');
            $this->load->model('registration_model');
            
            $data['bannerlist'] = $this->banner_model->getData('registration');
            $data['refNo'] = $refNo;
            
            $data['regData'] = $this->registration_model->getDataByRefNo($refNo);
            
            $userdata = array(
                        'refNo'  => $refNo
                );
             $this->session->set_userdata($userdata);
            
            $this->load->view('header'); 
            $this->load->view('payment_view',$data);
        }
        
        public function checkpayment($refNo)
        {
            $this->load->library('form_validation');
            $this->load->helper('file');
            $this->load->helper('form');
            $this->load->model('registration_model');
            $this->load->model('config_model');
            $this->load->library('session');
            
            $isEarlyBird = $this->config_model->isEarlyBird();
            
           
            $this->load->helper('url');
            $this->load->model('content_model');
            $this->load->model('banner_model');
            
            $data['bannerlist'] = $this->banner_model->getData('registration');
            $data['refNo'] = $refNo;
            
            $data['regData'] = $this->registration_model->getDataByRefNo($refNo);
            
            $userdata = array(
                        'refNo'  => $refNo
                );
             $this->session->set_userdata($userdata);
            
            $this->load->view('header'); 
            $this->load->view('payment_view',$data);
        }
        
        function getOnlinePayment($refNo){
            
        }
        
        function getPayin($refNo){
     
            $this->load->model('registration_model');
            $this->load->model('config_model');
            
            $regData = $this->registration_model->getDataByRefNo($refNo);
            $isEarlyBird = $this->config_model->isEarlyBird();
            
                    
            $id = $regData['Id'];
            $customerName = $regData['Firstname']." ".$regData['Lastname'];
            $padId = str_pad($id, 4, "0", STR_PAD_LEFT);
            $registType = $regData['RegistrationType'];
            
            $ref1 = $registType.$padId;
            
            if($isEarlyBird){
                $early_bird_day = $this->config_model->getData('early_bird_day_for_payin_form');
                $ref2 = $early_bird_day;
            }else{
                $normal_day = $this->config_model->getData('normal_day_for_payin_form');
                $ref2 = $normal_day;
            }
           
            $regFee = $this->config_model->getRegistrationFeeByRegistrationType($registType);

            $regFee .= '00';
            
            $ref1rev = strrev($ref1."1");
            $ref1Sum = $this->getCheckSum($ref1rev, 9, 3);
            
            $ref2rev = strrev($ref2);
            $ref2Sum = $this->getCheckSum($ref2rev, 7, 5);
            
            
            $regFeerev = strrev($regFee);
            $regFeeSum = $this->getCheckSum($regFeerev, 5, 3);
            

            $allSum = $ref1Sum + $ref2Sum + $regFeeSum;
            $checkDigi = $allSum%100;
            
//            echo("<br>REF1: ".$ref1."1 -->".$ref1rev);
//            echo("<br>REF1 CheckSum: ".$ref1Sum);
//            echo("<br>REF2: ".$ref2." -->".$ref2rev);
//            echo("<br>REF2 CheckSum: ".$ref2Sum);
//            echo("<br>FEE: ".$regFee." -->".$regFeerev);
//            echo("<br>FEE CheckSum: ".$regFeeSum);
//            echo("<br>SUM: ".$allSum."=".$ref1Sum."+".$ref2Sum."+".$regFeeSum);
//            echo("<br>CHECK digi: ".$checkDigi);
            
            $taxId = $this->config_model->getData('jctu_tax_id');
            $preFixNo = $this->config_model->getData('payin_prefix');
            
            
            $barcode = "|".$taxId.$preFixNo."\r".$ref1."1".$checkDigi."\r".$ref2."\r".$regFee;      
            
            $this->generatePdf($barcode, $customerName, $ref1."1".$checkDigi, $ref2, $regFee, $taxId, '', '');
            
        }
        
        function getCheckSum($ref, $odd, $even){
           
//            echo '<br>check sum:'.$ref;
//            echo '<br>odd:'.$odd;
//            echo '<br>even:'.$even;
//            
            $sum = 0;
            
            for ($x = 0; $x < strlen($ref); $x++) {
                if(($x+1)%2 == 0){
//                    echo '<br>'.$x.'-> even: '.$ref[$x]."*".$even;
                    $sum += $ref[$x]*$even;
                }else{
//                    echo '<br>'.$x.'-> odd: '.$ref[$x]."*".$odd;
                    $sum += $ref[$x]*$odd;
                }
            } 
            
//            echo '<br>sum: '.$sum;
            return $sum;
        }
        
        
//        function getPayin()
//        {
//           $this->load->helper('url');
//           $this->load->helper('file');
//            
//           $data['codetext'] = "|1234567890123\r\n01\r\n000000000100001111";
//           
//           $this->load->view('payin_view',$data); 
//        }
        
        
//        function getPayin()
//        {
//           $this->load->helper('url');
//           $this->load->helper('file');
//           $this->load->helper('html'); 
//           
//           $this->load->library('pdf');
//           
//           $data['codetext'] = "|1234567890\n123";
//
//            $image = $this->barcode($data['codetext']);
//            $img = '././assets/barcode/barcode-test.png';
//            imagepng($image, $img);
//            $data['barcodeimg'] = $img;
//           //copy(base_url('/Payment/barcode/').$data['codetext'], '././assets/barcode/file.jpeg');
//           
//            $this->pdf->load_view('payin_view',$data);
//           $this->pdf->render();
//            $this->pdf->stream("pay_in_form.pdf");
//        }
        
//        function barcode($barcode)
//        {
//            $this->load->library('zend');
//            $this->zend->load('Zend/Barcode');
//
//            $image = Zend_Barcode::draw('code128', 'image', array('text' => $barcode));
//            //$image = Zend_Barcode::draw('Upca', 'image', array('text' => $text, 'barHeight' => $height));
//            return $image;
//             
//        }
       
        
        //===================================================  PDF generator ============================================================//
	public function generatePdf($content='', $name='', $ref1='', $ref2='', $fee='', $taxId='', $author='', $title='')
	{
		$this->load->library('Pdf');
                $this->load->helper('url');

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor($author);
		$pdf->SetTitle($title);
		$pdf->SetSubject($title);
		//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

		// set default header data
		//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
		//$pdf->setFooterData(array(0,64,0), array(0,64,128));

		// set header and footer fonts
		//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		//$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
		// set default font subsetting mode
		$pdf->setFontSubsetting(true);

		// Set font
		// dejavusans is a UTF-8 Unicode font, if you only need to
		// print standard ASCII chars, you can use core fonts like
		// helvetica or times to reduce file size.
		$pdf->SetFont('dejavusans', '', 12, '', true);
                $pdf->SetFont('freeserif', '', 14, '', true);

		// Add a page
		// This method has several options, check the source code documentation for more information.
		$pdf->AddPage();

		// set text shadow effect
		$pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

                $w = $pdf->pixelsToUnits('380');
                $h = $pdf->pixelsToUnits('56');
                
                // define barcode style
                $style = array(
                    'position' => '',
                    'align' => 'C',
                    'stretch' => false,
                    'fitwidth' => true,
                    'cellfitalign' => '',
                    'border' => true,
                    'hpadding' => 'auto',
                    'vpadding' => 'auto',
                    'fgcolor' => array(0,0,0),
                    'bgcolor' => false, //array(255,255,255),
                    'text' => true,
                    'font' => 'helvetica',
                    'fontsize' => 8,
                    'stretchtext' => 4
                );

                
		// Set some content to print
		//----------------------------------------------------
                
            $html = '<html>';
            $html .= '<head></head>';
            $html .= '<body><table><tr><td>';
            $html .= '<br><br><br><br><br><table border="1" style="border-collapse: collapse;margin-left: 50px;margin-right: 50px;margin-top: 3cm; font-size: 0.3cm;">';
            $html .= '<tr style="height:1.8cm; border-bottom:none;">';
            $html .= '<td width="50%">';
            $html .= '<br>&nbsp;&nbsp;<b>ใบนำฝากชำระค่าสินค้าหรือบริการ (Bill Payment Pay-In Slip)</b>';
            $html .= '</td>';
            $html .= '<td width="50%" style="text-align:right;">';
            $html .= 'สำหรับลูกค้า&nbsp;&nbsp;<br>โปรดเรียกเก็บค่าธรรมเนียมจากผู้ชำระเงิน*&nbsp;&nbsp;';
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '<tr style="border-bottom-color:#fff;border-top-color:#fff;">';
            $html .= '<td colspan="2">';
            $html .= '<hr style=" margin: 0px;">';
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '<tr style="border-bottom-color:#fff;border-top-color:#fff;">';
            $html .= '<td colspan="2" style="height: 0.7cm;">';
            $html .= '&nbsp;';
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '<tr style="border-bottom:#fff;border-top:#fff;">';
            $html .= '<td colspan="2" style="text-align: right;">';
            $html .= 'สาขา/Branch.................วันที่/Date..................&nbsp;&nbsp;';
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '<tr style="border-bottom:#fff;border-top:#fff;">';
            $html .= '<td width="60%" style="text-align:center;">';
            $html .= '<table>';
            $html .= '<tr style="vertical-align: top;">';
            $html .= '<td width="50%">';
            $html .= '<br><br>&nbsp;&nbsp;<img src="'.base_url().'/assets/image/jc_logo.png" height="1.5cm" width="6cm" style="margin-top: 0.1cm;">';
            $html .= '<br><br>';
            $html .= '<font style="font-size: 0.25cm;">เลขประจำตัวผู้เสียภาษี '.$taxId.'</font>';
            $html .= '</td>';
            $html .= '<td width="50%" style="font-size: 0.3cm;">';
            $html .= '<br><br>คณะวารสารศาสตร์และสื่อสารมวลชน มหาวิทยาลัยธรรมศาสตร์';
            //$html .= '<br>ที่อยู่ .....................................';
            //$html .= '<br>โทรศัพท์ ............... Fax. .............';
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '</table>';
            $html .= '</td>';
            $html .= '<td width="40%" style="text-align: center;">';
            $html .= '<table width="100%" border="1">';
            $html .= '<tr>';
            $html .= '<td style="text-align:left;">';
            $html .= '&nbsp;&nbsp;ชื่อ/Name: '.$name;
            $html .= '<br>&nbsp;&nbsp;รหัสลูกค้า/Customer No(Ref.1): '.$ref1;
            $html .= '<br>&nbsp;&nbsp;หมายเลขอ้างอิง/Reference No(Ref.2: '.$ref2;
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '</table>';
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '<tr style="border-bottom:#fff;border-top:#fff;">';
            $html .= '<td colspan="2">';
            $html .= '<br><table><tr>'
                    . '<td width="5%" style="text-align:left;">&nbsp;&nbsp;<img src="'.base_url().'/assets/image/scb.jpg" height="0.5cm" width="0.5cm" ></td>'
                    . '<td width="90%" style="text-align:left;">&nbsp;&nbsp;เพื่อนำเข้าบัญชี คณะวารสารศาสตร์(โครงการประชุมวิชาการ)';
            $html .= '<br>&nbsp;&nbsp;บมจ.ธนาคารไทยพาณิชย์ เลขที่ 4680608696 (Bill Payment)(10/10)*</td></tr></table>';
            $html .= '<br><br>';
            $html .= '<table width="100%" border="1" style="border-collapse: collapse; margin-bottom: 0px;">';
            $html .= '<tr>';
            $html .= '<td width="30%" style=" height: 0px;padding: 0px;">&nbsp;&nbsp;<b>รับชำระด้วยเงินสดเท่านั้น</b></td>';
            $html .= '<td width="30%" style=" height: 0px;padding: 0px;">&nbsp;&nbsp;จำนวนเงิน/Amount</td>';
            $html .= '<td width="30%" style=" height: 0px;padding: 0px;text-align:center;">- '.($fee/100).'.00 -</td>';
            $html .= '<td width="10%" style=" height: 0px;padding: 0px;text-align:center;">บาท/Baht</td>';
            $html .= '</tr>';
            //$html .= '<tr>';
            //$html .= '<td style="height: 0px;padding: 0px;font-size: 0.3cm; border-color: black;" class="text-center">จำนวนเงินเป็นตัวอักษร/Amount in Words</td>';
            //$html .= '<td colspan="3" style=" height: 0px;padding: 0px;font-size: 0.3cm; border-color: black;">&nbsp;</td>';
            //$html .= '</tr>';
            $html .= '</table>';
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '<tr style="vertical-align: top;border-bottom: #fff;">';
            $html .= '<td width="70%">';
            $html .= '<br><br>&nbsp;&nbsp;ชื่อผู้นำฝาก/Deposit by............   โทรศัพท์/Telephone...............<br><br>';
            $html .= '</td>';
            $html .= '<td width="30%">';
            $html .= '<table width="100%" border="1" style="border-collapse:collapse;text-align: center">';
            $html .= '<tr>';
            $html .= '<td>สำหรับเจ้าที่ธนาคาร</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td align="left">&nbsp;&nbsp;ผู้รับเงิน.................</td>';
            $html .= '</tr>';
            $html .= '</table>';
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td colspan="2" style="text-align: center">';
            $html .= 'โปรดนำใบนำฝากนี้ไปชำรเงินได้ที่ บมจ.ธนาคารไทยพาณิชย์ ทุกสาขาทั่วประเทศหรือช่องทางอิเล็กทรอนิกส์ของธนาคาร';
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '</table>';
            
            
            $html .= '</td></tr>'
                    . '<tr><td>&nbsp;<HR>&nbsp;</td></tr>'
                    . '<tr><td><br><br><br><br><br>';
            
            
            $html .= '<table border="1" style="border-collapse: collapse;margin-left: 50px;margin-right: 50px;margin-top: 3cm; font-size: 0.3cm;">';
            $html .= '<tr style="height: 1.8cm;">';
            $html .= '<td width="50%">';
            $html .= '<br>&nbsp;&nbsp;<b>ใบนำฝากชำระค่าสินค้าหรือบริการ (Bill Payment Pay-In Slip)</b>';
            $html .= '</td>';
            $html .= '<td width="50%" style="text-align: right;">';
            $html .= 'สำหรับธนาคาร&nbsp;&nbsp;<br>โปรดเรียกเก็บค่าธรรมเนียมจากผู้ชำระเงิน*&nbsp;&nbsp;';
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '<tr>';
            $html .= '<td colspan="2">';
            $html .= '<hr style="margin: 0px;">';
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '<tr style="border-bottom:#fff;border-top:#fff;">';
            $html .= '<td colspan="2" style="height: 0.7cm;">';
            $html .= '&nbsp;';
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '<tr style="border-bottom:#fff;border-top:#fff;">';
            $html .= '<td colspan="2" style="text-align: right;">';
            $html .= 'สาขา/Branch.................วันที่/Date..................&nbsp;&nbsp;';
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '<tr style="border-bottom:#fff;border-top:#fff;">';
            $html .= '<td width="60%" style="text-align:center;">';
            $html .= '<table>';
            $html .= '<tr style="vertical-align: top;">';
            $html .= '<td width="50%">';
            $html .= '<br><br>&nbsp;&nbsp;<img src="'.base_url().'/assets/image/jc_logo.png" height="1.5cm" width="6cm" >';
            $html .= '<br><br>';
            $html .= '<font style="font-size: 0.25cm;">เลขประจำตัวผู้เสียภาษี '.$taxId.'</font>';
            $html .= '</td>';
            $html .= '<td width="50%" style="font-size: 0.3cm;">';
            $html .= '<br><br>คณะวารสารศาสตร์และสื่อสารมวลชน มหาวิทยาลัยธรรมศาสตร์';
            //$html .= '<br>ที่อยู่ .....................................';
            //$html .= '<br>โทรศัพท์ ............... Fax. .............';
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '</table>';
            $html .= '</td>';
            $html .= '<td width="40%" style="text-align: center;">';
            $html .= '<table width="100%" border="1">';
            $html .= '<tr>';
            $html .= '<td style="text-align:left;">';
            $html .= '&nbsp;&nbsp;ชื่อ/Name: '.$name;
            $html .= '<br>&nbsp;&nbsp;รหัสลูกค้า/Customer No(Ref.1):'.$ref1;
            $html .= '<br>&nbsp;&nbsp;หมายเลขอ้างอิง/Reference No(Ref.2):'.$ref2;
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '</table>';
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '<tr style="border-bottom:#fff;border-top:#fff;">';
            $html .= '<td colspan="2">';
            $html .= '<br><table><tr>'
                    . '<td width="5%" style="text-align:left;">&nbsp;&nbsp;<img src="'.base_url().'/assets/image/scb.jpg" height="0.5cm" width="0.5cm" ></td>'
                    . '<td width="90%" style="text-align:left;">&nbsp;&nbsp;เพื่อนำเข้าบัญชี คณะวารสารศาสตร์(โครงการประชุมวิชาการ)';
            $html .= '<br>&nbsp;&nbsp;บมจ.ธนาคารไทยพาณิชย์ เลขที่ 4680608696 (Bill Payment)(10/10)*</td></tr></table>';
            $html .= '<br><br>';
            $html .= '<table width="100%" border="1" style="border-collapse: collapse; margin-bottom: 0px;border: 1px solid #000">';
            $html .= '<tr>';
            $html .= '<td width="30%" style=" height: 0px;padding: 0px;">&nbsp;&nbsp;<b>รับชำระด้วยเงินสดเท่านั้น</b></td>';
            $html .= '<td width="30%" style=" height: 0px;padding: 0px;">&nbsp;&nbsp;จำนวนเงิน/Amount</td>';
            $html .= '<td width="30%" style=" height: 0px;padding: 0px;text-align:center;">- '.($fee/100).'.00 -</td>';
            $html .= '<td width="10%" style=" height: 0px;padding: 0px;text-align:center;">บาท/Baht</td>';
            $html .= '</tr>';
            //$html .= '<tr>';
            //$html .= '<td style="height: 0px;padding: 0px;font-size: 0.3cm; border-color: black;" class="text-center">จำนวนเงินเป็นตัวอักษร/Amount in Words</td>';
            //$html .= '<td colspan="3" style=" height: 0px;padding: 0px;font-size: 0.3cm; border-color: black;">&nbsp;</td>';
            //$html .= '</tr>';
            $html .= '</table>';
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '<tr style="vertical-align: top;border-bottom: #fff;">';
            $html .= '<td width="70%">';
            $html .= '<br><br>&nbsp;&nbsp;ชื่อผู้นำฝาก/Deposit by............   โทรศัพท์/Telephone...............<br><br>';
            
            //$pdf->Cell(0, 0, 'CODE 128 AUTO', 0, 1);
            //$pdf->write1DBarcode('CODE 128 AUTO', 'C128', '', '', '', '', 0.4, $style, 'N');
            $params = $pdf->serializeTCPDFtagParameters(array($content, 'C128', '', '', $w, $h, 0.4, $style, 'N'));
            $html .= '<tcpdf method="write1DBarcode" params="'.$params.'" />';
            
            $html .= '</td>';
            $html .= '<td width="30%">';
            $html .= '<table width="100%" border="1" style="border-collapse:collapse;text-align: center">';
            $html .= '<tr><td>สำหรับเจ้าที่ธนาคาร</td></tr>';
            $html .= '<tr><td align="left">&nbsp;&nbsp;ผู้รับเงิน.................</td></tr>';
            $html .= '</table>';
            $html .= '</td>';
            $html .= '</tr>';
            $html .= '<tr><td colspan="2" style="text-align: center">';
            $html .= 'โปรดนำใบนำฝากนี้ไปชำรเงินได้ที่ บมจ.ธนาคารไทยพาณิชย์ ทุกสาขาทั่วประเทศหรือช่องทางอิเล็กทรอนิกส์ของธนาคาร';
            $html .= '</td></tr>';
            $html .= '</table>';
            $html .= '</td></tr></table></body></html>';
                
                //----------------------------------------------------

		// Print text using writeHTMLCell()
		//$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
                $pdf->writeHTML($html, true, 0, true, 0);


		// ---------------------------------------------------------

		// Close and output PDF document
		// This method has several options, check the source code documentation for more information.
		$pdf->Output($title.'.pdf', 'I');
	}
	//===================================================  PDF generator ============================================================//
	
        
        
}
