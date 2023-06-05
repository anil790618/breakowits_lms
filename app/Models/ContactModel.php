<?php namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table      = 'tbl_users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['first_name', 'first_name', 'email','password'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}