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
	if(isset($_POST['continue'])){
	if($_POST['continue']=="true")
{  


			$insert = "UPDATE admin1 SET Password='".mysql_escape_string($_POST['New'])."' where id=".$_SESSION['id'];
			
			$resultt = mysql_query($insert) or die (mysql_error());
//$msg1 =  ('Jai+Jinendra+Your+Password+for+JainMilaw.Com+is+changed');

//$loginUrl = 'http://tsms.bigsmsworld.com/sendsms/sendsms.php?username=AEsourabh&password=654321&type=TEXT&sender=JMINAW&mobile='.$row['Mobile'].'&message='.$msg1.'';
//$agent= 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';

//$ch = curl_init();
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_URL,$loginUrl);
//curl_setopt($ch, CURLOPT_USERAGENT, $agent);
//$result=curl_exec($ch);
//curl_close($ch);

	
	$msg='Your password has been changed';

}}

	
	
	
$sql = "SELECT * FROM admin1 where id=".$_SESSION['id'];
$result = mysql_query($sql,$conn);
$row = @mysql_fetch_array($result);
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


        <div id="wrapper">

        <!-- Navigation -->
         <?php include('header.php') ?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                       <script type="text/javascript">
//<![CDATA[
Sys.WebForms.PageRequestManager._initialize('ctl00$ScriptManager1', 'aspnetForm', [], [], [], 90, 'ctl00');
//]]>
</script>

           
                        

<div class="row">
        <div class="col-lg-12">
            <h4>Change Password </h4>
             <?PHP
						if(isset($msg))
						{
					?>
						<p align="center" class="redbold"><br>

							<?PHP echo $msg?><br>
<br>

						</p>
					<?PHP
						}
					?>
        </div>
        <!-- /.col-lg-12 -->
</div>
    <!-- /.row -->
    <div class="row">
      <form method="post" name="frmastro" action="changepassword.php" style="margin: 0px;" onSubmit="return validateform(this);"> 
       <input type="hidden" name="continue" value="true">
        <table border="0" cellpadding="0" cellspacing="0" class="table table-striped table-bordered table-hover"
            align="left" style="width: 50%; height: 200px;">
            <!--<tr>
                <td align="right">Current Password</td>
                <td><input name="old" type="password" id="ctl00_ContentPlaceHolder1_txtOld" Placeholder="Old Password" class="form-control" /></td>
            </tr>-->
            <tr>
                <td align="right">New Password</td>
                <td><input name="New" type="password" id="ctl00_ContentPlaceHolder1_txtNew" Placeholder="New Password" class="form-control" /></td>
            </tr>
            <!--<tr>
                <td align="right">Confirm Password</td>
                <td><input name="ConfPass" type="password" id="ctl00_ContentPlaceHolder1_txtConfPass" Placeholder="Confirm Password" class="form-control" /></td>
            </tr>-->
            <tr>
                <td colspan="2" align="center"><input type="submit" name="ctl00$ContentPlaceHolder1$btnChange" value="Change" id="ctl00_ContentPlaceHolder1_btnChange" tabindex="10" title="To change the password" class="btn-primary btn-xs" style="width:40%;" /></td>
            </tr>
        </table>
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