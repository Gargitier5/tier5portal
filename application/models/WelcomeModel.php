<?php 
  Class WelcomeModel extends CI_Model 
  { 
    
    public function __construct() 
    { 
      parent::__construct(); 
      $this->load->database();
    }

    public function adminlogin($username,$password)
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

    public function emplogin($username,$password)
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
            //if($result1['role']==0)
            //{
             
              //$this->session->set_userdata('e_message','Hi!!! Admin,  you donot have the permission of employee panel');
              //redirect(base_url());
            //}
            //else
            //{
               $this->session->set_userdata('name',$result1['name']);
               $this->session->set_userdata('uid',$result1['Eid']);
               $this->session->set_userdata('role',$result1['role']);
                 $this->session->set_userdata('emp_name',$result1['username']);
              //$this->session->set_userdata('uname',$result['Eid']);
              return $result1;
            //}
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



  }
?>