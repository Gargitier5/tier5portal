<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('WelcomeModel');
		$this->load->helper('custom');
		$this->load->library('session');
	}

	public function index()
	{

		if($this->session->userdata('adminid'))
	    {
	        redirect(base_url().'admin_control/Admin');
	    }
	    else if($this->session->userdata('uid'))
		{
		    redirect(base_url().'employee_control/Employee');
		}
		else
	    {
			$this->load->view('welcome');
		} 
		
	}

	public function adminlogin()
	{
		if($_POST)
        {
          $username=$this->input->post('adminid');
          $password=$this->input->post('adminpass');
         
           if($username && $password)
           {         
		        $check=$this->WelcomeModel->adminlogin($username,$password);
		        if($check)
		        {
			          if ($this->session->userdata('adminid'))
			          {
			              
			           redirect(base_url().'admin_control/admin'); 
			          }
			          else
			          {
			             redirect(base_url());
			             $this->session->set_userdata('e_message','Try Again!');

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
	    else
	    {
	    	 redirect(base_url());
	    }
    }

    public function emplogin()
    {
    	//echo "login";

    	if($_POST)
        {
		     $username=$this->input->post('empid');
		     $password=$this->input->post('emppass');
		     if($username && $password)
             {            
		        $check=$this->WelcomeModel->emplogin($username,$password);
			    if($check)
			    {
			        if ($this->session->userdata('uid'))
			        {
			        	$_SESSION['username'] = $this->session->userdata('uid');
                        redirect(base_url().'employee_control/employee'); 
			        }
			        else
			        {
			            redirect(base_url());
			        }
		        }
		        else
			    {
			    	redirect(base_url());
			    }
		     }
		     else
		     {
		    	 redirect(base_url());
		     }
		}
		else
	    {
	    	 redirect(base_url());
	    }

    }
}
?>