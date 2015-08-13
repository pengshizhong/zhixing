var slidesFlag = false;

$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    animationLoop: true,
	directionNav: false,
  });
  if (!slidesFlag) {
  	$('.slides').css("height",$('.logo').height()+"px");
  }; 
});

//set '.slides' height
$(document).ready(function(){
	$('.logo').load(function(){
		slidesFlag =true;
		$('.slides').css("height",$('.logo').height()+"px");
});
})

$(window).resize(function() {
  
  $('.slides').css("height",$('.logo').height()+"px");
});