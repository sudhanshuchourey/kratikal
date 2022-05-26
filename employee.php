<?PHP

	session_start();

	include("connection.php");

	

	if ($_SESSION['LoginID'] == '')

	{

		header('LOCATION: index.php');

	

	}

	

	$sqlsettings = "SELECT * from admin";

$resultsettings = mysql_query($sqlsettings);

$rowsettings = mysql_fetch_array($resultsettings);

if(isset($_REQUEST['searching'])){

$page_name="employee.php?searching=true&location=".$_REQUEST['location']."&experience=".$_REQUEST['experience'].""; 
}
else {
	$page_name="employee.php?a=a";
}


if(!isset($_REQUEST["start"])) {

$start = 0;

}

else

$start = $_REQUEST["start"];



$eu = ($start - 0); 

$limit = 20;          

$this1 = $eu + $limit; 

$back = $eu - $limit; 

$next = $eu + $limit; 	

	if(isset($_REQUEST['searching'])){

	if($_REQUEST['location'] !='' && $_REQUEST['experience'] !='')

	

	{$experience=$_REQUEST['experience']-1;
		
		$sqlSeller = "SELECT * from employee where location='".$_REQUEST['location']."' and experience BETWEEN ".$experience." AND ".$_REQUEST['experience']."  limit $eu, $limit";

		$sqltot = "SELECT * from employee where location='".$_REQUEST['location']."' and experience BETWEEN ".$experience." AND ".$_REQUEST['experience']." ";

	}
	
		else if($_REQUEST['location'] !='')

	

	{$sqlSeller = "SELECT * from employee where location='".$_REQUEST['location']."'   limit $eu, $limit";

		$sqltot = "SELECT * from employee where location='".$_REQUEST['location']."'  ";

	}
	
		else if($_REQUEST['experience'] !='')

	

	{$experience=$_REQUEST['experience']-1;
		
		$sqlSeller = "SELECT * from employee where  experience BETWEEN ".$experience." AND ".$_REQUEST['experience']."  limit $eu, $limit";

		$sqltot = "SELECT * from employee where  experience BETWEEN ".$experience." AND ".$_REQUEST['experience']." ";

	}
	
	}

	else

	{ $sqlSeller = "SELECT * from employee order by emp_id desc limit $eu, $limit";

	$sqltot = "SELECT * from employee order by emp_id desc";

	

	}

	$resultSeller= mysql_query($sqlSeller);

	

	$resulttot=mysql_query($sqltot);

	$nume=mysql_num_rows($resulttot);

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">







<html xmlns="http://www.w3.org/1999/xhtml">



<head id="ctl00_Head1"><title>

	:: User Panel ::

</title><link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" /><link href="css/metisMenu.min.css" rel="stylesheet" type="text/css" /><link href="css/sb-admin-2.css" type="text/css" rel="stylesheet" /><link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />

 <script src="js/jquery.min.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js" type="text/javascript"></script>

 <script src="js/metisMenu.min.js" type="text/javascript"></script>

 <script src="js/sb-admin-2.js" type="text/javascript"></script>

<script>

function ConfirmDelete(id)

{

	var result = confirm("Are you sure you want to Delete this Employee  ?");

	if (result==true)

	{

		window.location = "delete_employee.php?id="+id;

	}

}



</script>

</head>

<body>

  <div>

        <div id="wrapper">



        <!-- Navigation -->

          <?php include('header.php') ?>

        <!-- Page Content -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-12">

                       

           

                        



  

    <div class="row">

        <div class="col-lg-12">

         <br/>

          <p align="center">

