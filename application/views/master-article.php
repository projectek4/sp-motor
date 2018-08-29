<div class="row">
	<div class="col-sm-12" style="display: inline-block; margin-bottom: 10px">
		<?= anchor('master/add', glyphicon('plus').' Tambah Data'); ?>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th>No</th>
					<th>Title</th>
					<th>Category</th>
					<th>Posting</th>
					<th>Modified</th>
					<th>Author</th>
					<th>View</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php $n=1; foreach ($list as $data): ?>
				<tr>
					<td><?= $n++ ?></td>
					<td><?= anchor('master/edit/'.$data->url, $data->title); ?></td>
					<td><?= $data->category ?></td>
					<td><?= $data->date_posting ?></td>
					<td><?= $data->date_modified ?></td>
					<td><?= $data->author ?></td>
					<td><?= $data->view ?></td>
					<td><?= anchor('master/delete/posting/'.$data->id, glyphicon('trash').' Hapus')?></td>
				</tr>
			<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>