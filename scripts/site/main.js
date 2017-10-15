// JavaScript Document

$(document).ready(function(){	
/*
General
*/

/*Scroll*/
function scrollToAnchor(aid){
    var aTag = $("a[name='"+ aid +"']");
    $('html,body').animate({scrollTop: aTag.offset().top},'slow');
}

$(".topLink").click(function() {
   scrollToAnchor('top');
});

/*
Responsive page height resize
*/
$(window).resize(function () { 
    $('body').css('padding-top', parseInt($('#main-navbar').css("height"))+10);
});

$(window).load(function () { 
    $('body').css('padding-top', parseInt($('#main-navbar').css("height"))+10);        
});

/*
Tabs
*/
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})

/*
Sorting Tables
*/
$('#tableSort, .tableSort').dataTable( {
	"sDom": "<'row'<'col-xs-6'T><'col-xs-6'f>r>t<'row'<'col-xs-6'i><'col-xs-6'p>>",
	"aaSorting": [[ 1, "desc" ]],
	"iDisplayLength": 25
});
/*
Validation
*/

var email = $("#email");
 var password = $("#password");
$('#loginForm').validate({
    rules: {
        email: {
            required: true
        },       
		 password: {
            required: true
        },
    },
	errorPlacement: function(error, element) {
        error.hide(); 
    }, 
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    }
}); 



var search = $("#search");
 
$('#searchForm').validate({
    rules: {
        search: {
            required: true
        }
    },
	errorPlacement: function(error, element) {
        error.hide(); 
    }, 
    highlight: function(element) {
        $(element).closest('.input-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.input-group').removeClass('has-error');
    }
}); 


/*Save buttons*/
$(".save").click(function(){
      $(this).text('Saving......');  
});

});