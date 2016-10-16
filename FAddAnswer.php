<?php
$ans=$_GET['nans'];
$qid=$_GET['qstn'];
$sid=$_GET['sid'];
include_once("Fdatabase.php");
$sql="insert into answers(q_id,s_id,answer) values($qid,$sid,'$ans')";
$result=mysqli_query($conn,$sql);
if(!$result)
{
echo "Error:".mysqli_error($conn);
}
else
{
	echo "Answer accepted";
}
mysqli_close($conn);
?>
