<div class="row">
	<div class="col-sm-9">
		<?= form_open('konsultasi/send_konsultasi'); ?>
		<ul class="konsultasi-index" type="1" style="padding-left: 0;list-style-type: none;">
			<?php $n=1; foreach ($gejala as $print): ?>
			<li><div class="row">
				<div class="col-sm-9 value">
					<?= '<p>'.$n++.'. '.substr($print->keterangan, 3) ?>
				</div>
				<div class="col-sm-3">
					<?= form_hidden('input['.$print->id.'][gejala]', $print->id); ?>
					<?= opsi_gejala($print->id) ?>
				</div>
			</div></li>
			<?php endforeach ?>
		</ul>
		<?= form_button(array('type'=>'submit', 'class'=>'btn btn-primary', 'content'=>glyphicon('check'). ' Analisa kerusakan')) ?>
		<?= form_close(); ?>
	</div>
</div>