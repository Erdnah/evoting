function statusChangeCallback(response) {
	if (response.status === 'connected') {
		getInfo();
		document.getElementById('logi').innerHTML = 'Logi välja';
		document.getElementById('logi2').innerHTML = 'Väljalogimine';
		document.getElementById('status').innerHTML = '';
		document.getElementById('hääletus').innerHTML = '';
		document.getElementById('logbtn').style.display = 'none';
		document.getElementById('logbtn2').style.display = 'none';
	} else if (response.status === 'not_authorized') {
		document.getElementById('status').innerHTML = 'Kandideerimiseks pead olema Facebooki logitud.';
		
		setButtons(true);
	} else {
		document.getElementById('status').innerHTML = 'Palun logi Facebooki, et oma andmeid näha.';
		document.getElementById('logi').innerHTML = 'Logi sisse';
		document.getElementById('logi2').innerHTML = 'Sisselogimine';
		document.getElementById('mant').innerHTML = '';
        document.getElementById('teretulemast').innerHTML = 'Tere tulemast e-hääletuse lehele!';
        document.getElementById('hääletus').innerHTML = 'Hääletamiseks pead olema sisselogitud.';
        document.getElementById('status').innerHTML = 'Kandideerimiseks pead olema Facebooki logitud.';
        document.getElementById('logbtn').style.display = 'block';
        document.getElementById('logbtn2').style.display = 'block';
        setButtons(true);
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
                getVoteData();
            }
        }
        xmlhttp.open("GET", "getuser.php?id=" + response.id +
        		"&fname=" + response.first_name + "&lname=" + response.last_name, true);
        xmlhttp.send();
        
    });
}