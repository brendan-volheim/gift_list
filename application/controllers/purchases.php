<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchases extends CI_Controller {
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
		$data['uname'] = $this->uname;
		$data['role'] = $this->role;
		$data['active'] = "purchase";
		$data['title'] = "My";
		$data['subtitle'] = "Purchases";
		$this->load->view('templates/view_header.php', $data);
		$this->load->view('view_purchases.php', $data);
		$this->load->view('templates/view_footer.php');
	}
}
