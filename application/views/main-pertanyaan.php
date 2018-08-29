<ol class="breadcrumb breadcrumb-arrow">
	<li><a href="#">Beranda</a></li>
	<li><a class="active" href="#"><?= $title ?></a></li>
	<!--<li class="active"><span>Data</span></li>-->
</ol>
<h1>Daftar Pertanyaan</h1>
<div class="panel panel-default">
	<div class="panel-body">
		<?= $pertanyaan ?>
	</div>
	<div class="panel-footer">
		<?= form_open('konsultasi/pertanyaan') ?>
		<?= form_hidden('gejala', $id) ?>
		<?= form_button(array('type'=>'submit', 'name'=>'button', 'value'=>1, 'class'=>'btn btn-primary', 'content'=>fontawesome('check').' Ya (Y)')) ?>
		<?= form_button(array('type'=>'submit', 'name'=>'button', 'value'=>0, 'class'=>'btn btn-warning', 'content'=>fontawesome('close').' Tidak (T)')) ?>
		<?= form_close() ?>
	</div>
</div>
