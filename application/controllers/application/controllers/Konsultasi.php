<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsultasi extends CI_Controller {
	
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
		$this->output->set_template('default');

		meta(array('http-equiv'=>'X-UA-Compatible', 'content'=>'IE-edge'));
		meta('viewport', 'width=device-width, initial-scale=1');
		meta('resource-type', 'document');
		meta('robots', 'all, index, follow');
		meta('googleboot', 'all, index, follow');

		$this->load->css('style.min.css');
		//$this->load->less('bootstrap-3.3.7/less/bootstrap.less');
		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css');
		$this->load->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
		$this->load->js('https://code.jquery.com/jquery-2.2.4.min.js');
		$this->load->js('bootstrap-3.3.7/dist/js/bootstrap.min.js');
		//$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js');
		$this->load->js('custom.js');
	}
	public function index()
	{
		if(!is_login())
			redirect('login.php','refresh');

		$this->load->helper('form');
		remove_session('analisa');

		$data['active'] = 'konsultasi';
		$data['breadcrumb'] = breadcrumb(array(''=>glyphicon('home').' Beranda'), 'konsultasi pakar');
		$data['gejala'] = $this->app_model->get_all('gejala')->result();
		$this->load->view('konsultasi-index', $data);
	}
	public function login()
	{
		if(is_login())
			redirect('konsultasi','refresh');

		$this->load->library('form_validation');
		$this->load->css('https://fonts.googleapis.com/css?family=Roboto');

		$this->form_validation->set_rules('email', 'Alamat email', 'trim|required|callback_check_user');
		$this->form_validation->set_rules('password', 'Kata sandi', 'trim|required|callback_check_password');
		$this->form_validation->set_error_delimiters('<span class="text-error">', '</span>');

		if ($this->form_validation->run() == TRUE) {
			$id = print_data('get_where', array('user', array('email'=>$this->input->post('email'))), 'id');
			
			if(print_data('get_where', array('user', array('email'=>$this->input->post('email'))), 'level') == 1) {
				add_session('admin', $id);
				add_session('id', $id);
				add_cookie('login', md5($this->input->post('email')));
				$this->app_model->update_field('user', array('cookie'=>md5($this->input->post('email'))), array('email'=>$this->input->post('email')));
				redirect('master/article','refresh');
			} else {
				add_session('id', $id);
				add_cookie('login', md5($this->input->post('email')));
				$this->app_model->update_field('user', array('cookie'=>md5($this->input->post('email'))), array('email'=>$this->input->post('email')));
				redirect('konsultasi','refresh');
			}		
		} else {
			$data['active'] = 'konsultasi';
			$data['breadcrumb'] = breadcrumb(array(''=>glyphicon('home').' Beranda'), 'login');
			$this->load->view('konsultasi-login', $data);
		}
	}
	public function user()
	{
		$this->load->library(array('form_validation'));
		$this->load->helper(array('form'));

		$data['active'] 		= 'master/user';
		$data['breadcrumb'] = breadcrumb(array('master/article'=>glyphicon('home'). ' Beranda'), 'Data Pengguna');

		$this->form_validation->set_rules('password', 'password lama', 'trim|required|callback_check_password_edit');	
		$this->form_validation->set_rules('new_password', 'password baru', 'trim|required|min_length[5]|max_length[8]');	
		$this->form_validation->set_rules('nama', 'nama lengkap', 'trim|required|max_length[30]');	
		//$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-error">', '</span>');

		if ($this->form_validation->run() == TRUE) {
			$data = array('nama'=>$this->input->post('nama'), 'password'=>encrypt_this($this->input->post('new_password')), 'alamat'=>$this->input->post('alamat'));
			$id = array('id'=>$this->input->post('id'));
			if($this->app_model->update_field('user', $data, $id))
				redirect('konsultasi/user','refresh');
		} else {
			$data['email'] = ($this->input->post('email')?set_value('email'):print_data('get_where', array('user', array('id'=>print_session('id'))), 'email'));
			$data['nama'] = ($this->input->post('nama')?set_value('nama'):print_data('get_where', array('user', array('id'=>print_session('id'))), 'nama'));
			$data['alamat'] = ($this->input->post('alamat')?set_value('alamat'):print_data('get_where', array('user', array('id'=>print_session('id'))), 'alamat'));
			$this->load->view('konsultasi-user', $data);
		}
	}
	public function check_password_edit()
	{
		if(check_this($this->input->post('password'), print_data('get_where', array('user', array('id'=>$this->input->post('id'))), 'password'))) {
			return TRUE;
		} else {
			$this->form_validation->set_message('check_password', 'Bidang {field} tidak cocok dengan password sekarang');
			return FALSE;
		}
	}
	public function logout()
	{
		remove_session('id');
		remove_session('admin');
		remove_session('analisa');
		remove_cookie('login');
		redirect('','refresh');
	}
	public function registrasi()
	{
		$this->load->library('form_validation');
		$this->load->css('https://fonts.googleapis.com/css?family=Roboto');

		$this->form_validation->set_rules('email', 'email', 'trim|required|callback_check_email');	
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]|max_length[8]');	
		$this->form_validation->set_rules('nama', 'nama lengkap', 'trim|required|max_length[30]');	
		$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-error">', '</span>');

		if ($this->form_validation->run() == TRUE) {
			$data = array('id'=>$this->app_model->create_id('user'),
				'email'=>$this->input->post('email'),
				'password'=>encrypt_this($this->input->post('password')),
				'nama'=>$this->input->post('nama'),
				'alamat'=>$this->input->post('alamat')
				);
			if($this->app_model->add_field('user', $data))
				redirect('login.php','refresh');
		} else {
			$data['active'] = 'konsultasi';
			$data['breadcrumb'] = breadcrumb(array(''=>glyphicon('home').' Beranda'), 'registrasi pengguna');
			$this->load->view('konsultasi-registrasi', $data);
		}
	}
	public function check_email()
	{
		if(empty($this->input->post('email'))) {
			$this->form_validation->set_message('check_email', 'Bidang {field} dibutuhkan');
			return FALSE;
		} elseif ($this->app_model->check_exist('user', array('email'=>$this->input->post('email'))) == TRUE) {
			$this->form_validation->set_message('check_email', 'Alamat email sudah terdaftar');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function check_user()
	{
		if(empty($this->input->post('email'))) {
			$this->form_validation->set_message('check_user', 'Email harus diisi');
			return FALSE;
		}elseif($this->app_model->check_exist('user', array('email'=>$this->input->post('email'), 'active'=>1)) == FALSE) {
			$this->form_validation->set_message('check_user', 'Email tidak ditemukan di basis data');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function check_password()
	{
		$pass 	= print_data('get_where', array('user', array('email'=>$this->input->post('email'))), 'password');

		if (empty($this->input->post('password'))) {
			$this->form_validation->set_message('check_password', 'kata sandi harus diisi');
			return FALSE;
		}elseif($this->app_model->check_exist('user', array('email'=>$this->input->post('email'), 'active'=>1)) == FALSE) {
			$this->form_validation->set_message('check_password', 'kata sandi tidak cocok dengan email apapun');
			return FALSE;
		} elseif($this->app_model->check_exist('user', array('email'=>$this->input->post('email'), 'active'=>1)) == TRUE and check_this($this->input->post('password'), $pass) == FALSE) {
			$this->form_validation->set_message('check_password', 'kata sandi yg anda masukkan salah');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function send_konsultasi()
	{
		/* Post gejala */
		foreach ($this->input->post('input') as $check_id ) {
			if (is_numeric($check_id['nilai']) AND $check_id['nilai'] > 0) {
				$this->app_model->add_field('tmp_gejala', array('user'=>print_session('id'), 'gejala'=>$check_id['gejala'], 'percaya'=>$check_id['nilai']));

				foreach ($this->app_model->get_where('relasi',array('active'=>1, 'gejala' =>$check_id['gejala']))->result() as $key) {
					if ($this->app_model->check_exist('tmp_penyakit', array('user' => print_session('id'),'penyakit' => $key->penyakit)) == FALSE) {
						$this->app_model->add_field('tmp_penyakit', array('user'=>print_session('id'), 'penyakit'=>$key->penyakit));
					}
				}
			}	
		}

		/* insert to tmp_table */
		$gejala 				= '';
		$percaya 				= '';
		$penyakit 			= '';
		foreach ($this->app_model->get_where('tmp_gejala', array('user'=>print_session('id')))->result() as $key) {
			$gejala 		.= $key->gejala.'+';
		}
		foreach ($this->app_model->get_where('tmp_gejala', array('user'=>print_session('id')))->result() as $key) {
			$percaya 		.= $key->percaya.'+';
		}
		foreach ($this->app_model->get_where('tmp_penyakit', array('user'=>print_session('id')))->result() as $key) {
			$penyakit 	.= $key->penyakit.'+';
		}

		/* Menghitung analisa */	
		$str_penyakit 		= explode('+',$penyakit); 		/* daftar penyakit pasien */
		$str_gejala 			= explode('+',$gejala);				/* daftargejala pasien */
		$str_percaya 			= explode('+',$percaya);			/* daftargejala pasien */

		$nomor 						= 0;
		$count_gejala 		= count($str_gejala) - 1;
		for ($i=0; $i < $count_gejala; ) {
			$nomor += $str_percaya[$i++];
		}
		$ting_per 				= ($nomor/$count_gejala);
		$final 						= array();
	
		if (count($str_gejala) < 3) {
			$final_sakit = 0;
		} else {
			for ($i=0; $i < count($str_penyakit);) {
				$tambah 					= $i++;
				$gejala_penyakit 	= array();
				$gejala_pasien		= array();
				foreach ($this->app_model->get_where('relasi',array('active'=>1, 'penyakit'=>$str_penyakit[$tambah]))->result() as $key) {
					$gejala_penyakit[] = $key->gejala;
				}		
				for ($i2=0; $i2 < count($str_gejala) - 1 ;)  { 
					$gejala_pasien[] = $str_gejala[$i2++];
				}

				// membandingkan 2 array
				$jum_gejala_cocok 		= count(array_intersect($gejala_penyakit,$gejala_pasien));
				$jum_gejala_penyakit	= $this->app_model->count_rows('relasi', array('penyakit'=>$str_penyakit[$tambah]));
				//$persen_sakit = ($jum_gejala_cocok * 100) / ($jum_gejala_penyakit * 1) ;
				//$a = $jum_gejala_cocok;
				//$b = jumlah_gejala($str_penyakit[$tambah]);
				$c = @($ting_per)*@($jum_gejala_cocok/$jum_gejala_penyakit*100);
				$total_gejala = $this->app_model->count_rows('gejala');
				/*if($c > 60)
					$rekomendasi = '(Rekomendasi Lab)';
				else
					$rekomendasi = '';*/

				$final[$str_penyakit[$tambah]]	= $c; arsort($final); /* Urutan penyakit */
				$eeee 													= array_keys($final);
				$final_sakit 										= $eeee[0]; 					/* penyakit terbesar*/
			}
		}

		$id_periksa = $this->app_model->create_id('analisa');
		$this->app_model->add_field('analisa', array('id'=>$id_periksa, 'user'=>print_session('id'), 'penyakit'=>$penyakit, 'gejala'=>$gejala, 'percaya'=>$percaya, 'date'=>date('Y-m-d H:i:s'), 'analisa'=>$final_sakit));
		
		$this->app_model->full_delete('tmp_gejala', array('user'=>print_session('id')));
		$this->app_model->full_delete('tmp_penyakit', array('user'=>print_session('id')));
		
		add_session('analisa', $id_periksa);
		redirect('konsultasi/analisa.html','refresh');
	}
	public function analisa()
	{
		$gejala 				= print_data('get_where', array('analisa', array('id'=>print_session('analisa'))), 'gejala');
		$percaya 				= print_data('get_where', array('analisa', array('id'=>print_session('analisa'))), 'percaya');
		$analisa 				= print_data('get_where', array('analisa', array('id'=>print_session('analisa'))), 'analisa');

		$array_gejala 	= explode('+', $gejala);
		$array_percaya 	= explode('+', $percaya);
		$jum_gejala 		= count($array_gejala)-1;
		$jum_percaya 		= count($array_percaya)-1;

		$print_array_gejala 	= array();
		$print_array_percaya 	= array();
		for ($i=0; $i < $jum_gejala; ) { 
			$print_array_gejala[] = $array_gejala[$i++];
		}
		for ($i=0; $i < $jum_percaya; ) { 
			$print_array_percaya[] = $array_percaya[$i++];
		}
		$data['active'] = 'konsultasi';
		$data['breadcrumb'] = breadcrumb(array(''=>glyphicon('home').' Beranda'), 'hasil analisa pakar');
		$data['gejala'] = $print_array_gejala;
		$data['percaya'] = $print_array_percaya;
		$data['analisa'] = print_data('get_where', array('penyakit', array('id'=>$analisa)), 'nama');
		$data['penanganan'] = print_data('get_where', array('penyakit', array('id'=>$analisa)), 'pengobatan');
		$this->load->view('konsultasi-analisa', $data);
	}

}

/* End of file Konsultasi.php */
/* Location: ./application/controllers/Konsultasi.php */