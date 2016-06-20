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
            <div align="right">
            <h2><span><<</span><a href="admin_control/admin/empinfo">Back</a></h2>
          </div>
            <div class="row">
              <br>
              <h2>Manage Badges For <?php echo $info['name'];?></h2> 
              <div class="col-md-12 col-sm-12 col-xs-12" >
                <div class="x_panel"style="background:#73879c; color:white">
                  <div class="x_content" >
                    <h1>Disable badges</h1>
          <br>
         <strong> Cross The Box To Make Badges Disable For Employee And Remove Cross For Make It Enable </strong>
                    <div class="table-responsive"  >
                      <?php print_r($result); ?>
                    </div>
                  </div>
                </div>

                <div class="x_panel"style="background:#73879c; color:white">
                  <div class="x_content" >
                    <h1>Enable badges</h1>
          <br>
         <strong> Check The Box To Make Badges Enable For Employee And Uncheck For Make It Disable </strong>
                    <h1></h1>
                    <br>
                    <div class="table-responsive"  >
                       <?php print_r($result1); ?>
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