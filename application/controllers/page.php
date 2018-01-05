<?php 
/**
* This page controller for front end page controller not for backend 
*/
class Page extends Frontend_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('page_m');
		$this->load->model('article_m');
		$this->load->model('ads_m');

	}
	public function index()
	{
		// Fetch the page template
    	$this->data['page'] = $this->page_m->get_by(array('slug' => (string) $this->uri->segment(1)), TRUE);
    	count($this->data['page']) || show_404(current_url());
    	add_meta_title($this->data['page']->title);
    	
    	//fetch recent data
    	$this->db->where('pubdate<=',date('Y-m-d'));
        $this->db->limit(5);
        $this->data['recent']=$this->article_m->get();

        ///recommend in homepage, needs to be changed
        $this->db->where('pubdate<=',date('Y-m-d'));
        $this->db->limit(5);
        $this->data['recommended']=$this->article_m->get();

        //also see part in pages
        $this->db->where('pubdate<=',date('Y-m-d'));
        $this->db->limit(9);
        $this->data['also_see']=$this->article_m->get();

        
        //fetch categorywise data//dump(sizeof(menuCount()));
       //  $categories = array();
       //  $categories = menuCount();
       // // dump($categories);
       //  //dump($categories[2]);
    	
       //  for ($i=0; $i<sizeof(menuCount()); $i++) { 
        	
       //  	$this->db->where('category=',$categories[$i]);
       //  	$this->db->limit(6);
       //  	$this->data['category']=$this->article_m->get();	
       //  }


        $this->db->where('category=','politics');
       	$this->db->limit(3);
       	$this->data['politics']=$this->article_m->get();

       	$this->db->where('category=','community');
       	$this->db->limit(3);
       	$this->data['community']=$this->article_m->get();

       	$this->db->where('category=','business');
       	$this->db->limit(3);
       	$this->data['business']=$this->article_m->get();

       	$this->db->where('category=','entertainment');
       	$this->db->limit(3);
       	$this->data['entertainment']=$this->article_m->get();

       	$this->db->where('category=','sports');
       	$this->db->limit(3);
       	$this->data['sports']=$this->article_m->get();

       	$this->db->where('category=','art-literature');
       	$this->db->limit(3);
       	$this->data['art_literature']=$this->article_m->get();

       	$this->db->where('category=','technology');
       	$this->db->limit(3);
       	$this->data['technology']=$this->article_m->get();

       	$this->db->where('category=','world');
       	$this->db->limit(3);
       	$this->data['world']=$this->article_m->get();

       	$this->db->where('category=','economy');
       	$this->db->limit(3);
       	$this->data['economy']=$this->article_m->get();

       	$this->db->where('category=','health');
       	$this->db->limit(3);
       	$this->data['health']=$this->article_m->get();

       	$this->db->where('category=','education');
       	$this->db->limit(3);
       	$this->data['education']=$this->article_m->get();

       	$this->db->where('category=','blog');
       	$this->db->limit(3);
       	$this->data['blog']=$this->article_m->get();


       	$this->data['ads']=$this->ads_m->getAdvertisment_User_site();
       	$this->data['pos']=$this->ads_m->getPositions();

       	//dump($this->data['ads']);
       	//dump($this->data['pos']);die();
       	

    	// Fetch the page data
    	$method = '_' . $this->data['page']->template;
    	if (method_exists($this, $method)) {
    		$this->$method();
    	}
    	else {
    		log_message('error', 'Could not load template ' . $method .' in file ' . __FILE__ . ' at line ' . __LINE__);
    		show_error('Could not load template ' . $method);
    	}
    	
    	// Load the view
    	$this->config->set_item('site_name', $this->data['page']->title." - ".config_item('site_name'));
    	$this->data['subview'] = $this->data['page']->template;
    	$this->load->view('_main_layout', $this->data);
    }
	private function _page(){
		//this will fetch any extra page data
		//dump('welcome from the page template');

		$this->load->model('article_m');
		//count all articles
		$this->db->where('category=',$this->uri->segment(1));
		$count=$this->db->count_all_results('articles');

		$this->db->where('category=',$this->uri->segment(1));
        $this->db->limit(5);
        $this->data['recommended']=$this->article_m->get();


		if($count>0){
			//pagination in different pages
			$perpage = 15;
			if ($count > $perpage) {
				$this->load->library('pagination');
				$config['base_url'] = site_url($this->uri->segment(1) . '/');
				$config['total_rows'] = $count;
				$config['per_page'] = $perpage;
				$config['uri_segment'] = 2;
				$this->pagination->initialize($config);
				$this->data['pagination'] = $this->pagination->create_links();
				$offset = $this->uri->segment(2);
			}
			else {
				$this->data['pagination'] = '';
				$offset = 0;
			}
			//Fetch articles	

			$this->article_m->set_published();
			$this->db->where('category=',$this->uri->segment(1)); //fetching data where category == segment 1 in url according to page
			$this->db->limit($perpage, $offset);
			$this->data['articles'] = $this->article_m->get();

			//get for recent
			$this->db->where('pubdate<=',date('Y-m-d'));
			$this->db->limit(5);
			$this->data['recent']=$this->article_m->get();
		}else{
			$this->article_m->set_published();
			$this->data['articles'] = $this->article_m->get();
			$this->db->where('pubdate<=',date('Y-m-d'));
			$this->db->limit(5);
			$this->data['recent']=$this->article_m->get();	
		}
		
	}

	private function _homepage(){
		//this will fetch any extra page data
		$this->load->model('article_m');
		$this->db->where('pubdate<=',date('Y-m-d'));
		$this->db->limit(6);
		$this->data['articles']=$this->article_m->get();
	}
	
	private function _news_archive(){
		$this->load->model('article_m');
		//count all articles
		$this->db->where('pubdate<=',date('Y-m-d'));
		$count=$this->db->count_all_results('articles');
		//setup pagination
		$perpage = 30;
		if ($count > $perpage) {
			$this->load->library('pagination');
			$config['base_url'] = site_url($this->uri->segment(1) . '/');
			$config['total_rows'] = $count;
			$config['per_page'] = $perpage;
			$config['uri_segment'] = 2;
			$this->pagination->initialize($config);
			$this->data['pagination'] = $this->pagination->create_links();
			$offset = $this->uri->segment(2);
		}
		else {
			$this->data['pagination'] = '';
			$offset = 0;
		}
		//Fetch articles	
			$this->article_m->set_published();
			$this->db->limit($perpage, $offset);
			$this->data['articles'] = $this->article_m->get();	
	}
}