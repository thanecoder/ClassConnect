<html>
<head>
<script>
http1=new XMLHttpRequest();
function display()
{
	var tid=document.getElementById('topic').innerHTML;
	http1.open("GET", "FQuestions.php?tid=" + tid, true);
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
	var tid=document.getElementById('topic').innerHTML;
	http2.open("GET", "FNewQuestion.php?tid=" + tid, true);
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
	var tid=document.getElementById('tid').value;
	var qstn=document.getElementById('qstn').value;
	http3.open("GET", "FAddQuestion.php?tid=" + tid +"&qstn=" +  qstn, true);
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
$sub=$_GET['subject'];
include_once("Fdatabase.php");
$sql="select * from topics where s_id='$sub'";
$result=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);
$count=0;
while($count<$rowcount)
{
$i=$count+1;
$row=mysqli_fetch_array($result);
echo '&nbsp<span id="topic" onclick="display()">'.$row["t_id"].'</span>&nbsp<span id="nm" onclick="display()">'.$row["name"].'</span>&nbsp';
$count++;
}
?>
<div id="content2"></div>
<span onclick="display2()">Add new question</span>
<div id="nq"></div><div id="result"></div>
<span id="logout"><a href="FLogout.php">Logout</a></span>
</body>
</html>