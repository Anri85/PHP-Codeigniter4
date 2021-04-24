<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\UserModel;
use App\Models\CartModel;
use App\Models\OrderModel;

class MyAccount extends BaseController
{
    protected $produkModel;
    protected $UserModel;
    protected $Cart;
    protected $Order;

    public function __construct()
    {
        $this->produkModel = new ProdukModel();
        $this->UserModel = new UserModel();
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
            'validation' => \Config\Services::validation(),
            'produkvendor' => $this->produkModel->getProdukVendor(),
            'count' => $count,
            'jmlOrderVendor' => $hitung2,
            'jmlOrderUser' => $hitung1,
            'OrderListVendor' => $vendorOrderList,
            'OrderListUser' => $userOrderList
        ];

        if ($userOrderList == null) {
            session()->setFlashdata('order', "You've Never Ordered!");
        }

        if ($vendorOrderList == null) {
            session()->setFlashdata('order', "It's Empty! :(");
        }

        return view('e-commerce/my-account', $data);
    }

    public function Createproduct()
    {
        session();

        $data = [
            'validation' => \Config\Services::validation()
        ];

        if (in_groups('Vendor')) {
            return view('e-commerce/add-product', $data);
        } else {
            return redirect()->to('/MyAccount');
        }
    }

    public function Addproduct()
    {
        // validasi input
        if (!$this->validate([
            'ID_Vendor' => 'required',
            'Nama_Produk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please Insert Product Name'
                ]
            ],
            'Harga_Produk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please Insert Product Price'
                ]
            ],
            'Deskripsi_Produk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please Insert Product Description'
                ]
            ],
            'Spesifikasi_Produk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please Insert Product Specification'
                ]
            ],
            'Status_Produk' => 'required',
            'Kategori_Produk' => 'required',
            'Gambar_Produk' => [
                'rules' => 'uploaded[Gambar_Produk]|max_size[Gambar_Produk,5000]|is_image[Gambar_Produk]|mime_in[Gambar_Produk,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Please Choose Your Product Picture',
                    'max_size' => 'Your File Size Is Too Large',
                    'is_image' => 'Uploaded File Is Not Image!',
                    'mime_in' => 'Uploaded File Is Not Image!!!'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/MyAccount/Createproduct')->withInput()->with('validation', $validation);
            return redirect()->to('/MyAccount/Createproduct')->withInput();
        }
        // proses mengelola gambar
        $fileGambar_Produk = $this->request->getFile('Gambar_Produk');

        // mengambil nama file
        $nameFile = $fileGambar_Produk->getRandomName();

        // pindahkan file kedalam folder img
        $fileGambar_Produk->move('img', $nameFile);

        // proses input database
        $this->produkModel->save([
            'ID_Vendor' => $this->request->getVar('ID_Vendor'),
            'Nama_Produk' => $this->request->getVar('Nama_Produk'),
            'Nama_Vendor' => $this->request->getVar('Nama_Vendor'),
            'Harga_Produk' => $this->request->getVar('Harga_Produk'),
            'Deskripsi_Produk' => $this->request->getVar('Deskripsi_Produk'),
            'Spesifikasi_Produk' => $this->request->getVar('Spesifikasi_Produk'),
            'Catatan_Produk' => $this->request->getVar('Catatan_Produk'),
            'Status_Produk' => $this->request->getVar('Status_Produk'),
            'Kategori_Produk' => $this->request->getVar('Kategori_Produk'),
            'Size_Produk_S' => $this->request->getVar('Size_Produk_S'),
            'Size_Produk_M' => $this->request->getVar('Size_Produk_M'),
            'Size_Produk_L' => $this->request->getVar('Size_Produk_L'),
            'Size_Produk_XL' => $this->request->getVar('Size_Produk_XL'),
            'Gambar_Produk' => $nameFile
        ]);

        session()->setFlashdata('pesan', 'Your Product Has Been Added!');

        return redirect()->to('/MyAccount/Createproduct');
    }

    public function Edit($ID)
    {
        session();

        $ID_Vendor = $this->produkModel->getProduk($ID);

        if ($_SESSION['logged_in'] != $ID_Vendor['ID_Vendor']) {
            return redirect()->to('/MyAccount');
        }

        $data = [
            'editproduk' => $this->produkModel->getProduk($ID),
            'validation' => \Config\Services::validation()
        ];

        if (in_groups('Vendor')) {
            return view('e-commerce/edit-product', $data);
        } else {
            return redirect()->to('/MyAccount');
        }
    }

    public function Update($ID)
    {
        if (!$this->validate([
            'ID_Vendor' => 'required',
            'Nama_Produk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please Insert Product Name'
                ]
            ],
            'Harga_Produk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please Insert Product Price'
                ]
            ],
            'Deskripsi_Produk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please Insert Product Description'
                ]
            ],
            'Spesifikasi_Produk' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Please Insert Product Specification'
                ]
            ],
            'Status_Produk' => 'required',
            'Kategori_Produk' => 'required'
            // 'Gambar_Produk' => [
            //     'rules' => 'max_size[Gambar_Produk,5000]|is_image[Gambar_Produk]|mime_in[Gambar_Produk,image/jpg,image/jpeg,image/png]',
            //     'errors' => [
            //         'max_size' => 'Your File Size Is Too Large',
            //         'is_image' => 'Uploaded File Is Not Image!',
            //         'mime_in' => 'Uploaded File Is Not Image!!!'
            //     ]
            // ]
        ])) {
            // return redirect()->to('/MyAccount/Edit/' . $this->request->getVar('ID'))->withInput()->with('validation', $validation);
            // return redirect()->to('/MyAccount/Edit/' . $this->request->getVar('ID'))->withInput();
        }

        // mengambil file gambar
        $fileGambar_Baru = $this->request->getFile('Gambar_Produk');
        $gambar_Lama = $this->request->getVar('Gambar_Sebelumnya');

        // cek apakah ada perubahan gambar
        if ($fileGambar_Baru->getError() == 4) {
            $namaGambar = $gambar_Lama;
            // dd($namaGambar);
        } else {
            // ambil nama gambar baru
            $namaGambar = $fileGambar_Baru->getRandomName();
            // upload gambar
            $fileGambar_Baru->move('img', $namaGambar);
            // menghapus gambar lama
            unlink('img/' . $gambar_Lama);
        }

        // proses update
        $this->produkModel->save([
            'ID' => $ID,
            'Nama_Produk' => $this->request->getVar('Nama_Produk'),
            'Harga_Produk' => $this->request->getVar('Harga_Produk'),
            'Deskripsi_Produk' => $this->request->getVar('Deskripsi_Produk'),
            'Spesifikasi_Produk' => $this->request->getVar('Spesifikasi_Produk'),
            'Catatan_Produk' => $this->request->getVar('Catatan_Produk'),
            'Status_Produk' => $this->request->getVar('Status_Produk'),
            'Kategori_Produk' => $this->request->getVar('Kategori_Produk'),
            'Size_Produk_S' => $this->request->getVar('Size_Produk_S'),
            'Size_Produk_M' => $this->request->getVar('Size_Produk_M'),
            'Size_Produk_L' => $this->request->getVar('Size_Produk_L'),
            'Size_Produk_XL' => $this->request->getVar('Size_Produk_XL'),
            'Gambar_Produk' => $namaGambar
        ]);

        session()->setFlashdata('pesan', 'Your Product Has Been Edited!');

        return redirect()->to('/MyAccount');
    }

    public function Detail($ID)
    {
        $ID_Vendor = $this->produkModel->getProduk($ID);

        if ($_SESSION['logged_in'] != $ID_Vendor['ID_Vendor']) {
            return redirect()->to('/MyAccount');
        }

        $data = [
            'detailproduk' => $this->produkModel->getProduk($ID)
        ];

        if (in_groups('Vendor')) {
            return view('e-commerce/product-vendor', $data);
        } else {
            return redirect()->to('/MyAccount');
        }
    }

    public function Delete()
    {
        $ID = $this->request->getVar('ID');

        // mencari gambar berdasarkan id
        $produk = $this->produkModel->find($ID);

        // menghapus gambar
        unlink('img/' . $produk['Gambar_Produk']);

        $this->produkModel->delete($ID);

        session()->setFlashdata('pesan', 'Your Product Has Been Deleted!');

        return redirect()->to('/MyAccount/index');
    }

    public function UserMethod($ID)
    {
        if ($ID != $_SESSION['logged_in']) {
            return redirect()->to('/MyAccount');
        }

        // if ($this->validate([
        //     'id' => 'required',
        //     'Mobile_No' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Please Insert Your Phone Number'
        //         ]
        //     ],
        //     'Name' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Please Insert Your Name'
        //         ]
        //     ],
        //     'Payment_Address' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Please Insert Your Payment Address'
        //         ]
        //     ],
        //     'Shipping_Address' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Please Insert Your Shipping Address'
        //         ]
        //     ]
        // ])) {
        //     return redirect()->to('/MyAccount' . $this->request->getVar('id'))->withInput();
        // }

        // mengambil file gambar
        $UserImg = $this->request->getFile('UserImg');
        $oldImg = $this->request->getVar('Gambar_Profile_Sebelumnya');

        // mengecek apakah ada gambar baru atau tidak
        if ($UserImg->getError() == 4) {
            $newName = $oldImg;
        } else {
            // membuat nama random
            $newName = $UserImg->getRandomName();

            // pindahkan gambar
            $UserImg->move('img-user', $newName);

            // hapus gambar lama
            if ($oldImg != 'img4.PNG') {
                unlink('img-user/' . $oldImg);
            }
        }

        // insert database
        $this->UserModel->save([
            'id' => $ID,
            'Mobile_No' => $this->request->getVar('Mobile_No'),
            'Name' => $this->request->getVar('Name'),
            'Gender' => $this->request->getVar('Gender'),
            'Payment_Address' => $this->request->getVar('Payment_Address'),
            'Shipping_Address' => $this->request->getVar('Shipping_Address'),
            'Description' => $this->request->getVar('Description'),
            'UserImg' => $newName
        ]);

        session()->setFlashdata('pesan', 'Your Profile Has Been Edited!');

        return redirect()->to('/MyAccount');
    }
}
