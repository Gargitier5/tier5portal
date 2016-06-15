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


    <script>
  $(function() {
    $( "#date" ).datepicker({
      dateFormat: 'yy-mm-dd',
    });

    
  });
  </script>
    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="js/jquery.mtz.monthpicker.js"></script>
  <script src="js/lunchcost.js"></script>

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
                    <div align="left"> Choose Date:<form method="post" action="admin_control/admin/empproductivity"><input  id="date" class="datepicker" type="text" name="date"><input type="submit" value="submit"></form> </div>
                    <div align="right" > Choose Month:<input type="text" id="demo-1" onchange="myFunction()"></div>
                    <br>
                    <br>
                    <table id="monthproductivity" class="table table-striped jambo_table bulk_action">
                        <thead>
                            <th>Date<br>(mm/dd/yyyy)</th>
                            <th>Name</th>
                            <th>Clock In</th>
                            <th>Clock Out</th>
                            <th>Field</th>
                            <th>Total time <br>(hh:mm:ss)</th>
                            

                        </thead>
                        <tbody>
                          <?php foreach ($All_product as $value) { 

                                if($value['type']==1)
                                {
                                  $dep='Production';
                                }
                                elseif($value['type']==2)
                                {
                                  $dep='R&D';
                                }
                                elseif($value['type']==3)
                                {
                                  $dep='Training';
                                }
                                else
                                {
                                  $dep='Administrative';
                                }

                                if($value['status']==0){
                                  $diff=strtotime($value['endTime'])-strtotime($value['startTime']);
                                  if($diff>=3600)
                                  {
                                    $h=round($diff/3600);
                                    if($h<10)
                                    {
                                      $h='0'.$h;
                                    }
                                    $m=round(($diff%3600)/60);
                                      if($m<10)
                                    {
                                      $m='0'.$m;
                                    }
                                    $s=round(($diff%3600)%60);
                                      if($s<10)
                                    {
                                      $s='0'.$s;
                                    }
                                    $str=$h.':'.$m.':'.$s;
                                  }
                                  else
                                  {
                                    $m=round($diff/60);
                                      if($m<10)
                                    {
                                      $m='0'.$m;
                                    }
                                    $s=round($diff%60);
                                      if($s<10)
                                    {
                                      $s='0'.$s;
                                    }
                                   $str='00:'.$m.':'.$s; 
                                  }
                                }
                                else
                                {
 
                                  $str='';
                                }
                                if($value['status']==0)
                                {
                                  $con='inactive';

                                }
                                else
                                {
                                  $con='active';
                                }
                              ?>
                                         <tr>
                                         <td><?php echo date('m/d/Y',strtotime($value['date']));?></td>
  
                                         <td><?php echo $value['name'];?></td>
                                         <td><?php echo date('H:i:s',strtotime($value['startTime']));?></td>
                                         <td><?php if($value['status']==0){ echo date('H:i:s',strtotime($value['endTime']));} else {echo '---';}?></td>
                                         <td><?php echo $dep;?></td>
                                         <td class='<?php echo $con;?>' value="<?php echo $value['startTime'];?>" id='col_<?php echo $value['Eid'].$con ?>'><?php echo $str;?></td>
                                         </tr>
                                         
                            <?php   } ?>
                        <tbody>
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
     <script>
        $('#demo-1').monthpicker({
          pattern: 'M/yyyy', 
          selectedYear: new Date().getFullYear(),
          
          startYear: 2015,
          finalYear: 2212,});
          
    </script>

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