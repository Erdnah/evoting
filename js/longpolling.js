function messages_longpolling(rows) {
	var t;
	
	if (typeof lastId == 'undefined') {
		lastId = 0;
	}

	jQuery.ajax({
		url : 'longpoll.php',
		type : 'GET',
		data : 'startrows=' + rows,
		dataType : 'json',
		success : function(payload) {
			clearInterval(t);
			t = setTimeout(function() {
				messages_longpolling(payload.num_rows);
			}, 1000);
			if (payload.status == 'results' || payload.status == 'no-results') {				
				
				if (payload.status == 'results') {
					console.log('Häälte arv muutunud');
					updateTulemused();
				}
			}		
		},
		error : function(jqXHR, textStatus, errorThrown) {
			console.log(jqXHR.status + " "+ textStatus  + " "+errorThrown);
			clearInterval(t);
			t = setTimeout(function() {
				messages_longpolling(0);
			}, 10000);
		}
	});
}
messages_longpolling(0);