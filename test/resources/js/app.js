
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
	
	$("select[name='players']").on("change", function(e) {
		let $val = $(this).find(":selected").val();
		for($i=1;$i<=$val;$i++) {
			$(".form-event").find("*[data-players="+$i+"]").show();
			$(".form-event").find("*[data-players="+$i+"]").attr("required", "required");
		}
		for($j=$i;$j<=6;$j++) {
			$(".form-event").find("*[data-players="+$j+"]").removeAttr("required");
			$(".form-event").find("*[data-players="+$j+"]").hide();			
		}
	});
});

