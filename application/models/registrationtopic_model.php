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
class registrationtopic_model extends CI_Model {
    
    function getData()
    {   
        $this->load->database();
       
        $mysql_query = "select * from registration_topic";  
        
        $mysql_result = $this->db->query($mysql_query);
        
        $topicList = array();
        
        foreach ($mysql_result->result() as $row)
        {
                array_push($topicList, $row->Name);
        }
        
        return $topicList;
    }
 
}
