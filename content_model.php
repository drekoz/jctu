<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class content_model extends CI_Model 
{    
  
    function getSectionListFromPage($page)
    {
        $this->load->database();
        
        $mysql_query = "select Section from content where page='".$page."'";
        
        $mysql_result = $this->db->query($mysql_query);
        
        $sectionList = array();
        
        foreach ($mysql_result->result() as $row)
        {
                array_push($sectionList, $row->Section);
        }
        
        return $sectionList;
    }
    
    function getContentData($page, $section)
    {
        $this->load->database();
        
        $mysql_query = "select * from content where page='".$page."' and section='".$section."'";
        
        $mysql_result = $this->db->query($mysql_query);

        
        
        foreach ($mysql_result->result() as $row)
        {
                $result['page'] = $row->Page;
                $result['section'] = $row->Section;
                $result['orderposition'] = $row->OrderPosition;
                $result['topic'] = urldecode($row->Topic);
                $result['subtopic'] = urldecode($row->SubTopic);
                $result['body'] = urldecode($row->Body);
        }

        return $result;
    }
    
    function getSectionListTableFromPage($page){
        $this->load->database();
        $mysql_query = "select Section,Filename from content_table where page='".$page."'";
        
        $mysql_result = $this->db->query($mysql_query);
        
        $sectionList = array();
        
        foreach ($mysql_result->result() as $row)
        {
                array_push($sectionList, $row->Section);
        }
        
        return $sectionList;
    }
    
    function getTableFilenameData($page, $section)
    {
        $this->load->database();
        
        $mysql_query = "select Filename from content_table where page='".$page."' and section='".$section."'";
        
        $mysql_result = $this->db->query($mysql_query);

        
        foreach ($mysql_result->result() as $row)
        {
                $result['filename'] = $row->Filename;
        }

        return $result;
    }
    
    function updateContentData($data)
    {
        $this->load->database();
        
        $mysql_query = "Update content set topic = '".urlencode($data['topic'])."',subtopic = '".urlencode($data['subtopic'])."',body = '".urlencode($data['body'])."' Where page = '".$data['page']."' and section = '".$data['section']."'";
        
        $result = $this->db->query($mysql_query);
        
        return $result;
    }
    
    function generateDataForContentManage($pagename,$admintype)
    {
        $sectionnamelist = $this->getSectionListFromPage($pagename); 
        foreach ($sectionnamelist as $sectionname)
        {
            $contentdata[$sectionname] = $this->getContentData($pagename,$sectionname);
        }
         
//        $table_sectionnamelist = $this->getSectionListTableFromPage($pagename);
//        foreach ($table_sectionnamelist as $table_sectionname)
//        {
//            $contentdata_table[$table_sectionname] = $this->getTableFilenameData($pagename,$table_sectionname);
//        }
        
        $data['contentpage'] = $pagename;
        $data['contentdata'] = $contentdata;
        //$data['contentdata_table'] = $contentdata_table;
        $data['admintype'] = $admintype;

        return $data;
    }
}


