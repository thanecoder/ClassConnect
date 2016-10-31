<?php 
@session_start();

$choice=$_GET['var'];

include_once("subdatabase.php");
echo <<<TABLE
 	<table class="table table-striped">
 		<thead>
 			<tr>
 				<th>Sr No. </th>
 				<th>Subject </th>
 				<th>Description</th>
 				
TABLE;
if($choice==1)//to be submitted
{
$query2=" select * from submission where branch='$_SESSION[branch]' and semester='$_SESSION[semester]' order by deadline";
$result2=mysqli_query($con,$query2);
$numrows=mysqli_num_rows($result2); //issue is - count is wrong
//echo "<br>total no:".$numrows."<br>";
$count =1; //this is external query count
$count2=1; //this is internal query count, this is useful as link n for geting total number of to be submitted
if($numrows>0)
{
	echo <<<TABLE
				<th>Deadline</th>
			 		</tr>
			 		</thead>
			 		<tbody>
TABLE;

	while($count<= $numrows)
	{
		$row2=mysqli_fetch_array($result2);
		
				$query=" select * from st_submission where assign_id='$row2[assign_id]' and roll='$_SESSION[id]'  ";
				$result=mysqli_query($con,$query);
				$nrows=mysqli_num_rows($result);
		if ($nrows==0)			//assignment not submitted, checks if exists in st_submission table
		{		echo "<tr>";
				echo "<td><a href='#'  onclick=assignment_details("."'".$row2['assign_id']."')>".$count2."</a></td>";	
				echo "<td>".$row2['subject']."</td>";
				echo "<td>".$row2['description']."</td>";
				echo "<td>".$row2['deadline']."</td>";
				echo "</tr>";
				$count2++;}
		
		$count++;
			
	}
}
else
{echo "error: ".$query2.$con->error;}
echo <<<TABLE
	</tbody>
	</table>

TABLE;
}

if($choice==2) //uncheck
{
	// echo "<br>Unchecked assignments :";
$query3=" select * from st_submission where roll='$_SESSION[id]' and status='uncheck' ";
$result3=mysqli_query($con,$query3);
$numrows=mysqli_num_rows($result3);
$count3=1;
if($numrows>0)
{
	echo <<<TABLE
				<th>Submitted On</th>
			 		</tr>
			 		</thead>
			 		<tbody>
TABLE;
	while($count3<= $numrows)
	{
		$row2=mysqli_fetch_array($result3);
		echo "<tr>";
		echo "<td><a href='#'  onclick=assignment_details("."'".$row2['assign_id']."')>".$count3."</a></td>";	
		
				$query5=" select * from submission where assign_id='$row2[assign_id]'";
				$result5=mysqli_query($con,$query5);
				$row5=mysqli_fetch_array($result5);
		
		echo "<td>".$row5['subject']."</td>";
		echo "<td>".$row5['description']."</td>";
		echo "<td>".$row2['submit_date']."</td>";
		echo "</tr>";
		$count3++;
	}
	echo <<<TABLE
	</tbody>
	</table>

TABLE;
}}

if($choice==3){
// echo "<br><br>Checked assignments :";	
echo <<<TABLE
		<th>Grade</th>
		</tr>
		</thead>
		<tbody>
TABLE;

$query4=" select * from st_submission where roll='$_SESSION[id]' and status='check'";
$result4=mysqli_query($con,$query4);
$numrows=mysqli_num_rows($result4);
$count4 =1;
if($numrows>0)
{

	while($count4<= $numrows)
	{
		echo "<tr>";
		$row2=mysqli_fetch_array($result4);
		echo "<td><a href='#'  onclick=assignment_details("."'".$row2['assign_id']."')>".$count4."</a></td>";	
		
				$query5=" select * from submission where assign_id='$row2[assign_id]'";
				$result5=mysqli_query($con,$query5);
				$row5=mysqli_fetch_array($result5);
	
		echo"<td>".$row5['subject']."</td>";
		echo"<td>".$row5['description']."</td>"; 
		echo"<td>".$row2['grade']."</td>"; 
		$count4++;
		echo "</tr>";
	}

echo <<<TABLE
	</tbody>
	</table>
TABLE;
}}
		

?>