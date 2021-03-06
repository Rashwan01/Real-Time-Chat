<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="utf-8">
		<title>Sign In – Swipe</title>
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap core CSS -->
		<link href="/dist/css/lib/bootstrap.min.css" type="text/css" rel="stylesheet">
		<!-- Swipe core CSS -->
		<link href="/dist/css/swipe.min.css" type="text/css" rel="stylesheet">
		<!-- Favicon -->
		<link href="/dist/img/favicon.png" type="image/png" rel="icon">
        <meta name="csrf-token" content="{{ csrf_token() }}">


	</head>

<body>
    <main id="root">
    
        <router-view></router-view>
      
          
    </main>

    <script src="/js/app.js"></script>
   <script src="dist/js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="dist/js/vendor/jquery-slim.min.js"><\/script>')</script>
		<script src="dist/js/vendor/popper.min.js"></script>
		<script src="dist/js/bootstrap.min.js"></script>
	<script src="dist/js/swipe.min.js"></script>
</body>

</html>
