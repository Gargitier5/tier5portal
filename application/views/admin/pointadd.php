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

   <script>

   function editpoint(po_id)
    {
    //alert(po_id);
    $('#add_point_'+po_id).show();
    $('#input').show();
    }

    function add_p(po_id)
    {
      var npoint=$('#new_point_'+po_id).val();
      //alert(npoint);
      var res= $.ajax({
        type : 'post',
        url : 'admin_control/admin/add_point',
        data : 'po_id='+po_id+'& npoint='+npoint,
        async : false,
        success : function(msg)
          {
              if(msg)
              {

                //alert(msg)
                  window.location.reload();       
              } 
          }
        });
    }
   </script>
    <!-- Custom Theme Style -->
    <link href="css/custom.css" rel="stylesheet">
  
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
                  <h3>Add/Deduct Points</h3>
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
                  <div class="x_content">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                              <th class="column-title">Name</th>
                              <th class="column-title">Point</th>
                               <th class="column-title" style="display:none" id="input">Input</th>
                              <th class="column-title">Action</th>
                              
                          </tr>
                        </thead>
                         
                        <tbody>
                               <?php foreach ($allpoints as $key ) 
                               {
                                ?>
                                   <tr>
                                       <td><?php echo $key['name'];?></td>
                                       <td><?php echo $key['points'];?></td>
                                       <td id="add_point_<?php echo $key['P_id'];?>" style="display:none"><input type="number" id="new_point_<?php echo $key['P_id'];?>" > <button id="add_p" class="btn  btn-xs btn-success" onclick="add_p(<?php echo $key['P_id'];?>)">Add</button></td>
                                       <td><button class="btn btn-success btn-xs glyphicon glyphicon-edit" onclick="editpoint(<?php echo $key['P_id'];?>)"> </button></td>
                                   </tr>

                               <?php }?>
                        </tbody>
                    </table>

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