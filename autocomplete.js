$(function() {
 
    $("#topic_title").autocomplete({
        source: "autocomplete.php",
        minLength: 2,
        select: function(event, ui) {
            var url = ui.item.id;
            if(url != '#') {
                location.href = '/blog/' + url;
            }
        },
 
        
 
     
       
    });
 
});