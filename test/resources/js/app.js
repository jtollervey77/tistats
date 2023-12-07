
$(function() {
	$('.tablesorter').tablesorter({theme : "bootstrap"});
	
	$(".cta").on("click",function(e) {
		
		e.preventDefault();
		
		if($(this).parent().find(".cta-content").hasClass("block")) {
			$(this).parent().find(".cta-content").removeClass("block");
		} else {
			$(this).parent().find(".cta-content").addClass("block");
		}
	});
});

