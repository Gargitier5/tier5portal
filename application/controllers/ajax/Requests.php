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
		$event_id=$this->input->post('event_id');
		$count=substr_count($event_id, '-');
		
		if ($count!=0) {
			$name='';
			$event='';
			$str_explode=explode("-",$event_id);
			for($k=0;$k<count($str_explode);$k++)
			{
			$tot_info=$this->EmployeeModel->get_event($str_explode[$k]);
			$name.=$tot_info->name.'';
			$event_name=$tot_info->event_informations;
			}
			rtrim($name,' & ');
			echo json_encode(array(
				'status' => 'success',
				'message' => NULL,
				'data' => array(
					'name' => $name,
					'event_informations' => $event_name
				)				
			));
    	/*$str_explode=explode("-",$event_id);
    	$insert_name='';
    	for($i=0;$i<$str_explode;$i++)
    	{
    		$insert_name.=$str_explode[$i];

    	$tot_event=$this->EmployeeModel->get_event($str_explode[$i]);
		if($event =$tot_event){
			$insert_name.= $event->name;
		}


    	}
    	
    		echo json_encode(array(
				'status' => 'success',
				'message' => NULL,
				'data' => array(
					'name' => $insert_name,
					'event_informations' => 'birthday'
				)				
			));*/
		}
		else
		{
		$tot_event=$this->EmployeeModel->get_event($event_id);
		if($event =$tot_event){
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
		}
		die();
	}
}
?>