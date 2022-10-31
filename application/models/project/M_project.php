<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Da_project.php';

class M_project extends Da_project
{
    public function __construct()
	{
		parent::__construct();
	}

    function get_project()
    {
        $sql = "SELECT * FROM {$this->db_name}.project join user on project.user_create = user.user_id ORDER BY project_id DESC";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_max_id()
    {
        $sql = "SELECT MAX(qp_id) AS max_id FROM {$this->db_name}.project";
        $query = $this->db->query($sql);
        return $query;
    }

}