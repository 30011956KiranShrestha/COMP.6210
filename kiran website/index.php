<?php
  // databaae connection
  include 'connection/connection.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>Spectral by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="landing is-preload">

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<h1><a href="index.php">TOI-OHOMAI Institute of Technology</a></h1>
						<nav id="nav">
							<ul>
								<li class="special">
									<a href="#menu" class="menuToggle"><span>Menu</span></a>
									<div id="menu">
										<ul>
											<li><a href="index.php">Home</a></li>
											<?php 
											$query_for_menu = "SELECT id, item FROM scpp";
											$statement = $conn->prepare($query_for_menu);
											$statement->execute();
											while($record=$statement->fetch(PDO::FETCH_ASSOC))
										    {
										    	extract($record);
										    	echo "<li><a href='scp.php?item={$id}'>{$item}</a></li>";
										    }

										   
										    
											?>
											<li><a href="create.php">Enter new scp file</a></li>
										</ul>
									</div>
								</li>
							</ul>
						</nav>
					</header>

				<!-- Banner -->
					<section id="banner">
						<div class="inner">
							<h2>SCP</h2>
							<p>Web Services and Design Methodologies<br /></p>
						</div>
						<a href="#one" class="more scrolly">Learn More</a>
					</section>


				<!-- Two -->
					<section id="two" class="wrapper alt style2">
						<?php 
							$query = "SELECT id, item, object_class, image, procedures FROM scpp";
							$statement = $conn->prepare($query);
							$statement->execute();
							while($record=$statement->fetch(PDO::FETCH_ASSOC))
						    {
						    	extract($record);
						    	?>
						    	<section class="spotlight">
									<div class="image">
										
										<?php
										if ($image != null) 
										{
											echo "<img src='images/{$image}'/>";
										}
										else 
										{
											echo "<img src='images/maxresdefault.jpg'/>";
										}

									?>
								</div>

									<div class="content">
										<h2><?php echo $item; ?></h2>
										<p><?php echo "Object class : ".$object_class; ?></p><!-- "."  is conccating operator to bind two string  -->
										<p><?php echo substr($procedures, 0, 250)."... <a href='scp.php?item={$id}'>View more</a>"; ?></p>
									</div>
								</section>
						    	<?php
						    }
						?>
					</section>

					<?php
					$delete=isset($_GET['action']) ? $_GET['action'] :"";


					if($delete == 'deleted')
					{
						echo "<div class='alert alert-success'>Records was deleted</div>";
					}
					?>


					

				<!-- Footer -->
					<footer id="footer">
						<ul class="icons">
							<li><a href="https://twitter.com" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="https://facebook.com" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
							<li><a href="https://instagram.com" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
						</ul>
						<ul class="copyright">
							<li>&copy; <?php echo date('Y'); ?> Kiran Shrestha (30011956) </li>
						</ul>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
	</html>
