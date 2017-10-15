$(document).ready(function(){

$("#editRow").hide();


//Image 1
$("#coinPic1Lnk").click(function() {
  $("#editRow").toggle();
  });
$("#coinPic2Lnk").click(function() {
  $("#editRow").toggle();
  });
  $("#coinPic3Lnk").click(function() {
  $("#editRow").toggle();
  });
  $("#coinPic4Lnk").click(function() {
  $("#editRow").toggle();
  });
$("#coinPic1Frm").submit(function() {
      if ($("#coinPic1").val() == "") {
		$("#coinPic1").addClass("errorInput");
		$('#imgMsg1').text("Select Image").addClass("errorTxt");	
        return false;
      }else {
	 $('#coinPic1Btn').val("Uploading...");	  
	  return true;
	  }
});
//Image 2
$("#coinPic2Lnk").click(function() {
  $("#editTD2").toggle();
  });

$("#coinPic2Frm").submit(function() {
      if ($("#coinPic2").val() == "") {
		$("#coinPic2").addClass("errorInput");
		$('#imgMsg2').text("Select Image").addClass("errorTxt");	
        return false;
      }else {
	 $('#coinPic2Btn').val("Uploading...");	  
	  return true;
	  }
});
//Image 1
$("#coinPic3Lnk").click(function() {
  $("#editTD3").toggle();
  });

$("#coinPic3Frm").submit(function() {
      if ($("#coinPic3").val() == "") {
		$("#coinPic3").addClass("errorInput");
		$('#imgMsg3').text("Select Image").addClass("errorTxt");	
        return false;
      }else {
	 $('#coinPic3Btn').val("Uploading...");	  
	  return true;
	  }
});
//Image 4
$("#coinPic4Lnk").click(function() {
  $("#editTD4").toggle();
  });

$("#coinPic4Frm").submit(function() {
      if ($("#coinPic4").val() == "") {
		$("#coinPic4").addClass("errorInput");
		$('#imgMsg4').text("Select Image").addClass("errorTxt");	
        return false;
      }else {
	 $('#coinPic4Btn').val("Uploading...");	  
	  return true;
	  }
});

});
