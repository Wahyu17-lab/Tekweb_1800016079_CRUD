<?php

namespace App\Models;

use CodeIgniter\Model;

class update_M extends Model
{
    protected $table = 'tb';
    public function get_user($id = false)
    {

        if ($id === false) {
            return $this->findAll();
        }

        return $this->getWhere(['id_us' => $id]);
    }
    public function saveUser($data)
    {
        $query = $this->db->table($this->table)
            ->insert($data);
        return $query;
    }
    public function deleteUser($id)
    {
        $query = $this->db->table($this->table)
            ->delete(['id_us' => $id]);
        return $query;
    }
    public function updateUser($data, $id)
    {
        return $this->db->table('tb')->update($data, ['id_us' => $id]);
    }
}