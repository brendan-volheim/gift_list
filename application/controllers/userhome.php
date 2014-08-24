<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Userhome extends CI_Controller {
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
		$data['active'] = "home";
		$data['title'] = "My";
		$data['subtitle'] = "Gift List";
		$this->load->view('templates/view_header.php', $data);
		$this->load->view('view_my_gifts.php', $data);
		$this->load->view('templates/view_footer.php');
	}

	public function add_gift(){
                $data['title'] = "Add New";
		$data['action'] = "/gift_list/index.php/post_gift/";
		$data['button_title'] = "Add Gift";
		if(isset($_GET['id'])){
			$data['gift_data']=$this->gift_api->get_row_from_id("gift_list", $_GET['id']);	
			$data['action'] = "/gift_list/index.php/update_gift?id=".$_GET['id'];
                	$data['title'] = "Update";
			$data['button_title'] = "Update Gift";
		}
                $data['uname'] = $this->uname;
                $data['active'] = "home";
                $data['subtitle'] = "Gift";
                $this->load->view('templates/view_header.php', $data);
		$this->load->view('add_new_gift.php', $data);
                $this->load->view('templates/view_footer.php');
	}

	public function post_gift(){
		$this->load->model("gift_api");
		$post_data = $_POST;
		$post_data['uname'] = $this->uname;
		if($this->gift_api->create_gift($post_data)){
			header("Location: /gift_list/index.php/home/");
		}
		print "ERROR";
	}

	public function update_gift(){
		$this->load->model("gift_api");
		$post_data = $_POST;
		$get_data = $_GET;
		if(isset($get_data['id'])){
			if($this->gift_api->update_table_row($get_data['id'], "gift_list", $post_data)){
				header("Location: /gift_list/index.php/home/");
			}
		}
	}
}
