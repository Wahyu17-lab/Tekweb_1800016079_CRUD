<?php namespace App\Controllers;
use App\Models\M_user;

class Login extends BaseController
{
	public function index()
	{
		return view('user_form');
	}

    public function login_action()
    {
        $muser = new M_user();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $cek = $muser->get_data($email, $password);

        if (($cek['Email'] == $email) && ($cek['Password'] == $password))
        {
            session()->set('Email', $cek['Email']);
            session()->set('Password', $cek['Password']);
            session()->set('Nama', $cek['Nama']);
            session()->set('id', $cek['id']);
            return redirect()->to(base_url('user'));
        } else {
            session()->setFlashdata('gagal','Email / password salah');
            return redirect()->to(base_url('login'));
        }
    }

    public function logout()
    {
       session()->destroy();
       return redirect()->to(base_url('login'));
    }
	//--------------------------------------------------------------------

}
