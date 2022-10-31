<?php

defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Da_user.php';

class M_user extends Da_user
{
    public function __construct()
	{
		parent::__construct();
	}

    function get_user()
    {
        $sql = "SELECT * FROM {$this->db_name}.user ORDER BY user_id DESC";
        $query = $this->db->query($sql);
        return $query;
    }

    function check_login($user ,$pass)
    {
        $sql = "SELECT * FROM {$this->db_name}.user
        WHERE user_email = ?  AND user_password = ?";

        $query = $this->db->query($sql,[$user,$pass]);
        return $query;
    }

    function get_user_by_id($id)
    {
        $sql = "SELECT * FROM {$this->db_name}.user WHERE user_id = $id";
        $query = $this->db->query($sql);
        return $query;
    }

}