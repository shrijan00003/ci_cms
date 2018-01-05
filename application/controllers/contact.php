<?php 
/**
* 
*/
class Contact extends Frontend_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('page_m');
		$this->load->model('article_m');
	}
	public function index(){
		
		//add_meta_title($this->data['page']->title);

		$this->data['subview'] = 'aboutus';
    	$this->load->view('_main_layout', $this->data);
		
	}
}