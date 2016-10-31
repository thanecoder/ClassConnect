$(document).ready(function(){

    $('#submitted')
  .prop('number', 0)
  .animateNumber(
    {
      number: 20
    },
    2000
  );

  $('#Remaining')
  .prop('number', 0)
  .animateNumber(
    {
      number: 10
    },
    2000
  );

  $('#checked')
  .prop('number', 0)
  .animateNumber(
    {
      number: 12
    },
    2000
  );

  $('#unchecked')
  .prop('number', 0)
  .animateNumber(
    {
      number: 8
    },
    2000
  );

    $('[data-toggle="tooltip"]').tooltip();

});

  // Calender jquery
  var currentYear = (new Date).getFullYear();
        var currentMonth = (new Date).getMonth() + 1;
        var date="2016-10-22";
        var count=10;
        $(".responsive-calendar").responsiveCalendar({
          time: currentYear+'-'+ currentMonth,
          events: {
            "2016-10-20": {"number": count },
            date:{"number": 5}, 
            "2016-10-24": {}}
        });

        //Calender js Script
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
        orientation:'top right',
      };
      date_input.datepicker(options);


      // $(document).ready(function(){
    //   var xhttp=new XMLHttpRequest();
    //   xhttp.onreadystatechange=function(){
    //     while(this.readyState!=4){
    //       document.getElementById("load-bar").style.display = "block";
    //     }
    //     if (this.readyState==4 && this.status==200) {
    //       document.getElementById("loadtest").innerHTML=this.responseText;
    //     }
    //   };
    //   xhttp.open("GET","loadtest.php",true);
    //   xhttp.send();
    // });

    $(".barcontainer").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        $(".barcontainer").toggleClass("change");
    });


    $("input[name='mode']").click(function() {
      var status = $(this).val();
      if (status == 'Softcopy') {
          $(".Softcopy").show();
          $(".Hardcopy").hide();
      }
      else if(status=='Hardcopy'){
        $(".Hardcopy").show();
        $(".Softcopy").hide();
      }
       else {
          $(".Softcopy").hide();
          $(".Hardcopy").hide();
      }
    });
    $("#submit").mouseover(function(){
      
      $("#submit > span").addClass("glyphicon-ok");
    });
    $("#submit").mouseleave(function(){
      $("#submit > span").removeClass("glyphicon-ok");
    });

    function Confirmation(){
        $("#alert").show();
         setTimeout( function(){
         $("#alert").hide();
         }, 5000);
         return false;

    }
    $(window).scroll(function(){
      var height = $(window).scrollTop();
      if(height > 0){
        $('.barcontainer').css({'position': 'fixed', 'top': '0px'});
      }
    });
	
	
	function getassign(s){
	$.ajax({
		url:"assignment_list.php?var="+s,
		success:function(result){
			if(s == 1){	
				$(".loader").hide();
				$("#assignlist_ajax").html(result);
				// $('#Assign_listli').attr('data-target','#list');
			}
			else if(s == 2){
				$(".loader").hide();
				$("#uncheckedassign_ajax").html(result);
				// $("#Unchecked_li").attr('data-target','#uncheckedassign');
			}
			else if(s == 3){
				$(".loader").hide();				
				$("#checkassign_ajax").html(result);
				// $("#Checked_li").attr('data-target','#checkedassign');
			}
		}
	});
	}
	
	function assignment_details(s){
	$.ajax({
		url:"selectassign.php?var="+s,
		success:function(result){
			$('#togglemodal').modal('show');
			$("#togglemodal .modal-body").html(result);
			// $("#togglemodal").html(result); 
		}
	});
	}
	
	function Confirm(){
    window.alert("Submit??");
	 // var post_url = $(this).attr("action"); //get form action url
     var request_method = $(this).attr("method"); //get form GET/POST method
     var form_data = new FormData(this); 
	
	$.ajax({
        type: request_method,
        url: "studentsubmitassign.php",
        data: formData,
         success: function (data) {
        	$("#alert").html(data);
		  $("#alert").show();
         setTimeout( function(){
         $("#alert").hide();
         }, 5000);
     }
      });
}

	//$('#btnSubmit').click(function(){
     //var formData = new formData($('#submission'));
     //$.ajax({
       // type: 'POST',
        //url: 'studentsubmitassign.php',
        //data: formData,
         //success: function (data) {
		  //$("#alert").show();
          //$("#alert").html(data); 
		  //alert(data)
         //},
      //});
  //});

	