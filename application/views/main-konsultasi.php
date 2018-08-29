<ol class="breadcrumb breadcrumb-arrow">
	<li><a href="#">Beranda</a></li>
	<li><a class="active" href="#"><?= $title ?></a></li>
	<!--<li class="active"><span>Data</span></li>-->
</ol>
<div class="row">
	<div class="col-sm-12">
		<h1 class="text-center">Form Pendaftaran Pasien</h1>
		<p>Silakan melengkapi formulir di bawah ini untuk melakukan konsultasi Sistem Pakar, terimakasih...</p>
		<?=form_open('konsultasi', array('class'=>'form-horizontal')) ?>
			<div class="form-group">
				<label class="control-label col-sm-3">Nama Pasien</label>
				<div class="col-sm-9"><?= form_input('nama', set_value('nama'), array('class'=>'form-control', 'placeholder'=>'masukkan nama')).form_error('nama') ?></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Umur</label>
				<div class="col-sm-9"><?= form_input(array('type'=>'number', 'class'=>'form-control', 'placeholder'=>'masukkan umur', 'name'=>'umur', 'value'=>set_value('umur'))).form_error('umur') ?></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Jenis kelamin</label>
				<div class="col-sm-9">
					<label for="kelamin-1">Laki-laki</label><?= form_radio(array('name'=>'kelamin','id'=>'kelamin-1' , 'checked'=>(set_value('kelamin')=='1'?TRUE:FALSE), 'value'=>1)) ?></label>
					<label for="kelamin-2">Perempuan</label><?= form_radio(array('name'=>'kelamin','id'=>'kelamin-2' , 'checked'=>(set_value('kelamin')=='2'?TRUE:FALSE), 'value'=>2)) ?></label>
					<?= form_error('kelamin') ?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Alamat Email</label>
				<div class="col-sm-9"><?= form_input(array('type'=>'email', 'class'=>'form-control', 'placeholder'=>'masukkan alamat email', 'name'=>'email', 'value'=>set_value('email'))).form_error('email') ?></div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-3">Alamat Rumah</label>
				<div class="col-sm-9"><?= form_textarea('alamat', set_value('alamat'), array( 'class'=>'form-control', 'placeholder'=>'Masukkan alamat rumah anda', 'rows'=>3)).form_error('alamat') ?></div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9"><?= form_button(array('type'=>'submit', 'class'=>'btn btn-primary', 'content'=>fontawesome('check').' Kirim form')) ?></div>
			</div>
		<?= form_close(); ?>
	</div>
</div>