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
            $hours = floor($seconds / (60 * 60));

           
            $time_taken="$hours:$minutes:$sec";

            print_r($time_taken);

        }
       

    }