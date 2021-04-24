<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'tb_order';
    protected $primaryKey = 'ID';
    protected $useTimestamps = true;
    protected $createdField = 'Created_At';
    protected $updatedField = 'Updated_At';

    protected $allowedFields = ['ID_User', 'ID_Vendor', 'ID_Random', 'Username/Name', 'BA_First_Name', 'BA_Last_Name', 'BA_Email', 'BA_Mobile_No', 'BA_Country', 'BA_City', 'Billing_Address', 'Payment_Method', 'SA_First_Name', 'SA_Last_Name', 'SA_Email', 'SA_Mobile_No', 'SA_Country', 'SA_City', 'Shipping_Address', 'Deliver_By', 'Product_Pict', 'Nama_Produk', 'Harga_Produk', 'Kuantitas', 'Size', 'Sub_Total', 'Shipping_Cost', 'Total', 'Created_At', 'Updated_At'];

    public function infoUserOrder()
    {
        $session = user_id();

        return $this->where(['ID_User' => $session])->findAll();
    }

    public function infoVendorOrder()
    {
        $session = user_id();

        return $this->where(['ID_Vendor' => $session])->findAll();
    }
}
