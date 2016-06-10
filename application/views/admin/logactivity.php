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
     <script type="text/javascript" src="js/admin_emp.js"></script>
     
    <!-- jQuery -->
     <script src="vendors/jquery/dist/jquery.min.js"></script>

 


     
  
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
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




                <div class="x_panel">
                  <div class="x_title">
                    <h2>Check Log</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
    
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    
                    <div id="datatable_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer"><div class="row"><div class="col-sm-6"><div class="dataTables_length" id="datatable_length"></div></div><div class="col-sm-6"><div id="datatable_filter" class="dataTables_filter"></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-striped table-bordered dataTable no-footer" id="datatable" role="grid" aria-describedby="datatable_info">
                     <!--  <thead>
                        <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 100.883px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">Employee Name</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 175.883px;" aria-label="Position: activate to sort column ascending">Points</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 72.8833px;" aria-label="Office: activate to sort column ascending">Action</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 72.8833px;" aria-label="Office: activate to sort column ascending">Action</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 31.8833px;" >Date</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 72.8833px;" aria-label="Start date: activate to sort column ascending">Time</th></tr>
                      </thead> -->
                     <table>

                      <tbody>
                        
                        
                      <?php foreach ($all_log as $value)
                       {?>
                       
                      <tr>
                        <td><i class="glyphicon glyphicon-tags"></i> &nbsp;<?php echo $value['name']; ?> &nbsp;</td>
                        <td><?php if ($value['action']==1 ){ echo "Added";}else{echo "Deducted";}?> &nbsp;</td>
                        <td><?php echo $value['point']; ?> <?php if($value['point']) {echo "Points";}else{echo"";}?>&nbsp;&nbsp;</td>
                        <td>as <?php if ($value['field']==1){ echo "Attendance Bonus";}else if($value['field']==2 ){echo "Lunch Bonus";} else if($value['field']==3 ) { echo "New Employee";} else { echo "";}?> &nbsp;</td>
                        <td>on &nbsp; <?php echo $value['date']; ?> &nbsp;</td>
                        <td>at &nbsp; <?php echo $value['time']; ?> &nbsp;</td>
                      </tr>
                    <?php
                     }
                    ?>  
                    
                        
                      
                       </tbody>
                      </table>
                  </div>
                </div>


              </div>
            </div>
        </div>
      </div>
    </div>
       
        <!-- <footer>
          
          <div class="clearfix"></div>
        </footer> -->
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











