<?php if (empty(print_url(3))): ?>
<!-- begin list gejala -->
<div class="row">
	<div class="col-sm-12" style="display: inline-block; margin-bottom: 10px">
		<?= anchor('master/gejala/add', glyphicon('plus').' Tambah Data'); ?>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th class="col-sm-1 text-center">No</th>
					<th class="col-sm-9 text-center">Value</th>
					<th class="col-sm-2 text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $n=1; foreach ($list as $data): ?>
				<tr>
					<td class="col-sm-1 text-center"><?= $n++ ?></td>
					<td class="col-sm-9"><?= anchor('master/gejala/'.$data->id, word_limiter($data->keterangan, 10, '_ _ _')); ?></td>
					<td class="col-sm-2 text-center"><?= anchor('master/delete/gejala/'.$data->id, glyphicon('trash').' Hapus gejala')?></td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
<!-- end of list gejala -->
<?php elseif(print_url(3) == 'add'): ?>
<!-- begin add gejala -->
<div class="row">
	<div class="col-sm-12">
		<?= form_open(current_url(), array('class'=>'form-square')); ?>
		<div class="box"><div class="form-group">
			<?= $this->ckeditor->editor('keterangan', html_entity_decode(set_value('keterangan'))) ?>
			<?= form_error('keterangan') ?>
		</div></div>
			<?= form_button(array('class'=>'btn btn-primary', 'type'=>'submit'), glyphicon('check').' Save data') ?>
		<?= form_close(); ?>
	</div>
</div>
<!-- end of add gejala -->
<?php else: ?>
<!-- begin edit gejala -->
<div class="row">
	<div class="col-sm-12">
		<?= form_open(current_url(), array('class'=>'form-square')); ?>
		<div class="box"><div class="form-group">
			<?= form_hidden('id', print_url(3)) ?>
			<?= $this->ckeditor->editor('keterangan', html_entity_decode($keterangan)) ?>
			<?= form_error('keterangan') ?>
		</div></div>
			<?= form_button(array('class'=>'btn btn-primary', 'type'=>'submit'), glyphicon('check').' update data') ?>
		<?= form_close(); ?>
	</div>
</div>
<!-- end of edit gejala -->
<?php endif ?>
