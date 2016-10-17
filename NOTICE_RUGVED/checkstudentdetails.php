<?php
$con=mysqli_connect('localhost','root','','wtl');
@$roll=$_POST['roll'];
//echo $roll;
@$password=$_POST['password'];
//echo $password;
$query="select * from student where roll='$roll' and password='$password'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0)

{
	session_start();
	$_SESSION["roll_no"]=$roll;
	
	ob_clean();
	include'studentloggedin.php';	
}
else
{	//echo"login failed";
	//ob_clean();
	//include'wrongdetails.php';	
}
?>