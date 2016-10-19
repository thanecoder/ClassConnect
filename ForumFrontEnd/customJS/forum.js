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
		$("nav").css("box-shadow", "0px 8px 8px #555");
	else
		$("nav").css("box-shadow", "0px 0px 0px #fff");
});

//add question and answer button animation
var counter = 1;
$("#contribute").on("click", function(){
	if(counter){
		$("#addA").animate({bottom: '20%'}, 200);
		$("#addQ").animate({bottom: '35%'}, 200);
		$("#collapseExpand").animate({right: '+=100px'}, 200);
		counter -= 1;
	}
	else{
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
	if($("#collapseExpand > span").hasClass("glyphicon-collapse-up")){
		$("#collapseExpand > span").removeClass("glyphicon-collapse-up");
		$("#collapseExpand > span").addClass("glyphicon-collapse-down");
		$(".bodyContent").slideUp("fast");
		count1 = count2 = count3 = 0;
	}
	else{
		$("#collapseExpand > span").addClass("glyphicon-collapse-up");
		$("#collapseExpand > span").removeClass("glyphicon-collapse-down");
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

// DYNAMIC CONTENT'S JS and JQUERY