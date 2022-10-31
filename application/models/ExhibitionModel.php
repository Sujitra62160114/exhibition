<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ExhibitionModel extends CI_Model
{

	public $db;
	public $db_name;

	public function __construct()
	{
		$this->db = $this->load->database('default', true);
		$this->db_name = $this->db->database;
	}
}