<?php 
  Class AdminModel extends CI_Model 
  { 
    
    Public function __construct() 
    { 
      parent::__construct(); 
      $this->load->database();
    } 

     Public function login($username,$password)
    {
        $this->db->select('*');
        $this->db->where('username',$username);
        //$this->db->where('password',md5($pass));
        $this->db->where('password',$password);
        $res=$this->db->get('emp_details');
        $result1=$res->row_array();
        if($result1['role']==0)
        {
           $this->session->set_userdata('adminid',$result1['Eid']);
           $this->session->set_userdata('role',$result1['role']);
           $this->session->set_userdata('admin_user',$result1['username']);
           return $result1;

        }
        else if ($result1['role']==1)
        {
           $this->session->set_userdata('adminid',$result1['Eid']);
           $this->session->set_userdata('role',$result1['role']);
            $this->session->set_userdata('admin_user',$result1['username']);
           return $result1;
        }
        else
        {
          return false;
        }
    }

    public function getactivity($con)
    {

       $this->db->select('bdm_activity.*,bdm_url.url,employee.name');
       $this->db->join('employee','bdm_activity.Eid=employee.id');
       $this->db->join('bdm_url','bdm_activity.main_url=bdm_url.burl_id');
       $this->db->where('bdm_activity.date',$con);
       $this->db->order_by('b_ac_id','DESC');
       $res=$this->db->get('bdm_activity');
       return $res->result_array();
    }


    public function get_bdm()
    {
      $this->db->select('*');
      $this->db->join('employee','employee.id=emp_details.Eid');
      $this->db->where('emp_details.role',3);
      $res=$this->db->get('emp_details');
      return $result=$res->result_array();
    }
     public function AllEmployee()
    {
      $this->db->select('*');
      $this->db->join('employee','employee.id=emp_details.Eid');
      $this->db->where('employee.activation_status',0);
      $res=$this->db->get('emp_details');
      return $result=$res->result_array();

    }
    Public function fnallemp()
    {
    	  $this->db->select('*');
        
        $res=$this->db->get('employee');
        return $res->result_array();
    }

    public function FnChatHistory()
    {
        $this->db->select('*');
        
        $this->db->order_by('id',"desc");
        $res=$this->db->get('chat');
        return $res->result_array();
    }
    
    public function allnotice()
    {
        $this->db->select('*');
         $this->db->order_by('n_id','DESC');
        $res=$this->db->get('notice_board');
        return $res->result_array();
    }

    public function logactivity()
    {
         $this->db->select('log_book.*,employee.name');
         $this->db->join('employee',"log_book.Eid=employee.id");
         $this->db->order_by('log_id','DESC');
         $res=$this->db->get('log_book');
         return $res->result_array();
    }
    

    public function fnallpoint($start_date,$end_date)
    {

       $this->db->select('point_history.*,employee.name');
       $this->db->join('employee',"point_history.Eid=employee.id");
       $this->db->where('last_update >=', $start_date);
       $this->db->where('last_update <=', $end_date);
       $res = $this->db->get('point_history');
       return $res->result_array();
    }
    
    public function FnAllorder($data)
           {
            

            $this->db->select('lunchorder.*,employee.name');
            if($data['date']=='')
            {
            $this->db->where('date',date('Y-m-d'));
            }
            else
            {
               $this->db->where('date',date('Y-m-d',strtotime($data['date'])));
            }
          //  $this->db->where('ord_emp',$data['ord_emp']);
            $this->db->where('status',$data['status']);
            $this->db->join('employee','employee.id=lunchorder.Eid');
            $res=$this->db->get('lunchorder');
           return $res->result_array();
           }
    public function selectprint($data)
          {
             $this->db->select('lunchorder.*,employee.name');
             //$result= $this->db->get_where('lunchorder',$data);
             //return $result->row_array();
             //return $data;
             $this->db->where('Liid',$data);
             $this->db->join('employee','employee.id=lunchorder.Eid');
             $res=$this->db->get('lunchorder');
             return $res->result_array();

          }
    public function fnallpointexp($start_date,$end_date)
    {
       $this->db->select('point_history.*,employee.name');
       $this->db->join('employee',"point_history.Eid=employee.id");
       $this->db->where('last_update >=', $start_date);
       $this->db->where('last_update <=', $end_date);
       $this->db->where('point_history.points>=', 3000);
       $res = $this->db->get('point_history');
       return $res->result_array();
    }
    public function showempofmonth()
    {   



      $this->db->select('emp_of_month.*,employee.name');
      $this->db->join('employee',"emp_of_month.Eid=employee.id");

        //$this->db->select('*');
        $this->db->order_by('emp_of_id','DESC');
        $res=$this->db->get('emp_of_month');
        return $res->result_array();
    }

    public function showemp()
    {

      $this->db->select('emp_details.*,employee.name');
      $this->db->join('emp_details',"emp_details.Eid=employee.id");
      $this->db->where('employee.activation_status',0);
      $res=$this->db->get('employee');
      
        return $res->result_array();
    }
    
    public function shownoemp()
    { 
      $this->db->select('*');
       $this->db->where('activation_status',2);
      $res=$this->db->get('employee');
        return $res->result_array();

    }
    public function showallemp()
    {
      $this->db->select('*');
       $this->db->where('activation_status',0);
      $res=$this->db->get('employee');
        return $res->result_array();
    }

    public function update($tbl,$con,$data)
    {
        $this->db->where($con);
        $res=$this->db->update($tbl,$data);
        return $this->db->affected_rows();
    }

    public function showallbreak()
    {  
        $this->db->select('*');
        $res=$this->db->get('break');
        return $res->result_array();

    }

    public function insert($tbl,$data)
    {
        $this->db->insert($tbl,$data);
        return $this->db->insert_id();
    }

    public function delete($con,$tbl)
    {
        $this->db->where($con);
        $this->db->delete($tbl);
        return $this->db->affected_rows(); 
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

      public function lunchinfo($con)
      { 
        $this->db->select('lunchorder.*,employee.name');
        $this->db->join('employee',"lunchorder.Eid=employee.id");
        $this->db->where('lunchorder.date',$con);
        $res=$this->db->get('lunchorder');
        
        return $res->result_array();

      }

      public function alltime()
      {
        $this->db->select('*');
        $res=$this->db->get('clockintime');
        return $res->result_array();
      }


         public function fetchallemployee()
          {

          $this->db->select('*');
        
          $res=$this->db->get('employee');
          return $res->result_array();

          }

          public function allordercost($shop_id,$start_date,$end_date)
      {
 
        $cost_per_shop="";
        
        $this->db->select('cost');
        $this->db->where('shop_id',$shop_id);
        //$this->db->where('status',0);
        $this->db->where('date BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
        $res = $this->db->get('lunchorder');
         $return = $res->result_array();
      
        foreach ($return as $value) 
        {
           $cost_per_shop=$cost_per_shop+$value['cost'];
        
        
        }
        return $cost_per_shop; 
      }
      

      public function emp_lunch_bonus($user_id,$start_date,$end_date)
      {
      //return $user_id;
      
      //$start_date=date("m/d/Y", strtotime(date('m').'/01/'.date('Y')));
      //$end_date=date("Y-m-d");

        $this->db->select('Lunch_bonus');
        $this->db->where('Eid',$user_id);
        $this->db->where('last_update BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
        $res = $this->db->get('lunch_bonus');
        return $res->row('Lunch_bonus');
      }


       
      public function showevent()
      {


        $this->db->select('tbl_event_informations.*,employee.name');
        $this->db->join('employee',"tbl_event_informations.Eid=employee.id");
        //$this->db->where('lunchorder.date',$con);
        $res=$this->db->get('tbl_event_informations');
        $res->result_array();
        
        return $res->result_array();
      }
       
      public function getholiday($con)
      {
        $this->db->select('*');
        $this->db->order_by('date','ASC');
        $this->db->where("DATE_FORMAT(date,'%Y')", $con );
        $res=$this->db->get('holiday');
        return $res->result_array();
      }
      
      public function fetchallspc($con)
      {
        $this->db->select('specialholiday.*,employee.name');
        $this->db->join('employee',"specialholiday.Eid=employee.id");
        $this->db->order_by('date','DESC');
        $this->db->where("DATE_FORMAT(date,'%Y')", $con );
        $res=$this->db->get('specialholiday');
        return $res->result_array();
      }
    public function empclock($con)
    {

      $this->db->select('attendance.*,employee.name');
      $this->db->join('employee',"attendance.Eid=employee.id");
      $this->db->where('attendance.date',$con);
      $res=$this->db->get('attendance');
      
      return $res->result_array();
    }

     public function firstbreak($con)
    {

      $this->db->select('break_track.*,employee.name');
      $this->db->join('employee',"break_track.Eid=employee.id");
      $this->db->where('break_track.date',$con);
      $this->db->where('break_track.type',1);
       $this->db->where('break_track.status',0);
      $res=$this->db->get('break_track');
      
      return $res->result_array();
    }

    public function onfirstbreak($con)
    {

      $this->db->select('break_track.*,employee.name');
      $this->db->join('employee',"break_track.Eid=employee.id");
      $this->db->where('break_track.date',$con);
      $this->db->where('break_track.type',1);
      $this->db->where('break_track.status',1);
      $res=$this->db->get('break_track');
      
      return $res->result_array();
    }

     public function secondbreak($con)
    {

      $this->db->select('break_track.*,employee.name');
      $this->db->join('employee',"break_track.Eid=employee.id");
      $this->db->where('break_track.date',$con);
      $this->db->where('break_track.type',2);
      $res=$this->db->get('break_track');
      
      return $res->result_array();
    }

    public function onsecondbreak($con)
    {

      $this->db->select('break_track.*,employee.name');
      $this->db->join('employee',"break_track.Eid=employee.id");
      $this->db->where('break_track.date',$con);
      $this->db->where('break_track.type',2);
      $this->db->where('break_track.status',1);
      $res=$this->db->get('break_track');
      
      return $res->result_array();
    }
     
    public function thirdbreak($con)
    {

      $this->db->select('break_track.*,employee.name');
      $this->db->join('employee',"break_track.Eid=employee.id");
      $this->db->where('break_track.date',$con);
      $this->db->where('break_track.type',3);
      $res=$this->db->get('break_track');
      
      return $res->result_array();
    }
    public function onthirdbreak($con)
    {

      $this->db->select('break_track.*,employee.name');
      $this->db->join('employee',"break_track.Eid=employee.id");
      $this->db->where('break_track.date',$con);
      $this->db->where('break_track.type',3);
      $this->db->where('break_track.status',1);
      $res=$this->db->get('break_track');
      
      return $res->result_array();
    }
    public function emplateclockin($con)
    {
      $this->db->select('attendance.*,employee.name');
      $this->db->join('employee',"attendance.Eid=employee.id");
      $this->db->where('attendance.date',$con);
      $this->db->where('attendance.clockin_late',1);
      $res=$this->db->get('attendance');
      
      return $res->result_array();

    }

    public function empearlyclockout($con)
    {
       $this->db->select('attendance.*,employee.name');
      $this->db->join('employee',"attendance.Eid=employee.id");
      $this->db->where('attendance.date',$con);
      $this->db->where('attendance.clockout_early',1);
      $res=$this->db->get('attendance');
      
      return $res->result_array();
    }

    public function emplatebrk($con)
    {
       $this->db->select('break_track.*,employee.name');
      $this->db->join('employee',"break_track.Eid=employee.id");
      $this->db->where('break_track.date',$con);
      $this->db->where('break_track.action',1);
      $res=$this->db->get('break_track');
      
      return $res->result_array();
    }

    public function empabsent($con)
    {
      $this->db->select('tbl_late_emp.*,employee.name');
      $this->db->join('employee',"tbl_late_emp.Eid=employee.id");
      $this->db->where('tbl_late_emp.date',$con);
      $res=$this->db->get('tbl_late_emp');
      return $res->result_array();
    }




  } 
?> 