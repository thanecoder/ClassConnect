<?php
$con=mysqli_connect('localhost','root','','wtl');
$tid=$_POST['tid'];

$password=$_POST['password'];

$query="select * from teacher where tid='$tid' and password='$password';";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0)

{   
	$row= mysqli_fetch_array($result);
	session_start();
	$_SESSION["teacher_name"]=$row['name'];
	
	ob_clean();
	include'teacherportal.php';	
}
else
	
{	

include'wrongdetails.php';	
}
?>