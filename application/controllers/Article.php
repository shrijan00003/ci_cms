<?php
class Article extends Frontend_Controller {

    public function __construct(){
        parent::__construct();
        
        $this->data['articles'] = $this->article_m->get_recent(10,$this->uri->segment(3));
        $this->load->model('ads_m');
        
    }

    public function index($id, $slug){
    	// Fetch the article
		$this->article_m->set_published();

		$this->data['article'] = $this->article_m->get($id);

        //accessing comments according to the articles
        //$this->db->select('body,c_name,date');
        $this->db->where('p_id=',$id);
        $this->db->limit(10);
        $this->data['comment'] = $this->article_m->getComment();
        // dump($this->data['comment']);
        // die();


         $this->db->where('pubdate<=',date('Y-m-d'));
        $this->db->limit(9);
        $this->data['also_see']=$this->article_m->get();
        //recommended
        $this->db->where('category=',$this->data['article']->category);
        $this->db->limit(5);
        $this->data['recommended']=$this->article_m->get();
        
        //fetching the ads
        $this->data['ads']=$this->ads_m->getAdvertisment_User_site();
        $this->data['pos']=$this->ads_m->getPositions();

    
        //fetching the recent articles from db
        $this->db->where('pubdate<=',date('Y-m-d'));
        $this->db->limit(5);
        $this->data['recent']=$this->article_m->get();

        
            //getting blogs secton
    	$this->db->where('category=','blog');
        $this->db->limit(3);
        $this->data['blog']=$this->article_m->get();


        $this->db->where('category=','health');
        $this->db->limit(3);
        $this->data['health']=$this->article_m->get();

        $this->db->where('category=','education');
        $this->db->limit(3);
        $this->data['education']=$this->article_m->get();

        //getting sports in article page
        $this->db->where('category=','sports');
        $this->db->limit(3);
        $this->data['sports']=$this->article_m->get();
    	// Return 404 if not found
    	count($this->data['article']) || show_404(uri_string());
		
    	// Redirect if slug was incorrect
    	$requested_slug = $this->uri->segment(3);
    	$set_slug = $this->data['article']->slug;
    	if ($requested_slug != $set_slug) {
    		redirect('article/' . $this->data['article']->id . '/' . $this->data['article']->slug, 'location', '301');
    	}
    	
    	// Load view
    	add_meta_title($this->data['article']->title);
        $this->config->set_item('site_name', $this->data['article']->title);
    	$this->data['subview'] = 'article';
    	$this->load->view('_main_layout', $this->data);
    }

// normal comment 
    // public function comment(){


    //     echo "hello";
    //     $data=$this->article_m->array_from_post(array(
    //         'p_id',
    //         'c_name',
    //         'c_email',
    //         'body'
            
    //     ));//it will be in My_Model

                
    //     $this->article_m->saveComment($data);
    //     redirect('article');  


    // }

    /// comment using ajax

    public function getComments($id){


        $this->db->where('p_id=',$id);
        $this->db->limit(10);
        $this->data['comment'] = $this->article_m->getComment();
        
       json_encode($this->data['comment']);

    }
    
    public function ajax_comment(){
        $data = array(
                    'p_id'=> $this->input->post('p_id'),
                    'c_name'=> $this->input->post('c_name'),
                    'c_email'=> $this->input->post('c_email'),
                    //'body'=> $this->input->post('body'),
                    
      );
        $data['body']=nl2br($this->input->post('body'));
      $this->article_m->saveComment($data);


    } 
}
