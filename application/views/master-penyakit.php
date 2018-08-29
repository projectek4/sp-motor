<?php if (empty(print_url(3))): ?>
<!-- begin list gejala -->
<div class="row">
	<div class="col-sm-12" style="display: inline-block; margin-bottom: 10px">
		<?= anchor('master/penyakit/add', glyphicon('plus').' Tambah Data'); ?>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th class="col-sm-1 text-center">No</th>
					<th class="col-sm-2 text-center">Nama</th>
					<th class="col-sm-7 text-center">Definisi</th>
					<th class="col-sm-2 text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $n=1; foreach ($list as $data): ?>
				<tr>
					<td class="col-sm-1 text-center"><?= $n++ ?></td>
					<td class="col-sm-2"><?= anchor('master/penyakit/'.$data->id, $data->nama); ?></td>
					<td class="col-sm-7"><?= word_limiter($data->definisi, 10, '_ _ _'); ?></td>
					<td class="col-sm-2 text-center"><?= anchor('master/delete/penyakit/'.$data->id, glyphicon('trash').' Hapus kerusakan')?></td>
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
		<div class="box">
			<div class="form-group">
				<?= form_label('Nama Kerusakan'.form_error('nama'), 'nama'); ?>
				<?= form_input(array('class'=>'form-control', 'name'=>'nama', 'id'=>'nama', 'placeholder'=>'Masukkan nama kerusakan', 'value'=>set_value('nama'))); ?>
			</div>
		</div>
		<div class="box"><div class="form-group">
			<?= $this->ckeditor->editor('definisi', html_entity_decode(set_value('definisi'))) ?>
			<?= form_error('definisi') ?>
		</div></div>
		<div class="box"><div class="form-group">
			<?= $this->ckeditor->editor('pengobatan', html_entity_decode(set_value('pengobatan'))) ?>
			<?= form_error('pengobatan') ?>
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
		<?= form_open_multipart(current_url(), array('class'=>'form-square')); ?>
		<div class="box">
			<div class="form-group">
				<?= form_label('Nama Kerusakan'.form_error('nama'), 'nama'); ?>
				<?= form_hidden('id', print_url(3)) ?>
				<?= form_input(array('class'=>'form-control', 'name'=>'nama', 'id'=>'nama', 'placeholder'=>'Masukkan nama kerusakan', 'value'=>$nama)); ?>
			</div>
		</div>
		<div class="box">
			<div class="form-group">
				<?= form_label('File gambar'.(!empty($error)?$error:''), 'title'); ?>
				<input style="margin-left: 15px" type="file" name="userfile">
				<div class="row">
					<div class="col-sm-2" style="padding-left: 20px;padding-top: 5px"><?= (!empty($media)?html_media($media, 'img-responsive'):'') ?></div>				
				</div>			
			</div>
		</div>
		<div class="box"><div class="form-group">
			<?= $this->ckeditor->editor('definisi', html_entity_decode($definisi)) ?>
			<?= form_error('definisi') ?>
		</div></div>
		<div class="box"><div class="form-group">
			<?= $this->ckeditor->editor('pengobatan', html_entity_decode($pengobatan)) ?>
			<?= form_error('pengobatan') ?>
		</div></div>
			<?= form_button(array('class'=>'btn btn-primary', 'type'=>'submit'), glyphicon('check').' update data') ?>
		<?= form_close(); ?>
	</div>
</div>
<!-- end of edit gejala -->
<?php endif ?>
