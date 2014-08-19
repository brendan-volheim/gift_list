<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userhome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(isset($_COOKIE['gl_uname'])){
			$this->uname = $_COOKIE['gl_uname'];
		}else{
			header("Location: /gift_list/");
		}
	}

	public function index(){
		$data['uname'] = $this->uname;
		$data['active'] = "home";
		$this->load->view('templates/view_header.php', $data);
		$this->load->view('templates/view_footer.php');
	}
}
