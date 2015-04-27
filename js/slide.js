$("#kandidaadidTabel").on("click", ".clickable", function() {
	var id = this.children[0].textContent;
	var name = this.children[1].textContent;
	document.getElementById('votebtn').addEventListener("click", function() {
	    postVote(id);
	}, false);
	//console.log(this.children[0].textContent);
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        	$("#info").slideToggle(100, function() {
        		document.getElementById("infotekst").innerHTML = xmlhttp.responseText;
        		document.getElementById('votebtn').className = '';
        		$("#info").slideToggle(100, function() {
        		    // Animation complete.
        		  });
        	  });
        	
			
        }
    }
    xmlhttp.open("POST", "getkandidaat.php?id=" + id, true);
    xmlhttp.send();
	
});