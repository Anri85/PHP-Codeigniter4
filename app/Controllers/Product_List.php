<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\CartModel;
use App\Models\OrderModel;

class Product_List extends BaseController
{
    protected $produkModel;
    protected $Cart;
    protected $Order;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->Cart = new CartModel();
        $this->Order = new OrderModel();
    }

    public function index()
    {
        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $produk = $this->produkModel->Search($keyword);
        } else {
            $produk = $this->produkModel;
        }

        $jml = $this->Cart->getCart();
        $userOrderList = $this->Order->infoUserOrder();
        $vendorOrderList = $this->Order->infoVendorOrder();
        $hitung1 = count($userOrderList);
        $hitung2 = count($vendorOrderList);
        $count = count($jml);

        $data = [
            'produk' => $produk->paginate(6, 'tb_produk'),
            'pager' => $this->produkModel->pager,
            'count' => $count,
            'jmlOrderVendor' => $hitung2,
            'jmlOrderUser' => $hitung1,
            'OrderListVendor' => $vendorOrderList,
            'OrderListUser' => $userOrderList
        ];

        return view('e-commerce/product-list', $data);
    }

    //--------------------------------------------------------------------

}