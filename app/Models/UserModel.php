<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;

    protected $allowedFields = ['id', 'email', 'username', 'password_hash', 'UserImg', 'Mobile_No', 'Name', 'Gender', 'Payment_Address', 'Shipping_Address', 'Description'];

    public function getUserProfile()
    {
        $session = user_id();

        return $this->where(['id' => $session])->first();
    }

    public function getUser()
    {
        return $this->findAll();
    }
}
