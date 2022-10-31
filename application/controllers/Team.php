<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once dirname(__FILE__) . './ExhibitionController.php';

class team extends ExhibitionController {

	public function show_team_manage()
	{
        $_SESSION["sidebar"] = 'team';
		$this->output_admin('Team/v_team_manage');
	}

	public function get_team()
	{
		$this->load->model('Team/M_team', 'team');
		$data = $this->team->get_team()->result();
		echo json_encode($data);
	}

	public function add_team()
	{
		//$logo = $this->input->post('logo'); //todo
		$team_name = $this->input->post('team_name');
		$this->load->model('team/Da_team', 'team');
		$add = $this->team->add_team($team_name);
		$data['message'] = true;
		echo json_encode($data);
	}

	public function edit_team()
	{
		$id = $this->input->post('id');
		//$logo = $this->input->post('logo'); //todo
		$team_name = $this->input->post('team_name');
		$this->load->model('team/Da_team', 'team');
		$add = $this->team->edit_team($team_name, $id);
		$data['message'] = true;
		echo json_encode($data);
	}

	public function delete_team()
	{
		$id = $this->input->post('id');
		$this->load->model('team/Da_team', 'team');
		$add = $this->team->delete_team($id);
		$data['message'] = true;
		echo json_encode($data);
	}
}