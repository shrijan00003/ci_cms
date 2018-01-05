<?php  
/**
* 
*/
class Page_m extends MY_Model
{
	protected $_table_name='pages';
	protected $_order_by='parent_id,order';
	public $rules=array(
		array(
			'field'=>'parent_id',
			'label'=>'Parent',
			'rules'=>'trim|intval'
			),
		array(
			'field'=>'title',
			'label'=>'Title',
			'rules'=>'trim|required|max_length[100]|xss_clean'
			),
		//order i have done my self for inserting
		// array(
		// 	'field'=>'order',
		// 	'label'=>'Order',
		// 	'rules'=>'trim|intval'
		// 	),
		array(
			'field'=>'template',
			'label'=>'Template',
			'rules'=>'trim|required|xss_clean'
			),
		array(
			'field'=>'slug',
			'label'=>'Slug',
			'rules'=>'trim|required|max_length[100]|url_title|callback__unique_slug|xss_clean'
			),
		array(
			'field'=>'body',
			'label'=>'Body',
			'rules'=>'trim|required'
			)

	);//this is for validation rules
	function __construct()
	{
		parent::__construct();
	}
	public function get_new()
	{
		$page=new stdClass();
		$page->title='';
		$page->slug='';
		$page->body='';
		// $page->order=0;
		$page->parent_id=0;
		$page->template='page';
		return $page;
	} 
	//for providing link for news archive
	public function get_archive_link(){
		$page = parent::get_by(array('template' => 'news_archive'), TRUE);
		return isset($page->slug) ? $page->slug : '';

	}
	//this is for nested display for pages 
	public function get_nested(){
		$pages=$this->db->get('pages')->result_array();
		$array=array();
		foreach ($pages as $page) {
			if (!$page['parent_id']) {
				$array[$page['id']]=$page;
			}else{
				$array[$page['parent_id']]['children'][]=$page;
			}
		}
		return $array;
	}
	//for saving order changed dynamically with jquery
	public function save_order($pages){
		if (count($pages)) {
			foreach ($pages as$order=> $page) {//using key as order value
				
				if ($page['item_id']!='') {
					$data=array('parent_id'=>(int) $page['parent_id'],'order'=>$order);
					$this->db->set($data)->where($this->_primary_key,$page['item_id'])->update($this->_table_name);
					//echo '<pre>'.$this->db->last_query().'</pre>';
				}
			}
		}
	}
	public function get_with_parents($id=null,$single=false)
	{
		$this->db->select('pages.*,p.slug as parent_slug,p.title as parent_title');
		$this->db->join('pages as p','pages.parent_id=p.id','left');
		return parent::get($id,$single);
	}

	//now we need to override the delete function also 
	public function delete($id){
		//delete the page
		parent::delete($id);

		//reset parent ID for its children
		$this->db->set(array('parent_id'=>0))->where('parent_id',$id)->update($this->_table_name);
	}
	public function get_no_parent(){
		//fetch pages without parents
		$this->db->select('id,title');
		$this->db->where('parent_id',0);
		$pages=parent::get();

		//return key=>value pair array
		$array=array(0=>'No parent');
		if(count($pages)>0){
			foreach($pages as $page){
				$array[$page->id]=$page->title;
				//$array=array($page->id=>$page->title);
			}
		}
		return $array;
	}
	public function getCategory(){
		//fetch pages without parents
		$this->db->select('id,slug,title');
		//$this->db->where('parent_id',0);
		$pages=parent::get();

		//return key=>value pair array
		$array=array(0=>'Select Category');
		if(count($pages)>0){
			foreach($pages as $page){
				if($page->slug== "" || $page->slug == "more")continue;
				$array[$page->slug]=$page->title;
				
			}

		}
		
		return $array;
	}
}