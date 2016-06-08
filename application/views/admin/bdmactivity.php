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
     <script type="text/javascript" src="js/bdm.js"></script>
      <style type="text/css">
      .dateclass
      {
        float: right;
      }


      </style>
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
                   <!--  <form action="admin_control/admin/searchbox" method="post"> -->
                        Search: <input type="text" name="search" id="search">
                        <input type="button" onclick="getvalue()" value="Search">
                    <!-- </form> -->
                    
                    <!-- <strong>Select Name:</strong><select id="name" name="name" onchange="getname()"><option value="">Select</option><?php foreach ($bdm as $value) {?><option value="<?php //echo $value['Eid'];?>"><?php echo $value['name'];?></option>
                     
                    <?php }?></select> -->

              
                    <div class="dateclass"><strong>Date:</strong><input type="text" onchange="getdate()" id="sdate" name="sdate" class="datepicker"></div>
                     <br>
                    <br>
                     <div class="table-responsive">
                         <table class="table table-striped jambo_table bulk_action">
                        <thead>
                            <tr>
                              <th class="column-title">Date</th>
                              <th class="column-title">Time</th>
                              <th class="column-title">BDM Name</th>
                              <th class="column-title">Posted Link</th>
                              <th class="column-title">Proposal Link</th>
                              <th class="column-title">Cover Letter</th>
                              <th class="column-title">Change Status</th>
                              <th class="column-title" colspan="3">Outstanding Proposal</th>
                           </tr>
                           <tr>
                              <th class="column-title" colspan="7"></th>
                              <th class="column-title">Contacted</th>
                              <th class="column-title">Offer</th>
                              <th class="column-title">End Status</th>
                            </tr> 
                        </thead>
                        <tbody id="bdmact">
                         <?php foreach ($bdmac as $key) {?>
                          <tr>

                              <?php if($key['step1']==1){ $step1="Contacted";}
                                    else if($key['step1']==2){ $step1="Rejected";}
                                    else if($key['step1']==3){ $step1="Offer";}
                                    else if($key['step1']==0){ $step1="pending";}
                                    else { $step1="No Status";}

                                    if($key['step2']=="1_1"){ $step2="Offer";}
                                    else if($key['step2']=="1_2"){ $step2="Rejected";}
                                    else if($key['step2']=="3_1"){ $step2="Accepted";}
                                    else if($key['step2']=="3_2"){ $step2="Rejected";}
                                    else { $step2="";}

                                    if($key['step3']=="1_2_1"){ $step3="Offer";}
                                    else if($key['step3']=="1_2_2"){ $step3="Rejected";}
                                    else { $step3="";}

                              ?>
                              
                              <td><?php echo $key['date'];?></td>
                              <td><?php echo $key['time'];?></td>
                              <td><?php echo $key['name'];?></td>
                              <td><a href="<?php echo $key['posted_url'];?>" target="_blank">Click To View</a></td>
                              <td><a href="<?php echo $key['proposed_url'];?>" target="_blank" >Click To View</a></td>
                              <td></td>
                              <td><a href='admin_control/Admin/show_cover/<?php echo $key['b_ac_id']?>'>Click To Change</a></td>
                              <td><?php echo $step1 ;?></td>
                              <td><?php echo $step2 ;?></td>
                              <td><?php echo $step3 ;?></td>
                              
                              
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