<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('AppModel');
		$this->load->library('session');
    

	}

	public function login()
	{

		$username=$this->input->post('name');
		$password=$this->input->post('password');
		if($username && $password)
		{
           $check=$this->AppModel->login($username,$password);
           if($check)
           {
           	$data['user_id']=$check;
           	$response['status']="success";
           	$response['messege']="Logged In Successfully";
           	$response['data']=$data;

           	echo json_encode($response);

           }
           else
           {
           	$response['status']="error";
           	$response['messege']="Invalied UserId And Password";
           	echo json_encode($response);
           }
           
		}
	}


	public function breakcheck()
	{
		$user=$this->input->post('username');
		if($user)
		{
			$userid=$user;
			$date=date('Y-m-d');
			$status='1';
			$check=$this->AppModel->breakcheck($userid,$date,$status);
			if($check)
           {
       
           	$response['starttime']=$data;

           	echo json_encode($response);

           }
           else
           {
           	$response['status']="error";
           	$response['messege']="Invalied UserId And Password";
           	echo json_encode($response);
           }

		}

	}
}

?>