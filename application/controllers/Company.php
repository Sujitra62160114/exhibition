<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once dirname(__FILE__) . './ExhibitionController.php';

class Company extends ExhibitionController {

	public function show_company_manage()
	{
        $_SESSION["sidebar"] = 'company';
		$this->output_admin('Company/v_company_manage');
	}

	public function get_company()
	{
		$this->load->model('company/M_company', 'company');
		 $data = $this->company->get_company()->result();
		echo json_encode($data);
	}

	public function add_company()
	{
		$logo = $this->input->post('logo');
		$company_name = $this->input->post('company_name');
		$this->load->model('company/Da_company', 'company');
		$add = $this->company->add_company($logo, $company_name);
		$data['message'] = true;
		echo json_encode($data);
	}

	public function edit_company()
	{
		$id = $this->input->post('id');
		$logo = $this->input->post('logo');
		$company_name = $this->input->post('company_name');
		$this->load->model('company/Da_company', 'company');
		$add = $this->company->edit_company($logo, $company_name, $id);
		$data['message'] = true;
		echo json_encode($data);
	}

	public function delete_company()
	{
		$id = $this->input->post('id');
		$this->load->model('company/Da_company', 'company');
		$add = $this->company->delete_company($id);
		$data['message'] = true;
		echo json_encode($data);
	}
}