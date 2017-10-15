// JavaScript Document
jQuery(document).ready(function($) {
  $('a[rel*=facebox]').facebox()
 $("a.btn-slide").click(function(){
		$("#panel").slideToggle("slow");
		$("#n").toggleClass("less");
		$("#b").toggleClass("less");return false;
		
	});
})
function show_sel(id){
$('#'+id).toggle();	
}

<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
