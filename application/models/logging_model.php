<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class logging_model extends CI_Model {
    
    function setData($name,$value)
    {
        $this->load->database();
        
        $mysql_query = "UPDATE config "
                . " SET Value = '".$value."'"
                . " WHERE Name = '".$name."'";
       
        $result = $this->db->query($mysql_query);
        
        return $result;
    }
    
    function getMailLog()
    {   
        $this->load->database();
       
        $mysql_query = "select * from mail_log;";  
        
        $mysql_result = $this->db->query($mysql_query);
        
        $loggingList = array();
        $value = "";
        
        foreach ($mysql_result->result() as $row)
        {
        $value['Id'] = $row->Id;
        $value['Receiver'] = $row->Receiver;
        $value['RegisterReference'] = $row->RegisterReference;
        $value['Subject'] = $row->Subject;
        $value['Body'] = $row->Body;
        $value['OriginFunction'] = $row->OriginFunction;
        $value['CreatedWhen'] = $row->CreatedWhen;
        $value['Status'] = $row->Status;
        
        array_push($loggingList, $value);
        }
        
        return $loggingList;
    }
    
   function insertMailLog($receiver, $reference, $subject, $body, $originfn, $status)
   {
       $this->load->database();
       
        $insertQuery = "INSERT INTO `mail_log` (`Receiver`,`RegisterReference`, `Subject`, `Body`, `OriginFunction`, `Status`) VALUES ('".$receiver."','".$reference."', '".$subject."', '".$body."', '".$originfn."', '".$status."');";
        
        $result = $this->db->query($insertQuery);
        
        return $result;
   }
   
   function updateMailLog($id, $status)
   {
       $this->load->database();
       
        $updateQuery = "Update `mail_log` Set `Status` = '".$status."' WHERE Id = ".$id.";";
        
        $result = $this->db->query($updateQuery);
        
        return $result;
   } 
}