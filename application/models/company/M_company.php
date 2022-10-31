<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Da_company.php';

class M_company extends Da_company
{
    public function __construct()
	{
		parent::__construct();
	}

    function get_company()
    {
        $sql = "SELECT * FROM {$this->db_name}.company ORDER BY company_id DESC";
        $query = $this->db->query($sql);
        return $query;
    }

}