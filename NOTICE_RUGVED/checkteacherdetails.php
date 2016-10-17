<?php
$con=mysqli_connect('localhost','root','','wtl');
$tid=$_POST['tid'];
echo $tid;
$password=$_POST['password'];
echo $password;
$query="select * from teacher where tid='$tid' and password='$password'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0)

{   
	$row= mysqli_fetch_array($result);
	session_start();
	$_SESSION["teacher_name"]=$row['name'];
	
	ob_clean();
	include'noticeentry.php';	
}
else
	
{	
echo" ".mysqli_error($con);
//echo"login failed";
	//ob_clean();
	//include'wrongdetails.php';	
}
?>