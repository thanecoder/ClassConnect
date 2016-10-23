<html>
<head><title>Answers</title>
<script>
function display()
{
	http1=new XMLHttpRequest();
	var qid=document.getElementById('qid').value;
	var sid=document.getElementById('sid').value;
	http1.open("GET", "FAnswers.php?sid="+sid+"&qid="+qid, true);
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

	http2.open("GET", "FAddAnswer.php?nans="+nans+"&qstn="+qstn+"&sid="+sid, true);
	http2.send();
	http2.onreadystatechange=function() {
    if(http2.readyState == 4) {
	  document.getElementById('nans').value="";
		document.getElementById('resulta').value=http2.responseText;
	  display();
    }
  }
}
/*Function for up voting a answer*/
function votea(id)
{
		var aid=id;
		http4=new XMLHttpRequest();
		http4.open("GET", "FVote.php?aid=" + aid, true);
		http4.send();
		http4.onreadystatechange=function() {
		if(http4.readyState == 4) {
		document.getElementById('upvotes'+aid).innerHTML=http4.responseText;
		}
	}
}
/*Function for down voting a answer*/
function voted(id)
{
		var aid=id;
		http4=new XMLHttpRequest();
		http4.open("GET", "FVoted.php?aid=" + aid, true);
		http4.send();
		http4.onreadystatechange=function() {
		if(http4.readyState == 4) {
		document.getElementById('downvotes'+aid).innerHTML=http4.responseText;
		}
	}
}
/*Function for voting a question*/
function voteq(id)
{
		var qid=id;
		http4=new XMLHttpRequest();
		http4.open("GET", "FVoteq.php?qid=" + qid, true);
		http4.send();
		http4.onreadystatechange=function() {
		if(http4.readyState == 4) {
		document.getElementById('votes'+qid).innerHTML=http4.responseText;
		}
	}
}
</script>
<script src = "jQuery/jquery-3.1.1.min.js"></script>
<script src = "jQuery/jquery-2.2.4.min.js"></script>
<script src = "bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script src = "customJS/forum.js"></script>

</head>
<body>
<div id="qaa">
<?php
@session_start();
if(isset ($_SESSION["user_status"]) )
{
	$uid=$_SESSION['user_id'];
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
	echo '<span id="votes'.$row["q_id"].'">'.$row["vote"].'</span>';
	echo '<input type="button" id="'.$row["q_id"].'" value="Vote" onclick="voteq(this.id)"></input>';
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
	echo '<span id="upvotes'.$row["a_id"].'">'.$row["upvotes"].'</span>';
	echo '<input type="button" id="'.$row["a_id"].'" value="Upvote" onclick="votea(this.id)"></input>';
	echo '<span id="downvotes'.$row["a_id"].'">'.$row["downvotes"].'</span>';
	echo '<input type="button" id="'.$row["a_id"].'" value="Downvote" onclick="voted(this.id)"></input>';
	$count++;
	}
echo '<table>';
echo '<form>';
echo '<tr><td>Add new Answer</td></tr>';
echo '<tr><td>User</td><td><input type="text"  id="uid" value="'.$uid.'" readonly/></td></tr>
<tr><td>Subject</td><td><input type="text"  id="sid" value="'.$sid.'" readonly/></td></tr>
<tr><td>Question ID</td><td><input type="text"  id="qid" value="'.$qid.'" readonly/></td></tr>
<tr><td>Answer:</td><td><textarea name="nans" id="nans" rows="3" cols="30" ></textarea></td></tr>
<tr><td><input type="button" value="Submit" onclick="adda()"></td></tr>';
echo '<tr><td><span id="resulta"></span></td></tr>';
echo '</form>';
echo '</table>';
echo '<span id="logout"><a href="FLogout.php">Logout</a></span>';
echo '</div>';
}
else
	{
		echo '<a id="cata" href=FLogin.php />Click here to go to login again</a>';
	}
?>

</body>
</html>
