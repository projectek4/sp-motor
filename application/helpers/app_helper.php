<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (! function_exists('html_favicon')) {
	function html_favicon()
	{
		$CI =& get_instance();
		$CI->load->helper('url');
		return '<link rel="icon" type="image/ico" href="'.base_url('assets/media/images/favicon.ico').'">';
	}
}
if (! function_exists('meta_data')) {
	function meta_data($name, $content)
	{
		$CI =& get_instance();
		$CI->load->helper('html');

		return meta($name, $content);
	}
}
/*
if (! function_exists('html_css')) {
	function html_css($value)
	{
		return '<link rel="stylesheet" type="text/css" href="'.base_url('assets/'.$value).'" media="all">';
	}
}
if (! function_exists('html_less')) {
	function html_less($value)
	{
		return '<link rel="stylesheet/less" type="text/css" href="'.base_url('assets/'.$value).'" media="all">';
	}
}
if (! function_exists('html_js')) {
	function html_js($value)
	{
		return '<script src="'.base_url('assets/'.$value).'" type="text/javascript"></script>';
	}
}
*/
/* HTML entities */

if (! function_exists('html_media')) {
	function html_media($src, $class='', $alt='')
	{
		$CI =& get_instance();
		$CI->load->helper('html');
		return img(array('src'=>'assets/media/images/'.$src,
			'class'=>$class,
			'alt'=>$alt));
		/*
		if(!empty($class))
			$class = 'class='.$class;
		else
			$class = '';
		return '<img '.$class.' src="'.base_url('assets/media/images/'.$value).'" alt="'.$alt.'">';*/
	}
}
if (! function_exists('html_head')) {
	function html_head($string, $level=1, $att='')
	{
		$CI =& get_instance();
		$CI->load->helper('html');

		return heading($string, $level, $att);
	}
}
if (! function_exists('fontawesome')) {
	function fontawesome($value)
	{
		//return '<i class="fa fa-'.$value.'"></i>';
		return '<i class="fa fa-'.$value.'" aria-hidden="true"></i> ';
	}
}

if (! function_exists('word_limit')) {
	function word_limit($string, $limit=0, $end_char='</p>')
	{
		$CI =& get_instance();
		$CI->load->helper('text');
		return word_limiter($string, $limit, $end_char);
	}
}

if (! function_exists('not_mobile')) {
	function not_mobile()
	{
		$CI =& get_instance();
		$CI->load->library('user_agent');
		if ($CI->agent->is_mobile() == FALSE)
			return TRUE;
		else
			return FALSE;
	}
}
if (! function_exists('greeting')) {
	function greeting($value='')
	{
		date_default_timezone_set('Asia/Jakarta');
		$b 		= time();
		$hour 	= date("g", $b);
		$m    	= date("A", $b);
		if ($m == "AM") {
			if ($hour == 12) {
				return "Selamat Siang!";
			} elseif ($hour < 4) {
				return "Selamat Siang!";
			} elseif ($hour > 3) {
				return "Selamat Pagi!";
			}
		}
		elseif ($m == "PM") {
			if ($hour == 12) {
				return "Selamat Malam!";
			} elseif ($hour < 6) {
				return "Selamat Siang!";
			} elseif ($hour > 5) {
				return "Selamat Malam!";
			}
		}
		//return date("A", time());
	}
}
if(! function_exists('update_view')) {
	function update_view($id)
	{
		$CI =& get_instance();
		$view = print_data('get_where', array('posting', array('url'=>$id)), 'view');

		//update viewer
		$CI->app_model->update_field('posting', array('view'=>(int)$view+1), array('url'=>$id));
	}
}
if (! function_exists('is_login')) {
	function is_login()
	{
		$CI =& get_instance();
		$CI->load->library('session');
		$CI->load->helper('cookie');
		$CI->load->model('app_model');
		$id = print_data('get_where', array('user', array('cookie'=>get_cookie('login'))), 'id');
		if(empty($CI->session->userdata('id')) && !empty($CI->app_model->check_exist('user', array('cookie'=>get_cookie('login'))))) {
			$data = array('id'=>$id,
				'nama'=>print_data('get_where', array('user', array('id'=>$id)), 'nama')
				);
			$CI->session->set_userdata($data);
		}
		if (!empty($CI->session->userdata('id')) OR !empty($CI->app_model->check_exist('user', array('cookie'=>get_cookie('login')))))
			return TRUE;
		else
			return FALSE;
	}
}

