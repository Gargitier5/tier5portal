&lt;?php 
   Class CronjobModel extends CI_Model 
   { 
	
      Public function __construct() 
      { 
         parent::__construct(); 
         //$this-&gt;load-&gt;database();
      } 


      public function showTable()
      {

         $this-&gt;db-&gt;select('*');
         $this-&gt;db-&gt;where('activation_status',0);
      	 $result = $this-&gt;db-&gt;get('employee');
      	 return $result-&gt;result_array();
      }


      



    

    

      public function fetchinfo($tbl,$con,$type)
          {
            $this-&gt;db-&gt;select('*');
            if($con)
            {
            $this-&gt;db-&gt;where($con);
            }
            $res=$this-&gt;db-&gt;get($tbl);
            if($type=="row")
            {
            return  $result=$res-&gt;row_array();
            }
             if($type=="count")
            {
            return  $result=$res-&gt;num_rows();
            }
             if($type=="result")
            {
            return  $result=$res-&gt;result_array();
            }

          }
 //======Cron Job For Reset Lunch Bonus Monthly========================     
      public function insertemployee($data)
      {
         if($result = $this-&gt;db-&gt;insert('lunch_bonus', $data))
        {
          return $result;
        }
      }

//======Cron Job For Reset Attendance Bonus Monthly========================     
      public function resetattendance($data)
      {
         if($result = $this-&gt;db-&gt;insert('point_history', $data))
        {
          return $result;
        }
      }
//==============Calculate Per Day Lunch Bonus===========================

     public function getlunchbonus($emp)
     {

       
        $today=date("Y-m-d");
        $first_day=date('d-m-Y', strtotime('first day of this month'));  
        
        $this-&gt;db-&gt;select('*');
        $this-&gt;db-&gt;where('Eid',$emp);
        $this-&gt;db-&gt;where('last_update BETWEEN "'. date('Y-m-d', strtotime($first_day)). '" and "'. date('Y-m-d', strtotime($today)).'"');
        $res = $this-&gt;db-&gt;get('lunch_bonus');
        $result=$res-&gt;row_array();
        return $result;


     }

    public function update_lunch_bonus($con,$updata)
    {  
          $this-&gt;db-&gt;where($con);
          $res=$this-&gt;db-&gt;update('lunch_bonus',$updata);

          if($res)
          {
            return true;
          }
               
    }

    public function insertabsent($data3)
    {
      
        if($result = $this-&gt;db-&gt;insert('tbl_late_emp', $data3))
        {
          return $result;
        }
    }

    public function deduct($data4)
    {
      $data['Eid']=$data4['Eid'];
      $start_date=date("Y-m-d", strtotime(date('m').'/01/'.date('Y')));
      $end_date=date("Y-m-d");


      $this-&gt;db-&gt;select('*');
      $this-&gt;db-&gt;where('Eid',$data['Eid']);
      $this-&gt;db-&gt;where('last_update BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
      $res = $this-&gt;db-&gt;get('point_history');
      $point=$res-&gt;row_array();
      $new['points']=$point['points']-1000;
      $new['last_update']=date("Y-m-d");
      $con['P_id']=$point['P_id'];
      $this-&gt;db-&gt;where($con);
      $res=$this-&gt;db-&gt;update('point_history',$new);
      return $this-&gt;db-&gt;affected_rows();
    }
}
