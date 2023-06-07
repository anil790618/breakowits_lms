<?php namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Database\ConnectionInterface;
class Main_model extends Model
{
	public function insert_table($table,$data)
	{
		if ($this->db->table($table)->insert($data)) {
			return $this->db->insertID();
		}
	}

	// public function update_table($table,$data,$condition)
	// {
	// 	$this->db->table($table)->update($data,$condition);
	// 	return $this->db->affectedRows();
    // }

    function update_table($table, $data, $condition){   
        return $this->db->table($table)->set($data)->where($condition)->update();
    }	

    public function getRowData($table,$columns,$condition)
    {
    	$query = $this->db->table($table)->select($columns)->where($condition)->get();
		if ($query->getNumRows() > 0) 
		{
			return $query->getRowArray();
		}
    }

    public function getQueryRowData($query)
    {
    	$query = $this->db->query($query);
		if ($query->getNumRows() > 0) 
		{
			return $query->getRowArray();
		}
    }

    public function getNumRow($table,$columns,$condition)
    {
    	$query = $this->db->table($table)->select($columns)->where($condition)->get();
		if ($query->getNumRows() > 0) 
		{
			return $query->getNumRows();
		}
    }


    public function getAllRowsData($table,$columns,$condition)
	{
		$query = $this->db->table($table)->select($columns)->where($condition)->get();
		if ($query->getNumRows() > 0) 
		{
			return $query->getResultArray();
		}
	}

	public function getQueryAllData($query)
	{
		$query = $this->db->query($query);
		if ($query->getNumRows() > 0) 
		{
			return $query->getResultArray();
		}
	}

	public function getQueryAllNumRows($query)
	{
		$query = $this->db->query($query);
		if ($query->getNumRows() > 0) 
		{
			return $query->getNumRows();
		}
	}

	
}
