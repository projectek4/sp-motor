<ol class="breadcrumb breadcrumb-arrow">
	<li><a href="#">Beranda</a></li>
	<li><a class="active" href="#"><?= $title ?></a></li>
	<!--<li class="active"><span>Data</span></li>-->
</ol>
<h1>Hasil Analisa Sistem pakar</h1>
<div class="row">
	<div class="col-sm-8">
		<p>Daftar gejala yg dialami pasien:</p>
		<!--<ol type="1">
			<?php foreach ($gejala as $print): ?>
				<li><?= $print->keterangan ?>[  ]</li>
			<?php endforeach ?>
		</ol>-->
		<ol type="1" style="padding-left: 20px;">
			<?php for ($i=0; $i < count($gejala)-1;) { 
				$no = $i++;
				echo '<li>'.print_data('get_where', array('gejala', array('id'=>$gejala[$no])), 'keterangan').'</li>' ;
			}?>
		</ol>
	</div>
	<div class="col-sm-4"></div>
</div>



<?php 
	/*$total = '';
	for ($i=0; $i < count($gejala)-1;) { 
		$total += print_data('get_where', array('relasi', array('gejala'=>$gejala[$i++])), 'presentase');
	}*/
	$total = print_data('get_where', array('analisa', array('id'=>print_session('analisa'))), 'percaya');
	$sakit = print_data('get_where', array('analisa', array('id'=>print_session('analisa'))), 'analisa');
?>
<div class="row">
	<div class="col-sm-12">
		<p>Berdasarkan Pertanyaan-pertanyaan yg telah dijawab, dapat disimpulkan kemungkinan pasien terkena penyakit <?= print_data('get_where', array('penyakit', array('id'=>$sakit)), 'nama') ?> dengan nilai: <b><?= $total ?></b></p>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<h4>Definisi Penyakit:</h4>
		<?= print_data('get_where', array('penyakit', array('id'=>$sakit)), 'definisi') ?>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<h4>Pencegahan Penyakit:</h4>
		<?= print_data('get_where', array('penyakit', array('id'=>$sakit)), 'pencegahan') ?>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<h4>Penanganan Penyakit:</h4>
		<?= print_data('get_where', array('penyakit', array('id'=>$sakit)), 'solusi') ?>
	</div>
</div>