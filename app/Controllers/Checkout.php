<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\CheckoutModel;
use App\Models\OrderModel;

class Checkout extends BaseController
{
    protected $Cart;
    protected $Checkout;
    protected $Order;

    public function __construct()
    {
        $this->Cart = new CartModel();
        $this->Checkout = new CheckoutModel();
        $this->Order = new OrderModel();
    }

    public function index($ID)
    {
        $order = $this->Checkout->getOrder($ID);

        if (user_id() != $order['ID_User']) {
            return redirect()->to('/Cart');
        }

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
            'Nama_Produk' => $order['Nama_Produk'],
            'Harga_Produk' => $order['Harga_Produk'],
            'Gambar_Produk' => $order['Gambar_Produk'],
            'Kuantitas' => $order['Kuantitas'],
            'Size' => $order['Size'],
            'ID_Cart' => $order['ID_Cart'],
            'OrderListVendor' => $vendorOrderList,
            'OrderListUser' => $userOrderList
        ];

        return view('e-commerce/checkout', $data);
    }

    public function Process($ID)
    {
        $cart = $this->Cart->getSingleCart($ID);
        $order = $this->Checkout->getOrder($ID);

        if ($order == null) {
            $this->Checkout->save([
                'ID_Cart' => $cart['id'],
                'ID_User' => $cart['ID_User'],
                'ID_Vendor' => $cart['ID_Vendor'],
                'ID_Random' => $cart['ID_Random'],
                'Nama_Produk' => $cart['Nama_Produk'],
                'Harga_Produk' => $cart['Harga_Produk'],
                'Gambar_Produk' => $cart['Gambar_Produk'],
                'Kuantitas' => $this->request->getVar('qty'),
                'Size' => $this->request->getVar('Size_Produk')
            ]);
        } else {
            $this->Checkout->save([
                'ID' => $order['ID'],
                'ID_Cart' => $cart['id'],
                'ID_User' => $cart['ID_User'],
                'ID_Vendor' => $cart['ID_Vendor'],
                'ID_Random' => $cart['ID_Random'],
                'Nama_Produk' => $cart['Nama_Produk'],
                'Harga_Produk' => $cart['Harga_Produk'],
                'Gambar_Produk' => $cart['Gambar_Produk'],
                'Kuantitas' => $this->request->getVar('qty'),
                'Size' => $this->request->getVar('Size_Produk')
            ]);
        }

        return redirect()->to('/Checkout/index/' . $ID);
    }

    public function checkout($ID)
    {
        $queryOrder = $this->Checkout->getOrder($ID);
        $queryCart = $this->Cart->getSingleCart($ID);

        if (user()->Name == null) {
            $username_name = user()->username;
        } else ($username_name = user()->Name);

        $this->Order->save([
            'ID_User' => $this->request->getVar('ID_User'),
            'ID_Random' => $queryCart['ID_Random'],
            'Username/Name' => $username_name,
            'BA_First_Name' => $this->request->getVar('BA_First_Name'),
            'BA_Last_Name' => $this->request->getVar('BA_Last_Name'),
            'BA_Email' => $this->request->getVar('BA_Email'),
            'BA_Mobile_No' => $this->request->getVar('BA_Mobile_No'),
            'BA_Country' => $this->request->getVar('BA_Country'),
            'BA_City' => $this->request->getVar('BA_City'),
            'Billing_Address' => $this->request->getVar('Billing_Address'),
            'Payment_Method' => $this->request->getVar('Payment'),

            'SA_First_Name' => $this->request->getVar('SA_First_Name'),
            'SA_Last_Name' => $this->request->getVar('SA_Last_Name'),
            'SA_Email' => $this->request->getVar('SA_Email'),
            'SA_Mobile_No' => $this->request->getVar('SA_Mobile_No'),
            'SA_Country' => $this->request->getVar('SA_Country'),
            'SA_City' => $this->request->getVar('SA_City'),
            'Shipping_Address' => $this->request->getVar('Shipping_Address'),
            'Deliver_By' => $this->request->getVar('Deliver_By'),

            'ID_Vendor' => $queryOrder['ID_Vendor'],
            'Product_Pict' => $queryOrder['Gambar_Produk'],
            'Nama_Produk' => $queryOrder['Nama_Produk'],
            'Harga_Produk' => $queryOrder['Harga_Produk'],
            'Kuantitas' => $queryOrder['Kuantitas'],
            'Size' => $queryOrder['Size'],
            'Created_At' => $queryOrder['Created_At'],
            'Sub_Total' => $queryOrder['Harga_Produk'] * $queryOrder['Kuantitas'],
            'Shipping_Cost' => $Shipping_Cost = '10000',
            'Total' => $queryOrder['Harga_Produk'] * $queryOrder['Kuantitas'] + $Shipping_Cost
        ]);

        session()->setFlashdata('success', 'This Product Was Successfully Checkout, Please Pay According To The Total Nominal And Pay With The Method Selected');

        return redirect()->to('/Checkout/index/' . $ID);
    }

    //--------------------------------------------------------------------

}
