(function(){
	'use strict';


	var CACHE_NAME = 'version1';
	var urlsToCache = [
		'.',
		'/offlinewikia/index.php',
        '/offlinewikia/error.php',
		'/offlinewikia/CSS/style.css',
        '/offlinewikia/images/topfile.png',
		'/offlinewikia/images/skyrim.jpg',
		'/offlinewikia/images/logo.png',
        '/offlinewikia/images/noimg.png',
		'/offlinewikia/favicon.png',
        '/offlinewikia/main.js',
        '/offlinewikia/manifest.json',
        '/offlinewikia/saved.php',
		'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
		'http://code.jquery.com/jquery-2.1.1.min.js',
		'http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js',
		'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'
	];

	self.addEventListener('install', function(event) {
  		event.waitUntil(
    		caches.open(CACHE_NAME)
    		.then(function(cache) {
      			return cache.addAll(urlsToCache);
    		})
  		);
	});

    self.addEventListener('activate', function(event) {
        const url1Data = [
                { urid: "297403", name: "Last Dragonborn", abstract: "The Last Dragonborn or Laat Dovahkiin (Dovahzul: Laat-Dovah-Kiin, \"Last-Dragon-Born\"), generally...", image: "https://vignette.wikia.nocookie.net/elderscrolls/images/4/4f/Dovahkiin_%28dragonborn%29.jpg/revision/latest/window-crop/width/200/x-offset/0/y-offset/0/window-width/640/window-height/640?cb=20110831192724", created: new Date().getTime() },
            ];
            var db;
            var request = indexedDB.open("newDatabase", 1);
         
            request.onerror = function(event) {
                console.log("error: ");
            };
         
            request.onsuccess = function(event) {
                db = request.result;
                console.log("success: "+ db);
            };
         
            request.onupgradeneeded = function(event) {
                var db = event.target.result;
                var objectStore = db.createObjectStore("urlData", {keyPath: 'id', autoIncrement:true});
                for (var i in url1Data) {
                    objectStore.add(url1Data[i]);
                }
            }
        });

	self.addEventListener('fetch', function(event) {
  		event.respondWith(
    		caches.match(event.request)
    		.then(function(response) {
      			return response || fetchAndCache(event.request);
   	 		})
  		);
	});

	function fetchAndCache(url) {
  		return fetch(url)
  		.then(function(response) {
    	// Check if we received a valid response
    		if (!response.ok) {
                return fetch(url, {credentials: 'omit'})
                .then(function(response1) {
                    if(!response.ok){
                        throw Error(response.statusText);
                    }
                    return response1;
                });
    		}
    		return caches.open(CACHE_NAME)
    		.then(function(cache) {
      			//cache.put(url, response.clone());
      			return response;
    		});
  		})
  		.catch(function(error) {
    		console.log('Request failed:', error);
    		// You could return a custom offline 404 page here
        return caches.match("error.php");
  		});
	}
})();