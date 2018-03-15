function saveoff(abstract,title,image,id){
            document.getElementById('savoff').style.display = 'none';
            document.getElementById('offava').style.display = 'block';
            console.log(title+" "+abstract);
            console.log(arguments.length);
            if(!title){
                console.log("Undefined");
            }
            console.log("Hello: "+title);
            var url = "/offlinewikia/article.php/"+id;
            var CACHE_NAME = "version1";
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
            var db;
            var request1 = indexedDB.open("newDatabase",1);
            request1.onsuccess = function (evt) {
                db = request1.result;
                var request = db.transaction(["urlData"], "readwrite")
                .objectStore("urlData")
                .add({ urid: id, name: title, abstract: abstract, image: image, created: new Date().getTime() });
            
                request.onsuccess = function(event) {
                    alert("Data has been added to your database.");
                };
            
                request.onerror = function(event) {
                    alert("Unable to add data\r\nas it is aready existing in your database! ");
                }
            }
            if (Notification.permission == 'granted') {
                navigator.serviceWorker.getRegistration().then(function(reg) {
                    // TODO 2.4 - Add 'options' object to configure the notification
                    var options = {
                        body: 'This Article has been successfully saved and can now be viewed when offline!',
                        icon: '/offlinewikia/favicon.png',
                        vibrate: [100, 50, 100],
                        data: {
                            dateOfArrival: Date.now(),
                            primaryKey: 1
                        },

                    };
                    reg.showNotification('Article Saved',options);
                });
            }
          
                caches.open(CACHE_NAME)
                .then(function(cache) {
                    cache.add(url);
                });
            
        }