<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
		
		$this->load->database();
		$this->load->helper(array('app', 'html', 'bootstrap', 'url', 'form'));
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

		$this->load->css('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css');
		$this->load->less('bootstrap-3.3.7/less/bootstrap.less');
		$this->load->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
		//$this->load->css('style.min.css');
		
		$this->load->js('https://code.jquery.com/jquery-2.2.4.min.js');
		$this->load->js('bootstrap-3.3.7/dist/js/bootstrap.min.js');
		$this->load->js('https://www.google.com/jsapi');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js');
		$this->load->js('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js');
		$this->load->js('custom.js');
	}
	public function index()
	{
		$this->load->helper(array('text', 'date_format'));

		$data['active'] = '';
		$data['breadcrumb'] = breadcrumb(array(''=>glyphicon('home').' Beranda'), 'daftar artikel');
		$data['chart'] = $this->app_model->chart()->result();
		$data['list'] = $this->app_model->get_where('posting', array('type'=>'article'), 5, print_url(2), 'id', 'DESC')->result();
		$this->load->view('main-index', $data);
	}
	public function detail()
	{
		$this->load->helper('date_format');
		update_view(print_url(2));

		$data['active'] = '';
		$data['breadcrumb'] = breadcrumb(array(''=>glyphicon('home'). ' Beranda'), print_data('get_where', array('posting', array('url'=>print_url(2))), 'title'));
		$data['detail'] = $this->app_model->get_where('posting', array('url'=>print_url(2)))->result();
		$this->load->view('main-detail', $data);
	}
	public function page()
	{
		$this->load->helper('date_format');

		$data['active'] = print_url(1);
		$data['breadcrumb'] = breadcrumb(array(''=>glyphicon('home'). ' Beranda'), print_data('get_where', array('posting', array('url'=>print_url(1))), 'title'));
		$data['detail'] = $this->app_model->get_where('posting', array('url'=>print_url(1)))->result();
		$this->load->view('main-page', $data);
	}

}

/* End of file Main.php */
/* Location: ./application/controllers/Main.php */