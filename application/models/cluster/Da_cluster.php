<?php 

defined('BASEPATH') or exit('No direct script access allowed');

require_once dirname(__FILE__) . '/../ExhibitionModel.php';

class Da_cluster extends ExhibitionModel
{
    public function __construct()
	{
		parent::__construct();
	}

    function add_cluster($logo, $cluster_name){
        $sql = "INSERT INTO {$this->db_name}.cluster (
            cluster_name, 
            image
        ) VALUES (?,?);";
        $query = $this->db->query($sql,[$cluster_name,$logo]);
        return $query;
    }

    function edit_cluster($logo, $cluster_name, $id){
        $sql = "UPDATE {$this->db_name}.cluster 
         SET cluster_name = ?, 
            image = ?
        WHERE cluster_id = ?;";
        $query = $this->db->query($sql,[$cluster_name,$logo, $id]);
        return $query;
    }

    public function delete_cluster($id)
    {
        $sql = "DELETE FROM {$this->db_name}.cluster WHERE cluster_id = ?";
        $this->db->query($sql, [$id]);
    }
}