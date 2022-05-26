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

$emailMsg='';	
 if (isset($_FILES['file'])) {
    $errors = array();
    $allowed_ext = array('csv');

    $file_name = $_FILES['file']['name'];
    $file_ext = strtolower(end(explode('.', $file_name)));
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    if (in_array($file_ext, $allowed_ext) === false) {
        $errors[] ='Extension not allowed';
    }
    if ($file_size > 10485760) {
       $errors[] = 'File size must be under 10mb';
    }
    if (empty($errors)) {





        $handle = fopen($file_tmp,"r");
        while(($fileop = fgetcsv($handle,",")) !== false) 
        {
		//$emp_id =  mysql_real_escape_string($fileop[0]);
        $emp_name =  mysql_real_escape_string($fileop[1]);
        $designation = mysql_real_escape_string($fileop[2]);
       // $experience = preg_replace('/[^0-9]/', '', $fileop[3]);
	   $experience = mysql_real_escape_string($fileop[3]);
        $location = mysql_real_escape_string($fileop[4]);

        $sq1 = mysql_query("INSERT INTO `employee` (name,designation,experience,location) VALUES ('$emp_name','$designation','$experience','$location')")or die (mysql_error());
    }
    fclose($handle);
    if($sq1){
        $emailMsg= 'Employee List successfully updated.'; 



            }
        } 
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

                    <div class="col-lg-12">

                        <?PHP 

				if($emailMsg != "")

				{

					echo $emailMsg;

				}

				?>



           

                        



  

    <div class="row">

        <div class="col-lg-12">

          <div class="col-lg-8"> <br/>

          <h3>Add Employee List</h3>
          <h6 style="text-align:right; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:18px; color:#990000; "><a href="employee.csv" download >Download sample csv</a></h6>

            <form method="post"  name="theform" id="theform" autocomplete="off" enctype="multipart/form-data">

			<input name="continue" value="true" type="hidden">

		<table width="100%" align="center" cellspacing="5">

                           

     <tr>

		<td align="left">Upload CSV <span class="required">*</span></td>

<td>   <input type="file" name="file" accept="application/msexcel" required="required"   /></td></tr>                    <!-- // form item -->



<tr>

		<td align="left"><br/>

                                                        <button type="submit" class="btn btn-blue">Submit</button></td>

                                                     </tr></table>

							  </form>

        </div>

        

</div>

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