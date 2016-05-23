<?php
/* 
 * Library: Booking_calendar
 * Description: Generate calendar for bookings for each villas. 
 * Author: Tier5 Technology Solutions Pvt. Ltd.
 * Author URL: http://tier5.in
 * Version: 1.0
 * License: GPL2
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Villa_booking_calendar {
    // @cell_num : total no of cell that has to b displayed
    protected $cell_num = 42;
    // @years_upto : total number of years for that has to be displayed into the naviagation panel
    protected $years_upto = 10;
    // @time : time is a unix timestamp
    protected $time;
    // @day : day is always starts from 1 i.e month statrs from first date
    protected $day = 1;
    // @month: describes the month.
    protected $month;
    // @year: describes the year.
    protected $year;
    // @CI: instance of codeigniter class to load any library, model or helper into this library.
    protected $CI;
    // @booking_dates: Array of all dates those are booked
    protected $event_date = array();
    // @prices: Array of all dates and corrosponding prices those are updated
    protected $prices = array();
    // @dates: Array of all dates those booking price has been updated
    protected $dates = array();
    // @villa_id: id of the villa
    protected $villa_id = null;

    public function __construct() {
        $this->CI = & get_instance();
        //$this->CI->load->model('Bookings_model');
        //$this->villa_id = $param['villa_id'];
    }

    public function get_current_time(){
        return time();
    }
    
    public function get_time(){
        return $this->time;
    }
    
    public function set_time($time){
        return $this->time = $time;
    }
    
    public function get_month($time = FALSE){
        if(!$time){
            $time = $this->get_current_time();
            return $this->month = date('m', $time);
        }
        return $this->month = date('m', $time);
    }
    
    public function get_month_name_from_number($monthNumber){
        $monthNum  = $monthNumber;
        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
        return $dateObj->format('F');
    }

    public function get_year($time = FALSE){
        if(!$time){
            $time = $this->get_current_time();
            return $this->year = date('Y', $time);
        }
        return $this->year = date('Y', $time);
    }
    
    public function get_dayName($time){
        return mb_strimwidth(date('D', $time), 0, 1);
    }

    public function make_time($day, $month, $year){
        return mktime(0,0,0,$month,$day,$year);
    }
    
    public function days_in_month($month, $year){
        return cal_days_in_month(0, $month, $year);
    }
    
    public function get_villa(){
//        return $this->CI->Bookings_model->get_row('tortugas_villas', array('id_villa' => $this->villa_id, 'villa_status' => 1));
    }
    
    public function get_villa_min_price(){
        $villa = $this->get_villa();
        return $villa->villa_min_price;
    }
    
    public function get_villa_prices(){
        //$villaPriceDetails = get_villaPrices_json($this->villa_id);
        //return $this->prices = $villaPriceDetails['prices'];
    }
    
    public function get_villa_dates(){
        //$villaPriceDetails = get_villaPrices_json($this->villa_id);
        //return $this->dates = $villaPriceDetails['dates'];
    }

    public function get_booking(){
        //return get_bookings($this->villa_id);
    }
    
    public function get_dates($start, $end, $first_time){
        if($first_time){
            array_push($this->booking_dates, $start);
        }
        if($start <> $end){
            $date = new DateTime($start);
            $date->add(new DateInterval('P1D'));
            $en = $date->format('Y-m-d');
            array_push($this->booking_dates, $en);
            return $this->get_dates($en, $end, false);
        }else{
            return false;
        }
    }
    
    public function get_booking_dates($booking_dates){
        $this->booking_dates = array();
        if(is_array($booking_dates) && !empty($booking_dates)){
            foreach($booking_dates as $date){
                $start = date(DATE_DATABASE_FORMAT, strtotime($date['start']));
                $end = date(DATE_DATABASE_FORMAT, strtotime($date['end']));
                $this->get_dates($start, $end, TRUE);
            }
            return $this->booking_dates;
        }
        return array();
    }
    
    public function getAllMonths($selected = '', $year){
        $options = '';
        $cur_month = date('m');
        $cur_year = date("Y");
        $cur_date_first =  mktime(0, 0, 0, $cur_month, 1, $cur_year);
        for($i = 1; $i <= 12; $i++){
            $value = ($i < 10) ? '0'.$i : $i;
            $selectedOpt = ($value == $selected) ? 'selected' : '';
            $loop_date = mktime(0, 0, 0, $i, 1, $year);
            $diasbled = ($cur_date_first > $loop_date) ? 'disabled' : '';
            $options .= '<option '.$diasbled.' value="'.$value.'" '.$selectedOpt.' >'.date("F", mktime(0, 0, 0, $i+1, 0, 0)).'</option>';
        }
        
        return $options;
    }
    
    public function getYearList($selected = ''){
        $options = '';
        $cur_year = date("Y");
        $upto = $cur_year + $this->years_upto;
        for($i = $cur_year; $i <= $upto; $i++){
            $selectedOpt = ($i == $selected) ? 'selected' : '';
            $options .= '<option value="'.$i.'" '.$selectedOpt.' >'.$i.'</option>';
        }
        
        return $options;
    }
    
    public function getMonthSelectBox($month, $year){
        $select = '<select name="month_dropdown" class="month_dropdown dropdown">';
        $select .= $this->getAllMonths($month, $year);
        $select .= '</select>';
        
        return $select;
    }
    
    public function getYearSelectBox($year){
        $select = '<select name="year_dropdown" class="year_dropdown dropdown">';
        $select .= $this->getYearList($year);
        $select .= '</select>';
        
        return $select;
    }

    public function render_booking_calendar($year = '', $month = ''){
        if(empty($year))
            $year = date('Y');
        
        if(empty($month))
            $month = date('m');
        
        $calendar = '<div id="calender_section">';
        $calendar .= $this->render_booking_calendar_navigation($year, $month);
        $calendar .= '<div class="calendar-wrapper">';
        $calendar .= $this->render_booking_calendar_header($year, $month);
        $calendar .= $this->render_booking_calendar_dates($year, $month);
        $calendar .= '</div>';
        $calendar .= '</div>';
        
        return $calendar;
    }
    
    public function render_booking_calendar_navigation($year, $month){
        $date = $year.'-'.$month.'-01';
        $cur_month = date('m');
        $cur_year = date("Y");
        $upto = $cur_year + $this->years_upto;
        $cur_date_first =  mktime(0, 0, 0, $cur_month, 1, $cur_year);
        $nav_month = mktime(0, 0, 0, $month -1, 1, $year);
        $nav_year = mktime(0, 0, 0, $month, 1, $upto + 1);
        
        $html = '<div class="bc-navigation">';
        if(($cur_date_first <= $nav_month))
            $html .= '<a href="javascript:void(0);" class="cal-navi" data-month="'.date('m', strtotime($date. '- 1 Month')).'" data-year="'.date('Y', strtotime($date. '- 1 Month')).'">&lt;&lt; Previous</a>';
        $html .= '&nbsp;&nbsp;&nbsp;&nbsp;';
        if(($date <> $upto.'-12-01'))
            $html .= '<a href="javascript:void(0);" class="cal-navi" data-month="'.date('m', strtotime($date. '+ 1 Month')).'" data-year="'.date('Y', strtotime($date. '+ 1 Month')).'">Next &gt;&gt;</a>';
        $html .= '</div>';
        $html .= '<div class="bc-month">';
        $html .= $this->get_month_name_from_number($month).", $year";
        $html .= '</div>';
        $html .= '<div class="bc-navigation-month">';
        $html .= $this->getMonthSelectBox($month, $year);
        $html .= $this->getYearSelectBox($year);
        $html .= '</div>';
        
        return $html;
    }
    
    public function render_booking_calendar_header(){
        $html = '<div id="calender_section_top">';
        $html .= '<ul class="calender-days">';
        $html .= '<li>Sun</li>';
        $html .= '<li>Mon</li>';
        $html .= '<li>Tue</li>';
        $html .= '<li>Wed</li>';
        $html .= '<li>Thu</li>';
        $html .= '<li>Fri</li>';
        $html .= '<li>Sat</li>';
        $html .= '</ul>';
        $html .= '</div>';
        
        return $html;
    }

    public function get_event_date()
    {
      $CI=& get_instance();
      $CI->load->database(); 

      $CI->db->select('*');
      $res = $CI->db->get('tbl_event_informations');
      $result=$res->result_array();  
      return $result;   
    }

    public function check_date($results, $cur_month, $cur_date)
    {
      if(!empty($results)){
        foreach ($results as $result) {
            # code...
            $date_arr = explode('-', $result['date']);
            /*print_r($date_arr);*/
            /*$month = $date_arr[1];
            $date = $date_arr[2];*/
            if($cur_month == $date_arr[1] && $cur_date == $date_arr[2]){
                return $result['EventId'];
                break;
            }

        }
      } 
      return false;
    }
    

    public function render_booking_calendar_dates($year, $month){
        $event_date=$this->get_event_date();
        /*echo '<pre>';
        print_r($this->check_date($event_date, '05', '11'));
        die();*/

        /*echo '<pre>';
        print_r($event_date);
        die();*/

        //$updated_date_prices = $this->get_villa_prices();
        //$updated_dates = $this->get_villa_dates();
        //$bookings = $this->get_booking($this->villa_id); // get the booking start dates and end dates for that villa id
        //$booking_dates = $this->get_booking_dates($bookings); // get all the booked dates
        $dateYear = $year;
        $dateMonth = $month;
        $date = $year.'-'.$month.'-01';
        $currentMonthFirstDay = date("N",strtotime($date));
        $totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN,$dateMonth,$dateYear);
        $totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7) ? ($totalDaysOfMonth) : ($totalDaysOfMonth + $currentMonthFirstDay);
        $boxDisplay = $this->cell_num;
        $back_days = $currentMonthFirstDay;
        $dayCount = 1; 
        $increment = 1;
        
        $html = '<div id="calender_section_bot">';
        $html .= '<ul>';
        for($cb = 1; $cb <= $boxDisplay; $cb++){
            if(($cb >= $currentMonthFirstDay+1 || $currentMonthFirstDay == 7) && $cb <= ($totalDaysOfMonthDisplay)){
                if($dayCount <= 9)
                    $dayCount = '0'.$dayCount;
                $currentDate = $dateYear.'-'.$dateMonth.'-'.$dayCount;
                $eventNum = 0;
                $class = (strtotime(date('Y-m-d')) > strtotime($currentDate)) ? 'bc-past' : 'bc-current';
                $class .= (date('Y-m-d') == $currentDate) ? ' bc-today' : '';
                $class .= (strtotime(date('Y-m-d')) > strtotime($currentDate)) ? '' : ' date_cell';
                $html .= '<li data-date="'.$currentDate.'" class="'.$class.' bc-available">';
                $html .= "<span>$dayCount</span>";
                //var_dump($this->check_date($event_date, $dateMonth, $dayCount));
                if($event = $this->check_date($event_date, $dateMonth, $dayCount)){
                    $html .= "<span class='event-show'>Event</span>";                   
                }
                $html .= '</li>';
                $dayCount++;
            }else{ // not required. keep it for now
                $dispaly_date = '&nbsp;';
                if(($cb < ($currentMonthFirstDay + 1) && $currentMonthFirstDay <> 7)){
                    $date_prev = new DateTime($date);
                    $date_prev->sub(new DateInterval("P".$back_days."D"));
                    $dispaly_date = $date_prev->format('d');
                    $data_date = $date_prev->format('Y-m-d');
                    $back_days--;
                    $class = (strtotime(date('Y-m-d')) > strtotime($data_date)) ? 'bc-past' : 'date_cell';
                    if(in_array($data_date, $event_date)){
                        $html .= "<li data-date='$data_date' class='$class bc-unavailable bc-booked bc-other-month'>";
                        $html .= "<span>$dispaly_date</span>";
                        $html .= "<p>Booked</p>";
                        $html .= '</li>';
                    }else{
                        $html .= "<li data-date='$data_date' class='$class bc-available bc-other-month'>";
                        $html .= "<span>$dispaly_date</span>";
//                        $html .= "<p>Available</p>";
//                        if(in_array($data_date, $updated_dates)){
//                            foreach($updated_date_prices as $val){
//                                if($val['date'] == $data_date){
//                                    $price = $val['price'];
//                                }
//                            }
//                        }else{
//                           $price = $this->get_villa_min_price();
//                        }
//                        $html .= "<p>$$price</p>";
                        $html .= '</li>';
                    }
                }else if($cb > ($totalDaysOfMonthDisplay)){
                    $remaining_row = ($this->cell_num - $totalDaysOfMonthDisplay);
                    $date_last = date('Y-m-t', strtotime($date));
                    $date_next = new DateTime($date_last);
                    $date_next->add(new DateInterval("P".$increment."D"));
                    $dispaly_date = $date_next->format('d');
                    $data_date = $date_next->format('Y-m-d');
                    $increment++;
                    if(in_array($data_date, $event_date)){
                        $html .= "<li data-date='$data_date' class='bc-future bc-unavailable bc-booked bc-other-month'>";
                        $html .= "<span>$dispaly_date</span>";
                        $html .= "<p>Booked</p>";
                        $html .= '</li>';
                    }else{
                        $html .= "<li data-date='$data_date' class='date_cell bc-future bc-available bc-other-month'>";
                        $html .= "<span>$dispaly_date</span>";
                        /*$html .= "<p>Available</p>";
                        if(in_array($data_date, $updated_dates)){
                            foreach($updated_date_prices as $val){
                                if($val['date'] == $data_date){
                                    $price = $val['price'];
                                }
                            }
                        }else{
                           $price = $this->get_villa_min_price();
                        }
                        $html .= "<p>$$price</p>";*/
                        $html .= '</li>';
                    }
                }else{
                    $html .= "<li><span>$dispaly_date</span></li>";
                }
            }
        }
        $html .= '</ul>';
        
        return $html;;
    }
    
}