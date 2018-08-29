<html lang="en">
	<head>
		<title>Sistem Pakar<?= $title; ?></title><meta charset="utf-8">
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
  <span class="top-title">
  	<h1>Sistem Pakar Penyakit Radang Tenggorokan Pada Balita</h1>
  </span>
<nav class="navbar navbar-default">
	<!-- Brand and toggle get grouped for better mobile display -->
	<!--<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Brand</a>
	</div>-->
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="container">
	<div class="navbar-collapse navbar-right">
		<ul class="nav navbar-nav">
			<li><?= anchor('halaman-utama.html', html_media('1499325156_hospital.png').' Beranda'); ?></li>
			<li><?= anchor('profil-rumah-sakit.html', html_media('1499325166_medical_suitecase.png').' Profil'); ?></li>
			<li><?= (is_login()?anchor('pakar/penyakit', html_media('1499325143_stethoscope.png').' Pakar'):anchor('konsultasi', html_media('1499325143_stethoscope.png').' Konsultasi')); ?></li>
			<li><?= (is_login()?anchor('guestbook', html_media('1499330834_plant_no_shadwo.png').' Kotak saran'):anchor('kontak-kami.html', html_media('1499330834_plant_no_shadwo.png').' Tentang Kami')); ?></li>
			<?=(is_login()?'<li>'.anchor('logout', html_media('if_logout_63128.png').' Sign Out').'</li>':''); ?>
		</ul>
		</div><!-- /.navbar-collapse -->
	</div>

	</nav>
  <div class="container">
		<div class="row">
			<div class="col-sm-3">
			<div class="side-panel"><h2>Menu Pakar</h2>
			<ul class="pakar-side-menu">
			<?php if (print_url(1) == 'guestbook' OR print_url(1) == 'pengunjung'): ?>
				<li><?= anchor('pengunjung', 'Daftar Pengguna'); ?></li>
				<li><?= anchor('guestbook', 'Kotak Saran'); ?></li>
			<?php else: ?>
				<li><?= anchor('pakar/penyakit', 'Master Penyakit'); ?></li>
				<li><?= anchor('pakar/gejala', 'Master Gejala'); ?></li>
				<!--<li><?= anchor('pakar/relasi', 'Relasi Penyakit'); ?></li>-->
				<li><?= anchor('pakar/grafik', 'Grafik Pengunjung'); ?></li>
			<?php endif ?>
			</ul>
			</div>
			</div>
			<div style="min-height: 800px" class="col-sm-9"><?= $output ?></div>
		</div>

      <footer>
      	<div class="row">
	        <div class="col-sm-12">
				Copyright &copy;2017 || Sistem Pakar Penyakit Radang Tenggorokan Pada Balita
	        </div>
        </div>
        <a class="back-top" href="#">Back to Top</a>
      </footer>

  </div>
  <?= html_media('doctor-checklist-medical-cartoon-characters_fkEqkJdO_M.jpg', 'fixed-img') ?>
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

<script type="text/javascript">
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);
	function drawChart() {
		var data = new google.visualization.DataTable();
		data.addColumn('date', 'Tanggal');
		data.addColumn('number', 'Jumlah Pasien');
		data.addRows([
			<?php
		foreach ($this->app_model->distinct_analisa_month()->result() as $key) {
			$val = $this->app_model->count_rows('analisa', array('day(date)'=>$key->tanggal,'month(date)'=>date('m'), 'year(date)'=>date('Y')));
			$month = date('m')-1;
			echo "[new Date(2017, {$month}, {$key->tanggal}), {$val}],";
		}
			?>
			]);
		var options = {
			/*title: 'Grafik Pasien Bulan <?= id_bulan(date('m')).' '.date('Y') ?> ',*/
			width: '100%',
			backgroundColor: { fill:'transparent' },
			legend: {position: 'none'},
			tooltip: {isHtml: true},
			hAxis: { title: 'Tanggal', format:'d' },
			vAxis: { title: 'Pasien' },
			colors: ['#F15352'],
			lineWidth: 2,
		};
		var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
		chart.draw(data, options);
	}
</script>
</html>
