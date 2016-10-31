<?php
@session_start();
$_SESSION['assign_id']=$_GET['var'];

include_once("subdatabase.php");
echo <<<table
	<table class="table table-striped">
		<thead>
			<th>Subject</th>
			<th>Uploaded By</th>
			<th>Description</th>
			<th>Mode</th>
			<th>Deadline</th>
			<th>File</th>
		</thead>
		<tbody>

table;

$query1=" select * from submission where assign_id='$_SESSION[assign_id]'"; //details about assignment
$result1=mysqli_query($con,$query1);
$row1=mysqli_fetch_array($result1);
	echo "<tr>";
	echo"<td>".$row1['subject']."</td>";
			$query4=" select * from teacher where tid='$row1[tid]'"; //we have tid n we want teacher name
			$result4=mysqli_query($con,$query4);
			$row4=mysqli_fetch_array($result4);
	echo"<td>".$row4['name']."</td>";
	echo"<td>".$row1['description']."</td>";
	echo"<td>".$row1['mode']."</td>";
	echo"<td>".$row1['deadline']."</td>";	

	$filename=$row1['file'];
	// echo"<div style='height:100px; width:100px;border:1.5px solid black; border-radius:15%;'>
	echo "<td><a  href = \"uploads\\$filename\" target = \"_blank\" data-toggle='tooltip' data-placement='bottom' title='View' ><span  class='ajax_btn glyphicon glyphicon-eye-open' style='font-size:20px;color:blue;margin-right:40px;margin-left:20px;'></span></a>";
	echo "<a href = \"uploads\\$filename\" target = \"_blank\" download data-toggle='tooltip' data-placement='bottom' title='Download'><span class='glyphicon glyphicon-download-alt' style='font-size:20px;color:blue'></span></a></td>";

	echo "</tr>";
	echo <<<table
		</tbody>
		</table>
table;

//Dunno kay ahe he - above is detail about assignment from submission table, down remarks n grades if submitted else submit assignment option which you removed
// submit assignmet option etech assude.. .dont use new block


$query2=" select * from st_submission where assign_id='$_SESSION[assign_id]' and roll='$_SESSION[id]'";
$result2=mysqli_query($con,$query2);
$row2=mysqli_fetch_array($result2);


if($row2) //if submitted ie row exist - check or unckeck
{	
	echo "<hr class='hr'>";
	echo "<center><div class='toggle-header'>Submission Details</div></center>";
	echo "<hr style='height:10px'>";
	echo <<<table
		<table class="table table-striped">
			<thead>
			<th>Submit Date </th>
			<th>Status <th>			
table;

	if($row2['status']=='check'){
		echo "
			<th>Grades </th>
			<th>Remarks </th>
			<th>Submitted Assignment </th>
			</thead>
			<tbody>";

	}
	else{
		echo "
			<th>Submitted Assignment </th>
			</thead>
			<tbody>";			
	}
	$filename=$row2['attachment'];
	echo "<tr>";
	echo"<td>".$row2['submit_date']."</td>";  //when student has submitted
	echo"<td>".$row2['status']."</td><td></td>";  //check or uncheck
	if($row2['status']=='check') //if checked
	{	
		echo"<td>".$row2['grade']."</td>"; //should be null if uncheck
		echo"<td>".$row2['remarks']."</td>"; //should be null if uncheck
		echo "<td><a  href = \"uploads\\$filename\" target = \"_blank\" data-toggle='tooltip' data-placement='bottom' title='View' ><span  class='ajax_btn glyphicon glyphicon-eye-open' style='font-size:20px;color:blue;margin-right:40px;margin-left:20px;'></span></a>";
		echo "<a chref = \"uploads\\$filename\" target = \"_blank\" download data-toggle='tooltip' data-placement='bottom' title='Download'><span class='glyphicon glyphicon-download-alt' style='font-size:20px;color:blue'></span></a></td></tr>";
		echo "</tbody></table>";
	}
	else{
			echo "<td><a href = \"uploads\\$filename\" target = \"_blank\" download><span class='glyphicon glyphicon-download-alt' style='font-size:20px;color:blue'></span></a></td></tr>";
					echo "</tbody></table>";
	}
		// echo"my file:".$row2['attachment']."<br>";
		// $filename=$row2['attachment'];
		// 	echo"<br>";
			// echo"<div style='height:100px; width:100px;border:1.5px solid black; border-radius:15%;'>
			// $filename <a href = \"uploads\\$filename\" target = \"_blank\" download>Download</a></div>";
}
else //not submitted
{	$d=date('Y-m-d'); 
	if($row1['mode']=='softcopy') //softcopy
			{
				echo "<hr class='hr'>";
			if($d<$row1['deadline']) //deadline not passed so can submit
				{echo "<center><div class='toggle-header'>SUBMIT  ASSIGNMENTS </div></center><hr>
					<form id='submission' method='POST' action='javascript:Confirm();' enctype='multipart/form-data'>
					<p class='toggle-header' style='font-size:1.5em'> Attach Assignment: </p>	
					<input type='file' id='attachment' name='attachment' required><br>
					<center><button type='submit' class='btn' id='submit' >Submit</button></center>
					
				    </form>";}
			else
				{echo "<strong>WARNING!: </strong>Deadline has passed.";}
			}
		else //hardcopy
			{
				echo "<strong>Note: </strong>This should be submitted as a hardcopy";
			}
}
?>
