// JavaScript Document

$(document).ready(function(){

$(".showDate").datepicker();
$('.theTime').ptTimeSelect();
$(".wysiwyg").htmlarea();
$('#waitComplete').hide();
	
$("input[type=text], select, textarea").click(function(){
	  $(this).removeClass("errorInput");
	  $("#errorMsg").empty();
	  $("#waitComplete").hide();
	  $("label[for='" + this.id + "']").removeClass("errorTxt");
});

$("#searchForm :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
	}).blur(function() {
	  $("label").removeClass("labelfocus");
  });

$("#searchForm").submit(function() {
      if ($("#search").val() == "") {
		$("#search").addClass("errorInput");
		$("label[for=search]").addClass("errorTxt");
        return false;
      }else {
	  return true;
	  }
});	
	
	
$('.collectLinks').hide();

///////////////Purchase inputs
$( "#purchaseDate" ).datepicker();	
$( ".purchaseDate" ).datepicker();	
/*$(".purchasePrice").focus(function(event){
	$(this).val("");
});

$("#noPrice").click(function(){
	$("#purchasePrice").val("0.00");
	$("#purchasePrice").removeClass("errorInput");
	$("#errorMsg").text("");
});
*/
//////////////////////////////////////////////////////////////////////////////////
/*$("#shopDetails, #ebayDetails, #otherDetails, #coinShowDetails").hide();

$("#eBayRad").click(function() {
	$("#ebayDetails").show();
	$(".detailDiv").not("#ebayDetails").hide();
});
$("#shopRad").click(function() {
	$("#shopDetails").show();
	$(".detailDiv").not("#shopDetails").hide();
});
$("#otherRad").click(function() {
	$("#otherDetails").show();
	$(".detailDiv").not("#otherDetails").hide();
});
$("#noneRad").click(function() {
	$(".detailDiv").hide();
});
$("#coinShowRad").click(function() {
	$("#coinShowDetails").show();
	$(".detailDiv").not("#coinShowDetails").hide();
});

//////////////////////////////////////////////////////////////////////////////////
$(".masterBtn").click(function() {
   window.location = 'report.php';
});
*/
//////////////////////////TOTALS AND PERCENTS
$("#getMintCollectedType").val();
$("#getMintCountType").val();
$("#mintCollectAllPercent").val();


var total = 0;

$(".collectCount").each(function() {
	if (!isNaN(this.value) && this.value.length != 0) {
		total += parseFloat(this.value);
	}
});

$("#total_quantity").val(total);

//additional totals
var total3 = 0;

$(".collectCount3").each(function() {
	if (!isNaN(this.value) && this.value.length != 0) {
		total += parseFloat(this.value);
	}
});

$("#total_quantity3").val(total3);

//Collection count
var total4 = 0;

$(".investCount").each(function() {
	if (!isNaN(this.value) && this.value.length != 0) {
		total4 += parseFloat(this.value);
	}
});

$("#total_invest").val(total4);



/*$("#toggleUpdate").live("click", function() {
$('.collectLinks').toggle();
if($("#toggleUpdate").val("Update Mode")){
	$("#toggleUpdate").val("Folder Mode");
}else{
$("#toggleUpdate").val("Update Mode");
}
});*/

$("#loaderGif").hide();

$("#typeChanger").change(function() {
   $("#loaderGif").show();
});
$(".switchSelect").change(function() {
   $("#waitComplete").show();
});

/*$('.element').each(function(){	
$(this).live("click", function() {
	//var title = $(this).attr("title");
	if ($(this).attr("src","img/placeholder.jpg")) {
        $(this).attr("src","img/blank.jpg");
    } else if ($(this).attr("src","img/blank.jpg")) {
		$(this).attr("src","img/placeholder.jpg");
    }

}); 
});*/

$("#reportNav").hide();
$("#reportsLink").mouseover(function() {
   $("#reportNav").show();
});
$("#reportNav").mouseout(function() {
   $(this).hide();
});

/*$("#reportsLink").mouseout(function() {
   $("#reportNav").hide();
});*/

//ROLLS
$('#expandViewDiv').hide();
$(".changeBtns, .changeOtherYearBtns, #addRollCoinsBtn, #addRollCoinsExpBtn, #collectionListBtn, #containerListBtn").attr('disabled', 'disabled');

$('.collections').change(function() {
    if ($('.collections:checked').length) {
        $('#addRollCoinsExpBtn').removeAttr('disabled');
    } else {
        $('#addRollCoinsExpBtn').attr('disabled', 'disabled');
    }
});
$("#newOpenCoinsTbl").dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 25
} );
$('#rollListTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 50
} );

$("#addRollCoinsForm").submit(function() {
      if($("#rollCoinID").val() == "")  {
		$("#rollCoinID").addClass("errorInput");
      return false;
      } else {
		$("#addRollCoinsBtn").prop('value', 'Updating Roll...');  
	  return true;
	  }
});

});


