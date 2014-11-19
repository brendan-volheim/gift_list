<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("gift_api");
                if(isset($_COOKIE['gl_uname'])){
                        $this->uname = $_COOKIE['gl_uname'];
                        if(isset($_COOKIE['gl_role'])){
                                $this->role = $_COOKIE['gl_role'];
                        }else{
                                $this->role = "guest";
                        }
                }else{
                        header("Location: /gift_list/");
                }
	}

	public function index(){
		if($this->role == "admin"){
			$data['uname'] = $this->uname;
			$data['role'] = $this->role;
			$data['active'] = "admin";
			$data['title'] = "Admin";
			$data['subtitle'] = "";
			$this->load->view('templates/view_header.php', $data);
			$this->load->view('admin.php', $data);
			$this->load->view('templates/view_footer.php');
		}
	}

	public function add_to_class(){
		if($this->role == "admin"){
                        $data['uname'] = $this->uname;
                        $data['role'] = $this->role;
                        $data['active'] = "admin";
                        $data['title'] = "Add To";
                        $data['subtitle'] = "Class";
                        $this->load->view('templates/view_header.php', $data);
                        $this->load->view('add_to_class.php', $data);
                        $this->load->view('templates/view_footer.php');
                }
	}

	public function add_user_class(){
		if($this->role == "admin"){
			$this->load->model("gift_api");
                	$post_data = $_POST;
                        if($this->gift_api->get_and_add_user_class($post_data)){
                                header("Location: /gift_list/index.php/admin/");
                        }
                }
	}
}
