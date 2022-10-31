<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once dirname(__FILE__) . './ExhibitionController.php';

class User extends ExhibitionController {

	public function show_user_manage()
	{
        $_SESSION["sidebar"] = 'user';
		$this->output_admin('User/v_user_manage');
	}

	public function get_user()
	{
		$this->load->model('user/M_user', 'user');
		$data = $this->user->get_user()->result();
		echo json_encode($data);
	}

	public function show_user_create(){
		$this->output_admin('User/v_user_create');
	}

	public function delete_user(){
		$id = $this->input->post('id');
		$this->load->model('user/Da_user', 'user');
		$add = $this->user->delete_user($id);
		$data['message'] = true;
		echo json_encode($data);
	}

	public function add_user(){
		$first_name =  $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$student_id =  $this->input->post('student_id');
		$email = $this->input->post('email');
		$pass = md5($this->input->post('pass'));
		$role = $this->input->post('role');
		
		$this->load->model('user/Da_user', 'user');
		$this->user->add_user($student_id, $first_name, $last_name, $email, $pass, $role);
		$data['message'] = true;
		echo json_encode($data);
	}

	public function show_user_edit($id){
		$this->load->model('user/M_user', 'user');
		$data['user'] = $this->user->get_user_by_id($id)->row();
		$this->output_admin('User/v_user_edit', $data);
	}

	public function edit_user(){
		$id =  $this->input->post('id');
		$first_name =  $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
		$student_id =  $this->input->post('student_id');
		$email = $this->input->post('email');
		// $pass = md5($this->input->post('pass'));
		$role = $this->input->post('role');
		
		$this->load->model('user/Da_user', 'user');
		$this->user->edit_user($first_name, $last_name, $student_id, $email, $role, $id);
		$data['message'] = true;
		echo json_encode($data);
	}



}