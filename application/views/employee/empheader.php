<section class="header">
      <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="logo"><a href="#"><img src="images/tier5.png" alt="Tier5"></a></div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                 <div class="dropdown">
                  <?php 
                   $type=$this->session->userdata('role');
                   if($type==3)
                   {?>
                  <span class="bdm"><a href="employee_control/employee/bdmaccess">BDM</a></span>
                  <?php }?>
                  <span class="dropdown-toggle" type="button" data-toggle="dropdown">Welcome <?php echo $emp_details['name'];?>
                  <span class="caret"></span></span>
                  <ul class="dropdown-menu">

                      <div class="profile-pic">
                        <img src="images/profile-pic.jpg" alt="img">
                      </div>
                      <!-- <button class="btn log-btn">Edit Profile</button> -->
                      <form action="employee_control/Employee/logout" method="post">
                
                            <input type="submit" value="logout" class="btn log-btn"></input>
                         
                      </form>
                      

                  </ul>
                 </div>


            </div>
            


        </div>  
      </div>  
    </section> 