<?php 
  Class AppModel extends CI_Model 
  { 
    Public function __construct() 
    { 
      parent::__construct(); 
      $this->load->database();
    }
  


  public function login($username,$password)
  {


        $this->db->select('emp_details.*,employee.*');
        $this->db->join('employee','employee.id=emp_details.Eid');
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $res=$this->db->get('emp_details');
        return $res->row_array()['Eid'];
  }

  public function breakcheck($userid,$date,$status)
  {
        $this->db->select('break_track.*,employee.*');
        $this->db->join('employee','employee.id=break_track.Eid');
        $this->db->where('break_track.Eid',$userid);
        $this->db->where('break_track.date',$date);
        $this->db->where('break_track.status',$status);
        $res=$this->db->get('break_track');
        return $res->row_array();
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


}
?>
    