<?php 
/**
* 
*/
class User extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	//============================Managing users=========================================
	public function index(){
		//fetch all the users from database
		$this->data['users']=$this->user_m->get();
		//load the view
		$this->data['subview']='admin/user/index';
		$this->load->view('admin/_layout_main',$this->data);

	}
	public function edit($id=NULL)
	{
		
		//if ($id) {
			if (is_numeric($id)) {
				$this->data['user']=$this->user_m->get($id);//if id is available we are storing in user variable.
				count($this->data['user'])||$this->data['errors'][]='User Could not be found';
			}else{
				
				$this->data['user']=$this->user_m->get_new();
			}
		//}else{
			//else cnot valid users
		//}
		//dump($this->data['user']);die();

		//set up the rules for form
		$rules=$this->user_m->rules_admin;
		$id||$rules['password']='|required';//if inserting password must be required
		$this->form_validation->set_rules($rules);

		//process the form
		if ($this->form_validation->run()!==FALSE) {
			//WE CAN LOG IN THE USER AND REDIRECT THEM
			$data=$this->user_m->array_from_post(array('email','password','username'));//it will be in My_Model
			//$data['password']=$this->user_m->hash_p($data['password']);

			 extract($data);
			

			$user_id = $this->aauth->create_user($email, $password, $username); //returns id of created users from aauth library

			// dump($user_id);
			// die();

			//id is parameter received from uri
			if($id == "admin"){

				$this->aauth->add_member($user_id, "Admin");

			}else if($id == "editor"){

				$this->aauth->add_member($user_id, "Editor");
			}

			
			
			//dump($email);die();
			//$this->aauth->create_user($email,$pass,$name);
			redirect('admin/user');

		}
		//load the view
		$this->data['subview']='admin/user/edit';
		$this->load->view('admin/_layout_main',$this->data);

	}
	public function delete_user($id)//for deleting the user
	{
		$this->user_m->delete($id);
		redirect('admin/user');
	}
	//============================Managing user ends=====================================
	//============================Log in and log out=====================================
	public function login(){
		//redirect the user if he is already logged in 
		$dashboard='admin/dashboard';
		//$this->user_m->loggedin()==FALSE || redirect($dashboard);

		//set the form
		$rules=$this->user_m->rules;//fetching rules variable from user_m model
		$this->form_validation->set_rules($rules);

		//process the form 
		if ($this->form_validation->run()!==FALSE) {
			# WE CAN LOG IN THE USER AND REDIRECT THEM
			if ($this->user_m->login()==TRUE) {
				//dump("wer are logged in");
				redirect($dashboard,'location');
			}else{
				$this->session->set_flashdata('errors','That email/password combination does not exits');
				redirect('admin/user/login','refresh');
			}

		}

		//we load the view
		$this->data['subview']='admin/user/login';
		$this->load->view('admin/_layout_modal',$this->data);
	}
	public function logout(){
		$this->user_m->logout();
		redirect('admin/user/login');
	}
	//==================call back function for unique email================
	public function _unique_email($str)
	{
		//do not validate if email already exists
		//unless it is the email for the current user
		
		$id=$this->uri->segment(4);//feching id
		$this->db->where('email',$this->input->post('email'));
		!$id ||$this->db->where('id!=',$id);
		//if id doesnot exist its ok but if it exist then we should not see for that id
		$user=$this->user_m->get();
		if(count($user)){
			$this->form_validation->set_message('_unique_email','%s Should be unique');
			return FALSE;
		}
		return TRUE;
	}
	public function create_user(){
			
		//$a=$this->aauth->create_user("shrijan70@mail.com", "12345", "shya");
       	//$a=$this->aauth->create_user("akash@mail.com", "12345", "Akash");
		//$a=$this->aauth->create_user("bikash@mail.com", "12345", "Bikash");
        // if ($a)
        //     echo "user created    ";
        // else
        //     echo "user can not be created   ";


       // print_r($this->aauth->get_user($a));
       // $this->aauth->print_errors();
	}
	public function create_group(){
		//$this->aauth->control('Admin');
		//$this->aauth->create_group('Editor','Editors are allowed to edit all article');
		//$this->aauth->create_group('Reporter','Reporter are allowed to edit thier article only');
		//$this->aauth->create_group('Subscriber','Subscriber');
	}
	public function create_perm(){
		//$this->aauth->create_perm('Administrator','All access');
		//$this->aauth->create_perm('Editor','All editing accebilites');
		//$this->aauth->create_perm('Author','Creating and editing own article');

	}
	public function group_to_perm(){
		//$this->aauth->allow_group('Admin','Administrator');
		//$this->aauth->allow_group('Editor','Editor');
		//$this->aauth->allow_group('Reporter','Author');

	}
	public function user_to_group(){

		//add user to group from interface where first parameter is user id and second parameter is group type(static dont change)

		// $this->aauth->add_member(2, "Admin");
		// $this->aauth->add_member(3, "Editor");
		// $this->aauth->add_member(4, "Editor");
		// $this->aauth->add_member(5, "Reporter");

	}
	public function user_to_perm(){

	}
	
}
