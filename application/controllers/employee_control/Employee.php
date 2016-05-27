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
     $this->load->library('villa_booking_calendar');
	}



    public function index()
    {  
        if($_POST)
        {
              $username=$this->input->post('empid');
              $password=$this->input->post('emppass');
                     
              $check=$this->EmployeeModel->login($username,$password);

             
              
               if ($this->session->userdata('uid'))
                {

                    /* chat introduce */
                    $_SESSION['chatusername'] = $this->session->userdata('emp_name');
                    $_SESSION['username'] = $this->session->userdata('uid');


                    $con_online=array('online_status'=>1);
                    $data['userlist']=$this->EmployeeModel->fetchinfo('employee',$con_online,'result');
                    /* chat introduce */

                    $conmode['date']=date("Y-m-d");
                    $conmode['Eid']=$this->session->userdata('uid');
                    $conmode['status']=1;
                    $data['calendar'] = $this->villa_booking_calendar->render_booking_calendar();
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
                    //$data['placedorder']=$this->EmployeeModel->fetchinfo('lunchorder',$condtn,'row');
                    $data['points']=$this->EmployeeModel->getpoint($userid,$start_date,$end_date);
                    $data['userid']=$this->session->userdata('uid');
                    $data['empofmonth']=$this->EmployeeModel->getempofmonth();
                    $data['notice']=$this->EmployeeModel->getnotice();
                    $data['lunch_order']=$this->EmployeeModel->fetchinfo('lunchorder',$clockin,'row');
                    $data['lunch_bonus']=$this->EmployeeModel->getlunch_bonus($userid,$start_date,$end_date);
                    $data['checkmode']=$this->EmployeeModel->fetchinfo('tbl_employee_productivity',$conmode,'row');
                    $this->load->view('employee/employeedashboard',$data);
                }
                else
                {
                     redirect(base_url());
                }
        }
        else
        {
          if ($this->session->userdata('uid'))
                {

                    /* chat introduce */
                    $_SESSION['chatusername'] = $this->session->userdata('emp_name');
                    $_SESSION['username'] = $this->session->userdata('uid');


                    $con_online=array('online_status'=>1);
                    $data['userlist']=$this->EmployeeModel->fetchinfo('employee',$con_online,'result');
                    /* chat introduce */

                    $conmode['date']=date("Y-m-d");
                    $conmode['Eid']=$this->session->userdata('uid');
                    $conmode['status']=1;
                    $data['calendar'] = $this->villa_booking_calendar->render_booking_calendar();
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
                    $data['checkmode']=$this->EmployeeModel->fetchinfo('tbl_employee_productivity',$conmode,'row');
                    $this->load->view('employee/employeedashboard',$data);
                }
                else
                {
                     redirect(base_url());
                }
        }
    }

    public function bdmaccess()
    {
      $this->load->view('employee/bdm.php');
          
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

    public function checkwork()
    {
       $data['date']=date("Y-m-d");
       $data['Eid'] = $this->session->userdata('uid');
       $data['status']=1;

       $checkmode=$this->EmployeeModel->fetchinfo('tbl_employee_productivity',$data,'row');

       if($checkmode)
       {

        $con['date']=$data['date'];
        $con['Eid']=$data['Eid'];
        $con['status']=$data['status'];
        $con['type']=$checkmode['type'];

        $data1['status']=0;
        $data1['endTime']=date('H:i:s');
        $stopworkingmode=$this->EmployeeModel->update('tbl_employee_productivity',$con,$data1);

       } 
       else
       {
        return false;
       }
    }

    public function checkstastuswork()
    {
      $data['date']=date("Y-m-d");
      $data['Eid'] = $this->session->userdata('uid');

      $take=$this->EmployeeModel->getmode($data);
      if($take)
       {
          
            $data1['Eid']=$this->session->userdata('uid');
            $data1['date']=date('Y-m-d');
            $data1['startTime']=date('H:i:s');
            $data1['type']=$take['type'];
            $data1['status']=1;
            $insert=$this->EmployeeModel->productivity($data1); 

       }
       else
       {
        return false;
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
       $data['status']='1';
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
        $data['status']='0';
        $brk_end_time=$this->EmployeeModel->endbreak($data);
        print_r($brk_end_time);
    }

    public function submitlunchorder()
    {

      $con['Eid']=$this->session->userdata('uid');
      $con['date']=date("Y-m-d");
      $check=$this->EmployeeModel->fetchinfo('attendance',$con,'row');

      if($check)
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
    }

    public function breakcheck()
    {

        $data['Eid']=$this->session->userdata('uid');
        $data['date']=date("Y-m-d");

        
        $submit=$this->EmployeeModel->fetchinfo("break_track",$data,"result");
        foreach ($submit as $key)
        {
           
           if($key['status']=='1')
           {
             $con['rank']=$key['type'];
             $submit=$this->EmployeeModel->fetchinfo('break',$con,'row');
             $default_time=$submit['duration'];
             $nowtime = new DateTime('now');
             $diff = $nowtime->diff(new DateTime($key['starttime']));

             $time_spend = ((($diff->h*60)+$diff->i)*60)+$diff->s;
            
             $time = explode(':', $default_time);
             $default=($time[0]*3600) + ($time[1]*60) + $time[2];
             if($default >$time_spend)
             {
                $remainingtime = $default - $time_spend;
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

                  echo $time_left.",".$key['type']."+"."0"."+".$remainingtime;
              }
              else
              {
                $remainingtime = $time_spend -$default;
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

                  echo $time_left.",".$key['type']."+"."1"."+".$remainingtime;
              }
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


    public function setproduction()
    { 

      $data['Eid']=$this->session->userdata('uid');
      $data['date']=date('Y-m-d');
      $data['startTime']=date('H:i:s');
      $data['type']=1;
      $data['status']=1;

      $checkdata['Eid']=$this->session->userdata('uid');
      $checkdata['date']=date('Y-m-d');
      $checkdata['status']=1;
      $check=$this->EmployeeModel->fetchinfo('tbl_employee_productivity',$checkdata,'row');
      if($check)
      {
           $con['emp_p_id']=$check['emp_p_id'];
           $udata['endTime']=date('H:i:s');
           $udata['status']=0;
           $stop=$this->EmployeeModel->end('tbl_employee_productivity',$con,$udata);
           if($stop)
           {
            $insert=$this->EmployeeModel->productivity($data);
            redirect(base_url().'employee_control/employee');
           }
      }
      else
      {


         $insert=$this->EmployeeModel->productivity($data);
         redirect(base_url().'employee_control/employee');
      }


    }
     
    public function setrnd()
    {
      $data['Eid']=$this->session->userdata('uid');
      $data['date']=date('Y-m-d');
      $data['startTime']=date('H:i:s');
      $data['type']=2;
      $data['status']=1;

      $checkdata['Eid']=$this->session->userdata('uid');
      $checkdata['date']=date('Y-m-d');
      $checkdata['status']=1;
      $check=$this->EmployeeModel->fetchinfo('tbl_employee_productivity',$checkdata,'row');
      if($check)
      {
           $con['emp_p_id']=$check['emp_p_id'];
           $udata['endTime']=date('H:i:s');
           $udata['status']=0;
           $stop=$this->EmployeeModel->end('tbl_employee_productivity',$con,$udata);
           if($stop)
           {
            $insert=$this->EmployeeModel->productivity($data);
            redirect(base_url().'employee_control/employee');
           }
      }
      else
      {


         $insert=$this->EmployeeModel->productivity($data);
         reworkingmodedirect(base_url().'employee_control/employee');
      }

      
    }

    public function settraining()
    {
      $data['Eid']=$this->session->userdata('uid');
      $data['date']=date('Y-m-d');
      $data['startTime']=date('H:i:s');
      $data['type']=3;
      $data['status']=1;

      $checkdata['Eid']=$this->session->userdata('uid');
      $checkdata['date']=date('Y-m-d');
      $checkdata['status']=1;
      $check=$this->EmployeeModel->fetchinfo('tbl_employee_productivity',$checkdata,'row');
      if($check)
      {
           $con['emp_p_id']=$check['emp_p_id'];
           $udata['endTime']=date('H:i:s');
           $udata['status']=0;
           $stop=$this->EmployeeModel->end('tbl_employee_productivity',$con,$udata);
           if($stop)
           {
            $insert=$this->EmployeeModel->productivity($data);
            redirect(base_url().'employee_control/employee');
           }
      }
      else
      {


         $insert=$this->EmployeeModel->productivity($data);
         redirect(base_url().'employee_control/employee');
      }

      
    }


    public function wmodecheck()
    {
      $data['Eid']=$this->session->userdata('uid');
      $data['date']=date('Y-m-d');
      $data['status']=1;
      $check=$this->EmployeeModel->fetchinfo('tbl_employee_productivity',$data,'row');
      if($check)
       {  

          $nowtime = new DateTime('now');
             $diff = $nowtime->diff(new DateTime($check['startTime']));

             $time_spend = ((($diff->h*60)+$diff->i)*60)+$diff->s;
            
             //echo "$time_spend";
             $sec=($time_spend % 60);
               if($sec<10)
               {
               $sec="0".$sec;
               }

              $minutes = ($time_spend / 60) % 60;
              if($minutes<10)
               {
               $minutes="0".$minutes;
               }
              $hours = floor($time_spend / (60 * 60));
             // echo $sec.",".$minutes.",".$hours;
              echo $sec.",".$minutes.",".$hours.",".$time_spend;

       }
       else
       {
        return false;
       }

    }

    public function setadmin()
    { 
      $data['Eid']=$this->session->userdata('uid');
      $data['date']=date('Y-m-d');
      $data['startTime']=date('H:i:s');
      $data['type']=4;
      $data['status']=1;

      $checkdata['Eid']=$this->session->userdata('uid');
      $checkdata['date']=date('Y-m-d');
      $checkdata['status']=1;
      $check=$this->EmployeeModel->fetchinfo('tbl_employee_productivity',$checkdata,'row');
      if($check)
      {
           $con['emp_p_id']=$check['emp_p_id'];
           $udata['endTime']=date('H:i:s');
           $udata['status']=0;
           $stop=$this->EmployeeModel->end('tbl_employee_productivity',$con,$udata);
           if($stop)
           {
            $insert=$this->EmployeeModel->productivity($data);
            redirect(base_url().'employee_control/employee');
           }
      }
      else
      {


         $insert=$this->EmployeeModel->productivity($data);
         redirect(base_url().'employee_control/employee');
      }

      
    }

}
?>