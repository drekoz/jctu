<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of member_model
 *
 * @author wphipattanap
 */
class registration_model extends CI_Model {
    
    function getData()
    {   
        $this->load->database();
       
        return $this->db->query("select * from registration");  
    }
    
    function getDataForAdminList()
    {
        $this->load->database();
        $mysql_query = "SELECT r.Id, r.Title_1, r.Title_2,r.FirstName,r.LastName,r.Organization"
                . ",r.PostalAddress,r.City,r.Postcode,r.Country,r.Tel,r.Mobile,r.Email"
                . ",r.FoodType,r.TopicArea,r.AbstractTitle,r.PaperFilename,r.RefNo"
                . ",r.RegistrationType,r.RegistrationTypeCode"
                . ",rt.Name as 'RegistrationTypeName'"
                . ",rs.Name AS 'RegistrationStatusName' "
                . "FROM registration r, registration_status rs, registration_type rt "
                . "WHERE r.RegistrationStatus = rs.Id AND r.RegistrationType = rt.Id";  
        
        $mysql_result = $this->db->query($mysql_query);
        
        $registrationList = array();
        
        foreach ($mysql_result->result() as $row)
        {
            $regData['Id'] = $row->Id;
            $regData['Title_1'] = $row->Title_1;
            $regData['Title_2'] = $row->Title_2;
            $regData['Firstname'] = $row->FirstName;
            $regData['Lastname'] = $row->LastName;
            $regData['Organization'] = $row->Organization;
            $regData['PostalAddress'] = $row->PostalAddress;
            $regData['City'] = $row->City;
            $regData['Postcode'] = $row->Postcode;
            $regData['Country'] = $row->Country;
            $regData['Tel'] = $row->Tel;
            $regData['Mobile'] = $row->Mobile;
            $regData['Email'] = $row->Email;
            $regData['FoodType'] = $row->FoodType;
            $regData['TopicArea'] = $row->TopicArea;
            $regData['AbstractTitle'] = $row->AbstractTitle;
            $regData['RegistrationType'] = $row->RegistrationType;
            $regData['RegistrationTypeCode'] = $row->RegistrationTypeCode;
            $regData['RegistrationTypeName'] = $row->RegistrationTypeName;
            $regData['RegistrationStatusName'] = $row->RegistrationStatusName;
            $regData['RefNo'] = $row->RefNo;
            
            array_push($registrationList, $regData);
        }

        return $registrationList;
    }
    
