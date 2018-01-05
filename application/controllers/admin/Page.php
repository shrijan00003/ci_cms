<?php 

class Page extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('page_m');
	}
	//============================Managing pages=========================================
	public function index(){
		//fetch all the pages from database
		$this->data['pages']=$this->page_m->get_with_parents();//previously get only (before parent)

		//load the view
		$this->data['subview']='admin/page/index';
		$this->load->view('admin/_layout_main',$this->data);

	}
	//set of things for nested menu display 
	public function order(){
		//we will order our pages here 
		$this->data['sortable']=TRUE;
		$this->data['subview']='admin/page/order';
		$this->load->view('admin/_layout_main',$this->data);

	}
	public function order_ajax(){
		//we will post the result of order method 
		//save order by ajax call
		if (isset($_POST['sortable'])) {
			$this->page_m->save_order($_POST['sortable']);
		}
		//fetch all the pages
		$this->data['pages']=$this->page_m->get_nested();

		//load the view not layout
		$this->load->view('admin/page/order_ajax',$this->data);

	}
	public function edit($id=NULL)
	{

		//check('Page Edit');
		//fetch a page or set a new one
		if ($id) {
			$this->data['page']=$this->page_m->get($id);//if id is available we are storing in page variable.
			count($this->data['page'])||$this->data['errors'][]='page Could not be found';

		}else{
			$this->data['page']=$this->page_m->get_new();
			
		}
		//pages for dropdown
			$this->data['pages_without_parent']=$this->page_m->get_no_parent();

		//set up the rules for form
		$rules=$this->page_m->rules;
		$this->form_validation->set_rules($rules);

		//process the form
		if ($this->form_validation->run()!==FALSE) {
			//WE CAN LOG IN THE page AND REDIRECT THEM
			$data=$this->page_m->array_from_post(array(
			'title',
			'slug',
			'body',
			'template',
			'parent_id'
			));//it will be in My_Model
			$this->page_m->save($data,$id);
			redirect('admin/page');

		}
		//load the view
		$this->data['subview']='admin/page/edit';
		$this->load->view('admin/_layout_main',$this->data);

	}
	public function delete_page($id)//for deleting the page
	{
		$this->page_m->delete($id);
		redirect('admin/page');
	}
	//============================Managing page ends=====================================
	
	//==================call back function for unique slug================
	public function _unique_slug($str)
	{
		//do not validate if slug already exists
		//unless it is the slug for the current page
		
		$id=$this->uri->segment(4);//feching id
		$this->db->where('slug',$this->input->post('slug'));
		!$id ||$this->db->where('id!=',$id);
		//if id doesnot exist its ok but if it exist then we should not see for that id
		$page=$this->page_m->get();
		if(count($page)){
			$this->form_validation->set_message('_unique_slug','%s Should be unique');
			return FALSE;
		}
		return TRUE;
	}
	

}
