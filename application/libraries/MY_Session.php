<?php 
/**
* 
*/
class MY_Session extends CI_Session
{
	
	function __construct(argument)
	{
		parent::__construct();
	}
	//override the sess_update function this is only update the session if it is not ajax request
	function sess_update(){
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH'])&&$_SERVER['HTTP_X_REQUESTED_WITH']!=='XMLHttpRequest') {
			parent::sess_update();
		}
	}

}