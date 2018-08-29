<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Umur</th>
			<th>kelamin</th>
			<th>Email</th>
			<th>Alamat</th>
			<th>Tanggal</th>
			<th>Hasil</th>
		</tr>
	</thead>
	<tbody>
		<?php $n=1; foreach ($list as $print): ?>
		<tr>
			<td><?= $n++ ?></td>
			<td><?= $print->nama ?></td>
			<td><?= $print->umur ?></td>
			<td><?= ($print->kelamin == 1?'L':'P') ?></td>
			<td><?= $print->email ?></td>
			<td><?= $print->alamat ?></td>
			<td><?= short_date($print->date) ?></td>
			<td><?= print_data('get_where', array('penyakit', array('id'=>$print->analisa)), 'nama') ?></td>
			<td><?=anchor('guestbook/'.$print->id, 'Baca') ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
