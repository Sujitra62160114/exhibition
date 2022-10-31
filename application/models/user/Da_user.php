<?php 

defined('BASEPATH') or exit('No direct script access allowed');

require_once dirname(__FILE__) . '/../ExhibitionModel.php';

class Da_user extends ExhibitionModel
{
    public function __construct()
	{
		parent::__construct();
	}

    public function add_user($student_id, $first_name, $last_name, $email, $pass, $role)
    {
        $sql = "INSERT INTO {$this->db_name}.user (
            user_student_id, 
            user_first_name,
            user_last_name,
            user_email,
            user_password,
            role
        ) VALUES (?,?,?,?,?,?);";
        $query = $this->db->query($sql,[$student_id, $first_name, $last_name, $email, $pass, $role]);
        return $query;
    }

    public function delete_user($id)
    {
        $sql = "DELETE FROM {$this->db_name}.user WHERE user_id = ?";
        $this->db->query($sql, [$id]);
    }

    public function edit_user($student_id, $first_name, $last_name, $email, $role, $id)
	{
		$sql = "UPDATE {$this->db_name}.user SET 
        user_student_id = ?, 
        user_first_name = ?,
        user_last_name = ?,
        user_email = ?,
        role = ?
        WHERE user_id = ?";
        $this->db->query($sql, [$student_id, $first_name, $last_name, $email, $role, $id]);
	}
}