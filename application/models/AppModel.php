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

  public function breakcheck()
  {
        $this->db->select('emp_details.*,employee.*');
        $this->db->join('employee','employee.id=emp_details.Eid');
        $this->db->where('Eid',$userid);
        $this->db->where('date',$date);
        $this->db->where('status',$status);
        $res=$this->db->get('emp_details');
        return $res->row_array()['starttime'];
  }

}
?>
    