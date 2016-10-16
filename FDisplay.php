<html>
<head>
<script>
http1=new XMLHttpRequest();
function display()
{
	var sid=document.getElementById('subject').innerHTML;
	http1.open("GET","FQuestions.php?sid="+ sid, true);
	http1.send();
	http1.onreadystatechange=function() {
    if(http1.readyState == 4) {
    document.getElementById('content2').innerHTML = http1.responseText;
    }
  }
}
function display2()
{
	http2=new XMLHttpRequest();
	var sid=document.getElementById('subject').innerHTML;
	http2.open("GET", "FNewQuestion.php?sid=" + sid, true);
	http2.send();
	http2.onreadystatechange=function() {
    if(http2.readyState == 4) {
    document.getElementById('nq').innerHTML = http2.responseText;
    }
  }
}
function add()
{
	http3=new XMLHttpRequest();
	var sid=document.getElementById('sid').value;
	var qstn=document.getElementById('qstn').value;
	http3.open("GET", "FAddQuestion.php?sid=" + sid +"&qstn=" +  qstn, true);
  http3.send();
  http3.onreadystatechange=function() {
    if(http3.readyState == 4) {
      document.getElementById('result').innerHTML = http3.responseText;
	  document.getElementById('qstn').value="";
    }
	display();
  }
}
</script>
</head>
<body>
<?php
@session_start();
if(isset ($_SESSION['user_status']) )
{
$sub=$_GET['sid'];
include_once("Fdatabase.php");
$sql="select * from subjects where s_id='$sub'";
$result=mysqli_query($conn,$sql);
$result=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);
$count=0;
if($rowcount>0)
{
$row=mysqli_fetch_array($result);
echo '&nbsp<span id="subject">'.$row["s_id"].'</span>
&nbsp<span>'.$row["s_name"].'</span>&nbsp';
$count++;
}
echo '<div id="content2">';
$sql="select * from questions where s_id='$sub'";
$result=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);
$count=0;
while($count<$rowcount)
{
$i=$count+1;
$row=mysqli_fetch_array($result);
echo '<a href="FAnswers.php?sid='.$sub.'&qid='.$row['q_id'].'">'.$row["question"].'</a><br>';
$count++;
}
echo '</div>';
echo '<span onclick="display2()">Add new question</span>';
echo '<div id="nq"></div><div id="result"></div>';
echo '<span id="logout"><a href="FLogout.php">Logout</a></span>';
}
else
{
	echo '<a id="cata" href=FLogin.php />Click here to go to login again</a>';
}
?>
</body>
</html>