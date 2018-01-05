<?php 

class Frontend_Controller extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		// load stuff
		$this->load->model('page_m');
		$this->load->model('article_m');
		$this->load->helper('form');
		//fetch navigation
		$this->data['menu']=$this->page_m->get_nested();
		$this->data['news_archive_link']=$this->page_m->get_archive_link();
		$this->data['meta_title'] = config_item('site_name');
	}
}