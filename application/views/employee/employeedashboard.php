
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tier5</title>
    <link rel=icon href="http://tier5.us/images/favicon.ico">
    <base href="<?php echo base_url();?>">

     <script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>

         <script type="text/javascript">
      var BASE_URL = "<?php echo (is_https() ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'].substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_FILENAME'])))?>";
    </script>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/booking-calendar.css" rel="stylesheet">
    <link href="css/custom2.css" rel="stylesheet">
    <!-- jQuery -->
  

     <script type="text/javascript" src="js/employee.js"></script>
      
   <script type="text/javascript" src="js/booking-calendar.js"></script> 

    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">

    <style type="text/css">

    ::selection{ background-color: #E13300; color: white; }
    ::moz-selection{ background-color: #E13300; color: white; }
    ::webkit-selection{ background-color: #E13300; color: white; }

    </style>



    <!-- For Chart -->

   

   <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Dinosaur', 'Length'],
          ['Acrocanthosaurus (top-spined lizard)', 12.2],
          ['Albertosaurus (Alberta lizard)', 9.1],
          ['Allosaurus (other lizard)', 12.2],
          ['Apatosaurus (deceptive lizard)', 22.9],
          ['Archaeopteryx (ancient wing)', 0.9],
          ['Argentinosaurus (Argentina lizard)', 36.6],
          ['Baryonyx (heavy claws)', 9.1],
          ['Brachiosaurus (arm lizard)', 30.5],
          ['Ceratosaurus (horned lizard)', 6.1],
          ['Coelophysis (hollow form)', 2.7],
          ['Compsognathus (elegant jaw)', 0.9],
          ['Deinonychus (terrible claw)', 2.7],
          ['Diplodocus (double beam)', 27.1],
          ['Dromicelomimus (emu mimic)', 3.4],
          ['Gallimimus (fowl mimic)', 5.5],
          ['Mamenchisaurus (Mamenchi lizard)', 21.0],
          ['Megalosaurus (big lizard)', 7.9],
          ['Microvenator (small hunter)', 1.2],
          ['Ornithomimus (bird mimic)', 4.6],
          ['Oviraptor (egg robber)', 1.5],
          ['Plateosaurus (flat lizard)', 7.9],
          ['Sauronithoides (narrow-clawed lizard)', 2.0],
          ['Seismosaurus (tremor lizard)', 45.7],
          ['Spinosaurus (spiny lizard)', 12.2],
          ['Supersaurus (super lizard)', 30.5],
          ['Tyrannosaurus (tyrant lizard)', 15.2],
          ['Ultrasaurus (ultra lizard)', 30.5],
          ['Velociraptor (swift robber)', 1.8]]);

        var options = {
          title: 'Lengths of dinosaurs, in meters',
          legend: { position: 'none' },
        };
        var options = {
    title: 'Country Populations',
    legend: { position: 'none' },
    colors: ['#fff'],
    backgroundColor: '#466E74',
    legendTextStyle: { color: '#FFF' },
    titleTextStyle: { color: '#FFF' },
    hAxis: {
      color: '#FFF',
    },

      chartArea: {
                backgroundColor: '#466E74'
            },
  };

        var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>-->


     <!-- For Chart -->
</head>

  <body>
  <input type="hidden" id="session_user" value="<?php echo $this->session->userdata('emp_name');?>">
  <input type="hidden" id="from_id" value="<?php echo $this->session->userdata('uid');?>">
    <section class="header">
      <div class="container-fluid">
        <div class="row">
        <input type="hidden" id="username" value="<?php echo $this->session->userdata('emp_name');?>">
            <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="logo"><a href="#"><img src="images/tier5.png" alt="Tier5"></a></div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                 <div class="dropdown">
                  <?php 
                   $type=$this->session->userdata('role');
                   if($type==3)
                   {?>
                  <span class="bdm"><a href="employee_control/employee/bdmaccess">BDM</a></span>
                  <?php }?>
                  <span class="dropdown-toggle" type="button" data-toggle="dropdown">Welcome <?php echo $emp_details['name'];?>
                  <span class="caret"></span></span>
                  <ul class="dropdown-menu">

                      <div class="profile-pic">
                        <img src="images/profile-pic.jpg" alt="img">
                      </div>
                      <!-- <button class="btn log-btn">Edit Profile</button> -->
                      <form action="employee_control/Employee/logout" method="post">
                
                            <input type="submit" value="logout" class="btn log-btn"></input>
                         
                      </form>
                      

                  </ul>
                 </div>


            </div>
            


        </div>  
      </div>  
    </section> 
    <section class="bodypart">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-5 col-md-5 col-sm-5 col">
            <div class="row">
              <div class="col-md-12">
            <div class="box dashboard">
              <h2>Dashboard</h2>
              <div class="dashboard-main">
              <div class="row dashboard-details">
                <div class="col-md-9 col-xs-9">
                    Your total points 
                </div>
                <div class="col-md-3 col-sm-3 col-xs-3 dashboard-right">
                  <span class="points"><?php echo $points['points'] ?></span>
                </div>

              </div> 
              <div class="row dashboard-details">
                <div class="col-md-9 col-xs-9">
                  Monthly lunch allowance
                </div>
                <div class="col-md-3 col-xs-3 dashboard-right">
                  Rs <?php echo $lunch_bonus['Lunch_bonus'] ?>
                </div>

              </div>
             
                    

              <!-- <div class="row dashboard-details">
                <div class="col-md-9 col-xs-9">
                  Extra hours
                </div>
                <div class="col-md-3 col-xs-3 dashboard-right">
                  5 Hrs
                </div>

              </div> -->
              <!-- <div class="row dashboard-details">
                <div class="col-md-9 col-xs-9">
                  Total hours
                </div>
                <div class="col-md-3 col-xs-3 dashboard-right">
                  45 Hrs
                </div>

              </div> -->
              <!-- <div class="row dashboard-details">
                <div class="col-md-9 col-xs-9">
                  Holiday list
                </div>
                <div class="col-md-3 col-xs-3 dashboard-right">
                  <a href="images/phocapdf-demo.pdf" target="blank"><img src="images/pdf.png" alt="PDF"></a>
                </div>

              </div> -->

            <!--   <div class="row dashboard-details">
                <div class="col-md-12">
                    <div id="chart_div" style="width: 100%; height: 190px;"></div>


                </div>  
              </div>  --> 

         




          
          
                            
            </div>
            </div>
          </div>
            </div>
            <div class="row">

            <div class="col-md-6 col-sm-6 padding1 no-padding">
              
            <div class="box employee-block">
              <h2>Employee of the month</h2>
             
              <h4 align="center"><?php echo $empofmonth['month'];?></h4>
              <div class="employee-main">
                  <div class="employee-pic">
                    <img src="images/employee.png" alt="img">

                  </div> 
                  <h4><?php echo $empofmonth['name'];?></h4> 
                 
              </div>  
            </div> 
            </div>

          <div class="col-md-6 col-sm-6 padding2 no-padding">
            <div class="box employee-block">
              <h2>Lunch Order</h2>
              <p>
                Please Place Lunch order before 1:15:00 PM. Lunchorder Will not be active after that.
              </p> 
                 


                  <a href="#" class="lunch-btn" data-toggle="modal" data-target="#myModal" id="show_lunch" <?php if(date('H:i:s')<="13:15:00"){ echo "style=display:block;";} else {echo "style=display:none;";}?> >Lunch Order</a>

           <!--    <a href="#" class="lunch-btn" data-toggle="modal" id="show_lunch" >Lunch Order</a> -->
              <br>
              <a class="lunch-btn" data-toggle="modal"  id="view_lunch" data-target="#lunch_modal" <?php if(date('H:i:s')<="13:15:00"){ echo "style=display:block;";} else {echo "style=display:none;";}?>>View Order</a>

           
              <!-- Modal -->
            <div id="myModal" class="modal fade lunch" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Lunch Order</h4>
                  </div>
                  <div class="modal-body">
                    <div id="succmsg" align="center"></div>
                       <div class="lunch-shop-name" id="shop_display">
                           <div class="row">
                            <?php foreach($allshop as $shop){?>
                           
                           
                               <div class="col-md-4 col-md-4">
                                  <div class="lunch-shop">
                                    <div class="lunch-icon"><img src="images/lunch-icon.png" alt="img"></div>
                                    <h4><?php echo $shop['item'];?></h4>
                                    <a onclick="display_item('<?php echo $shop['Lnid'];?>','<?php echo $shop['item'];?>')">Select</a>
                                  </div>  
                               </div>

                            <?php }?>
                           </div>
                       </div>








                    <!-- lunch-shop-name ends here -->


                    <div class="lunch-shop-name" style="display:none;">
                        <div style="" id="sel_empl">
                        <center>
                        <label>Select Employee for whome you want to place order: </label>
                        <br>
                        <select multiple="" id="sel_emp" name="sel_emp">
                        <option value="1102">Kingsuk Majumder</option><option value="1103">Amit Das</option><option value="1104">Biplab Mukherjee</option><option value="1106">Shalini Diwan</option><option value="1107">Tanumoy Paul</option><option value="1108">Dibyendu Mitra Roy</option><option value="1109">Prodipto Dhar</option><option value="1111">Uday Chatterjee</option><option value="1112">Poushali Chakraborty</option><option value="1113">Anish Chakraborty</option><option value="1115">Nandita Das</option><option value="1116">Santanu Dhar</option><option value="1117">Deepak Kumar</option><option value="1118">Aunkita Nandi</option><option value="1119">Sudipta Das</option><option value="1122"></option><option value="1124">Simanta Ray</option><option value="1125">Ravi Kumar</option><option value="1128">Malay Dhar</option><option value="1129">Anirban Das</option> </select>
                        </center>
                        </div>


                    </div> 

                 <div id="item_display" style="display:none;">
                    <div class="row shopname">
                      <div class="col-md-12"> Shop Name:  <strong id="shop_name"></strong><strong id="shop_id" style="display:none"></strong> </div>


                    </div> 
                    <div class="col-md-12 err_msg" align="center"></div>

                    <div class="row lunch-type">
                      <div class="col-md-6 col-xs-6">Lunch Items:<strong id="total_item"></strong></div>
                      <div class="col-md-6 col-xs-6 cost">Total Cost: <strong id="total_cost">00</strong></div>

                    </div>  
                     <div class="row">
                      <div class="col-md-12">
                        <div id="demo">
                           <section id="examples">
      
                          <!-- content -->
                         <div class="mCustomScrollbar content1 fluid light" data-mcs-theme="inset-2-dark">
                            
                              <table class="table table-bordered table-hover table-responsive center">
                        <thead>
                          <tr>
                            <th>Select</th>
                            <th>Items</th>
                            <th>Cost</th>
                            <th>Quantity</th>
                          </tr>
                        </thead>
                        <tbody id="itembyshop">
                          
                        </tbody>
                      </table>



                          </div>
    
                  </section>
 </div>
</div>

                  <br>
                  <br>
                  <br>
                  <div class="col-md-1"></div>
                  <div class="col-md-10 col-sm-10">
                    <button type="button" class="btn btn-link pull-left" id="prev"><span></span> Prev</button>
                  <button type="submit" class="btn btn-primary pull-right" id="submitorder">Submit Lunch Order</button>
                  </div> 
                  <div class="col-md-1"></div> 
                    </div>  
                  </div>
                  </div>
                  <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div> -->
                </div>

              </div>
            </div>
            <!-- Modal -->
           <div id="lunch_modal" class="modal fade lunch" role="dialog">
                 <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Your Lunch Odred For Today!!!</h4>
        </div>
        <div class="modal-body">
            <?php if($placedorder['Liid']){ ?>   
             <table class="table table-bordered table-hover table-responsive center">
                        <thead>
                          <tr>
                            <th>Employee Name</th>
                            <th>Date</th>
                            <th>Shop Name</th>
                            <th>Items</th>
                            <th>Cost</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <th><?php echo $placedorder['name'];?></th>
                            <th><?php echo $placedorder['date'];?></th>
                            <th><?php echo $placedorder['shopname'];?></th>
                            <th><?php echo $placedorder['items'];?></th>
                            <th><?php echo $placedorder['cost'];?></th>
                            <th><button class="btn btn-success" onclick="location.href='employee_control/Employee/deletelunch/<?php echo $placedorder['Liid'];?>';">Delete</button></th>
                        </tbody>
                      </table> 
         
           <?php } else { ?>

            <table class="table table-bordered table-hover table-responsive center">
                  No Lunch Order For Today!!!

            </table> 
           <?php }?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
          </div>
          </div>
                <!--Clockout Modal Start-->
                    <div id="clockout" class="modal fade clock-out-modal" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header"  align="center">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <strong>Clock Out</strong>
                          </div>
                          <div class="modal-body" align="center">
                            
                            <strong>Do you really want to clock out?</strong>
                            <div class="yesno" align="center">
                              <button id="" class="btn break-btn btn-lg" onclick="location.href='employee_control/Employee/clockout'" name="clockinbtn" >Yes</button>
                               &nbsp;  &nbsp;  &nbsp;   &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                              <button id="no-clockout" class="btn break-btn btn-lg" >No</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Clockout Modal End-->





            </div>


          </div>
          </div>
           <div class="row"> 
             <div class="col-md-12 col-sm-12">
                <div class="box notice-board">
                    <h2>Notice Board</h2>


                  <div id="demo">
                  <section id="examples">
                    
                    <div class="content mCustomScrollbar" data-mcs-theme="minimal">
                     <ul>
                      <?php foreach ($notice as $note ){?>
                        <li>
                              <div class="col-md-12 col-xs-12" align="center">
                                <?php echo $note['subject']; ?>
                              </div>
                              <br>
                              <div class="col-md-12 col-xs-12">
                                <?php echo $note['notice']; ?>
                              </div>
                              <br>
                              <div class="col-md-12 col-xs-12" align="right">
                                <?php echo $note['date']; ?>
                              </div>
                           <br>


                        </li>  
                         <?php }?>
                        <!-- <li>
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                          
                        </li>  
                        <li>
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                          
                        </li> -->  
                     

                     </ul> 
                    </div>
                 
                  </section>
                  </div>






                  </div>
               

             </div> 
           </div> 

            
          </div>
          <div class="col-lg-5 col-md-5 col-sm-5 col">
                <div class="row ">
                <div class="col-md-12">
                  <div class="box break-block">

                    <div class="break">
                    <div class="row">
                      <div class="col-md-4 col-sm-4">Clock In:</div>
                      <div class="col-md-4 col-sm-4"><?php if($clockintime['clockin']){ echo $clockintime['clockin'];} else { echo "Please Clock In!!";} ?></div>
                      <div class="col-md-4 col-sm-4">
                        <button id="" class="btn break-btn" onclick="location.href='employee_control/Employee/clockin'" name="clockinbtn"  <?php if($clockintime['clockin']){ echo "disabled";} ?>>Clock In</button>
                      </div>
                    </div> 
                    </div> 
                    <div class="break">
                    <div class="row">
                      <div class="col-md-4 col-sm-4">Clock Out:</div>
                      <div class="col-md-4 col-sm-4"><?php if($clockintime['clockin']){ echo $clockintime['clockout'];} else { echo "";} ?></div>
                      <div class="col-md-4 col-sm-4">

                        <button id="clockout_btn" class="btn break-btn" name="clockinbtn" data-toggle="modal" data-target="#clockout">Clock Out</button>

                      </div>
                    </div> 
                    </div> 
                    <?php foreach ($allbreak as $key )
                     {?>

                      <div class="break">

                     
                     <div class="row">
                      <div class="col-md-4 col-sm-4 col-xs-4 break-type">
                       <?php echo $key['break_name']; ?>
                      </div>  

                      <div class="col-md-4 col-sm-4 col-xs-4 time-left">
                       

                        <h6 id="breakdur"> <?php  $breakinfo=breakinfo($key['break_id'],$userid); ?> <span id="hm_timer<?php echo $key['break_id']?>" class="break_span"></span><span id="counterr<?php echo $key['break_id']?>" style="color: red; font-size: 150%;"></span></h6>

                      </div>  
                      
                      <div class="col-md-4 col-sm-4 col-xs-4">
                       <button class="btn break-btn" id="breakstart_<?php echo $key['break_id']?>" onclick="Start_Break('<?php echo $key['break_id'] ?>','<?php echo $key['duration'] ?>')">Start Break</button>
                      
                      </div>  

                    </div>  
                  </div>
                      
                   <?php }?>
                  </div>  
                </div>
              </div> 

              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="box work-type">
                      <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-8">
                          

                        </div> 
                        <div class="col-md-4 col-sm-4 col-xs-4">
                          <div class="time">
                            <div id="timerr"></div>
<!-- <div id ="stop_timer" onclick="clearInterval(timerVar)">Stop time</div> -->
                          </div>  

                        </div>  
                      
                      </div>  
                      <div class="row">
                          <div class="col-md-12">
                            <div class="type-btn">
                              <ul>
                                <li>
                                  <button class="btn btn-type1"  <?php if($checkmode['type']==1){ echo "disabled";} ?> onclick="location.href='employee_control/Employee/setproduction'">Production</button>
                                </li>
                                <li>
                                  <button class="btn btn-type1"  <?php if($checkmode['type']==2){ echo "disabled";} ?> onclick="location.href='employee_control/Employee/setrnd'">R&D</button>
                                </li>
                                <li>
                                  <button class="btn btn-type1"  <?php if($checkmode['type']==3){ echo "disabled";} ?> onclick="location.href='employee_control/Employee/settraining'">Training</button>
                                </li>
                                <li>
                                  <button class="btn btn-type1"  <?php if($checkmode['type']==4){ echo "disabled";} ?> onclick="location.href='employee_control/Employee/setadmin'">Administrative</button>
                                </li>

                              </ul>  
                            </div>  
                            
                          </div>  
                      </div>  

                  </div>  
                </div>
              </div> 

              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <div class="box calender">
                    <h2>Our Calender</h2>
                    <!-- <iframe src="https://calendar.google.com/calendar/embed?title=Tier5%20Events&amp;showTitle=0&amp;showPrint=0&amp;height=400&amp;wkst=1&amp;bgcolor=%23336666&amp;src=en.indian%23holiday%40group.v.calendar.google.com&amp;color=%232952A3&amp;ctz=Asia%2FCalcutta" style="border-width:0" width="100%" height="380" frameborder="0" scrolling="no"></iframe> -->
                    <div id="calendar_div" class="table-responsive">
                        <?php echo $calendar; ?>
                    </div>
                  </div>  
                </div>
              </div>  
                
          </div>

           

          
        </div>
              <div class="col-lg-2 col-md-2 col">
              <div class="chat employee-chat">
                <ul>
               <?php foreach($userlist as $online):
    if($online['id']!= $this->session->userdata('uid')):
    ?>
                  <li>
                    <div class="user-pic">
                    <?php if($online['gender']=="Male" && $online['online_status']==1){?>
                          <img src="images/male_online.png" alt="img">
                          <?php } if($online['gender']=="Male" && $online['online_status']==0){ ?>
                          <img src="images/male_offline.png" alt="img">
                          <?php } if($online['gender']=="Female" && $online['online_status']==1){ ?>
                          <img src="images/female_online.png" alt="img">
                          <?php }
                           if($online['gender']=="Female" && $online['online_status']==0){ ?>
                          <img src="images/female_offline.png" alt="img">
                          <?php }?>

                        </div>  
                      <div class="user-name"><span onclick="javascript:chatWith('<?php echo $online['username'];?>')" data-id="<?php echo $online['id'];?>" class="user_spc" style="cursor:pointer;"><?php echo $online['username'];?></span></div>

                  </li>
                  <?php endif;endforeach;?>
                   </ul>
              <div class="clearfix"></div>
              </div> 
              <div class="chat admin-chat">
                <h3>Admin Chat</h3>
                <ul>
                  <li>
                    <div class="user-pic">
                          <img src="images/user1.jpg" alt="img">
                        </div>  
                      <div class="user-name">Kingsuk Majumder</div>

                  </li>
                  <li>
                    <div class="user-pic">
                          <img src="images/user1.jpg" alt="img">
                        </div>  
                      <div class="user-name">Kingsuk Majumder</div>

                  </li>
                  <li>
                    <div class="user-pic">
                          <img src="images/user1.jpg" alt="img">
                        </div>  
                      <div class="user-name">Kingsuk Majumder</div>

                  </li>
                </ul>  
              </div>  
          </div> 


          </div>
          
          
        

        </div>
      </div>  
    </section>  




<div class="modal booking-popup" id="booking_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Book Now</h4>
            </div>
            <form role="form" name="booking_form" action="" id="booking_form" method="POST">
                <input type="text" name="" value=""/>
            </form>
        </div>
    </div>
</div>
    
 <script src="js/bootstrap.min.js"></script>
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
  
  <script>
    (function($){
      $(window).load(function(){
        
        $("body").mCustomScrollbar({
          theme:"minimal"
        });
        
      });
    })(jQuery);
  </script>
  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
  <link type="text/css" rel="stylesheet" media="all" href="css/chat/chat.css" />
    <link type="text/css" rel="stylesheet" media="all" href="css/chat/screen.css" />

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/countdowntimer.js"></script>

    <script type="text/javascript" src="js/chat.js"></script>
  </body>
</html>
