<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		
		$this->load->database();
		$this->load->helper(array('html', 'app', 'url'));
		$this->load->model('app_model');
		$this->_init();
	}
	private function _init()
	{
		if(!is_login() && empty(print_session('admin')))
			redirect('login.php','refresh');

		$this->output->set_template('default');

		meta(array('http-equiv'=>'X-UA-Compatible', 'content'=>'IE-edge'));
		meta('viewport', 'width=device-width, initial-scale=1');
		meta('resource-type', 'document');
		meta('robots', 'all, index, follow');
		meta('googleboot', 'all, index, follow');

		//$this->load->css('style.min.css');
		$this->load->less('bootstrap-3.3.7/less/bootstrap.less');
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css');
		$this->load->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
		$this->load->js('https://code.jquery.com/jquery-2.2.4.min.js');
		$this->load->js('bootstrap-3.3.7/dist/js/bootstrap.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js');
		$this->load->js('custom.js');
	}
	public function index()
	{
		redirect('master/article','refresh');
	}
	/* ckeditor config */
	function editor($width,$height) {
		$this->ckeditor->basePath 					= base_url('assets/ckeditor/');
		$this->ckeditor->config['toolbar']	= 'Basic';
		$this->ckeditor->config['language'] = 'en';
		$this->ckeditor->config['width'] 		= $width;
		$this->ckeditor->config['height'] 	= $height;

		/* edit config.php di assets/ckfinder/config.php line 64 */
		
		$this->ckfinder->SetupCKEditor($this->ckeditor, '../../assets/ckfinder');
	}
	public function article()
	{
		$data['active'] 		= 'master/article';
		$data['breadcrumb'] = breadcrumb(array('master'=>glyphicon('home'). ' Master'), 'Article & page management');
		$data['list'] 			= $this->app_model->article()->result();

		$this->load->view('master-article', $data);
	}
	public function add()
	{
		$this->load->library(array('form_validation', 'ckeditor', 'ckfinder', 'upload'));
		$this->load->helper(array('text', 'form'));

		$width 	= '100%';
		$height = '400px';
		$this->editor($width,$height);

		$config['upload_path']          = './assets/media/images/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$this->upload->initialize($config);

		$this->form_validation->set_rules('title', 'judul artikel', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('content', 'konten artikel', 'trim|required|min_length[30]');
		$this->form_validation->set_error_delimiters('<div class="error text-danger" style="font-size:11px;"><i>', '</i></div>');

		if ($this->form_validation->run() == TRUE) {
			/* if not post upload image */
			if(! $this->upload->do_upload('userfile')) {
				$data['active'] 		= 'master/article';
				$data['breadcrumb'] = breadcrumb(array('master/article'=>glyphicon('home'). ' Beranda'), 'Tambah Data Artikel');
				$data['error'] 			= $this->upload->display_errors('<div class="error text-danger" style="font-size:11px;"><i>', '</i></div>');

				$this->load->view('master-add', $data);
			} else {
				/* upload image begin */
				$data = array('id'=>$this->app_model->create_id('posting'),
					'url'=>str_replace(' ', '-', word_limiter($this->input->post('title'), 4, '.html')), 'title'=>$this->input->post('title'), 'date_posting'=>date('Y-m-d H:i:s'), 'content'=>$this->input->post('content'), 'author'=>print_session('id'), 'media'=>$this->upload->data('file_name'), 'type'=>'article');
				$this->app_model->add_field('posting', $data);

				redirect('master/article','refresh');
				/* upload image end */
			}
		} else {
			$data['active'] 		= 'master/article';
			$data['breadcrumb'] = breadcrumb(array('master/article'=>glyphicon('home'). ' Beranda'), 'Tambah Data Artikel');
			$this->load->view('master-add', $data);
		}
	}
	public function edit()
	{
		$this->load->library(array('form_validation', 'ckeditor', 'ckfinder', 'upload'));
		$this->load->helper('form', 'ckeditor');

		$width 	= '100%';
		$height = '400px';
		$this->editor($width,$height);

		$config['upload_path']          = './assets/media/images/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$this->upload->initialize($config);

		$this->form_validation->set_rules('title', 'judul artikel', 'trim|required|min_length[5]');
		$this->form_validation->set_rules('content', 'konten artikel', 'trim|required|min_length[30]');
		$this->form_validation->set_error_delimiters('<div class="error text-danger" style="font-size:11px;"><i>', '</i></div>');

		if ($this->form_validation->run() == TRUE) {
			/* if not post upload image */
			if(! $this->upload->do_upload('userfile')) {
				if (empty($this->upload->data('file_name'))) {
					/* empty file */
					$data = array('title'=>$this->input->post('title'), 'content'=>$this->input->post('content'), 'date_modified'=>date('Y-m-d H:i:s'), 'author'=>print_session('id'));
					$id 	= array('url'=>$this->input->post('url'));
					$this->app_model->update_field('posting', $data, $id);

					redirect('master/article','refresh');
					/* empty file */
				} else {
					$data['active'] 		= 'master/article';
					$data['breadcrumb'] = breadcrumb(array('master/article'=>glyphicon('home'). ' Beranda'), print_data('get_where', array('posting', array('url'=>print_url(3))), 'title'));
					$data['title'] 			= ($this->input->post('title')?set_value('title'):print_data('get_where', array('posting', array('url'=>print_url(3))), 'title'));
					$data['content'] 		= ($this->input->post('content')?set_value('content'):print_data('get_where', array('posting', array('url'=>print_url(3))), 'content'));
					$data['error'] 			= $this->upload->display_errors('<div class="error text-danger" style="font-size:11px;"><i>', '</i></div>');

					$this->load->view('master-edit', $data);
				}
			} else {
					$data = array('title'=>$this->input->post('title'), 'content'=>$this->input->post('content'), 'date_modified'=>date('Y-m-d H:i:s'), 'author'=>print_session('id'), 'media'=>$this->upload->data('file_name'));
					$id 	= array('url'=>$this->input->post('url'));

					$this->app_model->update_field('posting', $data, $id);
					redirect('master/article','refresh');
			}
		} else {
			$data['active'] 		= 'master/article';
			$data['breadcrumb'] = breadcrumb(array('master/article'=>glyphicon('home'). ' Beranda'), print_data('get_where', array('posting', array('url'=>print_url(3))), 'title'));
			$data['title'] 			= ($this->input->post('title')?set_value('title'):print_data('get_where', array('posting', array('url'=>print_url(3))), 'title'));
			$data['content'] 		= ($this->input->post('content')?set_value('content'):print_data('get_where', array('posting', array('url'=>print_url(3))), 'content'));

			$this->load->view('master-edit', $data);
		}
	}
	public function gejala()
	{
		$this->load->library(array('form_validation', 'ckeditor', 'ckfinder'));
		$this->load->helper(array('form', 'text'));

		$width 	= '100%';
		$height = '200px';
		$this->editor($width,$height);

		$this->form_validation->set_rules('keterangan', 'definisi gejala', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="error text-danger" style="font-size:14px;display:inline-block;padding: 7px 15px;">', '</div>');

		$data['active'] 		= 'master';
		$data['breadcrumb'] = breadcrumb(array('master/article'=>glyphicon('home'). ' Beranda'), 'Master Gejala');
		/* list gejala */
		if(empty(print_url(3))) {
			$data['list']	= $this->app_model->get_all('gejala')->result();

			$this->load->view('master-gejala', $data);
		}
		/* add form */
		elseif (print_url(3) == 'add') {
			$gejala = $this->app_model->create_id('gejala');
			if ($this->form_validation->run() == TRUE) {
								/* cek tabel relasi */
				foreach ($this->app_model->get_all('penyakit')->result() as $data) {
					$this->app_model->add_field('relasi', array('penyakit'=>$data->id, 'gejala'=>$gejala));
				}
				$this->app_model->add_field('gejala_opsi', array('gejala'=>$gejala, 'opsi'=>'Tidak', 'value'=>0));
				$this->app_model->add_field('gejala_opsi', array('gejala'=>$gejala, 'opsi'=>'Tidak tahu', 'value'=>0.1));
				$this->app_model->add_field('gejala_opsi', array('gejala'=>$gejala, 'opsi'=>'Sedikit yakin', 'value'=>0.5));
				$this->app_model->add_field('gejala_opsi', array('gejala'=>$gejala, 'opsi'=>'Yakin', 'value'=>1));
				/* add data */
				$data = array('id'=>$gejala, 'keterangan'=>$this->input->post('keterangan'));
				if($this->app_model->add_field('gejala', $data))
					redirect('master/gejala','refresh');
			} else {
				$this->load->view('master-gejala', $data);
			}
		}
		/* edit form */ 
		else {
			if ($this->form_validation->run() == TRUE) {
				$data = array('keterangan'=>$this->input->post('keterangan'));
				$id 	= array('id'=>$this->input->post('id'));

				if($this->app_model->update_field('gejala', $data, $id))
					redirect('master/gejala','refresh');
			} else {
				$data['keterangan'] = ($this->input->post('keterangan')?set_value('keterangan'):print_data('get_where', array('gejala', array('id'=>print_url(3))), 'keterangan'));

				$this->load->view('master-gejala', $data);
			}
		}

	}
	public function penyakit()
	{
		$this->load->library(array('form_validation', 'ckeditor', 'ckfinder','upload'));
		$this->load->helper(array('form', 'text'));

		$width 	= '100%';
		$height = '200px';
		$this->editor($width,$height);


		$this->form_validation->set_rules('nama', 'keterangan kerusakan', 'trim|required');
		$this->form_validation->set_rules('definisi', 'definisi kerusakan', 'trim|required');
		$this->form_validation->set_rules('pengobatan', 'cara memperbaiki', 'trim|required');
		$this->form_validation->set_error_delimiters('<div class="error text-danger" style="font-size:14px;display:inline-block;padding: 7px 15px;">', '</div>');

		$data['active'] 		= 'master';
		$data['breadcrumb'] = breadcrumb(array('master/article'=>glyphicon('home'). ' Beranda'), 'Master Kerusakan');
		/* list gejala */
		if(empty(print_url(3))) {
			$data['list']	= $this->app_model->get_all('penyakit')->result();

			$this->load->view('master-penyakit', $data);
		}
		/* add form */
		elseif (print_url(3) == 'add') {
			if ($this->form_validation->run() == TRUE) {
				$penyakit = $this->app_model->create_id('penyakit');

				/* cek relasi */
				foreach ($this->app_model->get_all('gejala')->result() as $data) {
					if($this->app_model->check_exist('relasi', array('penyakit'=>$penyakit, 'gejala'=>$data->id)) == FALSE)
						$this->app_model->add_field('relasi', array('penyakit'=>$penyakit, 'gejala'=>$data->id));
				}

				$data = array('id'=>$penyakit, 'nama'=>$this->input->post('nama'), 'definisi'=>$this->input->post('definisi'), 'pengobatan'=>$this->input->post('pengobatan'));
				/* add data */
				if($this->app_model->add_field('penyakit', $data))
					redirect('master/penyakit','refresh');
			} else {
				$this->load->view('master-penyakit', $data);
			}
		}
		/* edit form */ 
		else {
			if ($this->form_validation->run() == TRUE) {
				$config['upload_path']          = './assets/media/images/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['max_size']             = 100;
				$config['max_width']            = 3000;
				$config['max_height']           = 3000;
				$this->upload->initialize($config);

				$data = array();
				if($this->upload->do_upload('userfile')) {
					$data = array('nama'=>$this->input->post('nama'), 'definisi'=>$this->input->post('definisi'), 'pengobatan'=>$this->input->post('pengobatan'), 'media'=>$this->upload->data('file_name'));
					$id 	= array('id'=>$this->input->post('id'));

				if($this->app_model->update_field('penyakit', $data, $id))
					redirect('master/penyakit','refresh');
				} else {
					$data['active'] 		= 'master';
					$data['breadcrumb'] = breadcrumb(array('master/penyakit'=>glyphicon('home'). ' Beranda'), print_data('get_where', array('posting', array('url'=>print_url(3))), 'nama'));
					$data['error'] 			= $this->upload->display_errors('<div class="error text-danger" style="font-size:11px;"><i>', '</i></div>');
					$data['nama'] = ($this->input->post('nama')?set_value('nama'):print_data('get_where', array('penyakit', array('id'=>print_url(3))), 'nama'));
					$data['media'] = ($this->input->post('userfile')?$this->upload->data('file_name'):print_data('get_where', array('penyakit', array('id'=>print_url(3))), 'media'));
					$data['definisi'] = ($this->input->post('definisi')?set_value('definisi'):print_data('get_where', array('penyakit', array('id'=>print_url(3))), 'definisi'));
					$data['pengobatan'] = ($this->input->post('pengobatan')?set_value('pengobatan'):print_data('get_where', array('penyakit', array('id'=>print_url(3))), 'pengobatan'));
					$this->load->view('master-penyakit', $data);
				}			
			} else {
				$data['nama'] = ($this->input->post('nama')?set_value('nama'):print_data('get_where', array('penyakit', array('id'=>print_url(3))), 'nama'));
				$data['media'] = ($this->input->post('userfile')?$this->upload->data('file_name'):print_data('get_where', array('penyakit', array('id'=>print_url(3))), 'media'));
				$data['definisi'] = ($this->input->post('definisi')?set_value('definisi'):print_data('get_where', array('penyakit', array('id'=>print_url(3))), 'definisi'));
				$data['pengobatan'] = ($this->input->post('pengobatan')?set_value('pengobatan'):print_data('get_where', array('penyakit', array('id'=>print_url(3))), 'pengobatan'));

				$this->load->view('master-penyakit', $data);
			}
		}
	}
	public function relasi()
	{
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form', 'text'));

		$this->form_validation->set_rules('id', 'id gejala', 'trim|required');

		$data['active'] 		= 'master';
		$data['breadcrumb'] = breadcrumb(array('master/article'=>glyphicon('home'). ' Beranda'), 'Relasi Kerusakan');
		if (empty(print_url(3))) {
			$data['list'] = $this->app_model->get_all('penyakit')->result();

			$this->load->view('master-relasi.php', $data);
		} else {
			if ($this->form_validation->run() == TRUE) {
					/*reset relasi first */
					$this->app_model->delete_field('relasi', array('penyakit'=>$this->input->post('id')));
					foreach($_POST['gejala'] as $value) {
						$this->app_model->update_field('relasi', array('active'=>1), array('penyakit'=>$this->input->post('id'), 'gejala'=>$value));
					}
				
				redirect('master/relasi','refresh');
			} else {
			$data['list'] = $this->app_model->get_all('gejala')->result();

			$this->load->view('master-relasi.php', $data);
			}
		}
	}
	public function user()
	{
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));

		$data['active'] 		= 'master/user';
		$data['breadcrumb'] = breadcrumb(array('master/article'=>glyphicon('home'). ' Beranda'), 'Data Pengguna');

		$this->form_validation->set_rules('password', 'password lama', 'trim|required|callback_check_password');	
		$this->form_validation->set_rules('new_password', 'password baru', 'trim|required|min_length[5]|max_length[8]');	
		$this->form_validation->set_rules('nama', 'nama lengkap', 'trim|required|max_length[30]');	
		//$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-error">', '</span>');

		if (empty(print_url(3))) {
			$data['list'] = $this->app_model->get_all('user')->result();
			$this->load->view('master-user', $data);
		} else {
			if ($this->form_validation->run() == TRUE) {
				$data = array('nama'=>$this->input->post('nama'), 'password'=>encrypt_this($this->input->post('new_password')), 'alamat'=>$this->input->post('alamat'));
				$id = array('id'=>$this->input->post('id'));
				if($this->app_model->update_field('user', $data, $id))
					redirect('master/user','refresh');

			} else {
				$data['email'] = ($this->input->post('email')?set_value('email'):print_data('get_where', array('user', array('id'=>print_url(3))), 'email'));
				$data['nama'] = ($this->input->post('nama')?set_value('nama'):print_data('get_where', array('user', array('id'=>print_url(3))), 'nama'));
				$data['alamat'] = ($this->input->post('alamat')?set_value('alamat'):print_data('get_where', array('user', array('id'=>print_url(3))), 'alamat'));
				$this->load->view('master-user', $data);
			}
		}
	}
	public function check_password()
	{
		if(check_this($this->input->post('password'), print_data('get_where', array('user', array('id'=>$this->input->post('id'))), 'password'))) {
			return TRUE;
		} else {
			$this->form_validation->set_message('check_password', 'Bidang {field} tidak cocok dengan password sekarang');
			return FALSE;
		}
	}
	public function delete()
	{
		if(print_url(3) == 'posting')
			$red = 'article';
		else
			$red = print_url(3);

		if($this->app_model->delete_field(print_url(3), array('id'=>print_url(4))))
			redirect('master/'.$red,'refresh');
	}
	public function laporan()
	{
		$this->load->js('https://www.gstatic.com/charts/loader.js');
		$this->load->helper('date_format');

		$return = array();
		foreach ($this->app_model->distinct_analisa_month()->result() as $key) {
			$return[] = array($key->tanggal, $this->app_model->count_rows('analisa', array('day(date)'=>$key->tanggal,'month(date)'=>date('m'), 'year(date)'=>date('Y'))), 'jumlah Pengunjung: '.$this->app_model->count_rows('analisa', array('day(date)'=>$key->tanggal,'month(date)'=>date('m'), 'year(date)'=>date('Y'))).'orang');
		}

		$data['active'] 		= 'master/laporan';
		$data['breadcrumb'] = breadcrumb(array('master/article'=>glyphicon('home'). ' Beranda'), 'Grafik Pengunjung');
		$data['detail'] = json_encode($return);
		$this->load->view('master-laporan', $data);
	}
}

/* End of file Master.php */
/* Location: ./application/controllers/Master.php */