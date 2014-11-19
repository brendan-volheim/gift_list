<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct() {
		parent::__construct();	
		$this->load->model("gift_api");
	}

	public function list_gift_list(){
		if(isset($_GET['user'])){
			echo json_encode($this->gift_api->get_user_gifts($_GET['user']));
		}
	}

	public function delete_gift(){
		$this->gift_api->delete_row($_GET['id'], "gift_list");
	}

	public function get_class_users(){
		echo json_encode($this->gift_api->get_others_in_class($_GET['user']));
	}

	public function list_other_gift_list(){
		if(isset($_GET['user'])){
			echo json_encode($this->gift_api->get_other_user_gifts($_GET['user']));
		}
	}
	public function purchases(){
		if(isset($_GET['user'])){
			echo json_encode($this->gift_api->get_my_purchases($_GET['user']));
		}
	}

	public function delete_user_purchase(){
		$delete_data = array(
			"uname" => $_GET['user'],
			"gift_id" => $_GET['gift_id'],
			"quantity" => $_GET['quantity']
		);
		$this->gift_api->mark_gift_as_purchased($delete_data);
	}

	public function create_user(){
		$json = file_get_contents('php://input');
		$values = json_decode($json, true);
		echo $this->gift_api->create_user($values);
	}

	public function admin_list(){
		echo json_encode($this->gift_api->get_users_and_classes());
	}

	public function modify_class(){
		if(isset($_GET['uid']) && isset($_GET['cid']) && isset($_GET['action'])){
			if($_GET['cid'] != ""){
				$this->gift_api->modify_class($_GET);
			}
		}
		header("Location: /gift_list/index.php/select_admin");
	}
}
