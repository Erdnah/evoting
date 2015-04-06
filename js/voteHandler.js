function getId (element) {
	var id = element.parentNode.parentNode.cells[0].textContent;
	
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            setButtons(true);
            updateKandidaadid();
            updatePartei();
            document.getElementById("hääletus").innerHTML = 'Sa oled juba hääletanud.';
        }
    }
    xmlhttp.open("GET", "postvote.php?id=" + id +
    		"&fbid=" + sessionStorage.id, true);
    xmlhttp.send();
}