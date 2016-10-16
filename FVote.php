<?php
include_once("Fdatabase.php");
$aid=$_GET['aid'];
$sql="update answers set points=points+1 where a_id=$aid";
$result=mysqli_query($conn,$sql);
if(!$result)
	{
		echo "Error".mysqli_error($conn);
	}
	else
	{
		$sql="select * from answers where a_id='$aid'";
		$result=mysqli_query($conn,$sql);
		$rowcount=mysqli_num_rows($result);
		if($rowcount>0)
		{
			$row=mysqli_fetch_array($result);
			echo $row['points'];
		}
		else
		{
			echo "Error".mysqli_error($conn);
		}
	}
?>