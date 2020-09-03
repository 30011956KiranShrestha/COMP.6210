<?php
  // databaae connection
include 'connection/connection.php';
if (!isset($_GET['item'])) {
	echo "Page not found";
	}

	if(isset($_GET['item']))
{
	$id = $_GET['item'];
	$query_heading = "SELECT item FROM scpp WHERE id = {$id}";
	$statement_heading = $conn->prepare($query_heading);
	$statement_heading->execute();
	while($record_heading=$statement_heading->fetch(PDO::FETCH_ASSOC))
    {
    	extract($record_heading);
	
	 ?>
	 <html>
		<head>
			<title><?php echo $item ?></title>
			<meta charset="utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
			<link rel="stylesheet" href="assets/css/main.css" />
			<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
		</head>
		<body class="is-preload">

			<!-- Page Wrapper -->
				<div id="page-wrapper">

					<!-- Header -->
						<header id="header">
							<h1><a href="index.php">TOI-OHOMAI Institite of Technology</a></h1>
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
											    $id = $_GET['item'];
											    echo "<li><a href='update.php?id={$id}'>Update</a></li>";
											    echo "<li><a onclick='delete_record({$id})'>delete</a></li>";
												?>
												<li><a href="create.php">Enter new scp file</a></li>
											</ul>
										</div>
									</li>
								</ul>
							</nav>
						</header>

					<!-- Main -->
						<article id="main">
							<?php 
							
							$query_heading = "SELECT * FROM scpp WHERE id = {$id}";
							$statement_heading = $conn->prepare($query_heading);
							$statement_heading->execute();
							while($record_heading=$statement_heading->fetch(PDO::FETCH_ASSOC))
						    {
						    	extract($record_heading);
								?>
								<header>
									<h2><?php echo $item; ?></h2>
									<p>Object Class: <?php echo $object_class; ?></p>
								</header>
								<section class="wrapper style5">
									<div class="inner">
										<h3>Special Containment Procedures:</h3>
										<p><?php echo $procedures; ?></p>

										

										<hr />

										<h4>Description:</h4>
										<p><?php echo $description; ?></p>
										<?php 
										if ($image != null) {
											echo "<img src='images/{$image}'/>";
										}
										 ?>

										<?php 
										if ($reference != null) {
											echo "<h5>Reference:</h5>";
											echo "<p>{$reference}</p>";
										}
										if ($addition != null) {
											echo "<h5>Addition:</h5>";
											echo "<p>{$addition}</p>";
										}
										 ?>

									</div>
								</section>
								<?php 
							}?>
						</article>

					<!-- Footer -->
						<footer id="footer">
							<ul class="icons">
								<li><a href="https://twitter.com" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="https://facebook.com" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
								<li><a href="https://intsagram.com" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
							</ul>
							<ul class="copyright">
								<li>&copy; <?php echo date('Y'); ?> Kiran</li></li>
							</ul>
						</footer>

				</div>
				<script>
						function delete_record(id)
						{
							var answer=confirm('ok to delete this record');
							if(answer)
							{
								window.location='delete.php?id=' + id;
							}
						}

					</script>
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
	 <?php
	}
}
?>