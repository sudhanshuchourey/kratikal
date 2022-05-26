<?PHP

session_start();

if($_SESSION['LoginID']=="")

{

	header("location: login.php");

	exit();

}

include("connection.php");



$delete = "DELETE from employee WHERE emp_id=".$_REQUEST['id'];

mysql_query($delete);

header('LOCATION: employee.php?msg=employee has been deleted Successfully..!');

?>