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

      if($username && $password)
      {
        $this->db->select('emp_details.*,employee.*');
        $this->db->where('username',$username);
        //$this->db->where('password',md5($pass));
        $this->db->where('password',$password);
		    $this->db->join('employee','employee.id=emp_details.Eid');
        $res=$this->db->get('emp_details');
        $result1=$res->row_array();
        if( $result1)
        {
           // $result=$res->num_rows();
            if($result1['role']==0)
            {
             
              return false;
            }
            else
            {
               $this->session->set_userdata('name',$result1['name']);
               $this->session->set_userdata('uid',$result1['Eid']);
               $this->session->set_userdata('role',$result1['role']);
                 $this->session->set_userdata('emp_name',$result1['username']);
              //$this->session->set_userdata('uname',$result['Eid']);
              return $result1;
            }
        }
        else
        {
          $this->session->set_userdata('e_message','Invalid Username or Password');
          redirect(base_url());
        }
      }
      else
      {
          $this->session->set_userdata('e_message','Enter Username And Password');
          redirect(base_url());

      }
    }

     

    public function AllEmployee()
    {
      $this->db->select('*');
      $this->db->join('employee','employee.id=emp_details.Eid');
      $res=$this->db->get('emp_details');
      return $result=$res->result_array();

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

             $letseconds = $endTimestamp - $startTimestamp;
             $sec=($letseconds % 60);
             if($sec<10)
             {
             $sec="0".$sec;
             }
            $minutes = ($letseconds / 60) % 60;
            $hours = floor($letseconds / (60 * 60));

            $data5['Eid']=$data['Eid'];
            $data5['date']=$data['date'];
            $data5['clockin']=$data['clockin'];
            $data5['clockin_late']='1';
            $data5['late_time']="$hours:$minutes:$sec";

            $result=$this->db->insert('attendance',$data5);
            if($result)
            {
                 if($letseconds<=7200)
                 {
                    $start_date=date("Y-m-d", strtotime(date('m').'/01/'.date('Y')));
                    $end_date=date("Y-m-d");

                     $this->db->select('*');
                     $this->db->where('Eid',$data['Eid']);
                     $this->db->where('last_update BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
                     $res = $this->db->get('point_history');
                     $point=$res->row_array();
                     $new['points']=$point['points']-250;
                     $new['last_update']=date("Y-m-d");
                     $con['P_id']=$point['P_id'];
                     $this->db->where($con);
                     $res=$this->db->update('point_history',$new);
                     return $this->db->affected_rows();

                     
                 }
                 else if($letseconds>=7200 && $letseconds<=14400)
                 {
                    $start_date=date("Y-m-d", strtotime(date('m').'/01/'.date('Y')));
                    $end_date=date("Y-m-d");

                     $this->db->select('*');
                     $this->db->where('Eid',$data['Eid']);
                     $this->db->where('last_update BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
                     $res = $this->db->get('point_history');
                     $point=$res->row_array();
                     $new['points']=$point['points']-500;
                     $con['P_id']=$point['P_id'];
                     $this->db->where($con);
                     $res=$this->db->update('point_history',$new);
                     return $this->db->affected_rows();
                 }
                 else
                 {
                      $start_date=date("Y-m-d", strtotime(date('m').'/01/'.date('Y')));
                      $end_date=date("Y-m-d");

                     $this->db->select('*');
                     $this->db->where('Eid',$data['Eid']);
                     $this->db->where('last_update BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
                     $res = $this->db->get('point_history');
                     $point=$res->row_array();
                     $new['points']=$point['points']-1000;
                     $con['P_id']=$point['P_id'];
                     $this->db->where($con);
                     $res=$this->db->update('point_history',$new);
                     return $this->db->affected_rows();
                 }
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

              $letseconds = $endTimestamp - $startTimestamp;
              $sec=($letseconds % 60);
               if($sec<10)
               {
               $sec="0".$sec;
               }
              $minutes = ($letseconds / 60) % 60;
              $hours = floor($letseconds / (60 * 60));

               $con['Eid'] = $data['Eid'];
               $con['date'] = $data['date'];
               $data4['clockout']=$data['clockout'];
               $data4['clockout_early']='1';
               $data4['early_time']="$hours:$minutes:$sec";

               $this->db->where($con);
               $res=$this->db->update('attendance',$data4);
               if($res)
               {
                if($letseconds<=7200)
                 {
                    $start_date=date("Y-m-d", strtotime(date('m').'/01/'.date('Y')));
                    $end_date=date("Y-m-d");

                     $this->db->select('*');
                     $this->db->where('Eid',$data['Eid']);
                     $this->db->where('last_update BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
                     $res = $this->db->get('point_history');
                     $point=$res->row_array();
                     $new['points']=$point['points']-250;
                     $con1['P_id']=$point['P_id'];
                     $this->db->where($con1);
                     $res=$this->db->update('point_history',$new);
                     return $this->db->affected_rows();

                     
                 }
                 else if($letseconds>=7200 && $letseconds<=14400)
                 {
                    $start_date=date("Y-m-d", strtotime(date('m').'/01/'.date('Y')));
                    $end_date=date("Y-m-d");

                     $this->db->select('*');
                     $this->db->where('Eid',$data['Eid']);
                     $this->db->where('last_update BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
                     $res = $this->db->get('point_history');
                     $point=$res->row_array();
                     $new1['points']=$point['points']-500;

                     $con1['P_id']=$point['P_id'];
                     $this->db->where($con1);
                     $res=$this->db->update('point_history',$new1);
                     return $this->db->affected_rows();
                 }
                 else
                 {
                      $start_date=date("Y-m-d", strtotime(date('m').'/01/'.date('Y')));
                      $end_date=date("Y-m-d");

                     $this->db->select('*');
                     $this->db->where('Eid',$data['Eid']);
                     $this->db->where('last_update BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
                     $res = $this->db->get('point_history');
                     $point=$res->row_array();
                     $new['points']=$point['points']-1000;
                     $con1['P_id']=$point['P_id'];
                     $this->db->where($con1);
                     $res=$this->db->update('point_history',$new);
                     return $this->db->affected_rows();
                 }
               }
               
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

    public function getmode($data)
    {

       $this->db->select('*');
       $this->db->where('Eid',$data['Eid']);
       $this->db->where('date',$data['date']);
       $this->db->order_by('emp_p_id','DESC');
       $this->db->limit(1);
       $res = $this->db->get('tbl_employee_productivity');
       return  $result=$res->row_array();

    }
    public function ins_activity($data)
    {
      $result=$this->db->insert('bdm_activity',$data);
      if($result)
      {
        return true;
      }
      else
      {
         return false;
      }
    }
    public function getpoint($userid,$start_date,$end_date)
    {
      
      $this->db->select('*');
      $this->db->where('Eid',$userid);
      $this->db->where('last_update BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
      $res = $this->db->get('point_history');
      return $res->row_array();
    }

    public function placedorder($userid,$end_date)
    {
    
         $this->db->select('lunchorder.*,employee.name');
         $this->db->join('employee',"lunchorder.Eid=employee.id");
         $this->db->where('Eid',$userid);
         $this->db->where('date',$end_date);
         $res=$this->db->get('lunchorder');
         return $res->row_array();
    }
    
    public function delete($con,$tbl)
    {
        $this->db->where($con);
        $this->db->delete($tbl);
        return $this->db->affected_rows(); 
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
     $data1['status']='1';

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
           return $this->db->last_insert_id;
        }
        else
        {
        return false;
        }
      }
    }
    public function stopactiv($data)
    {
       $con['Eid']=$data['Eid'];
       $con['date']=$data['date'];
       $con['status']='1';
       
       $data['endTime']=date('H:i:s');
       $data['status']='1';

       $this->db->where($con);
       $res=$this->db->update('tbl_employee_productivity',$data);

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


    public function productivity($data)
    {
      $result=$this->db->insert('tbl_employee_productivity',$data);
      if($result)
      {
        return true;
      }
      else
      {
        return false;
      }

    }

    public function end($table,$con,$data)
    {
             $this->db->where($con);
             $res=$this->db->update('tbl_employee_productivity',$data);
             return $res;
    }


    public function bdm_activity($con1)
    {
       $this->db->select('*');
       $this->db->where('Eid',$con1);
       $this->db->order_by('b_ac_id','DESC');
       $res=$this->db->get('bdm_activity');
       return $res->result_array();
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
              

              $letseconds = $time_taken_sec - $default_time_sec;
              $sec=($letseconds % 60);
               if($sec<10)
               {
               $sec="0".$sec;
               }
              $minutes = ($letseconds / 60) % 60;
              $hours = floor($letseconds / (60 * 60));

              $extra_taken="$hours:$minutes:$sec";
         
          if($time_taken_sec>$default_time_sec)
          {
             
              $nwdata['endtime']=$data['endtime'];
              $nwdata['action']='1';
              $nwdata['time']=$extra_taken;
              $nwdata['status']='0';
             $this->db->where($data2);
             $res=$this->db->update('break_track',$nwdata);
             if($res)
             {

                  if($letseconds<=7200)
                 {
                    $start_date=date("Y-m-d", strtotime(date('m').'/01/'.date('Y')));
                    $end_date=date("Y-m-d");

                     $this->db->select('*');
                     $this->db->where('Eid',$data['Eid']);
                     $this->db->where('last_update BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
                     $res = $this->db->get('point_history');
                     $point=$res->row_array();
                     $new['points']=$point['points']-250;
                     $con['P_id']=$point['P_id'];
                     $this->db->where($con);
                     $res=$this->db->update('point_history',$new);
                     return $this->db->affected_rows();

                     
                 }
                 else if($letseconds>=7200 && $letseconds<=14400)
                 {
                    $start_date=date("Y-m-d", strtotime(date('m').'/01/'.date('Y')));
                    $end_date=date("Y-m-d");

                     $this->db->select('*');
                     $this->db->where('Eid',$data['Eid']);
                     $this->db->where('last_update BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
                     $res = $this->db->get('point_history');
                     $point=$res->row_array();
                     $new['points']=$point['points']-500;
                     $con['P_id']=$point['P_id'];
                     $this->db->where($con);
                     $res=$this->db->update('point_history',$new);
                     return $this->db->affected_rows();
                 }
                 else
                 {
                      $start_date=date("Y-m-d", strtotime(date('m').'/01/'.date('Y')));
                      $end_date=date("Y-m-d");

                     $this->db->select('*');
                     $this->db->where('Eid',$data['Eid']);
                     $this->db->where('last_update BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
                     $res = $this->db->get('point_history');
                     $point=$res->row_array();
                     $new['points']=$point['points']-1000;
                     $con['P_id']=$point['P_id'];
                     $this->db->where($con);
                     $res=$this->db->update('point_history',$new);
                     return $this->db->affected_rows();
                 }





             }
          }
          else
          {
             $nwdata['endtime']=$data['endtime'];
             $nwdata['status']='0';
             $this->db->where($data2);
             $res=$this->db->update('break_track',$nwdata);
             return $this->db->affected_rows();
          }
    }

  }

  ?>
