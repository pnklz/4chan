<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8" />
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<title><?=settings("title")?></title>
	
	
	<meta name="description" content="" />
	
	<link href="css/960.css" rel="stylesheet" type="text/css" />
	<link href="style.css" rel="stylesheet" type="text/css" />
	
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
	<![endif]-->
	
	<!--[if lte IE 7]>
		<link href="css/ie.css" rel="stylesheet" type="text/css" />
	<![endif]-->

</head>

<body>
	      <script>

	function generateNoise(opacity) {
	   if ( !!!document.createElement('canvas').getContext ) {
	      return false;
	   }

	   var canvas = document.createElement("canvas"),
	   ctx = canvas.getContext('2d'),
	   x, y,
	   r, g, b,
	   opacity = opacity || .2;

	   canvas.width = 100;
	   canvas.height = 100;

	   ctx = canvas.getContext("2d");

	   for ( x = 0; x < canvas.width; x++ ) {
	      for ( y = 0; y < canvas.height; y++ ) {
	         r = Math.floor( Math.random() * 80 );
	         g = Math.floor( Math.random() * 80 );
	         b = Math.floor( Math.random() * 80 );

	         ctx.fillStyle = "rgba(" + r + "," + g + "," + b + "," + opacity + ")";
	         ctx.fillRect(x, y, 1, 1);
	      }
	   }

	   document.body.style.backgroundImage = "url(" + canvas.toDataURL("image/png") + ")";
	}

	generateNoise(.15);

	      </script>  
	
	<div id="wrapper" class="container_12">

		<header id="header" class="grid_12">

			<h1><a href="index.php">4chan</a></h1>

		</header> <!-- end header -->

		<div id="content">

			<nav>
				<ul id="menu" class="clearfix"> 
					<li class="current"><a href="index.php">Home</a></li>
					<li>
						<a href="#">About</a>
						<ul>
							<li><a href="#">Subpage</a></li>
							<li><a href="#">Subpage 2</a></li>
						</ul>
					</li>
					<li><a href="#">Contact</a></li>
				</ul>
				<br class="clear" />
			</nav>

			<!--[if lte IE 7]>
				<div class="ie grid_7"></div>
			<![endif]-->

	