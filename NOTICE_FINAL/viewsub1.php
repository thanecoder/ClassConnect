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
$selectedsub=$_POST['sub'];

$query2=" select * from notice where branch='$branch' and sem='$sem' and topic='$selectedsub' ";
$result2=mysqli_query($con,$query2);
$numrows=mysqli_num_rows($result2);
$count =1;
$query3=" select * from curriculum where branch='$branch' and sem='$sem'; ";
$result3=mysqli_query($con,$query3);
$row3=mysqli_fetch_array($result3);
$s1= $row3['subject'];
$s2= $row3['sub2'];
$s3= $row3['sub3'];
$s4= $row3['sub4'];
$s5= $row3['sub5'];
$s6= $row3['sub6'];





echo"<!doctype html>
<!DOCTYPE html>
<html>
<head>
	<title>notice</title>
	<meta charset='utf-8'>
	<meta name='viewport' content='initial-scale=1, width=device-width'>
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <script src='https://code.jquery.com/jquery-3.1.0.min.js'></script>
	<!--<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script> -->
	<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
	<!-- Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Nunito' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet'>
	<link href='https://fonts.googleapis.com/css?family=Cuprum:700' rel='stylesheet'> 
	<link href='https://fonts.googleapis.com/css?family=Play' rel='stylesheet'> 
<link href='https://fonts.googleapis.com/css?family=Exo+2' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Amaranth' rel='stylesheet'>
	<!-- Date picker script  -->
	<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js'></script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css'/>

  <!-- Calender Link and Js files -->
  <link href='css/responsive-calendar.css' rel='stylesheet'>
		<style type='text/css'>
    .drop{
      
      background-color: #abcdef;
    }
    .drop:hover{

    }
    #colnav{
      color:#bab5b4;
    }


    nav{
      padding-top: 0.5%;
      height:10%;
      width:100%;
      background-color: #CFD8DC;
    }

		.navbar-brand{
			font-family: 'Lobster', cursive;
			font-size: 2.5em;
      color:#000000;
		}
		li{
			font-family: 'Nunito', sans-serif;
      color: #fff;
	  }
    ul.navbar-nav{
      color:#000;
    }
    ul.navbar-nav >li:hover{
      border-bottom: 5px solid #000;
      background-color: #fff;
    }
    a:hover, a:focus {
      color: #000000;
    }

		#header{
			font-family: 'Cuprum', sans-serif;
			font-size: 2.2em;
			text-align: center;
			text-shadow: 1px 1px 4px #000;
      background-color: #ffffff;
      color:#fff;
      opacity: 0.9;
		}

		table.submission-table > tr{
			font-family: 'Play', sans-serif;

		}
    .modal-header{
      background-color: #675682;
      color:#fff;
    }
    .status-box{
      background-color:rgba(95,15,78,0.75);
      z-index: 1;
      text-align: center;
     /* -webkit-filter : hue-rotate(180deg);
     filter : hue-rotate(180deg); */
    }
    .stat_container{
      float:left;
      margin-top: 5%;
      margin-left: 5%;  
      color:#fff;
      padding-left: 5%;
      padding-bottom: 7%;
    }
    .stat_caption{
      color:#fff;
      font-family: 'Amaranth', sans-serif;
      font-size:2em;
    }
    .status{
      border-radius: 50%;
      text-align: center;
      padding-top: 20%;
      padding-bottom: 0;
      color:#fff;
      background-color: rgba(95,15,78,0.8.5);
      box-shadow: 8px 5px 5px rgba(95,15,78,0.9);
      font-family: 'Exo 2', sans-serif;
      font-size: 3.5em;
      border: 5px solid #000;
      min-height: 150px;
      min-width:150px;
      float:left;
      margin-bottom: 10%;
  
    }
		html { 
		background: url(fcrit.jpg) no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        opacity: 0.9;
		}
    button{
      color:#fff;
      background-color: #e52a6f;
    }
    .hamburger{
      color:#fff;
      background-color: #000;
      font-size: 2em;
    }
	 #wrapper {
            height: 100%;
            width: 200px;
            overflow: auto;
          }

	
	</style>
 <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js'></script> 
    <script src='http://malsup.github.com/jquery.form.js'></script>"; 	

