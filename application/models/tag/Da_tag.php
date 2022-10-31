<?php 

defined('BASEPATH') or exit('No direct script access allowed');

require_once dirname(__FILE__) . '/../ExhibitionModel.php';

class Da_tag extends ExhibitionModel
{
    public function __construct()
	{
		parent::__construct();
	}

    function add_tag($tag_name, $status){
        $sql = "INSERT INTO {$this->db_name}.tag (
            tag_name,
            status
        ) VALUES (?,?);";
        $query = $this->db->query($sql,[$tag_name, $status]);
        return $query;
    }

    function edit_tag($tag_name, $status, $id){
        $sql = "UPDATE {$this->db_name}.tag
         SET tag_name = ?,
         status = ?
        WHERE tag_id = ?;";
        $query = $this->db->query($sql,[$tag_name, $status, $id]);
        return $query;
    }

    public function delete_tag($id)
    {
        $sql = "DELETE FROM {$this->db_name}.tag WHERE tag_id = ?";
        $this->db->query($sql, [$id]);
    }

    public function change_status($status, $id){
        $sql = "UPDATE {$this->db_name}.tag
        SET status = ?
       WHERE tag_id = ?;";
       $query = $this->db->query($sql,[$status, $id]);
       return $query;
    }
}