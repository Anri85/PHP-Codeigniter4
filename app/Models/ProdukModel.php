<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table = 'tb_produk';
    protected $primaryKey = 'ID';
    protected $useTimestamps = true;
    protected $dateFormat = 'date';
    protected $createdField = 'Created_At';
    protected $updatedField = 'Updated_At';

    protected $allowedFields = ['ID_Vendor', 'Nama_Produk', 'Nama_Vendor', 'Harga_Produk', 'Deskripsi_Produk', 'Spesifikasi_Produk', 'Catatan_Produk', 'Status_Produk', 'Kategori_Produk', 'Size_Produk_S', 'Size_Produk_M', 'Size_Produk_L', 'Size_Produk_XL', 'Gambar_Produk'];

    public function getProduk($ID = false)
    {
        if ($ID == false) {
            return $this->findAll();
        }
        return $this->where(['ID' => $ID])->first();
    }

    public function getProdukVendor()
    {
        $session = user_id();

        return $this->where(['ID_Vendor' => $session])->findAll();
    }

    public function getProdukCategory($Category)
    {
        return $this->where(['Kategori_Produk' => $Category])->findAll();
    }

    public function Search($keyword)
    {
        $builder = $this->table('tb_produk');
        $builder->like('Nama_Produk', $keyword);
        return $builder;
    }
}
