<html>
<head>
<title>Subjects</title>
</head>
<body>
<?php
@session_start();
$sem=$_SESSION['sem'];
$branch=$_SESSION['branch'];
include_once("Fdatabase.php"); 
$sql="select * from subjects where sem='$sem' and branch='$branch'";
$result=mysqli_query($conn,$sql);
$result=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);
$count=0;
while($count<$rowcount)
{
$row=mysqli_fetch_array($result);
echo '&nbsp<span><a href="FDisplay.php?subject='.$row["s_id"].'">"'.$row["s_name"].'"</a></span>&nbsp';
$count++;
}
?>
<div>
<?php include_once("FNewTopic.php");?>
</div>
<a href="FLogout.php">Logout</a>
</body>
