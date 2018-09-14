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
class banner_model extends CI_Model {
    
    function getData($page)
    {   
        $this->load->database();
       
        $mysql_result = $this->db->query("select * from banner where Page='".$page."' order by Ordering Asc");  
        
        $bannerList = array();
        
        foreach ($mysql_result->result() as $row)
        {
                array_push($bannerList, $row->Filename);
        }
        
        return $bannerList;
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
    
    
}
