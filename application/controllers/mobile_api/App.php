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
		else
	    {
	           	$response['status']="error";
	           	$response['messege']="Enter Username And Password";
	           	echo json_encode($response);
	    }
	}




	public function breakcheck()
	{
		$user_id=$this->input->post('userid');
		if($user_id)
		{
			$userid=$user_id;
			$date=date('Y-m-d');
			$status='1';
			$check=$this->AppModel->breakcheck($userid,$date,$status);
			if($check)
            {
		             $data['rank']=$check['type'];
		             $breakduration=$this->AppModel->fetchinfo('break',$data,'row');
		             $default=$breakduration['duration'];
		        
		             $nowtime = new DateTime('now');
		             $diff = $nowtime->diff(new DateTime($check['starttime']));

		             $time_spend = ((($diff->h*60)+$diff->i)*60)+$diff->s;

		           	 $time = explode(':', $default);
		             $default=($time[0]*3600) + ($time[1]*60) + $time[2];

		             if($default >$time_spend)
		             {
		                $remainingtime = $default - $time_spend;
		                $response['data']['count']='in time';
		                $response['status']="success";
		              	$response['messege']="on break";
		             	$response['data']['remainingtime']=$remainingtime;
		             	$response['data']['name']=$check['name'];
		            	$response['data']['break']=$check['type'];

                 	         echo json_encode($response);
                 	         exit;
		              }
		              else
		              {

		              	//$remainingtime = $time_spend - $default;
		              	/*$response['data']['count']='out time';*/
						$user=$user_id;
						$get_details=$this->AppModel->getinfo($user,$date);
						$response['data']['name']=$get_details['name'];
						$response['status']="error";
						$response['messege']="Your time is up";
						echo json_encode($response);
						exit;

		              }
		           	 
		           	

           }
           else
           {
              $data['id']=$user_id;
           	  $get_details=$this->AppModel->fetchinfo('employee',$data,'row');
           	  $response['data']['name']=$get_details['name'];
           	  $response['status']="error";
           	  $response['messege']="Not in break";
           	  echo json_encode($response);
           	  exit;
           }

		}

	}
}

?>
