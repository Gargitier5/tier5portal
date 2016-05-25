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
     <script type="text/javascript" src="js/point.js"></script>
    <!-- jQuery -->
     <script src="vendors/jquery/dist/jquery.min.js"></script>

      <script>
  $(function() {
    $( "#datepicker" ).datepicker({
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
                  <div class="x_title">
                    <h2>Add Special Holiday </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                    </ul>
                    <div class="clearfix"></div>
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
                  <div class="x_content">
                 

                  <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                              <th class="column-title">Name</th>
                              <th class="column-title">Date</th>
                              <th class="column-title">Reason</th>
                              <th class="column-title">Action</th>
                              
                          </tr>
                        </thead>
                         
                        <tbody>
                          <tr>
                               <td>
                              <form method="post" action="admin_control/admin/addspholiday">
                                   <select id="name" name="name">
                                      <option>--Select--</option>
                                     <?php foreach ($showallemp as $emp) {?>

                                        <option value="<?php echo $emp['id'];?>"><?php echo $emp['name'];?></option>
                                     <?php } ?> 

                                  </select>
                               
                               </td>
                                        <td><input type="text" id="datepicker" name="datepicker"></td>
                                         <td><input type="text" id="reason" name="reason"></td>
                                       <td><input type="submit" class="btn btn-success" value="Add"></td>
                              </form>      
                                   </tr>
                   
                              
                        </tbody>
                    </table>
                </div>
              </div>
            </div>
           <br>
           <br>
           <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>All Special Holiday </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                    </ul>
                    <div class="clearfix"></div>
                    
                  </div>
                  <div class="x_content">
                      Choose Year
                      <br>
                      <form action="admin_control/admin/specialholiday" method="post">
                       <select id="yearselect" name="yearselect">
                       <option value="">--Select</option>
                       <option value="2016">2016</option>
                       <option value="2017">2017</option>
                       <option value="2018">2018</option>
                       <option value="2019">2019</option>
                       <option value="2020">2020</option>
                       <option value="2021">2021</option>
                       <option value="2022">2022</option>
                       <option value="2023">2023</option>
                       <option value="2024">2024</option>
                       <option value="2025">2025</option>
                       <option value="2026">2026</option>
                       <option value="2027">2027</option>
                       <option value="2028">2028</option>
                       <option value="2029">2029</option>
                       <option value="2030">2030</option>
                       <option value="2031">2031</option>
                       <option value="2032">2032</option>
                       <option value="2033">2033</option>
                       <option value="2034">2034</option>
                       </select>
                     <input type="submit" value="Submit Year">

                     </form> 

                  <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                              <th class="column-title">Name</th>
                              <th class="column-title">Date</th>
                              <th class="column-title">Reason</th>
                              <th class="column-title">Action</th>
                              
                          </tr>
                        </thead>
                         
                        <tbody>
                          
                            <?php foreach($allspecialholiday as $special) {?>
                            <tr>
                               <td><?php echo $special['name'];?></td>
                               <td><?php echo $special['date'];?></td>
                               <td><?php echo $special['reason'];?></td>
                               <td><button class="btn btn-danger btn-sm glyphicon glyphicon-trash" onclick="delete_spholiday(<?php echo $special['sp_h'] ; ?>)"></button></td>
                              </tr>
                             <?php } ?>       
                         
                   
                              
                        </tbody>
                    </table>
                </div>
              </div>
            </div>



          </div>
        </div>
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
