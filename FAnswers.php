<html>
<head><title>Answers</title>
<script>
function display()
{
	http1=new XMLHttpRequest();
	var qid=document.getElementById('qid').value;
	var sid=document.getElementById('sid').value;
	http1.open("GET", "FAnswers.php?sid="+ sid + "&qid=" + qid, true);
	http1.send();
	http1.onreadystatechange=function() {
    if(http1.readyState == 4) {
    document.getElementById('qaa').innerHTML = http1.responseText;
    }
  }
}
function adda()
{
	http2=new XMLHttpRequest();
	var nans=document.getElementById('nans').value;
	var qstn=document.getElementById('qid').value;
	var sid=document.getElementById('sid').value;

	http2.open("GET", "FAddAnswer.php?nans=" + nans +"&qstn=" + qstn+"&sid="+sid, true);
	http2.send();
	http2.onreadystatechange=function() {
    if(http2.readyState == 4) {
	  document.getElementById('nans').value="";
	  display();
    }
  }
}
function vote(id)
{
		var aid=id;
		http4=new XMLHttpRequest();
		http4.open("GET", "FVote.php?aid=" + aid, true);
		http4.send();
		http4.onreadystatechange=function() {
		if(http4.readyState == 4) {
		document.getElementById('points'+aid).innerHTML=http4.responseText;
		}
	}
}
</script>
</head>
<body>
<div id="qaa">
<?php
@session_start();
if(isset ($_SESSION["user_status"]) )
{
	$sid=$_GET['sid'];
	$qid=$_GET['qid'];
	include_once("Fdatabase.php");
	$sql="select * from questions where q_id='$qid'";
	$result=mysqli_query($conn,$sql);
	$rowcount=mysqli_num_rows($result);
	$count=0;
	while($count<$rowcount)
	{
	$row=mysqli_fetch_array($result);
	echo '<div style="font-size:25px;border:1px solid black;">'.$row["question"].'</div>';
	$count++;
	}
	$sql="select * from answers where q_id='$qid'";
	$result=mysqli_query($conn,$sql);
	$rowcount=mysqli_num_rows($result);
	$count=0;
	while($count<$rowcount)
	{
	$row=mysqli_fetch_array($result);
	echo '<div style="font-size:25px;border:1px solid black;margin-top:10px;">'.$row["answer"].'</div>';
	echo '<span id="points'.$row["a_id"].'">'.$row["points"].'</span>';
	echo '<input type="button" id="'.$row["a_id"].'" value="Vote" onclick="vote(this.id)"></input>';
	$count++;
	}
echo '<table>';
echo '<form>
<tr><td>Add new Answer</td></tr>
<tr><td><input type="hidden"  id="sid" value="'.$sid.'"/></tr></td>
<tr><td><input type="hidden"  id="qid" value="'.$qid.'"/></tr></td>
<tr><td>Answer:</td><td><textarea rows="3" cols="30" name="nans" id="nans"></textarea></td></tr>
<tr><td><input type="button" value="Submit" onclick="adda()"></tr></td>
<tr><td><span id="resulta"></span></td></tr>
</form>
</table>
<span id="logout"><a href="FLogout.php">Logout</a></span>
</div>';
}
else
	{
		echo '<a id="cata" href=FLogin.php />Click here to go to login again</a>';
	}
?>

</body>
</html>