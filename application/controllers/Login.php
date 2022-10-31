<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once dirname(__FILE__) . './ExhibitionController.php';

class Login extends ExhibitionController {

	public function show_login()
	{
		$this->output_login('Login/Login');
	}

	public function logout()
	{
		session_unset();
		redirect('Login/show_login');
	}

	public function check_login()
	{	
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$this->load->model('user/M_user', 'user');
		$check = $this->user->check_login($username, $password)->result();
		$data['message'] = true;
		if (count($check) == 1) {
			$_SESSION["user_id"] = $check[0]->user_id;
			$_SESSION['firstname'] = $check[0]->user_first_name;
			$_SESSION['lastname'] = $check[0]->user_last_name;
			$_SESSION['role'] = $check[0]->role; //1=user, 2=admin
			$data['message'] = true;
		}else{
			$data['message'] = false;
		}
		echo json_encode($data);
	}

}