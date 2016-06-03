<?php
Class CronjobModel extends CI_Model
{

    Public function __construct()
    {
      parent::__construct();
      //$this->load->database();
    }


    public function showTable()
    {
      $this->db->select('*');
      $this->db->where('employee.activation_status',0);
      //$this->db->where('emp_details.role >',0);
      $result = $this->db->get('employee');
      return $result->result_array();
    }


    public function fetchinfo($tbl,$con,$type)
    {
        $this->db->select('*');
        if($con)
        {
            $this->db->where($con);
        }
            $res=$this->db->get($tbl);
        if($type=="row")
        {
          return $result=$res->row_array();
        }
        if($type=="count")
        {
          return $result=$res->num_rows();
        }
        if($type=="result")
        {
          return $result=$res->result_array();
        }

    }
//======Cron Job For Reset Lunch Bonus Monthly========================
public function insertemployee($data)
{
   if($result = $this->db->insert('lunch_bonus', $data))
    {
    return $result;
    }
}

//======Cron Job For Reset Attendance BonusMonthly========================
public function resetattendance($data)
{
 if($result = $this->db->insert('point_history', $data))
  {
  return $result;
  }
}
//==============Calculate Per Day Lunch Bonus===========================

public function getlunchbonus($emp)
{


$today=date("Y-m-d");
$first_day=date('d-m-Y', strtotime('first day of this month'));

$this->db->select('*');
$this->db->where('Eid',$emp);
$this->db->where('last_update BETWEEN "'. date('Y-m-d', strtotime($first_day)). '" and "'. date('Y-m-d', strtotime($today)).'"');
$res = $this->db->get('lunch_bonus');
$result=$res->row_array();
return $result;


}

public function update_lunch_bonus($con,$updata)
{
$this->db->where($con);
$res=$this->db->update('lunch_bonus',$updata);

if($res)
{
return true;
}

}

public function insertabsent($data3)
{

if($result = $this->db->insert('tbl_late_emp', $data3))
{
return $result;
}
}

public function deduct($data4)
{
$data['Eid']=$data4['Eid'];
$start_date=date("Y-m-d", strtotime(date('m').'/01/'.date('Y')));
$end_date=date("Y-m-d");


$this->db->select('*');
$this->db->where('Eid',$data['Eid']);
$this->db->where('last_update BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
$res = $this->db->get('point_history');
$point=$res->row_array();
$new['points']=$point['points']-1000;
$new['last_update']=date("Y-m-d");
$con['P_id']=$point['P_id'];
$this->db->where($con);
$res=$this->db->update('point_history',$new);
return $this->db->affected_rows();
}
}