<?php
$sid=$_GET['sid'];
$qstn=$_GET['qstn'];
include_once("Fdatabase.php");
$sql="insert into questions(s_id,question) values('$sid','$qstn')";
$result=mysqli_query($conn,$sql);
if(!$result)
{
echo "Error:".mysqli_error($conn);
}
else
{
	echo "Question added";
}
mysqli_close($conn);
?>
