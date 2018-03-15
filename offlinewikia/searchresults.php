<?php
	$query = $_GET['srch'];
	$pg = $_GET['pg'];
	$len = strlen($query);
	$rep = [" ", "\"", ";", "/", "\\", "&", "$", "#", "@", "="];
	$with = ["+", "%22", "%3B", "%2F", "%5C", "%26", "%24", "%23", "%40", "#3D"];
	$processedquery = str_replace($rep,$with,$query);
	$srchquery = "http://elderscrolls.wikia.com/api/v1/Search/List?query=".$processedquery."&limit=25&minArticleQuality=10&batch=".$pg."&namespaces=0%2C14";
	$json = @file_get_contents($srchquery,0,null,null);
	$result = json_decode($json,true);
//	var_dump($result);
//	echo "<br><br><br><br><hr>";
//		$items = $result["items"];
//		echo sizeof($items);
//		foreach ($items as $item1) {
//			# code...
//			echo "ID: ".$item1["id"]." Title: ".$item1["title"]."<br>";
//		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ElderScrolls Wikia</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.png" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <meta name="theme-color" content="#212121">
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
				<br><br><br><br><br><br>
				<div class="content">
					<div class="topcon">
						<img src="images/topfile.png" style="width: 300px; height: 90px; margin: auto;" class="center-block">
					</div>
					<div style="padding-left: 10px; padding-right: 10px;">
						<h1 style="color: #FAFAFA;"> Search Results for "<?php echo $query;?>"</h1>
						<hr style="border-color: #636363;">
						<div class="row">
							<div class="col-sm-12 col-md-8 col-lg-8">
								<?php
									$items = $result["items"];
									$itemslength = sizeof($items);
									if($itemslength > 0){
										echo "<p style='color: #ECEFF1;'>About ".$result['total']." results for ".$query." from ElderScrolls.</p><br>";
										foreach ($items as $item1) {
											echo "<a href='article.php?id=".$item1['id']."'>".$item1['title']."</a><br>";
											echo "<p style='color: #ECEFF1; margin-bottom: 1px;'>".$item1['snippet']."</p>";
											echo "<div class='permalink-section'>";
											echo "<a style='color: #636363;' href='".$item1['url']."' target='_blank'>".$item1['url']."</a><br><br>";
											echo "</div>";
										}
									}else{
										echo "<p style='color: #ECEFF1;'>No Results To Display!</p>";
									}
								?>
								<br>
								<div style="text-align: center;" id="nxtbtn">
									<?php
										if($itemslength > 0){
									?>
									<a href="searchresults.php?srch=<?php echo $query;?>&pg=<?php echo $pg+1;?>" class="btn btn-default">Next</a>
									<?php
										}
									?>
						</div>
							</div>
							<div class="col-sm-12 col-md-4 col-lg-4">
								<h4 style="color: #FAFAFA;"> Top Articles: </h4>
								<hr>
								<?php
                                    $topjson = "http://elderscrolls.wikia.com/api/v1/Articles/Top?expand=1&limit=10";
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
						<br>
						<br><br>	
					</div>
				</div>
			</div>
			<br><br><br>
		</div>
	</body>
</html>