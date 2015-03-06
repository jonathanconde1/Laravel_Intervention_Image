<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>


		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<script src="/js/bootstrap.min.js"></script>

		<script src="/js/jquery-1.11.0.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<script src="/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
		<script src="/js/presentacion_fotos.js" type="text/javascript" charset="utf-8"></script>
		<style>
		 body {
			padding-top: 50px;
		}
		.starter-template {
			padding: 40px 15px;
			text-align: center;
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



</body>
</html>


