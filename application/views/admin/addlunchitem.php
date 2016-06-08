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
    <script type="text/javascript" src="js/lunchadd.js"></script>
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


              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                

 
                  
                  <div class="x_content">

                   
                    <div class="table-responsive">
                        <h2>Click On Shop To See Items</h2>
                       <table class="table table-striped jambo_table bulk_action">
                       
                       <tbody>
                         <?php foreach($allshop as $shop){?>
                          <tr>
                            <td><button onclick="showeshop('<?php echo $shop['Lnid'];?>','<?php echo $shop['item'];?>')" class="btn btn-primary btn-xs" id="shop_<?php echo $shop['Lnid'];?>"><?php echo $shop['item'];?></button></td>
                            <td><button onclick="deleteshop(<?php echo $shop['Lnid'];?>)" class="btn btn-danger glyphicon glyphicon-trash btn-xs pull-right"></button></td>
                          </tr>
                         <?php }?>

                       </tbody>
                      </table>
                     
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="x_panel">
                
              
 
                  
                  <div class="x_content">
              
                   
                    <div class="table-responsive">
                        <h2>Add New Shop</h2>
                       <table class="table table-striped jambo_table bulk_action">
                       <tbody>
                          <tr>
                            <form method="post" action="admin_control/admin/addlunchitem" >
                            <td><input type="text" id="shopname" name="shopname" placeholder="Enter Shop Name"></td>
                            <td><input type="submit" value="Add" class="btn btn-success"></td>
                            </form>
                          </tr>
                       </tbody>
                      </table>
                     
                    </div>


                    <br>
                    <br>
                    <div class="table-responsive">
                        <h2>Add New Item</h2>
                        <div><?php 
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
<?php }?></div>
                       <table class="table table-striped jambo_table bulk_action">
                       <tbody>
                          <tr>
                            <td>Select Shop</td>
                            <form method="post" action="admin_control/admin/additem" >
                            <td><select id="shopselect"  name="shopselect">
                                 <option value="">--Select--</option>
                                <?php foreach ($allshop as $key )

                                {?>
                                  <option value="<?php echo $key['Lnid'];?>"><?php echo $key['item'];?></option>
                                <?php }?>
                     
                                </select></td>
                          </tr>
                          <tr>
                            <td>Item Name</td>
                            <td><input type="text" name="itemname" placeholder="Enter Item Name"></td>
                            </tr>
                          <tr>
                             <td>Item Cost</td>
                            <td><input type="number" name="itemcost" placeholder="Enter Item Cost" min="1"></td>
                            </tr>
                          <tr>
                            <td>Item Limit</td>
                            <td><input type="number" name="itemlimit" placeholder="Enter Item Limit" min="1"></td>
                            </tr>
                          <tr>
                            <td><input type="submit" value="Add" class="btn btn-success"></td>
                            <td></td>
                            </form>
                          </tr>
                       </tbody>
                      </table>
                     
                    </div>
                  </div>
                </div>
              </div>


              <div class="col-md-12 col-sm-12 col-xs-12" id="itemdiv" style="display:none">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="table-responsive">
                        <h2>Items Of <span id="nameofshop"></span></h2>
                       <table class="table table-striped jambo_table bulk_action">
                       <thead>
                          <tr>
                            <td>Item Name</td>
                            <td>Cost</td>
                            <td>Limit</td>
                            <td>Action</td>
                          </tr>
                       </thead>
                       <tbody id="showallitem">
                         

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