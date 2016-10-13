<?php
include_once("Fdatabase.php");
$name=$_GET['name'];
$subject=$_GET['subject'];
$descp=$_GET['descp'];
$sid=rand(4,1000);
if($descp=="")
{
$sql="insert into topics(name,subject,s_id) values('$name','$subject',$sid)";
}
else
{
$sql="insert into topics(name,subject,descp,s_id) values('$name','$subject','$descp',$sid)";
}
$result=mysqli_query($conn,$sql);
if(!$result)
{
	echo "Error:".mysqli_error($conn);
}
?>
