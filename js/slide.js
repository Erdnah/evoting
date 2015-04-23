$(".clickable").click(function() {
	var id = this.children[0].textContent;
	var name = this.children[1].textContent;
	document.getElementById('votebtn').addEventListener("click", function() {
	    postVote(id);
	}, false);
	//console.log(this.children[0].textContent);
	
	$("#info").slideToggle(100, function() {
		document.getElementById('infotekst').innerHTML = 'Siia peaks tulema ' + 
		name + ' info varsti.\n';
		document.getElementById('votebtn').className = '';
		$("#info").slideToggle(100, function() {
		    // Animation complete.
		  });
	  });
});