/* Enkripsi string */
if(! function_exists('encrypt_this')) {
	function encrypt_this($value)
	{		
		$CI =& get_instance();
		$CI->load->library('passwordhash');

		return $CI->passwordhash->HashPassword($value);
	}
}

/* check password with password who stored in database */
if(! function_exists('check_this')) {
	function check_this($string, $database)
	{		
		$CI =& get_instance();
		$CI->load->library('passwordhash');

		if ( $CI->passwordhash->CheckPassword($string, $database) == TRUE)
			return TRUE;
		else
			return FALSE;
	}
}

/* Add session user */
if (! function_exists('add_session')) {
	function add_session($session, $value) {
		$CI =& get_instance();
		$CI->load->library('session');
		$CI->session->set_userdata($session, $value);
	}
}

/* Add cookie */
if (! function_exists('add_cookie')) {
	function add_cookie($cookie, $value, $exp = 86500) {
		$CI =& get_instance();
		$CI->load->helper('cookie');
		set_cookie(array('name'=>$cookie, 'value'=>$value, 'expire'=>$exp));
	}
}

/* Delete session */
if (! function_exists('remove_session')) {
	function remove_session($session) {
		$CI =& get_instance();
		$CI->load->library('session');
		$CI->session->unset_userdata($session);
	}
}

/* remove cookie */
if (! function_exists('remove_cookie')) {
	function remove_cookie($value)
	{		
		$CI =& get_instance();
		$CI->load->helper('cookie');
		delete_cookie($value);
	}
}

/* Print session data */
if (! function_exists('print_session')) {
	function print_session($value)
	{
		$CI =& get_instance();
		$CI->load->library('session');
		return $CI->session->userdata($value);
	}
}

/* print cookie data */
if (! function_exists('print_cookie')) {
	function print_cookie($value)
	{
		$CI =& get_instance();
		$CI->load->helper('cookie');
		return get_cookie($value);
	}
}

/* Get current url */
if (! function_exists('print_url')) {
	function print_url($value)
	{
		$CI =& get_instance();
		return $CI->uri->segment($value);
	}
}

/* Print IP */
if (! function_exists('print_ip'))
{
	function print_ip()
	{
		$CI =& get_instance();
		$ip = $CI->input->ip_address();
		return $ip;
	}
}

/* print browser language */
if (! function_exists('system_language'))
{
	function system_language()
	{
		if (empty(print_cookie('bahasa')))
			return 'id';
		else
			return print_cookie('bahasa');
	}
}

/* Print data based on model function */
if (! function_exists('print_data')) {
	function print_data($func, $args = array(), $field_name = '')
	{
		$CI =& get_instance();
		$model = 'app_model';
		$CI->load->model($model);

		$retrieve = call_user_func_array(array($CI->$model, $func), $args)->row_array();
		if (empty($field_name))
			return call_user_func_array(array($CI->$model, $func), $args)->result();
		else
			return isset($retrieve[$field_name]) ? $retrieve[$field_name] : '';
	}
}

if(!function_exists('website')) {
	function website($string)
	{
		return print_data('get_where', array('website', array('name'=>$string)), 'value');
	}
}
/* return month array */
if (! function_exists('array_bulan')) {
	function array_bulan()
	{
		return array('', 'januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember');
	}
}

/*
if (! function_exists('ran_upload')) {
	function ran_upload()
	{
		$CI =& get_instance();
		$date = str_replace('-', '', date('Y-m-d'));
		return 'ekafiles'.$date.$CI->app_model->create_id('posting');
	}
}*/

/* Get data from other website */
if (! function_exists('grab_url')) {
	function grab_url($url){
		$data = curl_init();

		curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($data, CURLOPT_URL, $url);

		$hasil = curl_exec($data);
		curl_close($data);
		return $hasil;
	}
}

