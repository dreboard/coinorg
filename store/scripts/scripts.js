// JavaScript Document

$(document).ready(function(){
	
$(".wysiwyg").htmlarea();
$(".showDate").datepicker();
$("#searchForm").submit(function() {
      if ($("#search").val() == "") {
		$("#search").addClass("errorInput");
        return false;
      }else {
	  return true;
	  }
});

//LOGIN FORM
$("#loginForm :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
	}).blur(function() {
	  $("label").removeClass("labelfocus");
  });

$("#loginForm").submit(function() {
      if ($("#email").val() == "") {
		$("#email").addClass("errorInput");
		$("label[for='" + this.id + "']").addClass("errorTxt");
        $("#formErrors").text("Need email address...");
        return false;
      }else if ($("#password").val() == "") {
		$("#password").addClass("errorInput");  
		$("label[for='" + this.id + "']").addClass("errorTxt");
        $("#formErrors").text("Need password...");
        return false;
      }else {
	 $("#loginHdr").text("Logging In..."); 
	  return true;
	  }
});

$("#loginForm :input").focus(function() {
  $(this).removeClass("errorInput");
  $("label[for='" + this.id + "']").removeClass("errorTxt");
  $("#formErrors").text("");
  });
  
  
//NEW PRODUCT FORM
$("#productForm").submit(function() {
  if ($("#product_name").val() == "") {
	$("#product_name").addClass("errorInput");
	$("#errorDisplay").text("Add Product Name...").addClass("errorTxt");
	return false;
  }else if ($("#price").val() == "") {
	$("#price").addClass("errorInput");
	$("#errorDisplay").text("Add Price").addClass("errorTxt");
	return false;
  }else if ($("#purchasePrice").val() == "") {
	$("#purchasePrice").addClass("errorInput");
	$("#errorDisplay").text("Add Value").addClass("errorTxt");
	return false;
  }else if ($("#category").val() == "") {
	$("#category").addClass("errorInput");
	$("#errorDisplay").text("Select Category").addClass("errorTxt");
	return false;
  }else if ($("#details").val() == "") {
	$("#details").addClass("errorInput");
	$("#errorDisplay").text("Add Details").addClass("errorTxt");
	return false;
  }else {
 $('#productFormBtn').val("Adding Product.....");	  
  return true;
  }
});

$("#mailForm").submit(function() {
      if($("#mailForm input:radio:checked").length < 1) {
		$("#errorDisplay").text("Please Make A Selection");
		return false;
	}else if ($("#name").val() == "") {
        $("#errorDisplay").text("Please enter your name...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#name").addClass("errorInput");
        return false;
      }else if ($("#email").val() == "") {
        $("#errorDisplay").text("Please enter your email...");
		$("label[for='" + this.id + "']").addClass("errorTxt");
		$("#email").addClass("errorInput");
        return false;
      } else if ($("#message").val() == "") {
        $("#errorDisplay").text("Please enter a message..");
		$("#message").addClass("errorInput");
        return false;
      }  else if ($("#captchaImg").val() == "") {
        $("#errorDisplay").text("Please enter text from image..");
		$("#captchaImg").addClass("errorInput");
        return false;
      } else {
	  return true;
	  }
});	

$("form :input").focus(function() {
  $(this).removeClass("errorInput");
  $("label[for='" + this.id + "']").removeClass("errorTxt");
  $("#errorDisplay").text("");
  });

$('.sortTbl').dataTable( {
	"aaSorting": [[ 1, "desc" ]],
	"iDisplayLength": 25
} );

$('.sortShortTbl').dataTable( {
	"aaSorting": [[ 0, "desc" ]],
	"iDisplayLength": 10
} );


});

function addCart(){
	document.addCartForm.submit();
}

function checkSize(max_img_size)
{
    var input = document.getElementById("file");
    // check for browser support (may need to be modified)
    if(input.files && input.files.length == 1)
    {           
        if (input.files[0].size > max_img_size) 
        {
            alert("The file must be less than " + (max_img_size/1024/1024) + "MB");
            return false;
        }
    }

    return true;
}