/*<script type='text/javascript'>	
$('#view-notice').submit(function() {
									$.ajax({
									type: 'POST',  //method
									url: 'viewnotice.php', //target file
									data: { q: $('#notice_id').val()} //data need to be sen
									}
									});
        .done(function( msg ){ 
					//done methods gets called when ajax response is sent back by jQuery ajax.
					// response is retrieved in variable 'msg'
		  $('#dynamicdiv').html(msg);  // Write the ajax response to span having id 'span' 
		});	
     });
</script> */
echo"
  	 
	
	<body bgcolor='#abcdef' >
	
	
	<nav class='navbar  navbar-fixed-top' id='my-navbar'>
		<div class='container'>
			<div class='navbar-header' style='float:left;'>
				<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#colnav'>
					<span class='icon-bar hamburger'></span>
					<span class='icon-bar hamburger'></span>
					<span class='icon-bar hamburger'></span>
				</button>
					<a href='#' class='navbar-brand pull-left' style='margin-left:-99px;'>Class Connect</a>
			</div>
			<div class='collapse navbar-collapse' style='background-color:#CFD8DC' id='colnav'>
			     <button type = 'button' class = 'btn btn-default contrastEffect' style='float:right;
				 height:36px; width:100px; margin-top:7px;				 margin-right:-50px' 
				data-toggle = 'modal' data-target = '#profileModal'>Profile <span class = 'glyphicon glyphicon-user'>
				</span></button>
				<div style=' margin-right:80px;'><button type='button' style='float:right;' class='btn  navbar-btn navbar-right' 
				data-toggle='modal' data-target='#confirm-lo'>Logout <span class='glyphicon glyphicon-log-out'>
				</div>
				</span></button>
				<ul class='nav navbar-nav' style='margin-left:30px; font-size:18px; color:#000; border-radius:20%' >
					<li><a href='#'>Home</a></li>
					<li><a href='#'>Page 1</a></li>
				<li><a href='#'>Page 2</a></li>
				</ul>
				 <input type='text' style='width:200px; margin-top:8px; float:right; margin-right:13px; '
				 class='form-control' id='keyword' placeholder='Search'>
				
			</div>
		</div>
	</nav>
	
		<div class='modal fade' tabindex='-1' id='confirm-lo'>
			<div class='modal-dialog modal-md'>
				<div class='modal-content'>
					<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal'>
					<span>&times;</span>
					</button>
					<h4 class='modal-title'><p>Are you sure you want to Logout?<p></h4>
					</div>
					<div class='modal-body'>
					<center>
					<a href='first.html' class='btn btn-default btn-md' >Yes</a>
					&nbsp;&nbsp;&nbsp;
					<button type='button' class='btn btn-default btn-md' data-dismiss='modal'>No</button>
					</center>
					</div>
				</div>
			</div>
		</div>
	
<div style='height:100%;width:100%; border:4px solid black;'>
	<!--left side wala div-->
		<div class='col-sm-12 col-md-6' style='margin-left:-1.6%;margin-right: -0.7%' >
 			<div class='container-fluid' style='margin-top:60px;float:left'>
				<div class='modal-dialog'>
 					<div class='modal-content' style='height:540px; width:140%; position: relative;' 
					id='dynamicdiv'>
						<div class='modal-header' id='header' style='background-color: #CFD8DC; 
							 border:1px solid #1A237E;    border-radius:5px; 
							 color:#212121; font-family:Verdana;'  >Notice Title   <!--Modal Header-->
 						</div>	
							<div id='wrapper' style='width:100%; height:240px;'> 
								<div id='content'> 
	<p style='font-family:Cambria Math; font-size:20px; '>DESCRIPTION:
