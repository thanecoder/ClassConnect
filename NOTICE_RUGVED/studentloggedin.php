<?php
@session_start();
$con=mysqli_connect('localhost','root','','wtl');
$roll=$_SESSION["roll_no"];
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
$count =1;
if($numrows>0)
{
	while($count<= $numrows)
	{
		$row2=mysqli_fetch_array($result2);
		echo"notice".$count;
		echo"<br>";
		echo"uploaded by:".$row2['teacher'];
		echo"<br>";
		echo"Topic:".$row2['topic'];
		echo"<br>";
		echo"Description:".$row2['description'];
        echo"<br>";
		$filename=$row2['file'];
		echo"<br>";
		echo"<div style='height:100px; width:100px;border:1.5px solid black; border-radius:15%;'>
		$filename <br><form method='post' action='downloadfile.php'>
		<input type='hidden'  name='tp' value='$filename'>
		<br><input type='submit' value='DOWNLOAD'>
		</form>
		
		</div>";
		
		echo"Date:".$row2['date'];
		echo"<hr>";
		$count++;
	}
}

echo"<BR><BR><a href='logout.php' >LOGOUT</a>";
?>