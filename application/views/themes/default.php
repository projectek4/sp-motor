<html lang="en">
	<head>
		<title>Sistem Pakar<?= $title; ?></title>
		<!-- Le fav and touch icons -->
		<?= html_favicon() ?>
		<link rel="image_src" href="<?= base_url('assets/media/images/facebook-thumb.png'); ?>"/>
		<?php
		/** -- Copy from here -- */
		if(!empty($meta))
		foreach($meta as $name=>$content){
			echo "\n\t\t";
			?><meta name="<?= $name; ?>" content="<?= $content; ?>" /><?php
				 }
		echo "\n";

		if(!empty($canonical))
		{
			echo "\n\t\t";
			?><link rel="canonical" href="<?= $canonical; ?>" /><?php

		}
		echo "\n\t";

		foreach($css as $file){
		 	echo "\n\t\t";
			?><link rel="stylesheet" href="<?= $file; ?>" type="text/css" /><?php
		} echo "\n\t";	

		foreach($less as $file){
		 	echo "\n\t\t";
			?><link rel="stylesheet" href="<?= $file; ?>" type="text/less" /><?php
		} echo "\n\t";

		/** -- to here -- */

		/* Js Section */
		foreach ($js as $file) {
			echo "\n\t\t";
			echo '<script src="'.$file.'"></script>';
		}
		echo "\n\t\t"; ?>
		<!-- end of Js Section -->
		<style type="text/css">
			p {
				display: block;
			}
		</style>
	</head>
<body>
<div class="container">
	<header>
		<h1 class="text-center" style="padding-top: 40px;padding-bottom: 40px">Bengkel "Candra Motor Tayu"</h1>
	</header>
	<nav class="navbar navbar-default">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Brand</a>
		</div>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?= navbar($active) ?>
		</div>
	</nav>
	<?= $breadcrumb ?>
	<div style="min-height: 600px;">
		<?= $output ?>
	</div>
</div>
<footer>
<?= website('footer') ?>
</footer>
	
</body>
</html>
