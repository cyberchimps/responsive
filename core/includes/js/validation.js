jQuery(document).ready(function($) {
$('#formfeedback').validate({
 
onfocusout: function(element) {
  this.element(element);
},
 
rules: {
  ccfeature: {
	required: true,	    
  }, 	
   
  ccemail: {
    required: true,
    email: true
  } 
  
},
 
messages: {
  ccemail: "Please enter a valid email address.",
  ccfeature: "Message box can't be empty!"
},
 
errorElement: "div",
errorPlacement: function(error, element) {
  element.before(error);
}
 
});
});
