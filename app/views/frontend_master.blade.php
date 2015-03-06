<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>


	<script src="js/jquery-1.11.0.min.js" type="text/javascript"></script>
		<!--script src="js/jquery.lint.js" type="text/javascript" charset="utf-8"></script-->
		<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<script src="js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
		
		<style type="text/css" media="screen">
			* { margin: 0; padding: 0; }
			
			body {
				background: #282828;
				font: 62.5%/1.2 Arial, Verdana, Sans-Serif;
				padding: 0 20px;
			}
			
			h1 { font-family: Georgia; font-style: italic; margin-bottom: 10px; }
			
			h2 {
				font-family: Georgia;
				font-style: italic;
				margin: 25px 0 5px 0;
			}
			
			p { font-size: 1.2em; }
			
			ul li { display: inline; }
			
			.wide {
				border-bottom: 1px #000 solid;
				width: 4000px;
			}
			
			.fleft { float: left; margin: 0 20px 0 0; }
			
			.cboth { clear: both; }
			
			#main {
				background: #fff;
				margin: 0 auto;
				padding: 30px;
				width: 1000px;
			}
		</style>




</head>
<body>
	
<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			
			<a class="navbar-brand" href="/">Awesome Albums</a>

			<div>
				<ul class="nav navbar-nav">
					<li><a href="{{URL::route('create_album_form')}}">Create New Album</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>

	<div>
	@yield('content')
	</div>

<div id="main">
			<h1>prettyPhoto</h1>
			
			

			<h2>Gallery 2</h2>
			<ul class="gallery clearfix">
				<li><a href="/images/fullscreen/3.jpg" rel="prettyPhoto[gallery2]" title="How is the description on that one? How is the description on that one? How is the description on that one? "><img src="/images/thumbnails/t_3.jpg" width="60" height="60" alt="This is a pretty long title" /></a></li>
				<li><a href="/images/fullscreen/4.jpg" rel="prettyPhoto[gallery2]" title="Description on a single line."><img src="/images/thumbnails/t_4.jpg" width="60" height="60" alt="" /></a></li>
				<li><a href="/images/fullscreen/5.jpg" rel="prettyPhoto[gallery2]"><img src="/images/thumbnails/t_5.jpg" width="60" height="60" alt="" /></a></li>
				<li><a href="/images/fullscreen/1.jpg" rel="prettyPhoto[gallery2]"><img src="/images/thumbnails/t_1.jpg" width="60" height="60" alt="" /></a></li>
				<li><a href="/images/fullscreen/2.jpg" rel="prettyPhoto[gallery2]"><img src="/images/thumbnails/t_2.jpg" width="60" height="60" alt="" /></a></li>
			</ul>

			
			<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				$("area[rel^='prettyPhoto']").prettyPhoto();
				
				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});
				$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
				$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
					custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
					changepicturecallback: function(){ initialize(); }
				});

				$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
					changepicturecallback: function(){ _bsap.exec(); }
				});
			});
			</script>
			
	
	</div>



</body>
</html>


