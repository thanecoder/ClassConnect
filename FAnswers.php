<html>
<head><title>Answers</title>
<script>
function display()
{
	http1=new XMLHttpRequest();
	var qid=document.getElementById('qid').value;
	var tid=document.getElementById('tid').value;
	http1.open("GET", "FAnswers.php?tid="+ tid + "&qid=" + qid, true);
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
	var tid=document.getElementById('tid').value;

	http2.open("GET", "FAddAnswer.php?nans=" + nans +"&qstn=" + qstn+"&tid="+tid, true);
	http2.send();
	http2.onreadystatechange=function() {
    if(http2.readyState == 4) {
	  document.getElementById('nans').value="";
	  display();
    }
  }
}
</script>
</head>
<body>
<div id="qaa">
<?php
$tid=$_GET['tid'];
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
$count++;
}
?>
<table>
<form>
<tr><td>Add new Answer</td></tr>
<tr><td><input type="hidden"  id="tid" value="<?php echo $tid;?>"/></tr></td>
<tr><td><input type="hidden"  id="qid" value="<?php echo $qid;?>"/></tr></td>
<tr><td>Answer:</td><td><textarea rows="3" cols="30" name="nans" id="nans"></textarea></td></tr>
<tr><td><input type="button" value="Submit" onclick="adda()"></tr></td>
<tr><td><span id="resulta"></span></td></tr>
</form>
</table>
<span id="logout"><a href="FLogout.php">Logout</a></span>
</div>
</body>
</html>