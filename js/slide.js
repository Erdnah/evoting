$(".clickable").click(function() {
	var id = this.children[0].textContent;
	if (document.getElementById('hidden') != null) {
		document.getElementById('hidden').id = '';
	}
	document.getElementsByClassName('votebtn')[0].addEventListener("click", function() {
	    postVote(id);
	}, false);
	//console.log(this.children[0].textContent);	
	$("#info").slideToggle(100, function() {
		document.getElementById('infotekst').innerHTML = 'Siia peaks tulema ' + 
		this.children[1].textContent + ' info varsti.\n';
		$("#info").slideToggle(100, function() {
		    // Animation complete.
		  });
	  });
});