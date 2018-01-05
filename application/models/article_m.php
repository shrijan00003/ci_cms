<?php  
/**
* 
*/
class Article_m extends MY_Model
{
	protected $_table_name="articles";
	protected $_order_by="pubdate desc, id desc";
	protected $_timestamps=true;
	public $rules=array(
		array(
			'field'=>'pubdate',
			'label'=>'Publication Date',
			'rules'=>'trim|required|exact_length[10]|xss_clean'
			),
		array(
			'field'=>'title',
			'label'=>'Title',
			'rules'=>'trim|required|max_length[2000]|xss_clean'
			),
		array(
			'field'=>'slug',
			'label'=>'Slug',
			'rules'=>'trim|required|max_length[100]|url_title|xss_clean'
			),
		array(
			'field'=>'category',
			'label'=>'Category',
			'rules'=>'trim|required'
			),
		array(
			'field'=>'userfile',
			'label'=>'Userfile',
			'rules'=>'trim'
			),
		array(
			'field'=>'body',
			'label'=>'Body',
			'rules'=>'trim|required'
			),
		array(
			'field'=>'userfile',
			'label'=>'Userfile',
			'rules'=>''
			)

	);//this is for validation rules
	function __construct()
	{
		parent::__construct();
	}
	public function get_new()
	{
		$article=new stdClass();
		$article->title='';
		$article->userfile='';
		$article->slug='';
		$article->body='';
		$article->pubdate=Date('Y-m-d');
		return $article;
	} 
	public function set_published(){
		$this->db->where('pubdate <=', date('Y-m-d'));
	}
	
	public function get_recent($limit = 5, $slug = null){
		
		//fetching recommended news
		if(null!==$slug){
			$sql = "articles WHERE category = (SELECT category FROM articles WHERE slug = '$slug') ORDER BY id desc";

			return $this->db->get($sql)->result();
		}
 
		//Fetch a limited number of recent articles
		$limit = (int) $limit;
		$this->set_published();
		$this->db->limit($limit);
		return parent::get();

	}

	public function count($table){
		
		$count = $this->db->count_all_results($table);
		return $count;
	}
	
}