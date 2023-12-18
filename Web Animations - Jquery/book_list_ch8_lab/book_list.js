$(document).ready(function(){

/**************
 jquery for WEB heading
***************/
$("#web a").each(function() {
  //preload images for web section
  var preImg = new Image();
  preImg.src = $(this).attr("href");
});

$("#web h2").on("click", function() {
	//toggle and add/remove classes
	if($("#web .minus")[0]) {
	$("#web h2").removeClass("minus");
	}
	else {
		$("#web h2").addClass("minus");
	}
	$("#image").attr("src", "");
	$("#web div").toggle("slow");
});

$("#web a").on("click", function(e) {
	//cancel default image links
  e.preventDefault();

  //set image 
  var imgURL = $(this).attr("href");
  $("#image").attr("src", imgURL);
});
//end web heading jquery

/**************
 jquery for JAVA heading
***************/
$("#java a").each(function() {
  //preload images for java section
  var preImg = new Image();
  preImg.src = $(this).attr("href");
});

$("#java h2").on("click", function() {
	//toggle and add/remove classes
	if($("#java .minus")[0]) {
	$("#java h2").removeClass("minus");
	}
	else {
		$("#java h2").addClass("minus");
	}
	$("#image").attr("src", "");
	$("#java div").toggle("slow");
});

$("#java a").on("click", function(e) {
	//cancel default image links
  e.preventDefault();

  //set image 
  var imgURL = $(this).attr("href");
  $("#image").attr("src", imgURL);
});
//end java heading jquery

/**************
 jquery for .NET heading
***************/
$("#net a").each(function() {
  //preload images for .net section
  var preImg = new Image();
  preImg.src = $(this).attr("href");
});

$("#net h2").on("click", function() {
	//toggle and add/remove classes
	if($("#net .minus")[0]) {
	$("#net h2").removeClass("minus");
	}
	else {
		$("#net h2").addClass("minus");
	}
	$("#image").attr("src", "");
	$("#net div").toggle("slow");
});

$("#net a").on("click", function(e) {
	//cancel default image links
  e.preventDefault();

  //set image 
  var imgURL = $(this).attr("href");
  $("#image").attr("src", imgURL);
});
//end net heading jquery
 
}); //end ready

