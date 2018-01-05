<?php 

class Article extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('article_m');
		$this->load->model('page_m');
	}
	//============================Managing articles=========================================
	public function index(){
		//fetch all the articles from database
		$this->data['articles']=$this->article_m->get();//previously get only (before parent)
		
		$this->data['comment'] = $this->article_m->getComment();

		$this->data['pages']=$this->page_m->get_with_parents();//previously get only (before parent)

		//load the view
		$this->data['subview']='admin/article/index';
		$this->load->view('admin/_layout_main',$this->data);
		
	}
	
	public function edit($id=NULL)
	{
		//fetch a article or set a new one
		if ($id) {
			$this->data['article']=$this->article_m->get($id);//if id is available we are storing in article variable.
			count($this->data['article'])||$this->data['errors'][]='article Could not be found';
			$this->data['page']=$this->page_m->get_new();

		}else{
			$this->data['article']=$this->article_m->get_new();
			$this->data['page']=$this->page_m->get_new();
			
		}
		$this->data['pages_without_parent']=$this->page_m->getCategory();

		//set up the rules for form
		$rules=$this->article_m->rules;
		$this->form_validation->set_rules($rules);

		//process the form
		if ($this->form_validation->run()!==FALSE) {
			//WE CAN LOG IN THE article AND REDIRECT THEM

			
    		
			$config['upload_path']          = './images/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;

           

            $this->load->library('upload', $config);
           	
                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
 						
                }
                else
                {
                		
                		$image_data = $this->upload->data(); //this line should be after the file is uploaded
          				dump($image_data['file_name']);
            			//dump($upload_data['file_name']);
                      	$data=$this->article_m->array_from_post(array(
							'title',
							'category',
							'slug',
							'body',
							'pubdate'
						));//it will be in My_Model

						$data['userfile'] = $image_data['file_name'];
						$this->article_m->save($data,$id);
						redirect('admin/article');  
                }
    
		}
		//load the view
		$this->data['subview']='admin/article/edit';
		$this->load->view('admin/_layout_main',$this->data);

	}
	public function delete_article($id)//for deleting the article
	{
		$this->article_m->delete($id);
		redirect('admin/article');
	}
	//============================Managing article ends=====================================

	public function comment(){
		
		//function that pull comments and article title

		$id = $this->uri->segment(4);

		$this->data['articles']=$this->article_m->get($id);// to get article title

		//to get commets details
		$this->db->where('p_id=',$id);
        $this->data['comment'] = $this->article_m->getComment();


        //dump($this->data['comment']);
        //die();
		
		$this->data['subview']='admin/article/comment';
		$this->load->view('admin/_layout_main',$this->data);

		
	}

	//deleting comments
	function delet_comment(){

		$id = $this->uri->segment(4);
		$article_id = $this->uri->segment(5);
		$this->article_m->deleteComment($id);
		redirect('admin/article/comment/'.$article_id);		
	}
		
}
