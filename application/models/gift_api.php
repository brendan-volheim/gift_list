<?php

class Gift_api extends CI_Model{
	public function __construct(){
		$this->load->database();
		date_default_timezone_set('America/Los_Angeles');
	}

	public function get_user_gifts($uname){
		$gifts_query = "SELECT id, gift_name, gift_description, size, url, price, quantity FROM gift_list WHERE owner_id IN (SELECT id FROM user WHERE uname = '".$uname."')";
		return $this->db->query($gifts_query)->result_array(); 
	}

	public function get_other_user_gifts($uname){
		$gifts_query = "SELECT id, gift_name, gift_description, size, url, price, quantity, purchased FROM gift_list WHERE purchased < quantity AND owner_id IN (SELECT id FROM user WHERE uname = '".$uname."')";
		return $this->db->query($gifts_query)->result_array(); 
	}

	public function get_row_from_id($table, $id){
		$custom_query = "SELECT * FROM ".$table." WHERE id = ".$id;
		$results = $this->db->query($custom_query)->result_array(); 
		if(count($results) >= 1){
			return $results[0];
		}
		return $results;
	}

	public function get_user_from_uname($uname){
		$user_query = "SELECT * FROM user WHERE uname = '".$uname."';";
		return $this->db->query($user_query)->result_array();
	}

	public function create_gift($gift_data){
		$user_data = Gift_api::get_user_from_uname($gift_data['uname']);
		unset($gift_data['uname']);
		if(count($user_data) > 0){
			$gift_data["owner_id"] = $user_data[0]['id'];
			$this->db->insert('gift_list', $gift_data);
			if($this->db->affected_rows() > 0){
				return true;
			}
		}
		return false;
	}

	public function update_table_row($id, $table, $table_data){
		$this->db->where('id', $id);
		$this->db->update($table, $table_data);
		return true;
	}

	public function delete_row($id, $table){
		$gifts_query = "SELECT * FROM ".$table." WHERE id = ".$id;
		if(count($this->db->query($gifts_query)->result_array()) >= 1){
			$this->db->where('id', $id);
   			$this->db->delete($table);
		}
	}

	public function get_others_in_class($uname){
		$query = 'SELECT * FROM user WHERE id IN (SELECT user_id FROM user_class WHERE class_id IN (SELECT class_id FROM user_class WHERE user_id IN (SELECT id FROM user WHERE uname ="'.$uname.'"))) AND uname != "'.$uname.'" ORDER BY last_name';
		return $this->db->query($query)->result_array(); 
	}

	public function mark_gift_as_purchased($gift_data){
		$user_data = Gift_api::get_user_from_uname($gift_data['uname']);
		
		$gift_purchase_query = "SELECT * FROM user_purchase WHERE gift_id = ".$gift_data['gift_id']." AND user_id = ".$user_data[0]['id'].";";
		$result_array = $this->db->query($gift_purchase_query)->result_array();
		if(count($result_array) > 0){
			$update_query = "UPDATE user_purchase SET quantity = quantity + ".$gift_data['quantity']." WHERE gift_id = ".$gift_data['gift_id']." AND user_id = ".$user_data[0]['id'].";";
			$this->db->query($update_query);
			$result_array = $this->db->query($gift_purchase_query)->result_array();
			if($result_array[0]['quantity'] == 0){
				$this->db->where('id', $result_array[0]['id']);
				$this->db->delete("user_purchase");
			}
		}else{
			$insert_data = Array(
				"user_id" => $user_data[0]['id'],
				"gift_id" => $gift_data['gift_id'],
				"quantity" => $gift_data['quantity']
			);
			$this->db->insert('user_purchase', $insert_data);
		}
		$update_query = "UPDATE gift_list SET purchased = purchased + ".$gift_data['quantity']." WHERE id = ".$gift_data['gift_id'].";";
		$this->db->query($update_query);
	}

	public function get_my_purchases($uname){
		$return_array = Array();
		$custom_user_purchase_query = "SELECT id, gift_id, quantity FROM user_purchase WHERE user_id IN (SELECT id FROM user WHERE uname = 'sclaxplayer');";
		$query_results = $this->db->query($custom_user_purchase_query)->result_array();	
		foreach($query_results as $var){
			$custom_gift_query = "SELECT * FROM gift_list WHERE id =".$var['gift_id'];
			$gift_array = $this->db->query($custom_gift_query)->result_array();

			$giftee_query = "SELECT * FROM user WHERE id = ".$gift_array[0]['owner_id'];
			$giftee_array = $this->db->query($giftee_query)->result_array();

			array_push($return_array, array(
				"id" => $var['id'],
				"gift_id"=> $gift_array[0]['id'],
				"gift_name"=> $gift_array[0]['gift_name'],
				"gift_description"=> $gift_array[0]['gift_description'],
				"gift_owner"=> $giftee_array[0]['first_name']." ".$giftee_array[0]['last_name'],
				"price"=> $gift_array[0]['price'],
				"size"=> $gift_array[0]['size'],
				"url"=> $gift_array[0]['url'],
				"quantity"=> $var['quantity'],
				"uname" => $uname
			));
		}
		return $return_array;
	}

	public function create_user($user_data){
		$user_data['password'] = md5($user_data['password']);
		$user_data['role']="guest";
		$user_data['updated'] = date("Y-m-d H:i:s");
		$user_data['created'] = date("Y-m-d H:i:s");
		$this->db->insert('user', $user_data);
                if($this->db->affected_rows() > 0){
			return true;
                }
		return false;
	}
}
