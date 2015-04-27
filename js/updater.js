update();

function update() {
	updateKandidaadid();
	updatePartei();
}

function getVoteData() {
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        	if (xmlhttp.responseText == '0') {
        		document.getElementById("hääletus").innerHTML = 'Sa pole veel hääletanud';       		
        		setButtons(false);
			} else {
				document.getElementById("hääletus").innerHTML = xmlhttp.responseText;
				setButtons(true);
			}            
        }
    }
    xmlhttp.open("GET", "getuservote.php", true);
    xmlhttp.send();
}
function delVote() {
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        	getVoteData();
            alert('Hääl kustutatud!');
        }
    }
    xmlhttp.open("POST", "delvote.php", true);
    xmlhttp.send();
}
function delKandidaat() {
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        	getVoteData();
            alert('Sa pole enam kandideerimas!');
        }
    }
    xmlhttp.open("POST", "delkandidaat.php", true);
    xmlhttp.send();
}
function setButtons(kasDisabled) {
	var button = document.getElementById('votebtn');
		button.disabled = kasDisabled;
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