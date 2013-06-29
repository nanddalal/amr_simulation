<?php
session_start()
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

			<form action="index.php" method="get">
			<legend>Narrow and Wide Band Conversions</legend>
			<div class="row">
				<div class="span12">
					<div class="row">
						<?php
						include_once "convert.php";
						if ($_SESSION['uploaded'] == 1) {
							$uploaded_file = "audio/user_" . session_id() . "/in.mp3";
							$upload_path = "audio/user_" . session_id() . "/";
                            list($str1, $str2) = convert($uploaded_file, $upload_path, 1);
						} else {
							$uploaded_file = "audio/default/recording.mp3";
							$upload_path = "audio/default/";
							list($str1, $str2) = convert($uploaded_file, $upload_path, 0);
						}
						echo $str1;
						echo $str2;
						?>
					</div>
				</div><!--/span-->
			</div><!--/row-->
			<button type="submit" class="btn btn-primary">Convert Again!</button>
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

	</body>
</html>
