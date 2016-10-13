<?php
$tid=$_GET['tid'];
include_once("Fdatabase.php");
$sql="select * from questions where t_id='$tid'";
$result=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);
$count=0;
while($count<$rowcount)
{
$i=$count+1;
$row=mysqli_fetch_array($result);
echo '<a href="FAnswers.php?tid='.$tid.'&qid='.$row['q_id'].'">'.$row["question"].'</a><br>';
$count++;
}
?>
