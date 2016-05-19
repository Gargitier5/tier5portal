<?php 
  Class EmployeeModel extends CI_Model 
  { 
    Public function __construct() 
    { 
      parent::__construct(); 
      $this->load->database();
    }


    public function login($username,$password)
    {


        $this->db->select('*');
        $this->db->where('username',$username);
        //$this->db->where('password',md5($pass));
        $this->db->where('password',$password);

        $res=$this->db->get('emp_details');
        $result1=$res->row_array();
        $result=$res->num_rows();
        if($result)
        {
         
          $this->session->set_userdata('uid',$result1['Eid']);
          //$this->session->set_userdata('uname',$result['Eid']);
          return $result;
        }
        else
        {
           return false;
        }
    } 


    public function clockintime($data)
    {
        $data2['Eid'] = $data['Eid'];
        $data2['date'] = $data['date'];
        $a = $this->db->get_where('attendance',$data2);
        $attendence_check=$a->num_rows();
        if($attendence_check>0)
        { 
         // $this->session->set_userdata('warning',"You are Already Clocked In Today");
          return false;
        }
        else
        {
          $data3['Action'] ='Clock In';
          $setclockin=$this->db->get_where('clockintime',$data3);
          $result=$setclockin->row_array();

          if($result['Time']>$data['clockin'])
          {
           //echo "It Is On Time";
            $result=$this->db->insert('attendance',$data);
            if($result)
            {
               return true;
            }
            else
            {
                return false;
            }
          }
          else
          {

             $time1 = $result['Time'];
             $time2 = $data['clockin'];

             list($hours, $minutes, $seconds) = explode(':', $time1);
             $startTimestamp = mktime($hours, $minutes, $seconds);

             list($hours, $minutes, $seconds) = explode(':', $time2);
             $endTimestamp = mktime($hours, $minutes, $seconds);

             $seconds = $endTimestamp - $startTimestamp;
             $sec=($seconds % 60);
             if($sec<10)
             {
             $sec="0".$sec;
             }
            $minutes = ($seconds / 60) % 60;
            $hours = floor($seconds / (60 * 60));

            $data5['Eid']=$data['Eid'];
            $data5['date']=$data['date'];
            $data5['clockin']=$data['clockin'];
            $data5['clockin_late']='1';
            $data5['late_time']="$hours:$minutes:$sec";



            $result=$this->db->insert('attendance',$data5);
            if($result)
            {
               return true;
            }
            else
            {
                return false;
            }
          }


        }

  }

    public function clockouttime($data)
    {
        $data2['Eid'] = $data['Eid'];
        $data2['date'] = $data['date'];
        $a = $this->db->get_where('attendance',$data2);
        $attendence_check=$a->num_rows();
        if($attendence_check>0)
        { 
           $data3['Action'] ='Clock Out';
           $setclockin=$this->db->get_where('clockintime',$data3);
           $result=$setclockin->row_array();
           if($result['Time']>$data['clockout'])
           {
              //echo "You Are Early" ;
              $time1 = $data['clockout'];
              $time2 = $result['Time'];

              list($hours, $minutes, $seconds) = explode(':', $time1);
              $startTimestamp = mktime($hours, $minutes, $seconds);
 
              list($hours, $minutes, $seconds) = explode(':', $time2);
              $endTimestamp = mktime($hours, $minutes, $seconds);

              $seconds = $endTimestamp - $startTimestamp;
              $sec=($seconds % 60);
               if($sec<10)
               {
               $sec="0".$sec;
               }
              $minutes = ($seconds / 60) % 60;
              $hours = floor($seconds / (60 * 60));

               $con['Eid'] = $data['Eid'];
               $con['date'] = $data['date'];
               $data4['clockout']=$data['clockout'];
               $data4['clockout_early']='1';
               $data4['early_time']="$hours:$minutes:$sec";

               $this->db->where($con);
               $res=$this->db->update('attendance',$data4);
               return $this->db->affected_rows();
           }
           else
           {

               $con['Eid'] = $data['Eid'];
               $con['date'] = $data['date'];
               $data4['clockout']=$data['clockout'];

               $this->db->where($con);
               $res=$this->db->update('attendance',$data4);
               return $this->db->affected_rows();

           }


        }
        else
        {
          return false;
        }
      
    }


    public function getempofmonth()
    {
       $this->db->select('emp_of_month.*,employee.name');
      $this->db->join('employee',"emp_of_month.Eid=employee.id");
            $this->db->order_by('emp_of_id','DESC');
       $this->db->limit(1);
       $res = $this->db->get('emp_of_month');
      return  $result=$res->row_array();
    }


    public function fetchinfo($tbl,$con,$type)
    {
        $this->db->select('*');
        if($con)
        {
        $this->db->where($con);
        }
        $res=$this->db->get($tbl);
        if($type=="row")
        {
        return  $result=$res->row_array();
        }
         if($type=="count")
        {
        return  $result=$res->num_rows();
        }
         if($type=="result")
        {
        return  $result=$res->result_array();
        }
    }

    public function getbreak()
    {
         $this->db->select('*');
         $this->db->where('status',0);
         $this->db->order_by('rank','ASC');
         $res=$this->db->get('break');
         return  $result=$res->result_array();
    }


    public function update($tbl,$con,$data)
    {
        $this->db->where($con);
        $res=$this->db->update($tbl,$data);
        return $this->db->affected_rows();
    }

    public function getnotice()
    {
      $this->db->select('*');
      $this->db->where('status',0);
      $this->db->limit(10);
      $this->db->order_by('n_id','DESC');
      $res = $this->db->get('notice_board');
      return $res->result_array();
    
    }

    public function getpoint($userid,$start_date,$end_date)
    {
      
      $this->db->select('*');
      $this->db->where('Eid',$userid);
      $this->db->where('last_update BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
      $res = $this->db->get('point_history');
      return $res->row_array();
    }

    public function getlunch_bonus($userid,$start_date,$end_date)
    {
      
      $this->db->select('*');
      $this->db->where('Eid',$userid);
      $this->db->where('last_update BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
      $res = $this->db->get('lunch_bonus');
      return $res->row_array();
    }

    public function startbreak($data)
    {
     
     $data1['Eid']=$data['Eid'];
     $data1['date']=$data['date'];
     $data1['type']=$data['type'];


      $this->db->select('*');
      $this->db->where($data1);
      $res=$this->db->get('break_track');
      $result=$res->num_rows();
      if($result>0)
      {
        
        return false;
      }
      else
      {
        $result=$this->db->insert('break_track',$data);
        
        if($result)
        {
           echo '1';
        }
        else
        {
        return false;
        }
      }
    }

    public function submitlunchorder($data)
    {
      $data1['Eid']=$data['Eid'];
      $data1['date']=$data['date'];
      $this->db->select('*');
      $this->db->where($data1);
      $res=$this->db->get('lunchorder');
      $result=$res->num_rows();
      if($result>0)
      {
         echo "You Have Already Submitted Your Lunch Order";
      }
      else
      {
        $result1=$this->db->insert('lunchorder',$data);
        if($result1)
        {
             echo "Lunch Order Placed Successfully";
        }
        else
        {
             echo "Try Again";
        }
      }
        
    }

    public function endbreak($data)
    {
       $data1['rank']=$data['type'];
       $break_end=$this->db->get_where('break',$data1);
       $default_time=$break_end->row_array();
       //print_r($default_time['duration']) ;
       
       $data2['Eid']=$data['Eid'];
       $data2['date']=$data['date'];
       $data2['type']=$data['type'];

       $break_end=$this->db->get_where('break_track',$data2);
       $result1=$break_end->row_array();

       $start_time=$result1['starttime'];
       $end_time=$data['endtime'];

              list($hours, $minutes, $seconds) = explode(':', $start_time);
              $startTimestamp = mktime($hours, $minutes, $seconds);
 
              list($hours, $minutes, $seconds) = explode(':', $end_time);
              $endTimestamp = mktime($hours, $minutes, $seconds);

              $seconds = $endTimestamp - $startTimestamp;
              $sec=($seconds % 60);
               if($sec<10)
               {
               $sec="0".$sec;
               }
              $minutes = ($seconds / 60) % 60;
              $hours = floor($seconds / (60 * 60));

              $totaltime_taken="$hours:$minutes:$sec";


              
              list($hours, $minutes, $seconds) = explode(':', $totaltime_taken);
              $time_taken_sec= mktime($hours, $minutes, $seconds);

              list($hours, $minutes, $seconds) = explode(':', $default_time['duration']);
              $default_time_sec= mktime($hours, $minutes, $seconds);
              

              $seconds = $time_taken_sec - $default_time_sec;
              $sec=($seconds % 60);
               if($sec<10)
               {
               $sec="0".$sec;
               }
              $minutes = ($seconds / 60) % 60;
              $hours = floor($seconds / (60 * 60));

              $extra_taken="$hours:$minutes:$sec";
         
          if($time_taken_sec>$default_time_sec)
          {
             
              $nwdata['endtime']=$data['endtime'];
              $nwdata['action']='1';
              $nwdata['time']=$extra_taken;
            
             $this->db->where($data2);
             $res=$this->db->update('break_track',$nwdata);
             return $this->db->affected_rows();
          }
          else
          {
             $nwdata['endtime']=$data['endtime'];
             $this->db->where($data2);
             $res=$this->db->update('break_track',$nwdata);
             return $this->db->affected_rows();
          }
    }

  }

  ?>