<form method="post" action="employee.php">

 Location: <select tabindex="12"  name="location" id="location"><option value="">Select Location</option>
			
			<?PHP

				$sqlCountry = "SELECT * FROM employee group by location";

				$resultCountry = mysql_query($sqlCountry, $conn);

				if (@mysql_num_rows($resultCountry)!=0){

					while($rowCountry = mysql_fetch_array($resultCountry))

					{

						?>

						<option value="<?PHP echo $rowCountry['location']?>"

						<?PHP  if(isset($_REQUEST['location'])) {if($_REQUEST['location'] == $rowCountry['location']) echo "selected";}

						?>

						><?PHP echo $rowCountry['location']?></option>

						<?php

					}

				}				

				?>

			</select>&nbsp;&nbsp;
            
   Experience: <select tabindex="12" name="experience" id="experience"><option value="">Select Experience</option>
			
<option value="2"<?PHP  if(isset($_REQUEST['experience'])) {if($_REQUEST['experience'] == 2) echo "selected";}?>>0-2 Years</option>
<option value="4"<?PHP  if(isset($_REQUEST['experience'])) {if($_REQUEST['experience'] == 4) echo "selected";}?>>2-4 Years</option>
<option value="6"<?PHP  if(isset($_REQUEST['experience'])) {if($_REQUEST['experience'] == 6) echo "selected";}?>>4-6 Years</option>                     
<option value="8"<?PHP  if(isset($_REQUEST['experience'])) {if($_REQUEST['experience'] == 8) echo "selected";}?>>6-8 Years</option> 						
<option value="10"<?PHP  if(isset($_REQUEST['experience'])) {if($_REQUEST['experience'] == 10) echo "selected";}?>>8-10 Years</option>
<option value="12"<?PHP  if(isset($_REQUEST['experience'])) {if($_REQUEST['experience'] == 12) echo "selected";}?>>10-12 Years</option> 
<option value="14"<?PHP  if(isset($_REQUEST['experience'])) {if($_REQUEST['experience'] == 14) echo "selected";}?>>12-14 Years</option> 
<option value="16"<?PHP  if(isset($_REQUEST['experience'])) {if($_REQUEST['experience'] == 16) echo "selected";}?>>14-16 Years</option> 
<option value="18"<?PHP  if(isset($_REQUEST['experience'])) {if($_REQUEST['experience'] == 18) echo "selected";}?>>16-18 Years</option>
<option value="20"<?PHP  if(isset($_REQUEST['experience'])) {if($_REQUEST['experience'] ==20) echo "selected";}?>>18-20 Years</option>   
			</select>          

<input type="hidden" name="searching" value="true">

<input type="submit" value="Search" class="search-button">

</form>

</p>

<h1 style="text-align:right; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:18px; color:#990000; "><a href="add_staff.php" >Add Employee</a></h1>



<h1 style="text-align:center; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:18px; color:#990000; ">Employee List</h1>

 <?PHP 

				if(isset($_GET['msg']))

				{

					echo $_GET['msg'];

				}

				?>



<?php

echo "<table align = 'center' width='80%'><tr><td  align='left' width='30%'>";

//// if our variable $back is equal to 0 or more then only we will display the link to move back ////////

if($back >=0) { 

print "<a href='$page_name?start=$back'><font face='Verdana' size='2'>PREV</font></a>"; 

} 

//////////////// Let us display the page links at  center. We will not display the current page as a link ///////////

echo "</td><td align=center width='30%'>Page:";

$i=0;

$l=1;

$total=0;

for($i=0;$i < $nume;$i=$i+$limit){

if($i <> $eu){

echo " <a href='$page_name&start=$i'><font face='Verdana' size='2'>$l</font></a> ";

}

else { echo "<font face='Verdana' size='2' color=red>$l</font>";}        /// Current page is not displayed as link and given font color red

$l=$l+1;

$total = $total+1;

}

echo " of $total</td><td  align='right' width='30%'>";



///////////// If we are not in the last page then Next link will be displayed. Here we check that /////

if($this1 < $nume) { 

print "<a href='$page_name&start=$next'><font face='Verdana' size='2'>NEXT</font></a>";} 

echo "</td></tr></table>";

