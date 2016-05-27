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

    <script type="text/javascript" src="js/admin_emp.js"></script>


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
 

                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                              <th class="column-title">Name</th>
                              <th class="column-title">Gender</th>
                              <th class="column-title">Phon Number</th>
                              <th class="column-title">Alternet Phon Number</th>
                              <th class="column-title">Personal Email Id</th>
                              <th class="column-title">Marital Status</th>
                              <th class="column-title">Date Of Birth</th>
                              <th class="column-title">Joining Date</th>
                              <th class="column-title">Employment Status</th>
                              <th class="column-title">Company Email</th>
                              <th class="column-title">Designation</th>
                               <th class="column-title">Salary</th>
                              <th class="column-title">Last Date Of Employment</th>
                              <th class="column-title">Reason</th>
                              <th class="column-title">Adress</th>
                              <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                              <th class="column-title">Action</th>
                          </tr>
                        </thead>
                         
                        <tbody>
                          <?php foreach ($allemployee as $value) { ?>
                          <tr>
                              <td><?php echo $value['name'];?></td>
                              <td><?php echo $value['gender'];?></td>
                              <td><?php echo $value['phon_no'];?></td>
                              <td><?php echo $value['alt_ph_no'];?></td>
                              <td><?php echo $value['personal_email'];?></td>
                              <td><?php if($value['m_status']==0){echo "Unmarried";}else{echo "Married";}?></td>
                              <td><?php echo $value['dob'];?></td>
                              <td><?php echo $value['joining_date'];?></td>
                              <td><?php if($value['activation_status']==0){echo "Working";}else{echo "Resigned";}?></td>
                              <td><?php echo $value['comemail'];?></td>
                              <td><?php echo $value['designation'];?></td>
                              <td><?php echo $value['salary'];?></td>
                              <td><?php if($value['activation_status']==0){echo " ";}else{echo $value['resign_date'];}?></td>
                              <td><?php echo $value['reason'];?></td>
                              <td colspan="2" ><?php echo $value['address'];?></td>
                              <td><button class="btn btn-success glyphicon glyphicon-edit" onclick="location.href='admin_control/Admin/editprof/<?php echo $value['id'];?>';"></td>
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











