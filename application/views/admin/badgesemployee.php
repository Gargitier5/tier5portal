
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
    
    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>

    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="js/badges.js"></script>
    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
   
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
                  <h2>Remove Badges For Employee</h2>
                  <div class="ln_solid"></div>
                  <div class="x_content">
                    <?php 
if($this->session->userdata('succ_msg')!=''){?>
                      <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4>  <i class="icon fa fa-check"></i> Success!</h4>
                    <?php echo $this->session->userdata('succ_msg');$this->session->set_userdata('succ_msg','');?>
                  </div>

<?php } if($this->session->userdata('err_msg')!=''){ ?>

<div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-ban"></i> Sorry!</h4>
                  <?php echo  $this->session->userdata('err_msg');$this->session->set_userdata('err_msg','');?>
                  </div>
<?php }?>
                   <div class="row">
                     <table class="table table-striped jambo_table bulk_action">
                       <thead>
                         <th class="headings">Select Name</th>
                         <th class="headings">Select Badges</th>
                         <th class="headings">Action</th>
                       </thead>
                       <tbody>
                          <tr>
                           <td>
                            <form method="post" action="admin_control/admin/addempbadges">
                            <select id="empid" name="empid">
                              <option value="">--Select</option>
                            <?php foreach ($allemployee as $key)
                            { ?>
                              <option value="<?php echo $key['Eid']; ?>"><?php echo $key['name']; ?></option>
                            <?php } ?>
                            <select>
                           </td>
                           <td>
                            <select id="badges" name="badges">
                              <option value="">--Select</option>
                            <?php foreach ($allbadges as $key)
                            { ?>
                              <option value="<?php echo $key['badges_id']; ?>"><?php echo $key['badge']; ?></option>
                            <?php } ?>
                            <select>
                           </td>
                           <td>
                             <input type="submit" class="btn btn-primary btn btn-sm" value="Add">

                             </form>
                           </td>
                          </tr>
                       </tbody>
                     </table>
                   </div>
                  </div>  
                </div>
                <br>
                <div class="x_panel">
                  <h2>See Disable Bages</h2>
                  <div class="ln_solid"></div>
                  <div class="x_content">

                   <div class="row">
                      <table class="table table-striped jambo_table bulk_action">
                       <thead>
                         <th class="headings">Employee Name</th>
                         <th class="headings">Select Badges</th>
                         <th class="headings">Action</th>
                       </thead>
                       <tbody>
                        
                          <?php foreach ($allempbadge as $value)
                          { ?>
                            <tr>
                              <td><?php echo $value['name'];?></td>
                              <td><?php echo $value['badge'];?></td>
                              <td><button class="btn btn-danger glyphicon glyphicon-trash" onclick="delete_epmbad(<?php echo $value['E_b_id'];?>)"></button></td>
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