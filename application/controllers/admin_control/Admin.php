<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('AdminModel');
		//$this->load->helper('custom');
		$this->load->library('session');
	}

   public function index()
    {  
          $username=$this->input->post('adminid');
          $password=$this->input->post('adminpass');
          $type=1;
               
        $check=$this->AdminModel->login($username,$password,$type);
   
          if ($this->session->userdata('adminid'))
          {
              
              $con['activation_status']=0;
              $con1['date']=date('Y-m-d');
              $data['total_employee']=$this->AdminModel->fetchinfo('employee',$con,'count');
              $data['total_present']=$this->AdminModel->fetchinfo('attendance',$con1,'count');
              $data['sideber']=$this->load->view('admin/includes/sideber','',true);
              $data['header']=$this->load->view('admin/includes/header','',true);
              $this->load->view('admin/admin_dashboard.php',$data);
          }
          else
          {
             redirect(base_url());
          }
    }

    public function logout()
    {
     $this->session->unset_userdata('adminid');
      redirect(base_url());
      $this->session->sess_destroy();
    }


    public function pointadd()
    {
        $start_date=date('Y-m-d',strtotime('first day of this month'));
        $end_date=date('Y-m-d',strtotime('last day of this month'));
        $data['allpoints']=$this->AdminModel->fnallpoint($start_date,$end_date);
        $data['sideber']=$this->load->view('admin/includes/sideber','',true);
        $data['header']=$this->load->view('admin/includes/header','',true);
       
        $this->load->view('admin/pointadd.php',$data);
    }
    

    public function expendature_attend()
    {
         if($_POST)
      {
         

           $start_date=$this->input->post('datecheck');
           $end_date=$this->input->post('endofmonth');
           $data['current']=$this->input->post('myDate');
      }
      else
      {
        $start_date=date('Y-m-d',strtotime('first day of this month'));
        $end_date=date('Y-m-d',strtotime('last day of this month'));
        $data['current']=date('M Y');
      }
        
        $data['allpoints']=$this->AdminModel->fnallpointexp($start_date,$end_date);
        $data['sideber']=$this->load->view('admin/includes/sideber','',true);
        $data['header']=$this->load->view('admin/includes/header','',true);
       
        $this->load->view('admin/expendature_attend.php',$data);
    }

    public function allpoint()
    {   

       if($_POST)
      {   
           $start_date=date('Y-m-d',strtotime('first day of this month'));
           $end_date=date('Y-m-d',strtotime('last day of this month'));
         
           $data['allpoints']=$this->AdminModel->fnallpoint($start_date,$end_date);
           $start_date=$this->input->post('datecheck');
           $end_date=$this->input->post('endofmonth');
           $data['current']=$this->input->post('myDate');
      }
      else
      {
        $start_date=date('Y-m-d',strtotime('first day of this month'));
        $end_date=date('Y-m-d',strtotime('last day of this month'));
        $data['current']=date('M Y');
      }
        
        $data['allpoints']=$this->AdminModel->fnallpoint($start_date,$end_date);
        $data['sideber']=$this->load->view('admin/includes/sideber','',true);
        $data['header']=$this->load->view('admin/includes/header','',true);
       
        $this->load->view('admin/allpoint.php',$data);
    }

    public function allemp()
    {

          $data['allemployee']=$this->AdminModel->fnallemp();
          $data['sideber']=$this->load->view('admin/includes/sideber','',true);
          $data['header']=$this->load->view('admin/includes/header','',true);
       
          $this->load->view('admin/allemp.php',$data);
    }
    
    public function add_point()
    {
      $point['points']=$this->input->post('npoint');
      $point['last_update']=date("Y-m-d");
      $data['P_id']=$this->input->post('po_id');
      $update=$this->AdminModel->update('point_history',$data,$point);
      return $update;
      
    }

    public function shownotice()
    {      
          $data['notice']=$this->AdminModel->allnotice();
          $data['sideber']=$this->load->view('admin/includes/sideber','',true);
          $data['header']=$this->load->view('admin/includes/header','',true);
       
          $this->load->view('admin/shownotice.php',$data);
    }

    public function showempofmonth()
    {     
          $data['showemp']=$this->AdminModel->showemp();
          $data['emp_of_month']=$this->AdminModel->showempofmonth();
          $data['sideber']=$this->load->view('admin/includes/sideber','',true);
          $data['header']=$this->load->view('admin/includes/header','',true);
          
          $this->load->view('admin/showempofmonth.php',$data);
    }

    public function addempofmon()
    {
      $data['Eid']=$this->input->post('nameselect');
      $data['month']=$this->input->post('myDate');
      if($data['Eid'] && $data['month'])
      {
        $insert_notice=$this->AdminModel->insert('emp_of_month',$data);
        if($insert_notice)
        {
          redirect(base_url().'admin_control/admin/showempofmonth');
        }
        else
        {
           redirect(base_url().'admin_control/admin/showempofmonth');
        }
      }
    }
    public function empinfo()
    {
          $data['showemp']=$this->AdminModel->showemp();
          $data['sideber']=$this->load->view('admin/includes/sideber','',true);
          $data['header']=$this->load->view('admin/includes/header','',true);
       
          $this->load->view('admin/empinfo.php',$data);
    }

    public function reset_password()
    {
      alert('HI');
    }

    public function allbreak()
    {



      $data['showallbreak']=$this->AdminModel->showallbreak();
      $data['header']=$this->load->view('admin/includes/header','',true);
      $data['sideber']=$this->load->view('admin/includes/sideber','',true);
      $this->load->view('admin/allbreak.php',$data);
    }

    public function addnotice()
    {
      $data['header']=$this->load->view('admin/includes/header','',true);
      $data['sideber']=$this->load->view('admin/includes/sideber','',true);
      $this->load->view('admin/addnotice.php',$data);
    }
    public function add_notice()
    {
      $data['subject']=$this->input->post('subject');
      $data['notice']=$this->input->post('notice');
      $data['date']=date("Y-m-d");
      $data['status']=0;
      $insert_notice=$this->AdminModel->insert('notice_board',$data);
      if($insert_notice)
      {
        $this->session->set_userdata('succ_msg','Notice Added Successfully');
                   redirect(base_url().'admin_control/admin/addnotice');

      }
      else
      {
        $this->session->set_userdata('err_msg','Try Again');
                   redirect(base_url().'admin_control/admin/addnotice');

      }

    }

    public function add_break()
    {
      if($_POST)
      {

        $hour=$this->input->post('brk_hour');
        if($hour<10)
        {
          $hour='0'.$hour;
        }
       
        $min=$this->input->post('brk_min');
        if($min<10)
        {
          $min='0'.$min;
        }
        $sec=$this->input->post('brk_sec');
        if($sec<10)
        {
          $sec='0'.$sec;
        }
        $breakname=$this->input->post('break_name');
        $data['break_name']=$breakname;
        $data['status']=0;
        $data['duration']=$hour.":".$min.":".$sec;
        if($hour && $min && $sec && $breakname)
        {
              if($hour<24 && $min<60 && $sec<60)
              {
                $insert_break=$this->AdminModel->insert('break',$data);
                if($insert_break)
                {
                   $this->session->set_userdata('succ_msg','Break Added Successfully');
                   redirect(base_url().'admin_control/admin/allbreak');
                }
                else
                {
                    $this->session->set_userdata('err_msg','Try Again');
                    redirect(base_url().'admin_control/admin/allbreak');
                }
              }
              else
              {
                  $this->session->set_userdata('err_msg','Fill All Fields With Proper Value');
                  redirect(base_url().'admin_control/admin/allbreak');
              }
        }
        else
        {
          $this->session->set_userdata('err_msg','All Fields Are Needed');
          redirect(base_url().'admin_control/admin/allbreak');
        }
       
      }

    }

    public function deletebrk()
    { 
      if($_POST)
        {
         $con['break_id']=$this->input->post('b_id');
         $delete=$this->AdminModel->delete($con,'break');
         if($delete>0)
         {
           return true;
           
         }
        
       }
    }
   
    public function deletenotice()
    {
        if($_POST)
        {
         $con['n_id']=$this->input->post('noticeid');
         $delete=$this->AdminModel->delete($con,' notice_board');
         if($delete>0)
         {
           return true;
           
         }
        
       }

       

    }

    public function fetchnotice()
       {
         $con['n_id']=$this->input->post('noticeid');
         $notice=$this->AdminModel->fetchinfo('notice_board',$con,'row');
         print_r($notice) ;
       }

       public function change_notice()
       {
         $con['n_id']=$this->input->post('noticeid');
         $data['status']=$this->input->post('newstatus');
         $update=$this->AdminModel->update('notice_board',$con,$data);
          if($update)
          {
          
            redirect(base_url().'admin_control/admin/shownotice');
          }
          else
          {
            redirect(base_url().'admin_control/admin/shownotice');
           
          }
       }
       public function edit_notice()
       {
          $data['subject']=$this->input->post('subject');
          $data['notice']=$this->input->post('notice');
          $con['n_id']=$this->input->post('noticeid');
          $update=$this->AdminModel->update('notice_board',$con,$data);
          if($update)
          {
            $this->session->set_userdata('succ_msg','Notice Updated Successfully');
            redirect(base_url().'admin_control/admin/shownotice');
          }
          else
          {
            redirect(base_url().'admin_control/admin/shownotice');
            $this->session->set_userdata('err_msg','Try Again!!!!');
          }
       }

    public function add_employee()
    { 
        
      $data['header']=$this->load->view('admin/includes/header','',true);
      $data['sideber']=$this->load->view('admin/includes/sideber','',true);
      $this->load->view('admin/add_employee.php',$data);

    }

    public function edit_break()
    {
      if($_POST)
      {

        $hour=$this->input->post('brk_hour_edit');
        if($hour<10)
        {
          $hour='0'.$hour;
        }
       
        $min=$this->input->post('brk_min_edit');
        if($min<10)
        {
          $min='0'.$min;
        }
        $sec=$this->input->post('brk_sec_edit');
        if($sec<10)
        {
          $sec='0'.$sec;
        }
        $breakname=$this->input->post('break_name_edit');
        $con['break_id']=$this->input->post('brk_id');
        $data['break_name']=$breakname;
        $data['status']=0;
        $data['duration']=$hour.":".$min.":".$sec;
        if($hour && $min && $sec && $breakname)
        {


              if($hour<24 && $min<60 && $sec<60)
              {
                $update=$this->AdminModel->update('break',$con,$data);
                if($update)
                {
                   $this->session->set_userdata('succ_msg','Break Updated Successfully');
                   redirect(base_url().'admin_control/admin/allbreak');
                }
                else
                {
                    $this->session->set_userdata('err_msg','Try Again');
                    redirect(base_url().'admin_control/admin/allbreak');
                }
              }
              else
              {
                  $this->session->set_userdata('err_msg','Fill All Fields With Proper Value');
                  redirect(base_url().'admin_control/admin/allbreak');
              }
        }
        else
        {
          $this->session->set_userdata('err_msg','All Fields Are Needed');
          redirect(base_url().'admin_control/admin/allbreak');
        }
       
      }

    }

    public function change_break_status()
    {
      if($_POST)
      {

        $con['break_id']=$this->input->post('b_id');
        $data['status']=$this->input->post('bstatus');
        $update=$this->AdminModel->update('break',$con,$data);
        return $update;
      }



    }

    public function restpass()
    {
      if($_POST)
      {
        
        $con['Eid']=$this->input->post('emp_id');
        $data['password']=$this->input->post('new_password');
        if($data['password'])
        {
      
            $update=$this->AdminModel->update('emp_details',$con,$data);
            if($update)
            {
                return true;
            }
            else
            {
                 return false;
            }
        }
        
      }

    }

    public function edit_emp()
    {
      if($_POST)
      {

          $data['username']=$this->input->post('username');
          $data['email']=$this->input->post('email');
          $data['designation']=$this->input->post('desig');
          $data['salary']=$this->input->post('salary');

          $con['Eid']=$this->input->post('emid');
          if($data['username'] && $data['email'] && $data['designation'] && $data['salary'] &&  $con['Eid'] )
          {
              $update=$this->AdminModel->update('emp_details',$con,$data);
              if($update)
              {
                 $this->session->set_userdata('succ_msg','Employee Details Updated Successfully');
                 redirect(base_url().'admin_control/admin/empinfo');
              }
              else
              {
                $this->session->set_userdata('err_msg','Try Again');
                 redirect(base_url().'admin_control/admin/empinfo');
              }
          }
          else
          {
               $this->session->set_userdata('err_msg','Try Again');
               redirect(base_url().'admin_control/admin/empinfo');

          }

      }

    }

    public function lunchorder()
    {
        $con=date('Y-m-d');
        $data['allorder']=$this->AdminModel->lunchinfo($con);
        $data['header']=$this->load->view('admin/includes/header','',true);
        $data['sideber']=$this->load->view('admin/includes/sideber','',true);
        $this->load->view('admin/lunchorder.php',$data);

    }

    public function manageclockin()
    {  
        $data['alltime']=$this->AdminModel->alltime();
        $data['header']=$this->load->view('admin/includes/header','',true);
        $data['sideber']=$this->load->view('admin/includes/sideber','',true);
        $this->load->view('admin/clockinmanage.php',$data);
    }

    public function expand()
    {  

       if($_POST)
       {
          
           $starting_date=$this->input->post('datecheck');
           $ending_date=$this->input->post('endofmonth');
           $data['current']=$this->input->post('myDate');
            if( $starting_date && $ending_date)
            {
                $start_date=$this->input->post('datecheck');
                $end_date=$this->input->post('endofmonth');
            }
            else
            {
                $start_date=date("m/d/Y", strtotime(date('m').'/01/'.date('Y')));
                $end_date=date("Y-m-d");
            }
        }
        else
        {
            $start_date=date("m/d/Y", strtotime(date('m').'/01/'.date('Y')));
            $end_date=date("Y-m-d");
            $data['current']=date("M Y");
        }

          $total_lunchbonus="";
          $total_vendor_cost="";
          $con=array('parent_id'=>0);
          $data['allemp']=$this->AdminModel->fetchallemployee();
          $allemp=$this->AdminModel->fetchallemployee();
          $data['allshop']=$this->AdminModel->fetchinfo('items',$con,'result');
        
          $allshop=$this->AdminModel->fetchinfo('items',$con,'result');
          $result="";
          foreach ($allshop as $value) 
              {
                  $per_vendor_cost=$this->AdminModel->allordercost($value['Lnid'],$start_date,$end_date);
                  if($per_vendor_cost)
                  {
                                $total_vendor_cost=$total_vendor_cost+$per_vendor_cost;
                                           
                                $result.="<tr>
                               <td>".$value['item']."</td>
                               <td>".$per_vendor_cost."</td>
                               </tr>";
                  }
              }
        $data['result']=$result;
        $data['total_vendor_cost']=$total_vendor_cost;


        $lunch_bonus="";
        foreach ($allemp as $employee) 
        {
          $bonus=$this->AdminModel->emp_lunch_bonus($employee['id'],$start_date,$end_date);
            
            if($bonus)
            {
              $total_lunchbonus=$total_lunchbonus+$bonus; 
            $lunch_bonus.="<tr>
                             <td>".$employee['name']."</td>
                             <td>".$bonus."</td>
                             </tr>";
            }
        }
        $data['bonus']=$lunch_bonus;
        $data['total_lunchbonus']=$total_lunchbonus;

        $data['header']=$this->load->view('admin/includes/header','',true);
        $data['sideber']=$this->load->view('admin/includes/sideber','',true);
        $this->load->view('admin/expandlunch.php',$data);
    }


    public function dltordr()
    {
      
      $data['Liid']=$this->input->post('orderid');
      $result=$this->AdminModel->delete($data,'lunchorder');
      if($result)
      {
          return true;
      }
      
    }

    public function placelunch()
    {
        $con['activation_status']=0;
        $data['allemployee']=$this->AdminModel->fetchinfo('employee',$con,'result');

        $con1['status']=0;
        $con1['parent_id']=0;
        $data['allshop']=$this->AdminModel->fetchinfo('items',$con1,'result');
        $data['header']=$this->load->view('admin/includes/header','',true);
        $data['sideber']=$this->load->view('admin/includes/sideber','',true);
        $this->load->view('admin/placelunch.php',$data);
    }
    public function changeworkingstatus()
    {

      $con['id']=$this->input->post('emp_id');

      $data['activation_status']=1;
      $data['resign_date']=$this->input->post('date');
      $data['reason']=$this->input->post('reason');
 
      if($con['id'] && $data['activation_status'] && $data['resign_date'] && $data['reason'])
      {
        $update=$this->AdminModel->update('employee',$con,$data);
        if($update)
        {
          return true;
        }
      }
    }


    public function edit_clock()
      {
        $time['Time']=$this->input->post('time');
        $clock['Clid']=$this->input->post('cl_id');
        if($time && $clock)
        {


          $update=$this->AdminModel->update('clockintime',$clock,$time);
          if($update)
          {
            return true;
          }
        }
      }

      public function addlunchitem()
      {
        $con['parent_id']=0;
        $data['allshop']=$this->AdminModel->fetchinfo('items',$con,'result');
        $data['header']=$this->load->view('admin/includes/header','',true);
        $data['sideber']=$this->load->view('admin/includes/sideber','',true);
        $this->load->view('admin/addlunchitem.php',$data);
      }

      public function showallevent()
      {
       
        $data['allevent']=$this->AdminModel->showevent();
        $data['header']=$this->load->view('admin/includes/header','',true);
        $data['sideber']=$this->load->view('admin/includes/sideber','',true);
        $this->load->view('admin/showallevent.php',$data);
      }

      public function deleteevent()
      {
        if($_POST)
        {
           $con['EventId']=$this->input->post('ev_id');
           $delete=$this->AdminModel->delete($con,'tbl_event_informations');
           if($delete>0)
           {
            return true;  
           } 
        }
      }

      public function addevent()
      {
        $data['showemp']=$this->AdminModel->showemp();
        $data['header']=$this->load->view('admin/includes/header','',true);
        $data['sideber']=$this->load->view('admin/includes/sideber','',true);
        $this->load->view('admin/addevent.php',$data);

      }

      public function add_event()
      {
          if($_POST)
          {
            $data['Eid']=$this->input->post('emp_name');
            $data['date']=$this->input->post('date');
            $data['event_informations']=$this->input->post('newevent');
           
            if($data['Eid'] && $data['date'] && $data['event_informations'])
            {
               $insert_break=$this->AdminModel->insert('tbl_event_informations',$data);
                if($insert_break)
                {
                   $this->session->set_userdata('succ_msg','Event Added Successfully');
                   redirect(base_url().'admin_control/admin/addevent');
                }
                else
                {
                    $this->session->set_userdata('err_msg','Try Again');
                    redirect(base_url().'admin_control/admin/addevent');
                }
            }
          }


      }

      public function add_new_employee()
      {

         if($_POST)
         {
            $data['name']=$this->input->post('name');
            $data['personal_email']=$this->input->post('peremail');
            $data['address']=$this->input->post('address');
            $data['phon_no']=$this->input->post('phno');
            $data['alt_ph_no']=$this->input->post('altphno');
            $data['gender']=$this->input->post('gender');
            $data['m_status']=$this->input->post('marrige');
            $data['dob']=$this->input->post('dob');
            $data['joining_date']=$this->input->post('doj');


            

            if($data['name'] && $data['personal_email'] && $data['address'] && $data['phon_no'] && $data['alt_ph_no'] && $data['gender'] && $data['m_status'] && $data['dob'] && $data['joining_date'])
            {

              $new_emp=$this->AdminModel->insert('employee',$data);
            
              if($new_emp)
              {

                 $data1['username']=$this->input->post('uname');
                 $data1['email']=$this->input->post('coemail');
                 $data1['designation']=$this->input->post('deg');
                 $data1['salary']=$this->input->post('salary');
                 $data1['Eid']=$new_emp;
                 $data1['password']='Tier5';

                 $new_user=$this->AdminModel->insert('emp_details',$data1);

                 if($new_user)
                 {
                    $this->session->set_userdata('succ_msg','Employee Added Successfully Added Successfully');
                    redirect(base_url().'admin_control/admin/add_employee');
                 }
                 else
                 {

                      $this->session->set_userdata('err_msg','Employee Added But User not Created');
                      redirect(base_url().'admin_control/admin/add_employee');

                 }
              }
              else
              {

                  $this->session->set_userdata('err_msg','Employee Added But User not Created');
                  redirect(base_url().'admin_control/admin/add_employee');

              }
            
            }
            else
            {

                $this->session->set_userdata('err_msg','Employee Cannot Added');
                redirect(base_url().'admin_control/admin/add_employee');
            }
            
         }

      }

      public function dailyactivity()
      {

         $con=date('Y-m-d');
         $data['present_employee']=$this->AdminModel->empclock($con);

         $data['firstbreak']=$this->AdminModel->firstbreak($con);

         
         $data['secondbreak']=$this->AdminModel->secondbreak($con);

         
         $data['thirdbreak']=$this->AdminModel->thirdbreak($con);


         $data['header']=$this->load->view('admin/includes/header','',true);
         $data['sideber']=$this->load->view('admin/includes/sideber','',true);
         $this->load->view('admin/dailyactivity.php',$data);

      }

      public function emplate()
      {
          
        $data['header']=$this->load->view('admin/includes/header','',true);
        $data['sideber']=$this->load->view('admin/includes/sideber','',true);
        $this->load->view('admin/emplate.php',$data);

      }

}
?>