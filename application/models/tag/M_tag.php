<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Da_tag.php';

class M_tag extends Da_tag
{
    public function __construct()
	{
		parent::__construct();
	}

    function get_tag()
    {
        $sql = "SELECT * FROM {$this->db_name}.tag ORDER BY tag_id DESC";
        $query = $this->db->query($sql);
        return $query;
    }

}