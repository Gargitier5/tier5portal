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
    <script type="text/javascript" src="js/notice.js"></script>
    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
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
                  <h3>Show All Notice</h3>
                  <div class="x_content">
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
                    <div class="ln_solid"></div>
                       <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                              <th class="column-title">Date <br>(dd/mm/yy)</th>
                              <th class="column-title">Subject</th>
                              <th class="column-title">Notice</th>
                              <th class="column-title">Status</th>
                              <th class="column-title">Change Status</th>
                              <th class="column-title">Action</th>

                              
                            
                          </tr>
                        </thead>
                         
                        <tbody>
                          <?php foreach ($notice as $value) { ?>
                          <tr>
                              <td><?php $str = $value['date'];
$date = DateTime::createFromFormat('Y-m-d', $str);
$datee=$date->format('d/m/Y');
echo $datee; ?></td>
                              <td><?php echo $value['subject']; ?></td>
                              <td><?php echo $value['notice']; ?></td>
                              <td><?php if ($value['status']==0){ echo"Active";} else { echo "Inctive";} ?></td>
                              <td><button class="btn btn-primary" onclick="change_status('<?php echo $value['n_id']; ?>','<?php echo $value['status']; ?>')">Change Status</button></td>
                              <td><button class="btn btn-danger glyphicon glyphicon-trash" onclick="delete_notice(<?php echo $value['n_id']; ?>)"></button>&nbsp;<button class="btn btn-success glyphicon glyphicon-edit" onclick="edit_notice('<?php echo $value['n_id']; ?>','<?php echo $datee; ?>', '<?php echo $value['subject']; ?>','<?php echo $value['notice']; ?>')"></button></td>
   
                          </tr>
                          <?php }?>
                        </tbody>
                      </table>
                    </div> 
                    <br>
                    <br>
                     
                    <div class="table-responsive" id="edit_note" style="display:none">
                      <h4>Edit Notice</h4>
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                              
                              <th class="column-title">Subject</th>
                              <th class="column-title">Notice</th>
                              <th class="column-title">Action</th>
                              

                              
                            
                          </tr>
                        </thead>
                         
                        <tbody>
                          
                          <tr>
                            <form method="post" action="admin_control/Admin/edit_notice">
                              <td><input type="text" id="subject" name="subject"> <input type="text" style="display:none" id="noticeid" name="noticeid"></td>
                              <td><textarea id="notice" name="notice"></textarea></td>
                              <td><input type="submit" value="Add" class="btn btn-primary"></td>
                            </form>
   
                          </tr>
                         
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