function statusChangeCallback(response) {
	if (response.status === 'connected') {
		getInfo();
		document.getElementById('logi').innerHTML = 'Logi välja';
		document.getElementById('logi2').innerHTML = 'Väljalogimine';
		document.getElementById('status').innerHTML = '';
		setButtons(false);
	} else if (response.status === 'not_authorized') {
		document.getElementById('status').innerHTML = 'Andmete nägemiseks pead olema Facebooki logitud.';		
	} else {
		document.getElementById('status').innerHTML = 'Palun logi Facebooki, et oma andmeid näha.';
		document.getElementById('logi').innerHTML = 'Logi sisse';
		document.getElementById('logi2').innerHTML = 'Sisselogimine';
		document.getElementById('mant').innerHTML = '';
        document.getElementById('teretulemast').innerHTML = 'Tere tulemast e-hääletuse lehele!';
        setButtons(true);
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
    	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("mant").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "getuser.php?id=" + response.id +
        		"&fname=" + response.first_name + "&lname=" + response.last_name, true);
        xmlhttp.send();
    });
}