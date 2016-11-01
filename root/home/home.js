$("h4").hide();
$(".projectName").hide().slideDown("very slow");
$("h4").delay(800).toggle("slide");
$(".noticeLink, .submissionLink, .forumLink").on("mouseenter", function(){
	$(this).children().children().addClass("glyphicon-menu-right");
});
$(".noticeLink, .submissionLink, .forumLink").on("mouseleave", function(){
	$(this).children().children().removeClass("glyphicon-menu-right");
	
});
$(".links").on("mouseenter", function(){
	$(this).children('div').animate({width: "100%"}, 400);
});
$(".links").on("mouseleave", function(){
	$(this).children('div').animate({width: "0%"}, 400);
});
$(".welcomeMessage").hide().delay(1000).slideDown("slow").delay(1500).slideUp("slow");