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

	public function get_event(){
		$this->load->model('EmployeeModel');
		if($event = $this->EmployeeModel->get_event($this->input->post('event_id'))){
			echo json_encode(array(
				'status' => 'success',
				'message' => NULL,
				'data' => array(
					'name' => $event->name,
					'event_informations' => $event->event_informations
				)				
			));
		}else{
			echo json_encode(array(
				'status' => 'error',
				'message' => 'No events found!'						
			));
		}
		die();
	}
}
?>