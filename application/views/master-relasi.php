<?php if (empty(print_url(3))): ?>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="col-sm-1 text-center">No</th>
			<th class="col-sm-9 text-center">Jenis Kerusakan</th>
			<th class="col-sm-2 text-center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $n=1; foreach ($list as $data): ?>
		<tr>
			<td class="col-sm-1 text-center"><?= $n++ ?></td>
			<td class="col-sm-9">
			<?= $data->nama ?> (
				<?php foreach ($this->app_model->get_where('relasi', array('penyakit'=>$data->id, 'active'=>1))->result() as $print): ?>
					<?= $print->gejala ?>
				<?php endforeach ?>)
			</td>
			<td class="col-sm-2 text-center"><?= anchor('master/relasi/'.$data->id, glyphicon('pencil').' Edit relasi'); ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
<?php else: ?>
<div class="row">
	<?= form_open(current_url()); ?>
	<?= form_hidden('id', print_url(3)); ?>
	<div class="col-sm-12">
		<p>Berikut ini daftar gejala-gejala kerusakan motor:</p>
		<?php foreach ($list as $data): ?>
		<div class="checkbox"><label><input <?= (print_data('get_where', array('relasi', array('penyakit'=>print_url(3), 'gejala'=>$data->id)), 'active') == 1?'checked':'') ?> type="checkbox" name="gejala[]" value="<?= $data->id ?>"> <?=$data->keterangan?></label></div>
		<?php endforeach ?>
	</div>
	<div class="col-sm-12">
		<?= form_button(array('class'=>'btn btn-primary', 'type'=>'submit'), glyphicon('check').' Simpan relasi') ?>
	</div>
	<?= form_close(); ?>
</div>
<?php endif ?>

