<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Auction Builder</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css" type="text/css" />
<script type="text/javascript" src="http://www.formstuff.host22.com/scripts/jquery.form.js"></script>
<script type="text/javascript" src="scripts/jHtmlArea-0.7.0.js"></script>
<link rel="stylesheet" type="text/css" href="scripts/jHtmlArea.Editor.css"/>
<style type="text/css"> 
body {padding:10px; margin:0px; font-size:100%; font-family:Arial, Helvetica, sans-serif;}
form {width:780px;}
.wideLable label{ float: left; width: 130px; font-weight: bold;}
.wideLable input, {width: 200px; margin-bottom: 5px;}
.wideLable select {width: 200px; margin-bottom: 5px;}
#headList1 {background-color:#000; color:#fff;}
.labelfocus {color:#666;}
#mailErrors {color:#900; font-weight:bold;}
.mailHint {border:solid 1px #900;}
.wysiwyg{width:670px;  height:250px;}
</style> 
<script type="text/javascript">
$(document).ready(function(){
$("form :input").focus(function() {
  $("label[for='" + this.id + "']").addClass("labelfocus");
}).blur(function() {
  $("label").removeClass("labelfocus");
});

$("#eventForm").submit(function() {
      if ($("#first").val() == "") {
		$("#first").addClass("mailHint");
        $(".eventMsg").text("Need event name...").show();
        return false;
      }else if ($("#eventDescription").val() == "") {
		$("#eventDescription").addClass("mailHint");  
        $(".eventMsg").text("Need description...").show();
        return false;
      }else {
	 $('#eventBtn').val("Sending.....");	  
	  return true;
	  }
    });
	
	$(".wysiwyg").htmlarea();
$(".wysiwyg").htmlarea({
	// Override/Specify the Toolbar buttons to show
	toolbar: [
		["bold", "italic", "underline", "|", "forecolor"],
		["p", "h1", "h2", "h3", "h4", "h5", "h6"],
		["link", "unlink", "|", "image"],                    
		[{
			// This is how to add a completely custom Toolbar Button
			css: "custom_disk_button",
			text: "Save",
			action: function(btn) {
				// 'this' = jHtmlArea object
				// 'btn' = jQuery object that represents the <A> "anchor" tag for the Toolbar Button
				alert('SAVE!\n\n' + this.toHtmlString());
			}
		}]
	],

	// Override any of the toolbarText values - these are the Alt Text / Tooltips shown
	// when the user hovers the mouse over the Toolbar Buttons
	// Here are a couple translated to German, thanks to Google Translate.
	toolbarText: $.extend({}, jHtmlArea.defaultOptions.toolbarText, {
			"bold": "fett",
			"italic": "kursiv",
			"underline": "unterstreichen"
		}),

	// Specify a specific CSS file to use for the Editor
	css: "scripts//jHtmlArea.Editor.css",

	// Do something once the editor has finished loading
	loaded: function() {
		//// 'this' is equal to the jHtmlArea object
		//alert("jHtmlArea has loaded!");
		//this.showHTMLView(); // show the HTML view once the editor has finished loading
	}
});
});
</script>
</head>

<body>
<h1>Auction Builder</h1>
<form id="eventForm" name="eventForm" action="" method="post">
<fieldset id="one" class="wideLable"><legend>Fieldset</legend>
<label for="first">Title:</label><input name="first" id="first" type="text" value="" /><br />
<label for="last">Last:</label><input name="last" id="last" type="text" value="" /><br />
</fieldset>
<br />
<fieldset id="two" class="wideLable"><legend>Fieldset</legend>
<label for="email">E-Mail:</label><input name="email" id="email" type="text" value="" /><br />
<label for="website">Website:</label><input name="website" id="website" type="text" value="" /><br />
</fieldset>
<br />
<fieldset><legend>Fieldset</legend>
<table width="306" class="radioTable">
  <tr>
    <td width="79"><label>
      <input type="radio" name="RadioGroup" value="1" id="RadioGroup_0" />
      Radio</label></td>
    <td width="169">&nbsp;</td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="RadioGroup" value="2" id="RadioGroup_1" />
      Radio</label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><label>
      <input type="radio" name="RadioGroup" value="3" id="RadioGroup_2" />
      Radio</label></td>
    <td>&nbsp;</td>
  </tr>
</table>
</fieldset>
<br />
<fieldset id="three">
<legend>Fieldset</legend>
<label for="message">Message:</label><br />
<div>
<textarea id="eventDescription" name="eventDescription" class="wysiwyg" cols="50" rows="15">

</textarea> 
</div>
</fieldset>
 <br/> 
 <fieldset id="three" class="wideLable">
<label>&nbsp;</label>
<input name="eventBtn" id="eventBtn" type="submit" value="Submit" />
<input name="previewBtn" id="previewBtn" type="button" value="Preview" />
</fieldset>
</form>



</body>
</html>