<?php if (print_url(2) == 'penyakit'): ?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">Nama Penyakit</th>
			<th class="text-center">Definisi penyakit</th>
			<th class="text-center">Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php $n=1; ?>
	<?php foreach ($daftar as $key): ?>
		<tr>
			<td class="text-center"><?= $n++ ?></td>
			<td><b><?= $key->nama ?></b></td>
			<td><?= word_limiter($key->definisi, 8, '</p>') ?></td>
			<td>
				<?= anchor('master/detail/penyakit/'.$key->id, 'Edit', array('clas'=>'btn btn-info btn-sm')); ?>
				<?= anchor('master/delete/penyakit/'.$key->id, 'Hapus', array('clas'=>'btn btn-info btn-sm')); ?>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
<?php elseif(print_url(2) == 'gejala'): ?>
<table class="table table-bordered">
	<thead>
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">Definisi gejala</th>
			<th class="text-center">Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php $n=1; ?>
	<?php foreach ($daftar as $key): ?>
		<tr>
			<td class="text-center"><?= $n++ ?></td>
			<td><?= word_limiter($key->keterangan, 8, '</p>') ?></td>
			<td>
				<?= anchor('master/detail/gejala/'.$key->id, 'Edit', array('clas'=>'btn btn-info btn-sm')); ?>
				<?= anchor('master/delete/gejala/'.$key->id, 'Hapus', array('clas'=>'btn btn-info btn-sm')); ?>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
<?php endif ?>