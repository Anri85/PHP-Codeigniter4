<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'tb_cart';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['ID_Random', 'ID_Vendor', 'ID_User', 'ID_Produk', 'Nama_Produk', 'Harga_Produk', 'Kategori_Produk', 'Status_Produk', 'Size_Produk_S', 'Size_Produk_M', 'Size_Produk_L', 'Size_Produk_XL', 'Gambar_Produk', 'Created_at_Produk', 'Updated_at_Produk'];

    public function getCart()
    {
        $session = user_id();

        return $this->where(['ID_User' => $session])->findAll();
    }

    public function getSingleCart($ID)
    {
        return $this->where(['id' => $ID])->first();
    }
}