    function getDataForAdminListByStatusId($statusId, $registrationType)
    {
        $this->load->database();
        $mysql_query = "SELECT r.Id, r.Title_1, r.Title_2,r.FirstName,r.LastName,r.Organization"
                . ",r.PostalAddress,r.City,r.Postcode,r.Country,r.Tel,r.Mobile,r.Email"
                . ",r.FoodType,r.TopicArea,r.AbstractTitle,r.PaperFilename,r.PaperFilenamePdf,r.RefNo, r.PayInRef"
                . ",r.RegistrationType,r.RegistrationTypeCode, r.InformationFilledInDate, r.SentToReviewerDate, r.ConfirmEmailSentDate, r.PaymentDoneDate, r.OnlinePaymentDoneDate, r.PaperRejectedDate"
                . ",rt.Name as 'RegistrationTypeName'"
                . ",rs.Name AS 'RegistrationStatusName' "
                . "FROM registration r, registration_status rs, registration_type rt "
                . "WHERE r.RegistrationStatus = rs.Id AND r.RegistrationType = rt.Id AND r.RegistrationStatus = ".$statusId." AND ".$registrationType;  
        
        $mysql_result = $this->db->query($mysql_query);
        
        $registrationList = array();
        
        foreach ($mysql_result->result() as $row)
        {
            $regData['Id'] = $row->Id;
            $regData['Title_1'] = $row->Title_1;
            $regData['Title_2'] = $row->Title_2;
            $regData['Firstname'] = $row->FirstName;
            $regData['Lastname'] = $row->LastName;
            $regData['Organization'] = $row->Organization;
            $regData['PostalAddress'] = $row->PostalAddress;
            $regData['City'] = $row->City;
            $regData['Postcode'] = $row->Postcode;
            $regData['Country'] = $row->Country;
            $regData['Tel'] = $row->Tel;
            $regData['Mobile'] = $row->Mobile;
            $regData['Email'] = $row->Email;
            $regData['FoodType'] = $row->FoodType;
            $regData['TopicArea'] = $row->TopicArea;
            $regData['AbstractTitle'] = $row->AbstractTitle;
            $regData['RegistrationType'] = $row->RegistrationType;
            $regData['RegistrationTypeCode'] = $row->RegistrationTypeCode;
            $regData['RegistrationTypeName'] = $row->RegistrationTypeName;
            $regData['RegistrationStatusName'] = $row->RegistrationStatusName;
            $regData['PaperFilename'] = $row->PaperFilename;
            $regData['PaperFilenamePdf'] = $row->PaperFilenamePdf;
            $regData['RefNo'] = $row->RefNo;
            $regData['PayInRef'] = $row->PayInRef;
            $regData['InformationFilledInDate'] = $row->InformationFilledInDate;
            $regData['SentToReviewerDate'] = $row->SentToReviewerDate;
            $regData['ConfirmEmailSentDate'] = $row->ConfirmEmailSentDate;
            $regData['PaymentDoneDate'] = $row->PaymentDoneDate;
            $regData['OnlinePaymentDoneDate'] = $row->OnlinePaymentDoneDate;
            $regData['PaperRejectedDate'] = $row->PaperRejectedDate;
            
            array_push($registrationList, $regData);
        }

        return $registrationList;
    }
    
    function updateCreditcardPaymentByRefNo($refNo)
    {
        $updateQuery = "UPDATE registration SET RegistrationStatus = 5, OnlinePaymentDoneDate = NOW() WHERE RefNo = ".$refNo;
        
        $result = $this->db->query($updateQuery);
        
        return $result;
    }
    
    function createTransactionlog($refNo, $status)
    {
        $insertQuery = "INSERT INTO `transaction_log` (`Detail`, `Status`, `Time`) VALUES ('".$refNo."', '".$status."', CURRENT_TIMESTAMP);";
        
        $result = $this->db->query($insertQuery);
        
        return $result;
    }
    
    function updateStatusTypeById($statusId, $Id){
        
        $this->load->database();
        
        
        if($statusId == 7){
            
        $updateQuery = "DELETE FROM registration WHERE Id = ".$Id;
        
        $result = $this->db->query($updateQuery);
        
        return $result;
        
        }else{
        
        $dateCol = "";
        if($statusId == 1)
        {$dateCol = ", InformationFilledInDate = NOW() ";}
        else if($statusId == 2)
        {$dateCol = ", SentToReviewerDate = NOW() ";}
        else if($statusId == 3)
        {$dateCol = ", ConfirmEmailSentDate = NOW() ";}
        else if($statusId == 4)
        {$dateCol = ", PaymentDoneDate = NOW() ";}
        else if($statusId == 5)
        {$dateCol = ", OnlinePaymentDoneDate = NOW() ";}
        else if($statusId == 6)
        {$dateCol = ", PaperRejectedDate = NOW() ";}
        
        $updateQuery = "UPDATE registration SET RegistrationStatus = ".$statusId.$dateCol." WHERE Id = ".$Id;
        
        $result = $this->db->query($updateQuery);
        
        return $result;
        }
    }
    
    function getRegistrationFeeByRegType($regType){
        $this->load->database();
        $mysql_query = "select * from registration_type Where Id = '".$regType."';";  
        
        $mysql_result = $this->db->query($mysql_query);
        
        $count = 0;
        
        foreach ($mysql_result->result() as $row)
        {
            $fee = $row->fee;
            
            $count++;
        }
        
        return $fee; 
    }
    
    function isAttendance($registrationType){
        if($registrationType <= 4){
            return true;
        }else{ 
            return false;
        }
    }
    
