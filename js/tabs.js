$(document).ready(function(){
    $("ul#tabs li").click(function(e){
        if (!$(this).hasClass("active")) {
            var tabNum = $(this).index();
            var nthChild = tabNum+1;
            
            $("ul#tabs li.active").removeClass("active");
            $(this).addClass("active");
            $("ul#tab li.active").fadeOut(100, function() {
            	$("ul#tab li.active").removeClass("active");
                $("ul#tab li:nth-child("+nthChild+")").fadeIn(100);
                $("ul#tab li:nth-child("+nthChild+")").addClass("active");
			});
            
        }
    });
});