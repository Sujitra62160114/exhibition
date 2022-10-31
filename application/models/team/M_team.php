<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Da_team.php';

class M_team extends Da_team
{
    public function __construct()
	{
		parent::__construct();
	}

    function get_team()
    {
        $sql = "SELECT * FROM {$this->db_name}.team ORDER BY team_id DESC";
        $query = $this->db->query($sql);
        return $query;
    }

}