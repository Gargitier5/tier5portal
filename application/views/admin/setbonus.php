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

<style>
    .hilighted-text
    {
      font-weight: bold;
      color: red;
      font-style: italic;
    }
    </style>

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
             
                  <div>
                    
                   
                     <div> 
                   <?php if($this->session->userdata('succ_msg')!=''){?>
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
                </div>


                <br>
                <h2>Create New User</h2>
                <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                          <thead>
                             <tr>
                              <td>Select Employee Name</td>
                              <td>Create User Name</td>
                              <td>Select Role</td>
                              <td>Action</td>
                             </tr>
                          </thead>
                          <tbody>
                              <td>
                                <form method="post" action="admin_control/admin/createuser">

                                <select id="emp_ide" name="emp_ide"><option>--Select--</option><?php foreach($shownoemp as $emp){?>
                                   <option value="<?php echo $emp['id'] ?>"><?php echo $emp['name'] ?></option>
                                   <?php } ?></select></td>
                              <td><input type="text" id="uname" name="uname"></td>
                              <td><select id="roleid" name="roleid"><option value="">--Select--</option><option value="1">HR</option><option value="2">Developer</option><option value="3">BDM</option></select></td>
                              <td><input type="submit" value="Create" class="btn btn-success" >
                                </form></td>
                          <tbody>
                        </table>
                        <label>Default Password For This User Is <span class="hilighted-text" style="color:red">Tier5</span></label>
                      </div>
                  </div>
                  <br>
                  <br>
                  <h2>Set Attendance Point Of New Employee</h2>
                     <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                          <thead>
                             <tr>
                              <td>Name</td>
                              <td>Points</td>
                              <td>Action</td>
                             </tr>
                          </thead>
                          <tbody>
                              <td>
                                <form method="post" action="admin_control/admin/setpointnewemp">

                                <select id="emp_idd" name="emp_idd"><option>--Select--</option><?php foreach($showallemp as $emp){?>
                                   <option value="<?php echo $emp['id'] ?>"><?php echo $emp['name'] ?></option>
                                   <?php } ?></select></td>
                              <td><input type="number" min="0" id="newapoint" name="newapoint"></td>
                              <td><input type="submit" value="Set Point" class="btn btn-success" >
                                </form></td>
                          <tbody>
                        </table>
                      </div>
                  </div>

                  <br>
                  <br>
                  <div>


                    <h2>Set Lunch Bonus Of New Employee</h2>
                    
                         <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action">
                              <thead>
                                 <tr>
                                  <td>Name</td>
                                  <td>Points</td>
                                  <td>Action</td>
                                 </tr>
                              </thead>
                              <tbody>
                                  <td>
                                    <form method="post" action="admin_control/admin/setlbonus">
                                    <select id="emp_id" name="emp_id"><option>--Select--</option><?php foreach($showallemp as $emp){?>
                                       <option value="<?php echo $emp['id'] ?>"><?php echo $emp['name'] ?></option>
                                       <?php } ?></select></td>
                                  <td><input type="number" min="0" id="newpoint" name="newpoint"></td>
                                  <td><input type="submit" value="Set Bonus" class="btn btn-success">
                                  </form>
                                  </td>
                              <tbody>
                            </table>
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

