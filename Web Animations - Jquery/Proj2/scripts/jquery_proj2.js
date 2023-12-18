$(document).ready(function() {
	
//UI widet functions
$("#menu").menu();
$("#tabs").tabs();

//update layout for the panels
$("#trimPanel1").trigger( "updatelayout" );
$("#trimPanel2").trigger( "updatelayout" );
$("#trimPanel3").trigger( "updatelayout" );
$("#trimPanel4").trigger( "updatelayout" );

$("#partPanel1").trigger( "updatelayout" );
$("#partPanel2").trigger( "updatelayout" );
$("#partPanel3").trigger( "updatelayout" );
$("#partPanel4").trigger( "updatelayout" );

$("#chevyPanel1").trigger( "updatelayout" );
$("#chevyPanel2").trigger( "updatelayout" );
$("#chevyPanel3").trigger( "updatelayout" );
$("#chevyPanel4").trigger( "updatelayout" );

//Accordion functions
$( "#interior-accordion" ).accordion();
$( "#trim-accordion" ).accordion({
	active: false,
	autoHeight: false,
	heightStyle: "content"
});
$( "#rentals-accordion" ).accordion({
	active: false,
	autoHeight: false,
	heightStyle: "content"
});



//scroll animation funcitons
var scrolledReserve = false;
var scrolledProducts = false;
var scrolledContact = false;
var scrolledMap = false;
var scrolledSatisfied = false;
var scrolledSort = false;
var scrolledBuy = false;

$(window).scroll(function() {
   var hT = $("#map").offset().top,
       hH = $("#map").outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
    console.log((hT-wH) , wS);

   if (wS > (hT+hH-wH) && !scrolledMap){
	scrolledMap = true;
    $("#map").animate({
		marginRight: "+=45%"
	});
   }
});

$(window).scroll(function() {
   var hT = $("#reserve").offset().top,
       hH = $("#reserve").outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
    console.log((hT-wH) , wS);

   if (wS > (hT+hH-wH) && !scrolledReserve){
	scrolledReserve = true;
    $("#reserve").animate({
		marginRight: "+=45%"
	});
   }
});

$(window).scroll(function() {
   var hT = $("#purchase").offset().top,
       hH = $("#purchase").outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
    console.log((hT-wH) , wS);

   if (wS > (hT+hH-wH) && !scrolledBuy){
	scrolledBuy = true;
    $("#purchase").animate({
		marginLeft: "+=45%"
	});
   }
});

$(window).scroll(function() {
   var hT = $("#satisfaction").offset().top,
       hH = $("#satisfaction").outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
    console.log((hT-wH) , wS);
   if (wS > (hT+hH-wH) && !scrolledSatisfied){
	scrolledSatisfied = true;
    $("#satisfaction").animate({
		marginLeft: "+=35%"
	});
   }
});

$(window).scroll(function() {
   var hT = $("#sortable").offset().top,
       hH = $("#sortable").outerHeight(),
       wH = $(window).height(),
       wS = $(this).scrollTop();
    console.log((hT-wH) , wS);
   if (wS > (hT+hH-wH) && !scrolledSort){
	scrolledSort = true;
    $("#sortable").animate({
		marginLeft: "+=35%"
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
   if (wS > (hT+hH-wH) && !scrolledProducts){
	scrolledProducts = true;
    $("#tabs").animate({
		marginLeft: "+=30%"
	});
   }
});


$("#background").animate({
		marginLeft: "+=30%"
});
//end scroll functions


//date function
$(".appt-date").datepicker({
	minDate: 0
});
 
	
//validation functions
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
					window.open("ROrozcoProject2EmailConfirm.html");
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

$("#purchase").validate({
				submitHandler: function(form){
					window.open("ROrozcoProject2Receipt.html");
				},
				rules: {
					fName: {required: true, minlength: 3, isLetters: true},
					lName: {required: true, maxlength: 10, isLetters: true},
					email: {required: true, email: true},
					phone: {required: true, phonePattern: true},

				},
				messages: {
					fName: {required: "Name Needed", minlength: "Name Must be At least 3 Characters"},
					lName: {required: "Last Name Needed", maxlength: "Last Name Must be less than 10 Characters"},
					email: {required: "Email Needed"},
					phone: {required: "phone needed"},

				},
				highlight: function (e) 
				{}
});

}); //end ready