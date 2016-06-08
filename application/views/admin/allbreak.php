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
                

 
                  <h2>List Of Break</h2>
                  <div class="x_content">

                         <div id="msg">
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
                        </div>
                   
                    <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                              <th class="column-title">Name</th>
                              <th class="column-title">Duration</th>
                              <th class="column-title">Status</th>
                        
                              <th class="column-title">Change Status</th>
                              <th class="column-title">Action</th>
                             
                          </tr>
                        </thead>
                         
                        <tbody>
                          <?php foreach ($showallbreak as $value) { ?>
                          <tr>
                              <td><?php echo $value['break_name'];?></td>
                              <td><?php echo $value['duration'];?></td>
                              <td><?php if($value['status']==0){ echo "Available";}else{echo "Not Available";}?></td>
                              <td><input type="button" class="btn btn-success btn-xs" onclick="change_status('<?php echo $value['break_id'];?>','<?php echo $value['status'];?>')" value="Change Status"></td>
                              <td>
                                <button class="btn btn-success btn-xs glyphicon glyphicon-edit" onclick="editbreak('<?php echo $value['break_id'];?>','<?php echo $value['break_name'];?>')">Edit</button>
                               <!--  <button class="btn btn-danger btn-xs glyphicon glyphicon-trash" onclick="delbreak(<?php echo $value['break_id'];?>)">Delete</button> -->
                              </td>
                          </tr>
                          <?php }?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

               <div class="col-md-12 col-sm-12 col-xs-12" id="edit_break" style="display:none">
                <div class="x_panel">
                

 
                  <h2>Edit Break</h2>
                  <div class="x_content">

                         <div id="msg">
                
                        </div>
                   
                    <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                              <th class="column-title">Name</th>
                              <th class="column-title">Duration</th>
                              <th class="column-title">Action</th>
                          </tr>
                        </thead>
                         
                        <tbody>
                          <tr>
                            <form method="post" action="admin_control/Admin/edit_break">
                              <input type="text" id="brk_id" name="brk_id" style="display:none">
                              <td><input type="text" required="required" id="break_name_edit" name="break_name_edit" class="required"></td>
                              <td><input type="number" min="00" max="23" required="required" class="required" id="brk_hour_edit" name="brk_hour_edit" class="small" size="5" placeholder="Hour">:<input type="number" class="required" required="required" min="00" max="59" id="brk_min_edit" name="brk_min_edit" class="small" size="5" placeholder="Minute">:<input type="number" class="required" required="required" id="brk_sec_edit" name="brk_sec_edit" class="small" min="00" max="59" size="5" placeholder="Second"></td>
                              <td><input type="submit" value="Edit"></td>
                            </form>
                          </tr>
                        </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>




              <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                

 
                  <h2>Add Break</h2>
                  <div class="x_content">

                  <div> -->
                   <?php if($this->session->userdata('succ_mseg')!=''){?>
                      <!-- <div class="alert alert-success alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4>  <i class="icon fa fa-check"></i> Success!</h4> -->
                    <?php echo $this->session->userdata('succ_mseg');$this->session->set_userdata('succ_mseg','');?>
                  <!-- </div> -->

<?php } if($this->session->userdata('err_mseg')!=''){ ?>

<!-- <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <h4><i class="icon fa fa-ban"></i> Sorry!</h4> -->
                  <?php echo  $this->session->userdata('err_mesg');$this->session->set_userdata('err_mseg','');?>
                  <!-- </div> -->
<?php }?>
                 <!--  </div>
                   
                    <div class="table-responsive">
                       <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                              <th class="column-title">Name</th>
                              <th class="column-title">Duration</th>
                              <th class="column-title">Action</th>
                          </tr>
                        </thead>
                         
                        <tbody>
                          <tr>
                            <form method="post" action="admin_control/Admin/add_break">
                              <td><input type="text" required="required" id="break_name" name="break_name" class="required"></td>
                              <td><input type="number" min="00" max="23" required="required" class="required" id="brk_hour" name="brk_hour" class="small" size="5" placeholder="Hour">:<input type="number" class="required" required="required" min="00" max="59" id="brk_min" name="brk_min" class="small" size="5" placeholder="Minute">:<input type="number" class="required" required="required" id="brk_sec" name="brk_sec" class="small" min="00" max="59" size="5" placeholder="Second"></td>
                              <td><input type="submit" value="Add"></td>
                            </form>
                          </tr>
                        </tbody>
                        </table>

                     
                    </div> -->
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