<?php 

class Admin_Controller extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->data['meta_title']='News++ Daily';
		$this->load->helper('form');
		$this->load->helper('security');
		$this->load->helper('aauth_helper');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('user_m');
		//log in check for all admin pages
		$exception=array(
			'admin/user/login',
			'admin/user/logout'
			);
		if (in_array(uri_string(), $exception)==FALSE) {
			if($this->user_m->loggedin()==FALSE){
				redirect('admin/user/login');
			}

		}
	}
}