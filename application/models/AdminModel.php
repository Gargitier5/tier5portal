<?php 
  Class AdminModel extends CI_Model 
  { 
    
    Public function __construct() 
    { 
      parent::__construct(); 
      $this->load->database();
    } 

     Public function login($username,$password,$type)
    {
        $this->db->select('*');
        $this->db->where('username',$username);
        //$this->db->where('password',md5($pass));
        $this->db->where('password',$password);
        $this->db->where('type',$type);
        $res=$this->db->get('admin');
        $result1=$res->row_array();
        $result=$res->num_rows();
        if($result)
        {
         
          $this->session->set_userdata('adminid',$result1['aid']);
          //$this->session->set_userdata('uname',$result['Eid']);
          return $result;
        }
        else
        {
           return false;
        }
    }

    Public function fnallemp()
    {
    	  $this->db->select('*');
        
        $res=$this->db->get('employee');
        return $res->result_array();
    }
    
    public function allnotice()
    {
        $this->db->select('*');
         $this->db->order_by('n_id','DESC');
        $res=$this->db->get('notice_board');
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
        $res->result_array();
        
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
     
    public function thirdbreak($con)
    {

      $this->db->select('break_track.*,employee.name');
      $this->db->join('employee',"break_track.Eid=employee.id");
      $this->db->where('break_track.date',$con);
      $this->db->where('break_track.type',3);
      $res=$this->db->get('break_track');
      
      return $res->result_array();
    }


  } 
?> 