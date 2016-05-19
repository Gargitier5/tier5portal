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
                <div class="x_panel">
       

                  <div class="x_content">

                   
                   <div id="msg"></div>
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                       <thead>
                        <tr>
                          <td>Name</td>
                          <td>Time</td>
                          <td></td>
                          <td>Action</td>
                        </tr>
                       </thead>
                       <tbody>
                         <?php foreach($alltime as $time){?>
                          <tr>
                            <td><?php echo $time['Action'];?></td>
                            <td><?php echo $time['Time'];?></td>
                            <td><input type="text" style="display:none" id="timepicker_<?php echo $time['Clid'] ?>" placeholder="Enter The Time"><input type="button" onclick="edit_clock(<?php echo $time['Clid'];?>)" value="Change" style="display:none" id="change_<?php echo $time['Clid'] ?>" class="btn btn-xs btn-success"></td>
                            <td><input type="button" onclick="change_clock(<?php echo $time['Clid'];?>)" value="Change Time" class="btn btn-xs btn-success"></td>
                          </tr>
                         <?php }?>

                       </tbody>
                      </table>

  
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











