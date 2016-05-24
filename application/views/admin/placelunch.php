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
     
 

         <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
       <!-- jQuery -->
     <script src="vendors/jquery/dist/jquery.min.js"></script>

     <script type="text/javascript" src="js/placelunch.js"></script>


      <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
      <script type="text/javascript" src="js/lunchcost.js"></script>
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

                   
                   <div id="msg"></div>
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                        <tr>
                          <td>Select The Employee Name</td>
                          <td>
                            <select >
                              <option value="">--Select--</option>
                            <?php foreach($allemployee as $employee){
                              ?>
                                    <option value="<?php echo $employee['id'];?>"><?php echo $employee['name'];?></option>
                            <?php }
                              ?>
                            </select>
                           </td>
                       </tr>
                       <tr>
                          <td>Select The Shop</td>
                          <td>
                            <select id="selectshop_id" >
                              <option value="">--Select--</option>
                            <?php foreach($allshop as $shop){
                              ?>
                                    <option value="<?php echo $shop['Lnid'];?>"><?php echo $shop['item'];?></option>
                            <?php }
                              ?>
                            </select>
                           </td>
                       </tr>
                       <tr>
                         <td>Select The Lunch Item</td>
                         <td >
                          <table>

                            <tbody id="item_of_employee" name="item_of_employee">
                            </tbody>
                          </table>

                          </td>

                    </tr>
                    <tr>
                         <td>Selected Item

                           <input type="hidden" name="total_item_lunch1" id="total_item_lunch1">
                         </td>
                        
                         <td id="total_item_lunch" name="total_item_lunch">
                        
                             
                          </td>
                          
                    </tr>
                    <tr>
                         <td>Cost <input type="hidden" name="total_cost_lunch1" id="total_cost_lunch1"></td>
                         <td id="total_cost_lunch" name="total_cost_lunch">00</td>

                    </tr>
                    <tr>
                         <td><input type="button" value="Submit Lunch Order" onclick="lunchsubmit();"></td>
                         
                 
                    </tr>
                    
                 </table>


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
