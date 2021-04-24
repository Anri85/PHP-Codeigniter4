<?php

namespace App\Models;

use CodeIgniter\Model;

class CheckoutModel extends Model
{
    protected $table = 'tb_checkout';
    protected $primaryKey = 'ID';
    protected $useTimestamps = true;
    protected $createdField = 'Created_At';
    protected $updatedField = 'Updated_At';

    protected $allowedFields = ['ID_Cart', 'ID_User', 'ID_Vendor', 'Nama_Produk', 'Harga_Produk', 'Size', 'Kuantitas', 'Gambar_Produk', 'Created_At'];

    public function getOrder($ID)
    {
        return $this->where(['ID_Cart' => $ID])->first();
    }

    // public function letOrder()
    // {
    //     $session = user_id();

    //     return $this->where(['ID_User' => $session])->first();
    // }
}
