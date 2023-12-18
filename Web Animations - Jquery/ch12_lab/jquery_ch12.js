$(document).ready(function() {0

const formatter = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'USD',
  minimumFractionDigits: 2
});

var halloween = new Date("2022/10/31");
var today = new Date();

var year = today.getFullYear();
var month = today.getMonth();
var day = today.getDay();
var hours = today.getHours();
var minutes = today.getMinutes();
var seconds = today.getSeconds();


var timeLeft = halloween.getTime() - today.getTime();
var daysLeft = Math.ceil(timeLeft / (1000*60*60*24));
var random = Math.floor((Math.random()*998)+7);

$("#today").text("Today's date is: " + month + "/" + day + "/" + year + " " + hours + ":" + minutes + ":" + seconds);
$("#daysLeft").text("There are " + daysLeft + " days left until Halloween!");
$("#random").text("Here's a random number between 7 and 998: " + random);

$("#myForm").submit(function(e){
	e.preventDefault();
	
	var firstName = $("#fName").val();
	var lastName = $("#lName").val();
	var gpa = $("#gpa").val();
	var currency = formatter.format(gpa) ;
	var fInitial = firstName[0];
			
	$("#displayedName").text("Hello " + firstName.toLowerCase().trim() + ", your login info is: " + fInitial + lastName);
	$("#chars").text("There are " + firstName.trim().length + " characters in your name.");
	$("#curr").text("Your currency is: " + currency);
});


}); //end ready

