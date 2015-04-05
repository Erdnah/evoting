function getId (element) {
	var id = element.parentNode.parentNode.cells[0].textContent;
	
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            setButtons(false);
        }
    }
    xmlhttp.open("GET", "postvote.php?id=" + id, true);
    xmlhttp.send();
}