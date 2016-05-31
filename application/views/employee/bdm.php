<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Tier5</title>
    <base href="<?php echo base_url();?>">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom2.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="shortcut icon" type="image/x-icon" href="images/t5.png">

    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.css">

    <link rel="stylesheet" href="css/font-awesome.css">

  </head>
  <body>
    <!-- top navigation -->

    <?php echo $header;  ?>
    <!-- top navigation -->
    <section class="bodypart">
      <div class="container">
       
        <div class="row">
          <div class="col-lg-10 col-md-10">
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
            <div class="box work-update">
              <h2>Work Report</h2>
              <div class="form-group">
              <div class="row">    
                <div class="col-md-6">
                  <label>Portal</label>
                  <form method="post" action="employee_control/employee/add_activity">
                  <select class="form-control" id="url_id" name="url_id">
                    <option value="">-Select Url-</option>
                    <?php foreach ($url as $url) {?>
                    <option value="<?php echo $url['burl_id'];?>"><?php echo $url['url'];?></option>
                    
                    <?php }?>
                  </select> 
                </div>
               <!--  <div class="col-md-6">
                  <label>Time</label>
                  <input type="text" class="form-control">
                </div>   -->
              </div>
              </div>
              <div class="form-group">
              <div class="row">    
                <div class="col-md-6">
                  <label>Job Posting</label>
                  <input type="text" id="posted" name="posted" class="form-control"> 
                </div>
                <div class="col-md-6">
                  <label>Our Proposal</label>
                  <input type="text" id="proposed" name="proposed" class="form-control">
                </div>  
              </div>
              </div> 
              <div class="form-group">
                <div class="row"> 
                <div class="col-md-12">  
                <label>Coverletter</label>
                <textarea class="form-control" id="coverletter" name="coverletter"></textarea>
                </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row"> 
                  <div class="col-md-12">
                    <input type="submit" value="Submit" class="btn submit-btn">
                  </div>
                </div>  
              </div> 

            
            </div>



            <div class="box work-update">
                    <h2>Work Update</h2>


                  <div id="demo">
                  <section id="examples">
                    
                    <div data-mcs-theme="minimal" class="content content1 mCustomScrollbar _mCS_2 mCS-autoHide" style="position: relative; overflow: visible;"><div class="mCustomScrollBox mCS-minimal mCSB_vertical mCSB_outside" id="mCSB_2" style="max-height: none;" tabindex="0"><div dir="ltr" style="position: relative; top: 0px; left: 0px;" class="mCSB_container" id="mCSB_2_container">
                     <ul>
                      <?php foreach ($bdmactive as $key) {
                       
                       ?>
                        <li>
                          <p><strong>URL:</strong><?php echo $key['main_url'];?></p>
                          <p>
                            <strong>Date:</strong> <?php echo $key['date'];?>
                          <p> 
                            <p>
                            <strong>Time:</strong> <?php echo $key['time'];?>
                          <p> 
                           <strong>Cover Letter:</strong><?php echo $key['cover_letter'];?>
                          <p>

                        </li>  
                         <?php }?>
                        <!-- <li>
                          <p><strong>URL:</strong>https://www.google.co.in/?gfe_rd=cr&ei=MDdFV_uLGOiK8Qft6q2wBw&gws_rd=ssl</p>
                          <p>
                            <strong>Date:</strong> 25.06.2016
                          </p> 
                          <p> 
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                          <p>
                        </li> -->   
                        <!-- <li>
                          <p><strong>URL:</strong>https://www.google.co.in/?gfe_rd=cr&ei=MDdFV_uLGOiK8Qft6q2wBw&gws_rd=ssl</p>
                          <p>
                            <strong>Date:</strong> 25.06.2016
                          </p> 
                          <p> 
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                          <p>
                        </li>  
                        <li>
                          <p><strong>URL:</strong>https://www.google.co.in/?gfe_rd=cr&ei=MDdFV_uLGOiK8Qft6q2wBw&gws_rd=ssl</p>
                          <p>
                            <strong>Date:</strong> 25.06.2016
                          </p> 
                          <p> 
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                          <p>
                        </li>  
                        <li>
                          <p><strong>URL:</strong>https://www.google.co.in/?gfe_rd=cr&ei=MDdFV_uLGOiK8Qft6q2wBw&gws_rd=ssl</p>
                          <p>
                            <strong>Date:</strong> 25.06.2016
                          </p> 
                          <p> 
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                          <p>
                        </li>  
                        <li>
                          <p><strong>URL:</strong>https://www.google.co.in/?gfe_rd=cr&ei=MDdFV_uLGOiK8Qft6q2wBw&gws_rd=ssl</p>
                          <p>
                            <strong>Date:</strong> 25.06.2016
                          </p> 
                          <p> 
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                          <p>
                        </li>    -->
                     

                     </ul> 
                    </div></div><div class="mCSB_scrollTools mCSB_2_scrollbar mCS-minimal mCSB_scrollTools_vertical" id="mCSB_2_scrollbar_vertical" style="display: block;"><div class="mCSB_draggerContainer"><div oncontextmenu="return false;" style="position: absolute; min-height: 50px; top: 0px; display: block; height: 38px; max-height: 96px;" class="mCSB_dragger" id="mCSB_2_dragger_vertical"><div class="mCSB_dragger_bar" style="line-height: 50px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div>
                 
                  </section>
                  </div>






                  </div>  
       
          </div>  
          <div class="col-lg-2 col-md-2 col">
              <div class="chat">
                <ul>
                  <li>
                    <div class="user-pic">
                          <img src="images/user1.jpg" alt="img">
                        </div>  
                      <div class="user-name">Kingsuk Majumder</div>

                  </li>
                  <li>
                    <div class="user-pic">
                          <img src="images/user2.jpg" alt="img">
                        </div>  
                      <div class="user-name">Subhankar Roy</div>

                  </li>
                  <li>
                    <div class="user-pic">
                          <img src="images/user3.jpg" alt="img">
                        </div>  
                      <div class="user-name">Biplab Mukherjee</div>

                  </li> 
                  <li>
                    <div class="user-pic">
                          <img src="images/user4.jpg" alt="img">
                        </div>  
                      <div class="user-name">Amit Das</div>

                  </li> 
                  <li>
                    <div class="user-pic">
                          <img src="images/user5.jpg" alt="img">
                        </div>  
                      <div class="user-name">Gargi Pal</div>

                  </li> 


                </ul>  
                <div class="clearfix"></div>
              </div>  
          </div>  

          
        </div>
            
          </div>
          
            
        

        </div>
      </div>  
    </section>  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Google CDN jQuery with fallback to local -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
  <script>window.jQuery || document.write('<script src="../js/minified/jquery-1.11.0.min.js"><\/script>')</script>
  
  <!-- custom scrollbar plugin -->
  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
  
  <script>
    (function($){
      $(window).load(function(){
        
        $("body").mCustomScrollbar({
          theme:"minimal"
        });
        
      });
    })(jQuery);
  </script>
  <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>

  </body>
</html>