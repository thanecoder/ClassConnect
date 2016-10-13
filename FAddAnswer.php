<?php
$ans=$_GET['nans'];
$qid=$_GET['qstn'];
$tid=$_GET['tid'];
$servername="localhost";
$username="root";
$password="";
$conn=mysqli_connect($servername,$username,$password,'forum');
if(!$conn)
{
die ("Connection failed:".mysqli_connect_error());
}
$sql="insert into answers(q_id,t_id,answer) values($qid,$tid,'$ans')";
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
