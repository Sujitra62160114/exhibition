<?php 

defined('BASEPATH') or exit('No direct script access allowed');

require_once dirname(__FILE__) . '/../ExhibitionModel.php';

class Da_team extends ExhibitionModel
{
    public function __construct()
	{
		parent::__construct();
	}

    function add_team($team_name){
        $sql = "INSERT INTO {$this->db_name}.team (
            team_name
        ) VALUES (?);";
        $query = $this->db->query($sql,[$team_name]);
        return $query;
    }

    function edit_team($team_name, $id){
        $sql = "UPDATE {$this->db_name}.team 
         SET team_name = ?
        WHERE team_id = ?;";
        $query = $this->db->query($sql,[$team_name, $id]);
        return $query;
    }

    public function delete_team($id)
    {
        $sql = "DELETE FROM {$this->db_name}.team WHERE team_id = ?";
        $this->db->query($sql, [$id]);
    }
}