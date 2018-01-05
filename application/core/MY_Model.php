<?php 
/**
* 
*/
class MY_Model extends CI_Model
{
	protected $_table_name="";
	protected $_primary_key="id";
	protected $_primary_filter="intval";
	protected $_order_by="";
	public $rules=array();//this is for validation rules
	protected $_timestamps=FALSE;

	function __construct()
	{
		parent::__construct();
	}
	public function array_from_post($fields)
	{
		$data=array();
		foreach ($fields as $field) {
			$data[$field]=$this->input->post($field);
		}
		return $data;
	}
//=================for reading data====================

	public function get($id=NULL,$single=FALSE){
		if ($id!=NULL) {
			$filter=$this->_primary_filter;
			$id=$filter($id);
			$this->db->where($this->_primary_key,$id);
			$method='row';
		}elseif($single==TRUE){
			$method='row';
		}else{
			$method='result';
		}
		if (!count($this->db->order_by($this->_order_by))) {
			$this->db->order_by($this->_order_by);
		}
		return $this->db->get($this->_table_name)->$method();
	}
	//=======================================================


	public function getPositions($id=NULL,$single=FALSE){
		if ($id!=NULL) {
			$filter=$this->_primary_filter;
			$id=$filter($id);
			$this->db->where($this->_primary_key,$id);
			$method='row';
		}elseif($single==TRUE){
			$method='row';
		}else{
			$method='result';
		}
		if (!count($this->db->order_by($this->_order_by))) {
			$this->db->order_by($this->_order_by);
		}
		return $this->db->get($this->_table_name2)->$method();
	}

	public function getAdvertisment_User_site(){

		$this->db->select('*');
		$this->db->from($this->_table_name2);
		$this->db->join($this->_table_name1,'add_price.p_id=advertisement.position');
		return $this->db->get()->result();
	}

	public function getAdvertisment_AdminPanal(){

		$this->db->select('*');
		$this->db->from($this->_table_name1);
		$this->db->join($this->_table_name2,'add_price.p_id=advertisement.position');
		$this->db->order_by('advertisement.id','desc');
		return $this->db->get()->result();
	}


	public function getComment(){
			
		$method='result';
		$this->db->order_by('date desc');
		return $this->db->get('comment')->$method();
	}


	public function get_by($where,$single=FALSE){
		$this->db->where($where);
		return $this->get(NULL,$single);
	}

//==============for saving and updating data====================

	public function save($data,$id=NULL){
		
		if ($this->_timestamps==TRUE) {
			$now=date('Y-m-d H:i:s');
			$id || $data['created']=$now;
			$data['modified']=$now;
		}
		if ($id===NULL) {
			//this is insert
			!isset($data[$this->_primary_key]) || $data[$this->_primary_key]=NULL;
			$this->db->set($data);
			$this->db->insert($this->_table_name);
			$id=$this->db->insert_id();
		}else{
			//this is update
			$filter=$this->_primary_filter;
			$id=$filter($id);
			$this->db->set($data);
			$this->db->where($this->_primary_key,$id);
			$this->db->update($this->_table_name);
		}
		return $id;
	}
	

	public function saveComment($data){
		
		
		if ($data!=NULL) {
			//this is insert
			
			$this->db->set($data);
			$this->db->insert('comment');
			$id=$this->db->insert_id();
		}
		return $id;
	}
//==================for deleting data============
	public function delete($id){
		$filter=$this->_primary_filter;
		$id=$filter($id);//this is for filtering by id
		if (!$id) {
			return FALSE;
		}
		$this->db->where($this->_primary_key,$id);
		$this->db->limit(1);
		$this->db->delete($this->_table_name);
	}

	public function deleteComment($id){

		if (!$id) {
			return FALSE;
		}
		$this->db->where($this->_primary_key,$id);
		$this->db->delete('comment');
	}

}