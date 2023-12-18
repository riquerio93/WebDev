$(document).ready(function() {
	
const formatter = new Intl.NumberFormat('en-US', {
  style: 'currency',
  currency: 'USD',
  minimumFractionDigits: 2
});

$("#myForm").submit(function(e){
	e.preventDefault();
	
	var totalPrice =  $("#price").val();
	var discountRate = 0;
	var discountPrice = 0;
	var response = "";
	
	if(totalPrice < 0)
	{
		response = "total price cannot be below 0";
	}
	else if(totalPrice >= 0 && totalPrice <= 100)
	{
		response = "total price is: $" + totalPrice + ", you did not purchase enough to recieve a disocunt."
	}
	else if(totalPrice > 100 && totalPrice <= 250)
	{
		discountRate = 10;
		discountPrice = totalPrice*(discountRate/100);
		var formattedPrice = formatter.format(discountPrice);
		response = "total price is: $" + totalPrice + ", your discount rate is: " + discountRate + "%, which makes your discounted price: " + formattedPrice;
	}
	else if(totalPrice > 250 && totalPrice <= 500)
	{
		discountRate = 15;
		discountPrice = totalPrice*(discountRate/100);
		var formattedPrice = formatter.format(discountPrice);
		response = "total price is: $" + totalPrice + ", your discount rate is: " + discountRate + "%, which makes your discounted price: " + formattedPrice;
	}
	else if(totalPrice > 500)
	{
		discountRate = 22.5;
		discountPrice = totalPrice*(discountRate/100);
		var formattedPrice = formatter.format(discountPrice);
		response = "total price is: $" + totalPrice + ", your discount rate is: " + discountRate + "%, which makes your discounted price: " + formattedPrice;
	}
			
	$("#total").text(response);
});


}); //end ready

