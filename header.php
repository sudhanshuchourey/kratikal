<?php

$sqlsettings1 = "SELECT * from admin1 where id=".$_SESSION['id'];

$resultsettings1 = mysql_query($sqlsettings1);

$rowsettings1 = mysql_fetch_array($resultsettings1);

$name=$rowsettings1['Name'];

?>
<style type="text/css">
a.disabled {
   pointer-events: none;
   cursor: default;
}
</style>
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">

            <div class="col-lg-12">

                <div class="col-lg-4">

                   <img src="images/logo.png" style="width:50%;"/>

                </div>

                <div class="col-lg-8">

                    <h4 style="font-size: x-large; font-weight: bold; color: #800000; float: right;margin-top: 25px;"> <span id="ctl00_lblUserid">Welcome <?php echo $name; ?></span> 

                    <img src="<?php echo $rowsettings['url'].$rowsettings1['picture']?>" width="50"/> </h4><br />

                </div>

            </div>

            

            <div class="navbar-default sidebar" role="navigation">

                <div class="sidebar-nav navbar-collapse">

                    <ul class="nav" id="side-menu">

                     

						

                        <li>

                            <a href="dashBoard.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>

                        </li> 

                  

                       

                          <li>

                            <a href="employee.php"><i class="fa fa-users fa-fw"></i> Employee List</a>                          

                        </li> 

                         

                        <li>

                            <a href="changepassword.php"><i class="fa fa-key fa-fw"></i>Change Password</a>                 

                        </li>                       

                        <li>

                            <a id="ctl00_LinkButton2" href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>                          

                        </li>

                        
 

                    </ul>

                </div>

            </div>

        </nav>