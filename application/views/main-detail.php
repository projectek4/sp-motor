<?php foreach ($detail as $print): ?>
<div class="row detail-article">
	<div class="col-sm-12">
		<?= html_head($print->title, 2) ?>
		<span><?= full_date($print->date_posting) ?> <i><?= print_data('get_where', array('posting_category', array('id'=>$print->category)), 'name') ?></i></span>
	</div>
	<!--<div class="col-sm-12"></div>
	<div class="col-sm-12"><h2>Article Title</h2></div>-->
	<div class="col-sm-12">
			<div class="media-box">
				<?= html_media($print->media, 'img-responsive') ?>
				<?= html_media('f313074df0a3210dc7ca4b7e97f7491c--woman-portrait-bw-portrait.jpg', 'user-picture') ?>
			</div>
			<?= $print->content ?>
	</div>
</div>
<?php endforeach ?>