</p>
								</div>
							</div>
							<br>
							<br>
							<p style='font-family:Cambria Math; font-size:20px; '>Files attached:</p>
							<button type = 'button' class = 'btn btn-default contrastEffect' 
							style='position: absolute; bottom:0;
							margin-left:415px;margin-bottom: 22.5px; background-color:#263238; color:#ffffff; '>
							Download <span class = 'glyphicon glyphicon-arrow-down' style='bottom:0; '>
							</span></button>
							
							<div style='position: absolute; bottom: 0; height:55px; width:100%;   '>
								<div style=' float:left; height:60px; width:150px; 
								font-family:Cambria Math; font-size:30px;'>
								<center>date<center>
								</div>
								<button type ='button' class ='btn btn-info' style='margin-left:150px;
								width:100px;'>View</button>
								<div style=' float:right; height:60px; width:250px; 
								font-family:Cambria Math; font-size:20px;'>
								<center>teacher name<center>
								</div>
							</div>
						</div>
					</div>
				</div>
		</div>

<div style='float:left;width:480px; height:480px;  margin-top:90px; margin-left:210px; '>
 
 				<div class='modal-content' style='width:480px; height:541px; '    >
 					<div class='modal-header' style='background-color:#CFD8DC; color:#212121;
					font-family:Verdana; border:1px solid #1A237E;'
					id='header'>List of Notices
					</div>
							
								
							<div style='width:470px; height:45px; border:2px solid red; '>
								
								<form action='viewsub1.php' method='POST'>
								<input type='hidden' value='$s1'id='sub' name='sub'>
								<input type='submit' style='width:55px; margin-left:8px; 
								height:40px; border:2px solid black; float:left;' value='$s1'>
								</form>
								
								<form action='viewsub1.php' method='POST'>
								<input type='hidden' value='$s2'id='sub' name='sub'>
								<input type='submit' style='width:55px; margin-left:8px; 
								height:40px; border:2px solid black; float:left;' value='$s2'>
								</form>
								
								<form action='viewsub1.php' method='POST' >
								<input type='hidden' value='$s3'id='sub'>
								<input type='submit' style='width:55px; margin-left:8px; 
								height:40px; border:2px solid black; float:left;' value='$s3'>
								</form>
								
								<form action='viewsub1.php' method='POST'>
								<input type='hidden' value='$s4'id='sub' name='sub' >
								<input type='submit' style='width:55px; margin-left:8px; 
								height:40px; border:2px solid black; float:left;' value='$s4'>
								</form>
								
								<form action='viewsub1.php' method='POST'>
								<input type='hidden' value='$s5' id='sub' name='sub' >
								<input type='submit' style='width:55px; margin-left:8px; 
								height:40px; border:2px solid black; float:left;' value='$s5'>
								</form>
								
								<form action='viewsub1.php' method='POST'>
								<input type='hidden' value='$s6'id='sub' name='sub' >
								<input type='submit' style='width:55px; margin-left:8px; 
								height:40px; border:2px solid black; float:left;' value='$s6'>
								</form>
								
								<form action='noticetrial.php' method='post'>
								<input type='hidden' value='$s1'>
								<input type='submit' style='width:55px; margin-left:8px; 
								height:40px; border:2px solid black; float:left;' value='All'>
								</form>
							
						<div style='width:475px; height:370px;  overflow:auto;'> 
								<!--content inside this div will be dynamically generated.
								multiple divs like this will be generated 
								depending upon the number of notices -->";
							
				
							
							
							echo"
							<div style='width:475px; height:450px;  overflow:auto;'> 
								<!--content inside this div will be dynamically generated.
								multiple divs like this will be generated 
								depending upon the number of notices -->";
							
							
							$result2=mysqli_query($con,$query2);
							$numrows=mysqli_num_rows($result2);
							$count =1;
							if($numrows>0)
							{while($count<= $numrows)
							{
							$row2=mysqli_fetch_array($result2);	
							echo"
							<div style='width:490px; height:100px;margin-top:4px;font-size:20px;
							font-family:Verdana;' class='modal-content'>";
							echo"<form id='view-notice' method='POST' action='viewnotice.php' >";
							
							echo"topic: ".$row2['topic'];
							echo"By: ".$row2['teacher'];
							echo"Date: ".$row2['date'];

							$idnew=$row2['id'];
							echo"<input type=hidden id='notice_id' name='notice_id' value= $idnew >";
							echo"<input type = 'submit' class = 'btn btn-info' value='View' >";
							echo"</form>";
							echo"</div>";
							$count++;}
							}
echo"						</div>
				</div>
</div>
	
	
	
	
</div>

	
	
	
	</body>
	</html>";

?>