?>



								<table  cellspacing="1" cellpadding="5" align = 'center' width='80%' class="table-bordered">

							<tr style="background-color:#000066; color:#fff">

										<td class="whitebold" style="font-weight:bold; font-size:12px" > Id</td>

						

										<td class="whitebold" style="font-weight:bold;font-size:12px;" > Name</td>

										<td class="whitebold" style="font-weight:bold;font-size:12px" >Designation</td>

                                <td class="whitebold" style="font-weight:bold;font-size:12px" >Experience(in Years)</td>

										<td class="whitebold" style="font-weight:bold;font-size:12px" >Location</td>

										<td class="whitebold" style="font-weight:bold;font-size:12px" >Delete</td>

							 </tr>



									<!-- Start Catetory Admin -->

									<?PHP

										if (@mysql_num_rows($resultSeller)!=0){

											$color = 0;

											while($row = mysql_fetch_array($resultSeller))	

											{ 
											$del="<a class='delete' href='javascript:ConfirmDelete(".$row['emp_id'].");'>Delete</a>";

											   

												



												if ($color==0){

													echo "<Tr class='currentData' bgcolor='#ffffff'>

													

															<td class='adminvalues' >".$row['emp_id']."</td>

															<td class='adminvalues' >".$row['name']."</td>

															<td class='adminvalues' >".$row['designation']."</td>

                                                            <td class='adminvalues' >".$row['experience']."</td>

															<td class='adminvalues' >".$row['location']."</td>


															<td>".$del."</td>

														</tr>";

														$color = 1;

												}

												else{

													echo "<Tr class='currentData' bgcolor='#eeeeee'>

															<td class='adminvalues' >".$row['emp_id']."</td>

															<td class='adminvalues' >".$row['name']."</td>

															<td class='adminvalues' >".$row['designation']."</td>

                                                            <td class='adminvalues' >".$row['experience']."</td>

															<td class='adminvalues' >".$row['location']."</td>


															<td>".$del."</td>

														</tr>";

														$color = 0;

												}

												

											}

													echo "<Tr class='currentData' bgcolor='#cccccc'  height='3'>

														<td> </td>

														<td> </td>

														<td> </td>

														<td> </td>

														<td align='Center'></td>

                                                        	<td align='Center'></td>

														

														

														</tr>";

											

										}						

										

										else

										{

											echo "Sorry, no records found..";

										}						

									?>

								</table>

<?php

echo "<table align = 'center' width='80%'><tr><td  align='left' width='30%'>";

//// if our variable $back is equal to 0 or more then only we will display the link to move back ////////

if($back >=0) { 

print "<a href='$page_name&start=$back'><font face='Verdana' size='2'>PREV</font></a>"; 

} 

//////////////// Let us display the page links at  center. We will not display the current page as a link ///////////

echo "</td><td align=center width='30%'>Page:";

$i=0;

$l=1;

$total=0;

for($i=0;$i < $nume;$i=$i+$limit){

if($i <> $eu){

echo " <a href='$page_name&start=$i'><font face='Verdana' size='2'>$l</font></a> ";

}

else { echo "<font face='Verdana' size='2' color=red>$l</font>";}        /// Current page is not displayed as link and given font color red

$l=$l+1;

$total = $total+1;

}

echo " of $total</td><td  align='right' width='30%'>";



///////////// If we are not in the last page then Next link will be displayed. Here we check that /////

if($this1 < $nume) { 

print "<a href='$page_name&start=$next'><font face='Verdana' size='2'>NEXT</font></a>";} 

echo "</td></tr></table>";

?>		

        



         <!--<input type="submit" name="ctl00$ContentPlaceHolder1$btndownload" value="Download" id="ctl00_ContentPlaceHolder1_btndownload" class="btn-primary btn-xs" style="width:125px; margin-top:2px;" />-->

    </div>

</div>



                    </div>

                    <!-- /.col-lg-12 -->

                </div>

                <!-- /.row -->

            </div>

            <!-- /.container-fluid -->

        </div>

        <!-- /#page-wrapper -->



    </div>

    <!-- /#wrapper -->

    <!-- jQuery -->

    </div>

    </form>

</body>

</html>