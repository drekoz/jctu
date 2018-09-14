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
class config_model extends CI_Model {
    
    function setData($name,$value)
    {
        $this->load->database();
        
        $mysql_query = "UPDATE config "
                . " SET Value = '".$value."'"
                . " WHERE Name = '".$name."'";
       
        $result = $this->db->query($mysql_query);
        
        return $result;
    }
    
    function getData($name)
    {   
        $this->load->database();
       
        $mysql_query = "select * from config where Name = '".$name."';";  
        
        $mysql_result = $this->db->query($mysql_query);
        
        $value = "";
        
        foreach ($mysql_result->result() as $row)
        {
        $value = $row->Value;
        }
        
        return $value;
    }
    
    function getRegistrationFeeByRegistrationType($regType)
    {
        $this->load->database();
       
        $mysql_query = "select * from registration_type where Id = '".$regType."';";  
        
        $mysql_result = $this->db->query($mysql_query);
        
        $value = "";
        
        foreach ($mysql_result->result() as $row)
        {
        $value = $row->fee;
        }
        
        return $value;
    }
    
    function isEarlyBird()
    {
         $earlyBirdDate = $this->getData('early_bird_date');
            if((int)date('Ymd') <= (int)$earlyBirdDate)
            {
                return true;
            }else
            {
                return false;
            }
            
    }
 
}
