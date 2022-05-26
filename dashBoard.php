

<?PHP

	session_start();

	include("connection.php");



	if ($_SESSION['LoginID'] == '')

	{

		header('LOCATION: index.php');

		exit();

	

	}

	

	$sqlsettings = "SELECT * from admin";

$resultsettings = mysql_query($sqlsettings);

$rowsettings = mysql_fetch_array($resultsettings);


$sql0 = mysql_query("SELECT * from employee   order by emp_id");

$row0 = mysql_num_rows($sql0);

if(isset($_REQUEST['type']))
{
	if($_REQUEST['type']==2){
	$sql1 = mysql_query("SELECT * FROM employee WHERE experience BETWEEN 0 AND 4");

 $row1 = mysql_num_rows($sql1);



$sql2 = mysql_query("SELECT * from employee where experience BETWEEN 4 AND 8");

 $row2 = mysql_num_rows($sql2);

$sql3 = mysql_query("SELECT * from employee where experience BETWEEN 8 AND 12");

 $row3 = mysql_num_rows($sql3);

$sql4 = mysql_query("SELECT * from employee where experience BETWEEN 12 AND 16");

 $row4 = mysql_num_rows($sql4);

$sql5 = mysql_query("SELECT * from employee where experience BETWEEN 16 AND 20");

 $row5 = mysql_num_rows($sql5);
}
else if($_REQUEST['type']==1)
{
	$sql1 = mysql_query("SELECT * FROM employee WHERE experience BETWEEN 0 AND 2");

 $row1 = mysql_num_rows($sql1);



$sql2 = mysql_query("SELECT * from employee where experience BETWEEN 3 AND 4");

 $row2 = mysql_num_rows($sql2);

$sql3 = mysql_query("SELECT * from employee where experience BETWEEN 5 AND 6");

 $row3 = mysql_num_rows($sql3);

$sql4 = mysql_query("SELECT * from employee where experience BETWEEN 7 AND 8");

 $row4 = mysql_num_rows($sql4);

$sql5 = mysql_query("SELECT * from employee where experience BETWEEN 9 AND 10");

 $row5 = mysql_num_rows($sql5);

$sql6 = mysql_query("SELECT * from employee where experience BETWEEN 11 AND 12");

 $row6 = mysql_num_rows($sql6);

$sql7 = mysql_query("SELECT * from employee where experience BETWEEN 13 AND 14");

 $row7 = mysql_num_rows($sql7);	

$sql8 = mysql_query("SELECT * from employee where experience BETWEEN 15 AND 16");

 $row8 = mysql_num_rows($sql8);

$sql9 = mysql_query("SELECT * from employee where experience BETWEEN 17 AND 18");

 $row9 = mysql_num_rows($sql9);

$sql10 = mysql_query("SELECT * from employee where experience BETWEEN 19 AND 20");

 $row10 = mysql_num_rows($sql10);
	
}
}
else{


$sql1 = mysql_query("SELECT * FROM employee WHERE experience BETWEEN 0 AND 2");

 $row1 = mysql_num_rows($sql1);



$sql2 = mysql_query("SELECT * from employee where experience BETWEEN 3 AND 4");

 $row2 = mysql_num_rows($sql2);

$sql3 = mysql_query("SELECT * from employee where experience BETWEEN 5 AND 6");

 $row3 = mysql_num_rows($sql3);

$sql4 = mysql_query("SELECT * from employee where experience BETWEEN 7 AND 8");

 $row4 = mysql_num_rows($sql4);

$sql5 = mysql_query("SELECT * from employee where experience BETWEEN 9 AND 10");

 $row5 = mysql_num_rows($sql5);

$sql6 = mysql_query("SELECT * from employee where experience BETWEEN 11 AND 12");

 $row6 = mysql_num_rows($sql6);

$sql7 = mysql_query("SELECT * from employee where experience BETWEEN 13 AND 14");

 $row7 = mysql_num_rows($sql7);	

$sql8 = mysql_query("SELECT * from employee where experience BETWEEN 15 AND 16");

 $row8 = mysql_num_rows($sql8);

$sql9 = mysql_query("SELECT * from employee where experience BETWEEN 17 AND 18");

 $row9 = mysql_num_rows($sql9);

$sql10 = mysql_query("SELECT * from employee where experience BETWEEN 19 AND 20");

 $row10 = mysql_num_rows($sql10);
}
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

                    <div class="col-lg-4">

      <p align="left">
<form method="post" >
       <select class="form-control" name="type" id="type" class="span6" onchange="javascript:this.form.submit()" required>

<option value=''>Select Duration</option>

<option value="1" >2 Year Duration </option>

 <option value="2" > 4 Year Duration </option>

 </select>
</form>
</p>        
</div>


           

                        

  <div class="row">

                <div class="col-lg-12">

                    <h1 class="page-header">Dashboard</h1>

                </div>

                <!-- /.col-lg-12 -->

            </div>

            <!-- /.row -->

            <div class="row">

             

                <div class="col-lg-3 col-md-6">

                   

                </div>

                <div class="col-lg-3 col-md-6">

                   

                </div>

                <div class="col-lg-3 col-md-6">

                   

                </div>

            </div>

            <!-- /.row -->

            <div class="row">

                 <div class="col-lg-3 col-md-6">

                 <center><div id="piechart"></div></center>



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<?php if(isset($_REQUEST['type']))
{if($_REQUEST['type']==2){?>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task',  'Hours per Day'],
  ['0-4 Years Experience', <?php echo $row1 ?>],
  ['4-8 Years Experience', <?php echo $row2 ?>],
  ['8-12 Years Experience', <?php echo $row3 ?>],
  ['12-16 Years Experience', <?php echo $row4 ?>],
  ['16-20 Years Experience', <?php echo $row5 ?>],
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Total Employee   <?php echo $row0 ?>', 'width':750, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}

</script>
  
<?php } else if($_REQUEST['type']==1) {?>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task',  'Hours per Day'],
  ['0-2 Years Experience', <?php echo $row1 ?>],
  ['2-4 Years Experience', <?php echo $row2 ?>],
  ['4-6 Years Experience', <?php echo $row3 ?>],
  ['6-8 Years Experience', <?php echo $row4 ?>],
  ['8-10 Years Experience', <?php echo $row5 ?>],
  ['10-12 Years Experience', <?php echo $row6 ?>],
  ['12-14 Years Experience', <?php echo $row7 ?>],
  ['14-16 Years Experience', <?php echo $row8 ?>],
  ['16-18 Years Experience', <?php echo $row9 ?>],
  ['18-20 Years Experience', <?php echo $row10 ?>],
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Total Employee   <?php echo $row0 ?>', 'width':750, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}

</script>

<?php }} else{ ?>   
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task',  'Hours per Day'],
  ['0-2 Years Experience', <?php echo $row1 ?>],
  ['2-4 Years Experience', <?php echo $row2 ?>],
  ['4-6 Years Experience', <?php echo $row3 ?>],
  ['6-8 Years Experience', <?php echo $row4 ?>],
  ['8-10 Years Experience', <?php echo $row5 ?>],
  ['10-12 Years Experience', <?php echo $row6 ?>],
  ['12-14 Years Experience', <?php echo $row7 ?>],
  ['14-16 Years Experience', <?php echo $row8 ?>],
  ['16-18 Years Experience', <?php echo $row9 ?>],
  ['18-20 Years Experience', <?php echo $row10 ?>],
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'Total Employee   <?php echo $row0 ?>', 'width':750, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}

</script>
<?php } ?> 
                </div>

                <div class="col-lg-3 col-md-6">

                    

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

   

</body>

</html>