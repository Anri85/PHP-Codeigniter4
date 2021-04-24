<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\CartModel;
use App\Models\OrderModel;

class Product_Detail extends BaseController
{
    protected $produkModel;
    protected $vendor;
    protected $Cart;
    protected $Order;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->vendor = new UserModel();
        $this->Cart = new CartModel();
        $this->Order = new OrderModel();
    }

    public function index($ID, $Category)
    {
        $jml = $this->Cart->getCart();
        $userOrderList = $this->Order->infoUserOrder();
        $vendorOrderList = $this->Order->infoVendorOrder();
        $count = count($jml);
        $hitung1 = count($userOrderList);
        $hitung2 = count($vendorOrderList);

        $data = [
            'detailproduk' => $this->produkModel->getProduk($ID),
            'produk' => $this->produkModel->getProduk(),
            'produkcategory' => $this->produkModel->getProdukCategory($Category),
            'vendor' => $this->vendor->getUser(),
            'count' => $count,
            'jmlOrderUser' => $hitung1,
            'jmlOrderVendor' => $hitung2,
            'OrderListVendor' => $vendorOrderList,
            'OrderListUser' => $userOrderList
        ];

        return view('e-commerce/product-detail', $data);
    }

    //--------------------------------------------------------------------
}
