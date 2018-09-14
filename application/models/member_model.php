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
class member_model extends CI_Model {
    
    function getData()
    {   
        $this->load->database();
       
        return $this->db->query("select * from member");  
    }
 
    function isMember($user, $pass)
    {
        $this->load->database();
        
        $mysql_query = "select * from member where User='".$user."' and Pass='".$pass."'";
        
        $mysql_result = $this->db->query($mysql_query);

        $row_cnt = $mysql_result->num_rows();

            if ($row_cnt >= 1)
            {
                return TRUE;
            }else
            {
                return FALSE;
            }
    }
    
    /*
    function getData()
        {
            //Query the data table for every record and row
            $query = $this->db->get('data');
             
            if ($query->num_rows() > 0)
            {
                //show_error('Database is empty!');
            }else{
                return $query->result();
            }
        }
    */
    
}
