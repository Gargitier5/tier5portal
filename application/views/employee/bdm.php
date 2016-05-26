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

    <!-- For Chart -->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Dinosaur', 'Length'],
          ['Acrocanthosaurus (top-spined lizard)', 12.2],
          ['Albertosaurus (Alberta lizard)', 9.1],
          ['Allosaurus (other lizard)', 12.2],
          ['Apatosaurus (deceptive lizard)', 22.9],
          ['Archaeopteryx (ancient wing)', 0.9],
          ['Argentinosaurus (Argentina lizard)', 36.6],
          ['Baryonyx (heavy claws)', 9.1],
          ['Brachiosaurus (arm lizard)', 30.5],
          ['Ceratosaurus (horned lizard)', 6.1],
          ['Coelophysis (hollow form)', 2.7],
          ['Compsognathus (elegant jaw)', 0.9],
          ['Deinonychus (terrible claw)', 2.7],
          ['Diplodocus (double beam)', 27.1],
          ['Dromicelomimus (emu mimic)', 3.4],
          ['Gallimimus (fowl mimic)', 5.5],
          ['Mamenchisaurus (Mamenchi lizard)', 21.0],
          ['Megalosaurus (big lizard)', 7.9],
          ['Microvenator (small hunter)', 1.2],
          ['Ornithomimus (bird mimic)', 4.6],
          ['Oviraptor (egg robber)', 1.5],
          ['Plateosaurus (flat lizard)', 7.9],
          ['Sauronithoides (narrow-clawed lizard)', 2.0],
          ['Seismosaurus (tremor lizard)', 45.7],
          ['Spinosaurus (spiny lizard)', 12.2],
          ['Supersaurus (super lizard)', 30.5],
          ['Tyrannosaurus (tyrant lizard)', 15.2],
          ['Ultrasaurus (ultra lizard)', 30.5],
          ['Velociraptor (swift robber)', 1.8]]);

        var options = {
          title: 'Lengths of dinosaurs, in meters',
          legend: { position: 'none' },
        };
        var options = {
    title: 'Country Populations',
    legend: { position: 'none' },
    colors: ['#fff'],
    backgroundColor: '#466E74',
    legendTextStyle: { color: '#FFF' },
    titleTextStyle: { color: '#FFF' },
    hAxis: {
      color: '#FFF',
    },

      chartArea: {
                backgroundColor: '#466E74'
            },
  };

        var chart = new google.visualization.Histogram(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>


     <!-- For Chart -->




  </head>
  <body>
    <section class="header">
      <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="logo"><a href="#"><img src="images/tier5.png" alt="Tier5"></a></div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                 <div class="dropdown">
                  <span class="bdm"><a href="bdm.html">BDM</a></span>
                  <span class="dropdown-toggle" type="button" data-toggle="dropdown">Welcome Arindam!
                  <span class="caret"></span></span>
                  <ul class="dropdown-menu">
                      <div class="profile-pic">
                        <img src="images/profile-pic.jpg" alt="img">
                      </div>
                      <button class="btn log-btn">Edit Profile</button>
                      <button class="btn log-btn">Logout</button>
                      

                  </ul>
                 </div>


            </div>
            


        </div>  
      </div>  
    </section> 
    <section class="bodypart">
      <div class="container">
       
        <div class="row">
          <div class="col-lg-10 col-md-10">
            <div class="box work-update">
              <h2>Work Report</h2>
              <div class="form-group">
              <div class="row">    
                <div class="col-md-6">
                  <label>Portal</label>
                  <select class="form-control">
                    <option>-Select Url-</option>
                    <option>www.odesk.com</option>
                    <option>www.google.com.</option>
                    <option>www.yahoo.com</option>
                  </select> 
                </div>
                <div class="col-md-6">
                  <label>Time</label>
                  <input type="text" class="form-control">
                </div>  
              </div>
              </div>
              <div class="form-group">
              <div class="row">    
                <div class="col-md-6">
                  <label>Job Posting</label>
                  <input type="text" class="form-control"> 
                </div>
                <div class="col-md-6">
                  <label>Our Proposal</label>
                  <input type="text" class="form-control">
                </div>  
              </div>
              </div> 
              <div class="form-group">
                <div class="row"> 
                <div class="col-md-12">  
                <label>Coverletter</label>
                <textarea class="form-control"></textarea>
                </div>
                </div>>
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
                        </li>   
                     

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