<?php
	@session_start();
?>
<html>
<head>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "initial-scale = 1, width = device-width">
	<meta name = "theme-color" content = "#000000">
    <meta name = "description" content = "class connect's getting started page">
	<title>Getting started - Class Connect</title>
	<link rel = "stylesheet" href = "required/bootstrap-3.3.7/css/bootstrap.min.css">
	<link rel = "stylesheet" href = "gettingStarted.css">
</head>
<body>
	<div class = "content">
		<div class = "projectName col-lg-4">
			<h1>Class Connect</h1>
			<br>
			<h4>Join Class connect to continue.</h4>
		</div>
		<div class = "forms col-lg-4">
			<ul class = "nav nav-tabs nav-justified">
				<li class = "active">
					<a data-toggle = "pill" href = "#signUp">Sign Up</a>
				</li>
				<li>
					<a data-toggle = "pill" href = "#signIn">Sign In</a>
				</li>
			</ul>
			<br><br>
			<div class = "tab-content">
				<div class = "alert-danger response"></div>
				<form id = "signUp" class = "form-group tab-pane fade in active row-fluid">
					<input class = "col-xs-11" type = "text" name = "signUpName" placeholder = "Type in your name">
					<div class = "col-xs-1 validateIcons"><span class = "glyphicon"></span></div>

					<input class = "col-xs-11" type = "email" name = "signUpEmail" placeholder = "Type in your email ID">
					<div class = "col-xs-1 validateIcons"><span class = "glyphicon"></span></div>

					<button type = "button" id = "selectTopics" class = "btn btn-default form-control">Select Topics <span class = "glyphicon glyphicon-triangle-bottom pull-right"></span></button>
					<select class = "form-control" name = "relatedTopics[]" multiple>
						
					</select>

					<input class = "col-xs-11" type = "password" name = "signUpPassword" placeholder = "Type in your password">
					<div class = "col-xs-1 validateIcons"><span class = "glyphicon"></span></div>

					<input class = "col-xs-11" type = "password" name = "signUpRetypePassword" placeholder = "Retype your password">
					<div class = "col-xs-1 validateIcons"><span class = "glyphicon"></span></div>

					<button type = "button" class = "btn btn-default col-xs-4 col-xs-offset-4" id = "signUpButton">Sign Up <span class = "glyphicon glyphicon-user"></span></button>
				</form>

				<form id = "signIn" class = "form-group tab-pane fade row-fluid">
					<input class = "col-xs-11" type = "email" name = "signInEmail" placeholder = "Type in your email ID">
					<div class = "col-xs-1 validateIcons"><span class = "glyphicon"></span></div>

					<input class = "col-xs-11" type = "password" name = "signInPassword" placeholder = "Type in your password">
					<div class = "col-xs-1 validateIcons"><span class = "glyphicon"></span></div>

					<button type = "button" class = "btn btn-default col-xs-4 col-xs-offset-4" id = "signInButton">Sign In <span class = "glyphicon glyphicon-log-in"></span></button>
				</form>
			</div>
		</div>
	</div>

	<script src = "required/jQuery/jquery-3.1.1.min.js"></script>
	<script src = "required/jQuery/jquery-2.2.4.min.js"></script>
	<script src = "required/bootstrap-3.3.7/js/bootstrap.min.js"></script>
	<script src = "gettingStarted.js"></script>
	<noscript>Please enable JavaScript to continue.</noscript>
</body>
</html>