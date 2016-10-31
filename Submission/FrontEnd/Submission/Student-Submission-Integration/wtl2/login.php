
<?php
@session_start();
include_once("subdatabase.php");
$_SESSION['id']=$_POST["roll"];
echo  $_SESSION['id'];
$query1=" select * from student where roll=$_SESSION[id]; ";
$result1=mysqli_query($con,$query1);
{
	$row1=mysqli_fetch_array($result1);
	$_SESSION['branch']= $row1['branch'];
	$_SESSION['semester']= $row1['semester'];
}
header('Location:sidenav.html');
exit;
?>