/* Email section */
if (! function_exists('send_email')) {
	function send_email($to, $subject, $content, $sender='')
	{
		$CI =& get_instance();
		$CI->load->library('email');

		$config['protocol'] 	= "smtp";
		$config['smtp_host'] 	= "ssl://mail.mlayu.id";
		$config['smtp_port'] 	= "465";
		$config['smtp_user'] 	= "demo@mlayu.id";
		$config['smtp_pass'] 	= "demo12345";
		$config['charset'] 		= "utf-8";
		$config['mailtype'] 	= "html";
		$config['newline'] 		= "\r\n";

		$CI->email->initialize($config);
		$CI->email->from('admin@website.id', 'Administrator');
		$CI->email->to($to);
		$CI->email->subject($subject);
		$CI->email->message($content);
		$CI->email->send();
	}
}

/* Return session admin level */
if (! function_exists('level')) {
	function level($value)
	{
		switch ($value) {
			case '1':
				return 'Administrator System';
				break;
			
			default:
				return 'Uknown Level';
				break;
		}
	}
}













/* rupiah func */
if (! function_exists('rupiah')) {
	function rupiah($nilai, $pecahan = 0)
	{
		return 'IDR '.number_format($nilai, $pecahan, ',', '.');
	}
}

if (! function_exists('cek_hari')) {
	function cek_hari($tanggal)
	{
		$day = date('D', strtotime($tanggal));
		$dayList = array(
			'Sun' => 'Minggu',
			'Mon' => 'Senin',
			'Tue' => 'Selasa',
			'Wed' => 'Rabu',
			'Thu' => 'Kamis',
			'Fri' => 'Jumat',
			'Sat' => 'Sabtu'
		);
		echo $dayList[$day];
	}
}



/* bootstrap */

if (! function_exists('glyphicon')) {
	function glyphicon($string)
	{
		return '<span class="glyphicon glyphicon-'.$string.'"></span>';
	}
}

