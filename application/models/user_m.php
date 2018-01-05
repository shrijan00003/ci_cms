<?php 

class User_M extends MY_Model
{
	protected $_table_name="aauth_users";
	protected $_order_by="email";
	
	public $rules=array(//validation rules
		array(
			'field'=>'email',
			'label'=>'Email',
			'rules'=>'trim|required|valid_email|xss_clean'
			),
		array(
			'field'=>'password',
			'label'=>'Password',
			'rules'=>'trim|required'
			)

	);//this is for validation rules
	public $rules_admin=array(//validation rules
		array(
			'field'=>'username',
			'label'=>'Username',
			'rules'=>'trim|required|xss_clean'
			),
		array(
			'field'=>'email',
			'label'=>'Email',
			'rules'=>'trim|required|valid_email|callback__unique_email|xss_clean'
			),
		array(
			'field'=>'password',
			'label'=>'Password',
			'rules'=>'trim|matches[password_confirm]'//we are removing required for update
			),
		array(
			'field'=>'password_confirm',
			'label'=>'Confirm Password',
			'rules'=>'trim|matches[password]'//we are removing required for update
			),

	);//this is for validation rules
	
	function __construct()
	{
		parent::__construct();
	}

	public function login(){
		// $user=$this->get_by(array(
		// 	'email'=>$this->input->post('email'),
		// 	'password'=>$this->hash_p($this->input->post('password'))
		// 	),TRUE);//true for single result
		// if (count($user)==1) {
		// 	//log in user
		// 	$data=array(
		// 		//'name'=>$user->first_value(),
		// 		'email'=>$user->email,
		// 		'name'=>$user->name,
		// 		'password'=>$user->password,
		// 		'id'=>$user->id,
		// 		'loggedin'=>TRUE
		// 		);
		// 	$this->session->set_userdata($data);
		// 	return TRUE;
		// }
		
		//taking input with user
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$a=$this->aauth->login($email,$password);


		if($a){
			return true;
		}else{

			//if login details doesn't match it comes here
			//$this->aauth->print_errors();
		}

	}
	public function logout(){
		//$this->session->sess_destroy();
		$this->aauth->logout();
	}
	public function loggedin(){
		//return (bool) $this->session->userdata('loggedin');
		return (bool) $this->aauth->is_loggedin();
	}
	public function hash_p($string){
		//this is not needed as we are using library
		//return hash('sha512', $string.config_item('encryption_key'));
	}
	//following method is for getting new user if id is not available while editing
	public function get_new()
	{
		$user=new stdClass();
		$user->username='';
		$user->email='';
		$user->pass='';
		return $user;
	}

}