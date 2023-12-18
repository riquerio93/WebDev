$(document).ready(function() {

// section 3 uses submit(handler)
$("#purchaseForm").submit(function(e) {
	var regEmail = /[a-z0-9]+@[a-z]+\.[edu]{3}$/;
	var regEmpty = /^ *$/;
	var regMinLength = /[a-zA-Z]{3}/;
	var regMaxLength = /^[a-zA-Z]{3,10}$/;
	
	// section 2 uses val()
	// section 2 uses trim()
	var valEmail = $("input#email").val();
	var valEmpty = $("input#phone").val();
	var valMinLength = $("input#fName").val().trim();
	var valMaxLength = $("input#lName").val().trim();
	
	/* section 4 uses test() method on object. 
	Validates using regular expression
	Validates Emptyness
	Validates Max and Min lengths */
	var testEmail = regEmail.test(valEmail);
	var testEmpty = regEmpty.test(valEmpty);
	var testMinLength = regMinLength.test(valMinLength);
	var testMaxLength = regMaxLength.test(valMaxLength);
	
	$("p#resultEmail").append("Email Validation: (Follows format of: string@string.edu): <b>" + testEmail + "</b>");
	$("p#resultPhone").append("<br><br>Phone Validation: (Is phone number field empty?): <b>" + testEmpty + "</b>");
	$("p#resultFName").append("<br><br>First Name Validation: (Does First Name have at minimum 3 characters?): <b>" + testMinLength + "</b>");
	$("p#resultLName").append("<br><br>Last Name Validation: (Does Last Name have at minimum 3 characters AND maximum 10 characters?): <b>" + testMaxLength + "</b>");
	
	if(testEmpty == true) {
		// section 2 uses val(value)
		$("input#phone").val("850-123-1234");
		$("p#resultPhone").append("<br>Inputted Demo Number.");
	}

    $("#submitButton").toggle();
	$("#refreshButton").toggle();
	return false;
}); 

/*With the above test methods, I am wanting to validate 4 of the required fields for specific inputs.
For email, I am verifying it's a valid email address, and validating whether or not it ends with "edu" which is formally associated with school emails.
For phone number, I am simply validating that the field is not empty, nor contains only whitespace.
For first name, I am validating that the field has at least 3 characters and are letters of the alphabet. No special characters nor number.
For last name, I am validating that the field has at least 3 characters, but no more than 10 characters; along with making sure there's only letters of alphabet. */

$("#refreshButton").click(function() {
	location.reload();
});



}); //end ready

