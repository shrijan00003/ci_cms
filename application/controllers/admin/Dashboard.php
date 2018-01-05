<?php 
/**
* 
*/
class Dashboard extends Admin_Controller
{
	private $table1 = 'articles';
	private $table2 = 'comment';
	private $table3 = 'pages';
	private $table4 = 'advertisement';

	function __construct()
	{
		parent::__construct();
		$this->load->model('article_m');
		$this->load->model('ads_m');
		

	}
	public function index(){


		$this->data['counts_articles']=$this->article_m->count($this->table1);
		$this->data['counts_page']=$this->article_m->count($this->table3);
		$this->data['counts_commet']=$this->article_m->count($this->table2);
		$this->data['counts_ads']=$this->ads_m->count($this->table4,'status');

		//funds calculations
		$this->data['advertisments']=$this->ads_m->getAdvertisment_AdminPanal();
		$this->data['collected_from'] = $this->ads_m->count($this->table4,'payment');
        $this->data['to_be_collected_from'] = $this->ads_m->tobecollectedFrom();

		//fetching the recent articles from db
        $this->db->where('pubdate<=',date('Y-m-d'));
        $this->db->limit(6);
        $this->data['recents']=$this->article_m->get();

		$this->data['subview']='admin/dashboard/index';
		$this->load->view('admin/_layout_main',$this->data);



	}
	public function modal(){
		$this->load->view('admin/_layout_modal',$this->data);
	}

	public function resultnotfound(){

		$this->data['subview']='admin/dashboard/no_page_found';
		$this->load->view('admin/_layout_main',$this->data);

	}

}