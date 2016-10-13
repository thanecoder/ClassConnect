<?php
$tid=$_GET['tid'];
$qstn=$_GET['qstn'];
include_once("Fdatabase.php");
$sql="insert into questions(t_id,question) values('$tid','$qstn')";
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
