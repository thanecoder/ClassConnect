<?php
	session_start();
	$_SESSION['username'] = "Kartik";
	//session_unset();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "initial-scale = 1, width = device-width">
	<meta name = "theme-color" content = "#000000">
    <meta name = "description" content = "class connect's home page">
	<title>Home - Class Connect</title>
	<link rel = "stylesheet" href = "../required/bootstrap-3.3.7/css/bootstrap.min.css">
	<link rel = "stylesheet" href = "home.css">
</head>

<?php if(isset($_SESSION['username'])){ ?>
<body>
	<div class = "projectName jumbotron">
		<h1><a href = "./">Class Connect</a></h1>
		<h3>Stay connected with your class.</h3>
	</div>
	<div class = "projectDescription">
		<h2>With Class Connect:</h2>
			
		<div class = "col-lg-4">
			<h4 class = "col-lg-12">Teachers can post notices. Students can view those notices and plan accordingly.</h4><br>
			<div class = "links notice col-lg-12">
				<div class = "slideLeftToRight">
				</div>
				<a class = "noticeLink" href = "notice/">Notices <span class = "glyphicon glyphicon-menu-right"><span></span></span></a>
			</div>
		</div>

		<div class = "col-lg-4">
			<h4 class = "col-lg-12">Teachers can give assignments. Students can track the deadline and upload their solutions.</h4><br>
			<div class = "links submission col-lg-12">
				<div class = "slideLeftToRight">
				</div>
				<a class = "submissionLink" href = "submission/">Submissions <span class = "glyphicon glyphicon-menu-right"><span></span></span></a>
			</div>
		</div>

		<div class = "col-lg-4">
			<h4 class = "col-lg-12">Teachers and students can ask questions. They can also write their own answers.</h4><br>
			<div class = "links forum col-lg-12">
				<div class = "slideLeftToRight">
				</div>
				<a class = "forumLink" href = "forum/">Forum <span class = "glyphicon glyphicon-menu-right"><span></span></span></a>
			</div>
		</div>
	</div>

	<div class = "welcomeMessage col-xs-10 col-xs-offset-1 col-lg-4 col-lg-offset-4 alert-success">  Hello, <?php echo $_SESSION['username'] ?>. </div>
		
	<script src = "../required/jQuery/jquery-3.1.1.min.js"></script>
	<script src = "../required/jQuery/jquery-2.2.4.min.js"></script>
	<script src = "../required/bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<script src = "home.js"></script>
	<noscript>Please enable JavaScript to continue.</noscript>
</body>

<?php } else{ ?>
		<style>
			.notLoggedInMessage{
				z-index: 10000;
				position: fixed;
				top: 0;
				right: 0;
				width: 100%;
				height: 100%;
				border-radius: 10px;
				border: 2px solid red;
				text-align: center;
				font-size: 3em;
				padding: 10px;
			}
		</style>
		<div class = "notLoggedInMessage alert-danger">You must be logged in to continue.<br><a href = "../">Log in</a></div>
<?php } ?>
</html>
