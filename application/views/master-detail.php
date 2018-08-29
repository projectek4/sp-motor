<?php if (print_url(3) == 'penyakit'): ?>
<form action="<?= base_url(uri_string()) ?>" method="post">
	<?= form_hidden('id', print_url(4)) ?>
	<div class="form-group flat-group">
		<span class="flat-label">Nama penyakit:</span>
		<?= form_input('nama', $nama, array('class'=>'form-control', 'placeholder'=>'Nama penyakit')) ?>	
	</div>
	<div class="form-group flat-group">
		<span class="flat-label">Definisi penyakit:</span>
		<?= $this->ckeditor->editor('definisi', html_entity_decode($definisi)) ?>
		<?= form_error('definisi') ?>
	</div>
	<div class="form-group flat-group">
		<span class="flat-label">Pencegahan penyakit:</span>
		<?= $this->ckeditor->editor('pencegahan', html_entity_decode($pencegahan)) ?>
		<?= form_error('pencegahan') ?>
	</div>
	<div class="form-group flat-group">
		<span class="flat-label">Pengobatan penyakit:</span>
		<?= $this->ckeditor->editor('solusi', html_entity_decode($solusi)) ?>
		<?= form_error('solusi') ?>
	</div>
	<?= form_button(array('class'=>'btn btn-lg btn-primary', 'type'=>'submit'), 'Update data') ?>
</form>
<?php else: ?>
<form action="<?= base_url(uri_string()) ?>" method="post">
	<?= form_hidden('id', print_url(4)) ?>
	<div class="form-group flat-group">
		<span class="flat-label">Definisi gejala:</span>
		<?= $this->ckeditor->editor('definisi', html_entity_decode($definisi)) ?>
		<?= form_error('definisi') ?>
	</div>
	<div class="form-group flat-group">
		<span class="flat-label">Nilai Certainty Factor</span>
		<?= form_input(array('type'=>'number', 'name'=>'nilai', 'class'=>'form-control', 'placeholder'=>'Nilai Certainty Factor', 'value'=>$nilai)) ?>
		<?= form_error('nilai') ?>
	</div>
	<?= form_button(array('class'=>'btn btn-lg btn-primary', 'type'=>'submit'), 'Update data') ?>
</form>
<?php endif ?>


