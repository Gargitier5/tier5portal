<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tier5</title>
    <link rel=icon href="http://tier5.us/images/favicon.ico">
    <base href="<?php echo base_url();?>">
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- jVectorMap -->
    <link href="css/maps/jquery-jvectormap-2.0.3.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
     
    <!-- jQuery -->
     <script src="vendors/jquery/dist/jquery.min.js"></script>

    <script type="text/javascript" src="js/admin_emp.js"></script>


      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">



  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">   
            </div>
            <div class="clearfix"></div>
            <br/>
            <!-- sidebar menu -->
            <?php echo $sideber;?>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <?php echo $header;?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">

            <div class="page-title">
              <div class="title_left">
                  <h3>
                      Employee Activity
                  </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                   <input type="text" class="datepicker" id="empactivedate" name="empactivedate" onchange="checkdate()" placeholder="Choose Date">
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">

             <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Employee Attendance</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     <!--  <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li> -->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Clock In</th>
                          <th>Clock Out</th>
                        </tr>
                      </thead>


                      <tbody id="attend">
                        <?php foreach($present_employee as $emp) {?>
                        <tr>
                          <td><?php echo $emp['name'];?></td>
                          <td><?php echo $emp['clockin'];?></td>
                          <td><?php echo $emp['clockout'];?></td>             
                        </tr>
                        <?php }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
             </div>
            </div>


               <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>First Break Timing</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     <!--  <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li> -->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Time Taken</th>
                        </tr>
                      </thead>
                      <tbody id="fbreak">
                      <?php foreach($firstbreak as $emp) {?>
                        <tr>
                          <td><?php echo $emp['name'];?></td>
                          <td>

                            <?php

                                 $time1 = $emp['starttime'];
             $time2 = $emp['endtime'];

             list($hours, $minutes, $seconds) = explode(':', $time1);
             $startTimestamp = mktime($hours, $minutes, $seconds);

             list($hours, $minutes, $seconds) = explode(':', $time2);
             $endTimestamp = mktime($hours, $minutes, $seconds);

             $seconds = $endTimestamp - $startTimestamp;
             $sec=($seconds % 60);
             if($sec<10)
             {
             $sec="0".$sec;
             }
             $minutes = ($seconds / 60) % 60;
             if($minutes<10)
             {
             $minutes="0".$minutes;
             }
            $hours = floor($seconds / (60 * 60));
            if($hours<10)
             {
             $hours="0".$hours;
             }

            echo $hours.":".$minutes.":".$sec;

                            ?>

                          </td>            
                        </tr>
                        <?php }?>


                        <?php foreach ($onfirstbreak as $onfbreak ){?>
                        <tr>
                          <td><?php echo $onfbreak['name'];?></td>
                          <td></td>
                        </tr>
                          <?php }?>
                      </tbody>

                    </table>
                  </div>
                </div>
              </div>
             </div>
            </div>
              <div class="clearfix"></div>

               <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Second Break Timing</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     <!--  <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li> -->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Time Taken</th>
                        </tr>
                      </thead>


                      <tbody id="sbreak">
                      <?php foreach($secondbreak as $emp) {?>
                        <tr >
                          <td><?php echo $emp['name'];?></td>
                          <td>
                          <?php

                                 $time1 = $emp['starttime'];
             $time2 = $emp['endtime'];

             list($hours, $minutes, $seconds) = explode(':', $time1);
             $startTimestamp = mktime($hours, $minutes, $seconds);

             list($hours, $minutes, $seconds) = explode(':', $time2);
             $endTimestamp = mktime($hours, $minutes, $seconds);

             $seconds = $endTimestamp - $startTimestamp;
             $sec=($seconds % 60);
             if($sec<10)
             {
             $sec="0".$sec;
             }
            $minutes = ($seconds / 60) % 60;
             if($minutes<10)
             {
             $minutes="0".$minutes;
             }
            $hours = floor($seconds / (60 * 60));
            if($hours<10)
             {
             $hours="0".$hours;
             }

            echo $hours.":".$minutes.":".$sec;

                            ?>
</td>            
                        </tr>
                        <?php }?>
                        <?php foreach ($onsecondbreak as $onsbreak ){?>
                        <tr>
                          <td><?php echo $onsbreak['name'];?></td>
                          <td></td>
                        </tr>
                          <?php }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
             </div>
            </div>


               <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="col-md-12 col-sm-12 col-xs-12">
                 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Third Break Timing</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     <!--  <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li> -->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Time Taken</th>
                        </tr>
                      </thead>

                      <tbody id="lbreak">
                      <?php foreach($thirdbreak as $emp) {?>
                        <tr>
                          <td><?php echo $emp['name'];?></td>
                          <td>
                          <?php

                                 $time1 = $emp['starttime'];
             $time2 = $emp['endtime'];

             list($hours, $minutes, $seconds) = explode(':', $time1);
             $startTimestamp = mktime($hours, $minutes, $seconds);

             list($hours, $minutes, $seconds) = explode(':', $time2);
             $endTimestamp = mktime($hours, $minutes, $seconds);

             $seconds = $endTimestamp - $startTimestamp;
             $sec=($seconds % 60);
             if($sec<10)
             {
             $sec="0".$sec;
             }
            $minutes = ($seconds / 60) % 60;
             if($minutes<10)
             {
             $minutes="0".$minutes;
             }
            $hours = floor($seconds / (60 * 60));
            if($hours<10)
             {
             $hours="0".$hours;
             }

            echo $hours.":".$minutes.":".$sec;

                            ?>



                          </td>            
                        </tr>
                        <?php }?>
                        <?php foreach ($onthirdbreak as $onlbreak ){?>
                        <tr>
                          <td><?php echo $onlbreak['name'];?></td>
                          <td></td>
                        </tr>
                          <?php }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
             </div>
            </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <!-- /page content -->



        <!-- footer content -->
        <footer>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

   
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="js/custom.js"></script>
  </body>
</html>
