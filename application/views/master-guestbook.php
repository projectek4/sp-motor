<?php if (empty(print_url(2))): ?>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal Kirim</th>
				<th>Pengirim</th>
				<th>Email</th>
				<th>Pesan</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php $n=1; foreach ($list as $print): ?>
			<tr>
				<td><?= $n++ ?></td>
				<td><?= short_date($print->date) ?></td>
				<td><?= $print->nama ?></td>
				<td><?= $print->email ?></td>
				<td><?= word_limiter($print->content) ?></td>
				<td><?=anchor('guestbook/'.$print->id, 'Baca') ?></td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
<?php else: ?>
	<table class="table table-bordered">
		<tbody>
		<?php foreach ($detail as $print): ?>
			<tr>
				<td>Nama Pengirim</td>
				<td><?= $print->nama ?></td>
			</tr>
			<tr>
				<td>Tanggal Kirim</td>
				<td><?=full_date($print->date) ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?= $print->email ?></td>
			</tr>
			<tr>
				<td>Isi pesan</td>
				<td><p style="font-style: italic;"><?= $print->content ?></p></td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
<?php endif ?>