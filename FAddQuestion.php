<?php
@session_start();
$uid=$_SESSION['user_id'];
$sid=$_GET['sid'];
$qstn=$_GET['qstn'];
include_once("Fdatabase.php");
$sql="insert into questions(s_id,question,u_id) values('$sid','$qstn','$uid')";
$result=mysqli_query($conn,$sql);
if(!$result)
{
echo "Error:".mysqli_error($conn);
}
else
{
	echo "Question added";
	$sql="update user set noq=noq+1 where u_id='$uid'";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
		$sql="select *from user where u_id='$uid'";
		$result=mysqli_query($conn,$sql);

		if($result)
		{
			$row=mysqli_fetch_array($result);
			$_SESSION['noq']=$row['noq'];
		}
		else{
			echo "Error".mysqli_error($conn);
		}

	}
	else{
		echo "Error".mysqli_error($conn);
	}
}mysqli_close($conn);
?>
