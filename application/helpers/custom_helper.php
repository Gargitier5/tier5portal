<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


    function breakinfo($breakid,$userid)
    {
		$CI=& get_instance();
        $CI->load->database(); 

        $CI->db->select('*');
        $CI->db->where('type',$breakid);
        $CI->db->where('Eid',$userid);
        $CI->db->where('date',date("Y-m-d"));
        $res = $CI->db->get('break_track');
        $result=$res->row_array();
        $start=$result['starttime'];
        $end=$result['endtime'];
    
        if($start && $end && $result['endtime']!="00:00:00")
        {
             list($hours, $minutes, $seconds) = explode(':', $start);
             $startTimestamp = mktime($hours, $minutes, $seconds);

             list($hours, $minutes, $seconds) = explode(':', $end);
             $endTimestamp = mktime($hours, $minutes, $seconds);

             $seconds = $endTimestamp - $startTimestamp;
             $sec=($seconds % 60);
             if($sec<10)
             {
             $sec="0".$sec;
             }
            $minutes = ($seconds / 60) % 60;
            if($minutes<10)
             {
             $minutes="0".$minutes;
             }
            $hours = floor($seconds / (60 * 60));
            if($hours<10)
             {
             $hours="0".$hours;
             }

           
            $time_taken="$hours:$minutes:$sec";

            print_r($time_taken);

        }
       

    }


    function FnEmployeeName($name)
    {
        $CI=& get_instance();
        $CI->load->database(); 

        $CI->db->select('employee.name');
        $CI->db->join('emp_details','emp_details.Eid=employee.id');
        $CI->db->where('emp_details.username',$name);
        $res=$CI->db->get('employee');
        return $res->row_array();
    }

    function FngetChatHistory($chat_btw)
    {
        $CI=& get_instance();
        $CI->load->database(); 

        $CI->db->select('*');

        $CI->db->where('chat_btwn',$chat_btw);

        //$CI->db->where('sent BETWEEN DATE_SUB(NOW(), INTERVAL 3 DAY) AND NOW()');
        $res=$CI->db->get('chat');
        return $res->result_array();
    }