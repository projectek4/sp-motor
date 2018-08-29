<?php if (empty(print_url(3))): ?>
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="col-sm-1 text-center">No</th>
			<th class="col-sm-3 text-center">Email</th>
			<th class="col-sm-3 text-center">Nama lengkap</th>
			<th class="col-sm-3 text-center">Alamat</th>
			<th class="col-sm-2 text-center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $n=1; foreach ($list as $data): ?>
		<tr>
			<td class="col-sm-1 text-center"><?= $n++ ?></td>
			<td class="col-sm-3 text-center"><?= anchor('master/user/'.$data->id, $data->email); ?></td>
			<td class="col-sm-3 text-center"><?= $data->nama ?></td>
			<td class="col-sm-3 text-center"><?= $data->alamat ?></td>
			<td class="col-sm-2 text-center"><?= anchor('master/delete/user/'.$data->id, glyphicon('pencil').' Hapus data'); ?></td>
		</tr>	
		<?php endforeach ?>
	</tbody>
</table>
<?php else: ?>
<div class="row">
	<div class="col-sm-5">
		<?= form_open(current_url(), array('class'=>'form-square')) ?>
		<?= html_head('form registrasi pengguna', 3, array('class'=>'sub-title')) ?>
		<div class="box">
			<div class="form-group">
				<?= form_label('Alamat email'.form_error('email'), 'email'); ?>
				<?= form_hidden('id', print_url(3)) ?>
				<?= form_input(array('type'=>'email', 'class'=>'form-control', 'name'=>'email', 'id'=>'email', 'placeholder'=>'Alamat email pengguna', 'value'=>$email, 'readonly'=>'readonly')); ?>
			</div>
			<div class="form-group">
				<?= form_label('Kata sandi'.form_error('password'), 'password'); ?>
				<?= form_input(array('type'=>'password', 'class'=>'form-control', 'name'=>'password', 'id'=>'password', 'placeholder'=>'Kata sandi lama')); ?>
			</div>
			<div class="form-group">
				<?= form_label('Kata sandi baru'.form_error('new_password'), 'new_password'); ?>
				<?= form_input(array('type'=>'password', 'class'=>'form-control', 'name'=>'new_password', 'id'=>'new_password', 'placeholder'=>'Kata sandi baru')); ?>
			</div>
		</div>
		<div class="box">
			<div class="form-group">
				<?= form_label('Nama lengkap'.form_error('nama'), 'nama'); ?>
				<?= form_input(array('class'=>'form-control', 'name'=>'nama', 'id'=>'nama', 'placeholder'=>'Nama lengkap pengguna', 'value'=>$nama)); ?>
			</div>
			<div class="form-group">
				<?= form_label('Alamat lengkap'.form_error('alamat'), 'alamat'); ?>
				<?= form_textarea(array('class'=>'form-control', 'name'=>'alamat', 'id'=>'alamat', 'placeholder'=>'Nama lengkap pengguna', 'rows'=>5, 'value'=>$alamat)); ?>
			</div>
		</div>
		<div class="row" style="margin-top: 10px">
			<div class="col-sm-6">
				<?= form_button(array('type'=>'submit', 'class'=>'btn btn-primary btn-full', 'content'=>glyphicon('ok'). ' Update data')) ?>
			</div>
			<div class="col-sm-6">
				<?= form_button(array('type'=>'reset', 'class'=>'btn btn-danger btn-full', 'content'=>glyphicon('remove'). ' reset')) ?>
			</div>
		</div>
		<?= form_close(); ?>
	</div>
</div>
<?php endif ?>