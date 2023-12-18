$(document).ready(function() {
	
$("#tabs").tabs();
$( "#fitness-accordion" ).accordion();
$( "#scuba-accordion" ).accordion({
	active: false,
	autoHeight: false,
	heightStyle: "content"
});
$( "#game-accordion" ).accordion({
	active: false,
	autoHeight: false,
	heightStyle: "content"
});
$( "#content-accordion" ).accordion({
	active: false,
	autoHeight: false,
	heightStyle: "content"
});

var scrolledSubscribe = false;
var scrolledHobbies = false;
var scrolledContact = false;
	
//When user scrolls to an element, and said element is viewable/in view, do something. 
//neat little trick thanks to stack-overflow. 
$(window).scroll(function() {
   var hT = $("#subscribe").offset().top,
       hH = $("#subscribe").outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
    console.log((hT-wH) , wS);
//if subscribe div is in view, animate: move contents to center.
   if (wS > (hT+hH-wH) && !scrolledSubscribe){
	scrolledSubscribe = true;
    $("#subscribe").animate({
		marginRight: "+=35%"
	});
   }
});

$(window).scroll(function() {
   var hT = $("#contact").offset().top,
       hH = $("#contact").outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
    console.log((hT-wH) , wS);
   if (wS > (hT+hH-wH) && !scrolledContact){
	scrolledContact = true;
    $("#contact").animate({
		marginLeft: "+=35%"
	});
   }
});

$(window).scroll(function() {
   var hT = $("#tabs ul").offset().top,
       hH = $("#tabs ul").outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
    console.log((hT-wH) , wS);
   if (wS > (hT+hH-wH) && !scrolledHobbies){
	scrolledHobbies = true;
    $("#tabs").animate({
		marginLeft: "+=30%"
	});
   }
});


$("#resume").animate({
		marginLeft: "+=30%"
});

$(".appt-date").datepicker({
	minDate: 0
});
	
jQuery.validator.addMethod("phonePattern", function(value, element) {
    return this.optional(element) || /^[0-9]{3}-[0-9]{3}-[0-9]{4}$/.test(value) || /^[0-9]{3}[0-9]{3}[0-9]{4}$/.test(value);
}, "Please input a valid phone number");

jQuery.validator.addMethod("addressPattern", function(value, element) {
    return this.optional(element) || /^[a-zA-Z0-9 ]*;[a-zA-Z]{2};[0-9]{5}$/.test(value);
}, "Please input a valid mailing address. example: 123 bay lane;FL;32404");

jQuery.validator.addMethod("isLetters", function(value, element) {
    return this.optional(element) || /^[a-zA-Z]*$/.test(value);
}, "Names should only contain letters.");

$("#appointment").validate({
				submitHandler: function(form){
					window.open("ROrozcoProject1BookConfirm.html");
				},
				rules: {
					fName: {required: true, minlength: 3, isLetters: true},
					lName: {required: true, maxlength: 10, isLetters: true},
					email: {required: true, email: true},
					date: {required: true, date: true}
				},
				messages: {
					fName: {required: "Name Needed", minlength: "Name Must be At least 3 Characters"},
					lName: {required: "Last Name Needed", maxlength: "Last Name Must be less than 10 Characters"},
					email: {required: "Email Needed"},
					date:  {required: "Select an appt date"}
				},
				highlight: function (e) 
				{}
});

$("#newsletter").validate({
				submitHandler: function(form){
					window.open("ROrozcoProject1Subscribed.html");
				},
				rules: {
					fName: {required: true, minlength: 3, isLetters: true},
					lName: {required: true, maxlength: 10, isLetters: true},
					email: {required: true, email: true},
					phone: {required: true, phonePattern: true},
					address: {required: true, addressPattern: true}
				},
				messages: {
					fName: {required: "Name Needed", minlength: "Name Must be At least 3 Characters"},
					lName: {required: "Last Name Needed", maxlength: "Last Name Must be less than 10 Characters"},
					email: {required: "Email Needed"},
					phone: {required: "phone needed"},
					address: {required: "address needed"}
				},
				highlight: function (e) 
				{}
});

}); //end ready