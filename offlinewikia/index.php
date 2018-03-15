<?php
    header("Access-Control-Allow-Origin: *");    
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); 
    header("Access-Control-Allow-Headers: *");
?>
<!DOCTYPE html>
<html>
<head>
	<title>ElderScrolls Wikia</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<meta charset="utf-8">
    <link rel="manifest" href="manifest.json">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- Chrome for Android theme color -->
<meta name="theme-color" content="#212121">

<!-- Add to homescreen for Chrome on Android -->
<meta name="mobile-web-app-capable" content="yes">
<meta name="application-name" content="Blog">
<link rel="icon" sizes="192x192" href="/offlinewikia/favicon.png">

<!-- Add to homescreen for Safari on iOS -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="Blog">
<link rel="apple-touch-icon" href="/offlinewikia/favicon.png">

<!-- Tile for Win8 -->
<meta name="msapplication-TileColor" content="#212121">
<meta name="msapplication-TileImage" content="/offlinewikia/favicon.png">
 	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <style type="text/css">
        @media screen and (max-width: 480px){
            .searchbox{
                width: 90%;
            }
        }
    </style>
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
      				<a class="navbar-brand" href="#"><img src="images/logo.png" style="width: 150px; height: 30px;"></a>
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
	           <div class="searchbox">
                    <br><br>
                    <img src="images/logo.png" style="width: 240px; height: 80px;" class="center-block">
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-sm-2 col-lg-2 col-md-2">
                        </div>
                        <div class="col-sm-8 col-lg-8 col-md-8">
                            <form action="searchresults.php" method="GET">
                            <div style="padding-left: 5px; padding-right: 5px;">
                                <input type="text" name="srch" class="form-control" placeholder="Search Text Here">
                                <input type="hidden" name="pg" value="1">
                            </div>
                            <br><br>
                            <button class="center-block btn btn-default" type="submit">Search Wikia</button>
                            </form>
                        </div>
                        <div class="col-sm-2 col-lg-2 col-md-2">
                        </div>
                    </div>
               </div>
			</div>
		</div>
        <script>
            
            if('serviceWorker' in navigator){
                navigator.serviceWorker.register('service-worker.js')
                .then(function(registration) {
                    console.log('Registration Completed: ', registration);
                })
                .catch(function(error) {
                    console.log('Registration Failed: '. error);
                });
            }
            
        </script>
        <script type="text/javascript">
            Notification.requestPermission(function(status) {
  console.log('Notification permission status:', status);
});
        </script>
</body>
</html>