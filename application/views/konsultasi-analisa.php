<style type="text/css">
	p {
		display: inline;
	}
</style>
<div class="row">
	<div class="col-sm-12">
		<p>Berikut ini adalah daftar gejala-gejala yang telah anda inputkan:</p>
		<ol style="padding-left: 15px;">
			<?php foreach ($gejala as $key => $value): 
				if ($percaya[$key] != 0) {
					echo '<li style="padding-left:12px">'.print_data('get_where', array('gejala', array('id'=>$value)), 'keterangan').' ('.$percaya[$key].')</li>';
				}
			 endforeach ?>
		</ol>
		<p style="margin-top: 10px">Berdasakan perhitungan Certainty Factor, maka dapat disimpulkan kendaran anda mengalami kerusakan: <b><?= $analisa?></b>,</p>
		<?php $n=1; foreach ($gejala as $print => $value): ?>
		<div class="row">
			<div class="col-md-12">
				<?php $penyakit = print_data('get_where', array('relasi', array('gejala'=>$value, 'active'=>1)), 'penyakit'); ?>
				<h4><?= $n++.' '.print_data('get_where', array('penyakit', array('id'=>$penyakit)), 'nama') ?></h4>
				<div class="row">
					<div class="col-md-3"><?= html_media(print_data('get_where', array('penyakit', array('id'=>$penyakit)), 'media'), 'img-responsive img-thumbnail') ?></div>
					<div class="col-md-9"><?= print_data('get_where', array('penyakit', array('id'=>$penyakit)), 'definisi') ?></div>
					<div class="col-md-12">
						<h5>Penanganan:</h5>
						<?= print_data('get_where', array('penyakit', array('id'=>$penyakit)), 'pengobatan') ?>
					</div>
				</div>
			</div>
		</div>
		<?php endforeach ?>
		<!--<div class="row">
			<div class="col-sm-3"></div>
		</div>-->
		<!--<div style="position: relative;width: 100%; margin-top: 15px">
			<?= $definisi ?>
		</div>
		<div class="row" style="margin-top: 15px;">
			<div class="col-sm-12">
				<p>adapun penanganannya adalah sebagai berikut:</p></br>
				<?= $penanganan ?>
			</div>
		</div>-->
	</div>
	<!--<div class="col-sm-4"><?= html_media($media, 'img-responsive img-thumbnail') ?></div>-->
</div>