    function getRefNoById($id){
        $this->load->database();
       
        $mysql_query = "select * from registration Where Id = '".$id."';";  
        
        $mysql_result = $this->db->query($mysql_query);
        
        foreach ($mysql_result->result() as $row)
        {
            $regData['RefNo'] = $row->RefNo;
            $regData['Email'] = $row->Email;
            $regData['RegistrationType'] = $row->RegistrationType;
            $regData['Title'] = $row->Title_1;
            $regData['Firstname'] = $row->FirstName;
            $regData['Lastname'] = $row->LastName;
            $regData['AbstractTitle'] = $row->AbstractTitle;
            $regData['Lastname'] = $row->LastName;
        }
        
        return $regData;
    }
    
        function getDataByRefNo($refNo){
         $this->load->database();
       
        $mysql_query = "select * from registration Where RefNo = '".$refNo."';";  
        
        $mysql_result = $this->db->query($mysql_query);
        
        $count = 0;
        
        foreach ($mysql_result->result() as $row)
        {
            $regData['Id'] = $row->Id;
            $regData['Title_1'] = $row->Title_1;
            $regData['Title_2'] = $row->Title_2;
            $regData['Firstname'] = $row->FirstName;
            $regData['Lastname'] = $row->LastName;
            $regData['Organization'] = $row->Organization;
            $regData['PostalAddress'] = $row->PostalAddress;
            $regData['City'] = $row->City;
            $regData['Postcode'] = $row->Postcode;
            $regData['Country'] = $row->Country;
            $regData['Tel'] = $row->Tel;
            $regData['Mobile'] = $row->Mobile;
            $regData['Email'] = $row->Email;
            $regData['FoodType'] = $row->FoodType;
            $regData['TopicArea'] = $row->TopicArea;
            $regData['AbstractTitle'] = $row->AbstractTitle;
            $regData['RegistrationType'] = $row->RegistrationType;
            $regData['RegistrationTypeCode'] = $row->RegistrationTypeCode;
            $regData['RegistrationStatus'] = $row->RegistrationStatus;
            
            $count++;
        }
        
        $regData['count'] = $count;
        
        $regData['fee'] = $this->getRegistrationFeeByRegType($regData['RegistrationType']);
        
        return $regData;
        
    }
 
    function generateRegTypeCode($registrationType, $Title_2, $country, $isEarlyBird)
    {
     
        $earlyBirdCode = "0";
        if($isEarlyBird)
        {
          $earlyBirdCode = "1";  
        } else {
            $earlyBirdCode = "2";
        }
        
        $countryCode = "0";
        if($country === "Thailand")
        {   
            $countryCode = "1";
        }
        else
        {
            $countryCode = "2";
        }
        
        $titleCode = "0";
        $registrationTypeCode = "0";
        
        if($registrationType == 2){
            $registrationTypeCode = "2";
            if($Title_2 === 'Student'){
                $titleCode = "1";
            } else 
            {
                $titleCode = "2";
            }
        }else
        {
               $registrationTypeCode = "1";
        }
       
        $regTypeCode = $registrationTypeCode.$titleCode.$countryCode.$earlyBirdCode;
        
        return $regTypeCode;
    }
    
    function getRegistrationType($registrationTypeCode){
        $regType = 0;
        switch ($registrationTypeCode) {
            case "1011":
                $regType = 1;
                break;
            case "1012":
                $regType = 2;
                break;
            case "1021":
                $regType = 3;
                break;
            case "1022":
                $regType = 4;
                break;
            case "2111":
                $regType = 5;
                break;
            case "2112":
                $regType = 6;
                break;
            case "2121":
                $regType = 7;
                break;
            case "2122":
                $regType = 8;
                break;
            case "2211":
                $regType = 9;
                break;
            case "2212":
                $regType = 10;
                break;
            case "2221":
                $regType = 11;
                break;
            case "2222":
                $regType = 12;
                break;
            default:
                $regType = 1;
        }
        return $regType;
    }
    
