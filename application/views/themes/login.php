<html lang="en">
	<head>
		<title>Login aplikasi</title><meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="resource-type" content="document" />
		<meta name="robots" content="all, index, follow"/>
		<meta name="googlebot" content="all, index, follow" />
    <!-- Le fav and touch icons -->
		<?= html_favicon() ?>
		<meta property="og:image" content="<?= base_url('assets/media/images/facebook-thumb.png'); ?>"/>
		<link rel="image_src" href="<?= base_url('assets/media/images/facebook-thumb.png'); ?>" />
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
?>
</head>

  <body>
  <?= $output ?>
	</body>
<!-- Js Section -->

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php foreach ($js as $file) {
	echo "\n\t\t";
	echo '<script src="'.$file.'"></script>';
}
echo "\n\t\t"; ?>
<!-- end of Js Section -->

</html>
