function statusChangeCallback(response) {
	if (response.status === 'connected') {
		getInfo();
		document.getElementById('logi').innerHTML = 'Logi välja';
		document.getElementById('logi2').innerHTML = 'Väljalogimine';
		document.getElementById('status').innerHTML = '';
		document.getElementById('hääletus').innerHTML = '';
	} else if (response.status === 'not_authorized') {
		document.getElementById('status').innerHTML = 'Andmete nägemiseks pead olema Facebooki logitud.';		
	} else {
		document.getElementById('status').innerHTML = 'Palun logi Facebooki, et oma andmeid näha.';
		document.getElementById('logi').innerHTML = 'Logi sisse';
		document.getElementById('logi2').innerHTML = 'Sisselogimine';
		document.getElementById('mant').innerHTML = '';
        document.getElementById('teretulemast').innerHTML = 'Tere tulemast e-hääletuse lehele!';
        document.getElementById('hääletus').innerHTML = 'Hääletamiseks pead olema sisselogitud.';
	}
}

function setButtons(kasDisabled) {
	var buttons = document.getElementsByClassName('votebtn');
	for (i = 0; i<buttons.length; i++) {
		buttons[i].disabled = kasDisabled;
	}
}

function checkLoginState() {
	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
}

function getInfo() {
    FB.api('/me', function(response) {
    	console.log(JSON.stringify(response));
    	document.getElementById('teretulemast').innerHTML = 'Tere tulemast, ' + response.first_name + '!';
    	sessionStorage.id = response.id
    	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("mant").innerHTML = xmlhttp.responseText;
                var xmlhttp2 = new XMLHttpRequest();
                xmlhttp2.onreadystatechange = function() {
                    if (xmlhttp2.readyState == 4 && xmlhttp2.status == 200) {
                    	if (xmlhttp2.responseText == '1') {
                    		getVoteData();
                    		setButtons(true);
        				} else {
        					document.getElementById("hääletus").innerHTML = 'Sa pole veel hääletanud.';
        					setButtons(false);
        				}
                    }
                }
                xmlhttp2.open("GET", "checkvote.php", true);
                xmlhttp2.send();
            }
        }
        xmlhttp.open("GET", "getuser.php?id=" + response.id +
        		"&fname=" + response.first_name + "&lname=" + response.last_name, true);
        xmlhttp.send();
        
    });
}