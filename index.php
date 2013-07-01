<?php
session_start();
$_SESSION['uploaded'] = 0;
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<script type="text/javascript" src="../js/ac_quicktime.js"></script>
		<meta charset="utf-8">
		<title>AMR Frequency Simulator</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Le styles -->
		<link href="../css/bootstrap.css" rel="stylesheet">
		<link href="../css/bootstrap-fileupload.css" rel="stylesheet" media="screen">
		<style>
			body {
				padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
			}
		</style>
		<link href="../css/bootstrap-responsive.css" rel="stylesheet">

		<!-- Fav and touch icons -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../ico/apple-touch-icon-114-precomposed.png">
			<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../ico/apple-touch-icon-72-precomposed.png">
										<link rel="apple-touch-icon-precomposed" href="../ico/apple-touch-icon-57-precomposed.png">
																	 <link rel="shortcut icon" href="../ico/favicon.png">
	</head>

	<body>

		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="brand" href="index.php">AMR Frequency Simulator</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li><a href="index.php">Home</a></li>
							<li><a href="about.php">About</a></li>
							<li><a href="contact.php">Contact</a></li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>

		<div class="container">

			<form action="upload.php" method="post" enctype="multipart/form-data">
			<legend>Convert an mp3 (&lt;1MB) to multiple AMR formats!</legend>
			<div class="row">
				<div class="span10">
					<div class="row">
						<div class="span4 lightblue">
							<label>Upload File</label>
							<div class="fileupload fileupload-new" data-provides="fileupload">
								<div class="input-append">
									<div class="uneditable-input span2"><i class="icon-file fileupload-exists"></i> <span class="fileupload-preview"></span></div><span class="btn btn-file"><span class="fileupload-new">Select file</span><span class="fileupload-exists">Change</span><input type="file" name="file" id="file" /></span><a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
								</div>
							</div>
						</div><!--/span-->
						<div class="span2 lightblue">
							<label>OR</label>
						</div>
						<div class="span4 lightblue">
							<a href="http://recordmp3.org/">Record an MP3</a>
							<!-- -->
						</div>
					</div>
				</div><!--/span-->
			</div><!--/row-->
			<button type="submit" class="btn btn-primary">Convert!</button>
			</form>

			<form action="display.php" method="post" enctype="multipart/form-data">
			<legend>Listen to the default mp3 in multiple AMR formats!</legend>
			<div class="row">
				<div class="span8">
					<button type="submit" class="btn btn-primary">Convert!</button>
				</div><!--/span-->
			</div><!--/row-->
			</form>

			<hr>
			
			<!-- FOOTER -->
			<footer>
				<p class="pull-right"><a href="#">Back to top</a></p>
				<p>&copy; 2013 <a href="http://www.awardsolutions.com/">Award Solutions, Inc.</a></p>
			</footer>

		</div> <!-- /container -->

		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.js"></script>
		<script src="../js/bootstrap-fileupload.js"></script>

	</body>
</html>