    function newRegistration($data)
    {  
        //echo $data['inputfirstname'].' <br>   '.$this->cleanString($data['inputfirstname']);
        
        $title_1 = $data['Title_1'];
        $firstname = $this->cleanString($data['inputfirstname']);
        $lastname = $this->cleanString($data['inputlastname']);
        $title_2 = $data['Title_2'];
        $organization = $this->cleanString($data['inputorganization']);
        $address = $this->cleanString($data['inputpostaladdress']);
        $city = $this->cleanString($data['inputcity']);
        $postcode = $this->cleanString($data['inputpostcode']);
        $country = $data['hiddencountry'];
        $tel = $data['inputtel'];
        $mob = $data['inputmobile'];
        $email = $data['inputemail'];
        $foodType = $data['foodrestriction'];
        $foodOther = $this->cleanString($data['mealother']);
        $paticipantNational = $data['participantnational'];
        $topicArea = "";
        $abstractTitle = "";
        $uploadFilename = "";
        $uploadFilenamePdf = "";
        
        $isEarlyBird = $data['isEarlyBird'];
        
        $registrationTypeCode = $this->generateRegTypeCode($data['registrationType'], $title_2, $country, $isEarlyBird);
        $registrationType = $this->getRegistrationType($registrationTypeCode);
        $resgistrationStatus = 1; //type 1: info filled in, 2: sent to reviewer, 3: confirm email sent, 3: payment done
        
        
        if($data['registrationType'] == 2){
           $topicArea = $this->cleanString($data['topicarea']);
            $abstractTitle = $this->cleanString($data['abstracttitle']); 
            $uploadFilename = $this->cleanString($data['uploadFilename']);
            $uploadFilenamePdf = $this->cleanString($data['uploadFilenamePdf']);
        }
        
        if($foodType === 'Other'){
            $foodType = $foodOther;
        }
        
        $this->load->database();
        
        $insertQuery = "INSERT INTO registration "
                . "(`Title_1`, `Title_2`, `FirstName`, `LastName`, `Organization`, "
                . "`PostalAddress`, `City`, `Postcode`, `Country`, `Tel`, `Mobile`, "
                . "`Email`, `FoodType`, `TopicArea`, `AbstractTitle`, `RegistrationStatus`, "
                . "`RegistrationType`,`RegistrationTypeCode`, `RefNo`, `PaperFilename`, `PaperFilenamePdf`, `InformationFilledInDate`) "
                . "VALUES ('".$title_1."', '".$title_2."', '".$firstname."', '".$lastname."', "
                . "'".$organization."', '".$address."', '".$city."', '".$postcode."', '".$country."', "
                . "'".$tel."', '".$mob."', '".$email."', '".$foodType."', '".$topicArea."', '".$abstractTitle."', "
                . "'".$resgistrationStatus."', '".$registrationType."', '".$registrationTypeCode."', '', '".$uploadFilename."','".$uploadFilenamePdf."', NOW())";

       
        $result = $this->db->query($insertQuery);
        
        //calculate Reference No.
        $insert_id = $this->db->insert_id();
        $hash = hexdec(substr(hash("md5",$insert_id), 0, 15));
        $refNo = abs($hash%999999);

        //calculate Payin Ref1 No.
        $padId = str_pad($insert_id, 4, "0", STR_PAD_LEFT);
            
        $ref1 = $registrationType.$padId;
        $payInRef = $this->getPayInRef($ref1, $registrationType);
        
        
        $updateQuery = "Update registration Set RefNo = '".$refNo."', PayInRef = '".$payInRef."' Where Id = ".$insert_id.";";
        $result = $this->db->query($updateQuery);
        
        return $refNo;
    }
    
    function cleanString($string)
    {
        return str_replace(array('\'', '"'), '', $string); 
    }
    
    
    function getPayInRef($ref1, $registType ){
        
        $this->load->model('config_model');
        
        $isEarlyBird = $this->config_model->isEarlyBird();
        
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

        return $ref1."1".$checkDigi;
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
    
}
