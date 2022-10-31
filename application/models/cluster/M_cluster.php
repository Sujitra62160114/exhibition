<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Da_cluster.php';

class M_cluster extends Da_cluster
{
    public function __construct()
	{
		parent::__construct();
	}

    function get_cluster()
    {
        $sql = "SELECT * FROM {$this->db_name}.cluster ORDER BY cluster_id DESC";
        $query = $this->db->query($sql);
        return $query;
    }

}