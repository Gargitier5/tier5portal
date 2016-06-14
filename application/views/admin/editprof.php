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
            <br >
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





                   <div class="x_panel">
                  <h3>Edit Employee Information</h3>
                  <div class="x_content">
                    <div class="ln_solid"></div>
                          
                   <form action="admin_control/Admin/editoldemployee" method="post" novalidate="" id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" enctype='multipart/form-data'>
                      <input type="text" style="display:none" id="empid" name="empid" value="<?php echo $emp_info['id'];?>">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" required="required" class="form-control col-md-7 col-xs-12 parsley-success" name="name" id="name" value="<?php echo $emp_info['name']?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Personal Email Id <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="peremail" id="peremail" required="required" class="form-control col-md-7 col-xs-12 parsley-success" value="<?php echo $emp_info['personal_email']?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea required="required" name="address" id="address" cols="50" rows="4" class="form-control col-md-7 col-xs-12"><?php echo $emp_info['address']?></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="phon-number" class="control-label col-md-3 col-sm-3 col-xs-12">Phone Number<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="phno" id="phno" class="form-control col-md-7 col-xs-12"  value="<?php echo $emp_info['phon_no']?>">
                        </div>
                      </div>

                       <div class="form-group">
                        <label for="phon-number" class="control-label col-md-3 col-sm-3 col-xs-12">Alternative Phone Number</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="altphno" id="altphno" class="form-control col-md-7 col-xs-12" value="<?php echo  $emp_info['alt_ph_no']?>">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="radio" value="Male" name="gender" <?php if ($emp_info['gender']=="Male") echo "checked";?>> Male<br>
                                  <input type="radio" value="Female" name="gender"<?php if ($emp_info['gender']=="Female") echo "checked";?> > Female<br>
                        </div>
                      </div>


                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Marital Status<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                                  <input type="radio" value="Married" name="marrige" <?php if ($emp_info['m_status']=="Married") echo "checked";?>> Married<br>
                                  <input type="radio" value="Unmarried" name="marrige" <?php if ($emp_info['m_status']=="Unmarried") echo "checked";?>> Unmarried<br>
                                 
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="datepicker form-control col-md-7 col-xs-12 parsley-success hasDatepicker" required="required" name="dob" id="dob" value="<?php echo $emp_info['dob']?>"><ul class="parsley-errors-list" ></ul>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Joining <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" data-parsley-id="16" class="datepicker form-control col-md-7 col-xs-12 parsley-success hasDatepicker" required="required" name="doj" id="doj" value="<?php echo $emp_info['joining_date']?>"><ul id="parsley-id-16" class="parsley-errors-list"></ul>
                        </div>
                      </div>
                     


                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="uname">Company Email Id 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" data-parsley-id="5" class="form-control col-md-7 col-xs-12 parsley-success" name="coemail" id="coemail" value="<?php echo $emp_info['comemail']?>"><ul id="parsley-id-5" class="parsley-errors-list"></ul>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="uname">Designation <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" data-parsley-id="5" required="required" class="form-control col-md-7 col-xs-12 parsley-success" name="deg" id="deg" value="<?php echo $emp_info['designation']?>"><ul id="parsley-id-5" class="parsley-errors-list"></ul>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="uname">Salary <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" data-parsley-id="5" required="required" class="form-control col-md-7 col-xs-12 parsley-success" name="salary" id="salary" value="<?php echo $emp_info['salary']?>"><ul id="parsley-id-5" class="parsley-errors-list"></ul>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                        </label>
                      </div>
                      
                       <div class="form-group">
                        <label for="photoupload" class="control-label col-md-3 col-sm-3 col-xs-12">Upload Photo
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="filediv">
                              <input type="file" id="user_file" name="user_file" title="Select Image To Be Uploaded" >
                              <input type="hidden" value="<?php echo  $emp_info['pic']?>" name="picture">
                             <br>
                             (maximum size 2 MB, 250 x 350 pixels)
                          </div>
                        </div> 
                      </div>


                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                    
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
