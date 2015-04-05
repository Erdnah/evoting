function OnLoad() {
      window.applicationCache.addEventListner('updateready', function (e) {
        if (window.applicationCache.status == window.applicationCache.UPDATEREADY) {
          window.applicationCache.swapCache();
        }
      });
    }
    function UpdateCache() {
      window.applicationCache.update();
    }