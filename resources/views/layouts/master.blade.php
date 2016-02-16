<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta property="og:url"         content="http://campolindoreunion1966.com" />
    <meta property="og:type"        content="website" />
    <meta property="og:title"       content="Campolindo High School Reunion 1966" />
    <meta property="og:description" content="Website for the Campolindo High School Reunion - Class of 1966" />
    <meta property="og:image"       content="http://campolindoreunion1966.com/images/facebook_title1.png" />

    <meta name="twitter:card"        content="summary" />
    <meta name="twitter:site"        content="@rexitas" />
    <meta name="twitter:title"       content="Campolindo High School Reunion 1966" />
    <meta name="twitter:description" content="Website for the Campolindo High School Reunion - Class of 1966" />
    <meta name="twitter:image"       content="http://campolindoreunion1966.com/images/twitter_title.png" />
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	<title>Campoliondo High School Class of 1966</title>
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.5/flatly/bootstrap.min.css" rel="stylesheet"> --}}
	<link href="/css/main.css" rel="stylesheet">
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<style>
		body {
			padding-top: 70px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	    <div class="container">
	        <!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
	            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a class="navbar-brand" href="/">
	                <img src="/images/campolindo-small.png">
	                Campolindo High School Class of 1966
	            </a>
	        </div>

			<div class="collapse navbar-collapse" id="navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
				        <li><a href="{{ route('home') }}">Home</a></li>
				        <li><a href="{{ route('classlist') }}">Class List</a></li>
				        <li><a href="{{ route('contact') }}">Contact Us</a></li>
					@if (Auth::guest())
						<li><a href="{{ url('auth/login') }}">Login</a></li>
					@else
					    <li><a href="{{ route('guests.index') }}">Guests</a></li>
						<li><a href="#">{{ Auth::user()->name }}</a></li>
						<li><a href="{{ url('/logout') }}">Logout</a></li>
					@endif
				</ul>
			</div>

	    </div><!-- /.container-fluid -->
	</nav>

	<div class="container">
	    @if(!preg_match('/password|auth|welcome/', $view_name))
	        {!! Breadcrumbs::render() !!}
	    @endif
		@yield('content')
	</div>

	<hr/>

	<div class="container footer">
    	<ul class="share-buttons">
          <li><a href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.campolindoreunion1966.com%2F&t=Campolindo%20High%20School%20Reunion%20-%20Class%20of%201966" title="Share on Facebook" target="_blank"><img src="images/flat_web_icon_set/color/Facebook.png"></a></li>
          <li><a href="https://twitter.com/intent/tweet?source=http%3A%2F%2Fwww.campolindoreunion1966.com%2F&text=Campolindo%20High%20School%20Reunion%20-%20Class%20of%201966:%20http%3A%2F%2Fwww.campolindoreunion1966.com%2F" target="_blank" title="Tweet"><img src="images/flat_web_icon_set/color/Twitter.png"></a></li>
          <li><a href="https://plus.google.com/share?url=http%3A%2F%2Fwww.campolindoreunion1966.com%2F" target="_blank" title="Share on Google+"><img src="images/flat_web_icon_set/color/Google+.png"></a></li>
          <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=http%3A%2F%2Fwww.campolindoreunion1966.com%2F&title=Campolindo%20High%20School%20Reunion%20-%20Class%20of%201966&summary=&source=http%3A%2F%2Fwww.campolindoreunion1966.com%2F" target="_blank" title="Share on LinkedIn"><img src="images/flat_web_icon_set/color/LinkedIn.png"></a></li>
        </ul>
	    Created by <a href="mailto: webmaster@campolindoreunion1966.com?Subject=Campolindo Reunion Website">Rex "SaintPeter" Schrader</a> &copy; {{ date('Y') }}
	    <br/>

	</div>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="/js/jquery.livefilter.min.js"></script>
	<script type="text/javascript">
	    @yield('script')
	</script>
</body>
</html>