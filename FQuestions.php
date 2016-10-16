<?php
include_once("Fdatabase.php");
$sid=$_GET['sid'];
$sql="select * from questions where s_id=$sid";
$result=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);
$count=0;
while($count<$rowcount)
{
$i=$count+1;
$row=mysqli_fetch_array($result);
echo '<a href="FAnswers.php?sid='.$sid.'&qid='.$row['q_id'].'">'.$row["question"].'</a><br>';
$count++;
}
?>
