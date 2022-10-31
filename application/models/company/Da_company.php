<?php 

defined('BASEPATH') or exit('No direct script access allowed');

require_once dirname(__FILE__) . '/../ExhibitionModel.php';

class Da_company extends ExhibitionModel
{
    public function __construct()
	{
		parent::__construct();
	}

    function add_company($logo, $company_name){
        $sql = "INSERT INTO {$this->db_name}.company (
            company_name, 
            image
        ) VALUES (?,?);";
        $query = $this->db->query($sql,[$company_name,$logo]);
        return $query;
    }

    function edit_company($logo, $company_name, $id){
        $sql = "UPDATE {$this->db_name}.company 
         SET company_name = ?, 
            image = ?
        WHERE company_id = ?;";
        $query = $this->db->query($sql,[$company_name,$logo, $id]);
        return $query;
    }

    public function delete_company($id)
    {
        $sql = "DELETE FROM {$this->db_name}.company WHERE company_id = ?";
        $this->db->query($sql, [$id]);
    }
}