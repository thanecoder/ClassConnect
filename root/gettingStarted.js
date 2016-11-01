$(document).ready(function(){
	var topics = $.ajax({
		url: "home/forum/php/getTopics.php",
		type: "get"
	});
	topics.done(function(response, textStatus, jqXHR){
		$("select").html(response);
	});
	topics.fail(function (jqXHR, textStatus, errorThrown){
        console.error("The following error occurred: " + textStatus, errorThrown);
    });
});

$(".response").hide();
var signUpName = signUpEmail = relatedTopics = signUpPassword = signUpRetypePassword = signInEmail = signInPassword = false;
var namePattern = /^[a-zA-Z']+( [a-zA-Z']+)*$/;
var emailPattern = /^[a-zA-Z0-9.]+@[a-zA-Z]+\.[a-z]+(\.[a-z]+)*$/;
var passwordPattern = /(?=.*[a-z]+)(?=.*[A-Z]+)(?=.*[0-9])(?=.*[@.\-_])/;
$("#signUpButton, #signInButton").prop("disabled", true);

$("input[name=signUpName]").on("keyup", function(){
	if(this.value == ''){
		$(this).next().children().removeClass("glyphicon-ok").removeClass("glyphicon-remove");
		signUpName = false;
		$(".response").hide();
	}
	else if(namePattern.test(this.value)){
		$(this).next().children().addClass("glyphicon-ok").removeClass("glyphicon-remove");
		signUpName = true;
		$(".response").hide();
	}
	else{
		$(this).next().children().removeClass("glyphicon-ok").addClass("glyphicon-remove");
		signUpName = false;
		$(".response").text("Names must not have numbers and not end with spaces").show();
	}
});
$("input[name=signUpEmail]").on("keyup", function(){
	if(this.value == ''){
		$(this).next().children().removeClass("glyphicon-ok").removeClass("glyphicon-remove");
		signUpEmail = false;
		$(".response").hide();
	}
	else if(emailPattern.test(this.value)){
		$(this).next().children().addClass("glyphicon-ok").removeClass("glyphicon-remove");
		signUpEmail = true;
		$(".response").hide();

		var signUpEmailCheck = $.ajax({
			url: "home/forum/php/signUpEmailCheck.php",
			type: "get",
			data: "email=" + this.value
		});
		signUpEmailCheck.done(function(response, textStatus, jqXHR){
			if(response == "This email ID already belongs to a user"){
				signUpEmail = false;
				$(".response").text("This email ID already belongs to a user. Try signing in instead.").show();
				$("input[name=signUpEmail]").next().children().removeClass("glyphicon-ok").addClass("glyphicon-remove");
			}
			else if(response == "Valid Email"){
				$("input[name=signUpEmail]").next().children().addClass("glyphicon-ok").removeClass("glyphicon-remove");
				signUpEmail = true;
				$(".response").hide();
			}
		});
		signUpEmailCheck.fail(function (jqXHR, textStatus, errorThrown){
	        console.error("The following error occurred: " + textStatus, errorThrown);
	    });
	}
	else{
		$(this).next().children().removeClass("glyphicon-ok").addClass("glyphicon-remove");
		signUpEmail = false;
		$(".response").text("Invalid email").show();
	}
});

$("#selectTopics").on("focus", function(){
	$(".response").text("Select at least one subject").show();
	$("option").on("focus touchstart", function(){
		$("select option").each(function(){
			if($(this).is(':selected')){
				$(".response").hide();
				relatedTopics = true;
				return false;
			}
			else{
				relatedTopics = false;
				$(".response").text("Select at least one subject").show();
			}
		});
	});
});
$("#selectTopics").on("blur", function(){
	$(".response").hide();
});

$("input[name=signUpPassword]").on("keyup", function(){
	if(this.value == ''){
		$(this).next().children().removeClass("glyphicon-ok").removeClass("glyphicon-remove");
		signUpPassword = false;
		$(".response").hide();
	}
	else if(this.value.length < 5){
		$(this).next().children().removeClass("glyphicon-ok").addClass("glyphicon-remove");
		signUpPassword = false;
		$(".response").text("Passwords not less than 5 characters long").show();
	}
	else if(passwordPattern.test(this.value)){
		$(this).next().children().addClass("glyphicon-ok").removeClass("glyphicon-remove");
		signUpPassword = true;
		$(".response").hide();
	}
	else{
		$(this).next().children().removeClass("glyphicon-ok").addClass("glyphicon-remove");
		signUpPassword = false;
		$(".response").text("Passwords must lave at least 1: a-z, A-Z, 0-9, @/./-/_").show();
	}
});
$("input[name=signUpRetypePassword]").on("keyup", function(){
	if(this.value == ''){
		$(this).next().children().removeClass("glyphicon-ok").removeClass("glyphicon-remove");
		signUpRetypePassword = false;
		$(".response").hide();
	}
	else if(document.getElementsByName("signUpPassword")[0].value !== this.value){
		$(this).next().children().removeClass("glyphicon-ok").addClass("glyphicon-remove");
		$(".response").text("Passwords do not match").show();
		signUpRetypePassword = false;
	}
	else{
		$(this).next().children().addClass("glyphicon-ok").removeClass("glyphicon-remove");
		$(".response").hide();
		signUpRetypePassword = true;
		$("select option").each(function(){
			if($(this).is(':selected')){
				$(".response").hide();
				relatedTopics = true;
				return false;
			}
			else{
				relatedTopics = false;
				$(".response").text("Select at least one subject").show();
			}
		});
	}
});

