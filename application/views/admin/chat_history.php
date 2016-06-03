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
    <link href="css/admin/chat_screen.css" rel="stylesheet">
        <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
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
                  <h3>Employee Chat History</h3>
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
          <div class="panel panel-default">

          <?php foreach($history as $his):
            $str=str_replace("-"," And ",$his['chat_btwn']);
           
          ?>
          <div class="panel-heading">
          <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $his['chat_btwn'];?>"><?php echo ucfirst($str);?></a>
          <div align="right"  ></div>
          </h4>
          </div>
    

          <div id="collapse<?php echo $his['chat_btwn'];?>" class="panel-collapse collapse">
          <div class="panel-body">
          <?php  $fetchHistory=FngetChatHistory($his['chat_btwn']); if(!empty($fetchHistory)){
          ?>

<div class="chat admin-panel-chat">
  <ul>
    
 <?php foreach($fetchHistory as $hist){ ?>
     <li><img src="images/Talk_male.png">
      <div class="message"><?php echo $hist['from']." : ".$hist['message'];?></div>
    </li>
    <?php }?>
  </ul>
 
</div>
           <?php

          } ?>



          </div>
          </div>
          <?php endforeach;?>

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