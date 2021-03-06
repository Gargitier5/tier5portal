<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('EmployeeModel');
		$this->load->helper('custom');
		$this->load->library('session');
	}



    public function index()
    {  
        $username=$this->input->post('empid');
        $password=$this->input->post('emppass');
               
        $check=$this->EmployeeModel->login($username,$password);

   
         if ($this->session->userdata('uid'))
          {

         

              $con['parent_id']=0;
              $con['status']=0;
              $userid['id']=$this->session->userdata('uid');
              $data['emp_details']=$this->EmployeeModel->fetchinfo('employee',$userid,'row');
              $data['allshop']=$this->EmployeeModel->fetchinfo('items',$con,'result');
              $clockin['Eid']=$this->session->userdata('uid');
              $clockin['date']=date("Y-m-d");
              $data['clockintime']=$this->EmployeeModel->fetchinfo('attendance',$clockin,'row');
              $data['allbreak']=$this->EmployeeModel->getbreak();
              $start_date=date("Y-m-d", strtotime(date('m').'/01/'.date('Y')));
              $end_date=date("Y-m-d");
              $userid=$this->session->userdata('uid');
              $data['points']=$this->EmployeeModel->getpoint($userid,$start_date,$end_date);
              $data['userid']=$this->session->userdata('uid');
              $data['empofmonth']=$this->EmployeeModel->getempofmonth();
              $data['notice']=$this->EmployeeModel->getnotice();
              $data['lunch_order']=$this->EmployeeModel->fetchinfo('lunchorder',$clockin,'row');
              $data['lunch_bonus']=$this->EmployeeModel->getlunch_bonus($userid,$start_date,$end_date);

              $this->load->view('employee/employeedashboard',$data);
          }
          else
          {
               redirect(base_url());
          }
    }

    public function logout()
    {
     $this->session->unset_userdata('uid');
      redirect(base_url());
      $this->session->sess_destroy();
    }

    public function clockout()
    { 
       $date=date("Y-m-d");
       $time= date("H:i:s");
       $data['date']=$date;
       $data['clockout']=$time;
       $data['Eid'] = $this->session->userdata('uid');
       $ctime=$this->EmployeeModel->clockouttime($data);
       if($ctime)
       {

           redirect(base_url().'employee_control/employee');
       }
       else
       {
           redirect(base_url().'employee_control/employee');
       }

    }

    public function getitem()
    {
      $con['parent_id']=$this->input->post('shop_id');
      $data=$this->EmployeeModel->fetchinfo('items',$con,'result');
      //print_r($data);
       $items="";
      foreach ($data as $value)
      {
        $condition="";
        //$condition=($value['limit1']+$value['item']);
        $options="";
        for($y=1;$y<=$value['limit1'];$y++)
        {
                         
      $options.='<option id="limit_'.$value['Lnid'].'" value="'.$y.'">'.$y.'</option>';
                          
      }
        //print_r($value['item']);
        $items.= "<tr><td><input type='button' class='btn btn-success' value='Add' id='btnadd_".$value['Lnid']."' onclick='add_item(".$value['Lnid'].",".$value['cost'].")' ></td><td id='item_name_".$value['Lnid']."'>".$value['item']."</td><td id='item_cost_".$value['Lnid']."'>".$value['cost']."</td><td><select id='item_limit_".$value['Lnid']."'>".$options."</select></td></tr>";
      }
      echo $items;
    }
    

    public function clockin()
    {
       //$userid=$this->session->userdata('uid');
       $date=date("Y-m-d");
       $time= date("H:i:s");
       $data['date']=$date;
       $data['clockin']=$time;
       $data['Eid'] = $this->session->userdata('uid');
       $ctime=$this->EmployeeModel->clockintime($data);
       if($ctime)
       {

           redirect(base_url().'employee_control/employee');
       }
       else
       {
           redirect(base_url().'employee_control/employee');
       }
    }

    public function clockincheck()
    {
       $data['date']=date("Y-m-d");
       $data['Eid'] = $this->session->userdata('uid');
       $check=$this->EmployeeModel->fetchinfo('attendance',$data,'count');
       if($check)
      {
        return false;
      }
      else
      {
        return true;
      }
    }

    public function startbreak()
    {

      $con['Eid'] = $this->session->userdata('uid');
      $con['date']=date("Y-m-d");

      $check_clockin=$this->EmployeeModel->fetchinfo('attendance',$con,'count');
      if($check_clockin>0)
      {
       $data['Eid'] = $this->session->userdata('uid');
       $data['starttime']=date("H:i:s");
       $data['date']=date("Y-m-d");
       $data['type']=$this->input->post('breakid');
       $brk_start_time=$this->EmployeeModel->startbreak($data);
       return $brk_start_time;
      }
    }

    public function endbreak()
    {
        $data['Eid']=$this->session->userdata('uid');
        $data['endtime']=date("H:i:s");
        $data['date']=date("Y-m-d");
        $data['type']=$this->input->post('breakid');
        $brk_end_time=$this->EmployeeModel->endbreak($data);
        print_r($brk_end_time);
    }

    public function submitlunchorder()
    {
      $data['Eid']=$this->session->userdata('uid');
      $data['date']=date("Y-m-d");
      $data['shopname']=$this->input->post('shopname');
      $data['shop_id']=$this->input->post('shopid');
      $data['items']=$this->input->post('item');
      $data['cost']=$this->input->post('cost');

      $submit=$this->EmployeeModel->submitlunchorder($data);

      print_r($submit);
    }

    public function breakcheck()
    {

        $data['Eid']=$this->session->userdata('uid');
        $data['date']=date("Y-m-d");
        //$data['endtime']!='00:00:00';
        
        $submit=$this->EmployeeModel->fetchinfo("break_track",$data,"result");
        foreach ($submit as $key)
        {
           
           if($key['endtime']=='00:00:00')
           {
             $con['rank']=$key['type'];
             $submit=$this->EmployeeModel->fetchinfo('break',$con,'row');
             $default_time=$submit['duration'];
             $nowtime = new DateTime('now');
             $diff = $nowtime->diff(new DateTime($key['starttime']));

             $time_spend = ((($diff->h*60)+$diff->i)*60)+$diff->s;
            
             $time = explode(':', $default_time);
             $default=($time[0]*3600) + ($time[1]*60) + $time[2];
             
             $remainingtime = $default - $time_spend;
             //echo $remainingtime;

             $sec=($remainingtime % 60);
               if($sec<10)
               {
               $sec="0".$sec;
               }

              $minutes = ($remainingtime / 60) % 60;
              if($minutes<10)
               {
               $minutes="0".$minutes;
               }
              $hours = floor($remainingtime / (60 * 60));

              $time_left="$hours:$minutes:$sec";

              echo $time_left.",".$key['type'];;
           }
        }

    }

     public function breakdis()
     {

        $data['Eid']=$this->session->userdata('uid');
        $data['date']=date("Y-m-d");
      
        
        $submit=$this->EmployeeModel->fetchinfo("break_track",$data,"result");
        foreach ($submit as $key)
        {
           //echo $key['type'];
           if($key['endtime']!='00:00:00')
           {
             echo $key['type'].",";
           }
        }

    }
   


}
?>