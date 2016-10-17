<?php
session_start();
$con=mysqli_connect('localhost','root','','wtl');
$tname=$_SESSION["teacher_name"];
echo" ----------      ".$tname."-----------";

$branch=$_POST['branch'];
$sem=$_POST['sem'];
$topic=$_POST['topic'];
$desc=$_POST['desc'];
$filename='0.x';
$filename=$_FILES["file"]["name"];
if($filename!='0.x')
{
$type=$_FILES["file"]["type"];

move_uploaded_file($_FILES["file"]["tmp_name"],"files/".$_FILES["file"]["name"]);
}

$time=time();
echo($time . "<br>");
$date=date("d-m-Y",$time);
echo $date;
echo $filename;
echo"<br>";
echo $type;

$query="insert into notice values 
('$branch','$sem','$tname','$topic','$desc','$filename','$date');";
if(mysqli_query($con,$query))
{
	echo" notice sent";
	echo"<BR><BR><a href='logout.php' >LOGOUT</a>";
}









?>