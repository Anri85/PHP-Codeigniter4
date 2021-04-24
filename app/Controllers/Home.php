<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\CartModel;
use App\Models\OrderModel;

class Home extends BaseController
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
		$jml = $this->Cart->getCart();
		$userOrderList = $this->Order->infoUserOrder();
		$vendorOrderList = $this->Order->infoVendorOrder();
		$hitung1 = count($userOrderList);
		$hitung2 = count($vendorOrderList);
		$count = count($jml);
		$produk = $this->produkModel->getProduk();

		$data = [
			'produk' => $produk,
			'count' => $count,
			'jmlOrderVendor' => $hitung2,
			'jmlOrderUser' => $hitung1,
			'OrderListVendor' => $vendorOrderList,
			'OrderListUser' => $userOrderList
		];

		return view('e-commerce/index', $data);
	}

	//--------------------------------------------------------------------

}
