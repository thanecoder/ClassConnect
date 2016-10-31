<?php

include_once("subdatabase.php");
@session_start();

$roll=$_SESSION['id'];
$branch=$_SESSION['branch'];
$semester=$_SESSION['semester'];
$id=$_SESSION['assign_id'];
echo "<strong>SUCCESS!</strong>";

		$filename='0.x';
		$filename=$_FILES["attachment"]["name"];
		if($filename!='0.x')
		{
		$type=$_FILES["attachment"]["type"];
		move_uploaded_file($_FILES["attachment"]["tmp_name"],"uploads/".$_FILES["attachment"]["name"]);
		}
		
		
$sql="INSERT INTO st_submission(roll,branch,semester,assign_id,attachment,submit_date)VALUES('$roll','$branch','$semester','$id','$filename',now())";
if(mysqli_query($con,$sql))
{ //CALL CONFIRMATION FUNTION FROM HERE
	//echo" assignment has been submitted";
}else
	//echo "error: ".$sql.$con->error;

	?>
