<?php
@session_start();
$uid=$_SESSION['user_id'];
$ans=$_GET['nans'];
$qid=$_GET['qstn'];
$sid=$_GET['sid'];
include_once("Fdatabase.php");
$sql="insert into answers (q_id,s_id,answer,u_id) values('$qid','$sid','$ans','$uid')";
$result=mysqli_query($conn,$sql);
if(!$result)
{
	echo "Error:".mysqli_error($conn);
}
else
{
	echo "Answer accepted";
	$sql="update user set noa=noa+1 where u_id='$uid'";
	$result=mysqli_query($conn,$sql);

	if($result)
	{

		$sql="select *from user where u_id='$uid'";
		$result=mysqli_query($conn,$sql);
		if($result)
		{
			$row=mysqli_fetch_array($result);
			$_SESSION['noa']=$row['noa'];
		}
		else{
			echo "Error".mysqli_error($conn);
		}

	}
	else{
		echo "Error".mysqli_error($conn);
	}
}
mysqli_close($conn);
?>
