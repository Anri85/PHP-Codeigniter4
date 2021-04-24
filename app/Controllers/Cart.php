<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\ProdukModel;
use App\Models\OrderModel;

class Cart extends BaseController
{
    protected $Cart;
    protected $ProdukModel;
    protected $Order;

    public function __construct()
    {
        $this->Cart = new CartModel();
        $this->ProdukModel = new ProdukModel();
        $this->Order = new OrderModel();
    }

    public function index()
    {
        $Cart = $this->Cart->getCart();
        if ($Cart == null) {
            session()->setFlashdata('notif', 'No Product in The Cart');
        }

        $jml = $this->Cart->getCart();
        $userOrderList = $this->Order->infoUserOrder();
        $vendorOrderList = $this->Order->infoVendorOrder();
        $hitung1 = count($userOrderList);
        $hitung2 = count($vendorOrderList);
        $count = count($jml);

        $data = [
            'cart' => $Cart,
            'jmlOrderVendor' => $hitung2,
            'jmlOrderUser' => $hitung1,
            'count' => $count,
            'OrderListVendor' => $vendorOrderList,
            'OrderListUser' => $userOrderList
        ];

        return view('e-commerce/cart', $data);
    }

    public function cart($ID)
    {
        if (user_id() == null) {
            return redirect()->to('/Cart');
        }

        $produk = $this->ProdukModel->getProduk($ID);

        $id = uniqid();
        $users = user_id();

        $_SESSION['cart'] = [
            'ID_Random' => $id,
            'ID_Vendor' => $produk['ID_Vendor'],
            'ID_User' => $users,
            'ID_Produk' => $produk['ID'],
            'Nama_Produk' => $produk['Nama_Produk'],
            'Harga_Produk' => $produk['Harga_Produk'],
            'Kategori_Produk' => $produk['Kategori_Produk'],
            'Status_Produk' => $produk['Status_Produk'],
            'Size_Produk' => [
                'S' => $produk['Size_Produk_S'],
                'M' => $produk['Size_Produk_M'],
                'L' => $produk['Size_Produk_L'],
                'XL' => $produk['Size_Produk_XL']
            ],
            'Gambar_Produk' => $produk['Gambar_Produk'],
            'Created_at_Produk' => $produk['Created_At'],
            'Updated_at_Produk' => $produk['Updated_At']
        ];

        $this->Cart->save([
            'ID_Random' => $_SESSION['cart']['ID_Random'],
            'ID_Vendor' => $_SESSION['cart']['ID_Vendor'],
            'ID_User' => $_SESSION['cart']['ID_User'],
            'ID_Produk' => $_SESSION['cart']['ID_Produk'],
            'Nama_Produk' => $_SESSION['cart']['Nama_Produk'],
            'Harga_Produk' => $_SESSION['cart']['Harga_Produk'],
            'Kategori_Produk' => $_SESSION['cart']['Kategori_Produk'],
            'Status_Produk' => $_SESSION['cart']['Status_Produk'],
            'Size_Produk_S' => $_SESSION['cart']['Size_Produk']['S'],
            'Size_Produk_M' => $_SESSION['cart']['Size_Produk']['M'],
            'Size_Produk_L' => $_SESSION['cart']['Size_Produk']['L'],
            'Size_Produk_XL' => $_SESSION['cart']['Size_Produk']['XL'],
            'Gambar_Produk' => $_SESSION['cart']['Gambar_Produk'],
            'Created_at_Produk' => $_SESSION['cart']['Created_at_Produk'],
            'Updated_at_Produk' => $_SESSION['cart']['Updated_at_Produk']
        ]);

        unset($_SESSION['cart']);

        session()->setFlashdata('pesan', 'Product Has Been Added Into a Cart!');

        return redirect()->to($_SESSION['_ci_previous_url']);
    }

    public function Delete()
    {
        $ID = $this->request->getVar('id');

        $this->Cart->delete($ID);

        session()->setFlashdata('notif', 'Product Has Been Removed!');

        return redirect()->to('/Cart');
    }
}
