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
                    <br>
                    <br>
                    <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                        
                        
                        <tr><td><strong>Cover Letter</strong></td><td><?php echo $get['cover_letter'];?></td><td></td></tr>
                        <tr><td><strong>Change Outstanding Proposal Status</strong><td></td><td></td></tr>
                        <tr><td><strong>Contacted</strong></td><td><strong>Offered</strong></td><td><strong>Ended</strong></td></tr>
                        <tr>
                          <td>
                                 <input type="radio" class="con" name="contact" id="contacted" value="1" <?php if($get['step1']==1){ echo "checked"; }?>> Contacted<br>
                                 <input type="radio" class="con" name="contact" id="rejected" value="2" <?php if($get['step1']==2){ echo "checked"; }?>> Rejected<br>
                                 <input type="radio" class="con" name="contact" id="offer" value="3" <?php if($get['step1']==3){ echo "checked"; }?>> Offer<br>
                                 <input type="radio" class="con" name="contact" id="pending" value="0" <?php if($get['step1']==0){ echo "checked"; }?>> Pending  
                          </td>
                          <td>
                               
                              <?php 
                              if($get['step1']==1)
                                {?>
                              
                                 <input type='radio'  id='status2_1_1' name='status2' value='1_1'<?php if($get['step2']=='1_1'){ echo "checked"; }?> >Offer<br>
                                 <input type='radio'  id='status2_1_2' name='status2' value='1_2'<?php if($get['step2']=='1_2'){ echo "checked"; }?> >Rejected

                             <?php }?>

                              <?php 
                              if($get['step1']==3)
                                {?>
                              
                                 <input type='radio'  id='status2_1_1' name='status2' value='3_1' <?php if($get['step2']=='3_1'){ echo "checked"; }?>>Acceptecd By Tier5<br>
                                 <input type='radio'  id='status2_1_2' name='status2' value='3_2' <?php if($get['step2']=='3_2'){ echo "checked"; }?>>Rejected By Tier5

                             <?php }?>

                          </td>
                          <td>
                            <?php 
                              if($get['step2']=="1_1")
                                {?>
                              
                                 <input type='radio'  id='status3_1_1' name='status3' value='1_1_1' <?php if($get['step3']=='1_1_1'){ echo "checked"; }?> >Acceptecd By Tier5<br>
                                 <input type='radio'  id='status3_1_2' name='status3' value='1_1_2' <?php if($get['step3']=='1_1_2'){ echo "checked"; }?>>Rejected By Tier5

                             <?php }?>


                          </td>
                        </tr>
                        <tr>
                          <td>
                            <input type="submit" value="Change Status" onclick="changestep1(<?php echo $get['b_ac_id'];?>)">
                          </td>
                          <td>
                            <input type="submit" value="Change Status" onclick="changestep2(<?php echo $get['b_ac_id'];?>)">
                          </td>
                          <td>
                            <input type="submit" value="Change Status" onclick="changestep3(<?php echo $get['b_ac_id'];?>)">
                          </td></tr>


                  
   
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