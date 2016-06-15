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

    <script type="text/javascript" src="js/lunchorderadmin.js"></script>
    

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

                   
                   <div id="msg">
                    Choose Date:<input type="text" class="datepicker" id="date" name="date" onchange="checkdate()">

                   </div>
                    <div class="table-responsive">
                      
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                              <th class="column-title">Date</th>
                              <th class="column-title">Employee Name</th>
                              <th class="column-title">Shop Name</th>
                              <th class="column-title">Lunch Item</th>
                              <th class="column-title">Cost</th>
                              <th class="column-title">Delete<!-- <strong><button id="deletallorder" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#cnfrmdltlunchorder">Delete All</button></strong> --></th>
                              <th class="column-title"><strong><button id="printorder" class="btn btn-danger btn-sm">Print All</button></strong></th>
                              <th class="column-title"><strong><button id="printselected" class="btn btn-danger btn-sm">Print Selected</button></strong></th>
                            
                          </tr>
                        </thead>
                         
                        <tbody id="lorder">
                          <?php foreach ($allorder as $value) 
                          { ?>
                            <tr>
                                <td><?php $str = $value['date'];
$date = DateTime::createFromFormat('Y-m-d', $str);
$datee=$date->format('d/m/Y');
echo $datee; ?></td>
                                <td><?php echo $value['name']; ?></td>
                                <td><?php echo $value['shopname']; ?></td>
                                <td><?php echo $value['items']; ?></td>
                                <td><?php echo $value['cost']; ?></td>
                                <td><button id="dlrlnh" class="btn btn-danger btn-sm glyphicon glyphicon-trash" onclick="dlt(<?php echo $value['Liid']; ?>)"></button></td>
                                <td><button class="btn btn-danger btn-sm glyphicon glyphicon-print" onclick="print_single(<?php echo $value['Liid']; ?>)"></button></td>
                                <td><input type="checkbox" name="print_check[]" value="<?php echo $value['Liid']; ?>" id="printselect_<?php echo $value['Liid']; ?>"></td>
                            </tr>
                          <?php }?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              
           


   <div class="container container-fluid" id='new_print' style="display:none">
        <div class='row'>
        <div class="col-sm-10" style="margin-bottom:5px;"><a class="btn btn-danger" href="admin_control/admin/lunchorder">Back</a></div>
        <div id='print_all' class="col-md-12 col-sm-12">
        </div>
         <a id="printfinalAll" class="btn btn-danger btn-md glyphicon glyphicon-print" >Print</a>
        </div></div>










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