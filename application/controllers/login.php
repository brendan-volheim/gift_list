<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("userlogin");
	}	

	public function index()
	{
		if(isset($_POST['email']) && isset($_POST['password'])){
			if($this->userlogin->checkLogin($_POST['email'], $_POST['password'])){
				header("Location: /gift_list/index.php/home/");
			}else{
				$this->login();
			}
		}else if(isset($_COOKIE['gl_uname']) && isset($_COOKIE['gl_pword'])){
			header("Location: /gift_list/index.php/home/");
		}else{
			$this->login();
		};
	}

	public function login(){
		$this->load->view("view_login");
	}
	
	public function logout(){
		$this->userlogin->logout();
		header("Location: /gift_list/");
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
