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
      if ($this->session->userdata('uid'))
      {
          /* chat introduce */
          $_SESSION['chatusername'] = $this->session->userdata('emp_name');
          $_SESSION['username'] = $this->session->userdata('uid');


          $con_online=array('online_status'=>1);
          $data['userlist']=$this->EmployeeModel->AllEmployee();
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
          $user_id=$this->session->userdata('uid');
          $data['points']=$this->EmployeeModel->getpoint($user_id,$start_date,$end_date);
          $data['placedorder']=$this->EmployeeModel->placedorder($user_id,$end_date);
          $data['userid']=$this->session->userdata('uid');
          $data['empofmonth']=$this->EmployeeModel->getempofmonth();
          $data['notice']=$this->EmployeeModel->getnotice();
          $data['lunch_order']=$this->EmployeeModel->fetchinfo('lunchorder',$clockin,'row');
          $data['lunch_bonus']=$this->EmployeeModel->getlunch_bonus($user_id,$start_date,$end_date);
          $data['checkmode']=$this->EmployeeModel->fetchinfo('tbl_employee_productivity',$conmode,'row');
          $data['header']=$this->load->view('employee/include/header','',true);
          $this->load->view('employee/employeedashboard',$data);
      }
      else
      {
          redirect(base_url());
      }
        
    }

    public function inbreak()
    {
      if ($this->session->userdata('uid'))
      {
        $con['type']=$this->input->post('breakid');
        $con['Eid']=$this->session->userdata('uid');
        $con['date']=date('Y-m-d');
        $check=$this->EmployeeModel->fetchinfo('break_track',$con,'row');
        if($check)
        {
           print_r($check['status']) ;
         }
        else
        {
          return false;
        }
      }
      else
      {
          redirect(base_url());
      }
    }

    
    public function bdmaccess()
    {
      if ($this->session->userdata('uid'))
      {
          $con['status']=0;
          $con1=$this->session->userdata('uid');
          //$data['url']=$this->EmployeeModel->fetchinfo('bdm_url',$con,'result');

          //$data['bdmactive']=$this->EmployeeModel->bdm_activity($con1);

          $data['bdmactive']=$this->EmployeeModel->bdm_activity($con1);

          $data['header']=$this->load->view('employee/include/header','',true);
          $this->load->view('employee/bdm.php',$data);
      }
      else
      {
         redirect(base_url());
      }   
    }

    public function add_activity()
    {
      if ($this->session->userdata('uid'))
      {
          $data['Eid']=$this->session->userdata('uid');
          //print_r($data);
          $data['date']=date('Y-m-d');
          $data['time']=date('H:i:s');
          //$data['project']=$this->input->post('pro_name');
         // $data['main_url']=$this->input->post('url_id');
          $data['posted_url']=$this->input->post('posted');
          $data['proposed_url']=$this->input->post('proposed');
          $data['cover_letter']=$this->input->post('coverletter');
          $data['step1']=0;

           if($data['posted_url'] && $data['proposed_url'] )
           {

              $activity=$this->EmployeeModel->ins_activity($data);
              if($activity)
              {
                $this->session->set_userdata('succ_msg','Activity Added!!!');
                redirect(base_url().'employee_control/employee/bdmaccess');
              }
              else
              {
                $this->session->set_userdata('err_msg','Try Again');
                redirect(base_url().'employee_control/employee/bdmaccess');
              }
           }
           else
           {  
               $this->session->set_userdata('err_msg','All Fields Are Needed');
               redirect(base_url().'employee_control/employee/bdmaccess');
           }
      }
      else
      {
         redirect(base_url());
      } 
    }
    
    public function checklunchorder()
    {
      if ($this->session->userdata('uid'))
      {
         $end_date=date("Y-m-d");
         $user_id=$this->session->userdata('uid');

         $exist=$this->EmployeeModel->placedorder($userid,$end_date);
         if($exist)
         {
          return $exist;
         }
         else
         {
          return false;
         }
      }
      else
      {
         redirect(base_url());
      } 
    }



    public function logout()
    {
      if ($this->session->userdata('uid'))
      {
          //print_r($_SESSION['openChatBoxes']);exit;
          $this->session->unset_userdata('uid');
          $_SESSION['username']='';
          $_SESSION['openChatBoxes']='';
          $this->session->sess_destroy();
          session_unset();
          session_destroy();
          redirect(base_url());
      }
      else
      {
         redirect(base_url());
      }
      
    }

    public function clockout()
    { 
      if ($this->session->userdata('uid'))
      {
           $date=date("Y-m-d");
           $time= date("H:i:s");
           $data['date']=$date;
           $data['clockout']=$time;
           $data['Eid'] = $this->session->userdata('uid');

           $data1['date']=$date;
           $data1['Eid'] = $this->session->userdata('uid');
           $ctime=$this->EmployeeModel->clockouttime($data);

           $stopactivity=$this->EmployeeModel->stopactiv($data1);
           $con['id']=$this->session->userdata('uid');
           $data2['online_status']='0';
           $make_online=$this->EmployeeModel->update('employee',$con,$data2);

           if($ctime)
           {

               redirect(base_url().'employee_control/employee');
           }
           else
           {
               redirect(base_url().'employee_control/employee');
           }
      }
      else
      {
         redirect(base_url());
      }

    }

    public function getitem()
    {
      if ($this->session->userdata('uid'))
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
      else
      {
         redirect(base_url());
      }
    }

    public function deletelunch($id)
    {
      if ($this->session->userdata('uid'))
      {
          $con['Liid']=$id;
          $delete_order=$this->EmployeeModel->delete($con,'lunchorder');
          if($delete_order)
          {
            redirect(base_url().'employee_control/employee');
          }
          else
          {
             redirect(base_url().'employee_control/employee');
          }
      }
      else
      {
         redirect(base_url());
      }

    }
    

    public function clockin()
    {
      if ($this->session->userdata('uid'))
      {
       //$userid=$this->session->userdata('uid');
         $date=date("Y-m-d");
         $time= date("H:i:s");
         $data['date']=$date;
         $data['clockin']=$time;
         $data['Eid'] = $this->session->userdata('uid');
         $ctime=$this->EmployeeModel->clockintime($data);

         $con['id']=$this->session->userdata('uid');
         $data1['online_status']='1';
         $make_online=$this->EmployeeModel->update('employee',$con,$data1);
          if($ctime)
         {
             echo $time;
            //redirect(base_url().'employee_control/employee');
         }
         /*else
         {
             redirect(base_url().'employee_control/employee');
         }*/
      }
      else
      {
         redirect(base_url());
      }
    }

    public function clockincheck()
    {
      if ($this->session->userdata('uid'))
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
      else
      {
         redirect(base_url());
      }
    }

    public function checkwork()
    {

      if ($this->session->userdata('uid'))
      {
         $data['date']=date("Y-m-d");
         $data['Eid'] = $this->session->userdata('uid');
         $data['status']='1';

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
          return $stopworkingmode;
         } 
         else
         {
            return false;
         }
      }
      else
      {
         redirect(base_url());
      }

    }

    public function search_link()
    {

      $search=$this->input->post('search');
      $s=$this->AdminModel->search_link($search);
      print_r($s);

    }

    public function checkstastuswork()
    {
      if ($this->session->userdata('uid'))
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
      else
      {
         redirect(base_url());
      }
    }

    public function startbreak()
    {

      if ($this->session->userdata('uid'))
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
             if($brk_start_time)
             {
               print_r($brk_start_time);
             }
             else
             {
               return false;
             }
          }
      }
      else
      {
         redirect(base_url());
      }
    }

    public function endbreak()
    {
        if ($this->session->userdata('uid'))
        {
          $data['Eid']=$this->session->userdata('uid');
          $data['endtime']=date("H:i:s");
          $data['date']=date("Y-m-d");
          $data['type']=$this->input->post('breakid');
          $data['status']='1';
          $brk_end_time=$this->EmployeeModel->endbreak($data);
          print_r($brk_end_time);
        }
        else
        {
           redirect(base_url());
        }
    }

    public function submitlunchorder()
    {
        if ($this->session->userdata('uid'))
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
        else
        {
           redirect(base_url());
        }
    }

    public function breakcheck()
    {
        if ($this->session->userdata('uid'))
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
                         
                                      if($hours<10)
                                      {
                                        $hours="0".$hours;
                                      }
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
                                      if($hours<10)
                                      {
                                        $hours="0".$hours;
                                      }
                        $time_left="$hours:$minutes:$sec";

                        echo $time_left.",".$key['type']."+"."1"."+".$remainingtime;
                    }
                 }
              }
        }
        else
        {
           redirect(base_url());
        }

    }

     public function breakdis()
     {
        if ($this->session->userdata('uid'))
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
        else
        {
           redirect(base_url());
        }

    }


    public function setproduction()
    { 

      if ($this->session->userdata('uid'))
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
      else
      {
           redirect(base_url());
      }
    }
     
    public function setrnd()
    {

      if ($this->session->userdata('uid'))
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
      else
      {
           redirect(base_url());
      } 
    }

    public function settraining()
    {
      if ($this->session->userdata('uid'))
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
      else
      {
           redirect(base_url());
      }  
    }


    public function wmodecheck()
    { 

      if ($this->session->userdata('uid'))
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
      else
      {
           redirect(base_url());
      } 
    }

    public function setadmin()
    { 
      if ($this->session->userdata('uid'))
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
      else
      {
           redirect(base_url());
      }      
    }

}
?>
