<?php

namespace App\Controllers;

use App\Models\ModelUser;

class LoginUser extends BaseController
{
    protected $UserModel;

    public function __construct()
    {
        $this->UserModel = new ModelUser();
    }

    public function index()
    {
        return view('e-commerce/login-user');
    }

    public function Register()
    {
        $this->UserModel->save([
            'Email_Username' => $this->request->getVar('Email_Username'),
            'First_Name' => $this->request->getVar('First_Name'),
            'Last_Name' => $this->request->getVar('Last_Name'),
            'Mobile_No' => $this->request->getVar('Mobile_No'),
            'Password1' => $this->request->getVar('Password1'),
            'Password2' => $this->request->getVar('Password2')
        ]);

        return redirect()->to('/LoginUser');
    }

    //--------------------------------------------------------------------
}
