<?php
include_once("Fdatabase.php");
$roll=$_POST["roll"];
$password=$_POST["pswrd"];
$sql="SELECT * FROM user where roll_no='$roll' and password='$password'";
$result=mysqli_query($conn,$sql);
if($result)

{
	$row=mysqli_fetch_array($result);
	session_start();
	$_SESSION['user_status']='logged in';
	$_SESSION['user_id']=$row['roll_no'];
	$_SESSION['user_name']=$row['name'];
	$_SESSION['sem']=$row['sem'];
	$_SESSION['branch']=$row['branch'];
	include_once("FSubject.php");
	$count++;
}
else
{
	echo "<h2 style='color:white;background-color:#1f1f1f;'>User not found</h2>You have entered invalid information";
}
?>