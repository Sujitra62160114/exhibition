<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once dirname(__FILE__) . './ExhibitionController.php';

class Project extends ExhibitionController {

	public function show_project_manage()
	{
        $_SESSION["sidebar"] = 'project';
		$this->output_admin('Project/v_project_manage');
	}

	public function show_project_create()
	{
        $_SESSION["sidebar"] = 'project';
		$this->load->model('Company/M_company', 'company');
		$data['company'] = $this->company->get_company()->result();
		$this->load->model('Cluster/M_cluster', 'cluster');
		$data['cluster'] = $this->cluster->get_cluster()->result();
		$this->load->model('Team/M_team', 'team');
		$data['team'] = $this->team->get_team()->result();
		$this->output_admin('Project/v_project_create', $data);
	}

	public function get_project()
	{
		$this->load->model('project/M_project', 'project');
		 $data = $this->project->get_project()->result();
		echo json_encode($data);
	}

	public function change_status(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$this->load->model('project/Da_project', 'project');
		$this->project->change_status($status, $id);
		$data['message'] = true;
		echo json_encode($data);
	}

	public function add_project(){

		$project_name = $this->input->post('project_name');
		$class_year = $this->input->post('class_year');
		$company_id = $this->input->post('company_id');
		$member = $this->input->post('member');
		$detail = $this->input->post('detail');
		$radio = $this->input->post('radio');
		$this->load->model('project/M_project', 'project');
		$this->project->add_project($project_name, $class_year, $detail, $company_id);
		$data['max_id'] = $this->project->get_max_id()-row();
		if($radio == 2){
			$this->project->add_member($member, $data['max_id']->max_id);
			$this->project->add_cluster_project($radio, $data['max_id']->max_id);
		}else if($radio == 3){
			$this->project->add_member($member, $data['max_id']->max_id);
			$this->project->add_team_project($radio, $data['max_id']->max_id);
		}else{
			$this->project->add_member_teacher($member, $data['max_id']->max_id, $radio);
		}
	}
}