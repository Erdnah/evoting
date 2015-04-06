update();

function update() {
	updateKandidaadid();
	updatePartei();
}

function updateKandidaadid() {
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("kvotes").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "getvotes.php", true);
    xmlhttp.send();
}
function updatePartei() {
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("parteivotes").innerHTML = xmlhttp.responseText;
        }
    }
    xmlhttp.open("GET", "getparteivotes.php", true);
    xmlhttp.send();
}