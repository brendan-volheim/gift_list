<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Othergifts extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("gift_api");
		if(isset($_COOKIE['gl_uname'])){
			$this->uname = $_COOKIE['gl_uname'];
		}else{
			header("Location: /gift_list/");
		}
	}

	public function index(){
		$data['uname'] = $this->uname;
		$data['active'] = "other";
		$data['title'] = "Other";
		$data['subtitle'] = "People";
		$this->load->view('templates/view_header.php', $data);
		$this->load->view('view_others.php', $data);
		$this->load->view('templates/view_footer.php');
	}

	public function user(){
		$data['uname'] = $this->uname;
		$data['other_user'] = $_GET['uname'];
		$data['userID'] = $_GET['id'];
		$data['title'] = $_GET['name'];
		$data['subtitle'] = "Gifts";
		$data['active'] = "other";
		$this->load->view('templates/view_header.php', $data);
		$this->load->view('view_other_user.php', $data);
		$this->load->view('templates/view_footer.php');
	} 

	public function purchase(){
		$data['uname'] = $this->uname;
		$data['quantity'] = $_GET['quantity'];
		$data['gift_id'] = $_GET['gift_id'];
		$this->gift_api->mark_gift_as_purchased($data);
		header("Location: /gift_list/index.php/select_others");
	}
}
