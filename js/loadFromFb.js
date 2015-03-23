function statusChangeCallback(response) {
	if (response.status === 'connected') {
		getInfo();
		document.getElementById('logi').innerHTML = 'Logi välja';
		document.getElementById('logi2').innerHTML = 'Väljalogimine';
		document.getElementById('status').innerHTML = '';
	} else if (response.status === 'not_authorized') {
		document.getElementById('logi').innerHTML = 'Logi sisse';
		document.getElementById('logi2').innerHTML = 'Sisselogimine';
		document.getElementById('status').innerHTML = 'Andmete nägemiseks pead olema Facebooki logitud.';
		document.getElementById('firstName').innerHTML = '';
        document.getElementById('teretulemast').innerHTML = '';
        document.getElementById('lastName').innerHTML = '';
        document.getElementById('email').innerHTML = '';
        document.getElementById('teretulemast').innerHTML = 'Tere tulemast e-hääletuse lehele!';
	} else {
		document.getElementById('status').innerHTML = 'Palun logi Facebooki, et oma andmeid näha.';
	}
}

function checkLoginState() {
	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
}

function getInfo() {
    FB.api('/me', function(response) {
        document.getElementById('firstName').innerHTML = 'Eesnimi: ' + response.first_name;
        document.getElementById('teretulemast').innerHTML = 'Tere tulemast, ' + response.first_name + '!';
        document.getElementById('lastName').innerHTML = 'Perenimi: ' + response.last_name;
        document.getElementById('email').innerHTML = 'Email: ' + response.email;
    });
}