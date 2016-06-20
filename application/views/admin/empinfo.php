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
     input[type=checkbox].css-checkbox
     {
        position:absolute; z-index:-1000; left:-1000px;
        overflow: hidden; clip: rect(0 0 0 0); height:1px; width:1px; margin:-1px; padding:0; border:0;
     }

    input[type=checkbox].css-checkbox + label.css-label
    {
      padding-left:35px;
      height:30px; 
      display:inline-block;
      line-height:30px;
      background-repeat:no-repeat;
       background-position: 0 0;
       font-size:30px;
      vertical-align:middle;
      cursor:pointer;
       margin-bottom: 6px;

    }

    input[type=checkbox].css-checkbox:checked + label.css-label {
              background-position: 0 -30px;
            }
            label.css-label {
        background-image:url(http://csscheckbox.com/checkboxes/u/csscheckbox_129976c07083b34e93c4b700b4795a59.png);
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
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
                <div class="x_panel">
                <div>
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
                  </div>
                   

                  <div class="x_content">

                   
                   <div id="msg"></div>
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                              <th class="column-title">Name</th>
                              <th class="column-title">User Name</th>
                              <th class="column-title">Disable Badges</th>
                              <th class="column-title">Password</th>
                              <th class="column-title"></th>
                              <th class="column-title"></th>
                              <th class="column-title"></th>
                              <th class="column-title">Edit</th>
                              <th class="column-title">Change Working Status</th>
                            
                          </tr>
                        </thead>
                         
                        <tbody>
                          <?php foreach ($showemp as $value) { ?>
                          <tr>
                              <td><?php echo $value['name']; ?></td>
                              <td><?php echo $value['username']; ?></td>
                              <td>
                                <!-- <button class="btn btn-primary btn-xs" onclick="disbadges('<?php //echo $value['Eid']; ?>','<?php// echo $value['name']; ?>')">Change Badges</button> -->
                

                              </td>
                              <td colspan="4"><input type="button" class="btn btn-success btn-xs" onclick="reset_pass(<?php echo $value['Eid'];?>)" value="Reset"><input type="text" style="display:none" id="newpass_<?php echo $value['Eid'];?>" name="newpass" placeholder="Enter New Password"><input type="button" class="btn btn-success btn-xs" onclick="reset(<?php echo $value['Eid'];?>)" id="btn_<?php echo $value['Eid'];?>" style="display:none" value="Click To Reset"></td>
                              <td><input type="button" class="btn btn-success btn-xs" onclick="edit_employee('<?php echo $value['Eid'];?>','<?php echo $value['name'];?>','<?php echo $value['username'];?>')" value="Edit"></td>
                              <td><input type="button" class="btn btn-success btn-xs" onclick="change_work_status(<?php echo $value['Eid'];?>)" value="Make Inactive"><textarea style="display:none" id="reason_<?php echo $value['Eid'];?>" name="newpass" placeholder="Describe Reason"></textarea><input type="text" style="display:none" placeholder="Select The Date" class="datepicker" id="datepicker<?php echo $value['Eid'];?>"><input type="button" class="btn btn-success btn-xs" onclick="change_work(<?php echo $value['Eid'];?>)" id="click_btn_<?php echo $value['Eid'];?>" style="display:none" value="Click To Inactive"></td> 
                          </tr>
                          <?php }?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-sm-12 col-xs-12" style="display:none" id="edit_employee">
                <div class="x_panel">
                

                  <div class="x_content">

                   
                    <h2>Edit The User</h2>
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                              <th class="column-title">Name</th>
                              <th class="column-title">User Name</th>
                              <th class="column-title">Action</th>
                          </tr>
                        </thead>
                         
                        <tbody>
                          
                          <tr>
                            <form method="post" action="admin_control/Admin/edit_emp">
                              <td><span id="name"></span><input type="text" id="emid" name="emid" style="display:none"></span></td>
                              <td><input type="text" id="username" name="username"></td>
                              <td><input type="submit" value="Edit Employee"></td> 
                            </form>
                          </tr>
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
   

   <div class="modal fade" id="baddge">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Disable/Enable Badges For <span id="names"></span></h4>
      </div>
      <div class="modal-body">
        <div id="msg"></div>
        <div class="col-md-6 col-sm-6 col-lg-12" style="background:#73879c; color:white">
          <h1>Disable badges</h1>
          <br>
         <strong> Cross The Box To Make Badges Disable For Employee And Uncross For Make It Enable </strong>
          <div id="modal_display" >

          </div>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-12" style="background:#73879c; color:white">
         <h1>Enable badges</h1>
          <br>
         <strong> Check The Box To Make Badges Enable For Employee And Uncheck For Make It Disable </strong>
          <div id="enable" >

          </div>
        </div>

      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
              


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





















