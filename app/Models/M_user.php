<?php namespace App\Models;
use CodeIgniter\Model;

class M_user extends Model
{
	public function get_data($email, $password)
	{
        return $this->db->table('user')
        ->where(array('Email' => $email, 'Password' => $password))
        ->get()->getRowArray();
	}

	//--------------------------------------------------------------------

}
