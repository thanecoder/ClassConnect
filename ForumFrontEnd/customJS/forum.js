//Onload AJAX for fetching content
$(document).ready(function(){
	var topContentRequest = $.ajax({
		url: "php/loadContent.php",
		type: "post",
		data: "title=topContent"
	});
	topContentRequest.done(function(response, textStatus, jqXHR){
		$("#topQBody").html(response);
	});
	topContentRequest.fail(function (jqXHR, textStatus, errorThrown){
        console.error("The following error occurred: " + textStatus, errorThrown);
    });

    var relatedContentRequest = $.ajax({
		url: "php/loadContent.php",
		type: "post",
		data: "title=relatedContent"
	});
	relatedContentRequest.done(function(response, textStatus, jqXHR){
		$("#relatedQBody").html(response);
	});
	relatedContentRequest.fail(function (jqXHR, textStatus, errorThrown){
        console.error("The following error occurred: " + textStatus, errorThrown);
    });

	var peopleRequest = $.ajax({
		url: "php/loadContent.php",
		type: "post",
		data: "title=people"
	});
	peopleRequest.done(function(response, textStatus, jqXHR){
		$("#peopleBody").html(response);
	});
	peopleRequest.fail(function (jqXHR, textStatus, errorThrown){
        console.error("The following error occurred: " + textStatus, errorThrown);
    });
});

//Inital window size setup
if($(window).width() < 768){
	$("#myNavbar").hide();
	$("#forDropdown").show();
}
else{
	$("#myNavbar").show();
	$("#forDropdown").hide();
}
if($(window).width() >= 1200)
	$(".bodyContent").css("height", "1500px");

//Setup on resize
$(window).resize(function(){
	if($(window).width() < 768){
		$("#myNavbar").hide();
		$("#forDropdown").show();
	}
	else{
		$("#myNavbar").show();
		$("#forDropdown").hide();
	}
	if($(window).width() >= 1200)
		$(".bodyContent").css("height", "1500px");
	else
		$(".bodyContent").css("height", "auto");
});

//For underline and overline animation on navbar content
$(".navbar-brand").on("mouseenter", function(){
	if($(window).width() >= 768)
		$(this).siblings().delay(200).animate({width: '100%'}, 200);
});
$(".navbar-brand").on("mouseleave", function(){
	if($(window).width() >= 768)
		$(this).siblings().delay(200).animate({width: '0%'}, 200);
});
$("nav > div > div > ul > li > a").on("mouseenter", function(){
	if($(window).width() >= 768)
		$(this).siblings().delay(200).animate({width: '100%'}, 200);
});
$("nav > div > div > ul > li > a").on("mouseleave", function(){
	if($(window).width() >= 768)
		$(this).siblings().delay(200).animate({width: '0%'}, 200);
});

//Caret symbol change when pressed
var $caretParent = $(".caret").parent();
$caretParent.on("click", function(){
	$(this).toggleClass("dropup");
});
$caretParent.on("blur", function(){
	$(this).removeClass("dropup");
});

//Change in navbar shadow and opacity on scroll
$(window).scroll(function(){
	var height = $(window).scrollTop();
	if(height > 0)
		$("nav").css("box-shadow", "0px 8px 8px #333").css("opacity", "0.8");
	else
		$("nav").css("box-shadow", "0px 0px 0px #fff").css("opacity", "1");
});

//Add question and answer button animation
var counter = 1;
$("#contribute").on("click", function(){
	if(counter){
		$(this).children().removeClass("glyphicon-plus");
		$(this).children().addClass("glyphicon-minus");
		$("#searchQ").animate({bottom: '+=150px'}, 200);
		$("#addQ").animate({bottom: '+=110px', right: '+=110px'}, 200);
		$("#collapseExpand").animate({right: '+=150px'}, 200);
		counter -= 1;
	}
	else{
		$(this).children().removeClass("glyphicon-minus");
		$(this).children().addClass("glyphicon-plus");
		$("#searchQ").animate({bottom: '5%'}, 200);
		$("#addQ").animate({bottom: '5%', right: '10%'}, 200);
		$("#collapseExpand").animate({right: '10%'}, 200);
		counter += 1;
	}
});

