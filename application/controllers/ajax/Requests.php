<?php
class Requests extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function booking_calendar(){
	    $this->load->library('villa_booking_calendar');
	    echo $this->villa_booking_calendar->render_booking_calendar($this->input->post('year'), $this->input->post('month'));
	    die();
	}	
}
?>