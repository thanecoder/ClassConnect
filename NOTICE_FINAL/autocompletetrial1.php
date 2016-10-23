<?php
$q = $_POST['q'];//retrieving string being typed in textbox
if($q!="")
{
	$roll=101434;
	$con=mysqli_connect('localhost','root','','wtl');
//$roll=$_SESSION["roll_no"];
$query1=" select * from student where roll='$roll'; ";
$result1=mysqli_query($con,$query1);





{
	$row1=mysqli_fetch_array($result1);
	$branch= $row1['branch'];
	$sem= $row1['semester'];
}
$query2=" select * from notice where branch='$branch' and sem='$sem'; ";
$result2=mysqli_query($con,$query2);
$numrows=mysqli_num_rows($result2);
	
	$query="SELECT topic from notice WHERE topic LIKE '$q%'and  branch='$branch' and sem='$sem' LIMIT 0,6";//selecting names of cities
	
	$result3 = mysqli_query($con,$query);
	
	
	

	
	//echo "<div style='width:200px; margin-top:8px; float:right; margin-right:13px;'>";
	while($row = mysqli_fetch_array($result3))
	{   
		echo "<div style='width:200px; margin-top:58px; float:right;height:75px; 
		border:2px solid black; margin-right:13px;>".$row['topic']."</div>";//displaying each city's name
	}
	echo "</div>";
	
}
?>

