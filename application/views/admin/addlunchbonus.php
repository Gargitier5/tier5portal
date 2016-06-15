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
      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript" src="js/lbonus.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">


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
                  <div class="x_content">
                 
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr>
                              <td>Date</td>
                              <td>Employee Name</td>
                              <td>Lunch Bonus</td>
                              <td id="action" style="display:none">Take Action</td>
                          </tr>
                        </thead>
                        <tbody> 
                        <?php foreach($alllunchbonus as $bonus){ ?>
                           <tr>
                               <td><?php echo $bonus['name']; ?></td>
                               <td><?php echo $bonus['Lunch_bonus']; ?></td>
                               <td><button class="btn btn-success glyphicon glyphicon-edit" onclick="edit_bonus(<?php echo $bonus['Lb_id'];?>)"></button></td>
                               <td id="act_<?php echo $bonus['Lb_id'];?>" style="display:none">
                                  <form id="ladd" method="post" action="admin_control/admin/lbadd">
                                    <input type="hidden" id="b_id" name="b_id" value="<?php echo $bonus['Lb_id'];?>">
                                  <select id="action_taken_<?php echo $bonus['Lb_id'];?>" name="action_taken"><option value=" ">--Select Action--</option><option value="1">Add</option><option value="2">Deduct</option></select> &nbsp; <input type="number" min="1" name="bonus" id="bonus<?php echo $bonus['Lb_id'];?>" >&nbsp;<input type="submit" class="btn btn-xs btn-primary" value="Change">
                                  </form>
                                </td>
                           </tr>
                        <?php } ?>
                        </tbody> 
                      </table>
                  </div>
                </div>
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