$("input[name=signInEmail]").on("keyup", function(){
	if(this.value == ''){
		$(this).next().children().removeClass("glyphicon-ok").removeClass("glyphicon-remove");
		signInEmail = false;
		$(".response").hide();
	}
	else if(emailPattern.test(this.value)){
		$(this).next().children().addClass("glyphicon-ok").removeClass("glyphicon-remove");
		signInEmail = true;
		$(".response").hide();

		var signInEmailCheck = $.ajax({
			url: "home/forum/php/signInEmailCheck.php",
			type: "get",
			data: "email=" + this.value
		});
		signInEmailCheck.done(function(response, textStatus, jqXHR){
			if(response == "This email ID doesn't belong to any user."){
				signInEmail = false;
				$(".response").text("This email ID doesn't belong to any user. Try signing up instead.").show();
				$("input[name=signInEmail]").next().children().removeClass("glyphicon-ok").addClass("glyphicon-remove");
			}
			else if(response == "Valid Email"){
				$("input[name=signInEmail]").next().children().addClass("glyphicon-ok").removeClass("glyphicon-remove");
				signInEmail = true;
				$(".response").hide();
			}
		});
		signInEmailCheck.fail(function (jqXHR, textStatus, errorThrown){
	        console.error("The following error occurred: " + textStatus, errorThrown);
	    });
	}
	else{
		$(this).next().children().removeClass("glyphicon-ok").addClass("glyphicon-remove");
		signInEmail = false;
		$(".response").text("Invalid email").show();
	}
});

$("input[name=signInPassword]").on("keyup", function(){
	if(this.value == ''){
		$(this).next().children().removeClass("glyphicon-ok").removeClass("glyphicon-remove");
		signInPassword = false;
		$(".response").hide();
	}
	else if(this.value.length < 5){
		$(this).next().children().removeClass("glyphicon-ok").addClass("glyphicon-remove");
		signInPassword = false;
		$(".response").text("Passwords not less than 5 characters long").show();
	}
	else if(passwordPattern.test(this.value)){
		$(this).next().children().addClass("glyphicon-ok").removeClass("glyphicon-remove");
		$(".response").hide();
		var signInPasswordCheck = $.ajax({
			url: "home/forum/php/signInPasswordCheck.php",
			type: "post",
			data: "email=" + document.getElementsByName("signInEmail")[0].value + "&password=" + document.getElementsByName("signInPassword")[0].value
		});
		signInPasswordCheck.done(function(response, textStatus, jqXHR){
			if(response == "Password incorrect for this email."){
				$(".response").text("Password incorrect for this email.").show();
				signInPassword = false;
				$("input[name=signInPassword]").next().children().removeClass("glyphicon-ok").addClass("glyphicon-remove");
			}
			else if(response == "Valid Password"){
				$("input[name=signInPassword]").next().children().addClass("glyphicon-ok").removeClass("glyphicon-remove");
				signInPassword = true;
				$(".response").hide();
			}
		});
		signInPasswordCheck.fail(function (jqXHR, textStatus, errorThrown){
	        console.error("The following error occurred: " + textStatus, errorThrown);
	    });
	}
	else{
		$(this).next().children().removeClass("glyphicon-ok").addClass("glyphicon-remove");
		signInPassword = false;
		$(".response").text("Passwords must lave at least 1: a-z, A-Z, 0-9, @/./-/_").show();
	}
});
$(document).on("keyup keydown", function(){
	if(signUpName && signUpEmail && relatedTopics && signUpPassword && signUpRetypePassword)
		$("#signUpButton").prop("disabled", false);
	else
		$("#signUpButton").prop("disabled", true);

	if(signInEmail && signInPassword)
		$("#signInButton").prop("disabled", false);
	else
		$("#signInButton").prop("disabled", true);
});
$("#signUpButton").on("click", function(){
	window.location.href = "./home/";
});
$("#signInButton").on("click", function(){
	window.location.href = "./home/";
});
var placeholderText;
$("form *").on("focus", function(){
	placeholderText = $(this).attr("placeholder");
	$(this).attr("placeholder", "");
	$(this).on("blur", function(){
		$(this).attr("placeholder", placeholderText);
	});
});
$("select").hide();
var selectTopicToggle = true;
$("#selectTopics").on("click", function(){
	if(selectTopicToggle){
		$(this).children().addClass("glyphicon-triangle-top");
		$(this).children().removeClass("glyphicon-triangle-bottom");
		$("select").show();
		selectTopicToggle = false;
	}
	else{
		$(this).children().addClass("glyphicon-triangle-bottom");
		$(this).children().removeClass("glyphicon-triangle-top");
		$("select").hide();
		selectTopicToggle = true;
	}
});
// $("textarea").on("keyup", function(){
// 	$(this).css("height", "15px");
// 	$(this).css("height", this.scrollHeight + "px");
// });
if($(window).width() < 1200){
	$(".projectName").animate({top: "5%"}, 1500);
	$(".forms").animate({top: "30%"}, 1500, function(){
		$(this).css("position", "absolute");
	});
}
else{
	$(".projectName").animate({left: "15%"}, 1500);
	$(".forms").animate({left: "50%"}, 1500, function(){
		$(this).css("position", "absolute");
	});
}

$(window).resize(function(){
	if($(window).width() < 1200){
		$(".projectName").animate({top: "5%", left: "0%"}, 0);
		$(".forms").animate({top: "30%", left: "0%"}, 0, function(){
			$(this).css("position", "absolute");
		});
	}
	else{
		$(".projectName").animate({left: "15%", top: "40%"}, 0);
		$(".forms").animate({top: "30%", left: "50%"}, 0);
	}
});