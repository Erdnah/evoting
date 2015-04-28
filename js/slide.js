var id = -1;
var s =  function() {
    postVote(id);	    
};

$("#kandidaadidTabel").on("click", ".clickable", function() {
	var btn = document.getElementById('votebtn');
	btn.removeEventListener("click", s, false);
	id = this.children[0].textContent;
	//var name = this.children[1].textContent;
	s =  function() {
	    postVote(id);	    
	};	
	btn.addEventListener("click", s, false);
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        	$("#info").slideToggle(100, function() {
        		document.getElementById("infotekst").innerHTML = xmlhttp.responseText;
        		document.getElementById('votebtn').className = '';
        		
        		$("#info").slideToggle(100, function() {
        		  });
        	  });
        	
			
        }
    }
    xmlhttp.open("GET", "getkandidaat.php?id=" + id, true);
    xmlhttp.send();
	
});