$(document).ready(function(){	

//$('.theTime').ptTimeSelect();

$("#eventTitle").keypress(function(){
	  $("#msgDiv").removeClass("alert alert-danger").addClass("alert alert-success").text('Thank You');
});

$( "#eventStartDate" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 2,
      onClose: function( selectedDate ) {
        $( "#eventEndDate" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#eventEndDate" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 2,
      onClose: function( selectedDate ) {
        $( "#eventStartDate" ).datepicker( "option", "maxDate", selectedDate );
      }
    });

   $('#eventStartTime').timepicker({
       showLeadingZero: false,
       onSelect: tpStartSelect,
       maxTime: {
           hour: 23, minute: 00
       }
   });
   $('#eventEndTime').timepicker({
       showLeadingZero: false,
       onSelect: tpEndSelect,
       minTime: {
           hour: 23, minute: 00
       }
   });




var eventTitle = $("#eventTitle");
 
$('#eventForm').validate({
    rules: {
        eventTitle: {
            required: true
        }
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

        tinymce.init({
		selector:'textarea',
	    plugins: "print searchreplace",
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
					autosave_ask_before_unload: false,
					max_height: 400,
					min_height: 260,
					height : 280
		});
		

// when start time change, update minimum for end timepicker
function tpStartSelect( time, endTimePickerInst ) {
   $('#eventEndTime').timepicker('option', {
       minTime: {
           hour: endTimePickerInst.hours,
           minute: endTimePickerInst.minutes
       }
   });
}

// when end time change, update maximum for start timepicker
function tpEndSelect( time, startTimePickerInst ) {
   $('#eventStartTime').timepicker('option', {
       maxTime: {
           hour: startTimePickerInst.hours,
           minute: startTimePickerInst.minutes
       }
   });
}