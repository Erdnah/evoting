function postVote (id) {
	//var id = element.parentNode.parentNode.cells[0].textContent;
	
	var xmlhttp = new XMLHttpRequest();
	console.log('hääletan ' + id)
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            setButtons(true);
            updateKandidaadid();
            updatePartei();
            getVoteData();
            alert('Su hääl läks arvesse!');
            
        }
    }
    xmlhttp.open("POST", "postvote.php?id=" + id, true);
    xmlhttp.send();
}