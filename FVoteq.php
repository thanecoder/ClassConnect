<?php
include_once("Fdatabase.php");
$qid=$_GET['qid'];
$sql="update questions set vote=vote+1 where q_id=$qid";
$result=mysqli_query($conn,$sql);
if(!$result)
	{
		echo "Error".mysqli_error($conn);
	}
	else
	{
		$sql="select * from questions where q_id='$qid'";
		$result=mysqli_query($conn,$sql);
		$rowcount=mysqli_num_rows($result);
		if($rowcount>0)
		{
			$row=mysqli_fetch_array($result);
			echo $row['vote'];
		}
		else
		{
			echo "Error".mysqli_error($conn);
		}
	}
?>