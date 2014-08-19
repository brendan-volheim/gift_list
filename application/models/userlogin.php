<?php

class Userlogin extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	public function checkLogin($username, $password){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('user.uname', $username);
		$this->db->where('user.password', md5($password));
		if(count($this->db->get()->result_array()) == 1){
			setcookie('gl_uname',$username,time() + (86400 * 7),'/');
			setcookie('gl_pword',md5($password),time() + (86400 * 7), '/');
			return true;
		}
		return false;
	}

	public function logout(){
		setcookie('gl_uname', "",time() + (86400 * 7), '/');
                setcookie('gl_pword', "",time() + (86400 * 7), '/');
		print_r($_COOKIE);
	}
}
