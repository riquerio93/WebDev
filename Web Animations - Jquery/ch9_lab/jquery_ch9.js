$(document).ready(function() {

	$("#img_list a").each(function() {
  	//preload images
  		var preImg = new Image();
 		 preImg.src = $(this).attr("href");
	});

//using slideDown to show main section
	$("main").slideDown("slow").delay(1000);

//using animate to move the main section over to the right via its margin
	$("main").animate({
		marginLeft: "+=30%"
	});

//Just to fulfill the requirements of using fadeTo and slideUp. Fade away the img list and then slide it up to remove it.
	$("ul").fadeTo("slow", 0.5).delay(400).slideUp("slow");



//Uses hide/show
	$("#day").click(function(){

		$("img").hide("slow").delay(500);

 		$("img").show("slow");

 		remove_cycle_classes();

 		$("main").addClass("day");

 		var imgURL = $("#sun_item a").attr("href");
 		$("#image").attr("src", imgURL);
	});

//Uses fadeOut/fadeIn
	$("#night").click(function(){

		$("img").fadeOut("slow").delay(500);

		$("img").fadeIn("slow");

		remove_cycle_classes();

 		$("main").addClass("night");
 		$("h1").addClass("night");

		var imgURL = $("#moon_item a").attr("href");
 		$("#image").attr("src", imgURL);
		
	});

//Uses toggle
	$("#sunset").click(function(){

		remove_cycle_classes();

 		$("main").toggle("slow").addClass("sunset").delay(1000).toggle("slow");
 		$("h1").addClass("sunset");

		var imgURL = $("#sunset_item a").attr("href");
 		$("#image").attr("src", imgURL);
	});

//Uses fadeToggle/slideToggle
	$("#sunrise").click(function(){

		remove_cycle_classes();

 		$("main").fadeToggle("slow").addClass("sunrise").delay(1000).slideToggle("slow");

		var imgURL = $("#sunrise_item a").attr("href");
 		$("#image").attr("src", imgURL);

	});

	function remove_cycle_classes() {
		$("main").removeClass("day");
		$("main").removeClass("sunrise");
		$("main").removeClass("sunset");
		$("main").removeClass("night");
		$("h1").removeClass("sunset");
		$("h1").removeClass("night");
		
	}

}); //end ready