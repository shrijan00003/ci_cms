<?php  
/**
* 
*/
class Ads_m extends MY_Model
{
	protected $_table_name1="advertisement";
	protected $_table_name2="add_price";
	protected $_order_by="p_id asc";
	protected $_timestamps=true;
	
	function __construct()
    {
        parent::__construct();
       
        
    }		

    public function update($data,$id){

    	if ($data!=NULL) {
			//this is insert
			
			$this->db->where('p_id=',$id);
			$this->db->update($this->_table_name2,$data);
			
			//dump($this->db->last_query());
		}
		return;

    }

    public function addAdvertisment($data,$id){

    	$this->db->insert('advertisement', $data);
    	
    	$this->db->set('available','available-1',FALSE);
	    $this->db->where('p_id',$id);
	    $this->db->update('add_price');
    	
    }

    public function decreaseAvail($id){

    	$this->db->set('available','available-1',FALSE);
	    $this->db->where('p_id',$id);
	    $this->db->update('add_price');
    }

    public function closeAd($p_id,$id){

    	
    	$this->db->set('status',0, FALSE);
		$this->db->where('id', $id);
		$this->db->update('advertisement');


		$this->db->set('available','available+1',FALSE);
		$this->db->where('p_id', $p_id);
		$this->db->update('add_price');
		//dump($this->db->last_query());die();
    	
    }

    public function make_payment($id){

    	$this->db->set('payment',1, FALSE);
		$this->db->where('id', $id);
		$this->db->update('advertisement');

    }

    public function totalCollected(){


    	$this->db->select('SUM(price) AS price', FALSE);
		$this->db->where('payment', 1);
		//$this->db->group_by("description");
		$total = $this->db->get($this->_table_name1);

  //   	$this->db->where('payment',1);
  //   	$total = $this->db->select_sum('price');
		// $total = $this->db->get($this->_table_name1);
		return $total;

		//dump($total);die();
    }

    public function tobecollectedFrom(){

    	$this->db->where('payment',0);
		$count = $this->db->count_all_results($this->_table_name1);
		return $count;

    }

    public function count($table,$column){
		
		$this->db->where($column,1);
		$count = $this->db->count_all_results($table);
		return $count;
	}
	
}