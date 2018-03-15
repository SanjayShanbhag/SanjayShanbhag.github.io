<!DOCTYPE html>
<html>
<head>
	<title>ElderScrolls Wikia</title>
	<link rel="stylesheet" type="text/css" href="/offlinewikia/CSS/style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="/offlinewikia/favicon.png" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <meta name="theme-color" content="#212121">
 	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="/offlinewikia/main.js"></script>
    <style type="text/css">
        @media screen and (max-width: 480px){
            .searchbox{
                width: 90%;
            }
            p{
                font-size: 17px;
                line-height: 23px;
            }
        }
        h3,p{
            color: #FAFAFA;
        }
        a{
            text-decoration: none !important;
        }
    </style>
    <script type="text/javascript">
    var db;
            var request1 = indexedDB.open("newDatabase",1);
            request1.onsuccess = function (evt) {
                db = request1.result;
        var objectStore = db.transaction("urlData").objectStore("urlData");
        objectStore.openCursor().onsuccess = function(event) {
        var cursor = event.target.result;
        if (cursor) {
            var name = cursor.value.name;
            var abstract = cursor.value.abstract;
            var image = cursor.value.image;
            var urid = cursor.value.urid;
            var iDiv = document.createElement('div');
            var x = document.createElement("H3");
            var t = document.createTextNode(name);
            x.appendChild(t);
            var y = document.createElement("P");
            var t = document.createTextNode(abstract);
            y.appendChild(t);
            iDiv.appendChild(x);
            iDiv.appendChild(y);
            var z = document.createElement("A");
            var url = "/offlinewikia/article.php/"+urid;
            z.setAttribute("href", url);
            z.appendChild(iDiv);
            var jDiv = document.getElementById('data');
            jDiv.appendChild(z);
            var j = document.createElement("HR");
            jDiv.appendChild(j);
            cursor.continue();
        }
        else {
            console.log("No more entries!");
        }
   };
}
    </script>
</head>
<body>

        <nav class="navbar navbar-inverse navbar-fixed-top" style="margin: 0; border: none; border-radius: 0;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                    <a class="navbar-brand" href="#"><img src="/offlinewikia/images/logo.png" style="width: 150px; height: 30px;"></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <form class="navbar-form navbar-left" method="GET" action="/offlinewikia/searchresults.php">
                        <div class="input-group">
                            <input type="text" class="form-control" name="srch" placeholder="Search">
                            <input type="hidden" name="pg" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/offlinewikia/saved.php"><span class="glyphicon glyphicon-floppy-disk"></span> Saved Articles</a></li>
                        <li><a href="/offlinewikia/about.php"><span class="glyphicon glyphicon-user"></span> About</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid back">
            <div class="container">
                <br><br><br><br><br><br>
                <div class="content">
                    <div class="topcon">
                        <img src="/offlinewikia/images/topfile.png" style="width: 300px; height: 90px; margin: auto;" class="center-block">
                    </div>
                    <br>
                    <div style="padding-left: 10px; padding-right: 10px;">
                        <div class="row">
                            <div class="col-sm-2 col-lg-2 col-md-2">
                            </div>
                            <div class="col-sm-8 col-lg-8 col-md-8">
                                <div class="data" id="data">
                                </div>
                            </div>
                            <div class="col-sm-2 col-lg-2 col-md-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>