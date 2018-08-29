<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class App_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	function check_exist($table, $id)
	{
		$this->db->from($table);
		$this->db->where($id); 

		if ($this->db->count_all_results() > 0)
			return TRUE;
		else
			return FALSE;
	}
	public function create_id($table)
	{
		$this->db->select('MAX(id) as kode_max');
		$this->db->from($table);
		$result = $this->db->get()->result();
		
		foreach($result as $k){
			if ($k->kode_max == 0)
				return 1;
			else
				return $k->kode_max + 1;
		}
	}
	public function count_rows($table,$date='')
	{
		$this->db->from($table);
		$this->db->where('active', 1);
		if (!empty($date))
			$this->db->where($date);

		return $this->db->count_all_results();
	}
	public function get_all($table, $limit=0, $offset=0, $order_by='id', $asc='ASC')
	{
		$this->db->from($table);
		$this->db->where('active', 1);
		$this->db->order_by($order_by, $asc);
		if (!empty($limit))
			$this->db->limit($limit, $offset);

		return $this->db->get();
	}
	public function get_where($table, $data, $limit=0, $page=0, $order='id', $order_by='asc')
	{
		$this->db->from($table);
		$this->db->where($data);

		if (!empty($limit))
			$this->db->limit($limit, $page);

		$this->db->order_by($order, $order_by); 

		return $this->db->get();
	}
	public function add_field($table, $data)
	{
		if ($this->db->insert($table,$data)) {
			return TRUE;
		} else {
			return $this->db->error();	    	
		}
	}
	public function update_field($table,$data,$id)
	{
		if($this->db->update($table, $data, $id))
			return TRUE;
		else 
			return $this->db->error();
	}
	public function delete_field($table, $id) 
	{
		if($this->db->update($table, array('active' => 0), $id))
			return TRUE;
		else
			return $this->db->error();
	}
	public function full_delete($table, $id)
	{
		//$this->db->where($id);
		$this->db->delete($table, $id);
	}

	public function month()
	{
		$this->db->select("DISTINCT DATE_FORMAT(date_posting, '%Y-%m') as value, DATE_FORMAT(date_posting, '%M %Y') as string");
		$this->db->from('posting');
		$this->db->where('active', 1);
		return $this->db->get()->result();
	}
	public function article($month='', $kategori='', $status='1', $string='', $page=0, $order='DESC')
	{
		$this->db->select('posting.id, posting.title, posting.url, posting.media, posting.content, posting.view, date(posting.date_posting) as date_posting, date(posting.date_modified) as date_modified, posting_category.name as category, user.nama as author');
		$this->db->from('posting');
		$this->db->join('posting_category', 'posting_category.id = posting.category');
		$this->db->join('user', 'user.id = posting.author');

		if(!empty($month)) {
			$ex = explode('-', $month);
			$this->db->where('YEAR(posting.date_posting)=', $ex[0]);
			$this->db->where('MONTH(posting.date_posting)=', $ex[1]);
		}

		if(!empty($kategori))
			$this->db->where(array('posting.category'=>$kategori));

		if(!empty($string))
			$this->db->like('title', $string);

		//$this->db->where(array('posting.type'=> 'article'));
		$this->db->where('posting.active', 1); /*stat posting */

		$this->db->limit(8, $page);

		$this->db->order_by('id', $order); 
		return $this->db->get();
	}
	function page($page=0)
	{
		$this->db->select('posting.id, posting.title, posting.url, posting.content, date(posting.date_posting) as date_posting, date(posting.date_modified) as date_modified, user.name as author, posting.view');
		$this->db->from('posting');
		$this->db->join('user', 'user.id = posting.author');
		$this->db->where(array('posting.type'=>'page','posting.active'=>1));
		$this->db->limit(8, $page);
		return $this->db->get();
	}
	public function count_tmp($table,$date='')
	{
		$this->db->from($table);
		if (!empty($date))
			$this->db->where($date);

		return $this->db->count_all_results();
	}
	public function delete_tmp($data)		
	{
		$this->db->where($data);
		$this->db->delete('tmp_gejala');
	}
	public function total_presentase($gejala, $penyakit=1)
	{
		$this->db->select('SUM(presentase) as total');
		$this->db->from('relasi');
		$this->db->where(array('penyakit'=>$penyakit, 'gejala!='=>$gejala));

		return $this->db->get();
	}
	public function distinct_analisa_month()
	{
		$this->db->select('DISTINCT day(date) as tanggal');
		$this->db->from('analisa');
		$this->db->where(array('month(date)'=>date('m'), 'year(date)'=>date('Y')));

		return $this->db->get();
	}
	public function chart()
	{
		$this->db->select('id as kode, color, nama, (SELECT count(id) from analisa WHERE analisa=kode) as jumlah');
		$this->db->from('penyakit');
		$this->db->where(array('active'=>1));

		return $this->db->get();
	}
}
/* End of file App_model.php */
/* Location: ./application/models/App_model.php */
