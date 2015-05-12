function messages_longpolling(rows) {
	var t;

	jQuery.ajax({
		url : 'longpoll.php',
		type : 'GET',
		dataType : 'json',
		success : function(payload) {
			clearInterval(t);
			t = setTimeout(function() {
				messages_longpolling(payload.num_rows);
			}, 2000);

			if (payload.status == 'results') {
				if (payload.num_rows != rows) {
					console.log('Häälte arv muutunud');
					updateTulemused();
				}
				
			}
		},
		error : function(jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.status + " " + textStatus + " " + errorThrown);
			clearInterval(t);
			t = setTimeout(function() {
				messages_longpolling(0);
			}, 10000);
		}
	});
}
messages_longpolling(0);