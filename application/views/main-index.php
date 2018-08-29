<div class="row">
	<div class="col-sm-8">
		<h3 class="sub-title">Grafik Kerusakan Motor</h3>
		<div id="chart_div1" style="position: relative; width: 100%; min-height: 450px; margin-bottom: 20px"></div>
		<?php foreach ($list as $print): ?>
		<a class="article-panel" href="<?= base_url('baca/'.$print->url) ?>" title="<?= $print->title ?>">
			<div class="article-box">
				<div class="col-sm-3">
					<?= html_media($print->media, 'img-responsive') ?>
				</div>
				<div class="col-sm-9">
					<?= html_head($print->title, 2) ?>
					<?= word_limiter($print->content, 20, '</p>') ?>
					<span><?= full_date($print->date_posting) ?></span><i><?= print_data('get_where', array('posting_category', array('id'=>$print->category)), 'name') ?></i>
				</div>
			</div>
		</a>
		<?php endforeach ?>
	</div>
	<div class="col-sm-4">
		<h3 class="sub-title">kategori Artikel</h3>
		<div class="side-container">
			<ul type="1">
				<li>uncategoriez</li>
			</ul>
		</div>
		<h3 class="sub-title">komentar terbaru</h3>
		<div class="side-container">
			<p class="text-center">(tidak ada komentar)</p>
		</div>
		<h3 class="sub-title">tag artikel</h3>
		<div class="side-container">
			<span class="tag">tag1</span>
			<span class="tag">tag2</span>
		</div>
		<h3 class="sub-title">media sosial</h3>
		<div class="side-container">
			<?= anchor('#', fontawesome('facebook'). '<span>LIKE</span>', array('class'=>'btn btn-primary btn-social')); ?>
			<?= anchor('#', fontawesome('twitter'). '<span>Ikuti kami</span>', array('class'=>'btn btn-info btn-social')); ?>
			<?= anchor('#', fontawesome('youtube-play'). '<span>berlangganan</span>', array('class'=>'btn btn-danger btn-social')); ?>
		</div>
	</div>
</div>

<!--
	<div class="row">
			<div class="col-sm-5">
		<?= form_open(current_url(), array('class'=>'form-square')) ?>
		<label class="sub-title">Sub Judul</label>
		<div class="box">
			<div class="form-group">
				<?= form_label('Text label'.'<span class="text-error">ini error</span>', 'nama'); ?>
				<?= form_input(array('class'=>'form-control', 'name'=>'nama', 'id'=>'nama', 'placeholder'=>'Placeholder nama')); ?>
			</div>
			<div class="form-group">
				<?= form_label('Password Field', 'nama'); ?>
				<?= form_input(array('type'=>'password', 'class'=>'form-control', 'name'=>'nama', 'id'=>'nama', 'placeholder'=>'Placeholder nama')); ?>
			</div>
		</div>
		<?= form_close(); ?>
	</div>
</div>
-->

<script type="text/javascript">
google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart1);
function drawChart1() {
	var data = google.visualization.arrayToDataTable([
		['Kerusakan', 'Kasus', { role: 'style' }],
		<?php foreach ($chart as $print): ?>
			['<?= $print->nama ?>', <?= $print->jumlah ?>, '<?= $print->color ?>'],
		<?php endforeach ?>
	]);
	var options = {
		backgroundColor: {fill: 'transparent'},
		title: '',
		hAxis: {title: 'Jenis kerusakan'},
		legend: { position: "none" }
	};
	var chart = new google.visualization.ColumnChart(document.getElementById('chart_div1'));
	chart.draw(data, options);
}
$(window).resize(function(){
	drawChart1();
});
// Reminder: you need to put https://www.google.com/jsapi in the head of your document or as an external resource on codepen //
</script>