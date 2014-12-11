<!DOCTYPE html>
<html>
<head>
	<title>Paintrackr | {{ $title }}</title>
	
	<meta content='width=device-width, initial-scale=1, maximum-scale=1' name='viewport' />
	<meta name="description" content="{{ $description }}">
	<meta name="keywords" content="{{ $keywords }}">	
	
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/global.css">
	@yield('styles')
	
	<script type="text/javascript" src="/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="/js/global.js"></script>	
</head>
<body>
	@include('global.nav')
	<section class="content">
		<article class="middle pw cf">
			@yield('content')
		</article>
	</section>
	@include('global.footer') 
	
	@yield('scripts')  
	
	<!-- google analytics code -->
    <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-10273473-6']);
    _gaq.push(['_trackPageview']);
    
    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
    </script>
    <!-- end google analytics code -->
	                             
</body>
</html>