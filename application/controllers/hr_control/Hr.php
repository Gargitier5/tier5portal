<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hr extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('HrModel');
		//$this->load->helper('custom');
		//$this->load->library('session');


		if (!$this->session->userdata('adminid'))
		{
			redirect("Welcome");
			exit(0);
		}
	}


	public function index()
	{

		if ($this->session->userdata('adminid'))
		{
			
		}
		
		else
		{
			redirect("Welcome");
			exit(0);
		}
		
	}

 

}
?>