function messages_longpolling( timestamp, lastId ){
   var t;
 
   if( typeof lastId == 'undefined' ){
      lastId = 0;
   }

   jQuery.ajax({
       url: 'longpoll.php',
       type: 'GET',
       data: 'timestamp=' + timestamp + '&lastId=' + lastId,
       dataType: 'json',
       success: function (payload) {
           clearInterval(t);
           if (payload.status == 'results' || payload.status == 'no-results') {
               console.log('payloadi staatus'+payload.status)
               t = setTimeout(function () {
                   messages_longpolling(payload.timestamp, payload.lastId);
               }, 2000);
               if (payload.status == 'results') {
                   alert('Uus hääl on lisandunud');
               }
               if (payload.status == 'no-results') {
                   alert('Uut häält pole lisandunud');
               }
           } else if (payload.status == 'error') {
               alert('We got confused, Please refresh the page!');
           }
       },
       error: function () {
           clearInterval(t);
           t = setTimeout(function () {
               messages_longpolling(payload.timestamp, payload.lastId);
           }, 10000);
       }
   });
}
messages_longpolling( '<!--?php echo time(); ?-->' );