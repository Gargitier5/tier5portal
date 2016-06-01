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
		$this->load->helper('custom');
		$this->load->library('session');
	}

   public function index()
    {  

          if($_POST)
          {
          $username=$this->input->post('adminid');
          $password=$this->input->post('adminpass');
         
      if($username && $password)
      {         
        $check=$this->AdminModel->login($username,$password);
        if($check)
        {
          if ($this->session->userdata('adminid'))
          {
              
              $con['activation_status']=0;
              $con1['date']=date('Y-m-d');
              $data['employee']=$this->AdminModel->AllEmployee();
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
        else
        {
          $this->session->set_userdata('e_message','Invalid Username or Password');
          redirect(base_url());
        }
      }
      else
      {
        $this->session->set_userdata('e_message','Enter Username And Password');
          redirect(base_url());
      }

        }
        else
        {
           if ($this->session->userdata('adminid'))
          {
              
              $con['activation_status']=0;
              $con1['date']=date('Y-m-d');
              $data['employee']=$this->AdminModel->AllEmployee();
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
    }

    public function ChatHistory()
    {
       if ($this->session->userdata('adminid'))
          {
              
             
              $data=array();
              $data['history']=$this->AdminModel->FnChatHistory();
              $data['sideber']=$this->load->view('admin/includes/sideber','',true);
              $data['header']=$this->load->view('admin/includes/header','',true);
              $this->load->view('admin/chat_history.php',$data);
          }
          else
          {
             redirect(base_url());

          }
    }
    public function bdmactivity()
    {

      
        $con=date('Y-m-d');
        $data['bdmac']=$this->AdminModel->getactivity($con);
      
      $data['bdm']=$this->AdminModel->get_bdm();
      $data['sideber']=$this->load->view('admin/includes/sideber','',true);
      $data['header']=$this->load->view('admin/includes/header','',true);
      $this->load->view('admin/bdmactivity.php',$data);
    }

    public function getbdmbydate()
    {
        $con=$this->input->post('getdate');
        $activity=$this->AdminModel->getactivity($con);
        $result="";
        foreach ($activity as $key)
        {
          if($key['step1']==1){ $step1="Contacted";}
                        else if($key['step1']==2){ $step1="Rejected";}
                        else if($key['step1']==3){ $step1="Offer";}
                        else { $step1="No Status";}

                        if($key['step2']=="1_1"){ $step2="Offer";}
                        else if($key['step2']=="1_2"){ $step2="Rejected";}
                        else if($key['step2']=="3_1"){ $step2="Accepted";}
                        else if($key['step2']=="3_2"){ $step2="Rejected";}
                        else { $step2="No Status";}

                        if($key['step3']=="1_2_1"){ $step3="Offer";}
                        else if($key['step3']=="1_2_2"){ $step3="Rejected";}
                        else { $step3="No Status";}
          $result.="<tr><td>". $key['date']."</td>
                         <td>".$key['time']."</td>
                         <td>".$key['name']."</td>
                         <td>". $key['project']."</td>
                         <td>".$key['url']."</td>
                         <td>".$key['posted_url']."</td>
                         <td>".$key['proposed_url']."</td>
                         <td><a href='admin_control/Admin/show_cover/".$key['b_ac_id'].">View Details</a></td>
                         <td>".$step1 ."</td>
                         <td>".$step2 ."</td>
                         <td>". $step3 ."</td></tr>";
                         
    }
    echo $result;
    }
    public function getbdmbyname()
    { 
      $con=$this->input->post('getname');
        $activity=$this->AdminModel->getactivitybyname($con);
        $result="";
        foreach ($activity as $key)
        {
          if($key['step1']==1){ $step1="Contacted";}
                        else if($key['step1']==2){ $step1="Rejected";}
                        else if($key['step1']==3){ $step1="Offer";}
                        else { $step1="No Status";}

                        if($key['step2']=="1_1"){ $step2="Offer";}
                        else if($key['step2']=="1_2"){ $step2="Rejected";}
                        else if($key['step2']=="3_1"){ $step2="Accepted";}
                        else if($key['step2']=="3_2"){ $step2="Rejected";}
                        else { $step2="No Status";}

                        if($key['step3']=="1_2_1"){ $step3="Offer";}
                        else if($key['step3']=="1_2_2"){ $step3="Rejected";}
                        else { $step3="No Status";}
          $result.="<tr><td>". $key['date']."</td>
                         <td>".$key['time']."</td>
                         <td>".$key['name']."</td>
                         <td>". $key['project']."</td>
                         <td>".$key['url']."</td>
                         <td>".$key['posted_url']."</td>
                         <td>".$key['proposed_url']."</td>
                         <td>View Details</td>
                         <td>".$step1 ."</td>
                         <td>".$step2 ."</td>
                         <td>". $step3 ."</td></tr>";
                         
    }
    echo $result;
    }

     

    public function logout()
    {
      $this->session->unset_userdata('adminid');
      redirect(base_url());
      $this->session->sess_destroy();
    }
    
    public function setbonus()
    {
      $data['shownoemp']=$this->AdminModel->shownoemp();
      $data['showallemp']=$this->AdminModel->showallemp();
      $data['sideber']=$this->load->view('admin/includes/sideber','',true);
      $data['header']=$this->load->view('admin/includes/header','',true);
      $this->load->view('admin/setbonus.php',$data);
    }

     public function show_cover($id)
    {

      $con['b_ac_id']=$id;
      $data['get']=$this->AdminModel->fetchinfo('bdm_activity',$con,'row');
      $data['sideber']=$this->load->view('admin/includes/sideber','',true);
      $data['header']=$this->load->view('admin/includes/header','',true);
      $this->load->view('admin/showcover.php',$data);
    }

    public function editprof($id)
    {

      $con['id']=$id;
      $data['emp_info']=$this->AdminModel->fetchinfo('employee',$con,'row');
      $data['sideber']=$this->load->view('admin/includes/sideber','',true);
      $data['header']=$this->load->view('admin/includes/header','',true);
      $this->load->view('admin/editprof.php',$data);
    }

    public function editoldemployee()
    {
       $con['id']=$this->input->post('empid');

        $data['name']=$this->input->post('name');
        $data['personal_email']=$this->input->post('peremail');
        $data['address']=$this->input->post('address');
        $data[' phon_no']=$this->input->post('phno');
        $data['alt_ph_no']=$this->input->post('altphno');
        $data['gender']=$this->input->post('gender');
        $data[' m_status']=$this->input->post('marrige');
        $data['dob']=$this->input->post('dob');
        $data['joining_date']=$this->input->post('doj');
        $data['comemail']=$this->input->post('coemail');
        $data['designation']=$this->input->post('deg');
        $data['salary']=$this->input->post('salary');
        $update=$this->AdminModel->update('employee',$con,$data);
        if($update)
        {
             $this->session->set_userdata('succ_msg','Employee Edited Successfully');
             redirect(base_url().'admin_control/admin/allemp');
        }
        else
        {
             $this->session->set_userdata('succ_msg','Employee Edited Successfully');
             redirect(base_url().'admin_control/admin/allemp');

        }

     // print_r($_POST);

    }

    public function createuser()
    {
      $data['Eid']=$this->input->post('emp_ide');
      $data['username']=$this->input->post('uname');
      $data['password']="Tier5";
      $data['role']=$this->input->post('roleid');

      $con['username']=$this->input->post('uname');
      $checkuser=$this->AdminModel->fetchinfo('emp_details',$con,'count');
      if($checkuser>0)
      {
         $this->session->set_userdata('err_msg','This Username Already Used');
             redirect(base_url().'admin_control/admin/setbonus');
      }
      else
      {
        $insert_item=$this->AdminModel->insert('emp_details',$data);
         if($insert_item)
         {
            $con1['id']=$data['Eid'];
            $data1['activation_status']='0';
            $update=$this->AdminModel->update('employee',$con1,$data1);
            if($update)
            {
             $this->session->set_userdata('succ_msg','User Created Successfully!!The Employee Is Active Now');
             redirect(base_url().'admin_control/admin/setbonus');
            }
            else
            {
              $this->session->set_userdata('err_msg','User Createted But Not Active');
             redirect(base_url().'admin_control/admin/setbonus');
            }
         }
         else
         {
              $this->session->set_userdata('err_msg','Try Again');
             redirect(base_url().'admin_control/admin/setbonus');
         }
       }
    }

    public function deleteshop()
    {
      $shopid=$this->input->post('shopid');
      $con['parent_id']=$shopid;
      $delete_item_of_shop=$this->AdminModel->delete($con,'items');
       
          $con1['Lnid']=$shopid;
          $delete_shop=$this->AdminModel->delete($con1,'items');
          if($delete_shop)
          {
            return true;
          }
          else
          {
            return false;
          }
    }
     public function setpointnewemp()
     {
       $data['Eid']=$this->input->post('emp_idd');
       $data['points']=$this->input->post('newapoint');
       $data['last_update']=date('Y-m-d');
       $insert_item=$this->AdminModel->insert('point_history',$data);
       if($insert_item)
       {
          $this->session->set_userdata('succ_msg','Point Added Successfully!!');
           redirect(base_url().'admin_control/admin/setbonus');
       }
       else
       {
            $this->session->set_userdata('err_msg','Try Again');
           redirect(base_url().'admin_control/admin/setbonus');
       }
     }

     public function setlbonus()
     { 
      $data['Eid']=$this->input->post('emp_id');
       $data['Lunch_bonus']=$this->input->post('newpoint');
       $data['last_update']=date('Y-m-d');
       $insert_item=$this->AdminModel->insert('lunch_bonus',$data);
       if($insert_item)
       {
          $this->session->set_userdata('succ_msg','Lunch Bonus Successfully!!');
           redirect(base_url().'admin_control/admin/setbonus');
       }
       else
       {
            $this->session->set_userdata('err_msg','Try Again');
           redirect(base_url().'admin_control/admin/setbonus');
       }

     }
    public function showallitem()
    {
       $shopid=$this->input->post('shopid');
       $con['parent_id']=$shopid;
       $getitem=$this->AdminModel->fetchinfo('items',$con,'result');

         $result="";
         foreach ($getitem as $row)
          {
          echo "<tr><td>".$row['item']."</td><td>".$row['cost']."</td><td>".$row['limit1']."</td><td><input type='button' class='btn btn-danger glyphicon glyphicon-trash' value='Delete' onclick='deleteitem(".$row['Lnid'].",".$shopid.")'></td></tr>";
          }
         echo $result;
       
    }

    public function additem()
    {
      $data['item']=$this->input->post('itemname');
      $data['cost']=$this->input->post('itemcost');
      $data['limit1']=$this->input->post('itemlimit');
      $data['parent_id']=$this->input->post('shopselect');
      $data['status']=0;

      if($data['item'] && $data['cost'] && $data['limit1'] && $data['parent_id'] )
      {
        $insert_item=$this->AdminModel->insert('items',$data);
        if($insert_item)
        {
           $this->session->set_userdata('succ_msg','Item Added Successfully,Check Item List');
           redirect(base_url().'admin_control/admin/addlunchitem');
        }
      }
      
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
    
    public function deleteitem()
    {
      $itemid['Lnid']=$this->input->post('itemid');
      $delete_item=$this->AdminModel->delete($itemid,'items');
      if($delete_item)
      {
        return true;
      }
      else
      {
        return false;
      }

    }
    public function show_allholyday()
    {
       if($_POST)
       {
          if($this->input->post('yearselect'))
          {
            $con=$this->input->post('yearselect');
          }
          else
          {
             $con=date('Y');
          }
          

       }
       else
       {
          $con=date('Y');
       }
       
       $data['allholiday']=$this->AdminModel->getholiday($con);
      $data['sideber']=$this->load->view('admin/includes/sideber','',true);
      $data['header']=$this->load->view('admin/includes/header','',true);
      $this->load->view('admin/show_allholyday.php',$data);

    }
    public function addholyday()
    {

      
      $data['sideber']=$this->load->view('admin/includes/sideber','',true);
      $data['header']=$this->load->view('admin/includes/header','',true);
      $this->load->view('admin/addholyday.php',$data);
    }

    public function add_holi()
    {
      $data['date']=$this->input->post('datepicker');
      $data['occation']=$this->input->post('reason');
      $insert_holi=$this->AdminModel->insert('holiday',$data);
      if($insert_holi)
      {
            $this->session->set_userdata('succ_msg','HolidayAdded Successfully,Check Holiday List');
           redirect(base_url().'admin_control/admin/addholyday');
      }
      else
      {
           $this->session->set_userdata('succ_msg','Try Again');
           redirect(base_url().'admin_control/admin/addholyday');
      }
    }
    
    public function delete_holiday()
    {
      $con['h_list']=$this->input->post('ho');
      $delete=$this->AdminModel->delete($con,'holiday');
      return $delete;

    }
    public function delete_spholiday()
    {
      $con['sp_h']=$this->input->post('ho');
      $delete=$this->AdminModel->delete($con,'specialholiday');
      return $delete;

    }
    
    public function specialholiday()
    {
      
       if($_POST)
       {
          if($this->input->post('yearselect'))
          {
            $con=$this->input->post('yearselect');
          }
          else
          {
             $con=date('Y');
          }
          

       }
       else
       {
          $con=date('Y');
       }
      $data['allspecialholiday']=$this->AdminModel->fetchallspc($con);
      $data['showallemp']=$this->AdminModel->showallemp();
      $data['sideber']=$this->load->view('admin/includes/sideber','',true);
      $data['header']=$this->load->view('admin/includes/header','',true);
      $this->load->view('admin/specialholiday.php',$data);
    }
    
    public function addspholiday()
    {
        if($_POST)
      {
            $data['Eid']=$this->input->post('name');
            $data['date']=$this->input->post('datepicker');
            $data['reason']=$this->input->post('reason');
            if($data['Eid'] && $data['date'] && $data['reason'])
            {
              $insert_spholiday=$this->AdminModel->insert('specialholiday',$data);
              if($insert_spholiday)
              {
                 $this->session->set_userdata('succ_msg','Special Holiday Added Successfully');
                     redirect(base_url().'admin_control/admin/specialholiday');
              }
              else
              {
                $this->session->set_userdata('err_msg','Try Again!!!');
                     redirect(base_url().'admin_control/admin/specialholiday');
              }
            }
            else
            {
              $this->session->set_userdata('err_msg','All Fields Are Needed!!!');
                   redirect(base_url().'admin_control/admin/specialholiday');
            }
      }


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
    
     public function getitembyshop()
   {
      extract($_POST);
      $items="";
      //print_r($_POST);
      $data['parent_id']=$this->input->post('shopid');
      $result=$this->AdminModel->fetchinfo('items',$data,'result');
      foreach ($result as $value)
      {
            $condition="";
            $condition=($value['limit1']+$value['item']);
        $options="";
        for($y=1;$y<=$value['limit1'];$y++)
        {
                         
      $options.='<option id="limit_'.$value['Lnid'].'" value="'.$y.'">'.$y.'</option>';
                          
      }
        //print_r($value['item']);
        $items.= "<tr><td id='item_name_".$value['Lnid']."'>".$value['item']."</td><td id='item_cost_".$value['Lnid']."'>".$value['cost']."</td><td><select id='item_limit_".$value['Lnid']."'>".$options."</select></td><td><input type='button' value='Add' id='btnadd_".$value['Lnid']."' onclick='addorremove(".$value['Lnid'].",".$value['cost'].")' ></td></tr>";
      }
      echo $items;
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

      $point['points']=$this->input->post('finalpoint');
      $point['last_update']=date("Y-m-d");
      $data1['P_id']=$this->input->post('point_id');
      $update=$this->AdminModel->update('point_history',$data1,$point);
      
      //return $update;
      if($update)
      {
          $data2['Eid']=$this->input->post('empid');
          $data2['action']=$this->input->post('action');
          $data2['point']=$this->input->post('npoint');
          $data2['date']=date('Y-m-d');
          $data2['time']=date('H:i:s');
          //print_r($data2);
          $update_log=$this->AdminModel->insert('log_book',$data2);
          if($update_log)
          {
            return $update_log;
          }
          else
          {
            return false;
          }
      }
      
    }


    public function logactivity()
    {
          $data['all_log']=$this->AdminModel->logactivity();
          $data['sideber']=$this->load->view('admin/includes/sideber','',true);
          $data['header']=$this->load->view('admin/includes/header','',true);
       
          $this->load->view('admin/logactivity.php',$data);
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
        

          $con['Eid']=$this->input->post('emid');
          if($data['username'] &&  $con['Eid'] )
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

    public function prevlunchorder()
    {
       $con=$this->input->post('date');
       $get_order=$this->AdminModel->lunchinfo($con);
  
       $result="";
      foreach ($get_order as $value) 
       { 
       
        $result.="<tr>
                     <td>".$value['date']."</td>
                     <td>".$value['name']."</td>
                     <td>".$value['shopname']."</td>
                     <td>".$value['items']."</td>
                     <td>".$value['cost']."</td>
                     <td></td>
                     <td></td>
                     <td></td>
                    </tr>";
       }
      print_r($result) ;
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
      //print_r($data);
      $result=$this->AdminModel->delete($data,'lunchorder');
      if($result)
      {
          return true;
      }
      
    }
    public function sublorder()
    {
      $data['Eid']=$this->input->post('emp_id');
      $data['date']=date('Y-m-d');
      $data['shopname']=$this->input->post('shop_name');
      $data['shop_id']=$this->input->post('shop_id');
      $data['items']=$this->input->post('total_item');
      $data['cost']=$this->input->post('total_cost');
      $data['status']='0';
      
      if($data['cost']<=100)
      {
        $con['Eid']=$data['Eid'];
        $con['date']=$data['date'];
        $check=$this->AdminModel->fetchinfo('lunchorder',$con,'count');
        if($check>0)
        {
          $this->session->set_userdata('err_msg','This Employee Already Placed Lunch Order');
          redirect(base_url().'admin_control/admin/placelunch');
        }
        else
        {
          $insert_lorder=$this->AdminModel->insert('lunchorder',$data);
          if($insert_lorder)
          {
             $this->session->set_userdata('succ_msg','Lunch Order Placed Successfully');
             redirect(base_url().'admin_control/admin/placelunch');
          }
          else
          {
            $this->session->set_userdata('err_msg','Try Again');
           redirect(base_url().'admin_control/admin/placelunch');
          }
        }
        
      }
      else
      {
          $this->session->set_userdata('err_msg','Cost More Than Rs 100/-');
          redirect(base_url().'admin_control/admin/placelunch');
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
        if($_POST)
        { 
          $add['item']=$this->input->post('shopname');
          $add['cost']="0:00";
          $add['limit1']="0";
          $add['parent_id']="0";
          $add['status']="0";
          if($add['item'])
          {
          $insert_item=$this->AdminModel->insert('items',$add);
          }
        }

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
             print_r($data);
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
            else
            {
                    $this->session->set_userdata('err_msg','All Fields Are Needed');
                    redirect(base_url().'admin_control/admin/addevent');
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
            $data['comemail']=$this->input->post('coemail');
            $data['designation']=$this->input->post('deg');
            $data['salary']=$this->input->post('salary');
            $data['activation_status ']='2';

            

            if($data['name'] && $data['personal_email'] && $data['address'] && $data['phon_no'] && $data['alt_ph_no'] && $data['gender'] && $data['m_status'] && $data['dob'] && $data['joining_date'] && $data['designation'] && $data['salary'])
            {

              $new_emp=$this->AdminModel->insert('employee',$data);
              if($new_emp)
              {
                 $this->session->set_userdata('succ_msg','Employee Added Successfully');
                 redirect(base_url().'admin_control/admin/add_employee');
              }
              else
              {
                $this->session->set_userdata('err_msg','Employee Cannot Added');
                redirect(base_url().'admin_control/admin/add_employee');
              }
            
            }
            else
            {

                $this->session->set_userdata('err_msg','All Fields Are Required');
                redirect(base_url().'admin_control/admin/add_employee');
            }
            
         }

      }

      public function dailyactivity()
      {

         $con=date('Y-m-d');
         $data['present_employee']=$this->AdminModel->empclock($con);

         $data['firstbreak']=$this->AdminModel->firstbreak($con);
         $data['onfirstbreak']=$this->AdminModel->onfirstbreak($con);

         
         $data['secondbreak']=$this->AdminModel->secondbreak($con);
         $data['onsecondbreak']=$this->AdminModel->onsecondbreak($con);
         
         $data['thirdbreak']=$this->AdminModel->thirdbreak($con);
         $data['onthirdbreak']=$this->AdminModel->onthirdbreak($con);

         $data['header']=$this->load->view('admin/includes/header','',true);
         $data['sideber']=$this->load->view('admin/includes/sideber','',true);
         $this->load->view('admin/dailyactivity.php',$data);

      }

      public function emplate()
      {
        $con=date('Y-m-d');
        $data['empabsent']=$this->AdminModel->empabsent($con);
        $data['empearlyclockout']=$this->AdminModel->empearlyclockout($con);
        $data['emplateclockin']=$this->AdminModel->emplateclockin($con);
        $data['emplatebrk']=$this->AdminModel->emplatebrk($con);
        $data['header']=$this->load->view('admin/includes/header','',true);
        $data['sideber']=$this->load->view('admin/includes/sideber','',true);
        $this->load->view('admin/emplate.php',$data);

      }

      public function emplatedatecin()
      {
        $con=$this->input->post('date');
        $getattend=$this->AdminModel->emplateclockin($con);
        $result="";
        foreach ($getattend as $attend)
        {
          $result.="<tr><td>".$attend['name']."</td><td>".$attend['late_time']."</td></tr>";
        }
        echo $result;
      }

      public function empearlyclockout()
      {
        $con=$this->input->post('date');
        $getattend=$this->AdminModel->empearlyclockout($con);
        $result="";
        foreach ($getattend as $attend)
        {
          $result.="<tr><td>".$attend['name']."</td><td>".$attend['early_time']."</td></tr>";
        }
        echo $result;
      }

      public function breaklatedate()
      {
        $con=$this->input->post('date');
        $getattend=$this->AdminModel->emplatebrk($con);
        $result="";
        foreach ($getattend as $attend)
        {
          if($attend['type']==1)
          {
            $break="First Break";
          }
          else if($attend['type']==2)
          {
            $break="Second Break";
          }
          else 
          {
            $break="Third Break";
          }
          $result.="<tr><td>".$attend['name']."</td><td>".$break."</td><td>".$attend['time']."</td></tr>";
        }
        echo $result;
      }
      public function empabsentdate()
      {
        $con=$this->input->post('date');
        $getattend=$this->AdminModel->empabsent($con);
        $result="";
        foreach ($getattend as $attend)
        {
          $result.="<tr><td>".$attend['name']."</td><td>9:00:00</td></tr>";
        }
        echo $result;
      }

      public function getattendence()
      {
        extract($_POST);
        $con=$this->input->post('showdate');
        $getattend=$this->AdminModel->empclock($con);
        $result="";
        foreach ($getattend as $key)
        {
          $result.="<tr><td>".$key['name']."</td><td>".$key['clockin']."</td><td>".$key['clockout']."</td></tr>";
        }
        //$attend="<tr><td>".$getattend['name']."</td><td>""</td><td>""</td></tr>";
        print_r($result);
      }

      public function getfbreak()
      {
        extract($_POST);
        $con=$this->input->post('showdate');
        $getafbreak=$this->AdminModel->firstbreak($con);
        $result="";
        foreach ($getafbreak as $key)
        {
          $time1 = $key['starttime'];
              $time2 = $key['endtime'];

              list($hours, $minutes, $seconds) = explode(':', $time1);
              $startTimestamp = mktime($hours, $minutes, $seconds);
 
              list($hours, $minutes, $seconds) = explode(':', $time2);
              $endTimestamp = mktime($hours, $minutes, $seconds);

              $letseconds = $endTimestamp - $startTimestamp;
              $sec=($letseconds % 60);
               if($sec<10)
               {
               $sec="0".$sec;
               }
              $minutes = ($letseconds / 60) % 60;
                if($minutes<10)
               {
               $minutes="0".$minutes;
               }
              $hours = floor($letseconds / (60 * 60));
          $result.="<tr><td>".$key['name']."</td><td>".$hours.":".$minutes.":".$sec."</td></tr>";
        }
        //$attend="<tr><td>".$getattend['name']."</td><td>""</td><td>""</td></tr>";
        print_r($result);

      }

      public function getsbreak()
      {
        extract($_POST);
        $con=$this->input->post('showdate');
        $getafbreak=$this->AdminModel->secondbreak($con);
        $result="";
        foreach ($getafbreak as $key)
        {
          $time1 = $key['starttime'];
              $time2 = $key['endtime'];

              list($hours, $minutes, $seconds) = explode(':', $time1);
              $startTimestamp = mktime($hours, $minutes, $seconds);
 
              list($hours, $minutes, $seconds) = explode(':', $time2);
              $endTimestamp = mktime($hours, $minutes, $seconds);

              $letseconds = $endTimestamp - $startTimestamp;
              $sec=($letseconds % 60);
               if($sec<10)
               {
               $sec="0".$sec;
               }
              $minutes = ($letseconds / 60) % 60;
                if($minutes<10)
               {
               $minutes="0".$minutes;
               }
              $hours = floor($letseconds / (60 * 60));
          $result.="<tr><td>".$key['name']."</td><td>".$hours.":".$minutes.":".$sec."</td></tr>";
        }
        //$attend="<tr><td>".$getattend['name']."</td><td>""</td><td>""</td></tr>";
        print_r($result);

      }

       public function getlbreak()
      {
        extract($_POST);
        $con=$this->input->post('showdate');
        $getafbreak=$this->AdminModel->thirdbreak($con);
        $result="";
        foreach ($getafbreak as $key)
        {
             $time1 = $key['starttime'];
              $time2 = $key['endtime'];

              list($hours, $minutes, $seconds) = explode(':', $time1);
              $startTimestamp = mktime($hours, $minutes, $seconds);
 
              list($hours, $minutes, $seconds) = explode(':', $time2);
              $endTimestamp = mktime($hours, $minutes, $seconds);

              $letseconds = $endTimestamp - $startTimestamp;
              $sec=($letseconds % 60);
               if($sec<10)
               {
               $sec="0".$sec;
               }
              $minutes = ($letseconds / 60) % 60;
                if($minutes<10)
               {
               $minutes="0".$minutes;
               }
              $hours = floor($letseconds / (60 * 60));
          $result.="<tr><td>".$key['name']."</td><td>".$hours.":".$minutes.":".$sec."</td></tr>";
        }
        //$attend="<tr><td>".$getattend['name']."</td><td>""</td><td>""</td></tr>";
        print_r($result);

      }

      public function Fnsingleprint()
      {
        extract($_POST);
        $result='';
        $Fetch_Info=$this->AdminModel->selectprint($orderid);
          foreach($Fetch_Info as $orders)
          {
            if($orders['ord_emp']=='')
            {
        $result.= '<div class="col-sm-10"   style="border: 2px solid black;" >
                
                      <div align="left"><img src="'.base_url().'images/logo.png" alt="" width="200px" /></div><div align="right" style="padding-right:10px;">Shop Name:<span id="empshop"> '.$orders['shopname'].'</span></div>
                      </br>
                      <div style="padding-left:10px;"> Employee Name:<span id="empname"> '.$orders['name'].'</span></div>
                      <br>
                      <br>
                      <div style="padding-left:10px;"> Lunch Items:<span id="emplunch"> '.$orders['items'].'</span></div><div align="right" style="padding-right:10px;">Total Cost:<span id="empcost"> '.$orders['cost'].'</span></div>
                  
                     <div style="padding-left:10px;">  Date:<span id="empdate"> '.date('d/m/Y',strtotime($orders['date'])).'</span></div>
                      </br>
                      </br>
                      </br>

                      <div align="right"> Authorized Signature...............................................<img src="'.base_url().'images/logo.png" alt="" width="50px"  /></div>
               
                       </div>';
                   }
                   else
                   {

                    $n_exp=explode(',',$orders['ord_emp']);
            $n_arr=array();
            $str='';
            /*for($i=0; $i<count($n_exp);$i++)
            {
                  $name=$this->AdminModel->FngetName($n_exp[$i]);
                array_push($n_arr,$name['name']);
              
            }*/
            $str=implode(',',$n_arr);
            $cost=count($n_exp)*$orders['cost'];
                    $result.= '<div class="col-sm-10"   style="border: 2px solid black;" >
                
                      <div align="left"><img src="'.base_url().'images/logo.png" alt="" width="200px" /></div><div align="right" style="padding-right:10px;">Shop Name:<span id="empshop"> '.$orders['shopname'].'</span></div>
                      </br>
                      <div style="padding-left:10px;"> Employee Name:<span id="empname"> '.$str.'</span></div>
                      <br>
                      <br>
                      <div style="padding-left:10px;"> Lunch Items:<span id="emplunch"> '.$orders['items'].'</span></div><div align="right" style="padding-right:10px;">Per head Cost:<span id="empcost"> '.$orders['cost'].'</span></div><div align="right" style="padding-right:10px;">Total Cost:<span id="empcost"> '.$cost.'</span></div>
                  
                     <div style="padding-left:10px;">  Date:<span id="empdate"> '.date('d/m/Y',strtotime($orders['date'])).'</span></div>
                      </br>
                      </br>
                      </br>

                      <div align="right"> Authorized Signature...............................................<img src="'.base_url().'images/logo.png" alt="" width="50px"  /></div>
               
                       </div>';
                   }

            }
            
            echo $result;
    }

    public function FnfetchAllOrder()
    {


      $data['date']=$this->input->post('date');
        $data['status']=0;


      $all_order=$this->AdminModel->FnAllorder($data);

      //echo '<pre>';print_r($all_order);
      $result='';
      if(!empty($all_order))
      {
      foreach($all_order as $orders)
      {
        if($orders['ord_emp']=='')
        {
         $result.= '<div class="col-sm-10"   style="border: 2px solid black;" >
                
                      <div align="left"><img src="'.base_url().'images/logo.png" alt="" width="200px" /></div><div align="right" style="padding-right:10px;">Shop Name:<span id="empshop"> '.$orders['shopname'].'</span></div>
                      </br>
                      <div style="padding-left:10px;"> Employee Name:<span id="empname"> '.$orders['name'].'</span></div>
                    
                      <br>
                      <br>
                      <div style="padding-left:10px;"> Lunch Items:<span id="emplunch"> '.$orders['items'].'</span></div><div align="right" style="padding-right:10px;">Total Cost:<span id="empcost"> '.$orders['cost'].'</span></div>
                  
                      <div style="padding-left:10px;"> Date:<span id="empdate"> '.date('d/m/Y',strtotime($orders['date'])).'</span></div>
                      </br>
                      </br>
                      </br>

                      <div align="right"> Authorized Signature...............................................<img src="'.base_url().'images/logo.png" alt="" width="50px"  /></div>
               
                       </div>';

                 $result.= '&nbsp;&nbsp;<div style="margin-top:5px;"></div>';
             }
             else
             {
              if(strpos($orders['ord_emp'], ',') !== false)
              {
                 $n_exp=explode(',',$orders['ord_emp']);
            $n_arr=array();
            $str='';
            for($i=0; $i<count($n_exp);$i++)
            {
                  $name=$this->AdminModel->FngetName($n_exp[$i]);
                array_push($n_arr,$name['name']);
              
            }
            $str=implode(',',$n_arr);
            $cost=count($n_exp)*$orders['cost'];
                $result.= '<div class="col-sm-10"   style="border: 2px solid black;" >
                
                      <div align="left"><img src="'.base_url().'images/logo.png" alt="" width="200px" /></div><div align="right" style="padding-right:10px;">Shop Name:<span id="empshop"> '.$orders['shopname'].'</span></div>
                      </br>
                      <div style="padding-left:10px;"> Employee Name:<span id="empname"> '.$str.'</span></div>
                    
                      <br>
                      <br>
                      <div style="padding-left:10px;"> Lunch Items:<span id="emplunch"> '.$orders['items'].'</span></div><div align="right" style="padding-right:10px;">Per Head Cost:<span id="empcost"> '.$orders['cost'].'</span></div><div align="right" style="padding-right:10px;">Total Cost:<span id="empcost"> '.$cost.'</span></div>
                  
                      <div style="padding-left:10px;"> Date:<span id="empdate"> '.date('d/m/Y',strtotime($orders['date'])).'</span></div>
                      </br>
                      </br>
                      </br>

                      <div align="right"> Authorized Signature...............................................<img src="'.base_url().'images/logo.png" alt="" width="50px"  /></div>
               
                       </div>';

                 $result.= '&nbsp;&nbsp;<div style="margin-top:5px;"></div>';
              }
          
             }

      }
        //$result.='<a id="printfinalAll" class="btn btn-danger btn-md glyphicon glyphicon-print" >Print</a>';
        }
      echo $result;

    }


    public function selectprint()
    {
      extract($_POST);
      //$data=$orderid;
      //print_r($orderid);
      $result='';
      
      for($i=0;$i<count($orderid);$i++)
      {
      $all_order=$this->AdminModel->selectprint($orderid[$i]);
        if(!empty($all_order))
      {

      foreach($all_order as $orders)
      {

        if($orders['ord_emp']!='' && strpos($orders['ord_emp'], ',') !== false)
        {
          
        
                    $n_exp=explode(',',$orders['ord_emp']);
            $n_arr=array();
            $str1='';
            for($k=0; $k<count($n_exp);$k++)
            {
                  $name=$this->AdminModel->FngetName($n_exp[$k]);
                array_push($n_arr,$name['name']);
              
            }
            $str1=implode(',',$n_arr);
            $cost=count($n_exp)*$orders['cost'];
            
            
                 $result.= '<div class="col-sm-10" style="border: 2px solid black;" >
                
                      <div align="left"><img src="'.base_url().'images/logo.png" alt="" width="200px" /></div><div align="right" style="padding-right:10px;">Shop Name:<span id="empshop"> '.$orders['shopname'].'</span></div>
                      </br>
                      <div style="padding-left:10px;"> Employee Name:<span id="empname"> '.$str1.'</span></div>
                    
                      <br>
                      <br>
                      <div style="padding-left:10px;"> Lunch Items:<span id="emplunch"> '.$orders['items'].'</span></div><div align="right" style="padding-right:10px;">Per Head Cost:<span id="empcost"> '.$orders['cost'].'</span></div><div align="right" style="padding-right:10px;">Total Cost:<span id="empcost"> '.$cost.'</span></div>
                  
                      <div style="padding-left:10px;"> Date:<span id="empdate"> '.date('d/m/Y',strtotime($orders['date'])).'</span></div>
                      </br>
                      </br>
                      </br>

                      <div align="right"> Authorized Signature...............................................<img src="'.base_url().'application/views/img/logo.png" alt="" width="50px"  /></div>
               
                       </div>';

                  $result.= '&nbsp;&nbsp;<div style="margin-top:5px;"></div>';
          

             }
             else
             {
              
                  $result.= '<div class="col-sm-10"   style="border: 2px solid black;" >
                
                      <div align="left"><img src="'.base_url().'images/logo.png" alt="" width="200px" style="-webkit-print-color-adjust: exact;"/></div><div align="right" style="padding-right:10px;">Shop Name:<span id="empshop"> '.$orders['shopname'].'</span></div>
                      </br>
                      <div style="padding-left:10px;"> Employee Name:<span id="empname"> '.$orders['name'].'</span></div>
                      <br>
                      <br>
                      <div style="padding-left:10px;">  Lunch Items:<span id="emplunch"> '.$orders['items'].'</span></div><div align="right" style="padding-right:10px;">Total Cost:<span id="empcost"> '.$orders['cost'].'</span></div>
                  
                     <div style="padding-left:10px;">  Date:<span id="empdate"> '.date('d/m/Y',strtotime($orders['date'])).'</span></div>
                      </br>
                      </br>
                      </br>

                      <div align="right"> Authorized Signature...............................................<img src="'.base_url().'images/logo.png" alt="" width="50px"  /></div>
               
                       </div>';
                                          
                 $result.= '&nbsp;&nbsp;<div style="margin-top:5px;"></div>';
                
          

              
             }

      }
        //$result.='<a id="printfinalAll" class="btn btn-danger btn-md glyphicon glyphicon-print" >Print</a>';
        }

      }
        echo $result;
       
    
    }

}
?>