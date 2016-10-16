<?php
include_once("Fdatabase.php");
$name=$_GET['name'];
$subject=$_GET['subject'];
$descp=$_GET['descp'];
$sql="select * from subjects where s_name='$subject'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	$row=mysqli_fetch_array($result);
	$sid=$row['s_id'];
	$sname=$row['s_name'];
}
if($descp=="")
{
$sql="insert into topics(name,s_name,s_id) values('$name','$sname',$sid)";
}
else
{
$sql="insert into topics(name,s_name,descp,s_id) values('$name','$sname','$descp',$sid)";
}
$result=mysqli_query($conn,$sql);
if(!$result)
{
	echo "Error:".mysqli_error($conn);
}
else
{
		include_once("FSubject.php");
}
?>
