<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico">
	<title>Campoliondo High School Class of 1966 - Print</title>
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.5/flatly/bootstrap.min.css" rel="stylesheet"> --}}
	<link href="/css/main.css" rel="stylesheet">
    <link href="/css/jquery-confirm.css" rel="stylesheet">
	<style>
		h1 {
		   display: inline;
		}
	</style>
</head>
<body>
	<div class="container">
		@yield('content')
	</div>

	<!-- Scripts -->
	<script type="text/javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<script src="/js/jquery.livefilter.min.js"></script>
	<script src="/js/jquery-confirm.min.js"></script>
	@yield('script_footer')
	<script type="text/javascript">
	    @yield('script')
	</script>
</body>
</html>