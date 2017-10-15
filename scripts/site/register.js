// JavaScript Document
$(document).ready(function(){	
$("#registerAccountBtn").hide();

$("#termsBtn").click(function(){
	if($(this).is(":checked") ) {
            $("#registerAccountBtn").show();
        }
});



/*Validate*/
var email = $("#email");
var password = $("#password");
 
 
 
$('#memberRegForm').validate({
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








});