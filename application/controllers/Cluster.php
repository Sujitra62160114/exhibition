<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once dirname(__FILE__) . './ExhibitionController.php';

class Cluster extends ExhibitionController {

	public function show_cluster_manage()
	{
        $_SESSION["sidebar"] = 'cluster';
		$this->output_admin('Cluster/v_cluster_manage');
	}

	public function get_cluster()
	{
		$this->load->model('cluster/M_cluster', 'cluster');
		$data = $this->cluster->get_cluster()->result();
		echo json_encode($data);
	}

	public function add_cluster()
	{
		$logo = $this->input->post('logo');
		$cluster_name = $this->input->post('cluster_name');
		$this->load->model('cluster/Da_cluster', 'cluster');
		$add = $this->cluster->add_cluster($logo, $cluster_name);
		$data['message'] = true;
		echo json_encode($data);
	}

	public function edit_cluster()
	{
		$id = $this->input->post('id');
		$logo = $this->input->post('logo');
		$cluster_name = $this->input->post('cluster_name');
		$this->load->model('cluster/Da_cluster', 'cluster');
		$add = $this->cluster->edit_cluster($logo, $cluster_name, $id);
		$data['message'] = true;
		echo json_encode($data);
	}

	public function delete_cluster()
	{
		$id = $this->input->post('id');
		$this->load->model('cluster/Da_cluster', 'cluster');
		$add = $this->cluster->delete_cluster($id);
		$data['message'] = true;
		echo json_encode($data);
	}
}