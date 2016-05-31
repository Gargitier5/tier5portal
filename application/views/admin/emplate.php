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

    <script type="text/javascript" src="js/jquery.validate.js"></script>

     <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>

    <script type="text/javascript" src="js/manage_fac.js"></script>
    <!-- Custom Theme Style -->
   <script>
  $(function() {
    $( ".datepicker" ).datepicker({
      dateFormat: 'yy-mm-dd',
    });
  });
  </script>


      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
   

    <link href="css/custom.css" rel="stylesheet">
     
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
                
                <input type="text" class="datepicker" id="getdate" name="getdate" onchange="changedate()">
 
                  <h2>Employee Late On Clock In</h2>
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Duration</th>
           
                            
                          </tr>
                        </thead>
                         
                        <tbody id="lateclockin">
                          <?php foreach ($emplateclockin as $key) 
                          {?>
                            <tr>
                               <td><?php echo $key['name']; ?></td>
                               <td><?php echo $key['late_time']; ?></td>
                          </tr>
                          <?php } ?>
                          
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>


            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                

 
                  <h2>Employee Early On Clock Out</h2>
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Duration</th>
                            
                          </tr>
                        </thead>
                         
                        <tbody id="earlyclockout">
                          <?php foreach ($empearlyclockout as $key) 
                          {?>
                            <tr>
                               <td><?php echo $key['name']; ?></td>
                               <td><?php echo $key['early_time']; ?></td>
                          </tr>
                          <?php } ?>
                          
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>


            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                

 
                  <h2>Employee Late On Break</h2>
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Break Name</th>
                            <th>Duration</th>
                            
                          </tr>
                        </thead>
                         
                          <tbody id="latebreak">
                          <?php foreach ($emplatebrk as $key) 
                          {?>
                            <tr>
                               <td><?php echo $key['name']; ?></td>
                               <td><?php if($key['type']==1){ echo "First Break";}else if($key['type']==2){ echo "Second Break";}else{ echo "Third Break";}  ?></td>
                               <td><?php echo $key['time']; ?></td>
                          </tr>
                          <?php } ?>
                          
                        </tbody>
                      </table>
                    </div>
                </div>
              </div>


            </div>

            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                

 
                  <h2>Employee Absent</h2>
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr>
                             <th>Name</th>
                            <th>Duration</th>
                            
                          </tr>
                        </thead>
                        <tbody id="absent"> 
                       <?php foreach ($empabsent as $key) 
                          {?>
                            <tr>
                               <td><?php echo $key['name']; ?></td>
                               <td>9:00:00</td>
                          </tr>
                          <?php } ?>
                        </tbody> 
                      </table>
                    </div>
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