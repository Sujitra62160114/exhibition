<?php 

defined('BASEPATH') or exit('No direct script access allowed');

require_once dirname(__FILE__) . '/../ExhibitionModel.php';

class Da_project extends ExhibitionModel
{
    public function __construct()
	{
		parent::__construct();
	}

    public function change_status($status, $id){
        $sql = "UPDATE {$this->db_name}.project
        SET status = ?
       WHERE project_id = ?;";
       $query = $this->db->query($sql,[$status, $id]);
       return $query;
    }

    public function add_project($project_name, $class_year, $detail, $company_id){
        $sql = "INSERT INTO {$this->db_name}.project (
            project_name, 
            class_year,
            detail,
            company_id,
            status,
            user_create
        ) VALUES (?,?,?,?,?);";
        $query = $this->db->query($sql,[$project_name, $class_year, $detail, $company_id, 1, $_SESSION["user_id"] ]);
        return $query;
    }

    public function add_member($member, $max_id){
        $sql = "INSERT INTO {$this->db_name}.project (
            name, 
            project_id,
        ) VALUES (?,?);";
        for($i = 0; $i < count($member); $i++){
            $query = $this->db->query($sql,[$member[$i], $max_id]);
        }
        return $query;
    }

    public function add_member_teacher($member, $max_id, $radio){
        $sql = "INSERT INTO {$this->db_name}.project (
            name, 
            project_id,
            teacher,
        ) VALUES (?,?);";
        for($i = 0; $i < count($member); $i++){
            $query = $this->db->query($sql,[$member[$i], $max_id, $radio]);
        }
        return $query;
    }
}