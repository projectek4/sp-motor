<div class="row">
	<div class="col-sm-12">
		<?= form_open_multipart(current_url(), array('class'=>'form-square')); ?>
		<div class="box">
			<div class="form-group">
				<?= form_label('Judul artikel'.form_error('title'), 'title'); ?>
				<?= form_hidden('url', print_url(3)); ?>
				<?= form_input(array('class'=>'form-control', 'name'=>'title', 'id'=>'title', 'placeholder'=>'Masukkan judul artikel', 'value'=>$title)); ?>
			</div>
			<div class="form-group">
				<?= form_label('File gambar'.(!empty($error)?$error:''), 'title'); ?>
				<input style="margin-left: 15px" type="file" name="userfile">				
			</div>
		</div>
		<div class="box"><div class="form-group">
		<div style="width: 30%; padding: 7px 15px">
			<?= html_media(print_data('get_where', array('posting', array('url'=>print_url(3))), 'media'), 'img-responsive') ?>
		</div></div></div>
		<div class="box"><div class="form-group">
			<?= $this->ckeditor->editor('content', html_entity_decode($content)) ?>
		</div></div>
		
			<?= form_button(array('class'=>'btn btn-primary', 'type'=>'submit'), glyphicon('check').' Update data') ?>
		
		<?= form_close(); ?>
	</div>
</div>