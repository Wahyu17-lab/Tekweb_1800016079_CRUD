<?php namespace App\Controllers;
use App\Models\update_M;

class user extends BaseController
{
	public function index()
    {
        if (session()->get('Email') == '') {
            session()->setFlashdata('gagal', 'Anda belum login');
            return redirect()->to(base_url('login'));
        }

        $model = new update_M();
        $data['user'] = $model->get_user();

        return view('user_view', $data);
    }
    public function tambahdata()
    {
        echo view('tambah');
    }

    public function save()
    {
        $model = new update_M();
        $data = [
            'Nama' => $this->request->getPost('Nama'),
            'Email' => $this->request->getPost('Email')
        ];
        $model->saveUser($data);
        return redirect()->to('/user');
    }
    public function delete($id)
    {
        $model = new update_M();
        $model->deleteUser($id);
        return redirect()->to('/user');
    }
    public function edit($id)
    {
        $model = new update_M();
        $data['user'] = $model->get_user($id)->getRow();
        return view('editdata', $data);
    }

    public function updateData()
    {
        $model = new update_M();
        $id = $this->request->getPost('id_us');
        $data = [
            'Nama' => $this->request->getPost('Nama'),
            'Email' => $this->request->getPost('Email')
        ];
        $model->updateUser($data, $id);
        return redirect()->to('/user');
    }
}
