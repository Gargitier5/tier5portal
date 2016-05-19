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

    <script type="text/javascript" src="js/point.js"></script>


      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">


  </head> 
<style type="text/css">
.ui-datepicker-calendar {
    display: none;
 }
</style>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              
            </div>

            <div class="clearfix"></div>

          

            <br />

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
        

            <div class="clearfix"></div>

            <div class="row">
             

              
              

              <div class="col-md-12 col-sm-12 col-xs-12">
                
                    <h2>Expendature On Lunch Program</h2>
            <br> <div align="right">
            <label for="myDate">Choose Month</label>
              <form method="post" action="admin_control/admin/expand" >
               <input type="hidden" id="datecheck" name="datecheck" value="">
               <input type="hidden" id="endofmonth" name="endofmonth" value="">
               <input id="myDate" name="myDate" class="monthYearPicker" value="<?php echo $current; ?>" />
               <button type="submit"> Submit Month</button>
              </form>
              <br>
              </div>
  <div class="panel-group" id="accordion">
    <div class="panel panel-default">


      
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" >Total Expendature</a>
          <div align="right"  ><i class="fa fa-inr"></i><?php 
                           $total_cost_lunchprogram=$total_vendor_cost+$total_lunchbonus;
                           echo $total_cost_lunchprogram;

                         ?></div>
        </h4>
      </div>
      
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Expendature On Vendors</a>
          <div align="right"  ><i class="fa fa-inr"></i><?php echo $total_vendor_cost;?></div>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">
                           
                           <?php if($result)
                           { ?>
                                <table>
                                        <tr>
                                           <th>Shop Name</th>
                                           <th>Cost</th>
                                        </tr>
                                        <?php echo $result;?>
                                    </table>
                            
                           <?php  } else{?>
                           <label>No Record Found </label>
                           
                           <?php  }?>
                        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Expendature As Lunch Allowence</a>
        <div align="right"  ><i class="fa fa-inr"></i><?php echo $total_lunchbonus; ?></div>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">

         <?php if($bonus) {?>
                    
                           <table>
                            <tr>
                               <th>Employee Name</th>
                               <th>Lunch Bonus</th>
                            </tr>
                          <?php echo $bonus;?>


                            </table>
                           <?php } else {?>
                            <label>No Record Found </label>
                           <?php } ?>

        </div>
      </div>
    </div>
  </div> 



              </div>
            </div>
          </div>
        </div>
       
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
