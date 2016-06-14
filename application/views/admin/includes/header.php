<div class="top_nav">

          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                   <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/employee.png" alt="">Welcome Admin
                    <span class=" fa fa-angle-down"></span>
                  </a> 
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                     <li><button type="button" class="btn btn-defaultd btn-sm" data-toggle="modal" data-target="#myModal">Change Password</button>


                    </li> 
                    <!-- <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <!-- < --><!--li>
                      <a href="javascript:;">Help</a>
                    </li> -->
                    <li>
                       <a href="admin_control/Admin/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>

                    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="modal-title" align="center">Change Your Password</h3>
      </div>
      <div class="modal-body" align="center">
        <form method="post" action="admin_control/admin/changepass">
        <p><input type="password" name= "oldpass" placeholder="Enter Old Password"></p>
        <p><input type="password" name="newpass" id="txtNewPassword" placeholder="Enter New Password"></p>
        <p><input type="password" name="confpass" id="txtConfirmPassword" placeholder="Confirm Password"></p>
        <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
        <p><input type="submit" value="Click To Change" class="btn btn-primary"></p>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
   $("#txtConfirmPassword").keyup(function() {
        var password = $("#txtNewPassword").val();
        $("#divCheckPasswordMatch").html(password == $(this).val()
            ? "<span style='color:green;font-weight:bold'>New Password And Confirm Password Match.</span>"
            : "<span style='color:red;font-weight:bold'>New Password And Confirm Password do not match!</span>"
        );
    });

</script>
        </div>

