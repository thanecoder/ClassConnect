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
function dsplyq(id)
{
	var sid=id;
	http1.open("GET","FDisplay.php?sid="+sid,true);
	http1.send();
	http1.onreadystatechange=function() {
    if(http1.readyState == 4) {
	  document.getElementById('content').innerHTML=http1.responseText;
    }
  }
}
</script>
<script src = "jQuery/jquery-3.1.1.min.js"></script>
<script src = "jQuery/jquery-2.2.4.min.js"></script>
<script src = "bootstrap-3.3.7/js/bootstrap.min.js"></script>
<script src = "customJS/forum.js"></script>
<title>Subjects</title>
</head>
<body>
<?php
@session_start();
if(isset ($_SESSION["user_status"]) )
{
$sem=$_SESSION['sem'];
$branch=$_SESSION['branch'];
include_once("Fdatabase.php");
$sql="select * from subjects where sem='$sem' and branch='$branch'";
$result=mysqli_query($conn,$sql);
$result=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);
$count=0;
while($count<$rowcount)
{
$row=mysqli_fetch_array($result);
echo '<span id="'.$row["s_id"].'" onclick="dsplyq(this.id)">'.$row["s_name"].'</span>&nbsp';
$count++;
}
echo '<div id="content">';
echo '</div>';

}
else
{
	echo '<a id="cata" href=FLogin.php />Click here to go to login again</a>';
}
?>
</body>