if (! function_exists('pagination')) {
	function pagination($table,$where, $level, $url, $per_page)
	{
		$CI =& get_instance();
		$CI->load->library('pagination');

		$config['uri_segment']      	= $level;
		$config['base_url']         	= base_url($url.'/');
		$config['total_rows']       	= $CI->app_model->count_rows($table, $where);
		$config['per_page']         	= $per_page;
		$config['full_tag_open']    	= '<ul class="pagination">';
		$config['full_tag_close']   	= '</ul>';
		$config['first_link']       	= '&laquo&laquo';
		$config['last_link']        	= '&raquo&raquo';
		$config['first_tag_open']   	= '<li>';
		$config['first_tag_close']  	= '</li>';
		$config['prev_link']        	= '&laquo';
		$config['prev_tag_open']    	= '<li class="prev">';
		$config['prev_tag_close']   	= '</li>';
		$config['next_link']        	= '&raquo';
		$config['next_tag_open']    	= '<li>';
		$config['next_tag_close']   	= '</li>';
		$config['last_tag_open']    	= '<li>';
		$config['last_tag_close']   	= '</li>';
		$config['cur_tag_open']     	= '<li class="active"><a href="#">';
		$config['cur_tag_close']    	= '</a></li>';
		$config['num_tag_open']     	= '<li>';
		$config['num_tag_close']    	= '</li>';

		$CI->pagination->initialize($config);
		return $CI->pagination->create_links();
	}
}
/*
if (! function_exists('navbar')) {
	//navbar($array=array(), $active=''
	function navbar($active='')
	{
		$CI =& get_instance();
		$CI->load->helper('url');

		$return = '<ul class="nav navbar-nav">';

		if(is_login() && ! empty(print_session('admin')))
			$string = 1;
		else
			$string = 0;

		foreach ($CI->app_model->get_where('navbar', array('admin'=>$string, 'level'=>1, 'dropdown'=>0))->result() as $data) {
			if ($active == $data->link)
				$nav = 'class="active"';
			else
				$nav = '';

			if($data->dropdown == 1 && is_login()) {
				$return .= '<li class="dropdown">'.anchor('#', $data->value.' <span class="caret"></span>', array('class'=>'dropdown-toggle', 'data-toggle'=>'dropdown', 'role'=>'button', 'aria-haspopup'=>'true', 'aria-expanded'=>'fasle')).'
					<ul class="dropdown-menu">';
				foreach ($CI->app_model->get_where('navbar', array('dropdown'=>$data->id))->result() as $dropdown) {
					$return .= '<li>'.anchor($dropdown->link, $dropdown->value).'</li>';
				}
				$return .= '</ul></li>';
			} elseif ($data->dropdown == 1 && !is_login()) {
				$return .= '<li class="dropdown">'.anchor('#', $data->value.' <span class="caret"></span>', array('class'=>'dropdown-toggle', 'data-toggle'=>'dropdown', 'role'=>'button', 'aria-haspopup'=>'true', 'aria-expanded'=>'fasle')).'
					<ul class="dropdown-menu">';
				foreach ($CI->app_model->get_where('navbar', array('dropdown'=>$data->id))->result() as $dropdown) {
					$return .= '<li>'.anchor($dropdown->link, $dropdown->value).'</li>';
				}
				$return .= '</ul></li>';
			} else {
				if(!is_login()) {
					$return .= '<li '.$nav.' >'.anchor($data->link, $data->value).'</li>';
				} else {
					$return .= '<li '.$nav.' >'.anchor($data->link, $data->value).'</li>';
				}
			}
		}
		$return .= '</ul>';
		return $return;
	}
}*/
if (! function_exists('navbar')) {
	//navbar($array=array(), $active=''
	function navbar($active='')
	{
		$CI =& get_instance();
		$CI->load->helper('url');

		if(empty(print_session('admin')))
			$admin = 0;
		else
			$admin = 1;

		if(is_login())
			$login = 'login';
		else
			$login = 'not_login';
		
		$return = '<ul class="nav navbar-nav">';
		foreach ($CI->app_model->get_where('navbar', array('admin'=>$admin, $login=>'TRUE', 'level'=>1))->result() as $menu) {
			if($menu->dropdown==1 && $active == $menu->link)
				$return .= '<li class="dropdown active">';
			elseif($menu->dropdown==1 && $active != $menu->link)
				$return .= '<li class="dropdown">';
			if($menu->dropdown==0 && $active == $menu->link)
				$return .= '<li class="active">';
			else
				$return .= '<li>';

			if($menu->dropdown == 0) {
				$return .= anchor($menu->link, $menu->value, array('class'=>'btn-navbar', 'style'=>'background-color:'.$menu->color)); 
			} else {
				$return .= anchor('#', $menu->value.' <span class="caret"></span>', array('class'=>'dropdown-toggle btn-navbar', 'style'=>'background-color:'.$menu->color, 'data-toggle'=>'dropdown', 'role'=>'button', 'aria-haspopup'=>'true', 'aria-expanded'=>'fasle')).'<ul class="dropdown-menu">';
				foreach ($CI->app_model->get_where('navbar', array('dropdown'=>$menu->id))->result() as $dropdown) {
					$return .= '<li>'.anchor($dropdown->link, $dropdown->value).'</li>';
				}
				$return .= '</ul>';
			}
			$return .= '</li>';
		}
	$return .= '</ul>';
	return $return;
	}
}
if (! function_exists('breadcrumb')) {
	function breadcrumb($array=array(), $active='')
	{
		$CI =& get_instance();
		$CI->load->helper('url');

		$return = '<ul class="breadcrumb">';
		foreach ($array as $x=>$x_value) {
			$return .= '<li>'.anchor($x, $x_value).'</li>';
		}
		$return .= '<li class="active">'.$active.'</li>';
		$return .= '</ul>';
		
		return $return;
	}
}
if ( ! function_exists('form_group')) {
	function form_group($class = '', $id = '')
	{
		return "<div class=\"form-group\">\n";
	}
}
if ( ! function_exists('close_div')) {
	function close_div($num = 1)
	{
		return str_repeat("</div>\n", $num);
	}
}

/*	App */
function opsi_gejala($gejala)
{
	$CI =& get_instance();
	$CI->load->model('app_model');
	$ret = '';
	$ret .= '<select class="form-control" name="input['.$gejala.'][nilai]">';
	
	foreach ($CI->app_model->get_where('gejala_opsi', array('gejala'=>$gejala))->result() as $print) {
		$ret .= '<option value="'.$print->value.'">'.$print->opsi.'</option>';
	}
	$ret .= '</select>';
	return $ret;
}