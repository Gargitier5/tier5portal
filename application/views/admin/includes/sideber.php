 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url();?>admin_control/admin"><i class="fa fa-home"></i> Home </a></li>
                  <li><a><i class="fa fa-user"></i> Manage Employee <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>admin_control/admin/allemp">Employee Personal Information</a></li>
                    
                      <li><a href="<?php echo base_url();?>admin_control/admin/empinfo">Active Employee Information</a>
                      </li>
                      <li><a href="<?php echo base_url();?>admin_control/admin/add_employee">Add New Employee</a>
                      </li>
                      <li><a href="<?php echo base_url();?>admin_control/admin/setbonus">Create New User</a>
                      </li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-child"></i>Employee Activity<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>admin_control/admin/dailyactivity">Daily Activity</a>
                      </li>
                      <li><a href="<?php echo base_url();?>admin_control/admin/emplate">Employee Late/Absent</a>
                      </li>
                      <li><a href="<?php echo base_url();?>admin_control/admin/empproductivity">Employee Productivity</a>
                      </li>
                    </ul>
                  </li>
                   <?php 
                   $type=$this->session->userdata('role');
                   if($type==0)
                   {
                    ?>
                    <li><a><i class="fa fa-flag"></i> Manage Facility <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>admin_control/admin/allbreak">Manage Break</a></li>
                      <li><a href="<?php echo base_url();?>admin_control/admin/manageclockin">Manage Clock In/Clock Out Time</a></li>
                    </ul>
                  </li>


                   <?php
                    }
                   ?>
             
                  <li><a><i class="fa fa-cutlery"></i>Lunch Program <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>admin_control/admin/lunchorder">Lunch Order</a>
                      </li>
                      <li><a href="<?php echo base_url();?>admin_control/admin/expand">Expendature For Lunch Program</a>
                      </li>
                      <li><a href="<?php echo base_url();?>admin_control/admin/placelunch">Place Lunch Order In Behalf Of An Employee</a>
                      </li>
                      <li><a href="<?php echo base_url();?>admin_control/admin/addlunchitem">Add New Shop/Item</a>
                      </li>
                      <li><a href="<?php echo base_url();?>admin_control/admin/addlunchbonus">Add/Deduct Lunch Bonus</a>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-image"></i>Event Management<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>admin_control/admin/showallevent">Show All Event</a>
                      </li>
                      <li><a href="<?php echo base_url();?>admin_control/admin/addevent">Add Event</a>
                      </li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-check-square-o"></i>Attendance Bonus<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>admin_control/admin/expendature_attend">Expandeture On Attendance</a>
                      </li>
                      <li><a href="<?php echo base_url();?>admin_control/admin/allpoint">Point History</a>
                      </li>
                      <li><a href="<?php echo base_url();?>admin_control/admin/pointadd">Point Add/Deduct</a>
                      </li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-newspaper-o"></i>Manage Notice Board<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>admin_control/admin/shownotice">Show All Notice</a>
                      </li>
                      <li><a href="<?php echo base_url();?>admin_control/admin/addnotice">Add New Notice</a>
                      </li>
                    </ul>
                  </li>

                  <li><a><i class="fa fa-thumbs-o-up"></i>Employee Of The Month<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>admin_control/admin/showempofmonth">Manage Employee Of The Month</a>
                      </li>
                      
                    </ul>
                  </li>

                    <li><a><i class="fa fa-smile-o"></i>Holiday Management<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>admin_control/admin/show_allholyday">All Holidays</a>
                      </li>

                      <li><a href="<?php echo base_url();?>admin_control/admin/addholyday">Add Holiday</a>
                      </li>

                      <li><a href="<?php echo base_url();?>admin_control/admin/specialholiday">Special Holiday</a>
                      </li>
                      
                    </ul>
                  </li>

                  <li><a><i class="fa fa-tags"></i>Log Book<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>admin_control/admin/logactivity">See Point Deduct/Add Activity</a>
                      </li>
                    </ul>
                  </li>

                  <?php 
                   $type=$this->session->userdata('role');
                   if($type==0)
                   {
                    ?>
                  <li><a><i class="fa fa-comment"></i>Chat<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>admin_control/admin/ChatHistory">See Chat History</a>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-hand-o-right"></i>BDM Activity<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>admin_control/admin/bdmactivity">Proposals Submitted By BDM</a>
                      </li>
                       <!-- <li><a href="<?php// echo base_url();?>admin_control/admin/monthly_progress">Manage Portal</a>
                      </li> -->
                      <!--  <li><a href="">See Progress</a>
                      </li> -->
                    </ul>
                  </li>
                  <li><a><i class="fa fa-trophy"></i>Badges<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url();?>admin_control/admin/badges">Manage Badges</a>
                      </li>
                      <li><a href="<?php echo base_url();?>admin_control/admin/badgesemployee">Deactivate For Perticuler Employee</a>
                      </li>

                    </ul>
                  </li>
                 <?php } ?>
                </ul>
              </div>
              <!-- <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a>
                      </li>
                      <li><a href="projects.html">Projects</a>
                      </li>
                      <li><a href="project_detail.html">Project Detail</a>
                      </li>
                      <li><a href="contacts.html">Contacts</a>
                      </li>
                      <li><a href="profile.html">Profile</a>
                      </li>
                    </ul>
                  </li>
                   <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_404.html">404 Error</a>
                      </li>
                      <li><a href="page_500.html">500 Error</a>
                      </li>
                      <li><a href="plain_page.html">Plain Page</a>
                      </li>
                      <li><a href="login.html">Login Page</a>
                      </li>
                      <li><a href="pricing_tables.html">Pricing Tables</a>
                      </li>
                    </ul>
                  </li> 
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a>
                  </li>
                </ul>
              </div> -->

            </div>
            <!-- /sidebar menu -->
