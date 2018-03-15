<?php
    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
    $url1 = trim(parse_url($url, PHP_URL_PATH), '/');
    $url1arr = explode("/", $url1);
    $id = $url1arr[2];
  
?>
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
    </style>
    <script type="text/javascript">
        <?php
                $jsonurl1 = "http://elderscrolls.wikia.com/api/v1/Articles/Details?ids=".$id."&abstract=100&width=200&height=200";
                $json2 = @file_get_contents($jsonurl1,0,null,null);
                $result2 = json_decode($json2,true);
                $res = $result2['items'];
                $res = $res[$id];
                $title = $res['title'];
                $abs = $res['abstract'];
                $abs = str_replace("'", '"', $abs);
                $image = $res['thumbnail'];
            ?>
            var title19 = '<?php echo $title; ?>';
            var abstract1 = '<?php echo $abs; ?>';
            var image1 = '<?php echo $image; ?>';
            var id19 = <?php echo $id; ?>;

    </script>
    <script type="text/javascript">
        function oload(){
            var id20 = <?php echo $id; ?>;
            var db;
            var request1 = indexedDB.open("newDatabase",1);
            request1.onsuccess = function (evt) {
            db = request1.result;
            var objectStore = db.transaction("urlData").objectStore("urlData");
            objectStore.openCursor().onsuccess = function(event) {
            var cursor = event.target.result;
            if (cursor) {
                var urid = cursor.value.urid;
                console.log(id20+" "+urid);
                if(urid == id20){
                    document.getElementById('savoff').style.display = 'none';
                    document.getElementById('offava').style.display = 'block';
                }
                cursor.continue();
            }
        }
    }
}
    </script>
</head>
<body onload="oload()">

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
                            <div class="col-sm-12 col-md-8 col-lg-8">
                                <?php
                                    if(!isset($id)){
                                        echo "<h3>Nothing to show!</h3>";
                                    }else{
                                        $url = "http://elderscrolls.wikia.com/api/v1/Articles/AsSimpleJson?id=".$id;
                                        $json = @file_get_contents($url,0,null,null);
                                        $result = json_decode($json,true);
                                        $result = $result['sections'];
                                        $ch = $result["0"];
                                        $title121 = $ch['title'];
                                        foreach ($result as $result1) {
                                            # code...

                                            if($result1['title'] === 'Trivia' || $result1['title'] === 'Appearances' || $result1['title'] === 'See also' || $result1['title'] === 'Notes' || $result1['title'] === 'Locations'){
                                            }else{
                                            $img = $result1['images'];
                                            //$img = $img['src'];
                                            $siz1 = sizeof($img);
                                            $result2 = $result1['content'];
                                            $siz = sizeof($result2);
                                            if($siz == 0){
                                                echo "<h2 style='color: #FAFAFA;'>".$result1['title']."</h2>";
                                            }else{
                                                echo "<h3 style='color: #FAFAFA;'>".$result1['title']."</h3>";
                                                echo "<hr>";
                                            }
                                            if($siz1 > 0){
                                                $img = $img['0'];
                                                ?>
                                                <img src="<?php echo $img['src']; ?>" onerror="this.src='/offlinewikia/images/noimg.png'" width="100" height="100" style='float: right; margin-left: 20px; margin-bottom: 10px;'>
                                                <?php
                                            }
                                            foreach ($result2 as $result3) {
                                                # code...
                                                if(!empty($result3['text'])){
                                                    echo "<p style='text-align: justify; color: #E0E0E0; font-size: 15px;'>".$result3['text']."</p>";
                                                }else{
                                                    $result4 = $result3['elements'];
                                                    foreach ($result4 as $result5) {
                                                        # code...
                                                        echo "<p style='text-align: justify; color: #E0E0E0; font-size: 15px;'>".$result5['text']."<p>";
                                                    }
                                                }
                                            }
                                            //echo "<p>".$result2['text']."</p>";
                                            }
                                        }
                                    }
                                ?>
                                <div style="display: none;">
                                    <p id="title121"><?php echo $title121; ?></p>
                                </div>
                                <button class="btn btn-default" onclick="saveoff(abstract1,title19,image1,id19)" class="savoff" id="savoff">Save for offline</button>
                                <h4 style="color: #2E7D32; display: none;" id="offava">This Article is Saved For Offline Availability</h4>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <h4 style="color: #FAFAFA;"> Top Articles: </h4>
                                <hr>
                                <?php
                                    $topjson = "http://elderscrolls.wikia.com/api/v1/Articles/Top?expand=1&limit=10&baseArticleId=".$id;
                                    $json = @file_get_contents($topjson,0,null,null);
                                    $result = json_decode($json,true);
                                    $items = $result['items'];
                                    foreach ($items as $items1) {
                                        # code...
                                        $id1 = $items1['id'];
                                        $title = $items1['title'];
                                        $abstract = $items1['abstract'];
                                        $image = $items1['thumbnail'];
                                        ?>
                                        <img src="<?php echo $image; ?>" onerror="this.src='/offlinewikia/images/noimg.png'" width="100" height="100" style='float: left; margin-right: 5px; height: 80px;'>
                                        <?php
                                        echo "<a href='article.php?id=".$id1."'>".$title."</a><br>";
                                        echo "<p style='color: #FAFAFA;'>".$abstract."</p><hr>";
                                    }
                                ?>
                            </div>
                        </div>
                        <br><br>
                    </div>
                </div>
            </div>
            <br><br>
        </div>
    </body>
</html>