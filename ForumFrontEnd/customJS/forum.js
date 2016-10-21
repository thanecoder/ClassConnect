$(".navbar-brand").on("mouseenter", function(){
	if($(window).width() >= 768)
		$(this).siblings().animate({width: '100%'}, 200);
});
$(".navbar-brand").on("mouseleave", function(){
	if($(window).width() >= 768)
		$(this).siblings().animate({width: '0%'}, 200);
});

$("nav > div > div > ul > li > a").on("mouseenter", function(){
	if($(window).width() >= 768)
		$(this).siblings().animate({width: '100%'}, 200);
});
$("nav > div > div > ul > li > a").on("mouseleave", function(){
	if($(window).width() >= 768)
		$(this).siblings().animate({width: '0%'}, 200);
});
//caret change when pressed
var $caretParent = $(".caret").parent();
$caretParent.on("click", function(){
	$(this).toggleClass("dropup");
});
$caretParent.on("blur", function(){
	$(this).removeClass("dropup");
});

//change in navbar shadow on scroll
$(window).scroll(function(){
	var height = $(window).scrollTop();
	if(height > 0)
		$("nav").css("box-shadow", "0px 8px 8px #333");
	else
		$("nav").css("box-shadow", "0px 0px 0px #fff");
});

//add question and answer button animation
var counter = 1;
$("#contribute").on("click", function(){
	if(counter){
		$(this).children().removeClass("glyphicon-plus");
		$(this).children().addClass("glyphicon-minus");
		$("#addA").animate({bottom: '20%'}, 200);
		$("#addQ").animate({bottom: '35%'}, 200);
		$("#collapseExpand").animate({right: '+=100px'}, 200);
		counter -= 1;
	}
	else{
		$(this).children().removeClass("glyphicon-minus");
		$(this).children().addClass("glyphicon-plus");
		$("#addA").animate({bottom: '5%'}, 200);
		$("#addQ").animate({bottom: '5%'}, 200);
		$("#collapseExpand").animate({right: '10%'}, 200);
		counter += 1;
	}
});

//show tile toggle
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

// Using escape key to escape from modal.
//God, I love keyboard shortcuts. I will add more of them.
$(document).keydown(function(key){ 
	if(parseInt(key.which, 10) === 27){
		$(".modal-header > button").click();
	}
});
//for multiple keypress. Yay.
var keys = {};
$(document).keydown(function (e) {
    keys[e.which] = true;
    if(keys[17] && keys[18] && keys[81]){ //for combination of ctrl + alt + q
    	$(".modal-header > button").click();
    }
});
$(document).keyup(function (e) {
    delete keys[e.which];
});

// DYNAMIC CONTENT'S JS and JQUERY