//Show/hide content on title and on collapse/expand button press
$(".bodyContent").hide().slideDown(800);
var count1 = 1, count2 = 1, count3 = 1;
$("#collapseExpand").on("click", function(){
	if($(this).children().hasClass("glyphicon-collapse-up")){
		$(this).children().removeClass("glyphicon-collapse-up");
		$(this).children().addClass("glyphicon-collapse-down");
		$(".bodyContent").slideUp("fast");
		count1 = count2 = count3 = 0;
	}
	else{
		$(this).children().addClass("glyphicon-collapse-up");
		$(this).children().removeClass("glyphicon-collapse-down");
		$(".bodyContent").hide().slideDown("fast");
		count1 = count2 = count3 = 1;
	}
});
$("#topQTitle").on("click", function(){
	if(!count1){
		$("#topQBody").hide().slideDown("fast");
		count1 += 1;
	}
	else{
		$("#topQBody").slideUp("fast");
		count1 -= 1;
	}
});
$("#relatedQTitle").on("click", function(){
	if(!count2){    
		$("#relatedQBody").hide().slideDown("fast");
		count2 += 1;
	}
	else{
		$("#relatedQBody").slideUp("fast");
		count2 -= 1;
	}
});
$("#peopleTitle").on("click", function(){
	if(!count3){
		$("#peopleBody").hide().slideDown("fast");
		count3 += 1;
	}
	else{
		$("#peopleBody").slideUp("fast");
		count3 -= 1;
	}
});

//Keyboard shortcuts to escape a custom modal
$(document).keydown(function(key){ 
	if(parseInt(key.which, 10) === 27){//ASCII for ESC key
		if($(".profileModal").css("display").toLowerCase() == 'block')
			$(".profileModalClose").click();
		else if($(".questionThreadModal").css("display").toLowerCase() == 'block')
			$(".questionThreadModalClose").click();
		else
			$(".customModalClose").click();
	}
});
//Key combination to escape all modals at once
var keys = {};
$(document).keydown(function (e) {
    keys[e.which] = true;
    if(keys[17] && keys[27])//For combination of CTRL + ESC
    	$(".customModal > button").click();
});
$(document).keyup(function (e) {
    delete keys[e.which];
});

//Navbar dropdown for mobile screens
var navDropdownToggle = 1;
$("#forDropdown").on("click", function(){
	if(navDropdownToggle){
		$("#myNavbar").toggle("slide");
		navDropdownToggle -= 1;
	}
	else{
		$("#myNavbar").toggle("slide");
		navDropdownToggle += 1;
	}
});

//Custom modal operations
$(".modalLauncher").on("click", function(){
	$(this).prop("disabled", true);
	if($(this).hasClass("logout")){
		$(".logoutModal").fadeIn(500);
		$(".logoutModalContent").hide().slideDown(500);
	}
	else if($(this).hasClass("searchQuestion")){
		$(".findQuestionModal").fadeIn(500);
		$(".findQuestionModalContent").hide().slideDown(500);
	}
	else if($(this).hasClass("addQuestion")){
		$(".addQuestionModal").fadeIn(500);
		$(".addQuestionModalContent").hide().slideDown(500);
	}
	else if($(this).hasClass("question")){
		$(".questionThreadModal").fadeIn(500);
		$(".questionThreadModalContent").hide().slideDown(500);
	}
	else if($(this).hasClass("profile")){
		$(".profileModal").fadeIn(500);
		$(".profileModalContent").hide().slideDown(500);
	}
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
});
$(".customModalClose").on("click", function(){
	$(".customModalContent").slideUp(500);
	$(".customModal").fadeOut(500);
});
$(".questionThreadModalClose").on("click", function(){
	$(".questionThreadContent").slideUp(500);
	$(".questionThreadModal").fadeOut(500);
});
$(".profileModalClose").on("click", function(){
	$(".profileModalContent").slideUp(500);
	$(".profileModal").fadeOut(500);
});
//Logout modal responses
$("#logoutNo").on("click", function(){
	$(".customModalClose").click();
});
$("#logoutYes").on("click", function(){
	var logoutRequest = $.ajax({
		url: 'php/logout.php',
		type: 'get',
	});
	$("#logoutResponse").show();
	logoutRequest.done(function(response, textStatus, jqXHR){
		if(response === "You are now logged out."){
			$("#logoutResponse").text("You are now logged out. Redirecting ...");
			setTimeout(function(){
				window.location.replace("mymodal.html");
			}, 1500);
		}
		else
			$("#logoutResponse").text("Error:" + response);
	});
	logoutRequest.fail(function (jqXHR, textStatus, errorThrown){
        console.error("The following error occurred: " + textStatus, errorThrown);
    });

});

//Temporary hack. Remove after testing.
$("#addQuestionResponse, #findQuestionResponse").show();
