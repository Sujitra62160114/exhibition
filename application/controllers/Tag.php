<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once dirname(__FILE__) . './ExhibitionController.php';

class Tag extends ExhibitionController {

	public function show_tag_manage()
	{
        $_SESSION["sidebar"] = 'tag';
		$this->output_admin('Tag/v_tag_manage');
	}

	public function get_tag()
	{
		$this->load->model('tag/M_tag', 'tag');
		 $data = $this->tag->get_tag()->result();
		echo json_encode($data);
	}

	public function add_tag()
	{
		$tag_name = $this->input->post('tag_name');
		$status = $this->input->post('status');
	
		$this->load->model('tag/Da_tag', 'tag');
		$add = $this->tag->add_tag($tag_name, $status);
		$data['message'] = true;
		echo json_encode($data);
	}

	public function edit_tag()
	{
		$id = $this->input->post('id');
		$tag_name = $this->input->post('tag_name');
		$status = $this->input->post('status');

		$this->load->model('tag/Da_tag', 'tag');
		$add = $this->tag->edit_tag($tag_name, $status, $id);
		$data['message'] = true;
		echo json_encode($data);
	}

	public function delete_tag()
	{
		$id = $this->input->post('id');
		$this->load->model('tag/Da_tag', 'tag');
		$add = $this->tag->delete_tag($id);
		$data['message'] = true;
		echo json_encode($data);
	}

	public function change_status(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$this->load->model('tag/Da_tag', 'tag');
		$this->tag->change_status($status, $id);
		$data['message'] = true;
		echo json_encode($data);
	}


}