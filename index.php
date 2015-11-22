<!DOCTYPE html>
<html lang="en" ng-app="adminApp">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">	

    <title>Dictionary</title>
	<link rel="shortcut icon" href="images/favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- <link href="css/bootstrap-theme.min.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
	<link href="css/custom-theme.css" rel="stylesheet">
	<link rel="stylesheet" href="resources/font-awesome-4.4.0/css/font-awesome.min.css">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>

  <body>

  	<!-- put navigation here -->

    <div class="container site-width">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 main" ng-view ng-cloak>
          
		  <!-- view will load from partials -->
          
        </div>
      </div>
    </div>

    <!-- Placed at the end of the document so the pages load faster -->
    
	<!-- jQuery -->
	<script src="js/jquery-1.11.3.min.js"></script>
	
	<!-- Bootstrap core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- Angular Framework -->
	<script src="js/angular/angular.min.js"></script>
    <script src="js/angular/angular-route.min.js"></script>
	<script src="js/angular/angular-animate.min.js"></script>
	<script src="js/angular/ui-bootstrap.min.js"></script>
	<script src="js/angular/ui-bootstrap-tpls.min.js"></script>
	
	<!-- Angular App and Controllers -->
	<script src="js/app/app.js"></script>
	<script src="js/app/controllers.js"></script>  

	<!-- sharethis button -->
	<script type="text/javascript">var switchTo5x=true;</script>
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "6f68b8af-410b-4c0b-9046-b59b53544254", doNotHash: false, doNotCopy: false, hashAddressBar: true});</script>
	
  </body>
</html>