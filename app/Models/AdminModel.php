<?php

namespace App\Models;

use CodeIgniter\Model;
// use CodeIgniter\Database\ConnectionInterface;
class AdminModel extends Model
{
    protected $table = 'tbl_users';
    protected $allowedFields = ['user_role_id','first_name','last_name','email','password'];
    // protected $beforeInsert = ['beforInsert'];
    // protected $beforeUpdate = ['beforeUpdate'];
    protected $primaryKey = ['id'];


    protected function beforeInsert(array $data){
        $data = $this->passwordHash($data);
        $data['data']['created_at'] - date('Y-m-d H:i:s');
        return $data;
    }
    protected function beforeUpdate(array $data){
        $data = $this->passwordHash($data);
        $data['data']['updated_at'] - date('Y-m-d H:i:s');
        return $data;
    }
    protected function passwordHash(array $data)
    {
       
        if ( isset($data['data']['password'])) {
            $data['data']['password']=password_hash($data['data']['password'], PASSWORD_DEFAULT);
            return $data;
            
        }

        // $data['data']['password_hash'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        // unset($data['data']['password']);

        // return $data;
    }

    public function getRowData($table,$columns,$condition)
    {
    	$query = $this->db->table($table)->select($columns)->where($condition)->get();
		if ($query->getNumRows() > 0) 
		{
			return $query->getRowArray();
		}
    }
      public function getPost()
     {
       $sql = "select * from Users where user_role_id=3";
       return $sql;
     }
}