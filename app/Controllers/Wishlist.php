<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\OrderModel;

class Wishlist extends BaseController
{
    protected $Cart;
    protected $Order;

    public function __construct()
    {
        $this->Cart = new CartModel();
        $this->Order = new OrderModel();
    }

    public function index()
    {
        $jml = $this->Cart->getCart();
        $userOrderList = $this->Order->infoUserOrder();
        $vendorOrderList = $this->Order->infoVendorOrder();
        $hitung1 = count($userOrderList);
        $hitung2 = count($vendorOrderList);
        $count = count($jml);

        $data = [
            'count' => $count,
            'jmlOrderVendor' => $hitung2,
            'jmlOrderUser' => $hitung1,
            'OrderListVendor' => $vendorOrderList,
            'OrderListUser' => $userOrderList
        ];

        return view('e-commerce/wishlist', $data);
    }

    //--------------------------------------------------------------------

}
