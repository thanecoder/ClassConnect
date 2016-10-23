<?php
	if(!isset($_POST['title']))
		echo "<h3>Nothing specified to fetch</h3>";
	elseif($_POST['title'] == "topContent")
		echo <<<TOP
			<p>Top questions go here</p>
								<hr>
								<div class = "container">
									<ul class = "nav nav-tabs">
										<li class = "nav active"><a href = "#A" data-toggle = "tab">ALL</a></li>
										<li class = "nav"><a href = "#B" data-toggle = "tab">THE</a></li>
										<li class = "nav"><a href = "#C" data-toggle = "tab">TOPICS</a></li>
									</ul>

									<div class = "tab-content">
										<div class = "tab-pane fade in active" id = "A">
											<br>
											<div class = "modalLauncher question">Question 1.1</div>
											<hr>
											<div class = "modalLauncher question">Question 1.2</div>
											<hr>
											<div class = "modalLauncher question">Question 1.3</div>
											<hr>
											<div class = "modalLauncher question">Question 1.4</div>
											<hr>
											.....
										</div>
										<div class = "tab-pane fade" id = "B">
											<br>
											<div class = "modalLauncher question">Question 2.1</div>
											<hr>
											<div class = "modalLauncher question">Question 2.2</div>
											<hr>
											<div class = "modalLauncher question">Question 2.3</div>
											<hr>
											<div class = "modalLauncher question">Question 2.4</div>
											<hr>
											.....
										</div>
										<div class = "tab-pane fade" id = "C">
											<br>
											<div class = "modalLauncher question">Question 3.1</div>
											<hr>
											<div class = "modalLauncher question">Question 3.2</div>
											<hr>
											<div class = "modalLauncher question">Question 3.3</div>
											<hr>
											<div class = "modalLauncher question">Question 3.4</div>
											<hr>
											.....
										</div>

									</div>

								</div>
		<script>
			$(this).prop("disabled", true);
			$(".modalLauncher").on("click", function(){
				if($(this).hasClass("question")){
					$(".questionThreadModal").fadeIn(500);
					$(".questionThreadModalContent").hide().slideDown(500);
				}
			});
			$(this).prop("disabled", false);
			$(document).mouseup(function (e){
    		var container = $(".customModalContent");
				if (!container.is(e.target) && container.has(e.target).length === 0){
					if($(".profileModal").css("display").toLowerCase() == 'block')
						$(".profileModalClose").click();
					else if($(".questionThreadModal").css("display").toLowerCase() == 'block')
						$(".questionThreadModalClose").click();
					else
						$(".customModalClose").click();
				}
			});
		</script>
TOP;
	elseif($_POST['title'] == "relatedContent")
		echo <<<RELATED
			<p>Tab pane with subjects for students questions go here</p>
								<hr>
								<div class = "container">
									<ul class = "nav nav-tabs">
										<li class = "nav active"><a href = "#OS" data-toggle = "tab">OS</a></li>
										<li class = "nav"><a href = "#MP" data-toggle = "tab">MP</a></li>
										<li class = "nav"><a href = "#CN" data-toggle = "tab">CN</a></li>
									</ul>

									<div class = "tab-content">
										<div class = "tab-pane fade in active" id = "OS">
											<br>
											<div class = "modalLauncher question">Question 1.1</div>
											<hr>
											<div class = "modalLauncher question">Question 1.2</div>
											<hr>
											<div class = "modalLauncher question">Question 1.3</div>
											<hr>
											<div class = "modalLauncher question">Question 1.4</div>
											<hr>
											.....
										</div>
										<div class = "tab-pane fade" id = "MP">
											<br>
											<div class = "modalLauncher question">Question 2.1</div>
											<hr>
											<div class = "modalLauncher question">Question 2.2</div>
											<hr>
											<div class = "modalLauncher question">Question 2.3</div>
											<hr>
											<div class = "modalLauncher question">Question 2.4</div>
											<hr>
											.....
										</div>
										<div class = "tab-pane fade" id = "CN">
											<br>
											<div class = "modalLauncher question">Question 3.1</div>
											<hr>
											<div class = "modalLauncher question">Question 3.2</div>
											<hr>
											<div class = "modalLauncher question">Question 3.3</div>
											<hr>
											<div class = "modalLauncher question">Question 3.4</div>
											<hr>
											.....
										</div>


									</div>
								</div>
		<script>
			$(this).prop("disabled", true);
			$(".modalLauncher").on("click", function(){
				if($(this).hasClass("question")){
					$(".questionThreadModal").fadeIn(500);
					$(".questionThreadModalContent").hide().slideDown(500);
				}
			});
			$(this).prop("disabled", false);
			$(document).mouseup(function (e){
		    	var container = $(".customModalContent");
				if (!container.is(e.target) && container.has(e.target).length === 0){
					if($(".profileModal").css("display").toLowerCase() == 'block')
						$(".profileModalClose").click();
					else if($(".questionThreadModal").css("display").toLowerCase() == 'block')
						$(".questionThreadModalClose").click();
					else
						$(".customModalClose").click();
				}
			});
		</script>
RELATED;
	elseif($_POST['title'] == "people")
		echo <<<PEOPLE
			<p>People online and top contributers go here</p>
								<h3>Top contributers:</h3>
								<img class = "img-thumbnail modalLauncher profile" src = "fcrit.jpg"><h6>Name</h6>
								<img class = "img-thumbnail modalLauncher profile" src = "fcrit.jpg"><h6>Name</h6>
								<img class = "img-thumbnail modalLauncher profile" src = "fcrit.jpg"><h6>Name</h6>
								<h3>Online:</h3>
								<img class = "img-thumbnail modalLauncher profile" src = "fcrit.jpg"><h6>Name</h6>
								<img class = "img-thumbnail modalLauncher profile" src = "fcrit.jpg"><h6>Name</h6>
								<img class = "img-thumbnail modalLauncher profile" src = "fcrit.jpg"><h6>Name</h6>
		<script>
			$(this).prop("disabled", true);
			$(".modalLauncher").on("click", function(){
				if($(this).hasClass("profile")){
					$(".profileModal").fadeIn(500);
					$(".profileModalContent").hide().slideDown(500);
				}
			});
			$(this).prop("disabled", false);
			$(document).mouseup(function (e){
		    	var container = $(".customModalContent");
				if (!container.is(e.target) && container.has(e.target).length === 0){
					if($(".profileModal").css("display").toLowerCase() == 'block')
						$(".profileModalClose").click();
					else if($(".questionThreadModal").css("display").toLowerCase() == 'block')
						$(".questionThreadModalClose").click();
					else
						$(".customModalClose").click();
				}
			});
		</script>
PEOPLE;
	else
		echo "<h3>Unrecognised request</h3>";
?>
